<?php require('actions/signupAction.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <br><br>
    <form class="container" method="POST">

        <div class="mb-3">
            <label for="userLogin" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="userLogin">
        </div>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" name="userEmail">
        </div>
        <div class="mb-3">
            <label for="userPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="userPassword">
        </div>
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        <button type="submit" class="btn btn-primary" name="signup">S'inscrire</button>
        <br><br>
        <a href="login.php">J'ai déjà un compte, je me connecte</a>
    </form>

</body>
</html>