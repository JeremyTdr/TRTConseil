<?php

require('actions/database.php');

$candidatesPending = $bdd->query('SELECT * FROM candidate WHERE approved = 0');
$recruitersPending = $bdd->query('SELECT * FROM recruiter WHERE approved = 0');

