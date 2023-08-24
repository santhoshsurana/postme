-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2012 at 07:01 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `postme`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_pages`
--

CREATE TABLE IF NOT EXISTS `pm_pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(100) NOT NULL,
  `page_author` varchar(20) NOT NULL,
  `page_postition` varchar(10) NOT NULL,
  `page_status` int(1) NOT NULL,
  `page_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pm_pages`
--

INSERT INTO `pm_pages` (`id`, `page_title`, `page_author`, `page_postition`, `page_status`, `page_created`) VALUES
(1, 'Home', 'PostMe', '', 0, '2012-07-09 23:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `pm_posts`
--

CREATE TABLE IF NOT EXISTS `pm_posts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_desc` text NOT NULL,
  `post_author` varchar(20) NOT NULL,
  `post_type` varchar(20) DEFAULT NULL,
  `post_links` varchar(200) DEFAULT NULL,
  `parent_page` int(3) NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT '0',
  `post_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pm_posts`
--

INSERT INTO `pm_posts` (`id`, `post_title`, `post_desc`, `post_author`, `post_type`, `post_links`, `parent_page`, `post_status`, `post_created`) VALUES
(1, 'Sample Post', 'This Is a Sample Post.You Can delete this post bu using the Admin panel.', 'admin', NULL, NULL, 1, 0, '2012-07-09 23:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `pm_status`
--

CREATE TABLE IF NOT EXISTS `pm_status` (
  `id` int(2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_status`
--

INSERT INTO `pm_status` (`id`, `status`) VALUES
(0, 'Published'),
(1, 'Unpublished'),
(2, 'Trashed');

-- --------------------------------------------------------

--
-- Table structure for table `pm_users`
--

CREATE TABLE IF NOT EXISTS `pm_users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `display_name` varchar(25) NOT NULL,
  `first_name` tinytext,
  `last_name` tinytext,
  `user_email` varchar(50) NOT NULL,
  `user_web` varchar(25) DEFAULT NULL,
  `user_type` binary(1) NOT NULL DEFAULT '0',
  `profile_pic` varchar(50) NOT NULL DEFAULT 'images/defult_profile.png',
  `cover_pic` varchar(50) NOT NULL DEFAULT 'images/defult_cover.png',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pm_users`
--

INSERT INTO `pm_users` (`id`, `user_name`, `user_pass`, `display_name`, `first_name`, `last_name`, `user_email`, `user_web`, `user_type`, `profile_pic`, `cover_pic`, `register_date`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'Postme', NULL, NULL, 'prudhvi.jami@gmail.com', NULL, '1', 'images/defult_profile.png', 'images/defult_cover.png', '2012-07-14 19:00:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
