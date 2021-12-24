-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 05:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `belkuni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `cat_id`, `title`, `floar`, `flatcode`, `sqft`, `description`, `price`, `discount`, `status`, `quantity`, `bed_room`, `living_room`, `kitchen`, `parking`, `toilet`, `division`, `location`, `agent_id`, `image_one`, `image_two`, `image_three`, `belkuni`) VALUES
(41, 2, 'aa', '2a', '1639831740', '4444', 'zfsdf', '200000000', '0', 0, 1, 1, 1, 1, 0, 1, 'Dhaka', '344 Villa, Syndey, Australia', 17, 'images/a23f086517.jpg', 'images/a23f086517a.jpg', 'images/a23f086517a6.jpg', 1),
(42, 2, 'Eskaton has a great community and that is what makes it an excellent area to live in', '2a', '1639832094', '1200', 'Eskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live inEskaton has a great community and that is what makes it an excellent area to live in', '200000000', '0', 0, 1, 1, 0, 1, 0, 1, 'Khulna', '344 Villa, Syndey, Australia', 17, 'images/06500e6092.jpg', 'images/06500e60925.jpg', 'images/06500e60925b.jpg', 1),
(43, 2, '1000 Sq. ft Apartment Is Available For Sale In Green Road Which Is Tailored To Your Highest Standards', '2a', '1639833254', '1800', 'Kathalbagan is one of those areas where you will find that there\'s are quite a few things to do. The community is very friendly and there are plenty of reasons why this place is unique. The apartment here has two bedrooms and a balcony is attached to one of the bedrooms. When you enter, you will see a space\'s that can be used as the dining and the drawing area. The apartment is quite convenient and suitable for residents. \r\n\r\nProperty Features:\r\nSouth faced\r\nNumber of Floors: 9\r\nMaintenance Staff\r\nDedicated Security Guard \r\nCleaning Services\r\nNearby Amenities: Kolabagan Government Quarter Jame Mosque, Al Hera Jame Masjid\r\n\r\nSo hurry up this beautiful flat is just a call away!', '200000000', '10', 0, 1, 1, 0, 1, 0, 1, 'Dhaka', '344 Villa, Syndey, Australia', 17, 'images/12de614bee.jpg', 'images/12de614beea.jpg', 'images/12de614beeaa.jpg', 1);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `otp`, `status`, `password`, `about_me`, `division`, `address`, `image`, `created_at`) VALUES
(16, 'dipta', 'dipta99@gmail.com', '11111111111', 1639586814, 'admin', '12', NULL, '', NULL, NULL, '2021-12-15 16:46:54'),
(17, 'test', 'a@g.c', '11221212121', 1639586980, 'agent', '12', NULL, '', NULL, NULL, '2021-12-15 16:49:40'),
(19, 'Dipta Dey', 'dipta995@gmail.com', '11111111111', 1640355338, 'user', '12', 'Dipta Dey', 'Khulna', 'E0-D5-5E-E5-C9-19', 'images/c3a4b46f2b.jpg', '2021-12-24 14:02:11');

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
