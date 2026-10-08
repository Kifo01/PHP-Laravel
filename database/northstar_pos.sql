-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 08, 2026 at 12:59 AM
-- Server version: 8.0.44
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `northstar_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Julian Gaspar', 'julian.gaspar@example.com', '09172458103', '2026-10-03 10:37:31'),
(2, 'Sheuka Magadia', 'sheuka.magadia@example.com', '09285167742', '2026-10-03 10:37:31'),
(3, 'Bjork Maniego', 'bjork.maniego@example.com', '09953081264', '2026-10-03 10:37:31'),
(4, 'Paul Agapay', 'paul.agapay@example.com', '09186634920', '2026-10-03 10:37:31'),
(5, 'Drei Hernandez', 'drei.hernandez@example.com', '09067315589', '2026-10-03 10:37:31'),
(6, 'Virgilio Marquez', 'vmmarquez@fit.edu.ph', '09123457678', '2026-10-08 08:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin.vmarquez', 'Virgilio Marquez Jr.', '1791420250_8f42f20469ef6517ddbd.jpeg', '2026-10-03 10:37:31'),
(2, 'joro.soriano', 'Joro Soriano', '1791420560_de33f8fbc6fcf036bc95.png', '2026-10-03 10:37:31'),
(3, 'harvey.espenilla', 'Harvey Espenilla', NULL, '2026-10-03 10:37:31'),
(4, 'marc.deangel', 'Marc De Angel', '1791420408_b8b594b7b9974eb14abe.jpg', '2026-10-03 10:37:31'),
(5, 'iggy.durana', 'Iggy Durana', NULL, '2026-10-03 10:37:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
