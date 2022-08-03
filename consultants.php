<?php 
    require('actions/securityAction.php');
    require('actions/users/showConsultantsAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
    <body>
        <?php include 'includes/navbar.php'; ?>

        <div class="container">
            <br><br>
            <a href="new-consultant.php" class="btn btn-primary">Nouveau consultant</a>
            <br><br>
            <?php
            while($consultant = $getAllConsultants->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <h2><?= $consultant['login']; ?></h2>
                    </div>
                    <div class="card-body">
                        <a href="edit-consultant.php?id=<?= $consultant['id']; ?>" class="btn btn-warning">Modifier le compte</a>
                        <a href="./actions/users/deleteConsultantAction.php?id=<?= $consultant['id']; ?>" class="btn btn-danger">Supprimer le compte</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>
    </body>
</html>