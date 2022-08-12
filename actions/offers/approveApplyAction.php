<?php

session_start();

if(!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $offerId = $_GET['id'];

    $checkIfOfferExists = $bdd->prepare('SELECT * FROM apply_offers WHERE id = ?');
    $checkIfOfferExists->execute(array($offerId));

    if($checkIfOfferExists->rowCount() > 0){
        //Changement du status de la demande

        $offerInfos = $checkIfOfferExists->fetch();
        if($offerInfos['id'] == $offerId){

            $new_offer_status = 1;

            $approveThisOffer = $bdd->prepare('UPDATE apply_offers SET approved = ? WHERE id = ?');
            $approveThisOffer->execute(array($new_offer_status, $offerId));



            //Envoi du mail au recruteur

            $applyCandidateId = $offerInfos['id_candidate'];


            $getInfosCandidate = $bdd->prepare('SELECT * FROM candidate WHERE id = ?');
            $getInfosCandidate->execute(array($applyCandidateId));

            $infosCandidate = $getInfosCandidate->fetch();

            $lastname = $infosCandidate['lastname'];
            $firstname = $infosCandidate['firstname'];
            $cv = $infosCandidate['cv'];


            $mailFrom = 'contact@trtconseil.fr';
            $mailTo = 'jeremy.tdr@gmail.com';

            $headers = "From: $mailFrom \r\n";
            $headers .= "Reply-to: $mail \r\n";
            $headers .='Content-Type:text/html; charset="uft-8"'."\n";
            $headers .='Content-Transfer-Encoding: 8bit';

            $email_body ='
            <html>
                <body>
                    <div align="left" style="color: black">
                        <ul>
                            <li>Nom :'.$lastname.'</li>
                            <li>Prénom :'.$firstname.'</li>
                            <li>CV :'.$cv.'</li>
                        <ul>
                        <br />
                    </div>
                </body>
            </html>';

            mail($mailTo, 'Nouveau candidat', $email_body, $headers);


            header('Location: ../../pending-applies.php');

        } else {
            $errorMsg = "Une erreur s'est produite";
        }

    } else {
        $errorMsg = "La demande n'a pas été trouvée";
    }
} else {
    $errorMsg = "La demande n'a pas été trouvée";
}