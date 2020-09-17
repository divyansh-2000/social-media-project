-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 02:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `content_comment` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `username`, `content_comment`, `image`, `created`) VALUES
(12, '24', 'ayush', 'I use paper clones', 'avtar.png', '1570214207'),
(14, '24', 'sumit', 'And i use magic', 'strange.jpg', '1570215274');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(250) NOT NULL,
  `un` varchar(100) NOT NULL,
  `fun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `un`, `fun`) VALUES
(97, 'sumit', 'ankit'),
(98, 'ankit', 'sumit'),
(99, 'ayush', 'sumit'),
(100, 'sumit', 'ayush'),
(101, 'ayush', 'ankit'),
(102, 'ankit', 'ayush'),
(103, 'ankur', 'sumit'),
(104, 'sumit', 'ankur'),
(105, 'deeksha', 'sumit'),
(106, 'sumit', 'deeksha'),
(107, 'deeksha', 'ankit'),
(108, 'ankit', 'deeksha');

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `request_id` int(100) NOT NULL,
  `un` varchar(100) NOT NULL,
  `run` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`request_id`, `un`, `run`) VALUES
(22, 'deeksha', 'ayush'),
(24, 'ayush', 'ankur');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL,
  `likes` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `username`, `post_image`, `content`, `created`, `likes`) VALUES
(20, '1', 'ankur', 'avtar.png', '', '1570126597', 0),
(21, '1', 'ankur', 'orochimaro.jpg', 'Shhhhhhhhh...', '1570201653', 0),
(22, '9', 'sumit', 'lee1.jpg', 'L', '1570203013', 0),
(23, '9', 'sumit', 'strange.jpg', 'S', '1570203047', 0),
(24, '11', 'ayush', 'konan.jpg', 'No more paper clones...', '1570203174', 0),
(26, '13', 'deeksha', 'shino.jpg', 'Bugger', '1570209486', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `phone`, `birthday`, `gender`, `email`, `password`, `profile_picture`) VALUES
(1, 'ankur singh', 'patel', 'ankur', '8429355953', '2000-02-02', 'Male', 'sadgt@gmail.com', '2119487c1b96840f529312aba95c6a783ddb8f65', 'ankur_pic.jpg'),
(9, 'sumit', 'chaurasiya', 'sumit', '8875535667', '1999-08-19', 'Male', 'fstgfy@gmail.com', 'e14bee5243a26f14547dab001972d42f1258d431', 'strange.jpg'),
(10, 'ankit', 'agrawal', 'ankit', '8953652720', '2000-10-04', 'Male', 'gdsd@gmail.com', '46dae70241a50362e1f00f60ae1193a0c709270f', 'captain.jpg'),
(11, 'ayush', 'singh', 'ayush', '9687646765', '', 'Male', 'yfygyg@gmail.com', '655c36b8c4ba4b43391733133e33c6d6784b07c5', 'avtar.png'),
(12, 'Divyansh', 'Gupta', 'divyansh', '7060335724', '', 'Male', 'usdth@gmail.com', '64017c4abf97a423c1daed999971764d9ba1eb4b', 'avtar.png'),
(13, 'Deeksha', 'Gupta', 'deeksha', '6578885466', '', 'Female', 'deeksha@gmail.com', '6ea63169e4dbac232032d3c3c73debfa2f52c26e', 'avtar.png'),
(14, 'Harshit', 'sexy', 'harshit', '8767523744', '', 'Male', 'harshita@gmail.com', 'bd755b7004f182cb154236ec16f15be67cb21a13', 'avtar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `request_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
