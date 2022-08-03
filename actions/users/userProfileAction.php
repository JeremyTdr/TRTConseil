<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];

    switch($_SESSION['type']){
        case 'candidate' :
            $checkIfUserExist = $bdd->prepare('SELECT * FROM candidate WHERE id = ?');
            $checkIfUserExist->execute(array($userId));

            if($checkIfUserExist->rowCount() > 0){

                $usersInfos = $checkIfUserExist->fetch();

                $user_login = $usersInfos['login'];
                $user_firstname = $usersInfos['firstname'];
                $user_lastname = $usersInfos['lastname'];
                $user_email = $usersInfos['email'];

                $getHisOffers = $bdd->prepare('SELECT * FROM offers WHERE id_author = ?');
                $getHisOffers->execute(array($userId));

            } else {
                $errorMsg = "Aucun utilisateur trouvé";
            }
            
            break;
        
        case 'recruiter' :
            $checkIfUserExist = $bdd->prepare('SELECT * FROM recruiter WHERE id = ?');
            $checkIfUserExist->execute(array($userId));

            if($checkIfUserExist->rowCount() > 0){

                $usersInfos = $checkIfUserExist->fetch();

                $user_login = $usersInfos['login'];
                $user_email = $usersInfos['email'];
                $user_society = $usersInfos['society'];
                $user_address = $usersInfos['address'];

                $getHisOffers = $bdd->prepare('SELECT * FROM offers WHERE id_author = ?');
                $getHisOffers->execute(array($userId));

            } else {
                $errorMsg = "Aucun utilisateur trouvé";
            }

            break;
        
            case 'admin' :
                $checkIfUserExist = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
                $checkIfUserExist->execute(array($userId));
    
                if($checkIfUserExist->rowCount() > 0){
    
                    $usersInfos = $checkIfUserExist->fetch();
    
                    $user_login = $usersInfos['login'];
    
                } else {
                    $errorMsg = "Aucun utilisateur trouvé";
                }
    
                break;
    }

} else {
    $errorMsg = "Aucun utilisateur trouvé";
}