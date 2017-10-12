-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2017 at 07:22 AM
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
  `ValidTill` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_balance`
--

INSERT INTO `account_balance` (`PatientId`, `Balance`, `Is_Active`, `AddedDate`, `ValidTill`) VALUES
(3, 100, 1, '2017-09-19 06:04:06', '2017-10-19 06:04:06'),
(5, 300, 1, '2017-09-28 08:57:35', '2017-10-28 08:57:35'),
(6, 100, 1, '2017-09-19 05:59:38', '2017-10-19 05:59:38');

--
-- Triggers `account_balance`
--
DELIMITER $$
CREATE TRIGGER `ValidTillOnInsert` BEFORE INSERT ON `account_balance` FOR EACH ROW SET new.`ValidTill`=DATE_ADD(CURRENT_TIMESTAMP,INTERVAL 1 month)
$$
DELIMITER ;
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

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`DrugId`, `DrugName`, `Dosage`, `Price`, `Formulation`, `Manufacturer`, `Status`) VALUES
(1, 'Panadol', 5, 12, 'Tablet', 'Panadol', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `drugavailandneeded`
-- (See below for the actual view)
--
CREATE TABLE `drugavailandneeded` (
`DrugPackId` varchar(500)
,`DrugPackName` varchar(200)
,`AvailQuantity` int(11)
,`NeedAmount` bigint(13)
,`Color` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `drugneedandavail`
-- (See below for the actual view)
--
CREATE TABLE `drugneedandavail` (
`DrugPackId` varchar(500)
,`DrugPackName` varchar(200)
,`AvailQuantity` int(11)
,`NeedAmount` bigint(13)
,`Color` varchar(6)
);

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
(1, 'Small Burn First-Aid Pack', 100, 0, 'Place the burned area under running cool water for at least 5 minutes to reduce swelling. Apply an antiseptic spray, antibiotic ointment, or aloe vera cream to soothe the area. Loosely wrap a gauze bandage around the burn. To relieve pain, take acetaminophen', ''),
(2, 'Small Burn First-Aid Pack 2', 50, 0, 'Place the burned area under running cool water for at least 5 minutes to reduce swelling. Apply an antiseptic spray, antibiotic ointment, or aloe vera cream to soothe the area. Loosely wrap a gauze bandage around the burn. To relieve pain, take acetaminophen', ''),
(3, 'Small Burn First-Aid Pack 3', 50, 0, 'Place the burned area under running cool water for at least 5 minutes to reduce swelling. Apply an antiseptic spray, antibiotic ointment, or aloe vera cream to soothe the area. Loosely wrap a gauze bandage around the burn. To relieve pain, take acetaminophen', '');

-- --------------------------------------------------------

--
-- Table structure for table `drugpackitem`
--

CREATE TABLE `drugpackitem` (
  `DrugPackId` int(11) NOT NULL,
  `Drug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugpackitem`
--

INSERT INTO `drugpackitem` (`DrugPackId`, `Drug`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `drug_batch`
--

CREATE TABLE `drug_batch` (
  `id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL DEFAULT '0',
  `barcode` int(11) NOT NULL DEFAULT '0',
  `expiry_date` date NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_batch`
--

INSERT INTO `drug_batch` (`id`, `drug_id`, `barcode`, `expiry_date`, `added_date`, `updated_date`, `is_active`) VALUES
(2, 1, 123, '2017-10-14', '2017-09-09 11:25:07', '2017-09-14 04:21:42', 1),
(3, 1, 123, '2017-10-09', '2017-09-09 11:25:07', '2017-09-11 18:28:06', 1);

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
-- Table structure for table `expiry_notification`
--

CREATE TABLE `expiry_notification` (
  `id` int(11) NOT NULL,
  `drug_batch_id` int(11) NOT NULL DEFAULT '0',
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `is_notified` int(11) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expiry_notification`
--

INSERT INTO `expiry_notification` (`id`, `drug_batch_id`, `patient_id`, `is_notified`, `added_date`, `updated_date`) VALUES
(4, 2, 5, 0, '2017-09-09 11:17:37', '2017-09-09 11:28:04'),
(5, 2, 6, 0, '2017-09-09 11:17:37', '2017-09-09 11:28:04'),
(6, 3, 6, 0, '2017-09-09 11:17:37', '2017-09-09 11:28:04'),
(7, 3, 5, 0, '2017-09-09 11:17:37', '2017-09-09 11:28:04');

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
  `kioskId` int(11) NOT NULL,
  `e-billStatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceNo`, `OrderNo`, `TotalAmount`, `Date`, `kioskId`, `e-billStatus`) VALUES
