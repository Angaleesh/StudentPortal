-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2023 at 04:20 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `u_name`, `password`) VALUES
(1, 'Admin', '123'),
(2, 'Admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `department`) VALUES
(1, 'Bachelor of Computer Application', 'School of computer Studies'),
(2, 'B com', 'Commerce'),
(3, 'Bsc CS', 'School of computer studies');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int NOT NULL AUTO_INCREMENT,
  `img_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img_data` varchar(100) NOT NULL,
  `s_id` int NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `result_id` int NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `sem_id` int NOT NULL,
  `s_mark` int NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `sub_name`, `reg_id`, `sem_id`, `s_mark`) VALUES
(1, 'PHP & MySQL', '1U20CA004', 6, 90),
(2, 'PHP & MySQL', '1U20CA004', 6, 94),
(3, '', '1U20CA004', 6, 90),
(4, '', '1U20CA004', 6, 94);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `reg_id` varchar(9) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `dept` varchar(50) NOT NULL,
  `stream` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `Address` varchar(100) NOT NULL,
  `m_number` bigint NOT NULL,
  `email_id` varchar(53) NOT NULL,
  `password` varchar(16) NOT NULL,
  `class_id` int NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `reg_id` (`reg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `reg_id`, `s_name`, `f_name`, `dob`, `dept`, `stream`, `year`, `Address`, `m_number`, `email_id`, `password`, `class_id`) VALUES
(1, '1U20CA004', 'Angaleeshwar Gandhi B', 'Boominathan', '2002-10-02', 'School of Computer Studies', 'Bachelor of Computer Application', 2020, '12/1,parapalayam,Tirupur - 641604', 7397687841, 'ag@angaleesh@gmail.com', '7397687841', 1),
(3, '1U20CA007', 'AAA', 'abc', '0000-00-00', '', 'Bachelor of Computer Application', 2020, '', 0, '', '1111', 1),
(4, '1U20CA023', 'Gokulvasan K', 'Kuberarajan R', '0000-00-00', '', 'Bachelor of Computer Application', 2020, '', 8270393761, '', '23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) NOT NULL,
  `sem_id` int NOT NULL,
  `class_id` int NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sem_id`, `class_id`) VALUES
(1, 'PHP & MySQL', 6, 1),
(2, 'Python', 6, 1),
(3, 'Cyber Security', 6, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
