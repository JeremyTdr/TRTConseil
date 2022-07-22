<?php require('actions/securityAction.php'); ?>
<?php require('actions/viewOfferAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>
        <br><br>

        <div class="container">
            <?php
                if(isset($errorMsg)){echo $errorMsg;}

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
                }
            ?>    
        </div>
        
    </body>
</html>