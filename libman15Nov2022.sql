-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for libman
DROP DATABASE IF EXISTS `libman`;
CREATE DATABASE IF NOT EXISTS `libman` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `libman`;

-- Dumping structure for table libman.authors
DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `authorName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haveComplete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.authors: ~0 rows (approximately)
REPLACE INTO `authors` (`id`, `authorName`, `email`, `phoneNo`, `haveComplete`, `created_at`, `updated_at`) VALUES
	(1, 'Aiman bin Maarof', 'airof@gmail.com', '01115769876', 1, '2022-11-14 23:50:03', '2022-11-14 23:50:03'),
	(2, 'Ahmad Aizat Bin Riduan', 'Ahmad@gmail.com', '01256749654', 1, '2022-11-14 23:50:37', '2022-11-14 23:50:37'),
	(3, 'Aisyah Bin Malek', 'aisyah@gmail.com', '014283744676', 1, '2022-11-14 23:51:04', '2022-11-14 23:51:04');

-- Dumping structure for table libman.book_issues
DROP TABLE IF EXISTS `book_issues`;
CREATE TABLE IF NOT EXISTS `book_issues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateIssued` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateReturn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.book_issues: ~0 rows (approximately)

-- Dumping structure for table libman.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table libman.issued_histories
DROP TABLE IF EXISTS `issued_histories`;
CREATE TABLE IF NOT EXISTS `issued_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `NameIssued` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BookIssued` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateExpectedReturn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateIssued` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateReturned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.issued_histories: ~0 rows (approximately)

