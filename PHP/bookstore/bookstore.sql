-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2026 at 06:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` varchar(5) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `typeId` char(3) DEFAULT NULL,
  `statusId` char(2) DEFAULT NULL,
  `publish` varchar(25) DEFAULT NULL,
  `unitPrice` decimal(10,2) DEFAULT NULL,
  `unitRent` decimal(10,2) DEFAULT NULL,
  `dayAmount` int(11) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `bookDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookName`, `typeId`, `statusId`, `publish`, `unitPrice`, `unitRent`, `dayAmount`, `picture`, `bookDate`) VALUES
('01', 'ไม่ยากถ้าอยากสวย', 'T01', 'S2', 'กุเอง', 9000.00, 100000.00, 30466, '', '2026-02-18'),
('02', 'สารคดีหมาอ้วน', '', '', 'เมมิกคู่เกย์รักกันดี', 50.00, 5.00, 1, '', '2026-02-23'),
('03', 'แมวปักเป้าตายท้องอืด', '', '', 'เมมิกคู่เกย์', 50000.00, 10.00, 1, 'Screenshot 2025-01-03 192442.png', '2026-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(4) NOT NULL,
  `CustomerName` varchar(30) NOT NULL,
  `CustomerSurname` varchar(30) NOT NULL,
  `CustomerAddr` varchar(60) DEFAULT NULL,
  `CustomerPhone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statusbook`
--

CREATE TABLE `statusbook` (
  `StatusId` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StatusName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `statusbook`
--

INSERT INTO `statusbook` (`StatusId`, `StatusName`) VALUES
('S1', 'ว่าง'),
('S2', 'ถูกเช่า'),
('S3', 'ชำรุด');

-- --------------------------------------------------------

--
-- Table structure for table `typebook`
--

CREATE TABLE `typebook` (
  `TypeName` varchar(50) NOT NULL,
  `Typeid` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `typebook`
--

INSERT INTO `typebook` (`TypeName`, `Typeid`) VALUES
('นิยาย', 'T01'),
('คอมพิวเตอร์', 'T02'),
('การ์ตูน', 'T03'),
('การศึกษา', 'T04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `statusbook`
--
ALTER TABLE `statusbook`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `typebook`
--
ALTER TABLE `typebook`
  ADD PRIMARY KEY (`Typeid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
