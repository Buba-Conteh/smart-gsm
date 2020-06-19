-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 03:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_gsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `location`, `country`, `updated_at`, `created_at`) VALUES
(1, 'Abdou', 'Jammmeh', 558484, 'abdou@gmail.com', 'landon', 'Gambia', '2020-02-15 16:57:23', '0000-00-00 00:00:00'),
(2, 'Momodou', 'Bah', 5645467, 'bah@smart.com', 'sukuta', 'Gambia', '2020-02-16 06:22:56', '0000-00-00 00:00:00'),
(7, 'Yassin', 'sarr', 3546354, 'y@gmail.com', 'brusubi', 'gambia', '2020-02-18 02:38:38', '0000-00-00 00:00:00'),
(8, 'Ebrima', 'cham', 5345243, 'e@gmail,com', 'serrekunda', 'gambia', '2020-02-18 02:40:22', '0000-00-00 00:00:00'),
(9, 'mariama', 'chorr', 3243532, 'mc@yahoo.com', 'bijilo', 'gambia', '2020-02-18 02:43:10', '0000-00-00 00:00:00'),
(10, 'Isatou', 'Ceesay', 3456786, 'ic@gmail.com', 'Fajikunda', 'gambia', '2020-02-18 02:45:29', '0000-00-00 00:00:00'),
(11, 'Kaddijatou', 'Ceesay', 2354323, 'kc@gmail.com', 'Bijilo', 'gambia', '2020-02-18 02:49:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('sold','available') NOT NULL DEFAULT 'available',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `cost`, `c_id`, `u_id`, `updated_at`, `status`, `created_at`) VALUES
(1, 'samsung', 'j5', 4000, NULL, 1, '2020-02-15 10:52:29', 'sold', '2020-02-15 10:52:29'),
(2, 'samsung', 'j6', 4000, NULL, 1, '2020-02-15 10:53:16', 'sold', '2020-02-15 10:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `amount` int(225) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `amount`, `c_id`, `p_id`, `u_id`, `updated_at`, `created_at`) VALUES
(1, 5777, 1, 1, 1, '2020-02-16 03:28:59', '2020-02-16 03:28:59'),
(2, 3000, 1, 1, 1, '2020-02-16 04:27:33', '2020-02-16 04:27:33'),
(3, 3000, 1, 1, 1, '2020-02-16 04:28:09', '2020-02-16 04:28:09'),
(4, 3000, 1, 1, 1, '2020-02-16 04:28:23', '2020-02-16 04:28:23'),
(5, 3000, 1, 1, 1, '2020-02-16 04:28:32', '2020-02-16 04:28:32'),
(6, 6000, 1, 1, 1, '2020-02-16 04:34:10', '2020-02-16 04:34:10'),
(7, 5777, 1, 1, 1, '2020-02-16 05:05:17', '2020-02-16 05:05:17'),
(8, 3000, 1, 1, 2, '2020-02-16 07:19:57', '2020-02-16 07:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `status` enum('admin','user') NOT NULL DEFAULT 'user',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `phone`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Buba', '', 'Conteh', '5f4dcc3b5aa765d61d8327deb882cf99', 'buba@test.com', 3010451, 'user', '0000-00-00 00:00:00', '2020-02-15 10:08:09'),
(2, 'Momodou', 'A', 'Bah', 'ee11cbb19052e40b07aac0ca060c23ee', 'bah@smart.com', 5645467, 'admin', '0000-00-00 00:00:00', '2020-02-16 06:52:19'),
(3, 'Sulayman', 'M', 'Sawaneh', 'ee11cbb19052e40b07aac0ca060c23ee', 'sawaneh@smart.com', 5646577, 'user', '0000-00-00 00:00:00', '2020-02-17 12:15:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
