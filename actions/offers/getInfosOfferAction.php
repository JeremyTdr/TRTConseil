<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $offerId = $_GET['id'];

    $checkIfOfferExists = $bdd->prepare('SELECT * FROM offers WHERE id = ?');
    $checkIfOfferExists->execute(array($offerId));

    if($checkIfOfferExists->rowCount() > 0){

        $offerInfos = $checkIfOfferExists->fetch();
        if($offerInfos['id_author'] == $_SESSION['id']){

            $offer_id = $offerInfos['id'];
            $offer_title = $offerInfos['title'];
            $offer_description = $offerInfos['description'];
            $offer_location = $offerInfos['location'];
            $offer_salary = $offerInfos['salary'];

            $offer_description = str_replace('<br />', '', $offer_description);

        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette offre";
        }

    } else {
        $errorMsg = "Aucune offre n'a été trouvée";
    }

} else {
    $errorMsg = "Aucune offre n'a été trouvée";
}