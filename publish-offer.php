<?php 
    require('actions/securityAction.php'); 
    require('actions/offers/publishOfferAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <br>
        <h2>Publier une nouvelle offre</h2>
        <br>
        <?php 
                if(isset($errorMsg)){
                 echo '<p class="text-danger">'.$errorMsg.'</p>'; 
                } elseif(isset($successMsg)) {
                    echo '<p class="text-success">'.$successMsg.'</p>'; 
                }
        ?>
        <form method="POST">

            <div class="mb-3">
                <label for="titleOffer" class="form-label">Titre de l'offre</label>
                <input type="text" class="form-control" name="titleOffer">
            </div>
            <div class="mb-3">
                <label for="descriptionOffer" class="form-label">Description de l'offre</label>
                <textarea type="text" class="form-control" name="descriptionOffer"></textarea>
            </div>
            <div class="mb-3">
                <label for="detailsOffer" class="form-label">Détails de l'offre</label>
                <textarea type="text" class="form-control" name="detailsOffer" rows="16"><?=$offer_details;?></textarea>
            </div>
            <div class="mb-3">
                <label for="locOffer" class="form-label">Localisation du poste</label>
                <input type="text" class="form-control" name="locOffer">
            </div>
            <div class="mb-3">
                <label for="salaryOffer" class="form-label">Salaire proposé</label>
                <input type="text" class="form-control" name="salaryOffer">
            </div>
            
            <button type="submit" class="btn btn-primary" name="publish">Créer l'offre</button>
        </form>
        
    </div>
</body>
</html>