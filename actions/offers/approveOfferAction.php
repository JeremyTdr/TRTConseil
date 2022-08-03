<?php

session_start();

if(!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $offerId = $_GET['id'];

    $checkIfOfferExists = $bdd->prepare('SELECT * FROM offers WHERE id = ?');
    $checkIfOfferExists->execute(array($offerId));

    if($checkIfOfferExists->rowCount() > 0){

        $offerInfos = $checkIfOfferExists->fetch();
        if($offerInfos['id'] == $offerId){

            $new_offer_status = 1;

            $approveThisOffer = $bdd->prepare('UPDATE offers SET approved = ? WHERE id = ?');
            $approveThisOffer->execute(array($new_offer_status, $offerId));

            header('Location: ../../pending-offers.php');

        } else {
            $errorMsg = "Une erreur s'est produite";
        }

    } else {
        $errorMsg = "L'offre n'a pas été trouvée";
    }
} else {
    $errorMsg = "L'offre n'a pas été trouvée";
}

