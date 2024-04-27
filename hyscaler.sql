-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 11:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyscaler`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `employeeid` varchar(40) NOT NULL,
  `joining_date` date NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `employeeid`, `joining_date`, `password`) VALUES
(1, 'Rashmi Ranjan Rout', 'rashmiranjana.rout2001@gmail.com', '21q3w', '2024-04-17', 'qwerty'),
(2, 'Sujit Sahoo', 'sujit@gmail.com', '1q2w3e', '2024-01-02', 'sujit');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages`
--

CREATE TABLE `holiday_packages` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `amenities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday_packages`
--

INSERT INTO `holiday_packages` (`id`, `holiday_name`, `duration`, `destination`, `location`, `amenities`) VALUES
(1, 'Basic', 2, 'India', 'Manali', '2* Staying, No Cab service, No Guide'),
(2, 'Gold', 4, 'Indonesia', 'Bali', '3* Staying, Day Cab service, 1 Guide'),
(3, 'Diamond', 7, 'USA', 'New York', '5* Staying, 24*7 Cab service, 1 Guide');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(40) NOT NULL,
  `employeeid` varchar(50) NOT NULL,
  `total_sale` int(40) NOT NULL,
  `incentive` varchar(30) NOT NULL,
  `bonus` varchar(30) NOT NULL,
  `holiday` varchar(40) NOT NULL,
  `holiday_package` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `employeeid`, `total_sale`, `incentive`, `bonus`, `holiday`, `holiday_package`) VALUES
(1, '21q3w', 62000, '5', '0', 'Yes', 'Gold'),
(2, '1q2w3e', 70000, '5', '0', 'Yes', 'Diamond');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_packages`
--
ALTER TABLE `holiday_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holiday_packages`
--
ALTER TABLE `holiday_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
