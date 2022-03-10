-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 04:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `headline` varchar(150) NOT NULL,
  `blog_text` text NOT NULL,
  `is_hidden` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author`, `headline`, `blog_text`, `is_hidden`) VALUES
(1, 'Admin', 'This is testing blog', 'This is testing data. This is just for fun', 0),
(2, 'Admin', 'This is another testing blog', 'This is another testing data.', 0),
(3, 'harsh', 'Blog by Harsh', 'temp daaabil ainrpif aiewnfaer aierfnaipeub temp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeubtemp daaabil ainrpif aiewnfaer aierfnaipeub', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_active`) VALUES
(1, 'harsh', 'harsh@gmail.com', '123456', 0),
(3, 'Nisarg', 'nisarg@gmail.com', '123456', 0),
(4, 'Krish', 'krish@gmail.com', '123456', 0),
(5, 'hardik', 'hardik@gmail.com', '123456', 0),
(6, 'Admin', 'admin@gmail.com', 'admin', 1),
(7, 'dittu', 'dittu@gmail.com', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
