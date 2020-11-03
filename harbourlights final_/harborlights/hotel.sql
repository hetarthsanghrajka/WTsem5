-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 03:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phoneno` int(10) DEFAULT NULL,
  `email` text,
  `cdate` date DEFAULT NULL,
  `approval` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usname` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `newsletterlog`
--

CREATE TABLE `newsletterlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(52) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `news` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `troom` varchar(30) DEFAULT NULL,
  `tbed` varchar(30) DEFAULT NULL,
  `nroom` int(11) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `ttot` double(8,2) DEFAULT NULL,
  `fintot` double(8,2) DEFAULT NULL,
  `mepr` double(8,2) DEFAULT NULL,
  `meal` varchar(30) DEFAULT NULL,
  `btot` double(8,2) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`, `fintot`, `mepr`, `meal`, `btot`, `noofdays`) VALUES
(1, 'Mr.', 'DHARMIN', 'LAD', 'Guest House', 'Double', 1, '2020-02-02', '2020-02-04', 360.00, 367.20, 0.00, 'Room only', 7.20, 2),
(2, 'Mr.', 'Kevin', 'Shah', 'Deluxe Room', 'Double', 1, '2020-02-02', '2020-02-03', 220.00, 224.40, 0.00, 'Room only', 4.40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(33, 'ferinpatel79@gmail.com', 'ferinpatel79@gmail.com', '$2y$10$Hv1Oi0lZeFX2HYY8Tmgp0.9ifUDD0oQtZqJi/dkX84ky1nasPtXVy', '6580641253'),
(42, '', '', '$2y$10$7musa4ekG0qSlHOJQwT3nu46aQoxKLSw42OYguvVSn5b80UYcMmlS', '6591964654'),
(43, '17bmiit027@gmail.com', '17bmiit027@gmail.com', '$2y$10$gkYSGRqLz0JEDJhDt0rZr..QApLKLj5ASVypVm5su2kAMzuKxaE4S', '6591964752'),
(44, 'dharminlad1199@gmail.com', 'dharminlad1199@gmail.com', '$2y$10$lUyGHto8aHCC1Pr1yyyXJuCwaBCb6tvsK2ZsJGSzuTBEF3Ry.mQn.', '6591964778');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `cusid` int(11) DEFAULT NULL,
  `ratings` int(11) NOT NULL DEFAULT '3',
  `max_person` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`, `place`, `cusid`, `ratings`, `max_person`) VALUES
(1, 'Superior Room', 'Single', '1500', NULL, 5, 1),
(2, 'Superior Room', 'Double', '2500', NULL, 2, 3),
(4, 'Single Room', 'Quad', '2500', NULL, 3, 5),
(5, 'Superior Room', 'Quad', '3500', NULL, 3, 5),
(6, 'Deluxe Room', 'Single', '1850', NULL, 3, 50),
(8, 'Deluxe Room', 'Triple', '2500', NULL, 3, 5),
(9, 'Deluxe Room', 'Quad', '2000', NULL, 3, 5),
(10, 'Guest House', 'Single', '5500', NULL, 3, 5),
(11, 'Deluxe Room', 'Double', 'Free', NULL, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `FName` text,
  `LName` text,
  `Email` varchar(50) DEFAULT NULL,
  `National` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Phone` text,
  `TRoom` varchar(20) DEFAULT NULL,
  `Bed` varchar(10) DEFAULT NULL,
  `NRoom` varchar(2) DEFAULT NULL,
  `Meal` varchar(15) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `stat` varchar(15) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`, `stat`, `nodays`) VALUES
(3, 'Mr.', 'Yash', 'Patel', '17bmiit072@gmail.com', 'Non Sri Lankan ', 'India', '9874857496', 'Deluxe Room', 'Single', '1', 'Room only', '2020-03-11', '2020-03-11', 'Not Conform', 0),
(5, 'Mr.', 'Akash', 'Patel', '17bmiit086@gmail.com', 'Sri Lankan', 'India', '7847859647', 'Superior Room', 'Single', '1', 'Room only', '2020-03-14', '2020-03-18', 'Not Conform', 4),
(6, 'Dr.', 'kevi', 'nini', 'k@gmail.com', 'Sri Lankan', 'Afghanistan', '464646464', 'Guest House', 'Single', '1', 'Room only', '2000-02-15', '2001-02-15', 'Not Conform', 366);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bedding`
--

CREATE TABLE `tbl_bedding` (
  `bid` int(11) NOT NULL,
  `btype` varchar(25) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bookid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookid`, `uid`, `rid`, `checkin`, `checkout`, `status`) VALUES
(1, 12, 2, '2020-03-13', '2020-03-14', 0),
(2, 12, 4, '2020-03-13', '2020-03-14', 0),
(3, 12, 4, '2020-03-13', '2020-03-14', 1),
(10, 12, 2, '2020-03-13', '2020-03-14', 1),
(11, 12, 2, '2020-03-13', '2020-03-14', 1),
(12, 12, 2, '2070-01-01', '2070-01-01', 1),
(13, 13, 0, '2020-06-19', '2020-06-26', 1),
(14, 13, 0, '2020-06-20', '2020-06-25', 1),
(15, 13, 0, '2020-06-08', '2020-06-27', 1),
(16, 13, 0, '2020-06-08', '2020-06-10', 1),
(17, 13, 0, '2020-06-09', '2020-06-09', 1),
(18, 13, 2, '0000-00-00', '0000-00-00', 1),
(24, 13, 3, '2020-06-14', '2020-06-15', 1),
(25, 13, 0, '2020-06-17', '2020-06-18', 1),
(26, 13, 0, '2020-06-17', '2020-06-18', 1),
(27, 13, 0, '2020-06-11', '2020-06-23', 1),
(28, 13, 8, '2020-06-11', '2020-06-30', 1),
(29, 13, 8, '2020-06-11', '2020-06-17', 1),
(30, 13, 8, '2020-06-11', '2020-06-26', 1),
(31, 13, 8, '2020-06-11', '2020-06-23', 1),
(32, 13, 0, '2020-06-12', '2020-06-19', 1),
(33, 13, 8, '2020-06-12', '2020-06-13', 1),
(34, 13, 8, '2020-06-12', '2020-06-19', 1),
(35, 13, 8, '2020-06-12', '2020-06-25', 1),
(36, 6, 0, '2020-06-12', '2020-06-19', 1),
(37, 6, 0, '2020-06-12', '2020-06-19', 1),
(38, 6, 8, '2020-06-12', '2020-07-21', 1),
(39, 6, 0, '2020-06-12', '2020-06-17', 1),
(40, 6, 9, '2020-06-12', '2020-06-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe`
--

CREATE TABLE `tbl_employe` (
  `eid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cno` bigint(10) NOT NULL,
  `state` varchar(25) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(25) NOT NULL,
  `post` varchar(15) NOT NULL,
  `hdate` date NOT NULL,
  `salary` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employe`
--

INSERT INTO `tbl_employe` (`eid`, `name`, `email`, `address`, `cno`, `state`, `pincode`, `city`, `post`, `hdate`, `salary`, `status`) VALUES
(2, 'Nishith', 'pn39833@gmail.com', 'Abhishek Avenue', 9825289955, 'Gujarat', 395009, 'surat', 'Management', '2020-06-11', 50000, 1),
(3, 'DHARMIN LAD ', 'dharminlad1199@gmail.com', '1/204 CM RESIDENCY, NEAR PARSHURAM GARDEN, ADAJAN, SURAT', 9825289955, 'Gujarat', 395009, 'Surat', 'IT Service', '2020-06-12', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `imageid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `rid` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`rid`, `roomno`, `cid`, `status`) VALUES
(2, 101, 2, 1),
(3, 103, 3, 1),
(4, 102, 2, 1),
(5, 202, 3, 1),
(6, 201, 3, 1),
(7, 301, 2, 1),
(8, 404, 5, 1),
(9, 502, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomcategory`
--

CREATE TABLE `tbl_roomcategory` (
  `cid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `beds` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roomcategory`
--

INSERT INTO `tbl_roomcategory` (`cid`, `name`, `beds`, `description`, `price`, `status`) VALUES
(2, 'Deluxe ', 3, 'xzcxcx', 2000, 1),
(3, 'Superior', 4, 'fjuehufhedf', 5000, 1),
(4, 'Super Deluxe', 3, 'kjdsfbkjdsfn', 3500, 1),
(5, 'Super Superior', 4, 'Abcd', 8000, 1),
(6, 'Guest House', 8, 'Upto 8 person can stay', 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `tid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rcid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`tid`, `cid`, `rcid`, `amount`, `status`) VALUES
(4, 13, 5, 8000, 1),
(5, 13, 5, 8000, 1),
(6, 13, 5, 8000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `contactno` bigint(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  `emailUsers` text NOT NULL,
  `pwdUsers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `fname`, `mname`, `lname`, `contactno`, `gender`, `dob`, `address`, `pincode`, `city`, `state`, `status`, `emailUsers`, `pwdUsers`) VALUES
(6, '', '', '', 0, '', '0000-00-00', '', 0, '', '', 0, 'dharminlad1199@gmail.com', '$2y$10$i8EPf4h7dvirAopipyzPq.oALuCEx8SMxDoyKfLj1UEaghTK6RxRG'),
(8, '', '', '', 0, '', '0000-00-00', '', 0, '', '', 0, 'dharminlad1103@gmaill.com', '$2y$10$UiEWjRtaOxoqOBooL2niiOlrdl312nTAu9K.dwm0mxujK1RAo1MXG'),
(9, '', '', '', 0, '', '0000-00-00', '', 0, '', '', 0, '17bmiit029@gmail.com', '$2y$10$imn33cLmpWd8zFZ0IzAWuubyTz117TbIzY.rQT6jYlx9IvfH7REvC'),
(12, 'kevin', 'Pareshkumar', 'Shah', 9537703300, 'M', '2000-02-15', 'Sastri road,Bardoli', 394601, 'Bardoli', 'Surat', 1, 'kevinshah2703@gmail.com', 'kevin'),
(13, 'Bataki', 'sudhirdaddy', 'Lad', 9825289955, 'M', '1999-03-11', '204-1,CM residency,near parshuram Garden,adajan ,surat', 395009, 'surat', 'Gujarat', 1, 'dharminlad1103@gmail.com', 'Krishna200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bedding`
--
ALTER TABLE `tbl_bedding`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`imageid`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_roomcategory`
--
ALTER TABLE `tbl_roomcategory`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bedding`
--
ALTER TABLE `tbl_bedding`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_roomcategory`
--
ALTER TABLE `tbl_roomcategory`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
