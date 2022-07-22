<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">TRT Conseil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a></li>
            <li><a class="dropdown-item" href="publish-offer.php">Publier une offre</a></li>
            <li><a class="dropdown-item" href="my-offers.php">Mes offres</a></li>
            <li><a class="dropdown-item" href="./actions/logoutAction.php">Se déconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>