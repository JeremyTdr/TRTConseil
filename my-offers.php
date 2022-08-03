<?php 
    require('actions/securityAction.php');
    require('actions/offers/myOffersAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <br><br>
        <?php
        
        if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; }

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

                            <?php
                            switch($_SESSION['type']){

                                case 'candidate':
                                    ?>
                                    <a href="offer.php?id=<?= $offer['id']; ?>" class="btn btn-primary">Voir l'offre</a>
                                    <?php
                                    break;
                                
                                case 'recruiter':
                                    ?>
                                    <a href="offer.php?id=<?= $offer['id']; ?>" class="btn btn-primary">Voir l'offre</a>
                                    <a href="edit-offer.php?id=<?= $offer['id']; ?>" class="btn btn-warning">Modifier l'offre</a>
                                    <a href="./actions/offers/deleteOfferAction.php?id=<?= $offer['id']; ?>" class="btn btn-danger">Supprimer l'offre</a>
                                    <?php
                                    break;
                            } 
                            ?>            
                        </div>     
                    </div>
                    <br>
                <?php
            }
        ?>
    </div>
    

</body>
</html>