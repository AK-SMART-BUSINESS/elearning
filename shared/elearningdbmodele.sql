-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 18 oct. 2019 à 02:38
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elearningdbmodele`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `id_app` int(11) NOT NULL,
  `nom_app` varchar(50) DEFAULT NULL,
  `prenom_app` varchar(255) DEFAULT NULL,
  `pseudo_app` varchar(255) DEFAULT NULL,
  `mdp_app` varchar(255) DEFAULT NULL,
  `dat_nais_app` date DEFAULT NULL,
  `email_app` varchar(105) DEFAULT NULL,
  `contact_app` varchar(45) DEFAULT NULL,
  `pays_app` varchar(45) DEFAULT NULL,
  `niveau_etude_app` varchar(45) DEFAULT NULL,
  `ville_app` varchar(45) DEFAULT NULL,
  `adresse_app` varchar(45) DEFAULT NULL,
  `dernier_diplome_app` varchar(45) DEFAULT NULL,
  `date_inscrip_app` datetime DEFAULT NULL,
  `status_app` enum('enable','disable','suspended') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assister_formation`
--

CREATE TABLE `assister_formation` (
  `id_AF` int(11) NOT NULL,
  `heure_formation` varchar(45) DEFAULT NULL,
  `Apprenant_id_app` int(11) NOT NULL,
  `Formation_id_format` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id_chap` int(11) NOT NULL,
  `libelle_chap` varchar(45) DEFAULT NULL,
  `Module_id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner_formation`
--

CREATE TABLE `enseigner_formation` (
  `id_EF` int(11) NOT NULL,
  `heure_formation` varchar(45) DEFAULT NULL,
  `Formation_id_format` int(11) NOT NULL,
  `Formateur_id_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `id_form` int(11) NOT NULL,
  `nom_form` varchar(145) DEFAULT NULL,
  `prenom_form` varchar(145) DEFAULT NULL,
  `pseudo_form` varchar(45) DEFAULT NULL,
  `mdp_form` varchar(45) DEFAULT NULL,
  `dat_nais_form` date DEFAULT NULL,
  `email_form` varchar(45) DEFAULT NULL,
  `contact_form` varchar(45) DEFAULT NULL,
  `pays_form` varchar(45) DEFAULT NULL,
  `specialite_form` varchar(45) DEFAULT NULL,
  `ville_form` varchar(45) DEFAULT NULL,
  `date_inscrip_form` datetime DEFAULT NULL,
  `status_form` enum('enable','disable','suspended') DEFAULT NULL,
  `adresse_form` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_format` int(11) NOT NULL,
  `titre_format` varchar(45) DEFAULT NULL,
  `niveau_format` varchar(45) DEFAULT NULL,
  `description_format` varchar(45) DEFAULT NULL,
  `date_creation_format` datetime DEFAULT NULL,
  `date_format` date DEFAULT NULL,
  `duree_format` varchar(45) DEFAULT NULL,
  `prix_format` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `libelle_module` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `module_formation`
--

CREATE TABLE `module_formation` (
  `id_mf` int(11) NOT NULL,
  `Formation_id_format` int(11) NOT NULL,
  `Module_id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`id_app`);

--
-- Index pour la table `assister_formation`
--
ALTER TABLE `assister_formation`
  ADD PRIMARY KEY (`id_AF`),
  ADD KEY `fk_Assister_Formation_Apprenant1_idx` (`Apprenant_id_app`),
  ADD KEY `fk_Assister_Formation_Formation1_idx` (`Formation_id_format`);

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id_chap`),
  ADD KEY `fk_Chapitre_Module_idx` (`Module_id_module`);

--
-- Index pour la table `enseigner_formation`
--
ALTER TABLE `enseigner_formation`
  ADD PRIMARY KEY (`id_EF`),
  ADD KEY `fk_Enseigner_Formation_Formation1_idx` (`Formation_id_format`),
  ADD KEY `fk_Enseigner_Formation_Formateur1_idx` (`Formateur_id_form`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id_form`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_format`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `module_formation`
--
ALTER TABLE `module_formation`
  ADD PRIMARY KEY (`id_mf`),
  ADD KEY `fk_Module_formation_Formation1_idx` (`Formation_id_format`),
  ADD KEY `fk_Module_formation_Module1_idx` (`Module_id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
