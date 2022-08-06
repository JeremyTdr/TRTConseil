<?php

require ('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $userId = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT * FROM consultant WHERE id = ?');
    $checkIfUserExists->execute(array($userId));

    if($checkIfUserExists->rowCount() > 0){

        $userInfos = $checkIfUserExists->fetch();

        if($userInfos['id'] == $_GET['id']){

            $user_login = $userInfos['login'];
            $user_password = $userInfos['password'];
        }

    } else {
        $errorMsg = "Aucun utilisateur n'a été trouvée";
    }
}

if(isset($_POST['publish'])){
    
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

        $editUser = $bdd->prepare('UPDATE consultant SET login = ?, password = ? WHERE id = ?');
        $editUser->execute(array($new_user_login, $new_user_password, $userId));

        $successMsg = "La modification du compte à bien été effectuée";
    }
}
