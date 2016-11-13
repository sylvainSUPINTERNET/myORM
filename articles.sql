-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 13 Novembre 2016 à 02:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `orm`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `title` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2147483647 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`title`, `id`, `name`, `contenu`) VALUES
('salut', 2, 'JEAN', 'LE CONTENU DE CHARLES TRES INTERESSANT DS DONC'),
('salut', 3, 'Jean', 'Deuxieme jean article'),
('', 4, 'Jean', 'TROISIEME aritcle  de jean ...'),
('', 7, 'GERARD', 'EKAOZKEKAEOAOE'),
('', 8, 'Eric', 'Deuxieme test d''ajout de contenu via function'),
('', 32, 'salu', 'Mon contenezezezeu lol'),
('', 199, 'salut', 'Mon contenu lol'),
('', 300, 'Leonidas', '300 vs 1000'),
('', 480, 'JolyTest', 'Mon contenu de test'),
('', 489, 'Julien', 'COMME DHAB zeaezaeaeazeNGE'),
('', 500, 'salut', 'Mon contenu lol'),
('', 566, 'Julien', 'eazeazeze');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
