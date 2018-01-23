-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 09:00 PM
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `sport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nba'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team`, `state`, `name`, `created_at`, `updated_at`, `sport`) VALUES
(1, 'ATL', 'Atlanta', 'Hawks', '2017-12-01 23:56:24', '2017-12-01 23:56:24', 'nba'),
(2, 'BKN', 'Brooklyn', 'Nets', '2017-12-01 23:56:24', '2017-12-01 23:56:24', 'nba'),
(3, 'BOS', 'Boston', 'Celtics', '2017-12-01 23:57:41', '2017-12-01 23:57:41', 'nba'),
(4, 'CHA', 'Charlotte', 'Hornets', '2017-12-01 23:57:41', '2017-12-01 23:57:41', 'nba'),
(5, 'CHI', 'Chicago', 'Bulls', '2017-12-01 23:58:18', '2017-12-01 23:58:18', 'nba'),
(6, 'CLE', 'Clevland', 'Cavaliers', '2017-12-01 23:58:18', '2017-12-01 23:58:18', 'nba'),
(7, 'DAL', 'Dallas', 'Mavericks', '2017-12-01 23:59:02', '2017-12-01 23:59:02', 'nba'),
(8, 'DEN', 'Denver', 'Nuggets', '2017-12-01 23:59:02', '2017-12-01 23:59:02', 'nba'),
(9, 'DET', 'Detroit', 'Pistons', '2017-12-01 23:59:34', '2017-12-01 23:59:34', 'nba'),
(10, 'GSW', 'Golden State', 'Warriors', '2017-12-01 23:59:34', '2017-12-01 23:59:34', 'nba'),
(11, 'HOU', 'Houston', 'Rockets', '2017-12-02 00:00:09', '2017-12-02 00:00:09', 'nba'),
(12, 'IND', 'Indiana', 'Pacers', '2017-12-02 00:00:09', '2017-12-02 00:00:09', 'nba'),
(13, 'LAC', 'Los Angeles', 'Clippers', '2017-12-02 00:01:09', '2017-12-02 00:01:09', 'nba'),
(14, 'LAL', 'Los Angeles', 'Lakers', '2017-12-02 00:01:09', '2017-12-02 00:01:09', 'nba'),
(15, 'MEM', 'Memphis', 'Grizzlies', '2017-12-02 00:01:41', '2017-12-02 00:01:41', 'nba'),
(16, 'MIA', 'Miami', 'Heat', '2017-12-02 00:01:41', '2017-12-02 00:01:41', 'nba'),
(17, 'MIL', 'Milwakee', 'Bukcs', '2017-12-02 00:02:37', '2017-12-02 00:02:37', 'nba'),
(18, 'MIN', 'Minesota', 'Timberwolves', '2017-12-02 00:02:37', '2017-12-02 00:02:37', 'nba'),
(19, 'NOP', 'New Orleans', 'pelicans', '2017-12-02 00:03:13', '2017-12-02 00:03:13', 'nba'),
(20, 'NYK', 'New York', 'Knicks', '2017-12-02 00:03:13', '2017-12-02 00:03:13', 'nba'),
(21, 'OKC', 'Oklahoma City', 'Thunder', '2017-12-02 00:04:02', '2017-12-02 00:04:02', 'nba'),
(22, 'ORL', 'Orlando', 'Magic', '2017-12-02 00:04:02', '2017-12-02 00:04:02', 'nba'),
(23, 'PHI', 'Philadephia', '76ers', '2017-12-02 00:04:48', '2017-12-02 00:04:48', 'nba'),
(24, 'PHX', 'Phoenix', 'Suns', '2017-12-02 00:04:48', '2017-12-02 00:04:48', 'nba'),
(25, 'POR', 'Portland', 'Trail Blazers', '2017-12-02 00:05:31', '2017-12-02 00:05:31', 'nba'),
(26, 'SAC', 'Sacramento', 'Kings', '2017-12-02 00:05:31', '2017-12-02 00:05:31', 'nba'),
(27, 'SAS', 'San Antonio', 'Spurs', '2017-12-02 00:06:13', '2017-12-02 00:06:13', 'nba'),
(28, 'TOR', 'Toronto', 'Raptors', '2017-12-02 00:06:13', '2017-12-02 00:06:13', 'nba'),
(29, 'UTA', 'Utah', 'Jazz', '2017-12-02 00:06:46', '2017-12-02 00:06:46', 'nba'),
(30, 'WAS', 'Washington', 'Wizards', '2017-12-02 00:06:46', '2017-12-02 00:06:46', 'nba'),
(31, 'CAR', 'Carolina', 'Hurricanes', NULL, NULL, 'nhl'),
(32, 'CBJ', 'Columbus', 'Blue Jackets', NULL, NULL, 'nhl'),
(33, 'NJD', 'New Jersey', 'Devils', NULL, NULL, 'nhl'),
(34, 'NYI', 'Devils', 'Islanders', NULL, NULL, 'nhl'),
(35, 'NYR', 'New York', 'Rangers', NULL, NULL, 'nhl'),
(36, 'PHI', 'Philadelphia', 'Flyers', NULL, NULL, 'nhl'),
(37, 'PIT', 'Pittsburgh', 'Penguins', NULL, NULL, 'nhl'),
(38, 'WSH', 'Washington', 'Capitals', NULL, NULL, 'nhl'),
(39, 'BOS', 'Boston', 'Bruins', NULL, NULL, 'nhl'),
(40, 'BUF', 'Buffalo', 'Sabres', NULL, NULL, 'nhl'),
(41, 'DET', 'Detroit', 'Red Wings', NULL, NULL, 'nhl'),
(42, 'FLA', 'Florida', 'Panthers', NULL, NULL, 'nhl'),
(43, 'MTL', 'Montréal', 'Canadiens', NULL, NULL, 'nhl'),
(44, 'OTT', 'Canadiens', 'Senators', NULL, NULL, 'nhl'),
(45, 'TBL', 'Tampa Bay', 'Lightning', NULL, NULL, 'nhl'),
(46, 'TOR', 'Toronto', 'Maple Leafs', NULL, NULL, 'nhl'),
(47, 'CHI', 'Chicago', 'Blackhawks', NULL, NULL, 'nhl'),
(48, 'COL', 'Colorado', 'Avalanche', NULL, NULL, 'nhl'),
(49, 'DAL', 'Dallas', 'Stars', NULL, NULL, 'nhl'),
(50, 'MIN', 'Minnesota', 'Wild', NULL, NULL, 'nhl'),
(51, 'NSH', 'Nashville', 'Predators', NULL, NULL, 'nhl'),
(52, 'STL', 'St. Louis', 'Blues', NULL, NULL, 'nhl'),
(53, 'WPG', 'Winnipeg', 'Jets', NULL, NULL, 'nhl'),
(54, 'ANA', 'Anaheim', 'Ducks', NULL, NULL, 'nhl'),
(55, 'ARI', 'Arizona', 'Coyotes', NULL, NULL, 'nhl'),
(56, 'CGY', 'Calgary', 'Flames', NULL, NULL, 'nhl'),
(57, 'EDM', 'Edmonton', 'Oilers', NULL, NULL, 'nhl'),
(58, 'LAK', 'Los Angeles', 'Kings', NULL, NULL, 'nhl'),
(59, 'SJS', 'Los Angeles', 'Sharks', NULL, NULL, 'nhl'),
(60, 'VAN', 'Vancouver', 'Canucks', NULL, NULL, 'nhl'),
(61, 'VGK', 'Vegas', 'Golden Knights', NULL, NULL, 'nhl');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
