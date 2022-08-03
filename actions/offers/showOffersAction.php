<?php

require('actions/database.php');

$getAllOffers = $bdd->query('SELECT id, title, description, location, salary, login_author, approved FROM offers ORDER BY id DESC LIMIT 0,6');

if(isset($_GET['search']) AND !empty($_GET['search'])){

    $userSearch = $_GET['search'];

    $getAllOffers = $bdd->query('SELECT id, title, description, location, salary, login_author FROM offers WHERE title LIKE "%'.$userSearch.'%" ORDER BY id DESC');

    
}