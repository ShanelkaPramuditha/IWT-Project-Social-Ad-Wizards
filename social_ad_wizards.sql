-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 03:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_ad_wizards`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `s_user_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `s_user_id`, `question`, `answer`) VALUES
(10, 32, 'How much time is needed for ad design?', ''),
(13, 32, 'Why should I choose Social Ad Wizard', ''),
(14, 32, 'Can I make changes to an order I already placed', ''),
(15, 32, 'How do I get a new password', ''),
(16, 32, 'When will I receive my product', ''),
(17, 32, 'How can I pay for the product', ''),
(100, 32, 'How much time is needed for ad design?', 'At least 3 days'),
(111, 32, 'Why should I choose Social Ad Wizard', 'Because Social Ad Wizard is a very trustfull and very user friendly compamy. So Customers can satisfied about the final product definitly'),
(112, 1, 'Can I make changes to an order I already placed', 'No. You cannot make changes After place a order');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `g_title` varchar(50) NOT NULL,
  `g_link` varchar(300) NOT NULL,
  `g_review` int(11) NOT NULL DEFAULT 0,
  `s_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_title`, `g_link`, `g_review`, `s_user_id`) VALUES
(6, 'Item 4', './assets/images/uploads/gallery/gallery4.jpg', 0, 4),
(7, 'Item 5', './assets/images/uploads/gallery/gallery5.jpg', 0, 4),
(8, 'Item 6', './assets/images/uploads/gallery/gallery6.jpg', 0, 4),
(16, 'ddd', './assets/images/uploads/gallery/6482fdc3e050e_pexels-laraine-davis-1580025(1).jpg', 0, NULL),
(17, 'new 1', './assets/images/uploads/gallery/6484cda201018_gallery7.jpg', 0, NULL),
(18, 'nnnew', './assets/images/uploads/gallery/6484cdb202a41_gallery3.jpg', 0, NULL),
(19, 'newa', './assets/images/uploads/gallery/6484cdbf1635e_gallery7.jpg', 0, NULL),
(20, 'neewa', './assets/images/uploads/gallery/6484cdc9e1e6b_gallery6.jpg', 0, NULL),
(21, 'bea', './assets/images/uploads/gallery/6484cdd64c16c_gallery6.jpg', 0, NULL),
(22, 'newaa', './assets/images/uploads/gallery/6484cde123923_gallery6.jpg', 0, NULL),
(23, 'test', './assets/images/uploads/gallery/64852d9e36308_pexels-craig-adderley-1563355.jpg', 0, NULL),
(24, 'ttt', './assets/images/uploads/gallery/64852dac1a5ca_pexels-katie-burandt-1212693.jpg', 0, NULL),
(25, 'ttt', './assets/images/uploads/gallery/64852db688b53_pexels-craig-adderley-1563355.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_percentage` float(5,2) NOT NULL,
  `o_start_date` date NOT NULL DEFAULT current_timestamp(),
  `o_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_percentage`, `o_start_date`, `o_end_date`) VALUES
(20, 33.00, '2023-06-09', '2023-06-08'),
(21, 15.00, '2023-06-11', '2023-06-20'),
(22, 2.00, '2023-06-11', '2023-06-19'),
(23, 2.00, '2023-06-02', '2023-07-02'),
(24, 5.00, '2023-05-10', '2023-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `s_user_id` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `ad_platform` varchar(10) NOT NULL,
  `order_desc` varchar(2000) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `ad_format` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `s_user_id`, `order_date`, `order_status`, `ad_platform`, `order_desc`, `category`, `ad_format`) VALUES
(1, 32, '2023-05-10', 'pending', 'yt', 'youtube ad', 'yt', 'png'),
(8, 9, '2023-06-15', 'ff', 'ff', 'ff', 'ff', 'ff'),
(9, 1, '2023-06-01', 'ss', 'ss', 'ss', 'ss', 'ss'),
(10, 32, '2023-05-10', 'approve', 'ff', 'facebook ad', 'fb', 'faceb'),
(112, 1, '2023-05-10', 'approve', 'ig', 'instergram ad', 'ig', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `s_user_id` int(11) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `profile_picture` varchar(500) DEFAULT 'assets/images/uploads/profile-pictures/default.jpg',
  `user_pass` varchar(300) NOT NULL,
  `user_role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`s_user_id`, `registered_date`, `first_name`, `last_name`, `email`, `phone_no`, `date_of_birth`, `gender`, `profile_picture`, `user_pass`, `user_role`) VALUES
(1, '2023-06-02', 'Ftest', 'Ltest', 'admin1@gmail.comf', '0771237653', '2000-05-01', 'Male', 'assets/images/uploads/profile-pictures/default.jpg', 'admin', 'admin'),
(4, '2023-06-02', 'Michael', 'Johnson', 'designer@gmail.comf', '0777654321', '1995-03-15', 'Female', 'assets/images/uploads/profile-pictures/default.jpg', 'designer', 'designer'),
(9, '2023-06-02', 'test', 'test', 'managera@gmail.comf', '0123', '2023-05-30', 'male', 'assets/images/uploads/profile-pictures/default.jpg', 'managerd', 'manager'),
(26, '2023-06-11', 'hash', 'hash', 'admin@gmail.com', '1234567890', '2023-06-01', 'female', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$X4xZE.gZMZJrw4JnHNh/OOFZud9R3S2va3pK4e/T0.6E5rCo3YG.u', 'admin'),
(28, '2023-06-11', 'designer', 'designer', 'designer@gmail.com', '0123456789', '2023-06-05', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$VicNJHMgAzVtwOEmwa04LuREYIaBerlEtPG8IAR7grFWjqY8kc33e', 'designer'),
(29, '2023-06-11', 'Manager', 'Manager', 'manager@gmail.com', '0123456789', '2023-06-01', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$aQiIRRQyFIi/TYJcteQHwOMjUHXpzHAL1.buEBqMBVQgYDmxPT/H.', 'manager'),
(32, '2023-06-11', 'user', 'user', 'user@gmail.com', '0123456789', '2023-06-01', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$AGHT/JhfvLw5Bwtg8TzF8.YxD0uwepGj9bfUOHOB4IZj8m5r27mei', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD KEY `faq_fk` (`s_user_id`) USING BTREE;

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `fk_gallery` (`s_user_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_info_fk` (`s_user_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`s_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `s_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_fk` FOREIGN KEY (`s_user_id`) REFERENCES `registered_users` (`s_user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery` FOREIGN KEY (`s_user_id`) REFERENCES `registered_users` (`s_user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_fk` FOREIGN KEY (`s_user_id`) REFERENCES `registered_users` (`s_user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




