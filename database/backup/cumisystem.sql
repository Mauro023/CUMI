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
  `aentry_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adeparture_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_employe_id_foreign` (`employe_id`),
  CONSTRAINT `attendances_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.attendances: ~62 rows (aproximadamente)
REPLACE INTO `attendances` (`id`, `workday`, `aentry_time`, `adeparture_time`, `employe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2023-04-11', '14:31:52', '14:31:54', 3, '2023-04-11 19:31:58', '2023-04-11 19:31:58', NULL),
	(2, '2023-04-12', '09:27:46', '11:28:04', 3, '2023-04-12 14:27:50', '2023-04-12 14:34:54', NULL),
	(6, '2023-04-03', '08:05:00', '12:30:00', 2, '2023-03-24 22:05:58', '2023-03-24 22:05:58', NULL),
	(7, '2023-04-03', '13:30:00', '17:06:00', 2, '2023-03-24 22:06:43', '2023-03-24 22:06:43', NULL),
	(8, '2023-04-03', '08:11:00', '12:30:00', 5, '2023-03-24 22:11:45', '2023-03-24 22:11:45', NULL),
	(9, '2023-04-03', '13:30:00', '17:00:00', 5, '2023-03-24 22:12:16', '2023-03-24 22:12:16', NULL),
	(10, '2023-04-03', '08:02:00', '12:30:00', 3, '2023-03-24 22:13:03', '2023-03-24 22:13:03', NULL),
	(11, '2023-04-03', '13:30:00', '17:00:00', 3, '2023-03-24 22:13:34', '2023-03-24 22:13:34', NULL),
	(12, '2023-04-03', '08:08:00', '12:30:00', 1, '2023-03-24 22:14:57', '2023-03-24 22:14:57', NULL),
	(13, '2023-04-03', '13:30:00', '17:26:00', 1, '2023-03-24 22:15:23', '2023-03-24 22:15:23', NULL),
	(14, '2023-04-03', '08:07:00', '12:30:00', 4, '2023-03-24 22:17:20', '2023-03-24 22:17:20', NULL),
	(15, '2023-04-03', '13:25:00', '17:17:00', 4, '2023-03-24 22:17:44', '2023-03-24 22:17:44', NULL),
	(16, '2023-04-04', '08:00:00', '12:30:00', 2, '2023-03-24 22:18:50', '2023-03-24 22:18:50', NULL),
	(17, '2023-04-04', '13:30:00', '17:00:00', 2, '2023-03-24 22:19:35', '2023-03-24 22:19:35', NULL),
	(18, '2023-04-04', '08:32:00', '12:31:00', 5, '2023-03-24 22:22:22', '2023-03-24 22:32:55', NULL),
	(19, '2023-04-04', '13:22:00', '17:23:00', 5, '2023-03-24 22:23:13', '2023-03-24 22:23:13', NULL),
	(20, '2023-04-04', '08:11:00', '12:25:00', 3, '2023-03-24 22:24:31', '2023-03-24 22:24:31', NULL),
	(21, '2023-04-04', '13:24:00', '17:00:00', 3, '2023-03-24 22:25:02', '2023-03-24 22:25:02', NULL),
	(22, '2023-04-04', '08:10:00', '12:26:00', 1, '2023-03-24 22:26:40', '2023-03-24 22:26:40', NULL),
	(23, '2023-04-04', '13:26:00', '17:26:00', 1, '2023-03-24 22:27:04', '2023-03-24 22:27:04', NULL),
	(24, '2023-04-04', '12:28:00', '12:30:00', 4, '2023-03-24 22:27:39', '2023-03-24 22:28:40', NULL),
	(25, '2023-04-04', '13:28:00', '17:28:00', 4, '2023-03-24 22:28:29', '2023-03-24 22:28:29', NULL),
	(26, '2023-04-05', '08:00:00', '12:45:00', 2, '2023-03-24 23:45:26', '2023-03-24 23:46:25', NULL),
	(27, '2023-04-05', '13:45:00', '17:00:00', 2, '2023-03-24 23:45:53', '2023-03-24 23:45:53', NULL),
	(28, '2023-04-05', '08:04:00', '12:32:00', 5, '2023-03-24 23:47:03', '2023-03-24 23:47:03', NULL),
	(29, '2023-04-05', '13:34:00', '17:00:00', 5, '2023-03-24 23:47:44', '2023-03-24 23:47:44', NULL),
	(30, '2023-04-05', '08:07:00', '12:33:00', 3, '2023-03-24 23:48:26', '2023-03-24 23:48:26', NULL),
	(31, '2023-04-05', '01:32:00', '17:00:00', 3, '2023-03-24 23:49:08', '2023-03-24 23:49:08', NULL),
	(32, '2023-04-05', '08:01:00', '12:31:00', 1, '2023-03-24 23:49:55', '2023-03-24 23:49:55', NULL),
	(33, '2023-04-05', '13:30:00', '17:25:00', 1, '2023-03-24 23:50:19', '2023-03-24 23:50:19', NULL),
	(34, '2023-04-05', '08:00:00', '12:32:00', 4, '2023-03-24 23:51:23', '2023-03-24 23:51:23', NULL),
	(35, '2023-04-05', '13:35:00', '17:51:00', 4, '2023-03-24 23:51:48', '2023-03-24 23:51:48', NULL),
	(36, '2023-04-06', '08:00:00', '12:32:00', 2, '2023-03-24 23:52:55', '2023-03-24 23:52:55', NULL),
	(37, '2023-04-06', '13:32:00', '17:02:00', 2, '2023-03-24 23:53:16', '2023-03-24 23:53:16', NULL),
	(38, '2023-04-06', '08:03:00', '12:30:00', 5, '2023-03-24 23:53:57', '2023-03-24 23:53:57', NULL),
	(39, '2023-04-06', '13:32:00', '17:02:00', 5, '2023-03-24 23:54:45', '2023-03-24 23:54:45', NULL),
	(40, '2023-04-06', '08:03:00', '12:37:00', 3, '2023-03-24 23:55:18', '2023-03-24 23:56:17', NULL),
	(41, '2023-04-06', '13:33:00', '17:00:00', 3, '2023-03-24 23:55:35', '2023-03-24 23:55:35', NULL),
	(42, '2023-04-06', '08:02:00', '12:36:00', 1, '2023-03-24 23:57:00', '2023-03-24 23:57:00', NULL),
	(43, '2023-04-06', '13:32:00', '17:01:00', 1, '2023-03-24 23:57:26', '2023-03-24 23:57:26', NULL),
	(44, '2023-04-06', '08:03:00', '12:35:00', 4, '2023-03-24 23:58:10', '2023-03-24 23:58:10', NULL),
	(45, '2023-04-06', '13:34:00', '17:04:00', 4, '2023-03-24 23:58:38', '2023-03-24 23:58:38', NULL),
	(46, '2023-04-07', '07:59:00', '12:34:00', 2, '2023-03-24 23:59:40', '2023-03-24 23:59:40', NULL),
	(47, '2023-04-07', '13:32:00', '17:00:00', 2, '2023-03-25 00:00:30', '2023-03-25 00:00:56', NULL),
	(48, '2023-04-07', '08:01:00', '12:33:00', 5, '2023-03-25 00:01:23', '2023-03-25 00:01:23', NULL),
	(49, '2023-04-07', '13:33:00', '17:02:00', 5, '2023-03-25 00:02:14', '2023-03-25 00:02:14', NULL),
	(50, '2023-04-07', '08:02:00', '12:34:00', 3, '2023-03-25 00:02:41', '2023-03-25 00:02:41', NULL),
	(51, '2023-04-07', '13:31:00', '17:03:00', 3, '2023-03-25 00:03:13', '2023-03-25 00:03:13', NULL),
	(52, '2023-04-07', '08:03:00', '12:31:00', 1, '2023-03-25 00:03:52', '2023-03-25 00:03:52', NULL),
	(53, '2023-04-07', '13:32:00', '17:04:00', 1, '2023-03-25 00:04:26', '2023-03-25 00:04:26', NULL),
	(54, '2023-04-07', '08:04:00', '12:34:00', 4, '2023-03-25 00:05:13', '2023-03-25 00:05:13', NULL),
	(55, '2023-04-07', '13:31:00', '17:05:00', 4, '2023-03-25 00:05:46', '2023-03-25 00:05:46', NULL),
	(56, '2023-04-08', '08:08:00', '13:02:00', 2, '2023-03-25 00:09:31', '2023-03-25 00:09:31', NULL),
	(57, '2023-04-08', '08:09:00', '13:32:00', 5, '2023-03-25 00:09:52', '2023-03-25 00:09:52', NULL),
	(58, '2023-04-08', '08:09:00', '13:10:00', 3, '2023-03-25 00:10:13', '2023-03-25 00:10:13', NULL),
	(59, '2023-04-08', '08:10:00', '13:10:00', 1, '2023-03-25 00:10:29', '2023-03-25 00:10:29', NULL),
	(60, '2023-04-08', '08:10:00', '13:10:00', 4, '2023-03-25 00:10:47', '2023-03-25 00:10:47', NULL),
	(68, '2023-03-27', '08:06:00', '17:03:46', 2, '2023-03-28 20:31:46', '2023-03-29 18:58:01', NULL),
	(69, '2023-03-27', '07:45:00', '17:04:26', 3, '2023-03-28 20:32:03', '2023-03-29 18:58:41', NULL),
	(81, '2023-03-29', 'NA', '17:02:35', 3, '2023-03-29 19:40:06', '2023-03-29 19:40:06', NULL),
	(82, '2023-04-30', 'NA', '12:37:02', 3, '2023-04-01 22:37:09', '2023-04-01 22:37:09', NULL),
	(86, '2023-05-01', 'NA', 'NA', 3, '2023-04-04 19:37:01', '2023-04-04 19:37:01', NULL);

