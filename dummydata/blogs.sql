-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2015 at 05:28 AM
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
  `datetime` datetime NOT NULL,
  `draft` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `owner`, `datetime`, `draft`) VALUES
(1, 'First Post', 'Hey guys [b]WHAT''S UP!!![/b]. I hope you are all doing well. Everything is cool here. LOL JK. IM CRYING.\r\n\r\nCan I make line breaks in this thing?', 5, '2015-01-10 03:00:00', 0),
(2, 'First Post', 'I will bring all the most important news to you guys. This is my promise.', 4, '2015-01-08 05:13:07', 0),
(3, 'Isn''t God cool?', 'Corinthians Chapter 9, verse 150 says etc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam pellentesque est eu hendrerit tristique. Curabitur commodo ac nunc eu sodales. Praesent condimentum feugiat purus. Mauris nec odio eget nunc blandit tempus. Suspendisse placerat justo tincidunt molestie euismod. Vestibulum euismod urna sed tristique consectetur. Fusce porta tempor turpis at interdum. Quisque et enim finibus, malesuada tortor a, suscipit nunc. ', 1, '2015-01-01 04:13:07', 0),
(4, 'I hate my life', 'Everyday is a struggle for me.', 5, '2015-01-08 12:13:07', 0),
(5, 'The Parable of the Talents', 'and Jesus said. ue ac lobortis nisi. Mauris nec dui arcu. Fusce ac sem felis. Phasellus aliquet ac nisi quis imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec facilisis euismod nulla, nec mattis felis auctor sed. Proin auctor quam nec nibh lacinia efficitur. Mauris molestie dui sit amet libero volutpat aliquam. Nullam sapien dolor, egestas ac hendrerit sit amet, rhoncus vel dui. Vivamus dictum augue nec felis accumsan, ac max', 1, '2015-01-08 15:13:07', 0),
(6, 'New Blog!!!', 'I am so superexcited to make everybody into cool chefs now.', 2, '2015-01-08 05:13:07', 0),
(7, 'What I think about futurology', 'The Singularity is near.', 4, '2015-01-09 21:13:07', 0),
(8, 'I feel Great today', 'I know I felt down, but I want this blog to be positive! I am going to make a list of ten things that make me happy everyday from now on!\r\n\r\nHere is my start\r\n\r\n1. dogs\r\n2. cats\r\n3. sun\r\n4. fresh air\r\n5. watermelon\r\n6. sewing\r\n7. chocolate\r\n8. books\r\n9. the market\r\n10. SuperCoolPost!', 5, '2015-01-10 14:57:33', 0),
(9, 'Wishing You A Happy Earth Day', 'Vestibulum ultrices, sapien eget posuere malesuada, risus quam cursus neque, ac tristique mauris nisl eu diam. Curabitur id vehicula mi, vel imperdiet ante. Nam non lectus sapien. Cras sagittis magna sit amet leo iaculis, eu auctor sem facilisis. Nulla facilisi. Ut eu eros eleifend, varius lorem ac, maximus velit. Aenean sagittis, ligula quis euismod ornare, neque mauris hendrerit sapien, sit amet dignissim orci lacus ac dui. Praesent lobortis ullamcorper tortor at finibus. Mauris augue orci, consequat sed hendrerit sed, blandit quis sem. Aenean rhoncus ornare tellus id gravida. Vivamus in nunc iaculis odio semper molestie ac ut justo. In porttitor imperdiet tempus. ', 1, '2015-01-23 10:11:00', 0),
(10, 'Wishing You A Happy Earth Day', 'Vestibulum ultrices, sapien eget posuere malesuada, risus quam cursus neque, ac tristique mauris nisl eu diam. Curabitur id vehicula mi, vel imperdiet ante. Nam non lectus sapien. Cras sagittis magna sit amet leo iaculis, eu auctor sem facilisis. Nulla facilisi. Ut eu eros eleifend, varius lorem ac, maximus velit. Aenean sagittis, ligula quis euismod ornare, neque mauris hendrerit sapien, sit amet dignissim orci lacus ac dui. Praesent lobortis ullamcorper tortor at finibus. Mauris augue orci, consequat sed hendrerit sed, blandit quis sem. Aenean rhoncus ornare tellus id gravida. Vivamus in nunc iaculis odio semper molestie ac ut justo. In porttitor imperdiet tempus. ', 1, '2015-01-23 10:11:00', 0),
(11, 'The Worst Vacation', ' Quisque ac lobortis nisi. Mauris nec dui arcu. Fusce ac sem felis. Phasellus aliquet ac nisi quis imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec facilisis euismod nulla, nec mattis felis auctor sed. Proin auctor quam nec nibh lacinia efficitur. Mauris molestie dui sit amet libero volutpat aliquam. Nullam sapien dolor, egestas ac hendrerit sit amet, rhoncus vel dui. Vivamus dictum augue nec felis accumsan, ac maximus est sodales. Curabitur hendrerit nisl velit, sit amet sodales lectus vulputate nec. Donec eu dolor metus. Duis sit amet lectus nunc. Donec sollicitudin semper lorem, in placerat eros. Proin maximus, sapien non auctor consequat, mauris metus laoreet metus, a porta velit urna sed lectus.\r\n', 1, '2015-01-24 15:38:38', 1),
(12, 'The Internet is so Weird', 'Etiam venenatis tincidunt malesuada. Sed iaculis aliquet tristique. Proin commodo malesuada sem vitae molestie. Donec sed sem at orci sagittis mattis interdum et diam. Phasellus malesuada non libero in egestas. Vivamus ut lobortis libero, quis tincidunt metus. Nulla risus diam, pharetra in nibh in, aliquet accumsan tortor. Nulla sit amet massa congue, sollicitudin sem eget, tincidunt leo. Proin congue tellus consectetur congue porttitor. Praesent malesuada eros molestie dignissim auctor. Pellentesque rhoncus, tellus ac finibus consequat, quam nisl gravida lorem, in bibendum lorem sem vitae metus. In fringilla velit neque, auctor gravida magna fermentum in. Suspendisse tortor sapien, aliquet in vehicula nec, pellentesque vestibulum ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 1, '2015-01-16 06:06:12', 0),
(13, 'Lorem Ipsum', 'Sed sapien dui, pulvinar porta feugiat in, porta non sem. Vestibulum aliquam, dui eu egestas consequat, velit velit volutpat lacus, sed elementum nunc sapien eget mauris. Sed consequat vitae ipsum non placerat. Vivamus a mollis sapien. Proin feugiat sem in mauris semper sollicitudin. Aenean ac tincidunt mi. Vivamus dictum sagittis turpis nec faucibus. Maecenas eget turpis dui. Ut a eros ut quam dictum malesuada. Ut ut volutpat sem, non blandit orci. Cras pharetra ante non nibh ullamcorper, ac ullamcorper ligula finibus. Phasellus condimentum sagittis', 1, '2015-01-14 00:00:59', 0),
(14, 'Thoughts of a Blogger', 'Sed pharetra sapien sed justo fringilla molestie. Aliquam erat volutpat. Curabitur eros turpis, sollicitudin nec ligula sodales, iaculis semper nisi. In hac habitasse platea dictumst. Pellentesque egestas congue mauris, nec semper libero interdum vitae. Pellentesque libero mauris, congue vel interdum sodales, dictum vel nunc. Duis consequat congue consectetur. Pellentesque iaculis nulla sed viverra vulputate. Ut dictum, mauris at sollicitudin tristique, ipsum purus lobortis mauris, ac tempor eros eros at nulla. Praesent varius ultricies metus, non pellentesque lacus ultricies sit amet. Fusce vitae tempor neque, sit amet pulvinar nulla. Quisque aliquam sed nunc vel scelerisque. ', 1, '2015-01-12 10:14:14', 0),
(15, 'Lorem Ipsum Part II', ' Pellentesque vehicula ultricies rutrum. Vestibulum eu aliquet lorem, aliquet tincidunt ex. Aliquam facilisis pellentesque varius. Mauris varius non mauris at eleifend. Mauris luctus eu odio ac facilisis. Nam tincidunt mauris ut pulvinar rhoncus. Quisque eu posuere nisl. Suspendisse blandit porttitor egestas. Vivamus imperdiet erat ut accumsan dapibus. Aenean ac accumsan erat. In arcu metus, fermentum at consectetur in, interdum vel est. Donec imperdiet venenatis luctus. Aenean dignissim pharetra ipsum. Etiam sagittis facilisis condimentum. Cras vulputate, nisi sit amet tincidunt luctus, nulla felis condimentum nunc, ut malesuada enim ligula nec orci.\r\n\r\nDonec at finibus justo. Vivamus consequat ultricies nibh et hendrerit. Cras consectetur in dui non fringill', 1, '2015-01-11 06:10:20', 0),
(16, 'Etiam Interdum Consectetur', 'Aenean in tincidunt nisi. Etiam dapibus felis id lectus cursus, ac vehicula lorem porttitor. Sed eget sapien ut justo auctor dignissim. Ut rutrum tristique dolor vitae elementum. Cras fermentum elit sed finibus condimentum. Fusce scelerisque, ex et maximus aliquam, ligula ante finibus erat, sed consectetur lorem lectus eu odio. Sed dictum libero vel suscipit fringilla. Fusce ut interdum odio. Duis id tellus bibendum, vestibulum urna ac, vehicula ex. Etiam luctus lectus vitae turpis commodo, ut tincidunt leo gravida. Donec pellentesque nulla leo, non accumsan nisl tristique eget. Quisque a mattis nibh, ac imperdiet risus. Morbi at nunc purus. ', 1, '2015-01-16 10:08:24', 0);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
