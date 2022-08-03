<?php

require('actions/database.php');

$unnaprovedOffers = $bdd->query('SELECT id FROM offers WHERE approved = 0');
$unnaprovedApplies = $bdd->query('SELECT id FROM apply_offers WHERE approved = 0');

$unnaprovedCandidates = $bdd->query('SELECT id FROM candidate WHERE approved = 0');

$unnaprovedRecruiters = $bdd->query('SELECT id FROM recruiter WHERE approved = 0');

$unnaprovedAccounts = $unnaprovedCandidates->rowcount() + $unnaprovedRecruiters->rowcount();