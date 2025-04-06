<?php
session_start();

// Vérifie si l'administrateur est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirige vers la page de connexion si non connecté
    header('Location: login.php');
    exit;
}
?>