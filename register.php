<!-- filepath: d:\ProgramFiles\xampp\htdocs\gaming-site\register.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement Admin - Gaming Posters</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="container">
        <h1>Enregistrement Admin</h1>
        <form action="" method="POST" class="register-form">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirmez le mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">S'enregistrer</button>
        </form>

        <p class="switch-page">
            <span class="already-account">Déjà un compte ?</span> <a href="login.php">Connectez-vous ici</a>.
        </p>

        <?php
        include('dbconnection.php'); // Inclure la connexion à la base de données

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Vérifier si les mots de passe correspondent
            if ($password !== $confirm_password) {
                echo '<p class="message error">Les mots de passe ne correspondent pas.</p>';
            } else {
                // Vérifier si le nom d'utilisateur existe déjà
                $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
                $stmt->execute(['username' => $username]);
                $existingAdmin = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($existingAdmin) {
                    echo '<p class="message error">Ce nom d\'utilisateur est déjà pris.</p>';
                } else {
                    // Hacher le mot de passe avant de l'insérer dans la base de données
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insérer le nouvel admin dans la base de données
                    $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
                    $stmt->execute([
                        'username' => $username,
                        'password' => $hashedPassword
                    ]);

                    echo '<p class="message success">Admin enregistré avec succès !</p>';
                }
            }
        }
        ?>
    </div>
</body>
</html>