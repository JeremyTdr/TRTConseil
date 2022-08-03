<?php 
    require('actions/securityAction.php');
    require('actions/users/candidateProfileAction.php');
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

                            <h3>Profil de <?= $userInfos['login']; ?></h3>
                            <hr>
                            <p>Prénom : <?= $userInfos['firstname']; ?><p>
                            <p>Nom : <?= $userInfos['lastname']; ?><p>
                            <p>Email : <?= $userInfos['email']; ?><p>
                            <p>Son CV : </p><iframe src="./assets/files/candidatesCv/<?= $userInfos['cv']; ?>" height="450" width="350"></iframe>
    
                        </div>
                    </div>
                    <br>
                    <a href="pending-applies.php" class="btn btn-primary">Retour</a>
                </div>
                
        
    </body>
</html>