<?php 
require('actions/users/loginAction.php');
?>
<!DOCTYPE html>
    <html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body>
        <br><br>
        <form class="container form-login" method="POST">
            <h1>TRT Conseil</h1>
            <br><br>
            <div class="mb-3">
                <label for="userLogin" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="userLogin">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="userPassword">
            </div>
            <?php if(isset($errorMsg)){ echo '<p class="text-danger">'.$errorMsg.'</p>'; } 
                  elseif(isset($successMsg)){ echo '<p class="text-success">'.$successMsg.'</p>'; } 
            ?>
            <button type="submit" class="btn btn-primary" name="signup">Se connecter</button>
            <br><br>
            <a href="signup.php">Je n'ai pas de compte, je m'inscris</a>
        </form>

    </body>
</html>