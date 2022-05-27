-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 07:55 AM
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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date_hired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `middle_name`, `last_name`, `pos_id`, `dept_id`, `email`, `birth_date`, `age`, `gender`, `civil_status`, `religion`, `contact_number`, `address`, `date_hired`) VALUES
(1, 'Super', 'Owner', 'Admin', 1, 1, '', '0000-00-00', 0, '', '', '', '', '', '0000-00-00'),
(30330028, 'aldrich', 'lim', 'ramos', 1, 1, 'darryl917deleon@gmail.com', '1997-12-30', 24, 'Male', 'Single', 'catholic', '2147483647', 'maysan valenzuela city', '2022-03-20'),
(30330030, 'alvin', 'barruga', 'vidal', 1, 1, 'alvinvidal@gmail.com', '1996-12-11', 25, 'Male', 'Single', 'catholic', '2147483647', 'brgy concepcion gulayan malabon city', '2022-04-02'),
(30330035, 'benjie', 'toledo', 'cruz', 1, 1, 'benjtol@gmail.com', '1993-01-03', 29, 'Male', 'Single', 'Catholic', '2147483647', 'Masinag Antipolo City', '2022-04-08'),
(30330036, 'maria', 'luna', 'juana', 1, 1, 'miguelbucao@gmail.com', '1998-02-14', 24, 'Male', 'Single', 'catholic', '2147483647', 'brgy concepcion gulayan Malabon City', '2022-04-13'),
(30330037, 'james', 'carter', 'ian', 1, 1, 'ianjames@gmail.com', '2000-12-25', 21, 'male', 'single', 'catholic', '5', 'quezon city', '2018-04-16'),
(30330038, 'eric', 'siga', 'cabrillos', 1, 1, 'cabrilloseric@gmail.com', '2000-06-19', 21, 'male', 'single', 'catholic', '09537496312', 'quezon city', '2020-07-23'),
(30330039, 'ian', 'lebron', 'james', 1, 1, 'james@gmail.com', '1999-05-07', 22, 'male', 'single', 'catholic', '09573658263', 'quezon city', '2017-09-18'),
(30330041, 'mae', 'ann', 'caunca', 1, 1, 'cauncamae@gmail.com', '2001-04-23', 21, 'female', 'married', 'catholic', '09123456778', 'quezon city', '2021-02-19'),
(30330042, 'peter', 'fly', 'pan', 1, 1, 'peterpan@gmail.com', '1997-06-06', 24, 'male', 'single', 'catholic', '09237538475', 'quezon city', '2017-05-19'),
(30330043, 'dexter', 'a.', 'gabule', 1, 1, 'lilgabs08@gmail.com', '1999-08-11', 22, 'male', 'single', 'catholic', '09098374504', 'talisay street', '2022-04-30'),
(30330044, 'julius', 'a.', 'talion', 1, 1, 'lilgabs08@gmail.com', '1999-11-01', 22, 'male', 'single', 'catholic', '09098374504', 'sapphire', '2022-04-30'),
(30330046, 'julius', 'julius', 'talion', 1, 1, 'taliom@gmail.com', '2000-05-16', 21, 'male', 'single', 'catholic', '09583759534', 'quezon city', '2021-04-18'),
(30330047, 'Paul', 'B', 'Din', 1, 1, 'pauldin0416@gmail.com', '2000-04-16', 22, 'Male', 'Single', 'Catholic', '09991760132', 'Mulawinan Valenzuela', '2022-05-03'),
(30330048, 'EmEm', 'c.', 'Adarayan', 1, 1, 'cassey123@gmail.com', '1999-08-11', 22, 'female', 'single', 'catholic', '09098374504', 'afafafafafa', '0000-00-00'),
(30330049, 'aldrin', 'gladys', 'hr2', 25, 2, 'hr2@gmail.com', '2000-04-04', 22, 'male', 'single', 'catholic', '09878473436', 'quezon city', '2021-10-07'),
(30330051, 'jiraiyah', 'sanin', 'golib', 1, 1, 'jiraiyah623@gmail.com', '2000-02-07', 22, 'Male', 'Single', 'catholic', '09123846012', 'caloocan city', '2022-05-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `FK_pusi` (`pos_id`),
  ADD KEY `FK_deeeeept` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30330052;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `FK_deeeeept` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pusi` FOREIGN KEY (`pos_id`) REFERENCES `positions` (`pos_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
