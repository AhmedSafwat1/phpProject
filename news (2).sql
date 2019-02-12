-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2019 at 11:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `post_fk` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_categories` int(10) NOT NULL,
  `post_status` tinyint(4) NOT NULL DEFAULT '1',
  `post_published` int(11) NOT NULL,
  `post_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_image`, `post_content`, `post_categories`, `post_status`, `post_published`, `post_created`, `post_updated`) VALUES
(5, 'sdfds', '', '                 sdfdsfd                ', 2, 2, 16, '2019-01-31 11:27:00', '2019-02-12 21:58:47'),
(6, 'werewrewr', '', 'dsdfgdfdf', 1, 1, 16, '2019-02-10 22:52:53', '2019-02-12 21:58:47'),
(7, 'werewrewr', '4011-02-19_1_eSWWzEo_7IzVkmX_ElV7Ljy.png', 'dsdfgdfdf', 1, 1, 16, '2019-02-10 22:52:55', '2019-02-12 21:58:47'),
(8, 'werewrewr', '1210-02-19_1_imNXJWU.png', 'ftcdff', 2, 2, 16, '2019-02-10 23:00:43', '2019-02-12 21:58:47'),
(9, 'last2', '6011-02-19_1_C5u03rK.png', 'asdsad', 2, 1, 16, '2019-02-11 01:21:38', '2019-02-12 21:58:47'),
(20, 'ahmedup2', '7911-02-19_1_imNXJWU.png', 'asdasd', 1, 1, 16, '2019-02-11 20:08:39', '2019-02-12 21:58:47'),
(21, 'wdsdasdas', '1811-02-19_1_imNXJWU.png', 'asdfdsfdsf', 0, 1, 16, '2019-02-11 20:19:41', '2019-02-12 21:58:47'),
(22, 'last2', '9911-02-19_1_eSWWzEo_urOs0Nm.png', 'dfdfd', 0, 1, 16, '2019-02-11 20:23:16', '2019-02-12 21:58:47'),
(23, 'werewrewr', '6211-02-19_1_ScumYkn_JKlZfIM.png', 'dsdfgdfdf', 1, 1, 16, '2019-02-11 21:58:25', '2019-02-12 21:58:47'),
(24, 'sdfds', '1211-02-19_1_eSWWzEo_urOs0Nm.png', 'sdfdsfd', 2, 1, 16, '2019-02-11 21:59:05', '2019-02-12 21:58:47');

-- --------------------------------------------------------

--
-- Stand-in structure for view `Post_Comment_User`
-- (See below for the actual view)
--
CREATE TABLE `Post_Comment_User` (
`user_id` int(11)
,`user_name` varchar(100)
,`user_email` varchar(200)
,`user_password` varchar(255)
,`user_type` int(1)
,`status` tinyint(4)
,`created_time` datetime
,`time_updated` timestamp
,`post_id` int(11)
,`post_title` varchar(100)
,`post_content` text
,`post_status` tinyint(4)
,`post_published` int(11)
,`post_categories` int(10)
,`post_image` varchar(255)
,`post_created` datetime
,`post_updated` timestamp
,`id` int(11)
,`user_fk` int(11)
,`post_fk` int(11)
,`comment_content` text
,`comment_create` datetime
,`comment_update` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `UserPostPublishComent`
-- (See below for the actual view)
--
CREATE TABLE `UserPostPublishComent` (
`published` varchar(100)
,`user_id` int(11)
,`user_name` varchar(100)
,`user_email` varchar(200)
,`user_password` varchar(255)
,`user_type` int(1)
,`status` tinyint(4)
,`created_time` datetime
,`time_updated` timestamp
,`post_id` int(11)
,`post_title` varchar(100)
,`post_content` text
,`post_status` tinyint(4)
,`post_published` int(11)
,`post_categories` int(10)
,`post_image` varchar(255)
,`post_created` datetime
,`post_updated` timestamp
,`id` int(11)
,`user_fk` int(11)
,`post_fk` int(11)
,`comment_content` text
,`comment_create` datetime
,`comment_update` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `status`, `created_time`, `time_updated`) VALUES
(16, 'test', 'testuwp@yahoo.ccom', '$2y$10$rthzs7vmBo3xQ5y5hTOTDetFycU0ztwHGXH5oOS5lvVrtjsyAmyPi', 0, 1, '2019-02-12 23:38:54', '2019-02-12 21:41:52'),
(17, 'admin', 'iti32@yahoo.com', '$2y$10$DfMmZlPSbSBTqXIQD.R4oeJV0iMQtrNuW3zkMnKsSOt2WLQZzkhmC', 0, 1, '2019-02-12 23:41:26', '2019-02-12 21:42:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `User_Post`
-- (See below for the actual view)
--
CREATE TABLE `User_Post` (
`user_id` int(11)
,`user_name` varchar(100)
,`user_email` varchar(200)
,`user_password` varchar(255)
,`user_type` int(1)
,`status` tinyint(4)
,`created_time` datetime
,`time_updated` timestamp
,`post_id` int(11)
,`post_image` varchar(255)
,`post_title` varchar(100)
,`post_content` text
,`post_status` tinyint(4)
,`post_published` int(11)
,`post_categories` int(10)
,`post_created` datetime
,`post_updated` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `Post_Comment_User`
--
DROP TABLE IF EXISTS `Post_Comment_User`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Post_Comment_User`  AS  select `u`.`user_id` AS `user_id`,`u`.`user_name` AS `user_name`,`u`.`user_email` AS `user_email`,`u`.`user_password` AS `user_password`,`u`.`user_type` AS `user_type`,`u`.`status` AS `status`,`u`.`created_time` AS `created_time`,`u`.`time_updated` AS `time_updated`,`p`.`post_id` AS `post_id`,`p`.`post_title` AS `post_title`,`p`.`post_content` AS `post_content`,`p`.`post_status` AS `post_status`,`p`.`post_published` AS `post_published`,`p`.`post_categories` AS `post_categories`,`p`.`post_image` AS `post_image`,`p`.`post_created` AS `post_created`,`p`.`post_updated` AS `post_updated`,`c`.`id` AS `id`,`c`.`user_fk` AS `user_fk`,`c`.`post_fk` AS `post_fk`,`c`.`comment_content` AS `comment_content`,`c`.`comment_create` AS `comment_create`,`c`.`comment_update` AS `comment_update` from ((`users` `u` join `post` `p`) join `comment` `c`) where ((`u`.`user_id` = `c`.`user_fk`) and (`c`.`post_fk` = `p`.`post_id`)) WITH CASCADED CHECK OPTION ;

