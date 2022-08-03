<?php

require('actions/database.php');

if(isset($_POST['apply'])){

    $offerId = $_GET['id'];
    $candidateId = $_SESSION['id'];

    $checkIfApplyExists = $bdd->prepare('SELECT * FROM apply_offers WHERE id_candidate = ? AND id_offer = ?');
    $checkIfApplyExists->execute(array($candidateId, $offerId));

    if($checkIfApplyExists->rowCount() == 0){

        $applyOffer = $bdd->prepare('INSERT INTO apply_offers (id_candidate, id_offer) VALUES (?, ?)');
        
        $applyOffer->execute(array($candidateId,$offerId)); 

        $successApplyMsg = "Votre demande a bien été prise en compte"; 

    } else {
        $errorApplyMsg = "Vous avez déjà postulé à cette offre";
    }
       
} else {
    $errorApplyMsg = "Une erreur s'est produite";
}

