-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 10 fév. 2019 à 13:50
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meteonet`
--
CREATE DATABASE IF NOT EXISTS `meteonet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `meteonet`;

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

DROP TABLE IF EXISTS `communes`;
CREATE TABLE `communes` (
  `cp` int(5) NOT NULL,
  `commune` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`cp`, `commune`) VALUES
(31000, 'Toulouse'),
(31500, 'Toulouse'),
(31240, 'Saint-Jean'),
(33000, 'Bordeaux'),
(75001, 'Paris 1'),
(75002, 'Paris 2'),
(75011, 'Paris 11'),
(64100, 'Bayonne');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE `personnes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `cp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `age`, `cp`) VALUES
(1, 'dupond', 'jean', 50, 31500),
(2, 'prost', 'madeleine', 29, 33000),
(3, 'chamond', 'patrick', 44, 75001),
(4, 'duflot', 'bernard', 23, 31500),
(5, 'bost', 'philippe', 28, 31000),
(6, 'bouchitey', 'bernard', 35, 31000),
(7, 'guitraud', 'jean', 51, 31240),
(8, 'balisto', 'joseph', 44, 31000),
(9, 'godounov', 'jean-philippe', 21, 33000),
(10, 'bovis', 'armelle', 45, 0),
(11, 'beaufort', 'eric', 29, 75002),
(13, 'le verrier', 'patrick', 57, 31000),
(14, 'stagg', 'john', 44, 75011),
(15, 'lombez', 'pierre', 28, 31240),
(16, 'caujol', 'denis', 34, 31500),
(17, 'biales', 'denise', 51, 33000),
(18, 'vignon', 'valérie', 28, 31240),
(19, 'lascols', 'eric', 45, 31500),
(20, 'boulet', 'jean', 56, 31000),
(21, 'boucher', 'vincent', 31, 64100),
(22, 'lopez', 'marie', 41, 31500),
(23, 'lopez', 'jean', 31, 31500),
(24, 'van houten', 'sylvie', 28, 75011),
(25, 'sanchez', 'dominique', 44, 31500),
(26, 'nourigat', 'françois', 40, 31240),
(27, 'pierrard', 'magalie', 22, 31500),
(28, 'de hautecloque', 'jean-bernard', 48, 31000),
(29, 'gimenez', 'valérie', 35, 31500),
(30, 'dupond', 'pierre', 26, 64100),
(31, 'allen', 'angelina', 25, 75002),
(32, 'anderson', 'joseph', 64, 33000),
(33, 'bost', 'valérie', 28, 31500);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
