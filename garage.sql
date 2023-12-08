-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 déc. 2023 à 00:36
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_art` int NOT NULL,
  `nom` mediumtext NOT NULL,
  `quantite` int NOT NULL,
  `prix` float NOT NULL,
  `url_photo` longtext NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_stripe` text NOT NULL,
  PRIMARY KEY (`id_art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `nom`, `quantite`, `prix`, `url_photo`, `description`, `id_stripe`) VALUES
(34080129, 'Mercedes A class', 15, 24000, 'https://i.pinimg.com/564x/ca/b0/25/cab025782fcb7a30f6f1e1ae3245b40e.jpg', 'Marque: Mercedes-Benz\n\nModèle: Classe A\n\nAnnée: 2018\n\nKilométrage: 80000-100000 km\n\nCarburant: Diesel\n\nCouleur: Blanche\n\nNombres de places: 5\n\nBoîte de vitesses: Automatique\n\nPuissance DIN: 381 Ch\n\nPermis: Avec permis\n\nPuissance fiscale: 26Cv\n\nType de véhicule: Break\n\nCrit\'Air: 2\n\nOptions:\n\nClimatisation\nEcran de recul\nAirbags latéraux arrière\nPack Confort sièges\nCOMAND Online\nSystème de divertissement arrière\nKEYLESS-GO\nProtection véhicule GUARD 360°\n,etc.', 'price_1OIFZYAxKaki6GC7hZdEdxwO'),
(34080240, 'Mercedes G class', 9, 100000, 'https://i.pinimg.com/564x/58/8e/4d/588e4db1025d889a6d2f9e92628bc15d.jpg\n', 'Marque: Mercedes-Benz\n\nModèle: Classe G\n\nAnnée: 2018\n\nKilométrage: 50000-75000 km\n\nCarburant: Diesel\n\nCouleur: Grise\n\nNombres de places: 5\n\nBoîte de vitesses: Automatique\n\nPuissance DIN: 300 Ch\n\nPermis: Avec permis\n\nPuissance fiscale: 17Cv\n\nType de véhicule: 4x4, SUV, Crossover\n\nCrit\'Air: 2\n\nOptions:\n\nClimatisation\nEcran de recul\nFreinage d\'urgence assisté actif\nChauffage de siège pour conducteur et passager\nSiège avant reglable\nCOMAND Online\nSystème de divertissement arrière\nAvertisseur de franchissement de ligne actif\nProtection véhicule GUARD 360° Plus\n,etc.', 'price_1OIFdwAxKaki6GC7kILTxS2s');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `numero` int NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `id_stripe` text NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `adresse`, `numero`, `mail`, `mdp`, `id_stripe`) VALUES
(1, 'Pinhou', 'toto', 'chez toto', 711223344, 'toto@', '$2y$10$XgPepy5GOnFswgFZmvAcDOfHvIA2KLZ.CR9PVFx7r8z', ''),
(2, 'alvin', 'alvin', 'chez_moi', 711223333, 'alvin@', '$2y$10$bShTL6Php2ll5YFpvr2TNOB12xxpXC25aXGW1WEfb8z', ''),
(3, 'Ingabire', 'Alvin', '357 rue du pont de laverune', 12345678, 'alvin@hot.com', '$2y$10$eSWf1HyefipWT6huddmvt.0JQPu37AxkEwxM.YFLLo6', ''),
(19, 'jenny', 'makurata', '98 av de la liberté', 745452536, 'makurata@gmail.com', '$2y$10$SZiwLa0Gyopr2deJOKGdbOXK6da.U8PyXUg0Q1m1lqf', 'cus_P6SkUOHJh2J3Ta');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `id_art` int NOT NULL,
  `id_client` int NOT NULL,
  `quantite` int NOT NULL,
  `envoi` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_commande`),
  KEY `id_art` (`id_art`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_art`, `id_client`, `quantite`, `envoi`) VALUES
(1, 34080129, 19, 2, 1),
(2, 34080129, 19, 5, 1),
(3, 34080240, 19, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_msg` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `id_client` int NOT NULL,
  `text` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`id_msg`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_msg`, `username`, `id_client`, `text`, `timestamp`) VALUES
(1, 'makurata', 19, 'hellooo', '0000-00-00 00:00:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_art`) REFERENCES `articles` (`id_art`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
