-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 06:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calondosen2`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `content`, `question_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, '12345', 8, 15, '2025-01-24 02:18:47', '2025-01-24 02:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_01_24_093019_add_duration_to_videos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '1+1=', '2 apa jendelaa', 'Matematika', 6, '2025-01-22 05:18:32', '2025-01-22 06:53:18'),
(5, 'apa itu bahasa', 'pliss jawab', 'Bahasa Indonesia', 7, '2025-01-22 07:07:17', '2025-01-22 07:07:17'),
(8, '13123', '123', 'Matematika', 6, '2025-01-22 20:05:44', '2025-01-22 20:05:44'),
(10, 'ASDASDASDASD', 'ASDASDSAD', 'Matematika', 6, '2025-01-22 21:32:01', '2025-01-22 21:32:01'),
(14, '1+2=', 'TOLONG JAWAB', 'Matematika', 15, '2025-01-24 02:19:15', '2025-01-24 02:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `role`) VALUES
(6, 'users', '$2y$12$lWu9.O5ZeDNUEDYCBfkF5uxaU0In67FF/otvkSu0HsrOJNi8Hn4Ra', 'enkripsi@gmail.com', 'Isagi Yoichi', 'user'),
(7, 'lebahganteng', '$2y$12$25659tpmhIZU04AfeUqie.Fz7VGvLHrX8NZ16ZHTUS.CWLHzBiRIK', 'lebahganteng@gmail.com', 'Rin Itoshi', 'user'),
(8, 'calondosen2', '$2y$12$SBSSdwVWnW905/xNKnGV7uex8BVa5zLX0W.MpQ2imm/QiS2T6p2dW', 'calondosen2@gmail.com', 'calondosen2', 'admin'),
(10, 'admin', '$2y$12$iAEJ/iwtgW/v5rDA2VD2.Oxe6dnVbgQBi2yM8wZd5bMSqbrSYDSAe', 'admin@gmail.com', 'admin cihuy', 'admin'),
(12, 'akun1', '$2y$12$m2q.G1Yx2hvbWyGmK6lYq.J22UO8I9jQzJB08HhdbsxreVzBT6q/W', 'akun@gmail.com', 'mantap', 'user'),
(15, 'akun123', '$2y$12$hceWnw3BnFmxEwRchNCILe.U.ns7mN9zvDOFeAWyDPFwRu0g3pdea', 'akun123@gmail.com', 'RIdwan', 'user'),
(16, 'admin3', '$2y$12$nHV/wmvbg.BQ.iFsfn8loecSlOTgUM2c8O1x/MNPGi8EGvYbsnc9C', 'admin33@gmail.com', 'adminnn', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `category`, `video_path`, `duration`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'OPENING', 'opening', 'Lainnya', 'videos/1xhDJPWxXeQ6SkbKVQUKUMk2uQ6xzDCYr4sAeI4T.mp4', NULL, 6, '2025-01-22 07:04:34', '2025-01-22 07:05:44'),
(19, 'PINK VIDEO', 'test', 'Matematika', 'videos/45GnV2rG25pEFiVRAKIhaoRyCMacE4EJHuXDPbfl.mp4', NULL, 7, '2025-01-22 07:06:52', '2025-01-22 07:06:52'),
(29, 'video 10 menit 30 detik', 'contoh', 'Matematika', 'videos/g4JagiX9TKjDMqEDnm4TwOzX1NnGACTxCzP6woSu.mp4', '10:10', 6, '2025-01-24 02:39:46', '2025-01-24 02:47:03'),
(30, 'asdasasdasdasd', 'asdasd', 'Matematika', 'videos/9vRwkSLS3QAODCgm4yHVSzWahonGhk93NBPTtoQL.mp4', '10:30', 6, '2025-01-24 02:44:30', '2025-01-24 02:44:30'),
(31, '10menit50', 'asdasd', 'Matematika', 'videos/vD8jt1imXxJH2QWzA21R8BP3xGyX5aOE7GzAwmQp.mp4', '10:50', 6, '2025-01-24 02:52:09', '2025-01-24 02:52:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
