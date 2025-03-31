<?php
$config = include('config.php');
// Tentative de connexion
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Vérifier et ajouter la colonne "likes" si elle n'existe pas
    $pdo->exec("ALTER TABLE images ADD COLUMN IF NOT EXISTS likes INT DEFAULT 0");

    // Message de succès (à supprimer en production)
    // echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    // Gestion des erreurs
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>