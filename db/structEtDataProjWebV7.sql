-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 08 jan. 2022 à 21:15
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `localprojweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `Constructeur`
--

CREATE TABLE `Constructeur` (
  `idConstructeur` int(11) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `logoMarque` varchar(25) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Constructeur`
--

INSERT INTO `Constructeur` (`idConstructeur`, `marque`, `logoMarque`, `idUtilisateur`) VALUES
(18, 'Ferrari', 'Logo-Ferrari.png', 2),
(19, 'Alfa Romeo', 'Logo-Alfa-Romeo.png', 2),
(20, 'Aston Martin', 'Logo-Aston-Martin.png', 2),
(21, 'Audi', 'Logo-Audi.png', 2),
(22, 'BMW', 'Logo-BMW.png', 2),
(23, 'Citroën', 'Logo-Citroen.png', 2),
(24, 'Jaguar', 'Logo-Jaguar.png', 2),
(25, 'Lamborghini', 'Logo-Lamborghini.png', 2),
(26, 'Maserati', 'Logo-Maserati.png', 2),
(27, 'Mercedes AMG', 'Logo-Mercedes-AMG.png', 2),
(28, 'Opel', 'Logo-Opel.png', 2),
(29, 'Peugeot', 'Logo-Peugeot.png', 2),
(30, 'Porsche', 'Logo-Porsche.png', 2),
(31, 'Renault', 'Logo-Renault.png', 2),
(32, 'Rolls Royce', 'Logo-Rolls-Royce.png', 2),
(33, 'Volkswagen', 'Logo-Volkswagen.png', 2),
(34, 'Bugatti', 'Logo-Bugatti.png', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Photo`
--

CREATE TABLE `Photo` (
  `idPhoto` int(11) NOT NULL,
  `photo` varchar(35) DEFAULT NULL,
  `idVoiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Photo`
--

INSERT INTO `Photo` (`idPhoto`, `photo`, `idVoiture`) VALUES
(2, 'veyron_overview.webp', 1),
(3, 'divo_overview.jpeg', 2),
(4, 'M4G82_overview.jpeg', 3),
(5, 'divo_coffre.jpeg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Voiture`
--

CREATE TABLE `Voiture` (
  `idVoiture` int(11) NOT NULL,
  `nomVoiture` varchar(25) NOT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `nbPlace` int(11) DEFAULT NULL,
  `poids` int(4) DEFAULT NULL,
  `volumeCoffre` int(11) DEFAULT NULL,
  `vitesseMax` int(11) DEFAULT NULL,
  `autonomie` int(11) DEFAULT NULL,
  `moteur` varchar(25) DEFAULT NULL,
  `idConstructeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Voiture`
--

INSERT INTO `Voiture` (`idVoiture`, `nomVoiture`, `description`, `nbPlace`, `poids`, `volumeCoffre`, `vitesseMax`, `autonomie`, `moteur`, `idConstructeur`) VALUES
(1, 'Veron', 'La Veyron 16.4 est une supercar du constructeur automobile français Bugatti produite de 2005 à 2015, atteignant la vitesse de 431,072 km/h dans sa version Super Sport, elle était alors la voiture de série la plus rapide du monde. Assemblée à Molsheim en Alsace, elle est dévoilée en 2000 lors du Mondial de l\'automobile de Paris sous la forme de l\'étude de style EB 18/4 Veyron. Les premiers exemplaires sont sortis d\'usine le 19 avril 2005. En 2008, apparaît un modèle « Grand Sport » puis en 2010 la version extrême « Super Sport », et finalement une version \"Grand Sport Vitesse\" en 2013. Conçue entièrement en Europe par le groupe VAG, propriétaire de la marque, ainsi que par quelques partenaires spécialisés ; toutes les pièces de la Veyron sont fabriquées en Europe et assemblées par une petite équipe. Cinq personnes et trois semaines de travail sont nécessaires pour son assemblage. Toutes les réparations relatives au moteur, à la carrosserie ainsi que son entretien courant sont réalisées aussi à Molsheim. Chaque exemplaire porte une plaque avec son numéro de châssis. ', 2, 1990, 70, 408, 444, 'W16', 34),
(2, 'Divo', 'La Bugatti Divo est présentée le 24 août 2018 à The Quail, A Motorsports Gathering, un rassemblement automobile californien, près de Monterey, aux États-Unis, avant son exposition au concours d\'élégance de Pebble Beach 2018. Elle est ensuite présentée au Mondial de l\'Auto de Paris en octobre 2018 et au Salon de Genève 2019.\r\n\r\nAutomobile radicale extrapolée de la Bugatti Chiron, la Divo s\'inspire du concept-car Bugatti Vision Gran Turismo. Son nom est un hommage au pilote français Albert Divo qui a remporté deux fois la Targa Florio avec une Bugatti Type 35 B, en 1928 et 1929.\r\n\r\nStephan Winkelmann, PDG de Bugatti, a annoncé que la Divo est « conçue pour les virages » et sera produite à seulement quarante exemplaires pour un tarif de cinq millions d\'euros chacun, tous vendus à des propriétaires d\'au moins un exemplaire de la Chiron, ce qui en faisait, en août 2018, la voiture neuve la plus chère du monde.', 2, 1960, 44, 420, 450, 'W16', 34),
(3, 'M4G82', 'Il s\'agit de la 2ème version de la M4', 4, 1725, 440, 250, NULL, 'SP95', 22);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Constructeur`
--
ALTER TABLE `Constructeur`
  ADD PRIMARY KEY (`idConstructeur`),
  ADD KEY `FK_Constructeur_idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `Photo`
--
ALTER TABLE `Photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `FK_Photo_idVoiture` (`idVoiture`);

--
-- Index pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD PRIMARY KEY (`idVoiture`),
  ADD UNIQUE KEY `nomVoiture` (`nomVoiture`),
  ADD KEY `FK_Voiture_idConstructeur` (`idConstructeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Constructeur`
--
ALTER TABLE `Constructeur`
  MODIFY `idConstructeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `Photo`
--
ALTER TABLE `Photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Voiture`
--
ALTER TABLE `Voiture`
  MODIFY `idVoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Constructeur`
--
ALTER TABLE `Constructeur`
  ADD CONSTRAINT `FK_Constructeur_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `Photo`
--
ALTER TABLE `Photo`
  ADD CONSTRAINT `FK_Photo_idVoiture` FOREIGN KEY (`idVoiture`) REFERENCES `Voiture` (`idVoiture`);

--
-- Contraintes pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD CONSTRAINT `FK_Voiture_idConstructeur` FOREIGN KEY (`idConstructeur`) REFERENCES `Constructeur` (`idConstructeur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
