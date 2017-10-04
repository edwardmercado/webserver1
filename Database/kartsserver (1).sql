-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 07:56 AM
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
(39566, 'orly123', 50, '08/31/2017 02:30:59pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prodCategory` varchar(30) NOT NULL,
  `prodId` varchar(30) NOT NULL,
  `prodDesc` varchar(30) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `prodImgPath` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prodCategory`, `prodId`, `prodDesc`, `prodPrice`, `prodImgPath`) VALUES
('Burgers', 'B001', 'Bacon Barbeque Burger', 100, 'Menu/burgerbaconbbq.jpg'),
('Burgers', 'B002', 'Bacon Cheese Burger', 100, 'Menu/burgerbaconcheese.jpg'),
('Drinks', 'D001', 'Oreo Frappe', 100, 'Menu/drinks1.jpg'),
('Drinks', 'D002', 'Caramel Macchiato', 100, 'Menu/drinks2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1001, 'Edward Allen', 'Mercado', 'edward', 'edward'),
(1002, 'Orlando', 'Aguilar', 'orly123', 'orly123');

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
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
