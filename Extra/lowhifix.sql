-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 19 Avril 2021 à 21:36
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lowhifix`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheter`
--

CREATE TABLE `acheter` (
  `NumProd` varchar(6) NOT NULL,
  `NumAppro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `NumAppro` int(11) NOT NULL,
  `DateAppro` date DEFAULT NULL,
  `NumProd` varchar(6) DEFAULT NULL,
  `QteAch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `approvisionnement`
--

INSERT INTO `approvisionnement` (`NumAppro`, `DateAppro`, `NumProd`, `QteAch`) VALUES
(1, '2021-02-27', 'TV001', '10'),
(2, '2021-03-06', 'CH102', '10'),
(3, '2021-03-12', 'TV001', '15'),
(4, '2021-03-12', 'TV001', '5');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `NumCat` varchar(4) NOT NULL,
  `LibCat` varchar(50) DEFAULT NULL,
  `ImgCat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`NumCat`, `LibCat`, `ImgCat`) VALUES
('AMP0', 'Ampli home Cin&eacute;ma', 'AMP0.png'),
('CH0', 'Chaine Hifi - Mini', 'CH0.png'),
('CH1', 'Chaine Hifi - Compos&eacute;e', 'CH1.png'),
('DVD0', 'Lecteur DVD', 'DVD0.png'),
('TV0', 'T&eacute;l&eacute;viseurs LCD', 'TV0.png'),
('TV1', 'T&eacute;l&eacute;viseurs Plasma', 'TV1.png');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `NumCli` int(11) NOT NULL,
  `NomCli` varchar(50) NOT NULL,
  `PrenomCli` varchar(50) NOT NULL,
  `MailCli` varchar(100) NOT NULL,
  `MdpCli` varchar(500) NOT NULL,
  `AdrCli` varchar(50) DEFAULT NULL,
  `CPCLi` varchar(6) DEFAULT NULL,
  `VilleCli` varchar(50) DEFAULT NULL,
  `RoleCli` int(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`NumCli`, `NomCli`, `PrenomCli`, `MailCli`, `MdpCli`, `AdrCli`, `CPCLi`, `VilleCli`, `RoleCli`) VALUES
(2, 'Admin', 'Admin', 'admin@gmail.com', '$2y$12$fVnUhgA0fwqfYwXxFkfVveWKsLbUbAMcvYQHvblkQJtZs4xn3f/3y', 'admin', '71000', 'Mâcon', 1),
(3, 'Marion', 'Henry', 'MarionHenry@gmail.com', '$2y$12$difap2F0DIdcJPB7h1J5dO1B4cAC3hgRkHQAC9JBDDY4BFJ4mx16m', NULL, NULL, NULL, 0),
(4, 'Michon', 'Lucas', 'michonlucas01@gmail.com', '$2y$12$/E43PkTHC4k5/c0XzrXaN.A/XXPE94Z./mFuOHvavGOGq3lI62aAG', '94 Clos des Burtins', '01290', 'Crottet', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `NumCom` int(11) NOT NULL,
  `NumCli` int(5) DEFAULT NULL,
  `DateCom` date NOT NULL,
  `Statut` varchar(30) NOT NULL DEFAULT 'Non reglee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`NumCom`, `NumCli`, `DateCom`, `Statut`) VALUES
(483, 2, '2021-03-26', 'Non reglee'),
(484, 2, '2021-03-26', 'Non reglee'),
(485, 2, '2021-03-26', 'Non reglee'),
(486, 2, '2021-03-26', 'Non reglee'),
(487, 2, '2021-03-26', 'Non reglee'),
(488, 4, '2021-03-26', 'Non reglee'),
(489, 4, '2021-03-26', 'Non reglee'),
(490, 2, '2021-04-01', 'Non reglee');

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE `composer` (
  `NumCom` int(11) NOT NULL,
  `NumProd` varchar(6) NOT NULL,
  `QteCom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `composer`
--

INSERT INTO `composer` (`NumCom`, `NumProd`, `QteCom`) VALUES
(477, 'CH001', '1'),
(478, 'CH001', '1'),
(489, 'CH001', '1'),
(421, 'CH002', '1'),
(422, 'CH002', '1'),
(423, 'CH002', '1'),
(435, 'CH101', '1'),
(445, 'CH101', '1'),
(454, 'CH101', '1'),
(455, 'CH101', '3'),
(467, 'CH101', '1'),
(469, 'CH101', '3'),
(435, 'CH102', '4'),
(464, 'CH102', '1'),
(465, 'CH102', '4'),
(311, 'DVD001', '5'),
(312, 'DVD001', '41'),
(411, 'DVD001', '1'),
(414, 'DVD001', '1'),
(415, 'DVD001', '1'),
(294, 'TV001', '1'),
(295, 'TV001', '1'),
(296, 'TV001', '1'),
(297, 'TV001', '1'),
(298, 'TV001', '1'),
(299, 'TV001', '1'),
(300, 'TV001', '1'),
(301, 'TV001', '1'),
(302, 'TV001', '1'),
(303, 'TV001', '1'),
(304, 'TV001', '1'),
(305, 'TV001', '1'),
(306, 'TV001', '1'),
(311, 'TV001', '5'),
(419, 'TV001', '1'),
(427, 'TV001', '1'),
(428, 'TV001', '1'),
(429, 'TV001', '1'),
(430, 'TV001', '1'),
(431, 'TV001', '1'),
(432, 'TV001', '1'),
(433, 'TV001', '1'),
(434, 'TV001', '1'),
(435, 'TV001', '1'),
(481, 'TV001', '1'),
(489, 'TV001', '2'),
(294, 'TV002', '1'),
(295, 'TV002', '1'),
(296, 'TV002', '1'),
(297, 'TV002', '1'),
(298, 'TV002', '1'),
(299, 'TV002', '1'),
(300, 'TV002', '1'),
(301, 'TV002', '1'),
(302, 'TV002', '1'),
(303, 'TV002', '1'),
(304, 'TV002', '1'),
(305, 'TV002', '1'),
(306, 'TV002', '1'),
(307, 'TV002', '3'),
(308, 'TV002', '3'),
(309, 'TV002', '3'),
(310, 'TV002', '3'),
(320, 'TV002', '1'),
(321, 'TV002', '1'),
(322, 'TV002', '1'),
(323, 'TV002', '1'),
(343, 'TV002', '1'),
(490, 'TV002', '1'),
(400, 'TV003', '1'),
(477, 'TV003', '1'),
(478, 'TV003', '2'),
(480, 'TV003', '1'),
(482, 'TV003', '1'),
(483, 'TV003', '1'),
(485, 'TV003', '1'),
(486, 'TV003', '1'),
(399, 'TV004', '1'),
(407, 'TV004', '1'),
(479, 'TV004', '1'),
(480, 'TV004', '1'),
(481, 'TV004', '1'),
(317, 'TV101', '1'),
(318, 'TV101', '4'),
(485, 'TV101', '1'),
(486, 'TV101', '1'),
(319, 'TV102', '5'),
(472, 'TV102', '1'),
(474, 'TV102', '3'),
(487, 'TV102', '1'),
(324, 'TV103', '1'),
(326, 'TV103', '1'),
(420, 'TV104', '1'),
(421, 'TV104', '1'),
(422, 'TV104', '1'),
(423, 'TV104', '1'),
(453, 'TV104', '2'),
(479, 'TV104', '1');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `NumFour` varchar(3) NOT NULL,
  `NomFour` varchar(50) DEFAULT NULL,
  `AdrFour` varchar(50) DEFAULT NULL,
  `CPFour` varchar(6) DEFAULT NULL,
  `VilleFour` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`NumFour`, `NomFour`, `AdrFour`, `CPFour`, `VilleFour`) VALUES
