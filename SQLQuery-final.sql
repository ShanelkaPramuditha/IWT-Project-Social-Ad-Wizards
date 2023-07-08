-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 07:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `c_message` varchar(3000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `c_name`, `email`, `c_message`, `created_at`) VALUES
(8, 'test', 'shanelka@gmail.com', 'I want to create an add.', '2023-06-25 21:57:38'),
(9, 'test', 'shanelka@gmail.com', 'I want to create an add.', '2023-06-25 22:00:15'),
(10, 'ggg', 'gggg@gmail.com', 'ggg', '2023-06-25 22:00:48'),
(11, 'dff', 'designer@gmail.com', 'fdgdg', '2023-06-25 22:01:43'),
(12, 'ssf', 'sss@gmail.com', 'dfdfd', '2023-06-25 22:03:53'),
(13, 'ssf', 'sss@gmail.com', 'dfdfd', '2023-06-25 22:09:59'),
(14, 'hn', 'gggg@gmail.com', 'fff', '2023-06-25 22:10:12'),
(15, 'Shanelka Pramuditha', 'shanelka@gmail.com', 'I want more details.', '2023-06-25 23:10:27'),
(16, 'Shanelka 2', 'shanelka@gmail.com', 'I want to more details.', '2023-06-25 23:10:54'),
(17, 'Shanelka', 'test@gmail.com', 'fdfdd', '2023-06-25 23:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `s_user_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `s_user_id`, `question`, `answer`) VALUES
(10, 4, 'How much time is needed for ad design?', ''),
(13, 4, 'Why should I choose Social Ad Wizard', ''),
(14, 4, 'Can I make changes to an order I already placed', ''),
(15, 4, 'How do I get a new password', ''),
(16, 4, 'When will I receive my product', ''),
(17, 4, 'How can I pay for the product', 'You can pay with card'),
(100, 2, 'How much time is needed for ad design?', 'At least 3 days'),
(111, 2, 'Why should I choose Social Ad Wizard', 'Because Social Ad Wizard is a very trustfull and very user friendly compamy. So Customers can satisfied about the final product definitly'),
(112, 2, 'Can I make changes to an order I already placed', 'No. You cannot make changes After place a order'),
(114, 34, 'test test test', NULL),
(115, 38, 'how can I do the proper advertise', 'yes');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_title`, `g_link`, `g_review`, `s_user_id`) VALUES
(29, 'Sample 1', './assets/images/uploads/gallery/649936c7e4f0a_Black White Elegant Hijab Fashion Product Sale Facebook Post.png', 0, NULL),
(30, 'Sample 2', './assets/images/uploads/gallery/64989888d24a3_White Simple Creative Quote Facebook Post.png', 0, NULL),
(31, 'Sample 3', './assets/images/uploads/gallery/649898959ea7c_Blue White Simple Special Offer Facebook Post.png', 0, NULL),
(32, 'Sample 4', './assets/images/uploads/gallery/6498989f75142_Creative Blue Fashion Special Offer (Facebook Post).png', 0, NULL),
(33, 'Sample 5', './assets/images/uploads/gallery/649898ace2bd7_Grey & Red Modern Gym Ads Facebook Post.png', 0, NULL),
(34, 'Sample 6', './assets/images/uploads/gallery/649898bb2a51c_brand new arrival ads facebook.png', 0, NULL),
(35, 'Sample 7', './assets/images/uploads/gallery/649898cda418d_Grey & Red Modern Gym Ads Facebook Post.png', 0, NULL),
(36, 'Sample 8', './assets/images/uploads/gallery/649898d94c41d_Creative Blue Fashion Special Offer (Facebook Post).png', 0, NULL),
(37, 'Sample 9', './assets/images/uploads/gallery/649898e58ff2f_White Simple Creative Quote Facebook Post.png', 0, NULL),
(38, 'Sample 10', './assets/images/uploads/gallery/649898fa8ff3b_Black White Elegant Hijab Fashion Product Sale Facebook Post.png', 0, NULL),
(39, 'Sample 11', './assets/images/uploads/gallery/649899085f3e4_White Simple Creative Quote Facebook Post.png', 0, NULL),
(40, 'Sample 12', './assets/images/uploads/gallery/64989913bd8e7_Blue White Simple Special Offer Facebook Post.png', 0, NULL),
(41, 'Sample 13', './assets/images/uploads/gallery/649899244270c_Grey & Red Modern Gym Ads Facebook Post.png', 0, NULL),
(42, 'Sample 14', './assets/images/uploads/gallery/64989930aa93a_Blue White Simple Special Offer Facebook Post.png', 0, NULL),
(43, 'Sample 15', './assets/images/uploads/gallery/6498993f20e7c_brand new arrival ads facebook.png', 0, NULL),
(44, 'Sample 16', './assets/images/uploads/gallery/64989947b9167_Blue White Simple Special Offer Facebook Post.png', 0, NULL),
(45, 'Sample 17', './assets/images/uploads/gallery/64989953f2d8f_brand new arrival ads facebook.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_percentage` float(5,2) NOT NULL,
  `o_start_date` date NOT NULL DEFAULT current_timestamp(),
  `o_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_percentage`, `o_start_date`, `o_end_date`) VALUES
