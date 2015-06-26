-- phpMyAdmin SQL Dump
-- version 4.0.10.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2015 at 11:38 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake_demo3`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `gender` int(11) NOT NULL,
  `image` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `email`, `password`, `name`, `phone`, `address`, `postal_code`, `gender`, `image`, `created`, `modified`) VALUES
(1, 'abhi@gmail.com', '06e7f2b5e2d2fa4b578fea8b3268a2402cc11139', 'abhi', '1234567892', 'ajmer', '305001', 0, '/registration/app/webroot/img/image/852058_f587c3af253e1a55ebcae6a4a9520400_1434536617screenshot-1.png', '2015-06-17 12:23:37', '2015-06-17 12:23:37'),
(2, 'abhi@yahoo.com', '06e7f2b5e2d2fa4b578fea8b3268a2402cc11139', 'abhi2', '1234567892', 'jaipur', '305001', 0, '/registration/app/webroot/img/image/2625032_d322cf3390fcd15ce4cb58ebe10ed734_1434537821humana_logo60.jpg', '2015-06-17 12:24:25', '2015-06-17 12:43:41'),
(3, 'admin@gmail.com', '06e7f2b5e2d2fa4b578fea8b3268a2402cc11139', 'abhi', '1234567892', 'aaaaaaaaaaaaaa', '305001', 0, '/abhishek/registration/app/webroot/img/image/1315443_d2ed203b6d3905f0aa328c7d2ee66439_1434539032aetna_03_june.jpg', '2015-06-17 10:56:47', '2015-06-17 11:03:52'),
(4, 'admin0@gmail.com', '06e7f2b5e2d2fa4b578fea8b3268a2402cc11139', 'abhi', '1234567892', 'ssssssssssssssss', '305001', 0, '/abhishek/registration/app/webroot/img/image/3699839_f882f945a60d7df4192c215ea7cd2bc0_1434539630humana_logo60.jpg', '2015-06-17 11:13:22', '2015-06-17 11:13:50'),
(5, 'abhishek.sharma@planetwebsolution.com', '06e7f2b5e2d2fa4b578fea8b3268a2402cc11139', 'abhi', '1234567892', 'sssssssssssssssss', '123456', 0, '/registration/app/webroot/img/image/1650091_e52bafd62df94c07d79c01f05eabbd8f_1434610874aetna_03_june.jpg', '2015-06-18 07:01:14', '2015-06-18 07:01:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
