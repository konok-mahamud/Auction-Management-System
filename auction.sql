-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 04:21 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

CREATE TABLE `bidder` (
  `ID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `biddingTime` datetime NOT NULL,
  `price` int(10) NOT NULL,
  `confirmbid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`ID`, `userID`, `vehicleID`, `biddingTime`, `price`, `confirmbid`) VALUES
(49, 6, 5, '2019-07-07 02:21:50', 1015000, 0),
(50, 6, 7, '2019-09-12 00:54:01', 20111113, 0),
(51, 6, 6, '2019-07-03 02:23:52', 100000, 0),
(52, 4, 7, '2019-09-20 19:14:21', 201111116, 0),
(54, 4, 6, '2019-07-07 02:27:02', 1000600, 0),
(55, 4, 8, '2019-08-08 21:12:05', 12000008, 1),
(56, 6, 8, '2019-07-18 20:32:07', 12000004, 0),
(57, 6, 11, '2019-09-14 00:30:20', 500007, 0),
(58, 4, 11, '2019-09-11 18:14:42', 500006, 0),
(59, 7, 7, '2019-09-16 01:41:26', 20111115, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`ID`, `name`, `type`) VALUES
(2, 'Parado', 'Car'),
(4, 'private car', 'Car'),
(5, 'Sports', 'Bike'),
(6, 'Range rover', 'Car'),
(8, 'Hacie', 'Car'),
(9, 'Classic', 'Bike'),
(10, 'Normal', 'Bike');

-- --------------------------------------------------------

--
-- Table structure for table `confirmbid`
--

CREATE TABLE `confirmbid` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `date` date NOT NULL,
  `userID` int(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confirmbid`
--

INSERT INTO `confirmbid` (`ID`, `vehicleID`, `date`, `userID`, `type`, `price`, `role`) VALUES
(6, 8, '2019-09-16', 4, 'From Office Delivery', 12000008, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `ID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `paymentFrom` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `amount` int(15) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`ID`, `userID`, `paymentFrom`, `account`, `amount`, `role`) VALUES
(1, 4, 'NexusPay', '2551057696', 500000, 0),
(2, 4, 'DBBL online banking', '255553211', 23232, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `vehicleID`, `userID`, `role`) VALUES
(1, 7, 7, 1),
(2, 7, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `userID`, `vehicleID`, `comment`) VALUES
(7, 6, 8, 'dfdsfc'),
(8, 6, 11, 'oowww bike'),
(9, 4, 8, 'ok\n'),
(10, 4, 8, 'ggfjgkjbj'),
(11, 4, 7, 'very gd'),
(12, 6, 7, 'hghkj,bjhfjgvjk'),
(13, 7, 7, 'very go vehicles');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `admin` int(5) DEFAULT 0,
  `active` int(5) NOT NULL DEFAULT 0,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `email`, `password`, `phone`, `address`, `admin`, `active`, `image`) VALUES
