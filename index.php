<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Posters - Affiches PS4/PS5</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <img src="logo/logo.png" alt="Gaming Posters Logo" class="logo">
            <h1>Gaming Posters</h1>
            <p>Affiches exclusives pour jeux PS4 et PS5</p>
        </div>
    </header>

    <main>
        <section class="featured-posters">
            <div class="container">
                <h2>Nos dernières créations</h2>
                <form method="GET" action="" class="search-form">
                    <input type="text" name="search" placeholder="Rechercher une affiche..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit">Rechercher</button>
                </form>
                <p id="promo-timer" class="promo-timer">Temps restant pour les promotions : <span id="timer"></span></p>
                <div class="poster-grid">
                    <?php
                    include('dbconnection.php'); // Inclure la connexion à la base de données

                    try {
                        // Vérifier si une recherche a été effectuée
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $resultsFound = false; // Variable pour suivre si des résultats sont trouvés

                        if (!empty($search)) {
                            $query = $pdo->prepare("SELECT * FROM images WHERE file LIKE :search");
                            $query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                            $query->execute();
                        } else {
                            $query = $pdo->query("SELECT * FROM images");
                        }

                        // Afficher les résultats
                        while ($row = $query->fetch()) {
                            $resultsFound = true; // Résultat trouvé
                            ?>
                            <div class="poster-card" style="text-align: center;">
                                <img src="images/<?php echo htmlspecialchars($row['file']); ?>" alt="Image" class="zoomable-image">
                                <h3><?php echo htmlspecialchars(pathinfo($row['file'], PATHINFO_FILENAME)); ?></h3>
                                <div class="actions" style="display: inline-flex; align-items: center; gap: 10px; justify-content: center; margin-top: 10px;">
                                    <a href="https://wa.me/message/M5I2V2YUBTISK1?src=qr&text=<?php echo urlencode('Je souhaite commander : ' . pathinfo($row['file'], PATHINFO_FILENAME)); ?>" class="order-btn">Commander</a>
                                    <button class="like-btn" data-id="<?php echo $row['id']; ?>" style="display: flex; align-items: center;">
                                        <img src="icons/thumb-up-blue.png" alt="Pouce bleu" class="like-icon" style="margin-right: 5px;">
                                        <span class="like-count" id="like-count-<?php echo $row['id']; ?>"><?php echo $row['likes']; ?></span> Likes
                                    </button>
                                </div>
                            </div>
                            <?php
                        }
                        // Si aucun résultat n'est trouvé
                        if (!$resultsFound) {
                            echo '<p class="no-results">L\'article que vous recherchez n\'est pas disponible pour le moment.</p>';
                        }
                    } catch (PDOException $e) {
                        echo "Erreur lors de la récupération des images : " . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Conteneur pour le zoom -->
        <div id="image-zoom-container" class="hidden">
            <span id="close-zoom">&times;</span>
            <img id="zoomed-image" src="" alt="Zoomed Image">
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>Contact: +225 05 02 78 19 70</p>
            <p>© 2025 Gaming Posters. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const likeButtons = document.querySelectorAll('.like-btn');
        likeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const posterId = button.getAttribute('data-id');
                fetch('like.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${posterId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeCount = document.getElementById(`like-count-${posterId}`);
                        likeCount.textContent = data.likes;
                    } else {
                        alert('Erreur lors de l\'ajout du j\'aime.');
                    }
                })
                .catch(error => console.error('Erreur:', error));
            });
        });
    });
    </script>
    <script src="js/script.js"></script>
</body>
</html>