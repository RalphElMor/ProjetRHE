-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 09 sep. 2024 à 19:43
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `4204a5_travail_section1`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `numCommande` int(11) NOT NULL,
  `uidCommande` int(11) NOT NULL,
  `numeroPieceCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`numCommande`, `uidCommande`, `numeroPieceCommande`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `piecesauto`
--

CREATE TABLE `piecesauto` (
  `numPiece` int(11) NOT NULL,
  `nomPiece` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fournisseur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` double NOT NULL,
  `modeleVoiture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `piecesauto`
--

INSERT INTO `piecesauto` (`numPiece`, `nomPiece`, `fournisseur`, `prix`, `modeleVoiture`) VALUES
(1, 'Amortisseur Avant Sport', 'MazdaSPeed', 575.97, 'mazda mx5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `uid` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`uid`, `nom`, `prenom`, `adresse`, `motdepasse`, `email`) VALUES
(1, 'Brice', 'DeNice', '3 rue des potiers toulouse, france', 'Ab23564$32', 'Brice123@outlook.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `fk_idUtilisateurCommandes` (`uidCommande`),
  ADD KEY `fk_numeroPieceCommandes` (`numeroPieceCommande`);

--
-- Index pour la table `piecesauto`
--
ALTER TABLE `piecesauto`
  ADD PRIMARY KEY (`numPiece`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `numCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `piecesauto`
--
ALTER TABLE `piecesauto`
  MODIFY `numPiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_idUtilisateurCommandes` FOREIGN KEY (`uidCommande`) REFERENCES `utilisateurs` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_numeroPieceCommandes` FOREIGN KEY (`numeroPieceCommande`) REFERENCES `piecesauto` (`numPiece`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
