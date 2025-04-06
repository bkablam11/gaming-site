-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 avr. 2025 à 21:27
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gaming_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(8, 'admin', '$2y$10$G1OvtRY0mDhKPhwlxxVtI.VtZuntvIwZrWF67XcdETM5YxoCED7Pa');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `likes` int(11) DEFAULT 0,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file`, `likes`, `link`) VALUES
(39, 'Call of Duty®_ Ghosts Gold Edition.png', 1, 'https://wa.me/p/8515111731925495/2250502781970'),
(40, 'Call of Duty®_ Infinite Warfare.png', 2, 'https://wa.me/p/9192209400875666/2250502781970'),
(41, 'Call of Duty®_ Vanguard - Standard Edition.png', 1, 'https://wa.me/p/9135390333197155/2250502781970'),
(42, 'Call of Duty®_ WWII - Gold Edition.png', 1, 'https://wa.me/p/8798249733618047/2250502781970'),
(43, 'Crash Bandicoot™ - Crashiversary Bundle.png', 1, 'https://wa.me/p/10008886619141856/2250502781970'),
(44, 'Cyberpunk 2077.png', 0, 'https://wa.me/p/9519064454840531/2250502781970'),
(45, 'Detective Reborn Bundle.png', 0, 'https://wa.me/p/29049408601371193/2250502781970'),
(47, 'Devil May Cry 5 Special Edition.png', 0, 'https://wa.me/p/9167353056709777/2250502781970'),
(48, 'Devil May Cry HD Collection.png', 0, 'https://wa.me/p/9400773876666397/2250502781970'),
(49, 'Dishonored®_ Death of the Outsider™ - Deluxe Bundle.png', 0, 'https://wa.me/p/29001143036197566/2250502781970'),
(50, 'DmC Devil May Cry_ Definitive Edition.png', 0, 'https://wa.me/p/23949960157938744/2250502781970'),
(51, 'DRAGON BALL FighterZ PS4 & PS5.png', 0, 'https://wa.me/p/9544887532236966/2250502781970'),
(52, 'ELDEN RING PS4 & PS5.png', 0, 'https://wa.me/p/9335962983163601/2250502781970'),
(53, 'Forspoken Digital Deluxe Upgrade.png', 0, 'https://wa.me/p/9537910176244332/2250502781970'),
(54, 'Forspoken.png', 0, 'https://wa.me/p/8967611413345096/2250502781970'),
(55, 'Ghostrunner 2.png', 0, 'https://wa.me/p/9890588500973678/2250502781970'),
(57, 'Grand Theft Auto V (PlayStation®5).png', 1, 'https://wa.me/p/9348388485228575/2250502781970'),
(58, 'Grand Theft Auto V_ Premium Edition.png', 0, 'https://wa.me/p/9348388485228575/2250502781970'),
(60, 'JoJos Bizarre Adventure_ All-Star Battle R Deluxe Edition PS4 & PS5.png', 0, 'https://wa.me/p/9494177580643510/2250502781970'),
(61, 'Kingdom Come_ Deliverance - Royal Edition.png', 0, 'https://wa.me/p/9361659907236835/2250502781970'),
(62, 'Life is Strange Remastered Collection.png', 0, 'https://wa.me/p/9788265884564414/2250502781970'),
(63, 'Lords of the Fallen Deluxe Edition.png', 0, 'https://wa.me/p/9726697400710753/2250502781970'),
(65, 'Mass Effect™_ Andromeda – Deluxe Recruit Edition.png', 0, 'https://wa.me/p/24108584828743206/2250502781970'),
(66, 'Metro Saga Bundle.png', 0, 'https://wa.me/p/9443134919055484/2250502781970'),
(67, 'Mortal Kombat™ 1.png', 0, 'https://wa.me/p/9897685836937810/2250502781970'),
(68, 'Murdered_ Soul Suspect™.png', 0, 'https://wa.me/p/9371943786258330/2250502781970'),
(69, 'Life is Strange Remastered Collection.png', 0, 'https://wa.me/p/9788265884564414/2250502781970'),
(70, 'Lords of the Fallen Deluxe Edition.png', 0, 'https://wa.me/p/9726697400710753/2250502781970'),
(72, 'Mass Effect™_ Andromeda – Deluxe Recruit Edition.png', 0, ''),
(73, 'Metro Saga Bundle.png', 0, 'https://wa.me/p/9443134919055484/2250502781970'),
(74, 'Mortal Kombat™ 1.png', 0, 'https://wa.me/p/9897685836937810/2250502781970'),
(75, 'Murdered_ Soul Suspect™.png', 0, 'https://wa.me/p/9371943786258330/2250502781970'),
(76, 'Need for Speed™ Unbound.png', 0, 'https://wa.me/p/9459944977416168/2250502781970'),
(77, 'NHL® 25 Deluxe Edition.png', 0, 'https://wa.me/p/9422426161204258/2250502781970'),
(79, 'Resident Evil 4.png', 0, 'https://wa.me/p/9167744483337882/2250502781970'),
(80, 'Resident Evil Triple Pack.png', 0, 'https://wa.me/p/24113300238260016/2250502781970'),
(82, 'Skyrim Anniversary Edition + Fallout 4 GOTY Bundle.png', 0, 'https://wa.me/p/9529429943839897/2250502781970'),
(83, 'STAR WARS Jedi_ Fallen Order™ Deluxe Edition.png', 0, 'https://wa.me/p/9150849008357441/2250502781970'),
(84, 'Star Wars Outlaws.png', 0, 'https://wa.me/p/28821438914168179/2250502781970'),
(85, 'Sword Art Online_ Fatal Bullet.png', 0, 'https://wa.me/p/9674554055900443/2250502781970'),
(86, 'TEKKEN 7 - Definitive Edition.png', 0, 'https://wa.me/p/9457489877665185/2250502781970'),
(87, 'TEKKEN 7.png', 0, 'https://wa.me/p/9500741506703738/2250502781970'),
(88, 'The Nioh Collection.png', 0, 'https://wa.me/p/9375831549160729/2250502781970'),
(89, 'Life is Strange Remastered Collection.png', 0, 'https://wa.me/p/9788265884564414/2250502781970');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
