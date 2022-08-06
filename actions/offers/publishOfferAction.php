<?php

require('actions/database.php');

if(isset($_POST["publish"])){

    if(!empty($_POST['titleOffer']) AND !empty($_POST['descriptionOffer']) AND !empty($_POST['locOffer']) AND !empty($_POST['salaryOffer'])) {

        // Récupération des données saisies
        $title_offer= htmlspecialchars($_POST['titleOffer']);
        $description_offer= nl2br(htmlspecialchars($_POST['descriptionOffer']));
        $details_offer= nl2br(htmlspecialchars($_POST['detailsOffer']));
        $loc_offer= htmlspecialchars($_POST['locOffer']);
        $salary_offer= htmlspecialchars($_POST['salaryOffer']);
        $authorId_offer = $_SESSION['id'];
        $authorLogin_offer = $_SESSION['login'];


        $publishOffer = $bdd->prepare('INSERT INTO offers (title, description, details, location, salary, id_author, login_author) VALUES (?, ?, ?, ?, ?, ?, ?)');
        
        $publishOffer->execute(
            array(
                $title_offer, 
                $description_offer, 
                $details_offer, 
                $loc_offer, 
                $salary_offer, 
                $authorId_offer, 
                $authorLogin_offer
            )        
        );

        $successMsg = "Votre offre a bien été prise en compte. Elle sera publiée publiquement après approbation d'un consultant";

    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}