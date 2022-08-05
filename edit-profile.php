<?php 
    require('actions/securityAction.php');
    require('actions/users/getInfosUserAction.php');
    require('actions/users/editProfileAction.php');
    require('actions/users/uploadCvAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br>
    <div class="container">

        <?php 
            switch($_SESSION['type']){
                case 'candidate':
                ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="userLogin" value="<?=$user_login;?>">
                        </div>
                        <div class="mb-3">
                            <label for="userFirstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="userFirstname" value="<?=$user_firstname;?>">
                        </div>
                        <div class="mb-3">
                            <label for="userLastname" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="userLastname" value="<?=$user_lastname;?>">
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" name="userEmail" value="<?=$user_email;?>">
                        </div>
                        <div class="mb-3">
                            <label for="userCv" class="form-label">Mon CV</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="userCv" value="<?=$user_cv;?>">
                                <button class="btn btn-outline-secondary" type="submit" name="upload">Ajouter</button>  
                            </div>
                            <?php if(isset($successMsg)){ echo '<p>'.$successMsg.'</p>'; } ?>
                        </div>

                    <?php break;

                    case 'recruiter':
                        ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" name="userLogin" value="<?=$user_login;?>">
                                </div>
                                <div class="mb-3">
                                    <label for="userSociety" class="form-label">Société</label>
                                    <input type="text" class="form-control" name="userSociety" value="<?=$user_society;?>">
                                </div>
                                <div class="mb-3">
                                    <label for="userAddress" class="form-label">Adresse</label>
                                    <textarea type="text" class="form-control" name="userAddress"><?=$user_address;?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="userEmail" value="<?=$user_email;?>">
                                </div>
        
                            <?php break;
                    
                    case 'admin':
                        ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" name="userLogin" value="<?=$user_login;?>">
                                </div>
        
                            <?php break;
                    
                    case 'consultant':
                        ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" name="userLogin" value="<?=$user_login;?>">
                                </div>
        
                            <?php break;
            } ?>
                      
                        
                        <a href="profile.php?id=<?= $_SESSION['id']; ?>" class="btn btn-primary">Retour</a>  
                        <button type="submit" class="btn btn-primary" name="publish">Enregistrer</button>
                        <br><br>
                        <p>Merci de vous reconnecter après avoir enregistrer vos modifications.</p>
                        <br><br>
                        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
                    </form>
                <?php
        
        ?>
    </div>
        
    
</body>
</html>