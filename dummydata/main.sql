-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2015 at 05:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supercoolpost`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
`uid` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(32) NOT NULL,
  `subtitle` varchar(32) NOT NULL,
  `public_toggle` tinyint(1) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `about_toggle` tinyint(1) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `about` varchar(500) NOT NULL,
  `first_setup_complete` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`uid`, `email`, `password`, `username`, `title`, `subtitle`, `public_toggle`, `theme`, `about_toggle`, `timezone`, `about`, `first_setup_complete`) VALUES
(1, 'A@a.com', 'albatross', 'mick', 'Mick''s World Test', 'A Blog on Christ Test', 1, 'flowery', 1, 'Pacific/Midway', 'This is my new blog.', 1),
(2, 'b@b.com', 'pass', 'johnnybgood', 'Recipes for the Holidays', '', 1, 'basic', 1, '', '', 1),
(3, 'hegfen@homtail15.com', 'eagleface', 'ToothPasteReviewer', 'Tooth Paste Reviews', 'Only the most in-depth reviews', 1, 'flowers', 0, '', '', 1),
(4, 'festeringswine@evil.net', 'oppenheimer', 'PhysicsMan', 'The World is Falling', 'Conspiracies & Alternative News', 1, 'codey', 1, '', '', 1),
(5, 'bubble@pink.au.ico', '409', 'Betty409', 'Betty''s Place', '', 0, 'basic', 1, 'Chile/EasterIsland', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
