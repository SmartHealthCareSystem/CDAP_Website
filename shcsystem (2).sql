-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2017 at 09:40 AM
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

DROP TABLE IF EXISTS `drug`;
CREATE TABLE IF NOT EXISTS `drug` (
  `DrugId` int(11) NOT NULL AUTO_INCREMENT,
  `DrugName` varchar(100) NOT NULL,
  `Dosage` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Formulation` varchar(100) NOT NULL,
  `Manufacturer` varchar(200) NOT NULL,
  `ManufactureDate` date NOT NULL,
  `ExpiryDate` date NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`DrugId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `drugpack`
--

DROP TABLE IF EXISTS `drugpack`;
CREATE TABLE IF NOT EXISTS `drugpack` (
  `DrugPackId` varchar(300) NOT NULL,
  `DrugId` int(11) NOT NULL,
  PRIMARY KEY (`DrugPackId`,`DrugId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
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

DROP TABLE IF EXISTS `injury`;
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

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceNo` int(11) NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`) VALUES
(1, 1, 100, '2017-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `kiosk`
--

DROP TABLE IF EXISTS `kiosk`;
CREATE TABLE IF NOT EXISTS `kiosk` (
  `KioskId` varchar(100) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Location` varchar(200) NOT NULL,
  PRIMARY KEY (`KioskId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kiosk`
--

INSERT INTO `kiosk` (`KioskId`, `Status`, `Location`) VALUES
('1', '1', '6.9488, 79.8605');

-- --------------------------------------------------------

--
-- Table structure for table `kioskstock`
--

DROP TABLE IF EXISTS `kioskstock`;
CREATE TABLE IF NOT EXISTS `kioskstock` (
  `KioskId` int(11) NOT NULL,
  `DrugPackId` varchar(500) NOT NULL,
  `AvailQuantity` int(11) NOT NULL,
  PRIMARY KEY (`KioskId`,`DrugPackId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL,
  `KioskId` varchar(200) NOT NULL,
  `CustomerId` varchar(200) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `DeliveryStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `KioskId`, `CustomerId`, `TotalAmount`, `DeliveryStatus`) VALUES
(1, '1', '1', 100, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
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

DROP TABLE IF EXISTS `patient`;
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
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Id_2` (`Id`),
  KEY `Password` (`Password`),
  KEY `Id` (`Id`),
  KEY `Id_3` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `Address`, `ContactNo`, `RfidCode`, `Status`) VALUES
(18, 'gg', 'ddff', 'gg@dhgd.com', 'ff', 'Male', 33, 'gs', 123, '4', 0),
(16, 'Vijayashangavi', 'Kanthan', 'Shangavi6@gmail.com', '123456', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1),
(15, 'Shangavi', 'Kanthan', 'Shangavi@gmail.com', '123456', 'Female', 21, '108,st Benadicts mw, Colombo-13', 772396957, '2017', 0),
(25, 'Vijayashangavi', 'VijayaKanthan', 'ShangaviKanthan@gmail.com', '123456', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1),
(14, 'Sharaaf', 'Nazeer', 'Sharaaf@gmail.com', '12345', 'Male', 23, 'marathana', 779592868, '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `DrugPackId` varchar(500) NOT NULL,
  `AvailStock` int(11) NOT NULL,
  PRIMARY KEY (`DrugPackId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
