<?php

try {
    // Connexion à MySQL avec PDO
    $conn = new PDO("mysql:host=localhost;dbname=db_voiture;charset=utf8", "root", "");
    $conn->exec('SET NAMES "UTF8"');
    echo 'connexion réussie';
} catch (PDOException $e) {
    echo 'erreur de connexion:' . $e->getMessage();
    die();
}
?>
