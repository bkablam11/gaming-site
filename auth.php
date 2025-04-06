<?php
session_start();

// Vérifie si l'administrateur est connecté
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    // Redirige vers la page de connexion si non connecté
    header('Location: login.php');
    exit;
}
?>