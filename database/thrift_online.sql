-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 11:10 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thrift_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `account type`
--

CREATE TABLE IF NOT EXISTS `account type` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Margin` decimal(11,3) DEFAULT NULL,
  `Margin Type` varchar(50) DEFAULT NULL,
  `Effect` varchar(50) DEFAULT NULL,
  `Interest Rate` decimal(11,3) DEFAULT NULL,
  `Rate Mode` decimal(11,3) DEFAULT NULL,
  `Minimum Deposit` decimal(11,3) DEFAULT NULL,
  `Remark` varchar(150) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account type`
--

INSERT INTO `account type` (`ID`, `Type`, `Margin`, `Margin Type`, `Effect`, `Interest Rate`, `Rate Mode`, `Minimum Deposit`, `Remark`, `Company`) VALUES
(1, 'Savings', 0.000, '', '', 0.000, 0.000, 0.000, 'None', 'Demo'),
(2, 'Current', 0.005, 'COT', 'Deduction', 0.000, 0.000, 0.000, '', 'Demo'),
(3, 'Investment', 0.005, 'COT', 'Deduction', 3.000, 0.000, 0.000, 'xxx', 'Demo'),
(4, 'Fixed Deposit', NULL, '1 Month', NULL, 17.500, NULL, NULL, NULL, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE IF NOT EXISTS `advances` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Classification` varchar(70) DEFAULT NULL,
  `Particulars` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Recipient` varchar(50) DEFAULT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Paid` varchar(50) DEFAULT NULL,
  `Remark` text,
  `MDA` varchar(70) DEFAULT NULL,
  `Spent` decimal(11,2) DEFAULT NULL,
  `Balance` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advances`
--

INSERT INTO `advances` (`ID`, `Type`, `Date`, `Classification`, `Particulars`, `Amount`, `Source`, `Branch`, `Recipient`, `Account`, `Bank`, `Paid`, `Remark`, `MDA`, `Spent`, `Balance`, `Company`) VALUES
(7, 'Advance', '2018-12-07', 'PERSONNEL COST', 'staff travels', 450000.00, 'Cash', NULL, 'Ade', '6788', 'CASH', 'Unpaid', 'test', 'Office of the Accountant General', 56666.00, 0.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
  `ID` bigint(11) NOT NULL,
  `Agent` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`ID`, `Agent`, `Phone`, `email`, `Company`) VALUES
(2, 'xx', NULL, NULL, 'Demo'),
(3, 'Ola', '08139752330', 'dejigegs@gmail.com', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE IF NOT EXISTS `allowances` (
  `AllowanceID` varchar(5) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Percent` decimal(10,2) DEFAULT NULL,
  `SortOrder` int(11) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Grade Level` varchar(50) DEFAULT NULL,
  `Step` varchar(50) DEFAULT NULL,
  `Typ` varchar(50) DEFAULT NULL,
  `Show` varchar(15) DEFAULT 'Show',
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `allowance types`
--

CREATE TABLE IF NOT EXISTS `allowance types` (
  `AllowanceID` int(11) NOT NULL DEFAULT '0',
  `Description` varchar(50) DEFAULT NULL,
  `Not in use` tinyint(1) DEFAULT NULL,
  `SortOrder` int(11) DEFAULT NULL,
  `Type` char(10) DEFAULT NULL,
  `Group` char(10) DEFAULT NULL,
  `company` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE IF NOT EXISTS `analysis` (
  `ID` bigint(11) NOT NULL,
  `iclass` varchar(50) DEFAULT NULL,
  `idetails` varchar(100) DEFAULT NULL,
  `idate` date DEFAULT NULL,
  `iamount` decimal(13,2) DEFAULT NULL,
  `eclass` varchar(50) DEFAULT NULL,
  `edetails` varchar(100) DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `eamount` decimal(13,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`ID`, `iclass`, `idetails`, `idate`, `iamount`, `eclass`, `edetails`, `edate`, `eamount`, `Company`) VALUES
(6, 'Loan Application Fee', 'Loan Application Fee', '2019-12-18', 1.00, '-', '-', '0000-00-00', 0.00, 'Demo'),
(7, 'Loan Processing Fee', 'Loan Processing Fee', '2019-12-18', 1.00, '-', '-', '0000-00-00', 0.00, 'Demo'),
(8, 'Loan Insurance Fee', 'Loan Insurance Fee', '2019-12-18', 1.00, '-', '-', '0000-00-00', 0.00, 'Demo'),
(9, 'Loan Application Fee', 'Loan Application Fee', '2020-02-19', 100.00, '-', '-', '0000-00-00', 0.00, 'Demo'),
(10, 'Loan Processing Fee', 'Loan Processing Fee', '2020-02-19', 100.00, '-', '-', '0000-00-00', 0.00, 'Demo'),
(11, 'Passbook Charge', 'Passbook Charge', '2020-02-28', 500.00, '-', '-', '0000-00-00', 0.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `AppointmentID` int(11) NOT NULL DEFAULT '0',
  `Staff Number` varchar(30) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Terminate` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE IF NOT EXISTS `appraisal` (
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `Reference` varchar(50) NOT NULL DEFAULT '',
  `Period` varchar(50) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `ID` bigint(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `id` bigint(11) NOT NULL,
  `Staff Number` varchar(50) DEFAULT NULL,
  `Assessment Date` date DEFAULT NULL,
  `Remarks` varchar(250) DEFAULT NULL,
  `Recommendations` varchar(250) DEFAULT NULL,
  `HCP Code` varchar(50) DEFAULT NULL,
  `Consultant` bigint(11) DEFAULT NULL,
  `Medical Officer` bigint(11) DEFAULT NULL,
  `RNM` bigint(11) DEFAULT NULL,
  `RN` bigint(11) DEFAULT NULL,
  `Auxilliary Nurse` bigint(11) DEFAULT NULL,
  `CHO` bigint(11) DEFAULT NULL,
  `Lab Scientist` bigint(11) DEFAULT NULL,
  `Physiotherapist` bigint(11) DEFAULT NULL,
  `Radiographer` bigint(11) DEFAULT NULL,
  `Pharmacist` bigint(11) DEFAULT NULL,
  `General Environment` varchar(50) DEFAULT NULL,
  `Reception` varchar(50) DEFAULT NULL,
  `Ward` varchar(50) DEFAULT NULL,
  `No of bed` varchar(50) DEFAULT NULL,
  `Theatre` varchar(50) NOT NULL,
  `Laboratory` varchar(50) DEFAULT NULL,
  `Pharmacy` varchar(50) DEFAULT NULL,
  `Blood Bank` varchar(50) DEFAULT NULL,
  `Mortuary` varchar(50) DEFAULT NULL,
  `Ambulance` varchar(50) DEFAULT NULL,
  `Kitchen` varchar(50) DEFAULT NULL,
  `Laundary` varchar(50) DEFAULT NULL,
  `xray` varchar(50) DEFAULT NULL,
  `uss` varchar(50) DEFAULT NULL,
  `ct scan` varchar(50) DEFAULT NULL,
  `mri` varchar(50) DEFAULT NULL,
  `water supply` varchar(50) DEFAULT NULL,
  `waste disposal` varchar(50) DEFAULT NULL,
  `power supply` varchar(50) DEFAULT NULL,
  `delivery room` varchar(50) DEFAULT NULL,
  `dialysis` varchar(50) DEFAULT NULL,
  `Patient Referred` bigint(11) DEFAULT NULL,
  `Private Enrollee` bigint(11) DEFAULT NULL,
  `NPatient Treated` bigint(11) DEFAULT NULL,
  `PPatient Treated` bigint(11) DEFAULT NULL,
  `Month1` varchar(50) DEFAULT NULL,
  `No Month1` bigint(11) DEFAULT NULL,
  `Month2` varchar(50) DEFAULT NULL,
  `No Month2` bigint(11) DEFAULT NULL,
  `Month3` varchar(50) DEFAULT NULL,
  `No Month3` bigint(11) DEFAULT NULL,
  `Capitalized` tinyint(1) DEFAULT NULL,
  `Month11` varchar(50) DEFAULT NULL,
  `No Month11` bigint(11) DEFAULT NULL,
  `NMAmount11` decimal(11,2) DEFAULT NULL,
  `Month22` varchar(50) DEFAULT NULL,
  `No Month22` bigint(11) DEFAULT NULL,
  `NMAmount22` decimal(11,2) DEFAULT NULL,
  `Month33` varchar(50) DEFAULT NULL,
  `No Month33` bigint(11) DEFAULT NULL,
  `NMAmount33` decimal(11,2) DEFAULT NULL,
  `Total Enrollee` bigint(11) DEFAULT NULL,
  `Capitation Reason` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset category`
--

CREATE TABLE IF NOT EXISTS `asset category` (
  `ID` bigint(11) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset category`
--

INSERT INTO `asset category` (`ID`, `Category`, `Company`) VALUES
(1, 'Motor Vehicle', 'Demo'),
(2, 'Furniture', 'Demo'),
(4, 'Water', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `ID` bigint(11) NOT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Make` varchar(50) DEFAULT NULL,
  `Quantity` bigint(11) DEFAULT NULL,
  `Date Acquired` date DEFAULT NULL,
  `Date Sold` date DEFAULT NULL,
  `Purchase Price` decimal(13,2) DEFAULT NULL,
  `Current Value` decimal(13,2) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Serial No` varchar(50) DEFAULT NULL,
  `Next Maintenance` date DEFAULT NULL,
  `Comment` varchar(200) DEFAULT NULL,
  `Sold` tinyint(1) DEFAULT '0',
  `Amount Sold` decimal(13,2) DEFAULT NULL,
  `Depreciation` decimal(13,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`ID`, `Code`, `Location`, `Category`, `Name`, `Description`, `Make`, `Quantity`, `Date Acquired`, `Date Sold`, `Purchase Price`, `Current Value`, `Status`, `Serial No`, `Next Maintenance`, `Comment`, `Sold`, `Amount Sold`, `Depreciation`, `Company`) VALUES
(1, 'mt/vh/001/ab', 'Abuja', 'Vehicle', 'Van', 'Condo Van', 'Toyota', 1, '2007-12-12', '0000-00-00', 3000000.00, 2000000.00, 'Good', '1245667fgghh778', '0000-00-00', '', 0, 0.00, 700000.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `asset status`
--

CREATE TABLE IF NOT EXISTS `asset status` (
  `ID` bigint(11) NOT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset status`
--

INSERT INTO `asset status` (`ID`, `Status`, `Company`) VALUES
(1, 'Good', 'Demo'),
(2, 'Obsolete', 'Demo'),
(3, 'Serviceable', 'Demo'),
(4, 'Unserviceable', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `ID` bigint(11) NOT NULL,
  `Membership No` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Attendance` varchar(50) DEFAULT NULL,
  `Note` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `ID` bigint(11) NOT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID`, `Bank`, `Company`) VALUES
(1, 'UBA', 'Demo'),
(2, 'Zenith', 'Demo'),
(3, 'First Bank', 'Demo'),
(4, 'Access Bank', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `booln`
--

CREATE TABLE IF NOT EXISTS `booln` (
  `val` bigint(11) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booln`
--

INSERT INTO `booln` (`val`, `type`) VALUES
(0, 'No'),
(1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `ID` bigint(11) NOT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Branch Code` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `Branch`, `Branch Code`, `Company`) VALUES
(1, 'Abuja', '013', ''),
(2, 'Lagos', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Month` date DEFAULT NULL,
  `Classification` varchar(50) DEFAULT NULL,
  `Budget` decimal(13,2) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `MDA` varchar(50) DEFAULT NULL,
  `Description` text,
  `Initial Amount` decimal(11,2) DEFAULT NULL,
  `Review Amount` decimal(11,2) DEFAULT NULL,
  `Review Reason` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`ID`, `Type`, `Month`, `Classification`, `Budget`, `Year`, `MDA`, `Description`, `Initial Amount`, `Review Amount`, `Review Reason`, `Company`) VALUES
(1, 'Expenditure', '2009-01-31', 'Transportation', 40000.00, 2018, 'Office of the Accountant General', 'gfjhgj', 30000.00, 40000.00, 'test', 'Demo'),
(2, 'Asset', NULL, 'CURRENT ASSETS', 56000000.00, 2018, 'Office of the Accountant General', 'tester', NULL, NULL, NULL, 'Demo'),
(3, 'Expenditure', NULL, 'SALARIES AND WAGES', 16000000.00, 2018, 'FCDA', 'fcda sallaries', NULL, NULL, NULL, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `From Date` date DEFAULT NULL,
  `To Date` date DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `From Location` varchar(50) DEFAULT NULL,
  `To Command` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Refrence` varchar(50) DEFAULT NULL,
  `Staff Number` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Classification` varchar(70) DEFAULT NULL,
  `Particulars` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Recipient` varchar(50) DEFAULT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Paid` varchar(50) DEFAULT NULL,
  `Remark` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`ID`, `Type`, `Date`, `Classification`, `Particulars`, `Amount`, `Source`, `Branch`, `Recipient`, `Account`, `Bank`, `Paid`, `Remark`, `Company`) VALUES
(1, 'Expense', '2018-11-10', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000131', 40000.00, '', NULL, '', '000131', '', 'Paid', NULL, 'Demo'),
(3, 'Income', '2018-11-10', 'Loan Collection Expenses', 'Periodic payback on loan for 000131', 15733.33, '', NULL, '', '000131', '', '', NULL, 'Demo'),
(4, 'Income', '2018-11-10', 'Loan Collection Expenses', 'Periodic payback on loan for 000131', 24266.67, '', NULL, '', '000131', '', '', NULL, 'Demo'),
(5, 'Income', '2018-12-03', 'Customers Deposit', 'Customers Deposit for 000131', 10000.00, 'Deposit', NULL, '', '000131', '', '', NULL, 'Demo'),
(6, 'Income', '2018-12-03', 'Customers Deposit', 'Customers Deposit for 000131', 15000.00, 'Deposit', NULL, '', '000131', '', '', NULL, 'Demo'),
(7, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(8, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.50, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(9, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(10, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.50, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(11, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(12, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.50, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(13, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 6000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(14, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.30, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(15, 'Income', '2018-12-03', 'Loan Collection Expenses', 'Periodic payback on loan for 000131', 100.00, '', NULL, '', '000131', '', '', NULL, 'Demo'),
(16, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 1000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(17, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.05, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(18, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(19, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.50, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(20, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(21, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.50, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(22, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(23, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.50, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(24, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(25, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(26, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(27, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(28, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 10.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(29, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(30, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 100.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(31, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.01, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(32, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 100.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(33, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.01, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(34, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 100.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(35, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.01, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(36, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 100.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(37, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.01, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(38, 'Expense', '2018-12-03', 'Accounts Payable', 'Customers cash withdrawal for 000131', 1000.00, 'Withdrawal', NULL, '', '000131', '', '', NULL, 'Demo'),
(39, 'Income', '2018-12-03', 'Other Charges', 'COT', 0.05, NULL, NULL, NULL, NULL, NULL, NULL, '000131', 'Demo'),
(40, 'Income', '2018-12-03', 'Loan Collection Expenses', 'Periodic payback on loan for 000131', 1000.00, '', NULL, '', '000131', '', '', NULL, 'Demo'),
(41, 'Expense', '2019-12-18', 'Other Short-term Clients Loans', 'Trading Loan to Customer 100', 60000.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(42, 'Income', '2019-12-19', 'Loan Collection Expenses', 'Loan Repayment by Customer 100', 9600.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(43, 'Income', '2020-02-05', 'Customers Deposit', 'Customers Deposit for 000131', 1000.00, 'Contribution', NULL, '', '000131', '', '', NULL, 'Demo'),
(44, 'Expense', '2020-02-18', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000130', 50000.00, '', NULL, '', '000130', '', 'Paid', NULL, 'Demo'),
(45, 'Expense', '2020-02-19', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000130', 50000.00, '', NULL, '', '000130', '', 'Paid', NULL, 'Demo'),
(46, 'Income', '2020-02-19', 'Loan Collection Expenses', 'Periodic payback on loan for 000130', 8000.00, '', NULL, '', '000130', '', '', NULL, 'Demo'),
(47, 'Expense', '2020-02-19', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000130', 100000.00, '', NULL, '', '000130', '', 'Paid', NULL, 'Demo'),
(48, 'Expense', '2020-02-19', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000130', 10000.00, '', NULL, '', '000130', '', 'Paid', NULL, 'Demo'),
(49, 'Expense', '2020-02-19', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000130', 10000.00, '', NULL, '', '000130', '', 'Paid', NULL, 'Demo'),
(50, 'Expense', '2020-02-20', 'Other Short-term Clients Loans', 'Trading Loan to Customer 000130', 10000.00, '', NULL, '', '000130', '', 'Paid', NULL, 'Demo'),
(51, 'Expense', '2020-02-20', 'Other Short-term Clients Loans', 'Esusu Normal to Customer 100', 5000.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(52, 'Income', '2020-02-27', 'Customers Deposit', 'Customers Deposit for 000130', 100000.00, 'Deposit', NULL, '', '000130', '', '', NULL, 'Demo'),
(53, 'Income', '2020-02-28', 'Customers Deposit', 'Customers Deposit for 000133', 5000.00, 'Deposit', NULL, '', '000133', '', '', NULL, 'Demo'),
(54, 'Income', '2020-03-29', 'Loan Collection Expenses', 'Loan Repayment by Customer 000131', 15733.33, '', NULL, '', '000131', '', 'Paid', NULL, 'Demo'),
(55, 'Expense', '2020-03-31', 'Other Short-term Clients Loans', 'Trading Loan to Customer 100', 12400.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(56, 'Expense', '2020-03-31', 'Other Short-term Clients Loans', 'Trading Loan to Customer 100', 12400.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(57, 'Expense', '2020-03-31', 'Other Short-term Clients Loans', 'Trading Loan to Customer 100', 12400.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(58, 'Expense', '2020-04-01', 'Other Short-term Clients Loans', 'Trading Loan to Customer 100', 39000.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(59, 'Expense', '2020-04-01', 'Other Short-term Clients Loans', 'Trading Loan to Customer 100', 39000.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(60, 'Income', '2020-04-01', 'Loan Collection Expenses', 'Loan Repayment by Customer 100', 15450.00, '', NULL, '', '100', '', 'Paid', NULL, 'Demo'),
(61, 'Income', '2020-05-30', 'Customers Deposit', 'Customers Deposit for 100', 1000.00, 'Contribution', NULL, '', '100', '', '', NULL, 'Demo'),
(62, 'Income', '2020-05-30', 'Other Charges', 'SMS Alert Charges', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '100', 'Demo'),
(63, 'Income', '2020-06-03', 'Customers Deposit', 'Customers Deposit for 0000013230', 1000.00, 'Deposit', NULL, '', '0000013230', '', '', NULL, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` bigint(11) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Category`, `Company`) VALUES
(1, 'Administrative Expenses', 'Demo'),
(3, 'Current Assets', 'Demo'),
(4, 'Fixed Assets', 'Demo'),
(5, 'Turnover', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `Certificate` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `CertID` int(11) NOT NULL,
  `Organization` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE IF NOT EXISTS `cheque` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Cheque No` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Particulars` varchar(150) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE IF NOT EXISTS `children` (
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `Name` varchar(50) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `DoB` varchar(20) DEFAULT NULL,
  `Child_ID` int(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cms_access_levels`
--

CREATE TABLE IF NOT EXISTS `cms_access_levels` (
  `access_lvl` bigint(11) NOT NULL,
  `access_name` varchar(50) DEFAULT NULL,
  `Remark` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_access_levels`
--

INSERT INTO `cms_access_levels` (`access_lvl`, `access_name`, `Remark`) VALUES
(1, 'Cashier', 'Accesses Transations Only'),
(2, 'Customer Service', 'Accesses Customer Details, Accounts Opening and Re'),
(4, 'Manager', 'Accesses Everything except admin center'),
(5, 'Administrator', 'Accesses All'),
(3, 'Account', 'Accounts, Reports and Loans'),
(6, 'Loan Officer', 'Loans and Leases'),
(7, 'Agent', 'Contributions');

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE IF NOT EXISTS `command` (
  `ID` bigint(11) NOT NULL,
  `Command` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company info`
--

CREATE TABLE IF NOT EXISTS `company info` (
  `ID` bigint(11) NOT NULL,
  `Company Name` varchar(100) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Website` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `regdate` date NOT NULL,
  `duedate` date NOT NULL,
  `Paid` tinyint(1) NOT NULL,
  `InitialDueDate` date NOT NULL,
  `FirstRegDate` date NOT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company info`
--

INSERT INTO `company info` (`ID`, `Company Name`, `Address`, `Email`, `Website`, `Phone`, `City`, `Country`, `regdate`, `duedate`, `Paid`, `InitialDueDate`, `FirstRegDate`, `Type`) VALUES
(1, 'Demo', 'Address home', 'infoc@waltergates.com', NULL, 'Phone', 'http://www.waltergates.com', 'Nigeria', '0000-00-00', '2029-11-01', 1, '0000-00-00', '0000-00-00', NULL),
(4, 'WG', 'testing lane', 'dejigegs@gmail.com', 'http://waltergates.com/hmo', '90000', 'IB', 'Nigeria', '2020-11-20', '2020-12-10', 0, '2020-12-08', '2020-11-08', 'Basic Plan'),
(6, 'Benone Farms', NULL, 'info@waltergates.com', NULL, '0990566788', 'Lagos', NULL, '2020-12-08', '2021-01-07', 3, '2021-01-07', '2020-12-08', '30 Days Free Trial'),
(8, 'Waltergates Cooperatives', '3 Osuntokun Ave. Ojodu', 'coop@waltergates.com', 'www.waltergates.com', '07060856898', 'Lagos', 'Nigeria', '2021-08-26', '2021-09-25', 3, '2021-09-25', '2021-08-26', '30 Days Free Trial');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `ID` bigint(11) NOT NULL,
  `Contractor` varchar(50) DEFAULT NULL,
  `Contract Date` date DEFAULT NULL,
  `Contract Title` varchar(50) DEFAULT NULL,
  `Contract Category` varchar(50) DEFAULT NULL,
  `Paid` varchar(20) DEFAULT NULL,
  `Amount` decimal(11,2) DEFAULT NULL,
  `Amount Paid` decimal(11,2) DEFAULT NULL,
  `Contact` varchar(50) DEFAULT NULL,
  `Contract Status` varchar(25) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Remark` varchar(50) DEFAULT NULL,
  `Contact Phone` varchar(20) DEFAULT NULL,
  `Contractor Address` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ID`, `Contractor`, `Contract Date`, `Contract Title`, `Contract Category`, `Paid`, `Amount`, `Amount Paid`, `Contact`, `Contract Status`, `Bank`, `Account`, `Remark`, `Contact Phone`, `Contractor Address`, `Company`) VALUES
(1, 'ade', '2009-02-09', 'HR Automation', 'ICT', 'Part Payme', 10000000.00, 3000000.00, '', 'In Progress', '', '', 'Approved', '', '', 'Demo'),
(2, 'me', '2014-11-11', 'Test', 'Supplies', 'Unpaid', 45000.00, 0.00, 'you', 'In Progress', '', '', '', '', '', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `ID` bigint(11) NOT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Agent` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Entered By` varchar(50) DEFAULT NULL,
  `Pay Mode` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`ID`, `Account Number`, `Surname`, `First Name`, `Amount`, `Agent`, `Date`, `Entered By`, `Pay Mode`, `Type`, `Company`) VALUES
(1, '100', 'tester', 'Oladetest', 333.00, 'xx', '2018-11-06', 'OLADETEST TESTER', 'Cash', NULL, 'Demo'),
(2, '000131', 'Eze', 'mike', 1000.00, 'OLA', '2020-02-05', 'OLA', 'Cash', NULL, 'Demo'),
(3, '100', 'tester', 'Oladetest', 1000.00, 'Ola', '2020-05-30', 'ADMIN', 'Cash', NULL, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `Course Title` varchar(70) DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `Course Offered by` varchar(50) DEFAULT NULL,
  `Course Cost` decimal(10,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creg_fees`
--

CREATE TABLE IF NOT EXISTS `creg_fees` (
  `ID` bigint(11) NOT NULL,
  `Fee` varchar(50) DEFAULT NULL,
  `Amount` decimal(11,2) DEFAULT NULL,
  `Account No` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creg_fees`
--

INSERT INTO `creg_fees` (`ID`, `Fee`, `Amount`, `Account No`) VALUES
(1, 'Application Fees', 1000.00, '12345678'),
(2, 'File Fees', 200.00, '12345678'),
(3, 'Insurance Fees', 1000.00, '12345678'),
(4, 'Guarantor Fees', 300.00, '12345678'),
(5, 'Ref fees', 1000.00, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `ID` bigint(11) NOT NULL,
  `Currency` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`ID`, `Currency`, `Company`) VALUES
(1, 'GHc100', 'Demo'),
(2, 'GHc50', 'Demo'),
(3, 'GHc20', 'Demo'),
(5, 'GHc10', 'Demo'),
(6, 'GHc5', 'Demo'),
(7, 'GHc1', 'Demo'),
(8, '50Ps', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `currency detail`
--

CREATE TABLE IF NOT EXISTS `currency detail` (
  `ID` bigint(11) NOT NULL,
  `TransID` bigint(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Note` varchar(50) DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Account No` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` bigint(11) NOT NULL,
  `Account Type` varchar(50) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Age` varchar(5) DEFAULT NULL,
  `Contact Number` varchar(20) DEFAULT NULL,
  `Marital Status` varchar(20) DEFAULT NULL,
  `Home Address` varchar(120) DEFAULT NULL,
  `Postal Address` varchar(120) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Office Address` varchar(120) DEFAULT NULL,
  `Next of Kin` varchar(50) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `NKin Contact` varchar(120) DEFAULT NULL,
  `Date Registered` date DEFAULT NULL,
  `Identification Type` varchar(50) DEFAULT NULL,
  `Identification Number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Employer` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `NK Phone` varchar(35) DEFAULT NULL,
  `Mobile Number` varchar(50) DEFAULT NULL,
  `Account Officer` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `Group` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Customer Category` varchar(50) DEFAULT NULL,
  `Group Name` varchar(50) DEFAULT NULL,
  `Name1` varchar(50) DEFAULT NULL,
  `Position1` varchar(50) DEFAULT NULL,
  `Contact Number1` varchar(50) DEFAULT NULL,
  `Mobile Number1` varchar(50) DEFAULT NULL,
  `Office Address1` varchar(150) DEFAULT NULL,
  `Home Address1` varchar(150) DEFAULT NULL,
  `Marital Status1` varchar(50) DEFAULT NULL,
  `Gender1` varchar(50) DEFAULT NULL,
  `Age1` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `Occupation1` varchar(50) DEFAULT NULL,
  `Employer1` varchar(50) DEFAULT NULL,
  `Next of Kin1` varchar(50) DEFAULT NULL,
  `Relationship1` varchar(50) DEFAULT NULL,
  `NKin Contact1` varchar(100) DEFAULT NULL,
  `Name2` varchar(50) DEFAULT NULL,
  `Position2` varchar(50) DEFAULT NULL,
  `Contact Number2` varchar(50) DEFAULT NULL,
  `Mobile Number2` varchar(50) DEFAULT NULL,
  `Office Address2` varchar(150) DEFAULT NULL,
  `Home Address2` varchar(150) DEFAULT NULL,
  `Marital Status2` varchar(50) DEFAULT NULL,
  `Gender2` varchar(50) DEFAULT NULL,
  `Age2` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `Occupation2` varchar(50) DEFAULT NULL,
  `Employer2` varchar(50) DEFAULT NULL,
  `Next of Kin2` varchar(50) DEFAULT NULL,
  `Relationship2` varchar(50) DEFAULT NULL,
  `NKin Contact2` varchar(100) DEFAULT NULL,
  `Name3` varchar(50) DEFAULT NULL,
  `Position3` varchar(50) DEFAULT NULL,
  `Contact Number3` varchar(50) DEFAULT NULL,
  `Mobile Number3` varchar(50) DEFAULT NULL,
  `Office Address3` varchar(150) DEFAULT NULL,
  `Home Address3` varchar(150) DEFAULT NULL,
  `Marital Status3` varchar(50) DEFAULT NULL,
  `Gender3` varchar(50) DEFAULT NULL,
  `Age3` varchar(50) DEFAULT NULL,
  `email3` varchar(50) DEFAULT NULL,
  `Occupation3` varchar(50) DEFAULT NULL,
  `Employer3` varchar(50) DEFAULT NULL,
  `Next of Kin3` varchar(50) DEFAULT NULL,
  `Relationship3` varchar(50) DEFAULT NULL,
  `NKin Contact3` varchar(100) DEFAULT NULL,
  `Closure Date` date DEFAULT NULL,
  `Closure Reason` varchar(100) DEFAULT NULL,
  `Sex` varchar(50) DEFAULT NULL,
  `Daily Contribution` decimal(11,2) DEFAULT NULL,
  `Date of Birth` date DEFAULT NULL,
  `Value at maturity` decimal(11,2) DEFAULT NULL,
  `Value of Premium` decimal(11,2) DEFAULT NULL,
  `Duration` varchar(20) DEFAULT NULL,
  `Due Date` date DEFAULT NULL,
  `SMS` tinyint(1) DEFAULT '1',
  `email alert` tinyint(1) DEFAULT '1',
  `BVN` varchar(20) DEFAULT NULL,
  `Registration Date` date DEFAULT NULL,
  `Contribution Charge` decimal(11,2) DEFAULT NULL,
  `Passbook Charge` decimal(11,2) DEFAULT NULL,
  `Bank Account Number` varchar(50) DEFAULT NULL,
  `Bank Name` varchar(50) DEFAULT NULL,
  `Bank Account Name` varchar(50) DEFAULT NULL,
  `ID Expiration` date DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Dependant` varchar(50) DEFAULT NULL,
  `How` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Account Type`, `Account Number`, `Surname`, `First Name`, `Gender`, `Age`, `Contact Number`, `Marital Status`, `Home Address`, `Postal Address`, `Occupation`, `Office Address`, `Next of Kin`, `Relationship`, `NKin Contact`, `Date Registered`, `Identification Type`, `Identification Number`, `email`, `Employer`, `Position`, `NK Phone`, `Mobile Number`, `Account Officer`, `Status`, `Officer`, `Group`, `Branch`, `Customer Category`, `Group Name`, `Name1`, `Position1`, `Contact Number1`, `Mobile Number1`, `Office Address1`, `Home Address1`, `Marital Status1`, `Gender1`, `Age1`, `email1`, `Occupation1`, `Employer1`, `Next of Kin1`, `Relationship1`, `NKin Contact1`, `Name2`, `Position2`, `Contact Number2`, `Mobile Number2`, `Office Address2`, `Home Address2`, `Marital Status2`, `Gender2`, `Age2`, `email2`, `Occupation2`, `Employer2`, `Next of Kin2`, `Relationship2`, `NKin Contact2`, `Name3`, `Position3`, `Contact Number3`, `Mobile Number3`, `Office Address3`, `Home Address3`, `Marital Status3`, `Gender3`, `Age3`, `email3`, `Occupation3`, `Employer3`, `Next of Kin3`, `Relationship3`, `NKin Contact3`, `Closure Date`, `Closure Reason`, `Sex`, `Daily Contribution`, `Date of Birth`, `Value at maturity`, `Value of Premium`, `Duration`, `Due Date`, `SMS`, `email alert`, `BVN`, `Registration Date`, `Contribution Charge`, `Passbook Charge`, `Bank Account Number`, `Bank Name`, `Bank Account Name`, `ID Expiration`, `State`, `Dependant`, `How`, `Company`) VALUES
(1, 'Current', '100', 'tester', 'Oladetest', 'Male', 'adult', '08176338506', 'Married', '', 'abuja', '', '', '', '', '', '2018-04-24', 'Drivers Licence', '1123', '', '', '', '', '08139572330', 'me', 'Active', '', '', 'Suame', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0.00, '2018-04-24', 0.00, 0.00, '', '0000-00-00', 1, 0, '666', '0000-00-00', 0.00, 0.00, '7777', 'gtb', 'ola', '0000-00-00', 'FCT-Abuja', '1', '', 'Demo'),
(2, 'Investment', '000131', 'Eze', 'mike', 'Male', 'adult', '08139752330', 'Married', '', '', '', '', '', '', '', '2018-11-07', 'Drivers Licence', '5689d999', 'dejigegs@gmail.com', '', '', '', '', 'Admin', 'Active', NULL, '', 'Abuja', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '1977-05-19', NULL, NULL, NULL, NULL, 1, 1, '', NULL, 0.00, 0.00, '89987777', 'Access Bank Plc', 'Ola zechariah Adewale', '0000-00-00', '', '3', '', 'Demo'),
(3, 'Savings', '000132', 'Suname', 'Mr X', 'Male', '70', '', 'Married', '', '', 'tester', '', '', '', '', '2018-11-08', 'Drivers Licence', 'vty777', 'gg', '', '', '', '', 'test', 'Active', NULL, 'Individual', 'Abuja', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 0, 0, '', NULL, 0.00, 0.00, '', '', '', '2018-11-23', '', '3', NULL, 'Demo'),
(4, 'Current', '000130', 'Nime', 'Deji', 'Male', '', '', '', '', '', '', '', '', '', '', '2018-11-21', '', '', '', '', '', '', '', '', 'Active', NULL, 'Individual', 'Lagos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '2018-11-21', NULL, NULL, NULL, NULL, 0, 0, '', NULL, 0.00, 0.00, '', '', '', '0000-00-00', '', '', '', 'Demo'),
(5, 'Current', '0000013130', 'nimert', 'Deji4', 'Male', '', '', '', '', '', '', '', '', '', '', '2018-11-21', '', '', '', '', '', '', '', '', 'Active', NULL, 'Individual', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '2018-11-21', NULL, NULL, NULL, NULL, 0, 0, '', NULL, 0.00, 0.00, '', '', '', '0000-00-00', '', '', '', 'Demo'),
(6, 'Savings', '0000013230', 'Ola', 'tester', 'Male', '', '', 'Single', '', '', 'tester', '', '', '', '', '2019-08-20', 'Drivers Licence', 'e33', 'ddejigegs@gmail.com', '', '', '', '', 'him', 'Active', NULL, 'Individual', 'Abuja', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, 0, 1, '444', NULL, 0.00, 0.00, '', '', '', '0000-00-00', 'Lagos', '0', '', 'Demo'),
(7, 'Savings', '000133', 'Esan', 'Emmanuel', 'Male', '', '08189990', 'Single', '', '', '', '', '', '', '', '2020-02-28', 'Drivers Licence', '90007', 'info@waltergates.com', '', '', '', '', 'tester', 'Active', NULL, 'Individual', 'Lagos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '1992-02-03', NULL, NULL, NULL, NULL, 0, 1, '', NULL, 0.00, 500.00, '', '', '', '0000-00-00', '', '1', 'Referred', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Dept ID` bigint(15) NOT NULL,
  `Dept` varchar(50) DEFAULT NULL,
  `DirID` varchar(15) DEFAULT NULL,
  `company` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `School` varchar(50) DEFAULT NULL,
  `From` varchar(50) DEFAULT NULL,
  `To` varchar(50) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `Course` varchar(50) DEFAULT NULL,
  `Place` varchar(50) DEFAULT NULL,
  `EduID` int(11) NOT NULL,
  `Organization` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE IF NOT EXISTS `employment_history` (
  `ID` bigint(11) NOT NULL,
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `Employer` varchar(50) DEFAULT NULL,
  `From` varchar(50) DEFAULT NULL,
  `To` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Address` text,
  `Reason` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equip type`
--

CREATE TABLE IF NOT EXISTS `equip type` (
  `ID` bigint(11) NOT NULL,
  `Equip Type` varchar(50) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equip type`
--

INSERT INTO `equip type` (`ID`, `Equip Type`, `Company`) VALUES
(1, 'Electronics', 'Demo'),
(2, 'Vehicle', 'Demo'),
(3, 'Household', 'Demo'),
(4, 'Equipment', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Rate` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`ID`, `Type`, `Rate`, `Company`) VALUES
(1, 'Tithe', 10.00, 'Demo'),
(2, 'VAT', 5.00, 'Demo'),
(3, 'Tax', 10.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `fixed deposit`
--

CREATE TABLE IF NOT EXISTS `fixed deposit` (
  `ID` bigint(11) NOT NULL,
  `Account Number` varchar(50) NOT NULL,
  `FID` bigint(11) DEFAULT NULL,
  `Tenor` varchar(50) NOT NULL,
  `Amount` decimal(11,2) NOT NULL,
  `Date` date NOT NULL,
  `Maturity Date` date NOT NULL,
  `Interest Rate` decimal(11,2) DEFAULT NULL,
  `Interest Amount` decimal(11,2) DEFAULT NULL,
  `Principal Liquidation` decimal(11,2) DEFAULT NULL,
  `Interest Payout` decimal(11,2) DEFAULT NULL,
  `Liquidation Date` date DEFAULT NULL,
  `Liquidation Charges` decimal(11,2) DEFAULT NULL,
  `WHT` decimal(11,2) DEFAULT NULL,
  `Other Charges` decimal(11,2) DEFAULT NULL,
  `Balance` decimal(11,2) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed deposit`
--

INSERT INTO `fixed deposit` (`ID`, `Account Number`, `FID`, `Tenor`, `Amount`, `Date`, `Maturity Date`, `Interest Rate`, `Interest Amount`, `Principal Liquidation`, `Interest Payout`, `Liquidation Date`, `Liquidation Charges`, `WHT`, `Other Charges`, `Balance`, `Name`, `Status`, `Company`) VALUES
(1, '100', 1, '1 Month', 100000.00, '2020-02-21', '2020-03-21', 17.50, 17500.00, 0.00, 0.00, '0000-00-00', 0.00, 175.00, 0.00, 100000.00, 'Oladetest tester', 'Active', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `grade level`
--

CREATE TABLE IF NOT EXISTS `grade level` (
  `GL` varchar(6) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `id` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade level`
--

INSERT INTO `grade level` (`GL`, `company`, `id`) VALUES
('03', '', 1),
('04', '', 2),
('05', '', 3),
('06', '', 4),
('07', '', 5),
('08', '', 6),
('09', '', 7),
('10', '', 8),
('11', '', 9),
('12', '', 10),
('13', '', 11),
('14', '', 12),
('15', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `ID` bigint(11) NOT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Group Name` varchar(50) DEFAULT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) NOT NULL,
  `Date of Birth` date NOT NULL,
  `Postal Address` text NOT NULL,
  `Contact Number` varchar(50) DEFAULT NULL,
  `Mobile Number` varchar(50) DEFAULT NULL,
  `Office Address` varchar(150) DEFAULT NULL,
  `Home Address` varchar(150) DEFAULT NULL,
  `Marital Status` varchar(12) DEFAULT NULL,
  `Gender` varchar(7) DEFAULT NULL,
  `Age` int(4) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Employer` varchar(50) DEFAULT NULL,
  `Next of Kin` varchar(50) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `NKin Contact` varchar(100) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `Account Number`, `Group Name`, `First Name`, `Position`, `Surname`, `Date of Birth`, `Postal Address`, `Contact Number`, `Mobile Number`, `Office Address`, `Home Address`, `Marital Status`, `Gender`, `Age`, `email`, `Occupation`, `Employer`, `Next of Kin`, `Relationship`, `NKin Contact`, `Company`) VALUES
(1, '01212345680', 'Odua', 'Ado Ibro', 'Treasurer', '', '0000-00-00', '', '125667778', '12345566', 'ewrew', 'dsgd', 'Married', 'Male', 56, 'rrttt', 'yuyu', 'yyuu', 'uuu', 'Family', '432', 'Demo'),
(2, '12345679', '', 'waheed', 'oga', '', '0000-00-00', '', '666', '777', 'xzzzz', 'hhsa', 'Married', 'Female', 56, 'none', 'shior', 'kosi', 'them', 'Family', '4444', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `heads`
--

CREATE TABLE IF NOT EXISTS `heads` (
  `ID` bigint(11) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `Remarks` varchar(150) DEFAULT NULL,
  `Category` varchar(60) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heads`
--

INSERT INTO `heads` (`ID`, `Description`, `Code`, `Remarks`, `Category`, `Company`) VALUES
(1, 'Interest Income on Loans to Clients', '101', '', 'Interest Income on Loans and Advances', 'Demo'),
(2, 'Interest Income on Loans to Non-Clients', '102', 'Interest Income on Loans to Non-MFI Clients ', 'Interest Income on Loans and Advances', 'Demo'),
(3, 'Interest Income from Balances', '111', '', 'Interest Income other than on Loans and Advances', 'Demo'),
(4, 'Interest Income from Accounts with Banks and other', '112', '', 'Interest Income other than on Loans and Advances', 'Demo'),
(5, 'Interest Income from Approved Investments', '113', '', 'Interest Income other than on Loans and Advances', 'Demo'),
(6, 'Other Interest Income', '119', '', 'Interest Income other than on Loans and Advances', 'Demo'),
(7, 'Client Fees Paid', '121', '', 'Fees and Charges', 'Demo'),
(8, 'Client Penalties', '122', '', 'Fees and Charges', 'Demo'),
(9, 'Fee from Payment services and Intra-country Transfers', '123', '', 'Fees and Charges', 'Demo'),
(10, 'Fee from Offering Insurance Products as Agent', '124', '', 'Fees and Charges', 'Demo'),
(11, 'Other Operating Income', '129', '', 'Fees and Charges', 'Demo'),
(12, 'Interest Income Expense on Clients Deposits', '201', '', 'Interest Income Expense', 'Demo'),
(13, 'Interest Income Expense on Clients Voluntary Savings', '202', '', 'Interest Income Expense', 'Demo'),
(14, 'Interest Income Expense on Deposits of Non-Clients', '203', '', 'Interest Income Expense', 'Demo'),
(15, 'Interest Income Expense on Deposits of Non-Clients', '204', '', 'Interest Income Expense', 'Demo'),
(16, 'Interest Income Expense on Short-term Loans', '205', '', 'Interest Income Expense', 'Demo'),
(17, 'Interest Income Expense on Long-term Loans', '206', '', 'Interest Income Expense', 'Demo'),
(18, 'Interest Income Expense on other Borrowings', '209', '', 'Interest Income Expense', 'Demo'),
(19, 'Fees Paid for Loans form Banks and other Organization', '211', '', 'Non-Interest Expenses', 'Demo'),
(20, 'Commissions Paid for Loans from Banks and other Organizations', '212', '', 'Non-Interest Expenses', 'Demo'),
(21, 'Specific Reserve Expense', '221', '', 'Loan and Interest Loss reserves', 'Demo'),
(22, 'General Reserve Expense', '222', '', 'Loan and Interest Loss reserves', 'Demo'),
(23, 'Provision for Loss on Investments and Loans to other Organizations', '223', '', 'Loan and Interest Loss reserves', 'Demo'),
(24, 'Provision for Loss on Assets Acquired in Liquidation', '224', '', 'Loan and Interest Loss reserves', 'Demo'),
(25, 'Employee Personnel Expenses', '231', '', 'General and Administrative Expenses', 'Demo'),
(26, 'Office Expenses', '232', '', 'General and Administrative Expenses', 'Demo'),
(27, 'Professional Expenses', '233', '', 'General and Administrative Expenses', 'Demo'),
(28, 'Occupancy Expenses - Rent', '234-1', '', 'General and Administrative Expenses', 'Demo'),
(29, 'Occupancy Expenses - Utilities/Electricity', '234-2', '', 'General and Administrative Expenses', 'Demo'),
(30, 'Occupancy Expenses - Others', '234-3', '', 'General and Administrative Expenses', 'Demo'),
(32, 'Employee Travel Expenses', '235', '', 'General and Administrative Expenses', 'Demo'),
(33, 'Depreciation and Amortisation', '236', '', 'General and Administrative Expenses', 'Demo'),
(34, 'Governance Expense', '237', '', 'General and Administrative Expenses', 'Demo'),
(35, 'Loan Collection Expenses', '241', '', 'Loan Servicing Expenses', 'Demo'),
(36, 'Liens Recording', '242', 'xxx', 'Loan Servicing Expenses', 'Demo'),
(37, 'Credit history Investigation', '243', '', 'Loan Servicing Expenses', 'Demo'),
(38, 'Other Loan Servicing Expenses', '249', '', 'Loan Servicing Expenses', 'Demo'),
(39, 'Supervision Fee', '261', '', 'Supervision and Licensing Fees', 'Demo'),
(40, 'Licensing Fee', '262', '', 'Supervision and Licensing Fees', 'Demo'),
(41, 'Advertising Expenses', '251', '', 'Promotional Expenses', 'Demo'),
(42, 'Publicity and Promotion', '252', '', 'Promotional Expenses', 'Demo'),
(43, 'Published Materials', '253', '', 'Promotional Expenses', 'Demo'),
(44, 'Other Promotional Expenses', '259', '', 'Promotional Expenses', 'Demo'),
(45, 'Business License and other Local Taxes', '271', '', 'Taxes and Licenses', 'Demo'),
(46, 'Property Tax', '272', '', 'Taxes and Licenses', 'Demo'),
(47, 'Municipal/LGA Tax', '273', '', 'Taxes and Licenses', 'Demo'),
(48, 'Capital Tax', '274', '', 'Taxes and Licenses', 'Demo'),
(49, 'Registration Duty, Stamp Duty and their Equivalent', '275', '', 'Taxes and Licenses', 'Demo'),
(50, 'Income Tax', '276', '', 'Taxes and Licenses', 'Demo'),
(51, 'Other Indirect and Miscellaneous Taxes', '279', '', 'Taxes and Licenses', 'Demo'),
(52, 'Cashier Shortage', '281', '', 'Cashier Shortage and Overage', 'Demo'),
(53, 'Cashier Overage', '282', '', 'Cashier Shortage and Overage', 'Demo'),
(54, 'Profit Tax', '291', '', 'Tax on Profit or Loss', 'Demo'),
(55, 'Minimum Tax', '292', '', 'Tax on Profit or Loss', 'Demo'),
(56, 'Gain on Foreign Exchange', '321', '', 'Other Income Accounts', 'Demo'),
(57, 'Gain on Disposal of Property and Equipment', '322', '', 'Other Income Accounts', 'Demo'),
(58, 'Gain on Sale of Investments', '323', '', 'Other Income Accounts', 'Demo'),
(59, 'Rental Income', '324', '', 'Other Income Accounts', 'Demo'),
(60, 'Reversal of Provisions for Liabilities and Charges', '325', '', 'Other Income Accounts', 'Demo'),
(61, 'Write-back of Principal Received on Loans Previously Written Off', '326', '', 'Other Income Accounts', 'Demo'),
(62, 'Write-back of Interest Received on Loans Previously Written Off', '327', '', 'Other Income Accounts', 'Demo'),
(63, 'Other Income Items', '329', '', 'Other Income Accounts', 'Demo'),
(64, 'Loss on Foreign Exchange', '341', '', 'Other Charges', 'Demo'),
(65, 'Loss on Sale of Property and Equipment', '342', '', 'Other Charges', 'Demo'),
(66, 'Loss on Sale or Disposal of Investments', '343', '', 'Other Charges', 'Demo'),
(67, 'Provision for Major Repairs and Maintenance', '344', '', 'Other Charges', 'Demo'),
(68, 'Provision for Off-balance Sheet Commitments', '345', '', 'Other Charges', 'Demo'),
(69, 'Provision for Claims/Litigation', '346', '', 'Other Charges', 'Demo'),
(70, 'Other Charges', '347', '', 'Other Charges', 'Demo'),
(71, 'Consumer Loans to Clients', '441-1', '', 'Loans and Advances', 'Demo'),
(72, 'Business Loans to Clients', '441-2', '', 'Loans and Advances', 'Demo'),
(73, 'Agricultural Loans to Clients', '441-3', '', 'Loans and Advances', 'Demo'),
(74, 'Real Estate Loans to Clients', '441-4', '', 'Loans and Advances', 'Demo'),
(75, 'Savings and Deposit Secured Loans to Clients', '441-5', '', 'Loans and Advances', 'Demo'),
(76, 'Other Short-term Clients Loans', '441-6', '', 'Loans and Advances', 'Demo'),
(77, 'Current and Outstanding Loans to Non-Clients', '442', '', 'Loans and Advances', 'Demo'),
(78, 'Restructured Loans to Clients', '443', '', 'Loans and Advances', 'Demo'),
(79, 'Restructured Loans to Non-Clients', '444', '', 'Loans and Advances', 'Demo'),
(80, 'Past Due Non-Performing Loans (NPL) Account', '445', '', 'Loans and Advances', 'Demo'),
(81, 'Specific Reserve for Performing Loans (0 day) ', '451', '', 'Reserves for Possible Losses', 'Demo'),
(82, 'Specific Reserve for Pass and Watch Loans (1-30 days)', '451-1', '', 'Reserves for Possible Losses', 'Demo'),
(83, 'Specific Reserve for Substandard Loans (31-60 days)', '451-2', '', 'Reserves for Possible Losses', 'Demo'),
(84, 'Specific Reserve for Doubtful Loans (61-90 days)', '451-3', '', 'Reserves for Possible Losses', 'Demo'),
(85, 'Specific Reserve for Lost Loans (>91 days)', '451-4', '', 'Reserves for Possible Losses', 'Demo'),
(86, 'General Reserves', '452', '', 'Reserves for Possible Losses', 'Demo'),
(87, 'Land and Buildings', '471', '', 'Property and Equipment', 'Demo'),
(88, 'Office Equipment', '472', '', 'Property and Equipment', 'Demo'),
(89, 'Plant and Machinery', '473', '', 'Property and Equipment', 'Demo'),
(90, 'Vehicles', '474', '', 'Property and Equipment', 'Demo'),
(91, 'Furniture and Fixture', '475', '', 'Property and Equipment', 'Demo'),
(92, 'Computer and other Equipment', '476', '', 'Property and Equipment', 'Demo'),
(93, 'Intangible Assets', '477', '', 'Property and Equipment', 'Demo'),
(94, 'Other Fixed Assets', '478', '', 'Property and Equipment', 'Demo'),
(95, 'Accumulated Amortisation and Depreciation', '479', '', 'Property and Equipment', 'Demo'),
(96, 'Prepayments', '481', '', 'Prepayments and Other Receivables', 'Demo'),
(97, 'Short-term Receivables', '482', '', 'Prepayments and Other Receivables', 'Demo'),
(98, 'Customers Deposits', '501', '', 'Customers Deposits', 'Demo'),
(99, 'Term Deposits', '502', '', 'Customers Deposits', 'Demo'),
(100, 'Interest Payable on Savings Deposits', '531', '', 'Interest Payable', 'Demo'),
(101, 'Interest Payable on Term Deposits', '532', '', 'Interest Payable', 'Demo'),
(102, 'Interest Payable on Short-term Bank Loans', '533', '', 'Interest Payable', 'Demo'),
(103, 'Interest Payable on Long-term Bank Loans', '534', '', 'Interest Payable', 'Demo'),
(104, 'Interest Payable on Other Borrowings', '535', '', 'Interest Payable', 'Demo'),
(105, 'Accounts Payable', '541', '', 'Accounts Payable', 'Demo'),
(106, 'Income Tax', '561', '', 'Taxes Payable', 'Demo'),
(107, 'Withholding Tax', '562', '', 'Taxes Payable', 'Demo'),
(108, 'Social security Tax', '563', '', 'Taxes Payable', 'Demo'),
(109, 'Profit Tax', '564', '', 'Taxes Payable', 'Demo'),
(110, 'Minimum Tax', '565', '', 'Taxes Payable', 'Demo'),
(111, 'Other Taxes', '569', '', 'Taxes Payable', 'Demo'),
(112, 'Deferred Grant Revenue', '571', '', 'Deferred Revenue', 'Demo'),
(113, 'Deferred Revenue due to Donated Fixed Assets', '572', '', 'Deferred Revenue', 'Demo'),
(114, 'Other Deferred Revenue Items', '573', '', 'Deferred Revenue', 'Demo'),
(115, 'Suspense Items (unidentified)', '581', '', 'Suspense and/or Clearing Accounts', 'Demo'),
(116, 'Clearing Account', '582', '', 'Suspense and/or Clearing Accounts', 'Demo'),
(117, 'Other Liabilities', '591', '', 'Other Liability Accounts', 'Demo'),
(118, 'Capital', '601', '', 'Capital', 'Demo'),
(119, 'Retained Earnings', '621', '', 'Retained Earnings/ (Deficit)', 'Demo'),
(120, 'Net Income (Loss) for the Current Year ', '651', '', 'Net Income (Loss)', 'Demo'),
(121, 'Dividends Declared', '661', '', 'Dividends Declared', 'Demo'),
(122, 'Investment in CBN Approved Government Securities', '431', '', 'Investments', 'Demo'),
(123, 'Loans to other MFBs', '432', '', 'Investments', 'Demo'),
(124, 'Other Investments', '434', '', 'Investments', 'Demo'),
(125, 'Current Accounts', '421', '', 'Accounts with Banks and other Financial Institutions', 'Demo'),
(126, 'Savings Accounts', '422', '', 'Accounts with Banks and other Financial Institutions', 'Demo'),
(127, 'Other Accounts with Banks', '423', '', 'Accounts with Banks and other Financial Institutions', 'Demo'),
(128, 'Cash on Hand', '401', '', 'Cash, Cheques and Other Cash Items', 'Demo'),
(129, 'Petty Cash', '402', '', 'Cash, Cheques and Other Cash Items', 'Demo'),
(130, 'Vault Cash', '403', '', 'Cash, Cheques and Other Cash Items', 'Demo'),
(131, 'Cheques in Transit', '404', '', 'Cash, Cheques and Other Cash Items', 'Demo'),
(132, 'Other Cash Accounts', '405', '', 'Cash, Cheques and Other Cash Items', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `heads category`
--

CREATE TABLE IF NOT EXISTS `heads category` (
  `ID` bigint(11) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heads category`
--

INSERT INTO `heads category` (`ID`, `Category`, `Company`) VALUES
(1, 'Current Assets', 'Demo'),
(2, 'Investments', 'Demo'),
(3, 'Fixed Assets', 'Demo'),
(4, 'Turnover', 'Demo'),
(5, 'Interest Income on Loans and Advances', 'Demo'),
(6, 'Interest Income other than on Loans and Advances', 'Demo'),
(7, 'Fees and Charges', 'Demo'),
(8, 'Interest Income Expense', 'Demo'),
(9, 'Non-Interest Expenses', 'Demo'),
(10, 'Loan and Interest Loss reserves', 'Demo'),
(11, 'General and Administrative Expenses', 'Demo'),
(12, 'Loan Servicing Expenses', 'Demo'),
(13, 'Promotional Expenses', 'Demo'),
(14, 'Supervision and Licensing Fees', 'Demo'),
(15, 'Taxes and Licenses', 'Demo'),
(16, 'Cashier Shortage and Overage', 'Demo'),
(17, 'Tax on Profit or Loss', 'Demo'),
(18, 'Other Income Accounts', 'Demo'),
(19, 'Other Charges', 'Demo'),
(20, 'Loans and Advances', 'Demo'),
(21, 'Reserves for Possible Losses', 'Demo'),
(22, 'Property and Equipment', 'Demo'),
(23, 'Prepayments and Other Receivables', 'Demo'),
(24, 'Other Assets', 'Demo'),
(25, 'Customers Deposits', 'Demo'),
(26, 'Interest Payable', 'Demo'),
(27, 'Accounts Payable', 'Demo'),
(28, 'Taxes Payable', 'Demo'),
(29, 'Deferred Revenue', 'Demo'),
(30, 'Suspense and/or Clearing Accounts', 'Demo'),
(31, 'Other Liability Accounts', 'Demo'),
(32, 'Capital', 'Demo'),
(33, 'Additional Capital', 'Demo'),
(34, 'Retained Earnings/ (Deficit)', 'Demo'),
(35, 'Reserves and Appropriations', 'Demo'),
(36, 'Net Income (Loss)', 'Demo'),
(37, 'Dividends Declared', 'Demo'),
(38, 'Control', 'Demo'),
(39, 'Accounts with Banks and other Financial Institutio', 'Demo'),
(40, 'Cash, Cheques and Other Cash Items', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `interbank`
--

CREATE TABLE IF NOT EXISTS `interbank` (
  `ID` bigint(11) NOT NULL,
  `r_Date` date DEFAULT NULL,
  `r_Branch` varchar(50) DEFAULT NULL,
  `r_Officer` varchar(50) DEFAULT NULL,
  `r_Amount` decimal(13,2) DEFAULT NULL,
  `p_Date` date DEFAULT NULL,
  `p_Branch` varchar(50) DEFAULT NULL,
  `p_Officer` varchar(50) DEFAULT NULL,
  `p_Amount` decimal(13,2) DEFAULT NULL,
  `Balance` decimal(13,2) DEFAULT NULL,
  `r_Narration` varchar(150) DEFAULT NULL,
  `p_Narration` varchar(150) DEFAULT NULL,
  `Received By` varchar(50) DEFAULT NULL,
  `Paid By` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interbank`
--

INSERT INTO `interbank` (`ID`, `r_Date`, `r_Branch`, `r_Officer`, `r_Amount`, `p_Date`, `p_Branch`, `p_Officer`, `p_Amount`, `Balance`, `r_Narration`, `p_Narration`, `Received By`, `Paid By`, `Company`) VALUES
(1, '2012-05-10', 'Tafo', 'him', 400.00, '0000-00-00', '', '', 0.00, 0.00, 'cash for withdrawal', '', 'me', '', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `invest`
--

CREATE TABLE IF NOT EXISTS `invest` (
  `ID` bigint(11) NOT NULL,
  `TID` bigint(11) NOT NULL,
  `MID` varchar(50) DEFAULT NULL,
  `Share Holding` int(11) DEFAULT NULL,
  `Share Value` decimal(11,2) DEFAULT NULL,
  `Share Percent` double(11,2) DEFAULT NULL,
  `Invest Amount` decimal(11,2) DEFAULT NULL,
  `Participate` varchar(5) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invest`
--

INSERT INTO `invest` (`ID`, `TID`, `MID`, `Share Holding`, `Share Value`, `Share Percent`, `Invest Amount`, `Participate`, `Company`) VALUES
(1, 1, '1', 30000, 15000000.00, 1.00, 50000.00, 'Yes', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE IF NOT EXISTS `investment` (
  `ID` bigint(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Description` text,
  `Type` varchar(50) DEFAULT NULL,
  `Amount` decimal(11,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Members` int(11) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`ID`, `Title`, `Description`, `Type`, `Amount`, `Date`, `Members`, `Company`) VALUES
(1, 'BOND Buying', 'FGN Bonds', 'General', 5000000.00, '2019-04-12', 1, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `lease application`
--

CREATE TABLE IF NOT EXISTS `lease application` (
  `ID` bigint(11) NOT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Middle Name` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Maiden Name` varchar(50) DEFAULT NULL,
  `Marital Status` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Mobile Number` varchar(50) DEFAULT NULL,
  `Contact Number` varchar(50) DEFAULT NULL,
  `Identification Type` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Children` int(11) DEFAULT NULL,
  `Household` int(11) DEFAULT NULL,
  `Residential Status` varchar(50) DEFAULT NULL,
  `Address` text,
  `Previous Address` text,
  `Home Duration` varchar(50) DEFAULT NULL,
  `LGA` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Landmark` varchar(50) DEFAULT NULL,
  `Bus Stop` varchar(50) DEFAULT NULL,
  `Monthly Expenses` decimal(11,2) DEFAULT NULL,
  `Income` decimal(11,2) DEFAULT NULL,
  `Other Income` decimal(11,2) DEFAULT NULL,
  `Pay Date` varchar(50) DEFAULT NULL,
  `Running Loan` decimal(11,2) DEFAULT NULL,
  `Other Loans` decimal(11,2) DEFAULT NULL,
  `Monthly Repayment` decimal(11,2) DEFAULT NULL,
  `Employment Type` varchar(50) DEFAULT NULL,
  `Current Employer` varchar(50) DEFAULT NULL,
  `Employment Date` date DEFAULT NULL,
  `Staff ID` varchar(50) DEFAULT NULL,
  `Job Title` varchar(50) DEFAULT NULL,
  `Employer Phone` varchar(50) DEFAULT NULL,
  `Office Address` text,
  `Office LGA` varchar(50) DEFAULT NULL,
  `Office State` varchar(50) DEFAULT NULL,
  `Official Email` varchar(50) DEFAULT NULL,
  `Industry Type` varchar(50) DEFAULT NULL,
  `Previous Duration` varchar(20) DEFAULT NULL,
  `Past Employers` int(11) DEFAULT NULL,
  `Education Level` varchar(50) DEFAULT NULL,
  `Institution` varchar(50) DEFAULT NULL,
  `NK Name` varchar(50) DEFAULT NULL,
  `NK Relationship` varchar(50) DEFAULT NULL,
  `NK Phone` varchar(50) DEFAULT NULL,
  `NK Address` text,
  `NK LGA` varchar(50) DEFAULT NULL,
  `NK State` varchar(50) DEFAULT NULL,
  `NK email` varchar(50) DEFAULT NULL,
  `NK Employer` varchar(50) DEFAULT NULL,
  `NK Job Title` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Account Name` varchar(50) DEFAULT NULL,
  `BVN` varchar(50) DEFAULT NULL,
  `Account Type` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Loan Amount` decimal(11,2) DEFAULT NULL,
  `Tenor` int(11) DEFAULT NULL,
  `Repayment` decimal(11,2) DEFAULT NULL,
  `Purpose` varchar(50) DEFAULT NULL,
  `Authorize` tinyint(1) DEFAULT NULL,
  `Terms` tinyint(1) DEFAULT NULL,
  `Application Date` date DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending',
  `Personal_Remark` text,
  `Income_Remark` text,
  `Employment_Remark` text,
  `NK_Remark` text,
  `Bank_Remark` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lease payment`
--

CREATE TABLE IF NOT EXISTS `lease payment` (
  `ID` bigint(11) NOT NULL,
  `Lease ID` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lease payment`
--

INSERT INTO `lease payment` (`ID`, `Lease ID`, `Date`, `Amount`, `Account Number`, `Company`) VALUES
(3, '4', '2013-09-18', 20166.67, '01212345679', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `lease type`
--

CREATE TABLE IF NOT EXISTS `lease type` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Rate` decimal(11,2) DEFAULT NULL,
  `Late Rate` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lease type`
--

INSERT INTO `lease type` (`ID`, `Type`, `Rate`, `Late Rate`, `Company`) VALUES
(1, '3 Months', 10.00, 2.00, 'Demo'),
(2, '6 Months', 7.00, 1.50, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `leasing`
--

CREATE TABLE IF NOT EXISTS `leasing` (
  `ID` bigint(11) NOT NULL,
  `Company Name` varchar(50) DEFAULT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Last Name` varchar(50) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `GSM` varchar(50) DEFAULT NULL,
  `Position in Coy` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Equip Type` varchar(50) DEFAULT NULL,
  `Type of Lease` varchar(50) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `Equip Make` varchar(50) DEFAULT NULL,
  `Price` decimal(11,2) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Leasing Officer` varchar(50) DEFAULT NULL,
  `Interest Rate` decimal(6,2) DEFAULT NULL,
  `Lease Date` date DEFAULT NULL,
  `Lease Status` varchar(50) DEFAULT NULL,
  `Contribution` int(4) DEFAULT NULL,
  `Late Charge` decimal(7,2) DEFAULT NULL,
  `Payment Frequency` int(4) DEFAULT NULL,
  `No of Payment` int(4) DEFAULT NULL,
  `Payment Type` varchar(50) DEFAULT NULL,
  `Equipment Descr` text,
  `Invoice No` varchar(20) DEFAULT NULL,
  `Guarantor` varchar(50) DEFAULT NULL,
  `Guarantor Contact` varchar(150) DEFAULT NULL,
  `Guarantor Occupation` varchar(50) DEFAULT NULL,
  `Collateral` varchar(50) DEFAULT NULL,
  `Collateral Location` varchar(50) DEFAULT NULL,
  `Collateral Value` decimal(11,2) DEFAULT NULL,
  `Collateral Title` varchar(70) DEFAULT NULL,
  `Collateral Description` text,
  `Balance` decimal(11,2) DEFAULT NULL,
  `Payment todate` decimal(11,2) DEFAULT NULL,
  `Periodic Repayment` decimal(11,2) DEFAULT NULL,
  `Daily Interest` decimal(11,2) DEFAULT NULL,
  `Daily Principal` decimal(11,2) DEFAULT NULL,
  `Daily Repay` decimal(11,2) DEFAULT NULL,
  `Monthly Interest` decimal(11,2) DEFAULT NULL,
  `Total Interest` decimal(11,2) DEFAULT NULL,
  `Interest toDate` decimal(11,2) DEFAULT NULL,
  `Monthly Principal` decimal(11,2) DEFAULT NULL,
  `PPayment todate` decimal(11,2) DEFAULT NULL,
  `PBalance` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `Staff Number` varchar(30) DEFAULT NULL,
  `LeaveID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `From` date DEFAULT NULL,
  `To` date DEFAULT NULL,
  `Days` int(11) DEFAULT NULL,
  `Date Resumed` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave type`
--

CREATE TABLE IF NOT EXISTS `leave type` (
  `Type ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `company` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level update`
--

CREATE TABLE IF NOT EXISTS `level update` (
  `Basic` decimal(10,2) DEFAULT NULL,
  `Level` char(3) DEFAULT NULL,
  `Step` char(3) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE IF NOT EXISTS `lga` (
  `State` varchar(50) DEFAULT NULL,
  `LGA` varchar(50) DEFAULT NULL,
  `LGAID` int(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=825 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`State`, `LGA`, `LGAID`, `Company`) VALUES
('RIVERS', 'Asaritoru', 2, 'Demo'),
('IMO', 'Aboh mbaise', 3, 'Demo'),
('OYO', 'Oluyole', 5, 'Demo'),
('CROSS RIVER', 'Bekwara', 6, 'Demo'),
('OGUN', 'Abeokuta east', 7, 'Demo'),
('OGUN', 'Yemoji', 8, 'Demo'),
('EDO', 'Etsakor', 9, 'Demo'),
('DELTA', 'Ethiope west', 10, 'Demo'),
('ANAMBRA', 'Idemili', 11, 'Demo'),
('KOGI', 'Ijumu iyara', 12, 'Demo'),
('ABIA', 'Aba north', 14, 'Demo'),
('ABIA', 'Aba south', 15, 'Demo'),
('ABIA', 'Arochukwu', 16, 'Demo'),
('ABIA', 'Bende', 17, 'Demo'),
('ABIA', 'Ikwuano', 18, 'Demo'),
('ABIA', 'Isiala-ngwa north', 19, 'Demo'),
('ABIA', 'Isiala-ngwa south', 20, 'Demo'),
('ABIA', 'Isukwuato', 21, 'Demo'),
('ABIA', 'Obiomangwa', 22, 'Demo'),
('ABIA', 'Ohafia', 23, 'Demo'),
('ABIA', 'Osisioma ngwa', 24, 'Demo'),
('ABIA', 'Ugwunagbo', 25, 'Demo'),
('ABIA', 'Ukwa east', 26, 'Demo'),
('ABIA', 'Ukwa west', 27, 'Demo'),
('ABIA', 'Umuahia north', 28, 'Demo'),
('ABIA', 'Umuahia south', 29, 'Demo'),
('ABIA', 'Umu-nneochi', 30, 'Demo'),
('ADAMAWA', 'Demsa', 31, 'Demo'),
('ADAMAWA', 'Fufore', 32, 'Demo'),
('ADAMAWA', 'Ganye', 33, 'Demo'),
('ADAMAWA', 'Girei', 34, 'Demo'),
('ADAMAWA', 'Gombi', 35, 'Demo'),
('ADAMAWA', 'Guyuk', 36, 'Demo'),
('ADAMAWA', 'Hong', 37, 'Demo'),
('ADAMAWA', 'Jada', 38, 'Demo'),
('ADAMAWA', 'Lamurde', 39, 'Demo'),
('ADAMAWA', 'Madagali', 40, 'Demo'),
('ADAMAWA', 'Maiha', 41, 'Demo'),
('ADAMAWA', 'Mayo-belwa', 42, 'Demo'),
('ADAMAWA', 'Michika', 43, 'Demo'),
('ADAMAWA', 'Mubi north', 44, 'Demo'),
('ADAMAWA', 'Mubi south', 45, 'Demo'),
('ADAMAWA', 'Numan', 46, 'Demo'),
('ADAMAWA', 'Shelleng', 47, 'Demo'),
('ADAMAWA', 'Song', 48, 'Demo'),
('ADAMAWA', 'Toungo', 49, 'Demo'),
('ADAMAWA', 'Yola north', 50, 'Demo'),
('ADAMAWA', 'Yola south', 51, 'Demo'),
('AKWA IBOM', 'Abak', 52, 'Demo'),
('AKWA IBOM', 'Eastern obolo', 53, 'Demo'),
('AKWA IBOM', 'Eket', 54, 'Demo'),
('AKWA IBOM', 'Esit eket', 55, 'Demo'),
('AKWA IBOM', 'Essien udim', 56, 'Demo'),
('AKWA IBOM', 'Etim ekpo', 57, 'Demo'),
('AKWA IBOM', 'Etinan', 58, 'Demo'),
('AKWA IBOM', 'Ibeno', 59, 'Demo'),
('AKWA IBOM', 'Ibesikpo asutan', 60, 'Demo'),
('AKWA IBOM', 'Ibiono ibom', 61, 'Demo'),
('AKWA IBOM', 'Ika', 62, 'Demo'),
('AKWA IBOM', 'Ikono', 63, 'Demo'),
('AKWA IBOM', 'Ikot abasi', 64, 'Demo'),
('AKWA IBOM', 'Ikot ekpene', 65, 'Demo'),
('AKWA IBOM', 'Ini', 66, 'Demo'),
('AKWA IBOM', 'Itu', 67, 'Demo'),
('AKWA IBOM', 'Mbo', 68, 'Demo'),
('AKWA IBOM', 'Mkpat enin', 69, 'Demo'),
('AKWA IBOM', 'Nsit atai', 70, 'Demo'),
('AKWA IBOM', 'Nsit ibom', 71, 'Demo'),
('AKWA IBOM', 'Nsit ubium', 72, 'Demo'),
('AKWA IBOM', 'Uruan', 73, 'Demo'),
('AKWA IBOM', 'Urue-offong/oruko', 74, 'Demo'),
('AKWA IBOM', 'Uyo', 75, 'Demo'),
('ANAMBRA', 'Aguata', 76, 'Demo'),
('ANAMBRA', 'Anambra east', 77, 'Demo'),
('ANAMBRA', 'Anambra west', 78, 'Demo'),
('ANAMBRA', 'Anaocha', 79, 'Demo'),
('ANAMBRA', 'Awka north', 80, 'Demo'),
('ANAMBRA', 'Awka south', 81, 'Demo'),
('ANAMBRA', 'Ayamelum', 82, 'Demo'),
('ANAMBRA', 'Dunukofia', 83, 'Demo'),
('ANAMBRA', 'Ekwusigo', 84, 'Demo'),
('ANAMBRA', 'Idemili north', 85, 'Demo'),
('ANAMBRA', 'Idemili south', 86, 'Demo'),
('ANAMBRA', 'Ihiala', 87, 'Demo'),
('ANAMBRA', 'Njikoka', 88, 'Demo'),
('ANAMBRA', 'Nnewi north', 89, 'Demo'),
('CROSS RIVER', 'Obanliku', 90, 'Demo'),
('CROSS RIVER', 'Obubra', 91, 'Demo'),
('CROSS RIVER', 'Obudu', 92, 'Demo'),
('CROSS RIVER', 'Odukpani', 93, 'Demo'),
('CROSS RIVER', 'Ogoja', 94, 'Demo'),
('CROSS RIVER', 'Yakurr', 95, 'Demo'),
('CROSS RIVER', 'Yala', 96, 'Demo'),
('DELTA', 'Aniocha north', 97, 'Demo'),
('DELTA', 'Aniocha south', 98, 'Demo'),
('DELTA', 'Bomadi', 99, 'Demo'),
('DELTA', 'Burutu', 100, 'Demo'),
('DELTA', 'Ethiope east', 101, 'Demo'),
('DELTA', 'Ethiope west', 102, 'Demo'),
('DELTA', 'Ika north', 103, 'Demo'),
('DELTA', 'Ika south', 104, 'Demo'),
('DELTA', 'Isoko north', 105, 'Demo'),
('DELTA', 'Isoko south', 106, 'Demo'),
('DELTA', 'Ndokwa east', 107, 'Demo'),
('DELTA', 'Ndokwa west', 108, 'Demo'),
('DELTA', 'Okpe', 109, 'Demo'),
('DELTA', 'Oshimili north', 110, 'Demo'),
('DELTA', 'Oshimili south', 111, 'Demo'),
('DELTA', 'Patani', 112, 'Demo'),
('DELTA', 'Sapele', 113, 'Demo'),
('DELTA', 'Udu', 114, 'Demo'),
('DELTA', 'Ughelli north', 115, 'Demo'),
('DELTA', 'Ughelli south', 116, 'Demo'),
('DELTA', 'Ukwuani', 117, 'Demo'),
('DELTA', 'Uvwie', 118, 'Demo'),
('DELTA', 'Warri north', 119, 'Demo'),
('DELTA', 'Warri south', 120, 'Demo'),
('DELTA', 'Warri south west', 121, 'Demo'),
('EBONYI', 'Abakaliki', 122, 'Demo'),
('EBONYI', 'Afikpo north', 123, 'Demo'),
('EBONYI', 'Afikpo south', 124, 'Demo'),
('EBONYI', 'Ebonyi', 125, 'Demo'),
('EBONYI', 'Ezza north', 126, 'Demo'),
('EBONYI', 'Ezza south', 127, 'Demo'),
('EBONYI', 'Ikwo', 128, 'Demo'),
('EBONYI', 'Ishielu', 129, 'Demo'),
('EBONYI', 'Ivo', 130, 'Demo'),
('EBONYI', 'Izzi', 131, 'Demo'),
('EBONYI', 'Ohaozara', 132, 'Demo'),
('EBONYI', 'Ohaukwu', 133, 'Demo'),
('EBONYI', 'Onicha', 134, 'Demo'),
('EDO', 'Akoko-edo', 135, 'Demo'),
('EDO', 'Egor', 136, 'Demo'),
('EDO', 'Esan central', 137, 'Demo'),
('EDO', 'Esan north east', 138, 'Demo'),
('EDO', 'Esan south east', 139, 'Demo'),
('EDO', 'Esan west', 140, 'Demo'),
('EDO', 'Etsako central', 141, 'Demo'),
('EDO', 'Etsako east', 142, 'Demo'),
('EDO', 'Etsako west', 143, 'Demo'),
('EDO', 'Igueben', 144, 'Demo'),
('EDO', 'Ikpoba-okha', 145, 'Demo'),
('EDO', 'Oredo', 146, 'Demo'),
('EDO', 'Orhionmwon', 147, 'Demo'),
('EDO', 'Ovia north east', 148, 'Demo'),
('EDO', 'Ovia south west', 149, 'Demo'),
('EDO', 'Owan east', 150, 'Demo'),
('EDO', 'Owan west', 151, 'Demo'),
('EDO', 'Uhunmwonde', 152, 'Demo'),
('EKITI', 'Ado ekiti', 153, 'Demo'),
('EKITI', 'Aiyekire', 154, 'Demo'),
('EKITI', 'Efon', 155, 'Demo'),
('EKITI', 'Ekiti east', 156, 'Demo'),
('EKITI', 'Ekiti south west', 157, 'Demo'),
('EKITI', 'Ekiti west', 158, 'Demo'),
('EKITI', 'Emure', 159, 'Demo'),
('EKITI', 'Ido-osi', 160, 'Demo'),
('EKITI', 'Ijero', 161, 'Demo'),
('EKITI', 'Ikere', 162, 'Demo'),
('EKITI', 'Ikole', 163, 'Demo'),
('EKITI', 'Ilejemeji', 164, 'Demo'),
('EKITI', 'Irepodun/ifelodun', 165, 'Demo'),
('EKITI', 'Ise/orun', 166, 'Demo'),
('EKITI', 'Moba', 167, 'Demo'),
('EKITI', 'Oye', 168, 'Demo'),
('ENUGU', 'Aninri', 169, 'Demo'),
('ENUGU', 'Awgu', 170, 'Demo'),
('ENUGU', 'Enugu east', 171, 'Demo'),
('ENUGU', 'Enugu north', 172, 'Demo'),
('ENUGU', 'Enugu south', 173, 'Demo'),
('ENUGU', 'Ezeagu', 174, 'Demo'),
('ENUGU', 'Enugu', 175, 'Demo'),
('ENUGU', 'Igbo-etit', 176, 'Demo'),
('ENUGU', 'Igbo-eze north', 177, 'Demo'),
('ENUGU', 'Igho-eze south', 178, 'Demo'),
('ENUGU', 'Isi-uzo', 179, 'Demo'),
('ENUGU', 'Nkanu east', 180, 'Demo'),
('ENUGU', 'Nkanu west', 181, 'Demo'),
('ANAMBRA', 'Nnewi south', 182, 'Demo'),
('ANAMBRA', 'Ogbaru', 183, 'Demo'),
('ANAMBRA', 'Onitsha north', 184, 'Demo'),
('ANAMBRA', 'Onitsha south', 185, 'Demo'),
('ANAMBRA', 'Orumba north', 186, 'Demo'),
('ANAMBRA', 'Orumba south', 187, 'Demo'),
('ANAMBRA', 'Oyi', 188, 'Demo'),
('BAUCHI', 'Alkaleri', 189, 'Demo'),
('BAUCHI', 'Bauchi', 190, 'Demo'),
('BAUCHI', 'Bogoro', 191, 'Demo'),
('BAUCHI', 'Damban', 192, 'Demo'),
('BAUCHI', 'Darazo', 193, 'Demo'),
('BAUCHI', 'Dass', 194, 'Demo'),
('BAUCHI', 'Gamawa', 195, 'Demo'),
('BAUCHI', 'Ganjuwa', 196, 'Demo'),
('BAUCHI', 'Giade', 197, 'Demo'),
('BAUCHI', 'Itas/gadau', 198, 'Demo'),
('BAUCHI', 'Jama''are', 199, 'Demo'),
('BAUCHI', 'Katagun', 200, 'Demo'),
('ZAMFARA', 'Gusau', 201, 'Demo'),
('BAUCHI', 'Kirfi', 202, 'Demo'),
('BAUCHI', 'Misau', 203, 'Demo'),
('BAUCHI', 'Ningi', 204, 'Demo'),
('BAUCHI', 'Shira', 205, 'Demo'),
('BAUCHI', 'Tafawa-balewa', 206, 'Demo'),
('BAUCHI', 'Toro', 207, 'Demo'),
('BAUCHI', 'Warji', 208, 'Demo'),
('BAUCHI', 'Zaki', 209, 'Demo'),
('BAYELSA', 'Brass', 210, 'Demo'),
('BAYELSA', 'Ekeremor', 211, 'Demo'),
('BAYELSA', 'Kolokuma/opokuma', 212, 'Demo'),
('BAYELSA', 'Nembe', 213, 'Demo'),
('BAYELSA', 'Ogbia', 214, 'Demo'),
('BAYELSA', 'Sagbama', 215, 'Demo'),
('BAYELSA', 'Southern ijaw', 216, 'Demo'),
('BAYELSA', 'Yenegoa', 217, 'Demo'),
('BENUE', 'Ado', 218, 'Demo'),
('BENUE', 'Agatu', 219, 'Demo'),
('BENUE', 'Apa', 220, 'Demo'),
('BENUE', 'Buruku', 221, 'Demo'),
('BENUE', 'Gboko', 222, 'Demo'),
('BENUE', 'Guma', 223, 'Demo'),
('BENUE', 'Gwer east', 224, 'Demo'),
('BENUE', 'Gwer west', 225, 'Demo'),
('BENUE', 'Katsina-ala', 226, 'Demo'),
('BENUE', 'Konshisha', 227, 'Demo'),
('BENUE', 'Kwande', 228, 'Demo'),
('BENUE', 'Logo', 229, 'Demo'),
('BENUE', 'Makurdi', 230, 'Demo'),
('BENUE', 'Obi', 231, 'Demo'),
('BENUE', 'Ogbadibo', 232, 'Demo'),
('BENUE', 'Oju', 233, 'Demo'),
('BENUE', 'Okpokwu', 234, 'Demo'),
('BENUE', 'Ohimini', 235, 'Demo'),
('BENUE', 'Oturkpo', 236, 'Demo'),
('BENUE', 'Tarka', 237, 'Demo'),
('BENUE', 'Ukum', 238, 'Demo'),
('BENUE', 'Ushongo', 239, 'Demo'),
('BENUE', 'Vandeikya', 240, 'Demo'),
('BORNO', 'Abadam', 241, 'Demo'),
('BORNO', 'Askira/uba', 242, 'Demo'),
('BORNO', 'Bama', 243, 'Demo'),
('BORNO', 'Bayo', 244, 'Demo'),
('BORNO', 'Biu', 245, 'Demo'),
('BORNO', 'Chibok', 246, 'Demo'),
('BORNO', 'Damboa', 247, 'Demo'),
('BORNO', 'Dikwa', 248, 'Demo'),
('BORNO', 'Gubio', 249, 'Demo'),
('BORNO', 'Guzamala', 250, 'Demo'),
('BORNO', 'Gwoza', 251, 'Demo'),
('BORNO', 'Hawul', 252, 'Demo'),
('BORNO', 'Jere', 253, 'Demo'),
('BORNO', 'Kaga', 254, 'Demo'),
('BORNO', 'Kala/balge', 255, 'Demo'),
('BORNO', 'Konduga', 256, 'Demo'),
('BORNO', 'Kukawa', 257, 'Demo'),
('BORNO', 'Kwaya kusar', 258, 'Demo'),
('BORNO', 'Mafa', 259, 'Demo'),
('BORNO', 'Magumeri', 260, 'Demo'),
('BORNO', 'Maiduguri', 261, 'Demo'),
('BORNO', 'Marte', 262, 'Demo'),
('BORNO', 'Mobbar', 263, 'Demo'),
('BORNO', 'Monguno', 264, 'Demo'),
('BORNO', 'Ngala', 265, 'Demo'),
('BORNO', 'Nganzai', 266, 'Demo'),
('BORNO', 'Shani', 267, 'Demo'),
('CROSS RIVER', 'Abi', 268, 'Demo'),
('CROSS RIVER', 'Akamkpa', 269, 'Demo'),
('CROSS RIVER', 'Akpabuyo', 270, 'Demo'),
('CROSS RIVER', 'Bakassi', 271, 'Demo'),
('CROSS RIVER', 'Bekwara', 272, 'Demo'),
('CROSS RIVER', 'Biase', 273, 'Demo'),
('CROSS RIVER', 'Boki', 274, 'Demo'),
('CROSS RIVER', 'Calabar-municipal', 275, 'Demo'),
('CROSS RIVER', 'Calabar south', 276, 'Demo'),
('CROSS RIVER', 'Etung', 277, 'Demo'),
('CROSS RIVER', 'Ikom', 278, 'Demo'),
('ENUGU', 'Nsukka', 279, 'Demo'),
('ENUGU', 'Oji-river', 280, 'Demo'),
('ENUGU', 'Udenu', 281, 'Demo'),
('ENUGU', 'Udi', 282, 'Demo'),
('ENUGU', 'Uzo-uwani', 283, 'Demo'),
('GOMBE', 'Akko', 284, 'Demo'),
('GOMBE', 'Balanga', 285, 'Demo'),
('GOMBE', 'Billiri', 286, 'Demo'),
('GOMBE', 'Dukku', 287, 'Demo'),
('GOMBE', 'Funakaye', 288, 'Demo'),
('GOMBE', 'Gombe', 289, 'Demo'),
('GOMBE', 'Kaltungo', 290, 'Demo'),
('GOMBE', 'Kwami', 291, 'Demo'),
('GOMBE', 'Nafada', 292, 'Demo'),
('GOMBE', 'Shomgom', 293, 'Demo'),
('GOMBE', 'Yamaltu/deba', 294, 'Demo'),
('IMO', 'Ahiazu-mbaise', 295, 'Demo'),
('IMO', 'Ehime-mbano', 296, 'Demo'),
('IMO', 'Ezinihitte', 297, 'Demo'),
('IMO', 'Ideato north', 298, 'Demo'),
('IMO', 'Ideato south', 299, 'Demo'),
('IMO', 'Ihitte-uboma', 300, 'Demo'),
('IMO', 'Ikeduru', 301, 'Demo'),
('IMO', 'Isiala mbano', 302, 'Demo'),
('IMO', 'Isu', 303, 'Demo'),
('IMO', 'Mbaitoli', 304, 'Demo'),
('IMO', 'Ngor-okpala', 305, 'Demo'),
('IMO', 'Njaba', 306, 'Demo'),
('IMO', 'Nwangele', 307, 'Demo'),
('IMO', 'Nkwerre', 308, 'Demo'),
('IMO', 'Obowo', 309, 'Demo'),
('IMO', 'Oguta', 310, 'Demo'),
('IMO', 'Ohaji/egbema', 311, 'Demo'),
('IMO', 'Okigwe', 312, 'Demo'),
('IMO', 'Orlu', 313, 'Demo'),
('IMO', 'Orsu', 314, 'Demo'),
('IMO', 'Oru east', 315, 'Demo'),
('IMO', 'Oru west', 316, 'Demo'),
('IMO', 'Owerri muni.', 317, 'Demo'),
('IMO', 'Owerri north', 318, 'Demo'),
('IMO', 'Owerri west', 319, 'Demo'),
('IMO', 'Onuimo', 320, 'Demo'),
('JIGAWA', 'Auyo', 321, 'Demo'),
('JIGAWA', 'Babura', 322, 'Demo'),
('JIGAWA', 'Birnin kudu', 323, 'Demo'),
('JIGAWA', 'Biriniwa', 324, 'Demo'),
('JIGAWA', 'Buji', 325, 'Demo'),
('JIGAWA', 'Dutse', 326, 'Demo'),
('JIGAWA', 'Gagarawa', 327, 'Demo'),
('JIGAWA', 'Garki', 328, 'Demo'),
('JIGAWA', 'Gumel', 329, 'Demo'),
('JIGAWA', 'Guri', 330, 'Demo'),
('JIGAWA', 'Gwaram', 331, 'Demo'),
('JIGAWA', 'Gwiwa', 332, 'Demo'),
('JIGAWA', 'Hadejia', 333, 'Demo'),
('JIGAWA', 'Jahun', 334, 'Demo'),
('JIGAWA', 'Kafin', 335, 'Demo'),
('JIGAWA', 'Hausa', 336, 'Demo'),
('JIGAWA', 'Kaugama', 337, 'Demo'),
('JIGAWA', 'Kazaure', 338, 'Demo'),
('JIGAWA', 'Kiri kasamma', 339, 'Demo'),
('JIGAWA', 'Kiyawa', 340, 'Demo'),
('JIGAWA', 'Maigatari', 341, 'Demo'),
('JIGAWA', 'Malam madori', 342, 'Demo'),
('JIGAWA', 'Miga', 343, 'Demo'),
('JIGAWA', 'Ringim', 344, 'Demo'),
('JIGAWA', 'Roni', 345, 'Demo'),
('JIGAWA', 'Sule-tankarkar', 346, 'Demo'),
('JIGAWA', 'Taura', 347, 'Demo'),
('JIGAWA', 'Yankwashi', 348, 'Demo'),
('KADUNA', 'Birnin-gwari', 349, 'Demo'),
('KADUNA', 'Chikun', 350, 'Demo'),
('KADUNA', 'Giwa', 351, 'Demo'),
('KADUNA', 'Igabi', 352, 'Demo'),
('KADUNA', 'Ikara', 353, 'Demo'),
('KADUNA', 'Jaba', 354, 'Demo'),
('KADUNA', 'Jema''a', 355, 'Demo'),
('KADUNA', 'Kachia', 356, 'Demo'),
('KADUNA', 'Kaduna north', 357, 'Demo'),
('KADUNA', 'Kaduna south', 358, 'Demo'),
('KADUNA', 'Kagarko', 359, 'Demo'),
('KADUNA', 'Kajuru', 360, 'Demo'),
('KADUNA', 'Kaura', 361, 'Demo'),
('KADUNA', 'Kubau', 362, 'Demo'),
('KADUNA', 'Kudan', 363, 'Demo'),
('KADUNA', 'Lere', 364, 'Demo'),
('KADUNA', 'Makarfi', 365, 'Demo'),
('KADUNA', 'Sabon-gari', 366, 'Demo'),
('KADUNA', 'Sanga', 367, 'Demo'),
('KADUNA', 'Soba', 368, 'Demo'),
('KADUNA', 'Zangon-kataf', 369, 'Demo'),
('KADUNA', 'Zaria', 370, 'Demo'),
('KANO', 'Ajingi', 371, 'Demo'),
('KANO', 'Albasu', 372, 'Demo'),
('KANO', 'Bagwai', 373, 'Demo'),
('KANO', 'Bebeji', 374, 'Demo'),
('KANO', 'Bichi', 375, 'Demo'),
('KANO', 'Bunkure', 376, 'Demo'),
('KANO', 'Dala', 377, 'Demo'),
('KANO', 'Dambatta', 378, 'Demo'),
('KANO', 'Dawakin kudu', 379, 'Demo'),
('KANO', 'Dawakin tofa', 380, 'Demo'),
('KANO', 'Doguwa', 381, 'Demo'),
('KANO', 'Fagge', 382, 'Demo'),
('KANO', 'Gabasawa', 383, 'Demo'),
('KANO', 'Garko', 384, 'Demo'),
('KANO', 'Garum mallarn', 385, 'Demo'),
('KANO', 'Gaya', 386, 'Demo'),
('KANO', 'Gezawa', 387, 'Demo'),
('KANO', 'Gwale', 388, 'Demo'),
('KANO', 'Gwarzo', 389, 'Demo'),
('KANO', 'Kabo', 390, 'Demo'),
('KANO', 'Kano municipal', 391, 'Demo'),
('KANO', 'Karaye', 392, 'Demo'),
('KANO', 'Kibiya', 393, 'Demo'),
('KANO', 'Kiru', 394, 'Demo'),
('KANO', 'Kumbotso', 395, 'Demo'),
('KANO', 'Kunchi', 396, 'Demo'),
('KANO', 'Kura', 397, 'Demo'),
('KANO', 'Madobi', 398, 'Demo'),
('KANO', 'Makoda', 399, 'Demo'),
('KANO', 'Minjibir', 400, 'Demo'),
('KANO', 'Nasarawa', 401, 'Demo'),
('KANO', 'Rano', 402, 'Demo'),
('KANO', 'Rimin gado', 403, 'Demo'),
('KANO', 'Rogo', 404, 'Demo'),
('KANO', 'Shanono', 405, 'Demo'),
('KANO', 'Sumaila', 406, 'Demo'),
('KANO', 'Takai', 407, 'Demo'),
('KANO', 'Tarauni', 408, 'Demo'),
('KANO', 'Tofa', 409, 'Demo'),
('KANO', 'Tsanyawa', 410, 'Demo'),
('KANO', 'Tudun wada', 411, 'Demo'),
('KANO', 'Ungogo', 412, 'Demo'),
('KANO', 'Warawa', 413, 'Demo'),
('KANO', 'Wudil', 414, 'Demo'),
('KATSINA', 'Bakori', 415, 'Demo'),
('KATSINA', 'Batagarawa', 416, 'Demo'),
('KATSINA', 'Batsari', 417, 'Demo'),
('KATSINA', 'Baure', 418, 'Demo'),
('KATSINA', 'Bindawa', 419, 'Demo'),
('KATSINA', 'Charanchi', 420, 'Demo'),
('KATSINA', 'Dandume', 421, 'Demo'),
('KATSINA', 'Danja', 422, 'Demo'),
('KATSINA', 'Dan musa', 423, 'Demo'),
('KATSINA', 'Daura', 424, 'Demo'),
('KATSINA', 'Dutsi', 425, 'Demo'),
('KATSINA', 'Dutsin-ma', 426, 'Demo'),
('KATSINA', 'Faskari', 427, 'Demo'),
('KATSINA', 'Funtua', 428, 'Demo'),
('KATSINA', 'Ingawa', 429, 'Demo'),
('KATSINA', 'Jibia', 430, 'Demo'),
('KATSINA', 'Kafur', 431, 'Demo'),
('KATSINA', 'Kaita', 432, 'Demo'),
('KATSINA', 'Kankara', 433, 'Demo'),
('KATSINA', 'Kankia', 434, 'Demo'),
('KATSINA', 'Katsina', 435, 'Demo'),
('KATSINA', 'Kurfi', 436, 'Demo'),
('KATSINA', 'Kusada', 437, 'Demo'),
('KATSINA', 'Mai''adua', 438, 'Demo'),
('KATSINA', 'Malumfashi', 439, 'Demo'),
('KATSINA', 'Mani', 440, 'Demo'),
('KATSINA', 'Mashi', 441, 'Demo'),
('KATSINA', 'Matazu', 442, 'Demo'),
('KATSINA', 'Musawa', 443, 'Demo'),
('KATSINA', 'Rimi', 444, 'Demo'),
('KATSINA', 'Sabuwa', 445, 'Demo'),
('KATSINA', 'Safana', 446, 'Demo'),
('KATSINA', 'Sandamu', 447, 'Demo'),
('KATSINA', 'Zongo', 448, 'Demo'),
('KEBBI', 'Aleiro', 449, 'Demo'),
('KEBBI', 'Arewa-dandi', 450, 'Demo'),
('KEBBI', 'Argungu', 451, 'Demo'),
('KEBBI', 'Augie', 452, 'Demo'),
('KEBBI', 'Bagudo', 453, 'Demo'),
('KEBBI', 'Birnin kebbi', 454, 'Demo'),
('KEBBI', 'Bunza', 455, 'Demo'),
('KEBBI', 'Dandi', 456, 'Demo'),
('KEBBI', 'Fakai', 457, 'Demo'),
('KEBBI', 'Gwandu', 458, 'Demo'),
('KEBBI', 'Jega', 459, 'Demo'),
('KEBBI', 'Kalgo', 460, 'Demo'),
('KEBBI', 'Koko/besse', 461, 'Demo'),
('KEBBI', 'Maiyama', 462, 'Demo'),
('KEBBI', 'Ngaski', 463, 'Demo'),
('KEBBI', 'Sakaba', 464, 'Demo'),
('KEBBI', 'Shanga', 465, 'Demo'),
('KEBBI', 'Suru', 466, 'Demo'),
('KEBBI', 'Wasagu/danko', 467, 'Demo'),
('KEBBI', 'Yauri', 468, 'Demo'),
('KEBBI', 'Zuru', 469, 'Demo'),
('KOGI', 'Adavi', 470, 'Demo'),
('KOGI', 'Ajaojuta', 471, 'Demo'),
('KOGI', 'Ankpa', 472, 'Demo'),
('KOGI', 'Bassa', 473, 'Demo'),
('KOGI', 'Dekina', 474, 'Demo'),
('KOGI', 'Ibaji', 475, 'Demo'),
('KOGI', 'Igalamela-odolu', 476, 'Demo'),
('KOGI', 'Ijumu', 477, 'Demo'),
('KOGI', 'Kabba/bunu', 479, 'Demo'),
('KOGI', 'Kogi', 480, 'Demo'),
('KOGI', 'Lokoja', 481, 'Demo'),
('KOGI', 'Mopa-muro', 482, 'Demo'),
('KOGI', 'Ofu', 483, 'Demo'),
('KOGI', 'Ogori/megongo', 484, 'Demo'),
('KOGI', 'Okehi', 485, 'Demo'),
('KOGI', 'Olamabolo', 486, 'Demo'),
('KOGI', 'Omala', 487, 'Demo'),
('KOGI', 'Yagba east', 488, 'Demo'),
('KOGI', 'Yagba west', 489, 'Demo'),
('KWARA', 'Asa', 490, 'Demo'),
('KWARA', 'Baruten', 491, 'Demo'),
('KWARA', 'Edu', 492, 'Demo'),
('KWARA', 'Ekiti', 493, 'Demo'),
('KWARA', 'Ifelodun', 494, 'Demo'),
('KWARA', 'Ilorin south', 495, 'Demo'),
('KWARA', 'Ilorin west', 496, 'Demo'),
('KWARA', 'Irepodun', 497, 'Demo'),
('KWARA', 'Isin', 498, 'Demo'),
('KWARA', 'Kaiama', 499, 'Demo'),
('KWARA', 'Moro', 500, 'Demo'),
('KWARA', 'Offa', 501, 'Demo'),
('KWARA', 'Oke-ero', 502, 'Demo'),
('KWARA', 'Oyun', 503, 'Demo'),
('KWARA', 'Pategi', 504, 'Demo'),
('LAGOS', 'Agege', 505, 'Demo'),
('LAGOS', 'Ajeromi-ifelodun', 506, 'Demo'),
('LAGOS', 'Alimosho', 507, 'Demo'),
('LAGOS', 'Amuwo-odofin', 508, 'Demo'),
('LAGOS', 'Apapa', 509, 'Demo'),
('LAGOS', 'Badagry', 510, 'Demo'),
('LAGOS', 'Epe', 511, 'Demo'),
('LAGOS', 'Eti-osa', 512, 'Demo'),
('LAGOS', 'Ibeju/lekki', 513, 'Demo'),
('LAGOS', 'Ifako-ijaye', 514, 'Demo'),
('LAGOS', 'Ikeja', 515, 'Demo'),
('LAGOS', 'Ikorodu', 516, 'Demo'),
('LAGOS', 'Kosofe', 517, 'Demo'),
('LAGOS', 'Lagos island', 518, 'Demo'),
('LAGOS', 'Lagos mainland', 519, 'Demo'),
('LAGOS', 'Mushin', 520, 'Demo'),
('LAGOS', 'Ojo', 521, 'Demo'),
('LAGOS', 'Oshodi-isolo', 522, 'Demo'),
('LAGOS', 'Shomolu', 523, 'Demo'),
('LAGOS', 'Surulere', 524, 'Demo'),
('NASARAWA', 'Akwanga', 525, 'Demo'),
('NASARAWA', 'Awe', 526, 'Demo'),
('NASARAWA', 'Doma', 527, 'Demo'),
('NASARAWA', 'Karu', 528, 'Demo'),
('NASARAWA', 'Keana', 529, 'Demo'),
('NASARAWA', 'Keffi', 530, 'Demo'),
('NASARAWA', 'Kokona', 531, 'Demo'),
('NASARAWA', 'Lafia', 532, 'Demo'),
('NASARAWA', 'Nasarawa', 533, 'Demo'),
('NASARAWA', 'Nasarawa-eggon', 534, 'Demo'),
('NASARAWA', 'Obi', 535, 'Demo'),
('NASARAWA', 'Toto', 536, 'Demo'),
('NASARAWA', 'Wamba', 537, 'Demo'),
('NIGER', 'Agaie', 538, 'Demo'),
('NIGER', 'Agwara', 539, 'Demo'),
('NIGER', 'Bida', 540, 'Demo'),
('NIGER', 'Borgu', 541, 'Demo'),
('NIGER', 'Bosso', 542, 'Demo'),
('NIGER', 'Chanchaga', 543, 'Demo'),
('NIGER', 'Edati', 544, 'Demo'),
('NIGER', 'Gbako', 545, 'Demo'),
('NIGER', 'Gurara', 546, 'Demo'),
('NIGER', 'Katcha', 547, 'Demo'),
('NIGER', 'Kontagora', 548, 'Demo'),
('NIGER', 'Lapai', 549, 'Demo'),
('NIGER', 'Lavun', 550, 'Demo'),
('NIGER', 'Magama', 551, 'Demo'),
('NIGER', 'Mariga', 552, 'Demo'),
('NIGER', 'Mashegu', 553, 'Demo'),
('NIGER', 'Mokwa', 554, 'Demo'),
('NIGER', 'Muya', 555, 'Demo'),
('NIGER', 'Paikoro', 556, 'Demo'),
('NIGER', 'Rafi', 557, 'Demo'),
('NIGER', 'Rajau', 558, 'Demo'),
('NIGER', 'Shiroro', 559, 'Demo'),
('NIGER', 'Suleja', 560, 'Demo'),
('NIGER', 'Tafa', 561, 'Demo'),
('NIGER', 'Wushishi', 562, 'Demo'),
('OGUN', 'Abeokuta north', 563, 'Demo'),
('OGUN', 'Abeokuta south', 564, 'Demo'),
('OGUN', 'Ado-odo/ota', 565, 'Demo'),
('OGUN', 'Egbado north', 566, 'Demo'),
('OGUN', 'Egbado south', 567, 'Demo'),
('OGUN', 'Ekwekoro', 568, 'Demo'),
('OGUN', 'Ifo', 569, 'Demo'),
('OGUN', 'Ijebu east', 570, 'Demo'),
('OGUN', 'Ijebu north', 571, 'Demo'),
('OGUN', 'Ijebu north east', 572, 'Demo'),
('OGUN', 'Ijebu-ode', 573, 'Demo'),
('OGUN', 'Ikenne', 574, 'Demo'),
('OGUN', 'Imeko-afon', 575, 'Demo'),
('OGUN', 'Ipokia', 576, 'Demo'),
('OGUN', 'Obafemi-owode', 577, 'Demo'),
('OGUN', 'Ogun waterside', 578, 'Demo'),
('OGUN', 'Odeda', 579, 'Demo'),
('OGUN', 'Odogbolu', 580, 'Demo'),
('OGUN', 'Remo north', 581, 'Demo'),
('OGUN', 'Shagamu', 582, 'Demo'),
('ONDO', 'Akoko north east', 583, 'Demo'),
('ONDO', 'Akoko north west', 584, 'Demo'),
('ONDO', 'Akoko south east', 585, 'Demo'),
('ONDO', 'Akoko south west', 586, 'Demo'),
('ONDO', 'Akure north', 587, 'Demo'),
('ONDO', 'Ese-odo', 589, 'Demo'),
('ONDO', 'Idanre', 590, 'Demo'),
('ONDO', 'Ifedore', 591, 'Demo'),
('ONDO', 'Ilaje', 592, 'Demo'),
('ONDO', 'Ile-oluji-okeigbo', 593, 'Demo'),
('ONDO', 'Irele', 594, 'Demo'),
('ONDO', 'Odigbo', 595, 'Demo'),
('ONDO', 'Okitipupa', 596, 'Demo'),
('ONDO', 'Ondo east', 597, 'Demo'),
('ONDO', 'Ondo west', 598, 'Demo'),
('ONDO', 'Ose-owo', 599, 'Demo'),
('OSUN', 'Aiyedade', 600, 'Demo'),
('OSUN', 'Aiyedire', 601, 'Demo'),
('OSUN', 'Atakumosa east', 602, 'Demo'),
('OSUN', 'Atakumose-west', 603, 'Demo'),
('OSUN', 'Boluwaduro', 604, 'Demo'),
('OSUN', 'Boripe', 605, 'Demo'),
('OSUN', 'Ede north', 606, 'Demo'),
('OSUN', 'Ede south', 607, 'Demo'),
('OSUN', 'Egbedore', 608, 'Demo'),
('OSUN', 'Ejigbo', 609, 'Demo'),
('OSUN', 'Ife central', 610, 'Demo'),
('OSUN', 'Ife east', 611, 'Demo'),
('OSUN', 'Ife north', 612, 'Demo'),
('OSUN', 'Ife south', 613, 'Demo'),
('OSUN', 'Ifedayo', 614, 'Demo'),
('OSUN', 'Ifelodun', 615, 'Demo'),
('OSUN', 'Ila', 616, 'Demo'),
('OSUN', 'Ilasha east', 617, 'Demo'),
('OSUN', 'Ilesha west', 618, 'Demo'),
('OSUN', 'Irepodun', 619, 'Demo'),
('OSUN', 'Irewole', 620, 'Demo'),
('OSUN', 'Isokan', 621, 'Demo'),
('OSUN', 'Iwo', 622, 'Demo'),
('OSUN', 'Obokun', 623, 'Demo'),
('OSUN', 'Odo-otin', 624, 'Demo'),
('OSUN', 'Ola-oluwa', 625, 'Demo'),
('OSUN', 'Olorunda', 626, 'Demo'),
('OSUN', 'Oriade', 627, 'Demo'),
('OSUN', 'Orolu', 628, 'Demo'),
('OSUN', 'Osogbo', 629, 'Demo'),
('OYO', 'Afijio', 630, 'Demo'),
('OYO', 'Akinyele', 631, 'Demo'),
('OYO', 'Atiba', 632, 'Demo'),
('OYO', 'Atigbo', 633, 'Demo'),
('OYO', 'Egbeda', 634, 'Demo'),
('OYO', 'Ibadan central', 635, 'Demo'),
('OYO', 'Ibadan north', 636, 'Demo'),
('OYO', 'Ibadan north west', 637, 'Demo'),
('OYO', 'Ibadan south west', 638, 'Demo'),
('OYO', 'Ibadan south east', 639, 'Demo'),
('OYO', 'Ibarapa central', 640, 'Demo'),
('OYO', 'Ibarapa east', 641, 'Demo'),
('OYO', 'Ibarapa north', 642, 'Demo'),
('OYO', 'Ido', 643, 'Demo'),
('OYO', 'Irepo', 644, 'Demo'),
('OYO', 'Iseyin', 645, 'Demo'),
('OYO', 'Itesiwaju', 646, 'Demo'),
('OYO', 'Iwajowa', 647, 'Demo'),
('OYO', 'Kajola', 648, 'Demo'),
('OYO', 'Lagelu', 649, 'Demo'),
('OYO', 'Ogbomoso north', 650, 'Demo'),
('OYO', 'Ogbomoso south', 651, 'Demo'),
('OYO', 'Ogo oluwa', 652, 'Demo'),
('OYO', 'Olorunsogo', 653, 'Demo'),
('OYO', 'Oluyole', 654, 'Demo'),
('OYO', 'Ona-ara', 655, 'Demo'),
('OYO', 'Orelope', 656, 'Demo'),
('OYO', 'Ori ire', 657, 'Demo'),
('OYO', 'Oyo east', 658, 'Demo'),
('OYO', 'Oyo west', 659, 'Demo'),
('OYO', 'Saki east', 660, 'Demo'),
('OYO', 'Saki west', 661, 'Demo'),
('OYO', 'Surelere', 662, 'Demo'),
('PLATEAU', 'Barikin ladi', 663, 'Demo'),
('PLATEAU', 'Bassa', 664, 'Demo'),
('PLATEAU', 'Bokkos', 665, 'Demo'),
('PLATEAU', 'Jos east', 666, 'Demo'),
('PLATEAU', 'Jos north', 667, 'Demo'),
('PLATEAU', 'Jos south', 668, 'Demo'),
('PLATEAU', 'Kanam', 669, 'Demo'),
('PLATEAU', 'Kanke', 670, 'Demo'),
('PLATEAU', 'Langtang north', 671, 'Demo'),
('PLATEAU', 'Langtang south', 672, 'Demo'),
('PLATEAU', 'Mangu', 673, 'Demo'),
('PLATEAU', 'Mikang', 674, 'Demo'),
('PLATEAU', 'Pankshin', 675, 'Demo'),
('PLATEAU', 'Qua''an pan', 676, 'Demo'),
('PLATEAU', 'Riyom', 677, 'Demo'),
('PLATEAU', 'Shendam', 678, 'Demo'),
('PLATEAU', 'Wase', 679, 'Demo'),
('RIVERS', 'Abua/odual', 680, 'Demo'),
('RIVERS', 'Ahoada east', 681, 'Demo'),
('RIVERS', 'Ahoada west', 682, 'Demo'),
('RIVERS', 'Akuku toru', 683, 'Demo'),
('RIVERS', 'Andoni', 684, 'Demo'),
('RIVERS', 'Asari-toru', 685, 'Demo'),
('RIVERS', 'Bonny', 686, 'Demo'),
('RIVERS', 'Degema', 687, 'Demo'),
('RIVERS', 'Emohua', 688, 'Demo'),
('RIVERS', 'Eleme', 689, 'Demo'),
('RIVERS', 'Etche', 690, 'Demo'),
('RIVERS', 'Gokana', 691, 'Demo'),
('RIVERS', 'Ikwerre', 692, 'Demo'),
('RIVERS', 'Khana', 693, 'Demo'),
('RIVERS', 'Obia/akpor', 694, 'Demo'),
('RIVERS', 'Ogba/egbema/ndoni', 695, 'Demo'),
('RIVERS', 'Ogu/bolo', 696, 'Demo'),
('RIVERS', 'Okrika', 697, 'Demo'),
('RIVERS', 'Omumma', 698, 'Demo'),
('RIVERS', 'Opobo/nkoro', 699, 'Demo'),
('RIVERS', 'Oyigbo', 700, 'Demo'),
('RIVERS', 'Port harcourt', 701, 'Demo'),
('RIVERS', 'Tai', 702, 'Demo'),
('SOKOTO', 'Binji', 703, 'Demo'),
('SOKOTO', 'Bodinga', 704, 'Demo'),
('SOKOTO', 'Dange-shuni', 705, 'Demo'),
('SOKOTO', 'Gada', 706, 'Demo'),
('SOKOTO', 'Goronyo', 707, 'Demo'),
('SOKOTO', 'Gudu', 708, 'Demo'),
('SOKOTO', 'Gwadabawa', 709, 'Demo'),
('SOKOTO', 'Illela', 710, 'Demo'),
('SOKOTO', 'Isa', 711, 'Demo'),
('SOKOTO', 'Kware', 712, 'Demo'),
('SOKOTO', 'Kebbe', 713, 'Demo'),
('SOKOTO', 'Rabah', 714, 'Demo'),
('SOKOTO', 'Sabon birni', 715, 'Demo'),
('SOKOTO', 'Shagari', 716, 'Demo'),
('SOKOTO', 'Silame', 717, 'Demo'),
('SOKOTO', 'Sokoto north', 718, 'Demo'),
('SOKOTO', 'Sokoto south', 719, 'Demo'),
('SOKOTO', 'Tambuwal', 720, 'Demo'),
('SOKOTO', 'Tangaza', 721, 'Demo'),
('SOKOTO', 'Tureta', 722, 'Demo'),
('SOKOTO', 'Wamakko', 723, 'Demo'),
('SOKOTO', 'Wurno', 724, 'Demo'),
('SOKOTO', 'Yabo', 725, 'Demo'),
('TARABA', 'Ardo-kola', 726, 'Demo'),
('TARABA', 'Bali', 727, 'Demo'),
('TARABA', 'Donga', 728, 'Demo'),
('TARABA', 'Gashaka', 729, 'Demo'),
('TARABA', 'Gassol', 730, 'Demo'),
('TARABA', 'Ibi', 731, 'Demo'),
('TARABA', 'Jalingo', 732, 'Demo'),
('TARABA', 'Karim-lamido', 733, 'Demo'),
('TARABA', 'Kurmi', 734, 'Demo'),
('TARABA', 'Lau', 735, 'Demo'),
('TARABA', 'Sarduana', 736, 'Demo'),
('TARABA', 'Takum', 737, 'Demo'),
('TARABA', 'Ussa', 738, 'Demo'),
('TARABA', 'Wukari', 739, 'Demo'),
('TARABA', 'Yorro', 740, 'Demo'),
('TARABA', 'Zing', 741, 'Demo'),
('YOBE', 'Bade', 742, 'Demo'),
('YOBE', 'Bursari', 743, 'Demo'),
('YOBE', 'Damaturu', 744, 'Demo'),
('YOBE', 'Fika', 745, 'Demo'),
('YOBE', 'Fune', 746, 'Demo'),
('YOBE', 'Geidam', 747, 'Demo'),
('YOBE', 'Gujba', 748, 'Demo'),
('YOBE', 'Gulani', 749, 'Demo'),
('YOBE', 'Jakusko', 750, 'Demo'),
('YOBE', 'Karasuwa', 751, 'Demo'),
('YOBE', 'Machina', 752, 'Demo'),
('YOBE', 'Nangere', 753, 'Demo'),
('YOBE', 'Nguru', 754, 'Demo'),
('YOBE', 'Potiskum', 755, 'Demo'),
('YOBE', 'Tarmua', 756, 'Demo'),
('YOBE', 'Yunusari', 757, 'Demo'),
('YOBE', 'Yusufari', 758, 'Demo'),
('ZAMFARA', 'Anka', 759, 'Demo'),
('ZAMFARA', 'Bakurna', 760, 'Demo'),
('ZAMFARA', 'Birnin magaji', 761, 'Demo'),
('ZAMFARA', 'Bukkuyum', 762, 'Demo'),
('ZAMFARA', 'Bungudu', 763, 'Demo'),
('ZAMFARA', 'Gummi', 764, 'Demo'),
('ZAMFARA', 'Kaura namoda', 765, 'Demo'),
('ZAMFARA', 'Maradun', 766, 'Demo'),
('ZAMFARA', 'Maru', 767, 'Demo'),
('ZAMFARA', 'Shinkafi', 768, 'Demo'),
('ZAMFARA', 'Talata', 769, 'Demo'),
('ZAMFARA', 'Mafara', 770, 'Demo'),
('ZAMFARA', 'Tsafe', 771, 'Demo'),
('ZAMFARA', 'Zumi', 772, 'Demo'),
('NASARAWA', 'Eggon', 773, 'Demo'),
('ONDO', 'Ile oluji', 774, 'Demo'),
('OGUN', 'Sagamu', 775, 'Demo'),
('OGUN', 'Opeji', 776, 'Demo'),
('OGUN', 'Ijebu ode', 777, 'Demo'),
('EDO', 'Ishan', 778, 'Demo'),
('ONDO', 'Ondo central', 779, 'Demo'),
('BENUE', 'Otukpo', 780, 'Demo'),
('ABUJA', 'Abaji', 781, 'Demo'),
('ABUJA', 'Abuja muni.', 782, 'Demo'),
('ABUJA', 'Bwari', 783, 'Demo'),
('ABUJA', 'Gwagwalada', 784, 'Demo'),
('ABUJA', 'Kuje', 785, 'Demo'),
('ABUJA', 'Kwali', 786, 'Demo'),
('IMO', 'Ehime mbano', 787, 'Demo'),
('ENUGU', 'Oji river', 788, 'Demo'),
('OYO', 'Ogbomosho', 789, 'Demo'),
('ONDO', 'Akure south', 790, 'Demo'),
('CROSS RIVER', 'Odupani', 791, 'Demo'),
('IMO', 'Ngor okpala', 792, 'Demo'),
('BENUE', 'Ador', 793, 'Demo'),
('AKWA IBOM', 'Okobo', 794, 'Demo'),
('KOGI', 'Idah', 795, 'Demo'),
('ABIA', 'Ugwunagbor', 796, 'Demo'),
('RIVERS', 'Ogba/Egbem/Noom', 797, 'Demo'),
('KOGI', 'Okene', 798, 'Demo'),
('ONDO', 'Akoko', 799, 'Demo'),
('ONDO', 'Owo', 800, 'Demo'),
('KEBBI', 'Kamba', 801, 'Demo'),
('OGUN', 'Water side', 802, 'Demo'),
('OGUN', 'Egado South', 803, 'Demo'),
('OGUN', 'Imeko Afon', 804, 'Demo'),
('PLATEAU', 'Panilshin', 805, 'Demo'),
('ONDO', 'Ikalo', 806, 'Demo'),
('LAGOS', 'Eredo', 807, 'Demo'),
('KATSINA', 'Manufanoti', 808, 'Demo'),
('SOKOTO', 'Kofa atiku', 809, 'Demo'),
('AKWA IBOM', 'Onna', 811, 'Demo'),
('AKWA IBOM', 'Udium', 812, 'Demo'),
('OGUN', 'Ake', 813, 'Demo'),
('EDO', 'Uromi', 814, 'Demo'),
('AKWA IBOM', 'Oron', 815, 'Demo'),
('AKWA IBOM', 'Oruk', 816, 'Demo'),
('DELTA', 'Aniocha', 817, 'Demo'),
('ONDO', 'Ose', 818, 'Demo'),
('KWARA', 'Oro', 819, 'Demo'),
('OGUN', 'Yewa', 820, 'Demo'),
('OGUN', 'Yewa South', 821, 'Demo'),
('OGUN', 'Yewa North', 822, 'Demo'),
('RIVERS', 'Opobo/Nkoro', 823, 'Demo'),
('RIVERS', 'Onelga', 824, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE IF NOT EXISTS `loan` (
  `ID` bigint(11) NOT NULL,
  `Application Fee` decimal(11,3) DEFAULT NULL,
  `Processing Fee` decimal(11,3) DEFAULT NULL,
  `Insurance Fee` decimal(11,3) DEFAULT NULL,
  `Loan Account` varchar(50) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Loan Amount` decimal(13,2) DEFAULT NULL,
  `Loan Grade` varchar(50) DEFAULT NULL,
  `Loan Status` varchar(50) DEFAULT NULL,
  `Loan Type` varchar(50) DEFAULT NULL,
  `Loan Duration` int(11) DEFAULT NULL,
  `Interest Rate` decimal(10,2) DEFAULT NULL,
  `Payment Type` varchar(50) DEFAULT NULL,
  `Payment Frequency` varchar(50) DEFAULT NULL,
  `No of Payment` int(11) DEFAULT NULL,
  `Loan Date` date DEFAULT NULL,
  `Due Date` date DEFAULT NULL,
  `Periodic Repayment` decimal(13,2) DEFAULT NULL,
  `Payment todate` decimal(13,2) DEFAULT NULL,
  `Balance` decimal(13,2) DEFAULT NULL,
  `Purpose` text,
  `Guarantor` varchar(100) DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `Late Charge` decimal(13,2) DEFAULT NULL,
  `Collateral` varchar(100) DEFAULT NULL,
  `Collateral Location` varchar(60) DEFAULT NULL,
  `Collateral Value` decimal(13,2) DEFAULT NULL,
  `Collateral Title` varchar(50) DEFAULT NULL,
  `Collateral Description` text,
  `Loan No` varchar(50) DEFAULT NULL,
  `Interest toDate` decimal(11,2) DEFAULT NULL,
  `PPayment todate` decimal(11,2) DEFAULT NULL,
  `PBalance` decimal(11,2) DEFAULT NULL,
  `Daily Interest` decimal(11,2) DEFAULT NULL,
  `Daily Principal` decimal(11,2) DEFAULT NULL,
  `Daily Repay` decimal(11,2) DEFAULT NULL,
  `Total Interest` decimal(11,2) DEFAULT NULL,
  `Monthly Interest` decimal(11,2) DEFAULT NULL,
  `Monthly Principal` decimal(11,2) DEFAULT NULL,
  `Guarantor Contact` varchar(50) DEFAULT NULL,
  `Guarantor Occupation` varchar(50) DEFAULT NULL,
  `Approval` varchar(50) DEFAULT 'Pending',
  `Approval Note` text,
  `Loan Requested` decimal(11,2) DEFAULT NULL,
  `LatestMonth` varchar(30) DEFAULT NULL,
  `LoanStop` tinyint(1) NOT NULL DEFAULT '0',
  `MonthLoanStop` tinyint(1) NOT NULL DEFAULT '0',
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`ID`, `Application Fee`, `Processing Fee`, `Insurance Fee`, `Loan Account`, `Account Number`, `Loan Amount`, `Loan Grade`, `Loan Status`, `Loan Type`, `Loan Duration`, `Interest Rate`, `Payment Type`, `Payment Frequency`, `No of Payment`, `Loan Date`, `Due Date`, `Periodic Repayment`, `Payment todate`, `Balance`, `Purpose`, `Guarantor`, `Officer`, `Late Charge`, `Collateral`, `Collateral Location`, `Collateral Value`, `Collateral Title`, `Collateral Description`, `Loan No`, `Interest toDate`, `PPayment todate`, `PBalance`, `Daily Interest`, `Daily Principal`, `Daily Repay`, `Total Interest`, `Monthly Interest`, `Monthly Principal`, `Guarantor Contact`, `Guarantor Occupation`, `Approval`, `Approval Note`, `Loan Requested`, `LatestMonth`, `LoanStop`, `MonthLoanStop`, `Company`) VALUES
(1, 0.000, 0.000, 0.000, '', '000131', 40000.00, 'High', 'Active', 'Trading Loan', 3, 6.00, 'Simple Interest', 'Monthly', 3, '2019-04-01', '2019-07-01', 15733.33, 0.00, 47200.00, '', '', 'ADMINzs', 2.00, '', '', 0.00, '', '', '98', 0.00, 0.00, 40000.00, 0.00, 0.00, 0.00, 7200.00, 2400.00, 13333.33, '', '', 'Approved', NULL, 40000.00, NULL, 0, 0, 'Demo'),
(2, 0.000, 0.000, 0.000, '1', '100', 40000.00, 'High', 'Denied', 'Esusu Normal', 4, 5.00, 'Simple Interest', 'Monthly', 4, '2020-03-25', '2020-07-25', 12000.00, 0.00, 48000.00, '', '', 'ADMIN', 1.00, 'house', 'home', 0.00, '', '', '', 0.00, 0.00, 40000.00, 0.00, 0.00, 0.00, 8000.00, 2000.00, 10000.00, '', '', 'Denied', NULL, 60000.00, NULL, 0, 0, 'Demo'),
(6, 0.000, 0.000, 0.000, '', '100', 30000.00, 'High', 'Active', 'Trading Loan', 2, 900.00, 'Flat Rate', 'Monthly', 2, '2020-04-01', '2020-06-01', 15450.00, 15450.00, 15450.00, '', '', 'ADMIN', 2.00, '', '', 0.00, '', '', '99', 450.00, 15000.00, 30000.00, 0.00, 0.00, 0.00, 900.00, 450.00, 15000.00, '', '', 'Approved', NULL, 30000.00, NULL, 0, 0, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `loan application`
--

CREATE TABLE IF NOT EXISTS `loan application` (
  `ID` bigint(11) NOT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Middle Name` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Maiden Name` varchar(50) DEFAULT NULL,
  `Marital Status` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Mobile Number` varchar(50) DEFAULT NULL,
  `Contact Number` varchar(50) DEFAULT NULL,
  `Identification Type` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Children` int(11) DEFAULT NULL,
  `Household` int(11) DEFAULT NULL,
  `Residential Status` varchar(50) DEFAULT NULL,
  `Address` text,
  `Previous Address` text,
  `Home Duration` varchar(50) DEFAULT NULL,
  `LGA` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Landmark` varchar(50) DEFAULT NULL,
  `Bus Stop` varchar(50) DEFAULT NULL,
  `Monthly Expenses` decimal(11,2) DEFAULT NULL,
  `Income` decimal(11,2) DEFAULT NULL,
  `Other Income` decimal(11,2) DEFAULT NULL,
  `Pay Date` varchar(50) DEFAULT NULL,
  `Running Loan` decimal(11,2) DEFAULT NULL,
  `Other Loans` decimal(11,2) DEFAULT NULL,
  `Monthly Repayment` decimal(11,2) DEFAULT NULL,
  `Employment Type` varchar(50) DEFAULT NULL,
  `Current Employer` varchar(50) DEFAULT NULL,
  `Employment Date` date DEFAULT NULL,
  `Staff ID` varchar(50) DEFAULT NULL,
  `Job Title` varchar(50) DEFAULT NULL,
  `Employer Phone` varchar(50) DEFAULT NULL,
  `Office Address` text,
  `Office LGA` varchar(50) DEFAULT NULL,
  `Office State` varchar(50) DEFAULT NULL,
  `Official Email` varchar(50) DEFAULT NULL,
  `Industry Type` varchar(50) DEFAULT NULL,
  `Previous Duration` varchar(20) DEFAULT NULL,
  `Past Employers` int(11) DEFAULT NULL,
  `Education Level` varchar(50) DEFAULT NULL,
  `Institution` varchar(50) DEFAULT NULL,
  `NK Name` varchar(50) DEFAULT NULL,
  `NK Relationship` varchar(50) DEFAULT NULL,
  `NK Phone` varchar(50) DEFAULT NULL,
  `NK Address` text,
  `NK LGA` varchar(50) DEFAULT NULL,
  `NK State` varchar(50) DEFAULT NULL,
  `NK email` varchar(50) DEFAULT NULL,
  `NK Employer` varchar(50) DEFAULT NULL,
  `NK Job Title` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Account Name` varchar(50) DEFAULT NULL,
  `BVN` varchar(50) DEFAULT NULL,
  `Account Type` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Loan Amount` decimal(11,2) DEFAULT NULL,
  `Tenor` int(11) DEFAULT NULL,
  `Repayment` decimal(11,2) DEFAULT NULL,
  `Purpose` varchar(50) DEFAULT NULL,
  `Authorize` tinyint(1) DEFAULT NULL,
  `Terms` tinyint(1) DEFAULT NULL,
  `Application Date` date DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending',
  `Personal_Remark` text,
  `Income_Remark` text,
  `Employment_Remark` text,
  `NK_Remark` text,
  `Bank_Remark` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan guarantor`
--

CREATE TABLE IF NOT EXISTS `loan guarantor` (
  `ID` bigint(20) NOT NULL,
  `Loan_ID` bigint(20) NOT NULL,
  `Guarantor` varchar(50) DEFAULT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Business Address` text,
  `Identification Type` varchar(50) DEFAULT NULL,
  `Identification Number` varchar(50) DEFAULT NULL,
  `ID Expiration` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan guarantor`
--

INSERT INTO `loan guarantor` (`ID`, `Loan_ID`, `Guarantor`, `Contact`, `Occupation`, `Business Address`, `Identification Type`, `Identification Number`, `ID Expiration`, `Company`) VALUES
(1, 1, 'me', '676/uu', 'ii', 'eeee', 'National ID Card', '7777', '0000-00-00', 'Demo'),
(5, 1, 'Adetoro', '09000', 'tester', '', 'Drivers Licence', '7hhj', '0000-00-00', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `loan officers`
--

CREATE TABLE IF NOT EXISTS `loan officers` (
  `ID` bigint(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan payment`
--

CREATE TABLE IF NOT EXISTS `loan payment` (
  `ID` bigint(11) NOT NULL,
  `Loan ID` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Late Payment` varchar(50) DEFAULT NULL,
  `Late Fee` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan payment`
--

INSERT INTO `loan payment` (`ID`, `Loan ID`, `Date`, `Amount`, `Account Number`, `Late Payment`, `Late Fee`, `Company`) VALUES
(1, '1', '2020-03-29', 15733.33, '000131', NULL, NULL, 'Demo'),
(2, '6', '2020-04-01', 15450.00, '100', NULL, NULL, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `loan type`
--

CREATE TABLE IF NOT EXISTS `loan type` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Rate` decimal(11,2) DEFAULT NULL,
  `Late Rate` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan type`
--

INSERT INTO `loan type` (`ID`, `Type`, `Rate`, `Late Rate`, `Company`) VALUES
(2, 'Esusu - Sunday', 5.00, 1.00, 'Demo'),
(3, 'Esusu Normal', 5.00, 1.00, 'Demo'),
(4, 'Trading Loan', 6.00, 2.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `Location_id` int(11) NOT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_id`, `Location`, `Company`) VALUES
(1, 'Abuja FCT', 'Demo'),
(34, 'Lagos/Shomolu', 'Demo'),
(35, 'Lagos/Ajah', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '',
  `access_lvl` bigint(11) NOT NULL DEFAULT '1',
  `Firstname` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Postal Code` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Fax` varchar(50) DEFAULT NULL,
  `DoB_Day` int(4) DEFAULT NULL,
  `DoB_Month` varchar(20) DEFAULT NULL,
  `DoB_Year` int(4) DEFAULT NULL,
  `Reg Number` varchar(50) DEFAULT NULL,
  `Sponsor` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Reg Date` timestamp NULL DEFAULT NULL,
  `Last_Varr` text,
  `Last_Page` text,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email`, `password`, `username`, `access_lvl`, `Firstname`, `Surname`, `Address`, `City`, `State`, `Nationality`, `Postal Code`, `Phone`, `Fax`, `DoB_Day`, `DoB_Month`, `DoB_Year`, `Reg Number`, `Sponsor`, `Bank`, `Account`, `Reg Date`, `Last_Varr`, `Last_Page`, `Company`) VALUES
(70, 'admin@ncs.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 5, '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '2011-03-15 00:06:34', NULL, 'register.php?', 'Demo'),
(89, 'dejigegs@gmail.com', 'd876b31399be575129188ea7b662c4f2', 'Administrator', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30 Days Free Trial', '2020-11-07 23:00:00', NULL, '', 'WG'),
(91, 'info@waltergates.com', 'f5d1278e8109edd94e1e4197e04873b9', 'Benone', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30 Days Free Trial', '2020-12-07 23:00:00', NULL, NULL, 'Benone Farms'),
(93, 'coop@waltergates.com', '098f6bcd4621d373cade4e832627b4f6', 'waltergates', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30 Days Free Trial', '2021-08-25 23:00:00', NULL, 'index.php?', 'Waltergates Cooperatives');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `ID` bigint(11) NOT NULL,
  `Membership Type` varchar(50) DEFAULT NULL,
  `Membership Number` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `First Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Age` varchar(5) DEFAULT NULL,
  `Contact Number` varchar(20) DEFAULT NULL,
  `Marital Status` varchar(20) DEFAULT NULL,
  `Home Address` varchar(120) DEFAULT NULL,
  `Postal Address` varchar(120) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Office Address` varchar(120) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Next of Kin` varchar(50) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `NKin Contact` varchar(120) DEFAULT NULL,
  `Date Registered` date DEFAULT NULL,
  `Identification Type` varchar(50) DEFAULT NULL,
  `Identification Number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Employer` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `NK Phone` varchar(35) DEFAULT NULL,
  `Mobile Number` varchar(50) DEFAULT NULL,
  `Account Officer` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Active',
  `Officer` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Sponsor` varchar(50) DEFAULT NULL,
  `Termination Date` date DEFAULT NULL,
  `Termination Reason` varchar(100) DEFAULT NULL,
  `Sex` varchar(50) DEFAULT NULL,
  `Daily Contribution` decimal(11,2) DEFAULT NULL,
  `Date of Birth` date DEFAULT NULL,
  `No of Shares` int(11) DEFAULT NULL,
  `Shares Value` decimal(11,2) DEFAULT NULL,
  `SMS` tinyint(1) DEFAULT '1',
  `email alert` tinyint(1) DEFAULT '1',
  `BVN` varchar(20) DEFAULT NULL,
  `Application Date` date DEFAULT NULL,
  `Admission Fee` decimal(11,2) DEFAULT NULL,
  `Bank Account Number` varchar(50) DEFAULT NULL,
  `Bank Name` varchar(50) DEFAULT NULL,
  `Bank Account Name` varchar(50) DEFAULT NULL,
  `ID Expiration` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`ID`, `Membership Type`, `Membership Number`, `Surname`, `First Name`, `Gender`, `Age`, `Contact Number`, `Marital Status`, `Home Address`, `Postal Address`, `Occupation`, `Office Address`, `City`, `State`, `Next of Kin`, `Relationship`, `NKin Contact`, `Date Registered`, `Identification Type`, `Identification Number`, `email`, `Employer`, `Position`, `NK Phone`, `Mobile Number`, `Account Officer`, `Status`, `Officer`, `Branch`, `Sponsor`, `Termination Date`, `Termination Reason`, `Sex`, `Daily Contribution`, `Date of Birth`, `No of Shares`, `Shares Value`, `SMS`, `email alert`, `BVN`, `Application Date`, `Admission Fee`, `Bank Account Number`, `Bank Name`, `Bank Account Name`, `ID Expiration`, `Company`) VALUES
(1, 'Regular', '134454', 'Ola', 'Olumide', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30000, 15000000.00, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Demo'),
(2, '$type', '$acctno', '$sname', '$fname', '$gender', '$age', '$contactno', '$mstatus', '$homeaddress', NULL, '$occupation', '$officeaddress', '$city', '$state', '$nkin', '$relationship', '$nkcontact', '0000-00-00', '$idtype', '$idnumber', '$email', '$employer', '$position', '$nkphone', '$mobileno', NULL, '$status', NULL, NULL, '$sponsor', '0000-00-00', '$exitreason', NULL, NULL, '0000-00-00', NULL, NULL, 0, 0, '$bvn', NULL, 0.00, '$obankno', '$obank', '$obankname', '0000-00-00', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `User Category` varchar(50) DEFAULT NULL,
  `User Name` varchar(50) DEFAULT NULL,
  `Date Logged On` date DEFAULT NULL,
  `File Used` varchar(200) DEFAULT NULL,
  `Details` varchar(200) DEFAULT NULL,
  `Time Logged On` time DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`User Category`, `User Name`, `Date Logged On`, `File Used`, `Details`, `Time Logged On`, `ip`, `Company`) VALUES
('Administrator', 'Admin', '2020-02-27', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '18:42:10', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-27', 'LoginX', 'Logged In As: admin', '18:42:18', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-27', 'Transactions Record', 'Added Transactions Record for Customer: 000130, 100000, Deposit', '05:43:00', NULL, 'Demo'),
('Administrator', 'Admin', '2020-02-27', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '18:43:12', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-27', 'LoginX', 'Logged In As: admin', '18:43:19', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-27', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '18:44:09', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-27', 'LoginX', 'Logged In As: admin', '18:47:30', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-28', 'Logout', 'Logged Out As: Admin', '13:36:24', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-28', 'LoginX', 'Logged In As: admin', '13:36:33', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-02-28', 'Customer Record', 'Added Customer Record for: 000133, Esan', '12:39:00', NULL, 'Demo'),
('Administrator', 'Admin', '2020-02-28', 'Transactions Record', 'Added Transactions Record for Customer: 000133, 5000, Deposit', '12:40:00', NULL, 'Demo'),
('Administrator', 'Admin', '2020-03-02', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '13:34:22', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-02', 'LoginX', 'Logged In As: admin', '13:36:11', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-02', 'Logout', 'Logged Out As: Admin', '13:36:40', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-02', 'LoginX', 'Logged In As: admin', '13:37:01', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-03-06', 'Logout', 'Logged Out As: Demo', '21:34:40', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-03-17', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '17:51:02', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-17', 'LoginX', 'Logged In As: admin', '17:52:12', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-17', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '20:20:01', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-17', 'LoginX', 'Logged In As: admin', '20:20:11', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-18', 'LoginX', 'Logged In As: admin', '06:31:28', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-19', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '09:52:53', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-19', 'LoginX', 'Logged In As: admin', '17:47:42', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-20', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '11:26:06', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-22', 'LoginX', 'Logged In As: admin', '07:43:33', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-23', 'LoginX', 'Logged In As: admin', '18:55:49', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-23', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '18:55:57', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-23', 'LoginX', 'Logged In As: admin', '18:56:05', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-24', 'LoginX', 'Logged In As: admin', '13:50:35', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-03-25', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '13:47:43', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-25', 'LoginX', 'Logged In As: admin', '13:48:51', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-25', 'Logout', 'Logged Out As: Admin', '13:51:13', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-25', 'LoginX', 'Logged In As: admin', '13:51:23', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-27', 'LoginX', 'Logged In As: admin', '09:18:20', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-27', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '14:46:24', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-28', 'LoginX', 'Logged In As: admin', '11:40:38', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-28', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '16:28:51', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-28', 'LoginX', 'Logged In As: admin', '20:55:02', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-29', 'LoginX', 'Logged In As: admin', '07:56:02', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-29', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '09:31:11', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-29', 'LoginX', 'Logged In As: admin', '09:31:18', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-29', 'LoginX', 'Logged In As: admin', '22:37:58', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-30', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '09:14:25', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-30', 'LoginX', 'Logged In As: admin', '09:14:34', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-03-31', 'LoginX', 'Logged In As: admin', '17:17:06', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-04-02', 'LoginX', 'Logged In As: admin', '07:49:50', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-04-03', 'LoginX', 'Logged In As: admin', '10:17:52', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-04-08', 'LoginX', 'Logged In As: admin', '19:21:46', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-04-08', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '19:21:50', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-04-08', 'LoginX', 'Logged In As: admin', '19:21:58', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-04-21', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '18:54:28', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-05-05', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '08:10:13', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-05-05', 'LoginX', 'Logged In As: admin', '08:10:23', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-05-30', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '17:44:44', 'localhost/::1', 'Demo'),
('Administrator', 'Demo', '2020-05-30', 'Logout', 'Logged Out As: Demo', '17:44:45', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-05-30', 'LoginX', 'Logged In As: admin', '17:44:54', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-05-30', 'Contribution Record', 'Added Contribution Record for Customer: 100, 1000', '04:45:00', NULL, 'Demo'),
('Administrator', 'Admin', '2020-06-03', 'LoginX', 'Logged In As: admin', '21:34:29', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-06-03', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '21:34:35', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-06-03', 'LoginX', 'Logged In As: admin', '21:34:43', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-06-03', 'Transactions Record', 'Added Transactions Record for Customer: 0000013230, 1000, Deposit', '08:41:00', NULL, 'Demo'),
('Administrator', 'Admin', '2020-06-04', 'LoginX', 'Logged In As: admin', '15:13:15', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-11-04', 'LoginX', 'Logged In As: admin', '13:43:00', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-11-04', 'Logout', 'Logged Out As: Admin', '13:55:21', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-11-04', 'LoginX', 'Logged In As: admin', '13:55:34', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-11-08', 'Logout', 'Logged Out As: Admin', '10:26:07', 'localhost/127.0.0.1', ''),
('', 'Dejigegs@gmail.com', '2020-11-08', 'School Profile', 'Modified Profile for: WG', '09:47:00', NULL, 'WG'),
('', 'Dejigegs@gmail.com', '2020-11-08', 'School Profile', 'Modified Profile for: WG', '10:04:00', NULL, 'WG'),
('', 'Dejigegs@gmail.com', '2020-11-08', 'School Profile', 'Modified Profile for: WG', '10:05:00', NULL, 'WG'),
('', 'Dejigegs@gmail.com', '2020-11-08', 'School Profile', 'Modified Profile for: WG', '10:06:00', NULL, 'WG'),
('', 'Dejigegs@gmail.com', '2020-11-08', 'School Profile', 'Modified Profile for: ', '10:13:00', NULL, 'WG'),
('Administrator', 'Administrator', '2020-11-08', 'LoginX', 'Logged In As: Administrator', '11:14:48', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'Logout', 'Logged Out As: Administrator', '11:17:44', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'LoginX', 'Logged In As: Administrator', '11:18:00', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'Logout', 'Logged Out As: Administrator', '11:19:22', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'LoginX', 'Logged In As: Administrator', '11:24:54', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'Logout', 'Logged Out As: Administrator', '11:29:36', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'LoginX', 'Logged In As: Administrator', '11:30:05', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'Logout', 'Logged Out As: Administrator', '11:43:09', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:43:35', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'Logout', 'Logged Out As: Admin', '11:44:57', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:45:00', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'Logout', 'Logged Out As: Admin', '11:46:38', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:46:44', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'Logout', 'Logged Out As: Admin', '11:47:06', 'localhost/127.0.0.1', ''),
('', '', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:50:25', 'localhost/127.0.0.1', ''),
('', '', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:50:29', 'localhost/127.0.0.1', ''),
('', '', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:51:23', 'localhost/127.0.0.1', ''),
('', '', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:51:38', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'LoginX', 'Logged In As: Administrator', '11:53:33', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-08', 'Logout', 'Logged Out As: Administrator', '11:53:39', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'LoginX', 'Logged In As: admin', '11:54:22', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-08', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '18:17:19', 'localhost/127.0.0.1', ''),
('Administrator', 'Admin', '2020-11-09', 'LoginX', 'Logged In As: admin', '11:36:55', 'localhost/127.0.0.1', ''),
('Administrator', 'Administrator', '2020-11-20', 'LoginX', 'Logged In As: Administrator', '13:21:36', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-20', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '15:02:30', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-20', 'LoginX', 'Logged In As: Administrator', '15:03:43', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-22', 'Logout', 'Logged Out As: Administrator', '15:02:58', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-22', 'LoginX', 'Logged In As: Administrator', '15:03:27', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Logout', 'Logged Out As: Administrator', '11:38:16', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '11:46:15', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '14:21:24', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '14:21:42', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '17:34:57', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '17:35:11', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Logout', 'Logged Out As: Administrator', '18:12:35', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:12:47', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:13:53', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:14:04', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:15:26', 'localhost/::1', ''),
('Administrator', 'Admin', '2020-11-23', 'LoginX', 'Logged In As: admin', '18:19:17', 'localhost/::1', ''),
('Administrator', 'Admin', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '18:20:21', 'localhost/::1', ''),
('Administrator', 'Admin', '2020-11-23', 'LoginX', 'Logged In As: admin', '18:20:35', 'localhost/::1', ''),
('Administrator', 'Admin', '2020-11-23', 'Logout', 'Logged Out As: Admin', '18:20:38', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:20:51', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:22:46', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:23:36', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:25:56', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:26:24', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:27:05', 'localhost/::1', ''),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:29:36', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:30:49', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:39:23', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:40:29', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:42:06', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:42:25', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '18:42:42', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'Auto-Timedout', 'Auto-TimedOut As: Administrator', '18:43:06', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '19:50:16', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'Logout', 'Logged Out As: Administrator', '19:50:25', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'LoginX', 'Logged In As: Administrator', '19:58:11', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-23', 'Logout', 'Logged Out As: Administrator', '19:58:23', 'localhost/::1', 'WG'),
('Administrator', 'Admin', '2020-11-24', 'LoginX', 'Logged In As: admin', '12:18:42', 'localhost/::1', 'Demo'),
('Administrator', 'Admin', '2020-11-24', 'Logout', 'Logged Out As: Admin', '12:48:37', 'localhost/::1', 'Demo'),
('Administrator', 'Administrator', '2020-11-24', 'LoginX', 'Logged In As: Administrator', '12:48:49', 'localhost/::1', 'WG'),
('Administrator', 'Administrator', '2020-11-24', 'Logout', 'Logged Out As: Administrator', '13:24:29', 'localhost/::1', 'WG'),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:04:50', '::1', ''),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:08:27', '::1', ''),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:13:44', '::1', ''),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:18:39', '::1', ''),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:23:14', '::1', ''),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:24:38', '::1', ''),
('', '', '2020-12-07', 'Forgot Password', 'Password Request by: dejigegs@gmail.com', '18:30:16', '127.0.0.1', ''),
('Administrator', 'Demo', '2021-01-09', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '14:01:25', 'localhost/::1', ''),
('Administrator', '', '2021-02-24', 'Auto-Timedout', 'Auto-TimedOut As: Demo', '13:53:55', 'localhost/::1', ''),
('Administrator', 'Waltergates Cooperatives', '2021-08-26', 'Register', 'Registered New Company as: ', '20:44:34', '::1', 'Waltergates Cooperatives'),
('Administrator', 'Admin', '2021-08-26', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '20:44:38', 'localhost/::1', 'Waltergates Cooperatives'),
('', 'Waltergates Cooperatives', '2021-08-26', 'Register', 'Registered New Company as: ', '20:50:05', '::1', 'Waltergates Cooperatives'),
('', 'Coop@waltergates.com', '2021-08-26', 'School Profile', 'Modified Profile for: ', '07:51:00', NULL, 'Waltergates Cooperatives'),
('Administrator', 'Waltergates', '2021-08-26', 'LoginX', 'Logged In As: waltergates', '20:54:20', 'localhost/::1', 'Waltergates Cooperatives'),
('Administrator', 'Waltergates', '2021-08-26', 'Logout', 'Logged Out As: Waltergates', '20:55:08', 'localhost/::1', 'Waltergates Cooperatives'),
('Administrator', 'Waltergates', '2021-08-26', 'LoginX', 'Logged In As: waltergates', '21:03:43', 'localhost/::1', 'Waltergates Cooperatives'),
('Administrator', 'Waltergates', '2021-08-26', 'Logout', 'Logged Out As: Waltergates', '00:00:55', 'localhost/::1', 'Waltergates Cooperatives'),
('Administrator', 'Waltergates', '2021-08-27', 'LoginX', 'Logged In As: waltergates', '11:33:28', 'localhost/::1', 'Waltergates Cooperatives'),
('Administrator', 'Waltergates', '2021-08-28', 'Auto-Timedout', 'Auto-TimedOut As: Waltergates', '07:27:28', 'localhost/::1', 'Waltergates Cooperatives'),
('Administrator', 'Admin', '2022-03-30', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '17:03:04', 'localhost/127.0.0.1', 'Waltergates'),
('Administrator', 'Admin', '2022-03-30', 'LoginX', 'Logged In As: admin', '17:09:20', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-30', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '22:21:08', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-30', 'LoginX', 'Logged In As: admin', '22:21:16', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-30', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '23:24:46', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-30', 'LoginX', 'Logged In As: admin', '23:24:54', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-31', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '05:28:20', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-31', 'LoginX', 'Logged In As: admin', '05:28:34', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-31', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '07:06:15', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-03-31', 'LoginX', 'Logged In As: admin', '07:06:25', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-04-01', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '16:02:20', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-04-01', 'LoginX', 'Logged In As: admin', '16:31:25', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-04-02', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '08:33:04', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-04-02', 'LoginX', 'Logged In As: admin', '08:33:20', 'localhost/127.0.0.1', 'Demo'),
('Administrator', 'Admin', '2022-04-05', 'Auto-Timedout', 'Auto-TimedOut As: Admin', '08:24:38', 'localhost/127.0.0.1', 'Waltergates'),
('Administrator', 'Admin', '2022-04-05', 'LoginX', 'Logged In As: admin', '08:24:48', 'localhost/127.0.0.1', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `mtracker`
--

CREATE TABLE IF NOT EXISTS `mtracker` (
  `ID` bigint(11) NOT NULL,
  `Month` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Done` tinyint(1) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtracker`
--

INSERT INTO `mtracker` (`ID`, `Month`, `Date`, `Done`, `Company`) VALUES
(0, 'September', '2015-09-01', 1, 'Demo'),
(0, 'May', '2018-05-01', 1, 'Demo'),
(0, 'August', '2018-08-01', 1, 'Demo'),
(0, 'April', '2022-04-01', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `narration`
--

CREATE TABLE IF NOT EXISTS `narration` (
  `ID` bigint(11) NOT NULL,
  `Narration` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narration`
--

INSERT INTO `narration` (`ID`, `Narration`, `Type`, `Company`) VALUES
(1, 'Passbook', 'Income', 'Demo'),
(2, 'Check Book', 'Income', 'Demo'),
(3, 'Loan Application Form', 'Income', 'Demo'),
(4, 'Lease Application Form', 'Income', 'Demo'),
(5, 'Loan Processing Fee', 'Income', 'Demo'),
(6, 'Loan Commitment Fee', 'Income', 'Demo'),
(7, 'Lease Processing Fee', 'Income', 'Demo'),
(8, 'Interest ', 'Income', 'Demo'),
(9, 'Late Charges', 'Income', 'Demo'),
(10, 'Contribution Charges', 'Income', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `Nat_ID` int(11) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`Nat_ID`, `Nationality`) VALUES
(1, 'Nigeria'),
(2, 'Ghana'),
(3, 'Cameroon'),
(4, 'Argentina'),
(5, 'Australia'),
(6, 'Belgium'),
(7, 'Brazil'),
(8, 'Canada'),
(9, 'Chile'),
(10, 'China'),
(11, 'Columbia'),
(12, 'Costa Rica'),
(13, 'Denmark'),
(14, 'Egypt'),
(15, 'Finland'),
(16, 'France'),
(17, 'Germany'),
(18, 'Greece'),
(19, 'Hong Kong'),
(20, 'India'),
(21, 'Indonesia'),
(22, 'Iran'),
(23, 'Ireland'),
(24, 'Israel'),
(25, 'Italy'),
(26, 'Japan'),
(27, 'Korea (South)'),
(28, 'Malaysia'),
(29, 'Mexico'),
(30, 'Netherlands'),
(31, 'New Zealand'),
(32, 'Norway'),
(33, 'Pakistan'),
(34, 'Paraguay'),
(35, 'Peru'),
(36, 'Philippines'),
(37, 'Poland'),
(38, 'Portugal'),
(39, 'Russia'),
(40, 'Saudi Arabia'),
(41, 'Singapore'),
(42, 'South Africa'),
(43, 'Spain'),
(44, 'Sweden'),
(45, 'Switzerland'),
(46, 'Taiwan'),
(47, 'Turkey'),
(48, 'United Arab Emirate'),
(49, 'Uruguay'),
(50, 'Great Britain'),
(51, 'USA'),
(52, 'Venezuela'),
(53, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `next_kin`
--

CREATE TABLE IF NOT EXISTS `next_kin` (
  `Staff Number` varchar(30) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `ID` bigint(11) NOT NULL,
  `Enrollee Code` varchar(50) DEFAULT NULL,
  `Sex` varchar(50) DEFAULT NULL,
  `Blood Group` varchar(50) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `ID` varchar(5) NOT NULL DEFAULT '',
  `Office` varchar(50) DEFAULT NULL,
  `company` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overages`
--

CREATE TABLE IF NOT EXISTS `overages` (
  `ID` bigint(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Note` text,
  `Officer` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pallowances`
--

CREATE TABLE IF NOT EXISTS `pallowances` (
  `Description` varchar(50) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Percent` decimal(10,2) DEFAULT NULL,
  `SortOrder` int(11) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Grade Level` varchar(50) DEFAULT NULL,
  `Step` varchar(50) DEFAULT NULL,
  `Typ` varchar(50) DEFAULT NULL,
  `AllowanceID` varchar(5) DEFAULT NULL,
  `Show` varchar(15) DEFAULT 'Show',
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `Staff Number` varchar(50) DEFAULT NULL,
  `HAmount` decimal(10,2) DEFAULT NULL,
  `LeaveG` decimal(10,2) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Staff Name` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Rank` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Acct No` varchar(50) DEFAULT NULL,
  `Month` varchar(50) DEFAULT NULL,
  `Basic` decimal(10,2) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `In Govt Qtrs` tinyint(1) DEFAULT NULL,
  `Grade Level` varchar(50) DEFAULT NULL,
  `Step` varchar(50) DEFAULT NULL,
  `GPAmount` decimal(10,2) DEFAULT NULL,
  `TDeduction` decimal(10,2) DEFAULT NULL,
  `NetPay` decimal(10,2) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Arrears` decimal(10,2) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `TotPay` decimal(10,2) DEFAULT NULL,
  `OthAllow_Tot` decimal(10,2) DEFAULT NULL,
  `OthDed_Tot` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `RankSortOrder` varchar(50) DEFAULT NULL,
  `PosSortOrder` varchar(50) DEFAULT NULL,
  `LocSortOrder` varchar(50) DEFAULT NULL,
  `BankID` varchar(50) DEFAULT NULL,
  `Office` varchar(50) DEFAULT NULL,
  `Union` varchar(50) DEFAULT NULL,
  `Co-operative` varchar(50) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Pension Managers` varchar(50) DEFAULT NULL,
  `Certified` tinyint(1) DEFAULT '0',
  `days` int(4) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payhistory`
--

CREATE TABLE IF NOT EXISTS `payhistory` (
  `Staff Number` varchar(50) DEFAULT NULL,
  `HAmount` decimal(10,2) DEFAULT NULL,
  `LeaveG` decimal(10,2) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Staff Name` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Rank` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Acct No` varchar(50) DEFAULT NULL,
  `Month` varchar(50) DEFAULT NULL,
  `Basic` decimal(10,2) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `In Govt Qtrs` tinyint(1) DEFAULT NULL,
  `Grade Level` varchar(50) DEFAULT NULL,
  `Step` varchar(50) DEFAULT NULL,
  `GPAmount` decimal(10,2) DEFAULT NULL,
  `TDeduction` decimal(10,2) DEFAULT NULL,
  `NetPay` decimal(10,2) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Arrears` decimal(10,2) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `TotPay` decimal(10,2) DEFAULT NULL,
  `OthAllow_Tot` decimal(10,2) DEFAULT NULL,
  `OthDed_Tot` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `RankSortOrder` varchar(50) DEFAULT NULL,
  `PosSortOrder` varchar(50) DEFAULT NULL,
  `LocSortOrder` varchar(50) DEFAULT NULL,
  `BankID` varchar(50) DEFAULT NULL,
  `Office` varchar(50) DEFAULT NULL,
  `Union` varchar(50) DEFAULT NULL,
  `Co-operative` varchar(50) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Pension Managers` varchar(50) DEFAULT NULL,
  `Certified` tinyint(1) DEFAULT '0',
  `days` int(4) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payr`
--

CREATE TABLE IF NOT EXISTS `payr` (
  `Staff Number` varchar(20) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `SortOrder` varchar(10) DEFAULT NULL,
  `AllowID` varchar(50) DEFAULT NULL,
  `Typ` varchar(50) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payrhistory`
--

CREATE TABLE IF NOT EXISTS `payrhistory` (
  `Staff Number` varchar(20) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `SortOrder` varchar(10) DEFAULT NULL,
  `AllowID` varchar(50) DEFAULT NULL,
  `Typ` varchar(50) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay type`
--

CREATE TABLE IF NOT EXISTS `pay type` (
  `Pay Code` varchar(20) DEFAULT NULL,
  `Pay Type` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pension bank charges`
--

CREATE TABLE IF NOT EXISTS `pension bank charges` (
  `Charges Percent` decimal(10,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pension managers`
--

CREATE TABLE IF NOT EXISTS `pension managers` (
  `Pension Managers` varchar(70) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Code` bigint(11) NOT NULL,
  `company` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pension managers`
--

INSERT INTO `pension managers` (`Pension Managers`, `Address`, `Code`, `company`) VALUES
('IBTC', NULL, 1, ''),
('SIGMA', NULL, 2, ''),
('CRUSADER', NULL, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `Position SortOrder` varchar(15) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Manager` varchar(50) DEFAULT NULL,
  `Report T` varchar(50) DEFAULT NULL,
  `Position Dept` varchar(50) DEFAULT NULL,
  `company` varchar(100) NOT NULL DEFAULT '',
  `id` bigint(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Position SortOrder`, `Position`, `Manager`, `Report T`, `Position Dept`, `company`, `id`) VALUES
('', 'Senior Manager', NULL, NULL, NULL, '', 1),
(NULL, 'HOD', NULL, NULL, NULL, '', 2),
(NULL, 'Head of Unit', NULL, NULL, NULL, '', 3),
(NULL, 'Manager', NULL, NULL, NULL, '', 4),
(NULL, 'Head Driver', NULL, NULL, NULL, '', 5),
(NULL, 'Supervisor', NULL, NULL, NULL, '', 6),
(NULL, 'Driver', NULL, NULL, NULL, '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `Profession` varchar(50) DEFAULT NULL,
  `id` bigint(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`Profession`, `id`, `Company`) VALUES
('Accountant', 1, 'Demo'),
('Administrator', 2, 'Demo'),
('Doctor', 3, 'Demo'),
('Lawyer', 4, 'Demo'),
('Economist', 5, 'Demo'),
('Pharmacist', 6, 'Demo'),
('Nurse', 7, 'Demo'),
('Lab Scientist', 8, 'Demo'),
('Dentist', 9, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `Date` date DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Staff Number` varchar(50) DEFAULT NULL,
  `ID` bigint(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `Qualification` varchar(50) DEFAULT NULL,
  `id` bigint(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`Qualification`, `id`, `Company`) VALUES
('Ph.D', 1, 'Demo'),
('L.L.M', 2, 'Demo'),
('L.L.B', 3, 'Demo'),
('B.L', 4, 'Demo'),
('B.A', 5, 'Demo'),
('B.Sc', 6, 'Demo'),
('M.Sc', 7, 'Demo'),
('PGD', 8, 'Demo'),
('HND', 9, 'Demo'),
('OND', 10, 'Demo'),
('MBBS', 11, 'Demo'),
('B. Pharm', 12, 'Demo'),
('ND', 13, 'Demo'),
('SSCE', 14, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `Reference` varchar(50) NOT NULL DEFAULT '',
  `Action` varchar(150) DEFAULT NULL,
  `Issued By` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `ID` bigint(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `RankID` bigint(15) NOT NULL,
  `Rank` varchar(50) DEFAULT NULL,
  `Rank Sort Order` varchar(50) DEFAULT NULL,
  `Cadre` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`RankID`, `Rank`, `Rank Sort Order`, `Cadre`, `company`) VALUES
(1, 'MD/CEO', '001', NULL, NULL),
(2, 'General Manager', '', NULL, NULL),
(3, 'AGM F&A', '003', NULL, NULL),
(4, 'AGM Medical', '003', NULL, NULL),
(5, 'Medical Manager', '004', NULL, NULL),
(6, 'HR Manager', '004', NULL, NULL),
(7, 'Accounts Manager', '004', NULL, NULL),
(8, 'Senior Accounts Officer', '006', NULL, NULL),
(9, 'Senior Desk Officer', '006', NULL, NULL),
(10, 'Senior Admin Officer', '006', NULL, NULL),
(11, 'Senior ICT Officer', '006', NULL, NULL),
(12, 'HIA', '007', NULL, NULL),
(13, 'Pharmacist', '008', NULL, NULL),
(14, 'Legal Officer', '009', NULL, NULL),
(15, 'Admin Officer', '009', NULL, NULL),
(16, 'Desk Officer', '009', NULL, NULL),
(17, 'Nursing Officer', '009', NULL, NULL),
(18, 'ICT Officer', '009', NULL, NULL),
(19, 'Accounts Officer', '009', NULL, NULL),
(20, 'Audit Officer', '009', NULL, NULL),
(21, 'Secretary', '010', NULL, NULL),
(22, 'Receptionist', '011', NULL, NULL),
(23, 'ICT Assistant', '011', NULL, NULL),
(24, 'Driver', '012', NULL, NULL),
(25, 'Clerk', '013', NULL, NULL),
(26, 'Office Assistant', '014', NULL, NULL),
(27, 'Gateman', '015', NULL, NULL),
(28, 'State Manager', '005', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reg fees`
--

CREATE TABLE IF NOT EXISTS `reg fees` (
  `ID` bigint(11) NOT NULL,
  `Fee` varchar(50) DEFAULT NULL,
  `Amount` decimal(11,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg fees`
--

INSERT INTO `reg fees` (`ID`, `Fee`, `Amount`, `Company`) VALUES
(1, 'File Fees', 200.00, 'Demo'),
(2, 'Insurance Fees', 1000.00, 'Demo'),
(3, 'Application Fees', 1000.00, 'Demo'),
(4, 'Guarantor Fees', 300.00, 'Demo'),
(5, 'Ref fees', 1000.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `remitance`
--

CREATE TABLE IF NOT EXISTS `remitance` (
  `ID` bigint(11) NOT NULL,
  `Bank Remitance` decimal(13,2) DEFAULT NULL,
  `CBN Remitance` decimal(13,2) DEFAULT NULL,
  `Bank Confirm` tinyint(1) DEFAULT NULL,
  `CBN Confirm` tinyint(1) DEFAULT NULL,
  `Bank Date` varchar(25) DEFAULT NULL,
  `CBN Date` varchar(25) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remitance`
--

INSERT INTO `remitance` (`ID`, `Bank Remitance`, `CBN Remitance`, `Bank Confirm`, `CBN Confirm`, `Bank Date`, `CBN Date`, `Bank`, `Company`) VALUES
(1, 500.00, 0.00, 1, 0, '2010/01/25', '', 'UBA', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE IF NOT EXISTS `revenue` (
  `ID` bigint(11) NOT NULL,
  `DoB_Day` int(4) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Paid` tinyint(1) DEFAULT NULL,
  `Classification` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Amount Remitted` decimal(13,2) DEFAULT NULL,
  `Confirmed` tinyint(1) DEFAULT NULL,
  `DoB_Month` varchar(15) DEFAULT NULL,
  `DoB_Year` int(4) DEFAULT NULL,
  `Date Remitted` varchar(12) DEFAULT NULL,
  `Pending` decimal(13,2) DEFAULT NULL,
  `MDA` varchar(50) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Description` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`ID`, `DoB_Day`, `Amount`, `Paid`, `Classification`, `Bank`, `Location`, `Amount Remitted`, `Confirmed`, `DoB_Month`, `DoB_Year`, `Date Remitted`, `Pending`, `MDA`, `Year`, `Description`, `Company`) VALUES
(1, 25, 500000.00, 0, 'Apapa', 'UBA', 'Lagos', 500000.00, 1, 'Jan', 2010, '2010/01/25', 0.00, NULL, NULL, NULL, 'Demo'),
(2, NULL, 4000000.00, 0, 'ANNUAL SERVICE FEE', 'Zenith Bank', NULL, 4000000.00, NULL, NULL, NULL, '2018-12-01', NULL, 'Office of the Accountant General', 2018, 'testing', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
  `ID` bigint(11) NOT NULL,
  `Total Available` int(11) DEFAULT NULL,
  `Max Share` int(11) DEFAULT NULL,
  `Min Share` int(11) DEFAULT NULL,
  `Unit Cost` decimal(11,2) DEFAULT NULL,
  `Shares Premium` decimal(11,2) DEFAULT NULL,
  `Total Left` int(11) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`ID`, `Total Available`, `Max Share`, `Min Share`, `Unit Cost`, `Shares Premium`, `Total Left`, `Company`) VALUES
(1, 3000000, 3000, 20, 500.00, NULL, 30000, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `sms tarrif`
--

CREATE TABLE IF NOT EXISTS `sms tarrif` (
  `ID` bigint(11) NOT NULL,
  `SMS Rate` decimal(6,2) DEFAULT '0.00',
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms tarrif`
--

INSERT INTO `sms tarrif` (`ID`, `SMS Rate`, `Company`) VALUES
(1, 0.00, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Staff Number` varchar(50) NOT NULL DEFAULT '',
  `Surname` varchar(50) DEFAULT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Othername` varchar(50) DEFAULT NULL,
  `Sex` varchar(9) DEFAULT NULL,
  `Initial Rank` varchar(50) DEFAULT NULL,
  `Present Rank` varchar(50) DEFAULT NULL,
  `Level` varchar(10) DEFAULT NULL,
  `Step` char(2) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Height` varchar(20) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Acct No` varchar(50) DEFAULT NULL,
  `Blood Group` varchar(10) DEFAULT NULL,
  `Genotype` varchar(10) DEFAULT NULL,
  `Complexion` varchar(20) DEFAULT NULL,
  `In Govt Qtrs` tinyint(1) DEFAULT NULL,
  `Bank Location` varchar(50) DEFAULT NULL,
  `Bank Branch` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Previous Conviction` tinyint(1) DEFAULT NULL,
  `First Appt` date DEFAULT NULL,
  `Present Appt` date DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `LGA` varchar(50) DEFAULT NULL,
  `Dept` varchar(50) DEFAULT NULL,
  `Home Address` varchar(150) DEFAULT NULL,
  `Contact Address` varchar(150) DEFAULT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Prev Location` varchar(50) DEFAULT NULL,
  `Present Location` varchar(50) DEFAULT NULL,
  `Pres Location Date` date DEFAULT NULL,
  `Employment Type` varchar(50) DEFAULT NULL,
  `Marital Status` varchar(15) DEFAULT NULL,
  `Birth Place` varchar(50) DEFAULT NULL,
  `Wife Name` varchar(50) DEFAULT NULL,
  `Marriage Date` varchar(20) DEFAULT NULL,
  `Wife DoB` varchar(20) DEFAULT NULL,
  `Employment Status` varchar(50) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `Profession` varchar(50) DEFAULT NULL,
  `Confirmed` tinyint(1) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Date Confirmed` date DEFAULT NULL,
  `Pension Managers` varchar(50) DEFAULT NULL,
  `Office` varchar(50) DEFAULT NULL,
  `Arrears` decimal(10,0) DEFAULT NULL,
  `Deduction` decimal(10,0) DEFAULT NULL,
  `Pension Amount` decimal(10,0) DEFAULT NULL,
  `Deformity` varchar(50) DEFAULT NULL,
  `Weight` varchar(20) DEFAULT NULL,
  `File Number` varchar(30) DEFAULT NULL,
  `Barrdate` date DEFAULT NULL,
  `Sworndate` date DEFAULT NULL,
  `Chaffeur` tinyint(4) DEFAULT NULL,
  `Cases` int(11) DEFAULT NULL,
  `Disposed` int(11) DEFAULT NULL,
  `Nat Honour` varchar(50) DEFAULT NULL,
  `GovtQtrs Date` date DEFAULT NULL,
  `Chaffeur Date` date DEFAULT NULL,
  `Ret_Date` date DEFAULT NULL,
  `id` int(4) DEFAULT NULL,
  `Days Worked` int(11) DEFAULT NULL,
  `Personnel Status` varchar(50) DEFAULT NULL,
  `Pensionable` tinyint(1) DEFAULT NULL,
  `PFA Address` text,
  `Tax ID` varchar(50) DEFAULT NULL,
  `Pension Pin` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 9216 kB; InnoDB free: 9216 kB';

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `State` varchar(50) DEFAULT NULL,
  `Nation` varchar(50) DEFAULT NULL,
  `ID` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State`, `Nation`, `ID`) VALUES
('FCT-Abuja', 'Nigeria', 1),
('Abia', 'Nigeria', 2),
('Adamawa', 'Nigeria', 3),
('Akwa Ibom', 'Nigeria', 4),
('Anambra', 'Nigeria', 5),
('Bauchi', 'Nigeria', 6),
('Bayelsa', 'Nigeria', 7),
('Benue', 'Nigeria', 8),
('Borno', 'Nigeria', 9),
('Cross River', 'Nigeria', 10),
('Delta', 'Nigeria', 11),
('Ebonyi', 'Nigeria', 12),
('Edo', 'Nigeria', 13),
('Ekiti', 'Nigeria', 14),
('Gombe', 'Nigeria', 15),
('Imo', 'Nigeria', 16),
('Jigawa', 'Nigeria', 17),
('Kaduna', 'Nigeria', 18),
('Kano', 'Nigeria', 19),
('Katsina', 'Nigeria', 20),
('Kebbi', 'Nigeria', 21),
('Kogi', 'Nigeria', 22),
('Kwara', 'Nigeria', 23),
('Lagos', 'Nigeria', 24),
('Nassarawa', 'Nigeria', 25),
('Niger', 'Nigeria', 26),
('Ogun', 'Nigeria', 27),
('Ondo', 'Nigeria', 28),
('Osun', 'Nigeria', 29),
('Oyo', 'Nigeria', 30),
('Plateau', 'Nigeria', 31),
('Rivers', 'Nigeria', 32),
('Sokoto', 'Nigeria', 33),
('Taraba', 'Nigeria', 34),
('Yobe', 'Nigeria', 35),
('Zamfara', 'Nigeria', 36),
('Enugu', '', 37);

-- --------------------------------------------------------

--
-- Table structure for table `sundry`
--

CREATE TABLE IF NOT EXISTS `sundry` (
  `ID` bigint(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Note` text,
  `Officer` varchar(50) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sundry`
--

INSERT INTO `sundry` (`ID`, `Date`, `Amount`, `Source`, `Note`, `Officer`, `Account Number`, `Type`, `Company`) VALUES
(1, '2019-12-18', 1.00, 'Loan Application Fee', 'Loan Application Fee', 'DEMO', '100', 'Income', 'Demo'),
(2, '2019-12-18', 1.00, 'Loan Processing Fee', 'Loan Processing Fee', 'DEMO', '100', 'Income', 'Demo'),
(3, '2019-12-18', 1.00, 'Loan Insurance Fee', 'Loan Insurance Fee', 'DEMO', '100', 'Income', 'Demo'),
(4, '2020-02-19', 100.00, 'Loan Application Fee', 'Loan Application Fee', 'ADMIN', '000130', 'Income', 'Demo'),
(5, '2020-02-19', 100.00, 'Loan Processing Fee', 'Loan Processing Fee', 'ADMIN', '000130', 'Income', 'Demo'),
(6, '2020-02-28', 500.00, 'Passbook Charge', 'Passbook Charge', 'Admin', '000133', 'Income', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `tax chart`
--

CREATE TABLE IF NOT EXISTS `tax chart` (
  `ID` bigint(11) NOT NULL,
  `Range1` decimal(13,2) DEFAULT NULL,
  `Range2` decimal(13,2) DEFAULT NULL,
  `Percent` decimal(4,2) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE IF NOT EXISTS `timesheet` (
  `ID` bigint(11) NOT NULL,
  `Staff No` varchar(50) DEFAULT NULL,
  `Attendance` varchar(50) DEFAULT NULL,
  `Note` varchar(150) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time In` time DEFAULT NULL,
  `Time Out` time DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `hours` varchar(20) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `Start Date` varchar(20) DEFAULT NULL,
  `End Date` varchar(20) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Organizer` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Performance` varchar(50) DEFAULT NULL,
  `Further Needs` varchar(50) DEFAULT NULL,
  `Notes` varchar(50) DEFAULT NULL,
  `Course Cost` decimal(10,2) DEFAULT NULL,
  `Travel Cost` decimal(10,2) DEFAULT NULL,
  `Staff Number` varchar(50) DEFAULT NULL,
  `ID` bigint(11) NOT NULL,
  `Institute` varchar(50) DEFAULT NULL,
  `Days` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `ID` bigint(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Deposit` decimal(13,2) DEFAULT NULL,
  `Withdrawal` decimal(13,2) DEFAULT NULL,
  `Balance` decimal(13,2) DEFAULT '0.00',
  `Transactor` varchar(50) DEFAULT NULL,
  `Transactor Contact` varchar(50) DEFAULT NULL,
  `Transactor ID Type` varchar(50) DEFAULT NULL,
  `Transactor ID Number` varchar(50) DEFAULT NULL,
  `Officer` varchar(50) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Cheque No` varchar(50) DEFAULT NULL,
  `Account Number` varchar(50) DEFAULT NULL,
  `Transaction Type` varchar(50) DEFAULT NULL,
  `Locked Amount` decimal(11,2) DEFAULT NULL,
  `Book Balance` decimal(11,2) DEFAULT NULL,
  `Teller No` varchar(50) DEFAULT NULL,
  `Mode` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`ID`, `Date`, `Deposit`, `Withdrawal`, `Balance`, `Transactor`, `Transactor Contact`, `Transactor ID Type`, `Transactor ID Number`, `Officer`, `Remark`, `Cheque No`, `Account Number`, `Transaction Type`, `Locked Amount`, `Book Balance`, `Teller No`, `Mode`, `Company`) VALUES
(1, '2020-02-27', 100000.00, NULL, 100000.00, 'Self', '', NULL, NULL, 'ADMIN', '', NULL, '000130', 'Deposit', NULL, 100000.00, '9000', 'Cash', 'Demo'),
(2, '2020-02-28', NULL, 500.00, -500.00, 'Auto Transaction', '', NULL, NULL, 'Admin', 'Passbook Charge', NULL, '000133', 'Withdrawal', NULL, NULL, NULL, NULL, 'Demo'),
(3, '2020-02-28', 5000.00, NULL, 4500.00, 'self', '', NULL, NULL, 'ADMIN', 'test', NULL, '000133', 'Deposit', NULL, 5000.00, '', 'Cash', 'Demo'),
(4, '2020-03-29', NULL, 15733.33, -15733.33, 'Loan Auto Deduction', 'Auto', NULL, NULL, 'Auto', 'Monthly Loan Deduction', NULL, '000131', 'Withdrawal', NULL, NULL, NULL, NULL, 'Demo'),
(5, '2020-04-01', NULL, 39000.00, -39000.00, 'Loan Auto Transaction', '', NULL, NULL, 'ADMIN', 'Loan Disbursement', NULL, '100', 'Withdrawal', NULL, NULL, NULL, NULL, 'Demo'),
(6, '2020-04-01', NULL, 15450.00, -54450.00, 'Loan Auto Deduction', 'Auto', NULL, NULL, 'Auto', 'Monthly Loan Deduction', NULL, '100', 'Withdrawal', NULL, NULL, NULL, NULL, 'Demo'),
(7, '2020-05-30', 1000.00, NULL, -53450.00, 'Ola', NULL, NULL, NULL, 'ADMIN', NULL, NULL, '100', 'Deposit', NULL, NULL, NULL, NULL, 'Demo'),
(8, '2020-05-30', NULL, 0.00, -53450.00, 'Auto Billing', '', NULL, NULL, '', 'SMS Charges', NULL, '100', 'SMS Charges', NULL, NULL, NULL, NULL, 'Demo'),
(9, '2020-06-03', 1000.00, NULL, 1000.00, 'SELF', '', NULL, NULL, 'ADMIN', '', NULL, '0000013230', 'Deposit', NULL, 1000.00, '', 'Cash', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `treasury`
--

CREATE TABLE IF NOT EXISTS `treasury` (
  `ID` bigint(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Note` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Given To` varchar(50) DEFAULT NULL,
  `Given By` varchar(50) DEFAULT NULL,
  `Direction` varchar(20) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasury`
--

INSERT INTO `treasury` (`ID`, `Date`, `Note`, `Amount`, `Given To`, `Given By`, `Direction`, `Company`) VALUES
(2, '2012-02-03', 'GHc20', 200.00, 'gtbank', 'Admin', 'In', 'Demo'),
(3, '2012-02-03', 'GHc50', 200.00, 'cashier', 'Admin', 'Out', 'Demo'),
(4, '2022-03-30', 'GHc100', 6000.00, '', 'Admin', 'Out', 'Demo'),
(5, '2022-03-31', 'GHc100', 3000.00, '', 'Admin', 'Out', 'Demo'),
(6, '2022-03-31', 'GHc100', 4000.00, '', 'Admin', 'In', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `union`
--

CREATE TABLE IF NOT EXISTS `union` (
  `Union ID` int(11) DEFAULT NULL,
  `Union Name` varchar(50) DEFAULT NULL,
  `Descr` varchar(150) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `varcalc`
--

CREATE TABLE IF NOT EXISTS `varcalc` (
  `ID` bigint(11) NOT NULL,
  `Grade Level` varchar(50) DEFAULT NULL,
  `Pay Item` varchar(50) DEFAULT NULL,
  `Old Rate` decimal(11,2) DEFAULT NULL,
  `New Rate` decimal(11,2) DEFAULT NULL,
  `Duration` bigint(11) DEFAULT NULL,
  `Arrears` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE IF NOT EXISTS `variation` (
  `Staff Number` varchar(30) NOT NULL DEFAULT '',
  `Variation` decimal(10,0) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `SortOrder` varchar(50) DEFAULT NULL,
  `AllowID` varchar(50) DEFAULT NULL,
  `Typ` char(2) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Office` varchar(50) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  `For Month` varchar(50) DEFAULT NULL,
  `company` varchar(100) NOT NULL DEFAULT '',
  `ID` bigint(11) NOT NULL,
  `Typ2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variation type`
--

CREATE TABLE IF NOT EXISTS `variation type` (
  `Variation Type` varchar(50) DEFAULT NULL,
  `VarID` varchar(50) DEFAULT NULL,
  `VarGroup` varchar(50) DEFAULT NULL,
  `VarClass` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warning`
--

CREATE TABLE IF NOT EXISTS `warning` (
  `Staff Number` varchar(30) NOT NULL,
  `Reference` varchar(50) NOT NULL,
  `Action` varchar(150) DEFAULT NULL,
  `Issued By` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `ID` bigint(11) NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `welf`
--

CREATE TABLE IF NOT EXISTS `welf` (
  `ID` bigint(11) NOT NULL,
  `TID` bigint(11) NOT NULL,
  `MID` varchar(50) DEFAULT NULL,
  `Share Holding` int(11) DEFAULT NULL,
  `Share Value` decimal(11,2) DEFAULT NULL,
  `Share Percent` double(11,2) DEFAULT NULL,
  `Requested Amount` decimal(11,2) DEFAULT NULL,
  `Participate` varchar(5) DEFAULT NULL,
  `Amount Paid` decimal(11,2) DEFAULT NULL,
  `Paid` varchar(10) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `welf`
--

INSERT INTO `welf` (`ID`, `TID`, `MID`, `Share Holding`, `Share Value`, `Share Percent`, `Requested Amount`, `Participate`, `Amount Paid`, `Paid`, `Company`) VALUES
(1, 1, '1', 30000, 15000000.00, 0.00, 100000.00, 'Yes', 100000.00, 'No', 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE IF NOT EXISTS `welfare` (
  `ID` bigint(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Classification` varchar(70) DEFAULT NULL,
  `Particulars` varchar(50) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Amount Raised` decimal(11,2) DEFAULT NULL,
  `Source` varchar(50) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Recipient` varchar(50) DEFAULT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Paid` varchar(50) DEFAULT NULL,
  `Remark` text,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`ID`, `Type`, `Date`, `Classification`, `Particulars`, `Amount`, `Amount Raised`, `Source`, `Branch`, `Recipient`, `Account`, `Bank`, `Paid`, `Remark`, `Company`) VALUES
(1, 'Welfare', '2019-04-15', 'Office Expenses', 'test Welfare', 100000.00, 0.00, 'Cash', NULL, 'Tester', '', '', 'Unpaid', NULL, 'Demo');

-- --------------------------------------------------------

--
-- Table structure for table `zz`
--

CREATE TABLE IF NOT EXISTS `zz` (
  `sn` varchar(30) DEFAULT NULL,
  `zz` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_config`
--

CREATE TABLE IF NOT EXISTS `_config` (
  `ID` bigint(11) NOT NULL,
  `Coy_Name` varchar(50) NOT NULL,
  `Coy_Alias` varchar(50) DEFAULT NULL,
  `Coy_email` varchar(50) DEFAULT NULL,
  `PORTAL_url` varchar(50) DEFAULT NULL,
  `SMS_email` varchar(50) DEFAULT NULL,
  `SMS_Sub_Acct` varchar(50) DEFAULT NULL,
  `SMS_Sub_Psw` varchar(50) DEFAULT NULL,
  `SMS_Sender` varchar(50) DEFAULT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_config`
--

INSERT INTO `_config` (`ID`, `Coy_Name`, `Coy_Alias`, `Coy_email`, `PORTAL_url`, `SMS_email`, `SMS_Sub_Acct`, `SMS_Sub_Psw`, `SMS_Sender`, `Company`) VALUES
(1, 'Waltergates ltd', 'Waltergates', 'info@waltergates.com', 'www.waltergates.com/mfb', 'info.glecoent.ng@gmail.com', 'GLECOENT', 'rotimi1604', 'GLECOENT', 'Demo'),
(3, 'Benone Farms', 'Benone Farms', 'info@waltergates.com', '', 'info@waltergates.com', 'BenoneFarms', 'tester', 'Benone Farms', 'Benone Farms'),
(4, 'Waltergates Cooperatives', 'Waltergates Cooperatives', 'coop@waltergates.com', '', 'coop@waltergates.com', 'waltergatescooperatives', 'test', 'Waltergates Cooperatives', 'Waltergates Cooperatives'),
(5, 'Waltergates Cooperatives', 'Waltergates Cooperatives', 'coop@waltergates.com', '', 'coop@waltergates.com', 'waltergatescooperatives', 'test', 'Waltergates Cooperatives', 'Waltergates Cooperatives');

-- --------------------------------------------------------

--
-- Table structure for table `_sess`
--

CREATE TABLE IF NOT EXISTS `_sess` (
  `ID` bigint(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Varr` text,
  `Page` text NOT NULL,
  `Company` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account type`
--
ALTER TABLE `account type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `allowance types`
--
ALTER TABLE `allowance types`
  ADD PRIMARY KEY (`AllowanceID`);

--
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset category`
--
ALTER TABLE `asset category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `asset status`
--
ALTER TABLE `asset status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student No` (`Membership No`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_access_levels`
--
ALTER TABLE `cms_access_levels`
  ADD PRIMARY KEY (`access_lvl`);

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`ID`),
  ADD FULLTEXT KEY `Command` (`Command`,`Location`);

--
-- Indexes for table `company info`
--
ALTER TABLE `company info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `creg_fees`
--
ALTER TABLE `creg_fees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `currency detail`
--
ALTER TABLE `currency detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `equip type`
--
ALTER TABLE `equip type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fixed deposit`
--
ALTER TABLE `fixed deposit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `heads`
--
ALTER TABLE `heads`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `heads category`
--
ALTER TABLE `heads category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `interbank`
--
ALTER TABLE `interbank`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invest`
--
ALTER TABLE `invest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lease application`
--
ALTER TABLE `lease application`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lease payment`
--
ALTER TABLE `lease payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lease type`
--
ALTER TABLE `lease type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `leasing`
--
ALTER TABLE `leasing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`LGAID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loan application`
--
ALTER TABLE `loan application`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loan guarantor`
--
ALTER TABLE `loan guarantor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loan officers`
--
ALTER TABLE `loan officers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loan payment`
--
ALTER TABLE `loan payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loan type`
--
ALTER TABLE `loan type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `narration`
--
ALTER TABLE `narration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `overages`
--
ALTER TABLE `overages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg fees`
--
ALTER TABLE `reg fees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `remitance`
--
ALTER TABLE `remitance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sms tarrif`
--
ALTER TABLE `sms tarrif`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sundry`
--
ALTER TABLE `sundry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `treasury`
--
ALTER TABLE `treasury`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `welf`
--
ALTER TABLE `welf`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `welfare`
--
ALTER TABLE `welfare`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `_config`
--
ALTER TABLE `_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `_sess`
--
ALTER TABLE `_sess`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account type`
--
ALTER TABLE `account type`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `asset category`
--
ALTER TABLE `asset category`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `asset status`
--
ALTER TABLE `asset status`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_access_levels`
--
ALTER TABLE `cms_access_levels`
  MODIFY `access_lvl` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `command`
--
ALTER TABLE `command`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company info`
--
ALTER TABLE `company info`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `creg_fees`
--
ALTER TABLE `creg_fees`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `currency detail`
--
ALTER TABLE `currency detail`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `equip type`
--
ALTER TABLE `equip type`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fixed deposit`
--
ALTER TABLE `fixed deposit`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `heads`
--
ALTER TABLE `heads`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `heads category`
--
ALTER TABLE `heads category`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `interbank`
--
ALTER TABLE `interbank`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invest`
--
ALTER TABLE `invest`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lease application`
--
ALTER TABLE `lease application`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lease payment`
--
ALTER TABLE `lease payment`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lease type`
--
ALTER TABLE `lease type`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leasing`
--
ALTER TABLE `leasing`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lga`
--
ALTER TABLE `lga`
  MODIFY `LGAID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=825;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan application`
--
ALTER TABLE `loan application`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan guarantor`
--
ALTER TABLE `loan guarantor`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loan officers`
--
ALTER TABLE `loan officers`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan payment`
--
ALTER TABLE `loan payment`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loan type`
--
ALTER TABLE `loan type`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `narration`
--
ALTER TABLE `narration`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `overages`
--
ALTER TABLE `overages`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reg fees`
--
ALTER TABLE `reg fees`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `remitance`
--
ALTER TABLE `remitance`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sms tarrif`
--
ALTER TABLE `sms tarrif`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `sundry`
--
ALTER TABLE `sundry`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `treasury`
--
ALTER TABLE `treasury`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `welf`
--
ALTER TABLE `welf`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `welfare`
--
ALTER TABLE `welfare`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `_config`
--
ALTER TABLE `_config`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `_sess`
--
ALTER TABLE `_sess`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
