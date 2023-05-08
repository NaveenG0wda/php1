-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 07:13 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basv_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `basv_2023_appointment`
--

CREATE TABLE `basv_2023_appointment` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `prescription` text NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basv_2023_appointment`
--

INSERT INTO `basv_2023_appointment` (`id`, `uid`, `name`, `email`, `phone`, `gender`, `age`, `doctor`, `date`, `problem`, `prescription`, `amount`, `status`) VALUES
(6, 'uid_2c1acc2983', 'patient', 'patient@patient.com', '9876543210', 'male', '29', 'doctor@doctor.com', '2023-03-19', 'Problem', '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `basv_2023_doctor`
--

CREATE TABLE `basv_2023_doctor` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basv_2023_doctor`
--

INSERT INTO `basv_2023_doctor` (`id`, `uid`, `name`, `email`, `password`, `phone`, `specialization`) VALUES
(3, 'uid_ba513345ff', 'doctor', 'doctor@doctor.com', 'doctor', '9876543212', 'neurology');

-- --------------------------------------------------------

--
-- Table structure for table `basv_2023_nurse`
--

CREATE TABLE `basv_2023_nurse` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basv_2023_nurse`
--

INSERT INTO `basv_2023_nurse` (`id`, `uid`, `name`, `email`, `password`, `phone`, `status`) VALUES
(1, 'uid_eae7727da8', 'nurse', 'nurse@nurse.com', 'nurse', '9876543213', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `basv_2023_patient`
--

CREATE TABLE `basv_2023_patient` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basv_2023_patient`
--

INSERT INTO `basv_2023_patient` (`id`, `uid`, `name`, `email`, `password`, `phone`, `age`, `gender`) VALUES
(5, 'uid_39e21cbfc7', 'patient', 'patient@patient.com', 'patient', '9876543210', '29', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `basv_2023_receptionist`
--

CREATE TABLE `basv_2023_receptionist` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basv_2023_receptionist`
--

INSERT INTO `basv_2023_receptionist` (`id`, `uid`, `name`, `email`, `password`, `phone`, `status`) VALUES
(1, 'uid_9993543309', 'receptionist', 'receptionist@receptionist.com', 'receptionist', '9876543210', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basv_2023_appointment`
--
ALTER TABLE `basv_2023_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basv_2023_doctor`
--
ALTER TABLE `basv_2023_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basv_2023_nurse`
--
ALTER TABLE `basv_2023_nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basv_2023_patient`
--
ALTER TABLE `basv_2023_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basv_2023_receptionist`
--
ALTER TABLE `basv_2023_receptionist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basv_2023_appointment`
--
ALTER TABLE `basv_2023_appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `basv_2023_doctor`
--
ALTER TABLE `basv_2023_doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `basv_2023_nurse`
--
ALTER TABLE `basv_2023_nurse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basv_2023_patient`
--
ALTER TABLE `basv_2023_patient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `basv_2023_receptionist`
--
ALTER TABLE `basv_2023_receptionist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
