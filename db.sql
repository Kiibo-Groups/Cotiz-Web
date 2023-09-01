-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.33-0ubuntu0.22.04.2 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla cotiz.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `short_descript` varchar(200) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `shw_email` varchar(100) DEFAULT NULL,
  `username` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `address` text NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `shw_password` varchar(255) NOT NULL,
  `phone_contact` varchar(55) DEFAULT NULL,
  `logo` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `terms_title` varchar(100) NOT NULL,
  `terms_descript` varchar(150) NOT NULL,
  `terms` text NOT NULL,
  `about_title` varchar(150) NOT NULL,
  `about_descript` varchar(150) NOT NULL,
  `about` text NOT NULL,
  `privacy_title` varchar(100) NOT NULL,
  `privacy_descript` varchar(150) NOT NULL,
  `privacy` text NOT NULL,
  `fb` varchar(2500) DEFAULT NULL,
  `insta` varchar(2500) DEFAULT NULL,
  `twitter` varchar(2500) DEFAULT NULL,
  `youtube` varchar(2500) DEFAULT NULL,
  `_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cotiz.admin: ~1 rows (aproximadamente)
INSERT INTO `admin` (`id`, `name`, `short_descript`, `email`, `shw_email`, `username`, `address`, `lat`, `lng`, `phone`, `password`, `shw_password`, `phone_contact`, `logo`, `terms_title`, `terms_descript`, `terms`, `about_title`, `about_descript`, `about`, `privacy_title`, `privacy_descript`, `privacy`, `fb`, `insta`, `twitter`, `youtube`, `_token`, `created_at`, `updated_at`) VALUES
	(1, 'Cotiz', 'Cotiz admin', 'admin@cotiz.com', 'admin@cotiz.com', 'admin', 'Mexico', '0', '0', '0', '$2y$10$7yiBbLxaEHcWMmfNIJDXNOXXeIMxF///.kuRoXEFBQDFs1PAevg9.', 'Admin15978', '0', '', 'Términos y Condiciones', 'Bienvenido(a) a nuestro sistema Cotiz', '\r\n', 'Acerca de nosotros', 'Conoce acerca de nustra empresa', '', 'Política de privacidad', '', '', '', '', '', '', 'qzrRntctq9Ha0NLcqt0O6fj3LUg1OGZEvMPGUQSR', '2019-03-27 10:47:27', '2023-05-29 00:00:00');

-- Volcando estructura para tabla cotiz.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `of_user` int NOT NULL,
  `for_user` int NOT NULL,
  `message` text COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Volcando datos para la tabla cotiz.notifications: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cotiz.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla cotiz.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cotiz.providers
CREATE TABLE IF NOT EXISTS `providers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_providers_users` (`user_id`),
  CONSTRAINT `FK_providers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Volcando datos para la tabla cotiz.providers: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cotiz.request_services
CREATE TABLE IF NOT EXISTS `request_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `service_id` int NOT NULL,
  `status` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_request_services_users` (`user_id`),
  KEY `FK_request_services_services_providers` (`service_id`),
  CONSTRAINT `FK_request_services_services_providers` FOREIGN KEY (`service_id`) REFERENCES `services_providers` (`id`),
  CONSTRAINT `FK_request_services_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Volcando datos para la tabla cotiz.request_services: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cotiz.services_providers
CREATE TABLE IF NOT EXISTS `services_providers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Porviders_Services_FK1` (`provider_id`),
  CONSTRAINT `Porviders_Services_FK1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Volcando datos para la tabla cotiz.services_providers: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cotiz.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` int DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `about` text,
  `pic_profile` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phone_verify` int NOT NULL DEFAULT '1',
  `company` varchar(200) DEFAULT NULL,
  `job` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `shw_password` varchar(120) NOT NULL,
  `status` int DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla cotiz.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
