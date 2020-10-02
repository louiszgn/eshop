-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Ven 02 oct. 2020 à 14:28
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cat 1'),
(2, 'Cat 2'),
(3, 'Cat 3'),
(4, 'Cat 4');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_article`, `content`) VALUES
(1, 1, 2, 'Du lourd !!');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `id_user`, `id_category`, `title`, `price`, `description`) VALUES
(1, 2, 1, 'titre1', '10', 'description1'),
(2, 3, 2, 'titre2', '25', 'description2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `pwd` text NOT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `pwd`, `statut`) VALUES
(1, 'admin', 'admin@localhost.com', '$2y$10$to53rpLeQJMpgtETQLfNzu/WYdwSZqiolWufJvFsMUl82sZPlCiCK', 1),
(2, 'Bob Lover', 'boblover@test.com', '$2y$10$Ifb0l/9qFWakrJ.094JQZu5u7vulr0GJPFZ1kR7qFMU.5pcG8pBoe', 0),
(3, 'Sqipili', 'sqipili@test.com', '$2y$10$nbQctjK.MHi8liAdltLylOk3MnLvyKvvcQ2RRjUfMNV2UBt36t.Am', 0),
(4, 'Squalala', 'squalala@test.com', '$2y$10$ypbgPIZtnJa3qCB/f5F7w.WH64p7l9dL1LKHYFqDgAeK7XkxA2i.2', 0),
(5, 'Yeah', 'yeah@test.com', '$2y$10$xXLyUvtPo/FjEl2072PhT.NPfeS30VjNmXFpPjFZJWzbnuIkWrboS', 0),
(6, 'Akhi', 'akhi@test.com', '$2y$10$fS0miullwDly1zrQwXgnbuW2NExVQt/7YxJWVtBbeHuxvbQHpA4Lu', 0),
(7, 'Bobby', 'bobby@test.com', '$2y$10$eYWG8fmb0Sokozw4r6DBVuvircI1.Zd/Yq3k4tiGaMk/ZpKBmbAxK', 0),
(8, 'Skali', 'skali@test.com', '$2y$10$3e9GuEX5.TlWk.aB2sgWVeM1iHPzkSUp1XPakJ4hgjhvGC9Q7yVl.', 0),
(9, 'Falzar', 'falzar@test.com', '$2y$10$FiPyM5dBp9m/gLmt7P1aQ.hWiQ5LE3uU83Ioq.btSXBTYHTmU3bZ2', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
