-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 09:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smi2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `note` float(10,2) NOT NULL,
  `filiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `code`, `prenom`, `nom`, `note`, `filiere`) VALUES
(4, '35236', 'mohammed', 'elidrissi laoukili', 17.00, 'SMI'),
(34, '22222', 'khadija', 'good', 17.00, 'SMP'),
(49, '66666', 'hiya', 'zwina', 14.00, 'SMI'),
(53, '55595', 'mohammed', 'nada', 20.00, 'SMI');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `codeF` varchar(255) NOT NULL,
  `intituleF` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id`, `codeF`, `intituleF`) VALUES
(1, 'SMI', 'Sciences Mathématiques et Informatique'),
(2, 'SMP', 'Sciences de la Matière Physique'),
(3, 'SMC', 'Sciences de la Matière Chimie'),
(4, 'SMA', 'Sciences Mathématiques et Applications'),
(5, 'SVT', 'Science de la vie de terre');

-- --------------------------------------------------------

--
-- Table structure for table `professeurs`
--

CREATE TABLE `professeurs` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professeurs`
--

INSERT INTO `professeurs` (`id`, `prenom`, `nom`, `departement`) VALUES
(1, 'Mohammed', 'Elidrissi', 'SMI'),
(4, 'mohammed', 'laoukili', 'SMI');

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `capacite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `capacite`) VALUES
(5, 'Amphi k', '90'),
(7, '[Amphi G]', '[60]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
