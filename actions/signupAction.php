<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['signup'])){

    // Vérification si tous les champs sont complétés
    if(!empty($_POST['userLogin']) AND !empty($_POST['userEmail']) AND !empty($_POST['userPassword'])){

        // Données de l'user
        $user_pseudo = htmlspecialchars($_POST['userLogin']);
        $user_email = htmlspecialchars($_POST['userEmail']);
        $user_password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

        // Verification si user déjà existant
        $checkUserAlreadyExists = $bdd->prepare('SELECT login FROM recruiter WHERE login = ?');
        $checkUserAlreadyExists->execute(array($user_pseudo));

        if($checkUserAlreadyExists->rowCount() == 0){

            // Ajout de l'user dans la BDD
            $addUser = $bdd->prepare('INSERT INTO recruiter(login, email, password)VALUES(?, ?, ?)');
            $addUser->execute(array($user_pseudo, $user_email, $user_password));

            // Récupérer les infos de l'user
            $getThisUserReq = $bdd->prepare('SELECT id, login, email FROM recruiter WHERE login = ? AND email = ?');
            $getThisUserReq->execute(array($user_pseudo, $user_email));

            $thisUserInfos = $getThisUserReq->fetch();

            // Authentifier l'user et démarrer sa session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $thisUserInfos['id'];
            $_SESSION['login'] = $thisUserInfos['login'];
            $_SESSION['email'] = $thisUserInfos['email'];

            // Redirection vers la page d'accueil après démarrage session
            header('Location: index.php');
            

        }else {
            $errorMsg = "Cet utilisateur existe déjà";
        }

    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}