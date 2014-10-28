-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2014 at 09:51 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE IF NOT EXISTS `accommodation` (
  `Acc_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Address` varchar(25) NOT NULL,
  `Price` float NOT NULL,
  `Type` text NOT NULL,
  `Area` text NOT NULL,
  `Facilities` text NOT NULL,
  `Other` text NOT NULL,
  `NIC` varchar(10) NOT NULL,
  PRIMARY KEY (`Acc_ID`),
  UNIQUE KEY `Address` (`Address`,`NIC`),
  UNIQUE KEY `Acc_ID` (`Acc_ID`),
  KEY `NIC` (`NIC`),
  KEY `Acc_ID_2` (`Acc_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`Acc_ID`, `Address`, `Price`, `Type`, `Area`, `Facilities`, `Other`, `NIC`) VALUES
(1, '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `acc_provider`
--

CREATE TABLE IF NOT EXISTS `acc_provider` (
  `NIC` varchar(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`NIC`),
  UNIQUE KEY `Email` (`Email`),
  KEY `NIC` (`NIC`),
  KEY `NIC_2` (`NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_provider`
--

INSERT INTO `acc_provider` (`NIC`, `Name`, `Email`, `Contact_No`, `Message`) VALUES
('', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Acc_ID` int(5) NOT NULL,
  `Reg_No` varchar(12) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Acc_ID`,`Reg_No`),
  KEY `Reg_No` (`Reg_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prospective_tenent`
--

CREATE TABLE IF NOT EXISTS `prospective_tenent` (
  `Reg_No` varchar(12) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Faculty` varchar(10) NOT NULL,
  `Address` varchar(25) NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Notification` char(1) NOT NULL,
  PRIMARY KEY (`Reg_No`),
  UNIQUE KEY `Password` (`Last_Name`,`Email`,`NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospective_tenent`
--

INSERT INTO `prospective_tenent` (`Reg_No`, `First_Name`, `Last_Name`, `Email`, `NIC`, `Faculty`, `Address`, `Contact_No`, `Password`, `Notification`) VALUES
('', '', '', '', '', '', '', '', '', ''),
('2012cs115', 'Rasika', 'Chandimal', 'rcsranepura@yahoo.com', '912241165V', 'UCSC', '736/2,Ragama', '0112954288', 'fcea920f7412b5da7be0cf42b8c93759', 's'),
('2012cs116', 'Chandimal Sandaruwan', 'Ranepura', 'rcsranepura@yahoo.com', '912241165V', 'UCSC', '736', '0712485702', '25f9e794323b453885f5181f1b624d0b', 's'),
('Admin', 'Rasika', 'Chandimal', 'hunjicot@gmail.com', '941236754V', 'UCSC', '700', '0112954288', 'e10adc3949ba59abbe56e057f20f883e', 's');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `acc_provider` (`NIC`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Reg_No`) REFERENCES `prospective_tenent` (`Reg_No`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`Acc_ID`) REFERENCES `accommodation` (`Acc_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
