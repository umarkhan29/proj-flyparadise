-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 11:46 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flyparadise`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `thumb` varchar(120) NOT NULL,
  `blogtype` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `author`, `about`, `content`, `imgpath`, `thumb`, `blogtype`) VALUES
(44, 'Khan', 'Web Developer', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/Khanproduct28.jpg', 'assets/blogs/thumbs/Khanproduct28.jpg', ''),
(45, 'testuuuuu', 'jjfjf', 'kjbjjk', 'assets/blogs/testuuuuuproduct6.jpg', 'assets/blogs/thumbs/testuuuuuproduct6.jpg', ''),
(46, 'Khan', 'Web Developer', 'ttt', 'assets/blogs/Khanproduct12.jpg', 'assets/blogs/thumbs/Khanproduct12.jpg', ''),
(47, 'Khan', 'Web Developer', 'ttt', 'assets/blogs/Khanproduct7.jpg', 'assets/blogs/thumbs/Khanproduct7.jpg', ''),
(48, 'hanan', 'Web Developer', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/hananproduct16.jpg', 'assets/blogs/thumbs/hananproduct16.jpg', ''),
(49, 'Danish', 'test', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/Danishproduct20.jpg', 'assets/blogs/thumbs/Danishproduct20.jpg', ''),
(50, 'uuuu', 'Web Developer', 'ttt', 'assets/blogs/uuuuproduct21.jpg', 'assets/blogs/thumbs/uuuuproduct21.jpg', ''),
(51, 'Khan', 'Web Developer', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/Khanproduct1.jpg', 'assets/blogs/thumbs/Khanproduct1.jpg', ''),
(52, 'Khan', 'Web Developer', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/Khanproduct2.jpg', 'assets/blogs/thumbs/Khanproduct2.jpg', ''),
(53, 'Khan', 'Web Developer', 'kbkbkb', 'assets/blogs/Khanproduct6.jpg', 'assets/blogs/thumbs/Khanproduct6.jpg', ''),
(54, 'Khan', 'Web Developer', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/KhanLogo.png', 'assets/blogs/thumbs/KhanLogo.png', ''),
(55, 'Khan', 'Kashmir', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/Khan41-best-and-coolest-collection-hd-wallpapers-ever-23.jpg', 'assets/blogs/thumbs/Khan41-best-and-coolest-collection-hd-wallpapers-ever-23.jpg', ''),
(56, 'Khan', 'Web Developer', 'hbsivhbkb iebdk ouwkad ouebdak', 'assets/blogs/KhanIMG-20131221-WA0002.jpg', 'assets/blogs/thumbs/KhanIMG-20131221-WA0002.jpg', ''),
(57, 'its me', 'ckeditor', 'hhehjugvw uwcyue&nbsp;\r\n\r\n&nbsp;\r\n\r\n\r\niuvyubuuw\r\n\r\n\r\nj hsj j j bwu u&nbsp; huvw7v b\r\n\r\n\r\n	ivyw y ywyw', 'assets/blogs/its meproduct7.jpg', 'assets/blogs/thumbs/its meproduct7.jpg', ''),
(58, 'jnknknknk', 'knknknknk', '<p><strong>kbjjjvjh</strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong><img alt="" src="/flyparadise/assets/blogs/images/product3.jpg" style="height:500px; width:600px" /></strong></p>\n', 'assets/blogs/jnknknknkproduct1.jpg', 'assets/blogs/thumbs/jnknknknkproduct1.jpg', ''),
(59, 'umar', 'Web Developer', '<p>khbugve <s>uubcuv ube</s></p>\r\n', 'assets/blogs/umarproduct16.jpg', 'assets/blogs/thumbs/umarproduct16.jpg', ''),
(60, 'Khan', 'Kashmir', '<p>kjbhsdbkjutfed iefbuewbce</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>vojebvhebjv</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>evibeuvb</p>\r\n\r\n<p><img alt="" src="/flyparadise/assets/blogs/images/product3.jpg" style="height:500px; width:600px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>asihcjbj</p>\r\n\r\n<p>hcvhdvjhh</p>\r\n', 'assets/blogs/Khanproduct9.jpg', 'assets/blogs/thumbs/Khanproduct9.jpg', ''),
(61, 'Khan', 'Web Developer', '<p>kcihb vugab gyvu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>efw</p>\r\n\r\n<p>b</p>\r\n\r\n<h1><strong>rwb</strong></h1>\r\n\r\n<h2 style="font-style:italic;"><strong>r</strong></h2>\r\n\r\n<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>b</strong></div>\r\n\r\n<p>rw</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'assets/blogs/Khanproduct11.jpg', 'assets/blogs/thumbs/Khanproduct11.jpg', 'popular'),
(62, 'Umar Khan', 'Kashmir', '<blockquote>\r\n<p>Thi siibu uebvud uebvu qeb jef..evhrb&nbsp;</p>\r\n</blockquote>\r\n\r\n<p>ewibvubw<img alt="" src="/flyparadise/assets/blogs/images/product3.jpg" style="height:167px; width:200px" />v</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ev4jvhd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p>Khans World&nbsp;</p>\r\n</blockquote>\r\n\r\n<p>Believe jvcueq ucqiev</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>vehwvubwe</p>\r\n', 'assets/blogs/Umar Khanproduct12.jpg', 'assets/blogs/thumbs/Umar Khanproduct12.jpg', 'popular'),
(63, 'Umar Khan', 'Web Developer', '<blockquote>\r\n<h1><code>Khan is here</code></h1>\r\n</blockquote>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p>evuvuqei iyegiqebib i3giqek</p>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p><em><strong>evuvuqei iyegiqebib i3giqek</strong></em></p>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p>evuvuqei iyegiqebib i3giqek</p>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p>evuvuqei iyegiqebib i3giqek</p>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p>evuvuqei iyegiqebib i3giqek</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="/flyparadise/assets/blogs/images/product16.jpg" style="height:167px; width:200px" /></p>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guveevuvuqei iyegiqebib i3giqek</p>\r\n\r\n<p>iegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p>evuvuqei iyegiqebib i3giqekiegyuevuwjgeufv urvufv3 yegi3v8yv fvvvvvvvvvvvvvv vuvjh uy3guve</p>\r\n\r\n<p>evuvuqei iyegiqebib i3giqek</p>\r\n', 'assets/blogs/Khan41-best-and-coolest-collection-hd-wallpapers-ever-23.jpg', 'assets/blogs/thumbs/Khanproduct11.jpg', 'popular'),
(64, 'Khan', 'Web Developer', '<p>khvtuva nm</p>\r\n', 'assets/blogs/Khanproduct5.jpg', 'assets/blogs/thumbs/Khanproduct5.jpg', 'popular'),
(65, 'Khan', 'Kashmir', '<h2>Hello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgve</h2>\r\n\r\n<blockquote>\r\n<p>Hello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgve</p>\r\n</blockquote>\r\n\r\n<p>Hello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgve</p>\r\n\r\n<p><img alt="" src="/flyparadise/assets/blogs/images/product16.jpg" style="height:167px; width:200px" /></p>\r\n\r\n<p>Hello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgveHello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgveHello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgve</p>\r\n\r\n<blockquote>\r\n<p>Hello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgve</p>\r\n</blockquote>\r\n\r\n<p>Hello eiive uevcue uvee evbevgve ubiceb ibieie ibcievb ieb bwkqb eibjhbj iebbeib ubiqbugvd uibevbej vibjwej uvuevjvej uevj jvjqg vcuvgve</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'assets/blogs/Khanproduct16.jpg', 'assets/blogs/thumbs/Khanproduct16.jpg', 'featured');

-- --------------------------------------------------------

--
-- Table structure for table `blogdetails`
--

CREATE TABLE IF NOT EXISTS `blogdetails` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `bid` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `starts` varchar(15) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(254) NOT NULL AUTO_INCREMENT,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `tripplanstage` varchar(99) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hotelrating` varchar(15) NOT NULL,
  `needflight` varchar(10) NOT NULL,
  `budget` varchar(30) NOT NULL,
  `adults` varchar(10) NOT NULL,
  `infants` varchar(10) NOT NULL,
  `children` varchar(10) NOT NULL,
  `planningtobookon` varchar(99) NOT NULL,
  `budgettext` varchar(10) NOT NULL,
  `noofdays` int(5) NOT NULL,
  `remarks` varchar(999) NOT NULL,
  `pickupplace` varchar(200) NOT NULL,
  `dropplace` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `from`, `to`, `date`, `tripplanstage`, `phone`, `email`, `hotelrating`, `needflight`, `budget`, `adults`, `infants`, `children`, `planningtobookon`, `budgettext`, `noofdays`, `remarks`, `pickupplace`, `dropplace`, `status`) VALUES
