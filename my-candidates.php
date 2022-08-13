<?php 
    require('actions/securityAction.php');
    require('actions/offers/candidatesAppliesAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>

        <div class="container">
            <br>
            <h2>Candidats pour vos offres</h2>
            <br>
            <?php
                while($candidates = $getAllApprovedApplies->fetch()){
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Poste : <?= $candidates['title']; ?></h4>
                                <p>Prénom : <?= $candidates['firstname']; ?><p>
                                <p>Nom : <?= $candidates['lastname']; ?><p>
                                <p>Email : <?= $candidates['email']; ?><p>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#candidatesCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">Voir le CV <i class="fa-solid fa-angle-down"></i></a>
                                <div class="collapse multi-collapse" id="candidatesCollapse">
                                <?php if(isset($candidates['cv'])){
                                    echo "<iframe src='./assets/files/candidatesCv/".$candidates['cv']."' height='450' width='350'></iframe>"; 
                                    } else {
                                        echo "Aucun CV ajouté";
                                    }
                                ?>
                                </div>
                                <hr>
                        </div>
                        <br>
                    <?php              
                }
                ?>
        </div>
    </body>
</html>