-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 11:58 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtsports_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `season` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `season`, `show_id`, `number`, `source`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'mrr11.mp4', '2017-11-21 19:51:59', '2017-11-21 19:51:59'),
(2, 1, 1, 2, 'mrr12.mp4', '2017-11-21 19:51:59', '2017-11-21 19:51:59'),
(3, 7, 2, 1, 'got71.mp4', '2017-11-22 00:26:22', '2017-11-22 00:26:22'),
(5, 7, 2, 2, 'got72.mp4', '2017-11-22 00:30:35', '2017-11-22 00:30:35'),
(6, 7, 2, 3, 'got73.mp4', '2017-11-22 01:05:28', '2017-11-22 01:05:28'),
(7, 7, 2, 4, 'got74.mp4', '2017-11-22 01:05:39', '2017-11-22 01:05:39'),
(8, 7, 2, 5, 'got75.mp4', '2017-11-22 01:05:48', '2017-11-22 01:05:48'),
(9, 7, 2, 6, 'got76.mp4', '2017-11-22 01:05:57', '2017-11-22 01:05:57'),
(10, 7, 2, 7, 'got77.mp4', '2017-11-22 01:06:16', '2017-11-22 01:06:16'),
(11, 1, 1, 3, 'mrr13.mp4', '2017-11-22 01:07:14', '2017-11-22 01:07:14'),
(12, 1, 1, 4, 'mrr14.mp4', '2017-11-22 01:07:43', '2017-11-22 01:07:43'),
(13, 1, 1, 5, 'mrr15.mp4', '2017-11-22 01:07:52', '2017-11-22 01:07:52'),
(14, 1, 1, 6, 'mrr16.mp4', '2017-11-22 01:08:23', '2017-11-22 01:08:23'),
(15, 1, 1, 7, 'mrr17.mp4', '2017-11-22 01:08:31', '2017-11-22 01:08:31'),
(16, 1, 1, 8, 'mrr18.mp4', '2017-11-22 01:08:42', '2017-11-22 01:08:42'),
(17, 1, 1, 9, 'mrr19.mp4', '2017-11-22 01:08:53', '2017-11-22 01:08:53'),
(18, 1, 3, 1, 'pnshr11.mp4', '2017-11-22 01:15:19', '2017-11-22 01:15:19'),
(19, 1, 3, 2, 'pnshr12.mp4', '2017-11-22 01:15:29', '2017-11-22 01:15:29'),
(20, 1, 3, 3, 'pnshr13.mp4', '2017-11-22 01:15:41', '2017-11-22 01:15:41'),
(21, 1, 3, 4, 'pnshr14.mp4', '2017-11-22 01:15:52', '2017-11-22 01:15:52'),
(22, 1, 3, 5, 'pnshr15.mp4', '2017-11-22 01:16:01', '2017-11-22 01:16:01'),
(25, 1, 3, 6, 'pnshr16.mp4', '2017-11-22 09:49:31', '2017-11-22 09:49:31'),
(26, 1, 3, 7, 'pnshr17.mp4', '2017-11-22 09:50:06', '2017-11-22 09:50:06'),
(27, 1, 3, 8, 'pnshr18.mp4', '2017-11-22 09:51:02', '2017-11-22 09:51:02'),
(28, 1, 3, 9, 'pnshr19.mp4', '2017-11-22 09:51:11', '2017-11-22 09:51:11'),
(29, 1, 3, 10, 'pnshr110.mp4', '2017-11-22 09:51:20', '2017-11-22 09:51:20'),
(30, 1, 3, 11, 'pnshr111.mp4', '2017-11-22 09:51:33', '2017-11-22 09:51:33'),
(31, 1, 3, 12, 'pnshr112.mp4', '2017-11-22 09:54:47', '2017-11-22 09:54:47'),
(32, 1, 3, 13, 'pnshr113.mp4', '2017-11-22 09:54:53', '2017-11-22 09:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
