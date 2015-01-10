-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2015 at 12:22 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `owner` int(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `owner`, `datetime`) VALUES
(1, 'First Post', 'Hey guys [b]WHAT''S UP!!![/b]. I hope you are all doing well. Everything is cool here. LOL JK. IM CRYING.\r\n\r\nCan I make line breaks in this thing?', 5, '2015-01-10 03:00:00'),
(2, 'First Post', 'I will bring all the most important news to you guys. This is my promise.', 4, '2015-01-08 05:13:07'),
(3, 'Isn''t God cool?', 'Corinthians Chapter 9, verse 150 says etc.', 1, '2015-01-01 04:13:07'),
(4, 'I hate my life', 'Everyday is a struggle for me.', 5, '2015-01-08 12:13:07'),
(5, 'The Parable of the Talents', 'and Jesus said.', 1, '2015-01-08 15:13:07'),
(6, 'New Blog!!!', 'I am so superexcited to make everybody into cool chefs now.', 2, '2015-01-08 05:13:07'),
(7, 'What I think about futurology', 'The Singularity is near.', 4, '2015-01-09 21:13:07'),
(8, 'I feel Great today', 'I know I felt down, but I want this blog to be positive! I am going to make a list of ten things that make me happy everyday from now on!\r\n\r\nHere is my start\r\n\r\n1. dogs\r\n2. cats\r\n3. sun\r\n4. fresh air\r\n5. watermelon\r\n6. sewing\r\n7. chocolate\r\n8. books\r\n9. the market\r\n10. SuperCoolPost!', 5, '2015-01-10 14:57:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
