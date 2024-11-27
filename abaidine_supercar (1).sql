-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 nov. 2024 à 12:53
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
-- Base de données : `abaidine_supercar`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Admin`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `email`, `login`, `password`) VALUES
(2, 'gordon@gmail.com', 'jim', 'barbara'),
(22, 'alph@tmail.com', 'alphonse', 'edward'),
(28, 'pop@gmail.com', 'im', 'nayeon'),
(29, 'bar@gmail.com', 'gy', 'debesse');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id_client` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `identifiant` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_client`, `nom`, `prenom`, `email`, `identifiant`, `password`, `adresse`, `tel`) VALUES
(14, 'jim', 'carrey', 'jim@gmail.com', 'jimka', 'jiji4r', '15 rue de la rue', '58585858');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id_Contact` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Contact`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demande_essai`
--

DROP TABLE IF EXISTS `demande_essai`;
CREATE TABLE IF NOT EXISTS `demande_essai` (
  `Nom` text COLLATE utf8mb4_general_ci NOT NULL,
  `Date` date NOT NULL,
  `Nom_Voiture` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int NOT NULL AUTO_INCREMENT,
  `libele_marque` text NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int NOT NULL AUTO_INCREMENT,
  `nom_modele` int NOT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `ID_Service` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `recherche` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_Voiture` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Service`),
  KEY `ID_Voiture` (`ID_Voiture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `voiture_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `image_path`, `voiture_name`, `prix`) VALUES
(1, 'uploads/Mercedesbenz.jpg', 'Mercedes Benz', '12000'),
(3, 'uploads/Porchetaycan.jpg', 'Porsche', '11500');

--
-- Déclencheurs `voiture`
--
DROP TRIGGER IF EXISTS `limite_prix_augmente`;
DELIMITER $$
CREATE TRIGGER `limite_prix_augmente` BEFORE INSERT ON `voiture` FOR EACH ROW BEGIN
    DECLARE max_price DECIMAL(10, 2);
    SET max_price = 12000; -- Prix maximum autorisé (20%)

    IF NEW.prix > max_price THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Prix maximum limité à 20% de 10 000';
    END IF;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
