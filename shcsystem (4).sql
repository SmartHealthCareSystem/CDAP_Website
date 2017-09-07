-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2017 at 08:29 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shcsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_balance`
--

CREATE TABLE `account_balance` (
  `PatientId` int(11) NOT NULL,
  `Balance` double NOT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT '1',
  `AddedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ValidTill` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_balance`
--

INSERT INTO `account_balance` (`PatientId`, `Balance`, `Is_Active`, `AddedDate`, `ValidTill`) VALUES
(5, 500, 1, '2017-08-13 13:48:45', '2017-09-13 13:48:45');

--
-- Triggers `account_balance`
--
DELIMITER $$
CREATE TRIGGER `valid_till` BEFORE UPDATE ON `account_balance` FOR EACH ROW SET new.`ValidTill` =DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 month)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `DrugId` int(11) NOT NULL,
  `DrugName` varchar(100) NOT NULL,
  `Dosage` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Formulation` varchar(100) NOT NULL,
  `Manufacturer` varchar(200) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drugpack`
--

CREATE TABLE `drugpack` (
  `DrugPackId` int(11) NOT NULL,
  `DrugPackName` varchar(200) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `Instruction` varchar(1000) NOT NULL,
  `Image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugpack`
--

INSERT INTO `drugpack` (`DrugPackId`, `DrugPackName`, `UnitPrice`, `delete`, `Instruction`, `Image`) VALUES
(1, 'Small Burn First-Aid Pack', 100, 0, 'Place the burned area under running cool water for at least 5 minutes to reduce swelling. Apply an antiseptic spray, antibiotic ointment, or aloe vera cream to soothe the area. Loosely wrap a gauze bandage around the burn. To relieve pain, take acetaminophen', '');

-- --------------------------------------------------------

--
-- Table structure for table `drugpackitem`
--

CREATE TABLE `drugpackitem` (
  `DrugPackId` int(11) NOT NULL,
  `Drug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drug_batch`
--

CREATE TABLE `drug_batch` (
  `Barcode_ID` int(11) NOT NULL,
  `ExpiryDate` timestamp NOT NULL,
  `Patient_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_batch`
--

INSERT INTO `drug_batch` (`Barcode_ID`, `ExpiryDate`, `Patient_ID`) VALUES
(123, '2017-08-26 07:10:17', 5);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `UserLevel` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ContactNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `UserLevel`, `Address`, `ContactNo`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin', 'Male', 24, 'admin', 'admin', 772396957);

-- --------------------------------------------------------

--
-- Table structure for table `injury`
--

CREATE TABLE `injury` (
  `InjuryId` int(11) NOT NULL,
  `InjuryName` varchar(300) NOT NULL,
  `MajorCategory` varchar(300) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Instruction` varchar(10000) NOT NULL,
  `DrugPackId` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceNo` int(11) NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kioskId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`) VALUES
(1, 10, 100, '2017-08-13 12:59:13', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `kiosk`
--

CREATE TABLE `kiosk` (
  `KioskId` varchar(100) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kiosk`
--

INSERT INTO `kiosk` (`KioskId`, `Status`, `Location`, `Address`) VALUES
('1', '1', '6.9488, 79.8605', '');

-- --------------------------------------------------------

--
-- Table structure for table `kioskstock`
--

CREATE TABLE `kioskstock` (
  `KioskId` int(11) NOT NULL,
  `DrugPackId` varchar(500) NOT NULL,
  `AvailQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kioskstock`
--

INSERT INTO `kioskstock` (`KioskId`, `DrugPackId`, `AvailQuantity`) VALUES
(1, '1', 100);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` varchar(200) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `DeliveryStatus` tinyint(1) NOT NULL DEFAULT '0',
  `Quantity` int(11) NOT NULL,
  `PackId` int(11) NOT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `CustomerId`, `TotalAmount`, `DeliveryStatus`, `Quantity`, `PackId`, `AddedDate`, `UpdatedDate`) VALUES
(1, '1', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(2, '25', 100, 0, 1, 1001, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(3, '5', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(4, '5', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(5, '5', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(6, '5', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(7, '5', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(8, '5', 400, 0, 4, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(9, '5', 400, 0, 4, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(10, '5', 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(11, '5', 500, 0, 5, 1, '2017-08-13 13:17:31', '2017-08-13 13:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderId` int(11) NOT NULL,
  `DrugPackId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `RfidCode` varchar(200) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `RegisterAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FcmToken` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `Address`, `ContactNo`, `RfidCode`, `Status`, `RegisterAt`, `UpdateAt`, `FcmToken`) VALUES
(6, 'aa', 'aa', 'aa@aa.com', '1234', 'Male', 23, 'aa', 779592868, '', 1, '2017-08-13 18:46:07', '2017-08-26 08:12:12', '523'),
(1, 'gg', 'ddff', 'gg@dhgd.com', 'ff', 'Male', 33, 'gs', 123, '10', 0, '2017-08-13 07:02:02', '2017-08-13 07:02:46', NULL),
(2, 'Vijayashangavi', 'Kanthan', 'Shangavi6@gmail.com', '123456', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(3, 'Shangavi', 'Kanthan', 'Shangavi@gmail.com', '123456', 'Female', 21, '108,st Benadicts mw, Colombo-13', 772396957, '2017', 0, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(4, 'Vijaya', 'VijayaKanthan', 'ShangaviKanthan@gmail.com', '1234567', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(5, 'Sharaaf', 'Nazeer', 'sharaaf@gmail.com', '12345', 'Male', 23, 'marathana', 779592868, '1234', 1, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(7, 'vvv', 'vvv', 'vv@gg.com', 'ddd', 'Female', 22, 'asfdasf', 2147483647, '555', 1, '2017-08-13 18:49:35', '2017-08-26 08:23:14', '523');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `DrugPackId` varchar(500) NOT NULL,
  `AvailStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balance`
--
ALTER TABLE `account_balance`
  ADD PRIMARY KEY (`PatientId`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`DrugId`);

--
-- Indexes for table `drugpack`
--
ALTER TABLE `drugpack`
  ADD PRIMARY KEY (`DrugPackId`);

--
-- Indexes for table `drugpackitem`
--
ALTER TABLE `drugpackitem`
  ADD PRIMARY KEY (`DrugPackId`,`Drug`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Email`,`Password`);

--
-- Indexes for table `injury`
--
ALTER TABLE `injury`
  ADD PRIMARY KEY (`InjuryId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceNo`);

--
-- Indexes for table `kiosk`
--
ALTER TABLE `kiosk`
  ADD PRIMARY KEY (`KioskId`);

--
-- Indexes for table `kioskstock`
--
ALTER TABLE `kioskstock`
  ADD PRIMARY KEY (`KioskId`,`DrugPackId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Id_2` (`Id`),
  ADD KEY `Password` (`Password`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Id_3` (`Id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`DrugPackId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_balance`
--
ALTER TABLE `account_balance`
  MODIFY `PatientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `DrugId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugpack`
--
ALTER TABLE `drugpack`
  MODIFY `DrugPackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `injury`
--
ALTER TABLE `injury`
  MODIFY `InjuryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