(1, 10, 100, '2017-09-28 10:07:33', 1, 0),
(3, 22, 100, '2017-09-28 10:07:33', 1, 0),
(4, 17, 100, '2017-09-28 10:07:33', 1, 0),
(5, 2, 100, '2017-09-28 10:07:33', 1, 0);

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `StockUpdate` BEFORE INSERT ON `invoice` FOR EACH ROW UPDATE kioskstock set AvailQuantity=AvailQuantity-(SELECT Quantity FROM `order` WHERE OrderId=new.OrderNo) 
WHERE new.kioskId=KioskId AND DrugPackId=(SELECT PackId FROM `order` WHERE OrderId=new.OrderNo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateBalance` BEFORE INSERT ON `invoice` FOR EACH ROW UPDATE `account_balance` SET `Balance`=`Balance`-new.TotalAmount WHERE `PatientId`=(SELECT `CustomerId` FROM `order` WHERE `OrderId`=new.OrderNo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateDeliveryStatus` BEFORE INSERT ON `invoice` FOR EACH ROW UPDATE `order` set DeliveryStatus=1 WHERE OrderId=new.OrderNo
$$
DELIMITER ;

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
('1', '1', '6.9488, 79.8605', 'Kollupitiya'),
('2', '1', '6.9488, 79.8690', 'Colombo');

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
(1, '1', 0),
(1, '2', 49),
(1, '3', 8),
(2, '1', 99),
(2, '2', 50);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
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
(1, 1, 100, 0, 1, 1, '2017-08-12 18:01:32', '2017-08-13 07:04:52'),
(2, 25, 100, 1, 1, 2, '2017-08-12 18:01:32', '2017-09-28 09:24:26'),
(3, 5, 100, -1, 1, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:37'),
(4, 5, 100, -1, 1, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:23'),
(5, 5, 100, -1, 1, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:34'),
(6, 5, 100, -1, 1, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:29'),
(7, 5, 100, -1, 1, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:39'),
(8, 5, 400, -1, 4, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:35'),
(9, 5, 400, -1, 4, 1, '2017-08-12 18:01:32', '2017-08-20 14:22:27'),
(10, 5, 100, -1, 8, 1, '2017-08-12 18:01:32', '2017-09-28 08:22:57'),
(11, 5, 500, -1, 5, 1, '2017-08-13 13:17:31', '2017-08-20 14:21:46'),
(12, 5, 300, 0, 3, 1, '2017-08-20 14:23:33', '2017-08-20 14:23:33'),
(13, 5, 1200, 0, 2, 1, '2017-09-12 09:29:01', '2017-09-12 09:29:01'),
(14, 5, 100, 1, 1, 1, '2017-09-12 10:01:47', '2017-09-12 10:01:47'),
(17, 5, 100, 1, 9, 3, '2017-09-12 10:29:28', '2017-09-28 09:17:00'),
(22, 5, 100, 1, 1, 1, '2017-09-12 10:52:07', '2017-09-12 10:52:07');

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
  `FcmToken` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Sex`, `Age`, `Address`, `ContactNo`, `RfidCode`, `Status`, `RegisterAt`, `UpdateAt`, `FcmToken`) VALUES
(6, 'aa', 'aa', 'aa@aa.com', '1234', 'Male', 23, 'aa', 779592868, '', 1, '2017-08-13 18:46:07', '2017-09-09 12:08:30', 'cHhgYPUXr4I:APA91bG0SXJc1uDD9jcITGJdagrZTs_WN5uhGs...'),
(5, 'Sharaaf', 'Nazeer', 'ahamedsharaaf@gmail.com', '12345', 'Male', 23, 'Maradana', 779592868, '1234', 1, '2017-08-13 07:02:02', '2017-09-14 07:45:46', 'eLE6H5FmaMs:APA91bGwjZW1bchUkdhlY8fWI4i92WLfqzBWoAo6qaIz-pnnEr9sp-i2xV5WmWSZ-NJnnT6d6238x9G5-HuoEhGC0Y9pw9o788L25UrHC--fnliTV_JXqriz5fkjdDFEPEBI6s00GcNk'),
(1, 'gg', 'ddff', 'gg@dhgd.com', 'ff', 'Male', 33, 'gs', 123, '10', 0, '2017-08-13 07:02:02', '2017-08-13 07:02:46', NULL),
(2, 'Vijayashangavi', 'Kanthan', 'Shangavi6@gmail.com', '123456', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(3, 'Shangavi', 'Kanthan', 'Shangavi@gmail.com', '123456', 'Female', 21, '108,st Benadicts mw, Colombo-13', 772396957, '2017', 0, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(4, 'Vijaya', 'VijayaKanthan', 'ShangaviKanthan@gmail.com', '1234567', 'Female', 21, '108,st Banadicts Mw', 112343682, '123456', 1, '2017-08-13 07:02:02', '2017-08-13 07:02:29', NULL),
(7, 'vvv', 'vvv', 'vv@gg.com', 'ddd', 'Female', 22, 'asfdasf', 2147483647, '555', 1, '2017-08-13 18:49:35', '2017-08-13 18:49:35', NULL);

--
-- Triggers `patient`
--
DELIMITER $$
CREATE TRIGGER `add_Balanace` BEFORE INSERT ON `patient` FOR EACH ROW INSERT INTO `account_balance` (`PatientId`, `Balance`, `Is_Active`, `AddedDate`, `ValidTill`) VALUES (new.Id, '100', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `DrugPackId` varchar(500) NOT NULL,
  `AvailStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `drugavailandneeded`
--
DROP TABLE IF EXISTS `drugavailandneeded`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `drugavailandneeded`  AS  select `ks`.`DrugPackId` AS `DrugPackId`,`dp`.`DrugPackName` AS `DrugPackName`,`ks`.`AvailQuantity` AS `AvailQuantity`,(select ceiling(avg(`o`.`Quantity`)) AS `avgQuantity` from (`invoice` `i` join `order` `o` on((`o`.`OrderId` = `i`.`OrderNo`))) where ((weekday(`i`.`Date`) = weekday(now())) and (cast(`i`.`Date` as time) >= cast(now() as time)) and (cast(`i`.`Date` as time) < addtime(cast(now() as time),'2:00:00')) and (`i`.`kioskId` = `k`.`KioskId`) and (`o`.`PackId` = `ks`.`DrugPackId`))) AS `NeedAmount`,if((`ks`.`AvailQuantity` = 0),'Red',if((`ks`.`AvailQuantity` < 5),'Orange',if((`ks`.`AvailQuantity` < (select ceiling(avg(`o`.`Quantity`)) AS `avgQuantity` from (`invoice` `i` join `order` `o` on((`o`.`OrderId` = `i`.`OrderNo`))) where ((weekday(`i`.`Date`) = weekday(now())) and (cast(`i`.`Date` as time) >= cast(now() as time)) and (cast(`i`.`Date` as time) < addtime(cast(now() as time),'2:00:00')) and (`i`.`kioskId` = `k`.`KioskId`) and (`o`.`PackId` = `ks`.`DrugPackId`)))),'Orange','Green'))) AS `Color` from ((`kiosk` `k` join `kioskstock` `ks` on((`k`.`KioskId` = `ks`.`KioskId`))) join `drugpack` `dp` on((`dp`.`DrugPackId` = `ks`.`DrugPackId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `drugneedandavail`
--
DROP TABLE IF EXISTS `drugneedandavail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `drugneedandavail`  AS  select `ks`.`DrugPackId` AS `DrugPackId`,`dp`.`DrugPackName` AS `DrugPackName`,`ks`.`AvailQuantity` AS `AvailQuantity`,if(((select ceiling(avg(`o`.`Quantity`)) AS `avgQuantity` from (`invoice` `i` join `order` `o` on((`o`.`OrderId` = `i`.`OrderNo`))) where ((weekday(`i`.`Date`) = weekday(now())) and (cast(`i`.`Date` as time) >= cast(now() as time)) and (cast(`i`.`Date` as time) < addtime(cast(now() as time),'2:00:00')) and (`i`.`kioskId` = `k`.`KioskId`) and (`o`.`PackId` = `ks`.`DrugPackId`))) > 0),(select ceiling(avg(`o`.`Quantity`)) AS `avgQuantity` from (`invoice` `i` join `order` `o` on((`o`.`OrderId` = `i`.`OrderNo`))) where ((weekday(`i`.`Date`) = weekday(now())) and (cast(`i`.`Date` as time) >= cast(now() as time)) and (cast(`i`.`Date` as time) < addtime(cast(now() as time),'2:00:00')) and (`i`.`kioskId` = `k`.`KioskId`) and (`o`.`PackId` = `ks`.`DrugPackId`))),5) AS `NeedAmount`,if((`ks`.`AvailQuantity` = 0),'Red',if((`ks`.`AvailQuantity` < 5),'Orange',if((`ks`.`AvailQuantity` < (select ceiling(avg(`o`.`Quantity`)) AS `avgQuantity` from (`invoice` `i` join `order` `o` on((`o`.`OrderId` = `i`.`OrderNo`))) where ((weekday(`i`.`Date`) = weekday(now())) and (cast(`i`.`Date` as time) >= cast(now() as time)) and (cast(`i`.`Date` as time) < addtime(cast(now() as time),'2:00:00')) and (`i`.`kioskId` = `k`.`KioskId`) and (`o`.`PackId` = `ks`.`DrugPackId`)))),'Orange','Green'))) AS `Color` from ((`kiosk` `k` join `kioskstock` `ks` on((`k`.`KioskId` = `ks`.`KioskId`))) join `drugpack` `dp` on((`dp`.`DrugPackId` = `ks`.`DrugPackId`))) ;

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
-- Indexes for table `drug_batch`
--
ALTER TABLE `drug_batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_id_barcode` (`drug_id`,`barcode`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Email`,`Password`);

--
-- Indexes for table `expiry_notification`
--
ALTER TABLE `expiry_notification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drug_batch_id` (`drug_batch_id`,`patient_id`);

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
  MODIFY `PatientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `DrugId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `drugpack`
--
ALTER TABLE `drugpack`
  MODIFY `DrugPackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drug_batch`
--
ALTER TABLE `drug_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expiry_notification`
--
ALTER TABLE `expiry_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `injury`
--
ALTER TABLE `injury`
  MODIFY `InjuryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
