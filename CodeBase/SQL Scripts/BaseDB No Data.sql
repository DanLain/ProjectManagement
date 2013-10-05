-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2013 at 04:21 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP DATABASE `danlain_live`;
--
-- Database: `danlain_live`
--
CREATE DATABASE IF NOT EXISTS `danlain_live` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `danlain_live`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CompanyID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `BusinessName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Fax` varchar(12) NOT NULL,
  `ContactName` varchar(100) NOT NULL,
  PRIMARY KEY (`CompanyID`),
  UNIQUE KEY `CompanyID` (`CompanyID`),
  UNIQUE KEY `CompanyID_2` (`CompanyID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyID`, `BusinessName`, `Address`, `City`, `State`, `Zip`, `Phone`, `Fax`, `ContactName`) VALUES
(1, 'Better Software\r\n', '21 Jump Street', 'Lost', 'TX', '76666', '890-555-3421', '890-555-3421', 'Sally Smith');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EmployeeID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Phone` varchar(12) NOT NULL,
  `Fax` varchar(12) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Salary` decimal(10,2) NOT NULL,
  `CompanyID` bigint(20) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `Admin` int(11) NOT NULL,
  `Developer` int(11) NOT NULL,
  `Manager` int(11) NOT NULL,
  `Architect` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  UNIQUE KEY `CustomerID` (`EmployeeID`),
  UNIQUE KEY `EmployeeID` (`EmployeeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Phone`, `Fax`, `FirstName`, `LastName`, `Address`, `City`, `State`, `Zip`, `Email`, `Salary`, `CompanyID`, `ProjectID`, `Admin`, `Developer`, `Manager`, `Architect`) VALUES
(1, '817-308-2582', '', 'Dan', 'Lain', '1003 Cooper Square Circle', 'Arlington', 'Te', '76013', 'danlain@live.com', '0.00', 0, 0, 0, 0, 0, 0),
(3, '555-555-5555', '', 'Richard', 'Sherrill', '1313', 'Arlington', 'TX', '76012', 'richardzsherrill@yahoo.com', '0.00', 0, 0, 0, 0, 0, 0),
(4, '682-555-1111', '', 'john', 'john', '12', 'Here', 'HI', '43433', 'john@live.com', '0.00', 0, 0, 0, 0, 0, 0),
(5, '1234561234', '682453124', 'Jon', 'Snow', '123', 'The', 'My', '71234', 'WhiteWalker@MiddleEarth.com', '0.00', 0, 0, 0, 0, 0, 0),
(13, '8173082582', '', 'Daniel', 'Lain', '1003 Cooper Square Circle', 'Arlington', 'TX', '76013', 'danlain123@live.com', '0.00', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `epic`
--

CREATE TABLE IF NOT EXISTS `epic` (
  `EpicID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ProjectID` bigint(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` longtext NOT NULL,
  UNIQUE KEY `EpicID` (`EpicID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `EmployeeID` bigint(20) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin` int(11) NOT NULL,
  `Locked` int(11) NOT NULL,
  PRIMARY KEY (`UserName`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`EmployeeID`, `UserName`, `Password`, `Admin`, `Locked`) VALUES
(1, 'danlain@live.com', 'damn', 1, 0),
(2, 'gjohns1007@verizon.net', 'damn', 1, 0),
(3, 'richardzsherrill@yahoo.com', '1Richard', 1, 0),
(4, 'john@live.com', '123456Uu', 0, 0),
(5, 'WhiteWalker@MiddleEarth.com', 'Iamatest1', 0, 0),
(13, 'danlain123@live.com', '1loveAlison', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(20) NOT NULL,
  `TargetStartDate` datetime NOT NULL,
  `TargetEndDate` datetime NOT NULL,
  `BudgetDays` int(11) NOT NULL,
  `BudgetCurancy` decimal(20,2) NOT NULL,
  `Manager` bigint(20) NOT NULL,
  PRIMARY KEY (`ProjectID`),
  UNIQUE KEY `ProjectID` (`ProjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprint`
--

CREATE TABLE IF NOT EXISTS `sprint` (
  `ProjectID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `InitialStoryPoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `StoryID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `EpicID` int(11) NOT NULL,
  `EmployeeID` bigint(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `PlannedDays` int(11) NOT NULL,
  `WorkedDays` int(11) NOT NULL,
  `RemainingDays` int(11) NOT NULL,
  `StoryPoints` int(11) NOT NULL,
  PRIMARY KEY (`StoryID`),
  UNIQUE KEY `StoryID` (`StoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
