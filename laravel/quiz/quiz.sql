-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2022 at 01:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answers` enum('A','B','C','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answers`, `created_at`, `updated_at`) VALUES
(69, 1, 1, 'A', '2022-02-22 02:45:45', '2022-02-22 02:45:45'),
(70, 1, 2, 'B', '2022-02-22 02:45:45', '2022-02-22 02:45:45'),
(71, 1, 3, 'A', '2022-02-22 02:45:45', '2022-02-22 02:45:45'),
(72, 1, 4, 'A', '2022-02-22 02:45:45', '2022-02-22 02:45:45'),
(73, 2, 1, 'A', '2022-02-22 02:46:35', '2022-02-22 02:46:35'),
(74, 2, 2, 'A', '2022-02-22 02:46:35', '2022-02-22 02:46:35'),
(75, 2, 3, 'A', '2022-02-22 02:46:35', '2022-02-22 02:46:35'),
(76, 2, 4, 'A', '2022-02-22 02:46:35', '2022-02-22 02:46:35'),
(77, 2, 5, 'A', '2022-02-22 03:20:27', '2022-02-22 03:20:27'),
(78, 2, 6, 'A', '2022-02-22 03:20:27', '2022-02-22 03:20:27'),
(79, 2, 7, 'A', '2022-02-22 03:20:27', '2022-02-22 03:20:27'),
(80, 2, 8, 'A', '2022-02-22 03:20:27', '2022-02-22 03:20:27'),
(81, 1, 5, 'A', '2022-02-22 07:37:43', '2022-02-22 07:37:43'),
(82, 1, 6, 'B', '2022-02-22 07:37:43', '2022-02-22 07:37:43'),
(83, 1, 7, 'B', '2022-02-22 07:37:43', '2022-02-22 07:37:43'),
(84, 1, 8, 'B', '2022-02-22 07:37:43', '2022-02-22 07:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_16_063122_create_sessions_table', 1),
(7, '2022_02_16_073959_quiz', 1),
(8, '2022_02_17_064209_questions', 1),
(9, '2022_02_21_110913_answers', 1),
(10, '2022_02_21_112116_results', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizes_id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `A` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `B` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `C` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` enum('A','B','C','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quizes_id`, `question`, `image`, `subject`, `level`, `line`, `A`, `B`, `C`, `D`, `correct_answer`, `created_at`, `updated_at`) VALUES
(1, 1, '5x5=?', 'uploads/Subject 1/1.png', 'Subject 1', '1', '1', '20', '25', '30', '35', 'B', '2022-02-21 08:29:52', '2022-02-21 08:29:52'),
(2, 1, '20-10=?', 'uploads/Subject 1/2.png', 'Subject 1', '1', '2', '10', '20', '20', '14', 'A', '2022-02-21 08:30:25', '2022-02-21 08:30:25'),
(3, 1, '20+30=?', 'uploads/Subject 1/3.jpg', 'Subject 1', '1', '3', '20', '40', '50', '60', 'C', '2022-02-21 08:31:00', '2022-02-22 02:55:30'),
(4, 1, '50/10=?', 'uploads/Subject 1/4.png', 'Subject 1', '1', '4', '10', '5', '4', '6', 'B', '2022-02-21 08:31:37', '2022-02-21 08:31:37'),
(5, 2, 'What color this #fff=?', 'uploads/Subject 1/1.png', 'Subject 1', '1', '1', 'White', 'Black', 'Red', 'Blue', 'A', '2022-02-22 02:50:56', '2022-02-22 02:50:56'),
(6, 2, 'What color this #000=?', 'uploads/Subject 1/2.jpg', 'Subject 1', '1', '2', 'White', 'Black', 'Blue', 'Red', 'B', '2022-02-22 02:51:37', '2022-02-22 02:51:37'),
(7, 2, 'What color this #ccc=?', 'uploads/Subject 1/3.png', 'Subject 1', '1', '3', 'Black', 'Red', 'Gray', 'Blue', 'C', '2022-02-22 02:52:20', '2022-02-22 02:52:20'),
(8, 2, 'What color this #ddd=?', 'uploads/Subject 1/4.png', 'Subject 1', '1', '4', 'Lightgray', 'Green', 'Purple', 'Red', 'A', '2022-02-22 02:53:18', '2022-02-22 02:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('active','passive','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `finished_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `title`, `description`, `state`, `finished_at`, `created_at`, `updated_at`) VALUES
(1, 'Quiz1', 'Description of Quiz1', 'active', '2022-03-02 11:28:00', '2022-02-21 08:28:58', '2022-02-21 08:35:57'),
(2, 'Quiz2', 'Description of Quiz2', 'active', '2022-02-23 05:49:00', '2022-02-22 02:49:20', '2022-02-22 02:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quizes_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `correct_count` int(11) NOT NULL,
  `wrong_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `quizes_id`, `score`, `correct_count`, `wrong_count`, `created_at`, `updated_at`) VALUES
(14, 1, 1, 0, 0, 4, '2022-02-22 02:45:45', '2022-02-22 02:45:45'),
(15, 2, 1, 25, 1, 3, '2022-02-22 02:46:35', '2022-02-22 02:46:35'),
(16, 2, 2, 50, 2, 2, '2022-02-22 03:20:27', '2022-02-22 03:20:27'),
(17, 1, 2, 50, 2, 2, '2022-02-22 07:37:43', '2022-02-22 07:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7AsvpvqXoNhdSHAXOgIn4944b8ZTfaLnW9Vln4R1', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidFlVa1ozSWdNamdTM2xzMFFZMW0xYUFzM1NiRklXMVpBWUt6anZBRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9xdWl6ZXMvMSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRlNDNJdkFUUkRJOHFGUEVUZzUwVzkuZHNqUThoYWdWOE5PQmo4M3JLU3NGOFlKYVdwSGRoLiI7fQ==', 1645532186);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@outlook.com', 'admin', NULL, '$2y$10$e43IvATRDI8qFPETg50W9.dsjQ8hagV8NOBj83rKSsF8YJaWpHdh.', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'test2', 'test2@outlook.com', 'user', NULL, '$2y$10$RBbp7qnX7GNsRyi0YdU0cuovSSkBnaXg6GHesjR3Xvg5ePSVO5wMe', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'test3', 'test3@outlook.com', 'user', NULL, '$2y$10$pEYUoZ5t8S/nzVQMo.rUtORiqUvTSEiHuIAioynzqp.F1kyR5zNPK', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_user_id_foreign` (`user_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quizes_id_foreign` (`quizes_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_quizes_id_foreign` (`quizes_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quizes_id_foreign` FOREIGN KEY (`quizes_id`) REFERENCES `quizes` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_quizes_id_foreign` FOREIGN KEY (`quizes_id`) REFERENCES `quizes` (`id`),
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
