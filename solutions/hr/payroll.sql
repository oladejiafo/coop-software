-- phpMyAdmin SQL Dump
-- version 2.7.0-pl2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 02, 2010 at 01:57 PM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `payroll`
-- 
CREATE DATABASE `ppayroll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE ppayroll;

-- --------------------------------------------------------

-- 
-- Table structure for table `allowance types`
-- 

CREATE TABLE `allowance types` (
  `AllowanceID` int(11) NOT NULL default '0',
  `Description` varchar(50) default NULL,
  `Not in use` tinyint(1) default NULL,
  `SortOrder` int(11) default NULL,
  `Type` char(1) default NULL,
  `Group` char(1) default NULL,
  PRIMARY KEY  (`AllowanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `allowance types`
-- 

INSERT INTO `allowance types` VALUES (22, 'Meal Subsidy', NULL, 2, 'A', 'E');
INSERT INTO `allowance types` VALUES (23, 'Utility', NULL, 2, 'A', 'E');
INSERT INTO `allowance types` VALUES (24, 'Entertainment', NULL, 2, 'A', 'E');
INSERT INTO `allowance types` VALUES (100, 'Basic', 0, 1, 'B', 'E');
INSERT INTO `allowance types` VALUES (101, 'Transport', 0, 2, 'A', 'E');
INSERT INTO `allowance types` VALUES (103, 'Tax', NULL, 12, 'D', 'R');
INSERT INTO `allowance types` VALUES (125, 'Union Due', NULL, 12, 'D', 'R');
INSERT INTO `allowance types` VALUES (250, 'Housing', NULL, 3, 'A', 'E');
INSERT INTO `allowance types` VALUES (260, 'Medical', NULL, 4, 'A', 'E');
INSERT INTO `allowance types` VALUES (261, 'NHF', NULL, 12, 'D', 'R');
INSERT INTO `allowance types` VALUES (262, 'Pension Contribution', NULL, 12, 'D', 'R');
INSERT INTO `allowance types` VALUES (300, 'DSA', NULL, 2, 'A', 'E');
INSERT INTO `allowance types` VALUES (321, 'Journal', NULL, 4, 'A', 'E');
INSERT INTO `allowance types` VALUES (322, 'Research', NULL, 4, 'A', 'E');
INSERT INTO `allowance types` VALUES (324, 'Responsibility', NULL, 4, 'A', 'E');
INSERT INTO `allowance types` VALUES (325, 'Furniture', NULL, 3, 'A', 'E');
INSERT INTO `allowance types` VALUES (326, 'Hazard', NULL, 3, 'A', 'E');
INSERT INTO `allowance types` VALUES (327, 'Shift Duty', NULL, 3, 'A', 'E');
INSERT INTO `allowance types` VALUES (328, 'Inducement', NULL, 3, 'A', 'E');

-- --------------------------------------------------------

-- 
-- Table structure for table `allowances`
-- 

CREATE TABLE `allowances` (
  `AllowanceID` varchar(5) default NULL,
  `Description` varchar(50) default NULL,
  `Amount` decimal(10,2) default NULL,
  `Percent` decimal(10,2) default NULL,
  `SortOrder` int(11) default NULL,
  `Type` char(1) default NULL,
  `Grade Level` varchar(6) default NULL,
  `Step` char(2) default NULL,
  `Typ` char(1) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `allowances`
-- 

INSERT INTO `allowances` VALUES ('100', 'Basic', '5584.08', NULL, 0, 'B', '01/01', '01', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '5749.17', NULL, 0, 'B', '01/02', '02', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '5914.25', NULL, 0, 'B', '01/03', '03', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6079.33', NULL, 0, 'B', '01/04', '04', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6244.42', NULL, 0, 'B', '01/05', '05', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6409.50', NULL, 0, 'B', '01/06', '06', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6574.58', NULL, 0, 'B', '01/07', '07', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6739.67', NULL, 0, 'B', '01/08', '08', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6904.75', NULL, 0, 'B', '01/09', '09', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7069.83', NULL, 0, 'B', '01/10', '10', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7234.92', NULL, 0, 'B', '01/11', '11', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7400.00', NULL, 0, 'B', '01/12', '12', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7565.08', NULL, 0, 'B', '01/13', '13', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7730.17', NULL, 0, 'B', '01/14', '14', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7895.25', NULL, 0, 'B', '01/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '189.81', NULL, 12, 'D', '01/03', '03', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '203.01', NULL, 12, 'D', '01/04', '04', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '216.22', NULL, 12, 'D', '01/05', '05', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '229.43', NULL, 12, 'D', '01/06', '06', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '242.63', NULL, 12, 'D', '01/07', '07', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '255.84', NULL, 12, 'D', '01/08', '08', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '269.05', NULL, 12, 'D', '01/09', '09', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '282.25', NULL, 12, 'D', '01/10', '10', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '295.46', NULL, 12, 'D', '01/11', '11', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '308.67', NULL, 12, 'D', '01/12', '12', 'R');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/12', '12', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '26018.42', NULL, 0, 'B', '11/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3307.85', NULL, 12, 'D', '11/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '27106.00', NULL, 0, 'B', '11/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3525.37', NULL, 12, 'D', '11/02', '02', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3742.88', NULL, 12, 'D', '11/03', '03', 'R');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '163.39', NULL, 12, 'D', '01/01', '01', 'R');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '321.87', NULL, 12, 'D', '01/13', '13', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '335.08', NULL, 12, 'D', '01/14', '14', 'R');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '01/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '348.29', NULL, 12, 'D', '01/15', '15', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '169.81', NULL, 12, 'D', '02/01', '01', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '186.05', NULL, 12, 'D', '02/02', '02', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1743.19', NULL, 12, 'D', '07/08', '08', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2652.17', NULL, 12, 'D', '08/11', '11', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2801.79', NULL, 12, 'D', '09/06', '06', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4562.20', NULL, 12, 'D', '12/04', '04', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5967.22', NULL, 12, 'D', '12/10', '10', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5418.32', NULL, 12, 'D', '13/04', '04', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5731.47', NULL, 12, 'D', '13/05', '05', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6670.92', NULL, 12, 'D', '13/08', '08', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5531.20', NULL, 12, 'D', '14/02', '02', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6283.83', NULL, 12, 'D', '14/04', '04', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5965.40', NULL, 12, 'D', '15/01', '01', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '7246.65', NULL, 12, 'D', '15/04', '04', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '9382.05', NULL, 12, 'D', '15/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '28193.58', NULL, 0, 'B', '11/03', '03', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '29281.17', NULL, 0, 'B', '11/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3960.40', NULL, 12, 'D', '11/04', '04', 'R');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '11/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5483.04', NULL, 12, 'D', '11/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '36894.25', NULL, 0, 'B', '11/11', '11', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '35806.67', NULL, 0, 'B', '11/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5265.52', NULL, 12, 'D', '11/10', '10', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5048.00', NULL, 12, 'D', '11/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '34719.08', NULL, 0, 'B', '11/09', '09', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '33631.50', NULL, 0, 'B', '11/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4830.48', NULL, 12, 'D', '11/08', '08', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4612.96', NULL, 12, 'D', '11/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '32543.92', NULL, 0, 'B', '11/07', '07', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '31456.33', NULL, 0, 'B', '11/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4395.44', NULL, 12, 'D', '11/06', '06', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4177.92', NULL, 12, 'D', '11/05', '05', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '176.60', NULL, 12, 'D', '01/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '30368.75', NULL, 0, 'B', '11/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '02/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '03/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '04/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '500.00', NULL, 1, 'A', '05/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '06/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '07/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '08/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/12', '12', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/13', '13', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/14', '14', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '700.00', NULL, 1, 'A', '09/15', '15', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '10/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/10', '10', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '800.00', NULL, 1, 'A', '12/11', '11', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '13/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/01', '01', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '14/09', '09', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/02', '02', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/03', '03', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/04', '04', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/05', '05', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/06', '06', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/07', '07', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/08', '08', 'E');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/09', '09', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '31873.50', NULL, 0, 'B', '13/01', '01', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '35253.58', NULL, 0, 'B', '14/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5154.88', NULL, 12, 'D', '14/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '37135.17', NULL, 0, 'B', '14/02', '02', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '39016.75', NULL, 0, 'B', '14/03', '03', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8331.25', NULL, 0, 'B', '05/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '387.25', NULL, 12, 'D', '05/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8676.50', NULL, 0, 'B', '05/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '428.68', NULL, 12, 'D', '05/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9021.75', NULL, 0, 'B', '05/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '470.11', NULL, 12, 'D', '05/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9367.00', NULL, 0, 'B', '05/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '511.54', NULL, 12, 'D', '05/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9712.25', NULL, 0, 'B', '05/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '552.97', NULL, 12, 'D', '05/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '10057.50', NULL, 0, 'B', '05/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '594.40', NULL, 12, 'D', '05/06', '06', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5907.52', NULL, 12, 'D', '14/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '40898.33', NULL, 0, 'B', '14/04', '04', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '42779.92', NULL, 0, 'B', '14/05', '05', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '44661.50', NULL, 0, 'B', '14/06', '06', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '46543.08', NULL, 0, 'B', '14/07', '07', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '48424.67', NULL, 0, 'B', '14/08', '08', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '50306.25', NULL, 0, 'B', '14/09', '09', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '39306.17', NULL, 0, 'B', '15/01', '01', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '10402.75', NULL, 0, 'B', '05/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '635.83', NULL, 12, 'D', '05/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '10748.00', NULL, 0, 'B', '05/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '677.26', NULL, 12, 'D', '05/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '11093.25', NULL, 0, 'B', '05/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '718.69', NULL, 12, 'D', '05/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '11438.50', NULL, 0, 'B', '05/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '760.12', NULL, 12, 'D', '05/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '11783.75', NULL, 0, 'B', '05/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '801.55', NULL, 12, 'D', '05/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '12129.00', NULL, 0, 'B', '05/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '842.98', NULL, 12, 'D', '05/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '12474.25', NULL, 0, 'B', '05/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '884.41', NULL, 12, 'D', '05/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '12794.50', NULL, 0, 'B', '05/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '925.84', NULL, 12, 'D', '05/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '13164.75', NULL, 0, 'B', '05/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '967.27', NULL, 12, 'D', '05/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '11173.25', NULL, 0, 'B', '06/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '728.29', NULL, 12, 'D', '06/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '11598.83', NULL, 0, 'B', '06/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '779.36', NULL, 12, 'D', '06/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '12024.42', NULL, 0, 'B', '06/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '830.43', NULL, 12, 'D', '06/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '12450.00', NULL, 0, 'B', '06/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '881.50', NULL, 12, 'D', '06/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '12875.58', NULL, 0, 'B', '06/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '932.57', NULL, 12, 'D', '06/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '13301.17', NULL, 0, 'B', '06/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '983.64', NULL, 12, 'D', '06/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '13726.75', NULL, 0, 'B', '06/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1034.71', NULL, 12, 'D', '06/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '14152.33', NULL, 0, 'B', '06/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1085.78', NULL, 12, 'D', '06/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '14577.92', NULL, 0, 'B', '06/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1136.85', NULL, 12, 'D', '06/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '15003.50', NULL, 0, 'B', '06/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1187.92', NULL, 12, 'D', '06/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '15429.08', NULL, 0, 'B', '06/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1238.99', NULL, 12, 'D', '06/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '15854.67', NULL, 0, 'B', '06/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1290.06', NULL, 12, 'D', '06/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '16280.25', NULL, 0, 'B', '06/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1341.13', NULL, 12, 'D', '06/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '16705.83', NULL, 0, 'B', '06/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1392.20', NULL, 12, 'D', '06/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '17131.42', NULL, 0, 'B', '06/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1442.27', NULL, 12, 'D', '06/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '14536.92', NULL, 0, 'B', '07/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1175.91', NULL, 12, 'D', '07/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '15043.42', NULL, 0, 'B', '07/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1256.95', NULL, 12, 'D', '07/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '15549.92', NULL, 0, 'B', '07/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1337.99', NULL, 12, 'D', '07/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '16056.42', NULL, 0, 'B', '07/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1419.03', NULL, 12, 'D', '07/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '16562.92', NULL, 0, 'B', '07/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1500.07', NULL, 12, 'D', '07/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '17069.42', NULL, 0, 'B', '07/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1581.11', NULL, 12, 'D', '07/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '17575.92', NULL, 0, 'B', '07/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '267.20', NULL, 12, 'D', '02/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7084.75', NULL, 0, 'B', '02/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '283.45', NULL, 12, 'D', '02/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7286.67', NULL, 0, 'B', '02/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '299.68', NULL, 12, 'D', '02/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7490.58', NULL, 0, 'B', '02/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '315.91', NULL, 12, 'D', '02/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7693.50', NULL, 0, 'B', '02/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '332.15', NULL, 12, 'D', '02/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7896.42', NULL, 0, 'B', '02/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '348.38', NULL, 12, 'D', '02/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8099.33', NULL, 0, 'B', '02/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '364.61', NULL, 12, 'D', '02/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8302.25', NULL, 0, 'B', '02/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '383.77', NULL, 12, 'D', '02/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8505.17', NULL, 0, 'B', '02/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '408.12', NULL, 12, 'D', '02/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '5947.67', NULL, 0, 'B', '03/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '192.48', NULL, 12, 'D', '03/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6191.42', NULL, 0, 'B', '03/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '211.98', NULL, 12, 'D', '03/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6435.17', NULL, 0, 'B', '03/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '231.48', NULL, 12, 'D', '03/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6678.92', NULL, 0, 'B', '03/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '250.98', NULL, 12, 'D', '03/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6922.67', NULL, 0, 'B', '03/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '270.48', NULL, 12, 'D', '03/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7166.42', NULL, 0, 'B', '03/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '289.98', NULL, 12, 'D', '03/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7410.17', NULL, 0, 'B', '03/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '309.48', NULL, 12, 'D', '03/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7653.92', NULL, 0, 'B', '03/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '328.98', NULL, 12, 'D', '03/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7897.67', NULL, 0, 'B', '03/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '348.48', NULL, 12, 'D', '03/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8141.42', NULL, 0, 'B', '03/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '367.98', NULL, 12, 'D', '03/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8385.17', NULL, 0, 'B', '03/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '393.72', NULL, 12, 'D', '03/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8628.92', NULL, 0, 'B', '03/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '422.97', NULL, 12, 'D', '03/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8872.67', NULL, 0, 'B', '03/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '452.22', NULL, 12, 'D', '03/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9116.42', NULL, 0, 'B', '03/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '481.47', NULL, 12, 'D', '03/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9360.17', NULL, 0, 'B', '03/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '510.72', NULL, 12, 'D', '03/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6779.08', NULL, 0, 'B', '04/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '258.99', NULL, 12, 'D', '04/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7062.46', NULL, 0, 'B', '04/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '281.66', NULL, 12, 'D', '04/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7345.75', NULL, 0, 'B', '04/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '304.33', NULL, 12, 'D', '04/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7629.08', NULL, 0, 'B', '04/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '326.99', NULL, 12, 'D', '04/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '7912.42', NULL, 0, 'B', '04/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '349.66', NULL, 12, 'D', '04/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8195.75', NULL, 0, 'B', '04/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '372.33', NULL, 12, 'D', '04/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8479.08', NULL, 0, 'B', '04/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '404.99', NULL, 12, 'D', '04/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '8762.42', NULL, 0, 'B', '04/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '438.99', NULL, 12, 'D', '04/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9045.75', NULL, 0, 'B', '04/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '472.99', NULL, 12, 'D', '04/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9329.08', NULL, 0, 'B', '04/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '506.99', NULL, 12, 'D', '04/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9612.42', NULL, 0, 'B', '04/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '540.99', NULL, 12, 'D', '04/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '9895.75', NULL, 0, 'B', '04/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '547.99', NULL, 12, 'D', '04/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '10179.08', NULL, 0, 'B', '04/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '608.99', NULL, 12, 'D', '04/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '10462.41', NULL, 0, 'B', '04/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '642.99', NULL, 12, 'D', '04/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '10745.75', NULL, 0, 'B', '04/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '676.99', NULL, 12, 'D', '04/15', '15', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1662.15', NULL, 12, 'D', '07/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '18082.42', NULL, 0, 'B', '07/08', '08', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '18588.92', NULL, 0, 'B', '07/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1842.23', NULL, 12, 'D', '07/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '19095.42', NULL, 0, 'B', '07/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1905.27', NULL, 12, 'D', '07/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '19601.92', NULL, 0, 'B', '07/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1986.31', NULL, 12, 'D', '07/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '20108.42', NULL, 0, 'B', '07/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2067.35', NULL, 12, 'D', '07/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '20614.92', NULL, 0, 'B', '07/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2148.39', NULL, 12, 'D', '07/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '21121.42', NULL, 0, 'B', '07/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2229.43', NULL, 12, 'D', '07/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '21627.92', NULL, 0, 'B', '07/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2310.47', NULL, 12, 'D', '07/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '17134.75', NULL, 0, 'B', '08/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1591.56', NULL, 12, 'D', '08/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '17737.92', NULL, 0, 'B', '08/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1688.07', NULL, 12, 'D', '08/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '18341.08', NULL, 0, 'B', '08/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1784.57', NULL, 12, 'D', '08/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '18944.25', NULL, 0, 'B', '08/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '1893.02', NULL, 12, 'D', '08/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '19547.42', NULL, 0, 'B', '08/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2001.47', NULL, 12, 'D', '08/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '20150.58', NULL, 0, 'B', '08/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2109.92', NULL, 12, 'D', '08/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '20753.75', NULL, 0, 'B', '08/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2218.37', NULL, 12, 'D', '08/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '21356.92', NULL, 0, 'B', '08/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2326.82', NULL, 12, 'D', '08/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '21960.08', NULL, 0, 'B', '08/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2435.27', NULL, 12, 'D', '08/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '22563.25', NULL, 0, 'B', '08/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2543.72', NULL, 12, 'D', '08/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '23166.42', NULL, 0, 'B', '08/11', '11', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '23769.58', NULL, 0, 'B', '08/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2760.62', NULL, 12, 'D', '08/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '24372.75', NULL, 0, 'B', '08/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2869.62', NULL, 12, 'D', '08/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '24975.92', NULL, 0, 'B', '08/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2977.52', NULL, 12, 'D', '08/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '25579.08', NULL, 0, 'B', '08/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3085.97', NULL, 12, 'D', '08/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '20172.33', NULL, 0, 'B', '09/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2138.63', NULL, 12, 'D', '09/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '20835.50', NULL, 0, 'B', '09/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2271.27', NULL, 12, 'D', '09/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '21498.67', NULL, 0, 'B', '09/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2403.90', NULL, 12, 'D', '09/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '22161.83', NULL, 0, 'B', '09/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2536.53', NULL, 12, 'D', '09/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '22825.00', NULL, 0, 'B', '09/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2669.16', NULL, 12, 'D', '09/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '23488.17', NULL, 0, 'B', '09/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3992.94', NULL, 12, 'D', '10/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '30472.58', NULL, 0, 'B', '10/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4198.67', NULL, 12, 'D', '10/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '31501.25', NULL, 0, 'B', '10/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4404.40', NULL, 12, 'D', '10/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '32529.92', NULL, 0, 'B', '10/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4610.13', NULL, 12, 'D', '10/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '33558.58', NULL, 0, 'B', '10/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4815.86', NULL, 12, 'D', '10/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '28777.67', NULL, 0, 'B', '12/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3859.70', NULL, 12, 'D', '12/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '29948.50', NULL, 0, 'B', '12/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4093.87', NULL, 12, 'D', '12/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '31119.33', NULL, 0, 'B', '12/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4328.03', NULL, 12, 'D', '12/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '32290.17', NULL, 0, 'B', '12/04', '04', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '33461.00', NULL, 0, 'B', '12/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4796.37', NULL, 12, 'D', '12/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '34631.83', NULL, 0, 'B', '12/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5030.54', NULL, 12, 'D', '12/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '35802.67', NULL, 0, 'B', '12/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5264.71', NULL, 12, 'D', '12/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '36973.50', NULL, 0, 'B', '12/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5498.88', NULL, 12, 'D', '12/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '38144.33', NULL, 0, 'B', '12/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5733.05', NULL, 12, 'D', '12/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '39315.17', NULL, 0, 'B', '12/10', '10', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '40486.00', NULL, 0, 'B', '12/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6201.39', NULL, 12, 'D', '12/11', '11', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4478.87', NULL, 12, 'D', '13/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '33439.25', NULL, 0, 'B', '13/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '4792.02', NULL, 12, 'D', '13/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '35005.00', NULL, 0, 'B', '13/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '5105.17', NULL, 12, 'D', '13/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '36570.75', NULL, 0, 'B', '13/04', '04', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '38136.50', NULL, 0, 'B', '13/05', '05', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '39702.25', NULL, 0, 'B', '13/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6044.62', NULL, 12, 'D', '13/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '41268.00', NULL, 0, 'B', '13/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6357.77', NULL, 12, 'D', '13/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '42833.75', NULL, 0, 'B', '13/08', '08', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '44399.50', NULL, 0, 'B', '13/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6984.07', NULL, 12, 'D', '13/09', '09', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6660.14', NULL, 12, 'D', '14/05', '05', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '7036.45', NULL, 12, 'D', '14/06', '06', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '7412.76', NULL, 12, 'D', '14/07', '07', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '7789.07', NULL, 12, 'D', '14/08', '08', 'R');
INSERT INTO `allowances` VALUES ('103', 'Tax', '8165.38', NULL, 12, 'D', '14/09', '09', 'R');
INSERT INTO `allowances` VALUES ('022', 'Meal Subsidy', '900.00', NULL, 1, 'A', '15/01', '01', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '41441.58', NULL, 0, 'B', '15/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6392.48', NULL, 12, 'D', '15/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '43577.00', NULL, 0, 'B', '15/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '6819.57', NULL, 12, 'D', '15/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '45712.42', NULL, 0, 'B', '15/04', '04', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '47847.83', NULL, 0, 'B', '15/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '7673.73', NULL, 12, 'D', '15/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '49983.25', NULL, 0, 'B', '15/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '8100.81', NULL, 12, 'D', '15/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '52118.67', NULL, 0, 'B', '15/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '8527.89', NULL, 12, 'D', '15/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '54254.08', NULL, 0, 'B', '15/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '8954.97', NULL, 12, 'D', '15/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '56389.50', NULL, 0, 'B', '15/09', '09', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '24151.33', NULL, 0, 'B', '09/07', '07', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2934.42', NULL, 12, 'D', '09/07', '07', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '24814.50', NULL, 0, 'B', '09/08', '08', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3067.05', NULL, 12, 'D', '09/08', '08', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '25477.67', NULL, 0, 'B', '09/09', '09', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3199.68', NULL, 12, 'D', '09/09', '09', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '26140.83', NULL, 0, 'B', '09/10', '10', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3332.31', NULL, 12, 'D', '09/10', '10', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '26804.00', NULL, 0, 'B', '09/11', '11', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3464.94', NULL, 12, 'D', '09/11', '11', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '27467.17', NULL, 0, 'B', '09/12', '12', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3597.57', NULL, 12, 'D', '09/12', '12', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '28130.33', NULL, 0, 'B', '09/13', '13', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3730.20', NULL, 12, 'D', '09/13', '13', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '28793.50', NULL, 0, 'B', '09/14', '14', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3862.83', NULL, 12, 'D', '09/14', '14', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '29456.67', NULL, 0, 'B', '09/15', '15', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3995.46', NULL, 12, 'D', '09/15', '15', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '23271.92', NULL, 0, 'B', '10/01', '01', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2758.55', NULL, 12, 'D', '10/01', '01', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '24300.58', NULL, 0, 'B', '10/02', '02', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '2964.28', NULL, 12, 'D', '10/02', '02', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '25329.25', NULL, 0, 'B', '10/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3170.02', NULL, 12, 'D', '10/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '26357.92', NULL, 0, 'B', '10/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3375.75', NULL, 12, 'D', '10/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '27386.58', NULL, 0, 'B', '10/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3581.48', NULL, 12, 'D', '10/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '28415.25', NULL, 0, 'B', '10/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '3787.21', NULL, 12, 'D', '10/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '29443.92', NULL, 0, 'B', '10/07', '07', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '5664.33', NULL, 0, 'B', '02/01', '01', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '5867.25', NULL, 0, 'B', '02/02', '02', 'E');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6070.17', NULL, 0, 'B', '02/03', '03', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '202.28', NULL, 12, 'D', '02/03', '03', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6273.08', NULL, 0, 'B', '02/04', '04', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '218.51', NULL, 12, 'D', '02/04', '04', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6476.00', NULL, 0, 'B', '02/05', '05', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '234.75', NULL, 12, 'D', '02/05', '05', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6678.92', NULL, 0, 'B', '02/06', '06', 'E');
INSERT INTO `allowances` VALUES ('103', 'Tax', '250.98', NULL, 12, 'D', '02/06', '06', 'R');
INSERT INTO `allowances` VALUES ('100', 'Basic', '6881.83', NULL, 0, 'B', '02/07', '07', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/09', '09', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/08', '08', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/07', '07', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/06', '06', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/05', '05', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/04', '04', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/03', '03', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/02', '02', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '300.00', NULL, 3, 'A', '15/01', '01', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/09', '09', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/08', '08', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/07', '07', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/06', '06', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/05', '05', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/04', '04', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/03', '03', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/02', '02', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '200.00', NULL, 3, 'A', '14/01', '01', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/09', '09', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/08', '08', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/07', '07', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/06', '06', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/05', '05', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/04', '04', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/03', '03', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/02', '02', 'E');
INSERT INTO `allowances` VALUES ('324', 'Responsibility', '125.00', NULL, 3, 'A', '13/01', '01', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/01', '01', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/02', '02', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/03', '03', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/04', '04', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/05', '05', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/06', '06', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/07', '07', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/08', '08', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '29339.00', NULL, 1, 'A', '14/09', '09', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/01', '01', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/02', '02', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/03', '03', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/04', '04', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/05', '05', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/06', '06', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/07', '07', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/08', '08', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '44008.50', NULL, 1, 'A', '15/09', '09', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/01', '01', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/02', '02', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/03', '03', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/04', '04', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/05', '05', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/06', '06', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/07', '07', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/08', '08', 'E');
INSERT INTO `allowances` VALUES ('300', 'DSA', '14669.50', NULL, 1, 'A', '13/09', '09', 'E');
INSERT INTO `allowances` VALUES ('23', 'Utility', '7000.00', NULL, 2, 'A', '02/06', NULL, 'E');
INSERT INTO `allowances` VALUES ('326', 'Hazard', '4000.00', NULL, 3, 'A', '01/01', NULL, 'E');

-- --------------------------------------------------------

-- 
-- Table structure for table `analysis`
-- 

