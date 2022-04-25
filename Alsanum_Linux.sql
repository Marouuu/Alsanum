-- phpMyAdmin SQL Dump
-- version 5.1.3-1.fc35
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 29 mars 2022 à 07:25
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Alsanum`
--

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--

CREATE TABLE `Classe` (
  `ID_classe` int NOT NULL,
  `niveau_enseignement` enum('elementaire','primaire') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `niveau_classe` enum('CP','CP, CE1','CE1','CE1, CE2','CE2','CE2, CM1','CM1','CM1, CM2','CM2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_classe` varchar(255) NOT NULL,
  `effectif_classe` varchar(255) NOT NULL,
  `FK_etablissement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Classe`
--

INSERT INTO `Classe` (`ID_classe`, `niveau_enseignement`, `niveau_classe`, `nom_classe`, `effectif_classe`, `FK_etablissement`) VALUES
(1, 'elementaire', 'CP', 'ECOLE PRIMAIRE PUBLIQUE DES FONTAINES', '20', 1),
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
-- Structure de la table `Etablissement`
--

CREATE TABLE `Etablissement` (
  `ID_etablissement` int NOT NULL,
  `identifiant_etablissement` varchar(255) NOT NULL,
  `nom_etablissement` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Etablissement`
--

INSERT INTO `Etablissement` (`ID_etablissement`, `identifiant_etablissement`, `nom_etablissement`, `adresse`, `code_postal`, `ville`, `telephone`, `email`) VALUES
(1, '0671236E', 'ECOLE PRIMAIRE PUBLIQUE DES FONTAINES', '2 rue des Ecoles', '67870', 'BISCHOFFSHEIM', '0388502124', 'ce.0671236E@ac-strasbourg.fr'),
(2, '0671236G', 'ECOLE ELEMENTAIRE PUBLIQUE CHARLES SPINDLER', '21 rue Mgr Médard Barth', '67530', 'BOERSCH', '0388481337', 'ce.0671238G@ac-strasbourg.fr'),
(3, '0672868D', 'ECOLE ELEMENTAIRE PUBLIQUE GROUPE SCOLAIRE DU ROSENMEER', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '0388481337', 'ce.0672868D@ac-strasbourg.fr');

-- --------------------------------------------------------

--
-- Structure de la table `Historique`
--

CREATE TABLE `Historique` (
  `ID_historique` int NOT NULL,
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
  `FK_etablissement` int NOT NULL,
  `FK_classe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `ID_utilisateur` int NOT NULL,
  `genre` enum('Monsieur','Madame') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `correspondant` tinyint(1) NOT NULL,
  `secretaire` tinyint(1) NOT NULL,
  `FK_etablissement` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`ID_utilisateur`, `genre`, `nom`, `prenom`, `email`, `motdepasse`, `correspondant`, `secretaire`, `FK_etablissement`) VALUES
(1, 'Monsieur', 'MEYER', 'Luc', 'luc.meyer@orange.fr', 'motdepasse', 1, 0, 1),
(2, 'Madame', 'Goutfard', 'Elise', 'elise.goutfardr@sfr.fr', 'motdepasse', 1, 0, 2),
(3, 'Madame', 'Bokolski', 'Nadia', 'n.bokolski@laposte.net', 'motdepasse', 1, 0, 3),
(4, 'Madame', 'Secretaire', 'Secretaire', 'secretaire@openeduc.fr', 'motdepassesecretaire', 0, 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`ID_classe`),
  ADD KEY `FK_etablissement` (`FK_etablissement`);

--
-- Index pour la table `Etablissement`
--
ALTER TABLE `Etablissement`
  ADD PRIMARY KEY (`ID_etablissement`);

--
-- Index pour la table `Historique`
--
ALTER TABLE `Historique`
  ADD PRIMARY KEY (`ID_historique`),
  ADD KEY `FK_etablissement` (`FK_etablissement`),
  ADD KEY `FK_classe` (`FK_classe`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD KEY `FK_etablissement` (`FK_etablissement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `ID_classe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Etablissement`
--
ALTER TABLE `Etablissement`
  MODIFY `ID_etablissement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Historique`
--
ALTER TABLE `Historique`
  MODIFY `ID_historique` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `ID_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD CONSTRAINT `Classe_ibfk_1` FOREIGN KEY (`FK_etablissement`) REFERENCES `Etablissement` (`ID_etablissement`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Historique`
--
ALTER TABLE `Historique`
  ADD CONSTRAINT `Historique_ibfk_1` FOREIGN KEY (`FK_etablissement`) REFERENCES `Etablissement` (`ID_etablissement`),
  ADD CONSTRAINT `Historique_ibfk_2` FOREIGN KEY (`FK_classe`) REFERENCES `Classe` (`ID_classe`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `Utilisateur_ibfk_1` FOREIGN KEY (`FK_etablissement`) REFERENCES `Etablissement` (`ID_etablissement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
