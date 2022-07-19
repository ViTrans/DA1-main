-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 03:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Đức Tiến', 'demo@gmail.com', '123@abc'),
(2, 'Vĩ Trần', 'demo1@gmail.com', 'abc@123'),
(3, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status_delete`) VALUES
(4, 'Nam', 0),
(96, 'Nữ', 0),
(97, 'Unisex', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `phone`, `address`, `status_delete`) VALUES
(1, 'Missi Perfume', ' 0909638523', '285/141 CMT8, P.12, Q.10, Tp Hồ Chí Minh', 0),
(2, 'Jolie Dion', '091363688', '285/141 CMT8, P.12, Q.10, Tp Hồ Chí Minh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `name_receive` varchar(255) DEFAULT NULL,
  `phone_receive` varchar(255) DEFAULT NULL,
  `address_receive` text DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `time`, `name_receive`, `phone_receive`, `address_receive`, `note`, `status`, `user_id`, `status_delete`, `total_price`) VALUES
(1, '2022-07-17 13:57:17', 'Vũ Đức Tiến', '0333669832', 'Kiên Giang', NULL, 0, 1, 0, 720000),
(2, '2022-07-17 21:47:14', 'Trần Bảo Vĩ', '123456789', 'Ninh kiều, Cần Thơ', NULL, 0, 2, 0, 100000),
(3, '2022-07-17 22:14:07', 'Nguyễn Trung Thành', '01424203123', 'An Giang', NULL, 0, 4, 0, 180000),
(4, '2022-07-17 22:14:53', 'Trần Quốc Vinh', '0412412412', 'Bến Tre', NULL, 0, 3, 0, 1900000);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`quantity`, `product_id`, `order_id`, `price`, `total`) VALUES
(3, 2, 1, 180000, 540000),
(5, 5, 1, 180000, 180000),
(2, 5, 2, 50000, 100000),
(1, 5, 3, 180000, 180000),
(1, 5, 4, 1900000, 1900000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `img`, `category_id`, `manufacturer_id`, `status_delete`, `create_at`, `update_at`) VALUES
(2, 'Gucci Guilty Pour Femme EDP', 3650000, 'Nước hoa nữ Gucci Guilty Pour Femme EDP chính thức được ra mắt vào đầu năm 2018 sau thành công của phiên bản nam Gucci Guilty Pour Homme cực kỳ thành công của thương hiệu. Chính vì thế, dưới sự sáng tạo của Alessandro Michele và bậc thầy nước hoa Alberto ', 'a0c1afd44b74ee87f3519eeae6598648.jpg', 4, 2, 0, '2022-07-11 20:47:47', NULL),
(5, 'Jean Paul Gaultier Le Male test', 1900000, 'Với hương thơm Le Male EDT đặc trưng sẽ giúp chàng tự tin suốt ngày dài, hương nước hoa bám trên da lâu hơn, đặc biệt giúp chàng thư giãn và mang đến cảm giác thoải mái', 'd80cc85e29d90edfa4200160612a6be3.jpg', 96, 1, 0, '2022-07-11 21:07:09', '2022-07-14 18:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `birthday`, `gender`, `status_delete`) VALUES
(1, 'Vũ Đức Tiến', 'vuductien2908@gmail.com', '123456', '0913636889', 'Kiên Giang', '2002-07-28', 1, 0),
(2, 'Trần bảo vĩ', 'vitran@gmail.com', '123456', '12345678910', 'Ninh Kiều - Cần Thơ', '2022-07-30', 1, 0),
(3, 'Nguyễn Văn A', 'nguyenvanA@gmail.com', '$2y$10$kKM1BBXy498ys909s55o1Os4I6podJhUEcVCKgsZl30JoLVfM91lK', '0917509374', '174 Nguyễn Trung Trực, Rạch Giá', '2022-07-19', 1, 0),
(4, 'Nguyễn Văn C', 'nguyenvanc@gamil.com', '$2y$10$V8LUV1bPf0tIzDr/HrENCei0XURYj23BYUbtKyv8Ty5wIq5.WShvK', '12345678911', 'Phố cổ Hà nội', '2002-06-18', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk1` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_details_fk2` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `product_fk1` (`category_id`),
  ADD KEY `product_fk2` (`manufacturer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_fk2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_fk1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_fk2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
