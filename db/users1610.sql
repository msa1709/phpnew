-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 06:50 PM
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
-- Database: `loginreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Trash` smallint(6) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `user_type`, `created_at`, `updated_on`, `Trash`, `profile_image`) VALUES
(9, 'aravind', 'ara@gmail.com', '$2y$10$Tv9B6WtDLdLUZcXT7/nYOOwmciAXtSWByC.Pe4BhbHpj4Sm42ojW6', 'user', '2024-10-08 15:40:51', '0000-00-00 00:00:00', 0, ''),
(10, 'kum', 'kum@gmail.com', '$2y$10$CAyvYfzanHXX2xKGKqs2EeLqpPgGGHLZRiml1RQ2ZyuejzTcbr3R.', 'admin', '2024-10-08 15:40:51', '0000-00-00 00:00:00', 0, ''),
(11, 'kisg', 'krish@gmail.com', '$2y$10$bYfU8HQnyCHfEfmgRULGjOrB/RAFW71kzm7Z2pDwEDOxgXPMKbiZi', 'admin', '2024-10-08 15:40:51', '0000-00-00 00:00:00', 0, ''),
(12, 'angelo', 'angelo@gmail.com', '$2y$10$mSu/meeKf17AUGwrc.qWEea1ure3FNPwWNhsG5HJDWCWHt8cvESWu', 'admin', '2024-10-08 15:40:51', '0000-00-00 00:00:00', 0, ''),
(13, 'sundar', 'sundar@gmail.com', '$2y$10$ivNV4aADL/08eawbXDrf7.4ANPMvYlTbW2NpNT78UGA7KA6YwLWma', 'user', '2024-10-16 07:58:40', '2024-10-16 07:58:40', 0, '670f723095e7f0.70105306.jpg'),
(14, 'manish', 'manish@gmail.com', '$2y$10$KFyD6JvjNyCGCfbxVhTd8OXkklI2TQFxnZtOd1jhTpkflM6jFAfcm', 'user', '2024-10-16 08:07:29', '2024-10-16 08:07:29', 0, '670f744159e3d5.83170512.png'),
(15, 'jan', 'jan@gmail.com', '$2y$10$wx3WwDEJkszgzHSZohmqieTXcil1BGFbztfQPxf7an4adu2DDngKO', 'admin', '2024-10-16 15:29:04', '2024-10-16 15:29:04', 0, 'uploads/670fdbc0118878.71567524.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
