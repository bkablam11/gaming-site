<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Gaming Posters</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="container">
        <h1>Connexion Admin</h1>
        <form action="" method="POST" class="login-form">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Se connecter</button>
        </form>

        <p class="switch-page">
            <span class="already-account">Pas encore de compte ?</span>  <a href="register.php">Inscrivez-vous ici</a>.
        </p>

        <?php
        session_start();
        include('dbconnection.php');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($password, $admin['password'])) {
                // Connexion réussie
                $_SESSION['admin'] = $admin['username'];
                header('Location: dashboard.php'); // Rediriger vers le tableau de bord
                exit;
            } else {
                echo '<p class="message error">Nom d\'utilisateur ou mot de passe incorrect.</p>';
            }
        }
        ?>
    </div>
</body>
</html>