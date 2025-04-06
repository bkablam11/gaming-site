<?php
include('auth.php'); // Vérifie si l'utilisateur est connecté
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer les Likes - Gaming Posters</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <h1>Supprimer les Likes</h1>
            <span class="already-account">Gérez les likes de vos affiches préférées</span> 
            <a href="logout.php" class="logout-btn">Se déconnecter</a> <!-- Lien de déconnexion -->
        </div>
    </header>

    <main>
        <section class="featured-posters">
            <div class="container">
                <h2>Affiches disponibles</h2>
                <div class="poster-grid">
                    <?php
                    include('dbconnection.php'); // Inclure la connexion à la base de données

                    try {
                        // Charger les images depuis la base de données
                        $query = $pdo->query("SELECT id, file, likes FROM images");
                        $images = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($images as $image) {
                            ?>
                            <div class="poster-card">
                                <img src="images/<?php echo htmlspecialchars($image['file']); ?>" alt="Image">
                                <h3><?php echo htmlspecialchars(pathinfo($image['file'], PATHINFO_FILENAME)); ?></h3>
                                <p>Likes : <span id="like-count-<?php echo $image['id']; ?>"><?php echo htmlspecialchars($image['likes']); ?></span></p>
                                <form action="dislike_action.php" method="POST" class="dislike-form">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($image['id']); ?>">
                                    <button type="submit" class="dislike-btn">
                                        <img src="icons/thumbs-down.png" alt="Dislike">
                                    </button>
                                </form>
                            </div>
                            <?php
                        }
                    } catch (PDOException $e) {
                        echo '<p class="no-results">Erreur lors du chargement des images : ' . htmlspecialchars($e->getMessage()) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>© 2025 Gaming Posters. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const dislikeForms = document.querySelectorAll('.dislike-form');
        dislikeForms.forEach(form => {
            form.addEventListener('submit', event => {
                event.preventDefault();
                const formData = new FormData(form);
                fetch('dislike_action.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeCount = document.getElementById(`like-count-${data.id}`);
                        likeCount.textContent = data.likes;
                    } else {
                        alert(data.message || 'Erreur lors de la suppression du like.');
                    }
                })
                .catch(error => console.error('Erreur:', error));
            });
        });
    });
    </script>
</body>
</html>