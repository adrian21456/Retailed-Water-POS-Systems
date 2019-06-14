-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 12:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_cart`
--

CREATE TABLE `car_cart` (
  `cCart_id` int(3) NOT NULL,
  `cType_id` int(3) NOT NULL,
  `cQty` double NOT NULL,
  `cTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car_sales`
--

CREATE TABLE `car_sales` (
  `cCart_id` int(3) NOT NULL,
  `cType_id` int(3) NOT NULL,
  `cQty` double NOT NULL,
  `cTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_sales`
--

INSERT INTO `car_sales` (`cCart_id`, `cType_id`, `cQty`, `cTotal`) VALUES
(1, 1, 5, 5),
(2, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `cType_id` int(3) NOT NULL,
  `cType` text NOT NULL,
  `duration` float NOT NULL,
  `unit` text NOT NULL,
  `cCost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`cType_id`, `cType`, `duration`, `unit`, `cCost`) VALUES
(1, 'Motor Bike', 5, 'Min', 5),
(2, '4 Wheeler Car', 6, 'Min', 6),
(4, '2', 4, 'Min', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `cus_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`cus_id`, `name`, `contact`) VALUES
(1, 'John Smith', '091212213'),
(2, '1', '1'),
(3, 'John Smith', '1212123123'),
(4, '1', '1'),
(5, 'John Smith', '01291912'),
(6, 'John Smith', '11'),
(7, 'John Smith', '21312'),
(8, 'Adobo', '988'),
(9, 'John Smith', '13'),
(10, 'John Smith', '13'),
(11, 'John Smith', '13'),
(12, 'John Smith', '13'),
(13, 'John Smith', '13'),
(14, 'John Smith', '13'),
(15, 'John Smith', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `del_id` int(11) NOT NULL,
  `area` text NOT NULL,
  `areaC` double NOT NULL,
  `type_del` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_sales`
--

CREATE TABLE `delivery_sales` (
  `del_id` int(11) NOT NULL,
  `area` text NOT NULL,
  `areaC` double NOT NULL,
  `type_del` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_sales`
--

INSERT INTO `delivery_sales` (`del_id`, `area`, `areaC`, `type_del`) VALUES
(1, 'Mansilingan', 20, 'laundry'),
(2, 'Suba', 10, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_cart`
--

CREATE TABLE `laundry_cart` (
  `lCart_id` int(3) NOT NULL,
  `lType_id` int(3) NOT NULL,
  `lQty` double NOT NULL,
  `del_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_sales`
--

CREATE TABLE `laundry_sales` (
  `lCart_id` int(3) NOT NULL,
  `lType_id` int(3) NOT NULL,
  `lQty` double NOT NULL,
  `del_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_sales`
--

INSERT INTO `laundry_sales` (`lCart_id`, `lType_id`, `lQty`, `del_id`) VALUES
(1, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_type`
--

CREATE TABLE `laundry_type` (
  `lType_id` int(3) NOT NULL,
  `lType` text NOT NULL,
  `lCost` double NOT NULL,
  `lunit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_type`
--

INSERT INTO `laundry_type` (`lType_id`, `lType`, `lCost`, `lunit`) VALUES
(1, 'Shirt', 30, 'Kg'),
(2, 'Pants', 30, 'Kg'),
(3, 'Curtain', 50, 'Kg'),
(4, 'Bedsheet', 50, 'Kg'),
(5, 'Comforter', 50, 'Kg'),
(6, 'Towel', 35, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `cash` double NOT NULL,
  `cus_id` int(11) NOT NULL,
  `date_pay` date NOT NULL,
  `time_pay` time NOT NULL,
  `year_pay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `middle_name`, `address`, `mobile`, `role`) VALUES
(2, 'user@user.com', 'user', 'user', 'user', '', '', 0, 'user'),
(6, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', 'admin', 12345, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `water_cart`
--

CREATE TABLE `water_cart` (
  `wCart_id` int(3) NOT NULL,
  `wType_id` int(3) NOT NULL,
  `wQty` int(11) NOT NULL,
  `wTotal` double NOT NULL,
  `del_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `water_sales`
--

CREATE TABLE `water_sales` (
  `wCart_id` int(3) NOT NULL,
  `wType_id` int(3) NOT NULL,
  `wQty` int(11) NOT NULL,
  `wTotal` double NOT NULL,
  `del_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `water_sales`
--

INSERT INTO `water_sales` (`wCart_id`, `wType_id`, `wQty`, `wTotal`, `del_id`) VALUES
(1, 1, 1, 15, 0),
(4, 1, 1, 15, 2),
(5, 1, 10, 150, 0),
(6, 1, 1, 15, 0),
(7, 1, 2, 30, 0),
(8, 1, 5, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `water_type`
--

CREATE TABLE `water_type` (
  `wType_id` int(11) NOT NULL,
  `wType` text NOT NULL,
  `wCost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `water_type`
--

INSERT INTO `water_type` (`wType_id`, `wType`, `wCost`) VALUES
(1, 'Container', 15),
(2, 'Bottle', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_cart`
--
ALTER TABLE `car_cart`
  ADD PRIMARY KEY (`cCart_id`);

--
-- Indexes for table `car_sales`
--
ALTER TABLE `car_sales`
  ADD PRIMARY KEY (`cCart_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`cType_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `delivery_sales`
--
ALTER TABLE `delivery_sales`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `laundry_cart`
--
ALTER TABLE `laundry_cart`
  ADD PRIMARY KEY (`lCart_id`);

--
-- Indexes for table `laundry_sales`
--
ALTER TABLE `laundry_sales`
  ADD PRIMARY KEY (`lCart_id`);

--
-- Indexes for table `laundry_type`
--
ALTER TABLE `laundry_type`
  ADD PRIMARY KEY (`lType_id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `water_cart`
--
ALTER TABLE `water_cart`
  ADD PRIMARY KEY (`wCart_id`);

--
-- Indexes for table `water_sales`
--
ALTER TABLE `water_sales`
  ADD PRIMARY KEY (`wCart_id`);

--
-- Indexes for table `water_type`
--
ALTER TABLE `water_type`
  ADD PRIMARY KEY (`wType_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_cart`
--
ALTER TABLE `car_cart`
  MODIFY `cCart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `car_sales`
--
ALTER TABLE `car_sales`
  MODIFY `cCart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `cType_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `delivery_sales`
--
ALTER TABLE `delivery_sales`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laundry_cart`
--
ALTER TABLE `laundry_cart`
  MODIFY `lCart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laundry_sales`
--
ALTER TABLE `laundry_sales`
  MODIFY `lCart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laundry_type`
--
ALTER TABLE `laundry_type`
  MODIFY `lType_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `water_cart`
--
ALTER TABLE `water_cart`
  MODIFY `wCart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `water_sales`
--
ALTER TABLE `water_sales`
  MODIFY `wCart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `water_type`
--
ALTER TABLE `water_type`
  MODIFY `wType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
