-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2015 at 08:20 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hp-sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_city`
--

CREATE TABLE IF NOT EXISTS `fm_city` (
`id` int(120) NOT NULL,
  `city` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fm_city`
--

INSERT INTO `fm_city` (`id`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Chicago', '2015-09-10 13:33:40', '2015-09-10 13:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `fm_section`
--

CREATE TABLE IF NOT EXISTS `fm_section` (
`id` int(120) NOT NULL,
  `year_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fm_section`
--

INSERT INTO `fm_section` (`id`, `year_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', 'Saint Francis', '2015-09-09 11:28:16', '2015-09-09 03:27:57'),
(2, '2', 'Saint Paul', '2015-09-09 03:59:23', '2015-09-09 03:59:23'),
(3, '3', 'Saint Therese', '2015-09-10 21:49:59', '2015-09-10 21:49:59'),
(4, '4', 'Saint John', '2015-09-10 21:50:16', '2015-09-10 21:50:16'),
(5, '1', 'Saint Peter', '2015-09-10 21:50:36', '2015-09-10 21:50:36'),
(6, '2', 'Saint Luke', '2015-09-10 21:50:53', '2015-09-10 21:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `fm_state`
--

CREATE TABLE IF NOT EXISTS `fm_state` (
`id` int(120) NOT NULL,
  `state` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fm_state`
--

INSERT INTO `fm_state` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'California', '2015-09-10 13:32:51', '2015-09-10 13:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `fm_year`
--

CREATE TABLE IF NOT EXISTS `fm_year` (
`id` int(120) NOT NULL,
  `description` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fm_year`
--

INSERT INTO `fm_year` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '1st Year', '2015-09-09 11:09:30', '0000-00-00 00:00:00'),
(2, '2nd Year', '2015-09-09 03:55:09', '2015-09-09 03:55:09'),
(3, '3rd Year', '2015-09-09 03:56:48', '2015-09-09 03:56:48'),
(4, '4th Year', '2015-09-10 11:58:11', '2015-09-10 11:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE IF NOT EXISTS `student_record` (
`id` int(120) NOT NULL,
  `stud_num` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_lvl` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`id`, `stud_num`, `fname`, `lname`, `address`, `zip`, `city`, `state`, `phone`, `mobile`, `email`, `year_lvl`, `section`, `created_at`, `updated_at`) VALUES
(1, '123', 'jhunel', 'ebero', 'LPC', '123451', '1', '1', '456', '456', 'test@noemail.com', '2', '2', '2015-09-10 15:05:00', '2015-09-10 15:05:00'),
(5, 'asd', 'Jhunel', 'Pogi', 'LAs pinas', 'kj', '1', '1', 'jljlj', 'jlj', 'jljljlj', '1', '1', '2015-09-10 15:26:04', '2015-09-10 22:26:04'),
(6, '154', 'Jedoi', 'Jedz', 'LPC', '1740', '1', '1', '1446', '464', '464', '1', '5', '2015-09-10 23:03:40', '2015-09-10 23:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(112) NOT NULL,
  `username` varchar(112) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(112) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'jhunel2389', '$2y$10$6SWzlwjqUfTuE3neGW5PKuHEYHVnqZ1k1aGNakb7CWTIvhcqfiPt.', '1', 'GSmxUDSAeQGxN2e9jBXxMJH9jxwLpFjrtCPphVYBxtTm66p2HJV6l2S9jYLy', '2015-09-09 12:11:03', '2015-09-09 04:11:03'),
(11, 'admin', '$2y$10$6d5jyruhayM7IfkoCfcZEeBxUCh4S.EBrv0WvLFcgKspLF5vCLfO6', '1', '', '2015-09-09 00:40:45', '2015-09-09 00:40:45'),
(16, 'notadmin', '$2y$10$AWl4fl58yocxlrzTFl6.6ukxnES1fwxTeJae.LHZQk6fEolBZXEAq', '0', '', '2015-09-09 04:10:56', '2015-09-09 04:10:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fm_city`
--
ALTER TABLE `fm_city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fm_section`
--
ALTER TABLE `fm_section`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fm_state`
--
ALTER TABLE `fm_state`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fm_year`
--
ALTER TABLE `fm_year`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fm_city`
--
ALTER TABLE `fm_city`
MODIFY `id` int(120) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fm_section`
--
ALTER TABLE `fm_section`
MODIFY `id` int(120) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fm_state`
--
ALTER TABLE `fm_state`
MODIFY `id` int(120) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fm_year`
--
ALTER TABLE `fm_year`
MODIFY `id` int(120) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
MODIFY `id` int(120) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(112) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
