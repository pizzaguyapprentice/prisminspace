-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 05:07 PM
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
(0, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `date`, `userid`, `productid`, `address`, `city`, `postcode`) VALUES
(1, '2025-03-23 16:48:12', 20, 1, NULL, NULL, NULL),
(2, '2025-03-23 16:48:12', 20, 2, NULL, NULL, NULL),
(3, '2025-03-23 16:48:12', 20, 3, NULL, NULL, NULL),
(4, '2025-03-23 16:48:12', 20, 4, NULL, NULL, NULL),
(5, '2025-03-23 16:51:14', 20, 1, NULL, NULL, NULL),
(6, '2025-03-23 16:51:14', 20, 2, NULL, NULL, NULL),
(7, '2025-03-23 16:51:14', 20, 3, NULL, NULL, NULL),
(8, '2025-03-23 16:51:14', 20, 4, NULL, NULL, NULL),
(9, '2025-03-23 16:51:20', 20, 2, NULL, NULL, NULL),
(10, '2025-03-23 16:51:20', 20, 3, NULL, NULL, NULL),
(11, '2025-03-23 17:03:34', 20, 1, '135 Churchfields', 'Ashbourne', 'A84 AP03'),
(12, '2025-03-23 17:03:34', 20, 2, '135 Churchfields', 'Ashbourne', 'A84 AP03'),
(13, '2025-03-23 17:03:34', 20, 3, '135 Churchfields', 'Ashbourne', 'A84 AP03'),
(14, '2025-03-23 17:03:34', 20, 4, '135 Churchfields', 'Ashbourne', 'A84 AP03'),
(15, '2025-03-23 17:06:15', 20, 1, 'dd', 'dd', 'ddd'),
(16, '2025-03-23 17:06:15', 20, 2, 'dd', 'dd', 'ddd'),
(17, '2025-03-23 17:06:15', 20, 3, 'dd', 'dd', 'ddd'),
(18, '2025-03-23 17:06:15', 20, 4, 'dd', 'dd', 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(45) DEFAULT NULL,
  `productprice` int(11) DEFAULT NULL,
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
(1, 'test', 50, 11, 'testimage', '', '', ''),
(2, 'test2', 11, 15, 'testimage2', '', '', ''),
(3, 'T-Shirt Rich Cotton', 29, 11, '', '', '', ''),
(4, 'T-Shirt Unique Design', 25, 16, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receiptid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `totalprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receiptid`, `userid`, `orderid`, `date`, `totalprice`) VALUES
(1, 20, 1, '2025-03-23 16:48:12', 115),
(2, 20, 2, '2025-03-23 16:48:12', 115),
(3, 20, 3, '2025-03-23 16:48:12', 115),
(4, 20, 4, '2025-03-23 16:48:12', 115),
(5, 20, 5, '2025-03-23 16:51:14', 115),
(6, 20, 6, '2025-03-23 16:51:14', 115),
(7, 20, 7, '2025-03-23 16:51:14', 115),
(8, 20, 8, '2025-03-23 16:51:14', 115),
(9, 20, 9, '2025-03-23 16:51:20', 40),
(10, 20, 10, '2025-03-23 16:51:20', 40),
(11, 20, 11, '2025-03-23 17:03:34', 115),
(12, 20, 12, '2025-03-23 17:03:34', 115),
(13, 20, 13, '2025-03-23 17:03:34', 115),
(14, 20, 14, '2025-03-23 17:03:34', 115),
(15, 20, 15, '2025-03-23 17:06:15', 115),
(16, 20, 16, '2025-03-23 17:06:15', 115),
(17, 20, 17, '2025-03-23 17:06:15', 115),
(18, 20, 18, '2025-03-23 17:06:15', 115);

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
(15, 'test', 'test', 'test', ''),
(16, 'ethan', 'ethan', '123', ''),
(17, 'mati', 'mati123', '123', ''),
(18, 'qwe', 'qwe', 'qwe', 'user_qwe_1742593747.png'),
(20, 'dddd', 'ddd', 'ddd', 'N/A');

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
  ADD KEY `userid` (`userid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refundid`),
  ADD KEY `receiptid` (`receiptid`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receiptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`receiptid`) REFERENCES `receipts` (`receiptid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
