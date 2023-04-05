-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cumisystem
CREATE DATABASE IF NOT EXISTS `cumisystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cumisystem`;

-- Volcando estructura para tabla cumisystem.attendances
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `workday` date NOT NULL,
  `aentry_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `adeparture_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_employe_id_foreign` (`employe_id`),
  CONSTRAINT `attendances_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.attendances: ~60 rows (aproximadamente)
REPLACE INTO `attendances` (`id`, `workday`, `aentry_time`, `adeparture_time`, `employe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, '2023-04-03', '08:05:00', '12:30:00', 2, '2023-03-24 17:05:58', '2023-03-24 17:05:58', NULL),
	(7, '2023-04-03', '13:30:00', '17:06:00', 2, '2023-03-24 17:06:43', '2023-03-24 17:06:43', NULL),
	(8, '2023-04-03', '08:11:00', '12:30:00', 5, '2023-03-24 17:11:45', '2023-03-24 17:11:45', NULL),
	(9, '2023-04-03', '13:30:00', '17:00:00', 5, '2023-03-24 17:12:16', '2023-03-24 17:12:16', NULL),
	(10, '2023-04-03', '08:02:00', '12:30:00', 3, '2023-03-24 17:13:03', '2023-03-24 17:13:03', NULL),
	(11, '2023-04-03', '13:30:00', '17:00:00', 3, '2023-03-24 17:13:34', '2023-03-24 17:13:34', NULL),
	(12, '2023-04-03', '08:08:00', '12:30:00', 1, '2023-03-24 17:14:57', '2023-03-24 17:14:57', NULL),
	(13, '2023-04-03', '13:30:00', '17:26:00', 1, '2023-03-24 17:15:23', '2023-03-24 17:15:23', NULL),
	(14, '2023-04-03', '08:07:00', '12:30:00', 4, '2023-03-24 17:17:20', '2023-03-24 17:17:20', NULL),
	(15, '2023-04-03', '13:25:00', '17:17:00', 4, '2023-03-24 17:17:44', '2023-03-24 17:17:44', NULL),
	(16, '2023-04-04', '08:00:00', '12:30:00', 2, '2023-03-24 17:18:50', '2023-03-24 17:18:50', NULL),
	(17, '2023-04-04', '13:30:00', '17:00:00', 2, '2023-03-24 17:19:35', '2023-03-24 17:19:35', NULL),
	(18, '2023-04-04', '08:32:00', '12:31:00', 5, '2023-03-24 17:22:22', '2023-03-24 17:32:55', NULL),
	(19, '2023-04-04', '13:22:00', '17:23:00', 5, '2023-03-24 17:23:13', '2023-03-24 17:23:13', NULL),
	(20, '2023-04-04', '08:11:00', '12:25:00', 3, '2023-03-24 17:24:31', '2023-03-24 17:24:31', NULL),
	(21, '2023-04-04', '13:24:00', '17:00:00', 3, '2023-03-24 17:25:02', '2023-03-24 17:25:02', NULL),
	(22, '2023-04-04', '08:10:00', '12:26:00', 1, '2023-03-24 17:26:40', '2023-03-24 17:26:40', NULL),
	(23, '2023-04-04', '13:26:00', '17:26:00', 1, '2023-03-24 17:27:04', '2023-03-24 17:27:04', NULL),
	(24, '2023-04-04', '12:28:00', '12:30:00', 4, '2023-03-24 17:27:39', '2023-03-24 17:28:40', NULL),
	(25, '2023-04-04', '13:28:00', '17:28:00', 4, '2023-03-24 17:28:29', '2023-03-24 17:28:29', NULL),
	(26, '2023-04-05', '08:00:00', '12:45:00', 2, '2023-03-24 18:45:26', '2023-03-24 18:46:25', NULL),
	(27, '2023-04-05', '13:45:00', '17:00:00', 2, '2023-03-24 18:45:53', '2023-03-24 18:45:53', NULL),
	(28, '2023-04-05', '08:04:00', '12:32:00', 5, '2023-03-24 18:47:03', '2023-03-24 18:47:03', NULL),
	(29, '2023-04-05', '13:34:00', '17:00:00', 5, '2023-03-24 18:47:44', '2023-03-24 18:47:44', NULL),
	(30, '2023-04-05', '08:07:00', '12:33:00', 3, '2023-03-24 18:48:26', '2023-03-24 18:48:26', NULL),
	(31, '2023-04-05', '01:32:00', '17:00:00', 3, '2023-03-24 18:49:08', '2023-03-24 18:49:08', NULL),
	(32, '2023-04-05', '08:01:00', '12:31:00', 1, '2023-03-24 18:49:55', '2023-03-24 18:49:55', NULL),
	(33, '2023-04-05', '13:30:00', '17:25:00', 1, '2023-03-24 18:50:19', '2023-03-24 18:50:19', NULL),
	(34, '2023-04-05', '08:00:00', '12:32:00', 4, '2023-03-24 18:51:23', '2023-03-24 18:51:23', NULL),
	(35, '2023-04-05', '13:35:00', '17:51:00', 4, '2023-03-24 18:51:48', '2023-03-24 18:51:48', NULL),
	(36, '2023-04-06', '08:00:00', '12:32:00', 2, '2023-03-24 18:52:55', '2023-03-24 18:52:55', NULL),
	(37, '2023-04-06', '13:32:00', '17:02:00', 2, '2023-03-24 18:53:16', '2023-03-24 18:53:16', NULL),
	(38, '2023-04-06', '08:03:00', '12:30:00', 5, '2023-03-24 18:53:57', '2023-03-24 18:53:57', NULL),
	(39, '2023-04-06', '13:32:00', '17:02:00', 5, '2023-03-24 18:54:45', '2023-03-24 18:54:45', NULL),
	(40, '2023-04-06', '08:03:00', '12:37:00', 3, '2023-03-24 18:55:18', '2023-03-24 18:56:17', NULL),
	(41, '2023-04-06', '13:33:00', '17:00:00', 3, '2023-03-24 18:55:35', '2023-03-24 18:55:35', NULL),
	(42, '2023-04-06', '08:02:00', '12:36:00', 1, '2023-03-24 18:57:00', '2023-03-24 18:57:00', NULL),
	(43, '2023-04-06', '13:32:00', '17:01:00', 1, '2023-03-24 18:57:26', '2023-03-24 18:57:26', NULL),
	(44, '2023-04-06', '08:03:00', '12:35:00', 4, '2023-03-24 18:58:10', '2023-03-24 18:58:10', NULL),
	(45, '2023-04-06', '13:34:00', '17:04:00', 4, '2023-03-24 18:58:38', '2023-03-24 18:58:38', NULL),
	(46, '2023-04-07', '07:59:00', '12:34:00', 2, '2023-03-24 18:59:40', '2023-03-24 18:59:40', NULL),
	(47, '2023-04-07', '13:32:00', '17:00:00', 2, '2023-03-24 19:00:30', '2023-03-24 19:00:56', NULL),
	(48, '2023-04-07', '08:01:00', '12:33:00', 5, '2023-03-24 19:01:23', '2023-03-24 19:01:23', NULL),
	(49, '2023-04-07', '13:33:00', '17:02:00', 5, '2023-03-24 19:02:14', '2023-03-24 19:02:14', NULL),
	(50, '2023-04-07', '08:02:00', '12:34:00', 3, '2023-03-24 19:02:41', '2023-03-24 19:02:41', NULL),
	(51, '2023-04-07', '13:31:00', '17:03:00', 3, '2023-03-24 19:03:13', '2023-03-24 19:03:13', NULL),
	(52, '2023-04-07', '08:03:00', '12:31:00', 1, '2023-03-24 19:03:52', '2023-03-24 19:03:52', NULL),
	(53, '2023-04-07', '13:32:00', '17:04:00', 1, '2023-03-24 19:04:26', '2023-03-24 19:04:26', NULL),
	(54, '2023-04-07', '08:04:00', '12:34:00', 4, '2023-03-24 19:05:13', '2023-03-24 19:05:13', NULL),
	(55, '2023-04-07', '13:31:00', '17:05:00', 4, '2023-03-24 19:05:46', '2023-03-24 19:05:46', NULL),
	(56, '2023-04-08', '08:08:00', '13:02:00', 2, '2023-03-24 19:09:31', '2023-03-24 19:09:31', NULL),
	(57, '2023-04-08', '08:09:00', '13:32:00', 5, '2023-03-24 19:09:52', '2023-03-24 19:09:52', NULL),
	(58, '2023-04-08', '08:09:00', '13:10:00', 3, '2023-03-24 19:10:13', '2023-03-24 19:10:13', NULL),
	(59, '2023-04-08', '08:10:00', '13:10:00', 1, '2023-03-24 19:10:29', '2023-03-24 19:10:29', NULL),
	(60, '2023-04-08', '08:10:00', '13:10:00', 4, '2023-03-24 19:10:47', '2023-03-24 19:10:47', NULL),
	(68, '2023-03-27', '08:06:00', '17:03:46', 2, '2023-03-28 15:31:46', '2023-03-29 13:58:01', NULL),
	(69, '2023-03-27', '07:45:00', '17:04:26', 3, '2023-03-28 15:32:03', '2023-03-29 13:58:41', NULL),
	(81, '2023-03-29', 'NA', '17:02:35', 3, '2023-03-29 14:40:06', '2023-03-29 14:40:06', NULL),
	(82, '2023-04-30', 'NA', '12:37:02', 3, '2023-04-01 17:37:09', '2023-04-01 17:37:09', NULL),
	(86, '2023-05-01', 'NA', 'NA', 3, '2023-04-04 14:37:01', '2023-04-04 14:37:01', NULL);

-- Volcando estructura para tabla cumisystem.calendars
CREATE TABLE IF NOT EXISTS `calendars` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `entry_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employe_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calendars_employe_id_foreign` (`employe_id`),
  CONSTRAINT `calendars_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.calendars: ~46 rows (aproximadamente)
REPLACE INTO `calendars` (`id`, `start_date`, `end_date`, `entry_time`, `departure_time`, `floor`, `employe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2023-03-23', '2023-03-24', '08:00:00', '17:00:00', '2', 3, '2023-03-23 13:13:02', '2023-03-24 13:11:03', '2023-03-24 13:11:03'),
	(2, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 2, '2023-03-24 13:12:44', '2023-03-24 13:12:44', NULL),
	(3, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 2, '2023-03-24 13:13:25', '2023-03-24 13:26:14', NULL),
	(4, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 2, '2023-03-24 13:14:03', '2023-03-24 13:14:03', NULL),
	(5, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 2, '2023-03-24 13:14:33', '2023-03-24 13:26:41', NULL),
	(6, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 2, '2023-03-24 13:15:18', '2023-03-24 13:15:18', NULL),
	(7, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 2, '2023-03-24 13:15:51', '2023-03-24 13:26:56', NULL),
	(8, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 2, '2023-03-24 13:16:28', '2023-03-24 13:16:28', NULL),
	(9, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 2, '2023-03-24 13:16:53', '2023-03-24 13:27:21', NULL),
	(10, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 5, '2023-03-24 13:18:04', '2023-03-24 13:18:04', NULL),
	(11, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 5, '2023-03-24 13:19:25', '2023-03-24 13:27:40', NULL),
	(12, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 5, '2023-03-24 13:20:04', '2023-03-24 13:20:04', NULL),
	(13, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 5, '2023-03-24 13:21:05', '2023-03-24 13:27:57', NULL),
	(14, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 5, '2023-03-24 13:22:12', '2023-03-24 13:22:12', NULL),
	(15, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 5, '2023-03-24 13:23:04', '2023-03-24 13:28:09', NULL),
	(16, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 5, '2023-03-24 13:23:56', '2023-03-24 13:23:56', NULL),
	(17, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 5, '2023-03-24 13:24:39', '2023-03-24 13:28:26', NULL),
	(18, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 3, '2023-03-24 13:25:46', '2023-03-24 13:25:46', NULL),
	(19, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 3, '2023-03-24 13:29:23', '2023-03-24 13:30:07', NULL),
	(20, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 3, '2023-03-24 13:30:56', '2023-03-24 13:30:56', NULL),
	(21, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 3, '2023-03-24 13:31:38', '2023-03-24 13:31:38', NULL),
	(22, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 3, '2023-03-24 13:32:24', '2023-03-24 13:32:24', NULL),
	(23, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 3, '2023-03-24 13:33:22', '2023-03-24 13:33:22', NULL),
	(24, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 3, '2023-03-24 13:34:05', '2023-03-24 13:34:05', NULL),
	(25, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 3, '2023-03-24 13:34:45', '2023-03-24 13:34:45', NULL),
	(26, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 1, '2023-03-24 13:39:34', '2023-03-24 13:39:34', NULL),
	(27, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 1, '2023-03-24 13:40:08', '2023-03-24 13:40:25', NULL),
	(28, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 1, '2023-03-24 13:41:42', '2023-03-24 13:41:42', NULL),
	(29, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 1, '2023-03-24 13:42:23', '2023-03-24 13:42:23', NULL),
	(30, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 1, '2023-03-24 13:42:55', '2023-03-24 13:42:55', NULL),
	(31, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 1, '2023-03-24 13:43:31', '2023-03-24 13:43:31', NULL),
	(32, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 1, '2023-03-24 13:44:40', '2023-03-24 13:44:40', NULL),
	(33, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 1, '2023-03-24 13:45:24', '2023-03-24 13:45:24', NULL),
	(34, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 4, '2023-03-24 13:47:29', '2023-03-24 13:47:29', NULL),
	(35, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 4, '2023-03-24 13:48:11', '2023-03-24 13:48:11', NULL),
	(36, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 4, '2023-03-24 13:48:48', '2023-03-24 13:48:48', NULL),
	(37, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 4, '2023-03-24 13:50:23', '2023-03-24 13:50:23', NULL),
	(38, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 4, '2023-03-24 13:50:56', '2023-03-24 13:50:56', NULL),
	(39, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 4, '2023-03-24 13:51:44', '2023-03-24 13:51:44', NULL),
	(40, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 4, '2023-03-24 13:52:17', '2023-03-24 13:52:17', NULL),
	(41, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 4, '2023-03-24 13:52:48', '2023-03-24 13:52:48', NULL),
	(42, '2023-03-27', '2023-03-31', '08:00:00', '05:00:00', '2', 2, '2023-03-25 13:11:17', '2023-03-25 13:11:17', NULL),
	(43, '2023-03-27', '2023-03-31', '08:00:00', '17:00:00', '2', 3, '2023-03-25 13:31:57', '2023-03-25 15:11:57', NULL),
	(44, '2023-03-28', '2023-03-28', '09:41:53', '09:41:56', '1', 3, '2023-03-28 14:42:02', '2023-03-28 14:42:11', '2023-03-28 14:42:11'),
	(45, '2023-04-01', '2023-04-01', '08:03:32', '12:09:40', '2', 3, '2023-04-01 17:09:47', '2023-04-01 17:09:47', NULL),
	(46, '2023-04-30', '2023-04-30', '08:00:00', '17:00:00', '2', 3, '2023-04-01 17:24:03', '2023-04-01 17:24:03', NULL),
	(47, '2023-05-01', '2023-05-01', '08:49:16', '13:49:22', '2', 3, '2023-04-01 17:49:27', '2023-04-01 17:49:27', NULL);

-- Volcando estructura para tabla cumisystem.employes
CREATE TABLE IF NOT EXISTS `employes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `dni` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_center` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.employes: ~7 rows (aproximadamente)
REPLACE INTO `employes` (`id`, `dni`, `name`, `work_position`, `unit`, `cost_center`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 13213164, 'Pedro Leon', 'Coordinador de sistemas', 'Administrativo', 'Piso 2', '2023-03-25 14:38:50', '2023-03-25 14:42:10', NULL),
	(2, 654567, 'Julio Alvarez', 'Auxiliar de sistemas', 'Administrativo', 'Piso 2', '2023-03-25 14:38:50', '2023-03-25 14:38:50', NULL),
	(3, 647321, 'Mauricio Camargo', 'Ingeniero de soporte', 'Administrativo', 'Piso 2', '2023-03-25 14:38:50', '2023-03-25 14:38:50', NULL),
	(4, 789789, 'Sandra Padilla', 'Contadora', 'Administrativo', 'Piso 2', '2023-03-25 14:38:50', '2023-03-25 14:38:50', NULL),
	(5, 6547889, 'Marisol Garcia', 'Abogada', 'Administrativo', 'Piso 2', '2023-03-25 14:38:50', '2023-03-25 14:38:50', NULL),
	(6, 1234, 'Prueba', 'Position', 'Asistencial', 'Piso 3', '2023-03-25 14:42:38', '2023-03-25 14:42:42', '2023-03-25 14:42:42'),
	(7, 123, 'Prueba', 'Position', 'Asistencial', 'Piso 11', '2023-03-25 14:49:41', '2023-03-25 15:01:20', NULL);

-- Volcando estructura para tabla cumisystem.failed_jobs
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

-- Volcando datos para la tabla cumisystem.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cumisystem.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.migrations: ~8 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2014_10_12_000000_create_users_table', 1),
	(10, '2014_10_12_100000_create_password_resets_table', 1),
	(11, '2019_08_19_000000_create_failed_jobs_table', 1),
	(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(13, '2023_03_14_135314_create_permission_tables', 1),
	(14, '2023_03_15_200241_create_employes_table', 1),
	(15, '2023_03_15_205145_create_calendars_table', 1),
	(16, '2023_03_16_115621_create_attendances_table', 1),
	(17, '2023_03_28_085216_cambiar_tipo_de_dato_a_time_en_attendance_table', 2);

-- Volcando estructura para tabla cumisystem.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cumisystem.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.model_has_roles: ~2 rows (aproximadamente)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2);

-- Volcando estructura para tabla cumisystem.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cumisystem.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.permissions: ~6 rows (aproximadamente)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin create', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(2, 'admin read', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(3, 'admin update', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(4, 'persona create', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(5, 'persona read', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(6, 'persona update', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50');

-- Volcando estructura para tabla cumisystem.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cumisystem.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.roles: ~2 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(2, 'persona', 'web', '2023-03-25 14:38:50', '2023-03-25 14:38:50');

-- Volcando estructura para tabla cumisystem.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.role_has_permissions: ~9 rows (aproximadamente)
REPLACE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(4, 2),
	(5, 2),
	(6, 2);

-- Volcando estructura para tabla cumisystem.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.users: ~7 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'admin@cumi.com', '2023-03-25 14:38:50', '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', '9708SqI6FUX578N0psmliP8AV6wjwigWzId4SAB2dMEOlzR9Ozk1KLI3xMTt', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(2, 'Persona', 'persona@cumi.com', '2023-03-25 14:38:50', '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', '5ynPN83VOqQPN4UVE3eOHDBUowPcrwI3NKH90ghPOw1VLdBjNy7IJN89NyNe', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(3, 'Kelley Dach Sr.', 'lowe.wilhelm@example.org', '2023-03-25 14:38:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xRGQmSv4ZU', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(4, 'Kieran Muller', 'fritz.leuschke@example.org', '2023-03-25 14:38:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fG4fepd8I2', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(5, 'Omari Block PhD', 'ken.schultz@example.net', '2023-03-25 14:38:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EoEJ7lM9f4', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(6, 'Mavis Kris', 'stehr.devonte@example.com', '2023-03-25 14:38:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Swd6dSiXSE', '2023-03-25 14:38:50', '2023-03-25 14:38:50'),
	(7, 'Mrs. Cordie Altenwerth', 'psanford@example.org', '2023-03-25 14:38:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xUenBAnT6C', '2023-03-25 14:38:50', '2023-03-25 14:38:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
