-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 01:39 AM
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
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `task` varchar(255) DEFAULT NULL,
  `status` enum('pending','completed','deleted') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `task`, `status`) VALUES
(40, 'makan bakso', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'ricky', '$2y$10$DqcFWB7HbkugfuxfASBRDOF2tQmLJDIlrN2ur3mDJROoDI3vi/Mpm'),
(3, 'jeje', '$2y$10$/oyf0q.CydKCPvSMjmq2Iud3sKAqq.y9II7rhuZFhU75X1dA6BHRi'),
(5, 'sonny', '$2y$10$BN5XOcAMCSGbdRCHzgsl9.4ow11vYmU0atYncnYEwice3puxyi0Om'),
(6, 'rizi', '$2y$10$LLjZ2f8xttoB3EJ4ABO5jukNwjZD1uYO7NtqH1WkGdlCrN2WmGnli'),
(7, 'ax', '$2y$10$zV.mq7Hqu4/N./UdJJ0mZumP1KC5u/himx1nTT6XsFnyZhkwZnaqm'),
(9, 'anje', '$2y$10$amuh9mMNN8OQwh0WO0ZKqOHhJCZU4I5nizJ72Ft8ZAc2F0xNRRoI6'),
(11, 'lol', '$2y$10$psz2WZFI3iucv.SZjSi7wuDOKp7y13ysKJqcM8RSgoLPzHuer3yWS'),
(12, 'admin', '$2y$10$69DEzkfkd5ndqVcluQ8/IeaSVdj5UVN/z8U3LAdome1HnhH548yfG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
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
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
