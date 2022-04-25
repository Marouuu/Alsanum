-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 avr. 2022 à 18:24
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alsanum`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `ID_classe` int(11) NOT NULL,
  `niveau_enseignement` enum('elementaire','primaire') NOT NULL,
  `niveau_classe` enum('CP','CP, CE1','CE1','CE1, CE2','CE2','CE2, CM1','CM1','CM1, CM2','CM2') NOT NULL,
  `nom_classe` varchar(255) NOT NULL,
  `effectif_classe` varchar(255) NOT NULL,
  `FK_etablissement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_classe`, `niveau_enseignement`, `niveau_classe`, `nom_classe`, `effectif_classe`, `FK_etablissement`) VALUES
(1, 'elementaire', 'CP', 'CP Mme Borleau', '20', 1),
(2, 'elementaire', 'CE1, CE2', 'CE1/CE2 Mme Hetre', '32', 1),
(3, 'elementaire', 'CE1, CE2', 'CE1/CE2 M Dupent', '34', 1),
(4, 'elementaire', 'CM1', 'CM1 M Karma', '28', 1),
(5, 'elementaire', 'CM2', 'CM2 Mme Kieffa', '32', 1),
(6, 'elementaire', 'CP', 'CP Mme Bouleau', '29', 2),
(7, 'elementaire', 'CE1', 'CE1 Mme Kadifa', '26', 2),
(8, 'elementaire', 'CE2', 'CE2 M Sprung', '25', 2),
(9, 'elementaire', 'CM1', 'CM1 M Heitz', '28', 2),
(10, 'elementaire', 'CM2', 'CM2 Mme Lorentz', '15', 2),
(11, 'elementaire', 'CP', 'CP Bilingue Mme Kumpf, M King', '23', 3),
(12, 'elementaire', 'CP, CE1', 'CP, CE1 Bilingue Mme Kumpf, M King', '24', 3),
(13, 'elementaire', 'CP, CE1', 'CP, CE1 Mme Laroute', '26', 3),
(14, 'elementaire', 'CP, CE1', 'CP, CE1 Mme Charlot', '25', 3),
(15, 'elementaire', 'CE1', 'CE1 Biligue Mme Paturelle, Mme Troussi', '25', 3),
(16, 'elementaire', 'CE1, CE2', 'CE1, CE2 M Raoult', '28', 3),
(17, 'elementaire', 'CE2', 'CE2 M Vinasse', '29', 3),
(18, 'elementaire', 'CE2', 'CE2 Bilingue Mme Schwarz, Mme Longlet', '25', 3),
(19, 'elementaire', 'CM1', 'CM1Bilingue M DeTibot', '23', 3),
(20, 'elementaire', 'CM1', 'CM1 M Eicher', '25', 3),
(21, 'elementaire', 'CM1, CM2', 'CM1 Mme Lallemand', '25', 3),
(22, 'elementaire', 'CM2', 'CM2 Bilingue Mme Schwarz, Mme Longlet', '24', 3),
(23, 'elementaire', 'CM2', 'CM2 M Lalanne', '27', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `ID_etablissement` int(11) NOT NULL,
  `identifiant_etablissement` varchar(255) NOT NULL,
  `nom_etablissement` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `derniere_modification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`ID_etablissement`, `identifiant_etablissement`, `nom_etablissement`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `derniere_modification`) VALUES
(1, '0671236E', 'ECOLE PRIMAIRE PUBLIQUE DES FONTAINES', '2 rue des Ecoles', '67870', 'BISCHOFFSHEIM', '0388502124', 'ce.0671236E@ac-strasbourg.fr', ''),
(2, '0671236G', 'ECOLE ELEMENTAIRE PUBLIQUE CHARLES SPINDLER', '21 rue Mgr Médard Barth', '67530', 'BOERSCH', '0388481337', 'ce.0671238G@ac-strasbourg.fr', ''),
(3, '0672868D', 'ECOLE ELEMENTAIRE PUBLIQUE GROUPE SCOLAIRE DU ROSENMEER', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '0388481337', 'ce.0672868D@ac-strasbourg.fr', '');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `ID_historique` int(11) NOT NULL,
  `identifiant_etablissement` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre_classe` varchar(255) NOT NULL,
  `niveau_enseignement` varchar(255) NOT NULL,
  `niveau_classe` varchar(255) NOT NULL,
  `nom_classe` varchar(255) NOT NULL,
  `effectif_classe` varchar(255) NOT NULL,
  `FK_etablissement` int(11) NOT NULL,
  `FK_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_utilisateur` int(11) NOT NULL,
  `genre` enum('Monsieur','Madame') NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `correspondant` tinyint(1) NOT NULL,
  `secretaire` tinyint(1) NOT NULL,
  `FK_etablissement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `genre`, `nom`, `prenom`, `email`, `motdepasse`, `correspondant`, `secretaire`, `FK_etablissement`) VALUES
(1, 'Monsieur', 'MEYER', 'Luc', 'luc.meyer@orange.fr', 'motdepasse', 1, 0, 1),
(2, 'Madame', 'Goutfard', 'Elise', 'elise.goutfardr@sfr.fr', 'motdepasse', 1, 0, 2),
(3, 'Madame', 'Bokolski', 'Nadia', 'n.bokolski@laposte.net', 'motdepasse', 1, 0, 3),
(4, 'Madame', 'Secretaire', 'Secretaire', 'secretaire@openeduc.fr', 'motdepassesecretaire', 0, 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`ID_classe`),
  ADD KEY `FK_etablissement` (`FK_etablissement`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`ID_etablissement`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`ID_historique`),
  ADD KEY `FK_etablissement` (`FK_etablissement`),
  ADD KEY `FK_classe` (`FK_classe`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD KEY `FK_etablissement` (`FK_etablissement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `ID_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `ID_etablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `ID_historique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `Classe_ibfk_1` FOREIGN KEY (`FK_etablissement`) REFERENCES `etablissement` (`ID_etablissement`);

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `Historique_ibfk_1` FOREIGN KEY (`FK_etablissement`) REFERENCES `etablissement` (`ID_etablissement`),
  ADD CONSTRAINT `Historique_ibfk_2` FOREIGN KEY (`FK_classe`) REFERENCES `classe` (`ID_classe`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `Utilisateur_ibfk_1` FOREIGN KEY (`FK_etablissement`) REFERENCES `etablissement` (`ID_etablissement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
