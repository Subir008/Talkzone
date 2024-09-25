-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 05:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talkzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_master`
--

CREATE TABLE `comment_master` (
  `comment_id` int(11) NOT NULL,
  `comment_details` longtext NOT NULL,
  `forum_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `forum_img` varchar(100) DEFAULT NULL,
  `user_id` varchar(50) NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `heading`, `details`, `forum_img`, `user_id`, `entry_timestamp`, `update_timestamp`) VALUES
(1, 'Java Database Connectivity', 'Java Database Connectivity (JDBC) is an application programming interface (API) for the Java programming language which defines how a client may access a database. It is a Java-based data access technology used for Java database connectivity.\r\n', NULL, '16', '2024-09-25 15:23:08', '0000-00-00 00:00:00'),
(2, 'How to allow &lt;input type&equals;&quot;file&quot;&gt; to accept only image files&quest;', 'I need to upload only image file through &lt;input type&equals;&quot;file&quot;&gt; tag.\r\n\r\nRight now&comma; it accepts all file types. But&comma; I want to restrict it to only specific image file extensions which include .jpg&comma; .gif&comma; etc.\r\n\r\nUse the accept attribute of the input tag. To accept only PNG&apos;s&comma; JPEG&apos;s and GIF&apos;s you can use the following code:\r\n\r\n&lt;label&gt;Your Image File\r\n  &lt;input type&equals;&quot;file&quot; name&equals;&quot;myImage&quot; accept&equals;&quot;image&frasl;png&comma; image&frasl;gif&comma; image&frasl;jpeg&quot; &frasl;&gt;\r\n&lt;&frasl;label&gt;', '', '16', '2024-09-25 15:37:05', '0000-00-00 00:00:00'),
(3, 'Request Inspection', 'When you make a request&comma; the Requests library prepares the request before actually sending it to the destination server. Request preparation includes things like validating headers and serializing JSON content.\r\n\r\nYou can view the PreparedRequest object by accessing .request on a Response object:\r\n\r\n&gt;&gt;&gt; import requests\r\n\r\n&gt;&gt;&gt; response &equals; requests.post(&quot;https:&frasl;&frasl;httpbin.org&frasl;post&quot;&comma; json&equals;{&quot;key&quot;:&quot;value&quot;})\r\n\r\n&gt;&gt;&gt; response.request.headers[&quot;Content-Type&quot;]\r\n&apos;application&frasl;json&apos;\r\n&gt;&gt;&gt; response.request.url\r\n&apos;https:&frasl;&frasl;httpbin.org&frasl;post&apos;\r\n&gt;&gt;&gt; response.request.body\r\nb&apos;{&quot;key&quot;: &quot;value&quot;}&apos;', 'py_21-09-2024.png', '16', '2024-09-25 15:37:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reply_master`
--

CREATE TABLE `reply_master` (
  `reply_id` int(50) NOT NULL,
  `reply_details` longtext NOT NULL,
  `forum_id` int(50) NOT NULL,
  `comment_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` longtext NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `entry_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_password`, `gender`, `address`, `profile_img`, `entry_timestamp`, `update_timestamp`) VALUES
(16, 'Subir Karmakar', '1234', 'test@test.com', '$2y$10$83ZnoDzsEZY3.DcysLcJbe1qpN4cb5gj.ozXXEko9F.fYshZGnqmi', 'male', '31 sarsuna main road', 'profile_img_php1_21-09-2024.png', '2024-09-21 16:19:48', '2024-09-21 07:32:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_master`
--
ALTER TABLE `comment_master`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Indexes for table `reply_master`
--
ALTER TABLE `reply_master`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_master`
--
ALTER TABLE `comment_master`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `reply_master`
--
ALTER TABLE `reply_master`
  MODIFY `reply_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
