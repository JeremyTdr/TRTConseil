<?php 
    require('actions/securityAction.php');
    require('actions/countUnnaprovedAction.php');
    require('actions/users/pendingAccountsAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>

        <div class="container">
            <br><br>

            <h2 data-bs-toggle="collapse" href="#candidatesCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">Candidats <span class="badge text-bg-secondary"><?=$unnaprovedCandidates->rowcount();?></span> <i class="fa-solid fa-angle-down"></i></h2>
            <div class="collapse multi-collapse" id="candidatesCollapse">
                <?php
                while($candidates = $candidatesPending->fetch()){
                    ?>
                        <div class="card">
                            <div class="card-body">

                                <h3>Nom d'utilisateur : <?= $candidates['login']; ?></h3>
                                <hr>
                                <p>Prénom : <?= $candidates['firstname']; ?><p>
                                <p>Nom : <?= $candidates['lastname']; ?><p>
                                <p>Email : <?= $candidates['email']; ?><p>
                                <br>
                                <a href="./actions/users/approveAccountAction.php?id=<?= $candidates['id']; ?>" class="btn btn-success">Approuver la céation du compte</a>
                            </div>
                        </div>
                        <br>
                    <?php              
                }
                ?>
            </div>

            <hr>
            <br>
            <h2 data-bs-toggle="collapse" href="#recruitersCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">Recruteurs <span class="badge text-bg-secondary"><?=$unnaprovedRecruiters->rowcount();?></span> <i class="fa-solid fa-angle-down"></i></h2>
            <div class="collapse multi-collapse" id="recruitersCollapse">
                <?php
                while($recruiters = $recruitersPending->fetch()){
                    ?>
                        <div class="card">
                            <div class="card-body">

                                <h3>Société : <?= $recruiters['society']; ?></h3>
                                <hr>
                                <p>Nom d'utilisateur : <?= $recruiters['login']; ?><p>
                                <p>Email : <?= $recruiters['email']; ?><p>
                                <br>
                                <a href="./actions/users/approveAccountAction.php?id=<?= $recruiters['id']; ?>" class="btn btn-success">Approuver la céation du compte</a>    
                            </div>
                        </div>
                        <br>
                    <?php              
                }
                ?>
            </div>
            <hr>
            