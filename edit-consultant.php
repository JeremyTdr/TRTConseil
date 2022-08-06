<?php 
    require('actions/securityAction.php');
    require('actions/users/editConsultantAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br>
    <div class="container">

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="userLogin" value="<?=$user_login;?>">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Mot de passe (minimum 6 caractères, 1 Majuscule, 1 Chiffre, 1 Caractère spécial)</label>
                <input type="password" class="form-control" name="userPassword" placeholder="******">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Vérification du mot de passe</label>
                <input type="password" class="form-control" name="userPassword2" placeholder="******">
            </div>
            <a href="consultants.php" class="btn btn-primary">Retour</a>  
            <button type="submit" class="btn btn-primary" name="publish">Enregistrer</button>
            <br><br>
            <?php 
            if(isset($errorMsg)){ echo '<p class="text-danger">'.$errorMsg.'</p>'; } 
            if(isset($successMsg)){ echo '<p class="text-success">'.$successMsg.'</p>'; } 
            ?>
        </form>

    </div>
        
    
</body>
</html>