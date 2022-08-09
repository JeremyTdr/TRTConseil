<?php

//Heroku - JawsDB
if (getenv('JAWSDB_URL') !== false) {
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

} else {
    // LOCAL
    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'TRT Conseil';
}

try {
    $bdd = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
