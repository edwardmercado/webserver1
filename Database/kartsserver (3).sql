-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 06:08 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kartsserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_load`
--

CREATE TABLE `tbl_load` (
  `refNum` int(11) NOT NULL,
  `recepient` varchar(30) NOT NULL,
  `load_amount` int(11) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_load`
--

INSERT INTO `tbl_load` (`refNum`, `recepient`, `load_amount`, `date`) VALUES
(65970, 'edward', 500, '08/31/2017 02:27:43pm'),
(75940, 'orly123', 300, '08/28/2017 02:17:53pm'),
(43829, 'edward', 50, '08/28/2017 02:19:12pm'),
(83878, 'edward', 100, '08/28/2017 10:23:38pm'),
(77924, 'edward', 50, '08/28/2017 10:26:36pm'),
(86957, 'orly123', 100, '08/28/2017 10:29:11pm'),
(47516, 'orly123', 50, '08/28/2017 10:31:37pm'),
(13778, 'orly123', 300, '08/28/2017 10:32:12pm'),
(14325, 'orly123', 50, '08/31/2017 02:30:14pm'),
(39566, 'orly123', 50, '08/31/2017 02:30:59pm'),
(35818, 'orly123', 300, '09/01/2017 01:04:52pm'),
(49643, 'orly123', 100, '09/01/2017 03:15:49pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prodCategory` varchar(30) NOT NULL,
  `prodId` varchar(30) NOT NULL,
  `prodDesc` varchar(30) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `prodImgPath` varchar(30) NOT NULL,
  `archived` varchar(15) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prodCategory`, `prodId`, `prodDesc`, `prodPrice`, `prodImgPath`, `archived`) VALUES
('Burgers', 'B001', 'Bacon Barbeque Burger', 100, 'Menu/burgerbaconbbq.jpg', 'no'),
('Burgers', 'B002', 'Bacon Cheese Burger', 500, 'Menu/burgerbaconbbq.jpg', 'no'),
('Drinks', 'D001', 'Oreo Frappe', 100, 'Menu/drinks1.jpg', 'no'),
('Drinks', 'D002', 'Caramel Macchiato', 100, 'Menu/drinks2.jpg', 'no'),
('Drinks', 'D005', 'milo', 4000, 'Menu/Screenshot (10).png', 'yes'),
('Burgers', 'B007', 'avicii', 500000, 'Menu/Screenshot (12).png', 'yes'),
('Burgers', 'B004', 'eeee', 3, 'Menu/burgerbaconcheese.jpg', 'no'),
('Drinks', 'B010', '555', 300, 'Menu/burgerbaconbbq.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transid` varchar(30) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `cashier` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `midname` varchar(30) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `town` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `contactNum` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userImg` varchar(100) NOT NULL,
  `online` varchar(3) NOT NULL DEFAULT 'no',
  `blockctr` int(11) NOT NULL DEFAULT '0',
  `archived` varchar(15) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstname`, `lastname`, `midname`, `sex`, `town`, `city`, `province`, `contactNum`, `username`, `password`, `userImg`, `online`, `blockctr`, `archived`) VALUES
(1001, 'Edward Allen', 'Mercado', '', 'Male', '', '', '', '0', 'edward', 'edward', 'Profile/Screenshot (10).png', 'yes', 0, 'no'),
(1009, 'Jhasfer', 'Mundo', 'Lacap', 'Male', 'San Miguel', 'Calumpit', 'Bulacan', '09223123459', 'jhas123', 'jhas123', 'Menu/21687981_1998265330449954_7252822407187591871_n.jpg', 'no', 0, 'no'),
(1007, 'Orlando', 'Aguilar', 'Austria', 'Male', 'Plaridel', 'Plaridel', 'Bulacan', '09223123459', 'orly123', 'orly123', 'Menu/orlando.jpg', 'no', 0, 'yes'),
(1010, 'aki', 'aki', 'aki', 'Male', 'ewan', 'ewan', 'ewan', '09223123459', 'aki', 'aki', 'Menu/21686100_1959772277366579_6687559557810306289_n.jpg', 'no', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_archives`
--

CREATE TABLE `tbl_user_archives` (
  `id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `contactNum` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userImg` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_load`
--
ALTER TABLE `tbl_load`
  ADD PRIMARY KEY (`refNum`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prodId`),
  ADD UNIQUE KEY `prodDesc` (`prodDesc`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_user_archives`
--
ALTER TABLE `tbl_user_archives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
