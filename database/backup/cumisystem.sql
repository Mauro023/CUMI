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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.employes: ~58 rows (aproximadamente)
REPLACE INTO `employes` (`id`, `dni`, `name`, `work_position`, `unit`, `cost_center`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 13213164, 'Mauricio Camargo', 'Ingeniero de soporte', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 15:15:25', NULL),
	(2, 654567, 'Julio Alvarez', 'Auxiliar de sistemas', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-08 00:10:52', NULL),
	(3, 647321, 'Jesus David Ruiz Peralta', 'Analista  de datos', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 16:39:15', NULL),
	(4, 789789, 'Guilllermo Avila', 'Ingeniero biomedico', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 15:38:52', NULL),
	(5, 1067947645, 'Maria Alejandra Ponce', 'Comunicadora social', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 15:56:49', NULL),
	(6, 1067927399, 'Yisel Salazar Florez', 'Logistica', 'Administrativo', 'Piso 2', '2023-04-27 17:01:02', '2023-04-27 17:01:02', NULL),
	(7, 1067954877, 'Fulanito de tal', 'Jolie', 'Administrativo', 'Piso 11', '2023-04-12 15:36:06', '2023-04-15 16:06:21', NULL),
	(8, 1067862700, 'Erica Agudelo', 'Enfermera auditor cuentas medicas', 'Administrativo', 'Piso 2', '2023-04-27 17:06:55', '2023-04-27 17:06:55', NULL),
	(9, 1064998062, 'Andrea Reyes Bohorquez', 'Auxiliar de radicacion', 'Administrativo', 'Piso 2', '2023-04-27 17:10:36', '2023-04-27 17:10:36', NULL),
	(10, 1067890234, 'Yeraldin Tuiran Vargas', 'Auxiliar de autorizacion', 'Administrativo', 'Piso 2', '2023-04-27 17:13:25', '2023-04-27 17:13:25', NULL),
	(11, 1067956947, 'Daniela Salas', 'Psicologa organizacional', 'Administrativo', 'Piso 2', '2023-04-27 17:15:22', '2023-04-27 17:15:22', NULL),
	(12, 1067877609, 'Lucia Corcho Diaz', 'Profesional Cartera', 'Administrativo', 'Piso 2', '2023-04-27 17:17:43', '2023-04-27 17:17:43', NULL),
	(13, 1003190388, 'Alejandra Milena Miranda', 'Auxiliar talento humano', 'Administrativo', 'Piso 2', '2023-04-27 17:20:38', '2023-04-27 17:20:38', NULL),
	(14, 1067958229, 'Melisa Alvarez Marquez', 'SST', 'Administrativo', 'Piso 2', '2023-04-27 17:20:38', '2023-04-27 17:20:38', NULL),
	(15, 1003716436, 'Ana Sofia Lopez Martinez', 'Gestion riesgo y control interno', 'Administrativo', 'Piso 2', '2023-04-27 18:41:12', '2023-04-27 18:41:24', NULL),
	(16, 1003395501, 'Leandra Vanessa Garcia Gomez', 'Asistente contable', 'Administrativo', 'Piso 2', '2023-04-27 19:00:13', '2023-04-27 19:00:13', NULL),
	(17, 1003043704, 'Mateo Paez Cogollo', 'Ingeniero de procesos', 'Administrativo', 'Piso 2', '2023-04-27 19:08:30', '2023-04-27 19:08:30', NULL),
	(18, 1067937435, 'Daniel Jose Quintero Doria', 'Asistente contable torre 2', 'Administrativo', 'Piso 2', '2023-04-27 19:08:30', '2023-04-27 19:08:30', NULL),
	(19, 1065009429, 'Marisol Garcia Arrieta', 'Profesional de costos y presupuestos', 'Administrativo', 'Piso 2', '2023-04-27 19:15:09', '2023-04-27 19:15:09', NULL),
	(20, 26173922, 'Josefina Del Carmen Durango Negrete', 'Tesoreria', 'Administrativo', 'Piso 2', '2023-04-27 19:18:18', '2023-04-27 19:51:49', NULL),
	(21, 1067891102, 'Kelly de la salas Ensuncho', 'Profesional de nomina', 'Administrativo', 'Piso 2', '2023-04-28 13:31:14', '2023-04-28 13:31:14', NULL),
	(22, 50966594, 'Vilma Herrera', 'Coordinadora de facturacion', 'Administrativo', 'Piso 2', '2023-04-28 20:25:05', '2023-04-28 20:25:05', NULL),
	(23, 1067877865, 'Pedro Leon', 'Coordinador de sistemas', 'Administrativo', 'Piso 2', '2023-05-10 22:00:55', '2023-05-10 22:00:55', NULL),
	(24, 1067463611, 'Sandra Padilla', 'Contadora', 'Administrativo', 'Piso 2', '2023-05-10 22:02:39', '2023-05-10 22:02:39', NULL),
	(25, 1104377098, 'Alis Alcira Garcia Martinez', 'Referente seguridad del paciente', 'Administrativo', 'Piso 6', '2023-05-13 13:53:04', '2023-05-13 13:53:04', NULL),
	(26, 55304624, 'Haidy Espitia Muñoz', 'Auditor Médico', 'Administrativo asistencial', 'Piso 6', '2023-05-13 13:56:36', '2023-05-15 17:27:25', NULL),
	(27, 26037454, 'Dayana Regino Fuentes', 'Coordinadora general de enfermeria', 'Administrativo asistencial', 'Piso 6', '2023-05-13 13:58:28', '2023-05-15 17:27:20', NULL),
	(28, 1129508295, 'Diana Molina', 'Coordinador de servicio farmaceutico', 'Administrativo asistencial', 'Piso 3', '2023-05-13 14:30:57', '2023-05-15 17:27:05', NULL),
	(29, 1067851692, 'Sindy Milena Burgos Díaz', 'Facturador UCI', 'Administrativo', 'Piso 5', '2023-05-13 14:36:53', '2023-05-13 14:36:53', NULL),
	(30, 35116315, 'Claudia Mercado', 'Facturador urgencias', 'Administrativo', 'Piso 1', '2023-05-13 14:42:52', '2023-05-13 14:42:52', NULL),
	(31, 1067946048, 'Ana Marcela Oyola Díaz', 'Facturadora piso 11', 'Administrativo', 'Piso 11', '2023-05-13 14:45:04', '2023-05-13 14:45:04', NULL),
	(32, 1063153338, 'Juan David Altamiranda Cogollo', 'Facturador piso 9', 'Administrativo', 'Piso 9', '2023-05-13 14:47:53', '2023-05-13 14:47:53', NULL),
	(33, 1064978322, 'Jorge Emilio Guerrero Ospino', 'Facturador piso 10', 'Administrativo', 'Piso 10', '2023-05-13 14:49:21', '2023-05-13 14:49:21', NULL),
	(34, 50986841, 'Kattia Ines Cogollo Martinez', 'Facturador cirugia', 'Administrativo', 'Piso 3', '2023-05-13 14:51:10', '2023-05-13 14:51:10', NULL),
	(35, 1133809225, 'Yurleis Gonzalez Martinez', 'Admisiones cirugia', 'Administrativo asistencial', 'Piso 3', '2023-05-13 14:54:00', '2023-05-15 17:26:29', NULL),
	(36, 1032468914, 'Sandra Milena Castillo Gloria', 'Coordinación de UCI', 'Administrativo asistencial', 'Piso 6', '2023-05-13 14:57:18', '2023-05-15 17:26:10', NULL),
	(37, 1068658491, 'Eliana Josefa Castaño Zarur', 'Líder de fisioterapia', 'Administrativo asistencial', 'Piso 6', '2023-05-13 15:00:22', '2023-05-15 17:25:57', NULL),
	(38, 1066188447, 'Zahamaria Carmona Vertel', 'Ingenieria de procesos', 'Administrativo asistencial', 'Piso 3', '2023-05-13 15:02:56', '2023-05-17 18:48:31', NULL),
	(39, 1065010935, 'Keyla Martinez Cantero', 'Admision piso 4', 'Administrativo asistencial', 'Piso 4', '2023-05-13 15:05:58', '2023-05-17 18:47:12', NULL),
	(40, 30685352, 'Lorena Saibis Bedoya', 'Programacion de cirugia', 'Administrativo asistencial', 'Piso 3', '2023-05-13 15:08:25', '2023-05-15 17:25:26', NULL),
	(41, 1064977945, 'Breilly Saena Baron Arroyo', 'Gestor quirurgico', 'Administrativo asistencial', 'Piso 3', '2023-05-13 15:10:14', '2023-05-15 17:25:17', NULL),
	(42, 1065000844, 'Yulieth Paola Herazo Hoyos', 'Gestor quirurgico', 'Administrativo asistencial', 'Piso 3', '2023-05-13 15:12:00', '2023-05-15 17:24:19', NULL),
	(43, 1067913894, 'Yuli Maria Hernandez Negrete', 'Psicologa clinica', 'Administrativo asistencial', 'Piso 6', '2023-05-13 15:13:47', '2023-05-15 17:24:05', NULL),
	(44, 1066738042, 'Dairo Enrique Hoyos Avilez', 'Auxiliar compras', 'Administrativo', 'Piso 1', '2023-05-13 15:15:53', '2023-05-13 15:15:53', NULL),
	(45, 50932826, 'Claudia Patricia Narvaez Ramirez', 'Profesional de compras', 'Administrativo', 'Piso 1', '2023-05-13 15:18:00', '2023-05-13 15:18:00', NULL),
	(46, 1003404453, 'Angie Carolina Torres Camacho', 'Auxiliar de gestión quirúrgica', 'Administrativo asistencial', 'Piso 3', '2023-05-13 15:20:58', '2023-05-15 17:22:32', NULL),
	(47, 1068668177, 'Oswaldo Correa', 'Auxiliar de gestion documental', 'Administrativo', 'Piso 1', '2023-05-13 15:26:55', '2023-05-13 15:26:55', NULL),
	(48, 25784836, 'Monica Liliana Romero Nieto', 'Convenios especiales', 'Administrativo', 'Piso 1', '2023-05-13 16:00:22', '2023-05-13 16:00:22', NULL),
	(49, 1017124593, 'Karen Cura', 'Coordinadora urgencias', 'Administrativo asistencial', 'Piso 1', '2023-05-13 16:02:45', '2023-05-15 17:21:57', NULL),
	(50, 1047968514, 'Elizabeth Sanchez Loaiza', 'Nutricionista', 'Administrativo asistencial', 'Piso 11', '2023-05-13 16:05:36', '2023-05-15 17:21:40', NULL),
	(51, 50914359, 'Yeidyt Negrete Nieves', 'Coordinadora de calidad', 'Administrativo', 'Piso 10', '2023-05-13 16:13:25', '2023-05-13 16:13:25', NULL),
	(52, 1064992305, 'Laura Zuluaga Giraldo', 'Coordinadora de hospitalizacion', 'Administrativo asistencial', 'Piso 9', '2023-05-13 16:15:41', '2023-05-15 17:21:29', NULL),
	(53, 7920394, 'Jorge Rodriguez', 'Arquitecto', 'Administrativo', 'Piso 2', '2023-05-13 17:13:38', '2023-05-13 17:13:38', NULL),
	(54, 1067876737, 'Claudia Vanessa Navarro Pacheco', 'Coordinacion imagenes', 'Administrativo asistencial', 'Piso 2', '2023-05-15 16:09:42', '2023-05-15 17:21:17', NULL),
	(55, 16074246, 'Nelson Yadir Impata Montoya', 'Lider enfermeria urgencias', 'Administrativo asistencial', 'Piso 1', '2023-05-15 16:10:29', '2023-05-15 17:13:39', NULL),
	(56, 1003393264, 'Juan Orozco', 'Auxiliar calidad', 'Administrativo', 'Piso 10', '2023-05-15 20:14:26', '2023-05-15 20:14:26', NULL),
	(57, 1050036216, 'Emiro Vasquez Ripoll', 'Quimico farmaceutico clinico', 'Administrativo asistencial', 'Piso 3', '2023-05-16 21:11:31', '2023-05-16 21:11:31', NULL),
	(58, 25875013, 'Amalia Regino Pantoja', 'Líder de central de esterilización', 'Administrativo asistencial', 'Piso 3', '2023-05-16 21:12:45', '2023-05-16 21:12:45', NULL);

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

-- Volcando estructura para tabla cumisystem.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.password_resets: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cumisystem.users: ~10 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'admin@cumi.com', NULL, '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', NULL, '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(2, 'Persona', 'persona@cumi.com', NULL, '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', NULL, '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(3, 'Palma Ledner', 'braxton.smitham@example.com', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Zn5DRXP4aF', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(4, 'Geovany Zboncak', 'eulah.thiel@example.com', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Yl5m28O5PD', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(5, 'Dr. Marilyne Ferry V', 'lenora.mckenzie@example.org', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7oxnYeBlLz', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(6, 'Keara Hills', 'jodie.marvin@example.com', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ElPC3td3Pr', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(7, 'Dr. Kaleb Gorczany', 'sterling.terry@example.net', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2wIexIUddq', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(8, 'Talento humano', 'th@cumi.com', NULL, '$2y$10$OuQOx7dawU2grHwVozqRVOiNOTQ.g5Dg7I1ow7H0CGQrciWC9L28u', NULL, '2023-04-13 22:23:43', '2023-04-13 22:23:43'),
	(9, 'Coordinacion', 'coordinacion@cumi.com', NULL, '$2y$10$S24CJh.F8YfRtQJxBJ9GfO5WgR5lCFOQzVBv2OUXbo5/3R1XKE10K', NULL, '2023-04-13 22:24:35', '2023-04-13 22:24:35'),
	(10, 'Prueba3', 'prueba3@gmail.com', NULL, '$2y$10$i3BYqes48i3DXdggkRZ.MeU3AOauu1qL.eWyic.iBDdI.P6phxrFK', NULL, '2023-04-14 20:37:17', '2023-05-11 20:02:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
