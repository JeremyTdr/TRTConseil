<?php

require('actions/database.php');

$getAllMyOffers = $bdd->prepare('SELECT id, title, description, location, salary FROM offers WHERE id_author = ? ORDER BY id DESC');
$getAllMyOffers->execute(array($_SESSION['id']));