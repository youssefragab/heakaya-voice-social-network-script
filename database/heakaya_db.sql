-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 01:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourconfess`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_table`
--

CREATE TABLE `contact_us_table` (
  `id` int(11) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_email` text NOT NULL,
  `sender_heakaya_user_name` text NOT NULL,
  `message_subject` text NOT NULL,
  `message_text` text NOT NULL,
  `message_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tablefor_users`
--

CREATE TABLE `tablefor_users` (
  `id` int(11) NOT NULL,
  `thisis_name` varchar(50) NOT NULL,
  `thisisuser_name` varchar(25) NOT NULL,
  `thisisuser_password` varchar(1000) NOT NULL,
  `thisisuser_country` varchar(50) NOT NULL,
  `thisisuser_picture` text NOT NULL,
  `thisisuser_gender` varchar(10) NOT NULL,
  `user_joined_time` text NOT NULL,
  `user_ip_address` text NOT NULL,
  `account_statue` varchar(50) NOT NULL,
  `privacy` varchar(10) NOT NULL,
  `received_conffes` int(11) NOT NULL,
  `sent_confess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `this_is_users_audio_sounds`
--

CREATE TABLE `this_is_users_audio_sounds` (
  `id` int(11) NOT NULL,
  `sound_message_name` text NOT NULL,
  `sound_message_date` text NOT NULL,
  `sound_message_code` text NOT NULL,
  `sound_message_statue` text NOT NULL,
  `sound_message_user` text NOT NULL,
  `done_view` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `this_is_users_shares`
--

CREATE TABLE `this_is_users_shares` (
  `id` int(11) NOT NULL,
  `sound_share_code` text NOT NULL,
  `sound_message_code` text NOT NULL,
  `sound_message_name` text NOT NULL,
  `sound_message_user` text NOT NULL,
  `sound_message_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `website_views` int(11) NOT NULL DEFAULT '0',
  `search_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us_table`
--
ALTER TABLE `contact_us_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablefor_users`
--
ALTER TABLE `tablefor_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `this_is_users_audio_sounds`
--
ALTER TABLE `this_is_users_audio_sounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `this_is_users_shares`
--
ALTER TABLE `this_is_users_shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us_table`
--
ALTER TABLE `contact_us_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tablefor_users`
--
ALTER TABLE `tablefor_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `this_is_users_audio_sounds`
--
ALTER TABLE `this_is_users_audio_sounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `this_is_users_shares`
--
ALTER TABLE `this_is_users_shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
