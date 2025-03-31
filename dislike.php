<?php
include('dbconnection.php'); // Inclure la connexion à la base de données

// Vérifier si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        try {
            // Réduire le nombre de likes de l'image donnée
            $query = $pdo->prepare("UPDATE images SET likes = GREATEST(likes - 1, 0) WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            // Récupérer le nouveau nombre de likes
            $query = $pdo->prepare("SELECT likes FROM images WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $likes = $query->fetchColumn();

            echo json_encode(['success' => true, 'likes' => $likes, 'message' => 'Le like a été supprimé avec succès par l\'administrateur.']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID invalide.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requête non autorisée.']);
}
?>
