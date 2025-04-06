<?php
session_start();
include('dbconnection.php'); // Inclure la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Vérifier si l'utilisateur a déjà liké cette affiche
    if (!isset($_SESSION['liked'])) {
        $_SESSION['liked'] = [];
    }

    if (in_array($id, $_SESSION['liked'])) {
        echo json_encode(['success' => false, 'error' => 'Vous avez déjà liké cette affiche.']);
        exit;
    }

    try {
        // Incrémenter le nombre de likes
        $query = $pdo->prepare("UPDATE images SET likes = likes + 1 WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        // Ajouter l'ID de l'affiche dans la session
        $_SESSION['liked'][] = $id;

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
