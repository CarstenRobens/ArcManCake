-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2014 at 02:47 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `immocaster_storage`
--

CREATE TABLE IF NOT EXISTS `immocaster_storage` (
  `ic_id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `ic_desc` varchar(32) NOT NULL,
  `ic_key` varchar(128) NOT NULL,
  `ic_secret` varchar(128) NOT NULL,
  `ic_expire` datetime NOT NULL,
  PRIMARY KEY (`ic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `immocaster_storage`
--

INSERT INTO `immocaster_storage` (`ic_id`, `ic_desc`, `ic_key`, `ic_secret`, `ic_expire`) VALUES
(23, 'REQUEST', 'ea567b98-3129-407c-ad73-f83a0b2f7f61', 'iV7L4OrUSS1VdGkbZKfMfBTkYl6%2FP4MbdnwMc%2BiL4Su7oDn4NRxIcX%2BUPRoEjgVwSQpAi8AdEcxWBNEp8x9ZyylcwZH7HhxbvwQ8Rjheg7o%3D', '2012-11-02 20:44:08'),
(22, 'APPLICATION', '7ceda6d2-be12-4bb2-93ad-f24e32b778ab', 'd9YWI%2F90I03Jo9aVYZKmUCv1IROLc89KT1Sf78sMAe2UrhqPxpuLqT0bQJ1c2YZn3RslRyVH5y3AOkbplIfPfUDBtMzIMJnaGfFkprEhATw%3D', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
