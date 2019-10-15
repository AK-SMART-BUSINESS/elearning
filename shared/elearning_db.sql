-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 12:54 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apprenant`
--

CREATE TABLE `apprenant` (
  `id_app` int(11) NOT NULL,
  `nom_app` varchar(30) NOT NULL,
  `prenom_app` varchar(130) NOT NULL,
  `pseudo_app` varchar(30) NOT NULL,
  `mdp_app` varchar(255) NOT NULL,
  `date_nais_app` date NOT NULL,
  `email_app` varchar(255) NOT NULL,
  `contact_app` varchar(20) NOT NULL,
  `pays_app` varchar(30) NOT NULL,
  `ville_app` varchar(50) NOT NULL,
  `adresse_app` varchar(255) NOT NULL,
  `niveau_etude_app` varchar(255) NOT NULL,
  `dernier_diplome_app` varchar(255) NOT NULL,
  `status_app` enum('enable','disable','suspended') NOT NULL DEFAULT 'disable',
  `date_inscription_app` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apprenant`
--

INSERT INTO `apprenant` (`id_app`, `nom_app`, `prenom_app`, `pseudo_app`, `mdp_app`, `date_nais_app`, `email_app`, `contact_app`, `pays_app`, `ville_app`, `adresse_app`, `niveau_etude_app`, `dernier_diplome_app`, `status_app`, `date_inscription_app`) VALUES
(1, 'Adjé', 'Gérald', 'rgv', 'azerty', '2000-10-08', 'adje.gerald@yahoo.fr', '+225 09094545', 'COTE D\'IVOIRE', 'ABIDJAN', 'Abobo', 'BAC+9', 'ING', 'disable', '2019-10-15 19:16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`id_app`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apprenant`
--
ALTER TABLE `apprenant`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