-- Volcando estructura para tabla cumisystem.calendars
CREATE TABLE IF NOT EXISTS `calendars` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `entry_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employe_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calendars_employe_id_foreign` (`employe_id`),
  CONSTRAINT `calendars_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.calendars: ~47 rows (aproximadamente)
REPLACE INTO `calendars` (`id`, `start_date`, `end_date`, `entry_time`, `departure_time`, `floor`, `employe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '2023-03-23', '2023-03-24', '08:00:00', '17:00:00', '2', 3, '2023-03-23 18:13:02', '2023-03-24 18:11:03', '2023-03-24 18:11:03'),
	(2, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 2, '2023-03-24 18:12:44', '2023-03-24 18:12:44', NULL),
	(3, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 2, '2023-03-24 18:13:25', '2023-03-24 18:26:14', NULL),
	(4, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 2, '2023-03-24 18:14:03', '2023-03-24 18:14:03', NULL),
	(5, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 2, '2023-03-24 18:14:33', '2023-03-24 18:26:41', NULL),
	(6, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 2, '2023-03-24 18:15:18', '2023-03-24 18:15:18', NULL),
	(7, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 2, '2023-03-24 18:15:51', '2023-03-24 18:26:56', NULL),
	(8, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 2, '2023-03-24 18:16:28', '2023-03-24 18:16:28', NULL),
	(9, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 2, '2023-03-24 18:16:53', '2023-03-24 18:27:21', NULL),
	(10, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 5, '2023-03-24 18:18:04', '2023-03-24 18:18:04', NULL),
	(11, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 5, '2023-03-24 18:19:25', '2023-03-24 18:27:40', NULL),
	(12, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 5, '2023-03-24 18:20:04', '2023-03-24 18:20:04', NULL),
	(13, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 5, '2023-03-24 18:21:05', '2023-03-24 18:27:57', NULL),
	(14, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 5, '2023-03-24 18:22:12', '2023-03-24 18:22:12', NULL),
	(15, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 5, '2023-03-24 18:23:04', '2023-03-24 18:28:09', NULL),
	(16, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 5, '2023-03-24 18:23:56', '2023-03-24 18:23:56', NULL),
	(17, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 5, '2023-03-24 18:24:39', '2023-03-24 18:28:26', NULL),
	(18, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 3, '2023-03-24 18:25:46', '2023-03-24 18:25:46', NULL),
	(19, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 3, '2023-03-24 18:29:23', '2023-03-24 18:30:07', NULL),
	(20, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 3, '2023-03-24 18:30:56', '2023-03-24 18:30:56', NULL),
	(21, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 3, '2023-03-24 18:31:38', '2023-03-24 18:31:38', NULL),
	(22, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 3, '2023-03-24 18:32:24', '2023-03-24 18:32:24', NULL),
	(23, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 3, '2023-03-24 18:33:22', '2023-03-24 18:33:22', NULL),
	(24, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 3, '2023-03-24 18:34:05', '2023-03-24 18:34:05', NULL),
	(25, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 3, '2023-03-24 18:34:45', '2023-03-24 18:34:45', NULL),
	(26, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 1, '2023-03-24 18:39:34', '2023-03-24 18:39:34', NULL),
	(27, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 1, '2023-03-24 18:40:08', '2023-03-24 18:40:25', NULL),
	(28, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 1, '2023-03-24 18:41:42', '2023-03-24 18:41:42', NULL),
	(29, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 1, '2023-03-24 18:42:23', '2023-03-24 18:42:23', NULL),
	(30, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 1, '2023-03-24 18:42:55', '2023-03-24 18:42:55', NULL),
	(31, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 1, '2023-03-24 18:43:31', '2023-03-24 18:43:31', NULL),
	(32, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 1, '2023-03-24 18:44:40', '2023-03-24 18:44:40', NULL),
	(33, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 1, '2023-03-24 18:45:24', '2023-03-24 18:45:24', NULL),
	(34, '2023-04-03', '2023-04-07', '08:00:00', '17:00:00', '2', 4, '2023-03-24 18:47:29', '2023-03-24 18:47:29', NULL),
	(35, '2023-04-08', '2023-04-08', '08:00:00', '13:00:00', '2', 4, '2023-03-24 18:48:11', '2023-03-24 18:48:11', NULL),
	(36, '2023-04-10', '2023-04-14', '08:00:00', '17:00:00', '2', 4, '2023-03-24 18:48:48', '2023-03-24 18:48:48', NULL),
	(37, '2023-04-15', '2023-04-15', '08:00:00', '13:00:00', '2', 4, '2023-03-24 18:50:23', '2023-03-24 18:50:23', NULL),
	(38, '2023-04-17', '2023-04-21', '08:00:00', '17:00:00', '2', 4, '2023-03-24 18:50:56', '2023-03-24 18:50:56', NULL),
	(39, '2023-04-22', '2023-04-22', '08:00:00', '13:00:00', '2', 4, '2023-03-24 18:51:44', '2023-03-24 18:51:44', NULL),
	(40, '2023-04-24', '2023-04-28', '08:00:00', '17:00:00', '2', 4, '2023-03-24 18:52:17', '2023-03-24 18:52:17', NULL),
	(41, '2023-04-29', '2023-04-29', '08:00:00', '13:00:00', '2', 4, '2023-03-24 18:52:48', '2023-03-24 18:52:48', NULL),
	(42, '2023-03-27', '2023-03-31', '08:00:00', '05:00:00', '2', 2, '2023-03-25 18:11:17', '2023-03-25 18:11:17', NULL),
	(43, '2023-03-27', '2023-03-31', '08:00:00', '17:00:00', '2', 3, '2023-03-25 18:31:57', '2023-03-25 20:11:57', NULL),
	(44, '2023-03-28', '2023-03-28', '09:41:53', '09:41:56', '1', 3, '2023-03-28 19:42:02', '2023-03-28 19:42:11', '2023-03-28 19:42:11'),
	(45, '2023-04-01', '2023-04-01', '08:03:32', '12:09:40', '2', 3, '2023-04-01 22:09:47', '2023-04-01 22:09:47', NULL),
	(46, '2023-04-30', '2023-04-30', '08:00:00', '17:00:00', '2', 3, '2023-04-01 22:24:03', '2023-04-01 22:24:03', NULL),
	(47, '2023-05-01', '2023-05-01', '08:49:16', '13:49:22', '2', 3, '2023-04-01 22:49:27', '2023-04-01 22:49:27', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.employes: ~6 rows (aproximadamente)
REPLACE INTO `employes` (`id`, `dni`, `name`, `work_position`, `unit`, `cost_center`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 13213164, 'Pedro Leon', 'Coordinador de sistemas', 'Administrativo', 'Piso 2', '2023-04-11 19:09:22', '2023-04-11 19:09:22', NULL),
	(2, 654567, 'Julio Alvarez', 'Auxiliar de sistemas', 'Administrativo', 'Piso 2', '2023-04-11 19:09:22', '2023-04-11 19:09:22', NULL),
	(3, 647321, 'Mauricio Camargo', 'Ingeniero de soporte', 'Administrativo', 'Piso 2', '2023-04-11 19:09:22', '2023-04-11 19:09:22', NULL),
	(4, 789789, 'Sandra Padilla', 'Contadora', 'Administrativo', 'Piso 2', '2023-04-11 19:09:23', '2023-04-11 19:09:23', NULL),
	(5, 6547889, 'Marisol Garcia', 'Abogada', 'Administrativo', 'Piso 2', '2023-04-11 19:09:23', '2023-04-11 19:09:23', NULL),
	(6, 123, 'Daniela Salas', 'Position', 'Asistencial', 'Piso 4', '2023-04-12 14:17:10', '2023-04-12 14:17:10', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.migrations: ~0 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_03_14_135314_create_permission_tables', 1),
	(6, '2023_03_15_200241_create_employes_table', 1),
	(7, '2023_03_15_205145_create_calendars_table', 1),
	(8, '2023_03_16_115621_create_attendances_table', 1);

-- Volcando estructura para tabla cumisystem.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.model_has_permissions: ~1 rows (aproximadamente)

-- Volcando estructura para tabla cumisystem.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.model_has_roles: ~1 rows (aproximadamente)
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
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.permissions: ~25 rows (aproximadamente)
REPLACE INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_user', 'Listar Usuario', 'web', NULL, NULL),
	(2, 'show_user', 'Ver Usuario', 'web', NULL, NULL),
	(3, 'create_user', 'Crear Usuario', 'web', NULL, NULL),
	(4, 'update_user', 'Actualizar Usuario', 'web', NULL, NULL),
	(5, 'destroy_user', 'Eliminar Usuario', 'web', NULL, NULL),
	(6, 'view_employes', 'Listar Empleado', 'web', NULL, NULL),
	(7, 'show_employes', 'Ver Empleado', 'web', NULL, NULL),
	(8, 'create_employes', 'Crear Empleado', 'web', NULL, NULL),
	(9, 'update_employes', 'Actualizar Empleado', 'web', NULL, NULL),
	(10, 'destroy_employes', 'Eliminar Empleado', 'web', NULL, NULL),
	(11, 'view_attendances', 'Listar asistencias', 'web', NULL, NULL),
	(12, 'show_attendances', 'Ver asistencias', 'web', NULL, NULL),
	(13, 'create_attendances', 'Crear asistencias', 'web', NULL, NULL),
	(14, 'update_attendances', 'Actualizar asistencias', 'web', NULL, NULL),
	(15, 'destroy_attendances', 'Eliminar asistencias', 'web', NULL, NULL),
	(16, 'view_calendars', 'Listar calendario', 'web', NULL, NULL),
	(17, 'show_calendars', 'Ver calendario', 'web', NULL, NULL),
	(18, 'create_calendars', 'Crear calendario', 'web', NULL, NULL),
	(19, 'update_calendars', 'Actualizar calendario', 'web', NULL, NULL),
	(20, 'destroy_calendars', 'Eliminar calendario', 'web', NULL, NULL),
	(21, 'view_role', 'Listar Roles', 'web', NULL, NULL),
	(22, 'show_role', 'Ver Roles', 'web', NULL, NULL),
	(23, 'create_role', 'Crear Roles', 'web', NULL, NULL),
	(24, 'update_role', 'Actualizar Roles', 'web', NULL, NULL),
	(25, 'destroy_role', 'Eliminar Roles', 'web', NULL, NULL);

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
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.roles: ~2 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'Administrador', 'web', '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(2, 'User', 'Usuario', 'web', '2023-04-11 19:09:22', '2023-04-11 19:09:22');

-- Volcando estructura para tabla cumisystem.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.role_has_permissions: ~25 rows (aproximadamente)
REPLACE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1);

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
	(1, 'Administrador', 'admin@cumi.com', NULL, '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', NULL, '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(2, 'Persona', 'persona@cumi.com', NULL, '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', NULL, '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(3, 'Ana Runolfsson', 'nlockman@example.org', '2023-04-11 19:09:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EtiRrx6x51', '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(4, 'Haleigh Schmidt', 'hayes.jada@example.com', '2023-04-11 19:09:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GpVbfhsHbI', '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(5, 'Dr. Camren Predovic II', 'heller.leatha@example.org', '2023-04-11 19:09:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'm2U3xc36cf', '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(6, 'Fannie Volkman', 'qrice@example.com', '2023-04-11 19:09:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dWDCxqsdH7', '2023-04-11 19:09:22', '2023-04-11 19:09:22'),
	(7, 'Darrin Sawayn Jr.', 'flo86@example.net', '2023-04-11 19:09:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wx1lqdoZvp', '2023-04-11 19:09:22', '2023-04-11 19:09:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
