-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 10:13 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(50) NOT NULL,
  `company_contact` varchar(50) NOT NULL,
  `company_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_contact`, `company_date`) VALUES
(1, 'CocaCacola pvt ltd', 'jadibuti', '2121212', '2019-02-13'),
(2, 'Chaudhary graoup pvt ltd', 'butwal', '+988-98797898', '2019-02-13'),
(3, 'Surya pvt ldt', 'chitwan nepal', '+277-298928', '2019-02-13'),
(4, 'abc company', 'ason galli, kathmandu', '+5445454544', '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(60) NOT NULL,
  `customer_address` varchar(80) NOT NULL,
  `customer_contact` varchar(60) NOT NULL,
  `customer_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_contact`, `customer_date`) VALUES
(1, 'ram prashad', 'bolacheen', '+97-98989898', '2019-02-13'),
(2, 'surendra lal', 'byasi', '+97-00989898', '2019-02-13'),
(3, 'harshit suwal', 'kamalbinayak', '+9-099898', '2019-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `dr_amount` int(11) NOT NULL,
  `cr_amount` int(11) NOT NULL,
  `balanced` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `company_id`, `customer_id`, `discount`, `dr_amount`, `cr_amount`, `balanced`, `sales_id`, `time`) VALUES
(1, 1, 1, 0, 0, 179, 180, 1, '2019-02-13 10:46:13'),
(2, 1, 1, 0, 55, 1, 105, 1, '2019-02-13 10:49:18'),
(3, 1, 1, 55, 5, 55, 52, 1, '2019-02-17 08:32:04'),
(4, 2, 1, 5, 5, 1, 5, 2, '2019-02-26 09:37:57'),
(5, 2, 1, 454, 54, 54, 4, 2, '2019-03-03 15:28:35'),
(6, 1, 1, 45, 45, 454, 5, 1, '2019-03-03 15:31:41'),
(7, 1, 1, 21, 21, 212, 2, 1, '2019-03-03 15:35:23'),
(8, 2, 2, 515, 15, 1, 21, 3, '2019-03-03 15:37:30'),
(9, 1, 1, 54, 5, 454, 5, 1, '2019-03-03 15:42:46'),
(10, 2, 1, 2, 2, 2, 21, 2, '2019-03-03 15:45:32'),
(11, 3, 1, 0, 0, 0, 0, 4, '2019-03-03 15:48:31'),
(12, 2, 1, 0, 0, 0, 0, 2, '2019-03-03 15:52:33'),
(13, 1, 1, 5, 0, 0, 0, 1, '2019-03-03 15:53:55'),
(14, 1, 1, 67, 94, 62, 48, 1, '2019-03-05 07:57:09'),
(15, 1, 1, 65, 88, 56, 94, 1, '2019-03-05 08:09:33'),
(16, 1, 2, 0, 0, 0, 0, 5, '2019-03-06 04:47:51'),
(17, 2, 3, 0, 0, 0, 0, 6, '2019-03-08 12:59:39'),
(18, 1, 1, 42, 47, 25, 70, 1, '2019-03-08 13:41:03'),
(19, 4, 1, 45, 45, 45, 545, 7, '2019-03-13 12:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_catagory` varchar(60) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_particular` varchar(240) NOT NULL,
  `product_description` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(60) NOT NULL,
  `unit` int(11) NOT NULL,
  `pic` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_catagory`, `product_code`, `product_particular`, `product_description`, `company_id`, `company_name`, `unit`, `pic`, `qty`, `product_date`) VALUES
(1, 'sprit', 'cold-drinks', 'c1', 'purchase', 'description', 1, 'CocaCacola pvt ltd', 4000, 36, 14, '2019-02-13'),
(2, 'fanta', 'cold-drinks', 'c2', 'purchase', 'description', 1, 'CocaCacola pvt ltd', 189, 292, 831, '2019-02-13'),
(3, 'lemonda', 'soda', 'c3', 'purchase', 'cold-drink soda', 1, 'CocaCacola pvt ltd', 65657, 1, 1, '2019-02-13'),
(4, 'yi-yi', 'dry food', 'cg1', 'purchase', 'description', 2, 'Chaudhary graoup pvt ltd', 89820, 15, 12, '2019-02-13'),
(5, 'cg biscuits', 'dry food', 'cg2', 'purchase', 'description', 2, 'Chaudhary graoup pvt ltd', 96, 555, 27, '2019-02-13'),
(6, 'surya', 'smoking', 's1', 'purchase', 'description', 3, 'Surya pvt ldt', 2, 20, 40, '2019-02-13'),
(7, 'pailot', 'smoking', 's2', 'purchase', 'description', 3, 'Surya pvt ldt', 2, 20, 40, '2019-02-13'),
(8, 'mugi', 'dalmod', 'mugi1', 'purchase', 'dry food', 4, 'abc company', 0, 5, 495, '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `repayment`
--

CREATE TABLE `repayment` (
  `payment_re_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `repaid_amount` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repayment`
--

INSERT INTO `repayment` (`payment_re_id`, `date`, `company_id`, `customer_id`, `repaid_amount`, `sales_id`) VALUES
(1, '2019-03-13', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_info`
--

CREATE TABLE `sales_info` (
  `sales_id` int(11) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(80) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_info`
--

INSERT INTO `sales_info` (`sales_id`, `company_id`, `company_name`, `customer_id`, `customer_name`, `time`) VALUES
(1, 1, 'CocaCacola pvt ltd', 1, 'ram prashad', '2019-02-13 10:46:13'),
(2, 2, 'Chaudhary graoup pvt ltd', 1, 'ram prashad', '2019-02-26 09:37:57'),
(3, 2, 'Chaudhary graoup pvt ltd', 2, 'surendra lal', '2019-03-03 15:37:30'),
(4, 3, 'Surya pvt ldt', 1, 'ram prashad', '2019-03-03 15:48:31'),
(5, 1, 'CocaCacola pvt ltd', 2, 'surendra lal', '2019-03-06 04:47:51'),
(6, 2, 'Chaudhary graoup pvt ltd', 3, 'harshit suwal', '2019-03-08 12:59:39'),
(7, 4, 'abc company', 1, 'ram prashad', '2019-03-13 12:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `sales_item_details`
--

CREATE TABLE `sales_item_details` (
  `s_detail_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `unit` int(11) NOT NULL,
  `pic` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_item_details`
--

INSERT INTO `sales_item_details` (`s_detail_id`, `product_name`, `unit`, `pic`, `qty`, `rate`, `amount`, `sales_id`, `time`) VALUES
(1, 'sprit ', 1, 12, 12, 15, 180, 1, '2019-02-13 10:46:13'),
(2, 'fanta ', 1, 12, 12, 15, 180, 1, '2019-02-13 10:46:13'),
(3, 'fanta ', 1, 12, 12, 5, 60, 1, '2019-02-13 10:49:18'),
(4, 'lemonda ', 1, 9, 9, 5, 45, 1, '2019-02-13 10:49:18'),
(5, 'sprit ', 2, 3, 5, 55, 5, 1, '2019-02-17 08:32:04'),
(6, 'yi-yi ', 54, 5, 54, 54, 54, 2, '2019-02-26 09:37:57'),
(7, 'cg biscuits ', 51, 515, 5, 15, 5, 2, '2019-02-26 09:37:57'),
(8, 'yi-yi ', 5, 4, 54, 545, 5, 2, '2019-03-03 15:28:35'),
(9, 'cg biscuits ', 45, 45, 51, 5415, 155, 2, '2019-03-03 15:28:35'),
(10, 'fanta ', 55, 54, 54, 545, 45, 1, '2019-03-03 15:31:41'),
(11, 'lemonda ', 1, 1, 1, 1, 1, 1, '2019-03-03 15:35:23'),
(12, 'cg biscuits ', 1, 5, 5, 51, 515, 3, '2019-03-03 15:37:30'),
(13, 'sprit ', 5, 45, 45, 45, 45, 1, '2019-03-03 15:42:46'),
(14, 'fanta ', 45, 45, 45, 45, 45, 1, '2019-03-03 15:42:46'),
(15, 'cg biscuits ', 2, 2, 2, 2, 2, 2, '2019-03-03 15:45:32'),
(16, 'pailot ', 0, 0, 0, 0, 0, 4, '2019-03-03 15:48:31'),
(17, 'yi-yi ', 24, 0, 0, 0, 0, 2, '2019-03-03 15:52:33'),
(18, 'fanta ', 54, 54, 54, 54, 54, 1, '2019-03-03 15:53:55'),
(19, 'fanta ', 25, 67, 481, 98, 88, 1, '2019-03-05 07:57:09'),
(20, 'fanta ', 70, 98, 353, 60, 2, 1, '2019-03-05 08:09:33'),
(21, 'lemonda ', 65656, 0, 0, 5555, 0, 5, '2019-03-06 04:47:51'),
(22, 'yi-yi ', 989898, 0, 0, 0, 0, 6, '2019-03-08 12:59:39'),
(23, 'fanta ', 60, 38, 156, 20, 40, 1, '2019-03-08 13:41:03'),
(24, 'mugi ', 50, 5, 5, 454, 521, 7, '2019-03-13 12:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `sales_transact`
--

CREATE TABLE `sales_transact` (
  `sales_transact_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `sales_date` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `unpaid` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `balanced` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_transact`
--

INSERT INTO `sales_transact` (`sales_transact_id`, `sales_id`, `sales_date`, `sub_total`, `discount`, `paid`, `unpaid`, `grand_total`, `balanced`, `company_id`, `customer_id`, `date`) VALUES
(1, 1, 2019, 360, 0, 0, 180, 180, 180, 1, 1, '2019-02-13 10:46:13'),
(2, 1, 2019, 105, 0, 55, 1, 150, 105, 1, 1, '2019-02-13 10:49:18'),
(3, 1, 2019, 5, 55, 5, 55, 5, 52, 1, 1, '2019-02-17 08:32:04'),
(4, 2, 2019, 15, 5, 5, 1, 55, 5, 2, 1, '2019-02-26 09:37:57'),
(5, 2, 2019, 5, 454, 54, 54, 545, 4, 2, 1, '2019-03-03 15:28:35'),
(6, 1, 2019, 45, 45, 45, 454, 54, 5, 1, 1, '2019-03-03 15:31:41'),
(7, 1, 2019, 121, 21, 21, 212, 12, 2, 1, 1, '2019-03-03 15:35:23'),
(8, 3, 2019, 5, 515, 15, 1, 1, 21, 2, 2, '2019-03-03 15:37:30'),
(9, 1, 2019, 454, 54, 5, 454, 54, 5, 1, 1, '2019-03-03 15:42:46'),
(10, 2, 2019, 22, 2, 2, 2, 2, 21, 2, 1, '2019-03-03 15:45:32'),
(11, 4, 2019, 0, 0, 0, 0, 0, 0, 3, 1, '2019-03-03 15:48:31'),
(12, 2, 2019, 34, 0, 0, 0, 0, 0, 2, 1, '2019-03-03 15:52:33'),
(13, 1, 2019, 54, 5, 0, 0, 0, 0, 1, 1, '2019-03-03 15:53:55'),
(14, 1, 2019, 3, 67, 94, 62, 100, 48, 1, 1, '2019-03-05 07:57:09'),
(15, 1, 2019, 67, 65, 88, 56, 24, 94, 1, 1, '2019-03-05 08:09:33'),
(16, 5, 2019, 0, 0, 0, 0, 0, 0, 1, 2, '2019-03-06 04:47:51'),
(17, 6, 2019, 0, 0, 0, 0, 0, 0, 2, 3, '2019-03-08 12:59:39'),
(18, 1, 2019, 15, 42, 47, 25, 36, 70, 1, 1, '2019-03-08 13:41:03'),
(19, 7, 2019, 55, 45, 45, 45, 454, 545, 4, 1, '2019-03-13 12:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `total_transact`
--

CREATE TABLE `total_transact` (
  `total_transact_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `total_dr` int(11) NOT NULL,
  `total_cr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `repayment`
--
ALTER TABLE `repayment`
  ADD PRIMARY KEY (`payment_re_id`);

--
-- Indexes for table `sales_info`
--
ALTER TABLE `sales_info`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `sales_item_details`
--
ALTER TABLE `sales_item_details`
  ADD PRIMARY KEY (`s_detail_id`);

--
-- Indexes for table `sales_transact`
--
ALTER TABLE `sales_transact`
  ADD PRIMARY KEY (`sales_transact_id`);

--
-- Indexes for table `total_transact`
--
ALTER TABLE `total_transact`
  ADD PRIMARY KEY (`total_transact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `repayment`
--
ALTER TABLE `repayment`
  MODIFY `payment_re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_info`
--
ALTER TABLE `sales_info`
  MODIFY `sales_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_item_details`
--
ALTER TABLE `sales_item_details`
  MODIFY `s_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales_transact`
--
ALTER TABLE `sales_transact`
  MODIFY `sales_transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `total_transact`
--
ALTER TABLE `total_transact`
  MODIFY `total_transact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
