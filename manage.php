<?php
include('auth.php'); // Vérifie si l'utilisateur est connecté
include('dbconnection.php'); // Connexion à la base de données

// Récupérer les statistiques des affiches
try {
    // Total des affiches
    $totalImagesQuery = $pdo->query("SELECT COUNT(*) AS total FROM images");
    $totalImages = $totalImagesQuery->fetch()['total'];

    // Affiche avec le plus de likes
    $mostLikedQuery = $pdo->query("SELECT file, likes FROM images ORDER BY likes DESC LIMIT 1");
    $mostLiked = $mostLikedQuery->fetch();

    // Récupérer toutes les affiches triées par likes
    $imagesQuery = $pdo->query("SELECT * FROM images ORDER BY likes DESC");
    $images = $imagesQuery->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les affiches</title>
    <link rel="stylesheet" href="css/manage.css"> <!-- Feuille de style pour la page de gestion -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Police de caractères -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Bibliothèque pour les graphiques -->
</head>
<body>
    <div class="manage-container">
        <h1>Gérer les affiches</h1>
        <a href="logout.php" class="logout-btn">Se déconnecter</a> <!-- Lien de déconnexion -->

        <!-- Statistiques -->
        <div class="stats">
            <h2>Statistiques</h2>
            <p>Total des affiches : <strong><?php echo $totalImages; ?></strong></p>
            <?php if ($mostLiked): ?>
                <p>Affiche la plus likée : <strong><?php echo htmlspecialchars($mostLiked['file']); ?></strong> avec <strong><?php echo $mostLiked['likes']; ?></strong> likes.</p>
            <?php endif; ?>
        </div>

        <!-- Tableau des affiches -->
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Likes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><img src="images/<?php echo htmlspecialchars($image['file']); ?>" alt="Affiche" width="100"></td>
                        <td><?php echo htmlspecialchars($image['file']); ?></td>
                        <td><?php echo $image['likes']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Graphique -->
        <div class="chart-container" style="width: 80%; margin: 20px auto;">
            <canvas id="likesChart"></canvas>
        </div>
    </div>

    <script>
        // Préparer les données pour le graphique
        const labels = <?php echo json_encode(array_column($images, 'file')); ?>;
        const data = <?php echo json_encode(array_column($images, 'likes')); ?>;

        // Configuration du graphique
        const ctx = document.getElementById('likesChart').getContext('2d');
        const likesChart = new Chart(ctx, {
            type: 'bar', // Type de graphique : barres
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de likes',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>