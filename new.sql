-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 01:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `services`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `services_id` int(30) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(30) NOT NULL,
  `area` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `uploadpicture` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`services_id`, `service_name`, `description`, `location`, `area`, `price`, `contact`, `type`, `uploadpicture`, `user_id`, `datetime`) VALUES
(1, 'IT Technician', 'IT services.', '8', 'Georgetown,Balik Pul', 120, '012345678', '', 'uploadpicture/10389359.jpg', 1, '2018-01-22 17:14:20'),
(2, 'STC', 'Repair computer.', '1', 'Kuala Lumpur1', 20, '015-12345678', '', 'uploadpicture/mouse.jpg', 1, '2018-01-23 00:00:48'),
(4, 'Programming Class', 'Class for programming.', '8', 'Georgetown,Balik Pul', 300, '012345678', '', 'uploadpicture/programmer.jpg', 1, '2018-01-23 00:13:44'),
(5, 'IT Technician', 'Repair and service.', '5', 'Alor Gajah,Masjid Ta', 150, '012345678', '', 'uploadpicture/copymachine.jpg', 5, '2018-01-24 09:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `user_id` int(30) NOT NULL,
  `firstname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `address` varchar(39) NOT NULL,
  `country` varchar(39) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `acc_SSM` varchar(20) DEFAULT NULL,
  `company_Name` varchar(20) DEFAULT NULL,
  `services` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`user_id`, `firstname`, `lastname`, `email`, `pwd`, `mobileno`, `address`, `country`, `gender`, `acc_SSM`, `company_Name`, `services`) VALUES
(1, NULL, NULL, 'company', '123', 12345678, 'jalan balik pulau', '3', NULL, '101', 'company', 'IT'),
(2, 'Alex', 'Khoo', 'alex', '123', 12345678, 'jalan balik pulau', '5', 'male', NULL, NULL, NULL),
(3, 'jin', 'lim', 'jin0101@gmail.com', '1234', 165967798, 'bunga raya', '2', 'male', NULL, NULL, NULL),
(5, 'pn', 'afni', 'pnafni@gmail.com', '123', 12345678, 'jalan titi teras', '8', 'female', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--


CREATE TABLE `likes` (
  `like_id` int(30) NOT NULL,
  `services_id` int(15) DEFAULT NULL,
  `user_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`services_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `services_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

ALTER TABLE `likes`
  MODIFY `like_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
