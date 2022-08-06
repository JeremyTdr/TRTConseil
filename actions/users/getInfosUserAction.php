<?php
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];
    $userLogin = $_GET['login'];

    switch($_SESSION['type']){

        case 'candidate':
            $checkIfUserExists = $bdd->prepare('SELECT * FROM candidate WHERE id = ?');
            $checkIfUserExists->execute(array($userId));

            if($checkIfUserExists->rowCount() > 0){

                $userInfos = $checkIfUserExists->fetch();

                if($userInfos['id'] == $_SESSION['id']){

                    $user_login = $userInfos['login'];
                    $user_firstname = $userInfos['firstname'];
                    $user_lastname = $userInfos['lastname'];
                    $user_email = $userInfos['email'];
                    $user_cv = $userInfos['cv'];
                    $user_password = $userInfos['password'];

                    if(isset($userInfos['cv'])){
                        $user_cv = "<iframe src='./assets/files/candidatesCv/".$userInfos['cv']."' height='450' width='350'></iframe>"; 
                    } else {
                        $user_cv = "Aucun CV ajouté";
                    }
                   
                }

            } else {
                $errorMsg = "Aucun utilisateur n'a été trouvée";
            }
        break;

        case 'recruiter':
            $checkIfUserExists = $bdd->prepare('SELECT * FROM recruiter WHERE id = ?');
            $checkIfUserExists->execute(array($userId));

            if($checkIfUserExists->rowCount() > 0){

                $userInfos = $checkIfUserExists->fetch();

                if($userInfos['id'] == $_SESSION['id']){

                    $user_login = $userInfos['login'];
                    $user_society = $userInfos['society'];
                    $user_address = $userInfos['address'];
                    $user_email = $userInfos['email'];
                    $user_password = $userInfos['password'];

                    $user_address = str_replace('<br />', '', $user_address);
                }

            } else {
                $errorMsg = "Aucun utilisateur n'a été trouvée";
            }
        break;

        case 'admin':
            $checkIfUserExists = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
            $checkIfUserExists->execute(array($userId));

            if($checkIfUserExists->rowCount() > 0){

                $userInfos = $checkIfUserExists->fetch();

                if($userInfos['id'] == $_SESSION['id']){

                    $user_login = $userInfos['login'];
                    $user_password = $userInfos['password'];
                }

            } else {
                $errorMsg = "Aucun utilisateur n'a été trouvée";
            }
        break;

        case 'consultant':
            $checkIfUserExists = $bdd->prepare('SELECT * FROM consultant WHERE id = ?');
            $checkIfUserExists->execute(array($userId));

            if($checkIfUserExists->rowCount() > 0){

                $userInfos = $checkIfUserExists->fetch();

                if($userInfos['id'] == $_SESSION['id']){

                    $user_login = $userInfos['login'];
                    $user_password = $userInfos['password'];
                }

            } else {
                $errorMsg = "Aucun utilisateur n'a été trouvée";
            }
        break;
    
    }

} else {
    $errorMsg = "Aucun utilisateur n'a été trouvée";
}