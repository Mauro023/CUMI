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

-- Volcando datos para la tabla cumisystem.attendances: ~25 rows (aproximadamente)
REPLACE INTO `attendances` (`id`, `workday`, `aentry_time`, `adeparture_time`, `employe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(745, '2023-04-25', '20:09:15', '20:10:02', 1, '2023-04-26 01:09:32', '2023-04-26 01:10:25', NULL),
	(746, '2023-04-25', '20:09:23', '20:10:06', 3, '2023-04-26 01:09:32', '2023-04-26 01:10:25', NULL),
	(747, '2023-04-25', '20:09:19', '20:10:13', 2, '2023-04-26 01:09:32', '2023-04-26 01:10:25', NULL),
	(748, '2023-04-25', '20:11:16', '20:10:13', 2, '2023-04-26 01:11:28', '2023-04-26 01:24:07', NULL),
	(749, '2023-04-25', '20:11:20', '20:12:10', 3, '2023-04-26 01:11:28', '2023-04-26 01:24:07', NULL),
	(750, '2023-04-25', '20:11:05', '20:12:02', 1, '2023-04-26 01:11:28', '2023-04-26 01:23:56', NULL),
	(751, '2023-04-25', '20:27:18', '20:10:02', 1, '2023-04-26 01:27:45', '2023-04-26 01:28:16', NULL),
	(752, '2023-04-25', '20:27:33', '20:10:06', 3, '2023-04-26 01:27:45', '2023-04-26 01:28:16', NULL),
	(753, '2023-04-25', '20:27:29', '20:12:06', 2, '2023-04-26 01:28:16', '2023-04-26 01:28:17', NULL),
	(757, '2023-04-26', '08:48:12', '09:17:57', 2, '2023-04-26 13:49:49', '2023-04-26 14:26:19', NULL),
	(758, '2023-04-26', '08:48:07', '09:17:52', 1, '2023-04-26 13:49:49', '2023-04-26 14:26:19', NULL),
	(759, '2023-04-26', '08:48:16', '09:18:02', 3, '2023-04-26 13:49:49', '2023-04-26 14:26:19', NULL),
	(760, '2023-04-26', '09:27:11', '09:27:45', 3, '2023-04-26 14:27:17', '2023-04-26 14:27:52', NULL),
	(761, '2023-04-26', '09:27:07', '09:27:41', 2, '2023-04-26 14:27:17', '2023-04-26 14:27:52', NULL),
	(762, '2023-04-26', '09:27:02', '09:27:37', 1, '2023-04-26 14:27:17', '2023-04-26 14:27:52', NULL),
	(763, '2023-04-26', '09:28:45', '09:29:31', 1, '2023-04-26 14:29:01', '2023-04-26 14:29:40', NULL),
	(764, '2023-04-26', '09:28:57', '09:29:27', 3, '2023-04-26 14:29:01', '2023-04-26 14:29:40', NULL),
	(765, '2023-04-26', '09:28:52', '09:29:34', 2, '2023-04-26 14:29:01', '2023-04-26 14:29:40', NULL),
	(766, '2023-04-26', '11:02:28', '11:03:39', 2, '2023-04-26 16:02:58', '2023-04-26 16:03:47', NULL),
	(767, '2023-04-26', '11:02:32', '11:03:34', 1, '2023-04-26 16:02:58', '2023-04-26 16:03:47', NULL),
	(768, '2023-04-26', '11:10:56', '11:12:34', 2, '2023-04-26 16:11:20', '2023-04-26 17:08:35', NULL),
	(769, '2023-04-26', '11:10:51', '11:12:37', 3, '2023-04-26 16:11:20', '2023-04-26 17:08:36', NULL),
	(770, '2023-04-26', '16:05:07', '16:05:19', 2, '2023-04-26 21:12:25', '2023-04-26 21:12:46', NULL),
	(771, '2023-04-27', '07:58:44', '07:58:48', 1, '2023-04-27 13:10:05', '2023-04-27 13:10:05', NULL),
	(772, '2023-04-27', '10:32:05', '10:32:33', 3, '2023-04-27 15:32:45', '2023-04-27 15:32:54', NULL),
	(773, '2023-04-27', '10:39:48', '10:39:58', 4, '2023-04-27 15:40:05', '2023-04-27 15:40:11', NULL),
	(774, '2023-04-27', '10:40:45', '12:29:56', 4, '2023-04-27 15:40:50', '2023-04-27 17:30:01', NULL),
	(775, '2023-04-27', '11:29:01', '11:29:44', 5, '2023-04-27 16:29:52', '2023-04-27 16:37:53', NULL),
	(780, '2023-04-27', '12:02:37', '12:02:44', 6, '2023-04-27 17:05:00', '2023-04-27 17:05:07', NULL),
	(781, '2023-04-27', '12:09:26', '12:09:36', 8, '2023-04-27 17:09:46', '2023-04-27 17:09:47', NULL),
	(782, '2023-04-27', '12:11:37', '12:11:42', 9, '2023-04-27 17:11:55', '2023-04-27 17:12:01', NULL),
	(783, '2023-04-27', '12:14:24', '12:14:32', 10, '2023-04-27 17:16:52', '2023-04-27 17:16:54', NULL),
	(784, '2023-04-27', '12:16:29', '12:16:38', 11, '2023-04-27 17:16:54', '2023-04-27 17:17:00', NULL),
	(785, '2023-04-27', '12:19:12', '12:19:20', 12, '2023-04-27 17:19:30', '2023-04-27 17:19:36', NULL),
	(786, '2023-04-27', '12:23:40', '12:23:59', 13, '2023-04-27 17:24:19', '2023-04-27 17:24:34', NULL),
	(787, '2023-04-27', '12:28:31', '12:28:36', 2, '2023-04-27 17:28:45', '2023-04-27 17:28:46', NULL),
	(788, '2023-04-27', '13:44:05', '13:44:33', 15, '2023-04-27 18:44:42', '2023-04-27 18:44:44', NULL),
	(789, '2023-04-27', '13:39:49', '13:39:57', 14, '2023-04-27 18:44:43', '2023-04-27 18:44:44', NULL),
	(790, '2023-04-27', '14:03:29', '14:03:37', 16, '2023-04-27 19:03:48', '2023-04-27 19:03:58', NULL),
	(791, '2023-04-27', '14:09:53', '14:10:03', 17, '2023-04-27 19:10:16', '2023-04-27 19:10:17', NULL),
	(792, '2023-04-27', '14:19:26', '14:19:33', 19, '2023-04-27 19:19:48', '2023-04-27 19:19:48', NULL),
	(793, '2023-04-27', '14:17:08', '14:17:35', 18, '2023-04-27 19:19:48', '2023-04-27 19:19:59', NULL),
	(794, '2023-04-27', '14:54:03', '14:54:26', 20, '2023-04-27 19:55:16', '2023-04-27 19:55:16', NULL);

-- Volcando datos para la tabla cumisystem.calendars: ~0 rows (aproximadamente)

-- Volcando datos para la tabla cumisystem.employes: ~5 rows (aproximadamente)
REPLACE INTO `employes` (`id`, `dni`, `name`, `work_position`, `unit`, `cost_center`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 13213164, 'Mauricio Camargo', 'Ingeniero de soporte', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 15:15:25', NULL),
	(2, 654567, 'Julio Alvarez', 'Auxiliar de sistemas', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-08 00:10:52', NULL),
	(3, 647321, 'Jesus David Ruiz Peralta', 'Analista  de datos', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 16:39:15', NULL),
	(4, 789789, 'Guilllermo Avila', 'Ingeniero biomedico', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 15:38:52', NULL),
	(5, 1067947645, 'Maria Alejandra Ponce', 'Comunicadora social', 'Administrativo', 'Piso 2', '2023-04-08 00:10:52', '2023-04-27 15:56:49', NULL),
	(6, 1067927399, 'Yisel Salazar Florez', 'Logistica', 'Administrativo', 'Piso 2', '2023-04-27 17:01:02', '2023-04-27 17:01:02', NULL),
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
	(20, 26173922, 'Josefina Del Carmen Durango Negrete', 'Tesoreria', 'Administrativo', 'Piso 2', '2023-04-27 19:18:18', '2023-04-27 19:51:49', NULL);

-- Volcando datos para la tabla cumisystem.failed_jobs: ~0 rows (aproximadamente)

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

-- Volcando datos para la tabla cumisystem.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando datos para la tabla cumisystem.model_has_roles: ~0 rows (aproximadamente)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Volcando datos para la tabla cumisystem.password_resets: ~0 rows (aproximadamente)

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

-- Volcando datos para la tabla cumisystem.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla cumisystem.roles: ~2 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'Administrador', 'web', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(2, 'User', 'Usuario', 'web', '2023-04-08 00:10:52', '2023-04-08 00:10:52');

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

-- Volcando datos para la tabla cumisystem.users: ~7 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'admin@cumi.com', NULL, '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', NULL, '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(2, 'Persona', 'persona@cumi.com', NULL, '$2y$10$cXVLvs9JkKIq2OtLJni8jeJf/5wVsmiP2nkD4YrkgsnSa5Opmbkf.', NULL, '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(3, 'Palma Ledner', 'braxton.smitham@example.com', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Zn5DRXP4aF', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(4, 'Geovany Zboncak', 'eulah.thiel@example.com', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Yl5m28O5PD', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(5, 'Dr. Marilyne Ferry V', 'lenora.mckenzie@example.org', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7oxnYeBlLz', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(6, 'Keara Hills', 'jodie.marvin@example.com', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ElPC3td3Pr', '2023-04-08 00:10:52', '2023-04-08 00:10:52'),
	(7, 'Dr. Kaleb Gorczany', 'sterling.terry@example.net', '2023-04-08 00:10:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2wIexIUddq', '2023-04-08 00:10:52', '2023-04-08 00:10:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
