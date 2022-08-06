<?php 
    require('actions/securityAction.php');
    require('actions/offers/showOffersAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <br><br>
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control searchBar">
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" type="submit">Rechercher une offre</button>
                </div>
            </div>
        </form>

        <br><br><br>

        <?php
            while($offer = $getAllOffers->fetch()){
                if($offer['approved'] == 1){
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
                <br><br>
                <?php
                }
            }
        ?>

    </div>

</body>
</html>