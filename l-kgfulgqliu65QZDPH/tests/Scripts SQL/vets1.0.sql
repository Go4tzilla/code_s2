-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 août 2018 à 16:24
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `veterinaires`
--
CREATE SCHEMA `veterinaires`;

USE `veterinaires`;
-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(50) NOT NULL,
  `type` enum('consult','consult_spe','surgery') NOT NULL DEFAULT 'consult',
  `vet_init` varchar(4) NOT NULL,
  `room` enum('1','2','3','4') NOT NULL,
  `start` time NOT NULL,
  `app_day` date NOT NULL,
  `canceled` enum('y','n') DEFAULT 'n',
  `vets_ID` int(11) NOT NULL,
  `patients_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `vet_init` (`vet_init`),
  KEY `start` (`start`),
  KEY `vets_ID` (`vets_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`ID`, `details`, `type`, `vet_init`, `room`, `start`, `app_day`, `canceled`, `vets_ID`, `patients_ID`) VALUES
(36, '', 'consult', 'HA', '1', '15:00:00', '2018-08-21', 'n', 8, 58),
(37, '', 'consult', 'EH', '1', '14:00:00', '2018-08-23', 'n', 6, 59),
(38, '', 'consult', 'HA', '1', '15:00:00', '2018-08-28', 'n', 8, 59),
(39, '', 'consult', 'EH', '1', '13:00:00', '2018-08-30', 'y', 6, 51),
(40, '', 'consult', 'EH', '1', '15:00:00', '2018-08-23', 'y', 6, 50);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `postal_code` varchar(150) NOT NULL,
  `city` varchar(45) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `users_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email_2` (`email`),
  KEY `fk_clients_users1_idx` (`users_ID`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1052 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ID`, `email`, `last_name`, `first_name`, `address`, `postal_code`, `city`, `phone_number`, `users_ID`) VALUES
(1007, 'p.mercier.h@gmail.com', 'Mercier-Handisyde', 'Paul', '10 rue Coquillière', '75001', 'Paris', '0626046045', 38),
(1036, 'rick_and_morty@gmail.com', 'Bennaceur', 'Sid', '101, rue des acquevilles', '92150', 'Suresnes', '0612121212', 99),
(1043, 'zouzoutte@gmail.com', 'Amororo', 'Sid', '101, rue des acquevilles', '92150', 'Suresnes', '0809090909', 118),
(1044, 'client2@gmail.com', 'Sid', 'Bennaceur', '101, rue Gorgonzola', '98125', 'Ici et ailleurs', '0800000000', 119),
(1045, 'client3@gmail.com', 'Bee', 'Sid', '90, rue des Atrebates', '62300', 'Lens', '0606000000', 120),
(1046, 'client4@gmail.com', 'lou', 'Lou', '12, rue de moi', '90000', 'Arras', '0900000000', 121);

-- --------------------------------------------------------

--
-- Structure de la table `clients_has_patients`
--

DROP TABLE IF EXISTS `clients_has_patients`;
CREATE TABLE IF NOT EXISTS `clients_has_patients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `clients_ID` int(11) NOT NULL,
  `patients_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_clients_has_patients_patients1_idx` (`patients_ID`),
  KEY `fk_clients_has_patients_clients1_idx` (`clients_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients_has_patients`
--

INSERT INTO `clients_has_patients` (`ID`, `clients_ID`, `patients_ID`) VALUES
(8, 38, 24),
(9, 38, 26),
(10, 38, 27),
(12, 72, 30),
(13, 99, 32),
(14, 99, 32),
(15, 99, 39),
(16, 99, 40),
(17, 99, 41),
(18, 99, 42),
(19, 99, 43),
(20, 99, 44),
(21, 99, 45),
(22, 99, 46),
(23, 99, 47),
(24, 99, 48),
(25, 99, 49),
(26, 99, 50),
(27, 99, 51),
(28, 99, 52),
(29, 114, 53),
(30, 114, 54),
(31, 99, 55),
(32, 99, 56),
(33, 99, 57),
(34, 1044, 58),
(35, 1044, 59),
(36, 119, 60),
(37, 1045, 61),
(38, 99, 62),
(39, 99, 63),
(40, 99, 64),
(41, 123, 65);

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
CREATE TABLE IF NOT EXISTS `consultations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL,
  `vet` varchar(10) DEFAULT NULL,
  `reason` varchar(100) NOT NULL,
  `exam` longtext,
  `room` smallint(3) DEFAULT NULL,
  `diagnosis` varchar(100) DEFAULT 'Open',
  `treatment` longtext,
  `weight` float(7,2) DEFAULT NULL,
  `notes` longtext,
  `patients_ID` int(11) NOT NULL,
  `vets_ID` int(6) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_consultations_patients1_idx` (`patients_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consultations`
--

INSERT INTO `consultations` (`ID`, `date`, `vet`, `reason`, `exam`, `room`, `diagnosis`, `treatment`, `weight`, `notes`, `patients_ID`, `vets_ID`) VALUES
(1, '2018-07-31 22:00:00', 'EH', 'Grippe', 'Calcul du pouls, vérification des bronches, des yeux, du pelage.', 4, 'Une bonne semaine de repos et des médics', 'Paracétamol codéïné', 12.30, 'Pelage peu brillant', 50, 0),
(2, '2018-07-31 22:00:00', 'EH', 'dsqdsqdsq', 'dsqdqd dsqds', 6, 'dsqd ds q', 'dsdqd dsqds ', 0.00, 'dsqdsqd dsqd qd', 48, 6),
(3, '2018-07-31 22:00:00', 'EH', 'dsqds', 'dsqdq', 3, 'dsqd', 'dsqdsq', 0.00, 'dsqdq', 50, 0),
(4, '2018-07-31 22:00:00', 'EH', '', '', 0, '', '', 0.00, '', 48, 6),
(5, '2018-07-31 22:00:00', 'EH', '', '', 0, '', '', 0.00, '', 50, 0),
(6, '2018-07-31 22:00:00', 'EH', 'dsqsq', '', 0, '', '', 0.00, 'dsqdqs dsqd', 50, 0),
(7, '2018-07-31 22:00:00', 'EH', 'dsqdqs', '', 0, '', '', 0.00, '', 50, 0),
(8, '2018-08-01 00:12:49', 'EH', 'dsqdsq', 'dsqd', 1, 'dsqd', 'dsqdqs', 0.00, 'trololo', 50, 0),
(9, '2018-08-01 00:20:05', 'EH', 'Il se morfond', 'Aucun', 2, 'Aucun', 'Aucun', 0.00, 'Zizi', 50, 0),
(10, '2018-08-01 00:29:07', 'EH', 'louliloul', 'louliloul', 0, 'louliloul', 'louliloul', 3.00, 'louliloul', 50, 0),
(11, '2018-08-01 00:35:24', 'EH', 'louliloul123', 'louliloul', 3, 'louliloul', 'louliloul', 123.00, 'louliloul', 50, 6),
(12, '2018-08-01 00:37:29', 'EH', 'ROUGE', 'ROUGE', 1, 'ROUGE', 'ROUGE', 98.00, 'ROUGE', 50, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sent_to` varchar(255) NOT NULL,
  `sent_by` char(64) NOT NULL,
  `content` longtext NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`ID`, `sent_to`, `sent_by`, `content`, `dates`) VALUES
(58, 'vet1@gmail.com', 'vet1@gmail.com', 'blabla?', '2018-06-21 03:26:07'),
(59, 'shakazoulou@gmail.com', 'vet1@gmail.com', 'fsfsfsfsdfqDdqs', '2018-06-21 09:26:22'),
(61, 'shakazoulou@gmail.com', 'shakazoulou@gmail.com', 'Oui maman', '2018-06-21 09:38:44'),
(62, 'shakazoulou@gmail.com', 'shakazoulou@gmail.com', 'dqds qdsqd qdq dztretretretre', '2018-06-21 09:47:45'),
(63, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'bliblablou', '2018-06-21 11:24:44'),
(75, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'I love programming', '2018-06-21 12:42:46'),
(76, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dqdsq sddqsd q', '2018-06-21 12:57:00'),
(77, 'vet2@gmail.com', 'vet1@gmail.com', 'Salut confrère', '2018-06-21 19:13:33'),
(78, 'vet2@gmail.com', 'vet1@gmail.com', 'Me revoila pour un nouveau test', '2018-06-21 19:15:05'),
(79, 'vet2@gmail.com', 'vet1@gmail.com', 'sasasa', '2018-06-21 19:15:14'),
(80, 'p.mercier.h@gmail.com', 'vet1@gmail.com', 'Serait-il possible dannuler le rdv?', '2018-07-29 06:31:01'),
(81, 'shakazoulou@gmail.com', 'vet1@gmail.com', 'dsqdqdsqdqs', '2018-07-29 06:32:46'),
(82, 'vet2@gmail.com', 'vet1@gmail.com', 'oéoéoé', '2018-07-29 06:33:10'),
(83, 'p.mercier.h@gmail.com', 'vet1@gmail.com', 'dsdsqdsqdsqdsq ds dsq', '2018-07-29 06:40:28'),
(84, 'vet2@gmail.com', 'vet1@gmail.com', 'Jentends le loup, le renard et la belette', '2018-07-29 06:48:41'),
(85, 'shakazoulou@gmail.com', 'vet1@gmail.com', 'dsqdsdqsd dsds qdqsd sqfsfsd ', '2018-07-29 06:52:03'),
(86, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdsd dsd f dsf s dsq d', '2018-07-29 06:53:13'),
(87, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdsq dsqds dsqd ', '2018-07-29 06:54:06'),
(88, 'vet2@gmail.com', 'vet1@gmail.com', 'dsq gfght ', '2018-07-29 07:00:16'),
(89, 'vet2@gmail.com', 'vet1@gmail.com', 'dsdsq dsqd d sq fds ', '2018-07-29 07:00:51'),
(90, 'vet2@gmail.com', 'vet1@gmail.com', 'dtresiea', '2018-07-29 07:02:45'),
(91, 'vet2@gmail.com', 'vet1@gmail.com', '', '2018-07-29 08:50:25'),
(92, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdsq dsqd ds tre', '2018-07-29 09:20:03'),
(93, 'vet2@gmail.com', 'vet1@gmail.com', 'COUCOU ANNE? TU VEUX VOIR MON SITE?', '2018-07-29 09:22:26'),
(94, 'vet2@gmail.com', 'vet1@gmail.com', 'ddqs dsqd dsd dsd', '2018-07-29 09:23:04'),
(95, 'vet2@gmail.com', 'vet1@gmail.com', '', '2018-07-29 09:23:22'),
(96, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdsdqd dsd dsq', '2018-07-29 09:24:54'),
(97, 'vet2@gmail.com', 'vet1@gmail.com', 'dess', '2018-07-29 09:25:07'),
(98, 'vet1@gmail.com', 'vet1@gmail.com', 'Salo', '2018-07-29 09:26:07'),
(99, 'vet1@gmail.com', 'vet1@gmail.com', 'Ah oui oui ah ouioui', '2018-07-29 09:28:08'),
(100, 'vet2@gmail.com', 'vet1@gmail.com', 'Nique tes rdv toi là', '2018-07-29 09:35:03'),
(101, 'vet2@gmail.com', 'vet1@gmail.com', 'Je te baise Anne', '2018-07-29 10:22:01'),
(102, 'vet2@gmail.com', 'vet1@gmail.com', 'Je te baise Anne TU entends', '2018-07-29 10:22:18'),
(103, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdsqd dsdq tre', '2018-07-29 10:22:36'),
(104, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdsqdqs dsqd', '2018-07-29 10:24:19'),
(105, 'vet2@gmail.com', 'vet1@gmail.com', 'Cobb', '2018-07-29 10:24:46'),
(106, 'vet2@gmail.com', 'vet1@gmail.com', 'cobb', '2018-07-29 10:24:59'),
(107, 'p.mercier.h@gmail.com', 'vet1@gmail.com', 'dqdqsd dsd dsqd f fdf tre', '2018-07-29 10:25:48'),
(108, 'p.mercier.h@gmail.com', 'vet1@gmail.com', 'cdsfsd', '2018-07-29 10:26:47'),
(109, 'vet2@gmail.com', 'vet1@gmail.com', 'Juliette je taime', '2018-07-29 10:30:40'),
(110, 'vet2@gmail.com', 'vet1@gmail.com', 'dsqdq', '2018-07-29 11:35:01'),
(111, 'vet2@gmail.com', 'vet1@gmail.com', 'gjhvj hkbv vghvjgj', '2018-07-29 12:23:11'),
(112, 'vet2@gmail.com', 'vet1@gmail.com', 'dsdsqd dsqd test ajax', '2018-07-30 14:14:10'),
(113, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dsqdqsd dsqd', '2018-07-30 21:21:18'),
(114, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'Lol', '2018-07-30 21:22:09'),
(115, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dsqdsq dsqd sq mlmlml', '2018-07-30 23:02:00'),
(116, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'Yo', '2018-08-01 01:33:08'),
(117, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dsqdqs', '2018-08-01 01:34:37'),
(118, 'vet1@gmail.com', 'shakazoulou@gmail.com', '', '2018-08-01 01:35:01'),
(119, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'Yo mamène', '2018-08-01 01:35:29'),
(120, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'Mamène', '2018-08-01 01:36:14'),
(121, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dsqdsd', '2018-08-01 01:36:37'),
(122, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dsqdsd dsqdqd', '2018-08-01 01:36:50'),
(123, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'dsqdsd dsqdqd', '2018-08-01 01:36:51'),
(124, 'vet1@gmail.com', 'shakazoulou@gmail.com', 'JE TE FLOOD', '2018-08-01 01:36:58'),
(125, 'vet2@gmail.com', 'vet1@gmail.com', 'dsdsq dsqds', '2018-08-01 05:12:40'),
(126, 'vet2@gmail.com', 'vet1@gmail.com', 'lili', '2018-08-01 06:43:42'),
(127, 'vet1@gmail.com', 'zouzoutte@gmail.com', '', '2018-08-01 08:46:16'),
(128, 'vet1@gmail.com', 'super_zoulette@gmail.com', 'dqsdsds dsqd dqsd', '2018-08-01 10:27:01'),
(129, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Coucou toi', '2018-08-02 20:09:42'),
(130, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon', '2018-08-02 20:11:16'),
(131, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon tu vas bien?', '2018-08-02 20:11:36'),
(132, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon tu vas bien? ou quoi?', '2018-08-02 20:11:51'),
(133, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon tu vas bien? ou quoi? Ou non?', '2018-08-02 20:12:02'),
(134, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon tu vas bien? ou quoi? Ou non?', '2018-08-02 20:12:06'),
(135, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon tu vas bien? ou quoi? Ou non? ou tu dors?', '2018-08-02 20:12:13'),
(136, 'vet1@gmail.com', 'rick_and_morty@gmail.com', 'Re mon bichon tu vas bien? ou quoi? Ou non? ou tu dors? Ou tu manges?', '2018-08-02 20:12:44'),
(137, 'st@gmail.com', 'rick_and_morty@gmail.com', 'fdgfdsfds', '2018-08-04 21:37:27');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pet_name` varchar(20) NOT NULL DEFAULT 'Unknown',
  `breed` varchar(25) DEFAULT 'Unknown',
  `colour` varchar(20) DEFAULT 'Unknown',
  `sex` enum('female','male','unknown') NOT NULL DEFAULT 'unknown',
  `date_of_birth` date DEFAULT NULL,
  `microchip_tatoo` varchar(15) DEFAULT NULL,
  `comment` longtext,
  `history` longtext,
  `owner_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`ID`, `pet_name`, `breed`, `colour`, `sex`, `date_of_birth`, `microchip_tatoo`, `comment`, `history`, `owner_ID`) VALUES
(49, 'Luc', 'Rat', 'Noir', 'male', '2018-06-28', '78578475', '', 'Joueur', 99),
(50, 'Rouge', 'Hamster', 'Bleu', 'male', '2018-07-06', '758745', '', 'Je lai ressucité.Il ne pue plus désormais.Cependant:-Il est bien chiant.', 99),
(51, 'Rex', 'Tyrannosaure', 'Dinosaure', 'male', '1139-07-13', 'XXXXXXXXXXX', '', 'Ses bras raccourcissent avec le temps.Le pauvre na plus de dents.Il a les os fragiles.Diabète.Il a choppé le SIDA en copulant avec B2O.', 99),
(52, 'Morpheus', 'Âne', 'Gris blanc', 'male', '2018-05-09', '097897', 'Gros zizi', 'loulou il pue mais je laime', 99),
(53, 'Boubou', 'Furet', 'Blanc', 'female', '2017-11-07', '0979869', 'Il pue. C&#039;est un furet.', NULL, 114),
(54, 'Rookie', 'Renard', 'Roux', 'male', '2017-12-04', '', '', NULL, 114),
(55, 'Ronflex', 'Blaireau', 'Zébré', 'male', '2017-07-12', '9868755', '', NULL, 99),
(56, 'Pikachu', 'Souris électrique', 'Jaune', 'male', '2018-08-01', '', '', NULL, 99),
(57, 'Sid', 'Fennec', 'Sable', 'male', '1838-08-16', '1', 'Un mec pas trop mauvais en code de son point de vue', 'Un hamster qui code', 99),
(58, 'Rouge', 'Chat', 'Brun', 'female', '2018-08-01', '98678956', '', NULL, 119),
(60, 'B2o', 'Chien', 'Noir', 'unknown', '2013-03-01', '1907', '', NULL, 119);

-- --------------------------------------------------------

--
-- Structure de la table `patients_has_appointment`
--

DROP TABLE IF EXISTS `patients_has_appointment`;
CREATE TABLE IF NOT EXISTS `patients_has_appointment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `patients_ID` int(11) NOT NULL,
  `appointment_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_patients_has_appointment_appointment1_idx` (`appointment_ID`),
  KEY `fk_patients_has_appointment_patients1_idx` (`patients_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patients_has_appointment`
--

INSERT INTO `patients_has_appointment` (`ID`, `patients_ID`, `appointment_ID`) VALUES
(18, 58, 36),
(19, 59, 37),
(20, 59, 38),
(21, 51, 39),
(22, 50, 40);

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `working_day` set('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche') DEFAULT NULL,
  `vets_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_schedule_vets1_idx` (`vets_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`ID`, `from_time`, `to_time`, `working_day`, `vets_ID`) VALUES
(73, '11:30:00', '19:00:00', 'Mardi', 8),
(87, '12:00:00', '19:00:00', 'Lundi', 6),
(88, '08:30:00', '19:00:00', 'Lundi', 9),
(94, '08:00:00', '17:00:00', 'Jeudi', 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `role` enum('vet','client') NOT NULL DEFAULT 'client',
  `connected` enum('y','n') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `role`, `connected`) VALUES
(38, 'p.mercier.h@gmail.com', 'secret', 'client', 'n'),
(39, 'vet1@gmail.com', 'secret', 'vet', 'y'),
(73, 'vet2@gmail.com', 'secret', 'vet', 'n'),
(80, 'super_zoulette@gmail.com', 'secret', 'vet', 'n'),
(99, 'rick_and_morty@gmail.com', 'secret', 'client', 'n'),
(101, 'st@gmail.com', 'secret', 'vet', 'n'),
(118, 'zouzoutte@gmail.com', 'secret', 'client', 'n'),
(119, 'client2@gmail.com', 'secret', 'client', 'n'),
(120, 'client3@gmail.com', 'secret', 'client', 'y'),
(121, 'client4@gmail.com', 'secret', 'client', 'n');

-- --------------------------------------------------------

--
-- Structure de la table `vets`
--

DROP TABLE IF EXISTS `vets`;
CREATE TABLE IF NOT EXISTS `vets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `vet_init` varchar(4) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(13) NOT NULL,
  `users_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_vet_users1_idx` (`users_ID`),
  KEY `vet_init` (`vet_init`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vets`
--

INSERT INTO `vets` (`ID`, `last_name`, `first_name`, `vet_init`, `email`, `phone_number`, `users_ID`) VALUES
(6, 'Hochet', 'Eric', 'EH', 'vet1@gmail.com', '0600000000', 39),
(7, 'Hochet', 'Rick', 'RH', 'vet2@gmail.com', '0600010203', 73),
(8, 'Honime', 'Anne', 'HA', 'super_zoulette@gmail.com', '0670000000', 80),
(9, 'XXX', 'Tentacion', 'XT', 'st@gmail.com', '0612131313', 101);
