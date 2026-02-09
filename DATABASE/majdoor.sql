-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 02:02 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `sr` int(250) NOT NULL,
  `app_id` varchar(250) NOT NULL,
  `job_id` varchar(250) NOT NULL,
  `apply_name` varchar(250) NOT NULL,
  `apply_phone` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `host_name` varchar(250) NOT NULL,
  `host_phone` varchar(250) NOT NULL,
  `type_work` varchar(250) NOT NULL,
  `payout` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `sr` int(250) NOT NULL,
  `id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `type_work` varchar(250) NOT NULL,
  `no_of_work` varchar(250) NOT NULL,
  `payout` text NOT NULL,
  `time` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`sr`, `id`, `name`, `phone`, `address`, `type_work`, `no_of_work`, `payout`, `time`, `state`, `city`, `date`) VALUES
(3, 'JOB109308', 'Kunal Deore', '8668595307', 'Mahatma Nagar near bhonsala hostel', 'Plumber', '1', '350&#8377', '4', 'Maharashtra', 'Nasik', 'Monday 19 April 2021 12:57:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sr` int(250) NOT NULL,
  `id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `register_date` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sr`, `id`, `name`, `phone`, `password`, `register_date`, `type`) VALUES
(25, 'MAJ7801', 'Kunal Deore', '8668595307', '202cb962ac59075b964b07152d234b70', 'Monday 19 April 2021 12:55:03 PM', 'Contactor'),
(26, 'MAJ1972', 'Harshal ', '8668595308', '202cb962ac59075b964b07152d234b70', 'Monday 19 April 2021 12:56:02 PM', 'Majdoor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sr`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `sr` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `sr` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sr` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
