<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['signup'])){

    // Vérification si tous les champs sont complétés
    if(!empty($_POST['userLogin']) AND !empty($_POST['userPassword'])){

        // Données de l'user
        $user_pseudo = htmlspecialchars($_POST['userLogin']);
        $user_password = htmlspecialchars($_POST['userPassword']);


        $checkIfUserExists = $bdd->prepare('SELECT * FROM recruiter WHERE login = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        // Vérification si login user existe
        if($checkIfUserExists->rowCount() > 0){

            // Vérification si mdp est correct
            $userInfos = $checkIfUserExists->fetch();
            if(password_verify($user_password, $userInfos['password'])){

                // Authentifier l'user et démarrer sa session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['login'] = $userInfos['login'];
                $_SESSION['email'] = $userInfos['email'];
                $_SESSION['cv'] = $thisUserInfos['cv'];
                $_SESSION['type'] = $userInfos['type'];

                // Redirection vers la page d'accueil après démarrage session
                header('Location: index.php');

            } else {
                $errorMsg = "Le mot de passe saisit est incorrect";
            }

        } else {
            $checkIfUserExists = $bdd->prepare('SELECT * FROM candidate WHERE login = ?');
            $checkIfUserExists->execute(array($user_pseudo));

            // Vérification si login user existe
            if($checkIfUserExists->rowCount() > 0){

                // Vérification si mdp est correct
                $userInfos = $checkIfUserExists->fetch();
                if(password_verify($user_password, $userInfos['password'])){

                    // Authentifier l'user et démarrer sa session
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $userInfos['id'];
                    $_SESSION['login'] = $userInfos['login'];
                    $_SESSION['email'] = $userInfos['email'];
                    $_SESSION['type'] = $userInfos['type'];

                    // Redirection vers la page d'accueil après démarrage session
                    header('Location: index.php');

                } else {
                    $errorMsg = "Le mot de passe saisit est incorrect";
                }

            } else {
                $checkIfUserExists = $bdd->prepare('SELECT * FROM admin WHERE login = ?');
                $checkIfUserExists->execute(array($user_pseudo));

                // Vérification si login user existe
                if($checkIfUserExists->rowCount() > 0){

                    // Vérification si mdp est correct
                    $userInfos = $checkIfUserExists->fetch();
                    if(password_verify($user_password, $userInfos['password'])){

                        // Authentifier l'user et démarrer sa session
                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $userInfos['id'];
                        $_SESSION['login'] = $userInfos['login'];
                        $_SESSION['type'] = $userInfos['type'];

                        // Redirection vers la page d'accueil après démarrage session
                        header('Location: index.php');

                    } else {
                        $errorMsg = "Le mot de passe saisit est incorrect";
                    }
                } else {
                    $checkIfUserExists = $bdd->prepare('SELECT * FROM consultant WHERE login = ?');
                    $checkIfUserExists->execute(array($user_pseudo));
    
                    // Vérification si login user existe
                    if($checkIfUserExists->rowCount() > 0){
    
                        // Vérification si mdp est correct
                        $userInfos = $checkIfUserExists->fetch();
                        if(password_verify($user_password, $userInfos['password'])){
    
                            // Authentifier l'user et démarrer sa session
                            $_SESSION['auth'] = true;
                            $_SESSION['id'] = $userInfos['id'];
                            $_SESSION['login'] = $userInfos['login'];
                            $_SESSION['type'] = $userInfos['type'];
    
                            // Redirection vers la page d'accueil après démarrage session
                            header('Location: index.php');
    
                        } else {
                            $errorMsg = "Le mot de passe saisit est incorrect";
                        }
                    } else {
                        $errorMsg = "L'utilisateur n'existe pas'";
                    }
                }
            }

        }   

    } else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}