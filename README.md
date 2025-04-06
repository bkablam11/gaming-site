# Gaming Site 🎮

Bienvenue sur **Gaming Site**, une plateforme interactive dédiée à la gestion et à la présentation d'affiches exclusives pour les jeux vidéo. Ce projet a été conçu pour offrir une expérience utilisateur moderne et intuitive, avec des fonctionnalités avancées pour les utilisateurs et les administrateurs.

---

## Fonctionnalités actuelles 🚀

### 1. **Affichage des affiches de jeux**
- Les affiches sont présentées dans une grille organisée avec des images de haute qualité.
- Chaque affiche est accompagnée de boutons interactifs : "Like", "Dislike" et "Commander".

### 2. **Système de likes et dislikes**
- Les utilisateurs peuvent liker ou disliker leurs affiches préférées.
- Les affiches les plus likées sont mises en avant.

### 3. **Barre de recherche dynamique**
- Permet aux utilisateurs de rechercher des affiches spécifiques par nom.
- Les résultats s'affichent instantanément en fonction de la recherche.

### 4. **Zoom sur les images**
- Les utilisateurs peuvent cliquer sur une image pour l'afficher en plein écran avec une fonctionnalité de zoom.

### 5. **Timer de promotions**
- Un compte à rebours affiche le temps restant pour les promotions en cours.
- Une période de maintenance est prévue entre deux promotions.

### 6. **Gestion des affiches**
- Les administrateurs peuvent ajouter, supprimer ou gérer les affiches via un tableau de bord sécurisé.

### 7. **Système d'authentification**
- Les administrateurs doivent se connecter pour accéder au tableau de bord et gérer les contenus.

### 8. **Téléchargement d'images**
- Une page dédiée permet aux administrateurs d'uploader de nouvelles affiches via un formulaire sécurisé.

### 9. **Responsive Design**
- Le site est entièrement responsive et s'adapte aux écrans d'ordinateurs, tablettes et téléphones.

---

## Technologies utilisées 🛠️

### **Frontend**
- **HTML5** : Structure du site.
- **CSS3** : Mise en page moderne avec animations et design responsive.
- **JavaScript** : Interactions dynamiques comme le zoom sur les images et le timer.

### **Backend**
- **PHP** : Gestion des données et des interactions serveur.
- **MySQL** : Base de données pour stocker les informations des affiches et des administrateurs.

---

## Installation et configuration ⚙️

### 1. **Prérequis**
- Installez [XAMPP](https://www.apachefriends.org/index.html) ou un autre serveur local.
- Assurez-vous que PHP et MySQL sont activés.

### 2. **Installation**
1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/gaming-site.git
   ```
2. Placez le dossier `gaming-site` dans le répertoire `htdocs` de XAMPP.
3. Importez la base de données :
   - Accédez à `http://localhost/phpmyadmin`.
   - Créez une base de données nommée `gaming_site`.
   - Importez le fichier gaming_site.sql fourni.

4. Configurez la connexion à la base de données :
   - Modifiez le fichier dbconnection.php avec vos informations de connexion :
     ```php
     <?php
     $host = 'localhost';
     $user = 'root';
     $password = '';
     $dbname = 'gaming_site';

     try {
         $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } catch (PDOException $e) {
         die("Erreur de connexion : " . $e->getMessage());
     }
     ?>
     ```

### 3. **Lancement**
- Démarrez Apache et MySQL dans le panneau de contrôle XAMPP.
- Accédez au site via `http://localhost/gaming-site`.

---

## Fonctionnalités futures 🌟

### 1. **Système de paiement en ligne**
- Intégration de solutions comme PayPal ou Stripe pour permettre aux utilisateurs de commander des affiches.

### 2. **Système de commentaires**
- Permettre aux utilisateurs de laisser des avis sur les affiches.

### 3. **API REST**
- Création d'une API pour accéder aux données des affiches et permettre une intégration avec d'autres plateformes.

### 4. **Gestion des utilisateurs**
- Ajout d'un système d'authentification pour les clients afin de personnaliser leur expérience.

### 5. **Statistiques avancées**
- Affichage des statistiques sur les likes, dislikes et commandes pour les administrateurs.

---

## Étapes de création du site 📋

### 1. **Configuration de l'environnement**
- Installation de XAMPP et configuration d'un serveur local.
- Création de la base de données `gaming_site` avec les tables suivantes :

#### Table images
- `id` (INT, clé primaire, auto-incrément)
- `file` (VARCHAR)
- `likes` (INT)
- `link` (VARCHAR)

#### Table `admin`
- `id` (INT, clé primaire, auto-incrément)
- `username` (VARCHAR)
- `password` (VARCHAR)

### 2. **Création des pages principales**
- **`index.php`** : Affiche les affiches et permet de rechercher ou liker.
- **`upload.php`** : Permet d'ajouter de nouvelles affiches.
- **`delete.php`** : Permet de supprimer des affiches.
- **`dislike.php`** : Permet de gérer les dislikes.
- **`register.php`** : Permet d'enregistrer un nouvel administrateur.
- **`login.php`** : Permet aux administrateurs de se connecter.

### 3. **Ajout des fonctionnalités**
- Barre de recherche dynamique.
- Zoom sur les images.
- Timer de promotions en JavaScript.

---

## Auteur ✍️

- **Nom** : Kablam Edjabrou Ulrich Blanchard
- **Email** : bkablam11@gmail.com
- **GitHub** : [github/bkablam11](https://github.com/bkablam11)

---

## Licence 📄

Ce projet est sous licence MIT. Vous êtes libre de l'utiliser, de le modifier et de le distribuer.

---

## Aperçu du site 🌐

![Aperçu du site](https://digitalgamesps.com/)
