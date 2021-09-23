-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 11:05 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classified`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE IF NOT EXISTS `category_detail` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_display_name` varchar(50) NOT NULL,
  `category_type` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`cid`, `category_name`, `category_display_name`, `category_type`, `parent_id`) VALUES
(1, '2nd Hand Books', '2nd Hand Books', 'Primary', 0),
(2, 'School Books', 'School Books', 'Secondary', 1),
(3, 'Competitive Exams', 'Competitive Exams', 'Secondary', 1),
(4, 'Under Graduation', 'Under Graduation', 'Secondary', 1),
(5, 'Post Graduation', 'Post Graduation', 'Secondary', 1),
(6, 'Magazines', 'Magazines', 'Secondary', 1),
(7, 'Vehicles', 'Vehicles', 'Primary', 0),
(8, 'Cars', 'Cars', 'Secondary', 7),
(10, 'Motor Cycles', 'Motor Cycles', 'Secondary', 7),
(11, 'boats ships', 'boats ships', 'Secondary', 7),
(12, 'Real Estate', 'Real Estate', 'Primary', 0),
(13, 'sdasda', 'Houses-Apartments For Sale', 'Secondary', 12),
(14, 'Houses-Apartments For Rent', 'Houses-Apartments For Rent', 'Secondary', 12),
(15, 'Rooms For Rent Shared', 'Rooms For Rent Shared', 'Secondary', 12),
(16, 'Land', 'Land', 'Secondary', 12),
(17, 'Office Commercial Space', 'Office Commercial Space', 'Secondary', 12),
(18, 'Furniture', 'Furniture', 'Primary', 0),
(19, 'Sofa Sets', 'Sofa Sets', 'Secondary', 18),
(20, 'Dinning Table', 'Dinning Table', 'Secondary', 18),
(21, 'Electronics', 'Electronics', 'Primary', 0),
(22, 'TV', 'Telivision', 'Secondary', 21),
(23, 'Mobiles', 'Mobiles', 'Secondary', 21),
(24, 'Laptops', 'Laptops', 'Secondary', 21);

-- --------------------------------------------------------

--
-- Table structure for table `contact_detail`
--

