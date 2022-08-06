<?php require('actions/securityAction.php'); ?>
<?php require('actions/offers/viewOfferAction.php'); ?>
<?php require('actions/offers/applyOfferAction.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>
        <br><br>

        <div class="container">
            <?php

                if($offerInfos['approved'] == 1 OR $_SESSION['type'] == 'consultant'){

                    if(isset($offer_description)){
                        ?>
                            <h2><?= $offer_title; ?></h2>
                            <hr>
                            <h4>Description & détails</h4>
                            <p><?= $offer_description; ?></p>
                            <br>
                            <p><?= $offer_details; ?></p>
                            <hr>
                            <h4>Localisation</h4><p><?= $offer_location; ?></p>
                            <hr>
                            <h4>Salaire proposé</h4>
                            <p><?= $offer_salary; ?></p>
                        <?php
                        if($offerInfos['approved'] == 0 AND $_SESSION['type'] == 'consultant'){
                            ?>
                            <a href="./actions/offers/approveOfferAction.php?id=<?= $offerInfos['id']; ?>" class="btn btn-success">Approuver l'offre</a>
                            <?php
                        }
                        if($_SESSION['type'] == 'candidate'){
                            ?>
                            <form method="POST">
                                <button type="submit" class="btn btn-success" name="apply">Postuler</button>
                                <?php
                                if(!isset($errorApplyMessage)){
                                    if(isset($successApplyMsg)){
                                        echo $successApplyMsg;
                                    } else {
                                        $errorApplyMessage;
                                    }
                                } else {
                                    echo $errorApplyMessage;
                                }
                                ?>
                            </form>
                            <?php    
                        }
                    }

                } else {
                    echo '<p>Aucune offre n\'a été trouvée</p>';
                }
                if(isset($errorMsg)){echo $errorMsg;}
            ?> 
            <br><br>
            <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>   
        </div>
        
    </body>
</html>