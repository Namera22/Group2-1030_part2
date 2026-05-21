-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 08:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_members`
--

CREATE TABLE `about_members` (
  `member_id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contribution` text DEFAULT NULL,
  `translation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_members`
--

INSERT INTO `about_members` (`member_id`, `student_id`, `image`, `contribution`, `translation`) VALUES
(1, '103815210', 'images/Member1.png', 'I have contributed to the index.html page, including layout structure, navigation bar, hero section, maintaining consistency, and accessibility features. \"চেষ্টা করলে সব সম্ভব\"', 'Translation: With effort, everything is possible.'),
(2, '103534492', 'images/Member2.png', 'I have contributed on the jobs.html page for this project. \"ইট মারলে পাটকেল খেতে হয়।\"', 'Translation: If you throw a brick at someone, you will also be hit by a brick at some point.'),
(3, '106319524', 'images/Member3.png', 'I have contributed to the apply.html application page. I have made a form for users to fill out with their details for joining the smart city infrastructure consultancy team. \"Palos y piedras pueden romper mis huesos, pero las palabras nunca me harán daño\"', 'Translation: Sticks and stones may break your bones but words can never hurt you!'),
(4, '106504032', 'images/Member4.png', 'I worked on the About.html page(this one!), \"強力な労働力の鍵はオープンなコミュニケーションです\"', 'Translation: The key to a strong workforce is open communication.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_members`
--
ALTER TABLE `about_members`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_members`
--
ALTER TABLE `about_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
