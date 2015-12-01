-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Novembre 2015 à 11:38
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `webmgsrama`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_consoles`
--

CREATE TABLE IF NOT EXISTS `t_consoles` (
  `id_Console` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Console` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Console`),
  UNIQUE KEY `nom_Console` (`nom_Console`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_disponible`
--

CREATE TABLE IF NOT EXISTS `t_disponible` (
  `id_Jeux` int(11) NOT NULL,
  `id_Console` int(11) NOT NULL,
  PRIMARY KEY (`id_Jeux`,`id_Console`),
  KEY `FK_disponible_id_Console` (`id_Console`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_jeux`
--

CREATE TABLE IF NOT EXISTS `t_jeux` (
  `id_Jeux` int(11) NOT NULL AUTO_INCREMENT,
  `titre_Jeux` varchar(50) NOT NULL,
  `dateSortie_Jeux` date NOT NULL,
  `studio_Jeux` varchar(100) NOT NULL,
  `bo_Jeux` varchar(100) DEFAULT NULL,
  `img_Jeux` varchar(100) DEFAULT NULL,
  `id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_Jeux`),
  KEY `FK_t_Jeux_id_Utilisateur` (`id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `t_utilisateurs` (
  `id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Utilisateur` varchar(50) NOT NULL,
  `prenom_Utilisateur` varchar(50) NOT NULL,
  `pseudo_Utilisateur` varchar(50) NOT NULL,
  `email_Utilisateur` varchar(100) NOT NULL,
  `sha1mdp_Utilisateur` varchar(50) NOT NULL,
  `privilege_Utilisateur` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_Utilisateur`),
  UNIQUE KEY `pseudo_Utilisateur` (`pseudo_Utilisateur`,`email_Utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_Utilisateur`, `nom_Utilisateur`, `prenom_Utilisateur`, `pseudo_Utilisateur`, `email_Utilisateur`, `sha1mdp_Utilisateur`, `privilege_Utilisateur`) VALUES
(1, 'chauche', 'benoit', 'snakeplayer', 'snakeplayer@hotmail.ch', 'swagg', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_disponible`
--
ALTER TABLE `t_disponible`
  ADD CONSTRAINT `FK_disponible_id_Console` FOREIGN KEY (`id_Console`) REFERENCES `t_consoles` (`id_Console`),
  ADD CONSTRAINT `FK_disponible_id_Jeux` FOREIGN KEY (`id_Jeux`) REFERENCES `t_jeux` (`id_Jeux`);

--
-- Contraintes pour la table `t_jeux`
--
ALTER TABLE `t_jeux`
  ADD CONSTRAINT `FK_t_Jeux_id_Utilisateur` FOREIGN KEY (`id_Utilisateur`) REFERENCES `t_utilisateurs` (`id_Utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
