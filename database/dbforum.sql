-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 04:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(12) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Technology'),
(2, 'Business'),
(3, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `accnt_Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accnt_Id`, `username`, `password`, `user_Id`) VALUES
(4, 'nnonso440', '827ccb0eea8a706c4c34a16891f84e7b', 4),
(5, 'jasmine10', '827ccb0eea8a706c4c34a16891f84e7b', 5),
(6, 'roddy', '827ccb0eea8a706c4c34a16891f84e7b', 6),
(22, 'benny@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 22),
(23, 'larry', '827ccb0eea8a706c4c34a16891f84e7b', 23),
(24, 'jacob_the_ray', '827ccb0eea8a706c4c34a16891f84e7b', 24),
(25, 'prime_lord', '827ccb0eea8a706c4c34a16891f84e7b', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `comment_Id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `post_Id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`comment_Id`, `comment`, `post_Id`, `datetime`, `user_Id`) VALUES
(8, 'hello i am new here \n', 1, '2022-11-20 07:25:43', 5),
(9, ' so what happens now ', 1, '2022-11-20 07:26:27', 5),
(10, 'okay so that is how it works, i like that', 1, '2022-11-20 08:29:49', 6),
(11, 'what story?\n', 8, '2022-11-23 08:33:31', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbllikecomment`
--

CREATE TABLE `tbllikecomment` (
  `post_Id` int(11) NOT NULL,
  `comment_Id` int(11) NOT NULL,
  `user_Id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllikecomment`
--

INSERT INTO `tbllikecomment` (`post_Id`, `comment_Id`, `user_Id`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 5),
(1, 1, 15),
(8, 11, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbllikepost`
--

CREATE TABLE `tbllikepost` (
  `post_Id` int(11) NOT NULL,
  `user_Id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllikepost`
--

INSERT INTO `tbllikepost` (`post_Id`, `user_Id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 2),
(6, 4),
(7, 23),
(8, 23),
(9, 4),
(9, 24),
(9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `post_Id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `cat_id` int(12) DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_Id`, `title`, `content`, `datetime`, `cat_id`, `user_Id`) VALUES
(1, 'Welcome', 'This is to invite everyone cordially to this forum.\r\n                        ', '2019-10-22 02:46:55', 1, 0),
(6, 'what is java', '                        wwthggggggggyhhghgghghggggggghghghghghghgggggggiuiitttluuiouiiouoiuiouiloremm', '2022-11-18 11:47:48', 3, 4),
(7, 'i want to network', '                        it is so coolll', '2022-11-20 10:58:49', 2, 6),
(8, 'java is tough', '                       let me tell you a story about java', '2022-11-20 11:03:49', 3, 6),
(10, 'stocks are crashing', '                    i dont know why it is happening but it is okay,i know we will all survive to see tomorrow \r\nand look back today and laugh . i suggest that start investing into mre profitable stockas to avoisd loss of our initial investment    ', '2022-11-23 08:27:02', 2, 23),
(12, 'The enterntaiment industry', '                        To be very honest thing has changed alot on the internet over this  past few years .but i am happy afro-pop is taking over........', '2022-11-23 08:57:05', 3, 24),
(13, 'i love wizkid music', '                        machala is the greatest..hehe', '2022-11-23 05:28:24', 3, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_Id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_Id`, `fname`, `lname`, `gender`) VALUES
(4, 'nonso', 'enwerem', 'Male'),
(5, 'jasmine', 'label', 'Female'),
(6, 'rod', 'benny', 'Male'),
(22, 'ben', 'bruce', 'Male'),
(23, 'larry', 'tod', 'Male'),
(24, 'jacob', 'ray', 'Male'),
(25, 'divine', 'nwa', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`accnt_Id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`comment_Id`),
  ADD KEY `user_Id` (`user_Id`),
  ADD KEY `post_Id` (`post_Id`),
  ADD KEY `user_Id_2` (`user_Id`);

--
-- Indexes for table `tbllikecomment`
--
ALTER TABLE `tbllikecomment`
  ADD PRIMARY KEY (`post_Id`,`comment_Id`,`user_Id`);

--
-- Indexes for table `tbllikepost`
--
ALTER TABLE `tbllikepost`
  ADD PRIMARY KEY (`post_Id`,`user_Id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`post_Id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `accnt_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD CONSTRAINT `tblaccount_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbluser` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbluser` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomment_ibfk_2` FOREIGN KEY (`post_Id`) REFERENCES `tblpost` (`post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `tblpost_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
