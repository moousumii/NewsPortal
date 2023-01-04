-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 11:21 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shuvosokal`
--
/*CREATE DATABASE IF NOT EXISTS `shuvosokal` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `shuvosokal`;*/

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(120) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `forgot_password_verify` varchar(250) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `forgot_password_verify`, `status`) VALUES
(7, 'admin', 'admin', 'admin', 'admin@flammabd.com', '111111', '', 1),
(6, 'holy', 'holy', 'Holy', 'holysust@yahoo.com', '222222', '2628d806803605905ae5b4ac33f18b98', 0),
(9, 'neela', 'mahjabeen', 'sgg', 'neela@flammabd.com', '111111', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_title` varchar(255) NOT NULL,
  `ads_url` varchar(255) NOT NULL,
  `ads_type` tinyint(4) DEFAULT NULL,
  `ads_image` varchar(100) DEFAULT NULL,
  `ads_code` text,
  `ads_position` varchar(10) NOT NULL,
  `ads_sort` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_title`, `ads_url`, `ads_type`, `ads_image`, `ads_code`, `ads_position`, `ads_sort`, `status`, `start_date`, `expire_date`) VALUES
(4, 'ideal college', 'http://sylhetidealcollege.edu.bd/', NULL, '1835387265_1505031219.png', NULL, '6', 0, 0, '2017-08-29', '2017-08-31'),
(6, 'sylhet excelsior', 'http://www.sylhetexcelsior.com', NULL, '2014616703_1503991510.gif', NULL, '2', 0, 1, '2017-08-29', '2017-08-31'),
(7, 'savlon', 'http://www.savlon.com', NULL, '673452899_1505031802.gif', NULL, '6', 0, 1, '2017-09-10', '2017-09-27'),
(8, 'example', 'http://www.google.com', NULL, '1759512582_1514436927.jpg', NULL, '5', 0, NULL, '2017-12-14', '2017-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `ads_position`
--

DROP TABLE IF EXISTS `ads_position`;
CREATE TABLE IF NOT EXISTS `ads_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(5) NOT NULL,
  `position_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ads_position`
--

INSERT INTO `ads_position` (`id`, `position_id`, `position_name`) VALUES
(1, 1, 'Top Ad'),
(2, 2, 'Home Page Ad: Top'),
(3, 3, 'Home Page Ad: Inner'),
(4, 4, 'Home Page Ad: Bottom'),
(5, 5, 'Right Page Ad: Top'),
(6, 6, 'Right Page Ad: Inner'),
(7, 7, 'Footer Ad');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_status` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(5) NOT NULL,
  `view` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `title`, `blog_description`, `blog_image`, `blog_status`, `date`, `time`, `view`, `comment`, `language_id`) VALUES
(8, 7, 'sadxasdS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', 1, '2011-11-03', '', 8, 0, 1),
(2, 0, 'ghjghfg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 1, '2011-11-03', '', 1, 0, 2),
(3, 7, 'yhjkkhj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of ', '', 1, '2011-11-03', '', 5, 0, 1),
(4, 7, 'werwrwe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', 1, '2011-11-03', '', 4, 0, 2),
(6, 7, 'rajib up to date', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', 1, '2011-11-03', '', 5, 0, 2),
(7, 7, 'asass', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', 1, '2011-11-03', '', 4, 0, 1),
(15, 13, 'test', 'Lorem Ipsum is simply dummy text of the printing and  typesetting industry. Lorem Ipsum has been the industry''s <br />', '', 1, '2011-11-03', '', 5, 0, 2),
(16, 14, 'this post by misba bai', 'Lorem Ipsum is simply dummy text of the printing and  typesetting industry. Lorem Ipsum has been the industry''s standard dummy  text ever since the 1500s, when an unknown printer took a galley of  type and scrambled it to make a type specimen book. It has survived not  only five centuries, but also the leap into electronic typesetting,  remaining essentially unchanged.', '', 1, '2011-11-03', '', 18, 0, 2),
(17, 13, 'fgdfgdf', 'gdfgdfgdfgdfg', '', 1, '0000-00-00', '', 30, 0, 0),
(14, 13, 'test for this', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', 1, '2011-11-03', '', 16, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `user_id`, `comment`) VALUES
(1, 17, 13, 'dfdgdfgdfg'),
(2, 17, 14, 'sdasdasasd'),
(3, 17, 14, 'dsasdadszfdsfsdf dfdf '),
(4, 16, 13, 'this is test');

-- --------------------------------------------------------

--
-- Table structure for table `blog_header_image`
--

DROP TABLE IF EXISTS `blog_header_image`;
CREATE TABLE IF NOT EXISTS `blog_header_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog_header_image`
--

INSERT INTO `blog_header_image` (`id`, `image`, `status`) VALUES
(2, '1942232621_1320069244.jpg', 0),
(4, '769564380_1320070061.jpg', 0),
(5, '696919858_1320070101.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ef2269c798c5dee741617513ece12232', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (', 1514436796, 'a:1:{s:8:"language";s:1:"1";}'),
('959b5ad119f6320c58b2155669984f23', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (', 1510990865, 'a:1:{s:8:"language";s:1:"1";}'),
('16fc9a2f75b62e9e1959ca05644b131c', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; rv:50.0) Gecko/20100', 1506241111, 'a:1:{s:8:"language";s:1:"1";}'),
('afa9a092a8a5e47bff6907d83992020e', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; rv:50.0) Gecko/20100', 1506237983, 'a:1:{s:8:"language";s:1:"1";}'),
('4375bff7abd7605a870ac5066690c7c0', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 1514438785, 'a:1:{s:8:"language";s:1:"1";}'),
('c781c72dbf5c73d759a0244514d38e2e', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 1514701045, 'a:1:{s:8:"language";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `address`, `subject`, `message`, `date`) VALUES
(1, '', '', '', 'asdasdasd', '', '', '2011-11-03 05:00:00'),
(2, '', '', '', 'sadasd', '', '', '2011-11-03 05:00:00'),
(3, '', '', '', 'asdas', '', '', '2011-11-03 05:00:00'),
(4, '', '', '', 'sdadad', '', '', '2011-11-03 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallary_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`image_id`, `gallary_id`, `image_name`) VALUES
(32, 10, '35869152_1316697238.jpg'),
(31, 10, '928930897_1316697237.jpg'),
(30, 10, '1631003062_1316697236.jpg'),
(38, 10, '277909299_1317113004.jpg'),
(37, 10, '1648371595_1316752436.jpg'),
(39, 15, '984313036_1320132263.gif'),
(40, 15, '1165435572_1320132263.jpg'),
(41, 16, '1607655630_1320139478.jpg'),
(42, 16, '1186974926_1320139568.jpg'),
(43, 16, '364033890_1320139568.jpg'),
(44, 16, '1778886400_1320139568.jpg'),
(45, 17, '131481825_1500536869.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

DROP TABLE IF EXISTS `image_gallery`;
CREATE TABLE IF NOT EXISTS `image_gallery` (
  `gallary_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallary_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gallary_profile_image` varchar(255) NOT NULL,
  `gallary_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for active,0 for inactive',
  `create_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`gallary_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`gallary_id`, `gallary_title`, `gallary_profile_image`, `gallary_status`, `create_date`, `user_id`) VALUES
(10, 'Desctop Background', '1631003062_1316697236.jpg', 0, '2011-09-27', 7),
(11, 'Desctop Background', '', 0, '2011-09-22', 7),
(12, 'Desctop Background', '', 0, '2011-09-22', 7),
(16, 'Daina', '1607655630_1320139478.jpg', 1, '2011-11-01', 7),
(15, 'Test', '984313036_1320132263.gif', 1, '2011-11-01', 7),
(17, 'hjk', '131481825_1500536869.jpg', 1, '2017-07-20', 7);

-- --------------------------------------------------------

--
-- Table structure for table `image_position`
--

DROP TABLE IF EXISTS `image_position`;
CREATE TABLE IF NOT EXISTS `image_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_position` varchar(255) NOT NULL,
  `image_size` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `image_position`
--

