-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 mars 2022 à 15:43
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `faq m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `lib_ligue` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `lib_ligue`) VALUES
(1, 'Toutes les ligues'),
(2, 'Ligue de basket'),
(3, 'Ligue de volley'),
(4, 'Ligue de handball'),
(5, 'Ligue de football');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_questions` int(11) NOT NULL,
  `lib_questions` varchar(500) NOT NULL,
  `date_questions` date NOT NULL,
  `reponse` varchar(500) NOT NULL,
  `date_reponse` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `lib_type` varchar(25) NOT NULL,
  `desc_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `lib_type`, `desc_type`) VALUES
(1, 'utilisateur', 'Utilisateur de base'),
(2, 'admin', 'Administrateur de ligue'),
(3, 'superadmin', 'Administateur de toutes les ligues');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo_uti` varchar(15) NOT NULL,
  `mail_uti` varchar(40) NOT NULL,
  `mdp_uti` varchar(255) NOT NULL,
  `id_ligue` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_uti`, `mail_uti`, `mdp_uti`, `id_ligue`, `id_type`) VALUES
(1, 'superadmin', 'superadmin@m2l.fr', '$2y$11$rUmTwcr5XR4wJWpUmsinwuuqu6r3IpOwb6bpMzH4zg3QXlcvmIN/e', 1, 3),
(2, 'adminfoot', 'adminfoot@m2l.fr', '$2y$11$DPzWc/ou3xRDxh9RiRwD7uIQO0wcCJfmpk9LoNjkiISv2dBFeF7a2', 5, 2),
(3, 'adminvolley', 'adminvolley@m2l.fr', '$2y$11$AhO7lIhLz8mybrHlnY2yQOFyZJW0CvgNFFqmkMRJKFqz51EDbmxxm', 3, 2),
(4, 'adminhand', 'adminhand@m2l.fr', '$2y$11$RPwMJUtwiNjZMIO0GNDpheM4tXbkraj6sD.nZNpU6aj639at2UBA2', 4, 2),
(5, 'adminbasket', 'adminbasket@m2l.fr', '$2y$11$2Cn2RBcPkeCeI4lI0hdJkOZ3J79r8afX9k/eNTXQ95WPqnoi3II6e', 2, 2),
(6, 'userfoot1', 'userfoot1@m2l.fr', '$2y$11$qydaVjWLzc8QdlWUaYaaPelfZW9vVseVfH/DZ5uVfYy0Swb2LvPAq', 5, 1),
(7, 'userfoot2', 'userfoot2@m2l.fr', '$2y$11$istRAoVQ47wS9vV0SccUVObs78KnUKZ0IpK72V4bGoyY10qJ1diDa', 5, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_questions`),
  ADD KEY `questions_utilisateur_FK` (`id_utilisateur`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `utilisateur_ligue_FK` (`id_ligue`),
  ADD KEY `utilisateur_type0_FK` (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_questions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_utilisateur_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ligue_FK` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`),
  ADD CONSTRAINT `utilisateur_type0_FK` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;