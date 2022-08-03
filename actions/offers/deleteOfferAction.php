<?php

session_start();

if(!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $offerId = $_GET['id'];

    $checkIfOfferExists = $bdd->prepare('SELECT id_author FROM offers WHERE id = ?');
    $checkIfOfferExists->execute(array($offerId));

    if($checkIfOfferExists->rowCount() > 0){

        $offerInfos = $checkIfOfferExists->fetch();
        if($offerInfos['id_author'] == $_SESSION['id']){

            $deleteThisOffer = $bdd->prepare('DELETE FROM offers WHERE id = ?');
            $deleteThisOffer->execute(array($offerId));

            header('Location: ../../my-offers.php');

        } else {
            echo "Vous n'avez pas le droit d'accèder à cette ressource";
        }

    } else {
        echo "Aucune offre n'a été trouvée";
    }

} else {
    echo "Aucune offre n'a été trouvée";
}