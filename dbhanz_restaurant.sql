-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 05:24 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbhanz_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `beginninginv`
--

CREATE TABLE IF NOT EXISTS `beginninginv` (
  `id` int(11) NOT NULL,
  `begindate` date NOT NULL,
  `itemid` int(50) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashledger`
--

CREATE TABLE IF NOT EXISTS `cashledger` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `totalsales` double(12,2) DEFAULT NULL,
  `disc_total` double(12,2) DEFAULT NULL,
  `totalcash` double(12,2) DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `closetag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(2, 'Laundry Garments'),
(3, 'Water Galloons'),
(9, 'Carwash'),
;

-- --------------------------------------------------------

--
-- Table structure for table `costingbase`
--

CREATE TABLE IF NOT EXISTS `costingbase` (
`id` int(5) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `amount` double(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentuser`
--

CREATE TABLE IF NOT EXISTS `currentuser` (
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentuser`
--

INSERT INTO `currentuser` (`user_name`) VALUES
('admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(1, 'ghsdfag', '242442424', 'gasfagag', 'gsadfgasgasgd');

-- --------------------------------------------------------

--
-- Table structure for table `holdlog`
--

CREATE TABLE IF NOT EXISTS `holdlog` (
`id` int(11) NOT NULL,
  `itemid` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `disc` double(12,2) NOT NULL,
  `disctype` varchar(50) NOT NULL,
  `waiter` varchar(50) NOT NULL,
  `done` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredienthistory`
--

CREATE TABLE IF NOT EXISTS `ingredienthistory` (
`inghistid` int(11) NOT NULL,
  `ingid` int(11) DEFAULT NULL,
  `ingqty` double DEFAULT NULL,
  `ingdate` date DEFAULT NULL,
  `purchaseprice` double DEFAULT NULL,
  `retailprice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
`id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `retailprice` double(12,2) DEFAULT NULL,
  `purchaseprice` double(12,2) DEFAULT NULL COMMENT 'purchase price',
  `type` varchar(255) DEFAULT NULL,
  `quantity` double(12,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `reorderlevel` double(12,2) DEFAULT NULL,
  `rrqty` decimal(12,2) NOT NULL,
  `rramount` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `beginning` double(12,2) DEFAULT NULL,
  `stockingqty` double(12,2) NOT NULL,
  `stockingdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` double(12,2) NOT NULL,
  `retailprice` double NOT NULL COMMENT 'Retail price',
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `purchaseprice` double(12,2) DEFAULT NULL,
  `tax` tinyint(4) DEFAULT NULL,
  `reorderlevel` tinyint(4) DEFAULT NULL,
  `quantitytodeduct` double(12,2) NOT NULL,
  `hasingredient` varchar(10) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `itemcode` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `quantity`, `retailprice`, `category`, `location`, `supplier`, `code`, `purchaseprice`, `tax`, `reorderlevel`, `quantitytodeduct`, `hasingredient`, `img`, `itemcode`) VALUES
(2, 'Cream of spinach', 'new', 1.00, 55, 'Starters', 'Others', 'Others', '1', 50.00, 1, 1, 0.00, '', 'images/', ''),
(3, 'French Onion soup', 'new', 1.00, 55, 'Starters', 'Others', 'Others', '1', 50.00, 1, 1, 0.00, '', 'images/', ''),
(4, 'Buffalo Wings', 'new', 1.00, 159, 'Starters', 'Others', 'Others', '1', 150.00, 1, 1, 0.00, '', 'images/', ''),
(5, 'Venexia  Nachos Supreme', 'new', 1.00, 99, 'Starters', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(6, 'Chessy Fries', 'new', 1.00, 49, 'Starters', 'Others', 'Others', '1', 40.00, 1, 1, 0.00, '', 'images/', ''),
(7, 'Cheesy Fries supreme', 'new', 1.00, 69, 'Starters', 'Others', 'Others', '1', 60.00, 1, 1, 0.00, '', 'images/', ''),
(8, 'Golden onion Rings', 'new', 1.00, 69, 'Starters', 'Others', 'Others', '1', 60.00, 1, 1, 0.00, '', 'images/', ''),
(9, 'Chicken Fingers', 'new', 1.00, 139, 'Starters', 'Others', 'Others', '1', 130.00, 1, 1, 0.00, '', 'images/', ''),
(10, 'Calamares w/ Aioli Dip', 'new', 1.00, 149, 'Starters', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(11, 'Fried Mozarella Sticks', 'NEW', 1.00, 125, 'Starters', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(12, 'Garlic Mushrooms', 'new', 1.00, 129, 'Starters', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(13, 'Oriental Spaghetti', 'new', 1.00, 99, 'Spaghetti', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(14, 'Pasta Negra (squid ink sauce andcrispy squid)', 'new', 1.00, 129, 'Spaghetti', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(15, 'Pesto (basil, olive oil and nuts)', 'new', 1.00, 129, 'Spaghetti', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(16, 'Pesto with grilled chicken', 'new', 1.00, 159, 'Spaghetti', 'Others', 'Others', '1', 150.00, 1, 1, 0.00, '', 'images/', ''),
(17, 'Aligue / aligue w/shrimps', 'new', 1.00, 129, 'Spaghetti', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(18, 'Aglio olio w/ anchovies and Cupers', 'new', 1.00, 159, 'Spaghetti', 'Others', 'Others', '1', 150.00, 1, 1, 0.00, '', 'images/', ''),
(19, 'Spaghetti w/ sun-dried tomato pesic', 'new', 1.00, 139, 'Spaghetti', 'Others', 'Others', '1', 130.00, 1, 1, 0.00, '', 'images/', ''),
(20, 'Vietnamese Garlic Spaghetti', 'new', 1.00, 99, 'Spaghetti', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(21, 'Gourmet tuyo spaghetti', 'new', 1.00, 129, 'Spaghetti', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(22, 'Carbonara (bacon and cream)', 'new', 1.00, 129, 'Salsa Bianca (white sauce)', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(23, 'Chicken and mushrooms garlic cream sauce', 'new', 1.00, 139, 'Salsa Bianca (white sauce)', 'Others', 'Others', '1', 130.00, 1, 1, 0.00, '', 'images/', ''),
(24, 'Alfredo (classic white sauce)', 'new', 1.00, 99, 'Salsa Bianca (white sauce)', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(25, 'Bolognese', 'new', 1.00, 110, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 100.00, 1, 1, 0.00, '', 'images/', ''),
(26, 'Arrabiata (tomato and chille flakes)', 'new', 1.00, 105, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 100.00, 1, 1, 0.00, '0', 'images/', '1'),
(27, 'Pollanesca (anchovies, olives and capers)', 'new', 1.00, 159, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 150.00, 1, 1, 0.00, '', 'images/', ''),
(28, 'Seafood marinara (shrimps,squid and tomato sauce)', 'new', 1.00, 169, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 160.00, 1, 1, 0.00, '', 'images/', ''),
(29, 'Tono rosso (tuna in tomato sauce)', 'new', 1.00, 139, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 130.00, 1, 1, 0.00, '', 'images/', ''),
(30, 'Penne amalricana (bacon in sauce)', 'new', 1.00, 159, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 150.00, 1, 1, 0.00, '0', 'images/', '1'),
(31, 'Pomodoro (tomatoes and basil)', 'new', 1.00, 99, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(32, 'Kids Spaghetti', 'new', 1.00, 115, 'Salsa Russ (red sauce)', 'Others', 'Others', '1', 105.00, 1, 1, 0.00, '', 'images/', ''),
(33, 'Golden crusted chicken, ham and cheese cripe', 'new', 1.00, 149, 'Rice Meals', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(34, 'Southern fried chicken', 'new', 1.00, 149, 'Rice Meals', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(35, 'Grilled porkchop', 'new', 1.00, 149, 'Rice Meals', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(36, 'American baked spare ribs w/ free iced tea', 'new', 1.00, 229, 'Rice Meals', 'Others', 'Others', '1', 220.00, 1, 1, 0.00, '', 'images/', ''),
(37, 'Stir-fried beef w/ mushrooms', 'new', 1.00, 169, 'Rice Meals', 'Others', 'Others', '1', 160.00, 1, 1, 0.00, '', 'images/', ''),
(38, 'Parmesan- crusted fish fillet', 'new', 1.00, 149, 'Rice Meals', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(39, 'Chicken piccala w/ garlic spaghetti', 'new', 1.00, 129, 'Pasta Meals', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(40, 'GCC w/ angel hair pinodoro', 'new', 1.00, 159, 'Pasta Meals', 'Others', 'Others', '1', 150.00, 1, 1, 0.00, '', 'images/', ''),
(41, 'Kids combo (1pc. fried chicken and spaghetti)', 'new', 1.00, 139, 'Pasta Meals', 'Others', 'Others', '1', 130.00, 1, 1, 0.00, '', 'images/', ''),
(42, 'Supremo', 'new', 1.00, 180, 'Pizza', 'Others', 'Others', '1', 170.00, 1, 1, 0.00, '', 'images/', ''),
(43, 'four- cheese', 'new', 1.00, 180, 'Pizza', 'Others', 'Others', '1', 170.00, 1, 1, 0.00, '', 'images/', ''),
(44, 'Margharita', 'new', 1.00, 150, 'Pizza', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(45, 'Hawaiian', 'new', 1.00, 150, 'Pizza', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(46, 'Pepperoni and cheese', 'new', 1.00, 150, 'Pizza', 'Others', 'Others', '1', 140.00, 1, 1, 0.00, '', 'images/', ''),
(47, 'Colossal choco-chip cookie', 'new', 1.00, 99, 'Desserts', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(48, 'Chocolate mud pie ', 'new', 1.00, 99, 'Desserts', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(49, 'Strawberry mud pie', 'new', 1.00, 129, 'Desserts', 'Others', 'Others', '1', 120.00, 1, 1, 0.00, '', 'images/', ''),
(50, 'Brewed kape ni bigote black', 'new', 1.00, 17, 'Coffe', 'Others', 'Others', '1', 10.00, 1, 1, 0.00, '', 'images/', ''),
(51, 'Brewed kape ni bigote w/ milk', 'new', 1.00, 22, 'Coffe', 'Others', 'Others', '1', 12.00, 1, 1, 0.00, '', 'images/', ''),
(52, 'Hazelnut coffe', 'new', 1.00, 40, 'Coffe', 'Others', 'Others', '1', 30.00, 1, 1, 0.00, '', 'images/', ''),
(53, 'Peppermint Coffe', 'new', 1.00, 40, 'Coffe', 'Others', 'Others', '1', 30.00, 1, 1, 0.00, '', 'images/', ''),
(54, 'Vanilla Coffe', 'new', 1.00, 40, 'Coffe', 'Others', 'Others', '1', 30.00, 1, 1, 0.00, '', 'images/', ''),
(55, 'Grilled chicken and pesto', 'new', 1.00, 99, 'Sandwiches', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(56, 'Venexia cheeseburger', 'new', 1.00, 99, 'Sandwiches', 'Others', 'Others', '1', 90.00, 1, 1, 0.00, '', 'images/', ''),
(57, 'BELT Sandwich', 'new', 1.00, 139, 'Sandwiches', 'Others', 'Others', '1', 130.00, 1, 1, 0.00, '', 'images/', ''),
(58, 'Pepsi/Mountain Dew', 'new', 1.00, 18, 'Beverages', 'Others', 'Others', '1', 10.00, 1, 1, 0.00, '', 'images/', ''),
(59, 'Iced tea pitcher', 'new', 1.00, 50, 'Beverages', 'Others', 'Others', '1', 40.00, 1, 1, 0.00, '', 'images/', ''),
(60, 'Iced team lemonade/cucumber', 'new', 1.00, 55, 'Beverages', 'Others', 'Others', '1', 45.00, 1, 1, 0.00, '', 'images/', ''),
(61, 'Fresh fruit shakes (mango,sweetcorn)', 'new', 1.00, 55, 'Beverages', 'Others', 'Others', '1', 45.00, 1, 1, 0.00, '', 'images/', ''),
(62, 'Fresh fruit shakes (avocado,guyabano)', 'new', 1.00, 60, 'Beverages', 'Others', 'Others', '1', 50.00, 1, 1, 0.00, '', 'images/', ''),
(63, 'Hot tea', 'new', 1.00, 40, 'Beverages', 'Others', 'Others', '1', 30.00, 1, 1, 0.00, '', 'images/', ''),
(64, 'Hot choco', 'new', 1.00, 35, 'Beverages', 'Others', 'Others', '1', 25.00, 1, 1, 0.00, '', 'images/', ''),
(65, 'Strawberry', 'new', 1.00, 75, 'Frappe', 'Others', 'Others', '1', 65.00, 1, 1, 0.00, '', 'images/', ''),
(66, 'Blueberry', 'new', 1.00, 75, 'Frappe', 'Others', 'Others', '1', 65.00, 1, 1, 0.00, '', 'images/', ''),
(67, 'Chocolate overload', 'new', 1.00, 75, 'Frappe', 'Others', 'Others', '1', 65.00, 1, 1, 0.00, '', 'images/', ''),
(68, 'Oreo vanilla', 'new', 1.00, 75, 'Frappe', 'Others', 'Others', '1', 65.00, 1, 1, 0.00, '', 'images/', ''),
(69, 'Oreo matcha', 'new', 1.00, 80, 'Frappe', 'Others', 'Others', '1', 70.00, 1, 1, 0.00, '', 'images/', ''),
(70, 'Minty matcha', 'new', 1.00, 85, 'Frappe', 'Others', 'Others', '1', 75.00, 1, 1, 0.00, '', 'images/', ''),
(71, 'Iced Coffe', 'new', 1.00, 30, 'Coolers', 'Others', 'Others', '1', 20.00, 1, 1, 0.00, '', 'images/', ''),
(72, 'Caramel macchiato', 'new', 1.00, 45, 'Coolers', 'Others', 'Others', '1', 35.00, 1, 1, 0.00, '', 'images/', ''),
(73, 'Minty Iced coffe ', 'new', 1.00, 55, 'Coolers', 'Others', 'Others', '1', 45.00, 1, 1, 0.00, '', 'images/', ''),
(74, 'Iced matcha', 'new', 1.00, 50, 'Coolers', 'Others', 'Others', '1', 40.00, 1, 1, 0.00, '', 'images/', ''),
(75, 'Iced minty matcha', 'new', 1.00, 60, 'Coolers', 'Others', 'Others', '1', 50.00, 1, 1, 0.00, '', 'images/', ''),
(76, 'Iced choco', 'new', 1.00, 40, 'Coolers', 'Others', 'Others', '1', 30.00, 1, 1, 0.00, '', 'images/', '');

-- --------------------------------------------------------

--
-- Table structure for table `itemshistory`
--

CREATE TABLE IF NOT EXISTS `itemshistory` (
`itemhisid` int(11) NOT NULL,
  `itemsid` int(11) DEFAULT NULL,
  `quantity` double(12,2) DEFAULT NULL,
  `purchaseprice` double(12,2) DEFAULT NULL,
  `retailprice` double(12,2) DEFAULT NULL,
  `historydate` date DEFAULT NULL,
  `totalpp` double(12,2) NOT NULL,
  `totalrp` double(12,2) NOT NULL,
  `refno` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemshistory`
--

INSERT INTO `itemshistory` (`itemhisid`, `itemsid`, `quantity`, `purchaseprice`, `retailprice`, `historydate`, `totalpp`, `totalrp`, `refno`) VALUES
(1, 2, 1.00, 50.00, 55.00, '2018-06-28', 50.00, 55.00, 1530197218),
(2, 4, 1.00, 150.00, 159.00, '2018-06-28', 150.00, 159.00, 1530197259),
(3, 4, 1.00, 150.00, 159.00, '2018-06-28', 150.00, 159.00, 1530197305),
(4, 3, 1.00, 50.00, 55.00, '2018-06-28', 50.00, 55.00, 1530197305);

-- --------------------------------------------------------

--
-- Table structure for table `itemshistory_tmp`
--

CREATE TABLE IF NOT EXISTS `itemshistory_tmp` (
  `itemhisid` int(11) NOT NULL,
  `itemsid` int(11) DEFAULT NULL,
  `quantity` double(12,2) DEFAULT NULL,
  `purchaseprice` double(12,2) DEFAULT NULL,
  `retailprice` double(12,2) DEFAULT NULL,
  `historydate` date DEFAULT NULL,
  `totalpp` double(12,2) NOT NULL,
  `totalrp` double(12,2) NOT NULL,
  `refno` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemshistory_tmp`
--

INSERT INTO `itemshistory_tmp` (`itemhisid`, `itemsid`, `quantity`, `purchaseprice`, `retailprice`, `historydate`, `totalpp`, `totalrp`, `refno`) VALUES
(0, 2, 1.00, 50.00, 55.00, '2018-06-27', 50.00, 55.00, 1530090752);

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE IF NOT EXISTS `kitchen` (
  `id` int(11) NOT NULL,
  `itemid` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `disc` double(12,2) NOT NULL,
  `disctype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(11) NOT NULL,
  `location` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `macaddress`
--

CREATE TABLE IF NOT EXISTS `macaddress` (
  `mac` varchar(255) DEFAULT NULL,
  `macdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `macaddress`
--

INSERT INTO `macaddress` (`mac`, `macdate`) VALUES
('F0-76-1C-86-3B-D2', '2016-10-02'),
('F0-76-1C-86-3B-D2', '2016-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `ordermode`
--

CREATE TABLE IF NOT EXISTS `ordermode` (
  `reference` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordermode`
--

INSERT INTO `ordermode` (`reference`) VALUES
('09'),
('14'),
('20');

-- --------------------------------------------------------

--
-- Table structure for table `qty_upd_history`
--

CREATE TABLE IF NOT EXISTS `qty_upd_history` (
`id` int(11) NOT NULL,
  `ing_id` int(11) DEFAULT NULL,
  `qty_current` double(12,2) DEFAULT NULL,
  `qty_added` double(12,2) DEFAULT NULL,
  `hist_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reciept`
--

CREATE TABLE IF NOT EXISTS `reciept` (
`id` int(50) NOT NULL,
  `rno` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reciept_temp`
--

CREATE TABLE IF NOT EXISTS `reciept_temp` (
`id` int(11) NOT NULL,
  `item` varchar(100) DEFAULT NULL,
  `price` double(12,2) DEFAULT NULL,
  `quantity` double(12,2) DEFAULT NULL,
  `total` double(12,2) DEFAULT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `paidby` varchar(50) DEFAULT NULL,
  `discount` double(12,2) DEFAULT NULL,
  `amountpaid` double(12,2) DEFAULT NULL,
  `previous_bal` double(12,2) DEFAULT NULL,
  `remaining_bal` double(12,2) DEFAULT NULL,
  `unit_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
`id` int(11) NOT NULL,
  `quantity` double(12,2) NOT NULL,
  `itemid` int(10) NOT NULL,
  `ingredientid` int(10) DEFAULT NULL,
  `um` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_qty`
--

CREATE TABLE IF NOT EXISTS `recipe_qty` (
`id` int(11) NOT NULL,
  `quantity` double(12,2) NOT NULL,
  `itemid` int(10) NOT NULL,
  `ingredientid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saleslog`
--

CREATE TABLE IF NOT EXISTS `saleslog` (
`id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `qty` double(12,2) NOT NULL,
  `date` datetime NOT NULL,
  `total` double(12,2) NOT NULL,
  `disc` double(12,2) DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `disctype` varchar(50) NOT NULL DEFAULT 'none',
  `reference` varchar(50) NOT NULL,
  `waiter` varchar(50) NOT NULL,
  `done` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salestranslog`
--

CREATE TABLE IF NOT EXISTS `salestranslog` (
`id` int(11) NOT NULL,
  `sdate` date DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `total` double(255,2) DEFAULT NULL,
  `tax` double(255,2) DEFAULT '0.00',
  `discount` double(255,2) DEFAULT NULL,
  `disc_percent` int(5) NOT NULL,
  `grandtotal` double(255,2) DEFAULT NULL,
  `paidby` varchar(255) DEFAULT NULL,
  `amountpaid` double(255,2) DEFAULT NULL,
  `change_amt` double(255,2) DEFAULT NULL,
  `date_where` date NOT NULL,
  `transdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refno` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `table_ref` varchar(50) NOT NULL,
  `waiter` varchar(50) NOT NULL,
  `recieptno` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salestranslog`
--

INSERT INTO `salestranslog` (`id`, `sdate`, `customer`, `total`, `tax`, `discount`, `disc_percent`, `grandtotal`, `paidby`, `amountpaid`, `change_amt`, `date_where`, `transdate`, `refno`, `username`, `table_ref`, `waiter`, `recieptno`) VALUES
(1, '2018-06-28', 'Walk-In', 55.00, 0.00, 0.00, 0, 55.00, 'Cash', 60.00, 5.00, '2018-06-28', '2018-06-28 22:46:58', 1530197218, 'admin@admin.com', 'Walk-in', 'Cashier', 1),
(2, '2018-06-28', 'Walk-In', 159.00, 0.00, 0.00, 0, 159.00, 'Take-out', 160.00, 1.00, '2018-06-28', '2018-06-28 22:47:39', 1530197259, 'admin@admin.com', 'Walk-in', 'Cashier', 2),
(3, '2018-06-28', 'Walk-In', 214.00, 0.00, 0.00, 0, 214.00, 'Delivery', 220.00, 6.00, '2018-06-28', '2018-06-28 22:48:25', 1530197305, 'admin@admin.com', 'Walk-in', 'Cashier', 3);

-- --------------------------------------------------------

--
-- Table structure for table `salestranslog_tmp`
--

CREATE TABLE IF NOT EXISTS `salestranslog_tmp` (
  `id` int(11) NOT NULL,
  `sdate` date DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `total` double(255,2) DEFAULT NULL,
  `tax` double(255,2) DEFAULT '0.00',
  `discount` double(255,2) DEFAULT NULL,
  `disc_percent` int(5) NOT NULL,
  `grandtotal` double(255,2) DEFAULT NULL,
  `paidby` varchar(255) DEFAULT NULL,
  `amountpaid` double(255,2) DEFAULT NULL,
  `change_amt` double(255,2) DEFAULT NULL,
  `date_where` date NOT NULL,
  `transdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refno` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `table_ref` varchar(50) NOT NULL,
  `waiter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salestranslog_tmp`
--

INSERT INTO `salestranslog_tmp` (`id`, `sdate`, `customer`, `total`, `tax`, `discount`, `disc_percent`, `grandtotal`, `paidby`, `amountpaid`, `change_amt`, `date_where`, `transdate`, `refno`, `username`, `table_ref`, `waiter`) VALUES
(0, '2018-06-27', 'Walk-In', 55.00, 0.00, 0.00, 0, 55.00, 'Cash', 60.00, 5.00, '2018-06-27', '2018-06-27 17:12:32', 1530090752, 'user@user.com', 'Walk-in', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `stockstrans`
--

CREATE TABLE IF NOT EXISTS `stockstrans` (
  `id` int(11) NOT NULL,
  `transdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stockid` int(11) NOT NULL,
  `srqty` double(255,2) DEFAULT NULL,
  `sramount` double(255,2) DEFAULT NULL,
  `adjqty_minus` double(255,2) DEFAULT NULL,
  `adjqty_add` double(255,2) DEFAULT NULL,
  `onhand` double(255,2) DEFAULT NULL,
  `transtype` varchar(255) DEFAULT NULL,
  `deliverto` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier`, `address`, `contact`) VALUES
(4, 'Others', 'others', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costingbase`
--
ALTER TABLE `costingbase`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holdlog`
--
ALTER TABLE `holdlog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredienthistory`
--
ALTER TABLE `ingredienthistory`
 ADD PRIMARY KEY (`inghistid`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemshistory`
--
ALTER TABLE `itemshistory`
 ADD PRIMARY KEY (`itemhisid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qty_upd_history`
--
ALTER TABLE `qty_upd_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciept`
--
ALTER TABLE `reciept`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciept_temp`
--
ALTER TABLE `reciept_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_qty`
--
ALTER TABLE `recipe_qty`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleslog`
--
ALTER TABLE `saleslog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salestranslog`
--
ALTER TABLE `salestranslog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salestranslog_tmp`
--
ALTER TABLE `salestranslog_tmp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockstrans`
--
ALTER TABLE `stockstrans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `costingbase`
--
ALTER TABLE `costingbase`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `holdlog`
--
ALTER TABLE `holdlog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredienthistory`
--
ALTER TABLE `ingredienthistory`
MODIFY `inghistid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `itemshistory`
--
ALTER TABLE `itemshistory`
MODIFY `itemhisid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `qty_upd_history`
--
ALTER TABLE `qty_upd_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reciept`
--
ALTER TABLE `reciept`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reciept_temp`
--
ALTER TABLE `reciept_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipe_qty`
--
ALTER TABLE `recipe_qty`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saleslog`
--
ALTER TABLE `saleslog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salestranslog`
--
ALTER TABLE `salestranslog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
