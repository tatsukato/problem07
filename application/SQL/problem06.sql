-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 8 朁E08 日 13:02
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `problem06`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `member_id`, `title`, `user_id`, `comment`, `created`, `modified`) VALUES
(2, 114, 'a', 121, 'a', '2017-08-03 11:47:55', '2017-08-03 11:47:55'),
(3, 113, 'b', 121, 'b', '2017-08-03 11:51:38', '2017-08-03 11:51:38'),
(5, 113, 'a', 121, 'a', '2017-08-03 11:56:08', '2017-08-03 11:56:08'),
(6, 113, 'a', 121, 'a', '2017-08-03 12:48:22', '2017-08-03 12:48:22'),
(7, 114, 'ss', 121, 'ss', '2017-08-03 14:03:08', '2017-08-03 14:03:08'),
(8, 114, 'zz', 122, 'zz', '2017-08-03 14:03:29', '2017-08-03 14:03:29'),
(11, 114, 'a', 121, 'a', '2017-08-03 17:52:37', '2017-08-03 17:52:37'),
(16, 113, 'm', 121, 'm', '2017-08-04 19:03:12', '2017-08-04 19:03:12'),
(17, 128, 'srg', 121, 'sdg', '2017-08-08 15:11:26', '2017-08-08 15:11:26'),
(18, 128, 'srg', 121, 'sdg', '2017-08-08 15:16:37', '2017-08-08 15:16:37'),
(19, 128, 'srg', 121, 'sdg', '2017-08-08 15:55:42', '2017-08-08 15:55:42');

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `home` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `birthday`, `home`, `created`, `modified`) VALUES
(113, 'a', 'a', '1976-05-16', 'a', '2017-07-27 11:54:53', '2017-08-02 20:13:29'),
(114, 'a', 'a', '1995-10-19', 'a', '2017-07-27 18:37:50', '2017-08-08 05:44:26'),
(123, 'a', 'a', '1994-10-19', 'a', '2017-08-08 12:45:42', '2017-08-08 12:45:42'),
(124, '内潟', '崚', '1990-10-19', '京都', '2017-08-08 12:46:23', '2017-08-08 07:17:20'),
(128, 'a', 'a', '1994-10-19', '茨城県', '2017-08-08 14:33:16', '2017-08-08 12:33:33'),
(130, 'q', 'q', '0000-00-00', '石川県', '2017-08-08 19:43:15', '2017-08-08 19:43:15'),
(131, 'aa', 'aa', '1994-10-19', '北海道', '2017-08-08 19:43:54', '2017-08-08 12:53:42'),
(132, 'a', 'a', '1994-10-19', '岩手県', '2017-08-08 19:53:32', '2017-08-08 19:53:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `created`, `modified`) VALUES
(121, 'a', '0d217ce62e90c58cf8178e0e7eb53f74a86f793e', 'a', '2017-08-02 16:30:55', '2017-08-02 16:30:55'),
(127, 'st-fle-@outlook.jp', '30649aa2ebc0af29a1986e3e9cce0970e8062535', 'w', '2017-08-08 15:54:14', '2017-08-08 15:54:14'),
(128, 'test@example.jp', '75984f60bed1f82626f92da61c9ba5bcda344493', 'test', '2017-08-08 20:01:45', '2017-08-08 20:01:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
