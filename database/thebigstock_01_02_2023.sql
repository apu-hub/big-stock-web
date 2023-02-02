-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 10:20 AM
-- Server version: 8.0.31-cll-lve
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thebigst_bigstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'dev_chayan@thebigstock.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `banner_info`
--

CREATE TABLE `banner_info` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_info`
--

INSERT INTO `banner_info` (`id`, `name`, `image_name`) VALUES
(1, 'a', 'WEB BANNER 2.png'),
(2, 'b', 'WEB BANNER10.png'),
(3, 'c', 'WEB BANNER11.png');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_tags` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `feature_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `category_name`, `category_tags`, `image`, `feature_image`) VALUES
(5, 'Clip Art', 'Building', '0_D2JU_bSYLOPFLuwo.jpg', ''),
(6, 'Illustrations', 'aa', 'laptop-336373__340.jpg', 'active'),
(9, 'T shirt kids ', 'Boys kids ', 'Graphic1.JPG', ''),
(11, 'AA', 'fggnfhg', 'CruelRuel_dramatic_scene._muscular_Doom_guy_as_a_League_of_Lege_a5dbaeac-6f72-4abe-b4d5-45a5914f7bf8', ''),
(12, 'cartoon', 'clip Art', '13-01-2022_2.jpg', ''),
(13, 'asfdgnfgfgd', 'fggnfhg ggggggggggggg', '00aka.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `download_history`
--

CREATE TABLE `download_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `image_hash_id` varchar(255) NOT NULL,
  `image_price` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `download_history`
--

INSERT INTO `download_history` (`id`, `user_id`, `image_hash_id`, `image_price`, `date`) VALUES
(1, 13, 'DRW63c56d1d7ebe1', '34', '2023-01-17 07:25:41.915181'),
(2, 13, 'DRW63c654211c3fd', '11111111111111', '2023-01-17 07:55:47.457614'),
(3, 14, '23', '111', '2023-01-17 13:35:25.427007'),
(4, 13, '23', '111', '2023-01-17 13:46:20.221622'),
(5, 13, 'DRW63c6c774f2688', 'gncvhbj', '2023-01-18 06:18:30.037046'),
(6, 13, 'DRW63c6cb186c003', '77', '2023-01-18 06:19:14.093602'),
(7, 10, 'DRW63c6cb186c003', '77', '2023-01-18 06:20:43.037086'),
(8, 10, 'DRW63c6c774f2688', 'gncvhbj', '2023-01-18 06:20:56.799254'),
(9, 17, 'DRW63c6cb186c003', '77', '2023-01-23 15:33:21.902231');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `email`, `user_id`, `token`) VALUES
(1, 'sarkarchayan71@gmail.com', 13, 'd4e08d519bec1ab7b4ed5f7c1f517917'),
(2, 'sarkarchayan71@gmail.com', 0, 'fe56c2ac4dce5508c81206cd90cc911e'),
(3, 'sarkarchayan71@gmail.com', 13, '4d293a9c920970c5d9607b3cbd823e49'),
(4, 'sarkarchayan71@gmail.com', 13, '9b10f87a1e785bec77f2a1c8665b5e5c'),
(5, 'sarkarchayan71@gmail.com', 13, 'df51b9c5575eb42efe0cfcf0fab64614'),
(9, 'sarkarchayan71@gmail.com', 13, '457cc75e2fd70065a6198908737959c5'),
(10, 'rohitbhadra2001@gmail.com', 10, '3b3bdca588f387357f2a5da4b2b48084'),
(11, 'rohitbhadra2001@gmail.com', 10, '8c5fe444b49e09403c360cfaf9e344c9');

-- --------------------------------------------------------

--
-- Table structure for table `image_tbl`
--

