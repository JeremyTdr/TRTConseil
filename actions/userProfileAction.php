<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];

    $checkIfUserExist = $bdd->prepare('SELECT * FROM recruiter WHERE id = ?');
    $checkIfUserExist->execute(array($userId));

    if($checkIfUserExist->rowCount() > 0){

        $usersInfos = $checkIfUserExist->fetch();

        $user_login = $usersInfos['login'];
        $user_email = $usersInfos['email'];

        $getHisOffers = $bdd->prepare('SELECT * FROM offers WHERE id_author = ?');
        $getHisOffers->execute(array($userId));


    } else {
        $errorMsg = "Aucun utilisateur trouvé";
    }

} else {
    $errorMsg = "Aucun utilisateur trouvé";
}