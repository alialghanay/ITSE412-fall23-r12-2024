-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 03:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rppp`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(50) DEFAULT NULL,
  `publish_number` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `j_id` int(11) NOT NULL,
  `jname` varchar(100) DEFAULT NULL,
  `jphoto` mediumblob DEFAULT NULL,
  `jdesc` text DEFAULT NULL,
  `daysallowed` int(11) DEFAULT NULL,
  `c_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `biography` text DEFAULT NULL,
  `work` varchar(50) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `country` varchar(35) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `title` varchar(35) DEFAULT NULL,
  `j_id` int(11) DEFAULT NULL,
  `roles` int(11) NOT NULL,
  `lan1` varchar(10) DEFAULT NULL,
  `lan2` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `p_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `file` longblob DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `state` text DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `lan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `j_id` (`j_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `app_id` (`app_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `j_id` (`mem_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `members` (`j_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `papers` (`p_id`),
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`app_id`) REFERENCES `applications` (`app_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
