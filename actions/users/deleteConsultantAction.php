<?php

session_start();

if(!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT * FROM consultant WHERE id = ?');
    $checkIfUserExists->execute(array($userId));

    if($checkIfUserExists->rowCount() > 0){

        $userInfos = $checkIfUserExists->fetch();
        if($userInfos['id'] == $userId){

            $deleteThisUser = $bdd->prepare('DELETE FROM consultant WHERE id = ?');
            $deleteThisUser->execute(array($userId));

            header('Location: ../../consultants.php');

        } else {
            echo "Vous n'avez pas le droit d'accèder à cette ressource";
        }

    } else {
        echo "Aucun compte n'a été trouvée";
    }

} else {
    echo "Aucun compte n'a été trouvée";
}