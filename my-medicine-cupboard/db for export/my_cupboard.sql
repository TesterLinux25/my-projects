-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 11:48 AM
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
-- Database: `my_cupboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicins`
--

CREATE TABLE `medicins` (
  `id` int(6) NOT NULL,
  `id_username` int(6) NOT NULL,
  `name_m` varchar(100) NOT NULL,
  `quantity` int(3) NOT NULL,
  `notes` text NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicins`
--

INSERT INTO `medicins` (`id`, `id_username`, `name_m`, `quantity`, `notes`, `expire_date`) VALUES
(7, 2, 'paracetamol', 3, 'tablet 500mg', '2025-03-28'),
(10, 2, 'gaviscon', 3, 'bottle 300ml', '2032-03-19'),
(11, 3, 'paracetamol', 2, 'tablet 500mg', '2025-03-03'),
(12, 5, 'aspirin', 1, 'tablet 500mg', '2025-03-04'),
(13, 6, 'otrivine', 1, 'bottle', '2027-03-17'),
(14, 3, 'metformin', 1, 'tablet 500mg', '2025-03-11'),
(16, 7, 'paracetamol', 5, '500 mg', '0000-00-00'),
(17, 7, 'Otrivine', 1, 'box', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(2, 'unu', '123', 'unu@unu.com'),
(3, 'doi', '123', 'doi@doi.com'),
(4, 'trei', '123', 'trei@trei.com'),
(5, 'cinci', '123', 'cinci@cinci.com'),
(6, 'sase', '123', 'sase@sase.com'),
(7, 'noua', '$2y$10$BPAL4yugGemr/O48LzurBOiWwok0QOBr7PMxX61uekBVNduZ4A.AG', 'sebastyanionut@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicins`
--
ALTER TABLE `medicins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_username` (`id_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicins`
--
ALTER TABLE `medicins`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
