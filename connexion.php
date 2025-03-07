<?php

try {
    // Connexion à MySQL avec PDO
    $conn = new PDO("mysql:host=localhost;dbname=db_voiture;charset=utf8", "root", "");
    
    // Activer les erreurs PDO en exception
    $conn->exec('SET NAMES "UTF8"');
    echo 'réussie';
} catch (PDOException $e) {
    echo 'erreur:' .$e->getMessage();
    die();
}
?>
