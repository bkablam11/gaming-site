-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 avr. 2025 à 21:33
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
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file`, `likes`) VALUES
(33, 'God of War® III Remastered.png', 0),
(34, 'Assassin\'s Creed Valhalla PS4 & PS5.png', 0),
(35, 'Avatar_ Frontiers of Pandora™.png', 0),
(36, 'Battlefield™ 2042 PS4.png', 0),
(37, 'Battlefield™ 2042 PS5.png', 0),
(38, 'Call of Duty®_ Advanced Warfare Gold Edition.png', 0),
(39, 'Call of Duty®_ Ghosts Gold Edition.png', 0),
(40, 'Call of Duty®_ Infinite Warfare.png', 0),
(41, 'Call of Duty®_ Vanguard - Standard Edition.png', 0),
(42, 'Call of Duty®_ WWII - Gold Edition.png', 0),
(43, 'Crash Bandicoot™ - Crashiversary Bundle.png', 0),
(44, 'Cyberpunk 2077.png', 0),
(45, 'Detective Reborn Bundle.png', 0),
(47, 'Devil May Cry 5 Special Edition.png', 0),
(48, 'Devil May Cry HD Collection.png', 0),
(49, 'Dishonored®_ Death of the Outsider™ - Deluxe Bundle.png', 0),
(50, 'DmC Devil May Cry_ Definitive Edition.png', 0),
(51, 'DRAGON BALL FighterZ PS4 & PS5.png', 0),
(52, 'ELDEN RING PS4 & PS5.png', 0),
(53, 'Forspoken Digital Deluxe Upgrade.png', 0),
(54, 'Forspoken.png', 0),
(55, 'Ghostrunner 2.png', 0),
(56, 'God of War® III Remastered.png', 0),
(57, 'Grand Theft Auto V (PlayStation®5).png', 0),
(58, 'Grand Theft Auto V_ Premium Edition.png', 0),
(59, 'Grand Theft Auto_ The Trilogy – The Definitive Edition (PS5 & PS4).png', 0),
(60, 'JoJos Bizarre Adventure_ All-Star Battle R Deluxe Edition PS4 & PS5.png', 0),
(61, 'Kingdom Come_ Deliverance - Royal Edition.png', 0),
(62, 'Life is Strange Remastered Collection.png', 0),
(63, 'Lords of the Fallen Deluxe Edition.png', 0),
(65, 'Mass Effect™_ Andromeda – Deluxe Recruit Edition.png', 0),
(66, 'Metro Saga Bundle.png', 0),
(67, 'Mortal Kombat™ 1.png', 0),
(68, 'Murdered_ Soul Suspect™.png', 0),
(69, 'Life is Strange Remastered Collection.png', 0),
(70, 'Lords of the Fallen Deluxe Edition.png', 0),
(72, 'Mass Effect™_ Andromeda – Deluxe Recruit Edition.png', 0),
(73, 'Metro Saga Bundle.png', 0),
(74, 'Mortal Kombat™ 1.png', 0),
(75, 'Murdered_ Soul Suspect™.png', 0),
(76, 'Need for Speed™ Unbound.png', 0),
(77, 'NHL® 25 Deluxe Edition.png', 0),
(79, 'Resident Evil 4.png', 0),
(80, 'Resident Evil Triple Pack.png', 0),
(81, 'Sifu.png', 0),
(82, 'Skyrim Anniversary Edition + Fallout 4 GOTY Bundle.png', 0),
(83, 'STAR WARS Jedi_ Fallen Order™ Deluxe Edition.png', 0),
(84, 'Star Wars Outlaws.png', 0),
(85, 'Sword Art Online_ Fatal Bullet.png', 0),
(86, 'TEKKEN 7 - Definitive Edition.png', 0),
(87, 'TEKKEN 7.png', 0),
(88, 'The Nioh Collection.png', 0),
(89, 'Life is Strange Remastered Collection.png', 0),
(90, 'Lords of the Fallen Deluxe Edition.png', 0),
(92, 'Mass Effect™_ Andromeda – Deluxe Recruit Edition.png', 0),
(93, 'Metro Saga Bundle.png', 0),
(94, 'Mortal Kombat™ 1.png', 0),
(95, 'Murdered_ Soul Suspect™.png', 0),
(96, 'Need for Speed™ Unbound.png', 0),
(97, 'NHL® 25 Deluxe Edition.png', 0),
(99, 'Resident Evil 4.png', 0),
(100, 'Resident Evil Triple Pack.png', 0),
(101, 'Sifu.png', 0),
(102, 'Skyrim Anniversary Edition + Fallout 4 GOTY Bundle.png', 0),
(103, 'STAR WARS Jedi_ Fallen Order™ Deluxe Edition.png', 0),
(104, 'Star Wars Outlaws.png', 0),
(105, 'Sword Art Online_ Fatal Bullet.png', 0),
(106, 'TEKKEN 7 - Definitive Edition.png', 0),
(108, 'The Nioh Collection.png', 0),
(109, 'Tom Clancy’s Ghost Recon® Wildlands Ultimate Edition.png', 0),
(110, 'Tomb Raider_ Definitive Survivor Trilogy.png', 0),
(111, 'UFC® 5 Ultimate Edition.png', 0),
(112, 'Unravel Yarny Bundle.png', 0),
(113, 'Watch Dogs® 2 - Deluxe Edition.png', 0),
(114, 'Mafia_ Trilogy.png', 0),
(115, 'Red Dead Redemption 2.png', 0),
(117, 'TEKKEN 7.png', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
