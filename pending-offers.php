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
            <br>
            <h2>Annonces en attente</h2>
            <br><br>
            <?php
            if(isset($errorMsg)){ echo '<p class="text-danger">'.$errorMsg.'</p>'; }
        
            while($offer = $getAllOffers->fetch()){
                if($offer['approved'] == 0){
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
                            <a href="offer.php?id=<?= $offer['id']; ?>" class="btn btn-primary">Voir les détails de l'offre</a>
                            <a href="./actions/offers/approveOfferAction.php?id=<?= $offer['id']; ?>" class="btn btn-success">Approuver l'offre</a>
                        </div>
                    </div>
                <?php
                }                
            }
            ?>

        </div>
        

    </body>
</html>