<?php

require('actions/database.php');

// Validation du formulaire
if(isset($_POST['create'])){

    // Vérification si tous les champs sont complétés
    if(!empty($_POST['userLogin']) AND !empty($_POST['userPassword'])){

        // Données de l'user
        $user_pseudo = htmlspecialchars($_POST['userLogin']);
        $user_password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

        
        // Verification si user déjà existant
        $checkUserAlreadyExists = $bdd->prepare('SELECT login FROM consultant WHERE login = ?');
        $checkUserAlreadyExists->execute(array($user_pseudo));

        if($checkUserAlreadyExists->rowCount() == 0){

            // Ajout de l'user dans la BDD
            $addUser = $bdd->prepare('INSERT INTO consultant(login, password)VALUES(?, ?)');
                    $addUser->execute(array($user_pseudo, $user_password));
                    
            $successMsg = "Le compte à bien été créé.";

        } else {
            $errorMsg = "Ce consultant existe déjà";
        }
    }
}