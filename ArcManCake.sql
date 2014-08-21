-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2014 at 09:17 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ArcManCake`
--

-- --------------------------------------------------------

--
-- Table structure for table `bought_extras`
--

CREATE TABLE IF NOT EXISTS `bought_extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `factor` float NOT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `proposal_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=264 ;

--
-- Dumping data for table `bought_extras`
--

INSERT INTO `bought_extras` (`id`, `price`, `factor`, `extra_id`, `proposal_id`, `created`, `modified`) VALUES
(1, 100000, 1, 14, 2, '2014-07-04', '2014-07-04'),
(2, 765, 1, 15, 2, '2014-07-04', '2014-07-04'),
(3, 8765, 1, 13, 2, '2014-07-04', '2014-07-04'),
(5, 1050, 1, 17, 2, '2014-07-04', '2014-07-04'),
(6, 100, 1, 14, 3, '2014-07-05', '2014-07-05'),
(7, 1000, 1, 15, 3, '2014-07-05', '2014-07-05'),
(16, 345, 1, 33, 4, '2014-07-09', '2014-07-09'),
(20, 2234, 1, 17, 4, '2014-07-10', '2014-07-10'),
(21, 126, 1, 35, 4, '2014-07-10', '2014-07-10'),
(27, 1000, 1, 13, 4, '2014-07-10', '2014-07-10'),
(28, 1050, 1, 14, 4, '2014-07-10', '2014-07-10'),
(30, 2000, 1, 15, 4, '2014-07-10', '2014-07-10'),
(31, 30000, 1, 41, 4, '2014-07-11', '2014-07-11'),
(32, 34563, 1, 42, 4, '2014-07-11', '2014-07-11'),
(33, 5000, 1, 43, 4, '2014-07-11', '2014-07-11'),
(41, 3000, 1, 48, 10, '2014-08-04', '2014-08-04'),
(42, 5000, 1, 49, 10, '2014-08-04', '2014-08-04'),
(43, 5000, 1, 50, 10, '2014-08-04', '2014-08-04'),
(44, 8000, 1, 51, 10, '2014-08-04', '2014-08-04'),
(45, 9000, 1, 52, 10, '2014-08-04', '2014-08-04'),
(46, 500, 1, 53, 10, '2014-08-04', '2014-08-04'),
(47, 4400, 1, 54, 10, '2014-08-04', '2014-08-04'),
(48, 5000, 1, 47, 4, '2014-08-04', '2014-08-04'),
(49, 3000, 1, 48, 4, '2014-08-04', '2014-08-04'),
(50, 5000, 1, 50, 4, '2014-08-04', '2014-08-04'),
(51, 5000, 1, 49, 4, '2014-08-04', '2014-08-04'),
(52, 9000, 1, 52, 4, '2014-08-04', '2014-08-04'),
(53, 500, 1, 53, 4, '2014-08-04', '2014-08-04'),
(54, 4400, 1, 54, 4, '2014-08-04', '2014-08-04'),
(55, 8000, 1, 51, 4, '2014-08-04', '2014-08-04'),
(56, 5000, 1, 47, 11, '2014-08-04', '2014-08-04'),
(57, 3000, 1, 48, 11, '2014-08-04', '2014-08-04'),
(58, 5000, 1, 49, 11, '2014-08-04', '2014-08-04'),
(59, 5000, 1, 50, 11, '2014-08-04', '2014-08-04'),
(60, 8000, 1, 51, 11, '2014-08-04', '2014-08-09'),
(61, 9000, 1, 52, 11, '2014-08-04', '2014-08-04'),
(62, 500, 1, 53, 11, '2014-08-04', '2014-08-04'),
(63, 4400, 1, 54, 11, '2014-08-04', '2014-08-04'),
(77, 200, 1, 36, 11, '2014-08-04', '2014-08-04'),
(78, 34563, 1, 42, 11, '2014-08-04', '2014-08-04'),
(81, 200, 1, 46, 11, '2014-08-08', '2014-08-09'),
(84, 5000, 1, 47, 12, '2014-08-08', '2014-08-08'),
(85, 3000, 1, 48, 12, '2014-08-08', '2014-08-08'),
(86, 5000, 1, 49, 12, '2014-08-08', '2014-08-08'),
(87, 5000, 1, 50, 12, '2014-08-08', '2014-08-08'),
(88, 8000, 1, 51, 12, '2014-08-08', '2014-08-08'),
(89, 9000, 1, 52, 12, '2014-08-08', '2014-08-08'),
(90, 500, 1, 53, 12, '2014-08-08', '2014-08-08'),
(91, 4400, 1, 54, 12, '2014-08-08', '2014-08-08'),
(92, 5000, 1, 47, 13, '2014-08-18', '2014-08-18'),
(93, 3000, 1, 48, 13, '2014-08-18', '2014-08-18'),
(94, 5000, 1, 49, 13, '2014-08-18', '2014-08-18'),
(95, 5000, 1, 50, 13, '2014-08-18', '2014-08-18'),
(96, 8000, 1, 51, 13, '2014-08-18', '2014-08-18'),
(97, 9000, 1, 52, 13, '2014-08-18', '2014-08-18'),
(98, 500, 1, 53, 13, '2014-08-18', '2014-08-18'),
(99, 4400, 1, 54, 13, '2014-08-18', '2014-08-18'),
(100, 5000, 1, 47, 14, '2014-08-18', '2014-08-18'),
(101, 3000, 1, 48, 14, '2014-08-18', '2014-08-18'),
(102, 5000, 1, 49, 14, '2014-08-18', '2014-08-18'),
(103, 5000, 1, 50, 14, '2014-08-18', '2014-08-18'),
(104, 8000, 1, 51, 14, '2014-08-18', '2014-08-18'),
(105, 9000, 1, 52, 14, '2014-08-18', '2014-08-18'),
(106, 500, 1, 53, 14, '2014-08-18', '2014-08-18'),
(107, 4400, 1, 54, 14, '2014-08-18', '2014-08-18'),
(108, 5000, 1, 47, 15, '2014-08-18', '2014-08-18'),
(109, 3000, 1, 48, 15, '2014-08-18', '2014-08-18'),
(110, 5000, 1, 49, 15, '2014-08-18', '2014-08-18'),
(111, 5000, 1, 50, 15, '2014-08-18', '2014-08-18'),
(112, 8000, 1, 51, 15, '2014-08-18', '2014-08-18'),
(113, 9000, 1, 52, 15, '2014-08-18', '2014-08-18'),
(114, 500, 1, 53, 15, '2014-08-18', '2014-08-18'),
(115, 4400, 1, 54, 15, '2014-08-18', '2014-08-18'),
(116, 5000, 1, 47, 16, '2014-08-18', '2014-08-18'),
(117, 3000, 1, 48, 16, '2014-08-18', '2014-08-18'),
(118, 5000, 1, 49, 16, '2014-08-18', '2014-08-18'),
(119, 5000, 1, 50, 16, '2014-08-18', '2014-08-18'),
(120, 8000, 1, 51, 16, '2014-08-18', '2014-08-18'),
(121, 9000, 1, 52, 16, '2014-08-18', '2014-08-18'),
(122, 500, 1, 53, 16, '2014-08-18', '2014-08-18'),
(123, 4400, 1, 54, 16, '2014-08-18', '2014-08-18'),
(124, 5000, 1, 47, 17, '2014-08-18', '2014-08-18'),
(125, 3000, 1, 48, 17, '2014-08-18', '2014-08-18'),
(126, 5000, 1, 49, 17, '2014-08-18', '2014-08-18'),
(127, 5000, 1, 50, 17, '2014-08-18', '2014-08-18'),
(128, 8000, 1, 51, 17, '2014-08-18', '2014-08-18'),
(129, 9000, 1, 52, 17, '2014-08-18', '2014-08-18'),
(130, 500, 1, 53, 17, '2014-08-18', '2014-08-18'),
(131, 4400, 1, 54, 17, '2014-08-18', '2014-08-18'),
(132, 5000, 1, 47, 18, '2014-08-18', '2014-08-18'),
(133, 3000, 1, 48, 18, '2014-08-18', '2014-08-18'),
(134, 5000, 1, 49, 18, '2014-08-18', '2014-08-18'),
(135, 5000, 1, 50, 18, '2014-08-18', '2014-08-18'),
(136, 8000, 1, 51, 18, '2014-08-18', '2014-08-18'),
(137, 9000, 1, 52, 18, '2014-08-18', '2014-08-18'),
(138, 500, 1, 53, 18, '2014-08-18', '2014-08-18'),
(139, 4400, 1, 54, 18, '2014-08-18', '2014-08-18'),
(140, 200, 1, 36, 4, '2014-08-20', '2014-08-20'),
(141, 0, 1, 47, 17, '2014-08-21', '2014-08-21'),
(142, 0, 1, 48, 17, '2014-08-21', '2014-08-21'),
(143, 0, 1, 49, 17, '2014-08-21', '2014-08-21'),
(144, 0, 1, 50, 17, '2014-08-21', '2014-08-21'),
(145, 0, 1, 51, 17, '2014-08-21', '2014-08-21'),
(146, 0, 1, 52, 17, '2014-08-21', '2014-08-21'),
(147, 0, 1, 53, 17, '2014-08-21', '2014-08-21'),
(148, 0, 1, 54, 17, '2014-08-21', '2014-08-21'),
(149, 0, 1, 47, 18, '2014-08-21', '2014-08-21'),
(150, 0, 1, 48, 18, '2014-08-21', '2014-08-21'),
(151, 0, 1, 49, 18, '2014-08-21', '2014-08-21'),
(152, 0, 1, 50, 18, '2014-08-21', '2014-08-21'),
(153, 0, 1, 51, 18, '2014-08-21', '2014-08-21'),
(154, 0, 1, 52, 18, '2014-08-21', '2014-08-21'),
(155, 0, 1, 53, 18, '2014-08-21', '2014-08-21'),
(156, 0, 1, 54, 18, '2014-08-21', '2014-08-21'),
(157, 0, 1, 47, 19, '2014-08-21', '2014-08-21'),
(158, 0, 1, 48, 19, '2014-08-21', '2014-08-21'),
(159, 0, 1, 49, 19, '2014-08-21', '2014-08-21'),
(160, 0, 1, 50, 19, '2014-08-21', '2014-08-21'),
(161, 0, 1, 51, 19, '2014-08-21', '2014-08-21'),
(162, 0, 1, 52, 19, '2014-08-21', '2014-08-21'),
(163, 0, 1, 53, 19, '2014-08-21', '2014-08-21'),
(164, 0, 1, 54, 19, '2014-08-21', '2014-08-21'),
(165, 0, 1, 47, 20, '2014-08-21', '2014-08-21'),
(166, 0, 1, 48, 20, '2014-08-21', '2014-08-21'),
(167, 0, 1, 49, 20, '2014-08-21', '2014-08-21'),
(168, 0, 1, 50, 20, '2014-08-21', '2014-08-21'),
(169, 0, 1, 51, 20, '2014-08-21', '2014-08-21'),
(170, 0, 1, 52, 20, '2014-08-21', '2014-08-21'),
(171, 0, 1, 53, 20, '2014-08-21', '2014-08-21'),
(172, 0, 1, 54, 20, '2014-08-21', '2014-08-21'),
(173, 0, 1, 47, 21, '2014-08-21', '2014-08-21'),
(174, 0, 1, 48, 21, '2014-08-21', '2014-08-21'),
(175, 0, 1, 49, 21, '2014-08-21', '2014-08-21'),
(176, 0, 1, 50, 21, '2014-08-21', '2014-08-21'),
(177, 0, 1, 51, 21, '2014-08-21', '2014-08-21'),
(178, 0, 1, 52, 21, '2014-08-21', '2014-08-21'),
(179, 0, 1, 53, 21, '2014-08-21', '2014-08-21'),
(180, 0, 1, 54, 21, '2014-08-21', '2014-08-21'),
(181, 0, 1, 47, 22, '2014-08-21', '2014-08-21'),
(182, 0, 1, 48, 22, '2014-08-21', '2014-08-21'),
(183, 0, 1, 49, 22, '2014-08-21', '2014-08-21'),
(184, 0, 1, 50, 22, '2014-08-21', '2014-08-21'),
(185, 0, 1, 51, 22, '2014-08-21', '2014-08-21'),
(186, 0, 1, 52, 22, '2014-08-21', '2014-08-21'),
(187, 0, 1, 53, 22, '2014-08-21', '2014-08-21'),
(188, 0, 1, 54, 22, '2014-08-21', '2014-08-21'),
(189, 0, 1, 47, 23, '2014-08-21', '2014-08-21'),
(190, 0, 1, 48, 23, '2014-08-21', '2014-08-21'),
(191, 0, 1, 49, 23, '2014-08-21', '2014-08-21'),
(192, 0, 1, 50, 23, '2014-08-21', '2014-08-21'),
(193, 0, 1, 51, 23, '2014-08-21', '2014-08-21'),
(194, 0, 1, 52, 23, '2014-08-21', '2014-08-21'),
(195, 0, 1, 53, 23, '2014-08-21', '2014-08-21'),
(196, 0, 1, 54, 23, '2014-08-21', '2014-08-21'),
(197, 0, 1, 47, 24, '2014-08-21', '2014-08-21'),
(198, 0, 1, 48, 24, '2014-08-21', '2014-08-21'),
(199, 0, 1, 49, 24, '2014-08-21', '2014-08-21'),
(200, 0, 1, 50, 24, '2014-08-21', '2014-08-21'),
(201, 0, 1, 51, 24, '2014-08-21', '2014-08-21'),
(202, 0, 1, 52, 24, '2014-08-21', '2014-08-21'),
(203, 0, 1, 53, 24, '2014-08-21', '2014-08-21'),
(204, 0, 1, 54, 24, '2014-08-21', '2014-08-21'),
(205, 0, 1, 47, 25, '2014-08-21', '2014-08-21'),
(206, 0, 1, 48, 25, '2014-08-21', '2014-08-21'),
(207, 0, 1, 49, 25, '2014-08-21', '2014-08-21'),
(208, 0, 1, 50, 25, '2014-08-21', '2014-08-21'),
(209, 0, 1, 51, 25, '2014-08-21', '2014-08-21'),
(210, 0, 1, 52, 25, '2014-08-21', '2014-08-21'),
(211, 0, 1, 53, 25, '2014-08-21', '2014-08-21'),
(212, 0, 1, 54, 25, '2014-08-21', '2014-08-21'),
(213, 5000, 1, 47, 26, '2014-08-21', '2014-08-21'),
(214, 3000, 1, 48, 26, '2014-08-21', '2014-08-21'),
(215, 5000, 1, 49, 26, '2014-08-21', '2014-08-21'),
(216, 5000, 1, 50, 26, '2014-08-21', '2014-08-21'),
(217, 8000, 1, 51, 26, '2014-08-21', '2014-08-21'),
(218, 9000, 1, 52, 26, '2014-08-21', '2014-08-21'),
(219, 500, 1, 53, 26, '2014-08-21', '2014-08-21'),
(220, 4400, 1, 54, 26, '2014-08-21', '2014-08-21'),
(221, 5000, 1, 47, 27, '2014-08-21', '2014-08-21'),
(222, 3000, 1, 48, 27, '2014-08-21', '2014-08-21'),
(223, 5000, 1, 49, 27, '2014-08-21', '2014-08-21'),
(224, 5000, 1, 50, 27, '2014-08-21', '2014-08-21'),
(225, 8000, 1, 51, 27, '2014-08-21', '2014-08-21'),
(226, 9000, 1, 52, 27, '2014-08-21', '2014-08-21'),
(227, 500, 1, 53, 27, '2014-08-21', '2014-08-21'),
(228, 4400, 1, 54, 27, '2014-08-21', '2014-08-21'),
(229, 5000, 1, 47, 28, '2014-08-21', '2014-08-21'),
(230, 3000, 1, 48, 28, '2014-08-21', '2014-08-21'),
(231, 5000, 1, 49, 28, '2014-08-21', '2014-08-21'),
(232, 5000, 1, 50, 28, '2014-08-21', '2014-08-21'),
(233, 8000, 1, 51, 28, '2014-08-21', '2014-08-21'),
(234, 9000, 1, 52, 28, '2014-08-21', '2014-08-21'),
(235, 500, 1, 53, 28, '2014-08-21', '2014-08-21'),
(236, 4400, 1, 54, 28, '2014-08-21', '2014-08-21'),
(237, 5000, 1, 47, 29, '2014-08-21', '2014-08-21'),
(238, 3000, 1, 48, 29, '2014-08-21', '2014-08-21'),
(239, 5000, 1, 49, 29, '2014-08-21', '2014-08-21'),
(240, 5000, 1, 50, 29, '2014-08-21', '2014-08-21'),
(241, 8000, 1, 51, 29, '2014-08-21', '2014-08-21'),
(242, 9000, 1, 52, 29, '2014-08-21', '2014-08-21'),
(243, 500, 1, 53, 29, '2014-08-21', '2014-08-21'),
(244, 4400, 1, 54, 29, '2014-08-21', '2014-08-21'),
(245, 5000, 1, 47, 30, '2014-08-21', '2014-08-21'),
(246, 3000, 1, 48, 30, '2014-08-21', '2014-08-21'),
(247, 5000, 1, 49, 30, '2014-08-21', '2014-08-21'),
(248, 5000, 1, 50, 30, '2014-08-21', '2014-08-21'),
(249, 8000, 1, 51, 30, '2014-08-21', '2014-08-21'),
(250, 9000, 1, 52, 30, '2014-08-21', '2014-08-21'),
(251, 500, 1, 53, 30, '2014-08-21', '2014-08-21'),
(252, 4400, 1, 54, 30, '2014-08-21', '2014-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `created`, `modified`) VALUES
(1, 'Kitchen', 3, '2014-07-02', '2014-07-02'),
(2, 'Lair', 3, '2014-07-02', '2014-07-02'),
(3, 'Office', 3, '2014-07-02', '2014-07-02'),
(4, 'Bedroom', 4, '2014-07-02', '2014-07-02'),
(5, 'Living room', 4, '2014-07-02', '2014-07-02'),
(6, 'Garden', 6, '2014-07-04', '2014-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `notes`, `phone`, `email`, `address1`, `address2`, `zipcode`, `city`, `user_id`, `created`, `modified`) VALUES
(1, 'cus', 'a', '', 2147483647, 'dhf@kjaefh.com', 'dllfjg,2', '', 56777, 'Pekin', 3, '2014-07-01', '2014-07-01'),
(2, 'cus', 'a2', '', 1631728215, 'sfvn@jsn.com', 'sjdfhv, 4', 'Gugle Inc.', 76222, 'srfg', 3, '2014-07-01', '2014-07-01'),
(3, 'cus', 'b', '', 23456789, 'yasgevb@hgsjb.com', 'dbfgb, 2', '', 23000, 'Bonn', 4, '2014-07-01', '2014-07-01'),
(4, 'cus', 'b2', '', 45689, 'akejnm@kand.com', 'sdfghjk, 3', '', 90000, 'Cologne', 4, '2014-07-01', '2014-07-01'),
(5, 'cus', 'own', 'Cus Own is cool', 679, 'sdjf@ikshf.com', 'sdfghj, 7', 'IAP', 45678, 'tutupa', 2, '2014-07-01', '2014-07-07'),
(6, 'Jose Carlos', 'Gallego', 'Penis!', 34567890, 'jcgallegof@gmail.com', 'Endenichalle, 76', '', 59115, 'Bonn', 6, '2014-07-07', '2014-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Scheduled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(1, 1, 'The boss is angry!', '', '2014-08-14 11:21:00', '2014-08-18 11:21:00', 1, 'Scheduled', 1, '2014-07-07', '2014-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(1, 'Meeting', 'Green'),
(2, 'Customer appointment', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `default_priceA` float NOT NULL,
  `default_priceB` float NOT NULL,
  `default_priceC` float NOT NULL,
  `picture` varchar(200) NOT NULL,
  `size_dependent_flag` int(11) NOT NULL,
  `depends_on` int(11) NOT NULL,
  `bool_unique` tinyint(1) NOT NULL,
  `bool_uneditable` tinyint(1) NOT NULL,
  `bool_garage` tinyint(1) NOT NULL,
  `bool_custom` tinyint(1) NOT NULL,
  `bool_external` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `description`, `default_priceA`, `default_priceB`, `default_priceC`, `picture`, `size_dependent_flag`, `depends_on`, `bool_unique`, `bool_uneditable`, `bool_garage`, `bool_custom`, `bool_external`, `category_id`, `user_id`, `created`, `modified`) VALUES
(14, 'Jacuzzi', 'One of the all-time classic adventures, multi BAFTA-nominated "Broken Sword: Director''s Cut" pitches sassy journalist Nico Collard, and intrepid American George Stobbart into a mysterious journey of intrigue and jeopardy. Guide George and Nico on their globe-spanning adventure, exploring exotic locations, solving ancient mysteries, and thwarting a dark conspiracy to reveal the secret truths of the Knights Templar. \r\n\r\n"Broken Sword: The Directorâ€™s Cut" introduces an intricate new narrative thread, alongside the classic story that has charmed millions of players. Itâ€™s time to experience George and Nicoâ€™s worldwide adventure in a whole new way, with brand new puzzles, hilarious new jokes, and the distinctive, rich story that made the series so deservedly renowned. This is adventure gaming at its very best. ', 1050, 0, 0, 'jacuzzi.jpg', 0, 0, 0, 0, 0, 0, 0, 4, 4, '2014-07-02', '2014-07-22'),
(15, 'Garden maze', 'Get lost!', 2000, 0, 0, 'maze.jpg', 0, 0, 0, 0, 0, 0, 0, 3, 4, '2014-07-02', '2014-08-04'),
(17, 'T-Rex', 'Rooooooooaarr\r\n\r\nEver wonder how it feels to sail a half-million-ton supertanker through the perfect storm? To take on illegal whale hunters in the Antarctic? Or to feel the rush of being part of the Coast Guard as you evacuate a cruise liner in distress? Ship Simulator Extremes has players take on exciting missions all over the world as they pilot an impressive array of vessels and live the stories of real ship captains. With missions based on actual events in realistic environments at locations all over the world, the new Ship Simulator game is sure to take you to extremes! ', 1000, 0, 0, 'trex.jpg', 0, 0, 0, 0, 0, 0, 0, 6, 6, '2014-07-04', '2014-08-04'),
(31, 'Something boring', 'This tutorial is written for Django 1.6 and Python 2.x. If the Django version doesnâ€™t match, you can refer to the tutorial for your version of Django by using the version switcher at the bottom right corner of this page, or update Django to the newest version. If you are using Python 3.x, be aware that your code may need to differ from what is in the tutorial and you should continue using the tutorial only if you know what you are doing with Python 3.x.', 59, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 3, 6, '2014-07-09', '2014-07-09'),
(33, 'stupid custom extra', 'f your background is in plain old PHP (with no use of modern frameworks), youâ€™re probably used to putting code under the Web serverâ€™s document root (in a place such as /var/www). With Django, you donâ€™t do that. Itâ€™s not a good idea to put any of this Python code within your Web serverâ€™s document root, because it risks the possibility that people may be able to view your code over the Web. Thatâ€™s not good for security.', 345, 0, 0, '', -1, 0, 0, 0, 0, 1, 0, 1, 6, '2014-07-09', '2014-07-09'),
(35, 'Custom stupid external extra for Jose', 'Youâ€™ve started the Django development server, a lightweight Web server written purely in Python. Weâ€™ve included this with Django so you can develop things rapidly, without having to deal with configuring a production server â€“ such as Apache â€“ until youâ€™re ready for production.\r\n\r\nNowâ€™s a good time to note: Donâ€™t use this server in anything resembling a production environment. Itâ€™s intended only for use while developing. (Weâ€™re in the business of making Web frameworks, not Web servers.)', 126, 0, 0, '', 0, 0, 0, 0, 0, 1, 0, 4, 6, '2014-07-10', '2014-08-04'),
(36, 'Oven', 'Web Components usher in a new era of web development based on encapsulated and interoperable custom elements that extend HTML itself. Built atop these new standards, Polymer makes it easier and faster to create anything from a button to a complete application across desktop, mobile, and beyond.', 200, 0, 0, '', 0, 0, 1, 0, 0, 0, 0, 1, 6, '2014-07-11', '2014-07-11'),
(37, 'Terrace', 'Estamos en pleno julio ya: unos cuantos ya estarÃ¡n de vacaciones aprovechando la ventana que nos abre el verano, otros se encontrarÃ¡n trabajando en sus respectivas tareasâ€¦ pero lo que es seguro es que contarÃ©is con unos cuantos momentos de tranquilidad o aburrimiento entre medias. Para salvar todos esos momentos llegan los mejores juegos Android de la semana, una secciÃ³n en la que recopilamos toda la semana en lo que a juegos se refiere y ademÃ¡s os damos unos cuantos lanzamientos por si no habÃ©is tenido suficiente. Â¡Comenzamos!', 1004, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 6, 6, '2014-07-11', '2014-07-11'),
(38, 'Dog House', 'Cartoon Network lleva una buena sucesiÃ³n de juegos lanzados en Google Play, y con Monsters Ate My Birthday parece que quieren reafirmar esa tendencia: muchos monstruos, tarta, superpoderes, una aventura Ã©pica llena de rutas secretasâ€¦ si querÃ©is diversiÃ³n mÃ¡gica llena de pasteles, habÃ©is encontrado vuestro juego ideal sin lugar a dudas. Lo tenÃ©is disponible en Google Play al precio de 3.66â‚¬, algo caro, pero no han vuelto a cometer el error de combinarlo con pagos dentro de la aplicaciÃ³n.', 145, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 6, 6, '2014-07-11', '2014-07-11'),
(39, 'Fracking Big TV', 'Team 17 es conocido entre nosotros por el enorme trabajo que han hecho en su prestigioso Worms, pero eso no significa que sea lo Ãºnico que han hecho en todos los aÃ±os que llevan en activo. Fue en 1993 cuando lanzaron Superfrog, un juego que quedÃ³ sepultado bajo el Ã©xito de Worms dos aÃ±os despuÃ©s, pero tuvo sus seguidores que disfrutarÃ¡n mucho de la remasterizaciÃ³n HD que ha lanzado el equipo en Android: 24 niveles en seis mundos diferentes, ademÃ¡s de grÃ¡ficos y controles mejorados y adaptados. Lo tenÃ©is al suculento precio de 2.49â‚¬ en Google Play.', 699, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 5, 6, '2014-07-11', '2014-07-11'),
(40, 'Giant Desk', 'Noodlecake Studios es la casa que da origen a otro juego que vale la pena probarlo: en Wayward Souls tendremos que combatir en mazmorras que se generan de manera aleatoria contra monstruos y magia, de tal forma que tendremos partidas rÃ¡pidas que nunca serÃ¡n iguales (al estilo The Binding of Issac, por ejemplo) y que nos harÃ¡n repetir una y otra vez. Tiene una dificultad elevada, para que nos vamos a engaÃ±ar, pero es uno de estos juegos que merece mucho la pena jugarlo. QuizÃ¡s el precio sea lo Ãºnico que eche atrÃ¡s a muchos, 3.43â‚¬, pero es muy probable que lo veamos en un prÃ³ximo Humble Bundle teniendo en cuenta la trayectoria del estudio.', 206, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 3, 6, '2014-07-11', '2014-07-11'),
(42, 'Superbatcomputer', 'Con el mirroring podemos transmitir todo lo que aparece en el mÃ³vil en la televisiÃ³n; sonido, juegos y pelÃ­culas incluidos. Sin embargo muchos se han quedado fuera de poder disfrutar de una de las opciones mÃ¡s Ãºtiles. Para solucionar esto estÃ¡n los desarrolladores de XDA, que hoy nos trae la posibilidad de activar el mirroring en casi cualquier Android con KitKat, eso sÃ­ tiene una pega y es que necesitaremos tener permisos root en nuestro dispositivo.', 34563, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 2, 6, '2014-07-11', '2014-07-11'),
(43, 'Autodresser', 'La app ha sido modificada para funcionar en mÃ¡s terminales. Se ha comprobado que funciona en ASUS PadFone 2, Sony Xperia Z2, Sony Xperia ZL, Sony Z Ultra, HTC One M8 (Including GPE), Motorola Moto X, Samsung Note 8 Tab, Samsung Note Pro 12.2 Tab, Nexus 7 2012, QHD Find 7, LG GPad 8.3 aunque no lo han conseguido en el Galaxy S3 o el Note 2.', 5000, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 4, 6, '2014-07-11', '2014-07-11'),
(45, 'Batmobile', 'An unlikely pair, young Kate Walker and old, eccentric Hans Voralberg now set off on a journey together: in search of the last of the fabled Syberian mammoths at the heart of a long and forgotten universe. The surreal quest Hans began alone several years ago will come to a final close as he and Kate face obstacles far more dangerous than ever before, testing their courage and determination.', 300000, 0, 0, 'batmobile.jpg', 0, 0, 0, 0, 0, 0, 0, 2, 6, '2014-07-22', '2014-08-21'),
(46, 'Cellar', 'You are your spells! The Lichdom: Battlemage spell crafting system offers an enormous range of customization. Every Mage is the product of crafted magic that reflects the individual''s play style. Whether you prefer to target your foes from a safe distance, wade into combat and unleash your power at point-blank range, or pit your enemies against each other, endless spell customization lets you become the Mage you want to be. ', 5000, 0, 0, 'Extra_46', -1, 0, 1, 1, 0, 0, 0, 5, 6, '2014-07-22', '2014-08-21'),
(47, 'MehrgrÃ¼ndung', 'The display assembly is held in place by a large amount of adhesive on the underside of the large copper ESD shield. In the next few steps, you will be using a plastic spudger to release this adhesive.\r\nWork carefully and slowly, making sure to not break the I/O data cable.', 5000, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 1, 6, '2014-08-04', '2014-08-04'),
(48, 'Erdbebenzone', 'Use the flat end of a spudger to carefully flip up the retaining flaps on the digitizer ribbon cable ZIF sockets.\r\nMake sure you are flipping up the retaining flaps, not the sockets themselves.\r\nUse the tip of a spudger to pull the digitizer ribbon cable straight out of its socket', 3000, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 2, 6, '2014-08-04', '2014-08-04'),
(49, 'Eigenleistung AuÃŸennanlage', 'Peel the upper piece of black adhesive tape completely up off the Nexus 7.\r\nSimilarly, peel the lower piece of black adhesive tape, but only as far as the copper strip.\r\nIt is helpful to fold this piece of tape back on itself to keep it out of the way.\r\nWhilst pulling the tape, be sure that the metal shield does not lift up. Hold the shield in place, and if it lifts up, re-seat it in the spring clips around the perimeter of the shielded area.', 5000, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(50, 'Eigenleistung Maler-/Bodenarbeiten', 'Gently insert a plastic opening tool near the top of the Nexus 7 between the rear panel and the front panel assembly.\r\nCarefully run the plastic opening tool along the top edge to pry the rear panel away from the front panel assembly of the Nexus 7', 5000, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 3, 6, '2014-08-04', '2014-08-04'),
(51, 'Garage 6 m', 'Web Components usher in a new era of web development based on encapsulated and interoperable custom elements that extend HTML itself. Built atop these new standards, Polymer makes it easier and faster to create anything from a button to a complete application across desktop, mobile, and beyond.', 8000, 0, 0, '', 0, 0, 0, 0, 1, 0, 1, 6, 6, '2014-08-04', '2014-08-04'),
(52, 'HausanschluÃŸkosten', 'The latest Linux GPU benchmarks at Phoronix for your viewing pleasure are looking at the OpenCL compute performance with the latest AMD and NVIDIA binary blobs while also marking down the performance efficiency and overall system power consumption.', 9000, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(53, 'Baustrom- und Bauwasseranschluss', 'The Linux 3.16 kernel could be released as soon as today with its development having calmed down but if you''ve refrained from reading up on this new kernel, here''s the rundown on the new features and capabilities of this 2014 late-summer kernel debut.', 500, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(54, 'Lageplan, Genehmigungskosten', 'Belkin revived the Linksys WRT54G in a new 802.11ac model earlier this year and one of its selling points has been the OpenWRT support as what made the WRT54G legendary. However, OpenWRT developers and fans are yet to be satisfied by this new router.', 4400, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(55, 'cool Garage ', 'hen there is something tricky, which we should think about: if they want to do a garage with babsis dad, then the factor of this external extra will be set to zero (but it must remain in the list!) and a bought normal extra need to be added to the list above ... question is whether we can easily do this automatically ....\r\nhe salesperson only enters the desired amount of additional square meters, the price in the DB can be simply the price per square meter. then the system need to check how many floors (and possibly basement) and calculate the factor accordingly (e.g. 1000â‚¬ per square meter, 3 floors, 10 additional square meter -> factor 30 and price ', 5000, 0, 0, '', 0, 0, 0, 0, 1, 0, 0, 6, 6, '2014-08-04', '2014-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `home_pictures`
--

CREATE TABLE IF NOT EXISTS `home_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `home_pictures`
--

