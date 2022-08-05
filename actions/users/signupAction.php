<?php

require('actions/database.php');

// Validation du formulaire
if(isset($_POST['signup'])){

    // Vérification si tous les champs sont complétés
    if(!empty($_POST['userLogin']) AND !empty($_POST['userEmail']) AND !empty($_POST['userType']) AND !empty($_POST['userPassword'])){

        // Données de l'user
        $user_pseudo = htmlspecialchars($_POST['userLogin']);
        $user_email = htmlspecialchars($_POST['userEmail']);
        $user_type = htmlspecialchars($_POST['userType']);

        

        // Validation du password
        $password = $_POST['userPassword'];
        $verifPassword = $_POST['userPassword2'];

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
            
            $errorMsg = "Le mot de passe ne respecte pas les règles de conformité. Veuillez en saisir un nouveau";
        
        }elseif($password != $verifPassword){

            $errorMsg = "Les 2 mots de passe ne correspondent pas";

        } else {
            $user_password = password_hash($password, PASSWORD_DEFAULT);

            // Placement du compte dans la bonne table
            switch($user_type){
                
                case 'candidate':
                    // Verification si user déjà existant
                    $checkUserAlreadyExists = $bdd->prepare('SELECT login FROM candidate WHERE login = ?');
                    $checkUserAlreadyExists->execute(array($user_pseudo));
                    
                    if($checkUserAlreadyExists->rowCount() == 0){

                        // Ajout de l'user dans la BDD
                        $addUser = $bdd->prepare('INSERT INTO candidate(login, email, password, type)VALUES(?, ?, ?, ?)');
                        $addUser->execute(array($user_pseudo, $user_email, $user_password, $user_type));
                        
                        $successMsg = "Votre demande de compte à bien été transmise à nos consultants. Une fois approuvée, vous pourrez vous connecter à la plateforme.";

                    } else {
                        $errorMsg = "Cet utilisateur existe déjà";
                    }

                break;

                case 'recruiter' :
                    // Verification si user déjà existant
                    $checkUserAlreadyExists = $bdd->prepare('SELECT login FROM recruiter WHERE login = ?');
                    $checkUserAlreadyExists->execute(array($user_pseudo));

                    if($checkUserAlreadyExists->rowCount() == 0){

                        // Ajout de l'user dans la BDD
                        $addUser = $bdd->prepare('INSERT INTO recruiter(login, email, password, type)VALUES(?, ?, ?, ?)');
                        $addUser->execute(array($user_pseudo, $user_email, $user_password, $user_type));

                        $successMsg = "Votre demande de compte à bien été transmise à nos consultants. Une fois approuvée, vous pourrez vous connecter à la plateforme.";

                    } else {
                        $errorMsg = "Cet utilisateur existe déjà";
                    }
                
                    break;
            }
        }
               
        
    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}