<?php
include('auth.php'); // Vérifie si l'utilisateur est connecté
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body class="dashboard-page">
    <header class="main-header">
        <div class="container">
            <h1>Tableau de bord - Admin</h1>
            <a href="logout.php" class="logout-btn">Se déconnecter</a>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Bienvenue sur le tableau de bord</h2>
            <span class="already-account">Choisissez une action :</span> 
            <ul class="admin-links">
                <li><a href="manage.php">Gérer les affiches</a></li>
                <li><a href="delete.php">Gérer les suppressions</a></li>
                <li><a href="upload.php">Uploader des images</a></li>
                <li><a href="dislike.php">Gérer les dislikes</a></li>
            </ul>
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p style="text-align: center; font-size: 14px; color: #000; margin-top: 20px;">
    © 2025 Gaming Posters. Tous droits réservés.
</p>
        </div>
    </footer>
</body>
</html>