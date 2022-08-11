-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 10:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markmyopinion_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `username`, `email`, `mobile_no`, `password`, `profile_image`) VALUES
(4, 'debakanta(developer)', 'd@gmail.com', 1111222233, 'ddddddd', '');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blogid` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `blog_heading` mediumtext NOT NULL,
  `blog_value` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` int(10) NOT NULL,
  `upvote` int(20) NOT NULL,
  `downvote` int(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blogid`, `userid`, `blog_heading`, `blog_value`, `date`, `comment`, `upvote`, `downvote`) VALUES
(19, 116, 'iPhone - Apple', ' iPhone, the world\'s most powerful personal device. Check out iPhone 13 Pro, iPhone 13 Pro Max, iPhone 13, iPhone 13 mini and iPhone SE.', '2022-07-18 12:33:34', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `question_id` varchar(100) NOT NULL,
  `answer` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `upvote` int(100) NOT NULL,
  `downvote` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `username`, `question_id`, `answer`, `date`, `upvote`, `downvote`) VALUES
(196, 125, 'Ram Mohan Lohia', '35', 'If performance will synchronies with luck .', '2022-07-12 00:34:05', 0, 0),
(207, 116, 'Subhashis Patbandha', '57', 'subhashis', '2022-07-18 11:49:05', 0, 0),
(208, 116, 'Subhashis Patbandha', '58', 'yes', '2022-07-18 12:35:34', 0, 0),
(209, 120, 'Debakanta', '58', 'nah , not excited at all.', '2022-07-18 12:42:30', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `comment_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `blog_id` varchar(100) NOT NULL,
  `answer` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `upvote` int(100) NOT NULL,
  `downvote` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_blog`
--

INSERT INTO `comment_blog` (`comment_id`, `user_id`, `username`, `blog_id`, `answer`, `date`, `upvote`, `downvote`) VALUES
(8, 116, 'Subhashis Patbandha', '10', '1', '2022-07-15 11:53:21', 0, 0),
(9, 116, 'Subhashis Patbandha', '9', '2', '2022-07-15 11:53:37', 0, 0),
(14, 116, 'Subhashis Patbandha', '19', 'gg', '2022-07-18 13:06:13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `postid` int(15) NOT NULL,
  `userid` int(100) NOT NULL,
  `post` varchar(10000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`postid`, `userid`, `post`, `date`, `comment`) VALUES
(58, 116, 'Are you excited about iPhone 14 Pro launch in September?', '2022-07-18 12:35:26', 0),
(59, 120, 'Is Elon Musk\'s  Twitter deal is really cancelled? ', '2022-07-18 12:42:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report_blog`
--

CREATE TABLE `report_blog` (
  `reportid` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `blogid` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_blog_comment`
--

CREATE TABLE `report_blog_comment` (
  `reportid` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `blogid` int(100) NOT NULL,
  `commentid` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_issue`
--

CREATE TABLE `report_issue` (
  `reportid` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `reportvalue` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_question_comment`
--

CREATE TABLE `report_question_comment` (
  `reportid` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `questionid` int(200) NOT NULL,
  `commentid` int(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_question_comment`
--

INSERT INTO `report_question_comment` (`reportid`, `userid`, `questionid`, `commentid`, `date`) VALUES
(47, 142, 28, 205, '2022-07-16 16:18:21'),
(48, 142, 28, 204, '2022-07-16 16:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(19) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `mobile`, `password`, `profile_image`, `date`) VALUES
(116, 'Subhashis Patbandha', 'subhashispatbandha2001@gmail.com', 1111111111, '1111111', 'uploads/IMG_20210214_170710.jpg', '2022-07-03 06:44:53'),
(120, 'Debakanta', 'debakanta@gmail.com', 1234567890, '2222222', 'uploads/download.jpg', '2022-07-03 06:44:53'),
(123, 'virat kohli', 'virat@gmail', 2147483647, '3333333', '', '2022-07-08 19:21:27'),
(125, 'Ram Mohan Lohia', 'rammohan1947@gmail.com', 2147483647, '365214', '', '2022-07-12 00:09:35'),
(143, 'Diptesh', 'diptesh@gmail.com', 2147483647, '0000000', '', '2022-07-17 09:55:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `date` (`date`),
  ADD KEY `userid` (`userid`),
  ADD KEY `date_2` (`date`);

--
-- Indexes for table `report_blog`
--
ALTER TABLE `report_blog`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `report_blog_comment`
--
ALTER TABLE `report_blog_comment`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `report_issue`
--
ALTER TABLE `report_issue`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `report_question_comment`
--
ALTER TABLE `report_question_comment`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `postid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `report_blog`
--
ALTER TABLE `report_blog`
  MODIFY `reportid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `report_blog_comment`
--
ALTER TABLE `report_blog_comment`
  MODIFY `reportid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `reportid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report_question_comment`
--
ALTER TABLE `report_question_comment`
  MODIFY `reportid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