CREATE TABLE `analysis` (
  `ID` bigint(11) NOT NULL auto_increment,
  `iclass` varchar(50) default NULL,
  `idetails` varchar(100) default NULL,
  `idate` date default NULL,
  `iamount` decimal(13,2) default NULL,
  `eclass` varchar(50) default NULL,
  `edetails` varchar(100) default NULL,
  `edate` date default NULL,
  `eamount` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `analysis`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `application_details`
-- 

CREATE TABLE `application_details` (
  `ID` bigint(11) NOT NULL auto_increment,
  `surname` varchar(50) default NULL,
  `other_names` varchar(50) default NULL,
  `sex` varchar(50) default NULL,
  `qualification` varchar(50) default NULL,
  `field` varchar(50) default NULL,
  `grad_yr` varchar(10) default NULL,
  `lga` varchar(50) default NULL,
  `state_of_origin` varchar(50) default NULL,
  `date` date default NULL,
  `remarks` varchar(200) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `application_details`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `appointment`
-- 

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL default '0',
  `Staff Number` varchar(30) default NULL,
  `Date` date default NULL,
  `Category` varchar(50) default NULL,
  `Terminate` date default NULL,
  PRIMARY KEY  (`AppointmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `appointment`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `appraisal`
-- 

CREATE TABLE `appraisal` (
  `Staff Number` varchar(30) NOT NULL,
  `Reference` varchar(50) NOT NULL,
  `Period` varchar(50) default NULL,
  `Description` varchar(150) default NULL,
  PRIMARY KEY  (`Reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `appraisal`
-- 

INSERT INTO `appraisal` VALUES ('345678', 'ap/s/0123', 'May 2007', 'Excellent');

-- --------------------------------------------------------

-- 
-- Table structure for table `asset category`
-- 

CREATE TABLE `asset category` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Category` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `asset category`
-- 

INSERT INTO `asset category` VALUES (1, 'Motor Vehicle');
INSERT INTO `asset category` VALUES (2, 'Furniture');

-- --------------------------------------------------------

-- 
-- Table structure for table `asset status`
-- 

CREATE TABLE `asset status` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Status` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `asset status`
-- 

INSERT INTO `asset status` VALUES (1, 'Good');
INSERT INTO `asset status` VALUES (2, 'Obsolete');
INSERT INTO `asset status` VALUES (3, 'Serviceable');
INSERT INTO `asset status` VALUES (4, 'Unserviceable');

-- --------------------------------------------------------

-- 
-- Table structure for table `assets`
-- 

CREATE TABLE `assets` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Code` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  `Name` varchar(50) default NULL,
  `Description` varchar(50) default NULL,
  `Make` varchar(50) default NULL,
  `Quantity` bigint(11) default NULL,
  `Date Acquired` date default NULL,
  `Date Sold` date default NULL,
  `Purchase Price` decimal(13,2) default NULL,
  `Current Value` decimal(13,2) default NULL,
  `Status` varchar(50) default NULL,
  `Serial No` varchar(50) default NULL,
  `Next Maintenance` date default NULL,
  `Comment` varchar(200) default NULL,
  `Sold` tinyint(1) default '0',
  `Amount Sold` decimal(13,2) default NULL,
  `Depreciation` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `assets`
-- 

INSERT INTO `assets` VALUES (1, 'mt/vh/001/ab', 'Abuja', 'Vehicle', 'Van', 'Condo Van', 'Toyota', 1, '2007-12-12', '0000-00-00', '3000000.00', '2000000.00', 'Good', '1245667fgghh778', '0000-00-00', '', 0, '0.00', '700000.00');

-- --------------------------------------------------------

-- 
-- Table structure for table `bank branch`
-- 

CREATE TABLE `bank branch` (
  `BranchID` int(11) NOT NULL default '0',
  `Bank` varchar(50) default NULL,
  `Branch` varchar(50) default NULL,
  PRIMARY KEY  (`BranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `bank branch`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `bank`
-- 

CREATE TABLE `bank` (
  `BankID` int(11) NOT NULL default '0',
  `Name` varchar(50) default NULL,
  `Branch` varchar(50) default NULL,
  `Online` tinyint(1) default NULL,
  `Location` varchar(50) default NULL,
  PRIMARY KEY  (`BankID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `bank`
-- 

INSERT INTO `bank` VALUES (1, 'First Bank Plc', 'Garki', 1, 'Abuja');
INSERT INTO `bank` VALUES (2, 'UBA Plc', 'Wuse II', 1, 'Abuja');
INSERT INTO `bank` VALUES (323, 'GTBank', 'Maitama', 1, 'Abuja');
INSERT INTO `bank` VALUES (515, 'CASH', '', 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `booln`
-- 

CREATE TABLE `booln` (
  `val` tinyint(4) default NULL,
  `type` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `booln`
-- 

INSERT INTO `booln` VALUES (0, 'No');
INSERT INTO `booln` VALUES (1, 'Yes');

-- --------------------------------------------------------

-- 
-- Table structure for table `budget`
-- 

CREATE TABLE `budget` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Month` date default NULL,
  `Class` varchar(50) default NULL,
  `Budget` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `budget`
-- 

INSERT INTO `budget` VALUES (1, 'Expenditure', '2009-01-31', 'Transportation', '30000.00');

-- --------------------------------------------------------

-- 
-- Table structure for table `career`
-- 

CREATE TABLE `career` (
  `From Date` date default NULL,
  `To Date` date default NULL,
  `Position` varchar(50) default NULL,
  `From Location` varchar(50) default NULL,
  `To Command` varchar(50) default NULL,
  `Description` varchar(50) default NULL,
  `Refrence` varchar(50) default NULL,
  `Staff Number` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `career`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `cash`
-- 

CREATE TABLE `cash` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Date` date default NULL,
  `Classification` varchar(50) default NULL,
  `Particulars` varchar(50) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Source` varchar(50) default NULL,
  `Remark` varchar(20) default NULL,
  `Recipient` varchar(50) default NULL,
  `Paid` tinyint(1) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `cash`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `CatID` varchar(15) default NULL,
  `Category` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES ('100', 'Senior Staff');
INSERT INTO `category` VALUES ('200', 'Junior');
INSERT INTO `category` VALUES ('001', 'Management');

-- --------------------------------------------------------

-- 
-- Table structure for table `certification`
-- 

CREATE TABLE `certification` (
  `Staff Number` varchar(30) NOT NULL,
  `Certificate` varchar(50) default NULL,
  `Date` date default NULL,
  `CertID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`CertID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `certification`
-- 

INSERT INTO `certification` VALUES ('NJC0048', 'NATIONAL DIPLOMA', '2001-00-00', 1);
INSERT INTO `certification` VALUES ('NJC0052', 'DIP IN JOURNALISM', '0000-00-00', 2);
INSERT INTO `certification` VALUES ('NJC0135', 'DRIVER TRADE TEST CLASS I', '2005-08-31', 3);
INSERT INTO `certification` VALUES ('NJC0135', 'DRIVER TRADE TEST CLASS II', '2004-07-12', 4);
INSERT INTO `certification` VALUES ('NJC0135', 'DRIVER TRADE TEST CLASS III', '2003-12-16', 5);
INSERT INTO `certification` VALUES ('1717', 'MCSD', '2007-06-09', 6);

-- --------------------------------------------------------

-- 
-- Table structure for table `cheque`
-- 

CREATE TABLE `cheque` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Date` date default NULL,
  `Bank` varchar(50) default NULL,
  `Cheque No` varchar(50) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Particulars` varchar(150) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `cheque`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `children`
-- 

CREATE TABLE `children` (
  `Staff Number` varchar(30) NOT NULL,
  `Name` varchar(50) default NULL,
  `Sex` varchar(10) default NULL,
  `DoB` date default NULL,
  `Child_ID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`Child_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `children`
-- 

INSERT INTO `children` VALUES ('1717', 'Yet to come', 'Female', '0000-00-00', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `cms_access_levels`
-- 

CREATE TABLE `cms_access_levels` (
  `access_lvl` tinyint(4) NOT NULL auto_increment,
  `access_name` varchar(50) default NULL,
  PRIMARY KEY  (`access_lvl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `cms_access_levels`
-- 

INSERT INTO `cms_access_levels` VALUES (1, 'Pay Master');
INSERT INTO `cms_access_levels` VALUES (2, 'Payroll');
INSERT INTO `cms_access_levels` VALUES (3, 'Personnel Head');
INSERT INTO `cms_access_levels` VALUES (4, 'Personnel');
INSERT INTO `cms_access_levels` VALUES (5, 'Fixed Assets Head');
INSERT INTO `cms_access_levels` VALUES (6, 'Fixed assets');
INSERT INTO `cms_access_levels` VALUES (7, 'Administrator');

-- --------------------------------------------------------

-- 
-- Table structure for table `company info`
-- 

CREATE TABLE `company info` (
  `Company Name` varchar(50) default NULL,
  `Address` varchar(50) default NULL,
  `Email` varchar(50) default NULL,
  `Phone` varchar(50) default NULL,
  `City` varchar(50) default NULL,
  `Country` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `company info`
-- 

INSERT INTO `company info` VALUES ('Federal Ministry of Labour', 'Abuja', NULL, NULL, 'Abuja', 'Nigeria');

-- --------------------------------------------------------

-- 
-- Table structure for table `contract`
-- 

CREATE TABLE `contract` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Contractor` varchar(50) default NULL,
  `Contract Date` date default NULL,
  `Contract Title` varchar(50) default NULL,
  `Contract Category` varchar(50) default NULL,
  `Paid` varchar(10) default NULL,
  `Amount` decimal(11,2) default NULL,
  `Amount Paid` decimal(11,2) default NULL,
  `Contact` varchar(50) default NULL,
  `Contract Status` varchar(25) default NULL,
  `Remark` varchar(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `contract`
-- 

INSERT INTO `contract` VALUES (1, 'ade', '2009-02-09', 'HR Automation', 'ICT', 'Unpaid', '10000000.00', '3000000.00', '', 'In Progress', 'Approved');

-- --------------------------------------------------------

-- 
-- Table structure for table `courses`
-- 

CREATE TABLE `courses` (
  `Course Title` varchar(70) default NULL,
  `Duration` varchar(50) default NULL,
  `Description` varchar(150) default NULL,
  `Course Offered by` varchar(50) default NULL,
  `Course Cost` decimal(10,2) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `courses`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `deductsum`
-- 

CREATE TABLE `deductsum` (
  `Description` varchar(50) default NULL,
  `Staff no` varchar(20) default NULL,
  `Amount` decimal(10,2) default NULL,
  `SortOrder` varchar(10) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `deductsum`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `department`
-- 

CREATE TABLE `department` (
  `Dept ID` varchar(15) default NULL,
  `Dept` varchar(50) default NULL,
  `DirID` varchar(15) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `department`
-- 

INSERT INTO `department` VALUES ('01', 'Admin', NULL);
INSERT INTO `department` VALUES ('02', 'F&S', NULL);
INSERT INTO `department` VALUES ('03', 'PRS', NULL);
INSERT INTO `department` VALUES ('04', 'Protocol', NULL);
INSERT INTO `department` VALUES ('05', 'E/S Office', NULL);
INSERT INTO `department` VALUES ('06', 'Audit', NULL);
INSERT INTO `department` VALUES ('07', 'Transport', NULL);
INSERT INTO `department` VALUES ('08', 'Maintenance', NULL);
INSERT INTO `department` VALUES ('06', 'Stores', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `education`
-- 

CREATE TABLE `education` (
  `Staff Number` varchar(30) NOT NULL,
  `School` varchar(50) default NULL,
  `From` date default NULL,
  `To` date default NULL,
  `Qualification` varchar(50) default NULL,
  `Course` varchar(50) default NULL,
  `Place` varchar(50) default NULL,
  `EduID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`EduID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `education`
-- 

INSERT INTO `education` VALUES ('1717', 'FUT Minna', '1985-01-01', '1989-01-01', 'B.Tech', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `employment_history`
-- 

CREATE TABLE `employment_history` (
  `Staff Number` varchar(30) NOT NULL,
  `Employer` varchar(50) default NULL,
  `From` date default NULL,
  `To` date default NULL,
  `Location` varchar(50) default NULL,
  `Position` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `employment_history`
-- 

INSERT INTO `employment_history` VALUES ('1717', 'DSS', '1990-01-01', '1992-11-01', 'Abuja', 'System Analyst');

-- --------------------------------------------------------

-- 
-- Table structure for table `grade level`
-- 

CREATE TABLE `grade level` (
  `GL` varchar(6) NOT NULL,
  `id` bigint(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=220 ;

-- 
-- Dumping data for table `grade level`
-- 

INSERT INTO `grade level` VALUES ('01/01', 1);
INSERT INTO `grade level` VALUES ('01/02', 2);
INSERT INTO `grade level` VALUES ('01/03', 3);
INSERT INTO `grade level` VALUES ('01/04', 4);
INSERT INTO `grade level` VALUES ('01/05', 5);
INSERT INTO `grade level` VALUES ('01/06', 6);
INSERT INTO `grade level` VALUES ('01/07', 7);
INSERT INTO `grade level` VALUES ('01/08', 8);
INSERT INTO `grade level` VALUES ('01/09', 9);
INSERT INTO `grade level` VALUES ('01/10', 10);
INSERT INTO `grade level` VALUES ('01/11', 11);
INSERT INTO `grade level` VALUES ('01/12', 12);
INSERT INTO `grade level` VALUES ('01/13', 13);
INSERT INTO `grade level` VALUES ('01/14', 14);
INSERT INTO `grade level` VALUES ('01/15', 15);
INSERT INTO `grade level` VALUES ('02/01', 16);
INSERT INTO `grade level` VALUES ('02/02', 17);
INSERT INTO `grade level` VALUES ('02/03', 18);
INSERT INTO `grade level` VALUES ('02/04', 19);
INSERT INTO `grade level` VALUES ('02/05', 20);
INSERT INTO `grade level` VALUES ('02/06', 21);
INSERT INTO `grade level` VALUES ('02/07', 22);
INSERT INTO `grade level` VALUES ('02/08', 23);
INSERT INTO `grade level` VALUES ('02/09', 24);
INSERT INTO `grade level` VALUES ('02/10', 25);
INSERT INTO `grade level` VALUES ('02/11', 26);
INSERT INTO `grade level` VALUES ('02/12', 27);
INSERT INTO `grade level` VALUES ('02/13', 28);
INSERT INTO `grade level` VALUES ('02/14', 29);
INSERT INTO `grade level` VALUES ('02/15', 30);
INSERT INTO `grade level` VALUES ('03/01', 31);
INSERT INTO `grade level` VALUES ('03/02', 32);
INSERT INTO `grade level` VALUES ('03/03', 33);
INSERT INTO `grade level` VALUES ('03/04', 34);
INSERT INTO `grade level` VALUES ('03/05', 35);
INSERT INTO `grade level` VALUES ('03/06', 36);
INSERT INTO `grade level` VALUES ('03/07', 37);
INSERT INTO `grade level` VALUES ('03/08', 38);
INSERT INTO `grade level` VALUES ('03/09', 39);
INSERT INTO `grade level` VALUES ('03/10', 40);
INSERT INTO `grade level` VALUES ('03/11', 41);
INSERT INTO `grade level` VALUES ('03/12', 42);
INSERT INTO `grade level` VALUES ('03/13', 43);
INSERT INTO `grade level` VALUES ('03/14', 44);
INSERT INTO `grade level` VALUES ('03/15', 45);
INSERT INTO `grade level` VALUES ('04/01', 46);
INSERT INTO `grade level` VALUES ('04/02', 47);
INSERT INTO `grade level` VALUES ('04/03', 48);
INSERT INTO `grade level` VALUES ('04/04', 49);
INSERT INTO `grade level` VALUES ('04/05', 50);
INSERT INTO `grade level` VALUES ('04/06', 51);
INSERT INTO `grade level` VALUES ('04/07', 52);
INSERT INTO `grade level` VALUES ('04/08', 53);
INSERT INTO `grade level` VALUES ('04/09', 54);
INSERT INTO `grade level` VALUES ('04/10', 55);
INSERT INTO `grade level` VALUES ('04/11', 56);
INSERT INTO `grade level` VALUES ('04/12', 57);
INSERT INTO `grade level` VALUES ('04/13', 58);
INSERT INTO `grade level` VALUES ('04/14', 59);
INSERT INTO `grade level` VALUES ('04/15', 60);
INSERT INTO `grade level` VALUES ('05/01', 61);
INSERT INTO `grade level` VALUES ('05/02', 62);
INSERT INTO `grade level` VALUES ('05/03', 63);
INSERT INTO `grade level` VALUES ('05/04', 64);
INSERT INTO `grade level` VALUES ('05/05', 65);
INSERT INTO `grade level` VALUES ('05/06', 66);
INSERT INTO `grade level` VALUES ('05/07', 67);
INSERT INTO `grade level` VALUES ('05/08', 68);
INSERT INTO `grade level` VALUES ('05/09', 69);
INSERT INTO `grade level` VALUES ('05/10', 70);
INSERT INTO `grade level` VALUES ('05/11', 71);
INSERT INTO `grade level` VALUES ('05/12', 72);
INSERT INTO `grade level` VALUES ('05/13', 73);
INSERT INTO `grade level` VALUES ('05/14', 74);
INSERT INTO `grade level` VALUES ('05/15', 75);
INSERT INTO `grade level` VALUES ('06/01', 76);
INSERT INTO `grade level` VALUES ('06/02', 77);
INSERT INTO `grade level` VALUES ('06/03', 78);
INSERT INTO `grade level` VALUES ('06/04', 79);
INSERT INTO `grade level` VALUES ('06/05', 80);
INSERT INTO `grade level` VALUES ('06/06', 81);
INSERT INTO `grade level` VALUES ('06/07', 82);
INSERT INTO `grade level` VALUES ('06/08', 83);
INSERT INTO `grade level` VALUES ('06/09', 84);
INSERT INTO `grade level` VALUES ('06/10', 85);
INSERT INTO `grade level` VALUES ('06/11', 86);
INSERT INTO `grade level` VALUES ('06/12', 87);
INSERT INTO `grade level` VALUES ('06/13', 88);
INSERT INTO `grade level` VALUES ('06/14', 89);
INSERT INTO `grade level` VALUES ('06/15', 90);
INSERT INTO `grade level` VALUES ('07/01', 91);
INSERT INTO `grade level` VALUES ('07/02', 92);
INSERT INTO `grade level` VALUES ('07/03', 93);
INSERT INTO `grade level` VALUES ('07/04', 94);
INSERT INTO `grade level` VALUES ('07/05', 95);
INSERT INTO `grade level` VALUES ('07/06', 96);
INSERT INTO `grade level` VALUES ('07/07', 97);
INSERT INTO `grade level` VALUES ('07/08', 98);
INSERT INTO `grade level` VALUES ('07/09', 99);
INSERT INTO `grade level` VALUES ('07/10', 100);
INSERT INTO `grade level` VALUES ('07/11', 101);
INSERT INTO `grade level` VALUES ('07/12', 102);
INSERT INTO `grade level` VALUES ('07/13', 103);
INSERT INTO `grade level` VALUES ('07/14', 104);
INSERT INTO `grade level` VALUES ('07/15', 105);
INSERT INTO `grade level` VALUES ('08/01', 106);
INSERT INTO `grade level` VALUES ('08/02', 107);
INSERT INTO `grade level` VALUES ('08/03', 108);
INSERT INTO `grade level` VALUES ('08/04', 109);
INSERT INTO `grade level` VALUES ('08/05', 110);
INSERT INTO `grade level` VALUES ('08/06', 111);
INSERT INTO `grade level` VALUES ('08/07', 112);
INSERT INTO `grade level` VALUES ('08/08', 113);
INSERT INTO `grade level` VALUES ('08/09', 114);
INSERT INTO `grade level` VALUES ('08/10', 115);
INSERT INTO `grade level` VALUES ('08/11', 116);
INSERT INTO `grade level` VALUES ('08/12', 117);
INSERT INTO `grade level` VALUES ('08/13', 118);
INSERT INTO `grade level` VALUES ('08/14', 119);
INSERT INTO `grade level` VALUES ('08/15', 120);
INSERT INTO `grade level` VALUES ('09/01', 121);
INSERT INTO `grade level` VALUES ('09/02', 122);
INSERT INTO `grade level` VALUES ('09/03', 123);
INSERT INTO `grade level` VALUES ('09/04', 124);
INSERT INTO `grade level` VALUES ('09/05', 125);
INSERT INTO `grade level` VALUES ('09/06', 126);
INSERT INTO `grade level` VALUES ('09/07', 127);
INSERT INTO `grade level` VALUES ('09/08', 128);
INSERT INTO `grade level` VALUES ('09/09', 129);
INSERT INTO `grade level` VALUES ('09/10', 130);
INSERT INTO `grade level` VALUES ('09/11', 131);
INSERT INTO `grade level` VALUES ('09/12', 132);
INSERT INTO `grade level` VALUES ('09/13', 133);
INSERT INTO `grade level` VALUES ('09/14', 134);
INSERT INTO `grade level` VALUES ('09/15', 135);
INSERT INTO `grade level` VALUES ('10/01', 136);
INSERT INTO `grade level` VALUES ('10/02', 137);
INSERT INTO `grade level` VALUES ('10/03', 138);
INSERT INTO `grade level` VALUES ('10/04', 139);
INSERT INTO `grade level` VALUES ('10/05', 140);
INSERT INTO `grade level` VALUES ('10/06', 141);
INSERT INTO `grade level` VALUES ('10/07', 142);
INSERT INTO `grade level` VALUES ('10/08', 143);
INSERT INTO `grade level` VALUES ('10/09', 144);
INSERT INTO `grade level` VALUES ('10/10', 145);
INSERT INTO `grade level` VALUES ('10/11', 146);
INSERT INTO `grade level` VALUES ('10/12', 147);
INSERT INTO `grade level` VALUES ('10/13', 148);
INSERT INTO `grade level` VALUES ('10/14', 149);
INSERT INTO `grade level` VALUES ('10/15', 150);
INSERT INTO `grade level` VALUES ('12/01', 151);
INSERT INTO `grade level` VALUES ('12/02', 152);
INSERT INTO `grade level` VALUES ('12/03', 153);
INSERT INTO `grade level` VALUES ('12/04', 154);
INSERT INTO `grade level` VALUES ('12/05', 155);
INSERT INTO `grade level` VALUES ('12/06', 156);
INSERT INTO `grade level` VALUES ('12/07', 157);
INSERT INTO `grade level` VALUES ('12/08', 158);
INSERT INTO `grade level` VALUES ('12/09', 159);
INSERT INTO `grade level` VALUES ('12/10', 160);
INSERT INTO `grade level` VALUES ('12/11', 161);
INSERT INTO `grade level` VALUES ('12/12', 162);
INSERT INTO `grade level` VALUES ('12/13', 163);
INSERT INTO `grade level` VALUES ('12/14', 164);
INSERT INTO `grade level` VALUES ('12/15', 165);
INSERT INTO `grade level` VALUES ('13/01', 166);
INSERT INTO `grade level` VALUES ('13/02', 167);
INSERT INTO `grade level` VALUES ('13/03', 168);
INSERT INTO `grade level` VALUES ('13/04', 169);
INSERT INTO `grade level` VALUES ('13/05', 170);
INSERT INTO `grade level` VALUES ('13/06', 171);
INSERT INTO `grade level` VALUES ('13/07', 172);
INSERT INTO `grade level` VALUES ('13/08', 173);
INSERT INTO `grade level` VALUES ('13/09', 174);
INSERT INTO `grade level` VALUES ('13/10', 175);
INSERT INTO `grade level` VALUES ('13/11', 176);
INSERT INTO `grade level` VALUES ('13/12', 177);
INSERT INTO `grade level` VALUES ('13/13', 178);
INSERT INTO `grade level` VALUES ('13/14', 179);
INSERT INTO `grade level` VALUES ('13/15', 180);
INSERT INTO `grade level` VALUES ('14/01', 181);
INSERT INTO `grade level` VALUES ('14/02', 182);
INSERT INTO `grade level` VALUES ('14/03', 183);
INSERT INTO `grade level` VALUES ('14/04', 184);
INSERT INTO `grade level` VALUES ('14/05', 185);
INSERT INTO `grade level` VALUES ('14/06', 186);
INSERT INTO `grade level` VALUES ('14/07', 187);
INSERT INTO `grade level` VALUES ('14/08', 188);
INSERT INTO `grade level` VALUES ('14/09', 189);
INSERT INTO `grade level` VALUES ('15/01', 190);
INSERT INTO `grade level` VALUES ('15/02', 191);
INSERT INTO `grade level` VALUES ('15/03', 192);
INSERT INTO `grade level` VALUES ('15/04', 193);
INSERT INTO `grade level` VALUES ('15/05', 194);
INSERT INTO `grade level` VALUES ('15/06', 195);
INSERT INTO `grade level` VALUES ('15/07', 196);
INSERT INTO `grade level` VALUES ('15/08', 197);
INSERT INTO `grade level` VALUES ('15/09', 198);
INSERT INTO `grade level` VALUES ('16/01', 199);
INSERT INTO `grade level` VALUES ('16/02', 200);
INSERT INTO `grade level` VALUES ('16/03', 201);
INSERT INTO `grade level` VALUES ('16/04', 202);
INSERT INTO `grade level` VALUES ('16/05', 203);
INSERT INTO `grade level` VALUES ('16/06', 204);
INSERT INTO `grade level` VALUES ('16/07', 205);
INSERT INTO `grade level` VALUES ('16/08', 206);
INSERT INTO `grade level` VALUES ('16/09', 207);
INSERT INTO `grade level` VALUES ('17/01', 208);
INSERT INTO `grade level` VALUES ('17/02', 209);
INSERT INTO `grade level` VALUES ('17/03', 210);
INSERT INTO `grade level` VALUES ('17/04', 211);
INSERT INTO `grade level` VALUES ('17/05', 212);
INSERT INTO `grade level` VALUES ('17/06', 213);
INSERT INTO `grade level` VALUES ('17/07', 214);
INSERT INTO `grade level` VALUES ('17/08', 215);
INSERT INTO `grade level` VALUES ('17/09', 216);
INSERT INTO `grade level` VALUES ('CN/XM', 217);
INSERT INTO `grade level` VALUES ('CN/PS', 218);
INSERT INTO `grade level` VALUES ('CN/AP', 219);

-- --------------------------------------------------------

-- 
-- Table structure for table `heads`
-- 

CREATE TABLE `heads` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Description` varchar(50) default NULL,
  `Code` varchar(50) default NULL,
  `Remarks` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `heads`
-- 

INSERT INTO `heads` VALUES (2, 'Motor Vehicle', '001', NULL, 'Fixed Assets');
INSERT INTO `heads` VALUES (3, 'Vehicle in Transit', '002', NULL, 'Fixed Assets');
INSERT INTO `heads` VALUES (4, 'Office Equipment', '003', NULL, 'Fixed Assets');
INSERT INTO `heads` VALUES (5, 'Workshop Equipment', '004', NULL, 'Fixed Assets');
INSERT INTO `heads` VALUES (6, 'Office Furniture', '005', NULL, 'Fixed Assets');
INSERT INTO `heads` VALUES (7, 'Stock in Warehouse', '006', NULL, 'Current Assets');
INSERT INTO `heads` VALUES (8, 'Stock in Transit', '007', NULL, 'Current Assets');
INSERT INTO `heads` VALUES (9, 'Debtors', '008', NULL, 'Current Assets');
INSERT INTO `heads` VALUES (10, 'Classified Debt', '009', NULL, 'Current Assets');
INSERT INTO `heads` VALUES (11, 'Sales Turnover', '200', NULL, 'Turnover');
INSERT INTO `heads` VALUES (12, 'Cost of Sales', '201', NULL, 'Turnover');
INSERT INTO `heads` VALUES (13, 'Local Transport', '202', NULL, 'Administrative Expenses');
INSERT INTO `heads` VALUES (14, 'Rent', '203', NULL, 'Administrative Expenses');

-- --------------------------------------------------------

-- 
-- Table structure for table `leave`
-- 

CREATE TABLE `leave` (
  `Staff Number` varchar(30) default NULL,
  `LeaveID` int(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `From` date default NULL,
  `To` date default NULL,
  `Days` int(11) default NULL,
  `Date Resumed` date default NULL,
  PRIMARY KEY  (`LeaveID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `leave`
-- 

INSERT INTO `leave` VALUES ('1717', 1, 'Annual Leave', '2008-11-20', '2008-12-31', 30, '2009-01-02');

-- --------------------------------------------------------

-- 
-- Table structure for table `level update`
-- 

CREATE TABLE `level update` (
  `Basic` decimal(10,2) default NULL,
  `Level` varchar(3) default NULL,
  `Step` varchar(3) default NULL,
  `Class` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `level update`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `lga`
-- 

CREATE TABLE `lga` (
  `State` varchar(50) default NULL,
  `LGA` varchar(50) default NULL,
  `LGAID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`LGAID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=827 ;

-- 
-- Dumping data for table `lga`
-- 

INSERT INTO `lga` VALUES ('RIVERS', 'Asaritoru', 2);
INSERT INTO `lga` VALUES ('IMO', 'Aboh mbaise', 3);
INSERT INTO `lga` VALUES ('''', 'Ikosi ejinrin', 4);
INSERT INTO `lga` VALUES ('OYO', 'Oluyole', 5);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Bekwara', 6);
INSERT INTO `lga` VALUES ('OGUN', 'Abeokuta east', 7);
INSERT INTO `lga` VALUES ('OGUN', 'Yemoji', 8);
INSERT INTO `lga` VALUES ('EDO', 'Etsakor', 9);
INSERT INTO `lga` VALUES ('DELTA', 'Ethiope west', 10);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Idemili', 11);
INSERT INTO `lga` VALUES ('KOGI', 'Ijumu iyara', 12);
INSERT INTO `lga` VALUES ('KOGI', 'Mopa-muro', 13);
INSERT INTO `lga` VALUES ('ABIA', 'Aba north', 14);
INSERT INTO `lga` VALUES ('ABIA', 'Aba south', 15);
INSERT INTO `lga` VALUES ('ABIA', 'Arochukwu', 16);
INSERT INTO `lga` VALUES ('ABIA', 'Bende', 17);
INSERT INTO `lga` VALUES ('ABIA', 'Ikwuano', 18);
INSERT INTO `lga` VALUES ('ABIA', 'Isiala-ngwa north', 19);
INSERT INTO `lga` VALUES ('ABIA', 'Isiala-ngwa south', 20);
INSERT INTO `lga` VALUES ('ABIA', 'Isukwuato', 21);
INSERT INTO `lga` VALUES ('ABIA', 'Obiomangwa', 22);
INSERT INTO `lga` VALUES ('ABIA', 'Ohafia', 23);
INSERT INTO `lga` VALUES ('ABIA', 'Osisioma ngwa', 24);
INSERT INTO `lga` VALUES ('ABIA', 'Ugwunagbo', 25);
INSERT INTO `lga` VALUES ('ABIA', 'Ukwa east', 26);
INSERT INTO `lga` VALUES ('ABIA', 'Ukwa west', 27);
INSERT INTO `lga` VALUES ('ABIA', 'Umuahia north', 28);
INSERT INTO `lga` VALUES ('ABIA', 'Umuahia south', 29);
INSERT INTO `lga` VALUES ('ABIA', 'Umu-nneochi', 30);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Demsa', 31);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Fufore', 32);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Ganye', 33);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Girei', 34);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Gombi', 35);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Guyuk', 36);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Hong', 37);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Jada', 38);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Lamurde', 39);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Madagali', 40);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Maiha', 41);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Mayo-belwa', 42);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Michika', 43);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Mubi north', 44);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Mubi south', 45);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Numan', 46);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Shelleng', 47);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Song', 48);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Toungo', 49);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Yola north', 50);
INSERT INTO `lga` VALUES ('ADAMAWA', 'Yola south', 51);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Abak', 52);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Eastern obolo', 53);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Eket', 54);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Esit eket', 55);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Essien udim', 56);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Etim ekpo', 57);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Etinan', 58);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ibeno', 59);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ibesikpo asutan', 60);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ibiono ibom', 61);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ika', 62);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ikono', 63);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ikot abasi', 64);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ikot ekpene', 65);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Ini', 66);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Itu', 67);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Mbo', 68);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Mkpat enin', 69);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Nsit atai', 70);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Nsit ibom', 71);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Nsit ubium', 72);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Uruan', 73);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Urue-offong/oruko', 74);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Uyo', 75);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Aguata', 76);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Anambra east', 77);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Anambra west', 78);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Anaocha', 79);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Awka north', 80);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Awka south', 81);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Ayamelum', 82);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Dunukofia', 83);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Ekwusigo', 84);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Idemili north', 85);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Idemili south', 86);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Ihiala', 87);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Njikoka', 88);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Nnewi north', 89);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Obanliku', 90);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Obubra', 91);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Obudu', 92);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Odukpani', 93);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Ogoja', 94);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Yakurr', 95);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Yala', 96);
INSERT INTO `lga` VALUES ('DELTA', 'Aniocha north', 97);
INSERT INTO `lga` VALUES ('DELTA', 'Aniocha south', 98);
INSERT INTO `lga` VALUES ('DELTA', 'Bomadi', 99);
INSERT INTO `lga` VALUES ('DELTA', 'Burutu', 100);
INSERT INTO `lga` VALUES ('DELTA', 'Ethiope east', 101);
INSERT INTO `lga` VALUES ('DELTA', 'Ethiope west', 102);
INSERT INTO `lga` VALUES ('DELTA', 'Ika north', 103);
INSERT INTO `lga` VALUES ('DELTA', 'Ika south', 104);
INSERT INTO `lga` VALUES ('DELTA', 'Isoko north', 105);
INSERT INTO `lga` VALUES ('DELTA', 'Isoko south', 106);
INSERT INTO `lga` VALUES ('DELTA', 'Ndokwa east', 107);
INSERT INTO `lga` VALUES ('DELTA', 'Ndokwa west', 108);
INSERT INTO `lga` VALUES ('DELTA', 'Okpe', 109);
INSERT INTO `lga` VALUES ('DELTA', 'Oshimili north', 110);
INSERT INTO `lga` VALUES ('DELTA', 'Oshimili south', 111);
INSERT INTO `lga` VALUES ('DELTA', 'Patani', 112);
INSERT INTO `lga` VALUES ('DELTA', 'Sapele', 113);
INSERT INTO `lga` VALUES ('DELTA', 'Udu', 114);
INSERT INTO `lga` VALUES ('DELTA', 'Ughelli north', 115);
INSERT INTO `lga` VALUES ('DELTA', 'Ughelli south', 116);
INSERT INTO `lga` VALUES ('DELTA', 'Ukwuani', 117);
INSERT INTO `lga` VALUES ('DELTA', 'Uvwie', 118);
INSERT INTO `lga` VALUES ('DELTA', 'Warri north', 119);
INSERT INTO `lga` VALUES ('DELTA', 'Warri south', 120);
INSERT INTO `lga` VALUES ('DELTA', 'Warri south west', 121);
INSERT INTO `lga` VALUES ('EBONYI', 'Abakaliki', 122);
INSERT INTO `lga` VALUES ('EBONYI', 'Afikpo north', 123);
INSERT INTO `lga` VALUES ('EBONYI', 'Afikpo south', 124);
INSERT INTO `lga` VALUES ('EBONYI', 'Ebonyi', 125);
INSERT INTO `lga` VALUES ('EBONYI', 'Ezza north', 126);
INSERT INTO `lga` VALUES ('EBONYI', 'Ezza south', 127);
INSERT INTO `lga` VALUES ('EBONYI', 'Ikwo', 128);
INSERT INTO `lga` VALUES ('EBONYI', 'Ishielu', 129);
INSERT INTO `lga` VALUES ('EBONYI', 'Ivo', 130);
INSERT INTO `lga` VALUES ('EBONYI', 'Izzi', 131);
INSERT INTO `lga` VALUES ('EBONYI', 'Ohaozara', 132);
INSERT INTO `lga` VALUES ('EBONYI', 'Ohaukwu', 133);
INSERT INTO `lga` VALUES ('EBONYI', 'Onicha', 134);
INSERT INTO `lga` VALUES ('EDO', 'Akoko-edo', 135);
INSERT INTO `lga` VALUES ('EDO', 'Egor', 136);
INSERT INTO `lga` VALUES ('EDO', 'Esan central', 137);
INSERT INTO `lga` VALUES ('EDO', 'Esan north east', 138);
INSERT INTO `lga` VALUES ('EDO', 'Esan south east', 139);
INSERT INTO `lga` VALUES ('EDO', 'Esan west', 140);
INSERT INTO `lga` VALUES ('EDO', 'Etsako central', 141);
INSERT INTO `lga` VALUES ('EDO', 'Etsako east', 142);
INSERT INTO `lga` VALUES ('EDO', 'Etsako west', 143);
INSERT INTO `lga` VALUES ('EDO', 'Igueben', 144);
INSERT INTO `lga` VALUES ('EDO', 'Ikpoba-okha', 145);
INSERT INTO `lga` VALUES ('EDO', 'Oredo', 146);
INSERT INTO `lga` VALUES ('EDO', 'Orhionmwon', 147);
INSERT INTO `lga` VALUES ('EDO', 'Ovia north east', 148);
INSERT INTO `lga` VALUES ('EDO', 'Ovia south west', 149);
INSERT INTO `lga` VALUES ('EDO', 'Owan east', 150);
INSERT INTO `lga` VALUES ('EDO', 'Owan west', 151);
INSERT INTO `lga` VALUES ('EDO', 'Uhunmwonde', 152);
INSERT INTO `lga` VALUES ('EKITI', 'Ado ekiti', 153);
INSERT INTO `lga` VALUES ('EKITI', 'Aiyekire', 154);
INSERT INTO `lga` VALUES ('EKITI', 'Efon', 155);
INSERT INTO `lga` VALUES ('EKITI', 'Ekiti east', 156);
INSERT INTO `lga` VALUES ('EKITI', 'Ekiti south west', 157);
INSERT INTO `lga` VALUES ('EKITI', 'Ekiti west', 158);
INSERT INTO `lga` VALUES ('EKITI', 'Emure', 159);
INSERT INTO `lga` VALUES ('EKITI', 'Ido-osi', 160);
INSERT INTO `lga` VALUES ('EKITI', 'Ijero', 161);
INSERT INTO `lga` VALUES ('EKITI', 'Ikere', 162);
INSERT INTO `lga` VALUES ('EKITI', 'Ikole', 163);
INSERT INTO `lga` VALUES ('EKITI', 'Ilejemeji', 164);
INSERT INTO `lga` VALUES ('EKITI', 'Irepodun/ifelodun', 165);
INSERT INTO `lga` VALUES ('EKITI', 'Ise/orun', 166);
INSERT INTO `lga` VALUES ('EKITI', 'Moba', 167);
INSERT INTO `lga` VALUES ('EKITI', 'Oye', 168);
INSERT INTO `lga` VALUES ('ENUGU', 'Aninri', 169);
INSERT INTO `lga` VALUES ('ENUGU', 'Awgu', 170);
INSERT INTO `lga` VALUES ('ENUGU', 'Enugu east', 171);
INSERT INTO `lga` VALUES ('ENUGU', 'Enugu north', 172);
INSERT INTO `lga` VALUES ('ENUGU', 'Enugu south', 173);
INSERT INTO `lga` VALUES ('ENUGU', 'Ezeagu', 174);
INSERT INTO `lga` VALUES ('ENUGU', 'Enugu', 175);
INSERT INTO `lga` VALUES ('ENUGU', 'Igbo-etit', 176);
INSERT INTO `lga` VALUES ('ENUGU', 'Igbo-eze north', 177);
INSERT INTO `lga` VALUES ('ENUGU', 'Igho-eze south', 178);
INSERT INTO `lga` VALUES ('ENUGU', 'Isi-uzo', 179);
INSERT INTO `lga` VALUES ('ENUGU', 'Nkanu east', 180);
INSERT INTO `lga` VALUES ('ENUGU', 'Nkanu west', 181);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Nnewi south', 182);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Ogbaru', 183);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Onitsha north', 184);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Onitsha south', 185);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Orumba north', 186);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Orumba south', 187);
INSERT INTO `lga` VALUES ('ANAMBRA', 'Oyi', 188);
INSERT INTO `lga` VALUES ('BAUCHI', 'Alkaleri', 189);
INSERT INTO `lga` VALUES ('BAUCHI', 'Bauchi', 190);
INSERT INTO `lga` VALUES ('BAUCHI', 'Bogoro', 191);
INSERT INTO `lga` VALUES ('BAUCHI', 'Damban', 192);
INSERT INTO `lga` VALUES ('BAUCHI', 'Darazo', 193);
INSERT INTO `lga` VALUES ('BAUCHI', 'Dass', 194);
INSERT INTO `lga` VALUES ('BAUCHI', 'Gamawa', 195);
INSERT INTO `lga` VALUES ('BAUCHI', 'Ganjuwa', 196);
INSERT INTO `lga` VALUES ('BAUCHI', 'Giade', 197);
INSERT INTO `lga` VALUES ('BAUCHI', 'Itas/gadau', 198);
INSERT INTO `lga` VALUES ('BAUCHI', 'Jama''are', 199);
INSERT INTO `lga` VALUES ('BAUCHI', 'Katagun', 200);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Gusau', 201);
INSERT INTO `lga` VALUES ('BAUCHI', 'Kirfi', 202);
INSERT INTO `lga` VALUES ('BAUCHI', 'Misau', 203);
INSERT INTO `lga` VALUES ('BAUCHI', 'Ningi', 204);
INSERT INTO `lga` VALUES ('BAUCHI', 'Shira', 205);
INSERT INTO `lga` VALUES ('BAUCHI', 'Tafawa-balewa', 206);
INSERT INTO `lga` VALUES ('BAUCHI', 'Toro', 207);
INSERT INTO `lga` VALUES ('BAUCHI', 'Warji', 208);
INSERT INTO `lga` VALUES ('BAUCHI', 'Zaki', 209);
INSERT INTO `lga` VALUES ('BAYELSA', 'Brass', 210);
INSERT INTO `lga` VALUES ('BAYELSA', 'Ekeremor', 211);
INSERT INTO `lga` VALUES ('BAYELSA', 'Kolokuma/opokuma', 212);
INSERT INTO `lga` VALUES ('BAYELSA', 'Nembe', 213);
INSERT INTO `lga` VALUES ('BAYELSA', 'Ogbia', 214);
INSERT INTO `lga` VALUES ('BAYELSA', 'Sagbama', 215);
INSERT INTO `lga` VALUES ('BAYELSA', 'Southern ijaw', 216);
INSERT INTO `lga` VALUES ('BAYELSA', 'Yenegoa', 217);
INSERT INTO `lga` VALUES ('BENUE', 'Ado', 218);
INSERT INTO `lga` VALUES ('BENUE', 'Agatu', 219);
INSERT INTO `lga` VALUES ('BENUE', 'Apa', 220);
INSERT INTO `lga` VALUES ('BENUE', 'Buruku', 221);
INSERT INTO `lga` VALUES ('BENUE', 'Gboko', 222);
INSERT INTO `lga` VALUES ('BENUE', 'Guma', 223);
INSERT INTO `lga` VALUES ('BENUE', 'Gwer east', 224);
INSERT INTO `lga` VALUES ('BENUE', 'Gwer west', 225);
INSERT INTO `lga` VALUES ('BENUE', 'Katsina-ala', 226);
INSERT INTO `lga` VALUES ('BENUE', 'Konshisha', 227);
INSERT INTO `lga` VALUES ('BENUE', 'Kwande', 228);
INSERT INTO `lga` VALUES ('BENUE', 'Logo', 229);
INSERT INTO `lga` VALUES ('BENUE', 'Makurdi', 230);
INSERT INTO `lga` VALUES ('BENUE', 'Obi', 231);
INSERT INTO `lga` VALUES ('BENUE', 'Ogbadibo', 232);
INSERT INTO `lga` VALUES ('BENUE', 'Oju', 233);
INSERT INTO `lga` VALUES ('BENUE', 'Okpokwu', 234);
INSERT INTO `lga` VALUES ('BENUE', 'Ohimini', 235);
INSERT INTO `lga` VALUES ('BENUE', 'Oturkpo', 236);
INSERT INTO `lga` VALUES ('BENUE', 'Tarka', 237);
INSERT INTO `lga` VALUES ('BENUE', 'Ukum', 238);
INSERT INTO `lga` VALUES ('BENUE', 'Ushongo', 239);
INSERT INTO `lga` VALUES ('BENUE', 'Vandeikya', 240);
INSERT INTO `lga` VALUES ('BORNO', 'Abadam', 241);
INSERT INTO `lga` VALUES ('BORNO', 'Askira/uba', 242);
INSERT INTO `lga` VALUES ('BORNO', 'Bama', 243);
INSERT INTO `lga` VALUES ('BORNO', 'Bayo', 244);
INSERT INTO `lga` VALUES ('BORNO', 'Biu', 245);
INSERT INTO `lga` VALUES ('BORNO', 'Chibok', 246);
INSERT INTO `lga` VALUES ('BORNO', 'Damboa', 247);
INSERT INTO `lga` VALUES ('BORNO', 'Dikwa', 248);
INSERT INTO `lga` VALUES ('BORNO', 'Gubio', 249);
INSERT INTO `lga` VALUES ('BORNO', 'Guzamala', 250);
INSERT INTO `lga` VALUES ('BORNO', 'Gwoza', 251);
INSERT INTO `lga` VALUES ('BORNO', 'Hawul', 252);
INSERT INTO `lga` VALUES ('BORNO', 'Jere', 253);
INSERT INTO `lga` VALUES ('BORNO', 'Kaga', 254);
INSERT INTO `lga` VALUES ('BORNO', 'Kala/balge', 255);
INSERT INTO `lga` VALUES ('BORNO', 'Konduga', 256);
INSERT INTO `lga` VALUES ('BORNO', 'Kukawa', 257);
INSERT INTO `lga` VALUES ('BORNO', 'Kwaya kusar', 258);
INSERT INTO `lga` VALUES ('BORNO', 'Mafa', 259);
INSERT INTO `lga` VALUES ('BORNO', 'Magumeri', 260);
INSERT INTO `lga` VALUES ('BORNO', 'Maiduguri', 261);
INSERT INTO `lga` VALUES ('BORNO', 'Marte', 262);
INSERT INTO `lga` VALUES ('BORNO', 'Mobbar', 263);
INSERT INTO `lga` VALUES ('BORNO', 'Monguno', 264);
INSERT INTO `lga` VALUES ('BORNO', 'Ngala', 265);
INSERT INTO `lga` VALUES ('BORNO', 'Nganzai', 266);
INSERT INTO `lga` VALUES ('BORNO', 'Shani', 267);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Abi', 268);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Akamkpa', 269);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Akpabuyo', 270);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Bakassi', 271);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Bekwara', 272);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Biase', 273);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Boki', 274);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Calabar-municipal', 275);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Calabar south', 276);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Etung', 277);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Ikom', 278);
INSERT INTO `lga` VALUES ('ENUGU', 'Nsukka', 279);
INSERT INTO `lga` VALUES ('ENUGU', 'Oji-river', 280);
INSERT INTO `lga` VALUES ('ENUGU', 'Udenu', 281);
INSERT INTO `lga` VALUES ('ENUGU', 'Udi', 282);
INSERT INTO `lga` VALUES ('ENUGU', 'Uzo-uwani', 283);
INSERT INTO `lga` VALUES ('GOMBE', 'Akko', 284);
INSERT INTO `lga` VALUES ('GOMBE', 'Balanga', 285);
INSERT INTO `lga` VALUES ('GOMBE', 'Billiri', 286);
INSERT INTO `lga` VALUES ('GOMBE', 'Dukku', 287);
INSERT INTO `lga` VALUES ('GOMBE', 'Funakaye', 288);
INSERT INTO `lga` VALUES ('GOMBE', 'Gombe', 289);
INSERT INTO `lga` VALUES ('GOMBE', 'Kaltungo', 290);
INSERT INTO `lga` VALUES ('GOMBE', 'Kwami', 291);
INSERT INTO `lga` VALUES ('GOMBE', 'Nafada', 292);
INSERT INTO `lga` VALUES ('GOMBE', 'Shomgom', 293);
INSERT INTO `lga` VALUES ('GOMBE', 'Yamaltu/deba', 294);
INSERT INTO `lga` VALUES ('IMO', 'Ahiazu-mbaise', 295);
INSERT INTO `lga` VALUES ('IMO', 'Ehime-mbano', 296);
INSERT INTO `lga` VALUES ('IMO', 'Ezinihitte', 297);
INSERT INTO `lga` VALUES ('IMO', 'Ideato north', 298);
INSERT INTO `lga` VALUES ('IMO', 'Ideato south', 299);
INSERT INTO `lga` VALUES ('IMO', 'Ihitte-uboma', 300);
INSERT INTO `lga` VALUES ('IMO', 'Ikeduru', 301);
INSERT INTO `lga` VALUES ('IMO', 'Isiala mbano', 302);
INSERT INTO `lga` VALUES ('IMO', 'Isu', 303);
INSERT INTO `lga` VALUES ('IMO', 'Mbaitoli', 304);
INSERT INTO `lga` VALUES ('IMO', 'Ngor-okpala', 305);
INSERT INTO `lga` VALUES ('IMO', 'Njaba', 306);
INSERT INTO `lga` VALUES ('IMO', 'Nwangele', 307);
INSERT INTO `lga` VALUES ('IMO', 'Nkwerre', 308);
INSERT INTO `lga` VALUES ('IMO', 'Obowo', 309);
INSERT INTO `lga` VALUES ('IMO', 'Oguta', 310);
INSERT INTO `lga` VALUES ('IMO', 'Ohaji/egbema', 311);
INSERT INTO `lga` VALUES ('IMO', 'Okigwe', 312);
INSERT INTO `lga` VALUES ('IMO', 'Orlu', 313);
INSERT INTO `lga` VALUES ('IMO', 'Orsu', 314);
INSERT INTO `lga` VALUES ('IMO', 'Oru east', 315);
INSERT INTO `lga` VALUES ('IMO', 'Oru west', 316);
INSERT INTO `lga` VALUES ('IMO', 'Owerri muni.', 317);
INSERT INTO `lga` VALUES ('IMO', 'Owerri north', 318);
INSERT INTO `lga` VALUES ('IMO', 'Owerri west', 319);
INSERT INTO `lga` VALUES ('IMO', 'Onuimo', 320);
INSERT INTO `lga` VALUES ('JIGAWA', 'Auyo', 321);
INSERT INTO `lga` VALUES ('JIGAWA', 'Babura', 322);
INSERT INTO `lga` VALUES ('JIGAWA', 'Birnin kudu', 323);
INSERT INTO `lga` VALUES ('JIGAWA', 'Biriniwa', 324);
INSERT INTO `lga` VALUES ('JIGAWA', 'Buji', 325);
INSERT INTO `lga` VALUES ('JIGAWA', 'Dutse', 326);
INSERT INTO `lga` VALUES ('JIGAWA', 'Gagarawa', 327);
INSERT INTO `lga` VALUES ('JIGAWA', 'Garki', 328);
INSERT INTO `lga` VALUES ('JIGAWA', 'Gumel', 329);
INSERT INTO `lga` VALUES ('JIGAWA', 'Guri', 330);
INSERT INTO `lga` VALUES ('JIGAWA', 'Gwaram', 331);
INSERT INTO `lga` VALUES ('JIGAWA', 'Gwiwa', 332);
INSERT INTO `lga` VALUES ('JIGAWA', 'Hadejia', 333);
INSERT INTO `lga` VALUES ('JIGAWA', 'Jahun', 334);
INSERT INTO `lga` VALUES ('JIGAWA', 'Kafin', 335);
INSERT INTO `lga` VALUES ('JIGAWA', 'Hausa', 336);
INSERT INTO `lga` VALUES ('JIGAWA', 'Kaugama', 337);
INSERT INTO `lga` VALUES ('JIGAWA', 'Kazaure', 338);
INSERT INTO `lga` VALUES ('JIGAWA', 'Kiri kasamma', 339);
INSERT INTO `lga` VALUES ('JIGAWA', 'Kiyawa', 340);
INSERT INTO `lga` VALUES ('JIGAWA', 'Maigatari', 341);
INSERT INTO `lga` VALUES ('JIGAWA', 'Malam madori', 342);
INSERT INTO `lga` VALUES ('JIGAWA', 'Miga', 343);
INSERT INTO `lga` VALUES ('JIGAWA', 'Ringim', 344);
INSERT INTO `lga` VALUES ('JIGAWA', 'Roni', 345);
INSERT INTO `lga` VALUES ('JIGAWA', 'Sule-tankarkar', 346);
INSERT INTO `lga` VALUES ('JIGAWA', 'Taura', 347);
INSERT INTO `lga` VALUES ('JIGAWA', 'Yankwashi', 348);
INSERT INTO `lga` VALUES ('KADUNA', 'Birnin-gwari', 349);
INSERT INTO `lga` VALUES ('KADUNA', 'Chikun', 350);
INSERT INTO `lga` VALUES ('KADUNA', 'Giwa', 351);
INSERT INTO `lga` VALUES ('KADUNA', 'Igabi', 352);
INSERT INTO `lga` VALUES ('KADUNA', 'Ikara', 353);
INSERT INTO `lga` VALUES ('KADUNA', 'Jaba', 354);
INSERT INTO `lga` VALUES ('KADUNA', 'Jema''a', 355);
INSERT INTO `lga` VALUES ('KADUNA', 'Kachia', 356);
INSERT INTO `lga` VALUES ('KADUNA', 'Kaduna north', 357);
INSERT INTO `lga` VALUES ('KADUNA', 'Kaduna south', 358);
INSERT INTO `lga` VALUES ('KADUNA', 'Kagarko', 359);
INSERT INTO `lga` VALUES ('KADUNA', 'Kajuru', 360);
INSERT INTO `lga` VALUES ('KADUNA', 'Kaura', 361);
INSERT INTO `lga` VALUES ('KADUNA', 'Kubau', 362);
INSERT INTO `lga` VALUES ('KADUNA', 'Kudan', 363);
INSERT INTO `lga` VALUES ('KADUNA', 'Lere', 364);
INSERT INTO `lga` VALUES ('KADUNA', 'Makarfi', 365);
INSERT INTO `lga` VALUES ('KADUNA', 'Sabon-gari', 366);
INSERT INTO `lga` VALUES ('KADUNA', 'Sanga', 367);
INSERT INTO `lga` VALUES ('KADUNA', 'Soba', 368);
INSERT INTO `lga` VALUES ('KADUNA', 'Zangon-kataf', 369);
INSERT INTO `lga` VALUES ('KADUNA', 'Zaria', 370);
INSERT INTO `lga` VALUES ('KANO', 'Ajingi', 371);
INSERT INTO `lga` VALUES ('KANO', 'Albasu', 372);
INSERT INTO `lga` VALUES ('KANO', 'Bagwai', 373);
INSERT INTO `lga` VALUES ('KANO', 'Bebeji', 374);
INSERT INTO `lga` VALUES ('KANO', 'Bichi', 375);
INSERT INTO `lga` VALUES ('KANO', 'Bunkure', 376);
INSERT INTO `lga` VALUES ('KANO', 'Dala', 377);
INSERT INTO `lga` VALUES ('KANO', 'Dambatta', 378);
INSERT INTO `lga` VALUES ('KANO', 'Dawakin kudu', 379);
INSERT INTO `lga` VALUES ('KANO', 'Dawakin tofa', 380);
INSERT INTO `lga` VALUES ('KANO', 'Doguwa', 381);
INSERT INTO `lga` VALUES ('KANO', 'Fagge', 382);
INSERT INTO `lga` VALUES ('KANO', 'Gabasawa', 383);
INSERT INTO `lga` VALUES ('KANO', 'Garko', 384);
INSERT INTO `lga` VALUES ('KANO', 'Garum mallarn', 385);
INSERT INTO `lga` VALUES ('KANO', 'Gaya', 386);
INSERT INTO `lga` VALUES ('KANO', 'Gezawa', 387);
INSERT INTO `lga` VALUES ('KANO', 'Gwale', 388);
INSERT INTO `lga` VALUES ('KANO', 'Gwarzo', 389);
INSERT INTO `lga` VALUES ('KANO', 'Kabo', 390);
INSERT INTO `lga` VALUES ('KANO', 'Kano municipal', 391);
INSERT INTO `lga` VALUES ('KANO', 'Karaye', 392);
INSERT INTO `lga` VALUES ('KANO', 'Kibiya', 393);
INSERT INTO `lga` VALUES ('KANO', 'Kiru', 394);
INSERT INTO `lga` VALUES ('KANO', 'Kumbotso', 395);
INSERT INTO `lga` VALUES ('KANO', 'Kunchi', 396);
INSERT INTO `lga` VALUES ('KANO', 'Kura', 397);
INSERT INTO `lga` VALUES ('KANO', 'Madobi', 398);
INSERT INTO `lga` VALUES ('KANO', 'Makoda', 399);
INSERT INTO `lga` VALUES ('KANO', 'Minjibir', 400);
INSERT INTO `lga` VALUES ('KANO', 'Nasarawa', 401);
INSERT INTO `lga` VALUES ('KANO', 'Rano', 402);
INSERT INTO `lga` VALUES ('KANO', 'Rimin gado', 403);
INSERT INTO `lga` VALUES ('KANO', 'Rogo', 404);
INSERT INTO `lga` VALUES ('KANO', 'Shanono', 405);
INSERT INTO `lga` VALUES ('KANO', 'Sumaila', 406);
INSERT INTO `lga` VALUES ('KANO', 'Takai', 407);
INSERT INTO `lga` VALUES ('KANO', 'Tarauni', 408);
INSERT INTO `lga` VALUES ('KANO', 'Tofa', 409);
INSERT INTO `lga` VALUES ('KANO', 'Tsanyawa', 410);
INSERT INTO `lga` VALUES ('KANO', 'Tudun wada', 411);
INSERT INTO `lga` VALUES ('KANO', 'Ungogo', 412);
INSERT INTO `lga` VALUES ('KANO', 'Warawa', 413);
INSERT INTO `lga` VALUES ('KANO', 'Wudil', 414);
INSERT INTO `lga` VALUES ('KATSINA', 'Bakori', 415);
INSERT INTO `lga` VALUES ('KATSINA', 'Batagarawa', 416);
INSERT INTO `lga` VALUES ('KATSINA', 'Batsari', 417);
INSERT INTO `lga` VALUES ('KATSINA', 'Baure', 418);
INSERT INTO `lga` VALUES ('KATSINA', 'Bindawa', 419);
INSERT INTO `lga` VALUES ('KATSINA', 'Charanchi', 420);
INSERT INTO `lga` VALUES ('KATSINA', 'Dandume', 421);
INSERT INTO `lga` VALUES ('KATSINA', 'Danja', 422);
INSERT INTO `lga` VALUES ('KATSINA', 'Dan musa', 423);
INSERT INTO `lga` VALUES ('KATSINA', 'Daura', 424);
INSERT INTO `lga` VALUES ('KATSINA', 'Dutsi', 425);
INSERT INTO `lga` VALUES ('KATSINA', 'Dutsin-ma', 426);
INSERT INTO `lga` VALUES ('KATSINA', 'Faskari', 427);
INSERT INTO `lga` VALUES ('KATSINA', 'Funtua', 428);
INSERT INTO `lga` VALUES ('KATSINA', 'Ingawa', 429);
INSERT INTO `lga` VALUES ('KATSINA', 'Jibia', 430);
INSERT INTO `lga` VALUES ('KATSINA', 'Kafur', 431);
INSERT INTO `lga` VALUES ('KATSINA', 'Kaita', 432);
INSERT INTO `lga` VALUES ('KATSINA', 'Kankara', 433);
INSERT INTO `lga` VALUES ('KATSINA', 'Kankia', 434);
INSERT INTO `lga` VALUES ('KATSINA', 'Katsina', 435);
INSERT INTO `lga` VALUES ('KATSINA', 'Kurfi', 436);
INSERT INTO `lga` VALUES ('KATSINA', 'Kusada', 437);
INSERT INTO `lga` VALUES ('KATSINA', 'Mai''adua', 438);
INSERT INTO `lga` VALUES ('KATSINA', 'Malumfashi', 439);
INSERT INTO `lga` VALUES ('KATSINA', 'Mani', 440);
INSERT INTO `lga` VALUES ('KATSINA', 'Mashi', 441);
INSERT INTO `lga` VALUES ('KATSINA', 'Matazu', 442);
INSERT INTO `lga` VALUES ('KATSINA', 'Musawa', 443);
INSERT INTO `lga` VALUES ('KATSINA', 'Rimi', 444);
INSERT INTO `lga` VALUES ('KATSINA', 'Sabuwa', 445);
INSERT INTO `lga` VALUES ('KATSINA', 'Safana', 446);
INSERT INTO `lga` VALUES ('KATSINA', 'Sandamu', 447);
INSERT INTO `lga` VALUES ('KATSINA', 'Zongo', 448);
INSERT INTO `lga` VALUES ('KEBBI', 'Aleiro', 449);
INSERT INTO `lga` VALUES ('KEBBI', 'Arewa-dandi', 450);
INSERT INTO `lga` VALUES ('KEBBI', 'Argungu', 451);
INSERT INTO `lga` VALUES ('KEBBI', 'Augie', 452);
INSERT INTO `lga` VALUES ('KEBBI', 'Bagudo', 453);
INSERT INTO `lga` VALUES ('KEBBI', 'Birnin kebbi', 454);
INSERT INTO `lga` VALUES ('KEBBI', 'Bunza', 455);
INSERT INTO `lga` VALUES ('KEBBI', 'Dandi', 456);
INSERT INTO `lga` VALUES ('KEBBI', 'Fakai', 457);
INSERT INTO `lga` VALUES ('KEBBI', 'Gwandu', 458);
INSERT INTO `lga` VALUES ('KEBBI', 'Jega', 459);
INSERT INTO `lga` VALUES ('KEBBI', 'Kalgo', 460);
INSERT INTO `lga` VALUES ('KEBBI', 'Koko/besse', 461);
INSERT INTO `lga` VALUES ('KEBBI', 'Maiyama', 462);
INSERT INTO `lga` VALUES ('KEBBI', 'Ngaski', 463);
INSERT INTO `lga` VALUES ('KEBBI', 'Sakaba', 464);
INSERT INTO `lga` VALUES ('KEBBI', 'Shanga', 465);
INSERT INTO `lga` VALUES ('KEBBI', 'Suru', 466);
INSERT INTO `lga` VALUES ('KEBBI', 'Wasagu/danko', 467);
INSERT INTO `lga` VALUES ('KEBBI', 'Yauri', 468);
INSERT INTO `lga` VALUES ('KEBBI', 'Zuru', 469);
INSERT INTO `lga` VALUES ('KOGI', 'Adavi', 470);
INSERT INTO `lga` VALUES ('KOGI', 'Ajaojuta', 471);
INSERT INTO `lga` VALUES ('KOGI', 'Ankpa', 472);
INSERT INTO `lga` VALUES ('KOGI', 'Bassa', 473);
INSERT INTO `lga` VALUES ('KOGI', 'Dekina', 474);
INSERT INTO `lga` VALUES ('KOGI', 'Ibaji', 475);
INSERT INTO `lga` VALUES ('KOGI', 'Igalamela-odolu', 476);
INSERT INTO `lga` VALUES ('KOGI', 'Ijumu', 477);
INSERT INTO `lga` VALUES ('KOGI', 'Ijumu', 478);
INSERT INTO `lga` VALUES ('KOGI', 'Kabba/bunu', 479);
INSERT INTO `lga` VALUES ('KOGI', 'Kogi', 480);
INSERT INTO `lga` VALUES ('KOGI', 'Lokoja', 481);
INSERT INTO `lga` VALUES ('KOGI', 'Mopa-muro', 482);
INSERT INTO `lga` VALUES ('KOGI', 'Ofu', 483);
INSERT INTO `lga` VALUES ('KOGI', 'Ogori/megongo', 484);
INSERT INTO `lga` VALUES ('KOGI', 'Okehi', 485);
INSERT INTO `lga` VALUES ('KOGI', 'Olamabolo', 486);
INSERT INTO `lga` VALUES ('KOGI', 'Omala', 487);
INSERT INTO `lga` VALUES ('KOGI', 'Yagba east', 488);
INSERT INTO `lga` VALUES ('KOGI', 'Yagba west', 489);
INSERT INTO `lga` VALUES ('KWARA', 'Asa', 490);
INSERT INTO `lga` VALUES ('KWARA', 'Baruten', 491);
INSERT INTO `lga` VALUES ('KWARA', 'Edu', 492);
INSERT INTO `lga` VALUES ('KWARA', 'Ekiti', 493);
INSERT INTO `lga` VALUES ('KWARA', 'Ifelodun', 494);
INSERT INTO `lga` VALUES ('KWARA', 'Ilorin south', 495);
INSERT INTO `lga` VALUES ('KWARA', 'Ilorin west', 496);
INSERT INTO `lga` VALUES ('KWARA', 'Irepodun', 497);
INSERT INTO `lga` VALUES ('KWARA', 'Isin', 498);
INSERT INTO `lga` VALUES ('KWARA', 'Kaiama', 499);
INSERT INTO `lga` VALUES ('KWARA', 'Moro', 500);
INSERT INTO `lga` VALUES ('KWARA', 'Offa', 501);
INSERT INTO `lga` VALUES ('KWARA', 'Oke-ero', 502);
INSERT INTO `lga` VALUES ('KWARA', 'Oyun', 503);
INSERT INTO `lga` VALUES ('KWARA', 'Pategi', 504);
INSERT INTO `lga` VALUES ('LAGOS', 'Agege', 505);
INSERT INTO `lga` VALUES ('LAGOS', 'Ajeromi-ifelodun', 506);
INSERT INTO `lga` VALUES ('LAGOS', 'Alimosho', 507);
INSERT INTO `lga` VALUES ('LAGOS', 'Amuwo-odofin', 508);
INSERT INTO `lga` VALUES ('LAGOS', 'Apapa', 509);
INSERT INTO `lga` VALUES ('LAGOS', 'Badagry', 510);
INSERT INTO `lga` VALUES ('LAGOS', 'Epe', 511);
INSERT INTO `lga` VALUES ('LAGOS', 'Eti-osa', 512);
INSERT INTO `lga` VALUES ('LAGOS', 'Ibeju/lekki', 513);
INSERT INTO `lga` VALUES ('LAGOS', 'Ifako-ijaye', 514);
INSERT INTO `lga` VALUES ('LAGOS', 'Ikeja', 515);
INSERT INTO `lga` VALUES ('LAGOS', 'Ikorodu', 516);
INSERT INTO `lga` VALUES ('LAGOS', 'Kosofe', 517);
INSERT INTO `lga` VALUES ('LAGOS', 'Lagos island', 518);
INSERT INTO `lga` VALUES ('LAGOS', 'Lagos mainland', 519);
INSERT INTO `lga` VALUES ('LAGOS', 'Mushin', 520);
INSERT INTO `lga` VALUES ('LAGOS', 'Ojo', 521);
INSERT INTO `lga` VALUES ('LAGOS', 'Oshodi-isolo', 522);
INSERT INTO `lga` VALUES ('LAGOS', 'Shomolu', 523);
INSERT INTO `lga` VALUES ('LAGOS', 'Surulere', 524);
INSERT INTO `lga` VALUES ('NASARAWA', 'Akwanga', 525);
INSERT INTO `lga` VALUES ('NASARAWA', 'Awe', 526);
INSERT INTO `lga` VALUES ('NASARAWA', 'Doma', 527);
INSERT INTO `lga` VALUES ('NASARAWA', 'Karu', 528);
INSERT INTO `lga` VALUES ('NASARAWA', 'Keana', 529);
INSERT INTO `lga` VALUES ('NASARAWA', 'Keffi', 530);
INSERT INTO `lga` VALUES ('NASARAWA', 'Kokona', 531);
INSERT INTO `lga` VALUES ('NASARAWA', 'Lafia', 532);
INSERT INTO `lga` VALUES ('NASARAWA', 'Nasarawa', 533);
INSERT INTO `lga` VALUES ('NASARAWA', 'Nasarawa-eggon', 534);
INSERT INTO `lga` VALUES ('NASARAWA', 'Obi', 535);
INSERT INTO `lga` VALUES ('NASARAWA', 'Toto', 536);
INSERT INTO `lga` VALUES ('NASARAWA', 'Wamba', 537);
INSERT INTO `lga` VALUES ('NIGER', 'Agaie', 538);
INSERT INTO `lga` VALUES ('NIGER', 'Agwara', 539);
INSERT INTO `lga` VALUES ('NIGER', 'Bida', 540);
INSERT INTO `lga` VALUES ('NIGER', 'Borgu', 541);
INSERT INTO `lga` VALUES ('NIGER', 'Bosso', 542);
INSERT INTO `lga` VALUES ('NIGER', 'Chanchaga', 543);
INSERT INTO `lga` VALUES ('NIGER', 'Edati', 544);
INSERT INTO `lga` VALUES ('NIGER', 'Gbako', 545);
INSERT INTO `lga` VALUES ('NIGER', 'Gurara', 546);
INSERT INTO `lga` VALUES ('NIGER', 'Katcha', 547);
INSERT INTO `lga` VALUES ('NIGER', 'Kontagora', 548);
INSERT INTO `lga` VALUES ('NIGER', 'Lapai', 549);
INSERT INTO `lga` VALUES ('NIGER', 'Lavun', 550);
INSERT INTO `lga` VALUES ('NIGER', 'Magama', 551);
INSERT INTO `lga` VALUES ('NIGER', 'Mariga', 552);
INSERT INTO `lga` VALUES ('NIGER', 'Mashegu', 553);
INSERT INTO `lga` VALUES ('NIGER', 'Mokwa', 554);
INSERT INTO `lga` VALUES ('NIGER', 'Muya', 555);
INSERT INTO `lga` VALUES ('NIGER', 'Paikoro', 556);
INSERT INTO `lga` VALUES ('NIGER', 'Rafi', 557);
INSERT INTO `lga` VALUES ('NIGER', 'Rajau', 558);
INSERT INTO `lga` VALUES ('NIGER', 'Shiroro', 559);
INSERT INTO `lga` VALUES ('NIGER', 'Suleja', 560);
INSERT INTO `lga` VALUES ('NIGER', 'Tafa', 561);
INSERT INTO `lga` VALUES ('NIGER', 'Wushishi', 562);
INSERT INTO `lga` VALUES ('OGUN', 'Abeokuta north', 563);
INSERT INTO `lga` VALUES ('OGUN', 'Abeokuta south', 564);
INSERT INTO `lga` VALUES ('OGUN', 'Ado-odo/ota', 565);
INSERT INTO `lga` VALUES ('OGUN', 'Egbado north', 566);
INSERT INTO `lga` VALUES ('OGUN', 'Egbado south', 567);
INSERT INTO `lga` VALUES ('OGUN', 'Ekwekoro', 568);
INSERT INTO `lga` VALUES ('OGUN', 'Ifo', 569);
INSERT INTO `lga` VALUES ('OGUN', 'Ijebu east', 570);
INSERT INTO `lga` VALUES ('OGUN', 'Ijebu north', 571);
INSERT INTO `lga` VALUES ('OGUN', 'Ijebu north east', 572);
INSERT INTO `lga` VALUES ('OGUN', 'Ijebu-ode', 573);
INSERT INTO `lga` VALUES ('OGUN', 'Ikenne', 574);
INSERT INTO `lga` VALUES ('OGUN', 'Imeko-afon', 575);
INSERT INTO `lga` VALUES ('OGUN', 'Ipokia', 576);
INSERT INTO `lga` VALUES ('OGUN', 'Obafemi-owode', 577);
INSERT INTO `lga` VALUES ('OGUN', 'Ogun waterside', 578);
INSERT INTO `lga` VALUES ('OGUN', 'Odeda', 579);
INSERT INTO `lga` VALUES ('OGUN', 'Odogbolu', 580);
INSERT INTO `lga` VALUES ('OGUN', 'Remo north', 581);
INSERT INTO `lga` VALUES ('OGUN', 'Shagamu', 582);
INSERT INTO `lga` VALUES ('ONDO', 'Akoko north east', 583);
INSERT INTO `lga` VALUES ('ONDO', 'Akoko north west', 584);
INSERT INTO `lga` VALUES ('ONDO', 'Akoko south east', 585);
INSERT INTO `lga` VALUES ('ONDO', 'Akoko south west', 586);
INSERT INTO `lga` VALUES ('ONDO', 'Akure north', 587);
INSERT INTO `lga` VALUES ('ONDO', 'Akuresouth', 588);
INSERT INTO `lga` VALUES ('ONDO', 'Ese-odo', 589);
INSERT INTO `lga` VALUES ('ONDO', 'Idanre', 590);
INSERT INTO `lga` VALUES ('ONDO', 'Ifedore', 591);
INSERT INTO `lga` VALUES ('ONDO', 'Ilaje', 592);
INSERT INTO `lga` VALUES ('ONDO', 'Ile-oluji-okeigbo', 593);
INSERT INTO `lga` VALUES ('ONDO', 'Irele', 594);
INSERT INTO `lga` VALUES ('ONDO', 'Odigbo', 595);
INSERT INTO `lga` VALUES ('ONDO', 'Okitipupa', 596);
INSERT INTO `lga` VALUES ('ONDO', 'Ondo east', 597);
INSERT INTO `lga` VALUES ('ONDO', 'Ondo west', 598);
INSERT INTO `lga` VALUES ('ONDO', 'Ose-owo', 599);
INSERT INTO `lga` VALUES ('OSUN', 'Aiyedade', 600);
INSERT INTO `lga` VALUES ('OSUN', 'Aiyedire', 601);
INSERT INTO `lga` VALUES ('OSUN', 'Atakumosa east', 602);
INSERT INTO `lga` VALUES ('OSUN', 'Atakumose-west', 603);
INSERT INTO `lga` VALUES ('OSUN', 'Boluwaduro', 604);
INSERT INTO `lga` VALUES ('OSUN', 'Boripe', 605);
INSERT INTO `lga` VALUES ('OSUN', 'Ede north', 606);
INSERT INTO `lga` VALUES ('OSUN', 'Ede south', 607);
INSERT INTO `lga` VALUES ('OSUN', 'Egbedore', 608);
INSERT INTO `lga` VALUES ('OSUN', 'Ejigbo', 609);
INSERT INTO `lga` VALUES ('OSUN', 'Ife central', 610);
INSERT INTO `lga` VALUES ('OSUN', 'Ife east', 611);
INSERT INTO `lga` VALUES ('OSUN', 'Ife north', 612);
INSERT INTO `lga` VALUES ('OSUN', 'Ife south', 613);
INSERT INTO `lga` VALUES ('OSUN', 'Ifedayo', 614);
INSERT INTO `lga` VALUES ('OSUN', 'Ifelodun', 615);
INSERT INTO `lga` VALUES ('OSUN', 'Ila', 616);
INSERT INTO `lga` VALUES ('OSUN', 'Ilasha east', 617);
INSERT INTO `lga` VALUES ('OSUN', 'Ilesha west', 618);
INSERT INTO `lga` VALUES ('OSUN', 'Irepodun', 619);
INSERT INTO `lga` VALUES ('OSUN', 'Irewole', 620);
INSERT INTO `lga` VALUES ('OSUN', 'Isokan', 621);
INSERT INTO `lga` VALUES ('OSUN', 'Iwo', 622);
INSERT INTO `lga` VALUES ('OSUN', 'Obokun', 623);
INSERT INTO `lga` VALUES ('OSUN', 'Odo-otin', 624);
INSERT INTO `lga` VALUES ('OSUN', 'Ola-oluwa', 625);
INSERT INTO `lga` VALUES ('OSUN', 'Olorunda', 626);
INSERT INTO `lga` VALUES ('OSUN', 'Oriade', 627);
INSERT INTO `lga` VALUES ('OSUN', 'Orolu', 628);
INSERT INTO `lga` VALUES ('OSUN', 'Osogbo', 629);
INSERT INTO `lga` VALUES ('OYO', 'Afijio', 630);
INSERT INTO `lga` VALUES ('OYO', 'Akinyele', 631);
INSERT INTO `lga` VALUES ('OYO', 'Atiba', 632);
INSERT INTO `lga` VALUES ('OYO', 'Atigbo', 633);
INSERT INTO `lga` VALUES ('OYO', 'Egbeda', 634);
INSERT INTO `lga` VALUES ('OYO', 'Ibadan central', 635);
INSERT INTO `lga` VALUES ('OYO', 'Ibadan north', 636);
INSERT INTO `lga` VALUES ('OYO', 'Ibadan north west', 637);
INSERT INTO `lga` VALUES ('OYO', 'Ibadan south west', 638);
INSERT INTO `lga` VALUES ('OYO', 'Ibadan south east', 639);
INSERT INTO `lga` VALUES ('OYO', 'Ibarapa central', 640);
INSERT INTO `lga` VALUES ('OYO', 'Ibarapa east', 641);
INSERT INTO `lga` VALUES ('OYO', 'Ibarapa north', 642);
INSERT INTO `lga` VALUES ('OYO', 'Ido', 643);
INSERT INTO `lga` VALUES ('OYO', 'Irepo', 644);
INSERT INTO `lga` VALUES ('OYO', 'Iseyin', 645);
INSERT INTO `lga` VALUES ('OYO', 'Itesiwaju', 646);
INSERT INTO `lga` VALUES ('OYO', 'Iwajowa', 647);
INSERT INTO `lga` VALUES ('OYO', 'Kajola', 648);
INSERT INTO `lga` VALUES ('OYO', 'Lagelu', 649);
INSERT INTO `lga` VALUES ('OYO', 'Ogbomoso north', 650);
INSERT INTO `lga` VALUES ('OYO', 'Ogbomoso south', 651);
INSERT INTO `lga` VALUES ('OYO', 'Ogo oluwa', 652);
INSERT INTO `lga` VALUES ('OYO', 'Olorunsogo', 653);
INSERT INTO `lga` VALUES ('OYO', 'Oluyole', 654);
INSERT INTO `lga` VALUES ('OYO', 'Ona-ara', 655);
INSERT INTO `lga` VALUES ('OYO', 'Orelope', 656);
INSERT INTO `lga` VALUES ('OYO', 'Ori ire', 657);
INSERT INTO `lga` VALUES ('OYO', 'Oyo east', 658);
INSERT INTO `lga` VALUES ('OYO', 'Oyo west', 659);
INSERT INTO `lga` VALUES ('OYO', 'Saki east', 660);
INSERT INTO `lga` VALUES ('OYO', 'Saki west', 661);
INSERT INTO `lga` VALUES ('OYO', 'Surelere', 662);
INSERT INTO `lga` VALUES ('PLATEAU', 'Barikin ladi', 663);
INSERT INTO `lga` VALUES ('PLATEAU', 'Bassa', 664);
INSERT INTO `lga` VALUES ('PLATEAU', 'Bokkos', 665);
INSERT INTO `lga` VALUES ('PLATEAU', 'Jos east', 666);
INSERT INTO `lga` VALUES ('PLATEAU', 'Jos north', 667);
INSERT INTO `lga` VALUES ('PLATEAU', 'Jos south', 668);
INSERT INTO `lga` VALUES ('PLATEAU', 'Kanam', 669);
INSERT INTO `lga` VALUES ('PLATEAU', 'Kanke', 670);
INSERT INTO `lga` VALUES ('PLATEAU', 'Langtang north', 671);
INSERT INTO `lga` VALUES ('PLATEAU', 'Langtang south', 672);
INSERT INTO `lga` VALUES ('PLATEAU', 'Mangu', 673);
INSERT INTO `lga` VALUES ('PLATEAU', 'Mikang', 674);
INSERT INTO `lga` VALUES ('PLATEAU', 'Pankshin', 675);
INSERT INTO `lga` VALUES ('PLATEAU', 'Qua''an pan', 676);
INSERT INTO `lga` VALUES ('PLATEAU', 'Riyom', 677);
INSERT INTO `lga` VALUES ('PLATEAU', 'Shendam', 678);
INSERT INTO `lga` VALUES ('PLATEAU', 'Wase', 679);
INSERT INTO `lga` VALUES ('RIVERS', 'Abua/odual', 680);
INSERT INTO `lga` VALUES ('RIVERS', 'Ahoada east', 681);
INSERT INTO `lga` VALUES ('RIVERS', 'Ahoada west', 682);
INSERT INTO `lga` VALUES ('RIVERS', 'Akuku toru', 683);
INSERT INTO `lga` VALUES ('RIVERS', 'Andoni', 684);
INSERT INTO `lga` VALUES ('RIVERS', 'Asari-toru', 685);
INSERT INTO `lga` VALUES ('RIVERS', 'Bonny', 686);
INSERT INTO `lga` VALUES ('RIVERS', 'Degema', 687);
INSERT INTO `lga` VALUES ('RIVERS', 'Emohua', 688);
INSERT INTO `lga` VALUES ('RIVERS', 'Eleme', 689);
INSERT INTO `lga` VALUES ('RIVERS', 'Etche', 690);
INSERT INTO `lga` VALUES ('RIVERS', 'Gokana', 691);
INSERT INTO `lga` VALUES ('RIVERS', 'Ikwerre', 692);
INSERT INTO `lga` VALUES ('RIVERS', 'Khana', 693);
INSERT INTO `lga` VALUES ('RIVERS', 'Obia/akpor', 694);
INSERT INTO `lga` VALUES ('RIVERS', 'Ogba/egbema/ndoni', 695);
INSERT INTO `lga` VALUES ('RIVERS', 'Ogu/bolo', 696);
INSERT INTO `lga` VALUES ('RIVERS', 'Okrika', 697);
INSERT INTO `lga` VALUES ('RIVERS', 'Omumma', 698);
INSERT INTO `lga` VALUES ('RIVERS', 'Opobo/nkoro', 699);
INSERT INTO `lga` VALUES ('RIVERS', 'Oyigbo', 700);
INSERT INTO `lga` VALUES ('RIVERS', 'Port harcourt', 701);
INSERT INTO `lga` VALUES ('RIVERS', 'Tai', 702);
INSERT INTO `lga` VALUES ('SOKOTO', 'Binji', 703);
INSERT INTO `lga` VALUES ('SOKOTO', 'Bodinga', 704);
INSERT INTO `lga` VALUES ('SOKOTO', 'Dange-shuni', 705);
INSERT INTO `lga` VALUES ('SOKOTO', 'Gada', 706);
INSERT INTO `lga` VALUES ('SOKOTO', 'Goronyo', 707);
INSERT INTO `lga` VALUES ('SOKOTO', 'Gudu', 708);
INSERT INTO `lga` VALUES ('SOKOTO', 'Gwadabawa', 709);
INSERT INTO `lga` VALUES ('SOKOTO', 'Illela', 710);
INSERT INTO `lga` VALUES ('SOKOTO', 'Isa', 711);
INSERT INTO `lga` VALUES ('SOKOTO', 'Kware', 712);
INSERT INTO `lga` VALUES ('SOKOTO', 'Kebbe', 713);
INSERT INTO `lga` VALUES ('SOKOTO', 'Rabah', 714);
INSERT INTO `lga` VALUES ('SOKOTO', 'Sabon birni', 715);
INSERT INTO `lga` VALUES ('SOKOTO', 'Shagari', 716);
INSERT INTO `lga` VALUES ('SOKOTO', 'Silame', 717);
INSERT INTO `lga` VALUES ('SOKOTO', 'Sokoto north', 718);
INSERT INTO `lga` VALUES ('SOKOTO', 'Sokoto south', 719);
INSERT INTO `lga` VALUES ('SOKOTO', 'Tambuwal', 720);
INSERT INTO `lga` VALUES ('SOKOTO', 'Tangaza', 721);
INSERT INTO `lga` VALUES ('SOKOTO', 'Tureta', 722);
INSERT INTO `lga` VALUES ('SOKOTO', 'Wamakko', 723);
INSERT INTO `lga` VALUES ('SOKOTO', 'Wurno', 724);
INSERT INTO `lga` VALUES ('SOKOTO', 'Yabo', 725);
INSERT INTO `lga` VALUES ('TARABA', 'Ardo-kola', 726);
INSERT INTO `lga` VALUES ('TARABA', 'Bali', 727);
INSERT INTO `lga` VALUES ('TARABA', 'Donga', 728);
INSERT INTO `lga` VALUES ('TARABA', 'Gashaka', 729);
INSERT INTO `lga` VALUES ('TARABA', 'Gassol', 730);
INSERT INTO `lga` VALUES ('TARABA', 'Ibi', 731);
INSERT INTO `lga` VALUES ('TARABA', 'Jalingo', 732);
INSERT INTO `lga` VALUES ('TARABA', 'Karim-lamido', 733);
INSERT INTO `lga` VALUES ('TARABA', 'Kurmi', 734);
INSERT INTO `lga` VALUES ('TARABA', 'Lau', 735);
INSERT INTO `lga` VALUES ('TARABA', 'Sarduana', 736);
INSERT INTO `lga` VALUES ('TARABA', 'Takum', 737);
INSERT INTO `lga` VALUES ('TARABA', 'Ussa', 738);
INSERT INTO `lga` VALUES ('TARABA', 'Wukari', 739);
INSERT INTO `lga` VALUES ('TARABA', 'Yorro', 740);
INSERT INTO `lga` VALUES ('TARABA', 'Zing', 741);
INSERT INTO `lga` VALUES ('YOBE', 'Bade', 742);
INSERT INTO `lga` VALUES ('YOBE', 'Bursari', 743);
INSERT INTO `lga` VALUES ('YOBE', 'Damaturu', 744);
INSERT INTO `lga` VALUES ('YOBE', 'Fika', 745);
INSERT INTO `lga` VALUES ('YOBE', 'Fune', 746);
INSERT INTO `lga` VALUES ('YOBE', 'Geidam', 747);
INSERT INTO `lga` VALUES ('YOBE', 'Gujba', 748);
INSERT INTO `lga` VALUES ('YOBE', 'Gulani', 749);
INSERT INTO `lga` VALUES ('YOBE', 'Jakusko', 750);
INSERT INTO `lga` VALUES ('YOBE', 'Karasuwa', 751);
INSERT INTO `lga` VALUES ('YOBE', 'Machina', 752);
INSERT INTO `lga` VALUES ('YOBE', 'Nangere', 753);
INSERT INTO `lga` VALUES ('YOBE', 'Nguru', 754);
INSERT INTO `lga` VALUES ('YOBE', 'Potiskum', 755);
INSERT INTO `lga` VALUES ('YOBE', 'Tarmua', 756);
INSERT INTO `lga` VALUES ('YOBE', 'Yunusari', 757);
INSERT INTO `lga` VALUES ('YOBE', 'Yusufari', 758);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Anka', 759);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Bakurna', 760);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Birnin magaji', 761);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Bukkuyum', 762);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Bungudu', 763);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Gummi', 764);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Kaura namoda', 765);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Maradun', 766);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Maru', 767);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Shinkafi', 768);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Talata', 769);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Mafara', 770);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Tsafe', 771);
INSERT INTO `lga` VALUES ('ZAMFARA', 'Zumi', 772);
INSERT INTO `lga` VALUES ('NASARAWA', 'Eggon', 773);
INSERT INTO `lga` VALUES ('ONDO', 'Ile oluji', 774);
INSERT INTO `lga` VALUES ('OGUN', 'Sagamu', 775);
INSERT INTO `lga` VALUES ('OGUN', 'Opeji', 776);
INSERT INTO `lga` VALUES ('OGUN', 'Ijebu ode', 777);
INSERT INTO `lga` VALUES ('EDO', 'Ishan', 778);
INSERT INTO `lga` VALUES ('ONDO', 'Ondo central', 779);
INSERT INTO `lga` VALUES ('BENUE', 'Otukpo', 780);
INSERT INTO `lga` VALUES ('ABUJA', 'Abaji', 781);
INSERT INTO `lga` VALUES ('ABUJA', 'Abuja muni.', 782);
INSERT INTO `lga` VALUES ('ABUJA', 'Bwari', 783);
INSERT INTO `lga` VALUES ('ABUJA', 'Gwagwalada', 784);
INSERT INTO `lga` VALUES ('ABUJA', 'Kuje', 785);
INSERT INTO `lga` VALUES ('ABUJA', 'Kwali', 786);
INSERT INTO `lga` VALUES ('IMO', 'Ehime mbano', 787);
INSERT INTO `lga` VALUES ('ENUGU', 'Oji river', 788);
INSERT INTO `lga` VALUES ('OYO', 'Ogbomosho', 789);
INSERT INTO `lga` VALUES ('ONDO', 'Akure south', 790);
INSERT INTO `lga` VALUES ('CROSS RIVER', 'Odupani', 791);
INSERT INTO `lga` VALUES ('IMO', 'Ngor okpala', 792);
INSERT INTO `lga` VALUES ('BENUE', 'Ador', 793);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Okobo', 794);
INSERT INTO `lga` VALUES ('KOGI', 'Idah', 795);
INSERT INTO `lga` VALUES ('ABIA', 'Ugwunagbor', 796);
INSERT INTO `lga` VALUES ('RIVERS', 'Ogba/Egbem/Noom', 797);
INSERT INTO `lga` VALUES ('KOGI', 'Okene', 798);
INSERT INTO `lga` VALUES ('ONDO', 'Akoko', 799);
INSERT INTO `lga` VALUES ('ONDO', 'Owo', 800);
INSERT INTO `lga` VALUES ('KEBBI', 'Kamba', 801);
INSERT INTO `lga` VALUES ('OGUN', 'Water side', 802);
INSERT INTO `lga` VALUES ('OGUN', 'Egado South', 803);
INSERT INTO `lga` VALUES ('OGUN', 'Imeko Afon', 804);
INSERT INTO `lga` VALUES ('PLATEAU', 'Panilshin', 805);
INSERT INTO `lga` VALUES ('ONDO', 'Ikalo', 806);
INSERT INTO `lga` VALUES ('LAGOS', 'Eredo', 807);
INSERT INTO `lga` VALUES ('KATSINA', 'Manufanoti', 808);
INSERT INTO `lga` VALUES ('SOKOTO', 'Kofa atiku', 809);
INSERT INTO `lga` VALUES ('No STATE', ' No LGA', 810);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Onna', 811);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Udium', 812);
INSERT INTO `lga` VALUES ('OGUN', 'Ake', 813);
INSERT INTO `lga` VALUES ('EDO', 'Uromi', 814);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Oron', 815);
INSERT INTO `lga` VALUES ('AKWA IBOM', 'Oruk', 816);
INSERT INTO `lga` VALUES ('DELTA', 'Aniocha', 817);
INSERT INTO `lga` VALUES ('ONDO', 'Ose', 818);
INSERT INTO `lga` VALUES ('KWARA', 'Oro', 819);
INSERT INTO `lga` VALUES ('OGUN', 'Yewa', 820);
INSERT INTO `lga` VALUES ('OGUN', 'Yewa South', 821);
INSERT INTO `lga` VALUES ('OGUN', 'Yewa North', 822);
INSERT INTO `lga` VALUES ('RIVERS', 'Opobo/Nkoro', 823);
INSERT INTO `lga` VALUES ('RIVERS', 'Onelga', 824);
INSERT INTO `lga` VALUES ('RIVERS', '', 825);
INSERT INTO `lga` VALUES ('BORNO', 'Maiduguri .M.C', 826);

-- --------------------------------------------------------

-- 
-- Table structure for table `loan type`
-- 

CREATE TABLE `loan type` (
  `Type ID` int(11) default NULL,
  `Type` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `loan type`
-- 

INSERT INTO `loan type` VALUES (1, 'Furniture Loan');
INSERT INTO `loan type` VALUES (2, 'Housing Loan');
INSERT INTO `loan type` VALUES (3, 'Vehicle Loan');
INSERT INTO `loan type` VALUES (4, 'Computer Loan');

-- --------------------------------------------------------

-- 
-- Table structure for table `loan`
-- 

CREATE TABLE `loan` (
  `Staff Name` varchar(50) default NULL,
  `Loan Date` date default NULL,
  `Loan Amt` decimal(10,2) default NULL,
  `Payment Mode` varchar(50) default NULL,
  `Monthly Refund` decimal(10,2) default NULL,
  `Loan Type` varchar(50) default NULL,
  `Staff Number` varchar(50) default NULL,
  `Loan Period` int(11) default NULL,
  `Loan Balance` decimal(10,2) default NULL,
  `MonthLoanStop` tinyint(1) NOT NULL,
  `LoanStop` tinyint(1) NOT NULL,
  `RefundToDate` decimal(10,2) default NULL,
  `LatestMonth` varchar(50) default NULL,
  `Office` varchar(50) default NULL,
  `Principal Balance` decimal(10,2) default NULL,
  `Interest` decimal(10,2) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `loan`
-- 

INSERT INTO `loan` VALUES ('Bobo', '0000-00-00', '20000.00', NULL, '2000.00', '', '345678', 10, '-34000.00', 1, 1, '54000.00', 'February, 2009', '', NULL, NULL);
INSERT INTO `loan` VALUES ('Deji Afolabi', '2007-03-09', '10000.00', NULL, '1000.00', 'Computer Loan', '123456', 10, '-3000.00', 0, 0, '0.00', 'February, 2009', '', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `location`
-- 

CREATE TABLE `location` (
  `Location_id` int(11) NOT NULL auto_increment,
  `Location` varchar(50) default NULL,
  `company` varchar(100) NOT NULL,
  `Region` varchar(50) default NULL,
  PRIMARY KEY  (`Location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `location`
-- 

INSERT INTO `location` VALUES (1, 'Abuja', '', 'North-Central');
INSERT INTO `location` VALUES (9, 'Lagos', '', 'South-West');

-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `username` varchar(100) NOT NULL default '',
  `access_lvl` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `login`
-- 

INSERT INTO `login` VALUES (2, 'deji@deji.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 7);
INSERT INTO `login` VALUES (13, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `monitor`
-- 

CREATE TABLE `monitor` (
  `User Category` varchar(50) default NULL,
  `User Name` varchar(50) default NULL,
  `Date Logged On` date default NULL,
  `File Used` varchar(200) default NULL,
  `Details` varchar(200) default NULL,
  `Time Logged On` time default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `monitor`
-- 

INSERT INTO `monitor` VALUES ('Administrator', 'Demo', '2009-01-19', 'Login', 'Logged In as: demo', '10:25:00');
INSERT INTO `monitor` VALUES ('Administrator', 'Demo', '2010-02-02', 'Login', 'Logged In as: demo', '01:31:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `nationality`
-- 

CREATE TABLE `nationality` (
  `Nat_ID` int(11) default NULL,
  `Nationality` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `nationality`
-- 

INSERT INTO `nationality` VALUES (1, 'Nigeria');
INSERT INTO `nationality` VALUES (2, 'Ghana');
INSERT INTO `nationality` VALUES (3, 'Cameroon');
INSERT INTO `nationality` VALUES (4, 'Argentina');
INSERT INTO `nationality` VALUES (5, 'Australia');
INSERT INTO `nationality` VALUES (6, 'Belgium');
INSERT INTO `nationality` VALUES (7, 'Brazil');
INSERT INTO `nationality` VALUES (8, 'Canada');
INSERT INTO `nationality` VALUES (9, 'Chile');
INSERT INTO `nationality` VALUES (10, 'China');
INSERT INTO `nationality` VALUES (11, 'Columbia');
INSERT INTO `nationality` VALUES (12, 'Costa Rica');
INSERT INTO `nationality` VALUES (13, 'Denmark');
INSERT INTO `nationality` VALUES (14, 'Egypt');
INSERT INTO `nationality` VALUES (15, 'Finland');
INSERT INTO `nationality` VALUES (16, 'France');
INSERT INTO `nationality` VALUES (17, 'Germany');
INSERT INTO `nationality` VALUES (18, 'Greece');
INSERT INTO `nationality` VALUES (19, 'Hong Kong');
INSERT INTO `nationality` VALUES (20, 'India');
INSERT INTO `nationality` VALUES (21, 'Indonesia');
INSERT INTO `nationality` VALUES (22, 'Iran');
INSERT INTO `nationality` VALUES (23, 'Ireland');
INSERT INTO `nationality` VALUES (24, 'Israel');
INSERT INTO `nationality` VALUES (25, 'Italy');
INSERT INTO `nationality` VALUES (26, 'Japan');
INSERT INTO `nationality` VALUES (27, 'Korea (South)');
INSERT INTO `nationality` VALUES (28, 'Malaysia');
INSERT INTO `nationality` VALUES (29, 'Mexico');
INSERT INTO `nationality` VALUES (30, 'Netherlands');
INSERT INTO `nationality` VALUES (31, 'New Zealand');
INSERT INTO `nationality` VALUES (32, 'Norway');
INSERT INTO `nationality` VALUES (33, 'Pakistan');
INSERT INTO `nationality` VALUES (34, 'Paraguay');
INSERT INTO `nationality` VALUES (35, 'Peru');
INSERT INTO `nationality` VALUES (36, 'Philippines');
INSERT INTO `nationality` VALUES (37, 'Poland');
INSERT INTO `nationality` VALUES (38, 'Portugal');
INSERT INTO `nationality` VALUES (39, 'Russia');
INSERT INTO `nationality` VALUES (40, 'Saudi Arabia');
INSERT INTO `nationality` VALUES (41, 'Singapore');
INSERT INTO `nationality` VALUES (42, 'South Africa');
INSERT INTO `nationality` VALUES (43, 'Spain');
INSERT INTO `nationality` VALUES (44, 'Sweden');
INSERT INTO `nationality` VALUES (45, 'Switzerland');
INSERT INTO `nationality` VALUES (46, 'Taiwan');
INSERT INTO `nationality` VALUES (47, 'Turkey');
INSERT INTO `nationality` VALUES (48, 'United Arab Emirate');
INSERT INTO `nationality` VALUES (49, 'Uruguay');
INSERT INTO `nationality` VALUES (50, 'Great Britain');
INSERT INTO `nationality` VALUES (51, 'USA');
INSERT INTO `nationality` VALUES (52, 'Venezuela');
INSERT INTO `nationality` VALUES (53, 'Zimbabwe');

-- --------------------------------------------------------

-- 
-- Table structure for table `next_kin`
-- 

CREATE TABLE `next_kin` (
  `Staff Number` varchar(30) NOT NULL,
  `Name` varchar(50) default NULL,
  `Address` varchar(200) default NULL,
  `Phone` varchar(30) default NULL,
  `Relationship` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `next_kin`
-- 

INSERT INTO `next_kin` VALUES ('001', '', '', '', '');
INSERT INTO `next_kin` VALUES ('1071', '', '', '', '');
INSERT INTO `next_kin` VALUES ('1071', '', '', '', '');
INSERT INTO `next_kin` VALUES ('1071', '', '', '', '');
INSERT INTO `next_kin` VALUES ('1071', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `office`
-- 

CREATE TABLE `office` (
  `ID` varchar(5) NOT NULL,
  `Office` varchar(80) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 5120 kB';

-- 
-- Dumping data for table `office`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `pallowances`
-- 

CREATE TABLE `pallowances` (
  `Description` varchar(50) default NULL,
  `Amount` decimal(10,2) default NULL,
  `Percent` decimal(10,2) default NULL,
  `SortOrder` int(11) default NULL,
  `Type` char(1) default NULL,
  `Grade Level` char(6) default NULL,
  `Step` char(2) default NULL,
  `Typ` char(1) default NULL,
  `AllowanceID` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pallowances`
-- 

INSERT INTO `pallowances` VALUES ('Housing', '2792.04', '50.00', 2, 'A', '01/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '2874.59', '50.00', 2, 'A', '01/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '2957.13', '50.00', 2, 'A', '01/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3039.67', '50.00', 2, 'A', '01/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3122.21', '50.00', 2, 'A', '01/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3204.75', '50.00', 2, 'A', '01/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3287.29', '50.00', 2, 'A', '01/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3369.84', '50.00', 2, 'A', '01/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3452.38', '50.00', 2, 'A', '01/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3534.92', '50.00', 2, 'A', '01/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3617.46', '50.00', 2, 'A', '01/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3700.00', '50.00', 2, 'A', '01/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3782.54', '50.00', 2, 'A', '01/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3865.09', '50.00', 2, 'A', '01/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3947.63', '50.00', 2, 'A', '01/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4252.59', '50.00', 2, 'A', '02/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4151.13', '50.00', 2, 'A', '02/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4049.67', '50.00', 2, 'A', '02/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3948.21', '50.00', 2, 'A', '02/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3846.75', '50.00', 2, 'A', '02/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3745.29', '50.00', 2, 'A', '02/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3643.34', '50.00', 2, 'A', '02/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3542.38', '50.00', 2, 'A', '02/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3440.92', '50.00', 2, 'A', '02/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3339.46', '50.00', 2, 'A', '02/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3238.00', '50.00', 2, 'A', '02/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3136.54', '50.00', 2, 'A', '02/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3035.09', '50.00', 2, 'A', '02/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '2933.63', '50.00', 2, 'A', '02/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '2832.17', '50.00', 2, 'A', '02/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '2973.84', '50.00', 2, 'A', '03/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3095.71', '50.00', 2, 'A', '03/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3217.59', '50.00', 2, 'A', '03/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3339.46', '50.00', 2, 'A', '03/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3461.34', '50.00', 2, 'A', '03/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3583.21', '50.00', 2, 'A', '03/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3705.09', '50.00', 2, 'A', '03/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3826.96', '50.00', 2, 'A', '03/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3948.84', '50.00', 2, 'A', '03/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4070.71', '50.00', 2, 'A', '03/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4192.59', '50.00', 2, 'A', '03/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4314.46', '50.00', 2, 'A', '03/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4436.34', '50.00', 2, 'A', '03/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4558.21', '50.00', 2, 'A', '03/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4680.09', '50.00', 2, 'A', '03/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5372.88', '50.00', 2, 'A', '04/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5231.21', '50.00', 2, 'A', '04/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5089.54', '50.00', 2, 'A', '04/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4947.88', '50.00', 2, 'A', '04/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4806.21', '50.00', 2, 'A', '04/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4664.54', '50.00', 2, 'A', '04/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4522.88', '50.00', 2, 'A', '04/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4381.21', '50.00', 2, 'A', '04/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4239.54', '50.00', 2, 'A', '04/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4097.88', '50.00', 2, 'A', '04/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3956.21', '50.00', 2, 'A', '04/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3814.54', '50.00', 2, 'A', '04/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3672.88', '50.00', 2, 'A', '04/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3531.23', '50.00', 2, 'A', '04/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '3389.54', '50.00', 2, 'A', '04/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4165.63', '50.00', 2, 'A', '05/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4338.25', '50.00', 2, 'A', '05/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4510.88', '50.00', 2, 'A', '05/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4683.50', '50.00', 2, 'A', '05/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '4856.13', '50.00', 2, 'A', '05/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5028.75', '50.00', 2, 'A', '05/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5201.38', '50.00', 2, 'A', '05/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5374.00', '50.00', 2, 'A', '05/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5546.63', '50.00', 2, 'A', '05/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5719.25', '50.00', 2, 'A', '05/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5891.88', '50.00', 2, 'A', '05/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '6064.50', '50.00', 2, 'A', '05/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '6237.13', '50.00', 2, 'A', '05/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '6397.25', '50.00', 2, 'A', '05/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '6582.38', '50.00', 2, 'A', '05/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '5994.60', '60.00', 2, 'A', '06/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '10023.50', '60.00', 2, 'A', '06/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9768.15', '60.00', 2, 'A', '06/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9512.80', '60.00', 2, 'A', '06/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9257.45', '60.00', 2, 'A', '06/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9002.10', '60.00', 2, 'A', '06/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '8746.75', '60.00', 2, 'A', '06/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '8491.40', '60.00', 2, 'A', '06/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '8236.05', '60.00', 2, 'A', '06/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '7980.70', '60.00', 2, 'A', '06/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '7725.35', '60.00', 2, 'A', '06/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '7470.00', '60.00', 2, 'A', '06/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '7214.65', '60.00', 2, 'A', '06/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '6959.30', '60.00', 2, 'A', '06/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '6703.95', '60.00', 2, 'A', '06/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '8722.15', '60.00', 2, 'A', '07/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9026.05', '60.00', 2, 'A', '07/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9329.95', '60.00', 2, 'A', '07/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9633.85', '60.00', 2, 'A', '07/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '9937.75', '60.00', 2, 'A', '07/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '10241.65', '60.00', 2, 'A', '07/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '10545.55', '60.00', 2, 'A', '07/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '10849.45', '60.00', 2, 'A', '07/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '11153.35', '60.00', 2, 'A', '07/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '11457.25', '60.00', 2, 'A', '07/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '11761.15', '60.00', 2, 'A', '07/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12065.05', '60.00', 2, 'A', '07/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12368.95', '60.00', 2, 'A', '07/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12672.85', '60.00', 2, 'A', '07/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12976.75', '60.00', 2, 'A', '07/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '15347.45', '60.00', 2, 'A', '08/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14985.55', '60.00', 2, 'A', '08/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14623.65', '60.00', 2, 'A', '08/15', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14261.75', '60.00', 2, 'A', '08/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '13899.85', '60.00', 2, 'A', '08/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '13537.95', '60.00', 2, 'A', '08/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '13176.05', '60.00', 2, 'A', '08/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12452.25', '60.00', 2, 'A', '08/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12814.15', '60.00', 2, 'A', '08/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12090.35', '60.00', 2, 'A', '08/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '11728.45', '60.00', 2, 'A', '08/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '11366.55', '60.00', 2, 'A', '08/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '11004.65', '60.00', 2, 'A', '08/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '10642.75', '60.00', 2, 'A', '08/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '10280.85', '60.00', 2, 'A', '08/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12103.40', '60.00', 2, 'A', '09/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12501.30', '60.00', 2, 'A', '09/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '12899.20', '60.00', 2, 'A', '09/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '13297.10', '60.00', 2, 'A', '09/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '13695.00', '60.00', 2, 'A', '09/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14092.90', '60.00', 2, 'A', '09/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14490.80', '60.00', 2, 'A', '09/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14888.70', '60.00', 2, 'A', '09/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '15286.60', '60.00', 2, 'A', '09/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '15684.50', '60.00', 2, 'A', '09/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '16082.40', '60.00', 2, 'A', '09/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '16480.30', '60.00', 2, 'A', '09/12', '12', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '16878.20', '60.00', 2, 'A', '09/13', '13', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17276.10', '60.00', 2, 'A', '09/14', '14', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17674.00', '60.00', 2, 'A', '09/15', '15', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '20135.15', '60.00', 2, 'A', '10/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '19517.95', '60.00', 2, 'A', '10/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '18900.75', '60.00', 2, 'A', '10/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '18283.55', '60.00', 2, 'A', '10/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17666.35', '60.00', 2, 'A', '10/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17049.15', '60.00', 2, 'A', '10/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '16431.95', '60.00', 2, 'A', '10/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '15814.75', '60.00', 2, 'A', '10/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '15197.55', '60.00', 2, 'A', '10/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '14580.35', '60.00', 2, 'A', '10/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '13963.15', '60.00', 2, 'A', '10/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '15611.05', '60.00', 2, 'A', '11/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '16263.60', '60.00', 2, 'A', '11/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '16916.15', '60.00', 2, 'A', '11/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17568.70', '60.00', 2, 'A', '11/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '18221.25', '60.00', 2, 'A', '11/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '18873.80', '60.00', 2, 'A', '11/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '19526.35', '60.00', 2, 'A', '11/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '20178.90', '60.00', 2, 'A', '11/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '20831.45', '60.00', 2, 'A', '11/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '21484.00', '60.00', 2, 'A', '11/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '22136.55', '60.00', 2, 'A', '11/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '24291.60', '60.00', 2, 'A', '12/11', '11', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '23589.10', '60.00', 2, 'A', '12/10', '10', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '22886.60', '60.00', 2, 'A', '12/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '22184.10', '60.00', 2, 'A', '12/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '21481.60', '60.00', 2, 'A', '12/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '20779.10', '60.00', 2, 'A', '12/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '20076.60', '60.00', 2, 'A', '12/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '19374.10', '60.00', 2, 'A', '12/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '18671.60', '60.00', 2, 'A', '12/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17969.10', '60.00', 2, 'A', '12/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '17266.60', '60.00', 2, 'A', '12/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '23905.13', '75.00', 2, 'A', '13/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '25079.44', '75.00', 2, 'A', '13/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '26253.75', '75.00', 2, 'A', '13/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '27428.06', '75.00', 2, 'A', '13/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '28602.38', '75.00', 2, 'A', '13/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '29776.69', '75.00', 2, 'A', '13/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '30951.00', '75.00', 2, 'A', '13/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '32125.31', '75.00', 2, 'A', '13/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '33299.63', '75.00', 2, 'A', '13/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '37729.69', '75.00', 2, 'A', '14/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '36318.50', '75.00', 2, 'A', '14/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '34907.31', '75.00', 2, 'A', '14/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '33496.13', '75.00', 2, 'A', '14/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '32084.94', '75.00', 2, 'A', '14/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '30673.75', '75.00', 2, 'A', '14/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '29262.56', '75.00', 2, 'A', '14/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '27851.38', '75.00', 2, 'A', '14/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '26440.19', '75.00', 2, 'A', '14/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '29479.63', '75.00', 2, 'A', '15/01', '01', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '31081.19', '75.00', 2, 'A', '15/02', '02', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '32682.75', '75.00', 2, 'A', '15/03', '03', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '34284.32', '75.00', 2, 'A', '15/04', '04', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '35885.87', '75.00', 2, 'A', '15/05', '05', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '37487.44', '75.00', 2, 'A', '15/06', '06', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '39089.00', '75.00', 2, 'A', '15/07', '07', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '40690.56', '75.00', 2, 'A', '15/08', '08', 'E', '250');
INSERT INTO `pallowances` VALUES ('Housing', '42292.13', '75.00', 2, 'A', '15/09', '09', 'E', '250');
INSERT INTO `pallowances` VALUES ('Transport', '1396.02', '25.00', 1, 'A', '01/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1437.29', '25.00', 1, 'A', '01/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1478.56', '25.00', 1, 'A', '01/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1519.83', '25.00', 1, 'A', '01/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1561.11', '25.00', 1, 'A', '01/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1602.38', '25.00', 1, 'A', '01/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1643.65', '25.00', 1, 'A', '01/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1684.92', '25.00', 1, 'A', '01/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1726.19', '25.00', 1, 'A', '01/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1767.46', '25.00', 1, 'A', '01/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1808.73', '25.00', 1, 'A', '01/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1850.00', '25.00', 1, 'A', '01/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1891.27', '25.00', 1, 'A', '01/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1932.54', '25.00', 1, 'A', '01/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1973.81', '25.00', 1, 'A', '01/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1416.08', '25.00', 1, 'A', '02/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1466.81', '25.00', 1, 'A', '02/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1517.54', '25.00', 1, 'A', '02/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1568.27', '25.00', 1, 'A', '02/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1619.00', '25.00', 1, 'A', '02/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1669.73', '25.00', 1, 'A', '02/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1720.46', '25.00', 1, 'A', '02/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1771.19', '25.00', 1, 'A', '02/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1821.67', '25.00', 1, 'A', '02/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1872.65', '25.00', 1, 'A', '02/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1923.38', '25.00', 1, 'A', '02/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1974.11', '25.00', 1, 'A', '02/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2024.83', '25.00', 1, 'A', '02/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2075.56', '25.00', 1, 'A', '02/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2126.29', '25.00', 1, 'A', '02/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1486.92', '25.00', 1, 'A', '03/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1547.86', '25.00', 1, 'A', '03/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1608.79', '25.00', 1, 'A', '03/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1669.73', '25.00', 1, 'A', '03/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1730.67', '25.00', 1, 'A', '03/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1791.61', '25.00', 1, 'A', '03/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1852.54', '25.00', 1, 'A', '03/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1913.48', '25.00', 1, 'A', '03/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1974.42', '25.00', 1, 'A', '03/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2035.36', '25.00', 1, 'A', '03/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2096.29', '25.00', 1, 'A', '03/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2157.23', '25.00', 1, 'A', '03/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2218.17', '25.00', 1, 'A', '03/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2279.11', '25.00', 1, 'A', '03/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2340.04', '25.00', 1, 'A', '03/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1694.77', '25.00', 1, 'A', '04/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1765.62', '25.00', 1, 'A', '04/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1836.44', '25.00', 1, 'A', '04/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1907.27', '25.00', 1, 'A', '04/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '1978.11', '25.00', 1, 'A', '04/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2048.94', '25.00', 1, 'A', '04/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2119.77', '25.00', 1, 'A', '04/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2190.61', '25.00', 1, 'A', '04/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2261.44', '25.00', 1, 'A', '04/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2332.27', '25.00', 1, 'A', '04/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2403.11', '25.00', 1, 'A', '04/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2473.94', '25.00', 1, 'A', '04/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2544.77', '25.00', 1, 'A', '04/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2615.60', '25.00', 1, 'A', '04/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2686.44', '25.00', 1, 'A', '04/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2082.81', '25.00', 1, 'A', '05/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2169.13', '25.00', 1, 'A', '05/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2255.44', '25.00', 1, 'A', '05/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2341.75', '25.00', 1, 'A', '05/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2428.06', '25.00', 1, 'A', '05/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2514.38', '25.00', 1, 'A', '05/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2600.69', '25.00', 1, 'A', '05/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2687.00', '25.00', 1, 'A', '05/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2773.31', '25.00', 1, 'A', '05/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2859.63', '25.00', 1, 'A', '05/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2945.94', '25.00', 1, 'A', '05/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3032.25', '25.00', 1, 'A', '05/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3118.56', '25.00', 1, 'A', '05/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3198.63', '25.00', 1, 'A', '05/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3291.19', '25.00', 1, 'A', '05/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2793.31', '25.00', 1, 'A', '06/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2899.71', '25.00', 1, 'A', '06/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3006.11', '25.00', 1, 'A', '06/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3112.50', '25.00', 1, 'A', '06/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3218.90', '25.00', 1, 'A', '06/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3325.29', '25.00', 1, 'A', '06/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3431.69', '25.00', 1, 'A', '06/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3538.08', '25.00', 1, 'A', '06/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3644.48', '25.00', 1, 'A', '06/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3750.88', '25.00', 1, 'A', '06/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3857.27', '25.00', 1, 'A', '06/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3963.67', '25.00', 1, 'A', '06/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4070.06', '25.00', 1, 'A', '06/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4176.46', '25.00', 1, 'A', '06/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '2497.75', '25.00', 1, 'A', '06/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3634.23', '25.00', 1, 'A', '07/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3760.86', '25.00', 1, 'A', '07/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '3887.48', '25.00', 1, 'A', '07/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4014.11', '25.00', 1, 'A', '07/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4140.73', '25.00', 1, 'A', '07/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4267.36', '25.00', 1, 'A', '07/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4393.98', '25.00', 1, 'A', '07/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4520.61', '25.00', 1, 'A', '07/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4647.23', '25.00', 1, 'A', '07/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4773.86', '25.00', 1, 'A', '07/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4900.48', '25.00', 1, 'A', '07/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5027.11', '25.00', 1, 'A', '07/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5153.73', '25.00', 1, 'A', '07/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5280.36', '25.00', 1, 'A', '07/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5406.98', '25.00', 1, 'A', '07/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4283.69', '25.00', 1, 'A', '08/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4434.48', '25.00', 1, 'A', '08/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4585.27', '25.00', 1, 'A', '08/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4736.06', '25.00', 1, 'A', '08/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '4886.86', '25.00', 1, 'A', '08/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5037.65', '25.00', 1, 'A', '08/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5188.44', '25.00', 1, 'A', '08/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5339.23', '25.00', 1, 'A', '08/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5490.02', '25.00', 1, 'A', '08/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5640.81', '25.00', 1, 'A', '08/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5791.61', '25.00', 1, 'A', '08/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5942.40', '25.00', 1, 'A', '08/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6093.19', '25.00', 1, 'A', '08/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6243.98', '25.00', 1, 'A', '08/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6394.77', '25.00', 1, 'A', '08/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5043.08', '25.00', 1, 'A', '09/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5208.88', '25.00', 1, 'A', '09/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5374.67', '25.00', 1, 'A', '09/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5540.46', '25.00', 1, 'A', '09/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5706.25', '25.00', 1, 'A', '09/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5872.04', '25.00', 1, 'A', '09/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6037.83', '25.00', 1, 'A', '09/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6203.63', '25.00', 1, 'A', '09/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6369.42', '25.00', 1, 'A', '09/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6535.21', '25.00', 1, 'A', '09/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6701.00', '25.00', 1, 'A', '09/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6866.79', '25.00', 1, 'A', '09/12', '12', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7032.58', '25.00', 1, 'A', '09/13', '13', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7198.38', '25.00', 1, 'A', '09/14', '14', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7364.17', '25.00', 1, 'A', '09/15', '15', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '5817.98', '25.00', 1, 'A', '10/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6075.15', '25.00', 1, 'A', '10/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6332.31', '25.00', 1, 'A', '10/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6589.48', '25.00', 1, 'A', '10/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6846.65', '25.00', 1, 'A', '10/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7103.81', '25.00', 1, 'A', '10/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7360.98', '25.00', 1, 'A', '10/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7618.15', '25.00', 1, 'A', '10/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7875.31', '25.00', 1, 'A', '10/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8132.48', '25.00', 1, 'A', '10/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8389.65', '25.00', 1, 'A', '10/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6504.61', '25.00', 1, 'A', '11/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '6776.50', '25.00', 1, 'A', '11/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7048.40', '25.00', 1, 'A', '11/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7320.29', '25.00', 1, 'A', '11/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7592.19', '25.00', 1, 'A', '11/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7864.08', '25.00', 1, 'A', '11/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8135.98', '25.00', 1, 'A', '11/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8407.88', '25.00', 1, 'A', '11/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8679.77', '25.00', 1, 'A', '11/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8951.67', '25.00', 1, 'A', '11/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9223.56', '25.00', 1, 'A', '11/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7194.42', '25.00', 1, 'A', '12/01', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7487.13', '25.00', 1, 'A', '12/02', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '7779.83', '25.00', 1, 'A', '12/03', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8072.54', '25.00', 1, 'A', '12/04', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8365.25', '25.00', 1, 'A', '12/05', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8657.96', '25.00', 1, 'A', '12/06', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8950.67', '25.00', 1, 'A', '12/07', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9243.38', '25.00', 1, 'A', '12/08', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9536.08', '25.00', 1, 'A', '12/09', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9828.79', '25.00', 1, 'A', '12/10', '10', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10121.50', '25.00', 1, 'A', '12/11', '11', 'E', '021');
INSERT INTO `pallowances` VALUES ('Utility', '837.61', '15.00', 1, 'A', '01/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '862.38', '15.00', 1, 'A', '01/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '887.14', '15.00', 1, 'A', '01/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '911.90', '15.00', 1, 'A', '01/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '936.66', '15.00', 1, 'A', '01/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '961.43', '15.00', 1, 'A', '01/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '986.19', '15.00', 1, 'A', '01/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1010.95', '15.00', 1, 'A', '01/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1035.71', '15.00', 1, 'A', '01/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1060.47', '15.00', 1, 'A', '01/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1085.24', '15.00', 1, 'A', '01/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1110.00', '15.00', 1, 'A', '01/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1134.76', '15.00', 1, 'A', '01/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1159.53', '15.00', 1, 'A', '01/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1184.29', '15.00', 1, 'A', '01/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '849.65', '15.00', 1, 'A', '02/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '880.09', '15.00', 1, 'A', '02/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '910.53', '15.00', 1, 'A', '02/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '940.96', '15.00', 1, 'A', '02/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '971.40', '15.00', 1, 'A', '02/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1001.84', '15.00', 1, 'A', '02/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1032.27', '15.00', 1, 'A', '02/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1062.71', '15.00', 1, 'A', '02/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1093.00', '15.00', 1, 'A', '02/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1123.59', '15.00', 1, 'A', '02/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1154.03', '15.00', 1, 'A', '02/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1184.46', '15.00', 1, 'A', '02/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1214.90', '15.00', 1, 'A', '02/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1245.34', '15.00', 1, 'A', '02/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1275.78', '15.00', 1, 'A', '02/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '892.15', '15.00', 1, 'A', '03/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '928.71', '15.00', 1, 'A', '03/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '965.28', '15.00', 1, 'A', '03/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1001.84', '15.00', 1, 'A', '03/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1038.40', '15.00', 1, 'A', '03/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1074.96', '15.00', 1, 'A', '03/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1111.53', '15.00', 1, 'A', '03/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1148.09', '15.00', 1, 'A', '03/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1184.65', '15.00', 1, 'A', '03/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1221.21', '15.00', 1, 'A', '03/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1257.78', '15.00', 1, 'A', '03/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1294.34', '15.00', 1, 'A', '03/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1330.90', '15.00', 1, 'A', '03/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1367.46', '15.00', 1, 'A', '03/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1404.03', '15.00', 1, 'A', '03/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1016.86', '15.00', 1, 'A', '04/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1059.37', '15.00', 1, 'A', '04/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1101.86', '15.00', 1, 'A', '04/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1144.36', '15.00', 1, 'A', '04/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1186.86', '15.00', 1, 'A', '04/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1229.36', '15.00', 1, 'A', '04/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1271.86', '15.00', 1, 'A', '04/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1314.36', '15.00', 1, 'A', '04/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1356.86', '15.00', 1, 'A', '04/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1399.36', '15.00', 1, 'A', '04/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1441.86', '15.00', 1, 'A', '04/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1484.36', '15.00', 1, 'A', '04/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1526.86', '15.00', 1, 'A', '04/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1569.36', '15.00', 1, 'A', '04/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1611.86', '15.00', 1, 'A', '04/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1249.69', '15.00', 1, 'A', '05/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1301.48', '15.00', 1, 'A', '05/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1353.26', '15.00', 1, 'A', '05/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1405.05', '15.00', 1, 'A', '05/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1456.84', '15.00', 1, 'A', '05/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1508.63', '15.00', 1, 'A', '05/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1560.41', '15.00', 1, 'A', '05/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1612.20', '15.00', 1, 'A', '05/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1663.99', '15.00', 1, 'A', '05/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1715.78', '15.00', 1, 'A', '05/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1767.56', '15.00', 1, 'A', '05/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1819.35', '15.00', 1, 'A', '05/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1871.14', '15.00', 1, 'A', '05/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1919.18', '15.00', 1, 'A', '05/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1974.71', '15.00', 1, 'A', '05/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1675.99', '15.00', 1, 'A', '06/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1739.82', '15.00', 1, 'A', '06/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1803.66', '15.00', 1, 'A', '06/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1867.50', '15.00', 1, 'A', '06/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1931.34', '15.00', 1, 'A', '06/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1995.18', '15.00', 1, 'A', '06/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2059.01', '15.00', 1, 'A', '06/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2122.85', '15.00', 1, 'A', '06/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2186.69', '15.00', 1, 'A', '06/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2250.53', '15.00', 1, 'A', '06/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2314.36', '15.00', 1, 'A', '06/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2378.20', '15.00', 1, 'A', '06/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2442.04', '15.00', 1, 'A', '06/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2505.87', '15.00', 1, 'A', '06/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '1498.65', '15.00', 1, 'A', '06/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2180.54', '15.00', 1, 'A', '07/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2256.51', '15.00', 1, 'A', '07/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2332.49', '15.00', 1, 'A', '07/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2408.46', '15.00', 1, 'A', '07/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2484.44', '15.00', 1, 'A', '07/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2560.41', '15.00', 1, 'A', '07/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2636.39', '15.00', 1, 'A', '07/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2712.36', '15.00', 1, 'A', '07/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2788.34', '15.00', 1, 'A', '07/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2864.31', '15.00', 1, 'A', '07/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2940.29', '15.00', 1, 'A', '07/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3016.26', '15.00', 1, 'A', '07/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3092.24', '15.00', 1, 'A', '07/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3168.21', '15.00', 1, 'A', '07/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3244.19', '15.00', 1, 'A', '07/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2570.21', '15.00', 1, 'A', '08/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2660.69', '15.00', 1, 'A', '08/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2751.16', '15.00', 1, 'A', '08/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2841.64', '15.00', 1, 'A', '08/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '2932.11', '15.00', 1, 'A', '08/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3022.59', '15.00', 1, 'A', '08/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3113.06', '15.00', 1, 'A', '08/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3203.54', '15.00', 1, 'A', '08/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3294.01', '15.00', 1, 'A', '08/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3384.49', '15.00', 1, 'A', '08/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3474.96', '15.00', 1, 'A', '08/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3565.44', '15.00', 1, 'A', '08/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3655.91', '15.00', 1, 'A', '08/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3746.39', '15.00', 1, 'A', '08/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3836.86', '15.00', 1, 'A', '08/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3025.85', '15.00', 1, 'A', '09/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3125.33', '15.00', 1, 'A', '09/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3224.80', '15.00', 1, 'A', '09/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3324.27', '15.00', 1, 'A', '09/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3423.75', '15.00', 1, 'A', '09/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3523.23', '15.00', 1, 'A', '09/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3622.70', '15.00', 1, 'A', '09/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3722.18', '15.00', 1, 'A', '09/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3821.65', '15.00', 1, 'A', '09/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3921.12', '15.00', 1, 'A', '09/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4020.60', '15.00', 1, 'A', '09/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4120.08', '15.00', 1, 'A', '09/12', '12', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4219.55', '15.00', 1, 'A', '09/13', '13', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4319.03', '15.00', 1, 'A', '09/14', '14', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4418.50', '15.00', 1, 'A', '09/15', '15', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3490.79', '15.00', 1, 'A', '10/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3645.09', '15.00', 1, 'A', '10/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3799.39', '15.00', 1, 'A', '10/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3953.69', '15.00', 1, 'A', '10/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4107.99', '15.00', 1, 'A', '10/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4262.29', '15.00', 1, 'A', '10/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4416.59', '15.00', 1, 'A', '10/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4570.89', '15.00', 1, 'A', '10/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4725.19', '15.00', 1, 'A', '10/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4879.49', '15.00', 1, 'A', '10/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5033.79', '15.00', 1, 'A', '10/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '3902.76', '15.00', 1, 'A', '11/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4065.90', '15.00', 1, 'A', '11/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4229.04', '15.00', 1, 'A', '11/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4392.18', '15.00', 1, 'A', '11/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4555.31', '15.00', 1, 'A', '11/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4718.45', '15.00', 1, 'A', '11/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4881.59', '15.00', 1, 'A', '11/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5044.73', '15.00', 1, 'A', '11/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5207.86', '15.00', 1, 'A', '11/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5371.00', '15.00', 1, 'A', '11/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5534.14', '15.00', 1, 'A', '11/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4316.65', '15.00', 1, 'A', '12/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4492.28', '15.00', 1, 'A', '12/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4667.90', '15.00', 1, 'A', '12/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4843.53', '15.00', 1, 'A', '12/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5019.15', '15.00', 1, 'A', '12/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5194.77', '15.00', 1, 'A', '12/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5370.40', '15.00', 1, 'A', '12/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5546.03', '15.00', 1, 'A', '12/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5721.65', '15.00', 1, 'A', '12/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5897.28', '15.00', 1, 'A', '12/10', '10', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6072.90', '15.00', 1, 'A', '12/11', '11', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '4781.03', '15.00', 1, 'A', '13/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5015.89', '15.00', 1, 'A', '13/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5250.75', '15.00', 1, 'A', '13/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5485.61', '15.00', 1, 'A', '13/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5720.48', '15.00', 1, 'A', '13/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5955.34', '15.00', 1, 'A', '13/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6190.20', '15.00', 1, 'A', '13/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6425.06', '15.00', 1, 'A', '13/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6659.93', '15.00', 1, 'A', '13/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5288.04', '15.00', 1, 'A', '14/10', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5570.28', '15.00', 1, 'A', '14/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '5852.51', '15.00', 1, 'A', '14/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6134.75', '15.00', 1, 'A', '14/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6416.99', '15.00', 1, 'A', '14/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6699.23', '15.00', 1, 'A', '14/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '6981.46', '15.00', 1, 'A', '14/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '7263.70', '15.00', 1, 'A', '14/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '7545.94', '15.00', 1, 'A', '14/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '7861.23', '20.00', 1, 'A', '15/01', '01', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '8288.32', '20.00', 1, 'A', '15/02', '02', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '8715.40', '20.00', 1, 'A', '15/03', '03', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '9142.48', '20.00', 1, 'A', '15/04', '04', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '9569.57', '20.00', 1, 'A', '15/05', '05', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '9996.65', '20.00', 1, 'A', '15/06', '06', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '10423.73', '20.00', 1, 'A', '15/07', '07', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '10850.82', '20.00', 1, 'A', '15/08', '08', 'E', '023');
INSERT INTO `pallowances` VALUES ('Utility', '11277.90', '20.00', 1, 'A', '15/09', '09', 'E', '023');
INSERT INTO `pallowances` VALUES ('Medical', '558.41', '10.00', 3, 'A', '01/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '574.92', '10.00', 3, 'A', '01/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '591.43', '10.00', 3, 'A', '01/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '607.93', '10.00', 3, 'A', '01/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '624.44', '10.00', 3, 'A', '01/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '640.95', '10.00', 3, 'A', '01/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '657.46', '10.00', 3, 'A', '01/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '673.97', '10.00', 3, 'A', '01/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '690.48', '10.00', 3, 'A', '01/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '706.98', '10.00', 3, 'A', '01/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '723.49', '10.00', 3, 'A', '01/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '740.00', '10.00', 3, 'A', '01/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '756.51', '10.00', 3, 'A', '01/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '773.02', '10.00', 3, 'A', '01/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '789.53', '10.00', 3, 'A', '01/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '566.43', '10.00', 3, 'A', '02/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '586.73', '10.00', 3, 'A', '02/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '607.02', '10.00', 3, 'A', '02/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '627.31', '10.00', 3, 'A', '02/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '647.60', '10.00', 3, 'A', '02/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '667.89', '10.00', 3, 'A', '02/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '688.18', '10.00', 3, 'A', '02/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '708.48', '10.00', 3, 'A', '02/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '728.67', '10.00', 3, 'A', '02/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '749.06', '10.00', 3, 'A', '02/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '769.35', '10.00', 3, 'A', '02/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '789.64', '10.00', 3, 'A', '02/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '809.93', '10.00', 3, 'A', '02/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '830.23', '10.00', 3, 'A', '02/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '850.52', '10.00', 3, 'A', '02/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '594.77', '10.00', 3, 'A', '03/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '619.14', '10.00', 3, 'A', '03/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '643.52', '10.00', 3, 'A', '03/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '667.89', '10.00', 3, 'A', '03/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '692.27', '10.00', 3, 'A', '03/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '716.64', '10.00', 3, 'A', '03/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '741.02', '10.00', 3, 'A', '03/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '765.39', '10.00', 3, 'A', '03/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '789.77', '10.00', 3, 'A', '03/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '814.14', '10.00', 3, 'A', '03/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '838.52', '10.00', 3, 'A', '03/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '862.89', '10.00', 3, 'A', '03/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '887.27', '10.00', 3, 'A', '03/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '911.64', '10.00', 3, 'A', '03/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '936.02', '10.00', 3, 'A', '03/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '677.91', '10.00', 3, 'A', '04/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '706.25', '10.00', 3, 'A', '04/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '734.58', '10.00', 3, 'A', '04/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '762.91', '10.00', 3, 'A', '04/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '791.24', '10.00', 3, 'A', '04/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '819.58', '10.00', 3, 'A', '04/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '847.91', '10.00', 3, 'A', '04/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '876.24', '10.00', 3, 'A', '04/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '904.58', '10.00', 3, 'A', '04/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '932.91', '10.00', 3, 'A', '04/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '961.24', '10.00', 3, 'A', '04/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '989.58', '10.00', 3, 'A', '04/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1017.91', '10.00', 3, 'A', '04/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1046.24', '10.00', 3, 'A', '04/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1074.58', '10.00', 3, 'A', '04/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '833.13', '10.00', 3, 'A', '05/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '867.65', '10.00', 3, 'A', '05/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '902.18', '10.00', 3, 'A', '05/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '936.70', '10.00', 3, 'A', '05/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '971.23', '10.00', 3, 'A', '05/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1005.75', '10.00', 3, 'A', '05/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1040.28', '10.00', 3, 'A', '05/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1074.80', '10.00', 3, 'A', '05/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1109.33', '10.00', 3, 'A', '05/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1143.85', '10.00', 3, 'A', '05/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1178.38', '10.00', 3, 'A', '05/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1212.90', '10.00', 3, 'A', '05/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1247.43', '10.00', 3, 'A', '05/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1279.45', '10.00', 3, 'A', '05/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1316.48', '10.00', 3, 'A', '05/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1117.33', '10.00', 3, 'A', '06/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1159.88', '10.00', 3, 'A', '06/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1202.44', '10.00', 3, 'A', '06/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1245.00', '10.00', 3, 'A', '06/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1287.56', '10.00', 3, 'A', '06/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1330.12', '10.00', 3, 'A', '06/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1372.68', '10.00', 3, 'A', '06/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1415.23', '10.00', 3, 'A', '06/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1457.79', '10.00', 3, 'A', '06/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1500.35', '10.00', 3, 'A', '06/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1542.91', '10.00', 3, 'A', '06/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1585.47', '10.00', 3, 'A', '06/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1628.03', '10.00', 3, 'A', '06/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1670.58', '10.00', 3, 'A', '06/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '999.10', '10.00', 3, 'A', '06/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1453.69', '10.00', 3, 'A', '07/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1504.34', '10.00', 3, 'A', '07/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1554.99', '10.00', 3, 'A', '07/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1605.64', '10.00', 3, 'A', '07/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1656.29', '10.00', 3, 'A', '07/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1706.94', '10.00', 3, 'A', '07/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1757.59', '10.00', 3, 'A', '07/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1808.24', '10.00', 3, 'A', '07/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1858.89', '10.00', 3, 'A', '07/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1909.54', '10.00', 3, 'A', '07/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1960.19', '10.00', 3, 'A', '07/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2010.84', '10.00', 3, 'A', '07/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2061.49', '10.00', 3, 'A', '07/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2112.14', '10.00', 3, 'A', '07/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2162.79', '10.00', 3, 'A', '07/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1713.48', '10.00', 3, 'A', '08/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1773.79', '10.00', 3, 'A', '08/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1834.11', '10.00', 3, 'A', '08/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1894.43', '10.00', 3, 'A', '08/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '1954.74', '10.00', 3, 'A', '08/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2015.06', '10.00', 3, 'A', '08/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2075.38', '10.00', 3, 'A', '08/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2135.69', '10.00', 3, 'A', '08/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2196.01', '10.00', 3, 'A', '08/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2256.33', '10.00', 3, 'A', '08/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2316.64', '10.00', 3, 'A', '08/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2376.96', '10.00', 3, 'A', '08/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2437.28', '10.00', 3, 'A', '08/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2497.59', '10.00', 3, 'A', '08/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2557.91', '10.00', 3, 'A', '08/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2017.23', '10.00', 3, 'A', '09/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2083.55', '10.00', 3, 'A', '09/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2149.87', '10.00', 3, 'A', '09/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2216.18', '10.00', 3, 'A', '09/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2282.50', '10.00', 3, 'A', '09/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2348.82', '10.00', 3, 'A', '09/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2415.13', '10.00', 3, 'A', '09/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2481.45', '10.00', 3, 'A', '09/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2547.77', '10.00', 3, 'A', '09/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2614.08', '10.00', 3, 'A', '09/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2680.40', '10.00', 3, 'A', '09/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2746.72', '10.00', 3, 'A', '09/12', '12', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2813.03', '10.00', 3, 'A', '09/13', '13', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2879.35', '10.00', 3, 'A', '09/14', '14', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2945.67', '10.00', 3, 'A', '09/15', '15', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2327.19', '10.00', 3, 'A', '10/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2430.06', '10.00', 3, 'A', '10/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2532.93', '10.00', 3, 'A', '10/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2635.79', '10.00', 3, 'A', '10/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2738.66', '10.00', 3, 'A', '10/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2841.53', '10.00', 3, 'A', '10/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2944.39', '10.00', 3, 'A', '10/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3047.26', '10.00', 3, 'A', '10/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3150.13', '10.00', 3, 'A', '10/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3252.99', '10.00', 3, 'A', '10/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3355.86', '10.00', 3, 'A', '10/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2601.84', '10.00', 3, 'A', '11/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2710.60', '10.00', 3, 'A', '11/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2819.36', '10.00', 3, 'A', '11/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2928.12', '10.00', 3, 'A', '11/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3036.88', '10.00', 3, 'A', '11/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3145.63', '10.00', 3, 'A', '11/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3254.39', '10.00', 3, 'A', '11/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3363.15', '10.00', 3, 'A', '11/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3471.91', '10.00', 3, 'A', '11/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3580.67', '10.00', 3, 'A', '11/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3689.43', '10.00', 3, 'A', '11/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2877.77', '10.00', 3, 'A', '12/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '2994.85', '10.00', 3, 'A', '12/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3111.93', '10.00', 3, 'A', '12/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3229.02', '10.00', 3, 'A', '12/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3346.10', '10.00', 3, 'A', '12/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3463.18', '10.00', 3, 'A', '12/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3580.27', '10.00', 3, 'A', '12/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3697.35', '10.00', 3, 'A', '12/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3814.43', '10.00', 3, 'A', '12/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3931.52', '10.00', 3, 'A', '12/10', '10', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4048.60', '10.00', 3, 'A', '12/11', '11', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3187.35', '10.00', 3, 'A', '13/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3343.93', '10.00', 3, 'A', '13/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3500.50', '10.00', 3, 'A', '13/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3657.08', '10.00', 3, 'A', '13/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3813.65', '10.00', 3, 'A', '13/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3970.23', '10.00', 3, 'A', '13/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4126.80', '10.00', 3, 'A', '13/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4283.38', '10.00', 3, 'A', '13/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4439.95', '10.00', 3, 'A', '13/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3525.36', '10.00', 3, 'A', '14/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3713.52', '10.00', 3, 'A', '14/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3901.68', '10.00', 3, 'A', '14/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4089.83', '10.00', 3, 'A', '14/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4277.99', '10.00', 3, 'A', '14/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4466.15', '10.00', 3, 'A', '14/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4654.31', '10.00', 3, 'A', '14/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4842.47', '10.00', 3, 'A', '14/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '5030.63', '10.00', 3, 'A', '14/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '3930.62', '10.00', 3, 'A', '15/01', '01', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4144.16', '10.00', 3, 'A', '15/02', '02', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4357.70', '10.00', 3, 'A', '15/03', '03', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4571.24', '10.00', 3, 'A', '15/04', '04', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4784.78', '10.00', 3, 'A', '15/05', '05', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '4998.33', '10.00', 3, 'A', '15/06', '06', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '5211.87', '10.00', 3, 'A', '15/07', '07', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '5425.41', '10.00', 3, 'A', '15/08', '08', 'E', '260');
INSERT INTO `pallowances` VALUES ('Medical', '5638.95', '10.00', 3, 'A', '15/09', '09', 'E', '260');
INSERT INTO `pallowances` VALUES ('Furniture', '4469.30', '40.00', 2, 'A', '06/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '4639.53', '40.00', 2, 'A', '06/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '4809.77', '40.00', 2, 'A', '06/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '4980.00', '40.00', 2, 'A', '06/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '5150.23', '40.00', 2, 'A', '06/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '5320.47', '40.00', 2, 'A', '06/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '5490.70', '40.00', 2, 'A', '06/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '5660.93', '40.00', 2, 'A', '06/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '5831.17', '40.00', 2, 'A', '06/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6001.40', '40.00', 2, 'A', '06/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6171.63', '40.00', 2, 'A', '06/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6341.87', '40.00', 2, 'A', '06/12', '12', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6512.10', '40.00', 2, 'A', '06/13', '13', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6682.33', '40.00', 2, 'A', '06/14', '14', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '3996.40', '40.00', 2, 'A', '06/15', '15', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '5814.77', '40.00', 2, 'A', '07/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6017.37', '40.00', 2, 'A', '07/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6219.97', '40.00', 2, 'A', '07/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6422.57', '40.00', 2, 'A', '07/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6625.17', '40.00', 2, 'A', '07/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6827.77', '40.00', 2, 'A', '07/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7030.37', '40.00', 2, 'A', '07/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7232.97', '40.00', 2, 'A', '07/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7435.57', '40.00', 2, 'A', '07/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7638.17', '40.00', 2, 'A', '07/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7840.77', '40.00', 2, 'A', '07/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8043.37', '40.00', 2, 'A', '07/12', '12', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8245.97', '40.00', 2, 'A', '07/13', '13', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8448.57', '40.00', 2, 'A', '07/14', '14', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8651.17', '40.00', 2, 'A', '07/15', '15', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '6853.90', '40.00', 2, 'A', '08/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7095.17', '40.00', 2, 'A', '08/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7336.43', '40.00', 2, 'A', '08/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7577.70', '40.00', 2, 'A', '08/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '7818.97', '40.00', 2, 'A', '08/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8060.23', '40.00', 2, 'A', '08/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8301.50', '40.00', 2, 'A', '08/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8542.77', '40.00', 2, 'A', '08/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8784.03', '40.00', 2, 'A', '08/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9025.30', '40.00', 2, 'A', '08/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9266.57', '40.00', 2, 'A', '08/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9507.83', '40.00', 2, 'A', '08/12', '12', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9749.10', '40.00', 2, 'A', '08/13', '13', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9990.37', '40.00', 2, 'A', '08/14', '14', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10231.63', '40.00', 2, 'A', '08/15', '15', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8068.93', '40.00', 2, 'A', '09/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8334.20', '40.00', 2, 'A', '09/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8599.47', '40.00', 2, 'A', '09/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '8864.73', '40.00', 2, 'A', '09/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9130.00', '40.00', 2, 'A', '09/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9395.27', '40.00', 2, 'A', '09/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9660.53', '40.00', 2, 'A', '09/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9925.80', '40.00', 2, 'A', '09/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10191.07', '40.00', 2, 'A', '09/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10456.33', '40.00', 2, 'A', '09/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10721.60', '40.00', 2, 'A', '09/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10986.87', '40.00', 2, 'A', '09/12', '12', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11252.13', '40.00', 2, 'A', '09/13', '13', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11517.40', '40.00', 2, 'A', '09/14', '14', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11782.67', '40.00', 2, 'A', '09/15', '15', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9308.77', '40.00', 2, 'A', '10/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '9720.23', '40.00', 2, 'A', '10/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10131.70', '40.00', 2, 'A', '10/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10543.17', '40.00', 2, 'A', '10/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10954.63', '40.00', 2, 'A', '10/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11366.10', '40.00', 2, 'A', '10/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11777.57', '40.00', 2, 'A', '10/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12189.03', '40.00', 2, 'A', '10/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12600.50', '40.00', 2, 'A', '10/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13011.97', '40.00', 2, 'A', '10/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13423.43', '40.00', 2, 'A', '10/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10407.37', '40.00', 2, 'A', '11/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '10842.40', '40.00', 2, 'A', '11/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11277.43', '40.00', 2, 'A', '11/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11712.47', '40.00', 2, 'A', '11/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12147.50', '40.00', 2, 'A', '11/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12582.53', '40.00', 2, 'A', '11/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13017.57', '40.00', 2, 'A', '11/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13452.60', '40.00', 2, 'A', '11/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13887.63', '40.00', 2, 'A', '11/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14322.67', '40.00', 2, 'A', '11/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14757.70', '40.00', 2, 'A', '11/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11511.07', '40.00', 2, 'A', '12/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '11979.40', '40.00', 2, 'A', '12/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12447.73', '40.00', 2, 'A', '12/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12916.07', '40.00', 2, 'A', '12/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13384.40', '40.00', 2, 'A', '12/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13852.73', '40.00', 2, 'A', '12/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14321.07', '40.00', 2, 'A', '12/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14789.40', '40.00', 2, 'A', '12/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '15257.73', '40.00', 2, 'A', '12/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '15726.07', '40.00', 2, 'A', '12/10', '10', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '16194.40', '40.00', 2, 'A', '12/11', '11', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '12749.40', '40.00', 2, 'A', '13/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '13375.70', '40.00', 2, 'A', '13/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14002.00', '40.00', 2, 'A', '13/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14628.30', '40.00', 2, 'A', '13/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '15254.60', '40.00', 2, 'A', '13/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '15880.90', '40.00', 2, 'A', '13/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '16507.20', '40.00', 2, 'A', '13/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '17133.50', '40.00', 2, 'A', '13/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '17759.80', '40.00', 2, 'A', '13/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14101.43', '40.00', 2, 'A', '14/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '14854.07', '40.00', 2, 'A', '14/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '15606.70', '40.00', 2, 'A', '14/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '16359.33', '40.00', 2, 'A', '14/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '17111.97', '40.00', 2, 'A', '14/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '17864.60', '40.00', 2, 'A', '14/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '18617.23', '40.00', 2, 'A', '14/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '19369.87', '40.00', 2, 'A', '14/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '20122.50', '40.00', 2, 'A', '14/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '15722.47', '40.00', 2, 'A', '15/01', '01', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '16576.63', '40.00', 2, 'A', '15/02', '02', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '17430.80', '40.00', 2, 'A', '15/03', '03', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '18284.97', '40.00', 2, 'A', '15/04', '04', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '19139.13', '40.00', 2, 'A', '15/05', '05', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '19993.30', '40.00', 2, 'A', '15/06', '06', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '20847.47', '40.00', 2, 'A', '15/07', '07', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '21701.63', '40.00', 2, 'A', '15/08', '08', 'E', '325');
INSERT INTO `pallowances` VALUES ('Furniture', '22555.80', '40.00', 2, 'A', '15/09', '09', 'E', '325');
INSERT INTO `pallowances` VALUES ('NHF', '796.84', '2.50', 12, 'D', '13/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '835.98', '2.50', 12, 'D', '13/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '875.13', '2.50', 12, 'D', '13/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '914.27', '2.50', 12, 'D', '13/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '953.41', '2.50', 12, 'D', '13/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '992.56', '2.50', 12, 'D', '13/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1031.70', '2.50', 12, 'D', '13/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1070.84', '2.50', 12, 'D', '13/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1109.99', '2.50', 12, 'D', '13/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '881.34', '2.50', 12, 'D', '14/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '928.38', '2.50', 12, 'D', '14/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '975.42', '2.50', 12, 'D', '14/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1022.46', '2.50', 12, 'D', '14/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1069.50', '2.50', 12, 'D', '14/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1116.54', '2.50', 12, 'D', '14/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1163.58', '2.50', 12, 'D', '14/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1210.62', '2.50', 12, 'D', '14/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1257.66', '2.50', 12, 'D', '14/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '982.65', '2.50', 12, 'D', '15/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1036.04', '2.50', 12, 'D', '15/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1089.43', '2.50', 12, 'D', '15/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1142.81', '2.50', 12, 'D', '15/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1196.20', '2.50', 12, 'D', '15/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1249.58', '2.50', 12, 'D', '15/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1302.97', '2.50', 12, 'D', '15/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1356.35', '2.50', 12, 'D', '15/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1409.74', '2.50', 12, 'D', '15/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '581.80', '2.50', 12, 'D', '10/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '607.51', '2.50', 12, 'D', '10/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '633.23', '2.50', 12, 'D', '10/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '658.95', '2.50', 12, 'D', '10/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '684.66', '2.50', 12, 'D', '10/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '710.38', '2.50', 12, 'D', '10/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '736.10', '2.50', 12, 'D', '10/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '761.81', '2.50', 12, 'D', '10/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '787.53', '2.50', 12, 'D', '10/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '813.25', '2.50', 12, 'D', '10/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '838.96', '2.50', 12, 'D', '10/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '650.46', '2.50', 12, 'D', '11/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '677.65', '2.50', 12, 'D', '11/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '704.84', '2.50', 12, 'D', '11/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '732.03', '2.50', 12, 'D', '11/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '759.22', '2.50', 12, 'D', '11/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '786.41', '2.50', 12, 'D', '11/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '813.60', '2.50', 12, 'D', '11/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '840.79', '2.50', 12, 'D', '11/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '867.98', '2.50', 12, 'D', '11/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '895.17', '2.50', 12, 'D', '11/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '922.36', '2.50', 12, 'D', '11/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '719.44', '2.50', 12, 'D', '12/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '748.71', '2.50', 12, 'D', '12/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '777.98', '2.50', 12, 'D', '12/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '807.25', '2.50', 12, 'D', '12/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '836.53', '2.50', 12, 'D', '12/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '865.80', '2.50', 12, 'D', '12/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '895.07', '2.50', 12, 'D', '12/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '924.34', '2.50', 12, 'D', '12/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '953.61', '2.50', 12, 'D', '12/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '982.88', '2.50', 12, 'D', '12/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '1012.15', '2.50', 12, 'D', '12/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '139.60', '2.50', 12, 'D', '01/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '143.73', '2.50', 12, 'D', '01/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '147.86', '2.50', 12, 'D', '01/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '151.98', '2.50', 12, 'D', '01/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '156.11', '2.50', 12, 'D', '01/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '160.24', '2.50', 12, 'D', '01/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '164.36', '2.50', 12, 'D', '01/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '168.49', '2.50', 12, 'D', '01/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '172.62', '2.50', 12, 'D', '01/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '176.75', '2.50', 12, 'D', '01/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '732.91', '13.13', 12, 'D', '01/01', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '754.58', '13.13', 12, 'D', '01/02', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '776.25', '13.13', 12, 'D', '01/03', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('NHF', '180.87', '2.50', 12, 'D', '01/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '185.00', '2.50', 12, 'D', '01/12', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '189.13', '2.50', 12, 'D', '01/13', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '193.25', '2.50', 12, 'D', '01/14', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '197.38', '2.50', 12, 'D', '01/15', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '141.61', '2.50', 12, 'D', '02/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '146.68', '2.50', 12, 'D', '02/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '151.75', '2.50', 12, 'D', '02/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '156.83', '2.50', 12, 'D', '02/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '161.90', '2.50', 12, 'D', '02/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '166.97', '2.50', 12, 'D', '02/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '172.05', '2.50', 12, 'D', '02/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '177.12', '2.50', 12, 'D', '02/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '182.17', '2.50', 12, 'D', '02/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '187.26', '2.50', 12, 'D', '02/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '192.34', '2.50', 12, 'D', '02/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '197.41', '2.50', 12, 'D', '02/12', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '202.48', '2.50', 12, 'D', '02/13', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '207.56', '2.50', 12, 'D', '02/14', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '212.63', '2.50', 12, 'D', '02/15', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '148.69', '2.50', 12, 'D', '03/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '154.79', '2.50', 12, 'D', '03/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '160.88', '2.50', 12, 'D', '03/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '166.97', '2.50', 12, 'D', '03/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '173.07', '2.50', 12, 'D', '03/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '179.16', '2.50', 12, 'D', '03/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '185.25', '2.50', 12, 'D', '03/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '191.35', '2.50', 12, 'D', '03/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '197.44', '2.50', 12, 'D', '03/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '203.54', '2.50', 12, 'D', '03/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '209.63', '2.50', 12, 'D', '03/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '215.72', '2.50', 12, 'D', '03/12', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '221.82', '2.50', 12, 'D', '03/13', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '227.91', '2.50', 12, 'D', '03/14', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '234.00', '2.50', 12, 'D', '03/15', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '169.48', '2.50', 12, 'D', '04/01', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '176.56', '2.50', 12, 'D', '04/02', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '183.64', '2.50', 12, 'D', '04/03', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '190.73', '2.50', 12, 'D', '04/04', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '197.81', '2.50', 12, 'D', '04/05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '204.89', '2.50', 12, 'D', '04/06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '211.98', '2.50', 12, 'D', '04/07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '219.06', '2.50', 12, 'D', '04/08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '797.91', '13.13', 12, 'D', '01/04', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '819.58', '13.13', 12, 'D', '01/05', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '841.25', '13.13', 12, 'D', '01/06', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '862.91', '13.13', 12, 'D', '01/07', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '884.58', '13.13', 12, 'D', '01/08', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '906.25', '13.13', 12, 'D', '01/09', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('NHF', '226.14', '2.50', 12, 'D', '04/09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '233.23', '2.50', 12, 'D', '04/10', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '240.31', '2.50', 12, 'D', '04/11', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '247.39', '2.50', 12, 'D', '04/12', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '254.48', '2.50', 12, 'D', '04/13', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '261.56', '2.50', 12, 'D', '04', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '268.64', '2.50', 12, 'D', '04', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '208.28', '2.50', 12, 'D', '05', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '216.91', '2.50', 12, 'D', '05', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '225.54', '2.50', 12, 'D', '05', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '234.18', '2.50', 12, 'D', '05', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '242.81', '2.50', 12, 'D', '05', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '251.44', '2.50', 12, 'D', '05', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '260.07', '2.50', 12, 'D', '05', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '268.70', '2.50', 12, 'D', '05', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '277.33', '2.50', 12, 'D', '05', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '285.96', '2.50', 12, 'D', '05', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '294.59', '2.50', 12, 'D', '05', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '303.23', '2.50', 12, 'D', '05', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '311.86', '2.50', 12, 'D', '05', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '319.86', '2.50', 12, 'D', '05', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '329.12', '2.50', 12, 'D', '05', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '279.33', '2.50', 12, 'D', '06', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '289.97', '2.50', 12, 'D', '06', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '300.61', '2.50', 12, 'D', '06', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '311.25', '2.50', 12, 'D', '06', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '321.89', '2.50', 12, 'D', '06', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '332.53', '2.50', 12, 'D', '06', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '343.17', '2.50', 12, 'D', '06', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '353.81', '2.50', 12, 'D', '06', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '364.45', '2.50', 12, 'D', '06', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '375.09', '2.50', 12, 'D', '06', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '385.73', '2.50', 12, 'D', '06', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '396.37', '2.50', 12, 'D', '06', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '407.01', '2.50', 12, 'D', '06', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '417.65', '2.50', 12, 'D', '06', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '249.78', '2.50', 12, 'D', '06', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '363.42', '2.50', 12, 'D', '07', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '376.09', '2.50', 12, 'D', '07', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '388.75', '2.50', 12, 'D', '07', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '401.41', '2.50', 12, 'D', '07', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '414.07', '2.50', 12, 'D', '07', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '927.92', '13.13', 12, 'D', '01', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '949.58', '13.13', 12, 'D', '01', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '971.25', '13.13', 12, 'D', '01', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '992.92', '13.13', 12, 'D', '01', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1014.58', '13.13', 12, 'D', '01', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1036.25', '13.13', 12, 'D', '01', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '743.44', '13.13', 12, 'D', '02', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '770.08', '13.13', 12, 'D', '02', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '796.71', '13.13', 12, 'D', '02', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '823.34', '13.13', 12, 'D', '02', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '849.98', '13.13', 12, 'D', '02', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('NHF', '426.74', '2.50', 12, 'D', '07', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '439.40', '2.50', 12, 'D', '07', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '452.06', '2.50', 12, 'D', '07', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '464.72', '2.50', 12, 'D', '07', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '477.39', '2.50', 12, 'D', '07', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '490.05', '2.50', 12, 'D', '07', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '502.71', '2.50', 12, 'D', '07', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '515.37', '2.50', 12, 'D', '07', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '528.04', '2.50', 12, 'D', '07', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '540.70', '2.50', 12, 'D', '07', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '428.37', '2.50', 12, 'D', '08', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '443.45', '2.50', 12, 'D', '08', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '458.53', '2.50', 12, 'D', '08', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '473.61', '2.50', 12, 'D', '08', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '488.69', '2.50', 12, 'D', '08', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '876.61', '13.13', 12, 'D', '02', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '903.24', '13.13', 12, 'D', '02', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '929.87', '13.13', 12, 'D', '02', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '956.38', '13.13', 12, 'D', '02', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '983.14', '13.13', 12, 'D', '02', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1009.77', '13.13', 12, 'D', '02', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1036.41', '13.13', 12, 'D', '02', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1063.04', '13.13', 12, 'D', '02', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1089.67', '13.13', 12, 'D', '02', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1116.30', '13.13', 12, 'D', '02', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '780.63', '13.13', 12, 'D', '03', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '812.62', '13.13', 12, 'D', '03', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '844.62', '13.13', 12, 'D', '03', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '876.61', '13.13', 12, 'D', '03', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '908.60', '13.13', 12, 'D', '03', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '940.59', '13.13', 12, 'D', '03', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '972.58', '13.13', 12, 'D', '03', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1004.58', '13.13', 12, 'D', '03', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1036.57', '13.13', 12, 'D', '03', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1068.56', '13.13', 12, 'D', '03', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1100.55', '13.13', 12, 'D', '03', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1132.55', '13.13', 12, 'D', '03', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1164.54', '13.13', 12, 'D', '03', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1196.53', '13.13', 12, 'D', '03', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1228.52', '13.13', 12, 'D', '03', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '889.75', '13.13', 12, 'D', '04', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '926.95', '13.13', 12, 'D', '04', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '964.13', '13.13', 12, 'D', '04', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1001.32', '13.13', 12, 'D', '04', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1038.51', '13.13', 12, 'D', '04', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1075.69', '13.13', 12, 'D', '04', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1112.88', '13.13', 12, 'D', '04', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1150.07', '13.13', 12, 'D', '04', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1187.25', '13.13', 12, 'D', '04', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1224.44', '13.13', 12, 'D', '04', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1261.63', '13.13', 12, 'D', '04', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1298.82', '13.13', 12, 'D', '04', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1336.00', '13.13', 12, 'D', '04', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1373.19', '13.13', 12, 'D', '04', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1410.38', '13.13', 12, 'D', '04', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1093.48', '13.13', 12, 'D', '05', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1138.79', '13.13', 12, 'D', '05', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1184.10', '13.13', 12, 'D', '05', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1229.42', '13.13', 12, 'D', '05', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1274.73', '13.13', 12, 'D', '05', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1320.05', '13.13', 12, 'D', '05', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1365.36', '13.13', 12, 'D', '05', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1410.68', '13.13', 12, 'D', '05', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1455.99', '13.13', 12, 'D', '05', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1501.30', '13.13', 12, 'D', '05', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1546.62', '13.13', 12, 'D', '05', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1591.93', '13.13', 12, 'D', '05', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1637.25', '13.13', 12, 'D', '05', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1679.28', '13.13', 12, 'D', '05', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1727.87', '13.13', 12, 'D', '05', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1550.29', '13.88', 12, 'D', '06', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1609.34', '13.88', 12, 'D', '06', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1668.39', '13.88', 12, 'D', '06', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1727.44', '13.88', 12, 'D', '06', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1786.49', '13.88', 12, 'D', '06', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1845.54', '13.88', 12, 'D', '06', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1904.59', '13.88', 12, 'D', '06', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1963.64', '13.88', 12, 'D', '06', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2022.69', '13.88', 12, 'D', '06', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2081.74', '13.88', 12, 'D', '06', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2140.78', '13.88', 12, 'D', '06', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2199.84', '13.88', 12, 'D', '06', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2258.88', '13.88', 12, 'D', '06', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2317.93', '13.88', 12, 'D', '06', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '1386.25', '13.88', 12, 'D', '06', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2017.00', '13.88', 12, 'D', '07', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2087.27', '13.88', 12, 'D', '07', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2157.55', '13.88', 12, 'D', '07', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2227.83', '13.88', 12, 'D', '07', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2298.11', '13.88', 12, 'D', '07', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2368.38', '13.88', 12, 'D', '07', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2438.66', '13.88', 12, 'D', '07', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2508.94', '13.88', 12, 'D', '07', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2579.21', '13.88', 12, 'D', '07', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2649.49', '13.88', 12, 'D', '07', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2719.77', '13.88', 12, 'D', '07', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2790.04', '13.88', 12, 'D', '07', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2860.32', '13.88', 12, 'D', '07', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2930.60', '13.88', 12, 'D', '07', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3000.87', '13.88', 12, 'D', '07', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2377.45', '13.88', 12, 'D', '08', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2461.14', '13.88', 12, 'D', '08', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2544.82', '13.88', 12, 'D', '08', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2628.51', '13.88', 12, 'D', '08', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2712.20', '13.88', 12, 'D', '08', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2795.89', '13.88', 12, 'D', '08', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2879.58', '13.88', 12, 'D', '08', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2963.27', '13.88', 12, 'D', '08', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3046.96', '13.88', 12, 'D', '08', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3130.65', '13.88', 12, 'D', '08', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3214.34', '13.88', 12, 'D', '08', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3298.03', '13.88', 12, 'D', '08', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3381.72', '13.88', 12, 'D', '08', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3465.41', '13.88', 12, 'D', '08', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3549.10', '13.88', 12, 'D', '08', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2798.91', '13.88', 12, 'D', '09', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2890.93', '13.88', 12, 'D', '09', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '2982.94', '13.88', 12, 'D', '09', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3074.95', '13.88', 12, 'D', '09', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3166.97', '13.88', 12, 'D', '09', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3258.98', '13.88', 12, 'D', '09', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3351.00', '13.88', 12, 'D', '09', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3443.01', '13.88', 12, 'D', '09', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3535.03', '13.88', 12, 'D', '09', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3627.04', '13.88', 12, 'D', '09', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3719.06', '13.88', 12, 'D', '09', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3811.07', '13.88', 12, 'D', '09', '12', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3903.08', '13.88', 12, 'D', '09', '13', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3995.10', '13.88', 12, 'D', '09', '14', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4087.11', '13.88', 12, 'D', '09', '15', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3228.98', '13.88', 12, 'D', '10', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3371.71', '13.88', 12, 'D', '10', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3514.43', '13.88', 12, 'D', '10', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3657.16', '13.88', 12, 'D', '10', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3799.89', '13.88', 12, 'D', '10', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3942.62', '13.88', 12, 'D', '10', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4085.34', '13.88', 12, 'D', '10', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4228.07', '13.88', 12, 'D', '10', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4370.80', '13.88', 12, 'D', '10', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4513.53', '13.88', 12, 'D', '10', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4656.25', '13.88', 12, 'D', '10', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3610.06', '13.88', 12, 'D', '11', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3760.96', '13.88', 12, 'D', '11', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3911.86', '13.88', 12, 'D', '11', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4062.76', '13.88', 12, 'D', '11', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4213.66', '13.88', 12, 'D', '11', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4364.57', '13.88', 12, 'D', '11', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4515.47', '13.88', 12, 'D', '11', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4666.37', '13.88', 12, 'D', '11', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4817.27', '13.88', 12, 'D', '11', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4968.18', '13.88', 12, 'D', '11', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5119.08', '13.88', 12, 'D', '11', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '3992.90', '13.88', 12, 'D', '12', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4155.35', '13.88', 12, 'D', '12', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4317.81', '13.88', 12, 'D', '12', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4480.26', '13.88', 12, 'D', '12', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4642.71', '13.88', 12, 'D', '12', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4805.17', '13.88', 12, 'D', '12', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4967.62', '13.88', 12, 'D', '12', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5130.07', '13.88', 12, 'D', '12', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5292.53', '13.88', 12, 'D', '12', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5454.98', '13.88', 12, 'D', '12', '10', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5617.43', '13.88', 12, 'D', '12', '11', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '4781.03', '15.00', 12, 'D', '13', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5015.89', '15.00', 12, 'D', '13', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5250.75', '15.00', 12, 'D', '13', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5485.61', '15.00', 12, 'D', '13', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5720.48', '15.00', 12, 'D', '13', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5955.34', '15.00', 12, 'D', '13', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6190.20', '15.00', 12, 'D', '13', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6425.06', '15.00', 12, 'D', '13', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6659.93', '15.00', 12, 'D', '13', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5288.04', '15.00', 12, 'D', '14', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5570.28', '15.00', 12, 'D', '14', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5852.51', '15.00', 12, 'D', '14', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6134.75', '15.00', 12, 'D', '14', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6416.99', '15.00', 12, 'D', '14', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6699.23', '15.00', 12, 'D', '14', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6981.46', '15.00', 12, 'D', '14', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '7263.70', '15.00', 12, 'D', '14', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '7545.94', '15.00', 12, 'D', '14', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '5895.93', '15.00', 12, 'D', '15', '01', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6216.24', '15.00', 12, 'D', '15', '02', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6536.55', '15.00', 12, 'D', '15', '03', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '6856.86', '15.00', 12, 'D', '15', '04', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '7177.17', '15.00', 12, 'D', '15', '05', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '7497.49', '15.00', 12, 'D', '15', '06', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '7817.80', '15.00', 12, 'D', '15', '07', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '8138.11', '15.00', 12, 'D', '15', '08', 'R', '262');
INSERT INTO `pallowances` VALUES ('Pension Contribution', '8458.43', '15.00', 12, 'D', '15', '09', 'R', '262');
INSERT INTO `pallowances` VALUES ('NHF', '503.76', '2.50', 12, 'D', '08', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '518.84', '2.50', 12, 'D', '08', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '533.92', '2.50', 12, 'D', '08', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '549.00', '2.50', 12, 'D', '08', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '564.08', '2.50', 12, 'D', '08', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '579.16', '2.50', 12, 'D', '08', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '594.24', '2.50', 12, 'D', '08', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '609.32', '2.50', 12, 'D', '08', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '624.40', '2.50', 12, 'D', '08', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '639.48', '2.50', 12, 'D', '08', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '504.31', '2.50', 12, 'D', '09', '01', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '520.89', '2.50', 12, 'D', '09', '02', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '537.47', '2.50', 12, 'D', '09', '03', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '554.05', '2.50', 12, 'D', '09', '04', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '570.63', '2.50', 12, 'D', '09', '05', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '587.20', '2.50', 12, 'D', '09', '06', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '603.78', '2.50', 12, 'D', '09', '07', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '620.36', '2.50', 12, 'D', '09', '08', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '636.94', '2.50', 12, 'D', '09', '09', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '653.52', '2.50', 12, 'D', '09', '10', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '670.10', '2.50', 12, 'D', '09', '11', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '686.68', '2.50', 12, 'D', '09', '12', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '703.26', '2.50', 12, 'D', '09', '13', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '719.84', '2.50', 12, 'D', '09', '14', 'R', '261');
INSERT INTO `pallowances` VALUES ('NHF', '736.42', '2.50', 12, 'D', '09', '15', 'R', '261');
INSERT INTO `pallowances` VALUES ('Transport', '7968.38', '25.00', 1, 'A', '13', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8359.81', '25.00', 1, 'A', '13', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8751.25', '25.00', 1, 'A', '13', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9142.69', '25.00', 1, 'A', '13', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9534.13', '25.00', 1, 'A', '13', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9925.56', '25.00', 1, 'A', '13', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10317.00', '25.00', 1, 'A', '13', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10708.44', '25.00', 1, 'A', '13', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '11099.88', '25.00', 1, 'A', '13', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '8813.40', '25.00', 1, 'A', '14', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9283.79', '25.00', 1, 'A', '14', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9754.19', '25.00', 1, 'A', '14', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10224.58', '25.00', 1, 'A', '14', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10694.98', '25.00', 1, 'A', '14', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '11165.38', '25.00', 1, 'A', '14', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '11635.77', '25.00', 1, 'A', '14', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '12106.17', '25.00', 1, 'A', '14', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '12576.56', '25.00', 1, 'A', '14', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '9826.54', '25.00', 1, 'A', '15', '01', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10360.40', '25.00', 1, 'A', '15', '02', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '10894.25', '25.00', 1, 'A', '15', '03', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '11428.11', '25.00', 1, 'A', '15', '04', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '11961.96', '25.00', 1, 'A', '15', '05', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '12495.81', '25.00', 1, 'A', '15', '06', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '13029.67', '25.00', 1, 'A', '15', '07', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '13563.52', '25.00', 1, 'A', '15', '08', 'E', '021');
INSERT INTO `pallowances` VALUES ('Transport', '14097.38', '25.00', 1, 'A', '15', '09', 'E', '021');
INSERT INTO `pallowances` VALUES ('Journal', '279.20', '5.00', 4, 'A', '01', '01', 'E', '321');

-- --------------------------------------------------------

-- 
-- Table structure for table `pay type`
-- 

CREATE TABLE `pay type` (
  `Pay Code` varchar(20) default NULL,
  `Pay Type` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pay type`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `pay`
-- 

CREATE TABLE `pay` (
  `Staff Number` varchar(50) default NULL,
  `HAmount` decimal(10,2) default NULL,
  `LeaveG` decimal(10,2) default NULL,
  `Department` varchar(50) default NULL,
  `Staff Name` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Rank` varchar(50) default NULL,
  `Bank` varchar(50) default NULL,
  `Acct No` varchar(50) default NULL,
  `Month` varchar(50) default NULL,
  `Basic` decimal(10,2) default NULL,
  `Description` varchar(50) default NULL,
  `In Govt Qtrs` tinyint(1) default NULL,
  `Grade Level` varchar(10) default NULL,
  `Step` varchar(3) default NULL,
  `GPAmount` decimal(10,2) default NULL,
  `TDeduction` decimal(10,2) default NULL,
  `NetPay` decimal(10,2) default NULL,
  `Position` varchar(50) default NULL,
  `Arrears` decimal(10,2) default NULL,
  `Branch` varchar(50) default NULL,
  `TotPay` decimal(10,2) default NULL,
  `OthAllow_Tot` decimal(10,2) default NULL,
  `OthDed_Tot` decimal(10,2) default NULL,
  `Tax` decimal(10,2) default NULL,
  `RankSortOrder` varchar(50) default NULL,
  `PosSortOrder` varchar(50) default NULL,
  `LocSortOrder` varchar(50) default NULL,
  `BankID` varchar(50) default NULL,
  `Office` varchar(50) default NULL,
  `Union` varchar(50) default NULL,
  `Co-operative` varchar(50) default NULL,
  `Class` varchar(50) default NULL,
  `Pension Managers` varchar(50) default NULL,
  `Certified` tinyint(1) default '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pay`
-- 

INSERT INTO `pay` VALUES ('0001', '0.00', '0.00', 'NULL', 'Amb. Al-Gazali, Ahmed, OON, mni', 'Abuja', 'Hon. Chairman', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CH', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0002', '0.00', '0.00', 'NULL', 'Dr. Adamu, Yabani', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0003', '0.00', '0.00', 'NULL', 'Dr. Egberike, Joseph', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0004', '0.00', '0.00', 'NULL', 'Adebolu, Kayode', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0005', '0.00', '0.00', 'NULL', 'Alh. Kasimu, Idris', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0006', '0.00', '0.00', 'NULL', 'Amb. Bindawa, Ibrahim', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0007', '0.00', '0.00', 'NULL', 'Amb. Kazaure, Zubair', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0008', '0.00', '0.00', 'NULL', 'Barr. Agbo, Godwin', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0009', '0.00', '0.00', 'NULL', 'Engr. Egberongbe, mni., Saliwu', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0010', '0.00', '0.00', 'NULL', 'Alh. Wali, Aliyu', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0011', '0.00', '0.00', 'NULL', 'Alh. Olowu, Yusuf', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0012', '0.00', '0.00', 'NULL', 'Alh. Yabo, Yusuf', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0013', '0.00', '0.00', 'NULL', 'Chief (Mrs.) Umez-Eronini, mni., Ijeoma', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0014', '0.00', '0.00', 'NULL', 'Akpama (Dr), M', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0015', '0.00', '0.00', 'NULL', 'Buba (Mrs.), Lami', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('0016', '0.00', '0.00', 'NULL', 'Akande, Joseph', 'Abuja', 'Hon. Commissioner', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/CM', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1766', '0.00', '0.00', 'NULL', 'Dr. Thorpe (Mrs.), Yewande', 'Abuja', 'Permanent Secretary', 'NULL', 'NULL', 'February, 2009', NULL, NULL, 0, 'CN/PS', NULL, NULL, '0.00', NULL, 'NULL', '0.00', 'NULL', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1003', '9329.95', '0.00', 'NULL', 'Emele, Emeka', 'Abuja', 'E.O. (Accts.)', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1013', '9937.75', '0.00', 'NULL', 'Chila, Jimmy', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '16562.92', NULL, 0, '07/05', NULL, '42107.30', '1500.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '15606.63', '0.00', '1500.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1020', '10849.45', '0.00', 'NULL', 'Adebimpe (Mrs.), Bilikisu', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '18082.42', NULL, 0, '07/08', NULL, '45906.05', '1743.19', NULL, 'NULL', '0.00', 'NULL', '0.00', '16974.18', '0.00', '1743.19', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1021', '11761.15', '0.00', 'NULL', 'Haruna, Suleiman', 'Abuja', 'Chief Driver Mechanic', 'NULL', 'NULL', 'February, 2009', '19601.92', NULL, 0, '07/11', NULL, '49704.80', '1986.31', NULL, 'NULL', '0.00', 'NULL', '0.00', '18341.73', '0.00', '1986.31', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1027', '10241.65', '0.00', 'NULL', 'Ugochukwu, Simon', 'Abuja', 'Snr.Sec.Asst.II', 'NULL', 'NULL', 'February, 2009', '17069.42', NULL, 0, '07/06', NULL, '43373.55', '1581.11', NULL, 'NULL', '0.00', 'NULL', '0.00', '16062.48', '0.00', '1581.11', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1033', '9937.75', '0.00', 'NULL', 'Ahuazo, Maduabuchi', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '16562.92', NULL, 0, '07/05', NULL, '42107.30', '1500.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '15606.63', '0.00', '1500.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1049', '13695.00', '0.00', 'NULL', 'Alademehin, Olasoji', 'Abuja', 'SEO (GD)', 'NULL', 'NULL', 'February, 2009', '22825.00', NULL, 0, '09/05', NULL, '57762.50', '2669.16', NULL, 'NULL', '0.00', 'NULL', '0.00', '21242.50', '0.00', '2669.16', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1058', '14092.90', '0.00', 'NULL', 'Abu (Mrs.), Nimota', 'Abuja', 'Senior Conf. Sec.', 'NULL', 'NULL', 'February, 2009', '23488.17', NULL, 0, '09/06', NULL, '59420.43', '2801.79', NULL, 'NULL', '0.00', 'NULL', '0.00', '21839.36', '0.00', '2801.79', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1067', '10545.55', '0.00', 'NULL', 'Egorp, Julius', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '17575.92', NULL, 0, '07/07', NULL, '44639.80', '1662.15', NULL, 'NULL', '0.00', 'NULL', '0.00', '16518.33', '0.00', '1662.15', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1072', '10241.65', '0.00', 'NULL', 'Sanusi, Kazeem', 'Abuja', 'EO (GD)', 'NULL', 'NULL', 'February, 2009', '17069.42', NULL, 0, '07/06', NULL, '43373.55', '1581.11', NULL, 'NULL', '0.00', 'NULL', '0.00', '16062.48', '0.00', '1581.11', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1073', '10849.45', '0.00', 'NULL', 'Akpan (Miss), Ekaette', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '18082.42', NULL, 0, '07/08', NULL, '45906.05', '1743.19', NULL, 'NULL', '0.00', 'NULL', '0.00', '16974.18', '0.00', '1743.19', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1078', '10241.65', '0.00', 'NULL', 'Rodrigues (Mrs.), Isimot', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '17069.42', NULL, 0, '07/06', NULL, '43373.55', '1581.11', NULL, 'NULL', '0.00', 'NULL', '0.00', '16062.48', '0.00', '1581.11', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1080', '12899.20', '0.00', 'NULL', 'Agba (Mrs.), Esther', 'Abuja', 'SEO (G.D.)', 'NULL', 'NULL', 'February, 2009', '21498.67', NULL, 0, '09/03', NULL, '54446.68', '2403.90', NULL, 'NULL', '0.00', 'NULL', '0.00', '20048.81', '0.00', '2403.90', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1081', '9937.75', '0.00', 'NULL', 'Amusa, Surajudeen', 'Lagos', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '16562.92', NULL, 0, '07/05', NULL, '42107.30', '1500.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '15606.63', '0.00', '1500.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1088', '11004.65', '0.00', 'NULL', 'Badewa, Caroline', 'Abuja', 'Snr.Sec.Asst.I', 'NULL', 'NULL', 'February, 2009', '18341.08', NULL, 0, '08/03', NULL, '46552.70', '1784.57', NULL, 'NULL', '0.00', 'NULL', '0.00', '17206.97', '0.00', '1784.57', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1090', '9329.95', '0.00', 'NULL', 'Fadipe (Mrs.), Kehinde', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1096', '10545.55', '0.00', 'NULL', 'Ogunneye (Mrs.), Asimot', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '17575.92', NULL, 0, '07/07', NULL, '44639.80', '1662.15', NULL, 'NULL', '0.00', 'NULL', '0.00', '16518.33', '0.00', '1662.15', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1101', '10849.45', '0.00', 'NULL', 'Adelowo, Mary', 'Abuja', 'EO (GD)', 'NULL', 'NULL', 'February, 2009', '18082.42', NULL, 0, '07/08', NULL, '45906.05', '1743.19', NULL, 'NULL', '0.00', 'NULL', '0.00', '16974.18', '0.00', '1743.19', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1102', '9329.95', '0.00', 'NULL', 'Akande, Ebun', 'Lagos', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1106', '10545.55', '0.00', 'NULL', 'Sodeinde, Fatai', 'Abuja', 'EO(GD)', 'NULL', 'NULL', 'February, 2009', '17575.92', NULL, 0, '07/07', NULL, '44639.80', '1662.15', NULL, 'NULL', '0.00', 'NULL', '0.00', '16518.33', '0.00', '1662.15', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1107', '10241.65', '0.00', 'NULL', 'Dedewanu (Mrs.), Caroline', 'Abuja', 'EO (GD)', 'NULL', 'NULL', 'February, 2009', '17069.42', NULL, 0, '07/06', NULL, '43373.55', '1581.11', NULL, 'NULL', '0.00', 'NULL', '0.00', '16062.48', '0.00', '1581.11', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1109', '10241.65', '0.00', 'NULL', 'Oyeyemi (Mrs.), Aderonke', 'Abuja', 'EO(GD)', 'NULL', 'NULL', 'February, 2009', '17069.42', NULL, 0, '07/06', NULL, '43373.55', '1581.11', NULL, 'NULL', '0.00', 'NULL', '0.00', '16062.48', '0.00', '1581.11', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1110', '9329.95', '0.00', 'NULL', 'Alli, Daniel', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1118', '9329.95', '0.00', 'NULL', 'Fagboyo (Mrs.), Idowu', 'Abuja', 'EO (GD)', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1119', '10849.45', '0.00', 'NULL', 'Iyaomiye (Mrs.), Kehinde', 'Abuja', 'EO(GD)', 'NULL', 'NULL', 'February, 2009', '18082.42', NULL, 0, '07/08', NULL, '45906.05', '1743.19', NULL, 'NULL', '0.00', 'NULL', '0.00', '16974.18', '0.00', '1743.19', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1148', '29776.69', '0.00', 'NULL', 'Ibrahim, Tanimu', 'Abuja', 'ACAO', 'NULL', 'NULL', 'February, 2009', '39702.25', NULL, 0, '13/06', NULL, '110979.91', '7037.18', NULL, 'NULL', '0.00', 'NULL', '0.00', '41500.97', '992.56', '6044.62', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1160', '9329.95', '0.00', 'NULL', 'Obatolu, Olekekan', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1166', '9633.85', '0.00', 'NULL', 'Sunmola, Waheed', 'Abuja', 'EO(GD)', 'NULL', 'NULL', 'February, 2009', '16056.42', NULL, 0, '07/04', NULL, '40841.05', '1419.03', NULL, 'NULL', '0.00', 'NULL', '0.00', '15150.78', '0.00', '1419.03', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1167', '9937.75', '0.00', 'NULL', 'Abubakar, Abiola', 'Abuja', 'EO (Acct.)', 'NULL', 'NULL', 'February, 2009', '16562.92', NULL, 0, '07/05', NULL, '42107.30', '1500.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '15606.63', '0.00', '1500.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1168', '9633.85', '0.00', 'NULL', 'Oshiyemi, Olugbenga', 'Abuja', 'EO (GD)', 'NULL', 'NULL', 'February, 2009', '16056.42', NULL, 0, '07/04', NULL, '40841.05', '1419.03', NULL, 'NULL', '0.00', 'NULL', '0.00', '15150.78', '0.00', '1419.03', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1172', '9329.95', '0.00', 'NULL', 'Adefarati, Solomon', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1175', '9329.95', '0.00', 'NULL', 'Rotimi (Mrs), Ife', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1179', '11153.35', '0.00', 'NULL', 'Agiobu, Sobomabo', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '18588.92', NULL, 0, '07/09', NULL, '47172.30', '1842.23', NULL, 'NULL', '0.00', 'NULL', '0.00', '17430.03', '0.00', '1842.23', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1182', '12899.20', '0.00', 'NULL', 'Ezendiokwele, Chiemeka', 'Abuja', 'SEO(Accts.)', 'NULL', 'NULL', 'February, 2009', '21498.67', NULL, 0, '09/03', NULL, '54446.68', '2403.90', NULL, 'NULL', '0.00', 'NULL', '0.00', '20048.81', '0.00', '2403.90', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1185', '8236.05', '0.00', 'NULL', 'Okoye (Mrs.), Amaka', 'Abuja', 'AEO (GD)', 'NULL', 'NULL', 'February, 2009', '13726.75', NULL, 0, '06/07', NULL, '35016.88', '1034.71', NULL, 'NULL', '0.00', 'NULL', '0.00', '13054.08', '0.00', '1034.71', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1186', '11004.65', '0.00', 'NULL', 'Ijeneme, Sylvia', 'Abuja', 'Snr.Sec.Asst.I', 'NULL', 'NULL', 'February, 2009', '18341.08', NULL, 0, '08/03', NULL, '46552.70', '1784.57', NULL, 'NULL', '0.00', 'NULL', '0.00', '17206.97', '0.00', '1784.57', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1187', '9329.95', '0.00', 'NULL', 'Osuji (Miss), Patricia', 'Abuja', 'EO (GD)', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1191', '11366.55', '0.00', 'NULL', 'Olowu (Mrs.), Funmilayo', 'Abuja', 'Snr.Sec.Asst.I', 'NULL', 'NULL', 'February, 2009', '18944.25', NULL, 0, '08/04', NULL, '48060.63', '1893.02', NULL, 'NULL', '0.00', 'NULL', '0.00', '17749.83', '0.00', '1893.02', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1193', '10849.45', '0.00', 'NULL', 'Nwaogu, Loice', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '18082.42', NULL, 0, '07/08', NULL, '45906.05', '1743.19', NULL, 'NULL', '0.00', 'NULL', '0.00', '16974.18', '0.00', '1743.19', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1195', '7725.35', '0.00', 'NULL', 'Adebayo (Mrs.), Rafiatu', 'Abuja', 'SCO', 'NULL', 'NULL', 'February, 2009', '12875.58', NULL, 0, '06/05', NULL, '32888.96', '932.57', NULL, 'NULL', '0.00', 'NULL', '0.00', '12288.03', '0.00', '932.57', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1197', '9937.75', '0.00', 'NULL', 'Amoje (Mrs.), Taiwo', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '16562.92', NULL, 0, '07/05', NULL, '42107.30', '1500.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '15606.63', '0.00', '1500.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1198', '9329.95', '0.00', 'NULL', 'Oke, Omoyemi', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1202', '19374.10', '0.00', 'NULL', 'Abubakar (Mrs.), Zainab', 'Abuja', 'Prin. Prog. Analyst', 'NULL', 'NULL', 'February, 2009', '32290.17', NULL, 0, '12/04', NULL, '81525.43', '5369.45', NULL, 'NULL', '0.00', 'NULL', '0.00', '29861.16', '807.25', '4562.20', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1209', '9937.75', '0.00', 'NULL', 'Yakubu, Ibrahim', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '16562.92', NULL, 0, '07/05', NULL, '42107.30', '1500.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '15606.63', '0.00', '1500.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('121', '15684.50', '0.00', 'NULL', 'Adeojo (Mrs.), Miliatu', 'Abuja', 'Chief Sec.Asst', 'NULL', 'NULL', 'February, 2009', '26140.83', NULL, 0, '09/10', NULL, '66052.07', '3332.31', NULL, 'NULL', '0.00', 'NULL', '0.00', '24226.74', '0.00', '3332.31', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1210', '10642.75', '0.00', 'NULL', 'Osuoha, Agnes', 'Abuja', 'Conf. Sec. I', 'NULL', 'NULL', 'February, 2009', '17737.92', NULL, 0, '08/02', NULL, '45044.80', '1688.07', NULL, 'NULL', '0.00', 'NULL', '0.00', '16664.13', '0.00', '1688.07', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1216', '15814.75', '0.00', 'NULL', 'Udousoro (Mrs.), Joseph', 'Abuja', 'PEOII (Accts)', 'NULL', 'NULL', 'February, 2009', '26357.92', NULL, 0, '10/04', NULL, '66694.80', '4034.70', NULL, 'NULL', '0.00', 'NULL', '0.00', '24522.13', '658.95', '3375.75', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1218', '4239.54', '0.00', 'NULL', 'Nwajagu,(Mrs), Jacinta', 'Abuja', 'Clerical Officer II', 'NULL', 'NULL', 'February, 2009', '8479.08', NULL, 0, '04/07', NULL, '17458.16', '616.97', NULL, 'NULL', '0.00', 'NULL', '0.00', '4739.54', '211.98', '404.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1228', '9329.95', '0.00', 'NULL', 'Ejembi, Moses', 'Abuja', 'Chief Clerical Offr', 'NULL', 'NULL', 'February, 2009', '15549.92', NULL, 0, '07/03', NULL, '39574.80', '1337.99', NULL, 'NULL', '0.00', 'NULL', '0.00', '14694.93', '0.00', '1337.99', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);
INSERT INTO `pay` VALUES ('1245', '15814.75', '0.00', 'NULL', 'Orobogha (Mrs.), Rawlyns', 'Abuja', 'Prin. Conf. Sec. II', 'NULL', 'NULL', 'February, 2009', '26357.92', NULL, 0, '10/04', NULL, '66694.80', '4034.70', NULL, 'NULL', '0.00', 'NULL', '0.00', '24522.13', '658.95', '3375.75', NULL, NULL, NULL, NULL, 'Federal Civil Service Commission', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `payhistory`
-- 

CREATE TABLE `payhistory` (
  `Staff Number` varchar(50) default NULL,
  `HAmount` decimal(10,2) default NULL,
  `LeaveG` decimal(10,2) default NULL,
  `Department` varchar(50) default NULL,
  `Staff Name` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Rank` varchar(50) default NULL,
  `Bank` varchar(50) default NULL,
  `Acct No` varchar(50) default NULL,
  `Month` varchar(50) default NULL,
  `Basic` decimal(10,2) default NULL,
  `Description` varchar(50) default NULL,
  `In Govt Qtrs` tinyint(1) default NULL,
  `Grade Level` varchar(10) default NULL,
  `Step` varchar(3) default NULL,
  `GPAmount` decimal(10,2) default NULL,
  `TDeduction` decimal(10,2) default NULL,
  `NetPay` decimal(10,2) default NULL,
  `Position` varchar(50) default NULL,
  `Arrears` decimal(10,2) default NULL,
  `Branch` varchar(50) default NULL,
  `TotPay` decimal(10,2) default NULL,
  `OthAllow_Tot` decimal(10,2) default NULL,
  `OthDed_Tot` decimal(10,2) default NULL,
  `Tax` decimal(10,2) default NULL,
  `RankSortOrder` varchar(50) default NULL,
  `PosSortOrder` varchar(50) default NULL,
  `LocSortOrder` varchar(50) default NULL,
  `BankID` varchar(50) default NULL,
  `Office` varchar(50) default NULL,
  `Union` varchar(50) default NULL,
  `Co-operative` varchar(50) default NULL,
  `Class` varchar(50) default NULL,
  `Pension Managers` varchar(50) default NULL,
  `Certified` tinyint(1) default '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `payhistory`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `payr`
-- 

CREATE TABLE `payr` (
  `Staff Number` varchar(20) default NULL,
  `Description` varchar(50) default NULL,
  `Amount` decimal(10,2) default NULL,
  `Type` varchar(3) default NULL,
  `SortOrder` varchar(10) default NULL,
  `AllowID` varchar(50) default NULL,
  `Typ` varchar(50) default NULL,
  `Class` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `payr`
-- 

INSERT INTO `payr` VALUES ('1003', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1003', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1003', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1013', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1020', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1020', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1020', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Basic', '19601.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Tax', '-1986.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1027', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1033', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1049', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Basic', '22825.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Tax', '-2669.16', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1058', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1058', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1058', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1072', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1073', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1073', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1073', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1080', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Basic', '21498.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Tax', '-2403.90', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1081', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1088', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1090', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1096', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1101', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1101', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1101', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1106', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1107', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1109', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1110', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1118', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1119', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1119', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1119', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Basic', '39702.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Tax', '-6044.62', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1148', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1166', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1167', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1168', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1172', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1175', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1179', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Basic', '18588.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Tax', '-1842.23', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1182', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Basic', '21498.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Tax', '-2403.90', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1185', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1186', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1187', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1191', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1193', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1193', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1193', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1197', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1198', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1202', 'Tax', '-4562.20', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1202', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'Basic', '32290.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('121', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1210', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1216', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1218', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1218', 'Basic', '8479.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1218', 'Tax', '-404.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1228', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1228', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1228', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1245', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1248', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1248', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1248', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1249', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1249', 'Basic', '10748.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1249', 'Tax', '-677.26', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1250', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1251', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1252', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1254', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1255', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Basic', '11598.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Tax', '-779.36', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1256', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1257', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1258', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1259', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1259', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1259', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1260', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1261', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1262', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1263', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1265', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1268', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1269', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1270', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1271', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1272', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1273', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1276', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1276', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1276', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1277', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1277', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1277', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1278', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1279', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1279', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1279', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('128', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1285', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1286', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1287', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Basic', '11598.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Tax', '-779.36', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1288', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1289', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Basic', '11598.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Tax', '-779.36', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1291', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1292', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1292', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1292', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1296', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1296', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1296', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1297', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1299', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('130', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1300', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1300', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1300', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1308', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1309', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1311', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'Basic', '8479.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'Tax', '-404.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1313', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1313', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1313', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1314', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1314', 'Basic', '10057.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1314', 'Tax', '-594.40', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1315', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'Basic', '8762.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'Tax', '-438.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1316', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1316', 'Basic', '10057.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1316', 'Tax', '-594.40', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1325', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('133', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1333', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1339', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1339', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1339', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1350', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1351', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'Basic', '9329.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'Tax', '-506.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1355', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'Basic', '28415.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'Tax', '-3787.21', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1384', 'Tax', '-5731.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1384', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'Basic', '38136.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1398', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1399', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1402', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'Basic', '28415.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'Tax', '-3787.21', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('141', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('141', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('141', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1411', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1413', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'Basic', '35005.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'Tax', '-5105.17', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1413', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1437', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1437', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1437', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1441', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1451', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1466', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1467', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1468', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1469', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1469', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1469', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1471', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1471', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1471', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1472', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1472', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1472', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1475', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1475', 'Basic', '10057.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1475', 'Tax', '-594.40', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1482', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1482', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1482', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1487', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1487', 'Basic', '7912.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1487', 'Tax', '-349.66', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1488', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1488', 'Basic', '29948.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1488', 'Tax', '-4093.87', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1494', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1494', 'Basic', '9367.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1494', 'Tax', '-511.54', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1501', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1501', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1501', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1502', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1502', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1502', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1502', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1502', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1503', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1503', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1503', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1503', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1503', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1506', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1506', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1506', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1506', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1506', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('151', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('151', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('151', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1515', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1515', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1515', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1515', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1515', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1518', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1518', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1518', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1521', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1521', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1521', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1524', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1524', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1524', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1527', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1527', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1527', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1529', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1529', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1529', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1531', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1531', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1531', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1532', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1532', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1532', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1539', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1539', 'Basic', '22825.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1539', 'Tax', '-2669.16', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1546', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1546', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1546', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1547', 'Tax', '-4562.20', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1547', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1547', 'Basic', '32290.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1550', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1550', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1550', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1552', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1552', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1552', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1553', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1553', 'Basic', '22825.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1553', 'Tax', '-2669.16', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1563', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1563', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1563', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1563', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1563', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1569', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1569', 'Basic', '20835.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1569', 'Tax', '-2271.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1573', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1573', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1573', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1573', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1573', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1576', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1576', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1576', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1577', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1577', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1577', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1580', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1580', 'Basic', '22825.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1580', 'Tax', '-2669.16', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1582', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1582', 'Basic', '24151.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1582', 'Tax', '-2934.42', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1586', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1586', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1586', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1589', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1589', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1589', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1590', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1590', 'Basic', '20753.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1590', 'Tax', '-2218.37', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1591', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1591', 'Basic', '22825.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1591', 'Tax', '-2669.16', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('160', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('160', 'Basic', '20150.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('160', 'Tax', '-2109.92', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1608', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1608', 'Basic', '28415.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1608', 'Tax', '-3787.21', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1611', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1611', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1611', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1614', 'Tax', '-6670.92', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1614', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1614', 'Basic', '42833.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1614', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1614', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1615', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1615', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1615', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1620', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1620', 'Basic', '15043.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1620', 'Tax', '-1256.95', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1621', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1621', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1621', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1626', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1626', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1626', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1627', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1627', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1627', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1628', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1628', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1628', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1629', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1629', 'Basic', '11173.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1629', 'Tax', '-728.29', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1632', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1632', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1632', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1633', 'Tax', '-5731.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1633', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1633', 'Basic', '38136.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1633', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1633', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1634', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1634', 'Basic', '47847.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1634', 'Tax', '-7673.73', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1634', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1634', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1649', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1649', 'Basic', '36973.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1649', 'Tax', '-5498.88', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1650', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1650', 'Basic', '46543.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1650', 'Tax', '-7412.76', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1650', 'Responsibility', '200.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1650', 'DSA', '29339.00', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1651', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1651', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1651', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1651', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1651', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1659', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1659', 'Basic', '41268.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1659', 'Tax', '-6357.77', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1659', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1659', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1662', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1662', 'Basic', '25477.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1662', 'Tax', '-3199.68', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1667', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1667', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1667', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1667', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1667', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1669', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1669', 'Basic', '50306.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1669', 'Tax', '-8165.38', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1669', 'Responsibility', '200.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1669', 'DSA', '29339.00', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1670', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1670', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1670', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1670', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1670', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1671', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1671', 'Basic', '19547.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1671', 'Tax', '-2001.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1672', 'Tax', '-5418.32', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1672', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1672', 'Basic', '36570.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1672', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1672', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1673', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1673', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1673', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1673', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1673', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1675', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1675', 'Basic', '29948.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1675', 'Tax', '-4093.87', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1676', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1676', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1676', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1679', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1679', 'Basic', '34631.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1679', 'Tax', '-5030.54', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1680', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1680', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1680', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1683', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1683', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1683', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1683', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1683', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1684', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1684', 'Basic', '46543.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1684', 'Tax', '-7412.76', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1684', 'Responsibility', '200.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1684', 'DSA', '29339.00', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1685', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1685', 'Basic', '22825.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1685', 'Tax', '-2669.16', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1686', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1686', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1686', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1687', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1687', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1687', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1688', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1688', 'Basic', '44661.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1688', 'Tax', '-7036.45', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1688', 'Responsibility', '200.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1688', 'DSA', '29339.00', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1690', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1690', 'Basic', '29948.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1690', 'Tax', '-4093.87', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1692', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1692', 'Basic', '34631.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1692', 'Tax', '-5030.54', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1693', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1693', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1693', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1694', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1694', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1694', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1696', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1696', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1696', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1697', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1697', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1697', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1698', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1698', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1698', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1699', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1699', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1699', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1700', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1700', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1700', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1701', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1701', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1701', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1702', 'Tax', '-5731.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1702', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1702', 'Basic', '38136.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1702', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1702', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1703', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1703', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1703', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1704', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1704', 'Basic', '39702.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1704', 'Tax', '-6044.62', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1704', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1704', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1705', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1705', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1705', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1706', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1706', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1706', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1707', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1707', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1707', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1708', 'Tax', '-4562.20', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1708', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1708', 'Basic', '32290.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1709', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1709', 'Basic', '28415.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1709', 'Tax', '-3787.21', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1716', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1716', 'Basic', '50306.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1716', 'Tax', '-8165.38', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1716', 'Responsibility', '200.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1716', 'DSA', '29339.00', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1717', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1717', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1717', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1718', 'Tax', '-5731.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1718', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1718', 'Basic', '38136.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1718', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1718', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1719', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1719', 'Basic', '27386.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1719', 'Tax', '-3581.48', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1720', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1720', 'Basic', '21498.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1720', 'Tax', '-2403.90', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1721', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1721', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1721', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1722', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1722', 'Basic', '25477.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1722', 'Tax', '-3199.68', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1723', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1723', 'Basic', '26357.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1723', 'Tax', '-3375.75', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1726', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1726', 'Basic', '33461.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1726', 'Tax', '-4796.37', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1727', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1727', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1727', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1728', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1728', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1728', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1729', 'Tax', '-5731.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1729', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1729', 'Basic', '38136.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1729', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1729', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1730', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1730', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1730', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1733', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1733', 'Basic', '24300.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1733', 'Tax', '-2964.28', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1734', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1734', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1734', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1736', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1736', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1736', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1738', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1738', 'Basic', '25329.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1738', 'Tax', '-3170.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1739', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1739', 'Basic', '28130.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1739', 'Tax', '-3730.20', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1740', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1740', 'Basic', '33461.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1740', 'Tax', '-4796.37', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1741', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1741', 'Basic', '41268.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1741', 'Tax', '-6357.77', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1741', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1741', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1744', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1744', 'Basic', '35005.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1744', 'Tax', '-5105.17', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1744', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1744', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1746', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1746', 'Basic', '19547.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1746', 'Tax', '-2001.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1747', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1747', 'Basic', '20835.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1747', 'Tax', '-2271.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1748', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1748', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1748', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1749', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1749', 'Basic', '19547.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1749', 'Tax', '-2001.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1750', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1750', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1750', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1751', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1751', 'Basic', '19547.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1751', 'Tax', '-2001.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1755', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1755', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1755', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1757', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1757', 'Basic', '39702.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1757', 'Tax', '-6044.62', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1757', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1757', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('176', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('176', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('176', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1761', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1761', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1761', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1764', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1764', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1764', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1765', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1765', 'Basic', '40486.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1765', 'Tax', '-6201.39', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1001', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1001', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1001', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1770', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1770', 'Basic', '20753.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1770', 'Tax', '-2218.37', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('178', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('178', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('178', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('180', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('180', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('180', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2003', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2003', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2003', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2004', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2004', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2004', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2007', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2007', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2007', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2008', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2008', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2008', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2018', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2018', 'Basic', '20835.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2018', 'Tax', '-2271.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2019', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2019', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2019', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2022', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2022', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2022', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2023', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2023', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2023', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2024', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2024', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2024', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2026', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2026', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2026', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2030', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2030', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2030', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2031', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2031', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2031', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2032', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2032', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2032', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2040', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2040', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2040', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2043', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2043', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2043', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2046', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2046', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2046', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2048', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2048', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2048', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2049', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2049', 'Basic', '18588.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2049', 'Tax', '-1842.23', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2050', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2050', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2050', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2053', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2053', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2053', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2056', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2056', 'Basic', '14152.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2056', 'Tax', '-1085.78', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2057', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2057', 'Basic', '14152.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2057', 'Tax', '-1085.78', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2060', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2060', 'Basic', '14577.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2060', 'Tax', '-1136.85', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2062', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2062', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2062', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2063', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2063', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2063', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2066', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2066', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2066', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2068', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2068', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2068', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2079', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2079', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2079', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2100', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2100', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2100', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('211', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('211', 'Basic', '25477.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('211', 'Tax', '-3199.68', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2113', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2113', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2113', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('212', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('212', 'Basic', '25477.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('212', 'Tax', '-3199.68', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2133', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2133', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2133', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2139', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2139', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2139', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2140', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2140', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2140', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2150', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2150', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2150', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2164', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2164', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2164', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2168', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2168', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2168', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2169', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2169', 'Basic', '29948.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2169', 'Tax', '-4093.87', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2196', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2196', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2196', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2217', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2217', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2217', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2220', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2220', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2220', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2221', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2221', 'Basic', '39702.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2221', 'Tax', '-6044.62', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2221', 'Responsibility', '125.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2221', 'DSA', '14669.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2226', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2226', 'Basic', '20835.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2226', 'Tax', '-2271.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2235', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2235', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2235', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2243', 'Meal Subsidy', '800.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2243', 'Basic', '31119.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2243', 'Tax', '-4328.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('226', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('226', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('226', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2268', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2268', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2268', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2269', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2269', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2269', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('227', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('227', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('227', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2287', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2287', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2287', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2290', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2290', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2290', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2293', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2293', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2293', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2307', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2307', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2307', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2309', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2309', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2309', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('231', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('231', 'Basic', '25477.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('231', 'Tax', '-3199.68', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2310', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2310', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2310', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2311', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2311', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2311', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2314', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2314', 'Basic', '25579.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2314', 'Tax', '-3085.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2315', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2315', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2315', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2317', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2317', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2317', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2322', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2322', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2322', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2323', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2323', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2323', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2324', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2324', 'Basic', '14152.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2324', 'Tax', '-1085.78', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2327', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2327', 'Basic', '14152.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2327', 'Tax', '-1085.78', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2332', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2332', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2332', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2333', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2333', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2333', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2339', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2339', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2339', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2341', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2341', 'Basic', '12875.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2341', 'Tax', '-932.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2343', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2343', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2343', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2354', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2354', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2354', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2358', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2358', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2358', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2359', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2359', 'Basic', '12450.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2359', 'Tax', '-881.50', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2360', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2360', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2360', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2365', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2365', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2365', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2367', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2367', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2367', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2368', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2368', 'Basic', '16056.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2368', 'Tax', '-1419.03', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2371', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2371', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2371', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2378', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2378', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2378', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2381', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2381', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2381', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2382', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2382', 'Basic', '20835.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2382', 'Tax', '-2271.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2394', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2394', 'Basic', '10748.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2394', 'Tax', '-677.26', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2405', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2405', 'Basic', '15003.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2405', 'Tax', '-1187.92', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2407', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2407', 'Basic', '13301.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2407', 'Tax', '-983.64', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2408', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2408', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2408', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2414', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2414', 'Basic', '9712.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2414', 'Tax', '-552.97', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2415', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2415', 'Basic', '12024.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2415', 'Tax', '-830.43', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2420', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2420', 'Basic', '13726.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2420', 'Tax', '-1034.71', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('255', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('255', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('255', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('258', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('258', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('258', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('2597', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2597', 'Basic', '8479.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('2597', 'Tax', '-404.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('266', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('266', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('266', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('291', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('291', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('291', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('300', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('300', 'Basic', '16280.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('300', 'Tax', '-1341.13', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('306', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('306', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('306', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('323', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('323', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('323', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('339', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('339', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('339', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('347', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('347', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('347', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('357', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('357', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('357', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('364', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('364', 'Basic', '18588.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('364', 'Tax', '-1842.23', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('366', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('366', 'Basic', '19547.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('366', 'Tax', '-2001.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('369', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('369', 'Basic', '15854.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('369', 'Tax', '-1290.06', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('370', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('370', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('370', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('372', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('372', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('372', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('379', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('379', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('379', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('383', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('383', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('383', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('388', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('388', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('388', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('389', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('389', 'Basic', '15003.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('389', 'Tax', '-1187.92', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('392', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('392', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('392', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('420', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('420', 'Basic', '14577.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('420', 'Tax', '-1136.85', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('421', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('421', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('421', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('433', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('433', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('433', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('434', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('434', 'Basic', '20753.75', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('434', 'Tax', '-2218.37', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('452', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('452', 'Basic', '19547.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('452', 'Tax', '-2001.47', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('453', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('453', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('453', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('457', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('457', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('457', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('460', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('460', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('460', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('475', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('475', 'Basic', '21498.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('475', 'Tax', '-2403.90', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('484', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('484', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('484', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('492', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('492', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('492', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('499', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('499', 'Basic', '29456.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('499', 'Tax', '-3995.46', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('514', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('514', 'Basic', '24151.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('514', 'Tax', '-2934.42', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('52', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('52', 'Basic', '24151.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('52', 'Tax', '-2934.42', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('530', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('530', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('530', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('547', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('547', 'Basic', '25477.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('547', 'Tax', '-3199.68', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('549', 'Meal Subsidy', '500.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('549', 'Basic', '9612.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('549', 'Tax', '-540.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('550', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('550', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('550', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('561', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('561', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('561', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('580', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('580', 'Basic', '26140.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('580', 'Tax', '-3332.31', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('60', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('60', 'Basic', '18588.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('60', 'Tax', '-1842.23', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('603', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('603', 'Basic', '24151.33', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('603', 'Tax', '-2934.42', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('609', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('609', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('609', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('616', 'Tax', '-9382.05', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('616', 'Meal Subsidy', '900.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('616', 'Basic', '56389.50', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('616', 'Responsibility', '300.00', 'A', '3', '324', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('616', 'DSA', '44008.50', 'A', '1', '300', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('621', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('621', 'Basic', '18944.25', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('621', 'Tax', '-1893.02', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('722', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('722', 'Basic', '14577.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('722', 'Tax', '-1136.85', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('782', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('782', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('782', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('783', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('783', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('783', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('785', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('785', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('785', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('788', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('788', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('788', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('789', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('789', 'Basic', '19095.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('789', 'Tax', '-1905.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('790', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('790', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('790', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('802', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('802', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('802', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('807', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('807', 'Basic', '18588.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('807', 'Tax', '-1842.23', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('813', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('813', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('813', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('827', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('827', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('827', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('835', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('835', 'Basic', '17131.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('835', 'Tax', '-1442.27', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('837', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('837', 'Basic', '18588.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('837', 'Tax', '-1842.23', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('88', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('88', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('88', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('922', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('922', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('922', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('925', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('925', 'Basic', '22161.83', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('925', 'Tax', '-2536.53', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('927', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('927', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('927', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('934', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('934', 'Basic', '15549.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('934', 'Tax', '-1337.99', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('942', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('942', 'Basic', '17069.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('942', 'Tax', '-1581.11', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('945', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('945', 'Basic', '16562.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('945', 'Tax', '-1500.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('948', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('948', 'Basic', '17737.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('948', 'Tax', '-1688.07', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('953', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('953', 'Basic', '21498.67', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('953', 'Tax', '-2403.90', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('955', 'Tax', '-2801.79', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('955', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('955', 'Basic', '23488.17', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('956', 'Tax', '-1743.19', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('956', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('956', 'Basic', '18082.42', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('963', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('963', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('963', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('98', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('98', 'Basic', '26804.00', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('98', 'Tax', '-3464.94', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('987', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('987', 'Basic', '17575.92', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('987', 'Tax', '-1662.15', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('989', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('989', 'Basic', '18341.08', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('989', 'Tax', '-1784.57', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1071', 'Meal Subsidy', '700.00', 'A', '1', '022', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1071', 'Basic', '20150.58', 'B', '0', '100', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1071', 'Tax', '-2109.92', 'D', '12', '103', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1003', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1003', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1003', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1003', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1003', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1013', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1020', 'Housing', '10849.45', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1020', 'Transport', '4520.61', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1020', 'Utility', '2712.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1020', 'Medical', '1808.24', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1020', 'Furniture', '7232.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Housing', '11761.15', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Transport', '4900.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Utility', '2940.29', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Medical', '1960.19', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1021', 'Furniture', '7840.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Housing', '10241.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Transport', '4267.36', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Utility', '2560.41', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Medical', '1706.94', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1027', 'Furniture', '6827.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1033', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Housing', '13695.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Transport', '5706.25', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Utility', '3423.75', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Medical', '2282.50', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1049', 'Furniture', '9130.00', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1058', 'Housing', '14092.90', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1058', 'Transport', '5872.04', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1058', 'Utility', '3523.23', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1058', 'Medical', '2348.82', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1058', 'Furniture', '9395.27', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Housing', '10545.55', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Transport', '4393.98', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Utility', '2636.39', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Medical', '1757.59', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1067', 'Furniture', '7030.37', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Housing', '10241.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Transport', '4267.36', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Utility', '2560.41', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Medical', '1706.94', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1072', 'Furniture', '6827.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1073', 'Housing', '10849.45', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1073', 'Transport', '4520.61', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1073', 'Utility', '2712.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1073', 'Medical', '1808.24', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1073', 'Furniture', '7232.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Housing', '10241.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Transport', '4267.36', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Utility', '2560.41', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Medical', '1706.94', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1078', 'Furniture', '6827.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Housing', '12899.20', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Transport', '5374.67', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Utility', '3224.80', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Medical', '2149.87', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1080', 'Furniture', '8599.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1081', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Housing', '11004.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Transport', '4585.27', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Utility', '2751.16', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Medical', '1834.11', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1088', 'Furniture', '7336.43', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1090', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Housing', '10545.55', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Transport', '4393.98', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Utility', '2636.39', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Medical', '1757.59', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1096', 'Furniture', '7030.37', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1101', 'Housing', '10849.45', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1101', 'Transport', '4520.61', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1101', 'Utility', '2712.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1101', 'Medical', '1808.24', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1101', 'Furniture', '7232.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1102', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Housing', '10545.55', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Transport', '4393.98', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Utility', '2636.39', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Medical', '1757.59', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1106', 'Furniture', '7030.37', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Housing', '10241.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Transport', '4267.36', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Utility', '2560.41', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Medical', '1706.94', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1107', 'Furniture', '6827.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Housing', '10241.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Transport', '4267.36', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Utility', '2560.41', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Medical', '1706.94', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1109', 'Furniture', '6827.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1110', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1118', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1119', 'Housing', '10849.45', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1119', 'Transport', '4520.61', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1119', 'Utility', '2712.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1119', 'Medical', '1808.24', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1119', 'Furniture', '7232.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Housing', '29776.69', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Utility', '5955.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Medical', '3970.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'Furniture', '15880.90', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1148', 'NHF', '-992.56', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1160', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1160', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Housing', '9633.85', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Transport', '4014.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Utility', '2408.46', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Medical', '1605.64', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1166', 'Furniture', '6422.57', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1167', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Housing', '9633.85', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Transport', '4014.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Utility', '2408.46', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Medical', '1605.64', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1168', 'Furniture', '6422.57', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1172', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1175', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Housing', '11153.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Transport', '4647.23', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Utility', '2788.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Medical', '1858.89', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1179', 'Furniture', '7435.57', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Housing', '12899.20', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Transport', '5374.67', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Utility', '3224.80', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Medical', '2149.87', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1182', 'Furniture', '8599.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Housing', '8236.05', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Transport', '3431.69', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Utility', '2059.01', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Medical', '1372.68', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1185', 'Furniture', '5490.70', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Housing', '11004.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Transport', '4585.27', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Utility', '2751.16', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Medical', '1834.11', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1186', 'Furniture', '7336.43', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1187', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Housing', '11366.55', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Transport', '4736.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Utility', '2841.64', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Medical', '1894.43', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1191', 'Furniture', '7577.70', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1193', 'Housing', '10849.45', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1193', 'Transport', '4520.61', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1193', 'Utility', '2712.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1193', 'Medical', '1808.24', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1193', 'Furniture', '7232.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1195', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1197', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1198', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'Housing', '19374.10', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'Transport', '8072.54', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'Utility', '4843.53', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'Medical', '3229.02', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'Furniture', '12916.07', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1202', 'NHF', '-807.25', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1209', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1209', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Housing', '15684.50', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Transport', '6535.21', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Utility', '3921.12', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Medical', '2614.08', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('121', 'Furniture', '10456.33', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Housing', '10642.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Transport', '4434.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Utility', '2660.69', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Medical', '1773.79', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1210', 'Furniture', '7095.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Housing', '15814.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Transport', '6589.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Utility', '3953.69', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Medical', '2635.79', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'Furniture', '10543.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1216', 'NHF', '-658.95', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1218', 'Housing', '4239.54', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1218', 'Transport', '2119.77', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1218', 'Utility', '1271.86', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1218', 'Medical', '847.91', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1218', 'NHF', '-211.98', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1228', 'Housing', '9329.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1228', 'Transport', '3887.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1228', 'Utility', '2332.49', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1228', 'Medical', '1554.99', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1228', 'Furniture', '6219.97', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Housing', '15814.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Transport', '6589.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Utility', '3953.69', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Medical', '2635.79', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'Furniture', '10543.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1245', 'NHF', '-658.95', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1248', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1248', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1248', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1248', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1248', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1249', 'Housing', '5374.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1249', 'Transport', '2687.00', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1249', 'Utility', '1612.20', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1249', 'Medical', '1074.80', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Housing', '10642.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Transport', '4434.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Utility', '2660.69', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Medical', '1773.79', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1250', 'Furniture', '7095.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1251', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Housing', '10642.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Transport', '4434.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Utility', '2660.69', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Medical', '1773.79', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1252', 'Furniture', '7095.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Housing', '9633.85', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Transport', '4014.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Utility', '2408.46', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Medical', '1605.64', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1254', 'Furniture', '6422.57', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Housing', '6959.30', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Transport', '2899.71', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Utility', '1739.82', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Medical', '1159.88', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1255', 'Furniture', '4639.53', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Housing', '8236.05', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Transport', '3431.69', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Utility', '2059.01', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Medical', '1372.68', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1256', 'Furniture', '5490.70', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Housing', '7470.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Transport', '3112.50', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Utility', '1867.50', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Medical', '1245.00', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1257', 'Furniture', '4980.00', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Housing', '7214.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Transport', '3006.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Utility', '1803.66', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Medical', '1202.44', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1258', 'Furniture', '4809.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1259', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1259', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1259', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1259', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1260', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Housing', '7980.70', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Transport', '3325.29', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Utility', '1995.18', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Medical', '1330.12', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1261', 'Furniture', '5320.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1262', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Housing', '7470.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Transport', '3112.50', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Utility', '1867.50', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Medical', '1245.00', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1263', 'Furniture', '4980.00', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Housing', '7980.70', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Transport', '3325.29', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Utility', '1995.18', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Medical', '1330.12', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1265', 'Furniture', '5320.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Housing', '7980.70', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Transport', '3325.29', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Utility', '1995.18', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Medical', '1330.12', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1268', 'Furniture', '5320.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1269', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1270', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1271', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1272', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1273', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1276', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1276', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1276', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1276', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1277', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1277', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1277', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1277', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Housing', '9633.85', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Transport', '4014.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Utility', '2408.46', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Medical', '1605.64', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1278', 'Furniture', '6422.57', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1279', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1279', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1279', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1279', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Housing', '10642.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Transport', '4434.48', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Utility', '2660.69', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Medical', '1773.79', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('128', 'Furniture', '7095.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Housing', '7980.70', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Transport', '3325.29', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Utility', '1995.18', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Medical', '1330.12', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1285', 'Furniture', '5320.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Housing', '7725.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Transport', '3218.90', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Utility', '1931.34', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Medical', '1287.56', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1286', 'Furniture', '5150.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Housing', '6959.30', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Transport', '2899.71', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Utility', '1739.82', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Medical', '1159.88', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1287', 'Furniture', '4639.53', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1288', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Housing', '6959.30', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Transport', '2899.71', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Utility', '1739.82', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Medical', '1159.88', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1289', 'Furniture', '4639.53', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1291', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1292', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1292', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1292', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1292', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1296', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1296', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1296', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1296', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Housing', '9937.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Transport', '4140.73', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Utility', '2484.44', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Medical', '1656.29', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1297', 'Furniture', '6625.17', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1299', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Housing', '17674.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Transport', '7364.17', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Utility', '4418.50', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Medical', '2945.67', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('130', 'Furniture', '11782.67', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1300', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1300', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1300', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1300', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Housing', '8236.05', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Transport', '3431.69', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Utility', '2059.01', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Medical', '1372.68', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1308', 'Furniture', '5490.70', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Housing', '9633.85', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Transport', '4014.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Utility', '2408.46', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Medical', '1605.64', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1309', 'Furniture', '6422.57', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'Housing', '4239.54', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'Transport', '2119.77', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'Utility', '1271.86', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'Medical', '847.91', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1311', 'NHF', '-211.98', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1313', 'Housing', '8236.05', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1313', 'Transport', '3431.69', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1313', 'Utility', '2059.01', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1313', 'Medical', '1372.68', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1313', 'Furniture', '5490.70', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1314', 'Housing', '5028.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1314', 'Transport', '2514.38', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1314', 'Utility', '1508.63', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1314', 'Medical', '1005.75', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'Housing', '4381.21', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'Transport', '2190.61', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'Utility', '1314.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'Medical', '876.24', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1315', 'NHF', '-219.06', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1316', 'Housing', '5028.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1316', 'Transport', '2514.38', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1316', 'Utility', '1508.63', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1316', 'Medical', '1005.75', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Housing', '7980.70', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Transport', '3325.29', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Utility', '1995.18', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Medical', '1330.12', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1325', 'Furniture', '5320.47', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Housing', '10545.55', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Transport', '4393.98', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Utility', '2636.39', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Medical', '1757.59', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('133', 'Furniture', '7030.37', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Housing', '14580.35', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Transport', '6075.15', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Utility', '3645.09', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Medical', '2430.06', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'Furniture', '9720.23', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1333', 'NHF', '-607.51', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1339', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1339', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1339', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1339', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1339', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Housing', '11004.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Transport', '4585.27', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Utility', '2751.16', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Medical', '1834.11', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1350', 'Furniture', '7336.43', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'Housing', '4664.54', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'Transport', '2332.27', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'Utility', '1399.36', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'Medical', '932.91', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1351', 'NHF', '-233.23', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1355', 'Housing', '17049.15', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'Transport', '7103.81', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'Utility', '4262.29', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'Medical', '2841.53', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'Furniture', '11366.10', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1355', 'NHF', '-710.38', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1384', 'Housing', '28602.38', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'Utility', '5720.48', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'Medical', '3813.65', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'Furniture', '15254.60', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1384', 'NHF', '-953.41', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1391', 'Housing', '18671.60', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Transport', '7779.83', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Utility', '4667.90', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Medical', '3111.93', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'Furniture', '12447.73', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1391', 'NHF', '-777.98', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1398', 'Housing', '18671.60', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'Transport', '7779.83', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'Utility', '4667.90', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'Medical', '3111.93', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'Furniture', '12447.73', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1398', 'NHF', '-777.98', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1399', 'Housing', '18671.60', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'Transport', '7779.83', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'Utility', '4667.90', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'Medical', '3111.93', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'Furniture', '12447.73', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1399', 'NHF', '-777.98', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1402', 'Housing', '17049.15', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'Transport', '7103.81', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'Utility', '4262.29', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'Medical', '2841.53', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'Furniture', '11366.10', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1402', 'NHF', '-710.38', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('141', 'Housing', '17674.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('141', 'Transport', '7364.17', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('141', 'Utility', '4418.50', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('141', 'Medical', '2945.67', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('141', 'Furniture', '11782.67', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Housing', '18671.60', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Transport', '7779.83', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Utility', '4667.90', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Medical', '3111.93', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'Furniture', '12447.73', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1411', 'NHF', '-777.98', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1413', 'Housing', '26253.75', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'Utility', '5250.75', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'Medical', '3500.50', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'Furniture', '14002.00', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1413', 'NHF', '-875.13', 'D', '12', '261', 'R', 'Total Deduction');
INSERT INTO `payr` VALUES ('1433', 'Housing', '7470.00', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Transport', '3112.50', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Utility', '1867.50', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Medical', '1245.00', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1433', 'Furniture', '4980.00', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1437', 'Housing', '4856.13', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1437', 'Transport', '2428.06', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1437', 'Utility', '1456.84', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1437', 'Medical', '971.23', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1441', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1451', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1466', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Housing', '7214.65', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Transport', '3006.11', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Utility', '1803.66', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Medical', '1202.44', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1467', 'Furniture', '4809.77', 'A', '2', '325', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Housing', '6703.95', 'A', '2', '250', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Transport', '2793.31', 'A', '1', '021', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Utility', '1675.99', 'A', '1', '023', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Medical', '1117.33', 'A', '3', '260', 'E', 'Gross Pay');
INSERT INTO `payr` VALUES ('1468', 'Furniture', '4469.30', 'A', '2', '325', 'E', 'Gross Pay');

-- --------------------------------------------------------

-- 
-- Table structure for table `pension bank charges`
-- 

CREATE TABLE `pension bank charges` (
  `Charges Percent` decimal(10,2) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pension bank charges`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `pension managers`
-- 

CREATE TABLE `pension managers` (
  `Pension Managers` varchar(70) default NULL,
  `Address` varchar(150) default NULL,
  `Code` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pension managers`
-- 

INSERT INTO `pension managers` VALUES ('IBTC', 'Lagos', '001');
INSERT INTO `pension managers` VALUES ('Pensure', 'Abuja', '002');
INSERT INTO `pension managers` VALUES ('LEGACY', 'ABUJA', '003');
INSERT INTO `pension managers` VALUES ('PREMIUM', 'ABUJA', '004');
INSERT INTO `pension managers` VALUES ('SIGMA', 'ABUJA', '005');
INSERT INTO `pension managers` VALUES ('TRUSTFUND PENSIONS', 'ABUJA', '006');

-- --------------------------------------------------------

-- 
-- Table structure for table `pension`
-- 

CREATE TABLE `pension` (
  `Staff Number` varchar(50) NOT NULL,
  `Surname` varchar(50) default NULL,
  `Firstname` varchar(50) default NULL,
  `Othername` varchar(50) default NULL,
  `Sex` varchar(9) default NULL,
  `Initial Rank` varchar(50) default NULL,
  `Present Rank` varchar(50) default NULL,
  `Level` varchar(10) default NULL,
  `Step` varchar(2) default NULL,
  `DoB` date default NULL,
  `Height` varchar(20) default NULL,
  `Bank` varchar(50) default NULL,
  `Acct No` varchar(50) default NULL,
  `Blood Group` varchar(10) default NULL,
  `Genotype` varchar(10) default NULL,
  `Complexion` varchar(20) default NULL,
  `In Govt Qtrs` tinyint(1) default NULL,
  `Bank Location` varchar(50) default NULL,
  `Bank Branch` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `Previous Conviction` tinyint(1) default NULL,
  `First Appt` date default NULL,
  `Present Appt` date default NULL,
  `State` varchar(50) default NULL,
  `LGA` varchar(50) default NULL,
  `Dept` varchar(50) default NULL,
  `Home Address` varchar(150) default NULL,
  `Contact Address` varchar(150) default NULL,
  `Phone` varchar(30) default NULL,
  `Prev Location` varchar(50) default NULL,
  `Present Location` varchar(50) default NULL,
  `Pres Location Date` date default NULL,
  `Employment Type` varchar(50) default NULL,
  `Marital Status` varchar(15) default NULL,
  `Birth Place` varchar(50) default NULL,
  `Wife Name` varchar(50) default NULL,
  `Marriage Date` date default NULL,
  `Wife DoB` date default NULL,
  `Employment Status` varchar(50) default NULL,
  `Nationality` varchar(50) default NULL,
  `Qualification` varchar(50) default NULL,
  `Profession` varchar(50) default NULL,
  `Confirmed` tinyint(1) default NULL,
  `Position` varchar(50) default NULL,
  `Date Confirmed` date default NULL,
  `Pension Managers` varchar(50) default NULL,
  `Office` varchar(50) default NULL,
  `Arrears` decimal(10,2) default NULL,
  `Deduction` decimal(10,2) default NULL,
  `Pension Amount` decimal(10,2) default NULL,
  `Deformity` varchar(50) default NULL,
  `Weight` varchar(20) default NULL,
  `File Number` varchar(30) default NULL,
  PRIMARY KEY  (`Staff Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pension`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `position`
-- 

CREATE TABLE `position` (
  `Position SortOrder` varchar(15) default NULL,
  `Position` varchar(50) default NULL,
  `Manager` varchar(50) default NULL,
  `Report T` varchar(50) default NULL,
  `Position Dept` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `position`
-- 

INSERT INTO `position` VALUES (NULL, 'NULL', NULL, NULL, NULL);
INSERT INTO `position` VALUES (NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `profession`
-- 

CREATE TABLE `profession` (
  `Profession` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `profession`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `promotion`
-- 

CREATE TABLE `promotion` (
  `Date` date default NULL,
  `Description` varchar(50) default NULL,
  `Staff Number` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `promotion`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `qualification`
-- 

CREATE TABLE `qualification` (
  `Qualification` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `qualification`
-- 

INSERT INTO `qualification` VALUES ('PhD');
INSERT INTO `qualification` VALUES ('L.L.M');
INSERT INTO `qualification` VALUES ('L.L.B');
INSERT INTO `qualification` VALUES ('B.L');
INSERT INTO `qualification` VALUES ('B.A');
INSERT INTO `qualification` VALUES ('DIPLOMA');

-- --------------------------------------------------------

-- 
-- Table structure for table `query`
-- 

CREATE TABLE `query` (
  `Staff Number` varchar(30) NOT NULL,
  `Reference` varchar(50) NOT NULL,
  `Action` varchar(150) default NULL,
  `Issued By` varchar(50) default NULL,
  `Date` date default NULL,
  `Remark` varchar(200) default NULL,
  PRIMARY KEY  (`Reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `query`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `rank`
-- 

CREATE TABLE `rank` (
  `RankID` varchar(15) default NULL,
  `Rank` varchar(50) default NULL,
  `Rank Sort Order` varchar(50) default NULL,
  `Cadre` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `rank`
-- 

INSERT INTO `rank` VALUES ('1', 'Hon. Chairman', NULL, NULL);
INSERT INTO `rank` VALUES ('2', 'Hon. Commissioner', NULL, NULL);
INSERT INTO `rank` VALUES ('3', 'Permanent Secretary', NULL, NULL);
INSERT INTO `rank` VALUES ('4', 'E.O. (Accts.)', NULL, NULL);
INSERT INTO `rank` VALUES ('5', 'Chief Clerical Offr', NULL, NULL);
INSERT INTO `rank` VALUES ('6', 'Chief Driver Mechanic', NULL, NULL);
INSERT INTO `rank` VALUES ('7', 'Snr.Sec.Asst.II', NULL, NULL);
INSERT INTO `rank` VALUES ('10', 'Senior Conf. Sec.', NULL, NULL);
INSERT INTO `rank` VALUES ('12', 'Conf.Sec.II', NULL, NULL);
INSERT INTO `rank` VALUES ('13', 'SEO (G.D.)', NULL, NULL);
INSERT INTO `rank` VALUES ('14', 'Snr.Sec.Asst.I', NULL, NULL);
INSERT INTO `rank` VALUES ('16', 'ACAO', NULL, NULL);
INSERT INTO `rank` VALUES ('19', 'AEO (GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('20', 'SCO', NULL, NULL);
INSERT INTO `rank` VALUES ('21', 'Prin. Prog. Analyst', NULL, NULL);
INSERT INTO `rank` VALUES ('22', 'Chief Sec.Asst', NULL, NULL);
INSERT INTO `rank` VALUES ('23', 'Conf. Sec. I', NULL, NULL);
INSERT INTO `rank` VALUES ('25', 'Clerical Officer II', NULL, NULL);
INSERT INTO `rank` VALUES ('26', 'Prin. Conf. Sec. II', NULL, NULL);
INSERT INTO `rank` VALUES ('28', 'Conf.Sec.IV', NULL, NULL);
INSERT INTO `rank` VALUES ('31', 'Clerical Officer I', NULL, NULL);
INSERT INTO `rank` VALUES ('32', 'AEO (Accts.)', NULL, NULL);
INSERT INTO `rank` VALUES ('34', 'Conf. Sec. III', NULL, NULL);
INSERT INTO `rank` VALUES ('35', 'Conf. Sec. II', NULL, NULL);
INSERT INTO `rank` VALUES ('36', 'Sec.Asst.II', NULL, NULL);
INSERT INTO `rank` VALUES ('37', 'Sec.Asst.III', NULL, NULL);
INSERT INTO `rank` VALUES ('38', 'SAO', NULL, NULL);
INSERT INTO `rank` VALUES ('39', 'Director', NULL, NULL);
INSERT INTO `rank` VALUES ('40', 'Asst. Chief Library Offr.', NULL, NULL);
INSERT INTO `rank` VALUES ('41', 'PEO I (GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('42', 'Prin. Conf. Sec. I', NULL, NULL);
INSERT INTO `rank` VALUES ('43', 'PEOII (GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('44', 'ACEO (GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('46', 'Snr.Accountant', NULL, NULL);
INSERT INTO `rank` VALUES ('48', 'PEO II (GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('49', 'SEO(GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('50', 'Accountant I', NULL, NULL);
INSERT INTO `rank` VALUES ('53', 'SEO (Accts.)', NULL, NULL);
INSERT INTO `rank` VALUES ('54', 'Chief Accountant', NULL, NULL);
INSERT INTO `rank` VALUES ('56', 'HEO (Accts.)', NULL, NULL);
INSERT INTO `rank` VALUES ('58', 'Higher Stock Verifier', NULL, NULL);
INSERT INTO `rank` VALUES ('59', 'Prin. Store Offr. II', NULL, NULL);
INSERT INTO `rank` VALUES ('60', 'ACPA', NULL, NULL);
INSERT INTO `rank` VALUES ('61', 'Snr. Programmer', NULL, NULL);
INSERT INTO `rank` VALUES ('62', 'Data Processing Officer', NULL, NULL);
INSERT INTO `rank` VALUES ('63', 'Asst. Data Processing Offr.', NULL, NULL);
INSERT INTO `rank` VALUES ('64', 'Snr Data proc Asst I', NULL, NULL);
INSERT INTO `rank` VALUES ('66', 'A.C.S.V', NULL, NULL);
INSERT INTO `rank` VALUES ('67', 'PAO', NULL, NULL);
INSERT INTO `rank` VALUES ('68', 'CAO', NULL, NULL);
INSERT INTO `rank` VALUES ('69', 'Chief Legal Officer', NULL, NULL);
INSERT INTO `rank` VALUES ('70', 'Deputy Director', NULL, NULL);
INSERT INTO `rank` VALUES ('71', 'Asst. Chief. Acct.', NULL, NULL);
INSERT INTO `rank` VALUES ('73', 'Admin. Officer II', NULL, NULL);
INSERT INTO `rank` VALUES ('75', 'CEO', NULL, NULL);
INSERT INTO `rank` VALUES ('76', 'HEO (G.D.)', NULL, NULL);
INSERT INTO `rank` VALUES ('77', 'Assistant Director', NULL, NULL);
INSERT INTO `rank` VALUES ('78', 'ACCS', NULL, NULL);
INSERT INTO `rank` VALUES ('79', 'PEO I (Accts.)', NULL, NULL);
INSERT INTO `rank` VALUES ('80', 'PEO II (Accts.)', NULL, NULL);
INSERT INTO `rank` VALUES ('81', 'Prin. Accts.I', NULL, NULL);
INSERT INTO `rank` VALUES ('82', 'Snr. Store Officer', NULL, NULL);
INSERT INTO `rank` VALUES ('85', 'Admin.Offr.I', NULL, NULL);
INSERT INTO `rank` VALUES ('87', 'Accountant II', NULL, NULL);
INSERT INTO `rank` VALUES ('88', 'A.C.S.O', NULL, NULL);
INSERT INTO `rank` VALUES ('89', 'Chief Conf. Sec.', NULL, NULL);
INSERT INTO `rank` VALUES ('95', 'E.O (GD)', NULL, NULL);
INSERT INTO `rank` VALUES ('96', 'Senior Driver Mechanic I', NULL, NULL);
INSERT INTO `rank` VALUES ('97', 'H.S.O', NULL, NULL);
INSERT INTO `rank` VALUES ('98', 'Sec.Asst.I', NULL, NULL);
INSERT INTO `rank` VALUES ('99', 'Chief Statistician', NULL, NULL);
INSERT INTO `rank` VALUES ('100', 'Asst. Director (Stat.)', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `region`
-- 

CREATE TABLE `region` (
  `Region ID` bigint(11) NOT NULL auto_increment,
  `Region` varchar(50) default NULL,
  PRIMARY KEY  (`Region ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `region`
-- 

INSERT INTO `region` VALUES (1, 'South-East');
INSERT INTO `region` VALUES (2, 'North-West');
INSERT INTO `region` VALUES (3, 'North-Central');
INSERT INTO `region` VALUES (4, 'South-West');
INSERT INTO `region` VALUES (5, 'South-South');
INSERT INTO `region` VALUES (6, 'North-East');

-- --------------------------------------------------------

-- 
-- Table structure for table `required training`
-- 

CREATE TABLE `required training` (
  `Start Date` date default NULL,
  `End Date` date default NULL,
  `Duration(days)` int(11) default NULL,
  `Location` varchar(50) default NULL,
  `Organizer` varchar(50) default NULL,
  `Description` varchar(50) default NULL,
  `Cate ry` varchar(50) default NULL,
  `Performance` varchar(50) default NULL,
  `Notes` varchar(50) default NULL,
  `Course Cost` decimal(10,2) default NULL,
  `Travel Cost` decimal(10,2) default NULL,
  `Staff Number` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `required training`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `requisition`
-- 

CREATE TABLE `requisition` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Stock Code` varchar(50) default NULL,
  `Stock Name` varchar(50) default NULL,
  `Stock Date` date default NULL,
  `Qnty Req` bigint(11) default NULL,
  `Qnty Given` bigint(11) default NULL,
  `Request By` varchar(50) default NULL,
  `Given By` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Approved By` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  `Destination` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `requisition`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `restock`
-- 

CREATE TABLE `restock` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Stock Code` varchar(50) default NULL,
  `Stock Name` varchar(50) default NULL,
  `Stock Date` date default NULL,
  `Qnty Added` bigint(11) default NULL,
  `Balance` bigint(11) default NULL,
  `Received By` varchar(50) default NULL,
  `Supplier` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  `Unit Cost` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `restock`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `sex`
-- 

CREATE TABLE `sex` (
  `Sex` varchar(12) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `sex`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `staff`
-- 

CREATE TABLE `staff` (
  `Staff Number` varchar(50) NOT NULL,
  `Surname` varchar(50) default NULL,
  `Firstname` varchar(50) default NULL,
  `Othername` varchar(50) default NULL,
  `Sex` varchar(9) default NULL,
  `Initial Rank` varchar(50) default NULL,
  `Present Rank` varchar(50) default NULL,
  `Level` varchar(20) default NULL,
  `Step` varchar(2) default NULL,
  `DoB` date default NULL,
  `Height` varchar(20) default NULL,
  `Bank` varchar(50) default NULL,
  `Acct No` varchar(50) default NULL,
  `Blood Group` varchar(10) default NULL,
  `Genotype` varchar(10) default NULL,
  `Complexion` varchar(20) default NULL,
  `In Govt Qtrs` tinyint(1) default NULL,
  `Bank Location` varchar(50) default NULL,
  `Bank Branch` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `Previous Conviction` tinyint(1) default NULL,
  `First Appt` date default NULL,
  `Present Appt` date default NULL,
  `State` varchar(50) default NULL,
  `LGA` varchar(50) default NULL,
  `Dept` varchar(50) default NULL,
  `Home Address` varchar(150) default NULL,
  `Contact Address` varchar(150) default NULL,
  `Phone` varchar(30) default NULL,
  `Prev Location` varchar(50) default NULL,
  `Present Location` varchar(50) default NULL,
  `Pres Location Date` date default NULL,
  `Employment Type` varchar(50) default NULL,
  `Marital Status` varchar(15) default NULL,
  `Birth Place` varchar(50) default NULL,
  `Wife Name` varchar(50) default NULL,
  `Marriage Date` date default NULL,
  `Wife DoB` date default NULL,
  `Employment Status` varchar(50) default NULL,
  `Nationality` varchar(50) default NULL,
  `Qualification` varchar(50) default NULL,
  `Profession` varchar(50) default NULL,
  `Confirmed` tinyint(1) default NULL,
  `Position` varchar(50) default NULL,
  `Date Confirmed` date default NULL,
  `Pension Managers` varchar(50) default NULL,
  `Office` varchar(50) default NULL,
  `Arrears` decimal(10,0) default NULL,
  `Deduction` decimal(10,0) default NULL,
  `Pension Amount` decimal(10,0) default NULL,
  `Deformity` varchar(50) default NULL,
  `Weight` varchar(20) default NULL,
  `File Number` varchar(30) default NULL,
  `Nat Honour` varchar(50) default NULL,
  `GovtQtrs Date` date default NULL,
  `Ret_Date` date default NULL,
  `Cadre` varchar(50) default NULL,
  `ID` bigint(20) NOT NULL auto_increment,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

-- 
-- Dumping data for table `staff`
-- 

INSERT INTO `staff` VALUES ('1278', 'Okoro', 'Francis', '', 'Male', 'NULL', 'EO (Accts.)', '07/04', '', '1974-03-22', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 'NULL', 'NULL', 'NULL', 0, '2001-02-23', '2005-01-01', 'Edo', 'Akoko Edo', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'Federal Civil Service Commission', '0000-00-00', 'NULL', 'Married', 'NULL', 'NULL', '0000-00-00', '0000-00-00', 'Active', 'Nigeria', 'NULL', 'NULL', 0, 'NULL', '0000-00-00', 'NULL', 'Abuja', '0', '0', '0', 'NULL', 'NULL', 'Abuja', 'NULL', '0000-00-00', '0000-00-00', 'NULL', 94);

-- --------------------------------------------------------

-- 
-- Table structure for table `state`
-- 

CREATE TABLE `state` (
  `State` varchar(50) default NULL,
  `Region` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `state`
-- 

INSERT INTO `state` VALUES ('FCT-Abuja', 'Federal');
INSERT INTO `state` VALUES ('Abia', 'South-East');
INSERT INTO `state` VALUES ('Adamawa', 'North-East');
INSERT INTO `state` VALUES ('Akwa Ibom', 'South-South');
INSERT INTO `state` VALUES ('Anambra', 'South-East');
INSERT INTO `state` VALUES ('Bauchi', 'North-East');
INSERT INTO `state` VALUES ('Bayelsa', 'South-South');
INSERT INTO `state` VALUES ('Benue', 'North-Central');
INSERT INTO `state` VALUES ('Borno', 'North-East');
INSERT INTO `state` VALUES ('Cross River', 'South-South');
INSERT INTO `state` VALUES ('Delta', 'South-South');
INSERT INTO `state` VALUES ('Ebonyi', 'South-East');
INSERT INTO `state` VALUES ('Edo', 'South-South');
INSERT INTO `state` VALUES ('Ekiti', 'South-West');
INSERT INTO `state` VALUES ('Enugu', 'South-East');
INSERT INTO `state` VALUES ('Gombe', 'North-East');
INSERT INTO `state` VALUES ('Imo', 'South-East');
INSERT INTO `state` VALUES ('Jigawa', 'North-West');
INSERT INTO `state` VALUES ('Kaduna', 'North-West');
INSERT INTO `state` VALUES ('Kano', 'North-West');
INSERT INTO `state` VALUES ('Katsina', 'North-West');
INSERT INTO `state` VALUES ('Kebbi', 'North-West');
INSERT INTO `state` VALUES ('Kogi', 'North-Central');
INSERT INTO `state` VALUES ('Kwara', 'North-Central');
INSERT INTO `state` VALUES ('Lagos', 'South-West');
INSERT INTO `state` VALUES ('Nassarawa', 'North-Central');
INSERT INTO `state` VALUES ('Niger', 'North-Central');
INSERT INTO `state` VALUES ('Ogun', 'South-West');
INSERT INTO `state` VALUES ('Ondo', 'South-West');
INSERT INTO `state` VALUES ('Osun', 'South-West');
INSERT INTO `state` VALUES ('Oyo', 'South-West');
INSERT INTO `state` VALUES ('Plateau', 'North-Central');
INSERT INTO `state` VALUES ('Rivers', 'South-South');
INSERT INTO `state` VALUES ('Sokoto', 'North-West');
INSERT INTO `state` VALUES ('Taraba', 'North-East');
INSERT INTO `state` VALUES ('Yobe', 'North-East');
INSERT INTO `state` VALUES ('Zamfara', 'North-West');
INSERT INTO `state` VALUES ('Federal', 'Federal');

-- --------------------------------------------------------

-- 
-- Table structure for table `status`
-- 

CREATE TABLE `status` (
  `Status` varchar(50) default NULL,
  `PayStatus` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `status`
-- 

INSERT INTO `status` VALUES ('Active', 'Pay');
INSERT INTO `status` VALUES ('Suspended', 'No Pay');
INSERT INTO `status` VALUES ('Pensions', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `stock category`
-- 

CREATE TABLE `stock category` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Category` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `stock category`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `stock`
-- 

CREATE TABLE `stock` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Stock Code` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  `Brand Name` varchar(50) default NULL,
  `Stock Name` varchar(50) default NULL,
  `Description` varchar(150) default NULL,
  `Manufacturer` varchar(50) default NULL,
  `Supplier` varchar(50) default NULL,
  `Unit Cost` double(11,2) default NULL,
  `Expiry Date` date default NULL,
  `Reorder Level` bigint(11) default NULL,
  `Units in Stock` bigint(11) default NULL,
  `Location` varchar(50) default NULL,
  `Selling Price` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `stock`
-- 

INSERT INTO `stock` VALUES (1, 'AbjRK009', '', '', 'Panel', 'One Million Five Hundred Thousand Naira Only', '', '', 1500000.00, '0000-00-00', 0, 120, 'Abuja', '0.00');
INSERT INTO `stock` VALUES (2, 'AbN008', '', '', 'Repair Kit', '', '', '', 0.00, '0000-00-00', 0, 300, 'Abuja', '0.00');

-- --------------------------------------------------------

-- 
-- Table structure for table `supplier`
-- 

CREATE TABLE `supplier` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Supplier` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `supplier`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `title`
-- 

CREATE TABLE `title` (
  `Title` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `title`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `training`
-- 

CREATE TABLE `training` (
  `Start Date` date default NULL,
  `End Date` date default NULL,
  `Duration` int(11) default NULL,
  `Location` varchar(50) default NULL,
  `Organizer` varchar(50) default NULL,
  `Description` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  `Performance` varchar(50) default NULL,
  `Further Needs` varchar(50) default NULL,
  `Notes` varchar(50) default NULL,
  `Course Cost` decimal(10,2) default NULL,
  `Travel Cost` decimal(10,2) default NULL,
  `Staff Number` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `training`
-- 

INSERT INTO `training` VALUES ('2005-08-21', '2005-08-30', NULL, 'Lagos', 'MTT', 'SQL Server AdI.Tministration & Management', 'I.T', 'Good', 'many', '', '250000.00', '50000.00', '1717');

-- --------------------------------------------------------

-- 
-- Table structure for table `union`
-- 

CREATE TABLE `union` (
  `Union ID` int(11) default NULL,
  `Union Name` varchar(50) default NULL,
  `Descr` varchar(150) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `union`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `varcalc`
-- 

CREATE TABLE `varcalc` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Grade Level` varchar(50) default NULL,
  `Pay Item` varchar(50) default NULL,
  `Old Rate` decimal(11,2) default NULL,
  `New Rate` decimal(11,2) default NULL,
  `Duration` bigint(11) default NULL,
  `Arrears` decimal(11,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `varcalc`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `variation type`
-- 

CREATE TABLE `variation type` (
  `Variation Type` varchar(50) default NULL,
  `VarID` varchar(50) default NULL,
  `VarGroup` varchar(50) default NULL,
  `VarClass` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `variation type`
-- 

INSERT INTO `variation type` VALUES ('Salary Arrears', '1', 'A', 'E');
INSERT INTO `variation type` VALUES ('Refunds', '2', 'A', 'E');
INSERT INTO `variation type` VALUES ('Acting Allowance', '3', 'A', 'E');
INSERT INTO `variation type` VALUES ('Overtime', '4', 'A', 'E');
INSERT INTO `variation type` VALUES ('Leave Grant', '5', 'A', 'E');
INSERT INTO `variation type` VALUES ('Over-Payment', '6', 'D', 'R');

-- --------------------------------------------------------

-- 
-- Table structure for table `variation`
-- 

CREATE TABLE `variation` (
  `Staff Number` varchar(30) NOT NULL,
  `Variation` decimal(10,0) default NULL,
  `Description` varchar(200) default NULL,
  `Type` varchar(50) default NULL,
  `SortOrder` varchar(50) default NULL,
  `AllowID` varchar(50) default NULL,
  `Typ` char(2) default NULL,
  `Name` varchar(50) default NULL,
  `Office` varchar(50) default NULL,
  `Year` varchar(50) default NULL,
  `For Month` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `variation`
-- 

INSERT INTO `variation` VALUES ('2345', '15000', 'basic salary', 'Salary Arrears', NULL, NULL, NULL, 'achem', 'Ministry of Labour', NULL, 'apri, 2010');

-- --------------------------------------------------------

-- 
-- Table structure for table `warning`
-- 

CREATE TABLE `warning` (
  `Staff Number` varchar(30) NOT NULL,
  `Reference` varchar(50) NOT NULL,
  `Action` varchar(150) default NULL,
  `Issued By` varchar(50) default NULL,
  `Date` date default NULL,
  `Remark` varchar(200) default NULL,
  PRIMARY KEY  (`Reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `warning`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `zz`
-- 

CREATE TABLE `zz` (
  `sn` varchar(30) default NULL,
  `zz` decimal(10,2) default NULL,
  `nn` decimal(16,2) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `zz`
-- 

INSERT INTO `zz` VALUES ('1148', '-992.56', NULL);
INSERT INTO `zz` VALUES ('1202', '-807.25', NULL);
INSERT INTO `zz` VALUES ('1216', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1218', '-211.98', NULL);
INSERT INTO `zz` VALUES ('1245', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1311', '-211.98', NULL);
INSERT INTO `zz` VALUES ('1315', '-219.06', NULL);
INSERT INTO `zz` VALUES ('1333', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1351', '-233.23', NULL);
INSERT INTO `zz` VALUES ('1355', '-710.38', NULL);
INSERT INTO `zz` VALUES ('1384', '-953.41', NULL);
INSERT INTO `zz` VALUES ('1391', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1398', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1399', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1402', '-710.38', NULL);
INSERT INTO `zz` VALUES ('1411', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1413', '-875.13', NULL);
INSERT INTO `zz` VALUES ('1487', '-197.81', NULL);
INSERT INTO `zz` VALUES ('1488', '-748.71', NULL);
INSERT INTO `zz` VALUES ('1501', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1502', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1503', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1506', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1515', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1518', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1521', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1524', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1527', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1529', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1532', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1546', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1547', '-807.25', NULL);
INSERT INTO `zz` VALUES ('1550', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1552', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1563', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1573', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1576', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1608', '-710.38', NULL);
INSERT INTO `zz` VALUES ('1614', '-1070.84', NULL);
INSERT INTO `zz` VALUES ('1615', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1633', '-953.41', NULL);
INSERT INTO `zz` VALUES ('1634', '-1196.20', NULL);
INSERT INTO `zz` VALUES ('1649', '-924.34', NULL);
INSERT INTO `zz` VALUES ('1650', '-1163.58', NULL);
INSERT INTO `zz` VALUES ('1651', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1659', '-1031.70', NULL);
INSERT INTO `zz` VALUES ('1667', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1669', '-1257.66', NULL);
INSERT INTO `zz` VALUES ('1670', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1672', '-914.27', NULL);
INSERT INTO `zz` VALUES ('1673', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1675', '-748.71', NULL);
INSERT INTO `zz` VALUES ('1679', '-865.80', NULL);
INSERT INTO `zz` VALUES ('1683', '-1409.74', NULL);
INSERT INTO `zz` VALUES ('1684', '-1163.58', NULL);
INSERT INTO `zz` VALUES ('1686', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1687', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1688', '-1116.54', NULL);
INSERT INTO `zz` VALUES ('1690', '-748.71', NULL);
INSERT INTO `zz` VALUES ('1692', '-865.80', NULL);
INSERT INTO `zz` VALUES ('1693', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1694', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1699', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1700', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1701', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1702', '-953.41', NULL);
INSERT INTO `zz` VALUES ('1703', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1704', '-992.56', NULL);
INSERT INTO `zz` VALUES ('1705', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1706', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1708', '-807.25', NULL);
INSERT INTO `zz` VALUES ('1709', '-710.38', NULL);
INSERT INTO `zz` VALUES ('1716', '-1257.66', NULL);
INSERT INTO `zz` VALUES ('1717', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1718', '-953.41', NULL);
INSERT INTO `zz` VALUES ('1719', '-684.66', NULL);
INSERT INTO `zz` VALUES ('1721', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1723', '-658.95', NULL);
INSERT INTO `zz` VALUES ('1726', '-836.53', NULL);
INSERT INTO `zz` VALUES ('1729', '-953.41', NULL);
INSERT INTO `zz` VALUES ('1730', '-777.98', NULL);
INSERT INTO `zz` VALUES ('1733', '-607.51', NULL);
INSERT INTO `zz` VALUES ('1738', '-633.23', NULL);
INSERT INTO `zz` VALUES ('1740', '-836.53', NULL);
INSERT INTO `zz` VALUES ('1741', '-1031.70', NULL);
INSERT INTO `zz` VALUES ('1744', '-875.13', NULL);
INSERT INTO `zz` VALUES ('1757', '-992.56', NULL);
INSERT INTO `zz` VALUES ('1765', '-1012.15', NULL);
INSERT INTO `zz` VALUES ('2169', '-748.71', NULL);
INSERT INTO `zz` VALUES ('2221', '-992.56', NULL);
INSERT INTO `zz` VALUES ('2243', '-777.98', NULL);
INSERT INTO `zz` VALUES ('2597', '-211.98', NULL);
INSERT INTO `zz` VALUES ('549', '-240.31', NULL);
INSERT INTO `zz` VALUES ('616', '-1409.74', NULL);
