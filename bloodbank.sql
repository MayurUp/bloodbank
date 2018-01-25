-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2018 at 11:22 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroups`
--

CREATE TABLE `bloodgroups` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(55) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroups`
--

INSERT INTO `bloodgroups` (`id`, `name`, `category`, `location`, `date`, `enddate`, `info`) VALUES
('', 'LaPolo', 'O-', 'Delhi', '2018-01-20 00:00:00', '2018-01-27 00:00:00', 'mnb'),
('1', 'JS', 'O+', 'goa', '2018-01-09 00:00:00', '2018-01-27 00:00:00', 'new'),
('1', 'CSS', 'O+', 'up', '2018-01-27 00:00:00', '2018-02-02 00:00:00', 'mnb'),
('', 'cbsc', 'A+', 'up', '2018-01-31 00:00:00', '2018-02-24 00:00:00', 'mkopl'),
('', 'mnb', 'A-', 'uk', '2017-12-04 00:00:00', '2018-01-25 00:00:00', 'pol'),
('', 'iopb', 'B+', 'kanpur', '2017-01-11 00:00:00', '2017-12-10 00:00:00', 'nmj'),
('', 'rfb', 'AB+', 'Delhi', '2018-04-21 00:00:00', '2018-04-21 00:00:00', 'nkhm'),
('', 'fcjfb', 'O+', 'noida', '2018-01-31 00:00:00', '2018-02-04 00:00:00', 'mn '),
('', 'bnhbgb', 'AB-', 'goa', '2018-03-06 00:00:00', '2018-04-17 00:00:00', 'mb.'),
('', 'bnhbgb', 'AB-', 'goa', '2018-03-06 00:00:00', '2018-04-17 00:00:00', 'mb.'),
('', 'bgnmcb', 'B-', 'kanpur', '2017-10-09 00:00:00', '2017-11-29 00:00:00', 'njknj');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `phone` int(12) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(6) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `bloodbank` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `username`, `email`, `password`, `date`, `phone`, `fullname`, `street`, `city`, `state`, `zip`, `country`, `status`, `bloodgroup`, `bloodbank`, `code`) VALUES
(12, 'helo', 'h@h.c', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-18 09:52:32', 2147483647, 'Mayur Gupta', '6/80 farsh bazar, shahdara', 'delhi', 'Delhi', 110032, 'India', '1', '', '', '46259'),
(13, 'heloo', 'hh@h.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-18 09:56:10', 2147483647, 'Mayur', 'shahdara', 'delhi', 'Delhi', 110032, 'India', '1', '', '', '15514');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(12) DEFAULT NULL,
  `category` varchar(55) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `phone`, `category`, `info`, `email`) VALUES
(1, 'h', 0, 'A+', '26jan2018', 'hhhh@hhh.com'),
(2, 'mmm', 0, 'A+', '26jan2018', 'mm@mm.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(6) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `email`, `Fname`, `Lname`, `phone`, `street`, `city`, `state`, `zip`, `country`, `status`, `date`, `code`) VALUES
(1, 'Hello', '$2y$10$77EtuGa3gPmHybwgf5Aa3uUeQhJavcfq8oJJ1MJbDxu4w/sR.CF9C', '2018-01-19 18:30:13', '', 'Mayur', 'Gupta', 2147483647, ' shahdara', 'delhi', 'Delhi', 110032, 'India', '', '0000-00-00 00:00:00', ''),
(2, 'Cart', '$2y$10$RAMz.5xvec8A2zv7lXBN7O3HSUAYlz/O9iiEzTBhVQGCyL.RUqO3C', '2018-01-20 12:08:03', '', 'Mayur', 'Gupta', 2147483647, 'shahdara', 'delhi', 'Delhi', 110032, 'India', '', '0000-00-00 00:00:00', ''),
(3, 'Ni3', '$2y$10$IlfW10Mob7t3M9I1Ev/LCepJ5xrYivOUxS/dAG4NFZxPxDosB76ZO', '2018-01-20 15:38:07', '', '', '', 0, '', '', '', 0, '', '', '0000-00-00 00:00:00', ''),
(5, 'Ni321', '$2y$10$B5a5KK3zYhh1ydmNbWG67.H2iaDdMMicx/kMw267OCuMaZY4dRFxG', '2018-01-20 15:41:33', '', '', '', 0, '', '', '', 0, '', '', '0000-00-00 00:00:00', ''),
(7, 'moom', '$2y$10$W.hf2.l7g7/gdfODzQiPMeeIV85ri6hMgOYCu1dJjgL8IJaUdan7u', '2018-01-20 15:45:30', '', '', '', 0, '', '', '', 0, '', '', '0000-00-00 00:00:00', ''),
(8, 'dool', '$2y$10$pwAbwF0Xp3.c2rzAS4azGeO0QeXyfZtPIgMMOwKDHmLtZeAzGgenS', '2018-01-18 01:01:15', '', '', '', 0, '', '', '', 0, '', '', '0000-00-00 00:00:00', ''),
(9, 'lol', '$2y$10$ycJSKyNHtPldu0MGTaD1.ehTkXP6o6zvlEgGbfkGXQJepXcmLDizi', '2018-01-18 01:02:19', '', '', '', 0, '', '', '', 0, '', '', '0000-00-00 00:00:00', ''),
(10, 'aman', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-18 03:58:45', 'ama@ama.com', '', '', 0, '', '', '', 0, '', '', '2018-01-18 09:28:45', '29184'),
(12, 'ama', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-18 04:01:03', 'm@m.com', '', '', 0, '', '', '', 0, '', '', '2018-01-18 09:31:03', '13394'),
(13, 'admin', '$2y$10$ZUIOyjpa9HEXxQBGT98s6eXB1F0gHcDKTDbavGp8J7iiQcyyLFJLG', '2018-01-18 04:47:25', '', '', '', 0, '', '', '', 0, '', '', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
