-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 mai 2020 à 12:56
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
-- Base de données :  `bdd_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `ID_consultation` int(11) NOT NULL AUTO_INCREMENT,
  `Nature` varchar(255) NOT NULL,
  `Indicateur_anxiete` int(11) NOT NULL,
  `ID_patient` int(11) NOT NULL,
  `ID_rendez_vous` int(11) NOT NULL,
  `Prix` int(25) NOT NULL,
  `Methode_paiement` varchar(25) NOT NULL,
  `Commentaire` text NOT NULL,
  PRIMARY KEY (`ID_consultation`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`ID_consultation`, `Nature`, `Indicateur_anxiete`, `ID_patient`, `ID_rendez_vous`, `Prix`, `Methode_paiement`, `Commentaire`) VALUES
(8, 'QUERT', 5, 8, 12, 5, 'espece', 'ZER\r\nZER');

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
  `enregistre` int(11) NOT NULL,
  PRIMARY KEY (`ID_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`ID_patient`, `Nom`, `Prenom`, `Categorie_sociale`, `Email`, `Mot_de_passe`, `Moyen_connaissance`, `role`, `enregistre`) VALUES
(1, 'Cardoso', 'Nicolas ', 'Adulte', 'nicolascardoso99@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Magazine', 0, 1),
(2, 'La Psy', 'Mme ', 'Femme', 'lapsy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'JE SUIS LA PSY', 1, 1),
(3, 'Pablo', 'Pablo ', 'Homme', 'velo.v@test', '81dc9bdb52d04dc20036dbd8313ed055', 'Oui', 0, 1),
(4, 'Noah', 'Alan ', 'Adolescent', 'alannoah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Magazine', 0, 1),
(8, 'Merliot', 'Cedric ', 'Homme', 'cedricmerliot@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Escalade', 0, 1),
(7, 'Briere', 'Lucas ', 'Homme', 'lucasbriere@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Projet', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `ID_profession` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_profession` varchar(255) NOT NULL,
  `ID_patient` int(11) NOT NULL,
  PRIMARY KEY (`ID_profession`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`ID_profession`, `Nom_profession`, `ID_patient`) VALUES
(2, 'Etudiant', 7),
(3, 'Etudiant', 8);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `ID_rendez_vous` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Heure` int(11) NOT NULL,
  `Minute` int(11) NOT NULL,
  `ID_patient` int(11) NOT NULL,
  `Valide` int(11) NOT NULL,
  PRIMARY KEY (`ID_rendez_vous`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`ID_rendez_vous`, `Date`, `Heure`, `Minute`, `ID_patient`, `Valide`) VALUES
(4, '2020-04-24', 11, 30, 1, 1),
(5, '2020-04-25', 16, 30, 1, 1),
(6, '2020-04-23', 18, 0, 1, 1),
(7, '2020-04-29', 18, 30, 1, 1),
(8, '2020-05-01', 12, 30, 1, 1),
(9, '2020-05-01', 14, 0, 1, 1),
(10, '2020-05-08', 10, 0, 1, 1),
(11, '2020-05-28', 16, 30, 7, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
