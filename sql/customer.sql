-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 08:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppn`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(150) NOT NULL,
  `customer_country` varchar(30) NOT NULL,
  `customer_city` varchar(30) NOT NULL,
  `customer_contact` varchar(15) NOT NULL,
  `customer_image` varchar(100) DEFAULT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `user_role`) VALUES
(1, 'Fabrice mukarage', 'fabrice.mukarage@gmail.com', '$2y$10$/K52yLp3BW0eU.zBId0NC.Q8EtopIJ2A0.wGyLuOFY355C/hf2VxK', 'Rwanda', 'Kigali', '0783932356', NULL, 0),
(2, 'Eric mukama', 'fabrice.mukarage@outlook.com', '$2y$10$NaV1jhU4ehjTrruljr5t7emIM1SscJP.OHvXPNFZ26vckAUANNNTu', 'Rwanda', 'Kigali', '014778747', NULL, 0),
(3, 'Shema placide', 'shema.placide@gmail.com', '$2y$10$hasnmxJbfH9rwQc7vEM3aO8dZw346wu7rx7OOxLCrjaYbGkkxJ8fy', 'Rwanda', 'Accra', '0784578877', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
