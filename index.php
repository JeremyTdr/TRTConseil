<?php 
    require('actions/securityAction.php');
    require('actions/showOffersAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h1>TRT Conseil</h1>
        <a href="signup.php">Sign Up</a>
        <a href="login.php">Login</a>
        <br><br>
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" type="submit">Rechercher une offre</button>
                </div>
            </div>
        </form>

        <br><br><br>

        <?php
            while($offer = $getAllOffers->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <h2><?= $offer['title']; ?></h2>
                    </div>
                    <div class="card-body">
                        <p><?= $offer['description']; ?></p>
                    </div>
                    <div class="card-footer">
                        <p><?= $offer['location']; ?> - <?= $offer['salary']; ?></p>
                        <a href="offer.php?id=<?= $offer['id']; ?>" class="btn btn-primary">Voir l'offre</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>

    </div>

</body>
</html>