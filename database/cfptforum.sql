-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 22 Mai 2019 à 14:19
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cfptforum`
--
CREATE DATABASE IF NOT EXISTS `cfptforum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cfptforum`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_article` (`id_article`),
  KEY `id_topic` (`id_topic`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_article`, `id_topic`, `id_user`, `title`, `content`, `creation_date`, `is_active`) VALUES
(45, 1, 1, 'EasyPhp', 'Depuis quelques jours mon Easyphp 14.VC9 ne marche plus, qu&#39;est ce que je dois faire ?', '2019-05-16 14:00:00', 1),
(46, 2, 2, 'PC ~1500 Chf', 'J&#39;aimerais acheter un pc sur Prodimex est-ce que vous pouvez me conseiller ?', '2019-05-16 14:10:00', 1),
(47, 3, 2, 'Github', 'J&#39;ai des problèmes de conflit sur github est-ce que quelqu&#39;un pourrait m&#39;aider ?', '2019-05-16 14:12:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_article`, `content`, `creation_date`) VALUES
(156, 2, 45, 'Tu peux commencer par désinstaller et reinstaller easyphp', '2019-05-16 14:08:00');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title_topic` varchar(100) NOT NULL,
  PRIMARY KEY (`id_topic`),
  UNIQUE KEY `title` (`title_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`id_topic`, `title_topic`) VALUES
(1, 'Bug'),
(2, 'ConfigPC'),
(3, 'Outil');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`, `last_name`, `first_name`, `email`, `password`, `is_admin`, `is_active`) VALUES
(1, 'NeXie', 'Fernandes', 'Marco', 'marco.frnnd2@eduge.ch', 'f6889fc97e14b42dec11a8c183ea791c5465b658', 2, 1),
(2, 'PortenFer', 'Cotture', 'Corentin', 'Corentin.cttr@eduge.ch', 'f6889fc97e14b42dec11a8c183ea791c5465b658', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id_topic`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
