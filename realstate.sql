-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 07:48 AM
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
-- Database: `realstate`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(151) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `flag`) VALUES
(1, 'Office Space', 1),
(2, 'Apartment', 1),
(3, 'Mini Apartment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `replay` text NOT NULL,
  `message_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `replay_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(151) NOT NULL,
  `email` varchar(151) NOT NULL,
  `phone` varchar(151) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(151) NOT NULL,
  `floar` varchar(255) NOT NULL,
  `flatcode` varchar(151) DEFAULT NULL,
  `sqft` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(191) NOT NULL,
  `discount` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bed_room` int(11) NOT NULL,
  `living_room` int(11) NOT NULL,
  `kitchen` int(11) NOT NULL,
  `parking` int(11) NOT NULL,
  `toilet` int(11) NOT NULL,
  `division` varchar(155) NOT NULL,
  `location` varchar(191) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `image_one` varchar(191) NOT NULL,
  `image_two` varchar(191) NOT NULL,
  `image_three` varchar(191) NOT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `belkuni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `cat_id`, `title`, `floar`, `flatcode`, `sqft`, `description`, `price`, `discount`, `status`, `quantity`, `bed_room`, `living_room`, `kitchen`, `parking`, `toilet`, `division`, `location`, `agent_id`, `image_one`, `image_two`, `image_three`, `document_file`, `belkuni`) VALUES
(1, 3, 'xumyzisupo@mailinator.com', 'jufemo@mailinator.com', '1731302660', '847', 'Ad itaque laboris la', '10000000', '5', 1, 1, 2, 2, 1, 1, 3, 'Khulna', 'vywofaz@mailinator.com', 7, 'images/0a7ae0f751.png', 'images/0a7ae0f751a.png', 'images/0a7ae0f751a7.png', 'images/3bc8c7d116ca.pdf', 2),
(2, 2, 'ryrtewrew', 'f4 left ', '1731306067', '201', 'Error dolores dolore', '639555', '5', 0, 1, 2, 6, 1, 1, 3, 'Dhaka', 'mailinator.com', 7, 'images/72df725bd5.png', 'images/72df725bd55.png', 'images/72df725bd554.png', 'images/72df725bd554.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `division` varchar(155) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(190) DEFAULT NULL,
  `admin_log` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `otp`, `status`, `password`, `about_me`, `division`, `address`, `image`, `admin_log`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 1701273268, 'admin', '12345678', NULL, NULL, NULL, NULL, 0, '2023-11-29 15:54:28'),
(2, NULL, 'cemi@mailinator.com', NULL, 1704994419, NULL, '12345678', NULL, NULL, NULL, NULL, 0, '2024-01-11 17:33:39'),
(3, NULL, 'info@mxsolutions.it', NULL, 1705357647, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-01-15 22:27:27'),
(4, NULL, 'admin@rast.com', NULL, 1705357730, NULL, '12345678', NULL, NULL, NULL, NULL, 0, '2024-01-15 22:28:50'),
(5, NULL, 'developer@developer.com', NULL, 1705357928, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-01-15 22:32:08'),
(6, 'Test mail', 'testmail@gmail.com', '01656543432', 1707583783, 'user', '12345678', 'Test', 'Dhaka', 'Banasree Block-B ,House no - 12, Dhaka - 1219, Bangladesh', 'images/876e63d452.jpg', 0, '2024-02-10 16:47:31'),
(7, 'Test ', 'testmail2@gmail.com', '01565434567', 1707583966, 'agent', '12345678', 'Test', 'Dhaka', 'Pro: 1 no ward, Chotomanika', 'images/9c730b3de6.jpg', 0, '2024-02-10 16:51:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
