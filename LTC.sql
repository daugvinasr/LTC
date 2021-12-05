-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 05, 2021 at 02:16 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LTC`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `message` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_Comment` int(11) NOT NULL,
  `fk_staff` int(11) NOT NULL,
  `fk_visit` int(11) NOT NULL,
  `fk_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`message`, `createdAt`, `id_Comment`, `fk_staff`, `fk_visit`, `fk_patient`) VALUES
('Reikia tokiu ir tokiu tyrimu', '2021-12-05 14:15:49', 34, 15, 21, 17),
('va siunčiu', '2021-12-05 14:15:56', 35, 16, 21, 17),
('gavau ačiū', '2021-12-05 14:16:01', 36, 15, 21, 17);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `specialty` varchar(255) NOT NULL,
  `available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`specialty`, `available`) VALUES
('Kardiologas', 1),
('Okulistas', 1),
('Odontologas', 0),
('Burnos higienistas', 0),
('Kineziterapeutas', 1),
('Neurologa', 0),
('Oftalmologas', 0),
('Pediatras', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('doctor','patient','analyst','admin') NOT NULL,
  `firstLastName` varchar(255) NOT NULL,
  `worksFrom` int(11) DEFAULT NULL,
  `worksTo` int(11) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `role`, `firstLastName`, `worksFrom`, `worksTo`, `specialty`, `id_user`) VALUES
('admin@admin.lt', '$2y$10$8jekQGX8Ir1pmpM0z/xCkO4WNe1rxpSCyHb2mBLIcFP0xZRBlemq6', 'admin', 'Andrius Bagdonas', NULL, NULL, NULL, 14),
('daktaras@daktaras.lt', '$2y$10$ZiuXqAHnn52hqZo0WvzJnOiSzjSAMCDPwRb/a1zgry9EvwrE8Knom', 'doctor', 'Zigmantas Balčytis', 9, 15, 'Kardiologas', 15),
('laborantas@laborantas.lt', '$2y$10$Q.SluI6C6hdgr2jg5sDbqeTUDUujaLEV9hTh26oDYGyJhqjceN9hC', 'analyst', 'Juozas Baublys', NULL, NULL, 'Laborantas', 16),
('tomas@tomas.lt', '$2y$10$ba0YZvoY6Ft3JAJLLFedU./8FRjPLDOjVKkDPYlIkfb5jWQCbCPoi', 'patient', 'Tomas Bičiūnas', NULL, NULL, NULL, 17),
('daktaras2@daktaras2.lt', '$2y$10$ZiuXqAHnn52hqZo0WvzJnOiSzjSAMCDPwRb/a1zgry9EvwrE8Knom', 'doctor', 'Paulius Daktaravičius', 14, 19, 'Kineziterapeutas', 21),
('petras@petras.lt', '$2y$10$vCM/hrfdIRJktuR4tR/79eedc4WUJEMfpVwtHSdPm3PT84iiUbd/2', 'doctor', 'Petras Petravičius', 1, 10, 'Okulistas', 22);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `registrationDate` date NOT NULL,
  `visitDate` date NOT NULL,
  `visitTime` int(11) NOT NULL,
  `analysisRequestedByPatient` tinyint(1) NOT NULL,
  `analysisStatus` enum('notStarted','inLabaratory','sentToDoctor') NOT NULL,
  `id_visit` int(11) NOT NULL,
  `fk_doctor` int(11) NOT NULL,
  `fk_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`registrationDate`, `visitDate`, `visitTime`, `analysisRequestedByPatient`, `analysisStatus`, `id_visit`, `fk_doctor`, `fk_patient`) VALUES
('2021-11-29', '2021-11-29', 13, 1, 'inLabaratory', 21, 15, 17),
('2021-12-05', '2021-12-23', 14, 1, 'notStarted', 22, 15, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_Comment`),
  ADD KEY `fk_staff` (`fk_staff`),
  ADD KEY `fk_visit` (`fk_visit`),
  ADD KEY `fk_patient` (`fk_patient`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id_visit`),
  ADD KEY `fk_doctor` (`fk_doctor`),
  ADD KEY `fk_patient` (`fk_patient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_Comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id_visit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`fk_staff`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`fk_visit`) REFERENCES `visits` (`id_visit`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`fk_patient`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`fk_doctor`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`fk_patient`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
