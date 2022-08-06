<?php

require('actions/database.php');

if(isset($_POST['publish'])){

    switch($_SESSION['type']) 
        {
            case 'candidate':

                $new_user_login= htmlspecialchars($_POST['userLogin']);
                $new_user_firstName= htmlspecialchars($_POST['userFirstname']);
                $new_user_lastName= htmlspecialchars($_POST['userLastname']);
                $new_user_email= htmlspecialchars($_POST['userEmail']);

                $password = $_POST['userPassword'];
                $verifPassword = $_POST['userPassword2'];

                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
                        
                    $errorMsg = "Le mot de passe ne respecte pas les règles de conformité. Veuillez en saisir un nouveau.";
                    
                }elseif($password != $verifPassword){

                    $errorMsg = "Les 2 mots de passe ne correspondent pas.";

                } else {
                    $new_user_password = password_hash($password, PASSWORD_DEFAULT);

                    $editUser = $bdd->prepare('UPDATE candidate SET login = ?, firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?');
                    $editUser->execute(array($new_user_login, $new_user_firstName, $new_user_lastName, $new_user_email, $new_user_password, $userId));

                    header('Location: actions/users/logoutAction.php');
                }
            break;

            case 'recruiter':

                $new_user_login= htmlspecialchars($_POST['userLogin']);
                $new_user_society= htmlspecialchars($_POST['userSociety']);
                $new_user_address= nl2br(htmlspecialchars($_POST['userAddress']));
                $new_user_email= htmlspecialchars($_POST['userEmail']);

                $new_user_login = htmlspecialchars($_POST['userLogin']);

                $password = $_POST['userPassword'];
                $verifPassword = $_POST['userPassword2'];

                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
                        
                    $errorMsg = "Le mot de passe ne respecte pas les règles de conformité. Veuillez en saisir un nouveau.";
                    
                }elseif($password != $verifPassword){

                    $errorMsg = "Les 2 mots de passe ne correspondent pas.";

                } else {
                    $new_user_password = password_hash($password, PASSWORD_DEFAULT);

                    $editUser = $bdd->prepare('UPDATE recruiter SET login = ?, society = ?, address = ?, email = ?, password = ? WHERE id = ?');
                    $editUser->execute(array($new_user_login, $new_user_society, $new_user_address, $new_user_email, $new_user_password, $userId));

                    header('Location: actions/users/logoutAction.php');
                }
            break;

            case 'admin':

                $new_user_login= htmlspecialchars($_POST['userLogin']);

                $password = $_POST['userPassword'];
                $verifPassword = $_POST['userPassword2'];

                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
                        
                    $errorMsg = "Le mot de passe ne respecte pas les règles de conformité. Veuillez en saisir un nouveau.";
                    
                }elseif($password != $verifPassword){

                    $errorMsg = "Les 2 mots de passe ne correspondent pas.";

                } else {
                    $editUser = $bdd->prepare('UPDATE admin SET login = ?, password = ? WHERE id = ?');
                    $editUser->execute(array($new_user_login, $new_user_password, $userId));

                    header('Location: actions/users/logoutAction.php');
                }

                

            break;


        } 
}