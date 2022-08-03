<?php 
    require('actions/securityAction.php'); 
    require('actions/users/addConsultantAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <br>
        <h2>Créer un nouveau consultant</h2>
        <br>
        <form class="container" method="POST">

            <div class="mb-3">
                <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="userLogin">
            </div>
            <br>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="userPassword">
            </div>
            <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
            <button type="submit" class="btn btn-primary" name="create">Créer</button>
            <br><br>
            <?php if(isset($successMsg)){ echo '<p>'.$successMsg.' <a href="consultants.php">Retour à la liste des consultants</a></p>'; } ?>
            <a href=""></a>
        </form>
        <br><br>
    </div>
</body>
</html>