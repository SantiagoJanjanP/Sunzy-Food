-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 01:25 PM
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
-- Database: `sparkle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

CREATE TABLE `cart_list` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `vendor_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `vendor_id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(5, 2, 'test', 'test', 0, 1, '2022-02-09 11:06:17', '2022-02-09 11:06:20'),
(12, 6, 'Fruits & Vegetables', 'Fruits & Vegetables', 1, 0, '2025-03-27 20:08:58', NULL),
(13, 6, 'Grains & Cereals', 'Grains & Cereals', 1, 0, '2025-03-27 20:09:06', NULL),
(14, 6, 'Protein (Meat & Plant-based)', 'Protein (Meat & Plant-based)\r\n', 1, 0, '2025-03-27 20:09:13', NULL),
(15, 6, 'Dairy & Dairy Alternatives', 'Dairy & Dairy Alternatives', 1, 0, '2025-03-27 20:09:21', NULL),
(16, 6, 'Fats & Oils', 'Fats & Oils', 1, 0, '2025-03-27 20:09:40', NULL),
(17, 6, 'Sweets & Beverages', 'Sweets & Beverages', 1, 0, '2025-03-27 20:09:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `code`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `verification_code`, `email_verified`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, '202202-00001', 'Jan-jan', 'P', 'Santiago', 'Male', '09123456789', 'This is only my sample address', 'janjansantiago@gmail.com', 'b49a143c829affa5a17f6bd457c7cf35', '', NULL, 1, 0, '2022-02-09 13:53:36', '2024-03-16 07:52:58'),
(2, '202202-00002', 'test', 'test', 'test', 'Male', '094564654', 'test', 'test@sample.com', '098f6bcd4621d373cade4e832627b4f6', '', NULL, 1, 1, '2022-02-10 13:44:26', '2022-02-10 13:44:35'),
(8, '202403-00005', 'aw', 'awaw', 'aw', 'Male', '1', 'asd', 'aliah@gmail.com', '54915ac8e649cfafd348cc62ec093416', '', NULL, 1, 0, '2024-03-08 13:20:41', NULL),
(35, '202403-00001', 'Janjan', 'P', 'Santiago', 'Male', '+63 9412312312', 'Caloocan City', 'santiagojanjan12@gmail.com', '0abdfd5e4f3f2381ef038cd24f4a9a92', '', NULL, 1, 0, '2024-03-16 08:27:46', NULL),
(36, '202403-00002', 'Janjan', '', '', 'Male', '+63 9150626049', 'Caloocan', 'sanjan@gmail.com', '0abdfd5e4f3f2381ef038cd24f4a9a92', '', NULL, 1, 0, '2024-03-16 12:30:57', NULL),
(37, '202404-00001', 'asd', 'asd', 'asdasds', 'Male', '+63 ', 'asd', 'sanjana@gmail.com', '0abdfd5e4f3f2381ef038cd24f4a9a92', '', NULL, 1, 0, '2024-04-01 16:31:33', NULL),
(105, '', 'Jan-jan ', 'P', 'Santiago', 'Male', '0915061414124', 'Phase 10A Package 2\r\nBarangay 176', 'janjansantiago38@gmail.com', 'eda0756c117db8a488d46b07296a5703', '287405', '2025-03-27 16:08:21', 1, 0, '2025-03-27 16:08:06', '2025-03-27 16:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `client_id` int(30) NOT NULL,
  `vendor_id` int(30) NOT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `delivery_address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `code`, `client_id`, `vendor_id`, `total_amount`, `delivery_address`, `status`, `date_created`, `date_updated`) VALUES
