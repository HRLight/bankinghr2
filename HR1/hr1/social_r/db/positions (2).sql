-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 07:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eis`
--

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`pos_id`, `pos_name`, `dept_id`) VALUES
(1, 'recruitment_staff', 1),
(2, 'applicant_managing_staff', 1),
(3, 'onboarding_staff', 1),
(4, 'performance_monitoring_staff', 1),
(5, 'social_recognition_staff', 1),
(6, 'hr1_manager', 1),
(7, 'administrative_manager', 5),
(8, 'administrative_staff', 5),
(9, 'hr4_manager', 4),
(10, 'hr4_staff', 4),
(11, 'financials_manager', 10),
(12, 'collection_officer', 10),
(13, 'disbursement_officer', 10),
(14, 'bookeeper', 10),
(15, 'budget_officer', 10),
(20, 'core1_manager', 6),
(21, 'core1_staff', 6),
(22, 'core2_manager', 7),
(23, 'Teller', 7),
(24, 'hr2_manager', 2),
(25, 'hr_officer', 2),
(26, 'training_officer', 2),
(27, 'logistics2_manager', 9),
(28, 'fleet manager', 9),
(29, 'logistics staff', 9),
(30, 'vendor manager', 9),
(31, 'driver', 9),
(32, 'logistcs manager', 8),
(33, 'logistics staff', 8),
(36, 'hr3 manager', 3),
(37, 'hr3 staff', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `FK_dept` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `FK_dept` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
