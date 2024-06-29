SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `vtc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vtc`;

CREATE TABLE `vtc_association` (
  `id` int(11) NOT NULL,
  `conducteur` int(11) NOT NULL,
  `vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `vtc_conducteur` (
  `id` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `vtc_vehicule` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `immatriculation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `vtc_association`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conduc` (`conducteur`),
  ADD KEY `vehicule` (`vehicule`);

ALTER TABLE `vtc_conducteur`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vtc_vehicule`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `vtc_association`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `vtc_conducteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `vtc_vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `vtc_association`
  ADD CONSTRAINT `conduc` FOREIGN KEY (`conducteur`) REFERENCES `vtc_conducteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicule` FOREIGN KEY (`vehicule`) REFERENCES `vtc_vehicule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
