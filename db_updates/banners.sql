-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
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


-- Dumping database structure for myproduct
CREATE DATABASE IF NOT EXISTS `myproduct` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `myproduct`;

-- Dumping structure for table myproduct.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `main_banner_path_1` varchar(250) DEFAULT NULL,
  `main_banner_1_redirect` varchar(250) DEFAULT NULL,
  `main_banner_path_2` varchar(250) DEFAULT NULL,
  `main_banner_2_redirect` varchar(250) DEFAULT NULL,
  `main_banner_path_3` varchar(250) DEFAULT NULL,
  `main_banner_3_redirect` varchar(250) DEFAULT NULL,
  `banner_image_sm_1` varchar(250) DEFAULT NULL,
  `banner_image_sm_1_redirect` varchar(250) DEFAULT NULL,
  `banner_image_sm_2` varchar(250) DEFAULT NULL,
  `banner_image_sm_2_redirect` varchar(250) DEFAULT NULL,
  `banner_image_sm_3` varchar(250) DEFAULT NULL,
  `banner_image_sm_3_redirect` varchar(250) DEFAULT NULL,
  `middle_banner_lg_1` varchar(250) DEFAULT NULL,
  `middle_banner_lg_1_redirect` varchar(250) DEFAULT NULL,
  `middle_banner_lg_2` varchar(250) DEFAULT NULL,
  `middle_banner_lg_2_redirect` varchar(250) DEFAULT NULL,
  `middle_banner_sm_1` varchar(250) DEFAULT NULL,
  `middle_banner_sm_1_redirect` varchar(250) DEFAULT NULL,
  `middle_banner_sm_2` varchar(250) DEFAULT NULL,
  `middle_banner_sm_2_redirect` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.banners: ~1 rows (approximately)
DELETE FROM `banners`;
INSERT INTO `banners` (`id`, `main_banner_path_1`, `main_banner_1_redirect`, `main_banner_path_2`, `main_banner_2_redirect`, `main_banner_path_3`, `main_banner_3_redirect`, `banner_image_sm_1`, `banner_image_sm_1_redirect`, `banner_image_sm_2`, `banner_image_sm_2_redirect`, `banner_image_sm_3`, `banner_image_sm_3_redirect`, `middle_banner_lg_1`, `middle_banner_lg_1_redirect`, `middle_banner_lg_2`, `middle_banner_lg_2_redirect`, `middle_banner_sm_1`, `middle_banner_sm_1_redirect`, `middle_banner_sm_2`, `middle_banner_sm_2_redirect`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'http://127.0.0.1:8000/uploads/banners/main/lg/1669300255503931038-main-slider.png', NULL, 'http://127.0.0.1:8000/uploads/banners/main/lg/16693002551718763259-main-slider.png', NULL, 'http://127.0.0.1:8000/uploads/banners/main/lg/1669300255912930621-main-slider.png', NULL, 'http://127.0.0.1:8000/uploads/banners/main/sm/1669300255701631665-main-slider.jpg', NULL, 'http://127.0.0.1:8000/uploads/banners/main/sm/16693002551659894604-main-slider.jpg', NULL, 'http://127.0.0.1:8000/uploads/banners/main/sm/1669300255165949306-main-slider.jpg', NULL, 'http://127.0.0.1:8000/uploads/banners/middle/lg/16693031031431988557-main-slider.png', 'sdasdsd', 'http://127.0.0.1:8000/uploads/banners/middle/lg/1669303103810569273-main-slider.png', 'sadasdsad', 'http://127.0.0.1:8000/uploads/banners/middle/sm/16693031031621127123-main-slider.jpg', 'sdasdsad', 'http://127.0.0.1:8000/uploads/banners/middle/sm/16693031031355670474-main-slider.jpg', 'asdsadsadas', '2022-11-24 20:48:23', NULL, '2022-11-24 15:18:23', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
