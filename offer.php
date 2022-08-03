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
                            <h2><?= $offer_title ?></h2>
                            <hr>
                            <p><?= $offer_description ?></p>
                            <hr>
                            <p><?= $offer_location ?></p>
                            <hr>
                            <p><?= $offer_salary ?></p>
                        <?php
                        if($offerInfos['approved'] == 0 AND $_SESSION['type'] == 'consultant'){
                            ?>
                            <a href="./actions/offers/approveOfferAction.php?id=<?= $offerInfos['id']; ?>" class="btn btn-success">Approuver l'offre</a>
                            <?php
                        }
                        if($_SESSION['type'] == 'candidate'){
                            ?>
                            <form method="POST">
                                <button type="submit" class="btn btn-primary" name="apply">Postuler</button>
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
            <br>
            <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>   
        </div>
        
    </body>
</html>