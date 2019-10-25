-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 09:44 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodtown`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userID` int(100) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dob` varchar(100) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `joinDate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `actionTakenByID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userID`, `email`, `name`, `gender`, `dob`, `photo`, `address`, `phone`, `joinDate`, `actionTakenByID`) VALUES
(2002, 'sad@gmail.com', 'Sad Man Anik', 'Male', '2018-02-07', '2002.jpg', 'Dhaka,Bangladesh.', '+8801521213097', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartlist`
--

CREATE TABLE `cartlist` (
  `cartID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `itemID` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `grossPrice` double NOT NULL,
  `addedAtDate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orderID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cartlist`
--

INSERT INTO `cartlist` (`cartID`, `userID`, `itemID`, `quantity`, `grossPrice`, `addedAtDate`, `status`, `orderID`) VALUES
(9002, 2001, 5001, 1, 500, '2018-08-25', 'Delivered', 10002),
(9003, 2001, 5002, 1, 3000, '2018-08-26', 'Delivered', 10003),
(9004, 2001, 5001, 1, 500, '2018-08-26', 'Ordered', 10004),
(9005, 2001, 5002, 1, 3000, '2018-08-26', 'Ordered', 10004);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userID` int(100) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dob` varchar(100) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `joinDate` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userID`, `email`, `name`, `gender`, `dob`, `photo`, `address`, `phone`, `joinDate`) VALUES
(2001, 'sadmananik1@gmail.com', 'Sadman Anik', 'Male', '1996-04-24', '2001.jpg', 'Dhaka,Bangladesh.', '+8801521213097', '2018-08-20'),
(2004, 'sasanik1@gmail.com', 'Shafiul Alam', 'Male', '2018-08-22', '2004.jpg', 'Dhaka,Bangladesh.', '+8801521213097', '2018-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE `itemlist` (
  `itemID` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foodType` varchar(100) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `regPrice` double NOT NULL,
  `availability` varchar(100) CHARACTER SET latin1 NOT NULL,
  `restaurantID` int(100) NOT NULL,
  `createdAt` varchar(100) CHARACTER SET latin1 NOT NULL,
  `updatedAt` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`itemID`, `name`, `description`, `foodType`, `photo`, `regPrice`, `availability`, `restaurantID`, `createdAt`, `updatedAt`) VALUES
(5002, 'Salmon Smoke', 'Salmon fish dish.', 'Single Pack', '5002.jpg', 3000, 'Yes', 2008, '2018-08-25', '2018-08-25'),
(5003, 'Biryani', 'Mixed of basmati rice, nutritious veggies with spicy masala.', 'Single Pack', '5003.jpg', 200, 'Yes', 2009, '2018-08-29', '2018-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `userID` int(100) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `accountStatus` varchar(100) CHARACTER SET latin1 NOT NULL,
  `createdAt` varchar(100) CHARACTER SET latin1 NOT NULL,
  `updatedAt` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`userID`, `email`, `type`, `password`, `accountStatus`, `createdAt`, `updatedAt`) VALUES
(2001, 'sadmananik1@gmail.com', 'Customer', '22222222', 'valid', '2018-08-22', '2018-08-24'),
(2002, 'sad@gmail.com', 'Admin', '87654321', 'valid', '2018-08-22', '2018-08-28'),
(2004, 'sasanik1@gmail.com', 'Customer', '1234', 'valid', '2018-08-22', '2018-08-22'),
(2008, 'pizza_dhan@gmail.com', 'Restaurant', '1234', 'valid', '2018-08-23', '2018-08-28'),
(2009, 'barcode@gmail.com', 'Restaurant', '11111111', 'valid', '2018-08-29', '2018-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `orderID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `totalAmount` double NOT NULL,
  `date` varchar(100) CHARACTER SET latin1 NOT NULL,
  `time` varchar(100) CHARACTER SET latin1 NOT NULL,
  `paymentType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`orderID`, `userID`, `totalAmount`, `date`, `time`, `paymentType`, `address`, `phone`) VALUES
(10002, 2001, 500, '2018-08-25', '08:13:45pm', 'Cash on delivery', 'Dhamrai, Savar.', '+8801521213097'),
(10003, 2001, 3000, '2018-08-26', '05:32:26am', 'bKash', 'Dhaka', '+8801521213097'),
(10004, 2001, 3500, '2018-08-26', '05:40:06am', 'Cash on delivery', 'Dhaka', '+8801521213097');

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `rattingID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `restaurantID` int(100) NOT NULL,
  `rate` double NOT NULL,
  `comment` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratting`
--

INSERT INTO `ratting` (`rattingID`, `userID`, `restaurantID`, `rate`, `comment`, `date`) VALUES
(50001, 2001, 2008, 5, 'Their Italian Pizza is best...', '2018-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `userID` int(100) NOT NULL,
  `restaurantName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `branch` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `logo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ownerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `openTime` varchar(100) CHARACTER SET latin1 NOT NULL,
  `closeTime` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ratting` double NOT NULL,
  `createdAt` varchar(100) CHARACTER SET latin1 NOT NULL,
  `updatedAt` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`userID`, `restaurantName`, `branch`, `address`, `email`, `phone`, `logo`, `ownerName`, `openTime`, `closeTime`, `ratting`, `createdAt`, `updatedAt`, `status`) VALUES
(2008, 'Pizza Hut', 'Dhanmandi', 'Dhaka,Bangladesh.', 'pizza_dhan@gmail.com', '+8801521213097', '2008.jpg', 'Sadman Anik', '10:00 AM', '11:0 PM', 5, '2018-08-23', '2018-08-28', 'open'),
(2009, 'Barcode', 'Banani', 'Dhaka,Bangladesh.', 'barcode@gmail.com', '+8801521213097', '2009.jpg', 'Shafiul Alam', '9:00 AM', '10:00 PM', 0, '2018-08-29', '2018-08-29', 'open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `cartlist`
--
ALTER TABLE `cartlist`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`rattingID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2003;

--
-- AUTO_INCREMENT for table `cartlist`
--
ALTER TABLE `cartlist`
  MODIFY `cartID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9006;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `itemID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;

--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `rattingID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50002;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
