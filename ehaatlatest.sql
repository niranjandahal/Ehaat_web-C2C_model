-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 07:23 AM
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
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `nodejsusers`
--

CREATE TABLE `nodejsusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nodejsusers`
--

INSERT INTO `nodejsusers` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'niranjan', 'niranjan@gmail.com', 'abc', 'lamachaur,pokhara'),
(2, 'new users', 'niranjan@gmail.com', 'abc', 'lamachaur,pokhara');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `booked` varchar(1024) NOT NULL,
  `todeliver` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `product_name`, `product_description`, `product_category`, `product_price`, `product_image`, `approved`, `booked`, `todeliver`) VALUES
(140, 30, 'Product 1', 'Discover the freshness of Product 1, a vibrant and nutritious vegetable. Bursting with flavor and essential nutrients, this vegetable adds a healthy touch to your meals. Enjoy it in salads, stir-fries, and more. Category: Vegetables. Price: NPR 49.99.', 'food', 49.99, '../uploads/product1.jpg', 0, '', ''),
(141, 30, 'Product 2', 'Elevate your culinary creations with the delightful Product 2. This versatile vegetable offers a unique blend of textures and flavors, making it a favorite in various dishes. Experience its culinary magic today. Category: Vegetables. Price: NPR 39.99.', 'food', 39.99, '../uploads/product2.jpg', 0, '', ''),
(142, 30, 'Product 3', 'Add a burst of color to your plate with the vibrant Product 3. Rich in vitamins and antioxidants, this vegetable enhances the nutritional value of your meals. Create nutritious and delicious dishes with this kitchen essential. Category: Vegetables. Price: NPR 29.99.', 'food', 29.99, '../uploads/product3.jpg', 0, '', ''),
(143, 30, 'Product 4', 'Experience the earthy goodness of Product 4. Known for its robust flavor and versatility, this vegetable complements a wide range of cuisines. Incorporate it into your recipes for a satisfying and wholesome meal. Category: Vegetables. Price: NPR 34.99.', 'food', 34.99, '../uploads/product4.jpg', 1, '', ''),
(144, 30, 'Product 5', 'Indulge in the tender texture and subtle taste of Product 5. This vegetable is a culinary staple that shines in both simple and elaborate dishes. Elevate your cooking with the goodness of Product 5. Category: Vegetables. Price: NPR 24.99.', 'food', 24.99, '../uploads/product5.jpg', 1, '', ''),
(145, 30, 'Product 6', 'Enhance your meals with the exquisite flavor of Product 6. This versatile vegetable adds depth and complexity to a variety of recipes. Whether roasted, grilled, or sautéed, Product 6 is a culinary delight. Category: Vegetables. Price: NPR 44.99.', 'food', 44.99, '../uploads/product6.jpg', 0, '', ''),
(146, 30, 'Product 7', 'Explore the world of taste with the distinct character of Product 7. This vegetable boasts a unique profile that makes it a must-try in different dishes. Elevate your cooking game with the extraordinary flavors of Product 7. Category: Vegetables. Price: NPR 54.99.', 'food', 54.99, '../uploads/product7.jpg', 1, '', ''),
(147, 30, 'Product 8', 'Savor the natural goodness of Product 8, a garden-fresh vegetable packed with vitamins and minerals. From soups to salads, Product 8 adds a burst of nutrition and flavor to your recipes. Enjoy its wholesome benefits. Category: Vegetables. Price: NPR 49.99.', 'food', 49.99, '../uploads/product8.jpg', 1, '', ''),
(148, 30, 'Product 9', 'Experience the culinary versatility of Product 9. This vegetable shines as a star ingredient in various dishes. Its robust texture and flavor make it a favorite among cooks and food enthusiasts. Discover the magic of Product 9 today. Category: Vegetables. Price: NPR 37.99.', 'food', 37.99, '../uploads/product9.jpg', 1, '', ''),
(149, 31, 'Product 10', 'Discover the richness of Product 10, a vegetable that embodies health and taste. With its vibrant color and delightful taste, Product 10 is perfect for adding a pop of nutrition to your daily meals. Category: Vegetables. Price: NPR 27.99.', 'food', 27.99, '../uploads/product10.jpg', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `full_name`, `address`, `phone_number`, `email`, `password`) VALUES
(30, 'adk', 'morang,belbari', 2147483647, 'hadka@gmail.com', '$2y$10$VwDWgbnjvI33VrLc1.YTw.b2HP2eEnDfnDzEERmQzjwA7oUYgBHPa'),
(31, 'hfhjajdf', 'dafs', 22222, 'adhikariaayush37@gmail.com', '$2y$10$wiX1ETH35RJJ8NTHLQsTa.xvPGMBvmWviq17b2X4Ns7Hlf780hQb.'),
(32, 'Hami nepali', 'pokhara', 984571258, 'haminepali2093@gmail.com', '$2y$10$Gf4lL7PA68HHHFSVG7uF0uIIDYOxrCkAg0meU50f8WNURjyKYit3e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `ordereditem` varchar(1024) NOT NULL,
  `approveditem` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `address`, `email`, `password`, `phone_number`, `ordereditem`, `approveditem`) VALUES
(18, 'Niranjan Dahal', 'lamachaur,pokhara', 'niranjan@gmail.com', '$2y$10$87WkDsGs5UpL5KbUr56lSOGzGM61gVm3RXbW5/NWh0GEB/5iGFq0y', 2147483647, '', ''),
(19, 'hari baral', 'bagar,pokhara', 'haribaral@gmail.com', '$2y$10$iFTE2nhQXt.k4fFk7m5NZ.upwS8h5R2ObDCp9mK6cPWAQkoHPf8qG', 2147483647, '', ''),
(21, 'ram dhakal', 'lamachaur,pokhara', 'ramdhakal@gmail.com', '$2y$10$/jGGIwFOp.NjIMI77kJol.re8kEaY30hgFSoeGVF3CRWN39zlqRRa', 22222, '', ''),
(22, 'Hami nepali', 'pokhara', 'haminepali2093@gmail.com', '$2y$10$vmO5.v67wIVd078olW899.HWdED/oxvjVptKRRGGEelCRsD0Na7Ce', 2147483647, '', ''),
(23, 'fsadf', 'dasf', 'a@gmail.com', '$2y$10$j0YhGQGKw16YtdMcnbdDoO6s.lQRdhhavRgyNnnLgb16Hhw9vxuZK', 2, '', ''),
(24, 'temp', 'sdffasf', 'b@gmail.com', '$2y$10$ZSjowWHnnAP5DP1unpbZM.cLZ2yoXNJLic0i5lXWRwSeIFlU8fnye', 222, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nodejsusers`
--
ALTER TABLE `nodejsusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nodejsusers`
--
ALTER TABLE `nodejsusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3333;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
