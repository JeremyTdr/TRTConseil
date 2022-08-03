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

                $editUser = $bdd->prepare('UPDATE candidate SET login = ?, firstname = ?, lastname = ?, email = ? WHERE id = ?');
                $editUser->execute(array($new_user_login, $new_user_firstName, $new_user_lastName, $new_user_email, $userId));

                header('Location: actions/users/logoutAction.php');

            break;

            case 'recruiter':

                $new_user_login= htmlspecialchars($_POST['userLogin']);
                $new_user_society= htmlspecialchars($_POST['userSociety']);
                $new_user_address= nl2br(htmlspecialchars($_POST['userAddress']));
                $new_user_email= htmlspecialchars($_POST['userEmail']);

                $editUser = $bdd->prepare('UPDATE recruiter SET login = ?, society = ?, address = ?, email = ? WHERE id = ?');
                $editUser->execute(array($new_user_login, $new_user_society, $new_user_address, $new_user_email, $userId));

                header('Location: actions/users/logoutAction.php');

            break;

            case 'admin':

                $new_user_login= htmlspecialchars($_POST['userLogin']);

                $editUser = $bdd->prepare('UPDATE admin SET login = ? WHERE id = ?');
                $editUser->execute(array($new_user_login, $userId));

                header('Location: actions/users/logoutAction.php');

            break;


        } 
}