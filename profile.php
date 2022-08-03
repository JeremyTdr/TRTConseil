<?php 
    require('actions/securityAction.php');
    require('actions/users/getInfosUserAction.php');
    require('actions/users/userProfileAction.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>

    <body>
        <?php include 'includes/navbar.php'; ?>

        <?php 
            if(isset($errorMsg)){echo $errorMsg;}
        ?>

                <br><br>
                <div class="container">

                    <div class="card">
                        <div class="card-body">

                            <h3><?= $user_login ?></h3>
                            <br>
                            <a href="edit-profile.php?id=<?= $_SESSION['id']; ?>" class="btn btn-primary">Editer mon profil</a>
                            <?php 
                                switch($_SESSION['type']) 
                                {
                                case 'candidate':
                                    echo 
                                    '<hr>
                                    <p>Prénom : '.$user_firstname.'<p>
                                    <p>Nom : '.$user_lastname.'<p>
                                    <p>Email : '.$user_email.'<p>
                                    <p>Mon CV : </p><iframe src="./assets/files/candidatesCv/'.$user_cv.'" height="450" width="350"></iframe>';
                                    break;
                                
                                case 'recruiter':
                                    echo 
                                    '<hr>
                                    <p>Société : '.$user_society.'<p>
                                    <p>Adresse : '.$user_address.'<p>
                                    <p>Email : '.$user_email.'<p>';
                                    break;
                                } 
                            ?>

                        </div>
                    </div>
                </div>
                
        
    </body>
</html>