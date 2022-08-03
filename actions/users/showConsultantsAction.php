<?php

require('actions/database.php');

$getAllConsultants = $bdd->query('SELECT id, login FROM consultant ORDER BY id DESC');