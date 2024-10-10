-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2024 at 08:18 AM
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
-- Database: `pininfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mobileno` decimal(10,0) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `profilephoto` varchar(500) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `username`, `password`, `mobileno`, `emailid`, `profilephoto`, `status`, `cdate`) VALUES
(4, 'Maa sita', 'Sita', 'ram', 222222222, 'sitaben@gmail.com', '../image/adminphotos/admin.jpeg', 1, '2024-05-28 07:43:10'),
(7, 'krish patel', 'KRish OP', 'krish', 7383660477, 'coc.cg2@gmail.com', '../image/adminphotos/ram.png', 1, '2024-05-28 10:31:35'),
(12, 'Bhupendra', 'bhupen', 'bhupen', 1212121212, 'bhupen@gmail.com', '../image/adminphotos/admin3.jpeg', 1, '2024-05-29 05:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrequest`
--

INSERT INTO `tblrequest` (`id`, `userid`, `pincode`, `message`, `photo`, `status`, `cdate`) VALUES
(5, '1', '1001', 'hi', '../image/problemphotos/BSonoma_Mac.png', '1', '2024-06-11 11:21:37'),
(6, '1', '123', 'Sp is not there', '../image/problemphotos/DSC_1392.JPG', '1', '2024-06-11 11:33:26'),
(7, '1', '1234', 'HIIII Testing', '../image/problemphotos/squirrel_2-wallpaper-1440x900.jpg', '1', '2024-06-11 11:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblsp`
--

CREATE TABLE `tblsp` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `pincode` decimal(6,0) DEFAULT NULL,
  `mobileno` decimal(10,0) DEFAULT NULL,
  `profilephoto` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsp`
--

INSERT INTO `tblsp` (`id`, `name`, `username`, `password`, `email`, `birthdate`, `gender`, `city`, `state`, `address`, `pincode`, `mobileno`, `profilephoto`, `status`, `cdate`) VALUES
(1, 'billu hai mai', 'BilluBHAI', 'billu', 'billu@12.com', '1111-11-11', '2', 'near home', '2', 'in usa', 1001, 1000, '../image/spphotos/admin2.jpeg', 1, '2024-05-29 04:33:37'),
(2, 'p', 'p', 'p', 'p@gmail.cmo', '2222-02-22', '1', 'p', 'p', 'p', 2, 2, '../image/spphotos/admin.jpeg', 1, '2024-06-10 11:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `pincode` decimal(6,0) DEFAULT NULL,
  `mobileno` decimal(10,0) DEFAULT NULL,
  `profilephoto` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `fname`, `lname`, `email`, `birthdate`, `gender`, `city`, `state`, `address`, `pincode`, `mobileno`, `profilephoto`, `status`, `cdate`) VALUES
(1, 'KrishOPBHAI', 'csk', 'kr', 'pa', 'coc.cg2@gmail.cop', '1111-11-11', '2', 'ahmedabad', '2', 'B-51 ,pramukh dham society', 777777, 1010101010, '../image/userphotos/user2.jpeg', 1, '2024-05-29 11:31:52'),
(3, 'BHUPENop', 'bhupen', 'bhupendra', 'patel', 'bhupen@gmail', '4567-03-12', '1', 'vadodara', '1', 'opp yash complex', 390021, 9664937357, '../image/userphotos/ram.png', 1, '2024-05-31 01:39:23'),
(4, 'k', 'k', 'k', 'k', 'k@gmail.com', '1111-11-11', '1', 'k', 'k', 'k', 1, 1, '../image/userphotos/admin3.jpeg', 1, '2024-06-10 11:49:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsp`
--
ALTER TABLE `tblsp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsp`
--
ALTER TABLE `tblsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
