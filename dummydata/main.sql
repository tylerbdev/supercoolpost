-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2015 at 12:11 PM
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
  `about_toggle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`uid`, `email`, `password`, `username`, `title`, `subtitle`, `public_toggle`, `theme`, `about_toggle`) VALUES
(1, 'A@a.com', 'albatross', 'mick', 'Mick''s World', 'A Blog on Christ', 0, 'grunge', '1'),
(2, 'b@b.com', 'pass', 'johnnybgood', 'Recipes for the Holidays', '', 1, 'basic', '1'),
(3, 'hegfen@homtail15.com', 'eagleface', 'ToothPasteReviewer', 'Tooth Paste Reviews', 'Only the most in-depth reviews', 1, 'flowers', '0'),
(4, 'festeringswine@evil.net', 'oppenheimer', 'PhysicsMan', 'The World is Falling', 'Conspiracies & Alternative News', 1, 'codey', '1'),
(5, 'bubble@pink.au.ico', 'utitjwijtiwt', 'Betty409', 'Betty''s Place', '', 0, 'space', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
