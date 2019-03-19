-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 jan. 2019 à 19:21
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `mdp`) VALUES
('esbarland', '$2y$10$SAdYIP1BH722.hzDkhszqu/jKJnpRCroOExGIpqrq7UnAzb3755Y6'),
('clallavena', '$2y$10$4a5guky81OAK4/vPmYc3Z.axEP4AUDBgSegxzxKTkXKhrDzc7KXqe'),
('test', '$2y$10$mTV3/1cWbMuxIEzIHjHY1e4qt36LwA/YrBt0OEihxIeOGrKT9srVy');

-- --------------------------------------------------------

--
-- Structure de la table `fluxrss`
--

DROP TABLE IF EXISTS `fluxrss`;
CREATE TABLE IF NOT EXISTS `fluxrss` (
  `site` varchar(100) NOT NULL,
  `lien` varchar(300) NOT NULL,
  PRIMARY KEY (`site`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `guid` varchar(300) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `lien` varchar(300) NOT NULL,
  `datePub` date NOT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `site` varchar(100) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
