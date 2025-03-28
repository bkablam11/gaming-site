<?php
// Dossier où les images seront enregistrées
$targetDir = "images/";
include('dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $file_name = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = $targetDir . $file_name;

        // Déplacer le fichier téléchargé vers le dossier cible
        if (move_uploaded_file($tempname, $folder)) {
            try {
                // Insérer le nom du fichier dans la base de données
                $query = $pdo->prepare("INSERT INTO images (file) VALUES (:file_name)");
                $query->bindParam(':file_name', $file_name, PDO::PARAM_STR);
                $query->execute();

                $successMessage = "L'image a été téléchargée avec succès et enregistrée dans la base de données.";
            } catch (PDOException $e) {
                $errorMessage = "Erreur lors de l'enregistrement dans la base de données : " . $e->getMessage();
            }
        } else {
            $errorMessage = "Erreur lors du téléchargement de l'image.";
        }
    } else {
        $errorMessage = "Aucun fichier n'a été téléchargé ou une erreur s'est produite.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload d'images</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body class="upload-page">
    <div class="upload-container">
        <h1>Upload d'une image</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="image">Choisissez une image :</label>
            <input type="file" name="image" id="image" accept="image/*" required>
            <button type="submit">Télécharger</button>
        </form>

        <?php if (isset($successMessage)): ?>
            <p class="message success"><?php echo $successMessage; ?></p>
        <?php elseif (isset($errorMessage)): ?>
            <p class="message error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>