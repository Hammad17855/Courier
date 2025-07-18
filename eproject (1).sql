-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 10:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancel_courier`
--

CREATE TABLE `cancel_courier` (
  `cencel_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `sender_number` varchar(20) DEFAULT NULL,
  `addres` text DEFAULT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_number` varchar(20) DEFAULT NULL,
  `r_addres` text DEFAULT NULL,
  `package_weight` decimal(5,2) DEFAULT NULL,
  `package_dec` text DEFAULT NULL,
  `deilvery_date` date DEFAULT NULL,
  `cencel_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancel_courier`
--

INSERT INTO `cancel_courier` (`cencel_id`, `courier_id`, `sender_name`, `sender_email`, `company_name`, `sender_number`, `addres`, `r_name`, `r_number`, `r_addres`, `package_weight`, `package_dec`, `deilvery_date`, `cencel_date`) VALUES
(16, 8, 'hammad', 'hammad1718@gmail.com', 'loepards', '0341239367', 'malir', 'jsk', '0352678899', 'lahore', '5.00', 'dkdlllll', '2025-02-19', '2025-02-17 11:42:24'),
(17, 9, 'hammad', 'hammad1718@gmail.com', 'loupards', '0341239367', 'HYD', 'abdullah', '03212662734', 'sadder', '73.40', 'bike', '2025-02-11', '2025-02-25 14:59:42'),
(18, 10, 'hammad', 'hammad@gmail.com', 'daraz', '03212772396', 'noukot', 'hassan', '03212667477', 'KPO', '2.30', 'toy', '2025-02-23', '2025-02-25 15:00:25'),
(19, 14, 'hammad', 'hammad1718@gmail.com', 'flash', '0341239367', 'lahore', 'obaid', '03212669388', 'karachi', '39.30', 'bike', '2025-02-17', '2025-02-26 11:23:28'),
(20, 16, 'hammad', 'hammad1718@gmail.com', 'loupards', '0341239367', 'saddar', 'abdullah', '03212662938', 'KPO', '29.30', 'tv', '2025-03-24', '2025-03-01 08:33:29'),
(21, 17, 'hammad', 'hammad1718@gmail.com', 'flash', '0341239367', 'HYD', 'waqas', '03212662029', 'metro', '28.20', 'bike', '2025-03-20', '2025-03-05 08:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `submitted_at`, `subject`) VALUES
(1, 'Muhammad Hammad ', 'hammad@gmail.com', 'delay', '2025-02-10 08:33:48', 'shipment');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `courier_id` int(20) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `sender_number` varchar(20) NOT NULL,
  `addres` text NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_number` varchar(20) NOT NULL,
  `r_addres` text NOT NULL,
  `package_weight` decimal(5,2) NOT NULL,
  `package_dec` text NOT NULL,
  `deilvery_date` date NOT NULL,
  `image` blob NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`courier_id`, `sender_name`, `sender_email`, `company_name`, `sender_number`, `addres`, `r_name`, `r_number`, `r_addres`, `package_weight`, `package_dec`, `deilvery_date`, `image`, `agent_name`, `user_id`, `status`) VALUES
(11, 'hammad', 'hammad@gmail.com', 'flash', '03212772396', 'lahore', 'waqas', '0321266332', 'multan', '792.90', 'sports car', '2025-02-24', 0x342e6a666966, 'anumta', 7, 'Completed'),
(12, 'hammad', 'hammad@gmail.com', 'speed', '03212772396', 'karachi', 'abdullah', '03212669999', 'sakkar', '29.30', 'bed', '2025-02-24', 0x322e6a666966, 'anumta', 7, 'Completed'),
(13, 'hammad', 'hammad@gmail.com', 'speed', '03212772396', 'karachi', 'abdullah', '03212669999', 'sakkar', '29.30', 'bed', '2025-02-24', 0x322e6a666966, 'anumta', 7, 'Completed'),
(15, 'hammad', 'hammad1718@gmail.com', 'daraz', '0341239367', 'sadder', 'hassan', '03212663746', 'sakkar', '56.00', 'nice', '2025-02-27', 0x352e6a666966, 'ayesha', 6, 'Completed'),
(18, 'hammad', 'hammad1718@gmail.com', 'daraz', '0341239367', 'noukot', 'waqas', '03212662738', 'sakkar', '450.40', 'car', '2025-03-21', 0x342e6a666966, 'ayesha', 6, 'Pending'),
(19, 'hammad', 'hammad1718@gmail.com', 'flash', '0341239367', 'karachi', 'waqas', '03212662738', 'sadder', '94.40', 'ganetor', '2025-03-22', 0x352e6a666966, 'ahmed', 6, 'Completed'),
(20, 'hammad', 'hammad1718@gmail.com', 'speed', '0341239367', 'noukot', 'waqas', '03212667477', 'multan', '4.40', 'toy cars', '2025-03-29', 0x322e6a666966, 'ahmed', 6, 'Pending'),
(21, 'hammad', 'hammad1718@gmail.com', 'loupards', '0341239367', 'saddar', 'waqas', '03212662398', 'KPO', '54.70', 'bike', '2025-03-20', 0x352e6a666966, 'anumta', 6, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `image` blob NOT NULL,
  `role` varchar(10) NOT NULL,
  `addres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `image`, `role`, `addres`) VALUES
(6, 'hammad', 'hammad1718@gmail.com', '0341239367', '1234', 0x362e6a666966, 'user', 'sadder'),
(7, 'hammad', 'hammad@gmail.com', '03212772396', 'hammad', 0x362e6a666966, 'admin', 'lahore'),
(18, 'ahmed', 'ahmed123@gmail.com', '03212779203', 'hammad', 0x372e6a666966, 'agent', 'quadabad'),
(19, 'anumta', 'anumta123@gmail.com', '03212772200', 'hammad', 0x342e6a666966, 'agent', 'lahore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancel_courier`
--
ALTER TABLE `cancel_courier`
  ADD PRIMARY KEY (`cencel_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`courier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancel_courier`
--
ALTER TABLE `cancel_courier`
  MODIFY `cencel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `courier_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