-- --------------------------------------------------------

--
-- Structure for view `UserPostPublishComent`
--
DROP TABLE IF EXISTS `UserPostPublishComent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `UserPostPublishComent`  AS  select `u`.`user_name` AS `published`,`up`.`user_id` AS `user_id`,`up`.`user_name` AS `user_name`,`up`.`user_email` AS `user_email`,`up`.`user_password` AS `user_password`,`up`.`user_type` AS `user_type`,`up`.`status` AS `status`,`up`.`created_time` AS `created_time`,`up`.`time_updated` AS `time_updated`,`up`.`post_id` AS `post_id`,`up`.`post_title` AS `post_title`,`up`.`post_content` AS `post_content`,`up`.`post_status` AS `post_status`,`up`.`post_published` AS `post_published`,`up`.`post_categories` AS `post_categories`,`up`.`post_image` AS `post_image`,`up`.`post_created` AS `post_created`,`up`.`post_updated` AS `post_updated`,`c`.`id` AS `id`,`c`.`user_fk` AS `user_fk`,`c`.`post_fk` AS `post_fk`,`c`.`comment_content` AS `comment_content`,`c`.`comment_create` AS `comment_create`,`c`.`comment_update` AS `comment_update` from ((`User_Post` `up` join `users` `u`) join `comment` `c`) where ((`up`.`post_id` = `c`.`post_fk`) and (`u`.`user_id` = `c`.`user_fk`)) WITH CASCADED CHECK OPTION ;

-- --------------------------------------------------------

--
-- Structure for view `User_Post`
--
DROP TABLE IF EXISTS `User_Post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `User_Post`  AS  select `u`.`user_id` AS `user_id`,`u`.`user_name` AS `user_name`,`u`.`user_email` AS `user_email`,`u`.`user_password` AS `user_password`,`u`.`user_type` AS `user_type`,`u`.`status` AS `status`,`u`.`created_time` AS `created_time`,`u`.`time_updated` AS `time_updated`,`p`.`post_id` AS `post_id`,`p`.`post_image` AS `post_image`,`p`.`post_title` AS `post_title`,`p`.`post_content` AS `post_content`,`p`.`post_status` AS `post_status`,`p`.`post_published` AS `post_published`,`p`.`post_categories` AS `post_categories`,`p`.`post_created` AS `post_created`,`p`.`post_updated` AS `post_updated` from (`users` `u` join `post` `p`) where (`u`.`user_id` = `p`.`post_published`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comment_fk` (`post_fk`),
  ADD KEY `user_comment_fk` (`user_fk`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_post_fk` (`post_published`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `post_comment_fk` FOREIGN KEY (`post_fk`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_comment_fk` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `user_post_fk` FOREIGN KEY (`post_published`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
