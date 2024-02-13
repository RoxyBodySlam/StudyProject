-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 12, 2024 at 10:47 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `dosprjdb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `whtranms`
-- 

CREATE TABLE `whtranms` (
  `TranID` varchar(20) NOT NULL,
  `EmpID` varchar(20) default NULL,
  `Warehouse` varchar(40) default NULL,
  `Zone` varchar(40) default NULL,
  `SN` varchar(20) default NULL,
  `Qty` int(11) default NULL,
  `Status` varchar(20) default NULL,
  `ProdType` varchar(20) default NULL,
  `ScanDT` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `whtranms`
-- 