CREATE TABLE IF NOT EXISTS `contact_detail` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `uemail` varchar(60) NOT NULL,
  `usubject` varchar(40) NOT NULL,
  `umessage` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_detail`
--

INSERT INTO `contact_detail` (`uid`, `uname`, `uemail`, `usubject`, `umessage`) VALUES
(1, 'shubham', 'shubham0026@gmail.com', 'Interface', 'Being an administrator i admire the work done by the developer......');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`uid`, `name`, `email`, `title`, `comment`) VALUES
(1, 'shubham sharma', 'www.shubham0026@gmail.com', 'books', 'awesome books u have.....iam loving it!!!!'),
(2, 'rakesh', 'rakesh026@gmail.com', 'CSAT', 'wow what a book');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat_id` int(11) NOT NULL,
  `product_title` varchar(40) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `image_path` varchar(60) NOT NULL,
  `country` varchar(60) NOT NULL,
  `region` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `city_area` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `publish_date` date NOT NULL,
  `contact_no` int(20) NOT NULL,
  `publisher_name` varchar(40) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_cat_id`, `product_title`, `product_price`, `product_description`, `image_path`, `country`, `region`, `city`, `city_area`, `address`, `publish_date`, `contact_no`, `publisher_name`) VALUES
(1, 3, 'CSAT', 500, 'what a book wow?', '9789384905095.jpg', 'India', 'Chhattisgarh (CG)', 'bhilai', 'bhilai', 'quarter-18-A,street-6,sector-2,bhilai,chhattisgarh', '2016-07-04', 984594545, 'shubham'),
(3, 3, 'APTITUDE', 200, 'NICE WAY TO INCREASE UR APTI SKILLS!!', '9789384905323.jpg', 'India', 'New Delhi (DL)', 'CHANDNI CHOWK', 'SABJEE MANDI', 'NEAR RAJKOT SABJI MANDI', '2016-07-04', 32423424, 'shoaib'),
(4, 3, 'Tricky Maths', 300, 'PROVIDES AN EASY GUIDE TO NURTURE YOUR POTENTIAL....', 'Tricky-Mathematics-Hindi-E-Books-SDL957532725-1-d21e5.jpg', 'India', 'Tamil Nadu (TN)', 'KAKINADA', 'KAJANPALI', 'NEAR SAROJIT TEMPLE', '2016-07-04', 213231321, 'dennis'),
(5, 3, 'CPMT', 600, 'CPMT BOOK', 'images (2).jpg', 'India', 'Goa (GA)', 'PANJI', 'PANJI', 'NEAR BEACH', '2016-07-04', 213213312, 'tanay'),
(6, 3, 'Hindi', 200, 'samanya hindi....', 'competitive-exam-general-hindi-book-500x500.jpg', 'India', 'Punjab (PB)', 'jalandhar', 'jalandhar', 'near golden temple', '2016-07-04', 76867868, 'shivam'),
(10, 2, 'GENERAL ENGLISH', 322, 'WHAT A BOOK!!!', 'images.jpg', 'India', 'Chhattisgarh (CG)', 'bhilai', 'bhilai', 'near sarabjit nagar', '2016-07-08', 2147483647, 'harry'),
(11, 16, 'asdadsa', 221, 'dsadsad', 'Chrysanthemum.jpg', 'India', 'Maharashtra (MH)', 'sdadas', 'sdsad', 'dsadas', '2016-07-10', 21313211, 'harry'),
(12, 16, 'xzxsdssd', 1213, 'adsad', 'Desert.jpg', 'India', 'Chhattisgarh (CG)', 'sdada', 'sdasda', '131321', '2016-07-10', 23243, 'harry'),
(13, 16, 'ksdaaks', 454, 'slakldka', 'Hydrangeas.jpg', 'India', 'Gujarat (GJ)', 'asdasd', 'dsadsa', 'sadsadas', '2016-07-10', 231123212, 'harry'),
(14, 16, 'sdsad', 212, 'dsadada', 'Koala.jpg', 'India', 'Rajasthan (RJ)', 'sadad', 'adasd', 'asdaddsad', '2016-07-10', 21312, 'harry'),
(15, 14, 'sadada', 9898, 'dasadsadasds', 'Lighthouse.jpg', 'India', 'Punjab (PB)', 'ddads', 'sdasdas', 'kasdaldad', '2016-07-10', 342423423, 'harry'),
(16, 16, 'apS', 3545, 'sjajdjaks', 'Jellyfish.jpg', 'India', 'New Delhi (DL)', 'sadad', 'asdsad', 'hgkglkl', '2016-07-10', 32423423, 'harry'),
(17, 16, 'sadasda', 32234, 'sadasdas', 'Tulips.jpg', 'India', 'Punjab (PB)', 'dfdsfs', 'adadsadda', 'sadasda', '2016-07-10', 5464646, 'harry');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `custname` varchar(20) NOT NULL,
  `custmail` varchar(50) NOT NULL,
  `custpassword` varchar(20) NOT NULL,
  `regdate` date NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `security_ques` text NOT NULL,
  `security_answer` varchar(40) NOT NULL,
  `profile_pic` text NOT NULL,
  `cell_phone` int(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `country` varchar(60) NOT NULL,
  `region` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `city_area` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `website` varchar(40) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`cid`, `custname`, `custmail`, `custpassword`, `regdate`, `usertype`, `security_ques`, `security_answer`, `profile_pic`, `cell_phone`, `phone`, `country`, `region`, `city`, `city_area`, `address`, `website`, `description`) VALUES
(1, 'harry', 'harry0026@gmail.com', 'h', '2016-06-28', 'user', 'Your mother name?', 'mohini', 'P_20150706_183538_NT.jpg', 0, 0, '', '', '', '', '', '', ''),
(2, 'shoaib', 'shoaib0026@gmail.com', 's', '2016-06-28', 'user', 'In what city or town does your nearest sibling live?', 'bhilai', 'default.gif', 0, 0, '', '', '', '', '', '', ''),
(3, 'dennis', 'dennis0026@gmail.com', 'd', '2016-06-28', 'user', 'Your mother name?', 'mufti', '', 0, 0, '', '', '', '', '', '', ''),
(4, 'tanay', 'tanay0026@gmail.com', 't', '2016-06-28', 'user', 'Your mother name?', 'kamla', '', 0, 0, '', '', '', '', '', '', ''),
(5, 'shubham', 'shubham0026@gmail.com', 'sh', '2016-06-28', 'admin', 'Your mother name?', 'kusum', 'P_20160403_003912.jpg', 0, 0, '', '', '', '', '', '', ''),
(6, 'neha', 'neha0026@gmail.com', 'n', '2016-06-28', 'user', 'Your mother name?', 'ragwani', '', 0, 0, '', '', '', '', '', '', ''),
(7, 'raj', 'raj0026@gmail.com', 'rj', '2016-06-28', 'user', 'What time of the day were you born? (hh:mm)', '12:30', '', 0, 0, '', '', '', '', '', '', ''),
(8, 'shivam', 'shivam0026@gmail.com', 'shiv', '2016-06-28', 'user', 'Your pet name?', 'tomy', '', 0, 0, '', '', '', '', '', '', ''),
(9, 'jahngir', 'jahngir0026@gmail.com', 'j', '2016-06-28', 'user', 'What was the name of your elementary / primary school?', 'dav', '', 0, 0, '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
