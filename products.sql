-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2023 at 12:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panandcoffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `size`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'Almond Almerreto', NULL, 'assets/item_images/Almond Amaretto Concha.jpg', '.35', '5', NULL, NULL, NULL),
(12, 'Pistaccio Concha', NULL, 'assets/item_images/Pistachio Concha.jpg', '.35', '5', NULL, NULL, NULL),
(13, 'Fudge chocalate', NULL, 'assets/item_images/Fudge Chocolate.jpg', '.35', '5.50', NULL, NULL, NULL),
(14, 'Sweet corn bread', NULL, 'assets/item_images/Sweet Corn.jpg', '.56', '5', NULL, NULL, NULL),
(15, 'Chai palmier', NULL, 'assets/item_images/Chai Palmier.jpg', '.29', '3.75', NULL, NULL, NULL),
(16, 'pecan muffin', NULL, 'assets/item_images/Pecan Muffin.jpg', '.30', '5', NULL, NULL, NULL),
(17, 'momkey bread', NULL, 'assets/item_images/Monkey Bread.jpg', '.30', '4.50', NULL, NULL, NULL),
(18, 'Pumpkin creame cheese muffin', NULL, 'assets/item_images/Pumpkin Muffin.jpg', '.38', '3.50', NULL, NULL, NULL),
(19, 'Nutepla', NULL, 'assets/item_images/Nutella Croissant.jpg', '.35', '5.50', NULL, NULL, NULL),
(20, 'expresso croissant', NULL, 'assets/item_images/Espresso Croissant.jpg', '.35', '5.50', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
