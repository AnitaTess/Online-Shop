-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2021 at 08:56 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erevive`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `age` decimal(10,0) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `name`, `brand`, `category`, `age`, `price`, `image`, `user_id`) VALUES
(1, 'Iphone 6', 'Apple', 'Phones', '5', '55.60', '1614281761phone.png', 2),
(2, 'Samsung S8', 'Samsung', 'Phones', '2', '190.00', '1614282238samsung.jpg', 2),
(3, 'Iphone 8', 'Apple', 'Phones', '3', '145.50', '1614281852phone.png', 2),
(4, 'Iphone X', 'Apple', 'Phones', '2', '185.70', '1614282015phone.png', 2),
(5, 'Samsung S6', 'Samsung', 'Phones', '5', '44.90', '1614282184samsung.jpg', 2),
(6, 'HP Deskjet 1224', 'HP', 'Printers', '1', '55.70', '1614282321printer.jpg', 2),
(7, '24\'\' LED Display Monitor', 'LG', 'Computer equipment', '2', '33.50', '1614282450monitor.jpg', 2),
(8, 'Inspiron 7700', 'Dell', 'Computers', '3', '200.00', '1614282527comp.jpg', 2),
(9, 'ZenBook UX', 'ASUS', 'Laptops', '2', '200.00', '1614282638laptop.jpg', 2),
(10, 'XBOX ONE', 'Microsoft', 'Consoles', '3', '55.00', '1614282712xbox.png', 2),
(11, 'Playstation 2', 'SONY', 'Consoles', '7', '25.60', '1614282837ps2.jpg', 2),
(12, 'Ergonomic Keyboard', 'Microsoft', 'Computer equipment', '4', '30.00', '1614282897kay.jpg', 2),
(13, 'OptiPlex 9020', 'Dell', 'Computers', '2', '250.00', '1614282971comp.jpg', 2),
(14, 'Radio XDRP1', 'SONY', 'Music devices', '6', '15.00', '1614283029radio.jpg', 2),
(15, 'Cube FM/AM CLock ', 'SONY', 'Others', '5', '30.00', '1614283090clock.jpg', 2),
(19, '30339545', 'Other', 'Computers', '5', '50.50', '1613962116lapek.jpg', 2),
(23, 'Nokia 5310', 'Nokia', 'Phones', '9', '23.70', '1614283862nokia.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role`) VALUES
(1, 'c@op.pl', '$2y$10$TBrZDpUrWKYGh5GXTH/kx.92ugya4NHeLvxzHP1fTJ6yO8YnymhQ2', NULL),
(2, 'a@op.pl', '$2y$10$2wp3G/d44Pjn9F.p5Yz.7OatcCgnL5pQ4R3sBgusL8blNHBFdRrPi', 'admin'),
(19, 'b@op.pl', '$2y$10$UVPAhxA4ZprB0rcfTNYRjObZ36zH0acyG6KO5yltASH3DrRZKVmxq', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
