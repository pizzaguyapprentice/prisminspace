-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 01:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prisminspacedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `basketid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basketid`, `userid`, `productid`) VALUES
(7, 21, 1),
(10, 21, 4),
(14, 21, 1),
(15, 21, 4),
(17, 21, 3),
(19, 21, 2),
(20, 21, 2),
(31, 15, 4),
(32, 15, 3),
(33, 15, 1),
(34, 15, 4),
(35, 21, 3),
(36, 22, 1),
(37, 22, 4),
(38, 22, 2),
(39, 22, 3),
(40, 22, 2),
(41, 22, 1),
(42, 69, 2),
(43, 69, 1),
(44, 69, 1),
(45, 21, 2),
(46, 21, 1),
(47, 21, 1),
(48, 21, 2),
(49, 21, 4),
(50, 21, 3),
(51, 21, 2),
(52, 71, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `date`, `userid`, `productid`, `address`, `city`, `postcode`, `email`) VALUES
(1, '2025-03-26 10:23:23', 15, 4, '', '', '', ''),
(2, '2025-03-26 11:49:17', 15, 3, '', '', '', ''),
(12, '2025-04-24 20:01:32', 21, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(13, '2025-04-24 20:01:32', 21, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(14, '2025-04-24 20:01:32', 21, 3, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(15, '2025-04-24 20:01:32', 21, 4, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(16, '2025-04-24 20:01:44', 21, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(17, '2025-04-24 20:16:14', 21, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(18, '2025-04-24 20:16:14', 21, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(19, '2025-04-24 20:16:14', 21, 4, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(20, '2025-04-24 20:17:16', 21, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(21, '2025-04-24 20:17:16', 21, 3, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(22, '2025-04-24 21:14:28', 15, 1, 'adad', 'adad', 'adad', ''),
(23, '2025-04-24 21:14:28', 15, 3, 'adad', 'adad', 'adad', ''),
(24, '2025-04-24 21:22:44', 15, 2, 'my house', 'dublin', 'adadad', ''),
(25, '2025-04-24 23:03:56', 15, 3, 'asdsd', 'asda', 'ada', ''),
(26, '2025-04-24 23:03:56', 15, 4, 'asdsd', 'asda', 'ada', ''),
(27, '2025-04-27 13:45:07', 21, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(28, '2025-04-27 13:45:07', 21, 3, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(29, '2025-04-27 13:50:37', 22, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(30, '2025-04-27 13:50:37', 22, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(31, '2025-04-27 13:50:37', 22, 3, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(32, '2025-04-27 13:50:37', 22, 4, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(33, '2025-04-27 19:22:01', 22, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', ''),
(34, '2025-04-27 22:38:19', 21, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', NULL),
(35, '2025-04-27 22:46:45', 69, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', NULL),
(36, '2025-04-27 22:46:45', 69, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03', NULL),
(37, '2025-04-27 23:03:41', 69, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03', 'ajkdsjd@gfjdbghjd.com'),
(38, '2025-04-27 23:45:58', 21, 1, 'adadad', 'adadad', 'a997070', 'ajkdsjd@gfjdbghjd.com'),
(39, '2025-04-27 23:45:58', 21, 2, 'adadad', 'adadad', 'a997070', 'ajkdsjd@gfjdbghjd.com'),
(40, '2025-04-28 00:18:35', 21, 1, 'ddd', 'ddd', '1232aaa', 'ajkdsjd@gfjdbghjd.com'),
(41, '2025-04-28 00:18:35', 21, 2, 'ddd', 'ddd', '1232aaa', 'ajkdsjd@gfjdbghjd.com'),
(42, '2025-04-28 00:18:35', 21, 3, 'ddd', 'ddd', '1232aaa', 'ajkdsjd@gfjdbghjd.com'),
(43, '2025-04-28 00:18:35', 21, 4, 'ddd', 'ddd', '1232aaa', 'ajkdsjd@gfjdbghjd.com'),
(44, '2025-04-28 00:21:32', 21, 2, 'fddf', 'dfdfd', '5454444', 'ajkdsjd@gfjdbghjd.com'),
(45, '2025-04-28 01:04:56', 71, 2, 'ddd', 'ddd', 'ddddddd', 'ajkdsjd@gfjdbghjd.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(45) DEFAULT NULL,
  `productprice` float DEFAULT NULL,
  `productamount` int(11) DEFAULT NULL,
  `productimage` varchar(100) NOT NULL,
  `productdescription` longtext NOT NULL,
  `productsize` varchar(45) NOT NULL,
  `productcategory` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productprice`, `productamount`, `productimage`, `productdescription`, `productsize`, `productcategory`) VALUES
(1, 'Tank Top Thorned Skull', 24.99, 15, 'tanktop-jesus.jpg', 'This is sample text for a description.', '', 'Tank Top'),
(2, 'T-Shirt Drown and Wave', 28.99, 17, 'tshirt-drown.jpg', 'This is a sample description.', '', 'T-Shirt'),
(3, 'Tank Top Horned Skull ', 31.5, 8, 'tanktop-skull.jpg', 'This is a sample description.', '', 'Tank Top'),
(4, 'T-Shirt Aztec Ring', 19.5, 31, 'tshirt-skull.jpg', 'This is a sample description.', '', 'T-Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receiptid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `totalprice` double NOT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receiptid`, `orderid`, `date`, `totalprice`, `userid`, `email`) VALUES
(1, 1, '2025-03-26 11:24:25', 25, 0, ''),
(2, 2, '2025-03-26 12:49:50', 11, 0, ''),
(3, 12, '2025-04-24 20:01:32', 115, 21, ''),
(4, 13, '2025-04-24 20:01:32', 115, 21, ''),
(5, 14, '2025-04-24 20:01:32', 115, 21, ''),
(6, 15, '2025-04-24 20:01:32', 115, 21, ''),
(7, 16, '2025-04-24 20:01:44', 11, 21, ''),
(8, 17, '2025-04-24 20:16:14', 86, 21, ''),
(9, 18, '2025-04-24 20:16:14', 86, 21, ''),
(10, 19, '2025-04-24 20:16:14', 86, 21, ''),
(11, 20, '2025-04-24 20:17:16', 40, 21, ''),
(12, 21, '2025-04-24 20:17:16', 40, 21, ''),
(13, 22, '2025-04-24 21:14:28', 79, 15, ''),
(14, 23, '2025-04-24 21:14:28', 79, 15, ''),
(15, 24, '2025-04-24 21:22:44', 11, 15, ''),
(16, 25, '2025-04-24 23:03:56', 54, 15, ''),
(17, 26, '2025-04-24 23:03:56', 54, 15, ''),
(18, 27, '2025-04-27 13:45:07', 56.49, 21, ''),
(19, 28, '2025-04-27 13:45:07', 56.49, 21, ''),
(20, 29, '2025-04-27 13:50:37', 104.98, 22, ''),
(21, 30, '2025-04-27 13:50:37', 104.98, 22, ''),
(22, 31, '2025-04-27 13:50:37', 104.98, 22, ''),
(23, 32, '2025-04-27 13:50:37', 104.98, 22, ''),
(24, 33, '2025-04-27 19:22:01', 28.99, 22, ''),
(25, 34, '2025-04-27 22:38:19', 24.99, 21, NULL),
(26, 35, '2025-04-27 22:46:45', 53.98, 69, NULL),
(27, 36, '2025-04-27 22:46:45', 53.98, 69, NULL),
(28, 37, '2025-04-27 23:03:41', 24.99, 69, 'ajkdsjd@gfjdbghjd.com'),
(29, 38, '2025-04-27 23:45:58', 53.98, 21, 'ajkdsjd@gfjdbghjd.com'),
(30, 39, '2025-04-27 23:45:58', 53.98, 21, 'ajkdsjd@gfjdbghjd.com'),
(31, 40, '2025-04-28 00:18:35', 83.984, 21, 'ajkdsjd@gfjdbghjd.com'),
(32, 41, '2025-04-28 00:18:35', 83.984, 21, 'ajkdsjd@gfjdbghjd.com'),
(33, 42, '2025-04-28 00:18:35', 83.984, 21, 'ajkdsjd@gfjdbghjd.com'),
(34, 43, '2025-04-28 00:18:35', 83.984, 21, 'ajkdsjd@gfjdbghjd.com'),
(35, 44, '2025-04-28 00:21:32', 28.99, 21, 'ajkdsjd@gfjdbghjd.com'),
(36, 45, '2025-04-28 01:04:56', 28.99, 71, 'ajkdsjd@gfjdbghjd.com');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refundid` int(11) NOT NULL,
  `receiptid` int(11) NOT NULL,
  `date` date NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `reviewdescription` longtext NOT NULL,
  `reviewrating` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profilepicture` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `username`, `password`, `profilepicture`) VALUES
(2, '1', '2', '3', ''),
(12, '', '', '', ''),
(13, '', '', '', ''),
(14, '', '', '', ''),
(15, 'test', 'test', 'test', 'user_test_1742983830.png'),
(16, 'ethan', 'ethan', '123', ''),
(17, 'mati', 'mati123', '123', ''),
(18, 'qwe', 'qwe', 'qwe', 'user_qwe_1742593747.png'),
(20, 'mati', 'mati', '123', 'N/A'),
(21, 'D', 'ddd', 'ddd', 'N/A'),
(22, 'grzegorz', 'big_stallion', 'ddd', 'N/A'),
(69, 'Guest', 'an', 'an', ''),
(70, 'Fortnite', 'Fortnite', 'ddd', 'N/A'),
(71, 'ddddd', 'ddddd', 'ddd', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basketid`),
  ADD KEY `fk_basket_1_idx` (`userid`),
  ADD KEY `fk_basket_2_idx` (`productid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `fk_orders_1_idx` (`userid`),
  ADD KEY `fk_orders_2_idx` (`productid`),
  ADD KEY `productID` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receiptid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `fk_userid` (`userid`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refundid`),
  ADD KEY `receiptid` (`receiptid`),
  ADD KEY `receiptid_2` (`receiptid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receiptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `refundid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `fk_basket_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_basket_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`receiptid`) REFERENCES `receipts` (`receiptid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
