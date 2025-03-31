<?php
include('dbconnection.php'); // Inclure la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    try {
        // Incrémenter le nombre de likes
        $query = $pdo->prepare("UPDATE images SET likes = likes + 1 WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        // Récupérer le nouveau nombre de likes
        $query = $pdo->prepare("SELECT likes FROM images WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $likes = $query->fetchColumn();

        echo json_encode(['success' => true, 'likes' => $likes]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Requête invalide.']);
}
?>
