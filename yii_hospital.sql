-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2012 at 07:48 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE IF NOT EXISTS `customer_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `mobile` varchar(128) DEFAULT NULL,
  `refby` int(11) DEFAULT NULL,
  `original_refby` int(11) DEFAULT NULL,
  `subtotal` float(11,2) DEFAULT NULL,
  `less_discount` float(11,2) DEFAULT NULL,
  `netpay` float(11,2) NOT NULL,
  `recieved` float(11,2) DEFAULT NULL,
  `due` float(11,2) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`id`, `patient_id`, `name`, `age`, `sex`, `mobile`, `refby`, `original_refby`, `subtotal`, `less_discount`, `netpay`, `recieved`, `due`, `create_date`, `update_date`) VALUES
(1, 'PATIENT_1', 'Md. Shaiful Islam', 28, 'Male', '01742093109', 1, 1, 100.00, 2.00, 98.00, 98.00, 0.00, '2012-10-13 10:35:45', NULL),
(3, 'PATIENT_2', 'Tanvir Karim Khan', 30, 'Male', NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_tracker`
--

CREATE TABLE IF NOT EXISTS `patient_tracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` VARCHAR( 128 ) NOT NULL,
  `test_id` int(11) NOT NULL,
  `testroom_no` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `patient_tracker`
--


-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  `category_id` float NOT NULL,
  `refvalue` int(11) NOT NULL,
  `test_amount` float(11,2) NOT NULL,
  `test_room` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `test`
--


-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE IF NOT EXISTS `test_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(128) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`id`, `category_name`, `parent_id`) VALUES
(1, 'Blood', 0),
(2, 'Blood Group Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `create_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost.com', 'Clark', 'Kent', '2012-10-10 11:28:57');

--
-- Table structure for table `original_ref_by`
--

CREATE TABLE IF NOT EXISTS `original_ref_by` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `deg` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `mob` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `original_ref_by`
--

INSERT INTO `original_ref_by` (`id`, `name`, `deg`, `hospital_name`, `mob`, `email`, `pic`) VALUES
(1, 'Shakil Ahmed', 'M.B.B.S', 'SQUAR HOSPITAL', '017465487', 'shakil@hotpital.com', '');
