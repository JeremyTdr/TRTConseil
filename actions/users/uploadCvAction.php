<?php
require('actions/database.php');

//Téléchargement du CV
if(isset($_POST['upload']) && isset($_FILES['userCv'])){

    $userId = $_GET['id'];
    $userLogin = $_SESSION['login'];

    $file_name = $_FILES['userCv']['name'];
    $file_size = $_FILES['userCv']['size'];
    $tmp_name = $_FILES['userCv']['tmp_name'];
    $file_error = $_FILES['userCv']['error'];

    if($file_error === 0) {
        if($file_size <= 5000000){

            $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);

            $allowed_ex = "pdf";

            if($file_ex_lc == $allowed_ex){

                $new_file_name = 'CV-'.$userLogin.'.'.$file_ex_lc;
                $file_upload_path = 'assets/files/candidatesCv/'.$new_file_name;
                
                move_uploaded_file($tmp_name, $file_upload_path);

                $editCv = $bdd->prepare('UPDATE candidate SET cv = ? WHERE id = ?');
                $editCv->execute(array($new_file_name, $userId));

                $successMsg = "Votre CV a bien été téléchargé";

            } else {
                $errorMsg =  "Seulement les fichiers PDF sont acceptés.";
            }

        } else {
            $errorMsg = "Votre fichier ne doit pas dépasser 5Mo";
        }

    } else {
        $errorMsg = "Une erreur est survenue lors de l'ajout du CV";
    }
}
