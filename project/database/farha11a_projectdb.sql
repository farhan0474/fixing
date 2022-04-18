-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 06:00 PM
-- Server version: 10.4.24-MariaDB-log
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farha11a_projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ColumnId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`CategoryName`, `ColumnId`) VALUES
('Adidas', 1),
('Puma', 2),
('Vans', 3),
('Converse', 4),
('Nike', 5);

-- --------------------------------------------------------

--
-- Table structure for table `CustomerInfo`
--

CREATE TABLE `CustomerInfo` (
  `fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CustomerInfo`
--

INSERT INTO `CustomerInfo` (`fname`, `lname`, `address`, `email`, `id`) VALUES
('yousef', 'mahmoud', '1337 armanda st', 'yousefissam@hotmail.com', 1),
('alex', 'johns', '1233 alex av', 'alex@hotmail.com', 2),
('alexacc', 'alexlast', '213', 'alexemail@hotmail.com', 28),
('name', 'last', 'address', 'asasd@asd.com', 29),
('asdasd', 'asdasd', 'adsad', 'asd@dasd.com', 30),
('sadasd', 'dasd', 'dasd', 'asda@adas.com', 31),
('amanta', 'sunny', '3151 WYANDOTTE STREET WEST', 'amantasunny@cs.ajce.in', 32),
('Yaser', 'Mahmoud', '1337 Armanda St', 'hammylovesyaser666@gmail.com', 33),
('add', 'add', 'add', 'add@add', 34);

-- --------------------------------------------------------

--
-- Table structure for table `itemTable`
--

CREATE TABLE `itemTable` (
  `ItemNum` int(11) NOT NULL,
  `itemName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `itemPrice` int(30) NOT NULL,
  `itemQuantity` int(30) NOT NULL,
  `itemDesc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Category` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itemTable`
--

INSERT INTO `itemTable` (`ItemNum`, `itemName`, `itemPrice`, `itemQuantity`, `itemDesc`, `Category`) VALUES
(200010, 'Vans THE SK8-HI', 70, 150, 'Sneakers', 3),
(200101, 'Vans THE AUTHENTIC ', 55, 0, 'Sneakers', 3),
(200111, 'Speedcat LS Men\'s Driving Shoes', 110, 100, 'Driving Shoes', 2),
(200112, 'RS-DREAMER Basketball Shoes', 55, 10, 'Basketball Shoes', 2),
(201000, 'Converse Chuck Taylor', 65, 500, 'All Star Shoreline Slip', 4),
(201001, 'Puma Speedcat LS Men\'s Driving Shoes ', 110, 110, 'Driving Shoes ', 2),
(201002, 'Puma Suede Classic XXI Men\'s Sneakers', 90, 0, 'Men\'s Sneakers', 2),
(201030, 'Converse Chuck Taylor', 90, 0, 'All Star CX Stretch Canvas High Top', 4),
(201031, 'Adidas NMD_R1 SHOES', 190, 0, 'NMD_R1 SHOES', 1),
(201040, 'Converse x Josh Vides', 150, 126, 'Chuck 70 High Top', 4),
(201041, 'Adidas TOUR360 22 GOLF SHOES', 270, 0, 'GOLF SHOES', 1),
(201050, 'Converse All Star', 75, 230, 'Converse, Chuck Taylor All Star Dip Dye High Top', 4),
(201051, 'Converse WIP Fastbreak Pro Mid Top', 160, 0, 'Converse CONS x Carhartt', 4),
(201060, 'Converse Chuck 70', 100, 123, 'Converse ,Chuck 70 Sunny Floral High Top', 4),
(201080, 'Converse Half Chuck 70 Mid Top ', 150, 0, 'Converse x UNDEFEATED', 4),
(201081, 'Adidas NMD_R1 PRIMEWHITE SHOES', 190, 0, 'PRIMEWHITE SHOES', 1),
(201082, 'Converse Chuck 70 Sunny Floral', 90, 90, 'Low Top', 4),
(201100, 'Converse Chuck 70 Utility Translucent Overlay High Top', 170, 0, 'High Top Shoes', 4),
(201101, 'Vans CHECKERBOARD SLIP-ON', 60, 100, 'SLIP-ON sneakers', 3),
(201111, 'Adidas ULTRABOOST 23', 250, 0, 'ULTRABOOST 23', 1),
(201112, 'Adidas LITE RACER ADAPT 3.0 SHOES', 100, 0, '3.0 SHOES', 1),
(202000, 'Air Zoom Pegasus', 108, 300, 'Yellow Pegasus', 5),
(202001, 'Nike mercurial', 300, 150, 'White & Green Mercurial', 5),
(202002, 'Air Jordan 1 Retro High OG', 225, 120, 'White and Red Air Jordans', 5),
(202005, 'Puma Wild Rider RE.GEN Sneakers', 130, 500, 'RE.GEN Sneakers', 2),
(202339, 'Air Jordan 1s Chicago Red', 1250, 2, 'Air Jordan 1s Chicago Red', 5),
(202341, 'Air Jordan x OFF-WHITE', 1250, 0, 'OFF-White x  Air Jordan Collab', 5),
(202342, 'Cactus Jack x Air Jordan 6s', 1250, 0, 'Travis Scott\'s collab with Air Jordans', 5),
(202343, 'Travis Scott x Air Jordan 1s ', 2500, 0, 'Travis Scotts collab with AirJordans', 5),
(202344, 'Travis Scott x Nike Lows', 750, 0, 'Travis Scott\'s collab with NIKE', 5),
(202345, 'Air Jordan 1s', 759, 12, 'Blue and Red Air Jordans', 5),
(202362, 'Vans Fear Of God', 200, 100, 'Fear OF God Collection!', 3),
(202456, 'AirForce 1 Crater', 170, 250, 'Abstract color', 5),
(203000, 'ANGIE MARINO', 110, 20, 'ANGIE MARINO BMX SK8-HI', 3),
(203001, 'CANVAS SK8-HI', 85, 170, 'CANVAS SK8-HI TAPERED', 3),
(205000, 'Ultraboost 22 Shoes', 250, 127, 'Made for running', 1),
(205001, 'FORUM 84 HI AEC SHOES', 256, 50, 'Yellow Sneakers', 1),
(205002, 'FORUM MID SHOES', 130, 180, 'Blue & White Sneakers', 1),
(205003, 'NMD_R1 PRIMEBLACK SHOES', 190, 350, 'Black sneakers', 1),
(205004, 'NMD_R1 SHOES', 180, 450, 'White Sneakers', 1),
(205005, 'ULTRABOOST 5 DNA SHOES', 250, 0, 'Stripes sneakers', 1),
(208000, 'Cruise Rider Flair Women\'s Sneakers', 120, 123, 'Women\'s Sneakers', 2),
(208001, 'PUMA x PUMA Slipstream', 150, 120, 'PUMA x PUMA Slipstream Mid Men\'s Sneakers', 2),
(208002, 'Black Fives Suede Men\'s Sneakers', 120, 220, 'Black Sneakers', 2),
(208003, 'BMW MMS Men\'s Suede XXI Sneakers', 110, 230, 'BMW Sneakers', 2),
(208009, 'Porsche Legacy Low Racer Men\'s Motorsport Shoes', 130, 200, 'Motorsport Shoes', 2),
(209000, 'Vans THE OLD SKOOL', 65, 150, 'Blue Sneakers', 3),
(209001, 'Vans CANVAS OLD SKOOL STACKED', 85, 0, 'STACKED', 3),
(211000, 'Suede Classic XXI Men\'s Sneakers', 90, 90, 'Men\'s Sneakers', 2),
(211111, 'Adidas ZX 1K BOOST SHOES', 140, 0, 'BOOST SHOES', 1),
(222222, 'PUMA Wild Rider Men\'s Sneakers', 130, 260, 'PUMA x HELLY HANSEN', 2);

-- --------------------------------------------------------

--
-- Table structure for table `OrderList`
--

CREATE TABLE `OrderList` (
  `orderNum` int(10) NOT NULL,
  `itemId` int(10) NOT NULL,
  `customerId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usercode`
--

CREATE TABLE `usercode` (
  `user_id` int(10) NOT NULL,
  `user_description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usercode`
--

INSERT INTO `usercode` (`user_id`, `user_description`, `created_date`) VALUES
(1, 'Admin', '2020-08-11 22:36:21'),
(2, 'Customer', '2020-08-11 22:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `userInfo`
--

CREATE TABLE `userInfo` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(10) NOT NULL DEFAULT 2,
  `customerId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userInfo`
--

INSERT INTO `userInfo` (`username`, `password`, `userId`, `customerId`) VALUES
('add', 'add', 2, 34),
('adminaccount', 'adminpassword', 1, 1),
('alexuser', 'alexpassword', 2, 2),
('alexuser2', 'alexpassword', 2, 28),
('amanta', 'qwerty', 2, 32),
('registertest', '123pass', 2, 29),
('Yaser', '12qwaszx', 2, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`ColumnId`);

--
-- Indexes for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemTable`
--
ALTER TABLE `itemTable`
  ADD PRIMARY KEY (`ItemNum`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `OrderList`
--
ALTER TABLE `OrderList`
  ADD PRIMARY KEY (`orderNum`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `usercode`
--
ALTER TABLE `usercode`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userInfo`
--
ALTER TABLE `userInfo`
  ADD PRIMARY KEY (`username`),
  ADD KEY `userId` (`userId`),
  ADD KEY `customerId` (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `ColumnId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `itemTable`
--
ALTER TABLE `itemTable`
  MODIFY `ItemNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222223;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemTable`
--
ALTER TABLE `itemTable`
  ADD CONSTRAINT `itemTable_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `Category` (`ColumnId`);

--
-- Constraints for table `OrderList`
--
ALTER TABLE `OrderList`
  ADD CONSTRAINT `OrderList_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `CustomerInfo` (`id`),
  ADD CONSTRAINT `OrderList_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `itemTable` (`ItemNum`);

--
-- Constraints for table `userInfo`
--
ALTER TABLE `userInfo`
  ADD CONSTRAINT `userInfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usercode` (`user_id`),
  ADD CONSTRAINT `userInfo_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `CustomerInfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
