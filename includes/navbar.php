
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">TRT Conseil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Accueil</a>
        </li>
        <span class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mes actions
          </a>
          <ul class="dropdown-menu">

          <?php 
          switch($_SESSION['type']){

            case 'recruiter':
              ?>
              <li><a class="nav-link text-dark" href="publish-offer.php">Publier une offre</a></li>
              <li><a class="nav-link text-dark" href="my-offers.php">Mes offres</a></li>
              <li><a class="nav-link text-dark" href="my-candidates.php">Mes candidats</a></li>
              <?php
              break;

            case 'candidate':
              ?>
              <li><a class="nav-link text-dark" href="my-offers.php">Mes offres</a></li>
              <?php
              break;
            
            case 'admin':
              ?>
              <li><a class="nav-link text-dark" href="consultants.php">Gérer les consultants</a></li>
              <?php
              break;
            
            case 'consultant':
              require('actions/countUnnaprovedAction.php');
              ?>
              <li><a class="nav-link text-dark" href="pending-offers.php">Annonces en attente</a><span class="badge text-bg-secondary"><?=$unnaprovedOffers->rowcount();?></span></li>
              <hr>
              <li><a class="nav-link text-dark" href="pending-applies.php">Demandes en attente</a><span class="badge text-bg-secondary"><?=$unnaprovedApplies->rowcount();?></span></li>
              <hr>
              <li><a class="nav-link text-dark" href="pending-accounts.php">Créations de compte en attente</a><span class="badge text-bg-secondary"><?=$unnaprovedAccounts;?></span></li>
              <?php
              break;

          } ?>
          </ul>
        </span>
        <span class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mon compte
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a></li>
            <li><a class="dropdown-item" href="./actions/users/logoutAction.php">Se déconnecter</a></li>
          </ul>
        </span>
      </ul>
    </div>
  </div>
</nav>