<?php

require('actions/database.php');

$getAllUnnapprovedApplies = $bdd->query('SELECT * FROM apply_offers 
                                INNER JOIN offers ON (apply_offers.id_offer = offers.id) 
                                INNER JOIN candidate ON (apply_offers.id_candidate = candidate.id)
                                WHERE apply_offers.approved = 0');


$getOffers = $bdd->query('SELECT * FROM offers');
$getCandidates = $bdd->query('SELECT * FROM candidate');

