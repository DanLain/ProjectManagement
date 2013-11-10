-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2013 at 04:30 AM
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
(1, 'Better Software', '21 Jump Street', 'Lost', 'TX', '76666', '890-555-3421', '890-555-3421', 'Sally Smith');

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
  `CompanyID` bigint(20) NOT NULL DEFAULT '1',
  `ProjectID` int(11) NOT NULL,
  `Developer` int(11) NOT NULL,
  `Manager` int(11) NOT NULL,
  `Architect` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  UNIQUE KEY `CustomerID` (`EmployeeID`),
  UNIQUE KEY `EmployeeID` (`EmployeeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Phone`, `Fax`, `FirstName`, `LastName`, `Address`, `City`, `State`, `Zip`, `Email`, `Salary`, `CompanyID`, `ProjectID`, `Developer`, `Manager`, `Architect`) VALUES
(1, '817-308-2582', '', 'Dan', 'Lain', '1003 Cooper Square Circle', 'Arlington', 'Te', '76013', 'danlain@live.com', '0.00', 1, 12, 0, 0, 0),
(3, '555-555-5555', '', 'Richard', 'Sherrill', '1313', 'Arlington', 'TX', '76012', 'richardzsherrill@yahoo.com', '0.00', 1, 0, 0, 0, 0),
(4, '682-555-1111', '', 'john', 'john', '12', 'Here', 'HI', '43433', 'john@live.com', '0.00', 1, 15, 0, 1, 0),
(5, '1234561234', '682453124', 'Jon', 'Snow', '123', 'The', 'My', '71234', 'WhiteWalker@MiddleEarth.com', '0.00', 1, 0, 0, 0, 0),
(21, '', '', 'Dan', 'Lain', '', '', '', '', 'daniel.lain@mavs.uta.edu', '0.00', 0, 13, 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `epic`
--

INSERT INTO `epic` (`EpicID`, `ProjectID`, `Name`, `Description`) VALUES
(1, 13, 'Dan Test12', 'I hope this will be a good epic buy gollyu'),
(2, 13, 'Dan Test', 'Test Story 1'),
(3, 15, 'Design Architecture', 'comp eup with plan');

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
(3, 'richardzsherrill@yahoo.com', '1Richard', 0, 0),
(4, 'john@live.com', 'damn', 0, 0),
(5, 'WhiteWalker@MiddleEarth.com', 'Iamatest1', 0, 0),
(21, 'daniel.lain@mavs.uta.edu', 'damn', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(20) NOT NULL,
  `TargetStartDate` date NOT NULL,
  `TargetEndDate` date NOT NULL,
  `BudgetDays` int(11) NOT NULL,
  `BudgetCurancy` decimal(20,2) NOT NULL,
  `Manager` bigint(20) NOT NULL,
  PRIMARY KEY (`ProjectID`),
  UNIQUE KEY `ProjectID` (`ProjectID`),
  UNIQUE KEY `ProjectName` (`ProjectName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`, `TargetStartDate`, `TargetEndDate`, `BudgetDays`, `BudgetCurancy`, `Manager`) VALUES
(13, 'Dan Test', '2013-10-14', '2014-03-14', 123, '12568.00', 21),
(14, 'Test Project 2', '2013-10-29', '2014-01-13', 132, '12390.00', 21),
(15, 'Project 3', '2013-10-29', '2013-12-17', 15, '3000.00', 21);

-- --------------------------------------------------------

--
-- Table structure for table `sprint`
--

CREATE TABLE IF NOT EXISTS `sprint` (
  `SprintID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `InitialStoryPoints` int(11) NOT NULL,
  `Locked` int(11) NOT NULL,
  PRIMARY KEY (`SprintID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sprint`
--

INSERT INTO `sprint` (`SprintID`, `ProjectID`, `Name`, `StartDate`, `EndDate`, `InitialStoryPoints`, `Locked`) VALUES
(1, 15, 'Version 1.0', '2013-10-28', '2013-11-08', 0, 0),
(2, 13, 'Version 2.0', '2013-10-29', '2013-10-31', 0, 0);

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
  `SprintID` int(11) NOT NULL,
  PRIMARY KEY (`StoryID`),
  UNIQUE KEY `StoryID` (`StoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`StoryID`, `EpicID`, `EmployeeID`, `Name`, `Description`, `PlannedDays`, `WorkedDays`, `RemainingDays`, `StoryPoints`, `SprintID`) VALUES
(1, 1, 4, 'What the Fork', 'I hope this will be a good Story', 12, 1, 11, 5, 0),
(2, 1, 1, 'Rhis should be fixed', 'I hope this will be another good Story', 13, 0, 13, 6, 0),
(3, 1, 3, 'Test2', 'Hope this works', 13, 12, 10, 5, 0),
(4, 2, 5, 'This is another test', 'this is amazing', 12, 1, 11, 4, 0),
(5, 3, 5, 'New story', 'Do stuff', 1, 0, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `WorkID` int(11) NOT NULL AUTO_INCREMENT,
  `SprintID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `HoursWorks` int(11) NOT NULL,
  PRIMARY KEY (`WorkID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