('FR1', 'Europ\'TV', '12 rue d\'Alsace', '21000', 'Dijon'),
('FR2', 'France Audio', '8 rue de Frankfort', '71100', 'Chalon sur Saône'),
('FR3', 'Music Playground', '7 place Roosevelt', '71000', 'Macon'),
('FR4', 'Sony', '5 rue des oiseaux', '75000', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `NumProd` varchar(6) NOT NULL,
  `NomProd` varchar(50) DEFAULT NULL,
  `PrixProd` double DEFAULT NULL,
  `QteProd` int(11) DEFAULT NULL,
  `SeuilReappro` int(11) DEFAULT NULL,
  `Caracteristiques` varchar(255) DEFAULT NULL,
  `Couleur` varchar(50) DEFAULT NULL,
  `Largeur` float DEFAULT NULL,
  `Longueur` float DEFAULT NULL,
  `Profondeur` float DEFAULT NULL,
  `Poids` float DEFAULT NULL,
  `NumCat` varchar(4) DEFAULT NULL,
  `NumFour` varchar(3) DEFAULT NULL,
  `ImgSrc` text,
  `Catalogue` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`NumProd`, `NomProd`, `PrixProd`, `QteProd`, `SeuilReappro`, `Caracteristiques`, `Couleur`, `Largeur`, `Longueur`, `Profondeur`, `Poids`, `NumCat`, `NumFour`, `ImgSrc`, `Catalogue`) VALUES
