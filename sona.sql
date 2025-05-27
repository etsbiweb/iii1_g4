-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 11:29 PM
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
-- Database: `sona`
--

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id` int(11) NOT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `broj_gostiju` int(11) DEFAULT NULL,
  `apartman` varchar(100) DEFAULT NULL,
  `id_usera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lozinka` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `lozinka`, `created_at`) VALUES
(1, 'Amer Velagic', 'amer.smajo.ajdo@gmail.com', '$2y$10$dHf3FM2F7PYaUD1y03NSz.Z6i/Yh54mPxmSP.8JsXdTumpytt2BC6', '2025-05-26 21:31:18'),
(2, 'amel ckapara', 'amelamel@gmail.com', '$2y$10$DjkU2s3UkNGqy9pxtN6Gle2y0TSojFxDXK/gKU9Wwz3bGTCSwGvLm', '2025-05-26 21:34:55'),
(3, 'amel ckapara', 'amelamell@gmail.com', '$2y$10$GWaJtzfm59z/Cxg4aM8Le.yNr7PPiF4sj8edZmrr8rJWcbB0e4oxi', '2025-05-26 21:36:15'),
(4, 'amel ckapara', 'amelamelll@gmail.com', '$2y$10$YPiZAhoV94MtVdJpnQCBt.UbgBkjf1ihDau8C.fbUinBTumBpRLDW', '2025-05-26 21:37:45'),
(5, 'amel ckapara', 'amelaamelll@gmail.com', '$2y$10$nBnGKIR4Mgstoeoo3ZZzfe2HpctC9H3EoL2TyqT8wIr8SN6cyjucq', '2025-05-26 21:38:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usera` (`id_usera`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD CONSTRAINT `rezervacije_ibfk_1` FOREIGN KEY (`id_usera`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
