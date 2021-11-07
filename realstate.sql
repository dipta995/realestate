-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2021 at 04:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `property_id`, `name`, `email`, `phone`, `message`, `created_at`, `status`) VALUES
(37, 36, 'a', '', '', '', '2021-11-05 14:27:51', 0),
(38, 36, 'a', '', '', '', '2021-11-05 14:28:27', 0),
(39, 36, 'a', '', '', '', '2021-11-05 14:28:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(151) NOT NULL,
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
  `location` varchar(191) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `image_one` varchar(191) NOT NULL,
  `image_two` varchar(191) NOT NULL,
  `image_three` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `flatcode`, `sqft`, `description`, `price`, `discount`, `status`, `quantity`, `bed_room`, `living_room`, `kitchen`, `parking`, `toilet`, `location`, `agent_id`, `image_one`, `image_two`, `image_three`) VALUES
(12, '', NULL, '1800', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '11111', '10', 0, 1, 1, 0, 1, 0, 1, '344 Villa, Syndey, Australia', 3, 'images/1cafb71f3f.png', 'images/21ed5bfcfa7.png', 'images/21ed5bfcfa73.png'),
(13, '', NULL, '1200', 'sf', '2000000', '0', 0, 1, 1, 1, 1, 0, 1, '344 Villa, Syndey, Australia', 3, 'images/97b17f1b46.png', 'images/97b17f1b46.jpg', 'images/97b17f1b46.jpg'),
(14, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/090adfe990.jpg', 'images/090adfe990d.png', 'images/090adfe990d0.png'),
(15, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/46df37e8d4.jpg', 'images/46df37e8d48.png', 'images/46df37e8d48a.png'),
(16, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/475ad90cfc.jpg', 'images/475ad90cfc5.png', 'images/475ad90cfc56.png'),
(17, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/1114af7469.jpg', 'images/1114af74692.png', 'images/1114af746929.png'),
(18, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/faf5132e66.jpg', 'images/faf5132e661.png', 'images/faf5132e6619.png'),
(19, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/01dd34512d.jpg', 'images/01dd34512da.png', 'images/01dd34512daf.png'),
(20, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/6dee31587a.jpg', 'images/6dee31587aa.png', 'images/6dee31587aaa.png'),
(21, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/d29997d3fa.jpg', 'images/d29997d3fa6.png', 'images/d29997d3fa69.png'),
(22, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/cd959d4274.jpg', 'images/cd959d42742.png', 'images/cd959d427426.png'),
(23, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/d1aa13aca3.jpg', 'images/d1aa13aca3f.png', 'images/d1aa13aca3f1.png'),
(24, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/b6a9e137f9.jpg', 'images/b6a9e137f99.png', 'images/b6a9e137f99a.png'),
(25, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/0be451ed33.jpg', 'images/0be451ed33f.png', 'images/0be451ed33fc.png'),
(26, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/57e64e2d36.jpg', 'images/57e64e2d361.png', 'images/57e64e2d361d.png'),
(27, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/93dfc375d3.jpg', 'images/93dfc375d33.png', 'images/93dfc375d331.png'),
(28, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/66a579dc77.jpg', 'images/66a579dc77a.png', 'images/66a579dc77a3.png'),
(29, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/e44b2491ac.jpg', 'images/e44b2491acb.png', 'images/e44b2491acb8.png'),
(30, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/9a0db0125b.jpg', 'images/9a0db0125b9.png', 'images/9a0db0125b9d.png'),
(31, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/af1f39b44a.jpg', 'images/af1f39b44a9.png', 'images/af1f39b44a98.png'),
(32, '', NULL, '1200', 'sdf', '44', '0', 0, 1, 1, 0, 1, 0, 1, 'dfg', 3, 'images/9c37361c63.jpg', 'images/9c37361c63a.png', 'images/9c37361c63a8.png'),
(33, 'dddfdfd', NULL, '2500', 'Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.\r\nCollaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.', '1000000', '0', 0, 1, 2, 1, 1, 1, 2, '344 Villa, Syndey, Australia', 3, 'images/d9a60da58f.png', 'images/d9a60da58f8.png', 'images/d9a60da58f8d.png'),
(34, 'testing', '4518', '1200', 'dfsd', '444444', '0', 0, 1, 1, 0, 1, 0, 1, 'fds', 3, 'images/cad5ca9268.png', 'images/cad5ca92688.png', 'images/cad5ca926886.png'),
(35, 'testing', '02', '1200', 'dfsd', '444444', '0', 0, 1, 1, 0, 1, 0, 1, 'fds', 3, 'images/3692df4297.png', 'images/3692df42977.png', 'images/3692df42977e.png'),
(36, 'testingsfgdfg g sfd gfsff sd fsaf sdf sa fsda f', '1635924639', '1200', 'dfsd', '444444', '0', 0, 1, 1, 0, 1, 0, 1, 'fds', 3, 'images/e85f7bca85.png', 'images/e85f7bca851.png', 'images/e85f7bca8511.png');

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
  `address` text DEFAULT NULL,
  `image` varchar(190) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `otp`, `status`, `password`, `about_me`, `address`, `image`, `created_at`) VALUES
(3, 'Admin', 'dptdey95@gmail.com', '123456789845', NULL, 'admin', '12', 'Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.', NULL, '', '2021-10-08 13:59:22'),
(4, 'Akram', 'akram@gmail.com', '12345678954', NULL, 'agent', '12', 'Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.', NULL, 'images/agents/1.jpg', '2021-10-26 13:48:44'),
(12, 'Dipta Dey', 'dipta995@gmail.com', '01632315608', 1636299171, 'user', '12', 'Dipta Dey', 'd', 'images/116d324418.', '2021-11-07 15:10:45');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
