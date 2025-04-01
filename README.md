# Gaming Site 🎮

Bienvenue sur **Gaming Site**, une plateforme dédiée à la présentation et à la vente d'affiches exclusives pour les jeux PS4 et PS5. Ce site offre une expérience utilisateur moderne et interactive, avec des fonctionnalités telles qu'une barre de recherche, un système de zoom sur les images, et un design attractif.

---

## Fonctionnalités 🚀

- **Affichage des affiches de jeux** : Présentation des affiches dans une grille bien organisée.
- **Barre de recherche** : Permet aux utilisateurs de rechercher des affiches spécifiques par nom.
- **Zoom sur les images** : Cliquez sur une image pour l'afficher en plein écran.
- **Responsive Design** : Le site s'adapte aux écrans d'ordinateurs, tablettes et téléphones.
- **Téléchargement d'images** : Une page dédiée pour uploader de nouvelles affiches.
- **Timer de promotions** : Affiche un compte à rebours pour les promotions en cours.

---

## Technologies utilisées 🛠️

- **Frontend** :
  - HTML5
  - CSS3 (avec des dégradés, des animations et un design moderne)
  - JavaScript (pour les interactions comme le zoom et le timer)

- **Backend** :
  - PHP (pour la gestion des données et des interactions serveur)
  - MySQL (pour la base de données des affiches)

---

## Étapes de création du site web 📋

### 1. Configuration de l'environnement de développement
- Installez [XAMPP](https://www.apachefriends.org/index.html) pour configurer un serveur local.
- Démarrez Apache et MySQL dans le panneau de contrôle XAMPP.
- Créez un dossier `gaming-site` dans le répertoire `htdocs`.

### 2. Création de la première page
- Créez un fichier `index.php` dans le dossier `gaming-site`.
- Ajoutez une structure HTML de base et incluez un titre et une description du site.

```php
<!-- Exemple de code pour index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Gaming Site</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Bienvenue sur Gaming Site</h1>
<p>Découvrez nos affiches exclusives pour PS4 et PS5.</p>
</body>
</html>
```

### 3. Mise en place de la base de données
- Accédez à `http://localhost/phpmyadmin` et créez une base de données nommée `gaming_site`.
- Ajoutez une table `posters` avec les colonnes suivantes :
  - `id` (INT, clé primaire, auto-incrément)
  - `name` (VARCHAR)
  - `image` (VARCHAR)
  - `price` (FLOAT)

### 4. Connexion à la base de données
- Créez un fichier `db.php` pour gérer la connexion à la base de données.

```php
<!-- Exemple de code pour db.php -->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'gaming_site';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
```

### 5. Affichage des affiches
- Modifiez `index.php` pour récupérer et afficher les affiches depuis la base de données.

```php
<!-- Exemple de code pour afficher les affiches -->
<?php
include 'db.php';
$result = $conn->query("SELECT * FROM posters");
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<img src='uploads/" . $row['image'] . "' alt='" . $row['name'] . "'>";
    echo "<p>" . $row['name'] . " - $" . $row['price'] . "</p>";
    echo "</div>";
}
?>
```

### 6. Ajout de fonctionnalités supplémentaires
- **Barre de recherche** : Ajoutez un formulaire pour rechercher des affiches par nom.
- **Téléchargement d'images** : Créez une page `upload.php` pour permettre l'ajout de nouvelles affiches.
- **Timer de promotions** : Ajoutez un script JavaScript pour afficher un compte à rebours.

### 7. Déploiement sur l'hébergeur
- Inscrivez-vous sur [InfinityFree](https://infinityfree.net/) ou un autre hébergeur gratuit.
- Téléversez les fichiers du site via un client FTP comme FileZilla.
- Importez la base de données `gaming_site` via phpMyAdmin sur l'hébergeur.
- Configurez les paramètres de connexion à la base de données dans `db.php` pour correspondre à ceux de l'hébergeur.

### 8. Accès au site
- Votre site est maintenant accessible à l'adresse : [http://digitalgamesps.rf.gd](http://digitalgamesps.rf.gd).

---

## Installation et configuration ⚙️

1. **Clonez le dépôt** :
   ```bash
   git clone https://github.com/votre-utilisateur/gaming-site.git
   ```
2. **Configurez la base de données** :
   - Importez le fichier `gaming_site.sql` dans phpMyAdmin.
3. **Lancez le serveur local** :
   - Placez le dossier dans `htdocs` et accédez à `http://localhost/gaming-site`.

---

## Améliorations futures 🌟
- Intégration d'un système de paiement en ligne.
- Ajout d'un système de commentaires pour les utilisateurs.
- Création d'une API REST pour les affiches.

