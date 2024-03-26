-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 01:09 PM
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
-- Database: `power`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminadmin');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` bigint(20) NOT NULL,
  `userid` int(20) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `total_amt` double NOT NULL,
  `payment_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `userid`, `uname`, `payment_date`, `total_amt`, `payment_detail`) VALUES
(2, 1, NULL, '0000-00-00', 2024, 'a:4:{s:11:\"card_holder\";s:5:\"sapna\";s:11:\"card_number\";s:13:\"1234567890123\";s:10:\"cvv_number\";s:3:\"333\";s:11:\"expiry_date\";s:7:\"2024-08\";}'),
(3, 1, NULL, '2024-01-14', 5000, 'a:4:{s:11:\"card_holder\";s:5:\"sapna\";s:11:\"card_number\";s:13:\"2144234325235\";s:10:\"cvv_number\";s:3:\"888\";s:11:\"expiry_date\";s:7:\"2024-04\";}'),
(4, 2, 'hritik sin', '2024-01-14', 5000, 'a:4:{s:11:\"card_holder\";s:5:\"deepu\";s:11:\"card_number\";s:10:\"1234567890\";s:10:\"cvv_number\";s:3:\"777\";s:11:\"expiry_date\";s:7:\"2024-08\";}');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phno` int(10) NOT NULL,
  `doc` varchar(30) DEFAULT NULL,
  `userlogin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`id`, `name`, `address`, `email`, `phno`, `doc`, `userlogin_id`) VALUES
(1, 'sapna', 'Lalwani', 'sapcom1999@gmail.com', 2147483647, 'uploads/income.pdf', 1),
(2, 'hritik sin', 'dhanori', 'admin@gmail.com', 2147483647, 'uploads/Bill.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `username`, `password`) VALUES
(1, 'sapna', '12345'),
(2, 'inox', '123456'),
(3, 'deepu', '098765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userlogin_id` (`userlogin_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdetail` (`id`);

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `userdetail_ibfk_1` FOREIGN KEY (`userlogin_id`) REFERENCES `userlogin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
