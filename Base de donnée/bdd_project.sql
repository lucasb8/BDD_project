-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 avr. 2020 à 15:23
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `comportement`
--

DROP TABLE IF EXISTS `comportement`;
CREATE TABLE IF NOT EXISTS `comportement` (
  `ID_comportement` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_comportement` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_comportement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `ID_consultation` int(11) NOT NULL AUTO_INCREMENT,
  `Nature` varchar(255) NOT NULL,
  `Indicateur_anxiété` int(11) NOT NULL,
  `ID_patient` int(11) NOT NULL,
  `ID_rendez_vous` int(11) NOT NULL,
  PRIMARY KEY (`ID_consultation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `ID_facture` int(11) NOT NULL AUTO_INCREMENT,
  `Prix` double NOT NULL,
  `Méthode_paiement` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `ID_patient` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Categorie_sociale` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Moyen_connaissance` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`ID_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`ID_patient`, `Nom`, `Prenom`, `Categorie_sociale`, `Email`, `Mot_de_passe`, `Moyen_connaissance`, `role`) VALUES
(1, 'Cardoso', 'Nicolas ', 'Adulte', 'nicolascardoso99@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Magazine', 0);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `ID_profession` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_profession` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_profession`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `ID_rendez_vous` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  PRIMARY KEY (`ID_rendez_vous`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
