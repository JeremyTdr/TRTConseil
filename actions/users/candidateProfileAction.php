<?php

session_start();

if(!isset($_SESSION['auth'])) {
    header('Location: login.php');
}

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT * FROM candidate WHERE id = ?');
    $checkIfUserExists->execute(array($userId));

    if($checkIfUserExists->rowCount() > 0){

        $userInfos = $checkIfUserExists->fetch();
    } else {
        $errorMsg = "Aucun profil trouvé";
    }
} else {
    $errorMsg = "Aucun profil trouvé";
}