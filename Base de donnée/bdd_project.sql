-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 31 mai 2020 à 10:26
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
  `ID_invite1` int(11) DEFAULT NULL,
  `ID_invite2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_consultation`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`ID_consultation`, `Nature`, `Indicateur_anxiete`, `ID_patient`, `ID_rendez_vous`, `Prix`, `Methode_paiement`, `Commentaire`, `ID_invite1`, `ID_invite2`) VALUES
(11, 'RÃ©union Projet', 8, 7, 11, 42, 'Carte bleue', 'Tentative 1', 0, 0),
(10, 'Nouvelle Ã  rediger', 3, 1, 9, 2, 'EspÃ¨ce', 'Aucune idÃ©e de scenario', 0, 0),
(12, 'Fin de Semestre', 10, 1, 15, 15, 'ChÃ¨que', 'On attend les notes', 8, 7);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`ID_patient`, `Nom`, `Prenom`, `Categorie_sociale`, `Email`, `Mot_de_passe`, `Moyen_connaissance`, `role`, `enregistre`) VALUES
(1, 'Cardoso', 'Nicolas ', 'Homme', 'nicolascardoso99@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Magazine', 0, 1),
(2, 'La Psy', 'Mme ', 'Femme', 'lapsy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'JE SUIS LA PSY', 1, 1),
(10, 'Valverde', 'Ernesto ', 'Homme', 'ernestovalverde@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Staff Sportif', 0, 1),
(11, 'Cardoso', 'Lucas ', 'Adolescent', 'lucascardoso@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mon grand frÃ¨re', 0, 1),
(8, 'Merliot', 'Cedric ', 'Homme', 'cedricmerliot@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Escalade', 0, 1),
(7, 'Briere', 'Lucas ', 'Homme', 'lucasbriere@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Projet', 0, 1),
(12, 'Cardoso', 'Carlos ', 'Homme', 'carloscardoso@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mon fils', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `ID_profession` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_profession` varchar(255) NOT NULL,
  `ID_patient` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID_profession`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`ID_profession`, `Nom_profession`, `ID_patient`, `Date`) VALUES
(7, 'Cyliste', 1, '2020-05-04'),
(8, 'Etudiant', 1, '2020-05-25'),
(9, 'Docteur', 1, '2020-05-28'),
(10, 'Rugbyman', 11, '2020-05-30'),
(11, 'Joueur de Jeux-VidÃ©o', 8, '2020-05-30'),
(12, 'IngÃ©nieur', 8, '2020-05-31'),
(13, 'IngÃ©nieur', 7, '2020-05-30'),
(14, 'Consultant', 12, '2020-05-30'),
(15, 'Docteur', 2, '2020-05-30'),
(16, 'Joueur ESport', 1, '2020-05-30'),
(17, 'Coach Sportif', 10, '2020-05-30');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(11, '2020-05-28', 16, 30, 7, 1),
(14, '2020-06-10', 18, 0, 1, 1),
(13, '2020-06-01', 15, 0, 7, 1),
(15, '2020-06-03', 17, 30, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
