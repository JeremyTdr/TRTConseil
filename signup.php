<?php require('actions/users/signupAction.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <br><br>
    <form class="container form-signup" method="POST">
        <h1>TRT Conseil</h1>
        <br><br>
        <div class="mb-3">
            <label for="userLogin" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="userLogin">
        </div>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" name="userEmail">
        </div>
        <label for="userType" class="form-label">Quel type d'utilisateur êtes-vous ?</label>
        <select class="form-select" name="userType">
            <option selected>Selectionner...</option>
            <option value="candidate">Un candidat</option>
            <option value="recruiter">Un recruteur</option>
        </select>
        <br>
        <div class="mb-3">
            <label for="userPassword" class="form-label">Mot de passe (minimum 6 caractères, 1 Majuscule, 1 Chiffre, 1 Caractère spécial)</label>
            <input type="password" class="form-control" name="userPassword">
        </div>
        <div class="mb-3">
            <label for="userPassword" class="form-label">Vérification du mot de passe</label>
            <input type="password" class="form-control" name="userPassword2">
        </div>
        <?php if(isset($errorMsg)){ echo '<p class="text-danger">'.$errorMsg.'</p>'; } ?>
        <button type="submit" class="btn btn-primary" name="signup">S'inscrire</button>
        <br><br>
        <?php if(isset($successMsg)){ echo '<p class="text-success">'.$successMsg.'</p><p>Pensez à compléter votre profil lors de la première connexion. <a href="login.php">Retour à la plage de connexion</a></p>'; } ?>
        <br>
        <a href="login.php">J'ai déjà un compte, je me connecte</a>
    </form>

</body>
</html>