# Gaming Site 🎮

Bienvenue sur **Gaming Site**, une plateforme dédiée à la présentation et à la gestion d'affiches exclusives pour les jeux PS4 et PS5. Ce site offre une expérience utilisateur moderne et interactive, avec des fonctionnalités avancées pour faciliter la navigation, les interactions et la gestion des contenus.

---

## Fonctionnalités 🚀

### 1. **Affichage des affiches de jeux**
- Les affiches sont présentées dans une grille bien organisée, avec des images de haute qualité.
- Chaque affiche est accompagnée d'un bouton "Commander", d'un bouton "Like" et d'un bouton "Dislike".

### 2. **Barre de recherche**
- Permet aux utilisateurs de rechercher des affiches spécifiques par nom.
- Les résultats s'affichent dynamiquement en fonction de la recherche.

### 3. **Zoom sur les images**
- Cliquez sur une image pour l'afficher en plein écran.
- Une fonctionnalité de zoom est intégrée pour examiner les détails des affiches.

### 4. **Système de likes et dislikes**
- Les utilisateurs peuvent liker ou disliker leurs affiches préférées.
- Les affiches ayant le plus de likes sont mises en avant pour les réservations.

### 5. **Gestion des affiches**
- Les administrateurs peuvent ajouter, supprimer ou gérer les affiches via un tableau de bord sécurisé.

### 6. **Responsive Design**
- Le site est entièrement responsive et s'adapte aux écrans d'ordinateurs, tablettes et téléphones.

### 7. **Téléchargement d'images**
- Une page dédiée permet d'uploader de nouvelles affiches via un formulaire sécurisé.

### 8. **Timer de promotions**
- Un compte à rebours affiche le temps restant pour les promotions en cours.

### 9. **Système d'authentification**
- Les administrateurs doivent se connecter pour accéder au tableau de bord et gérer les contenus.

---

## Technologies utilisées 🛠️

### **Frontend**
- **HTML5** : Structure du site.
- **CSS3** : Mise en page moderne avec des dégradés, des animations et un design responsive.
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
   - Importez le fichier `gaming_site.sql` fourni.

4. Configurez la connexion à la base de données :
   - Modifiez le fichier `dbconnection.php` avec vos informations de connexion :
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

## Étapes de création du site 📋

### 1. **Configuration de l'environnement**
- Installez XAMPP et configurez un serveur local.
- Créez une base de données `gaming_site` avec les tables suivantes :

#### Table `images`
- `id` (INT, clé primaire, auto-incrément)
- `file` (VARCHAR)
- `likes` (INT)

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
- **Barre de recherche** : Recherche dynamique des affiches.
- **Zoom sur les images** : Affichage en plein écran avec zoom.
- **Timer de promotions** : Compte à rebours en JavaScript.

---

## Fonctionnalités futures 🌟

- **Système de paiement en ligne** : Intégration de solutions comme PayPal ou Stripe.
- **Système de commentaires** : Permettre aux utilisateurs de laisser des avis sur les affiches.
- **API REST** : Création d'une API pour accéder aux données des affiches.
- **Gestion des utilisateurs** : Ajout d'un système d'authentification pour les clients.

---

## Contribuer 🤝

Les contributions sont les bienvenues ! Si vous souhaitez améliorer ce projet :
1. Forkez le dépôt.
2. Créez une branche pour vos modifications :
   ```bash
   git checkout -b feature/nom-de-la-fonctionnalité
   ```
3. Faites vos modifications et validez-les :
   ```bash
   git commit -m "Ajout de la fonctionnalité X"
   ```
4. Poussez vos modifications :
   ```bash
   git push origin feature/nom-de-la-fonctionnalité
   ```
5. Ouvrez une Pull Request.

---

## Auteur ✍️

- **Nom** :Kablam Edjabrou Ulrich Blanchard
- **Email** : bkablam11@gmail.com
- **GitHub** : github/bkablam11

---

## Licence 📄

Ce projet est sous licence MIT. Vous êtes libre de l'utiliser, de le modifier et de le distribuer.

---

## Aperçu du site 🌐

![Aperçu du site](https://via.placeholder.com/1200x600?text=Aperçu+du+site)
```