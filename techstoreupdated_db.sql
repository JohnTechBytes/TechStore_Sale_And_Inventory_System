-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 02:55 PM
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
-- Database: `techstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `username`, `action`, `type`, `created_at`) VALUES
(1, 1, NULL, 'Logout', 'LOGOUT', '2026-04-03 15:29:04'),
(2, 0, NULL, 'New user registered: smoshiee34@gmail.com', 'REGISTRATION', '2026-04-04 08:17:43'),
(3, 0, NULL, 'New user registered: smoshiee304@gmail.com', 'REGISTRATION', '2026-04-04 08:18:18'),
(4, 2, NULL, 'Login: serjohn', 'LOGIN', '2026-04-04 08:19:41'),
(5, 2, NULL, 'Logout', 'LOGOUT', '2026-04-04 08:24:55'),
(6, 2, NULL, 'Login: serjohn', 'LOGIN', '2026-04-04 08:25:01'),
(7, 2, NULL, 'Logout', 'LOGOUT', '2026-04-04 08:28:26'),
(8, 1, NULL, 'Login: john', 'LOGIN', '2026-04-04 08:29:27'),
(9, 1, NULL, 'Added product: juice', 'PRODUCT', '2026-04-04 08:43:20'),
(10, 1, NULL, 'Updated product: juice', 'PRODUCT', '2026-04-04 08:49:52'),
(11, 1, NULL, 'Updated product: juice', 'PRODUCT', '2026-04-04 08:50:30'),
(12, 1, NULL, 'Added product: aswang', 'PRODUCT', '2026-04-04 09:06:17'),
(13, 1, NULL, 'Sale completed: INV-20260404091547456', 'SALE', '2026-04-04 09:15:47'),
(14, 1, NULL, 'Sale completed: INV-20260404092817786', 'SALE', '2026-04-04 09:28:18'),
(15, 1, NULL, 'Added product: shabu', 'PRODUCT', '2026-04-04 09:46:41'),
(16, 1, NULL, 'Deleted product: shabu', 'PRODUCT', '2026-04-04 09:56:43'),
(17, 1, NULL, 'Added stock to aswang: +322', 'STOCK', '2026-04-04 10:15:15'),
(18, 1, NULL, 'Logout', 'LOGOUT', '2026-04-04 10:30:04'),
(19, 0, NULL, 'New user registered: goku@gmail.com', 'REGISTRATION', '2026-04-04 10:30:49'),
(20, 3, NULL, 'Login: goku', 'LOGIN', '2026-04-04 10:31:06'),
(21, 3, NULL, 'Logout', 'LOGOUT', '2026-04-04 10:31:47'),
(22, 1, NULL, 'Login: john', 'LOGIN', '2026-04-04 10:31:57'),
(23, 1, NULL, 'Deleted user ID: 3', 'USER', '2026-04-04 10:32:56'),
(24, 1, NULL, 'Updated user ID: 2', 'USER', '2026-04-04 10:38:41'),
(25, 1, NULL, 'Sale completed: INV-20260404104027941', 'SALE', '2026-04-04 10:40:27'),
(26, 1, NULL, 'Logout', 'LOGOUT', '2026-04-04 10:54:21'),
(27, 1, NULL, 'Login: john', 'LOGIN', '2026-04-04 10:54:47'),
(28, 1, NULL, 'Added product: agogo', 'PRODUCT', '2026-04-04 11:00:53'),
(29, 1, NULL, 'Logout', 'LOGOUT', '2026-04-04 11:05:03'),
(30, 1, NULL, 'Login: john', 'LOGIN', '2026-04-04 11:19:05'),
(31, 1, NULL, 'Updated product: juice', 'PRODUCT', '2026-04-04 11:45:44'),
(32, 1, NULL, 'Updated product: juice', 'PRODUCT', '2026-04-04 11:46:08'),
(33, 1, NULL, 'Updated product: aswang', 'PRODUCT', '2026-04-04 11:51:51'),
(34, 1, NULL, 'Added stock to aswang: +123', 'STOCK', '2026-04-04 11:52:29'),
(35, 1, NULL, 'Login: john', 'LOGIN', '2026-04-05 05:23:37'),
(36, 1, NULL, 'Logout', 'LOGOUT', '2026-04-05 05:27:18'),
(37, 1, NULL, 'Login: john', 'LOGIN', '2026-04-05 05:33:04'),
(38, 1, NULL, 'Logout', 'LOGOUT', '2026-04-05 05:44:19'),
(39, 1, NULL, 'Login: john', 'LOGIN', '2026-04-05 05:48:12'),
(40, 1, NULL, 'Logout', 'LOGOUT', '2026-04-05 05:54:03'),
(41, 1, NULL, 'Login: john', 'LOGIN', '2026-04-05 06:03:03'),
(42, 1, NULL, 'Sale completed: INV-20260405060413986', 'SALE', '2026-04-05 06:04:13'),
(43, 1, NULL, 'Login: john', 'LOGIN', '2026-04-05 06:14:28'),
(44, 1, NULL, 'Login: john', 'LOGIN', '2026-04-05 06:42:10'),
(45, 1, NULL, 'Added user: borjak@gmail.com', 'USER', '2026-04-05 06:45:50'),
(46, 1, NULL, 'Deleted user ID: 2', 'USER', '2026-04-05 06:46:05'),
(47, 1, NULL, 'Logout', 'LOGOUT', '2026-04-05 06:46:15'),
(48, 4, NULL, 'Login: borjak', 'LOGIN', '2026-04-05 06:46:24'),
(49, 4, NULL, 'Login: borjak', 'LOGIN', '2026-04-06 09:38:55'),
(50, 4, NULL, 'Logout', 'LOGOUT', '2026-04-06 09:39:07'),
(51, 1, NULL, 'Login: john', 'LOGIN', '2026-04-06 09:39:16'),
(52, 1, NULL, 'Deleted user ID: 4', 'USER', '2026-04-06 09:39:42'),
(53, 1, NULL, 'Updated product: aswang', 'PRODUCT', '2026-04-06 09:46:04'),
(54, 1, NULL, 'Sale completed: INV-20260406100244238', 'SALE', '2026-04-06 10:02:44'),
(55, 1, NULL, 'Added product: Paper', 'PRODUCT', '2026-04-06 10:24:48'),
(56, 1, NULL, 'Deleted category ID: 5', 'CATEGORY', '2026-04-06 10:28:19'),
(57, 1, NULL, 'Deleted category ID: 11', 'CATEGORY', '2026-04-06 10:28:32'),
(58, 1, NULL, 'Updated product: juice', 'PRODUCT', '2026-04-06 10:51:29'),
(59, 1, NULL, 'Added user: smoshi8ee34@gmail.com', 'USER', '2026-04-06 11:14:11'),
(60, 1, NULL, 'Logout', 'LOGOUT', '2026-04-06 11:17:31'),
(61, 1, NULL, 'Login: john', 'LOGIN', '2026-04-06 11:17:52'),
(62, 1, NULL, 'TEST_LOGIN', 'AUTH', '2026-04-06 04:18:47'),
(63, 1, 'System', 'Logout', 'LOGOUT', '2026-04-06 11:27:07'),
(64, 1, 'System', 'Login: john', 'LOGIN', '2026-04-06 11:27:13'),
(65, 1, 'System', 'Added product: john', 'PRODUCT', '2026-04-06 11:28:44'),
(66, 1, 'System', 'Logout', 'LOGOUT', '2026-04-06 11:36:40'),
(67, 1, 'System', 'Login: john', 'LOGIN', '2026-04-06 11:36:48'),
(68, 1, 'System', 'Logout', 'LOGOUT', '2026-04-06 11:41:29'),
(69, 1, 'john', 'Login: john', 'LOGIN', '2026-04-06 11:41:35'),
(70, 1, 'john', 'Added stock to juice: +12', 'STOCK', '2026-04-06 11:42:14'),
(71, 1, 'john', 'Updated product: Shampoo', 'PRODUCT', '2026-04-06 11:59:41'),
(72, 1, 'john', 'Sale completed: INV-20260406125131236', 'SALE', '2026-04-06 12:51:32'),
(73, 1, 'john', 'Sale completed: INV-20260406125229132', 'SALE', '2026-04-06 12:52:29'),
(74, 1, 'john', 'Sale completed: INV-20260406125246527', 'SALE', '2026-04-06 12:52:47'),
(75, 1, 'john', 'Sale completed: INV-20260406125315318', 'SALE', '2026-04-06 12:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Snacks', 'Chips, biscuits, candies, chocolate', '2026-04-04 01:43:11', NULL),
(3, 'Beverages', 'Soft drinks, juice, bottled water', '2026-04-04 02:44:36', NULL),
(4, 'Canned Goods', 'Sardines, corned beef, tuna', '2026-04-04 02:44:36', NULL),
(6, 'Noodles', 'Instant noodles, pasta', '2026-04-04 02:44:36', NULL),
(7, 'Personal Care', 'Shampoo, soap, toothpaste', '2026-04-04 02:44:36', NULL),
(8, 'Household', 'Detergent, dishwashing liquid', '2026-04-04 02:44:36', NULL),
(9, 'Frozen Goods', 'Ice cream, frozen meat', '2026-04-04 02:44:36', NULL),
(10, 'School & Office', 'Notebook, pen, paper', '2026-04-04 02:44:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `attempt_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `min_stock` int(11) NOT NULL DEFAULT 5,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `category_id`, `buying_price`, `selling_price`, `stock`, `min_stock`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'juice', '3', NULL, 20.00, 150.00, 3, 5, '1775292200_5bae6585a503d8ef104e.jpg', 'active', '2026-04-04 08:43:20', '2026-04-06 12:53:15'),
(3, 'Shampoo', '1', NULL, 12.00, 200.00, 122, 5, NULL, 'active', '2026-04-04 09:06:17', '2026-04-06 12:53:15'),
(5, 'agogo', '90', NULL, 20.00, 13.00, 115, 5, NULL, 'active', '2026-04-04 11:00:53', '2026-04-06 12:53:15'),
(7, 'john', '9', 1, 20.00, 30.00, 18, 5, NULL, 'active', '2026-04-06 11:28:44', '2026-04-06 12:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','card','online') DEFAULT 'cash',
  `sale_date` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_no`, `user_id`, `customer_name`, `total_amount`, `discount`, `tax`, `grand_total`, `payment_method`, `sale_date`, `created_at`, `updated_at`) VALUES
(1, 'INV-20260404091059889', 1, '', 320.00, 0.00, 0.00, 320.00, 'cash', '2026-04-04 09:10:59', '2026-04-04 02:10:59', NULL),
(2, 'INV-20260404091333481', 1, '', 170.00, 0.00, 0.00, 170.00, 'cash', '2026-04-04 09:13:33', '2026-04-04 02:13:33', NULL),
(3, 'INV-20260404091547456', 1, '', 170.00, 0.00, 0.00, 170.00, 'cash', '2026-04-04 09:15:47', '2026-04-04 02:15:47', NULL),
(4, 'INV-20260404092817786', 1, '', 320.00, 0.00, 0.00, 320.00, 'cash', '2026-04-04 09:28:17', '2026-04-04 02:28:17', NULL),
(5, 'INV-20260404104027941', 1, '', 170.00, 0.00, 0.00, 170.00, 'cash', '2026-04-04 10:40:27', '2026-04-04 03:40:27', NULL),
(6, 'INV-20260405060413986', 1, '', 183.00, 0.00, 0.00, 183.00, 'cash', '2026-04-05 06:04:13', '2026-04-04 23:04:13', NULL),
(7, 'INV-20260406100244238', 1, '', 13.00, 0.00, 0.00, 13.00, 'cash', '2026-04-06 10:02:44', '2026-04-06 03:02:44', NULL),
(8, 'INV-20260406125131236', 1, '', 150.00, 0.00, 0.00, 150.00, 'cash', '2026-04-06 12:51:31', '2026-04-06 05:51:31', NULL),
(9, 'INV-20260406125229132', 1, '', 150.00, 0.00, 0.00, 150.00, 'cash', '2026-04-06 12:52:29', '2026-04-06 05:52:29', NULL),
(10, 'INV-20260406125246527', 1, '', 393.00, 0.00, 0.00, 393.00, 'cash', '2026-04-06 12:52:46', '2026-04-06 05:52:46', NULL),
(11, 'INV-20260406125315318', 1, '', 1456.00, 0.00, 0.00, 1456.00, 'cash', '2026-04-06 12:53:15', '2026-04-06 05:53:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `quantity`, `price`, `total`) VALUES
(1, 1, 2, 2, 150.00, 300.00),
(2, 2, 3, 1, 20.00, 20.00),
(3, 3, 3, 1, 20.00, 20.00),
(4, 3, 2, 1, 150.00, 150.00),
(5, 4, 3, 1, 20.00, 20.00),
(6, 4, 2, 2, 150.00, 300.00),
(7, 5, 2, 1, 150.00, 150.00),
(8, 5, 3, 1, 20.00, 20.00),
(9, 6, 5, 1, 13.00, 13.00),
(10, 6, 3, 1, 20.00, 20.00),
(11, 6, 2, 1, 150.00, 150.00),
(12, 7, 5, 1, 13.00, 13.00),
(13, 8, 2, 1, 150.00, 150.00),
(14, 9, 2, 1, 150.00, 150.00),
(15, 10, 2, 1, 150.00, 150.00),
(16, 10, 3, 1, 200.00, 200.00),
(17, 10, 5, 1, 13.00, 13.00),
(18, 10, 7, 1, 30.00, 30.00),
(19, 11, 2, 8, 150.00, 1200.00),
(20, 11, 3, 1, 200.00, 200.00),
(21, 11, 5, 2, 13.00, 26.00),
(22, 11, 7, 1, 30.00, 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `stock_movements`
--

CREATE TABLE `stock_movements` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` enum('in','out','adjust') NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_movements`
--

INSERT INTO `stock_movements` (`id`, `product_id`, `quantity`, `type`, `reference`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'out', 'INV-20260404091547456', 1, '2026-04-04 09:15:47', '2026-04-04 09:15:47'),
(2, 2, 1, 'out', 'INV-20260404091547456', 1, '2026-04-04 09:15:47', '2026-04-04 09:15:47'),
(3, 3, 1, 'out', 'INV-20260404092817786', 1, '2026-04-04 09:28:17', '2026-04-04 09:28:17'),
(4, 2, 2, 'out', 'INV-20260404092817786', 1, '2026-04-04 09:28:17', '2026-04-04 09:28:17'),
(5, 3, 322, 'in', '', 1, '2026-04-04 10:15:15', '2026-04-04 10:15:15'),
(6, 2, 1, 'out', 'INV-20260404104027941', 1, '2026-04-04 10:40:27', '2026-04-04 10:40:27'),
(7, 3, 1, 'out', 'INV-20260404104027941', 1, '2026-04-04 10:40:27', '2026-04-04 10:40:27'),
(8, 3, 123, 'in', '', 1, '2026-04-04 11:52:29', '2026-04-04 11:52:29'),
(9, 5, 1, 'out', 'INV-20260405060413986', 1, '2026-04-05 06:04:13', '2026-04-05 06:04:13'),
(10, 3, 1, 'out', 'INV-20260405060413986', 1, '2026-04-05 06:04:13', '2026-04-05 06:04:13'),
(11, 2, 1, 'out', 'INV-20260405060413986', 1, '2026-04-05 06:04:13', '2026-04-05 06:04:13'),
(12, 5, 1, 'out', 'INV-20260406100244238', 1, '2026-04-06 10:02:44', '2026-04-06 10:02:44'),
(13, 2, 12, 'in', '', 1, '2026-04-06 11:42:14', '2026-04-06 11:42:14'),
(14, 2, 1, 'out', 'INV-20260406125131236', 1, '2026-04-06 12:51:32', '2026-04-06 12:51:32'),
(15, 2, 1, 'out', 'INV-20260406125229132', 1, '2026-04-06 12:52:29', '2026-04-06 12:52:29'),
(16, 2, 1, 'out', 'INV-20260406125246527', 1, '2026-04-06 12:52:47', '2026-04-06 12:52:47'),
(17, 3, 1, 'out', 'INV-20260406125246527', 1, '2026-04-06 12:52:47', '2026-04-06 12:52:47'),
(18, 5, 1, 'out', 'INV-20260406125246527', 1, '2026-04-06 12:52:47', '2026-04-06 12:52:47'),
(19, 7, 1, 'out', 'INV-20260406125246527', 1, '2026-04-06 12:52:47', '2026-04-06 12:52:47'),
(20, 2, 8, 'out', 'INV-20260406125315318', 1, '2026-04-06 12:53:15', '2026-04-06 12:53:15'),
(21, 3, 1, 'out', 'INV-20260406125315318', 1, '2026-04-06 12:53:15', '2026-04-06 12:53:15'),
(22, 5, 2, 'out', 'INV-20260406125315318', 1, '2026-04-06 12:53:15', '2026-04-06 12:53:15'),
(23, 7, 1, 'out', 'INV-20260406125315318', 1, '2026-04-06 12:53:16', '2026-04-06 12:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `status` enum('active','inactive') DEFAULT 'active',
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `role`, `status`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'john', '', 'smoshiee34@gmail.com', NULL, '$2y$10$CmCoxsObm7d12U1fw3HrQOr4Vzl/gQ9Lu/0Cil29baNbtpMRXHWUm', 'admin', 'active', NULL, '2026-04-04 08:17:43', '2026-04-04 08:17:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stock_movements`
--
ALTER TABLE `stock_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD CONSTRAINT `stock_movements_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