-- Dumping structure for table libman.libraries
DROP TABLE IF EXISTS `libraries`;
CREATE TABLE IF NOT EXISTS `libraries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISBN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.libraries: ~0 rows (approximately)
REPLACE INTO `libraries` (`id`, `name`, `author`, `year`, `price`, `ISBN`, `Availability`, `created_at`, `updated_at`) VALUES
	(10, 'Abu Lataf', 'Muhammad Khairul', '2002', '12.12', '4567856786578', 'Available', '2022-11-10 19:32:50', '2022-11-13 22:37:16'),
	(12, 'Muhammad Hasif', 'Karlo', '2102', '1233.23', '1234567890', 'Available', '2022-11-10 20:01:42', '2022-11-10 20:01:42'),
	(15, 'Muhammad', 'Nurudden Mahmud', '2002', '12.43', '1234432', 'Available', '2022-11-10 20:12:35', '2022-11-10 20:12:35'),
	(17, 'Toaru Majutsu no Index Gaiden: Toaru Kagaku no Railgun', 'Dengeki Daioh', '2007', '65.34', '1234567809', 'Available', '2022-11-13 18:14:53', '2022-11-13 18:14:53'),
	(18, 'Tensei shitara Slime Datta Ken Ibun: Makokugurashi no Trinity', 'Tono Tanae', '2019', '12.32', '12345676543', 'Available', '2022-11-13 20:11:20', '2022-11-13 22:37:16'),
	(20, 'Sekai Saikou no Ansatsusha, Isekai Kizoku ni Tensei suru', 'Sumeragi, Hamao', '2019', '21.32', '1234564323', 'Available', '2022-11-13 20:13:44', '2022-11-13 22:29:45'),
	(21, 'Serupun Rumput', 'Dengeki Daioh', '2103', '12.32', '2345342342443', 'Available', '2022-11-13 20:50:09', '2022-11-13 22:25:27'),
	(22, 'Kimi to Tsuzuru Utakata', 'Yuama', '2020', '34.23', '1234323434', 'Available', '2022-11-13 22:41:36', '2022-11-13 22:42:49');

-- Dumping structure for table libman.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2022_10_25_041123_create_sessions_table', 1),
	(7, '2022_10_28_035641_create_book_issues_table', 1),
	(8, '2022_11_07_023606_create_libraries_table', 1),
	(9, '2022_11_07_092831_create_issued_histories_table', 1),
	(10, '2022_11_08_020458_create_authors_table', 1);

-- Dumping structure for table libman.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.password_resets: ~0 rows (approximately)

-- Dumping structure for table libman.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table libman.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.sessions: ~1 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6oGilT8OoBZ8wbdZbNXF4Zx2zzlbjWav8LyPc3T8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9saWJyYXJ5LW1hbmFnZW1lbnQudGVzdC90b3RhbEJvb2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoidkd4ZXdnR0JSbHVFNUJaUVNibVl2SjNESmY3YnozZm5vZ0pLTUdoZSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ0S0JCVEhmd2o4LmtrN0EwbWVCOU4uaEFaSzI5NFkuZFpMMDFJZ2lXV0hKeEYuOWkudkpLZSI7fQ==', 1668498795),
	('h7rHBKUXTvScmdhCVdT2itYqOWQyAvHNFnCmSmCs', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSVJJUmVoMm9ocDJYdm05eHZmc0RFOUJiem9LdXRtN0lSS1NNbmxubCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9saWJyYXJ5LW1hbmFnZW1lbnQudGVzdC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG9OYjZ0Mmo1b3RXaHlVektMMkdvVi50YWhJOHBFd09ZRm1VLzFjLmVrSFBNTnBDOVpPeEVHIjt9', 1668498769);

-- Dumping structure for table libman.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `StudentUUID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IcNum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `havePending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'clear',
  `haveCompleteReg` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table libman.users: ~6 rows (approximately)
REPLACE INTO `users` (`id`, `StudentUUID`, `name`, `IcNum`, `PhoneNum`, `period`, `email`, `email_verified_at`, `havePending`, `haveCompleteReg`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'MisakaMikoto', NULL, NULL, NULL, 'Admin@gmail.com', '2022-11-14 23:39:00', 'Admin', 0, '$2y$10$4KBBTHfwj8.kk7A0meB9N.hAZK294Y.dZL01IgiWWHJxF.9i.vJKe', NULL, NULL, NULL, 'Superadmin', NULL, NULL, NULL, '2022-11-14 23:38:23', '2022-11-14 23:44:32'),
	(2, NULL, 'Shirai Kuroko', NULL, NULL, NULL, 'Student@gmail.com', '2022-11-14 23:40:00', 'Admin', 0, '$2y$10$WPyKfhXrHSYKuGyVu/JQIOJOpNltUL/aM9NtUZY4sAi.IqaDOA7p.', NULL, NULL, NULL, 'AdminBook', NULL, NULL, NULL, '2022-11-14 23:39:31', '2022-11-14 23:45:34'),
	(3, NULL, 'Hitori Gotoh', NULL, NULL, NULL, 'HitoriGotoh@kessoku.com', '2022-11-14 23:40:52', 'Admin', 0, '$2y$10$CTxryturUT3l/7iKP1f9iuRnb8flJocKwh94sTaq2fVuB80EBtMCO', NULL, NULL, NULL, 'AdminStudent', NULL, NULL, NULL, '2022-11-14 23:40:35', '2022-11-14 23:45:51'),
	(4, 'STDT0001', 'Miyauchi Hikage', '021028053987', '01754049768', '2023-05-14', 'miya@gmail.com', '2022-11-14 23:41:33', 'clear', 1, '$2y$10$oNb6t2j5otWhyUzKL2GoV.tahI8pEwOYFmU/1c.ekHPMNpC9ZOxEG', NULL, NULL, NULL, 'Student', NULL, NULL, NULL, '2022-11-14 23:41:17', '2022-11-14 23:52:41'),
	(5, NULL, 'Saten Ruiko', NULL, NULL, NULL, 'satenRuiko@railg.com', '2022-11-14 23:42:11', 'clear', 0, '$2y$10$3zzVXkAOdBnmWsnJcG8NiulU4V9wbOsxqozoU3nXC9mD1LFlZi49S', NULL, NULL, NULL, 'Student', NULL, NULL, NULL, '2022-11-14 23:41:55', '2022-11-14 23:42:11'),
	(6, NULL, 'Kazari Uiharu', NULL, NULL, NULL, 'Uihari@judgement.com', '2022-11-14 23:42:56', 'clear', 0, '$2y$10$jjIroiv9hPANCQQ.whUzQe7BZVwhTdoP7oKba/WiR06iEf1n5K0Ki', NULL, NULL, NULL, 'Student', NULL, NULL, NULL, '2022-11-14 23:42:34', '2022-11-14 23:42:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
