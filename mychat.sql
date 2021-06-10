-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 07:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `log_in` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_country`, `user_gender`, `log_in`) VALUES
(2, 'Tahir', 'tahir123', 'tahir@gmail.com', 'images/me.jpg.29', 'Pakistan', 'Male', 'Online'),
(3, 'Abdullah', 'abdullah123', 'a@gmail.com', 'images/abdullah.jpg.973', 'USA', 'Male', 'Offline'),
(4, 'Navesh', 'navesh123', 'n@gmail.com', 'images/navesh.jpg.738', 'Bangladesh', 'Male', 'Offline'),
(5, 'Fatima', 'fatima123', 'f@gmail.com', 'images/images2.jpg.975', 'UK', 'Female', 'Offline'),
(6, 'Pardeep', 'pardeep123', 'p@gmail.com', 'images/pardeep.jpg.285', 'Pakistan', 'Male', 'Offline'),
(7, 'Aadrish', 'aadrish123', 'ad@gmail.com', 'images/aadrish.jpg.533', 'Bangladesh', 'Male', 'Offline'),
(8, 'Umair', 'umair123', 'u@gmail.com', 'images/empty1.png', 'Pakistan', 'Male', ''),
(10, 'Hassaan', 'hassaan123', 'h@gmail.com', 'images/hassaan.jpg.941', 'India', 'Male', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(1, 'Aadrish', 'Tahir', 'Helloo Tahir How are you?', 'unread', '2020-12-31 05:01:09'),
(2, 'Fatima', 'Tahir', 'Hi man whats up how do you do?', 'unread', '2020-12-31 05:02:32'),
(3, 'Navesh', 'Abdullah', 'How are Abdullah?', 'unread', '2020-12-31 05:04:54'),
(4, 'Pardeep', 'Abdullah', 'Hey Abdullah How are you man? and what are the plans for weekend!', 'unread', '2020-12-31 05:09:23'),
(5, 'Pardeep', 'Abdullah', 'I suggest we should go for tour', 'unread', '2020-12-31 05:10:00'),
(6, 'Hassaan', 'Tahir', 'Hello Tahi How are you?', 'read', '2020-12-31 05:22:11'),
(7, 'Tahir', 'Hassaan', 'I am fine what about you hassaan', 'read', '2020-12-31 05:22:56'),
(8, 'Tahir', 'Abdullah', 'Hello Abdullah How are you?', 'unread', '2020-12-31 05:24:20'),
(9, 'Hassaan', 'Tahir', 'How are you Tahir?', 'read', '2020-12-31 05:40:25'),
(10, 'Tahir', 'Hassaan', 'I Am fine Hassaan', 'read', '2020-12-31 05:40:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
