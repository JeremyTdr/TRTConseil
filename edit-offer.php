<?php 
    require('actions/securityAction.php');
    require('actions/getInfosOfferAction.php');
    require('actions/editOfferAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br>
    <div class="container">

        <?php 
            if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } 

            if(isset($offer_description)){
                ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="titleOffer" class="form-label">Titre de l'offre</label>
                            <input type="text" class="form-control" name="titleOffer" value="<?=$offer_title;?>">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionOffer" class="form-label">Description de l'offre</label>
                            <textarea type="text" class="form-control" name="descriptionOffer"><?=$offer_description;?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="locOffer" class="form-label">Localisation du poste</label>
                            <input type="text" class="form-control" name="locOffer" value="<?=$offer_location;?>">
                        </div>
                        <div class="mb-3">
                            <label for="salaryOffer" class="form-label">Salaire proposé</label>
                            <input type="text" class="form-control" name="salaryOffer" value="<?=$offer_salary;?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="publish">Modifier l'offre</button>
                    </form>
                <?php
            }
        
        ?>
    </div>
        
    
</body>
</html>