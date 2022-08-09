<?php

//Heroku - JawsDB
if (getenv('JAWSDB_URL') !== false) {
    $dbparts = parse_url($url);

    $hostname = 'y6aj3qju8efqj0w1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $username = 'hos5wgw0c8fcqo73';
    $password = 'o5vevlu8raz6scmy';
    $database = ltrim('omu8lrvn0pozj1nk/');

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
