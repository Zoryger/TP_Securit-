-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 avr. 2023 à 22:57
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `securite`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int DEFAULT NULL,
  `otp_time` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_utilisateur`, `mot_de_passe`, `email`, `otp`, `otp_time`) VALUES
(1, 'HoverFox', 'VivienLou*23', 'hoverfox23@gmail.com', 0, 0),
(3, 'HoverFox23', '<script>alert(\"Bonjour, bienvenue sur notre site Web !\");</script>', 'hoverfox23@gmail.com', 0, 0),
(5, 'Zoryger', 'test', 'thibault.debril62@gmail.com', 795361, 1681426274),
(6, 'test', 'test', 'test@test.com', 0, 0),
(7, 'test2', 'test', 'test@test.com', 0, 0),
(8, 'test3', 'Test3', 'test3@gmail.com', 0, 0),
(9, '<script>alert(\"XSS\")</script>', 'test', 'test4@gmail.com', 0, 0),
(10, 'thibault.debril@garetabecane.fr', '<script>alert(\"Bonjour, bienvenue sur notre site Web !\");</script>', 'test@gmail.com', 0, 0),
(11, '<script>alert(\"XSS2\")</script>', 'test', 'test2@test2.com', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
