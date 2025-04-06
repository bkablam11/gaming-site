<?php
include('auth.php'); // Vérifie si l'utilisateur est connecté
?>

<?php
// Dossier où les images seront enregistrées
$targetDir = "images/";
include('dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si des fichiers ont été téléchargés
    if (isset($_FILES["images"]) && count($_FILES["images"]["name"]) > 0) {
        $successMessage = "";
        $errorMessage = "";

        foreach ($_FILES["images"]["name"] as $key => $file_name) {
            $tempname = $_FILES["images"]["tmp_name"][$key];
            $folder = $targetDir . $file_name;

            // Déplacer le fichier téléchargé vers le dossier cible
            if (move_uploaded_file($tempname, $folder)) {
                try {
                    // Insérer le nom du fichier dans la base de données
                    $query = $pdo->prepare("INSERT INTO images (file) VALUES (:file_name)");
                    $query->bindParam(':file_name', $file_name, PDO::PARAM_STR);
                    $query->execute();

                    $successMessage .= "L'image $file_name a été téléchargée avec succès et enregistrée dans la base de données.<br>";
                } catch (PDOException $e) {
                    $errorMessage .= "Erreur lors de l'enregistrement de l'image $file_name dans la base de données : " . $e->getMessage() . "<br>";
                }
            } else {
                $errorMessage .= "Erreur lors du téléchargement de l'image $file_name.<br>";
            }
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
        <img src="logo/logo.png" alt="Gaming Logo" class="logo">
        <h1>Upload d'images</h1>
        <a href="logout.php" class="logout-btn">Se déconnecter</a> <!-- Lien de déconnexion -->
        <p>Ajoutez des images de vos jeux PS4 et PS5 préférés avec une description.</p>
        <form method="POST" enctype="multipart/form-data">
            <label for="images">Choisissez des images :</label>
            <input type="file" name="images[]" id="images" accept="image/*" multiple required>
            <button type="submit">Télécharger</button>
        </form>

        <?php if (isset($successMessage) && !empty($successMessage)): ?>
            <p class="message success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if (isset($errorMessage) && !empty($errorMessage)): ?>
            <p class="message error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>