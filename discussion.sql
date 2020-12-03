-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 déc. 2020 à 10:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(1, 'azeaze', 11, '2020-12-01 00:00:00'),
(2, 'eaze', 11, '2020-12-01 00:00:00'),
(3, 'bonjour\r\n', 11, '2020-12-01 00:00:00'),
(4, 'bonjour', 11, '2020-12-01 00:00:00'),
(5, 'bonjour', 11, '2020-12-01 00:00:00'),
(6, 'test1', 11, '2020-12-01 00:00:00'),
(7, 'test2', 11, '2020-12-01 00:00:00'),
(8, 'test3', 11, '2020-12-01 00:00:00'),
(9, 'zferfe', 11, '2020-12-02 00:00:00'),
(10, 'rezrzerzerzerzer', 11, '2020-12-02 00:00:00'),
(11, 'bonjour', 11, '2020-12-02 00:00:00'),
(12, 'ergegrerge', 11, '2020-12-02 00:00:00'),
(13, 'erferfer', 11, '2020-12-02 00:00:00'),
(14, 'zfezrfzerfergerg', 11, '2020-12-02 00:00:00'),
(15, 'TEST3\r\n', 11, '2020-12-02 00:00:00'),
(16, 'test bulbe\r\n', 12, '2020-12-02 00:00:00'),
(17, 'test time', 12, '2020-12-02 13:56:02'),
(18, 'test', 12, '2020-12-03 10:40:53');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(11, 'cccc', '$2y$10$XBipX76ONVroT2M7qiYtW.pqtGbM1lgcQLhbkGjjq0YCLhN5gY7le'),
(12, 'yyyz', '$2y$10$/Ah2VebshfbO9MTe90O5OedZzeRQVXxJgKZeE61O9rvyJP/KU0iT2'),
(9, 'aaaa', '$2y$10$lbEwN8kb.rHak3oRsKQXpecdEzyNklWQ3yMKcFpE6n5FA/6u0DRG.'),
(8, 'bbbb', '$2y$10$ARJ/k0dH88dr0.iWvPvUdODiFhIjwvkIK1Jz1aPiJ0blJ80NIEn7S');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
