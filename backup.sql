-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 08 août 2022 à 17:23
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TRT Conseil`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `type`) VALUES
(2, 'Trt_admin', 'bc38wMgPlFZ0g', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `apply_offers`
--

CREATE TABLE `apply_offers` (
  `id` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidate`
--

INSERT INTO `candidate` (`id`, `login`, `firstname`, `lastname`, `email`, `password`, `cv`, `type`, `approved`) VALUES
(2, 'Testuser', 'Test', 'User', 'test-user@domain.com', '$2y$10$9hg210uNxsWXWx0C6rqrzOdoVuYBwt5OkYdO6hgqX72ZD7l3in71i', 'CV-Testuser.pdf', 'candidate', 1);

-- --------------------------------------------------------

--
-- Structure de la table `consultant`
--

CREATE TABLE `consultant` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'consultant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consultant`
--

INSERT INTO `consultant` (`id`, `login`, `password`, `type`) VALUES
(3, 'consultant', '$2y$10$Vh4BbMP3yqs0PNWujRX1BeR7HzZOHmoqh4RM0zm62MTemB8AM.Y56', 'consultant');

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `details` text,
  `location` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `login_author` varchar(100) DEFAULT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `details`, `location`, `salary`, `id_author`, `login_author`, `approved`) VALUES
(15, 'Cuisinier', 'Besoin d\'un cuisinier pour un restaurant lyonnais', NULL, 'Lyon', '36 000/an', 3, 'jtuder', 1),
(20, 'Serveur au campus Google', 'Besoin d\'un serveur pour la cantine du campus Google', 'Google est une des entreprises numéro 1 dans le domaine d\'internet et des nouvelles technologie.<br />\r\n<br />\r\nSon site Français se trouvant à Paris est constitué de divers restaurants pour ses salariés.<br />\r\n<br />\r\nNous recherchons un serveur pour servir les salariés dans ces différents restaurants.', 'Paris', '36 000/an', 11, 'Google', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recruiter`
--

CREATE TABLE `recruiter` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `society` varchar(255) DEFAULT NULL,
  `address` text,
  `type` varchar(20) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recruiter`
--

INSERT INTO `recruiter` (`id`, `login`, `email`, `password`, `society`, `address`, `type`, `approved`) VALUES
(10, 'test', 'test@test.fr', '$2y$10$1dPoBxhecYxoWcYR3Au7juoVU0MZ/dKmVw5THeiUKc0vpdc83Lf5y', 'Test & Co', '2 rue du test\r\n92000 Boulogne-billancourt', 'recruiter', 1),
(11, 'Google', 'google@gmail.com', '$2y$10$hlTocnoUC9dctsMEShxyN.GuxZXM0WUDV7FCFkHXIoUhuwwR0r7uS', NULL, NULL, 'recruiter', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apply_offers`
--
ALTER TABLE `apply_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_candidate` (`id_candidate`),
  ADD KEY `id_offer` (`id_offer`);

--
-- Index pour la table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recruiter`
--
ALTER TABLE `recruiter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `apply_offers`
--
ALTER TABLE `apply_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `consultant`
--
ALTER TABLE `consultant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `recruiter`
--
ALTER TABLE `recruiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apply_offers`
--
ALTER TABLE `apply_offers`
  ADD CONSTRAINT `apply_offers_ibfk_1` FOREIGN KEY (`id_candidate`) REFERENCES `candidate` (`id`),
  ADD CONSTRAINT `apply_offers_ibfk_2` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
