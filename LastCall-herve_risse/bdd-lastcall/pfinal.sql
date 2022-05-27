-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 mai 2022 à 11:45
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lastcall`
--

-- --------------------------------------------------------

--
-- Structure de la table `tile`
--

CREATE TABLE `tile` (
  `id_tile` smallint(6) NOT NULL,
  `idMonde` smallint(6) NOT NULL,
  `idLevel` smallint(6) NOT NULL,
  `indexY` smallint(6) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tile`
--

INSERT INTO `tile` (`id_tile`, `idMonde`, `idLevel`, `indexY`, `content`) VALUES
(1, 0, 1, 0, '=                                                                                                                               ='),
(2, 0, 1, 1, '=                                                                                                                               ='),
(3, 0, 1, 2, '=                                                                                                                               ='),
(4, 0, 1, 3, '=                                                                                                                               ='),
(5, 0, 1, 4, '=                                                                                                                               ='),
(6, 0, 1, 5, '=     %   =*=%=                                                                                                                 ='),
(7, 0, 1, 6, '=                                                                                                                               ='),
(8, 0, 1, 7, '=                            -+                                                                                                 ='),
(9, 0, 1, 8, '=                    ^   ^   ()                                                                                          x      ='),
(10, 0, 1, 9, '===============================   ==============================================================================================='),
(11, 0, 2, 0, '=                                                                                                                               ='),
(12, 0, 2, 1, '=                                                                                                                               ='),
(13, 0, 2, 2, '=                                                                                                                               ='),
(14, 0, 2, 3, '=                                                                                                                               ='),
(15, 0, 2, 4, '=                                                                                                                               ='),
(16, 0, 2, 5, '=     %   =*=%=      ====                                                                                                           ='),
(17, 0, 2, 6, '=                                                                                                                               ='),
(18, 0, 2, 7, '=                            -+                                                                                                 ='),
(19, 0, 2, 8, '=                    ^   ^   ()                                                                                          x      ='),
(20, 0, 2, 9, '===============================   ===============================================================================================');

-- --------------------------------------------------------

--
-- Structure de la table `toprank`
--

CREATE TABLE `toprank` (
  `idTopRank` smallint(6) NOT NULL,
  `idMonde` smallint(6) NOT NULL,
  `timeOfWorld` time NOT NULL,
  `idMembre` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `ranked` varchar(30) NOT NULL,
  `droite` varchar(6) NOT NULL DEFAULT 'd',
  `gauche` varchar(6) NOT NULL DEFAULT 'q',
  `sauter` varchar(6) NOT NULL DEFAULT 'space',
  `action` varchar(6) NOT NULL DEFAULT 's',
  `worldFinish` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tile`
--
ALTER TABLE `tile`
  ADD PRIMARY KEY (`id_tile`);

--
-- Index pour la table `toprank`
--
ALTER TABLE `toprank`
  ADD PRIMARY KEY (`idTopRank`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tile`
--
ALTER TABLE `tile`
  MODIFY `id_tile` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `toprank`
--
ALTER TABLE `toprank`
  MODIFY `idTopRank` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
