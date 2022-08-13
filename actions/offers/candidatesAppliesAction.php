<?php
require('actions/database.php');

$userId = $_SESSION['id'];


$getAllApprovedApplies = $bdd->query('SELECT * FROM apply_offers 
                                INNER JOIN offers ON (apply_offers.id_offer = offers.id) 
                                INNER JOIN candidate ON (apply_offers.id_candidate = candidate.id)
                                WHERE apply_offers.approved = 1 AND offers.id_author = '.$userId.'');




