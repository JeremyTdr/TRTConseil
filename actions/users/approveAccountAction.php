<?php

session_start();

if(!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT * FROM recruiter WHERE id = ?');
    $checkIfUserExists->execute(array($userId));

    if($checkIfUserExists->rowCount() > 0){

        $userInfos = $checkIfUserExists->fetch();
        if($userInfos['id'] == $userId){

            $new_user_status = 1;

            $approveThisUser = $bdd->prepare('UPDATE recruiter SET approved = ? WHERE id = ?');
            $approveThisUser->execute(array($new_user_status, $userId));

            header('Location: ../../pending-accounts.php');

        } else {
            $errorMsg = "Une erreur s'est produite";
        }
    } else {
        $checkIfUserExists = $bdd->prepare('SELECT * FROM candidate WHERE id = ?');
        $checkIfUserExists->execute(array($userId));

        if($checkIfUserExists->rowCount() > 0){

            $userInfos = $checkIfUserExists->fetch();
            if($userInfos['id'] == $userId){

                $new_user_status = 1;

                $approveThisUser = $bdd->prepare('UPDATE candidate SET approved = ? WHERE id = ?');
                $approveThisUser->execute(array($new_user_status, $userId));

                header('Location: ../../pending-accounts.php');

            } else {
                $errorMsg = "Une erreur s'est produite";
            }

        } else {
            $errorMsg = "Aucun compte n'a été trouvé";
        }

    }
}