CREATE TABLE `image_tbl` (
  `id` int NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `tag_id` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` varchar(100) NOT NULL,
  `image_price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `width` varchar(100) DEFAULT NULL,
  `length` varchar(100) DEFAULT NULL,
  `download_count` int NOT NULL DEFAULT '0',
  `view_count` int NOT NULL DEFAULT '0',
  `added_by` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_tbl`
--

INSERT INTO `image_tbl` (`id`, `hash_id`, `category_id`, `tag_id`, `image_name`, `image_description`, `image_price`, `image`, `file`, `height`, `width`, `length`, `download_count`, `view_count`, `added_by`, `date`) VALUES
(11, '112', '5', '5', 'fff', 'fff', '111', '112', '112-raw.cdr', NULL, NULL, NULL, 0, 0, '1', '2022-12-27 06:03:59'),
(12, '3321', '2', '1', 'car', 'dfd', '13', '0_D2JU_bSYLOPFLuwo.jpg', NULL, NULL, NULL, NULL, 0, 0, '1', '2022-12-27 06:10:46'),
(13, '23422323', '2', '6', 'city', 'dfdf', '111', '626f6602bb995.jpg', NULL, NULL, NULL, NULL, 0, 0, '1', '2022-12-27 06:32:20'),
(14, '1', '2', '3', 'erdfsesdef', 'desf', '1111', 'tree-736885_1280.jpg', NULL, NULL, NULL, NULL, 0, 2, '13', '2022-12-27 06:32:44'),
(15, '2', '5', '2', 'ewdsx', 'edsewd', '333', 'photo-1453728013993-6d66e9c9123a (1).jpg', NULL, NULL, NULL, NULL, 0, 1, '13', '2022-12-27 06:33:31'),
(16, '234', '2', '1', 'car', 'sdcxzs', '123', '22ba54f1337b0c1f730a879a0d01022f.jpg', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-03 12:51:49'),
(17, '23', '6', '3', 'sun', 'sdxcs', '111', '700-00768712en_Masterfile.jpg', '', NULL, NULL, NULL, 2, 2, '1', '2023-01-03 12:53:12'),
(56, 'DRW63c56d1d7ebe1', '5', '5', 'fsdfs', 'sdfsd', '1211', 'DRW63c56d1d7ebe1', 'DRW63c56d1d7ebe1-raw.cdr', NULL, NULL, NULL, 1, 1, '13', '2023-01-16 15:28:29'),
(57, 'DRW63c654211c3fd', '5', '5', 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '11111111111111', 'DRW63c654211c3fd', 'DRW63c654211c3fd-raw.cdr', NULL, NULL, NULL, 1, 2, '13', '2023-01-17 07:54:09'),
(58, 'DRW63c6c774f2688', '5', '10', 'sddfgfhgj', 'fbgnvhmbmn,', 'gncvhbj', 'DRW63c6c774f2688', 'DRW63c6c774f2688-raw.cdr', NULL, NULL, NULL, 2, 0, '1', '2023-01-17 16:06:13'),
(59, 'DRW63c6cb186c003', '9', '9', 'design', 'guyyyyy', '77', 'DRW63c6cb186c003', 'DRW63c6cb186c003-raw.cdr', NULL, NULL, NULL, 3, 2, '1', '2023-01-17 16:21:44'),
(60, 'DRW63c7932a1a3fa', '6', '3', 'asgfh', 'fghjk', '345', 'DRW63c7932a1a3fa', 'DRW63c7932a1a3fa-raw.cdr', NULL, NULL, NULL, 0, 0, '1', '2023-01-18 06:35:22'),
(61, 'DRW63c82163c0a46', '9', '9', 'FRONT ', 'YTDDDDDDD', '11', 'DRW63c82163c0a46', 'DRW63c82163c0a46-raw.cdr', NULL, NULL, NULL, 0, 0, '1', '2023-01-18 16:42:12'),
(62, 'DRW63c822a8db961', '9', '9', 'OIJO', 'JJKPLPL', '652', 'DRW63c822a8db961', 'DRW63c822a8db961-raw.cdr', NULL, NULL, NULL, 0, 0, '1', '2023-01-18 16:47:37'),
(63, 'DRW63c826da0a0ca', '9', '9', 'FTFF', 'Y8UY8Y', '62', 'DRW63c826da0a0ca', 'DRW63c826da0a0ca-raw.cdr', NULL, NULL, NULL, 0, 0, '1', '2023-01-18 17:05:30'),
(64, 'DRW63cb6cafbc6ef', '5', '5', 'new', 'new', 'new', 'DRW63cb6cafbc6ef', '', NULL, NULL, NULL, 0, 1, '1', '2023-01-21 04:40:15'),
(65, 'DRW63cbf662c75bd', '9', '9', 'UJIO', 'O', '10', 'DRW63cbf662c75bd', 'DRW63cbf662c75bd-raw.cdr', NULL, NULL, NULL, 0, 1, '1', '2023-01-21 14:27:47'),
(66, 'DRW52320638', '5', '5', 'vsdfsd', 'gfchvjbnm', '11', 'DRW52320638', '', NULL, NULL, NULL, 0, 0, '1', '2023-01-23 08:07:44'),
(67, 'DRW47532452', '5', '5', '3333', '33333', '3', 'DRW47532452', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:42:44'),
(68, 'DRW79036293', '5', '5', '22', '22', '2', 'DRW79036293', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:43:25'),
(69, 'DRW76836301', '5', '5', '33', '22', '22', 'DRW76836301', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:43:47'),
(70, 'DRW71368476', '5', '5', '11', '11', '1', 'DRW71368476', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:44:04'),
(71, 'DRW54032775', '5', '5', '5255', '525', '555', 'DRW54032775', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:44:24'),
(72, 'DRW40609576', '5', '5', '222', '2322', '111212', 'DRW40609576', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:44:54'),
(73, 'DRW72165206', '5', '5', '3333', 'ytguyg', '22', 'DRW72165206', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:46:07'),
(75, 'DRW43493919', '5', '5', '222', '3333', '11', 'DRW43493919', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-26 08:47:27'),
(76, 'DRW66055750', '5', '5', '111', '111', '11', 'DRW66055750', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-31 15:36:54'),
(77, 'DRW36431753', '5', '5', '1111', '1111', '11', 'DRW36431753', NULL, NULL, NULL, NULL, 0, 0, '1', '2023-01-31 15:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `tags_tbl`
--

CREATE TABLE `tags_tbl` (
  `id` int NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_tbl`
--

INSERT INTO `tags_tbl` (`id`, `category_id`, `tags`, `image`) VALUES
(1, '2', 'Wildlife', '0_D2JU_bSYLOPFLuwo.jpg'),
(2, '6', 'Aerial', ''),
(3, '6', 'Architectural', ''),
(5, '5', 'Automobile', '0x0.jpg'),
(9, '9', 'asasasas', ''),
(10, '5', 'asasasas', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `first_name`, `last_name`, `email`, `mobile`, `role`, `password`, `profile_picture`) VALUES
(2, 'sonali', 's', 'ss@gmail.com', '9867767899', '2', 'a9610e955c9bb8905ed96926c6ec1aa2', ''),
(4, 'zxz', 'zxsz', 'zxszx@gmail.com', '1234567890', '2', '03c7c0ace395d80182db07ae2c30f034', ''),
(5, 's', 's', 'sonali@gmail.com', '1234567890', '2', '03c7c0ace395d80182db07ae2c30f034', ''),
(6, 'sonali', 's', '99sonalidas9@gmail.com', '1234567887', '1', '03c7c0ace395d80182db07ae2c30f034', ''),
(7, 'sourav ', 'das', 'sourav.daas98@gmail.com', '8515994563', '1', '6226f7cbe59e99a90b5cef6f94f966fd', ''),
(8, 'grgfdgfdg', 'fdgfdgf', 'admin@gmail.com', '1234567908', '1', '231f009004ef61cee94304a5b0f4f052', ''),
(9, 'sdfds', 'sdfds', 'sd@gmail.com', '1234567890', '1', '6226f7cbe59e99a90b5cef6f94f966fd', ''),
(10, 'Rohit', 'Bhadra', 'rohitbhadra2001@gmail.com', '7980385206', '1', 'dc584d811a2d17ed87f6b3e4a3bfb36a', ''),
(11, 'Rudra Prasad', 'Panda', 'rudraprasadpanda8@gmail.com', '9932283722', '1', 'e10adc3949ba59abbe56e057f20f883e', ''),
(12, 'subham ', 'sheth', 'shethsubham99@gmail.com', '6294983740', '1', '8c92e5c9f4ed049af757cd0e95d2a303', ''),
(13, 'chayan', 'sarkar', 'sarkarchayan71@gmail.com', '09876549876', '1', '81dc9bdb52d04dc20036dbd8313ed055', '13-profile-picture.png'),
(14, 'Rudra prasad', 'Panda', 'rudra@gmail.com', '9932283722', '1', 'e10adc3949ba59abbe56e057f20f883e', ''),
(15, 'Ghkkl', 'Fhhh', 'testing@gmail.com', '3258965698', '1', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(16, 'Swarnabho', 'Biswas', 'swarnabho@gmail.com', '8240916089', '1', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(17, 'SOUMYADIP', 'NANDI', 'PIUDIP6@GMAIL.COM', '8918537221', '1', '8bb6d0d3730c5a2778d1c9d9803c1315', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_info`
--
ALTER TABLE `banner_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download_history`
--
ALTER TABLE `download_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_tbl`
--
ALTER TABLE `image_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_tbl`
--
ALTER TABLE `tags_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner_info`
--
ALTER TABLE `banner_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `download_history`
--
ALTER TABLE `download_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image_tbl`
--
ALTER TABLE `image_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tags_tbl`
--
ALTER TABLE `tags_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