(46, 'j j js', 'jaej', '2017-03-16', 'Still dreaming . . . not sure I''m going to take this trip', '000909099', 'danish@flyparadise.in', '2 Star', 'no', 'Premium', '2', '0', '0', 'just checking price', '1200', 0, '', '', '', 'Completed'),
(47, 'kashmier', 'test', '2017-03-23', 'Still dreaming . . . not sure I''m going to take this trip', '9906407579', 'danish@flyparadise.in', '2 Star', 'no', 'Premium', '2', '0', '0', 'in next 2-3 days', '220000', 0, '', '', '', 'Canceled'),
(48, 'ojbirw', '', '1970-01-01', 'Still dreaming . . . not sure I''m going to take this trip', '9906407579', 'danish@flyparadise.in', 'No Choice', 'No', 'Not Set', '2', '0', '0', 'in next 2-3 days', '0', 0, '', '', '', 'New'),
(49, 'Kashmir', 'Ladakh', '1970-01-01', 'Still dreaming . . . not sure I''m going to take this trip', '9906407579', 'danish@flyparadise.in', '2 Star', '', 'Not Set', '2', '0', '0', 'later sometime', '0', 0, '', 'hvuvu', 'ufutfut', 'Canceled'),
(50, 'khbjhvj', '', '2017-03-02', 'Still dreaming . . . not sure I''m going to take this trip', '0000909090', 'danish@flyparadise.in', '4 Star', 'no', 'Deluxe', '2', '6', '10', 'in this month', '12000', 7, '', 'haryana', 'delhi', 'Completed'),
(51, 'khbjhvj', '', '2017-03-02', 'Still dreaming . . . not sure I''m going to take this trip', '0000909090', 'nbjvj', '4 Star', 'no', 'Deluxe', '2', '6', '10', 'in this month', '12000', 7, '', 'haryana', 'delhi', 'New'),
(52, 'khbjhvj', '', '2017-03-02', 'Still dreaming . . . not sure I''m going to take this trip', '0000909090', 'nbjvj', '4 Star', 'no', 'Deluxe', '2', '6', '10', 'in this month', '12000', 7, '', 'haryana', 'delhi', 'New'),
(53, 'kjhbkhbk', 'igniter testing', '1970-01-01', 'Still dreaming . . . not sure I''m going to take this trip', '', '', 'No Choice', '', 'Not Set', '2', '0', '0', 'in next 2-3 days', '0', 55, '', 'khjhbjh', '44', 'New'),
(54, 'khvjgvj', 'jcvsjvj', '2017-04-19', 'Still dreaming . . . not sure I''m going to take this trip', '9999999999', 'umar@gmail.com', 'No Choice', 'no', 'Deluxe', '2', '0', '0', 'in next 2-3 days', '180000', 77, '', 'kjbkhb', 'kjbkhbk', 'Canceled'),
(55, 'jjhj', 'test', '2017-05-17', 'Flight-Train already booked, just need remaining package', '9000000000', 'abcd@gmail.com', 'No Choice', 'no', 'Premium', '2', '1', '0', 'in next 2-3 days', '5600', 3, '', 'srinagar', 'tyyy', 'New'),
(56, 'jjhj', 'test', '2017-05-17', 'Flight-Train already booked, just need remaining package', '9000090999', 'abcd@gmail.com', 'No Choice', 'no', 'Premium', '2', '1', '0', 'in next 2-3 days', '5600', 3, '', 'srinagar', 'tyyy', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `cab`
--

CREATE TABLE IF NOT EXISTS `cab` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `custompackages`
--

CREATE TABLE IF NOT EXISTS `custompackages` (
  `id` int(244) NOT NULL AUTO_INCREMENT,
  `tripid` int(244) NOT NULL,
  `price` int(9) NOT NULL,
  `hotel` varchar(200) NOT NULL,
  `flight` varchar(200) NOT NULL,
  `cab` varchar(200) NOT NULL,
  `inclusions` text NOT NULL,
  `exclusions` text NOT NULL,
  `iterations` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`id`),
  KEY `tripid` (`tripid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `custompackages`
--

INSERT INTO `custompackages` (`id`, `tripid`, `price`, `hotel`, `flight`, `cab`, `inclusions`, `exclusions`, `iterations`, `status`) VALUES
(3, 55, 222, 'bbbkb', 'bkbkbkb', 'bkbkbkbk', 'hello 1iuwxuw', 'whvcev ve', 'siv ueuev', 'New'),
(4, 55, 266, 'hahaha', 'bkbkbkb', 'bkbkbkbk', 'hello 1iuwxuw', 'whvcev ve', 'siv ueuev', 'New'),
(5, 56, 1200, '3 start (Himalaya)', 'N/A', 'Yes - Indica ', 'cab $$$$ food $$$$ photo albumb $$$$ ', 'tickets $$$$ drinks $$$$ massage $$$$ entry fee $$$$ ', 'Gulmarg to pahalgam $$$$ pahalgam to srinagar $$$$ ', 'Completed'),
(6, 56, 23442, 'alpino - 3 star', 'NA', 'NA', 'vyvyvuvugv $$$$ ', 'uvugvug1 $$$$ vghvhgvh2 $$$$ ', 'estfy1 $$$$ ctc2 $$$$ yycy3 $$$$ ', 'New'),
(7, 55, 23442, 'alpino - 3 star', 'NA', 'NA', 'vyvyvuvugv $$$$ ', 'uvugvug1 $$$$ vghvhgvh2 $$$$ ', 'estfy1 $$$$ ctc2 $$$$ yycy3 $$$$ ', 'Completed'),
(8, 55, 23442, 'alpino - 3 star', 'NA', 'NA', 'vyvyvuvugv $$$$ ', 'uvugvug1 $$$$ vghvhgvh2 $$$$ ', 'estfy1 $$$$ ctc2 $$$$ yycy3 $$$$ ', 'Cancelled'),
(9, 56, 1000, 'hjjb', 'jbjbj', 'bjbj', 'bjbjb $$$$ ', 'jbjb $$$$ jbjbjb $$$$ jbjbj $$$$ ', 'bjbj $$$$ bjbj $$$$ ', 'New'),
(10, 55, 1000, 'hjjb', 'jbjbj', 'bjbj', 'bjbjb $$$$ ', 'jbjb $$$$ jbjbjb $$$$ jbjbj $$$$ ', 'bjbj $$$$ bjbj $$$$ ', 'Cancelled'),
(11, 55, 19000, 'Himalaya ', 'NA', 'Yes - Toyota Innova', 'Iteration1 $$$$ Iteration2 $$$$ it3 $$$$ back to home $$$$ ', 'Entry fee $$$$ Drinks $$$$ Fee $$$$ Local rides  $$$$ Any other sport $$$$ ', 'Test1 $$$$ Test2 $$$$ Test2 $$$$ Test4 $$$$ ', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `daybook`
--

CREATE TABLE IF NOT EXISTS `daybook` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `entryby` varchar(99) NOT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `paymentto` varchar(99) NOT NULL,
  `type` varchar(10) NOT NULL,
  `amount` int(99) NOT NULL,
  `desc` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `daybook`
--

INSERT INTO `daybook` (`id`, `entryby`, `entrytime`, `date`, `paymentto`, `type`, `amount`, `desc`) VALUES
(7, 'umar', '2017-02-16 16:40:28', '2017-02-08', 'Umar', 'Credit', 1233, 'huvuveuvequ'),
(8, 'umar', '2017-02-16 16:40:34', '2017-02-08', 'Umar', 'Credit', 1233, 'huvuveuvequ'),
(9, 'umar', '2017-03-02 17:36:09', '2017-03-10', 'yyyyyy', 'Debit', 700, 'testing'),
(10, '', '2017-05-10 09:12:26', '2017-05-11', 'Hotel', 'Credit', 1000, 'test'),
(11, '', '2017-05-10 09:13:36', '2017-05-19', 'Hotel', 'Credit', 7777, 'Testing with session'),
(12, 'umar@gmail.com', '2017-05-10 09:14:50', '2017-05-19', 'Hotel', 'Credit', 7777, 'Testing with session'),
(13, 'umar@gmail.com', '2017-05-11 08:20:52', '2017-05-17', 'testt', 'Credit', 7888, 'test'),
(14, 'umar@gmail.com', '2017-05-11 09:47:47', '1970-01-01', 'Hotel', 'Credit', 96976, 'Not Avaliable');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `destination` varchar(999) NOT NULL,
  `desc` varchar(999) NOT NULL,
  `links` varchar(999) NOT NULL,
  `worthwatching` varchar(999) NOT NULL,
  `getaways` varchar(999) NOT NULL,
  `heading2` varchar(999) NOT NULL,
  `desc2` varchar(999) NOT NULL,
  `img1` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `destination`, `desc`, `links`, `worthwatching`, `getaways`, `heading2`, `desc2`, `img1`) VALUES
(1, 'Kashmir', 'Visit an exotic paradise where land bursts with color, the mountains clad with snow and there is no overtime.', 'Air$$$$Water$$$$Road$$$$Rail', 'Water $$$$ Snow $$$$ Green pastures $$$$ Mountains $$$$ Galciers', 'Pashmina $$$$ Saffron $$$$ Dry Fruits', 'Warmest Place', 'You gather the idea that Kashmir was made first, and then heaven, and that heaven was copied after Kashmir.', 'assets/destinations/kashmir.JPG'),
(2, 'Kashmir', 'Visit an exotic paradise where land bursts with color, the mountains clad with snow and there is no overtime. Try it here', 'Air Water Road Rail', 'Water  Mountains Galciers', 'Pashmina Saffron Dry Fruits', 'Warmest Place', 'You gather the idea that Kashmir was made first, and then heaven, and that heaven was copied after Kashmir.', 'assets/destinations/test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passcode` varchar(10000) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(26) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `passcode`, `Created_On`, `email`, `phone`, `name`) VALUES
(62, 'd288ba9a0517916679db3f63985ffbab', '2015-04-15 13:48:37', 'umar@gmail.com', '9791234566', 'Umar'),
(67, 'd288ba9a0517916679db3f63985ffbab', '2017-04-24 12:19:31', 'umee909@gmail.com', '+91990640757', 'Umar'),
(68, '61e108affacaddb07d0404e530e3bfbf', '2017-04-24 12:20:16', 'test@ymail.co.in', '8898909890', 'Test'),
(69, 'a4dae4169c58da350ce1720bd8e8d899', '2017-04-27 05:43:10', 'hanu@ymail.com', '9906567899', 'Hanan');

-- --------------------------------------------------------

--
-- Table structure for table `homepagedestinations`
--

CREATE TABLE IF NOT EXISTS `homepagedestinations` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `destination` varchar(100) NOT NULL,
  `desc` varchar(999) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `homepagedestinations`
--

INSERT INTO `homepagedestinations` (`id`, `destination`, `desc`, `imgpath`) VALUES
(33, 'Himachal', 'Best package', 'images/homepagedestinations/Himachal635982646968672800-1766933105_fresh_nature-1280x720.jpg'),
(34, 'Kerala', 'Testing', 'images/homepagedestinations/Keralaimages.jpg'),
(35, 'voila', 'Best package', 'images/homepagedestinations/voilaNature-of-Brazil.jpg'),
(36, 'Srinagar Kashmir', 'mbaus eqhbivb ebieqbv ibiqeb iebieqb ievbiq iebieb', 'images/homepagedestinations/Srinagar Kashmir2016-photocontest-yosemite-w-1.jpg'),
(37, 'Shimla', 'iguvhvuvug', 'images/homepagedestinations/Shimla01-book-talk-outdoors-nature-neuroscience.jpg'),
(38, 'Goa', 'Best package', 'images/homepagedestinations/Goapexels-photo.jpg'),
(39, 'Test', 'mbaus eqhbivb ebieqbv ibiqeb iebieqb ievbiq iebieb', 'images/homepagedestinations/Test01-book-talk-outdoors-nature-neuroscience.jpg'),
(40, 'Dalgate', 'Best package', 'images/homepagedestinations/Dalgate505872990.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `honeymoonhp`
--

CREATE TABLE IF NOT EXISTS `honeymoonhp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(100) NOT NULL,
  `desc` varchar(999) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `heading` varchar(999) NOT NULL,
  `duration` varchar(99) NOT NULL,
  `type` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `honeymoonhp`
--

INSERT INTO `honeymoonhp` (`id`, `destination`, `desc`, `imgpath`, `heading`, `duration`, `type`) VALUES
(9, 'Himachal', 'Best package', 'images/honeymoonhp/Himachal2016-earth.jpg', 'Hello Thos is a good one', '4D/5N', 'Helicopter trip'),
(10, 'Srinagar Kashmir', 'mbaus eqhbivb ebieqbv ibiqeb iebieqb ievbiq iebieb', 'images/honeymoonhp/Srinagar Kashmir2016-photocontest-yosemite-w-1.jpg', 'Enjoy the visit', '3D/4N', 'Helicopter trip'),
(11, 'Kerala', 'Best package', 'images/honeymoonhp/Keralapexels-photo.jpg', 'Hello Thos is a good one', '4D/5N', 'Helicopter trip');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `stars` varchar(40) NOT NULL,
  `desc` varchar(2000) NOT NULL,
  `extrabedprice` int(7) NOT NULL,
  `childwithoutbed6` int(7) NOT NULL,
  `childbelow5years` int(7) NOT NULL,
  `cp` int(7) NOT NULL,
  `ep` int(7) NOT NULL,
  `ap` int(7) NOT NULL,
  `map` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `location`, `stars`, `desc`, `extrabedprice`, `childwithoutbed6`, `childbelow5years`, `cp`, `ep`, `ap`, `map`) VALUES
(3, 'Aksa', 'Srinagar', '3', 'testing', 500, 300, 100, 1000, 1000, 120, 12000),
(4, 'test', 'Srinagar', '3', 'dNote is a Free Notepad + Editor. You can Create files and save them at any location of your phone. You can share your notes with anyone through bluetooth, email etc.. You can open any type of file which contains human readable characters like .txt, .c, .java, .xml, .html etc.. There is no built in editor in android for performing these functions. dNote is a complete solution to editing any type of file.', 300, 100, 0, 1700, 1200, 1200, 900);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(220) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `date`, `desc`) VALUES
(0, 'hhjhjh', '2017-03-30', 'knd eqeqibi'),
(0, 'test', '2017-04-22', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `category` varchar(99) NOT NULL,
  `hotelstar` varchar(20) NOT NULL,
  `description` varchar(999) NOT NULL,
  `includeflights` varchar(20) NOT NULL,
  `price` int(9) NOT NULL,
  `path` varchar(100) NOT NULL,
  `localcab` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `destination`, `duration`, `category`, `hotelstar`, `description`, `includeflights`, `price`, `path`, `localcab`) VALUES
(1, 'Kerala Tour', 'kerala', '4 days 3 nights', 'Honeymoon', '3', 'Cool Package', 'Yes', 32000, 'images/packages/ad-blog2.png', 'No'),
(2, 'Honeymoon', 'KAshmir', '5 days 4 nights', 'Honeymoon', '3', 'testing', '6700', 3300, 'images/packages/images.jpg', 'Yes'),
(3, 'friends', 'Kashmir', '3 days 2 nights', 'Friends and Family', '4', 'Best package', '7000', 12000, 'images/packages/images.jpg', 'Yes'),
(4, 'Test new', 'Kashmir', '4 days 3 nights', 'Honeymoon', '4', 'Best package', '7000', 17899, 'images/packages/images.jpg', 'Yes'),
(5, 'new', 'Kashmir', '4 days 3 nights', 'Solo', '4', 'Best package', '89000', 19877, 'images/packages/images.jpg', 'No'),
(6, 'new', 'Kashmir', '4 days 3 nights', 'Solo', '4', 'Best package', 'No', 89000, 'images/packages/images.jpg', 'No'),
(7, 'Kashmir Best Package', 'Kashmir', '4 days 3 nights', 'Solo', '4', 'Testing', 'No', 17000, 'images/packages/images.jpg', 'Yes'),
(8, 'Kahmir Best Package', 'Kashmir', '3 days 2 nights', '', '3', 'Best package , testing here', 'No', 11000, 'images/packages/2016-photocontest-yosemite-w-1.jpg', 'Yes'),
(9, 'Kahmir Best Package', 'Kashmir', '4 days 3 nights', '', '4', 'Best package , testing here', 'No', 13000, 'images/packages/stock-photo-142984111-1500x1000.jpg', 'Yes'),
(10, 'Kahmir Best Package', 'Kashmir', '4 days 3 nights', 'Honeymoon', '4', 'Best package , testing here', 'No', 13000, 'images/packages/stock-photo-142984111-1500x1000.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `populardesthp`
--

CREATE TABLE IF NOT EXISTS `populardesthp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(100) NOT NULL,
  `desc` varchar(999) NOT NULL,
  `imgpath` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `populardesthp`
--

INSERT INTO `populardesthp` (`id`, `destination`, `desc`, `imgpath`) VALUES
(63, 'Srinagar Kashmir', 'Best package', 'images/populardest/Srinagar Kashmir2016-photocontest-yosemite-w-1.jpg'),
(64, 'Kerala', 'Testing', 'images/populardest/Keralaforest_scene_with_sunrays_2.jpg'),
(65, 'voila', 'Best package', 'images/populardest/voilastock-photo-142984111-1500x1000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `id` int(244) NOT NULL AUTO_INCREMENT,
  `bookingid` int(244) NOT NULL,
  `empid` int(244) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `time` datetime NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_REM_EMPID` (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `bookingid`, `empid`, `notes`, `time`, `addedon`) VALUES
(6, 56, 62, 'testing', '2017-05-24 19:43:00', '2017-05-23 11:06:50'),
(7, 56, 62, 'rem1', '2017-05-24 19:43:14', '2017-05-23 11:08:48'),
(13, 56, 69, 'testing', '2017-05-31 14:43:08', '2017-05-23 11:13:36'),
(14, 56, 67, 'Test reminder', '2017-05-29 06:30:00', '2017-05-23 11:14:46'),
(15, 56, 67, 'Test reminder', '2017-05-26 16:27:06', '2017-05-23 11:15:04'),
(16, 56, 67, 'hello', '2017-05-23 17:03:00', '2017-05-23 11:30:28'),
(17, 56, 67, 'Testing sucess', '2017-05-29 16:27:00', '2017-05-26 09:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `desc` varchar(999) NOT NULL,
  `imgpath` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `about`, `desc`, `imgpath`) VALUES
(1, 'umar', 'kashmir', 'paradise on earth', 'images/reviewimages/avatar.png'),
(2, 'test', 'test', 'testing', 'images/reviewimages/avatar.png'),
(6, 'Umar Khan', 'Oman', 'Best place hehe', 'images/reviewimages/avatar.png'),
(7, 'testing', 'hgjvjgvj', 'kjhbkhbkb', 'images/reviewimages/avatar.png'),
(8, 'Umar yaqoob khan', 'test', 'This is testing review', 'images/reviewimages/avatar.png'),
(9, 'Umar yaqoob khan', 'test', 'This is testing review', 'images/reviewimages/avatar.png'),
(10, 'Umar', 'Web Developer', 'Being a web developer, i like the wyay platform has been designed.Its perfect !!!', 'images/reviewimages/avatar.png'),
(11, 'Umar yaqoob khan', 'Web Developer', 'Being a web developer, i like the wyay platform has been designed.I like the flow of different modules integrated together. Its perfect !!!', 'images/reviewimages/avatar.png'),
(12, 'Umar yaqoob khan', 'test', 'This is testing review', 'images/reviewimages/avatar.png'),
(13, 'Umar yaqoob khan', 'Web Developer', 'Being a web developer, i like the wyay platform has been designed.I like the flow of different modules integrated together. Its perfect !!!', 'images/reviewimages/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(15, 'abcd123@rtc.com'),
(16, 'umee@ymail.com'),
(17, 'umar@gmail.com'),
(20, 'iyvubbv@gnail.com'),
(21, 'numan90978@yahoo.com'),
(22, 'abcd123@ymail.in'),
(26, 'umee909@gmail.com'),
(27, 'asrarimtiyaz@gmail.com'),
(28, 'abcd@gmail.com'),
(29, 'hhghh@yyy.com'),
(30, 'mymymy@ymeail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t&c`
--

CREATE TABLE IF NOT EXISTS `t&c` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `place` varchar(200) NOT NULL,
  `tc` varchar(10000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t&c`
--

INSERT INTO `t&c` (`id`, `place`, `tc`, `date`) VALUES
(1, 'Srinagar', '1. hbjehbjbej 2. b ieqbiebqibe 3. d biebcibeqbib', '2017-05-09 08:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passcode` varchar(10000) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(26) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(999) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `passcode`, `Created_On`, `email`, `phone`, `name`, `img`) VALUES
(62, 'd288ba9a0517916679db3f63985ffbab', '2015-04-15 13:48:37', 'umar@gmail.com', '9791234566', 'Umar', ''),
(68, '61e108affacaddb07d0404e530e3bfbf', '2017-04-24 12:20:16', 'test@ymail.co.in', '8898909890', 'Test', ''),
(69, 'a4dae4169c58da350ce1720bd8e8d899', '2017-04-27 05:43:10', 'hanu@ymail.com', '9906567899', 'Hanan', ''),
(70, '646dad7277d585e11f20fb7edf60a58d', '2017-09-08 16:58:26', 'employee@employee.com', '', 'Umar', ''),
(74, '04bd0b9ed8eda9a0696c50ddcb21b1a4', '2017-11-19 07:00:48', 'umee909@gmail.com', '', 'UmAr KhAn', 'https://lh5.googleusercontent.com/-fMrEM0JdFrA/AAAAAAAAAAI/AAAAAAAAAFg/zwq6ehnCP2Q/s96-c/photo.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custompackages`
--
ALTER TABLE `custompackages`
  ADD CONSTRAINT `custompackages_ibfk_1` FOREIGN KEY (`tripid`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `FK_REM_EMPID` FOREIGN KEY (`empid`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
