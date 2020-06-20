-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 09:38 PM
-- Server version: 8.0.11
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_mode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(11) NOT NULL,
  `product_code` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`, `image`, `product_code`) VALUES
(1, 'Chicken', 200, 'pizza1.jpg', 'r102'),
(2, 'Cheese', 400, 'pizza2.jpg', 'r102'),
(3, 'Beef', 500, 'pizza3.jpg', 'r102'),
(4, 'Chicken', 600, 'burger1.jpg', 'r101'),
(5, 'Beef', 300, 'burger2.jpg', 'r101'),
(6, 'Mutton', 550, 'burger3.jpg', 'r101'),
(7, 'Lemon', 80, 'juice1.jpg', 'r103'),
(8, 'Pineapple', 120, 'juice2.jpg', 'r103'),
(9, 'Chicken ', 350, 'k2.jpg', 'r107'),
(10, 'Mutton', 450, 'k3.jpg', 'r107');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `image`, `price`) VALUES
(1, 'burger1', 'burger1.jpg', 200),
(2, 'burger1', 'burger1.jpg', 200);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `email`, `mobile`, `password`, `address`) VALUES
(13, 'Tamzid', 'alam.tamzid@live.com', '+880859898', '1234', 'Dhaka'),
(14, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restId` varchar(10) NOT NULL,
  `restName` varchar(30) NOT NULL,
  `restIcon` varchar(30) NOT NULL,
  `restAddress` varchar(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restId`, `restName`, `restIcon`, `restAddress`) VALUES
('r101', 'Baba Rafi', 'babaRafi.jpg', 'Mehedi Mart , Bashundhara R/A'),
('r102', 'Pizza Hut', 'pizzaHut.jpg', 'Bashundhara Gate.'),
('r103', 'juice And Juice - Food Hall', 'juiceAndJuice.jpeg', 'Mehedi Mart , Bashundhara R/A'),
('r104', 'Burger Mania', 'burgerMania.jpg', 'Bashundhara'),
('r105', 'Cha Time ', 'chaTime.jpg', 'Rajbari Food Court'),
('r106', 'Jafran', 'jafran.jpg', 'Road -2 , Block -A , Bashundhara R/A'),
('r107', 'Kacchi Vai', 'kacchiVai.png', 'Bashundhara Gate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
