<?php 
    require('actions/securityAction.php');
    require('actions/userProfileAction.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>

    <body>
        <?php include 'includes/navbar.php'; ?>

        <?php 
            if(isset($errorMsg)){echo $errorMsg;}

            if(isset($getHisOffers)){
                ?>
                <div class="card">
                    <div class="card-body">
                        <h3><?= $user_login ?></h3>
                        <hr>
                        <p><?= $user_email ?></p>
                    </div>
                </div>
                <?php
            }
        ?>


        
    </body>
</html>