INSERT INTO `home_pictures` (`id`, `picture`, `title`, `description`, `user_id`, `created`, `modified`) VALUES
(5, 'home3.jpg', 'Gugen', 'Bilbao', 4, '2014-07-02', '2014-07-02'),
(7, 'home2.jpg', 'weird house', 'lkdvn', 4, '2014-07-02', '2014-07-02'),
(9, 'home1.png', 'Gehry something', 'png yes!', 4, '2014-07-02', '2014-07-02'),
(11, 'homemanor.jpg', 'Cool Manor', 'Use the <paper-dialog> element to create a dialog. Set a title on a dialog using the heading published property.\r\n\r\nYou can use any kind of children inside the dialog. For action buttons, add the dismissive or affirmative attributes to place the controls (typically buttons) at the bottom of the dialog:', 6, '2014-07-22', '2014-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `size` float NOT NULL,
  `floors` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `description`, `size`, `floors`, `price`, `type`, `user_id`, `created`, `modified`) VALUES
(3, 'Wayne''s Manor', 'Beautiful palace. For a long time it has been home for the illustrious Wayne familie\r\n\r\nNote: Batcave not included', 2000, 2, 1234570000, 2, 6, '2014-07-01', '2014-07-01'),
(4, 'Batcave', 'HQ of Batman\r\n\r\nNote: Waynes Manor not included', 1000, 2, 2147480000, 3, 3, '2014-07-01', '2014-07-01'),
(5, 'Stadt 120', 'GenieÃŸen Sie das Zusammensein mit Ihren Lieben im grÃ¤umigen Wohnzimmer. GroÃŸe Fenster geben Helligkeit und freie Sicht nach drauÃŸen, in Ihren Garten. Damit Sie den Tag mit einem gemÃ¼tlichen FrÃ¼hstÃ¼ck beginnen kÃ¶nnen, findet in der KÃ¼che auch eine gemÃ¼tliche Essecke Platz. Ein Hauswirtschafts- und ein Abstellraum runden Ihr REH im Ergeschoss ab. Im OG erwarten Sie drei schÃ¶ne Zimmer, die sich sowohl als Schlafzimmer, Kinder-, oder GÃ¤ste- eignen. Platz zum Spielen, Ausruhen oder Arbeiten ist fÃ¼r alle vorhanden. Das Bad wirkt, wie die gesamte obere Etage, hell und freundlich. Im DG ist ein Arbeitszimmer. Die dargestellten Preise beziehen sich auf ein REH. Auf Wunsch ist dieses Haus auch mit Keller sowie als EnergieSparhaus erhÃ¤ltlich	', 120, 0, 200000, 1, 2, '2014-08-20', '2014-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `house_pictures`
--

CREATE TABLE IF NOT EXISTS `house_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(200) NOT NULL,
  `type_flag` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `house_pictures`
--

INSERT INTO `house_pictures` (`id`, `name`, `description`, `picture`, `type_flag`, `house_id`, `user_id`, `created`, `modified`) VALUES
(7, 'Bat', 'sdnj', 'batcave.jpg', 0, 4, 2, '2014-07-03', '2014-07-03'),
(8, 'Batcave entry', 'sefsf', 'batcave2.jpg', 0, 4, 2, '2014-07-03', '2014-07-03'),
(9, 'pool', 'ksjdfnsn', 'cool.jpg', 0, 3, 2, '2014-07-03', '2014-07-03'),
(10, 'Front', 'sdgfgdfrgdf', 'wayne.jpg', 0, 3, 2, '2014-07-03', '2014-07-03'),
(11, 'first-floor', '', 'floorplan1-wayneManor.jpg', 2, 3, 6, '2014-07-07', '2014-07-07'),
(19, 'Basement', 'I: send the file inline to the browser. The plug-in is used if available. The name given by filename is used when one selects the "Save as" option on the link generating the PDF.\r\nD: send to the browser and force a file download with the name given by filename.\r\nF: save to a local file with the name given by filename (may include a path).\r\nS: return the document as a string. filename is ignored.', 'basement manor.jpg', -1, 3, 0, '2014-08-18', '2014-08-18'),
(30, 'Living room', 'A lil old fashioned', '3_LivingRoom.jpg', 0, 3, 6, '2014-08-19', '2014-08-19'),
(31, 'bedroom', 'scary', '3_castle-leslie-the-green-bedroom.jpg', 0, 3, 6, '2014-08-19', '2014-08-19'),
(32, 'Eingang', '', '5_stadt-120-eingang.png', 0, 5, 2, '2014-08-20', '2014-08-20'),
(33, 'Garten', '', '5_stadt-120-garten.png', 0, 5, 2, '2014-08-20', '2014-08-20'),
(37, 'Erdgeschoss', '', '5_stadt-120-EG.png', 1, 5, 2, '2014-08-20', '2014-08-20'),
(38, 'Dachgeschoss', '', '5_stadt-120-DG.png', 2, 5, 2, '2014-08-20', '2014-08-20'),
(39, 'Keller', '', '5_stadt-120-KG.png', -1, 5, 2, '2014-08-20', '2014-08-20'),
(40, 'Seitenschnitt', '', '5_stadt-120-Schnitt.png', 5, 5, 2, '2014-08-20', '2014-08-20');

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

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE IF NOT EXISTS `lands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `land_size` float NOT NULL,
  `land_price_per_m2` float NOT NULL,
  `dev_size` float NOT NULL,
  `dev_cost_per_m2` float NOT NULL,
  `notary_cost` float NOT NULL,
  `land_agent_cost` float NOT NULL,
  `land_tax` float NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lands`
--

INSERT INTO `lands` (`id`, `name`, `notes`, `land_size`, `land_price_per_m2`, `dev_size`, `dev_cost_per_m2`, `notary_cost`, `land_agent_cost`, `land_tax`, `customer_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Terminus', 'Desertic, no natural resources', 40000000, 1, 888888, 2, 30, 20, 21, 0, 3, '2014-07-02', '2014-07-02'),
(2, 'Hyperion', 'Careful with the Shriek!', 2147480000, 3, 1234230, 2, 25, 23, 21, 0, 3, '2014-07-02', '2014-07-02'),
(4, 'Alderaan', 'Set your house on an asteroid!', 3000, 1, 600, 30, 1, 1, 0, 0, 3, '2014-07-02', '2014-07-02'),
(5, 'land for cus a2', '', 234, 120, 123, 123, 2, 3, 21, 2, 3, '2014-07-02', '2014-07-02'),
(6, 'land cus b', '', 4567, 456789, 5678, 5678, 5, 6, 21, 3, 4, '2014-07-04', '2014-07-04'),
(7, 'land cus b2', '', 5678, 567, 567, 5678, 3, 7, 21, 4, 4, '2014-07-04', '2014-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `summary` varchar(200) NOT NULL,
  `bank_receipt` varchar(200) NOT NULL,
  `contract` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `land_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `default_house_picture_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `notes`, `summary`, `bank_receipt`, `contract`, `customer_id`, `land_id`, `house_id`, `default_house_picture_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Prop for cus b 1', '', '', 'files/BankReceipt2.pdf', '', 3, 4, 3, '', 4, '2014-07-04', '2014-07-04'),
(4, 'Very expensive house', 'Tooooooooooooo expensive', '', 'files/BankReceipt4.pdf', '', 6, 2, 5, '32', 6, '2014-07-07', '2014-08-19'),
(5, 'Secret Lair', 'Cool', '', 'files/BankReceipt5.pdf', '', 6, 2, 4, '', 6, '2014-07-07', '2014-07-07'),
(11, 'first proposal', 'so, i spoke with Babsis Dad yesterday, but first to your comments:\r\n\r\nButtons: i mean the edit and delete buttons look gread, altough here is already one comment from Babsis Dad: delete must be red button (should be no problem)\r\n\r\nUsers: I donâ€™t really care what we do here ... we can do it as a tabular, but also there the actions should be buttons\r\n\r\nadd many extras: no it will stay one column, there will be max 6 categories and folded in it fits very well on one page with the add button at the bottom\r\n\r\nanyway, letâ€™s get to the important stuff:\r\n\r\n(we might need to skype also since there are some details which i''m not sure if i can perfectly describe them in two sentences)\r\n\r\nokay, so regarding the external extras: (maybe also open the excel sheet for comparison) there are 8 entries and they need to always added with default values when a proposal is created! its apparently important and i can also try to explain this to you on skype', '', 'files/BankReceipt11.pdf', '', 5, 2, 3, '31', 6, '2014-08-04', '2014-08-04'),
(12, 'Empty proposal', 'PortÃ¡tiles para jugadores, ese complicado equilibrio entre potencia y autonomÃ­a - si es que quieres moverlo -, para conseguir echar andar los juegos de Ãºltima generaciÃ³n, o los que siguen de moda, que normalmente tambiÃ©n piden una buena mÃ¡quina. AquÃ­ nos encontramos casi sin pensarlo con Alienware.\r\n\r\nLa compaÃ±Ã­a perteneciente a Dell nos acaba de presentar un nuevo modelo de 13 pulgadas, con unos ingredientes bastante interesantes, con los que intentarÃ¡n que olvidemos a aquel pequeÃ±o Alienware M11x, que dejÃ³ de venderse en 2012.\r\n\r\nEl Dell Alienware 13 es una vuelta a la misma idea, un portÃ¡til lo mÃ¡s compacto posible, sin perder capacidades para jugar. Se situarÃ­a un escalÃ³n por debajo del Dell Alienware 14, que analizamos el aÃ±o pasado. En la competencia tambiÃ©n nos tenemos que ir a ', '', 'files/BankReceipt12.pdf', '', 4, 0, 0, '', 6, '2014-08-08', '2014-08-08'),
(30, 'aaaaaaaaa', '', '', '', '', 5, 0, 5, '32', 6, '2014-08-21', '2014-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `surname`, `phone`, `email`, `created`, `modified`) VALUES
(2, 'owner', '046d8cbb16e26dba35ddced9d4daa7b84468ef19', 1, 'O', 'wner', 1234689, 'ra@sfh.com', '2014-07-01', '2014-07-01'),
(3, 'salea', '5a03b6bf4af5c6a37fdc095fd22269d415cc3943', 2, 'sale', 'a', 3467890, 'fghjkl@ghjk.de', '2014-07-01', '2014-07-01'),
(4, 'saleb', '0afabdee6502c9fcefea4332883535d6e5c50cc0', 2, 'sale', 'b', 234567890, 'dfghjkl@dfghjkl.es', '2014-07-01', '2014-07-01'),
(5, 'over', '6d0d62f180b14912b182b45e49fe55fbab9be1b6', 3, 'ov', 'er', 9876543, 'vjnhwhoiu@asuhcn.cad', '2014-07-01', '2014-07-01'),
(6, 'elgatil', '3bdbc7fecbbed14dc303ef207f84b63dff5649fc', 0, 'Ricardo', 'Gomez', 345678, 'elgatil@gmail.com', '2014-07-01', '2014-07-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
