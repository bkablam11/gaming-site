<?php
include('auth.php'); // Vérifie si l'utilisateur est connecté
?>

<?php
// filepath: d:\ProgramFiles\xampp\htdocs\gaming-site\delete.php

include('dbconnection.php');

// Vérifier si une suppression a été demandée
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Récupérer le nom du fichier avant de le supprimer
        $query = $pdo->prepare("SELECT file FROM images WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $image = $query->fetch();

        if ($image) {
            $filePath = 'images/' . $image['file'];

            // Supprimer le fichier du dossier
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Supprimer l'entrée de la base de données
            $deleteQuery = $pdo->prepare("DELETE FROM images WHERE id = :id");
            $deleteQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $deleteQuery->execute();

            $successMessage = "L'affiche a été supprimée avec succès.";
        } else {
            $errorMessage = "Affiche introuvable.";
        }
    } catch (PDOException $e) {
        $errorMessage = "Erreur lors de la suppression : " . $e->getMessage();
    }
}

// Récupérer toutes les affiches pour les afficher
try {
    $query = $pdo->query("SELECT * FROM images");
    $images = $query->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des affiches : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une affiche</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="delete-container">
        <h1>Supprimer une affiche</h1>
<a href="logout.php" class="logout-btn">Se déconnecter</a> <!-- Lien de déconnexion -->
        <?php if (isset($successMessage)): ?>
            <p class="message success"><?php echo $successMessage; ?></p>
        <?php elseif (isset($errorMessage)): ?>
            <p class="message error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><img src="images/<?php echo htmlspecialchars($image['file']); ?>" alt="Affiche" width="100"></td>
                        <td><?php echo htmlspecialchars($image['file']); ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $image['id']; ?>" class="delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette affiche ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>