('AMP001', 'SONY STR DH520', 169, 15, 5, '7x100 Watts', 'Noir', 21, 31.2, 22.5, 7.4, 'AMP0', 'FR3', 'SONY-STR-DH520.png', 1),
('CH001', 'SONY MHC-Ex 700', 149, 12, 10, '2x200 Watts + MP3', 'Noir', 21, 31.2, 37.5, 5.4, 'CH0', 'FR3', 'SONY-MHC-Ex-700.png', 1),
('CH002', 'PHILIPS FWM210', 129, 8, 10, '2x70 Watts + MP3', 'Noir', 22, 31.3, 25.8, 4.4, 'CH0', 'FR3', 'PHILIPS-FWM210.png', 1),
('CH101', 'NAD C515 C316 Alpha B1', 509, 17, 20, '2x40Watts + MP3', 'Gris', 43.5, 7.9, 28.5, 5.5, 'CH1', 'FR3', 'NADC515+C316+Alpha-B1.png', 1),
('CH102', 'ONKYO A9155 DX7355 S604', 609, 5, 20, '2x65Watts + MP3', 'Npor', 43.5, 12.1, 34.5, 6.8, 'CH1', 'FR3', 'ONKYO-A9155+DX7355+S604.png', 1),
('DVD001', 'BRANDT BDVD 1290', 19, 6, 10, 'DVD + DVD-RW', 'Noir', 22.5, 4.5, 22, 0.8, 'DVD0', 'FR2', 'BRANDT-BDVD-1290.png', 1),
('DVD002', 'PHILIPS DVP3850', 29, 38, 10, 'DVD + DVD-RW + MP3 + DivX', 'Noir', 36, 4.2, 20.9, 1.3, 'DVD0', 'FR1', 'PHILIPS-DVP3850.png', 1),
('TV001', 'BRANDT B1913HD', 145, 17, 5, 'Ecran 48 cm, 1366x768 pixels + TNT HD', 'Noir', 34.8, 46, 15.5, 4.9, 'TV0', 'FR2', 'BRANDT-B1913HD.png', 1),
('TV002', 'Grundig Vision 3', 210, 9, 5, 'Ecran 66 cm, 1366x768 pixels + TNT HD', 'Gris', 49, 66.5, 17.8, 9.5, 'TV0', 'FR1', 'Grundig-Vision-3.png', 1),
('TV003', 'Philips 32PFL3017H', 275, 13, 4, 'Ecran 81cm, 1920x1080 pixels + TNT HD', 'Noir', 52.6, 77.7, 22.2, 10.3, 'TV0', 'FR2', 'Philips-32PFL3017H.png', 1),
('TV004', 'WINDSOR WD4212T', 339, 7, 5, 'Ecran 106 cm, 1920x1080 pixels + TNT HD', 'Noir', 68.5, 101.5, 22, 19, 'TV0', 'FR1', 'WINDSOR-WD4212T.png', 1),
('TV101', 'SAMSUNG PS43E450', 369, 19, 5, 'Ecran 109cm, 1024x768 pixels + TNT HD', 'Noir', 67.5, 101.2, 26.2, 15.4, 'TV1', 'FR1', 'SAMSUNG-PS43E450.png', 1),
('TV102', 'LG 42PA4500', 369, 0, 5, 'Ecran 107 cm, 1366x768 pixels + TNT HD', 'Gris', 65.5, 98.3, 24.7, 20.4, 'TV1', 'FR2', 'LG-42PA4500.png', 1),
('TV103', 'SAMSUNG PS51E490/3D', 569, 0, 2, 'Ecran 129 cm, 1024x768 pixels + TNT HD', 'Noir', 76, 118.8, 26.2, 20.8, 'TV1', 'FR1', 'SAMSUNG-PS51E490-3D.png', 1),
('TV104', 'SAMSUNG PS59D530', 749, 4, 2, 'Ecran 150 cm, 1920x1080 pixels + TNT HD', 'Noir', 89.5, 137.2, 33, 35.8, 'TV1', 'FR1', 'SAMSUNG-PS59D530.png', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD PRIMARY KEY (`NumProd`,`NumAppro`),
  ADD KEY `NumAppro` (`NumAppro`);

--
-- Index pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`NumAppro`),
  ADD KEY `NumProd` (`NumProd`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`NumCat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`NumCli`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NumCom`),
  ADD KEY `NumCli` (`NumCli`);

--
-- Index pour la table `composer`
--
ALTER TABLE `composer`
  ADD PRIMARY KEY (`NumProd`,`NumCom`),
  ADD KEY `NumCom` (`NumCom`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`NumFour`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`NumProd`),
  ADD KEY `NumCat` (`NumCat`),
  ADD KEY `NumFour` (`NumFour`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  MODIFY `NumAppro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `NumCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `NumCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD CONSTRAINT `acheter_ibfk_2` FOREIGN KEY (`NumProd`) REFERENCES `produit` (`NumProd`),
  ADD CONSTRAINT `acheter_ibfk_3` FOREIGN KEY (`NumAppro`) REFERENCES `approvisionnement` (`NumAppro`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`NumCli`) REFERENCES `client` (`NumCli`);

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_ibfk_2` FOREIGN KEY (`NumProd`) REFERENCES `produit` (`NumProd`),
  ADD CONSTRAINT `composer_ibfk_3` FOREIGN KEY (`NumCom`) REFERENCES `commande` (`NumCom`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`NumCat`) REFERENCES `categorie` (`NumCat`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`NumFour`) REFERENCES `fournisseur` (`NumFour`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
