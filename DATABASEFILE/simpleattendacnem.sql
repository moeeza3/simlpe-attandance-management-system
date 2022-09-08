-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 01:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleattendacnem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'moeez', 'moeeza3@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_present` varchar(50) NOT NULL,
  `student_date` date NOT NULL,
  `attdno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stdattandance`
--

CREATE TABLE `stdattandance` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_present` varchar(50) NOT NULL,
  `student_date` date NOT NULL,
  `attdno` int(11) NOT NULL,
  `sstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdattandance`
--

INSERT INTO `stdattandance` (`student_id`, `student_name`, `student_present`, `student_date`, `attdno`, `sstatus`) VALUES
(8, 'Ali Ahmad Farooq', 'present', '2022-08-28', 76, ''),
(8, 'Ali Ahmad Farooq', 'present', '2022-08-29', 80, ''),
(11, 'nanan', 'absent', '2022-08-29', 81, ''),
(14, 'ss', 'leave', '2022-08-29', 82, ''),
(13, 'xxsdwds', 'absent', '2022-08-29', 83, ''),
(8, 'Ali Ahmad Farooq', 'absent', '2022-09-03', 91, ''),
(8, 'Ali Ahmad Farooq', 'present', '2022-09-07', 102, '');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_mark` tinyint(1) NOT NULL,
  `student_tel` int(11) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `student_detail` varchar(255) NOT NULL,
  `student_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`student_id`, `student_name`, `student_email`, `student_password`, `student_mark`, `student_tel`, `student_address`, `student_image`, `student_detail`, `student_status`) VALUES
(8, 'Ali Ahmad Farooq', 'aaf@gmail.com', '3456', 0, 2147, 'abcd786', 'pexels-laura-penwell-3608056.jpg', '', '0'),
(11, 'nanan khan', 'nanan@gmail.com', '8998', 0, 2147483647, 'xyz', 'screencapture-moeeza3-github-io-Signup-Form-with-Formik-Yup-2022-07-25-18_05_16.png', 'sasasas', '0'),
(13, 'xxsdwds', 'sg@gmail.com', 'dgsg', 0, 2147483647, 'jkcjsjkhj', 'screencapture-moeeza3-github-io-Signup-Form-with-Formik-Yup-2022-07-25-18_05_16.png', 'eerr', '1'),
(14, 'ss', 'ss@gmail.com', 'ssss', 0, 2147483647, 'ssssss', '15186165_5566879 (1).jpg', 'fedg', '0'),
(21, 'Moeez Ahmad', 'moeeza3@gmail.com', '123', 0, 2147483647, 'xyz street no. 1, rawalpindi', '3.jpg', '', '1'),
(22, 'a', 'a@gmail.com', 'aaa', 0, 33455, 'abcd123', '', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`attdno`);

--
-- Indexes for table `stdattandance`
--
ALTER TABLE `stdattandance`
  ADD PRIMARY KEY (`attdno`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `attdno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `stdattandance`
--
ALTER TABLE `stdattandance`
  MODIFY `attdno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
