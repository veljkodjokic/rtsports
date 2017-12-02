-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 02:30 PM
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
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `team` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team`, `state`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ATL', 'Atlanta', 'Hawks', '2017-12-01 23:56:24', '2017-12-01 23:56:24'),
(2, 'BKN', 'Brooklyn', 'Nets', '2017-12-01 23:56:24', '2017-12-01 23:56:24'),
(3, 'BOS', 'Boston', 'Celtics', '2017-12-01 23:57:41', '2017-12-01 23:57:41'),
(4, 'CHA', 'Charlotte', 'Hornets', '2017-12-01 23:57:41', '2017-12-01 23:57:41'),
(5, 'CHI', 'Chicago', 'Bulls', '2017-12-01 23:58:18', '2017-12-01 23:58:18'),
(6, 'CLE', 'Clevland', 'Cavaliers', '2017-12-01 23:58:18', '2017-12-01 23:58:18'),
(7, 'DAL', 'Dallas', 'Mavericks', '2017-12-01 23:59:02', '2017-12-01 23:59:02'),
(8, 'DEN', 'Denver', 'Nuggets', '2017-12-01 23:59:02', '2017-12-01 23:59:02'),
(9, 'DET', 'Detroit', 'Pistons', '2017-12-01 23:59:34', '2017-12-01 23:59:34'),
(10, 'GSW', 'Golden State', 'Warriors', '2017-12-01 23:59:34', '2017-12-01 23:59:34'),
(11, 'HOU', 'Houston', 'Rockets', '2017-12-02 00:00:09', '2017-12-02 00:00:09'),
(12, 'IND', 'Indiana', 'Pacers', '2017-12-02 00:00:09', '2017-12-02 00:00:09'),
(13, 'LAC', 'Los Angeles', 'Clippers', '2017-12-02 00:01:09', '2017-12-02 00:01:09'),
(14, 'LAL', 'Los Angeles', 'Lakers', '2017-12-02 00:01:09', '2017-12-02 00:01:09'),
(15, 'MEM', 'Memphis', 'Grizzlies', '2017-12-02 00:01:41', '2017-12-02 00:01:41'),
(16, 'MIA', 'Miami', 'Heat', '2017-12-02 00:01:41', '2017-12-02 00:01:41'),
(17, 'MIL', 'Milwakee', 'Bukcs', '2017-12-02 00:02:37', '2017-12-02 00:02:37'),
(18, 'MIN', 'Minesota', 'Timberwolves', '2017-12-02 00:02:37', '2017-12-02 00:02:37'),
(19, 'NOP', 'New Orleans', 'pelicans', '2017-12-02 00:03:13', '2017-12-02 00:03:13'),
(20, 'NYK', 'New York', 'Knicks', '2017-12-02 00:03:13', '2017-12-02 00:03:13'),
(21, 'OKC', 'Oklahoma City', 'Thunder', '2017-12-02 00:04:02', '2017-12-02 00:04:02'),
(22, 'ORL', 'Orlando', 'Magic', '2017-12-02 00:04:02', '2017-12-02 00:04:02'),
(23, 'PHI', 'Philadephia', '76ers', '2017-12-02 00:04:48', '2017-12-02 00:04:48'),
(24, 'PHX', 'Phoenix', 'Suns', '2017-12-02 00:04:48', '2017-12-02 00:04:48'),
(25, 'POR', 'Portland', 'Trail Blazers', '2017-12-02 00:05:31', '2017-12-02 00:05:31'),
(26, 'SAC', 'Sacramento', 'Kings', '2017-12-02 00:05:31', '2017-12-02 00:05:31'),
(27, 'SAS', 'San Antonio', 'Spurs', '2017-12-02 00:06:13', '2017-12-02 00:06:13'),
(28, 'TOR', 'Toronto', 'Raptors', '2017-12-02 00:06:13', '2017-12-02 00:06:13'),
(29, 'UTA', 'Utah', 'Jazz', '2017-12-02 00:06:46', '2017-12-02 00:06:46'),
(30, 'WAS', 'Washington', 'Wizards', '2017-12-02 00:06:46', '2017-12-02 00:06:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
