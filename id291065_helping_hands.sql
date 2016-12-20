-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2016 at 05:44 AM
-- Server version: 10.1.18-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id291065_helping_hands`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  `people_needed` smallint(5) UNSIGNED NOT NULL,
  `materials_needed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `date`, `location`, `people_needed`, `materials_needed`) VALUES
(1, 'Beach Clean Up', 'Our beach cleanup crew meets once a month depending on the availability of volunteers. The clean up is set around volunteer schedules. Beach clean up volunteers are responsible for gathering and disposing garbage that amasses on our beaches.', '2016-12-22 00:00:00', 'Carolina Beach', 7, 'Trash bags, gloves'),
(2, 'Meal Delivery', 'We deliver food assistance to homebound individuals in our community. Volunteers can write the mileage and maintenance off of their taxes as a charitable donation. Our drivers can deliver meals during the week or on the weekends.', '2016-12-23 00:00:00', 'Durham, NC', 12, 'Your own vehicle'),
(3, 'Adult Literacy Program', 'Our adult literacy program pairs volunteers with individuals in the community who are struggling with learning to read. Volunteers can make themselves available for hour-long sessions either once a week or several times a week with one or multiple clients.', '2017-01-09 00:00:00', 'Charlotte, NC', 4, 'None'),
(4, 'Food Pantry', 'Our food pantry serves nearly 45 families per day and we receive hundreds of pounds of donations per week. Our food pantry volunteers dilligently sort food donations, throw away expired or opened donations, and pack grocery bags for food insecure families.', '2016-12-19 00:00:00', 'Durham, NC', 14, 'None'),
(5, 'Casework', 'Our devoted caseworkers meet with families during the week to offer free counseling and advice to those who are struggling with employment issues, food insecurity or financial problems. Caseworkers are responsible for interviewing families, assessing their needs and determining action plans for short-term and long-term assistance.', '2016-12-30 00:00:00', 'Charlotte, NC', 5, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `password`) VALUES
(5, 0, 'Joe', '16a9a54ddf4259952e3c118c763138e83693d7fd'),
(6, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(7, 0, 'Katie', 'a5ede38f039918369208c3034eb316ef218ba239'),
(8, 0, 'JohnSmith', '3b842bcd6faab4047ab49f9a99fa0704b9c9d2d7'),
(9, 0, 'Hope', '4955742b2d74102e861dbbc8004c5527b3fe1337'),
(10, 0, 'Priyank', 'c7204e3abe6aa347c98563d39c3e38afb4a4ae6e');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `user_id`, `task_id`) VALUES
(7, 8, 1),
(8, 8, 4),
(10, 7, 1),
(11, 5, 4),
(12, 9, 3),
(13, 9, 5),
(14, 10, 2),
(15, 10, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `task_id` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
