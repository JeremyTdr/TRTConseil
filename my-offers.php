<?php 
    require('actions/securityAction.php');
    require('actions/myOffersAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <br><br>
        <?php
            while($offer = $getAllMyOffers->fetch()){
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h2><?= $offer['title']; ?></h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $offer['description']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p><?= $offer['location']; ?> - <?= $offer['salary']; ?></p>

                            <a href="offer.php?id=<?= $offer['id']; ?>" class="btn btn-primary">Voir l'offre</a>
                            <a href="edit-offer.php?id=<?= $offer['id']; ?>" class="btn btn-warning">Modifier l'offre</a>
                            <a href="./actions/deleteOfferAction.php?id=<?= $offer['id']; ?>" class="btn btn-danger">Supprimer l'offre</a>
                        </div>     
                    </div>
                    <br>
                <?php
            }
        ?>
    </div>
    

</body>
</html>