-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2013 at 05:47 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `danlain_live`
--
DROP DATABASE `danlain_live`;

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
(1, 'Rename Me', '21 Jump Street', 'Lost', 'TX', '76666', '890-555-3421', '890-555-3421', 'Sally Smith');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Phone`, `Fax`, `FirstName`, `LastName`, `Address`, `City`, `State`, `Zip`, `Email`, `Salary`, `CompanyID`, `ProjectID`, `Developer`, `Manager`, `Architect`) VALUES
(1, '817-308-2582', '', 'Dan', 'Lain', '1003 Cooper Square Circle', 'Arlington', 'Te', '76013', 'danlain@live.com', '0.00', 1, 16, 0, 0, 0),
(22, '8173082582', '', 'Gary', 'Johns', '1003 Cooper Square Circle', 'Arlington', 'Te', '76013', 'gary@live.com', '0.00', 0, 16, 1, 0, 0),
(23, '8173082582', '', 'Jose', 'Flores', '1003 Cooper Square Circle', 'Arlington', 'Te', '76013', 'joflo@live.com', '0.00', 0, 16, 1, 0, 0),
(21, '', '', 'Dan', 'Lain', '', '', '', '', 'daniel.lain@mavs.uta.edu', '0.00', 0, 1, 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `epic`
--

INSERT INTO `epic` (`EpicID`, `ProjectID`, `Name`, `Description`) VALUES
(4, 16, 'Inception', 'Project Concept and Planning'),
(5, 16, 'Database Design', 'Design database system and structure'),
(6, 16, 'Rough Interface', 'Create baic interface'),
(7, 16, 'User Creation', 'Develop User creation Module'),
(8, 16, 'Login', 'Users will need to login'),
(9, 16, 'Role Creation', 'Role definition'),
(10, 16, 'User Management', 'Users will need to be managed and updated'),
(11, 16, 'Company Properties', 'Administrator will need to manage the company'),
(12, 16, 'Iteration 1 Feed Back', 'Review and disposition feedback'),
(13, 16, 'Project Creation', 'Users will need to create projects'),
(14, 16, 'Project Management', 'Users will need to manage projects'),
(15, 16, 'Epic Creation', 'Users will need to create epics'),
(16, 16, 'Epic Creation', 'Users will need to manage epics'),
(17, 16, 'Story Creation', 'Users will need to create stories'),
(18, 16, 'Story Management', 'Users will need to create manage Stories'),
(19, 16, 'Sprint Creation', 'Users will need to create sprints'),
(20, 16, 'Work Recording', 'Users will need to record work'),
(21, 16, 'Work Management', 'Uesrs will need to manage work'),
(22, 16, 'Review Feedback', 'Review iteration feedback'),
(23, 16, 'Sprint Story creation', 'Users will need to create sprint stories'),
(24, 16, 'Sprint Story Management', 'Users will need to manage sprint stories'),
(25, 16, 'Gantt Module', 'Users will need reports'),
(26, 16, 'Populate Project', 'Enter the project for testing'),
(27, 16, 'Testing', 'Test system'),
(28, 16, 'Kill bugs', 'Kill the bugs'),
(29, 16, 'Prepare Presentation', 'Prepare final presentation');

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
(23, 'joflo@live.com', 'damn', 0, 0),
(21, 'daniel.lain@mavs.uta.edu', 'damn', 0, 0),
(22, 'gary@live.com', 'damn', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`, `TargetStartDate`, `TargetEndDate`, `BudgetDays`, `BudgetCurancy`, `Manager`) VALUES
(16, 'CSE 4322 Project Man', '2013-09-09', '2013-12-04', 105, '0.00', 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sprint`
--

INSERT INTO `sprint` (`SprintID`, `ProjectID`, `Name`, `StartDate`, `EndDate`, `InitialStoryPoints`, `Locked`) VALUES
(3, 16, 'Iteration 1', '2013-09-09', '2013-10-07', 36, 1),
(4, 16, 'Iteration 2', '2013-10-07', '2013-10-28', 32, 1),
(5, 16, 'Iteration 3', '2013-10-28', '2013-11-18', 31, 1),
(6, 16, 'Final Iteration', '2013-11-18', '2013-12-02', 11, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`StoryID`, `EpicID`, `EmployeeID`, `Name`, `Description`, `PlannedDays`, `WorkedDays`, `RemainingDays`, `StoryPoints`, `SprintID`) VALUES
(6, 4, 22, 'Inception', 'Project Concept and Planning', 2, 2, 0, 2, 3),
(8, 4, 1, 'Develop Plan', 'Create Project Plan', 2, 2, 0, 3, 3),
(9, 4, 1, 'System Diagram', 'Develop Overall Design', 1, 1, 0, 2, 3),
(10, 5, 1, 'UML Design', 'Create ER Diagram', 1, 1, 0, 2, 3),
(11, 5, 1, 'Implemetation', 'Implement Database structure', 4, 4, 0, 4, 3),
(12, 5, 1, 'Create Scripts', 'Create SQL Scripts ', 1, 1, 0, 2, 3),
(13, 6, 23, 'Design Interface', 'Design initial interface', 2, 2, 0, 2, 3),
(14, 6, 23, 'Implement Interface', 'Implement Rough design prototype', 2, 2, 0, 3, 3),
(15, 7, 22, 'Design User Creation', 'Create User creation Design', 1, 1, 0, 1, 3),
(16, 7, 22, 'Impolement User Creation', 'implement the user creation Module', 3, 3, 0, 3, 3),
(17, 8, 22, 'Design login ', 'Design login module', 1, 1, 0, 1, 3),
(18, 8, 22, 'Login Implementation', 'Implement login module', 2, 2, 0, 2, 3),
(19, 9, 1, 'Design Role Module', 'Design Role solution', 1, 1, 0, 1, 3),
(20, 9, 1, 'Role Implemetation', 'Implement the role module', 3, 3, 0, 2, 3),
(21, 10, 22, 'Design User management', 'Design user management module', 1, 1, 0, 1, 3),
(22, 10, 22, 'User Management Umplementation', 'Implement User Management module', 2, 2, 0, 2, 3),
(23, 11, 23, 'Design Company Properties', 'Design company properties module', 1, 1, 0, 1, 3),
(24, 11, 23, 'Implement Company Properties', 'Implement company properties module', 2, 2, 0, 2, 3),
(25, 12, 1, 'Review Feedback', 'Read and discuss feedback', 2, 2, 0, 1, 4),
(26, 12, 22, 'Implement Feedback', 'Implement feedback review changes', 1, 1, 0, 1, 4),
(27, 13, 22, 'Project Creation', 'Users will need to create projects', 1, 1, 0, 1, 4),
(28, 13, 22, 'Project Creation', 'Users will need to create projects', 3, 4, 0, 2, 4),
(29, 14, 22, 'Design Projec management', 'Design project management module', 1, 1, 0, 1, 4),
(30, 14, 22, 'Project Management Implementation', 'Implement project management module', 1, 1, 0, 2, 4),
(31, 15, 1, 'Design Epic creation', 'Design Epic Creation module', 1, 1, 0, 1, 4),
(32, 15, 1, 'Implement Epic Creation', 'Implement epic creation module', 2, 2, 0, 2, 4),
(33, 16, 1, 'Design Epic Management', 'Design Epic management module', 2, 1, 0, 2, 4),
(34, 16, 1, 'Implement Epic Management', 'Implement epic management Module', 1, 1, 0, 2, 4),
(35, 17, 1, 'Design Story Creation', 'Design story creation module', 1, 1, 0, 2, 4),
(36, 17, 1, 'Implement Story Creation', 'Implement story creation module', 2, 3, 0, 2, 4),
(37, 18, 1, 'Design Story Management', 'Design story management ', 2, 1, 0, 2, 4),
(38, 18, 1, 'Implement Story Management', 'Implement story management module', 1, 1, 0, 1, 4),
(39, 19, 23, 'Design Sprint Creation', 'Design sprint creation module', 1, 1, 0, 1, 4),
(40, 19, 23, 'Implemet Sprint Creation', 'Implement sprint creation module', 2, 2, 0, 3, 4),
(41, 20, 23, 'Design Work Recording', 'Design the work recording', 1, 1, 0, 1, 4),
(42, 20, 23, 'Implement Work Recording', 'Implement work recording module', 2, 2, 0, 2, 4),
(43, 21, 23, 'Design Work Management', 'Design work management module', 1, 1, 0, 1, 5),
(44, 21, 23, 'Implement  Work Management', 'Implement work management module', 1, 1, 0, 2, 5),
(45, 22, 1, 'Disscuss Feedbac', 'Discuss and disposition Feedback', 2, 2, 0, 1, 5),
(46, 22, 1, 'Implement Feedback', 'Implement decided feedback', 2, 2, 0, 1, 5),
(47, 23, 1, 'Design Sprint Story Creation', 'Design the sprint stpry module', 2, 2, 0, 3, 5),
(48, 23, 1, 'Implement Sprint Story creation', 'Implement sprint story module', 2, 2, 0, 3, 5),
(49, 24, 1, 'Design Sprint Story Management', 'Design sprint story management', 2, 2, 0, 3, 5),
(50, 24, 1, 'Implement Sprint Story Management', 'Implement sprint story management module', 2, 2, 0, 3, 5),
(51, 25, 1, 'Design Gantt Chart', 'Design Gantt chart module', 2, 2, 0, 4, 5),
(52, 25, 1, 'Gantt Module', 'Users will need reports', 15, 12, 0, 5, 5),
(53, 25, 1, 'Build Visualization', 'Build the visual representation of Gantt', 15, 12, 0, 5, 5),
(54, 26, 1, 'Enter Users', 'Enter team members', 1, 1, 0, 1, 6),
(55, 26, 1, 'Enter Epics', 'Enter the project epic', 1, 1, 0, 1, 6),
(56, 26, 1, 'Enter Sprints', 'enter the sprints for each iteration', 1, 1, 0, 1, 6),
(57, 26, 1, 'Enter stories', 'Enter the project stories', 1, 1, 0, 1, 6),
(58, 26, 1, 'Enter project', 'enter teh projetc information', 1, 1, 0, 1, 6),
(59, 27, 1, 'Use system ', 'Use system to locate bugs', 2, 2, 0, 1, 6),
(60, 28, 23, 'Sprint Stoy points not recording', 'Sprint story points not updating correctly', 1, 0, 1, 1, 6),
(61, 28, 23, 'Company name not displaying', 'Company name not dynamic on all pages', 1, 0, 1, 1, 6),
(62, 28, 23, 'Project Slider is not meaningful', 'Remove project slider form project', 1, 0, 1, 1, 6),
(63, 29, 22, 'Develop presentation', 'Create final presentation ', 2, 0, 2, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `WorkID` int(11) NOT NULL AUTO_INCREMENT,
  `SprintID` int(11) NOT NULL,
  `StroyID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `HoursWorks` int(11) NOT NULL,
  PRIMARY KEY (`WorkID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
