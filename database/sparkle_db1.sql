-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 02:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

--
-- Dumping data for table `cart_list`
--

INSERT INTO `cart_list` (`id`, `client_id`, `product_id`, `quantity`) VALUES
(220, 1, 2, 5),
(235, 1, 32, 2),
(236, 1, 29, 2),
(237, 1, 27, 1);

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
(6, 1, 'Residential', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut semper leo vitae dui rutrum ultricies. Etiam sit amet odio lorem. In sit amet cursus justo', 1, 0, '2022-02-09 11:09:36', '2024-03-15 23:54:00'),
(7, 1, 'Village', 'Morbi pellentesque, dolor in sodales pretium, libero leo finibus arcu, vitae pharetra ligula quam quis enim. Quisque suscipit venenatis finibus.', 1, 0, '2022-02-09 11:09:45', '2024-03-16 01:03:35'),
(8, 1, 'Bungalow', 'Curabitur fermentum, diam ut dictum molestie, eros dolor luctus dolor, in hendrerit dui sapien vel lorem. Nulla ultrices gravida nisl, id feugiat turpis varius a. In iaculis lorem nisi. Aliquam nec aliquam ipsum, vitae fermentum dui.', 1, 0, '2022-02-09 11:10:19', '2024-03-16 01:03:51'),
(9, 1, 'Apartment', 'Phasellus luctus ultricies dui, non euismod massa congue id. Fusce ut nisi convallis, aliquam dolor consectetur, varius enim. Phasellus dignissim, erat ac ullamcorper lacinia, nibh est auctor risus, eget ornare est felis et orci.', 1, 0, '2022-02-09 11:10:35', '2024-03-15 23:54:12'),
(10, 1, 'Room', 'https://developers.xendit.co/api-reference/#ewallets', 1, 0, '2024-03-16 12:47:43', NULL);

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
(37, '202404-00001', 'asd', 'asd', 'asdasds', 'Male', '+63 ', 'asd', 'sanjana@gmail.com', '0abdfd5e4f3f2381ef038cd24f4a9a92', '', NULL, 1, 0, '2024-04-01 16:31:33', NULL);

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

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`, `date_created`) VALUES
(1, 1, 3, 1500, '2022-02-10 09:56:49'),
(3, 4, 5, 50, '2022-02-10 10:29:01'),
(5, 4, 11, 50, '2024-02-29 04:30:39'),
(5, 1, 5, 1500, '2024-02-29 04:30:39'),
(6, 2, 0, 85, '2024-02-29 04:31:52'),
(8, 1, 0, 1500, '2024-02-29 10:03:57'),
(12, 2, 0, 3999, '2024-03-07 11:21:21'),
(16, 11, 2, 2499, '2024-03-15 16:16:45'),
(16, 4, 5, 1999, '2024-03-15 16:16:45'),
(17, 1, 1, 1500, '2024-03-15 23:44:05'),
(17, 4, 1, 1999, '2024-03-15 23:44:05'),
(18, 1, 3, 1500, '2024-03-16 00:58:25'),
(20, 30, 1, 1499, '2024-03-16 07:55:36'),
(20, 1, 3, 1500, '2024-03-16 07:55:36'),
(21, 2, 1, 3999, '2024-03-16 07:59:41'),
(22, 28, 2, 999, '2024-03-16 08:32:09'),
(23, 31, 1, 2500, '2024-03-16 11:25:13'),
(23, 1, 1, 1500, '2024-03-16 11:25:13'),
(24, 26, 1, 999, '2024-03-16 12:40:47'),
(24, 31, 1, 2500, '2024-03-16 12:40:47'),
(25, 2, 1, 3999, '2024-03-27 10:30:00'),
(25, 32, 2, 2500, '2024-03-27 10:30:00'),
(25, 33, 1, 3000, '2024-03-27 10:30:00'),
(26, 2, 1, 3999, '2024-03-31 15:37:09'),
(26, 32, 1, 2500, '2024-03-31 15:37:09'),
(26, 45, 3, 1234, '2024-03-31 15:37:09'),
(28, 43, 1, 12312, '2024-04-03 13:35:18'),
(28, 41, 1, 4545, '2024-04-03 13:35:18'),
(28, 49, 1, 33424, '2024-04-03 13:35:18'),
(29, 2, 3, 3999, '2024-04-11 10:51:09'),
(32, 1, 2, 1500, '2024-05-10 12:48:20'),
(33, 11, 1, 2499, '2024-05-10 15:04:59'),
(33, 29, 1, 2999, '2024-05-10 15:04:59'),
(34, 27, 1, 2500, '2024-05-11 01:57:07'),
(34, 33, 3, 3000, '2024-05-11 01:57:07'),
(34, 28, 1, 999, '2024-05-11 01:57:07'),
(35, 33, 1, 3000, '2024-05-11 01:59:20'),
(36, 29, 1, 2999, '2024-05-11 02:00:05'),
(37, 30, 2, 1499, '2024-05-11 02:12:10'),
(38, 30, 1, 1499, '2024-05-11 03:17:48'),
(39, 30, 1, 1499, '2024-05-11 03:18:13'),
(40, 33, 1, 3000, '2024-05-11 03:18:57'),
(41, 33, 1, 3000, '2024-05-11 03:20:40'),
(42, 33, 1, 3000, '2024-05-11 03:23:22'),
(43, 29, 1, 2999, '2024-05-11 03:24:52'),
(44, 29, 1, 2999, '2024-05-11 03:26:17'),
(45, 29, 1, 2999, '2024-05-11 03:28:13'),
(46, 29, 1, 2999, '2024-05-11 03:31:29'),
(47, 29, 1, 2999, '2024-05-11 03:35:03'),
(48, 29, 1, 2999, '2024-05-11 03:37:16'),
(49, 28, 1, 999, '2024-05-11 03:39:04'),
(50, 28, 1, 999, '2024-05-11 03:39:29'),
(51, 28, 1, 999, '2024-05-11 03:40:21'),
(52, 28, 2, 999, '2024-05-11 03:41:12'),
(53, 28, 1, 999, '2024-05-11 03:41:42'),
(54, 28, 1, 999, '2024-05-11 03:47:32'),
(55, 28, 1, 999, '2024-05-11 03:51:30'),
(56, 29, 1, 2999, '2024-05-11 03:52:02'),
(57, 2, 1, 3999, '2024-05-11 03:57:31'),
(57, 27, 1, 2500, '2024-05-11 03:57:31'),
(57, 29, 1, 2999, '2024-05-11 03:57:31'),
(58, 2, 1, 3999, '2024-05-11 03:59:55'),
(59, 2, 1, 3999, '2024-05-11 04:01:19'),
(60, 2, 1, 3999, '2024-05-11 04:01:39'),
(61, 30, 1, 1499, '2024-05-11 04:08:46'),
(61, 2, 1, 3999, '2024-05-11 04:08:46'),
(61, 1, 1, 1500, '2024-05-11 04:08:46'),
(62, 33, 1, 3000, '2024-05-11 04:13:35'),
(62, 1, 1, 1500, '2024-05-11 04:13:35'),
(62, 28, 1, 999, '2024-05-11 04:13:35'),
(63, 28, 1, 999, '2024-05-11 04:14:05'),
(64, 32, 1, 2500, '2024-05-11 04:18:49'),
(64, 11, 1, 2499, '2024-05-11 04:18:49'),
(64, 33, 1, 3000, '2024-05-11 04:18:49'),
(65, 26, 1, 999, '2024-05-11 04:24:13'),
(65, 32, 1, 2500, '2024-05-11 04:24:13'),
(65, 33, 1, 3000, '2024-05-11 04:24:13'),
(66, 32, 1, 2500, '2024-05-11 04:25:04');

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
(66, '202405-00035', 36, 1, 2500, 'Caloocan', 0, '2024-05-11 04:25:04', '2024-05-11 04:25:04');

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
(1, 1, 9, 'Product 101', '	Pre-treatment of stubborn stains such as oil spills or rust stains with specialized cleaning agents.\r\n	High-pressure washing using professional-grade equipment to remove dirt, grime, algae, and other surface contaminants.\r\n	Utilization of surface cleaners or rotary brushes to ensure even cleaning and prevent streaking or patchiness.\r\n	Inspection of concrete or paved surfaces for cracks, potholes, or damage and recommendations for repairs or sealing if needed.\r\n	Application of environmentally friendly sealants or coatings to protect surfaces from future staining and deterioration.\r\n', 1500, 'uploads/products/1.jpg?v=1644379549', 1, 0, '2022-02-09 12:05:49', '2024-03-09 16:46:33'),
(2, 1, 6, 'Deep Cleaning', '	Disassembly and detailed cleaning of all removable parts, including racks, trays, and filters, to remove grease, grime, and food residue.\r\n	Utilization of degreasers and specialized cleaning agents to break down tough stains and baked-on food particles.\r\n	Sanitization of high-touch surfaces such as handles, knobs, and control panels to eliminate bacteria and prevent cross-contamination.\r\n	Inspection of appliance components for signs of wear or damage and recommendations for repairs or replacements if needed.\r\n	Polishing of stainless steel surfaces to restore their shine and luster, leaving your appliances looking like new.\r\n', 3999, 'uploads/products/2.jpg', 1, 0, '2022-02-09 12:58:35', '2024-03-09 16:46:01'),
(4, 1, 6, 'Window Cleaning', '	Gentle cleaning of leather upholstery using pH-balanced leather cleaners to remove dirt, oils, and stains without drying out or damaging the leather.\r\n	Conditioning treatment to replenish natural oils and restore flexibility, softness, and shine to the leather.\r\n	Inspection of leather furniture for signs of wear, fading, or cracking and recommendations for leather restoration or repair if needed.\r\n	Protection treatment to guard against spills, stains, and UV damage and extend the lifespan of your leather furniture.\r\n	Optional application of leather fragrances or conditioners to enhance the aroma and luxurious feel of your furniture.\r\n', 1999, 'uploads/products/4.png?v=1644382779', 1, 1, '2022-02-09 12:59:38', '2024-03-16 00:09:27'),
(11, 1, 6, 'Kitchen Cleaning', '	Utilization of specialized equipment such as bosun&#039;s chairs, scaffolding, or rope access techniques to access windows at elevated heights.\r\n	Thorough cleaning of exterior windows using professional-grade cleaning solutions to remove dirt, grime, and environmental pollutants.\r\n	Attention to detail in cleaning window frames, sills, and tracks to ensure a comprehensive clean and prevent water infiltration.\r\n	Compliance with safety regulations and industry standards for working at heights, including the use of personal protective equipment and fall prevention measures.\r\n	Coordination with building management and tenants to schedule cleaning operations at convenient times and minimize disruptions.\r\n', 2499, 'uploads/products/2.jpg', 1, 0, '2024-02-29 05:45:37', '2024-03-16 04:05:49'),
(26, 1, 7, 'Aircon Cleaning ', 'Our aircon cleaning services are aimed at providing every user with the most pure and efficient Air conditioning systems around. By employing professional technicians that have undergone thorough training, it&rsquo;s obvious that we give you a guarantee that your unit will be safe to operate and will provide you an excellent performance each time you use it.', 999, 'uploads/products/3. Aircon Cleaning services.jpg', 1, 0, '2024-03-16 04:29:12', '2024-03-16 04:32:25'),
(27, 1, 6, 'Furniture and Upholstery Cleaning ', 'Our furniture and upholstery cleaning services are deep clean within your furniture, not only on the surface but also on the quality without damaging your furniture. All of our expert and experienced staff members have gone through professional training with regards to the best practices in the industry and are equipped with the environment-friendly and effective tools and supplies needed for them to accomplish the highest standards of cleaning.', 2500, 'uploads/products/4. Furniture and Upholstery Cleaning services.png', 1, 0, '2024-03-16 05:53:55', '2024-03-16 05:55:36'),
(28, 1, 9, 'Restroom Cleaning ', 'Our restroom cleaning is a task everywhere we clean buildings. We utilize the restroom cleaning best practices to ensure that each restroom in your facility is cleaned and sanitized, using top-notch methods. Our cleaning procedures are organized using the top-to-bottom method to guarantee that all parts of your bathroom are thoroughly cleaned and disinfected.', 999, 'uploads/products/5. Restroom Cleaning services.jpg', 1, 0, '2024-03-16 05:57:24', '2024-03-16 05:58:08'),
(29, 1, 6, 'Pressure Washing', 'Our pressure washing is a washing technique that uses high-pressure water to clean surfaces. The deep cleaning system with this type of water pressure can remove most brands of stubborn dirt &mdash; including helps like dirt, grime, mold, algae, mud, gum, and even paint. While pressurized water can initially rid off the dirt, the addition of an accompanying detergent usually is necessary for a thorough cleaning.', 2999, 'uploads/products/6. Pressure Washing Services.png', 1, 0, '2024-03-16 05:59:00', '2024-03-16 06:00:08'),
(30, 1, 6, 'Carpet Cleaning', 'This package includes:\r\n	Deep cleaning using advanced equipment such as steam cleaners or extraction machines to penetrate deep into the carpet fibers.\r\n	Utilization of eco-friendly and non-toxic cleaning solutions to ensure the safety of your family and pets.\r\n	Targeted treatment of tough stains and odors, including pet stains, food spills, and dirt buildup.\r\n	Thorough sanitization to eliminate bacteria, allergens, and dust mites, promoting a healthier indoor environment.\r\n	Application of protective treatments to repel future stains and prolong the cleanliness of your carpets.\r\n', 1499, 'uploads/products/9. Carpet Cleaning.jpg', 1, 0, '2024-03-16 06:03:00', '2024-03-16 06:03:49'),
(31, 1, 7, 'Floor Cleaning', 'This package includes:\r\n	Utilization of specialized cleaning agents and high-pressure washing equipment to effectively remove dirt, grime, and stains from tile surfaces.\r\n	Attention to detail in cleaning grout lines, which are prone to discoloration and buildup of mold and mildew.\r\n	Restoration of the original shine and color of your tiles, enhancing the overall appearance of your floors and walls.\r\n	Application of sealants to protect grout from future staining and make cleaning easier in the long term.\r\n	Customization of cleaning methods based on the type of tile and grout in your home to ensure optimal results.\r\n', 2500, 'uploads/products/10. Tile Grout Cleaning.jpg', 1, 0, '2024-03-16 06:04:57', '2024-03-16 06:05:46'),
(32, 1, 8, 'Kitchen Area Cleaning', 'This package includes:\r\n	Disassembly and detailed cleaning of all removable parts, including racks, trays, and filters, to remove grease, grime, and food residue.\r\n	Utilization of degreasers and specialized cleaning agents to break down tough stains and baked-on food particles.\r\n	Sanitization of high-touch surfaces such as handles, knobs, and control panels to eliminate bacteria and prevent cross-contamination.\r\n	Inspection of appliance components for signs of wear or damage and recommendations for repairs or replacements if needed.\r\n	Polishing of stainless steel surfaces to restore their shine and luster, leaving your appliances looking like new.\r\n', 2500, 'uploads/products/12. Kitchen Appliance Cleaning.jpg', 1, 0, '2024-03-16 06:07:14', '2024-03-16 06:10:56'),
(33, 1, 6, 'Post-Construction Cleanup Services', 'This package includes:\r\n	Removal of construction debris, including dust, dirt, and leftover materials\r\n	Thorough cleaning of all surfaces, including floors, walls, and ceilings\r\n	Wiping down of fixtures, trimmings, and appliances to remove construction residue\r\n	Removal of construction debris, including dust, dirt, and leftover materials\r\n	Thorough cleaning of all surfaces, including floors, walls, and ceilings\r\n	Wiping down of fixtures, trimmings, and appliances to remove construction residue\r\n\r\n', 3000, 'uploads/products/13. Post-Construction Cleanup Services.jpg', 1, 0, '2024-03-16 06:07:46', '2024-03-16 06:14:14'),
(34, 1, 7, 'CR cleaning', 'This package includes:\r\n	Pre-treatment of pet stains with enzymatic cleaners to break down proteins and eliminate odor-causing bacteria.\r\n	Utilization of specialized extraction equipment to remove pet urine, feces, and vomit from carpets, rugs, and upholstery.\r\n	Application of pet-safe deodorizers to neutralize lingering odors and leave behind a fresh, clean scent.\r\n\r\n\r\n', 999, 'C:/xampp/htdocs/sparkle/uploads/products/34.jpg', 1, 1, '2024-03-16 06:24:16', '2024-03-16 08:00:14'),
(35, 1, 9, 'Laptop', 'fefdsfsd', 5000, 'C:/xampp/htdocs/sparkle/uploads/products/35.jpg', 1, 1, '2024-03-23 17:27:31', '2024-04-11 10:14:57'),
(36, 1, 9, 'dasda', 'asdasda', 3212, 'C:/xampp/htdocs/sparkle/uploads/products/36.jpg', 1, 1, '2024-03-23 17:34:34', '2024-04-11 10:14:37'),
(37, 1, 8, 'NewImage', 'asda', 123, NULL, 1, 1, '2024-03-23 17:45:38', '2024-04-11 10:15:01'),
(38, 1, 8, 'test', 'test', 343, 'C:/xampp/htdocs/sparkle/uploads/products/38.jpg', 1, 1, '2024-03-23 17:47:05', '2024-04-11 10:15:24'),
(39, 1, 10, 'test1234', 'test', 34, NULL, 1, 1, '2024-03-23 17:48:06', '2024-04-11 10:15:17'),
(40, 1, 6, 'rtete', 'test', 34, 'uploads/products/40.png', 1, 1, '2024-03-23 17:53:13', '2024-04-11 10:15:38'),
(41, 1, 10, 'final', 'test', 4545, 'uploads/products/41.png', 1, 1, '2024-03-23 17:58:30', '2024-04-11 10:14:41'),
(42, 1, 9, 'as', 'asdas', 123, 'uploads/products/42.png', 1, 1, '2024-03-23 18:07:31', '2024-04-11 10:14:15'),
(43, 1, 8, 'Cute', 'sdasdas', 12312, 'uploads/products/43.jpg', 1, 1, '2024-03-23 18:14:27', '2024-04-11 10:14:32'),
(44, 1, 9, 'molina', 'asdasdasda', 123123, 'uploads/products/44.png', 1, 1, '2024-03-23 19:56:31', '2024-04-11 10:15:09'),
(45, 1, 8, 'Puma', 'qdad', 1234, 'uploads/products/45.jpg', 1, 1, '2024-03-25 23:09:32', '2024-04-11 10:15:32'),
(46, 1, 8, 'Love', 'sads', 143, 'uploads/products/46.png', 1, 1, '2024-03-27 14:12:10', '2024-04-11 10:14:53'),
(47, 1, 8, 'asdasd', 'fsfgf', 3424, 'uploads/products/47.jpg', 1, 1, '2024-04-01 21:04:31', '2024-04-11 10:14:26'),
(48, 1, 8, 'asdsa', 'fsdfsdfss', 43242, 'uploads/products/48.jpg', 1, 1, '2024-04-01 21:05:03', '2024-04-11 10:14:21'),
(49, 1, 9, 'gawgaw', 'asd', 33424, 'uploads/products/49.png', 1, 1, '2024-04-03 11:26:15', '2024-04-11 10:14:46');

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
(11, 'logo', 'uploads/logo-1644367440.png'),
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
(3, '202202-00003', 2, 'test', 'test', '123123123', 'test', '098f6bcd4621d373cade4e832627b4f6', 'uploads/vendors/3.png?v=1644471934', 1, 1, '2022-02-10 13:45:34', '2022-02-10 13:50:15');

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
