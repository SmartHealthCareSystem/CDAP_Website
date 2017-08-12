-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2017 at 08:48 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shcsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE IF NOT EXISTS `drug` (
  `DrugId` int(11) NOT NULL AUTO_INCREMENT,
  `DrugName` varchar(100) NOT NULL,
  `Dosage` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Formulation` varchar(100) NOT NULL,
  `Manufacturer` varchar(200) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`DrugId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `drugpack`
--

CREATE TABLE IF NOT EXISTS `drugpack` (
  `DrugPackId` int(11) NOT NULL AUTO_INCREMENT,
  `DrugPackName` varchar(200) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `Instruction` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`DrugPackId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `drugpack`
--

INSERT INTO `drugpack` (`DrugPackId`, `DrugPackName`, `UnitPrice`, `delete`, `Instruction`, `image`) VALUES
(3, 'Small Burn First-Aid Pack', 100, 0, 'Place the burned area under running cool water for at least 5 minutes to reduce swelling. Apply an antiseptic spray, antibiotic ointment, or aloe vera cream to soothe the area. Loosely wrap a gauze bandage around the burn. To relieve pain, take acetaminophen', 'Drug_pack_img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `drugpackitem`
--

CREATE TABLE IF NOT EXISTS `drugpackitem` (
  `DrugPackId` int(11) NOT NULL,
  `Drug` varchar(200) NOT NULL,
  PRIMARY KEY (`DrugPackId`,`Drug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Sex` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `UserLevel` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  PRIMARY KEY (`Email`,`Password`)
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

CREATE TABLE IF NOT EXISTS `injury` (
  `InjuryId` int(11) NOT NULL AUTO_INCREMENT,
  `InjuryName` varchar(300) NOT NULL,
  `MajorCategory` varchar(300) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Instruction` varchar(10000) NOT NULL,
  `DrugPackId` varchar(500) NOT NULL,
  PRIMARY KEY (`InjuryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceNo` int(11) NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `kioskId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`) VALUES
(1, 1, 100, '2017-08-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kiosk`
--

CREATE TABLE IF NOT EXISTS `kiosk` (
  `KioskId` varchar(100) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Address` int(11) NOT NULL,
  PRIMARY KEY (`KioskId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kiosk`
--

INSERT INTO `kiosk` (`KioskId`, `Status`, `Location`, `Address`) VALUES
('1', '1', '6.9488, 79.8605', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kioskstock`
--

CREATE TABLE IF NOT EXISTS `kioskstock` (
  `KioskId` int(11) NOT NULL,
  `DrugPackId` varchar(500) NOT NULL,
  `AvailQuantity` int(11) NOT NULL,
  PRIMARY KEY (`KioskId`,`DrugPackId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kioskstock`
--

INSERT INTO `kioskstock` (`KioskId`, `DrugPackId`, `AvailQuantity`) VALUES
(1, '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` varchar(200) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `DeliveryStatus` tinyint(1) NOT NULL DEFAULT '0',
  `Quantity` int(11) NOT NULL,
  `PackId` int(11) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `CustomerId`, `TotalAmount`, `DeliveryStatus`, `Quantity`, `PackId`) VALUES
(1, '1', 100, 0, 1, 1),
(2, '25', 100, 0, 1, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
  `OrderId` int(11) NOT NULL,
  `DrugPackId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `account_balance` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Id_2` (`Id`),
  KEY `Password` (`Password`),
  KEY `Id` (`Id`),
  KEY `Id_3` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `Address`, `ContactNo`, `RfidCode`, `Status`, `account_balance`) VALUES
(18, 'gg', 'ddff', 'gg@dhgd.com', 'ff', 'Male', 33, 'gs', 123, '4', 0, 100),
(16, 'Vijayashangavi', 'Kanthan', 'Shangavi6@gmail.com', '123456', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1, 100),
(15, 'Shangavi', 'Kanthan', 'Shangavi@gmail.com', '123456', 'Female', 21, '108,st Benadicts mw, Colombo-13', 772396957, '2017', 0, 100),
(25, 'Vijaya', 'VijayaKanthan', 'ShangaviKanthan@gmail.com', '1234567', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1, 10),
(14, 'Sharaaf', 'Nazeer', 'Sharaaf@gmail.com', '12345', 'Male', 23, 'marathana', 779592868, '1234', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `DrugPackId` varchar(500) NOT NULL,
  `AvailStock` int(11) NOT NULL,
  PRIMARY KEY (`DrugPackId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
