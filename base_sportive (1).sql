-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 mars 2020 à 11:43
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `base_sportive`
--

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

DROP TABLE IF EXISTS `conseil`;
CREATE TABLE IF NOT EXISTS `conseil` (
  `id_conseil` int(11) NOT NULL AUTO_INCREMENT,
  `conseil` varchar(10) NOT NULL,
  PRIMARY KEY (`id_conseil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `id_programme` int(10) NOT NULL AUTO_INCREMENT,
  `type_programme` varchar(30) NOT NULL,
  PRIMARY KEY (`id_programme`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`id_programme`, `type_programme`) VALUES
(1, 'tonic'),
(2, 'intensif'),
(3, 'forme');

-- --------------------------------------------------------

--
-- Structure de la table `programmedesuser`
--

DROP TABLE IF EXISTS `programmedesuser`;
CREATE TABLE IF NOT EXISTS `programmedesuser` (
  `id_user` int(11) NOT NULL,
  `id_programme` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_programme` int(10) NOT NULL,
  `id_programme2` int(11) NOT NULL,
  `pseudo` varchar(10) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `poids` int(11) NOT NULL,
  `taille` float NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `id_programme`, `id_programme2`, `pseudo`, `motdepasse`, `poids`, `taille`) VALUES
(33, 3, 0, 'mathis', '123', 90, 1.92),
(31, 1, 0, 'aa', 'zz', 79, 1.72),
(34, 2, 0, 'florian', 'milk', 75, 1.8),
(45, 3, 0, 'willy', 'ww', 90, 1.92),
(42, 2, 3, 'bro', 'nn', 90, 1.92),
(44, 2, 0, 'drelon', 'ww', 90, 1.92),
(46, 2, 0, 'julia', '123', 50, 1.62);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
