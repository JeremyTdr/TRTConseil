<?php

if (getenv('JAWSDB_URL') !== false) {
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');
    
} else {
    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'TRT Conseil';
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=TRT Conseil;charset=utf8;', 'root', 'root');
    
} catch(Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
