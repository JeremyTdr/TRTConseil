<?php 
    require('actions/securityAction.php');
    require('actions/users/getInfosUserAction.php');
    require('actions/offers/pendingAppliesAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>

        <div class="container">
            <br><br>
            <?php
        
            while($apply = $getAllUnnapprovedApplies->fetch()){
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h2> <?= $apply['firstname'].' '.$apply['lastname'].' pour le poste '. $apply['title']; ?></h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $apply['description']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p><?= $apply['location']; ?> - <?= $apply['salary']; ?></p>
                            <a href="offer.php?id=<?= $apply['id_offer']; ?>" class="btn btn-primary">Voir les détails de l'offre</a>
                            <a href="candidate-profile.php?id=<?= $apply['id_candidate']; ?>" class="btn btn-primary">Voir les détails du candidat</a>
                            <a href="./actions/offers/approveApplyAction.php?id=<?= $apply['0']; ?>" class="btn btn-success">Approuver la demande</a>
                        </div>
                    </div>
                    <br><br>
                <?php 
            }          
            ?>

        </div>
        

    </body>
</html>