(4, 'konok', 'konokmahamud22@gmail.com', '202cb962ac59075b964b07152d234b70', '01725353964', 'house no-8, Lane-2, Block-A, Mirpur-6,Dhaka-1216,Bangladesh, House no-8, 4th floor, Lane-2, Block-A, Mirpur-6,Dhaka', 0, 0, '20190910205915_gixxer.jpg'),
(5, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', 1, 0, ''),
(6, 'anik', 'konokmahamud@gmail.com', '202cb962ac59075b964b07152d234b70', '1962586387', 'house no-8, Lane-2, Block-A, Mirpur-6,Dhaka-1216,Bangladesh, House no-8, 4th floor, Lane-2, Block-A, Mirpur-6,Dhaka', 0, 0, ''),
(7, 'rasel', 'konokmahamud21@gmail.com', '202cb962ac59075b964b07152d234b70', '01765672727', 'House No 8, Lane 2 Block A.,mirpur 6, 4a', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `catagory` int(50) NOT NULL,
  `startDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `price` int(10) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`ID`, `name`, `type`, `catagory`, `startDate`, `EndDate`, `image`, `price`, `status`) VALUES
(5, 'Aqua', 'Car', 2, '2019-08-24', '2019-10-30', '20190910213606_aqua.jpg', 1000000, 1),
(6, 'Gixxer', 'Bike', 5, '2019-07-01', '2019-07-09', '20190706221152_gixxer.jpg', 80000, 0),
(7, 'pajero', 'Car', 2, '2019-07-05', '2019-09-28', '20190910213732_pajaro.jpg', 2000000, 0),
(8, 'Prsis', 'Car', 4, '2019-07-04', '2019-08-15', '20190706221326_prsis1.jpg', 1200000, 0),
(11, 'cbr', 'Bike', 5, '2019-07-19', '2019-09-27', '20190910213706_gixxer2.jpg', 50000, 0),
(12, 'sujuki', 'Car', 4, '2019-09-16', '2019-09-30', '20190915215240_prsis1.jpg', 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

CREATE TABLE `vehicledetails` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `description` text NOT NULL,
  `make` varchar(100) NOT NULL,
  `model` varchar(50) NOT NULL,
  `kilometers` varchar(50) NOT NULL,
  `BodyType` varchar(40) NOT NULL,
  `Engine` varchar(50) NOT NULL,
  `fueltype` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `Transmission` varchar(50) NOT NULL,
  `passenger` int(10) NOT NULL,
  `break` varchar(20) NOT NULL,
  `updateStatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`ID`, `vehicleID`, `description`, `make`, `model`, `kilometers`, `BodyType`, `Engine`, `fueltype`, `year`, `Transmission`, `passenger`, `break`, `updateStatus`) VALUES
(6, 5, 'The Toyota Prius c (c stands for city), named the Toyota Aqua (aqua is Latin for water) in Japan, is a full hybrid gasoline-electric subcompact hatchback manufactured and marketed by Toyota Motor Corporation.', ' Toyota', 'Aqus 110', '00', 'Plastic', 'VVT-i', 'Petrol', ' 2014', 'Auto', 4, 'Disk', 1),
(7, 6, 'Suzuki Motorcycle India Private Limited has introduced an updated version of the Suzuki Gixxer SF. For 2019, the Gixxer SF gets updated styling, with the new design language which has been incorporated in the 2019 Suzuki Gixxer SF 250. The fairing is sharper and the Gixxer SF now gets a newly designed LED headlight, LED taillight and the dimensions have changed as well', ' Bajaj', ' zixxer 150CC', '1000', 'Canister', '4 Stock', 'Octen', ' 2016', 'Manual', 2, 'Disk', 1),
(8, 7, 'Mitsubishi Pajero car price in India starts at Rs. 18.18 Lakh. Explore Pajero specifications, features, images, mileage & color options. Read Pajero user reviews', ' Toyota', ' Al240', '2000', 'Aluminium sheet', '4 Stock', 'Disel', ' 2014', 'Manual', 6, 'Air hydrolic', 1),
(9, 8, 'sahsducsdibcbdouhud cdsjbfuidiubfd', ' Bajaj', ' z43', '500', 'Plastic', 'VVT-i', 'Disel', ' 2016', 'Auto', 4, 'Disk', 1),
(10, 11, 'djsadiaisdg cjadijasjix cjkbsajdoajsd jcnsajdnsoad jsandjsadaw', ' Bajaj', ' zixxer 150CC', '500', 'Canister', '4 Stock', 'Petrol', ' 2016', 'Manual', 1, 'Disk', 1),
(11, 12, 'hfhdjxncjhsa jcdifhi', ' Tata', ' CT100', '0', 'Plastic', 'Tata', 'Octen', ' 2014', 'Auto', 4, 'Dram', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleimage`
--

CREATE TABLE `vehicleimage` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name2` varchar(300) NOT NULL,
  `name3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicleimage`
--

INSERT INTO `vehicleimage` (`ID`, `vehicleID`, `name`, `name2`, `name3`) VALUES
(6, 5, '20190706221603_aqua11.jpg', '20190706221603_aqua1.jpg', '20190706221603_aqua12.jpg'),
(7, 6, '20190706221819_gixxer1.jpg', '20190706221819_gixxer2.jpg', '20190706221819_gixxer3.jpg'),
(8, 7, '20190706222022_pajaro11.jpg', '20190706222022_pajaro13.jpg', '20190706222022_pajaro1.jpg'),
(9, 8, '20190717064531_prsis.jpg', '20190717064531_prsis1.jpg', '20190717064531_prsis12.jpg'),
(10, 11, '20190720170326_gixxer1.jpg', '20190720170326_gixxer2.jpg', '20190720170326_gixxer3.jpg'),
(11, 12, '20190915215344_prsis.jpg', '20190915215344_prsis12.jpg', '20190915215344_prsis1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`ID`, `vehicleID`, `userID`) VALUES
(1, 7, 4),
(4, 7, 6),
(5, 8, 4),
(7, 11, 6),
(8, 7, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidder`
--
ALTER TABLE `bidder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `confirmbid`
--
ALTER TABLE `confirmbid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicleID` (`vehicleID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `catagory` (`catagory`);

--
-- Indexes for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidder`
--
ALTER TABLE `bidder`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `confirmbid`
--
ALTER TABLE `confirmbid`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidder`
--
ALTER TABLE `bidder`
  ADD CONSTRAINT `bidder_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `bidder_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `confirmbid`
--
ALTER TABLE `confirmbid`
  ADD CONSTRAINT `confirmbid_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `confirmbid_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`catagory`) REFERENCES `catagory` (`ID`);

--
-- Constraints for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD CONSTRAINT `vehicledetails_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  ADD CONSTRAINT `vehicleimage_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
