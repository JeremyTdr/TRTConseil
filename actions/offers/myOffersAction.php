<?php

require('actions/database.php');

$userId = $_SESSION['id'];

switch($_SESSION['type']){

    case 'candidate':

        $getAllMyOffers = $bdd->query('SELECT * FROM apply_offers 
                                    INNER JOIN offers ON apply_offers.id_offer = offers.id
                                    WHERE id_candidate = '.$userId.'');

        break;

    case 'recruiter':
        
        $getAllMyOffers = $bdd->prepare('SELECT id, title, description, location, salary FROM offers WHERE id_author = ? ORDER BY id DESC');
        $getAllMyOffers->execute(array($_SESSION['id']));
        break;
}

