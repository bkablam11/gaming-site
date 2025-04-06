<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Posters - Affiches PS4/PS5</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body class="index-page">
    <header class="main-header index-header">
        <div class="container">
            <img src="logo/logo.png" alt="Gaming Posters Logo" class="logo">
            <h1>Digital Games PS+</h1>
            <p class="subtitle">Affiches exclusives pour jeux PS4 et PS5</p>
        </div>
    </header>

    <!-- Section "Comment commander ?" mise en haut -->
    <section class="how-to-order">
        <div class="container">
            <h2>Comment commander ?</h2>
            <ol>
                <li>Enregistrez le numéro <strong>DIGITAL GAMES</strong> : <a href="tel:+2250502781970">+225 05 02 78 19 70</a>.</li>
                <li>Cliquez sur le bouton <strong>Commander</strong> pour envoyer un message au numéro DIGITAL GAMES avec le jeu choisi.</li>
                <li>Vous pouvez également <strong>liker</strong> les jeux que vous souhaitez acheter plus tard. Les jeux ayant le plus de likes seront priorisés pour les réservations.</li>
            </ol>
        </div>
    </section>

    <main>
        <section class="featured-posters">
            <div class="container">
                <h2>Nos dernières créations</h2>
                <form method="GET" action="" class="search-form">
                    <input type="text" name="search" placeholder="Rechercher une affiche..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit">Rechercher</button>
                </form>
                <p id="promo-timer" class="promo-timer"><span id="timer"></span></p>
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
                                    <a href="<?php echo htmlspecialchars($row['link']); ?>" class="order-btn">Commander</a>
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
            <p class="subtitle">Contact: +225 05 02 78 19 70</p>
            <p  class="subtitle">© 2025 Gaming Posters. Tous droits réservés.</p>
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
                        alert('Désolé, vous avez déjà liké cette image.');
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