INSERT INTO `image_position` (`id`, `image_position`, `image_size`, `status`) VALUES
(1, 'Left', '125 X 77', 1),
(2, 'Full View', '285 X 179', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `status`) VALUES
(1, 'Bangla', 1),
(2, 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `news_date` date NOT NULL,
  `news_time` varchar(10) NOT NULL,
  `news_add_date` date NOT NULL,
  `news_type_id` int(1) NOT NULL,
  `position_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `language_id` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `count_view` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `headline`, `description`, `reporter_id`, `news_date`, `news_time`, `news_add_date`, `news_type_id`, `position_id`, `region_id`, `language_id`, `image`, `status`, `count_view`) VALUES
(57, 22, 'সিসিলিতে জি৭ সম্মেলন  জলবায়ু পরিবর্তন নিয়ে শেষ দিনেও অচলাবস্থা', '<article itemtype="http://schema.org/Article" class="mb16 content jw_detail_content_holder" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; font-size: 20px; line-height: 26px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">\n<div itemprop="articleBody" style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden;">\n<p class="CAPTION" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">জি৭-এর সম্মেলনের দ্বিতীয় ও শেষ দিনে গতকাল শনিবার নেতাদের মধ্যে জলবায়ু পরিবর্তন মোকাবিলা বিষয়ে মতৈক্য হয়নি। কারণ, মার্কিন প্রেসিডেন্ট ডোনাল্ড ট্রাম্প বিষয়টি নিয়ে আরও পর্যালোচনার সিদ্ধান্ত নিয়েছেন। তবে বিত্তশালী দেশগুলোর ওই জোটের বাকি ছয় দেশের নেতারা প্যারিসে স্বাক্ষরিত জলবায়ু চুক্তি মেনে কার্বন নির্গমন কমাতে রাজি হয়েছেন।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">সম্মেলনে যুক্তরাষ্ট্রের প্রেসিডেন্ট ট্রাম্প তাঁর অবস্থানের কারণে &lsquo;একা হয়ে&rsquo; পড়েন। যুক্তরাষ্ট্রের অবস্থানের নিন্দা করে বিষয়টিকে &lsquo;ছয়ের বিরুদ্ধে এক&rsquo; আখ্যা দেয় জার্মানি।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">এর আগে ফ্রান্সের একজন কর্মকর্তা বলেন, জলবায়ু বিষয়ে যুক্তরাষ্ট্র তাদের নীতিগত অবস্থান পর্যালোচনা করে দেখছে, তাই জি৭-এর বাকি সদস্য দেশগুলো বৈশ্বিক জলবায়ু চুক্তির বিষয়ে নিজেদের অঙ্গীকার পুনর্ব্যক্ত করবে।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">ইতালির সিসিলি দ্বীপে অনুষ্ঠিত ওই সম্মেলনে জি৭-এর নেতারা গতকাল অভিবাসী সংকট নিয়ে আলোচনা করেন। আফ্রিকার দেশ তিউনিসিয়া, কেনিয়া, ইথিওপিয়া, নাইজার ও নাইজেরিয়ার প্রতিনিধিরাও গতকালে আলোচনায় অংশ নেন।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">ইউরোপমুখী অভিবাসীদের প্রবাহের ঝুঁকি সম্পর্কে আফ্রিকা ও বিশ্ববাসীর মনোযোগ আকর্ষণ করতেই ইতালি এবারের জি৭ সম্মেলন আয়োজনের সিদ্ধান্ত নেয়। মার্কিন প্রেসিডেন্ট ডোনাল্ড ট্রাম্প অভিবাসনের সুফল নিয়ে প্রচারিত একটি বিবৃতির বিরোধিতা করেন। বাণিজ্য এবং জলবায়ু পরিবর্তন বিষয়ে জি৭-এর বিবৃতির ভাষার বিরোধিতা করেছেন। তবে সন্ত্রাসবাদ দমনের বিষয়ে জি৭-এর নেতারা একটি সর্বসম্মত বিবৃতি দিয়েছেন। প্রেসিডেন্ট ট্রাম্পের প্রথম বিদেশ সফর গতকালই শেষ হয়।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">আফ্রিকার দেশগুলোর অর্থনীতির বিকাশে সহায়তা করতে বিশ্বের সম্পদশালী দেশগুলোকে উৎসাহ দিচ্ছে ইতালি। দেশটির আশা, তাদের এই চেষ্টা সফল হলে দরিদ্র আফ্রিকানরা সমুদ্রপথে জীবনের ঝুঁকি নিয়ে ইউরোপে যেতে বাধ্য হবে না। চলতি বছর এ পর্যন্ত দেড় হাজারের বেশি অভিবাসী ভূমধ্যসাগরে ডুবে প্রাণ হারিয়েছে বলে ধারণা করা হয়। তবে একজন কূটনীতিক রয়টার্সকে বলেছেন, ইতালির ওই উদ্যোগ সফল হয়নি।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word;">রয়টার্স জানায়, রাশিয়ার ব্যাপারেও জোটের নেতারা কোনো সিদ্ধান্তের ব্যাপারে সর্বসম্মত অবস্থানে পৌঁছাতে পারেননি। তবে বাণিজ্য নিয়ে আলোচনায় গতকাল অগ্রগতি হয়েছে। জি৭-এর নেতারা মার্কিন প্রেসিডেন্ট ট্রাম্পের বিরোধিতা সত্ত্বেও সংরক্ষণবাদের বিরুদ্ধে লড়াইয়ের প্রতিশ্রুতি দিয়েছেন।&nbsp;</p>\n</div>\n</article>\n<div class="more_and_tag" style="padding: 8px 0px; margin: 0px; outline: 0px; border-bottom: 1px solid #e2e2e2; line-height: 24px; overflow: hidden; color: #333333; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 14px; background-color: #f0f0ed;"></div>', 1, '2017-05-28', '', '0000-00-00', 0, 0, 0, 0, '', 1, 0),
(58, 22, 'কাশ্মীরে জঙ্গি নেতা শাবজার ভাট নিহত, বিক্ষোভ–কারফিউ', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ভারত-নিয়ন্ত্রিত কাশ্মীরে নিষিদ্ধঘোষিত জঙ্গি সংগঠন হিজবুল মুজাহিদিনের শীর্ষ নেতা শাবজার আহমেদ ভাট তাঁর এক সঙ্গীসহ নিহত হয়েছেন বলে ভারতীয় নিরাপত্তা বাহিনী জানিয়েছে। ভাট নিহত হওয়ার ঘটনায় শ্রীনগরে প্রবল বিক্ষোভ হয়েছে আজ শনিবার। বিক্ষোভকারীদের সঙ্গে নিরাপত্তা বাহিনীর সংঘর্ষে অন্তত একজন বেসামরিক নাগরিক নিহত হয়েছেন। খবর এএফপির।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গতকাল শুক্রবার ও আজ মিলে কাশ্মীর উপত্যকায় একাধিক ঘটনায় অন্তত আটজন সশস্ত্র অনুপ্রবেশকারী ও জঙ্গি নিহত হয়েছে বলে ভারতীয় নিরাপত্তা বাহিনী দাবি করেছে।<br style="padding: 0px; margin: 0px; outline: 0px;" />শ্রীনগর থেকে ৪০ কিলোমিটার দক্ষিণের ত্রাল এলাকায় আজ ভোরে ভারতীয় নিরাপত্তা বাহিনীর সঙ্গে সংঘর্ষে নিহত হন ভাট। স্থানীয় পুলিশপ্রধান শেস পাল ভায়েদ বলেন, &lsquo;হামলায় ভাট তাঁর এক সঙ্গীসহ নিহত হন। আমাদের অভিযান অব্যাহত আছে।&rsquo;&nbsp;<br style="padding: 0px; margin: 0px; outline: 0px;" />এ ঘটনার পর শ্রীনগরের বিভিন্ন এলাকায় কারফিউ জারি করা হয়েছে।<br style="padding: 0px; margin: 0px; outline: 0px;" />কাশ্মীরে হিজবুল মুজাহিদিন সবচেয়ে বড় বিচ্ছিন্নতাবাদী গোষ্ঠী। ১৯৮৯ সাল থেকে ভারত-নিয়ন্ত্রিত কাশ্মীরে এই গোষ্ঠীসহ বেশ কিছু বিচ্ছিন্নতাবাদী গোষ্ঠী ভারতীয় শাসনের বিরুদ্ধে লড়াই করছে। এই জঙ্গি সংগঠনটির শীর্ষ নেতা বুরহান ওয়ানি গত বছরের জুলাই মাসে বন্দুকযুদ্ধে নিহত হওয়ার পর ভাটই দলটির নেতৃত্ব গ্রহণ করেন। ওয়ানি নিহত হওয়ার পর পুরো কাশ্মীর উপত্যকা অগ্নিগর্ভ হয়ে ওঠে। ভারতবিরোধী বিক্ষোভে অন্তত ১০০ মানুষ নিহত হয়।<br style="padding: 0px; margin: 0px; outline: 0px;" />১৯৪৭ সালে ব্রিটিশ শাসনের অবসানের পর ভারত ও পাকিস্তানের দুই অংশে বিভক্ত হয়ে পড়ে কাশ্মীর। দুটি দেশই পুরো কাশ্মীরে তাদের বলে দাবি করে আসছে।</p>', 2, '2017-05-28', '', '0000-00-00', 0, 0, 0, 0, '', 1, 0),
(59, 30, 'বাংলাদেশ–পাকিস্তান প্রস্তুতি ম্যাচ  তামিম-ঝড়ের পরও এমন হার!', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">এজবাস্টনে কাল দুটো ঝড় উঠল। প্রথমটা তুললেন তামিম ইকবাল। তাতে বাংলাদেশও উঠে গিয়েছিল রানের পাহাড় চূড়ায়। কিন্তু চ্যাম্পিয়নস ট্রফির আগে প্রথম প্রস্তুতি ম্যাচের শেষ দৃশ্যে আরেকটি ঝড় সেই চূড়া থেকে মাশরাফি বিন মুর্তজার দলকে ছুড়ে ফেলল মাটিতে। ঝড়টা তুললেন পাকিস্তানের নয় নম্বর ব্যাটসম্যান ফাহিম আশরাফ। আন্তর্জাতিক ক্রিকেটে অভিষেকের অপেক্ষায় থাকা ফাহিমের ৩০ বলে অপরাজিত ৬৪ রান কঠিন ম্যাচকে করে দিল সহজ। যে ম্যাচে পাকিস্তানের হারটাই মনে হচ্ছিল অবধারিত, সেই ম্যাচই কিনা তিন বল বাকি থাকতে ২ উইকেটের জয় পেয়ে গেল তারা!</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">ম্যাচের শেষ ওভারে পাকিস্তানের দরকার ছিল ১৩ রান, হাতে দুই উইকেট। মাশরাফির করা প্রথম বলটাই শর্ট পিচ, পুলে ছক্কা হাঁকালেন ফাহিম। দ্বিতীয় বলে দৌড়ে তিন রান। পরের বলে চার মেরে খেলা শেষ করে দেন হাসান আলী। নবম উইকেটে মাত্র ৪২ বলে ৯৩ রানের জুটি হয়েছে তাঁদের। আসলে ম্যাচ যত শেষের দিক গড়িয়েছে, ততই তা হেলে গেছে পাকিস্তানের দিকে। শেষ ১০ ওভারে চার উইকেটে দরকার ছিল ১০৯ রান। এমনকি ৪৪ ওভার শেষেও ৩৬ বলে ৮২ রান দরকার ছিল, হাতে ছিল মাত্র দুই উইকেট। সম্ভাবনার পাল্লা তখনো বাংলাদেশের দিকে হেলে। পাকিস্তানের জয় সহজ হতে থাকে ৪৫তম ওভারে মেহেদী হাসান মিরাজের ১৯ রান দেওয়ার পর থেকে। ৪৭তম ওভারে মাশরাফিও দিয়ে ফেলেন ১৬। ফাহিম দুই ছক্কা মেরেছেন বাংলাদেশ অধিনায়কের ওই ওভারেও।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">অথচ বাংলাদেশের রানের পাহাড়ের নিচে পড়ে প্রায় পুরো ইনিংসেই হাঁসফাঁস করেছেন পাকিস্তানের ব্যাটসম্যানরা। ৭৮ রানে ৩ উইকেট হারিয়ে শুরুতেই &lsquo;ভূমিধসে&rsquo;র শিকার তাঁরা। আশা জাগিয়ে রেখেছিলেন শোয়েব মালিক। মোহাম্মদ হাফিজ আর তাঁর চতুর্থ উইকেট জুটিতে আসা ৭৯ রান প্রাথমিক ধাক্কা কিছুটা সামলায়। ষষ্ঠ উইকেটে শোয়েব মালিক-ইমাদ ওয়াসিম জুটিতে আসে আরও ৫৯। দলকে ২২৭-এ রেখে মালিকের বিদায় যেন পাকিস্তানকে হারের দিগন্তই দেখাচ্ছিল। কিন্তু ক্রিকেটে যে অনিশ্চয়তাটাই শেষ কথা, সেটা আরেকবার দেখিয়ে দিলেন ২৩ বছর বয়সী ফাহিম।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">অথচ এই ম্যাচের নায়ক হওয়ার কথা ছিল বাংলাদেশের তামিমের। পাকিস্তানের প্রায় সব বোলারের ওপর দিয়েই বয়ে গেছে তামিম-ঝড়। যদি কেউ সেটা একটু বেশি অনুভব করে থাকেন, তো তিনি জুনায়েদ খান। ৯ ওভারে ৭৩ রানে ৪ উইকেট পাওয়া জুনাইদ এক ওভারেই দিয়েছিলেন ২৫, তিন বাউন্ডারি আর এক ছক্কায় যার ২১-ই তামিমের ব্যাট থেকে।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">দলের ২৭ রানে সৌম্য সরকারের বিদায়ের পর প্রথমে ইমরুল কায়েস ও পরে মুশফিকুর রহিমকে সঙ্গে নিয়ে তামিমই ছিলেন রানের পাহাড় গড়ার আসল কারিগর। দ্বিতীয় উইকেটে ইমরুলের সঙ্গে ১৪২ ও পরের উইকেটে মুশফিকের সঙ্গে ৫০ রানের জুটি। ৩৪তম ওভারে তামিম যখন শাদাব খানের বলে জুনায়েদের ক্যাচ হন, বাংলাদেশের স্কোর পেয়ে গেছে বড় রানের ভিত্তি।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">রানটা শেষ পর্যন্ত চার শর কাছাকাছি চলে গেলেও অবাক হওয়ার কিছু থাকত না। কিন্তু মিডল অর্ডার ব্যাটসম্যানদের থিতু হয়েও বড় ইনিংস এবং বড় জুটি গড়তে না পারার ব্যর্থতায় তা হয়নি। ২১৯ রানের সময় তামিম আউট। সেখান থেকে ১৪২ রানে পড়েছে বাংলাদেশের শেষ ৭ উইকেট। শেষ ৫ ওভারে এসেছে মাত্র ৩৭। এর ২৭-ই হয়েছে ৪৮তম ওভারে মাশরাফি উইকেটে আসার আগে। ১৫ বলে ২৬ করে মোসাদ্দেক ফিরে যাওয়ার পর ব্যাটিংয়ে নেমে ৮ বলে মাত্র ১ রান করে ফেরেন মাশরাফি।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">প্রিমিয়ার লিগ থেকেই দারুণ ফর্মে তামিম। আয়ারল্যান্ড গিয়েও ধারাবাহিক। এই কদিনে যে ব্যাটের ধার আরও বেড়েছে, সেটারই প্রমাণ পাওয়া গেল কাল। ৯৩ বলে ১০২ রানের ইনিংসে ৪ ছক্কা ও ৯ বাউন্ডারি। পাকিস্তানের কোনো বোলারকেই শান্তি দেননি তিনি।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">শুরুটা একটু ধীরে করলেও জুনায়েদকে দিয়েই শুরু তামিম-ঝড়ের। জুনায়েদের ওই ওভারের আগে তামিমের রান ছিল ১৭ বলে ৮। আর ওভার শেষে ২২ বলে ২৯। বলের চেয়ে রানের অঙ্কটা এরপর থেকেই এগিয়ে। ফাহিম আশরাফকে বাউন্ডারি মেরে ফিফটি করেছেন ৩৯ বলে, সেঞ্চুরি এসেছে ৮৮ বলে।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">তামিমের জ্বলে ওঠার দিনে আর সবাইকে নিষ্প্রভ লাগে। নয়তো ইমরুল কায়েসের দেওয়া সংগতটাও কম ছিল না! সাব্বির রহমানের পরিবর্তে তিনে নামানো হয় বাঁহাতি এই ব্যাটসম্যানকে। আয়ারল্যান্ড সফরটা মাঠের বাইরে বসে কাটানো ইমরুল সুযোগ পেয়েই তা কাজে লাগালেন। শাদাবের বলে এলবিডব্লু হওয়ার আগে আট বাউন্ডারিতে করেছেন ৬২ বলে ৬১ রান। ১৬তম ওভারের প্রথম বলে বাংলাদেশের রান তিন অঙ্ক ছুঁয়েছে তাঁর বাউন্ডারিতেই।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">৩৪১ রান করে এমন হার মেনে নেওয়াটা কঠিন। তামিম, ইমরুলের জন্য তো সেটা আরও বেশি।</span>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1287805279_1495945661.jpg', 1, 1),
(60, 30, 'বন্ধুকে শেষবিদায় বোল্টের', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">প্রায় একই সঙ্গে বেড়ে উঠেছেন দুজন। অ্যাথলেটিকসের জুনিয়র বিশ্ব চ্যাম্পিয়নশিপেও একই সঙ্গে জ্যামাইকা দলের প্রতিনিধিত্ব করেছেন। পরে অবশ্য জার্মেইন মেসন বেছে নিয়েছেন তাঁর পিতৃভূমি গ্রেট ব্রিটেনকে। উসাইন বোল্ট জ্যামাইকার হয়েই আলো ছড়িয়েছেন ট্র্যাকে, হয়েছেন কিংবদন্তি। দুজনের দেশ আলাদা হয়ে গেছে, খ্যাতিতেও আকাশ-পাতাল ব্যবধান। কিন্তু বন্ধুত্বটা অটুট ছিল সব সময়ই। হরিহর আত্মা ছিলেন দুজন। সেই বন্ধুত্বের অবসান হয়েছে গত মাসে মেসনের মৃত্যুতে। পরশু প্রিয় সেই বন্ধুর শেষকৃত্যে বোল্টও কেঁদেছেন অঝোরে।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">জ্যামাইকায় বেড়ে ওঠা অ্যাথলেট মেসন ২০০৮ বেইজিং অলিম্পিকে ব্রিটেনের হয়ে রুপা জিতেছিলেন হাই জাম্পে। ওই অলিম্পিক দিয়েই ইতিহাসে নাম লেখানো শুরু বোল্টের। এরপর জ্যামাইকান স্প্রিন্টার এগিয়েছেন কিংবদন্তি হওয়ার পথে। মেসন হারিয়ে গেছেন পাদপ্রদীপের আলো থেকে। তবে গত এপ্রিলে হঠাৎই আবার সংবাদ শিরোনাম হলেন দুঃখজনকভাবে। জ্যামাইকায় এক মোটরসাইকেল দুর্ঘটনায় মাত্র ৩৪ বছর বয়সেই সবার কাছ থেকে চিরবিদায় নিলেন এই অ্যাথলেট।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">খবরটা শুনে ভীষণ ভেঙে পড়েন বোল্ট। নিজের হাতে কবর খুঁড়েছেন বন্ধুর জন্য। মেসনের শেষকৃত্যেও সবচেয়ে বেশি আবেগাপ্লুত মনে হয়েছে তাঁকে। কিংসটনের পার্ক সেভেন্থ ডে চার্চে সবার স্মৃতিচারণা শুনতে শুনতেই বোল্টের দুচোখ হয়ে গিয়েছিল সিক্ত। শেষ পর্যন্ত আর নিজেকে সামলাতে পারেননি। ভেঙে পড়েছেন কান্নায়।</span>', 1, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1210678602_1495946049.jpg', 1, 0),
(61, 25, ' সম্মাননা নিলেন রুনা লায়লা', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ইন্সপায়ারিং উইমেন ক্রিয়েটিভিটি এন্ট্রাপ্রেনিউরশিপ ইন দ্য গ্লোবাল ইকোসিস্টেম&rsquo; অনুষ্ঠান থেকে সম্মাননা গ্রহণ করেছেন রুনা লায়লা। উপমহাদেশের প্রখ্যাত এই কণ্ঠশিল্পীকে বাংলাদেশ, উপমহাদেশ ও বিশ্বসংগীতে অবদান এবং সাংস্কৃতিক কার্যক্রম ও নারী উন্নয়নে ভূমিকা রাখার জন্য এই সম্মাননা দেওয়া হয়।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গত বৃহস্পতিবার স্থানীয় সময় সন্ধ্যায় যুক্তরাষ্ট্রের নিউইয়র্কের ইউনাইটেড নেশনস প্লাজার ওই অনুষ্ঠানে রুনা লায়লা ছিলেন বিশেষ অতিথি। যুক্তরাষ্ট্রের বারিনো ইনস্টিটিউট আয়োজিত এই&nbsp;অনুষ্ঠান থেকে সম্মাননা পেয়ে গর্বিত রুনা লায়লা। গতকাল শনিবার সকালে সম্মাননা গ্রহণের অনুভূতি জানিয়ে তিনি&nbsp;<em style="padding: 0px; margin: 0px; outline: 0px;">প্রথম আলো</em>কে বলেন, &lsquo;এটি আমার এবং আমার দেশের জন্যও সম্মানের।&rsquo; রুনা লায়লা বলেন, &lsquo;যেকোনো সম্মাননা আমার কাছে আলাদা গুরুত্ব বহন করে। আমার দেশের সংগীতের মানুষদের জন্য এ অর্জন আরও বেশি আনন্দের।&rsquo;</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">৫০ বছরের বেশি সময় ধরে গান করছেন রুনা লায়লা। সে জন্য পেয়েছেন নানা পুরস্কার ও সম্মাননা। কাজ করছেন সার্কের শুভেচ্ছাদূত হিসেবে। রুনা লায়লা মনে করেন, গানের মাধ্যমে তিনি সমাজের জন্য কাজ করে যাচ্ছেন। গানের বাইরে যতটা সময় পান, সমাজের জন্য কিছু করার চেষ্টা করেন তিনি</p>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1319835361_1495946195.jpg', 1, 0),
(62, 25, 'সবাইকে চমকে মধ্যরাতের পার্টিতে অক্ষয়-টুইংকেল!', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">বলিউডের তারকাদের পার্টি শুরুই হয় মধ্যরাতে। এদিক থেকে অবশ্য একেবারেই আলাদা অক্ষয় কুমার ও টুইংকেল খান্না দম্পতি। তাঁদের সংসার &lsquo;আরলি টু বেড, আরলি টু রাইজ&rsquo; নিয়মে পরিচালিত হয়। এ জন্যই বলিউডের অনেক বড় বড় পার্টিতে দেখা মেলে না এই তারকা জুটির। কিন্তু গতকাল শুক্রবার সবাইকে চমকে দিয়ে নির্মাতা করণ জোহরের জন্মদিনের পার্টিতে হাজির হয়েছিলেন দুজন। গতকাল ছিল করণের ৪৪তম জন্মদিন। এই উপলক্ষে বাড়িতে বিশাল এক তারকাবহুল পার্টির আয়োজন করেছিলেন তিনি।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">করণ ও টুইংকেল ছোটবেলার বন্ধু। কিছুদিন আগে করণ বলেছিলেন, তাঁর জীবন নিয়ে কোনো চলচ্চিত্র তৈরি হলে সেখানে অবশ্যই টুইংকেলের চরিত্র থাকতে হবে। তাই রাতের পার্টিতে কখনো অংশ না নিলেও বন্ধু করণের কথা আলাদা। স্বামী অক্ষয় কুমারকে সঙ্গে নিয়ে গতকাল করণকে শুভেচ্ছা জানাতে এ জন্য তাঁর বাড়িতে গিয়েছিলেন টুইংকেল। আর করণের জন্যও এবারের জন্মদিনটি বিশেষ। কারণ, সন্তানদের জন্মের পর এটিই তাঁর প্রথম জন্মদিন। মাসখানেক আগে সারোগেসির মাধ্যমে যমজ সন্তানের বাবা হয়েছেন এই নির্মাতা।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">এদিকে মধ্যরাতের পার্টিতে বন্ধুর জন্য হাজির হলেও টুইংকেলের চোখ ছিল ঘুমে ঢুলুঢুলু। কতক্ষণে বিছানায় যাবেন, সেই চিন্তাই করছিলেন তিনি। ইনস্টাগ্রামে নিজের একটি ছবি প্রকাশ করে টুইংকেল নিজেই এই কথা জানিয়েছেন।&nbsp;</span>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '941494914_1495946268.jpg', 1, 0),
(63, 22, 'যুক্তরাজ্যে নির্বাচন  করবিনের চমক ঠেকাতেই ব্যস্ত কনজারভেটিভরা', '<p class="Hdg2col" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">লেবার নেতা জেরেমি করবিনের দুর্বলতার সুযোগে ক্ষমতা আরও নিরঙ্কুশ করতে নির্বাচন ঘোষণা করেছিলেন যুক্তরাজ্যের প্রধানমন্ত্রী থেরেসা মে। অবস্থাটা এমন ছিল যেন করবিনকে হিসাবেই ধরছিলেন না তিনি। কিন্তু সেই হিসাবে না ধরা করবিনের চমক ঠেকাতেই এখন ব্যস্ত হয়ে পড়েছে থেরেসা মেসহ তাঁর পুরো কনজারভেটিভ দল।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গত বুধবার সর্বশেষ প্রকাশিত জরিপের ফল অনুযায়ী, গত তিন সপ্তাহে বিরোধী দল লেবার পার্টির সঙ্গে ক্ষমতাসীন কনজারভেটিভ পার্টির ব্যবধান ২৪ শতাংশ থেকে কমে মাত্র ৫ শতাংশে নেমে এসেছে। জরিপ বলছে, কনজারভেটিভ পার্টির সমর্থন ৪৩ শতাংশ। আর লেবার পার্টির সমর্থন ৩৮ শতাংশ।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">আগামী ৮ জুন সাধারণ নির্বাচন। গত সাত বছর ক্ষমতার বাইরে লেবার পার্টি। দলটির নেতৃত্ব নেওয়া বামপন্থী নেতা জেরেমি করবিন গতানুগতিক রাজনীতির বিকল্প তুলে ধরে বেকায়দায় ফেলেছেন ক্ষমতাসীনদের।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ম্যানচেস্টারে বোমা হামলার ঘটনা আজীবন যুদ্ধবিরোধী করবিনের ভোটে নেতিবাচক প্রভাব ফেলবে বলে ধারণা ছিল। ওই হামলার কারণে তিন দিন বন্ধ ছিল নির্বাচনী প্রচার। কিন্তু শুক্রবার জাতীয় নিরাপত্তা প্রশ্নে নিজের অবস্থান তুলে ধরেই প্রচারে নামেন করবিন। বিদেশে যুদ্ধে জড়ানোর কারণে যুক্তরাজ্যে সন্ত্রাসী হামলার ঝুঁকি বেড়েছে জানিয়ে তিনি পররাষ্ট্রনীতি বদলের ঘোষণা দেন। এতে ক্ষমতাসীনেরা হামলে পড়ে করবিনের সমালোচনায়। প্রধানমন্ত্রী থেরেসা মে বলেন, ম্যানচেস্টারে হামলার দায় করবিন যুক্তরাজ্যের কর্মের ফল বলতে চাইছেন। পররাষ্ট্রমন্ত্রী বরিস জনসন করবিনের বক্তব্যকে &lsquo;পুরোটা বিস্ময়কর&rsquo; বলে পরিহাস করেন।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">এদিকে গতকাল শনিবার এফএ কাপ ফুটবল ফাইনাল সামনে রেখে করবিন ঘোষণা দেন, ফুটবলপ্রেমীদের যাতায়াত টিকিটে বিশেষ সুবিধা দেবে তাঁর সরকার, যাতে হঠাৎ খেলার সূচি পরিবর্তন হলে দর্শকেরা আগের কেনা টিকিটেই চড়তে পারেন। এসব ঘোষণাকেও &lsquo;অর্থহীন&rsquo; বলে সমালোচনায় ব্যস্ত ক্ষমতাসীনেরা।&nbsp;</p>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '', 1, 0),
(64, 26, 'জি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">সম্প্রতি দেশের বাজারে জি সিরিজের নতুন স্মার্টফোট জিআর ৩-এর ২০১৭ সংস্করণ এনেছে হুয়াওয়ে। চমৎকার নকশার ফোনটির বিশেষ বৈশিষ্ট্য হচ্ছে কম আলোতে ঝকঝকে ছবি তুলতে পারার সক্ষমতা। হুয়াওয়ের দাবি, মাঝারি বাজেটে মাল্টিটাস্কিং বা একাধিক কাজের সুবিধাযুক্ত স্মার্টফোন এটি।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">জিআর ৩ স্মার্টফোনটিতে ব্যবহার করা হয়েছে হুয়াওয়ের নিজস্ব হাইসিলিকন কিরিন ৬৫৫ চিপসেট, ২. ১ + ১.৭ গিগাহার্টজের প্রসেসর। ৩ জিবি র&zwj;্যামের ফোনটিতে ১৬ জিবি অভ্যন্তরীণ মেমোরি ব্যবহার করা হয়েছে। এ ছাড়া ২৫৬ জিবি পর্যন্ত মাইক্রোএসডি কার্ড ব্যবহার করার সুযোগ রয়েছে ফোনটিতে। এতে আছে ফোরজি প্রযুক্তির সিম ব্যবহারের সুবিধা। নিরাপত্তার ফিচার হিসেবে ব্যবহার করা হয়েছে উন্নত প্রযুক্তির ফিঙ্গার প্রিন্ট সেন্সর।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">৫ দশমিক ২ ইঞ্চি মাপের ডিসপ্লেযুক্ত ফোনটিতে ফুল এইচডি রেজল্যুশনের পর্দা ব্যবহার করা হয়েছে। কম আলোতে উন্নত ছবি তুলতে এর পেছনে ১২ মেগাপিক্সেলে ও সামনে ৮ মেগাপিক্সেলের ক্যামেরা রয়েছে। অপারেটিং সিস্টেম হিসেবে ব্যবহার করা হয়েছে অ্যান্ড্রয়েড নুগাট (৭.০)। এ ছাড়া হুয়াওয়ের নিজস্ব কাস্টমাইজড ইউজার ইন্টারফেস ইএমইউআই ৫.০ সংস্করণ ব্যবহার করা হয়েছে এতে। তিন হাজার মিলিঅ্যাম্পিয়ার ব্যাটারির ফোনটিতে আল্ট্রা পাওয়ার সেভিং মোড আছে। হ্যান্ডসেটটির দাম ১৯ হাজার ৯০০ টাকা।</span>', 2, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '438669371_1495946495.jpg', 1, 0);
INSERT INTO `news` (`id`, `category_id`, `headline`, `description`, `reporter_id`, `news_date`, `news_time`, `news_add_date`, `news_type_id`, `position_id`, `region_id`, `language_id`, `image`, `status`, `count_view`) VALUES
(65, 26, '১০ হাজার ফ্রিল্যান্সার তৈরির উদ্যোগ নিজস্ব ', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">দক্ষ ফ্রিল্যান্সার গড়তে বিভিন্ন প্রশিক্ষণ দিচ্ছে ফ্রিল্যান্সিং প্রশিক্ষণ সেবাদাতা আন্তর্জাতিক প্রতিষ্ঠান কোডারসট্রাস্ট। সম্প্রতি বাংলাদেশ আইসিটি জার্নালিস্ট ফোরাম (বিআইজেএফ) মিলনায়তনে এক সংবাদ সম্মেলনে &lsquo;#শিখবেসবাই&rsquo; নামের একটি উদ্যোগের কথা জানিয়েছে প্রতিষ্ঠানটি। এ উদ্যোগের মাধ্যমে ১০ হাজার ফ্রিল্যান্সার তৈরির কথা জানিয়েছেন প্রতিষ্ঠানটির কর্মকর্তারা।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">কোডার্সট্রাস্টের কান্ট্রি ডিরেক্টর মো. আতাউল গনি ওসমানী বলেন, কোডার্সট্রাস্ট দক্ষ ফ্রিল্যান্সার তৈরির লক্ষ্য নিয়ে ২০১৪ সালে তাদের যাত্রা শুরু করে। বাংলাদেশের তরুণদের উপযুক্ত প্রশিক্ষণ এবং সঠিক দিকনির্দেশনা মাধ্যমে অনলাইন মার্কেটপ্লেসগুলোতে কাজের সুযোগ তৈরি করছে। বাংলাদেশের সফলতার ওপর ভিত্তি কোডার্সট্রাস্ট এখন বিশ্বের আরও ৫টি দেশে কার্যক্রম পরিচালনা করছে। অনলাইনে ঘরে বসে কীভাবে সবাই ফ্রিল্যান্সিং শিখতে পারে, সে বিষয়ে সচেতনতার পাশাপাশি নানা কোর্সও করাচ্ছে প্রতিষ্ঠানটি।<br style="padding: 0px; margin: 0px; outline: 0px;" />আতাউল গনি ওসমানী বলেন, ফ্রিল্যান্সিং মার্কেটপ্লেসগুলোর চাহিদার ওপর ভিত্তি করে কোর্স সাজানো হয় বলে শিক্ষার্থীরা কোর্স চলাকালে কাজ পেয়ে যান। বর্তমানে ১০টি বিষয়ে প্রশিক্ষণ দিচ্ছে কোডারসট্রাস্ট। এখন পর্যন্ত বাংলাদেশে ১ হাজার ৫০০ জনকে প্রশিক্ষণ দেওয়া হয়েছে। এর মধ্যে ৬০০ শিক্ষার্থী ফ্রিলান্সার হিসেবে প্রতিষ্ঠিত। ২০১৭ সালে &lsquo;#শিখবেসবাই&rsquo; প্রকল্পটি গ্রহণ করা হয়েছে। এর মাধ্যমে ১০ হাজার ফ্রিল্যান্সার তৈরি করা হবে। লক্ষ্য বাস্তবায়নে অনলাইনে ফ্রিল্যান্সিং প্রশিক্ষণ শুরু হয়েছে। দেশের যেকোনো প্রান্ত থেকে ইন্টারনেটের মাধ্যমে ঘরে বসেই ফ্রিল্যানসিং শেখা যাবে।</p>', 1, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '249546340_1495946582.jpg', 1, 0),
(66, 27, 'নজরুলের সাহিত্যিক ভাতা', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">১৯৪২ সাল। দুরারোগ্য ব্যাধিতে আক্রান্ত হয়ে পুরোপুরি শয্যাশায়ী হয়ে পড়লেন কবি কাজী নজরুল ইসলাম। অসুস্থতা রুদ্ধ করল তাঁর উপার্জনের সব পথ। অসম্ভব হয়ে পড়ল সংসার চালানো। সংসারের একমাত্র উপার্জনক্ষম ব্যক্তি তিনি। যখন সুস্থ ছিলেন, বেহিসেবি জীবনযাপনের কারণে কোনো সঞ্চয় ছিল না। উত্তরাধিকার সূত্রেও পাননি কানাকড়ি সম্পত্তি। স্বভাবত এ সময় কবিকে নির্ভর করেত হয়েছে বিভিন্ন ব্যাক্তি ও প্রতিষ্ঠানের সহায়তা বা ভাতার ওপর। নজরুলের এই ভাতা তথা সাহিত্যিক ভাতা নিয়ে যত কিছু ঘটেছে, আদতে তা ঘটনাবহুল। সেই সময়কার নানা পত্রপত্রিকায় ছড়িয়ে-ছিটিয়ে আছে নজরুলের সাহিত্যিক ভাতার সংবাদ। সংবাদগুলোর নিরিখে যখন এ রচনা লিখছি, মনে হচ্ছে সম্প্রদায়-নির্বিশেষে কত মানুষ তখন দাঁড়িয়েছেন কবি ও কবি পরিবারের পাশে!</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">নজরুলের দুরবস্থা সম্পর্কে পত্রিকায় লেখা হয়, &lsquo;বাঙালার বিদ্রোহী কবি কাজী নজরুল ইসলাম বহুদিন যাবৎ পক্ষাঘাতে শয্যাগত। অশক্ত হইয়া পড়ায় তিনি এখন নিঃস্ব ও কপর্দকহীন তাঁহার স্ত্রীও পক্ষাঘাতে শয্যাশায়িনী। চিকিৎসা দূরের কথা, এখন এরূপ সঙ্গতি নাই যে, শিশু পুত্রদ্বয়, রুগ্ন পত্নী ও নিজের আহার্যটুকু জোটে।&rsquo;</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">কবির এই বিপৎকালে পরিচিত বন্ধুবান্ধব ও গুণগ্রাহীরা কেউ কেউ এগিয়ে এলেও প্রয়োজনের তুলনায় তা ছিল অপ্রতুল ও অনিয়মিত। পত্রিকার মাধ্যমেও কেউ কেউ জনসাধারণকে কবির সাহায্যে এগিয়ে আসার আবেদন করেন। ১৯৪৪ সালের ২৪ মে ভারতীয় দৈনিক&nbsp;<em style="padding: 0px; margin: 0px; outline: 0px;">আনন্দবাজার পত্রিকা</em>র মাধ্যমে মাজহারুল হক ও মিরদেহ আসাদুর রহমান আবেদন করেন, &lsquo;বাঙলার জাতীয় কবির প্রাণরক্ষায় সর্বসাধারণের অকুণ্ঠ সাহায্য একান্ত আবশ্যক।&rsquo;</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">১৯৪৩ সালে কবির চিকিৎসা ও পরিবারের ভরণ-পোষণের জন্য বাংলার সেই সময়ের অর্থমন্ত্রী ড. শ্যামাপ্রসাদ মুখার্জিকে সভাপতি এবং সজনীকান্ত রায়কে সম্পাদক করে একটি নাগরিক কমিটি গঠন করা হয়। তবে এ কমিটির নাম নিয়ে বিভ্রান্তি আছে। কেউ একে বলেছেন &lsquo;নজরুল এইড ফান্ড&rsquo; (সুফী জুলফিকার হায়দার), কেউবা &lsquo;সেন্ট্রাল নজরুল এইড ফান্ড&rsquo; (<em style="padding: 0px; margin: 0px; outline: 0px;">আনন্দবাজার</em>) আবার দু-একজন বলেছেন &lsquo;নজরুল সাহায্য কমিটি&rsquo; (মুজাফ্&zwnj;ফর আহমদ)। মুজাফ্ফর আহমদের সূত্রে জানা যায়, এই কমিটি বিভিন্ন সূত্র থেকে তহবিল সংগ্রহ করে এবং প্রতি মাসে কবির পরিবারকে ১৫০ রুপি ভাতা দেওয়া শুরু করে। অবশ্য সুফী জুলফিকার হায়দার বলেছেন, মাসিক ভাতা ছিল ২০০ রুপি।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">অন্যদিকে, সজনীকান্তের বিভিন্ন কর্মকাণ্ডের জন্য কবির শাশুড়ি গিরিবালা দেবী আগে থেকেই ক্ষুব্ধ ছিলেন তাঁর ওপর। তিনি সাহায্য কমিটিতে সজনীকান্তের সম্পৃক্ততা পছন্দ করছিলেন না। এ কারণে মুজাফ্&zwnj;ফর আহমদকে নতুন একটি কমিটি গঠন করে অর্থ সংগ্রহের উদ্যোগ নিতে অনুরোধ করেন গিরিবালা। মুজাফ্&zwnj;ফর আহমদ একটি কমিটি থাকতে অন্য আরেক কমিটি গঠনে রাজি হননি। এরপর গিরিবালা দেবী শ্যামাপ্রসাদকে পরিবারের বিভিন্ন অসুবিধার কথা উল্লেখ করে চিঠি দেন। ফল যা হয়&mdash;পরিবার এবং কমিটির ভেতরের টানাপোড়েনের কারণে শেষ পর্যন্ত নিষ্ক্রিয় হয়ে পড়ে কমিটিটি।</p>', 4, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1144098605_1495946697.jpg', 1, 0),
(67, 27, 'বিড়ালের হাসি', '<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">আগে সব সময় সদর রাস্তা দিয়ে চলাফেরা করতেন হক সাহেব। কিন্তু বর্তমানে শুধু বিকল্প আর ছোট রাস্তা খোঁজেন। কারণ ১৯৭১ সালের ২৫ মার্চের পর থেকে হক সাহেবের নিজেকে নাই নাই লাগে। আগে এমন লাগত না। এখন মনে হয়, নিজেকে তিনি আর চালান না&mdash;বন্দুক উঁচানো কিছু ভিনদেশি তাঁকে চালায়।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">এই তো ৩০ মার্চ মঙ্গলবারের ঘটনা। সকালবেলা বাজারে যাওয়ার সময় চিকন গলিটার মুখে যে বড় রাস্তাটা দেখা যায়, সেখানেই দেখা একদল খাকি পোশাকের সৈনিকের সঙ্গে। বুটের আওয়াজে ভয় পেয়ে নিজেকে যখন হক সাহেব দেয়ালের সঙ্গে প্রায় মিশিয়ে দিয়েছেন, তখন তাঁকে চমকে দিয়ে গলির বিড়ালটা তাঁর পাশ কাটিয়ে রাস্তায় উঠে গেল। বিড়ালটা ম্যাও ম্যাও করে রাস্তা পার হওয়ার সময় মিলিটারির চোখ পড়ল ওর ওপর। সঙ্গে সঙ্গে গর্জে উঠল রাইফেল।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">কিছুক্ষণ পর তাদের চলে যাওয়ার শব্দে সচেতন হলেন হক সাহেব। এতক্ষণ দেয়ালের সঙ্গে মিশে থেকে যেন দেয়ালের একটা অংশ হয়ে গিয়েছিলেন তিনি। ধীরে ধীরে গলির মুখে এসে রাস্তার দিকে তাকালেন। রক্ত মাখা ছোট্ট প্রাণীটা পড়ে আছে রাস্তার ঠিক মাঝে।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">বহুদিন পা না ফেলা সদর রাস্তায় কী মনে করে উঠলেন হক সাহেব। বিড়ালের পায়ের কাছে এসে দাঁড়ালেন। মুখটা খোলা প্রাণীটার। দাঁতগুলো এমনভাবে বেরিয়ে পড়েছে যেন হক সাহেবকে দেখে হাসছে সে। বলছে দেখ, তুমি না পারলেও আমি পারি। অভিব্যক্তির কতটা হক সাহেব বুঝেছেন তা স্পষ্ট না হলেও হক সাহেবের মাঝে একটা ঝড় বয়ে যায়। উদ্দেশ্যহীনভাবে রাস্তার মাঝ দিয়ে হাঁটতে থাকেন তিনি। দূর থেকে জিপের শব্দ ক্রমাগত এগিয়ে আসে। একটা কণ্ঠ বলে ওঠে, &lsquo;হটো ইহাসে।&rsquo; হক সাহেব তবু হাঁটেন। আবার একসঙ্গে গর্জে ওঠে কয়েকটা রাইফেল।</p>', 5, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1266277896_1495946803.jpg', 1, 0),
(68, 22, 'নয়াদিল্লি ও মুম্বাইয়ে সন্ত্রাসী হামলার আশঙ্কায় সতর্কতা', '<p class="Hdg1col" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ভারতের গোয়েন্দা সংস্থাগুলো রাজধানী নয়াদিল্লি, মুম্বাইসহ আরও বড় কিছু শহর কিংবা সীমান্তবর্তী পাঞ্জাব ও রাজস্থানে জঙ্গি সংগঠন লস্কর-ই-তাইয়েবা সন্ত্রাসী হামলা করতে পারে বলে উল্লেখ করে সতর্কতা জারি করেছে। পাকিস্তান থেকে লস্কর-ই-তাইয়েবার ২০-২১ জনের একটি দল ভারতে প্রবেশ করেছে&mdash;এই তথ্য দিয়ে গোয়েন্দা সংস্থাগুলো এই সতর্কতা জারি করে।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ভারতের গোয়েন্দা সংস্থার খবর অনুযায়ী, পাকিস্তান থেকে লস্করের ২০-২১ জনের একটি দল ভারতে প্রবেশ করে ছোট ছোট দলে ভাগ হয়ে গেছে। এরা পাকিস্তানের প্রভাবশালী গোয়েন্দা সংস্থা ইন্টার-সার্ভিসেস ইন্টেলিজেন্সের (আইএসআই) প্রশিক্ষণপ্রাপ্ত।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">পুলিশের জারি করা সতর্কতা অনুযায়ী, রাজধানী নয়াদিল্লির মেট্রো, রেলপথ, বিমানবন্দর, পর্যটকদের কাছে জনপ্রিয় হোটেল, জনাকীর্ণ বিপণিবিতান, ধর্মীয় উপাসনালয় ও স্টেডিয়ামগুলোতে কড়া নজরদারি এবং সন্ত্রাসবিরোধী পদক্ষেপ জোরদার করতে বলা হয়েছে। অনুপ্রবেশকারী জঙ্গিরা গণমাধ্যমের মনোযোগ টানার মতো হামলার পরিকল্পনা করছে বলেও পুলিশ জানিয়েছে। ভারতীয় গোয়েন্দা সংস্থাগুলোর ধারণা, জঙ্গিরা আত্মঘাতী হামলাকারী দিয়ে জনবহুল স্থানে হামলা করাতে পারে।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ভারতনিয়ন্ত্রিত কাশ্মীরে গত শুক্র ও শনিবার জঙ্গিদের সঙ্গে সেনাসদস্যদের দুটি গোলাগুলির ঘটনায় সাবজার ভাটসহ আট জঙ্গি নিহত হয়েছে। সাবজার কাশ্মীরের জনপ্রিয় তরুণ বিচ্ছিন্নতাবাদী নেতা নিহত বুরহান ওয়ানির স্থলাভিষিক্ত হয়েছিলেন বলে ধারণা করা হয়। শুক্রবার সন্ধ্যায় পুলওয়ামা জেলার ট্রালের জঙ্গি আস্তানায় সেনা অভিযানে নিহত হন সাবজার ভাট</p>', 1, '2017-05-28', '', '0000-00-00', 0, 0, 0, 0, '', 1, 0),
(69, 22, '‘দয়া করে বিমানবন্দরে আসবেন না’', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">যুক্তরাজ্যের বিমান পরিবহন সংস্থা ব্রিটিশ এয়ারওয়েজের কম্পিউটার ব্যবস্থায় বিশ্বব্যাপী বিপর্যয় দেখা দিয়েছে। এতে অনেক বিমান উড়তে অনাকাঙ্ক্ষিত দেরি হয় এবং বিমানবন্দরের রানওয়েতে বিমানের জট লেগে যায়। এ ঘটনায় আজ শনিবার স্থানীয় সময় সন্ধ্যা ছয়টা পর্যন্ত লন্ডনের হিথ্রো ও গেটউইক বিমানবন্দর থেকে ব্রিটিশ এয়ারওয়েজের সব ফ্লাইট বাতিল করা হয়েছে।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ব্রিটিশ এয়ারওয়েজ এক বিবৃতিতে বলেছে, &lsquo;দয়া করে বিমানবন্দরে আসবেন না। বিশ্বব্যাপী আমাদের ফ্লাইট পরিচালনা-সংক্রান্ত কম্পিউটার ব্যবস্থায় বিপর্যয় দেখা দিয়েছে। এ ঘটনার জন্য সব গ্রাহকের কাছে আমরা দুঃখ প্রকাশ করছি। দ্রুততম সময়ের মধ্যে সমস্যার সমাধান করার জন্য আমরা কাজ করছি।&rsquo;<br style="padding: 0px; margin: 0px; outline: 0px;" />সংস্থাটি বলেছে, হিথ্রো ও গেটউইকের টার্মিনালগুলোয় যাত্রীদের ব্যাপক ভিড় দেখা দিয়েছে। এ কারণে শনিবার সন্ধ্যা পর্যন্ত সব ফ্লাইট বাতিল করা হয়েছে।<br style="padding: 0px; margin: 0px; outline: 0px;" />ফ্লাইট পরিচালনা-সংক্রান্ত কম্পিউটার ব্যবস্থার এই সমস্যা যুক্তরাজ্যজুড়ে ছড়িয়ে পড়েছে বলে যাত্রীরা অভিযোগ করেছেন। যাত্রীরা বলছেন, দীর্ঘ সময় দেরি হওয়ার পরও অনেক বিমান আকাশে ওড়েনি।<br style="padding: 0px; margin: 0px; outline: 0px;" />আগামী সোমবার দেশটিতে ছুটির দিন। আবার রোববার সাপ্তাহিক ছুটির দিন হওয়ায় অনেকেই পরিবারসহ ঘুরতে বেরিয়েছিলেন। এতে বিমানবন্দরে যাত্রীদের ভিড়ও বেড়ে যায়।<br style="padding: 0px; margin: 0px; outline: 0px;" />এর আগে জার্মানির এয়ারলাইন সংস্থা লুফথানসা ও ফ্রান্সের এয়ার ফ্রান্স কম্পিউটার ব্যবস্থার সমস্যায় পড়েছিল। ব্রিটিশ এয়ারওয়েজ এমন সমস্যায় পড়া তৃতীয় এয়ারলাইন সংস্থা। তবে এই বৈশ্বিক সমস্যা কোনো সাইবার হামলার কারণে ঘটেছে, এমন কোনো প্রমাণ পাওয়া যায়নি বলে নিশ্চিত করেছে ব্রিটিশ এয়ারওয়েজ।<br style="padding: 0px; margin: 0px; outline: 0px;" />বিশ্বের অন্যতম ব্যস্ততম বিমানবন্দর হিসেবে পরিচিত লন্ডনের হিথ্রো। বিমানবন্দর কর্তৃপক্ষ জানিয়েছে, সমস্যার সমাধানে ব্রিটিশ এয়ারওয়েজের সঙ্গে কাজ করা চলছে।</p>', 1, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '585264443_1495946959.jpg', 1, 0),
(70, 28, ' মেয়েদের অনুভূতি বাবারা বেশি অনুভব করেন!', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">সন্তান যদি মেয়ে হয়, তাহলে তার প্রতি বাবার আচরণ ভিন্ন হয়। মেয়ের বেলায় বাবার ভাষার ব্যবহারও হয় ভিন্ন ধরনের। ছেলে ও মেয়েসন্তানের প্রতি বাবার মনোযোগ ও সতর্কতা ভিন্ন ধরনের। বাবাদের প্রাত্যহিক আদর-যত্ন এবং মস্তিষ্কের প্রতিচ্ছবি বিশ্লেষণ করে গবেষকেরা এ কথা বলেছেন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গবেষকেরা বলছেন, ছেলেসন্তানের বাবারা ছেলের প্রতি যতটুকু মনোযোগী ও যত্নবান, তার চেয়ে বেশি মনোযোগী ও যত্নবান মেয়েসন্তানের বাবারা মেয়ের ক্ষেত্রে। বাবারা মেয়েদের বেশি গান শোনান, আবেগ নিয়ে বেশি কথা বলেন। গবেষকেরা বলছেন, কারণটা সম্ভবত এই যে ছেলের তুলনায় মেয়ের অনুভূতি বাবা বেশি অনুভব করতে পারেন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">যুক্তরাষ্ট্রের ইমোরি ইউনিভার্সিটি ও ইউনিভার্সিটি অব অ্যারিজোনার গবেষকেরা এই গবেষণা করেছেন। গবেষণা ফলাফল &lsquo;চাইল্ড জেন্ডার ইনফ্লুয়েন্সেস প্যারেন্টাল বিহেভিয়ার, ল্যাঙ্গুয়েজ অ্যান্ড ব্রেইন ফাংশন&rsquo; শিরোনামে আমেরিকান সাইকোলজিক্যাল অ্যাসোসিয়েশনের &lsquo;বিহেভিয়ারাল নিউরোসায়েন্স&rsquo; সাময়িকীতে ছাপা হয়েছে। গবেষকেরা দেখেছেন, শিশু যদি কাঁদে বা &lsquo;ড্যাড&rsquo; বলে ডাক দেয়, তাহলে মেয়েশিশুর বাবার সাড়া দ্রুততর হয়।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গবেষণায় ৬৯ জন বাবাকে নেওয়া হয়। বাবাদের বয়স ছিল ২১ থেকে ৫৫ বছরের মধ্যে। ৩৪ জন বাবার ছিল একটি মেয়ে এবং ৩৫ জন বাবার ছিল ছেলে। সন্তানদের বয়স ছিল এক থেকে দুই বছরের মধ্যে।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">বাবাদের আচরণ নির্ণয় করার জন্য গবেষকেরা দুই ধনের প্রযুক্তির সহায়তা নেন। বাবাদের একটি করে ছোট কম্পিউটার দেওয়া হয় বেল্টে আটকে রাখার জন্য। বাবারা এই কম্পিউটার একটি কাজের দিনে (উইক ডে) ও একটি ছুটির দিনে (উইক এন্ড) মোট ৪৮ ঘণ্টা চালু রাখেন। কম্পিউটারগুলো প্রতি নয় মিনিট পরপর ৫০ সেকেন্ডর জন্য চালু হতো এবং সব ধরনের শব্দ রেকর্ড করত।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">এতে দেখা গেছে, মেয়েশিশুর বাবা ছেলেশিশুর বাবার তুলনায় সন্তানের শরীর নিয়ে বেশি কথা বলেন, যেমন: পেট, পা বা পাকস্থলী নিয়ে বেশি কথা বলেন। ছেলেশিশুর বাবারা ছেলের সঙ্গে শক্ত ও ছুটোছুটি ধরনের খেলা খেলেন এবং ছেলের সঙ্গে কথা বলার সময় অর্জনসংক্রান্ত ভাষা, যেমন: গর্ব, জয় বা শীর্ষস্থান (প্রাউড, উইন, টপ) ব্যবহার করেন বেশি। মেয়েশিশুর বাবারা বিশ্লেষণধর্মী শব্দ বেশি ব্যবহার করেন, যেমন: সব, নিচে, অধিক (অল, বিলো, মাচ)।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">দ্বিতীয়ত, বাবাদের সামনে ছবি দিয়ে তাঁদের মস্তিষ্কের এমআরআই স্ক্যান করা হয়। একজন অপরিচিত পূর্ণবয়স্ক মানুষ, একটি অপরিচিত শিশু এবং নিজের শিশুর ছবি দেখানো হয়। নিজের শিশুর আবার তিন ধরনের ছবি দেখানো হয়: হাসিখুশি, দুঃখী ভাব এবং স্বাভাবিক অবস্থার। মস্তিষ্কের যেসব অংশ দৃশ্য, পুরস্কার, আবেগ এসবে সাড়া দেয়, এমআরআইয়ের তথ্য বিশ্লেষণে দেখা গেছে, হাসিখুশি ছবিতে মেয়েশিশুর বাবার মস্তিষ্কের এই অংশ বেশি সাড়া দেয়। স্বাভাবিক অবস্থার ছবি দেখলে ছেলের বাবার মস্তিষ্ক বেশি সাড়া দেয়। এটা গবেষকদের কাছে অপ্রত্যাশিত ছিল। তবে দুঃখের ছবিতে মেয়ে ও ছেলের বাবার প্রতিক্রিয়া সমান।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গবেষকেরা বলছেন, এই ফলাফল এটাই নির্দেশ করে যে লিঙ্গপরিচয় নিয়ে শিশুদের বেড়ে ওঠা আর তাদের প্রতি বাবাদের বাস্তব আচরণের মধ্যে পার্থক্য আছে।</p>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1923195434_1495947146.jpg', 1, 0),
(71, 28, 'রোজায় খাবেন, তবে পরিমিত', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">না বুঝে যা খুশি খেয়ে অনেকে পেটের পীড়ায় ভোগেন। রোজার সময় সঠিক খাদ্যাভ্যাসের অভাবে অনেকে ক্লান্তিতেও ভোগেন। আর তাপমাত্রা তো বেড়েই চলছে।&nbsp;</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">এবারের ১৫ ঘণ্টার রোজায় স্বাভাবিকভাবেই নিয়মিত খাদ্যাভ্যাসের বাইরে বাড়তি কিছু সচেতনতা দরকার। একটু নিয়ম মেনে খেলে সুস্থ থাকা সম্ভব।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">এই সময় কী খেতে হবে, কীভাবে খেতে হবে, তা জানালেন ঢাকা বিশ্ববিদ্যালয়ের খাদ্য ও পুষ্টিবিজ্ঞান ইনস্টিটিউটের অধ্যাপক শেখ নজরুল ইসলাম। তিনি বলেন, যেহেতু দীর্ঘ সময় না খেয়ে থাকতে হবে, তাই শরীরে পানির ঘাটতি রাখা যাবে না। প্রয়োজন অনুযায়ী যথেষ্ট পানি&ndash;জাতীয় খাবার রাখতে হবে খাদ্যতালিকায়।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">ইফতারিতে খাওয়ার ব্যাপারে শেখ নজরুল ইসলাম বলেন, &lsquo;ভাজাপোড়া কমাতে হবে। আর বাচ্চাদের তা না দেওয়াই ভালো।&nbsp;</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">এসব খেতে হলে বাসায় ভালো তেল দিয়ে বানিয়ে খেতে হবে। বাইরেরটা খাওয়া উচিত নয়।&rsquo; শরীর ঠান্ডা রাখে, এমন খাবারের ওপর জোর দিলেন&nbsp;নজরুল ইসলাম । ইফতারে তরমুজ রাখা যেতে পারে।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">বয়স্ক ব্যক্তিরা দই-চিড়া খেতে পারেন। বাজারে অনেক ফল এসেছে। তবে এই অধ্যাপক বলেন, যে ফলগুলো পাওয়া যাচ্ছে, এর বেশির ভাগই ঠিকমেতা পরিপক্ব হয়নি। আরও ১৫ দিন পরে খাওয়া যেতে পারে।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">ভারী কিছু না খেয়ে ঘরে তৈরি লেবুর শরবত ও পর্যাপ্ত ফল দিয়ে ইফতার সারতে হবে। রাতে খেতে হলে খিচুড়ি, ভাত, সবজি, মাছকে প্রাধান্য দেওয়া ভালো। তবে পেট ভরে নয়। এতে ক্লান্তি চলে আসতে পারে। এ সময় খেজুর খাওয়াও স্বাস্থ্যের জন্য ভালো।&nbsp;</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">সাহরিতে কেউ ভরপেট খান, কেউ আবার একদমই খান না। নজরুল ইসলাম বলেন, খেতে হবে, তবে পরিমিত। খাবারে শর্করার উপস্থিতি অবশ্যই থাকতে হবে। অল্প পরিমাণে মাছ, মাংস বা একটা ডিম ও সবজি থাকা উচিত। আর ডাল খেতে বললেন। দই বা দুধও উপকারী।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; text-align: justify; background-color: #f0f0ed;">প্রথম দু-এক দিন একটু কষ্ট হতে পারে। এরপর শরীর সয়ে নেবে। তবে সঠিক ও পরিমিত খাদ্যাভ্যাসই সুস্থ রাখতে সাহায্য করবে।</span>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '2046794681_1495947486.jpg', 1, 0),
(72, 22, 'ট্রেইনড টু কিল গ্রন্থে সিআইএর গুপ্তচর ভেসিয়ানা  ‘কাস্ত্রোকে হত্যায় ব্যর্থ হয়েছি’', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">মার্কিন গোয়েন্দা সংস্থা সিআইএর সাবেক গুপ্তচর আন্তোনিও ভেসিয়ানা কিউবার বিপ্লবী নেতা ফিদেল কাস্ত্রোকে হত্যা ও সেখানকার কমিউনিস্ট সরকার উৎখাতের চেষ্টাকেই জীবনের সবচেয়ে গুরুত্বপূর্ণ দায়িত্ব হিসেবে বেছে নিয়েছিলেন। কাস্ত্রোবিরোধী এই কিউবান এখন বলেন, &lsquo;কাস্ত্রোকে হত্যায় ব্যর্থ হয়েছি&rsquo;। তাঁর জীবনটা এক &lsquo;ব্যর্থতার কাহিনি&rsquo;।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">সহলেখক সাংবাদিক কার্লোস হ্যারিসনের সহযোগিতায় ভেসিয়ানা একটি বই লিখেছেন, যার নাম&nbsp;</span><em style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">ট্রেইনড টু কিল</em><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">। এতে নিজের ব্যর্থতা নিয়ে অসন্তোষের বর্ণনা আছে, তবে কোনো আফসোসের কথা নেই। ভেসিয়ানার ভাষ্য, &lsquo;আমি সন্ত্রাসী হিসেবে অনুপযুক্ত ছিলাম। চিমসে, শ্বাসকষ্টের রোগীর মতো এবং নিরাপত্তার ভয়ে জর্জরিত থাকতাম।&rsquo;</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">৮৮ বছর বয়সী ভেসিয়ানা যুক্তরাষ্ট্রের মায়ামিতে মেয়ের বাড়িতে বসে বলছিলেন, তিনি সন্ত্রাসীর কাজ করতেন। তবে সেটার অন্য নাম ছিল। নিজের বইয়ে তিনি লিখেছেন কীভাবে সিআইএর কর্মী ডেভিড ফিলিপস ১৯৫৯ সালে তাঁকে কাজ দিয়েছিলেন। হাভানায় গিয়ে কাস্ত্রোকে হত্যার জন্য প্রশিক্ষণও দেন ফিলিপস। সেই কাস্ত্রো গত বছর স্বাভাবিক মৃত্যুবরণ করেন।</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">ভেসিয়ানা একসময় কিউবার ন্যাশনাল ব্যাংকের হিসাবরক্ষকের কাজ করতেন। আর সিআইএর নির্দেশে দেশটিকে অস্থিতিশীল করার লক্ষ্যে নানা গুজব ছড়াতেন। এতে বহু মা-বাবা তাঁদের সন্তানদের নিরাপত্তার স্বার্থে যুক্তরাষ্ট্রে পাঠিয়ে দেন। ভেসিয়ানা বলেন, মা-বাবা ও সন্তানদের এমন বিচ্ছেদ ঘটানোর নেপথ্যে কাজ করেছেন বলে তাঁর কোনো অনুতাপ নেই। কারণ, তখন তিনি ঠিক মনে করেই এ দায়িত্ব নিয়েছিলেন।&nbsp;</span>', 4, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '272026411_1495948039.jpg', 1, 0);
INSERT INTO `news` (`id`, `category_id`, `headline`, `description`, `reporter_id`, `news_date`, `news_time`, `news_add_date`, `news_type_id`, `position_id`, `region_id`, `language_id`, `image`, `status`, `count_view`) VALUES
(73, 28, ' জ্বর হলেই ওষুধ নয়', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">চারদিকে অনেকেই জ্বরে আক্রান্ত। কারও ফ্লু, কারও ডেঙ্গু, কারও আবার চিকুনগুনিয়া। এমনিতে জ্বর কিন্তু খারাপ নয়। শরীরের যেকোনো সংক্রমণ বা প্রদাহের বিপরীতে প্রথম প্রতিরোধব্যবস্থা হলো জ্বর।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">শরীরের তাপমাত্রা ৯৯ ডিগ্রি ফারেনহাইটের ওপর গেলে জ্বর হয়েছে বলে ধরা যায়। জ্বর হলেই যে ডাক্তারের কাছে ছুটতে হবে বা ওষুধ খেয়ে জ্বর নামাতে হবে, ব্যাপারটি তা নয়। বেশির ভাগ জ্বরই ভাইরাসজনিত। এতে কোনো ওষুধ লাগে না। এমনিতেই পাঁচ থেকে সাত দিন পর সেরে যায়।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">জ্বর নামাতে শরীরের নিজস্ব কৌশল আছে। কাঁপুনি ও শীত শীত অনুভূতির মাধ্যমে জ্বর আসে। এরপর ঘাম দিয়ে ছেড়ে যায়। এ সময় শরীর বাড়তি তাপমাত্রা হারায়।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">জ্বরে কাবু হলে বাড়িতে কিছু কৌশলের মাধ্যমে নামানোর চেষ্টা করতে পারেন। এতে কাজ না হলে সাধারণ প্যারাসিটামল-জাতীয় ওষুধ খাওয়া যায়। তবে চিকিৎসককে না জানিয়ে কখনোই দোকান থেকে অ্যান্টিবায়োটিক কিনে খাবেন না। অ্যাসপিরিন বা আইবুপ্রোফেন-জাতীয় ওষুধও না। তাহলে আসুন জেনে নিই বাড়িতে আমরা কী ব্যবস্থা নিতে পারি।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">১. খুব জ্বর এলে হালকা গরম পানি দিয়ে গোসল করে নিতে পারেন। পানির তাপমাত্রা আপনার শরীরের তাপমাত্রার চেয়ে দুই ডিগ্রি কম হবে। বাথটাবে বা ঝরনার ধারায় গোসল করা ভালো। বাড়তি তাপমাত্রা পানিতে চলে যাবে। ১৫ থেকে ২০ মিনিটের বেশি ভিজবেন না। গোসল সেরে দ্রুত শুকনো তোয়ালে দিয়ে পানি মুছে নিন। বিছানায় কাঁথা বা কম্বলের নিচে ঢুকে পড়ুন। দেখবেন একটু পর ঘাম দিয়ে জ্বর ছেড়ে যাচ্ছে।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">২. গোসল সম্ভব না হলে শরীরের ত্বক স্পঞ্জ করতে পারেন। পরিষ্কার সুতির পাতলা কাপড় গামলার পানিতে ভিজিয়ে চিপে নিন। পানির তাপমাত্রা স্বাভাবিক থাকবে (গরম বা বরফ-ঠান্ডা নয়)। এবার এই ভিজে কাপড় দিয়ে সারা শরীর মুছে নিন। ভেজা কাপড় দিয়ে মোছার পর শুকনো কাপড়ের সাহায্যে পানি মুছে নিন। জ্বর না কমা পর্যন্ত এটা করতে থাকুন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">৩. জ্বরের মধ্যে হারবাল ও গ্রিন চা বেশ কাজে দেয়। চায়ের মধ্যে এক টুকরো আদা, এলাচি, লবঙ্গ বা খানিকটা মধু মিশিয়ে এই হারবাল চা তৈরি করা যায়। অথবা এক বাটি গরম স্যুপ খেলেও দেখবেন ঘাম হচ্ছে এবং জ্বর নেমে যাচ্ছে। এক কাপ পানিতে দুই চামচ আপেল সিডার ভিনেগার ও এক চামচ মধু মিশিয়ে দিনে দু-তিনবার পান করুন। এটি শরীরের তাপমাত্রা বেরিয়ে যেতে সাহায্য করে।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">৪. জ্বর হলে শরীর দ্রুত পানিশূন্য হয়ে পড়ে। তাই প্রচুর পানি ও তরলজাতীয় খাবার খেতে হবে। নয়তো জিব শুকিয়ে যাবে। প্রস্রাবের পরিমাণ কমে যাবে বা গাঢ় হয়ে যাবে। তাই জ্বর হলে দিনে দুই থেকে আড়াই লিটার পানি পান করুন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">৫. জ্বর হলে শরীরের বিপাকক্রিয়া বাড়ে। তাই বাড়তি ক্যালরির প্রয়োজন হয়। অনেকে জ্বর হলে কিছু খাবেন না বলে ঠিক করেন। এতে নিজেরই ক্ষতি। অল্প হলেও পুষ্টিকর কিছু খেতে হবে। জ্বরের রোগীর পথ্য বলে আসলে কিছু নেই। সবই খাওয়া যায়। তবে তেল-মসলাযুক্ত খাবার হজম করতে কষ্ট হয়। বিপাকে ক্যালরিও বেশি খরচ হয়। তাই সহজপাচ্য খাবারই ভালো। সবজি মেশানো জাউভাত, পরিজ, ওটমিল, স্যুপ ইত্যাদি যথেষ্ট পুষ্টি জোগাবে। ফলের রস বা ফল খেতে চেষ্টা করুন। বিশেষ করে ভিটামিন সি-যুক্ত ফল, যেমন: কমলা, মালটা, লেবু, জাম্বুরা, আনারস ইত্যাদি। ভিটামিন সি রোগ প্রতিরোধে সাহায্য করবে।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">জ্বর ১০৫ ডিগ্রির ওপর উঠে গেলে অনেক কাশি, পেটব্যথা, প্রস্রাবে জ্বালা, বেশি বমি হলে, জ্বরের ঘোরে অসংলগ্ন আচরণ করলে বা অচেতনের মতো হলে অবশ্যই দ্রুত হাসপাতালে নেওয়া জরুরি। এক সপ্তাহের বেশি জ্বর থাকলে চিকিৎসকের পরামর্শ দরকার।</p>', 4, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '607805101_1495948427.jpg', 1, 1),
(74, 28, ' ভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্য', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">অসুখ-বিসুখে আক্রান্ত ব্যক্তিরা রোজা রাখার ক্ষেত্রে প্রয়োজনীয় শারীরিক পরীক্ষা-নিরীক্ষা ও ওষুধ সেবন নিয়ে অনেক সময় বিভ্রান্তিতে পড়েন। এ নিয়ে বিভ্রান্তি দূর করতে ১৯৯৭ সালের জুনে মরক্কোয় অনুষ্ঠিত নবম ফিকাহ-চিকিৎসা সম্মেলনে গুরুত্বপূর্ণ কয়েকটি সিদ্ধান্ত গৃহীত হয়। ওই সম্মেলনে জেদ্দা ইসলামিক ফিকাহ অ্যাকাডেমি, আল আজহার ইউনিভার্সিটি, বিশ্বস্বাস্থ্য সংস্থা এবং ইসলামিক শিক্ষা বিজ্ঞান ও সংস্কৃতি সংস্থা (আইএসইএসসিও) প্রভৃতি শীর্ষ ইসলামি প্রতিষ্ঠানের প্রতিনিধিরা অংশ নেন। রোজা পালনরত অবস্থায় কী কী পরীক্ষা-নিরীক্ষা করলে এবং ওষুধ প্রয়োগে রোজা নষ্ট হবে না, সে বিষয়ে সঠিক দিকনির্দেশনাই তাঁদের মূল আলোচনার বিষয় ছিল। ওই সম্মেলনে গৃহীত সিদ্ধান্ত অনুযায়ী অসুস্থ অবস্থায় কয়েকটি ওষুধ গ্রহণ এবং পরীক্ষা-নিরীক্ষা করলে রোজার কোনো ক্ষতি হবে না। যেমন: রোজা পালনরত অবস্থায় চোখ, নাক ও কানের ড্রপ, স্প্রে, ইনহেলার ব্যবহার করা যাবে। হৃদ্&zwnj;যন্ত্রের এনজাইনার সমস্যায় বুকে ব্যথা উঠলে নাইট্রোগ্লিসারিন ট্যাবলেট বা স্প্রে জিহ্বার নিচে ব্যবহার করলে রোজা নষ্ট হবে না। কোনো ওষুধ ত্বক, মাংসপেশি, শিরা, হাড়ের জোড়ায় ইনজেকশন হিসেবে প্রয়োগ করা যাবে। তবে স্যালাইন বা গ্লুকোজ জাতীয় কোনো তরল শিরাপথে গ্রহণ করা যাবে না। চিকিৎসার প্রয়োজনে অক্সিজেন কিংবা চেতনানাশক গ্যাস নিলে রোজা নষ্ট হবে না। ক্রিম, মলম, ব্যান্ডেজ, প্লাস্টার ইত্যাদি ব্যবহার করলে এবং এসব উপাদান ত্বকের গভীরে প্রবেশ করলেও কোনো সমস্যা হবে না। রোজা রেখে দাঁত তোলা, দাঁতের ফিলিং করানো ও ড্রিল ব্যবহার করা যাবে। রোজা রেখে রক্ত পরীক্ষার জন্য রক্তের নমুনা দেওয়া যাবে। রক্তদান বা রক্ত গ্রহণ করতেও বাধা নেই। চিকিৎসার জন্য যোনিপথে ট্যাবলেট কিংবা পায়ুপথে সাপোজিটরি ব্যবহারে রোজার কোনো ক্ষতি হয় না। হার্ট কিংবা অন্য কোনো অঙ্গের এনজিওগ্রাফি করার জন্য রোগনির্ণায়ক দ্রবণ শরীরে প্রবেশ করানো যাবে। রোগনির্ণয়ের জন্য এন্ডোসকোপি বা গ্যাস্ট্রোস্কোপি করা যাবে। তবে এসব পরীক্ষার সময় শরীরের ভেতরে খাদ্যগুণসম্পন্ন কোনো তরল বা অন্য কিছু প্রবেশ করানো যাবে না। রোজা পালনরত অবস্থায় মাউথওয়াশ, মুখের স্প্রে না গিলে ব্যবহার করা যাবে এবং গড়গড়া করা যাবে। রোজা রেখে বায়োপসি ও ডায়ালাইসিস করা যাবে।</span>', 5, '2017-05-28', '', '0000-00-00', 0, 0, 0, 0, '', 1, 0),
(75, 28, '৬ শতাধিক কর্মী নেবে সাজেদা ফাউন্ডেশন', '<p class="Hdg4col5col" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">সাজেদা ফাউন্ডেশন একটি বেসরকারি উন্নয়ন সংস্থা। প্রতিষ্ঠানটি নয়টি পদে ছয় শতাধিক কর্মী নেবে। এই নিয়োগের বিষয়টি পত্রিকায় প্রকাশিত এক বিজ্ঞপ্তি থেকে জানা গেছে। এই নিয়োগ বিজ্ঞপ্তিটি ২০ মে&nbsp;<em style="padding: 0px; margin: 0px; outline: 0px;">প্রথম আলো</em>র ১৭ নম্বর পৃষ্ঠায় পাওয়া যাবে।<br style="padding: 0px; margin: 0px; outline: 0px;" /><br style="padding: 0px; margin: 0px; outline: 0px;" />প্রকাশিত বিজ্ঞপ্তি অনুযায়ী, প্রতিষ্ঠানটিতে হেড অব মনিটরিং ডিপার্টমেন্ট পদে ১ জন, মনিটরিং কর্মকর্তা পদে ৪ থেকে ৫ জন, রিজিওনাল ম্যানেজার বা ক্লাস্টার লিডার পদে ৪ থেকে ৬ জন, এলাকা সমন্বয়কারী পদে ৬ থেকে ৭ জন, শাখা ব্যবস্থাপক পদে ২০ থেকে ৩০ জন, ক্ষুদ্র উদ্যোগ ঋণ কর্মকর্তা পদে ৫০ জন, মাঠ কর্মকর্তা পদে ৫০০ জন, ফাইন্যান্স সুপারভাইজার পদে ১০ জন ও অ্যাসিস্ট্যান্ট অ্যাকাউন্টস অফিসার পদে ৩০ জন নিয়োগ হবে। পদগুলোতে আবেদন করা যাবে ৩১ মে পর্যন্ত।<br style="padding: 0px; margin: 0px; outline: 0px;" /><br style="padding: 0px; margin: 0px; outline: 0px;" />পদগুলোতে আবেদন করতে হলে প্রার্থীদের স্বীকৃত কোনো বিশ্ববিদ্যালয় থেকে স্নাতকোত্তর অথবা সমমানের পরীক্ষায় পাস হতে। শুধু মাঠ কর্মকর্তা ও অ্যাসিস্ট্যান্ট অ্যাকাউন্টস অফিসার পদের প্রার্থীরা স্নাতক বা সমমান উত্তীর্ণ হলেই আবেদন করতে পারবেন। পদভেদে প্রার্থীদের অভিজ্ঞতা থাকতে হবে। বয়স পদ অনুযায়ী ৩০ থেকে ৪৫ বছরের মধ্যে হতে হবে। পদভেদে প্রার্থীদের মোটরসাইকেল, বাইসাইকেল ও কম্পিউটার চালনায় পারদর্শী হতে হবে। প্রার্থীদের বৈধ লাইসেন্সধারী হতে হবে।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">আগ্রহী প্রার্থীদের পূর্ণাঙ্গ জীবনবৃত্তান্ত সদ্য তোলা এক কপি রঙিন ছবি এবং রেফারেন্স হিসেবে আত্মীয় নন এমন দুজন ব্যক্তির নাম, পেশা, ঠিকানা, মোবাইল নম্বরসহ মানবসম্পদ বিভাগ, সাজেদা ফাউন্ডেশন, বাড়ি-২৮, রোড-৭, ব্লক-সি, নিকেতন হাউজিং সোসাইটি, গুলশান-১, ঢাকা এই ঠিকানায় আবেদনপত্র পাঠাতে হবে। আবেদনপত্রে বর্তমানে কর্মরত প্রতিষ্ঠানের নাম ও ঠিকানা এবং বর্তমানে সচল মোবাইল ফোন নম্বর ও খামের ওপর পদের নাম লিখতে হবে। পদভেদে প্রার্থীদের চূড়ান্ত নিয়োগের সময় ৫ হাজার টাকা (ছয় মাস পর ফেরতযোগ্য) জামানত দিতে হবে। সব পদে নির্বাচিত প্রার্থীদের চূড়ান্ত নিয়োগের সময় প্রার্থীর পক্ষে একজন জামিনদারকে (চাকরিজীবী) প্রধান কার্যালয়ে উপস্থিত হয়ে ৩০০ টাকার স্ট্যাম্পে স্বাক্ষর করতে হবে বলে বিজ্ঞপ্তিতে বলা আছে।</p>\n<p class="TEXT" style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">চূড়ান্তভাবে নিয়োগপ্রাপ্তদের অভিজ্ঞতা ও যোগ্যতা অনুযায়ী এবং আলোচনা সাপেক্ষে বেতন দেওয়া হবে। এ ছাড়া বছরে দুটি উৎসব ভাতা, প্রভিডেন্ট ফান্ড, গ্র্যাচুইটি, মোবাইল ফোন ভাতা, ছুটি নগদায়ন, মোটরসাইকেল জ্বালানি খরচ ও অন্যান্য আনুষঙ্গিক সুবিধা দেওয়া হবে।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">&nbsp;</p>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '319003432_1495948590.jpg', 1, 0),
(76, 25, 'আব্রামের জন্মদিনে করণের শুভেচ্ছা', '<span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">বলিউড বাদশা শাহরুখ খানের দুজন খুব কাছের মানুষের জন্ম মে মাসে। একজন তাঁর চোখের মণি, ছোট ছেলে আব্রাম। আরেকজন প্রিয় বন্ধু করণ জোহর। আর মজার ব্যাপার হলো, তাদের দুজনের জন্মদিনই পরপর। গতকাল শুক্রবার ছিল নির্মাতা করণ জোহরের জন্মদিন। আর আজ শনিবার জন্মদিন আব্রামের। এবার চার বছরে পা দিল আব্রাম। আর তারকাদের মধ্যে সবার আগে তাঁকে জন্মদিনের শুভেচ্ছা জানিয়েছেন করণ।</span><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">করণ ছবি শেয়ারিং সাইট ইনস্টাগ্রামে আব্রামের একটি ছবি পোস্ট করে লিখেছেন, &lsquo;পৃথিবীর সবচেয়ে আদুরে শিশু। শুভ জন্মদিন মিথুন রাশির জাতক।&rsquo;</span><br style="padding: 0px; margin: 0px; outline: 0px; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;" /><span style="font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 18px; background-color: #f0f0ed;">গতবার লন্ডনে করণ জোহরের জন্মদিনে মা-বাবার সঙ্গে আব্রামও উপস্থিত ছিল। সেই পার্টি শেষ হতে না হতেই শুরু হয়েছিল আব্রামের জন্মদিনের পার্টি। এবার অবশ্য করণ জোহরের জন্মদিনে বাবা শাহরুখ খানের সঙ্গী হয়েছিলেন বড় ছেলে আরিয়ান। আরিয়ানকে নিজের ছেলের মতো দেখেন করণ। বলিউডে আরিয়ানের অভিষেকও যে করণের হাত ধরেই হবে, সেই বিষয়ে কোনো সন্দেহ নেই।&nbsp;</span>', 5, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '750183988_1495948746.jpg', 1, 0),
(77, 25, ' দিশার বায়না!', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">বায়না ধরেছেন &lsquo;ধোনি: দ্য আনটোল্ড স্টোরি&rsquo;খ্যাত নায়িকা দিশা পাটানি। তাঁর বায়না শুনে কপালে ভাঁজ পড়েছে বলিউড চলচ্চিত্র নির্মাতাদের। খ্যাতির সঙ্গে সঙ্গে বেড়েছে এই অভিনেত্রীর চাহিদা। অনেকেই চাইছেন, তাঁকে নিয়ে কাজ করতে। কিন্তু সতর্ক হয়ে উঠেছেন দিশা। খুব ভেবে-চিন্তে স্বাক্ষর করছেন ছবির চুক্তিপত্রে। এমনকি কোনো কোনো ছবিতে স্বাক্ষরের আগে নির্মাতাদের দিকে ছুড়ে দিচ্ছেন নানা শর্ত। সেসব নিয়ে মহা ফ্যাসাদে পড়ছেন কেউ কেউ।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">দিশার ঘনিষ্ঠ একটি সূত্র জানিয়েছে নায়িকার নতুন বায়নার কথা। দিশা বলে দিয়েছেন, &lsquo;বলিউডের চারজন ছাড়া আর কারও সঙ্গেই কিন্তু কাজ করব না।&rsquo; এখন কোনো ছবিতে তাঁকে নায়িকা হিসেবে নিতে চাইলে আগে অবশ্যই ভাবতে হচ্ছে ওই চার তারকাকে। দিশার পছন্দের এই চার বলিউড তারকা হলেন রণবীর কাপুর, রণবীর সিং, বরুণ ধাওয়ান এবং টাইগার শ্রুফ! এই চার নায়ক না থাকলে চিত্রনাট্য শুনতেও রাজি হচ্ছেন না এই অভিনেত্রী।<br style="padding: 0px; margin: 0px; outline: 0px;" />প্রকৃত অর্থেই খুব বুঝে শুনে পা ফেলছেন এই অভিনেত্রী। তাঁর সামনের ছবিগুলোর তালিকা দেখেই সেটা বোঝা যাচ্ছে। এগুলোর তালিকায় আছে রবি গ্রেওয়াল পরিচালিত ছবি &lsquo;রোমিও আকবর ওয়ালটর&rsquo;। এ ছবিতে সম্ভবত তাঁকে দেখা যাবে তাঁর লাকি নায়ক সুশান্ত সিং রাজপুতের বিপরীতে। আছে করণ জোহরের &lsquo;স্টুডেন্ট অব দ্য ইয়ার ২&rsquo;, যেখানে দিশা জুটি বাঁধবেন প্রেমিক টাইগার শ্রুফের সঙ্গে। কানাঘুষো শোনা যাচ্ছে, পরিচালক আশুতোষ গোয়ারিকর তাঁর আগামী ছবি &lsquo;হানিমুন&rsquo;-এর জন্য দিশাকে পছন্দ করেছেন। এ ছবির চিত্রনাট্য পছন্দ হলেও, নায়ক পছন্দ হবে কি? কারণ এ ছবিতে দিশার বিপরীতে থাকবেন ফারহান আখতার। পছন্দের তালিকায় তো নেই তিনি!</p>', 2, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1290044282_1495949138.jpg', 1, 1),
(78, 25, '‘পদ্মাবতী’-র সেটে আহত রণবীর', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">অভিনেতা হিসেবে রণবীর সিংয়ের বড় গুণ হলো তিনি যখন কোনো চরিত্রে অভিনয় করেন, তখন তাঁর মধ্যে এমনভাবে বুঁদ হয়ে যান যে বাস্তবে কী ঘটছে, তার আর কোনো খেয়াল থাকে না। তবে চরিত্রের ভেতর ডুবে যাওয়ার কিছু খারাপ দিকও আছে। সম্প্রতি &lsquo;পদ্মাবতী&rsquo;-র সেটে যেমন আলাউদ্দিন খিলজির চরিত্রে একটি দৃশ্যে অভিনয় করতে গিয়ে মাথায় প্রচণ্ড আঘাত পেয়েছেন রণবীর। কিন্তু দৃশ্য &lsquo;কাট&rsquo; না করা পর্যন্ত রণবীরকে দেখে বিষয়টা কেউ টেরই পাননি। টের পাবেন কীভাবে? রণবীর সিং কাউকে কিছু বুঝতে না দিয়ে যে দিব্যি অভিনয় চালিয়ে যাচ্ছিলেন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">সিনেমার সঙ্গে সংশ্লিষ্ট একটি সূত্র জানায়, দৃশ্যটি শেষ হওয়ার পর সবাই দেখেন রণবীরের মাথা থেকে গলগল করে রক্ত পড়ছে। সে সময় তাঁকে শুটিং সেটেই প্রাথমিক চিকিৎসা দেওয়া হয়। এরপর সেখান থেকে তাঁকে দ্রুত কাছের একটি হাসপাতালে নিয়ে যাওয়া হলে চিকিৎসক জানান, তাঁর মাথায় সেলাই দিতে হবে। কিন্তু রণবীর হাসপাতাল থেকে ফিরেই আবার কাজে নেমে পড়েন। আঘাতের কারণে শুটিং থেকে বিরতি না নিয়ে পুরো দিনের শুটিং শেষ করেন এই অভিনেতা।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">রণবীর সিংয়ের প্রেমিকা দীপিকা পাড়ুকোন এই সিনেমার মূল চরিত্রে অভিনয় করেছেন। রণবীরের আঘাতের সময় তিনিও সেটে উপস্থিত ছিলেন কি না, তা জানা যায়নি। জুম টিভি।</p>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '1677935273_1495949197.jpg', 1, 1),
(79, 26, ' ভুয়া অ্যাকাউন্ট খুলে বান্ধবীকে হয়রানি!', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">মেয়েটি তাঁর বাড়ির দরজায় কোনো আগন্তুকের কথা শুনলেই আঁতকে উঠতেন। রাতের বেলা বিভিন্ন আগন্তুক তাঁর বাড়ির দরজায় কড়া নাড়তেন। তাঁর ধারণা, সাবেক প্রেমিক অনলাইনে তাঁর নামে ভুয়া অ্যাকাউন্ট খুলে এসব আগন্তুককে রাতের বেলা আসার জন্য বাড়ির ঠিকানা দিয়েছে। এতে পুরো এক সপ্তাহ ধরে তাঁকে হয়রানির শিকার হতে হয়েছে। এরপর বাধ্য হয়ে পুলিশের শরণাপন্ন হয়েছেন তিনি। ঘটনাটি কানাডার এডমন্টনের। মেয়েটির অভিযোগ, চার দিনে ৩০ জনের বেশি আগন্তুক তাঁর খোঁজে বাড়ি পর্যন্ত চলে এসেছে। ঘটনাটি পুলিশ তদন্ত শুরু করেছে।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ওই নারীর অভিযোগ, খুব বিপদ ঘটে যেতে পারত। কারণ, তাঁর সঙ্গে আট বছরের বাচ্চাও থাকে। কিন্তু তাঁর নামে যে অ্যাকাউন্টগুলো খোলা হয়েছিল, সব কটিই ভুয়া। সাবেক প্রেমিক &lsquo;প্রতিশোধ&rsquo; নিতে বা হয়রানি করতে ওই অ্যাকাউন্টগুলো খুলেছে। আগন্তুকদের অত্যাচারে শেষ পর্যন্ত বাড়ি ছাড়তে হয়েছে তাঁকে। সাবেক বন্ধুকে দায়ী করে অভিযোগ দাখিল করায় তিনি ই-মেইলে হুমকি পেয়েছিলেন বলেও জানান।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">মেয়েদের নামে ফেসবুকসহ ডেটিং সাইটগুলোতে ভুয়া অ্যাকাউন্ট খুলে হয়রানির ঘটনা বাড়ছে। এ ধরনের ঘটনাগুলোকে বিশেষজ্ঞরা বলেন &lsquo;সাইবার রিভেঞ্জ&rsquo;। অনলাইনে এ ধরনের হয়রানি ঘটলে অনেকেই উদ্বেগে পড়ে যান এবং করণীয় ঠিক করতে পারেন না। নানা চেষ্টা করে অনলাইন সাইটগুলোয় প্রোফাইল বন্ধ করা যায় না। প্রতিষ্ঠানগুলোতে ই-মেইল করলেও সরাসরি সাড়া পাওয়া যায় না। তাই এ ধরনের ঘটনার শিকার হলে আইনশৃঙ্খলা রক্ষাকারী বাহিনীর শরণাপন্ন হওয়ার পরামর্শ দেন বিশেষজ্ঞরা।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">গবেষকেরা বলেন, নারী ও কিশোরীরা এ ধরনের সাইবার সহিংসতার প্রাথমিক লক্ষ্য হওয়ার ঝুঁকিতে রয়েছেন। যুক্তরাষ্ট্রভিত্তিক গবেষণা প্রতিষ্ঠান পিউ রিসার্চ সেন্টারের ২০১৪ সালের সমীক্ষায় বলা হয়, অনলাইন সহিংসতা লিঙ্গ ও বয়সভেদে বেশি দেখা যায়। যুক্তরাষ্ট্রে ২ হাজার ৮৪৯ জনকে নিয়ে চালানো সমীক্ষায় দেখা যায়, ১৮ থেকে ২৪ বছর বয়সী ২৬ শতাংশ নারী অনলাইনে হয়রানির শিকার হয়েছেন। এ ছাড়া ২৫ শতাংশ নারী অনলাইনে যৌন নিপীড়নের কথা বলেছেন। পুরুষের ক্ষেত্রে ৭ শতাংশ তরুণ অনলাইন নিপীড়ন ও ১৩ শতাংশ অনলাইন যৌন হয়রানির শিকার হওয়ার কথা বলেন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">কানাডার সাইবার অপরাধ বিভাগের ভারপ্রাপ্ত সার্জেন্ট ফিল হকিন্সের মতে, অনলাইনে হয়রানি বেড়ে যাচ্ছে। এটা এখন প্রায়ই উৎপীড়ন হিসেবে, আবারও কখনো সম্পর্ক খারাপ হয়ে গেলে দেখা যাচ্ছে। ইন্টারনেট মানুষের হাতে এখন নিপীড়নের এ প্রোগ্রাম তুলে দিয়েছে।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">তবে বিশেষজ্ঞরা বলেন, ইন্টারনেটে এ ধরনের অপকর্ম করে নিজের পরিচয় লুকিয়ে রাখার সুযোগ নেই। এ ধরনের অপকর্ম করে অনেকেই ভাবেন, তাঁদের পরিচয় কেউ জানবে না, তাঁরা পার পেয়ে যাবেন। কিন্তু তাঁদের সে সুযোগ নেই। কারণ, ইন্টারনেটে লুকানোর কোনো জায়গা নেই। আইনশৃঙ্খলা রক্ষাকারী বাহিনী সহজেই অপরাধীকে খুঁজে বের করতে সক্ষম। কারণ, সাইবার রিভেঞ্জের ক্ষেত্রে ডিজিটাল ফুটপ্রিন্ট তো থেকেই যায়। তবে সবাইকে এ বিষয়ে সচেতন হতে হবে। অনলাইনে ব্যক্তিগত তথ্য দেওয়ার ক্ষেত্রে যথেষ্ট সতর্ক হতে হবে।</p>', 2, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '887356312_1495949358.jpg', 1, 1),
(80, 26, ' এইচপি আনল নতুন ল্যাপটপ নিজস্ব ', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">দেশের বাজারে ওমেন সিরিজের দুটি মডেলের ল্যাপটপ উদ্বোধন করেছে এইচপি। আজ বুধবার রাজধানীর একটি হোটেলে আনুষ্ঠানিকভাবে ১৫-এএক্স ২২০ টিএক্স ও ২২১ টিএক্স মডেলের ল্যাপটপ দুটি উদ্বোধন করেছে এইচপি কর্তৃপক্ষ।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">অনুষ্ঠানে এইচপির কর্মকর্তারা বলেন, সাধারণত ল্যাপটপের বিভিন্ন যন্ত্রাংশের বিবেচনায় বিভিন্ন সিরিজের নাম ঘোষণা করা হয়। এ ক্ষেত্রে ওমেন সিরিজ হচ্ছে গেমিং ল্যাপটপ।<br style="padding: 0px; margin: 0px; outline: 0px;" />এইচপির কর্মকর্তারা জানান, নোটবুক পিসি হিসেবে ওমেন সিরিজে উন্নত প্রসেসর ও গ্রাফিকস ব্যবহার করা হয়েছে। ইনটেল কোর আই ৭ প্রসেসর, ৮ জিবি র&zwj;্যাম, এনভিডিয়া জিফোর্স জিটিএক্স ১০৫০ গ্রাফিকস আছে এতে। এতে ব্যবহৃত হয়েছে ১২৮ জিবি এসএসডি। ১৫ দশমিক ৬ ইঞ্চি মাপের ডিসপ্লেযুক্ত নোটবুকটির দাম ১ লাখ ১৫ হাজার টাকা। ২২১ টিএক্স মডেলের ল্যাপটপটিতে ব্যবহৃত হয়েছে ১৬ জিবি র&zwj;্যাম ও জিফোর্স জিটিএক্স ১০৫০ টিআই গ্রাফিকস কার্ড। এ মডেলের নোটবুকটির দাম ১ লাখ ৪০ হাজার টাকা।</p>', 3, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '922106578_1495949443.jpg', 1, 0),
(81, 26, ' সারফেস ল্যাপটপ আনল মাইক্রোসফট', '<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">উইন্ডোজ ১০ এস অপারেটিং সিস্টেমনির্ভর সারফেস ল্যাপটপ আনল মাইক্রোসফট। ২ মে নিউইয়র্ক সিটিতে এক অনুষ্ঠানে মাইক্রোসফট ডিভাইসেস বিভাগের প্রধান প্যানস প্যানায় সাড়ে ১৩ ইঞ্চি মাপের এই ল্যাপটপের ঘোষণা দেন।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">প্যানায় বলেন, যে শিক্ষার্থীরা হাইস্কুল ছাড়ার পথে, তাঁদের লক্ষ্য করে মাইক্রোসফট এ ল্যাপটপ বাজারে আনছে। অনেকের সঙ্গে আলাপ করে দেখা গেছে, সবাই সারফেস ল্যাপটপ চায়। তাই সুন্দর একটি ল্যাপটপ বাজারে আনা হলো।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ল্যাপটপটিতে নতুন উইন্ডোজ ১০ এস অপারেটিং সিস্টেম ব্যবহার করায় এতে উইন্ডোজ স্টোর থেকে অ্যাপ ডাউনলোড করতে হবে। ল্যাপটপটিতে পিক্সেলসেন্স ডিসপ্লে ব্যবহৃত হয়েছে, যাতে সারফেস পেন সমর্থন করবে। ইনটেল কোর আই ৫ ও কোর আই ৭ প্রসেসর মডেলে এটি পাওয়া যাবে। এর ব্যাটারি লাইফ হবে সাড়ে ১৪ ঘণ্টা।</p>\n<p style="padding: 0px; margin: 0px 0px 16px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">মাইক্রোসফটের দাবি, সারফেস ল্যাপটপ আই ৭ ম্যাকবুক প্রোর চেয়ে দ্রুত কাজ করবে। এতে ম্যাকবুক এয়ারের চেয়ে বেশিক্ষণ ব্যাটারি চলবে।</p>\n<p style="padding: 0px; margin: 0px; outline: 0px; overflow: hidden; font-size: 18px; line-height: 30px; word-wrap: break-word; font-family: SolaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; background-color: #f0f0ed;">ল্যাপটপ যাতে গরম না হয়, এ জন্য নকশায় অ্যালুমিনিয়াম কাঠামোতে বাষ্প চেম্বার যুক্ত করেছে মাইক্রোসফট। কোর আই ৫ সংস্করণটিতে ৪ জিবি র&zwj;্যাম ও ১২৮ জিবি এসএসডি থাকবে। এর দাম হবে ৯৯৯ মার্কিন ডলার।&nbsp;</p>', 1, '2017-05-28', '', '0000-00-00', 0, 2, 0, 0, '146300528_1495949593.jpg', 1, 1),
(82, 21, 'সারফেস ল্যাপটপ আনল মাইক্রোসফট', 'Technolead is a leading Systems, Solutions and Technical Services Company in Sylhet, Bangladesh.  We solve our customer''s mission-critical problems with innovative applications of technology, products and expertise. Our IT support services have been specifically designed for SMEs and corporate businesses and deliver a high-quality and cost-effective solution that can meet all your support needs. We understand your needs. Our Developer and Designer help you to Customized Software, Design Website, Graphics Design, Develop Android Application, IOS Development. We also do Outsourcing Work. You just tell your need, we will do this for you.  We save Your Time ,Energy and Resources.', 1, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1162905042_1501357018.jpg', 1, 5);
INSERT INTO `news` (`id`, `category_id`, `headline`, `description`, `reporter_id`, `news_date`, `news_time`, `news_add_date`, `news_type_id`, `position_id`, `region_id`, `language_id`, `image`, `status`, `count_view`) VALUES
(83, 21, 'বন্ধুকে শেষবিদায় বোল্টের', 'উইন্ডোজ ১০ এস অপারেটিং সিস্টেমনির্ভর সারফেস ল্যাপটপ আনল মাইক্রোসফট। ২ মে নিউইয়র্ক সিটিতে এক অনুষ্ঠানে মাইক্রোসফট ডিভাইসেস বিভাগের প্রধান প্যানস প্যানায় সাড়ে ১৩ ইঞ্চি মাপের এই ল্যাপটপের ঘোষণা দেন।উইন্ডোজ ১০ এস অপারেটিং সিস্টেমনির্ভর সারফেস ল্যাপটপ আনল মাইক্রোসফট। ২ মে নিউইয়র্ক সিটিতে এক অনুষ্ঠানে মাইক্রোসফট ডিভাইসেস বিভাগের প্রধান প্যানস প্যানায় সাড়ে ১৩ ইঞ্চি মাপের এই ল্যাপটপের ঘোষণা দেন।', 3, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '699824487_1501357129.png', 1, 1),
(84, 22, 'ভুয়া অ্যাকাউন্ট খুলে বান্ধবীকে হয়রানি!', 'অভিনেতা হিসেবে রণবীর সিংয়ের বড় গুণ হলো তিনি যখন কোনো চরিত্রে অভিনয় করেন, তখন তাঁর মধ্যে এমনভাবে বুঁদ হয়ে যান যে বাস্তবে কী ঘটছে, তার আর কোনো খেয়াল থাকে না।', 3, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '2004274898_1501357196.png', 1, 2),
(85, 22, 'আব্রামের জন্মদিনে করণের শুভেচ্ছা', 'ভিনেতা হিসেবে রণবীর সিংয়ের বড় গুণ হলো তিনি যখন কোনো চরিত্রে অভিনয় করেন, তখন তাঁর মধ্যে এমনভাবে বুঁদ হয়ে যান যে বাস্তবে কী ঘটছে, তার আর কোনো খেয়াল থাকে না।ভিনেতা হিসেবে রণবীর সিংয়ের বড় গুণ হলো তিনি যখন কোনো চরিত্রে অভিনয় করেন, তখন তাঁর মধ্যে এমনভাবে বুঁদ হয়ে যান যে বাস্তবে কী ঘটছে, তার আর কোনো খেয়াল থাকে না।ভিনেতা হিসেবে রণবীর সিংয়ের বড় গুণ হলো তিনি যখন কোনো চরিত্রে অভিনয় করেন, তখন তাঁর মধ্যে এমনভাবে বুঁদ হয়ে যান যে বাস্তবে কী ঘটছে, তার আর কোনো খেয়াল থাকে না।…..', 5, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1544605258_1501357272.png', 1, 39),
(86, 25, ' নজরুলের সাহিত্যিক ভাতা', 'জি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন জি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন\nজি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন নজরুলের সাহিত্যিক ভাতা নজরুলের সাহিত্যিক ভাতা নজরুলের সাহিত্যিক ভাতা নজরুলের সাহিত্যিক ভাতা জি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন জি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন জি সিরিজে হুয়াওয়ের নতুন স্মার্টফোন নয়াদিল্লি ও মুম্বাইয়ে সন্ত্রাসী হামলার আশঙ্কায় সতর..', 4, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '2139482449_1501357384.png', 1, 0),
(87, 25, 'দিশার বায়না!', 'এইচপি আনল নতুন ল্যাপটপ নিজস্ব ভুয়া অ্যাকাউন্ট খুলে বান্ধবীকে হয়রানি!ভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্য এইচপি আনল নতুন ল্যাপটপ নিজস্ব ভুয়া অ্যাকাউন্ট খুলে বান্ধবীকে হয়রানি!ভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্য এইচপি আনল নতুন ল্যাপটপ নিজস্ব ভুয়া অ্যাকাউন্ট খুলে বান্ধবীকে হয়রানি!ভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্য    ', 5, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '940410163_1501357478.jpg', 1, 0),
(88, 30, 'বাংলাদেশ–পাকিস্তান প্রস্তুতি ম্যাচ  তামিম-ঝড়ের পর', 'যুক্তরাজ্যে নির্বাচন  করবিনের চমক ঠেকাতেই ব্যস্ত ১০ হাজার ফ্রিল্যান্সার তৈরির উদ্যোগ নিজস্ব নয়াদিল্লি ও মুম্বাইয়ে সন্ত্রাসী হামলার আশঙ্কায় সতর ট্রেইনড টু কিল গ্রন্থে সিআইএর গুপ্তচর ভেসিয়ানা ৬ শতাধিক কর্মী নেবে সাজেদা ফাউন্ডেশন নিজস্ব নয়াদিল্লি ও মুম্বাইয়ে সন্ত্রাসী হামলার আশঙ্কায় সতর ট্রেইনড টু কিল গ্রন্থে সিআইএর গুপ্তচর ভেসিয়ানা ৬ শতাধিক কর্মী নেবে সাজেদা ফাউন্ডেশন নিজস্ব নয়াদিল্লি ও মুম্বাইয়ে সন্ত্রাসী হামলার আশঙ্কায় সতর ট্রেইনড টু কিল গ্রন্থে সিআইএর গুপ্তচর ভেসিয়ানা ৬ শতাধিক কর্মী নেবে সাজেদা ফাউন্ডেশন', 3, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '223058053_1501357741.jpg', 1, 0),
(89, 30, 'ওয়াসিম আকরামের বিরুদ্ধে গ্রেপ্তারি পরোয়ানা', 'ওয়াসিম আকরামের বিরুদ্ধে গ্রেপ্তারি পরোয়ানা জারি করেছেন করাচির স্থানীয় আদালত। একটি মামলার বাদি হিসেবে ৩১টি শুনানিতে হাজির না হওয়ায় তার বিরুদ্ধে এই পারোয়ানা জারি করলেন আদালত। অবশ্য এটি জামিনযোগ্য গ্রেপ্তারি পরোয়ানা। পাকিস্তানের সাবেক অধিনায়ক ও পেস বোলার ওয়াসিম আকরাম গত বছর আদালতে একটি মামলা করেন। করাচির রাস্তায় অবসরপ্রাপ্ত এক সেনা কর্মকর্তার গাড়ি আকরামের গাড়িকে ধাক্কা দেয়। এতে দু’জনের মধ্যে তখন বেশ বচসা হয়। এক পর্যায়ে সাবেক ওই সেনা কর্মকর্তা পিস্তল বের করে আকরামকে গুলি করার হুমকি দেন। তারই প্রেক্ষিতে করাচির আদালতে বাদি হয়ে মামলা করেন আকরাম। অবশ্য পরে আকরামকে চিনতে পেরে নিজের কৃতকর্মের জন্য ক্ষমা চান ওই কর্মকর্তা। বিষয়টি নিয়ে দুই পক্ষের মধ্যে সমঝোতা হয়। এতে বাদি আকরাম কিংবা বিবাদী ওই সাবেক সেনা কর্মকর্তার কেউ আদালতের শুনানিতে হাজির হননি। কিন্তু আইন চলে তার নিজের গতিতে। বিষয়টি দুই পক্ষ সমঝোতা করলেও আদালতকে সে ব্যাপারে কিছু জানানো হয়নি। ওয়াসিম আকরামকে আদালতের শুনানিতে হাজির হওয়ার জন্য বারবার নির্দেশ দেয়া হয়েছে। এমন কি এ ব্যাপারে পুলশকে প্রয়োজনীয় নির্দেশনাও দেয়া হয়েছে। কিন্তু ওয়াসিম আকরাম সম্ভবত', 1, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1793078088_1501357851.jpg', 1, 0),
(90, 23, 'রেলের ১৭৬১টি ক্রসিং মৃত্যুফাঁদ', 'সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্যুফাঁদে পরিণত হয়েছে। ঝুঁকি নিয়ে চলাচল করতে গিয়ে প্রায়ই রেলে কাটা পড়ছে সাধারণ মানুষ। বাদ যাচ্ছে না প্রাইভেটকার এমনকি গণপরিবহনও। বাংলাদেশ রেলওয়ে ও রেল মন্ত্রণালয়ের কর্মকর্তাদের সঙ্গে কথা বলে এসব তথ্য জানা গেছে।সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্যুফাঁদে পরিণত হয়েছে। ঝুঁকি নিয়ে চলাচল করতে গিয়ে প্রায়ই রেলে কাটা পড়ছে সাধারণ মানুষ। বাদ যাচ্ছে না প্রাইভেটকার এমনকি গণপরিবহনও। বাংলাদেশ রেলওয়ে ও রেল মন্ত্রণালয়ের কর্মকর্তাদের সঙ্গে কথা বলে এসব তথ্য জানা গেছে।', 2, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1120449553_1501357929.jpg', 1, 2),
(91, 23, 'সিসিলিতে জি৭ সম্মেলন  জলবায়ু পরিবর্তন নিয়ে শেষ দিন', 'নাঈমুর রহমান অনিকের নেতৃত্বেই আদনানকে হত্যা করা হয়। কিশোর-তরুণদের এই কিলিং মিশনে অনিকের সঙ্গে ১৮-২০ জন অংশ নেয়। তাদের প্রত্যেকের হাতেই ছিল লাঠিসোটা, রড। তবে অনিকসহ কয়েকজনের হাতে ছিল হকিস্টিক ও চাপাতি। রাজধানীর উত্তরায় আধিপত্য বিস্তারকে কেন্দ্র করেই পাল্টাপাল্টি হামলার জের ধরে হত্যা করা হয় স্কুলছা', 2, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '93422340_1501358298.jpg', 1, 5),
(92, 24, 'ভারতের ব্যাংকিং ব্যবস্থা ধনীদের জন্য', 'ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা ', 4, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '560030295_1501358416.jpg', 1, 1),
(93, 24, 'ট্রাম্পের সিনিয়র উপদেষ্টা জামাই কুশনার, তীব্র সমালোচনা', 'জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন জামাই জ্যারেড কুশনারকে হোয়াইট হাউসে সিনিয়র উপদেষ্টা হিসেবে ঘোষণা করেছেন ', 4, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '669917613_1501358504.jpg', 1, 21),
(94, 26, ' নতুন গ্রাফিকস ট্যাবলেট', 'দেশের বাজারে ছাড়া হয়েছে হুইনের তারহীন কিউ ১১ কে মডেলের গ্রাফিকস ট্যাবলেট। এর সঙ্গে আছে ৮১৯২ পেন প্রেসার। গত মঙ্গলবার রাজধানীতে আয়োজিত এক অনুষ্ঠানে হুইনের পরিবেশক মাল্টিমিডিয়া কিংডমের প্রধান নির্বাহী কর্মকর্তা মোহাম্মদ আলী জিন্নাহ ল্যাপটপটি ছাড়ার ঘোঘণা দেন। এ সময় উপস্থিত ছিলেন বাংলাদেশ কম্পিউটার সমিতির মহাসচিব সুব্রত সরকার, ঢাকা ট্রিবিউন-এর এডিটোরিয়াল কার্টুনিস্ট সৈয়দ রাশাদ ইমাম, টেকহিলের মুস্তাফিজুর রহমান, উন্মাদ ম্যাগাজিনের সহকারী সম্পাদক মোরশেদ মিশু।', 5, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1376274739_1501358708.jpg', 1, 2),
(95, 26, 'অনলাইনে নারী ও পুরুষের কেনাকাটার ধরণ', 'প্রযুক্তির প্রসারে অনলাইনে পণ্য কেনার হার বেড়েছে। তবে ৯০ শতাংশের বেশি স্মার্টফোন ব্যবহারকারী এখনো দোকানে গিয়ে পণ্য কেনেন। দোকানে গিয়ে নারীরা পণ্য কেনাকাটায় স্বাচ্ছন্দ্য বোধ করেন। কারণ, এতে তাঁরা মাপজোখ ও নকশা দেখে বেছে কিনতে পারেন।\n\nঅন্যদিকে পুরুষেরা দোকানে যেতে পছন্দ করেন। কারণ, এতে বিক্রয়কর্মীদের সঙ্গে কথোপকথনের মাধ্যমে পণ্যটি কেনা যায়। তবে কেনাকাটার ক্ষেত্রে বাড়ছে প্রযুক্তির ব্যবহারের হার। নারী ও পুরুষের মধ্যে এই প্রযুক্তি ব্যবহারের ধরন আবার আলাদা।', 5, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1318878275_1501358793.jpg', 1, 1),
(96, 27, ' অরুন্ধতী রায় ও ‘দ্য মিনিস্ট্রি অব আটমোস্ট হ্যাপিনেস’', 'ভারতীয় কায়দায় একটি ঢোলাঢালা জামা পরে অনুষ্ঠানটিতে এসেছিলেন অরুন্ধতী রায়। ১৯ জুন ২০১৭। নিউইয়র্কের ব্রুকলিন একাডেমি অব মিউজিকের অপেরা হাউসের চারতলার প্রায় শেষের দিকে একটি আসনে স্থান হয়েছিল আমার। হাজার দুয়েক দর্শক—অধিকাংশই নারী—প্রায় সবার হাতে অরুন্ধতী রায়ের নতুন উপন্যাস দ্য মিনিস্ট্রি অব আটমোস্ট হ্যাপিনেস। অরুন্ধতীকে মনে হলো কিঞ্চিৎ অপ্রস্তুত ও বিব্রত, ‘কী বলব, তার চেয়ে বরং আমার বই থেকেই পড়ে শোনাই’, খুব নিম্নকণ্ঠে কথাগুলো বলে হাতের বইটি মেলে ধরলেন।\n\nতাঁর প্রথম উপন্যাস দ্য গড অব স্মল থিংস প্রকাশিত হওয়ার পর ২০ বছর কেটে গেছে। অরুন্ধতী জানিয়েছিলেন, তিনি আর ‘ফিকশন’ লিখবেন না, যা বলার এক বইতে বলে ফেলেছেন। সেই বইটি ছিল একটি নিষিদ্ধ প্রেমের অপূর্ব মন্থন। অভাবিত কাব্যময় ভাষায় একটি পারিবারিক ট্র্যাজেডির সংগোপন প্রকাশ। পরবর্তী ২০ বছর অরুন্ধতী যে নীরব ছিলেন, তা নয়। এই সময় সাহিত্য ছেড়ে তিনি বেছে নেন ‘প্রতিবাদ রাজনীতি’, জড়িয়ে পড়েন ভারত সরকারের নিগ্রহ নীতির বিরোধিতায়। যুক্ত হন মাওবাদীদের সঙ্গে। ভূমিহীন-দলিতদের সঙ্গে। এমনকি ভারতীয় সামরিক বাহিনীর সঙ্গে যুদ্ধরত কাশ্মীরি বিচ্ছিন্নতাবাদীদের পক্ষেও কথা বলেছেন তিনি। ভারতের পরিবেশবাদী আন্দোলনের সঙ্গে যুক্ত হয়ে একদিকে সরকার, অন্যদিকে', 2, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '2072263254_1501359001.jpg', 1, 0),
(97, 27, 'আফতাব-ও-আনজুমের-বেদনা', 'আফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনা আফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনা আফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনাআফতাব-ও-আনজুমের-বেদনা', 3, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1847033198_1501359134.jpg', 1, 1),
(98, 29, 'ভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্য', 'প্রযুক্তির প্রসারে অনলাইনে পণ্য কেনার হার বেড়েছে। তবে ৯০ শতাংশের বেশি স্মার্টফোন ব্যবহারকারী এখনো দোকানে গিয়ে পণ্য কেনেন। দোকানে গিয়ে নারীরা পণ্য কেনাকাটায় স্বাচ্ছন্দ্য বোধ করেন। কারণ, এতে তাঁরা মাপজোখ প্রযুক্তির প্রসারে অনলাইনে পণ্য কেনার হার বেড়েছে। তবে ৯০ শতাংশের বেশি স্মার্টফোন ব্যবহারকারী এখনো দোকানে গিয়ে পণ্য কেনেন। দোকানে গিয়ে নারীরা পণ্য কেনাকাটায় স্বাচ্ছন্দ্য বোধ করেন। কারণ, এতে তাঁরা মাপজোখ প্রযুক্তির প্রসারে অনলাইনে পণ্য কেনার হার বেড়েছে। তবে ৯০ শতাংশের বেশি স্মার্টফোন ব্যবহারকারী এখনো দোকানে গিয়ে পণ্য কেনেন। দোকানে গিয়ে নারীরা পণ্য কেনাকাটায় স্বাচ্ছন্দ্য বোধ করেন। কারণ, এতে তাঁরা মাপজোখপ্রযুক্তির প্রসারে অনলাইনে পণ্য কেনার হার বেড়েছে। তবে ৯০ শতাংশের বেশি স্মার্টফোন ব্যবহারকারী এখনো দোকানে গিয়ে পণ্য কেনেন। দোকানে গিয়ে নারীরা পণ্য কেনাকাটায় স্বাচ্ছন্দ্য বোধ করেন। কারণ, এতে তাঁরা মাপজোখ', 1, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1376617585_1501360891.jpg', 1, 0),
(99, 29, 'পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৮', 'চট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগচট্টগ্রামসহ তিন জেলায় পাহাড় ধসে নিহতের সংখ্যা বেড়ে ১৩৫ জন হয়েছে। দুর্যোগ', 3, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1861433099_1501361164.jpg', 1, 1),
(100, 32, 'জ্বর হলেই ওষুধ নয়', 'ভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্যভালো থাকুন  রোজাদার রোগীদের ওষুধপথ্য', 4, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1126086970_1501361242.jpg', 1, 0),
(101, 32, 'রোজায় খাবেন, তবে পরিমিত', 'সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বাসারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্ সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্', 4, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '392350743_1501361307.jpg', 1, 0),
(102, 33, 'রেলের ১৭৬১টি ক্রসিং মৃত্যুফাঁদ', 'ভারতের ব্যাংকিং  ব্যবস্থা  ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা নেই। মঙ্গলবার ঐতিহ্যবাহী প্রেসিডেন্সি বিশ্ববিদ্যালয়ের দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন  বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ও গ্রামীণ ব্যাংকের প্রতিষ্ঠাতা মুহাম্মদ ইউনূস। এদিন কলকাতার কলেজ স্ট্রিটে ডিরোজিও হলেরেলের ১৭৬১টি ক্রসিং মৃত্যুফাঁদ রেলের ১৭৬১টি ক্রসিং মৃত্যুফাঁদ নো সুবিধা নেই। মঙ্গলবার ঐতিহ্যবাহী প্রেসিডেন্সি বিশ্ববিদ্যালয়ের দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন  বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ও গ্রামীণ ব্যাংকের প্রতিষ্ঠাতা মুহাম্মদ ইউনূস। এদিন কলকাতার কলেজ স্ট্রিটে ডিরোজিও হলেরেলের ১৭৬১টি ক্রসিং মৃত্যুফাঁদ রেলের ১৭৬১টি ক্রসিং মৃত্যুফাঁদ ', 1, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '428857872_1501361385.jpg', 1, 0),
(103, 33, 'দায়ী ব্যক্তিরা রেহাই পাবে না', 'শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ শিক্ষার্থীদের হাতে তুলে শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ ‘ভুলভ্রান্তি’শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’  দেয়া নতুন শিক্ষার্থীদেরশিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’  হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়েশিক্ষার্থীদের হাতে তুলে দেয়াশিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’  নতুন শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’  অমার্জনীয় ‘ভুলভ্রান্তি’ অমার্জনীয় ‘ভুলভ্রান্তি’ পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ শিক্ষার্থীদের হাতে তুলে দেয়া নতুন শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ শিক্ষার্থীদের হাতে তুলে দেয়া নতুন পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ পাঠ্যবইয়ে অমার্জনীয় ‘ভুলভ্রান্তি’ ', 1, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '2057356892_1501361464.jpg', 1, 0),
(104, 36, 'দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ', 'ভারতের ব্যাংকিং ব্যবস্থা ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা নেই। মঙ্গলবার ঐতিহ্যবাহী প্রেসিডেন্সি বিশ্ববিদ্যালয়ের দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ও গ্রামীণ ব্যাংকের প্রতিষ্ঠাতা মুহাম্মদ ইউনূস।ভারতের ব্যাংকিং ব্যবস্থা ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা নেই। মঙ্গলবার ঐতিহ্যবাহী প্রেসিডেন্সি বিশ্ববিদ্যালয়ের দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ও গ্রামীণ ব্যাংকের প্রতিষ্ঠাতা মুহাম্মদ ইউনূস।ভারতের ব্যাংকিং ব্যবস্থা ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা নেই। মঙ্গলবার ঐতিহ্যবাহী প্রেসিডেন্সি বিশ্ববিদ্যালয়ের দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ও গ্রামীণ ব্যাংকের প্রতিষ্ঠাতা মুহাম্মদ ইউনূস।ভারতের ব্যাংকিং ব্যবস্থা ধনীদের জন্য। এখানে গরিবদের জন্য কোনো সুবিধা নেই। মঙ্গলবার ঐতিহ্যবাহী প্রেসিডেন্সি বিশ্ববিদ্যালয়ের দ্বিশতবার্ষিকী অনুষ্ঠানে এসে একথা বলেছেন বাংলাদেশের নোবেল জয়ী অর্থনীতিবিদ ও গ্রামীণ ব্যাংকের প্রতিষ্ঠাতা মুহাম্মদ ইউনূস।', 1, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1160221131_1501361597.jpeg', 1, 0),
(105, 36, 'মৃত্যুফাঁদে পরিণত হয়েছে', 'রা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্যুফাঁদে পরিণত হয়েছে। ঝুঁকি নিয়ে চলাচল করতে গিয়ে প্রায়ই রেলে কাটা পড়ছে সাধারণ মানুষ। বাদ যাচ্ছে না প্রাইভেটকার এমনকি গণপরিবহনও। বাংলাদেশ রেলওয়ে ও রেল মন্ত্রণালয়ের কর্মকর্তাদের সঙ্গে কথা বলে এসব তথ্য জা রা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্যুফাঁদে পরিণত হয়েছে। ঝুঁকি নিয়ে চলাচল করতে গিয়ে প্রায়ই রেলে কাটা পড়ছে সাধারণ মানুষ। বাদ যাচ্ছে না প্রাইভেটকার এমনকি গণপরিবহনও। বাংলাদেশ রেলওয়ে ও রেল মন্ত্রণালয়ের কর্মকর্তাদের সঙ্গে কথা বলে এসব তথ্য জা', 5, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1439654642_1501361635.jpg', 1, 0),
(106, 38, '১৭৬১টি লেভেলক্রসিংয়ে কোনো', 'সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বাসারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বাসারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্ সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় সারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বাসারা দেশে রেলের ১৭৬১টি লেভেলক্রসিংয়ে কোনো গেটকিপার বা কর্মী না থাকায় মৃত্', 2, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1922526654_1501361688.jpg', 1, 0),
(107, 38, 'রাজধানীর বিভিন্ন এলাকায় বৃষ্টি', 'আজ শনিবার সকালে রাজধানীর বিভিন্ন এলাকায় বৃষ্টি হয়েছে। ছবিটি রাজধানীর হাতিরঝিলের মধুবাগ অংশ থেকে তোলা। ছবি: আবদুস সালাম আজ শনিবার সকালে রাজধানীর বিভিন্ন এলাকায় বৃষ্টি হয়েছে। ছবিটি রাজধানীর হাতিরঝিলের মধুবাগ অংশ থেকে তোলা। ছবি: আবদুস সালাম  আজ শনিবার সকালে রাজধানীর বিভিন্ন এলাকায় বৃষ্টি হয়েছে। ছবিটি রাজধানীর হাতিরঝিলের মধুবাগ অংশ থেকে তোলা। ছবি: আবদুস সালাম আজ শনিবার সকালে রাজধানীর বিভিন্ন এলাকায় বৃষ্টি হয়েছে। ছবিটি রাজধা', 4, '2017-07-29', '', '0000-00-00', 0, 1, 0, 0, '1641765330_1501361803.jpg', 1, 0),
(108, 30, 'গানে ফিরলেন তাহসান, অভিনয়ে মিথিলা', 'বিচ্ছেদ ঘোষণার পর কয়েকটা দিন নিজেদের মতো করে চুপচাপ ছিলেন তাহসান ও মিথিলা। কারও সঙ্গে কোনো যোগাযোগ ছিল না। তবে তাঁরা নিজেদের কাজ নিয়ে আবার ব্যস্ত হতে শুরু করছেন। এরই মধ্যে তাহসান গান আর মিথিলা নাটকের শুটিং শুরু করেছেন।বিচ্ছেদ ঘোষণার পর কয়েকটা দিন নিজেদের মতো করে চুপচাপ ছিলেন তাহসান ও মিথিলা। কারও সঙ্গে কোনো যোগাযোগ ছিল না। তবে তাঁরা নিজেদের কাজ নিয়ে আবার ব্যস্ত হতে শুরু করছেন। এরই মধ্যে তাহসান গান আর মিথিলা নাটকের শুটিং শুরু করেছেন।', 4, '2017-07-30', '', '0000-00-00', 0, 1, 0, 0, '1477772865_1501370175.jpg', 1, 0),
(109, 30, ' হজরত শাহজালাল আন্তর্জাতিক বিমানবন্দর', 'মিথিলা অভিনীত এই নাটকটি পরিচালনা করছেন মিজানুর রহমান। এতে মিথিলার সঙ্গে অভিনয় করছেন অপূর্ব। তাঁদের সঙ্গে এখানে আরও আছেন মেহজাবিন। গত ঈদুল ফিতরে প্রচারিত হওয়া ‘ব্যাচ-২৭’ টেলিছবির গল্প যেখানে শেষ হয়েছিল, ‘ব্যাচ-২৭ দ্য লাস্ট পেজ’-এর গল্প সেখান থেকে শুরু হয়। এবার ঈদুল আজহায় টেলিছবিটি এনটিভিতে দেখানো হবে।মিথিলা অভিনীত এই নাটকটি পরিচালনা করছেন মিজানুর রহমান। এতে মিথিলার সঙ্গে অভিনয় করছেন অপূর্ব। তাঁদের সঙ্গে এখানে আরও আছেন মেহজাবিন। গত ঈদুল ফিতরে প্রচারিত হওয়া ‘ব্যাচ-২৭’ টেলিছবির গল্প যেখানে শেষ হয়েছিল, ‘ব্যাচ-২৭ দ্য লাস্ট পেজ’-এর গল্প সেখান থেকে শুরু হয়। এবার ঈদুল আজহায় টেলিছবিটি এনটিভিতে দেখানো হবে।', 3, '2017-07-30', '', '0000-00-00', 0, 1, 0, 0, '96118351_1501370227.png', 1, 1),
(110, 21, '‘ব্যাচ-২৭’ টেলিছবির গল্প ', 'বিচ্ছেদ ঘোষণার পর কয়েকটা দিন নিজেদের মতো করে চুপচাপ ছিলেন তাহসান ও মিথিলা। কারও সঙ্গে কোনো যোগাযোগ ছিল না। তবে তাঁরা নিজেদের কাজ নিয়ে আবার ব্যস্ত হতে শুরু করছেন। এরই…..বিচ্ছেদ ঘোষণার পর কয়েকটা দিন নিজেদের মতো করে চুপচাপ ছিলেন তাহসান ও মিথিলা। কারও সঙ্গে কোনো যোগাযোগ ছিল না। তবে তাঁরা নিজেদের কাজ নিয়ে আবার ব্যস্ত হতে শুরু করছেন। এরই…..', 2, '2017-07-30', '', '0000-00-00', 0, 1, 0, 0, '1855306173_1501434720.jpg', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `language` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `parent_id`, `category_name`, `language`, `status`) VALUES
(21, 0, 'জাতীয়', 1, 1),
(22, 0, 'আন্তর্জাতিক', 1, 1),
(23, 0, 'রাজনীতি', 1, 1),
(24, 0, 'বানিজ্য', 1, 1),
(25, 0, 'বিনোদন', 1, 1),
(26, 39, 'তথ্য ও প্রযুক্তি', 1, 1),
(27, 39, 'শিল্প ও সাহিত্য', 1, 1),
(29, 0, 'শিক্ষাঙ্গন', 1, 1),
(30, 0, 'খেলাধুলা', 1, 1),
(32, 39, 'স্বাস্থ্য', 1, 1),
(33, 0, 'বিজ্ঞান', 1, 1),
(38, 39, 'আবহাওয়া', 1, 1),
(40, 39, 'ধর্ম', 1, 1),
(39, 0, 'অন্যান্য', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

DROP TABLE IF EXISTS `news_type`;
CREATE TABLE IF NOT EXISTS `news_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_type_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news_type`
--

INSERT INTO `news_type` (`id`, `news_type_name`, `status`) VALUES
(1, 'Breaking News', 1),
(2, 'Spot Light', 1),
(3, 'Feature', 1),
(4, 'Recent', 1),
(5, 'General', 1),
(6, 'sports', 1),
(7, 'entertainment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `language`, `status`) VALUES
(1, 'Asia', 0, 1),
(2, 'USA', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reporter`
--

DROP TABLE IF EXISTS `reporter`;
CREATE TABLE IF NOT EXISTS `reporter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporter_name` varchar(255) NOT NULL,
  `language` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `reporter`
--

INSERT INTO `reporter` (`id`, `reporter_name`, `language`, `status`) VALUES
(1, 'Hasaaaan mahmud', 0, 1),
(2, 'Imtiaz Ahmed', 0, 1),
(3, 'Seram Atia Akash', 0, 1),
(4, 'Mahmud Kobir', 0, 1),
(5, 'Usman Chowdhury', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

DROP TABLE IF EXISTS `seo`;
CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_tag` text,
  `meta_keyword` text,
  `meta_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `controller_name`, `title`, `meta_tag`, `meta_keyword`, `meta_description`) VALUES
(1, 'home', '', NULL, NULL, NULL),
(2, 'add', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_logged_in` tinyint(1) NOT NULL DEFAULT '1',
  `user_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_activation_key` varchar(32) NOT NULL DEFAULT '',
  `forgot_password_verify` varchar(40) NOT NULL DEFAULT '',
  `user_title` text NOT NULL,
  `user_description` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `phone_no`, `address`, `post_code`, `country`, `user_registration_date`, `user_logged_in`, `user_status`, `user_activation_key`, `forgot_password_verify`, `user_title`, `user_description`, `user_image`) VALUES
(17, 'raj', '123456', 'saasd', 'sadasd', 'raj@yahoo.com', '', '', '', '', '2011-11-01 01:56:04', 0, 0, '', '', '', '', ''),
(9, 'hotmail', '333333', 'hjjhf', 'hjfhj', 'holy@hotmail.com', '', '', '', '', '2011-10-31 22:29:57', 0, 1, '91e980ef2f45c16d522de39236160a36', '', '', '', ''),
(13, 'holy123', 'raj', 'ghori', 'holy', 'holy@flammabd.com', '235897', 'this is test by rajib', '3100', 'Bangladesh', '2011-11-03 21:44:50', 0, 1, '', '', 'I am Rajib Kanti Paul', 'with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1605068361_1320317090.jpg'),
(14, 'misba', '123', 'misba', 'alam', 'mis', '', '', '', '', '2011-11-03 18:20:52', 0, 1, '', '', 'my name is mishba', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1619581244_1320304833.jpg'),
(15, 'Misbah', '123456', 'Misbah', 'Alam', 'misba.sust@gmail.com', '', '', '', '', '2011-10-31 22:29:31', 0, 1, '', '', '', '', ''),
(16, 'a', '1', 'a', 'a', 'misba.sust@gmail.com', '', '', '', '', '2011-10-31 22:29:23', 0, 1, '', '', '', '', ''),
(23, 'rajib2', '123456', 'rajib1', 'rajib1', 'rajib@yahoo.com', '123456789', 'sdadad', 'asdadas', 'asdasd', '2011-11-03 18:39:33', 0, 0, '933a42a46c0a52a64aa5a461e09e4c8e', '', '', '', ''),
(18, 'rajib', '12345678', 'paul', 'rajib', 'rajib@flammabd.com', '1234567', 'dsfasdf', '3100', 'bd', '2011-11-03 10:10:32', 0, 0, '', '', '', '', ''),
(19, 'bulon', '12345678', 'paul', 'bulon', 'rajibpaul51@gmail.com', '1234567', 'dsfasdf', '3100', 'bd', '2011-11-03 16:14:14', 0, 0, 'e1ddc9e1c0476c05a7ef5eb85b8280cd', '', '', '', ''),
(20, 'asas', '1234567', 'asas', 'sasas', 'r@gmail.com', '123456789', 'asdasdasd', 'dasda', 'dasdasd', '2011-11-03 16:30:41', 0, 0, 'f39bb8cd5013c4f91f6a6280130686ec', '', '', '', ''),
(21, 'rajib1', '123456789', 'rajib1', 'rajib1', 'rajibpaul51@yahoo.com', '123456789', 'sadasd', '3100', 'bd', '2011-11-03 16:37:29', 0, 0, '9f6c00d08e68ff862b0399adb02b27d5', '', '', '', ''),
(22, 'assas', '123456', 'asasas', 'asdsd', 'raj@flammabd.com', '1234567', 'asdas', 'sdasd', 'sdsd', '2011-11-03 16:54:50', 0, 0, 'a9327da53c71b9a6698bd98a637ffc6e', '', '', '', ''),
(24, 'khushi', 'khushi', 'khushi', 'rahman', 'khushi@gmail.com', '0987656544', 'sylt', '3200', 'Bangladesh', '2017-04-12 05:30:27', 1, 1, '80a6007f739d17b4cddefcf7f3ffef2e', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `video_files`
--

DROP TABLE IF EXISTS `video_files`;
CREATE TABLE IF NOT EXISTS `video_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `language_id` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `video_files`
--

INSERT INTO `video_files` (`id`, `title`, `description`, `video_name`, `add_date`, `language_id`, `status`) VALUES
(1, 'Test Video File', 'Test Video File', '1572230496_1320322953.mp4', '2011-11-03', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