(32, 10.00, '2023-06-26', '0000-00-00'),
(33, 25.00, '2023-06-26', '0000-00-00');

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
  `ad_format` varchar(5) NOT NULL,
  `documents` varchar(500) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `order_value` float NOT NULL,
  `released_link` varchar(500) DEFAULT NULL,
  `released_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `s_user_id`, `order_date`, `order_status`, `ad_platform`, `order_desc`, `category`, `ad_format`, `documents`, `offer_id`, `order_value`, `released_link`, `released_date`) VALUES
(67, 38, '2023-06-26', 'Completed', 'Facebook', 'I want the create profile picture. 200px*400px', 'Electric Item', 'pictu', NULL, NULL, 2400, 'Product', '2023-06-26');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`s_user_id`, `registered_date`, `first_name`, `last_name`, `email`, `phone_no`, `date_of_birth`, `gender`, `profile_picture`, `user_pass`, `user_role`) VALUES
(1, '2023-06-11', 'Luvi', 'Dias', 'admin@mail.com', '0773456789', '1994-09-01', 'female', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$AGHT/JhfvLw5Bwtg8TzF8.YxD0uwepGj9bfUOHOB4IZj8m5r27mei', 'admin'),
(2, '2023-06-11', 'Olivia', 'Carter', 'manager@mail.com', '0783456789', '1996-09-01', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$aQiIRRQyFIi/TYJcteQHwOMjUHXpzHAL1.buEBqMBVQgYDmxPT/H.', 'manager'),
(3, '2023-06-11', 'Don', 'Brook', 'designer@mail.com', '0713456789', '1998-09-01', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$VicNJHMgAzVtwOEmwa04LuREYIaBerlEtPG8IAR7grFWjqY8kc33e', 'designer'),
(36, '2023-06-26', 'Shanelka', 'Shan', 'sss@mail.com', '1234567890', '2010-06-02', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$AhpC/oU6dttLkiVNcfybX.QReUd8Fo00hSkwPk3gyAcf2TovIEUa6', 'manager'),
(38, '2023-06-26', 'Don', 'Dddd', 'user@mail.com', '0123456789', '2006-06-28', 'male', 'assets/images/uploads/profile-pictures/default.jpg', '$2y$10$pW87wXEHmWiYcedh3JBGa.pR5YwQRhNkwwNzs51Gzv0pnH2wcSxN2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

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
  ADD KEY `order_info_fk2` (`offer_id`),
  ADD KEY `order_info_fk1` (`s_user_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`s_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `s_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery` FOREIGN KEY (`s_user_id`) REFERENCES `registered_users` (`s_user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_fk1` FOREIGN KEY (`s_user_id`) REFERENCES `registered_users` (`s_user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_info_fk2` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`offer_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