(1, '202202-00001', 1, 1, 4500, 'This is only my sample address', 5, '2022-02-10 09:56:49', '2022-02-10 11:52:53'),
(2, '202202-00002', 1, 2, 7359.9, 'This is only my sample address', 5, '2022-02-10 09:56:49', '2024-03-15 16:31:38'),
(3, '202202-00003', 1, 1, 1325, 'This is only my sample address', 1, '2022-02-10 10:29:00', '2022-02-10 12:09:59'),
(4, '202202-00004', 1, 2, 2320.61, 'This is only my sample address', 0, '2022-02-10 10:29:01', '2022-02-10 10:29:01'),
(5, '202402-00001', 1, 1, 8050, 'This is only my sample address', 1, '2024-02-29 04:30:39', '2024-04-01 22:00:50'),
(6, '202402-00002', 1, 1, 0, 'This is only my sample address', 5, '2024-02-29 04:31:52', '2024-03-15 23:51:07'),
(7, '202402-00003', 1, 2, 0, 'This is only my sample address', 5, '2024-02-29 04:31:52', '2024-03-15 23:51:13'),
(8, '202402-00004', 1, 1, 0, 'This is only my sample address', 5, '2024-02-29 10:03:57', '2024-03-15 16:30:44'),
(11, '202403-00001', 1, 1, 0, 'This is only my sample address', 1, '2024-03-07 11:12:51', '2024-03-07 11:25:35'),
(12, '202403-00002', 1, 1, 0, 'This is only my sample address', 5, '2024-03-07 11:21:21', '2024-03-07 11:23:59'),
(14, '202403-00004', 1, 1, 0, 'This is only my sample address', 5, '2024-03-09 16:33:46', '2024-03-09 16:35:20'),
(15, '202403-00005', 1, 1, 0, 'This is only my sample address', 5, '2024-03-09 16:34:04', '2024-03-09 16:35:16'),
(16, '202403-00006', 1, 1, 58539, 'This is only my sample address', 5, '2024-03-15 16:16:45', '2024-03-15 16:18:13'),
(17, '202403-00007', 1, 1, 18980, 'This is only my sample address', 5, '2024-03-15 23:44:05', '2024-03-15 23:50:34'),
(18, '202403-00008', 1, 1, 4500, 'This is only my sample address', 0, '2024-03-16 00:58:25', '2024-03-16 00:58:25'),
(20, '202403-00003', 1, 1, 5999, 'This is only my sample address', 0, '2024-03-16 07:55:36', '2024-03-16 07:55:36'),
(21, '202403-00009', 1, 1, 3999, 'This is only my sample address', 0, '2024-03-16 07:59:41', '2024-03-16 07:59:41'),
(22, '202403-00010', 35, 1, 1998, 'Ph10 A Package 2 Block 30 Lot 35 Bagong Silang Caloocan City', 1, '2024-03-16 08:32:09', '2024-03-16 08:33:20'),
(23, '202403-00011', 35, 1, 4000, 'Caloocan City', 0, '2024-03-16 11:25:13', '2024-03-16 11:25:13'),
(24, '202403-00012', 36, 1, 3499, 'Caloocan', 5, '2024-03-16 12:40:47', '2024-03-16 12:44:54'),
(25, '202403-00013', 1, 1, 11999, 'asd', 0, '2024-03-27 10:30:00', '2024-03-27 10:30:00'),
(26, '202403-00014', 36, 1, 10201, 'Caloocan', 1, '2024-03-31 15:37:09', '2024-04-01 20:50:11'),
(28, '202404-00001', 1, 1, 50281, 'asd', 0, '2024-04-03 13:35:18', '2024-04-03 13:35:18'),
(29, '202404-00002', 36, 1, 11997, 'Caloocan', 1, '2024-04-11 10:51:09', '2024-04-11 10:52:14'),
(32, '202405-00001', 36, 1, 3000, 'Caloocan', 0, '2024-05-10 12:48:20', '2024-05-10 12:48:20'),
(33, '202405-00002', 36, 1, 5498, 'Caloocan', 0, '2024-05-10 15:04:59', '2024-05-10 15:04:59'),
(34, '202405-00003', 36, 1, 12499, 'Caloocan', 0, '2024-05-11 01:57:07', '2024-05-11 01:57:07'),
(35, '202405-00004', 36, 1, 3000, 'Caloocan', 0, '2024-05-11 01:59:20', '2024-05-11 01:59:20'),
(36, '202405-00005', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 02:00:05', '2024-05-11 02:00:05'),
(37, '202405-00006', 36, 1, 2998, 'Caloocan', 0, '2024-05-11 02:12:10', '2024-05-11 02:12:10'),
(38, '202405-00007', 36, 1, 1499, 'Caloocan', 0, '2024-05-11 03:17:48', '2024-05-11 03:17:48'),
(39, '202405-00008', 36, 1, 1499, 'Caloocan', 0, '2024-05-11 03:18:13', '2024-05-11 03:18:13'),
(40, '202405-00009', 36, 1, 3000, 'Caloocan', 0, '2024-05-11 03:18:57', '2024-05-11 03:18:57'),
(41, '202405-00010', 36, 1, 3000, 'Caloocan', 0, '2024-05-11 03:20:40', '2024-05-11 03:20:40'),
(42, '202405-00011', 36, 1, 3000, 'Caloocan', 0, '2024-05-11 03:23:22', '2024-05-11 03:23:22'),
(43, '202405-00012', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:24:52', '2024-05-11 03:24:52'),
(44, '202405-00013', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:26:17', '2024-05-11 03:26:17'),
(45, '202405-00014', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:28:13', '2024-05-11 03:28:13'),
(46, '202405-00015', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:31:29', '2024-05-11 03:31:29'),
(47, '202405-00016', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:35:03', '2024-05-11 03:35:03'),
(48, '202405-00017', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:37:16', '2024-05-11 03:37:16'),
(49, '202405-00018', 36, 1, 999, 'Caloocan', 0, '2024-05-11 03:39:04', '2024-05-11 03:39:04'),
(50, '202405-00019', 36, 1, 999, 'Caloocan', 0, '2024-05-11 03:39:29', '2024-05-11 03:39:29'),
(51, '202405-00020', 36, 1, 999, 'Caloocan', 0, '2024-05-11 03:40:21', '2024-05-11 03:40:21'),
(52, '202405-00021', 36, 1, 1998, 'Caloocan', 0, '2024-05-11 03:41:12', '2024-05-11 03:41:12'),
(53, '202405-00022', 36, 1, 999, 'Caloocan', 0, '2024-05-11 03:41:42', '2024-05-11 03:41:42'),
(54, '202405-00023', 36, 1, 999, 'Caloocan', 0, '2024-05-11 03:47:32', '2024-05-11 03:47:32'),
(55, '202405-00024', 36, 1, 999, 'Caloocan', 0, '2024-05-11 03:51:30', '2024-05-11 03:51:30'),
(56, '202405-00025', 36, 1, 2999, 'Caloocan', 0, '2024-05-11 03:52:02', '2024-05-11 03:52:02'),
(57, '202405-00026', 36, 1, 9498, 'Caloocan', 0, '2024-05-11 03:57:31', '2024-05-11 03:57:31'),
(58, '202405-00027', 36, 1, 3999, 'Caloocan', 0, '2024-05-11 03:59:55', '2024-05-11 03:59:55'),
(59, '202405-00028', 36, 1, 3999, 'Caloocan', 0, '2024-05-11 04:01:19', '2024-05-11 04:01:19'),
(60, '202405-00029', 36, 1, 3999, 'Caloocan', 0, '2024-05-11 04:01:39', '2024-05-11 04:01:39'),
(61, '202405-00030', 36, 1, 6998, 'Caloocan', 0, '2024-05-11 04:08:46', '2024-05-11 04:08:46'),
(62, '202405-00031', 36, 1, 5499, 'Caloocan', 0, '2024-05-11 04:13:35', '2024-05-11 04:13:35'),
(63, '202405-00032', 36, 1, 999, 'Caloocan', 0, '2024-05-11 04:14:05', '2024-05-11 04:14:05'),
(64, '202405-00033', 36, 1, 7999, 'Caloocan', 0, '2024-05-11 04:18:49', '2024-05-11 04:18:49'),
(65, '202405-00034', 36, 1, 6499, 'Caloocan', 0, '2024-05-11 04:24:13', '2024-05-11 04:24:13'),
(66, '202405-00035', 36, 1, 2500, 'Caloocan', 0, '2024-05-11 04:25:04', '2024-05-11 04:25:04'),
(67, '202503-00001', 105, 1, 1499, 'Phase 10A Package 2\r\nBarangay 176', 5, '2025-03-27 16:09:22', '2025-03-27 17:50:54'),
(68, '202503-00002', 105, 5, 1231, 'Phase 10A Package 2\r\nBarangay 176', 0, '2025-03-27 16:23:27', '2025-03-27 16:23:27'),
(69, '202503-00003', 105, 1, 16497, 'Phase 10A Package 2\r\nBarangay 176', 5, '2025-03-27 17:37:10', '2025-03-27 17:50:20'),
(70, '202503-00004', 105, 1, 2500, 'Phase 10A Package 2\r\nBarangay 176', 5, '2025-03-27 17:37:56', '2025-03-27 17:50:09'),
(71, '202503-00005', 105, 1, 1499, 'Phase 10A Package 2\r\nBarangay 176', 0, '2025-03-27 17:51:08', '2025-03-27 17:51:08'),
(72, '202503-00006', 105, 1, 999, 'Phase 10A Package 2\r\nBarangay 176', 0, '2025-03-27 17:51:41', '2025-03-27 17:51:41'),
(73, '202503-00007', 105, 1, 999, 'Phase 10A Package 2\r\nBarangay 176', 0, '2025-03-27 18:11:03', '2025-03-27 18:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `vendor_id` int(30) DEFAULT NULL,
  `category_id` int(30) DEFAULT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `image_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `vendor_id`, `category_id`, `name`, `description`, `price`, `image_path`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(51, 6, 14, 'Double Patty Burger', 'Savor perfection with our Classic Beef Burger. Juicy, seasoned patty embraced by a soft artisan bun, layered with crisp veggies, cheddar, and secret sauce. A symphony of flavors in every bite!', 149, 'uploads/products/51.png', 1, 0, '2025-03-27 20:11:45', '2025-03-27 20:11:45'),
(52, 6, 12, 'Burger', 'Juicy burger, grilled to perfection. Mouthwatering blend of flavors, a satisfying bite that elevates your burger experience to new heights.', 159, 'uploads/products/52.jpg', 1, 0, '2025-03-27 20:12:26', '2025-03-27 20:12:26'),
(53, 6, 14, 'Chicken Burger', 'Succulent chicken burger, grilled to perfection. Irresistible blend of spices, creating a flavorful sensation in every delicious bite. Satisfy cravings instantly.', 189, 'uploads/products/53.jpg', 1, 0, '2025-03-27 20:13:03', '2025-03-27 20:13:03'),
(54, 6, 16, 'Pizza', 'Pizza perfection: Thin, crispy crust, rich tomato sauce, gooey cheese. Topped with savory delights, an irresistible slice of heaven.', 399, 'uploads/products/54.png', 1, 0, '2025-03-27 20:15:08', '2025-03-27 20:15:08'),
(55, 6, 14, 'Roasted Chicken', 'Crispy skin, tender meat. A succulent masterpiece, seasoned to perfection, delivering a savory sensation in every delightful bite.', 449, 'uploads/products/55.png', 1, 0, '2025-03-27 20:16:00', '2025-03-27 20:16:00'),
(56, 6, 12, 'Vegetarian Meal', 'A wholesome meal: a symphony of flavors, a satisfying fusion of ingredients. A delightful culinary journey in every mouthful', 200, 'uploads/products/56.jpg', 1, 0, '2025-03-27 20:16:41', '2025-03-27 20:16:41'),
(57, 6, 16, 'Ham and Tomato', 'Sunny side up egg, savory ham, and ripe tomato. A harmonious trio creating a breakfast symphony, a flavorful start to any day.', 249, 'uploads/products/57.jpg', 1, 0, '2025-03-27 20:17:27', '2025-03-27 20:17:27'),
(58, 6, 13, 'French Bread', 'Crispy exterior, soft interior. A timeless delight, perfect for sandwiches or savoring with butter. Simple elegance, irresistible taste.', 99, 'uploads/products/58.jpg', 1, 0, '2025-03-27 20:18:47', '2025-03-27 20:18:47'),
(59, 6, 16, 'French Breakfast', 'Sunny side up perfection, crisp bread, and savory tocino unite. A morning symphony of flavors, a breakfast masterpiece that satisfies', 199, 'uploads/products/59.jpg', 1, 0, '2025-03-27 20:19:43', '2025-03-27 20:19:43'),
(60, 6, 14, 'Kebab Delight', 'Succulent kebabs: grilled to perfection, bursting with flavor. A delectable blend of spices, delivering a taste sensation in every bite.', 249, 'uploads/products/60.jpg', 1, 0, '2025-03-27 20:20:12', '2025-03-27 20:20:12'),
(61, 6, 17, 'Coca-Cola', 'A timeless carbonated drink with a rich caramel flavor and a crisp, refreshing finish. Its effervescence and balanced sweetness make it a go-to choice for soda lovers.', 59, 'uploads/products/61.jpg', 1, 0, '2025-03-27 20:22:22', '2025-03-27 20:22:22'),
(62, 6, 17, 'Sprite', 'A lively lemon-lime soda with a tangy citrus kick and invigorating bubbles. Its crisp and clean taste makes it incredibly refreshing on a hot day.\r\n\r\n', 59, 'uploads/products/62.jpg', 1, 0, '2025-03-27 20:22:44', '2025-03-27 20:22:44'),
(63, 6, 17, 'Fanta Grapes', 'A bright and fruity soda bursting with bold orange flavor and playful carbonation. Its sweet and tangy profile makes it a fun and refreshing treat.', 69, 'uploads/products/63.jpg', 1, 0, '2025-03-27 20:23:12', '2025-03-27 20:23:12'),
(64, 6, 17, 'Fanta Orange', 'A bright and fruity soda bursting with bold orange flavor and playful carbonation. Its sweet and tangy profile makes it a fun and refreshing treat.', 69, 'uploads/products/64.jpg', 1, 0, '2025-03-27 20:23:35', '2025-03-27 20:23:45'),
(65, 6, 17, 'Coffee', 'A rich and aromatic beverage with deep, roasted flavors and a comforting warmth. Its bold taste and invigorating caffeine kick make it a perfect start to the day.', 99, 'uploads/products/65.jpg', 1, 0, '2025-03-27 20:24:27', '2025-03-27 20:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `shop_type_list`
--

CREATE TABLE `shop_type_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop_type_list`
--

INSERT INTO `shop_type_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Advanced', 1, 0, '2022-02-09 08:49:34', '2024-02-29 06:34:00'),
(2, 'Manual', 1, 0, '2022-02-09 08:49:46', '2024-02-29 06:34:07'),
(3, 'Hybrid', 1, 0, '2022-02-09 08:50:31', '2024-02-29 06:34:22'),
(4, 'Anyy', 1, 0, '2022-02-09 08:50:36', '2022-02-09 08:50:57'),
(5, 'Others', 1, 1, '2022-02-09 08:50:41', '2022-02-09 08:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Sunzy'),
(6, 'short_name', 'Sunzy'),
(11, 'logo', 'uploads/Logo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1644367404.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1644472635', NULL, 1, '2021-01-20 14:02:37', '2022-02-10 13:57:15'),
(11, 'Claire', 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatar-11.png?v=1644472553', NULL, 2, '2022-02-10 13:55:52', '2022-02-10 13:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_list`
--

CREATE TABLE `vendor_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `shop_type_id` int(30) NOT NULL,
  `shop_name` text NOT NULL,
  `shop_owner` text NOT NULL,
  `contact` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_list`
--

INSERT INTO `vendor_list` (`id`, `code`, `shop_type_id`, `shop_name`, `shop_owner`, `contact`, `username`, `password`, `avatar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, '202202-00001', 4, 'Sparkle', 'Sparkle', '09123456788', 'Sparkle', '7cd3e801be6a32bf19279752d5f58fce', 'uploads/vendors/1.png?v=1644375053', 1, 0, '2022-02-09 10:50:53', '2024-03-16 06:28:21'),
(2, '202202-00002', 1, 'Shop102', 'John Miller', '09123456789', 'shop102', '90be022251077e3488c998613214df74', 'uploads/vendors/2.png?v=1644375129', 1, 0, '2022-02-09 10:52:09', '2022-02-09 17:02:54'),
(3, '202202-00003', 2, 'test', 'test', '123123123', 'test', '098f6bcd4621d373cade4e832627b4f6', 'uploads/vendors/3.png?v=1644471934', 1, 1, '2022-02-10 13:45:34', '2022-02-10 13:50:15'),
(4, '202202-00003', 1, 'Food', 'Janjan', '09123456789', 'Janjan123', 'Janjan123', NULL, 1, 0, '2025-03-27 16:15:34', '2025-03-27 16:17:36'),
(5, '202503-00001', 1, 'Janjan', 'Santiago', '0915121312312', 'Janjan', 'b49a143c829affa5a17f6bd457c7cf35', NULL, 1, 0, '2025-03-27 16:18:34', NULL),
(6, '202503-00002', 1, 'Janjan', 'Santiago', '09123456789', 'janjansantiago38@gmail.com', 'eda0756c117db8a488d46b07296a5703', NULL, 1, 0, '2025-03-27 20:06:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- Indexes for table `shop_type_list`
--
ALTER TABLE `shop_type_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_list`
--
ALTER TABLE `vendor_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_type_id` (`shop_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_list`
--
ALTER TABLE `cart_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `shop_type_list`
--
ALTER TABLE `shop_type_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendor_list`
--
ALTER TABLE `vendor_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD CONSTRAINT `cart_list_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_list_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_list`
--
ALTER TABLE `category_list`
  ADD CONSTRAINT `category_list_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_list` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_list_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_list`
--
ALTER TABLE `vendor_list`
  ADD CONSTRAINT `vendor_list_ibfk_1` FOREIGN KEY (`shop_type_id`) REFERENCES `shop_type_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
