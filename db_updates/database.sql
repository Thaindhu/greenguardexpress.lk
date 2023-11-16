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

-- Dumping structure for table myproduct.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.admins: ~0 rows (approximately)
DELETE FROM `admins`;
INSERT INTO `admins` (`id`, `name`, `email`, `user_type_id`, `status`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'admin@gmail.com', NULL, 1, '$2a$10$IBzqjS0MdUF1PQYDBKAzau2TIC1CW8Dk8/uUYJO.n2ldl9NCxfuAe', '2022-11-15 11:38:38', '2022-11-15 11:38:39');

-- Dumping structure for table myproduct.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1_path` varchar(255) DEFAULT NULL,
  `image2_path` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `metaname` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.brands: ~0 rows (approximately)
DELETE FROM `brands`;

-- Dumping structure for table myproduct.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1_path` varchar(255) DEFAULT NULL,
  `image2_path` varchar(255) DEFAULT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `is_hot` tinyint(4) DEFAULT 0,
  `is_collection` tinyint(4) DEFAULT 0,
  `metaname` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.categories: ~2 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `title`, `description`, `image1_path`, `image2_path`, `icon_path`, `is_active`, `is_hot`, `is_collection`, `metaname`, `created_at`, `updated_at`) VALUES
	(10, 'Cat 01', NULL, 'http://127.0.0.1:8000/uploads/categories/1668528118-asiri-nadun.jpg', 'http://127.0.0.1:8000/uploads/categories/1668525412-sadasd-sdasdsad-sadasdsad.jpg', 'http://127.0.0.1:8000/uploads/categories/icons/1669192342-asiri-nadun.jpg', 1, 1, 1, 'cat-01', '2022-11-23 08:39:52', '2022-11-23 08:39:52'),
	(11, 'asdasdasd', 'sadasdasd', 'http://127.0.0.1:8000/uploads/categories/1669192588-asdasdasd.jpg', 'http://127.0.0.1:8000/uploads/categories/1669192588-asdasdasd.jpg', 'http://127.0.0.1:8000/uploads/categories/icons/1669192588-asdasdasd.JPG', 1, 1, 1, 'asdasdasd', '2022-11-23 08:36:28', '2022-11-23 08:36:28');

-- Dumping structure for table myproduct.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(100) NOT NULL,
  `delivery_rate` double(8,2) NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=445 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.cities: ~444 rows (approximately)
DELETE FROM `cities`;
INSERT INTO `cities` (`loc_id`, `loc_name`, `delivery_rate`) VALUES
	(1, 'Nugegoda', 200.00),
	(2, 'Colombo 06', 200.00),
	(3, 'Dehiwala', 200.00),
	(4, 'Kottawa', 200.00),
	(5, 'Piliyandala', 200.00),
	(6, 'Maharagama', 200.00),
	(7, 'Boralesgamuwa', 200.00),
	(8, 'Homagama', 200.00),
	(9, 'Moratuwa', 200.00),
	(10, 'Rajagiriya', 200.00),
	(11, 'Malabe', 200.00),
	(12, 'Kaduwela', 200.00),
	(13, 'Battaramulla', 200.00),
	(14, 'Colombo 03', 200.00),
	(15, 'Athurugiriya', 200.00),
	(16, 'Colombo 04', 200.00),
	(17, 'Colombo 05', 200.00),
	(18, 'Colombo 10', 200.00),
	(19, 'Mount Lavinia', 200.00),
	(20, 'Colombo 09', 200.00),
	(21, 'Colombo 11', 200.00),
	(22, 'Pannipitiya', 200.00),
	(23, 'Ratmalana', 200.00),
	(24, 'Colombo 08', 200.00),
	(25, 'Nawala', 200.00),
	(26, 'Kotte', 200.00),
	(27, 'Colombo 02', 200.00),
	(28, 'Kohuwala', 200.00),
	(29, 'Wellampitiya', 200.00),
	(30, 'Talawatugoda', 200.00),
	(31, 'Colombo 15', 200.00),
	(32, 'Padukka', 200.00),
	(33, 'Angoda', 200.00),
	(34, 'Colombo 13', 200.00),
	(35, 'Colombo 14', 200.00),
	(36, 'Colombo 12', 200.00),
	(37, 'Kolonnawa', 200.00),
	(38, 'Avissawella', 300.00),
	(39, 'Kesbewa', 200.00),
	(40, 'Hanwella', 200.00),
	(41, 'Colombo 07', 200.00),
	(42, 'Colombo 01', 200.00),
	(43, 'Katugastota', 350.00),
	(44, 'Kandy', 350.00),
	(45, 'Gampola', 350.00),
	(46, 'Peradeniya', 350.00),
	(47, 'Kundasale', 350.00),
	(48, 'Akurana', 350.00),
	(49, 'Pilimatalawa', 350.00),
	(50, 'Digana', 350.00),
	(51, 'Gelioya', 350.00),
	(52, 'Nawalapitiya', 350.00),
	(53, 'Kadugannawa', 350.00),
	(54, 'Wattegama', 350.00),
	(55, 'Galagedara', 350.00),
	(56, 'Madawal', 350.00),
	(57, 'Ampitiya', 350.00),
	(58, 'Galle', 350.00),
	(59, 'Ambalangoda', 350.00),
	(60, 'Elpitiya', 350.00),
	(61, 'Hikkaduwa', 350.00),
	(62, 'Baddegama', 350.00),
	(63, 'Karapitiya', 350.00),
	(64, 'Ahangama', 350.00),
	(65, 'Bentota', 350.00),
	(66, 'Batapola', 350.00),
	(67, 'Akkarepattu', 350.00),
	(68, 'Kalmunai', 350.00),
	(69, 'Ampara', 350.00),
	(70, 'Sainthamaruthu', 350.00),
	(71, 'Gampaha', 250.00),
	(72, 'Negombo', 250.00),
	(73, 'Kelaniya', 250.00),
	(74, 'Kiribathgoda', 250.00),
	(75, 'Kadawatha', 250.00),
	(76, 'Ja- Ela', 250.00),
	(77, 'Wattala', 250.00),
	(78, 'Katunayake', 250.00),
	(79, 'Nittambuwa', 250.00),
	(80, 'Minuwangoda', 250.00),
	(81, 'Ragama', 250.00),
	(82, 'Kandana', 250.00),
	(83, 'Delgoda', 250.00),
	(84, 'Divulapitiya', 250.00),
	(85, 'Veyangoda', 300.00),
	(86, 'Mirigama', 350.00),
	(87, 'Ganemulla', 350.00),
	(88, 'Anuradhapura', 350.00),
	(89, 'Kekirawa', 350.00),
	(90, 'Medawachchiya', 350.00),
	(91, 'Tambuttegama', 350.00),
	(92, 'Eppawala', 350.00),
	(93, 'Mihintale', 350.00),
	(94, 'Nochchiyagama', 350.00),
	(95, 'Galnewa', 350.00),
	(96, 'Talawa', 350.00),
	(97, 'Galenbidunuwewa', 350.00),
	(98, 'Habarana', 350.00),
	(99, 'Badulla', 350.00),
	(100, 'Bandarawela', 350.00),
	(101, 'Welimada', 350.00),
	(102, 'Mahiyanganaya', 350.00),
	(103, 'Hali Ela', 350.00),
	(104, 'Ella', 350.00),
	(105, 'Diyatalawa', 350.00),
	(106, 'Haputale', 350.00),
	(107, 'Passara', 350.00),
	(108, 'Batticaloa', 350.00),
	(109, 'Hambantota', 350.00),
	(110, 'Tangalla', 350.00),
	(111, 'Beliatta', 350.00),
	(112, 'Ambalantota', 350.00),
	(113, 'Thissamaharama', 350.00),
	(114, 'Jaffna', 350.00),
	(115, 'Nallur', 350.00),
	(116, 'Chavakachcheri', 350.00),
	(117, 'Horana', 250.00),
	(118, 'Panadura', 250.00),
	(119, 'Kalutara', 250.00),
	(120, 'Bandaragama', 250.00),
	(121, 'Matugama', 250.00),
	(122, 'Wadduwa', 250.00),
	(123, 'Alutgama', 300.00),
	(124, 'Beruwala', 300.00),
	(125, 'Ingiriya', 300.00),
	(126, 'Kegalle', 350.00),
	(127, 'Mawanella', 350.00),
	(128, 'Warakapola', 350.00),
	(129, 'Rambukkana', 350.00),
	(130, 'Galigamuwa', 350.00),
	(131, 'Yatiyantota', 350.00),
	(132, 'Dehiowita', 350.00),
	(133, 'Deraniyagala', 350.00),
	(134, 'Kitulgala', 350.00),
	(135, 'Kurunegala', 350.00),
	(136, 'Kuliyapitiya', 350.00),
	(137, 'Pannala', 350.00),
	(138, 'Narammala', 350.00),
	(139, 'Mawathagama', 350.00),
	(140, 'Wariyapola', 350.00),
	(141, 'Polgahawela', 350.00),
	(142, 'alawwa', 350.00),
	(143, 'Ibbagamuwa', 350.00),
	(144, 'Hettipola', 350.00),
	(145, 'Giriulla', 350.00),
	(146, 'Bingiriya', 350.00),
	(147, 'Nikaweratiya', 350.00),
	(148, 'Galgamuwa', 350.00),
	(149, 'Mannar', 350.00),
	(150, 'Matale', 350.00),
	(151, 'Dambulla', 350.00),
	(152, 'Galewela', 350.00),
	(153, 'Sigiriya', 350.00),
	(154, 'Ukuwela', 350.00),
	(155, 'Palapathwela', 350.00),
	(156, 'Rattota', 350.00),
	(157, 'Yatawatta', 350.00),
	(158, 'Matara', 350.00),
	(159, 'Akuressa', 350.00),
	(160, 'Weligama', 350.00),
	(161, 'Dikwella', 350.00),
	(162, 'Hakmana', 350.00),
	(163, 'Kamburupitiya', 350.00),
	(164, 'Deniyaya', 350.00),
	(165, 'Kekanadura', 350.00),
	(166, 'Kamburugamuwa', 350.00),
	(167, 'Monaragala', 350.00),
	(168, 'Wellawaya', 350.00),
	(169, 'Buttala', 350.00),
	(170, 'Bibile', 350.00),
	(171, 'Kataragama', 350.00),
	(172, 'Mullativu', 350.00),
	(173, 'Nuwara Eliya', 350.00),
	(174, 'Hatton', 350.00),
	(175, 'Ginigathhena', 350.00),
	(176, 'Madulla', 350.00),
	(177, 'Polonnaruwa', 350.00),
	(178, 'Hingurakgoda', 350.00),
	(179, 'Kaduruwela', 350.00),
	(180, 'Medirigiriya', 350.00),
	(181, 'Chilaw', 350.00),
	(182, 'Wennappuwa', 350.00),
	(183, 'Puttalam', 350.00),
	(184, 'Marawila', 350.00),
	(185, 'Nattandiya', 350.00),
	(186, 'Dankotuwa', 350.00),
	(187, 'Ratnapura', 350.00),
	(188, 'Embilipitiya', 350.00),
	(189, 'Balangoda', 350.00),
	(190, 'Pelmadulla', 350.00),
	(191, 'Eheliyagoda', 350.00),
	(192, 'Kuruwita', 350.00),
	(193, 'Trincomalee', 350.00),
	(194, 'Kinniya', 350.00),
	(195, 'Vavuniya', 350.00),
	(196, 'Nedunkeni', 350.00),
	(197, 'Chettikulam', 350.00),
	(198, 'Anamaduwa', 350.00),
	(199, 'Battuluoya', 350.00),
	(200, 'Eluvankulama', 350.00),
	(201, 'Kalpitiya', 350.00),
	(202, 'Madampe', 350.00),
	(203, 'Mahawewa', 350.00),
	(204, 'Mundalama', 350.00),
	(205, 'nuraicholai', 350.00),
	(206, 'Palavi', 350.00),
	(207, 'Thillayadi', 350.00),
	(208, 'Pallekele', 350.00),
	(209, 'Alawathugoda', 350.00),
	(210, 'Ambathenna', 350.00),
	(211, 'Daskara', 350.00),
	(212, 'Daulagala', 350.00),
	(213, 'Galhinna', 350.00),
	(214, 'Hanguranketha', 350.00),
	(215, 'Hapugasthalawa', 350.00),
	(216, 'Menikdiwela', 350.00),
	(217, 'Pussellawa', 350.00),
	(218, 'Talatuoya', 350.00),
	(219, 'Teldeniya', 350.00),
	(220, 'Ulapane', 350.00),
	(221, 'Watadeniya', 350.00),
	(222, 'Welamboda', 350.00),
	(223, 'Udadumbara', 350.00),
	(224, 'Ahungalla', 350.00),
	(225, 'Balapitiya', 350.00),
	(226, 'Boossa', 350.00),
	(227, 'Habaraduwa', 350.00),
	(228, 'Hiniduma', 350.00),
	(229, 'Imaduwa', 350.00),
	(230, 'Karandeniya', 350.00),
	(231, 'Koggala', 350.00),
	(232, 'Kosgoda', 350.00),
	(233, 'Mapalagama', 350.00),
	(234, 'Nagoda', 350.00),
	(235, 'Neluwa', 350.00),
	(236, 'Pitigala', 350.00),
	(237, 'Rathgama', 350.00),
	(238, 'Thawalama', 350.00),
	(239, 'Udugama', 350.00),
	(240, 'Hibutuwelgoda,Kelaniya', 350.00),
	(241, 'Wanduramba', 350.00),
	(242, 'Yakkalamulla', 350.00),
	(243, 'Addalaichcheni', 350.00),
	(244, 'Alayadivembu', 350.00),
	(245, 'Damana', 350.00),
	(246, 'Dehiattakandiya', 350.00),
	(247, 'Irakkamam', 350.00),
	(248, 'Karaitivu', 350.00),
	(249, 'Lahugala', 350.00),
	(250, 'Maha oya', 350.00),
	(251, 'Navithanveli', 350.00),
	(252, 'Nintavur', 350.00),
	(253, 'Padiyathalawa', 350.00),
	(254, 'Pottuvil', 350.00),
	(255, 'Sammanthurai', 350.00),
	(256, 'thirukkovil', 350.00),
	(257, 'Uhana', 350.00),
	(258, 'Bulnewa', 350.00),
	(259, 'Ganewalpola', 350.00),
	(260, 'Horowupathana', 350.00),
	(261, 'kahatagasdigiliya', 350.00),
	(262, 'Kebithigollewa', 350.00),
	(263, 'Gonapathirawa', 350.00),
	(264, 'Konwewa', 350.00),
	(265, 'Madatugama', 350.00),
	(266, 'Mahailuppallama', 350.00),
	(267, 'Maradankadawala', 350.00),
	(268, 'Kuruwita', 350.00),
	(269, 'Palugaswewa', 350.00),
	(270, 'Rambewa', 350.00),
	(271, 'Seeppukulama', 350.00),
	(272, 'Thirappane', 350.00),
	(273, 'Tambuttegama', 350.00),
	(274, 'Talawa', 350.00),
	(275, 'Haldummulla', 350.00),
	(276, 'Beragala', 350.00),
	(277, 'Kandaketiya', 350.00),
	(278, 'Meegahakivula', 350.00),
	(279, 'Lunugala', 350.00),
	(280, 'Tennapanguwa', 350.00),
	(281, 'Chenkalady', 350.00),
	(282, 'Eravurpattu', 350.00),
	(283, 'Kattankudi', 350.00),
	(284, 'Valachchenai', 350.00),
	(285, 'Pasikudah', 350.00),
	(286, 'Vakarai', 350.00),
	(287, 'kiran', 350.00),
	(288, 'Oddamavadi', 350.00),
	(289, 'Ariyampathy', 350.00),
	(290, 'kaluwanchikudy', 350.00),
	(291, 'Vavunathivu', 350.00),
	(292, 'Vellavely', 350.00),
	(293, 'Middeniya', 350.00),
	(294, 'Angunakolapelessa', 350.00),
	(295, 'Walasmulla', 350.00),
	(296, 'Weeraketiya', 350.00),
	(297, 'Middeniya', 350.00),
	(298, 'Angunakolapelessa', 350.00),
	(299, 'Walasmulla', 350.00),
	(300, 'Weeraketiya', 350.00),
	(301, 'Kayts', 350.00),
	(302, 'Velenai', 350.00),
	(303, 'Karainagar', 350.00),
	(304, 'Maruthankerney', 350.00),
	(305, 'Point Pedro', 350.00),
	(306, 'Karaveddy', 350.00),
	(307, 'Kopay', 350.00),
	(308, 'Tellippalai', 350.00),
	(309, 'Udauvil', 350.00),
	(310, 'Sandilipay', 350.00),
	(311, 'Chankanai', 350.00),
	(312, 'Agalawatta', 350.00),
	(313, 'Bulathsinhala', 350.00),
	(314, 'Dodangoda', 350.00),
	(315, 'Maduruwela', 350.00),
	(316, 'Millaniya', 350.00),
	(317, 'Pilindanuwara', 350.00),
	(318, 'Walallavita', 350.00),
	(319, 'Ambepussa', 350.00),
	(320, 'Aranayaka', 350.00),
	(321, 'Bulathkohupitiya', 350.00),
	(322, 'Hemmathagama', 350.00),
	(323, 'Karanwella', 350.00),
	(324, 'Kotiyakubura', 350.00),
	(325, 'Thalagaspitiya', 350.00),
	(326, 'Kilinochchi', 350.00),
	(327, 'Karachchi', 350.00),
	(328, 'Pallai', 350.00),
	(329, 'Poonakary', 350.00),
	(330, 'Madhu', 350.00),
	(331, 'Adampan', 350.00),
	(332, 'Musali', 350.00),
	(333, 'Nanaddan', 350.00),
	(334, 'Naula', 350.00),
	(335, 'Palepola', 350.00),
	(336, 'Gammaduwa', 350.00),
	(337, 'Elkaduwa', 350.00),
	(338, 'Inamaluwa', 350.00),
	(339, 'Kaikawala', 350.00),
	(340, 'Kibissa', 350.00),
	(341, 'Laggala Pallegama', 350.00),
	(342, 'Madawala Ulpotha', 350.00),
	(343, 'Nalanda', 350.00),
	(344, 'Wahakotte', 350.00),
	(345, 'Naula', 350.00),
	(346, 'Palepola', 350.00),
	(347, 'Gammaduwa', 350.00),
	(348, 'Elkaduwa', 350.00),
	(349, 'Inamaluwa', 350.00),
	(350, 'Kaikawala', 350.00),
	(351, 'Kibissa', 350.00),
	(352, 'Laggala Pallegama', 350.00),
	(353, 'Madawala Ulpotha', 350.00),
	(354, 'Nalanda', 350.00),
	(355, 'wahakotte', 350.00),
	(356, 'Devinuwara', 350.00),
	(357, 'Kirinda Pahuwella', 350.00),
	(358, 'Kotapola', 350.00),
	(359, 'Malimbada', 350.00),
	(360, 'Mulatiyana', 350.00),
	(361, 'Pasgoda', 350.00),
	(362, 'Pitabeddara', 350.00),
	(363, 'Thihagoda', 350.00),
	(364, 'Welipitiya', 350.00),
	(365, 'Madulla', 350.00),
	(366, 'Medagama', 350.00),
	(367, 'Siyabalanduwa', 350.00),
	(368, 'Badalkubura', 350.00),
	(369, 'Thanamalwila', 350.00),
	(370, 'Sewanagala', 350.00),
	(371, 'Pandiyankulam', 350.00),
	(372, 'Oddusuddan', 350.00),
	(373, 'Puthukkudiyiruppu', 350.00),
	(374, 'Thunukkai', 350.00),
	(375, 'Ehetugaswewa', 350.00),
	(376, 'Hapugasthalawa', 350.00),
	(377, 'Agarapathana', 350.00),
	(378, 'Ambewela', 350.00),
	(379, 'Bogawantalawa', 350.00),
	(380, 'Bopaththalawa', 350.00),
	(381, 'Diyagama bazaar', 350.00),
	(382, 'Haggala', 350.00),
	(383, 'Kotagala', 350.00),
	(384, 'Kothmale', 350.00),
	(385, 'Labukele', 350.00),
	(386, 'Laxapana', 350.00),
	(387, 'Maskeliya', 350.00),
	(388, 'Nildandahinna', 350.00),
	(389, 'Nanu oya', 350.00),
	(390, 'Padiyapelella', 350.00),
	(391, 'Ramboda', 350.00),
	(392, 'Ragala', 350.00),
	(393, 'Rozella', 350.00),
	(394, 'Udapussellawa', 350.00),
	(395, 'Walapane', 350.00),
	(396, 'Watawala', 350.00),
	(397, 'Norton', 350.00),
	(398, 'Koththallena', 350.00),
	(399, 'Minneriya', 350.00),
	(400, 'Bakamuna', 350.00),
	(401, 'Aralaganwila', 350.00),
	(402, 'Giritale', 350.00),
	(403, 'Elahera', 350.00),
	(404, 'Jayanthipura', 350.00),
	(405, 'Galamuna', 350.00),
	(406, 'Lankapura', 350.00),
	(407, 'Sungawila', 350.00),
	(408, 'Manampitiya', 350.00),
	(409, 'Welikanda', 350.00),
	(410, 'Dibulagala', 350.00),
	(411, 'Imbulpe', 350.00),
	(412, 'Godakawela', 350.00),
	(413, 'Kahawatta', 350.00),
	(414, 'Rakwana', 350.00),
	(415, 'Weligepola', 350.00),
	(416, 'Nivithigala', 350.00),
	(417, 'Ayagama', 350.00),
	(418, 'Kalawana', 350.00),
	(419, 'Kolonne', 350.00),
	(420, 'Panamure', 350.00),
	(421, 'Pohorabawa', 350.00),
	(422, 'Opanayaka', 350.00),
	(423, 'Gomarankadawala', 350.00),
	(424, 'Kantalai', 350.00),
	(425, 'Kuchchaveli', 350.00),
	(426, 'Morawewa', 350.00),
	(427, 'Muttur', 350.00),
	(428, 'Padavi Siripura', 350.00),
	(429, 'Seruvila', 350.00),
	(430, 'Thampalakamam', 350.00),
	(431, 'Verugal', 350.00),
	(432, 'Seeduwa', 350.00),
	(433, 'Dompe ', 350.00),
	(434, 'Udugampola ', 350.00),
	(435, 'Katana', 350.00),
	(436, 'Pasyala', 350.00),
	(437, 'Yakkala', 350.00),
	(438, 'Pugoda', 350.00),
	(439, 'Kirindiwela ', 350.00),
	(440, 'Mandawala', 350.00),
	(441, 'Biyagama', 350.00),
	(442, 'Weliweriya', 350.00),
	(443, 'Baduraliya', 350.00),
	(444, 'Awissawella', 300.00);

-- Dumping structure for table myproduct.colors
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` int(11) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `color_image` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.colors: ~0 rows (approximately)
DELETE FROM `colors`;

-- Dumping structure for table myproduct.custom_supports
CREATE TABLE IF NOT EXISTS `custom_supports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `support_type_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `attachment3` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `support_type_id` (`support_type_id`),
  CONSTRAINT `custom_supports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `custom_supports_ibfk_2` FOREIGN KEY (`support_type_id`) REFERENCES `support_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.custom_supports: ~0 rows (approximately)
DELETE FROM `custom_supports`;

-- Dumping structure for table myproduct.features
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.features: ~0 rows (approximately)
DELETE FROM `features`;

-- Dumping structure for table myproduct.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `products` (`id`),
  CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.payments: ~0 rows (approximately)
DELETE FROM `payments`;

-- Dumping structure for table myproduct.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `small_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1_path` varchar(255) NOT NULL,
  `image2_path` varchar(255) DEFAULT NULL,
  `image3_path` varchar(255) DEFAULT NULL,
  `image4_path` varchar(255) DEFAULT NULL,
  `variations` text DEFAULT NULL,
  `review_count` int(11) DEFAULT NULL,
  `review_value` double(12,2) DEFAULT NULL,
  `price` double(12,2) DEFAULT NULL,
  `discount_price` double(12,2) DEFAULT NULL,
  `discount_pre` double(8,2) DEFAULT NULL,
  `stock` double(8,2) DEFAULT NULL,
  `max_order_qty` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_available` tinyint(4) DEFAULT 1,
  `is_featured` tinyint(4) DEFAULT 0,
  `is_new` tinyint(4) DEFAULT 0,
  `is_hot_sell` tinyint(4) DEFAULT 0,
  `metaname` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.products: ~2 rows (approximately)
DELETE FROM `products`;
INSERT INTO `products` (`id`, `product_code`, `category_id`, `sub_category_id`, `brand_id`, `title`, `small_description`, `description`, `image1_path`, `image2_path`, `image3_path`, `image4_path`, `variations`, `review_count`, `review_value`, `price`, `discount_price`, `discount_pre`, `stock`, `max_order_qty`, `weight`, `is_active`, `is_available`, `is_featured`, `is_new`, `is_hot_sell`, `metaname`, `created_at`, `updated_at`) VALUES
	(1, 'PD-22-000001', 10, 2, NULL, 'Sample product 01 edited', 'sadasdasd', '<p>sadasdasd</p>', 'http://127.0.0.1:8000/uploads/products/1669187410-sample-product-01.jpg', 'http://127.0.0.1:8000/uploads/products/1669187410-sample-product-01.jpg', 'http://127.0.0.1:8000/uploads/products/1669187410-sample-product-01.jpg', 'http://127.0.0.1:8000/uploads/products/1669187410-sample-product-01.JPG', '[{"id":1,"title":"Color","varies":[{"type":"Red","price":null,"qty":"10"},{"type":"Green","price":"","qty":"10"},{"type":"Blue","price":"","qty":"10"}]},{"id":2,"title":"Size","varies":[{"type":"12","price":null,"qty":"10"},{"type":"15","price":"","qty":"10"},{"type":"18","price":"","qty":"10"},{"type":"17","price":"","qty":"40"}]}]', NULL, NULL, 1000.00, 100.00, 10.00, 100.00, 10.00, 100.00, 0, 0, 1, NULL, NULL, 'sample-product-01-edited', '2022-11-23 08:04:12', '2022-11-23 08:04:12'),
	(2, 'PD-22-000002', 10, 3, NULL, 'Sample Product 2', 'dsadasdas', '<p>dasdasdasd</p>', 'http://127.0.0.1:8000/uploads/products/1669187598-sample-product-2.jpg', 'http://127.0.0.1:8000/uploads/products/1669187598-sample-product-2.jpg', 'http://127.0.0.1:8000/uploads/products/1669187598-sample-product-2.jpg', NULL, NULL, NULL, NULL, 100.00, 10.00, 10.00, 10.00, 10.00, 10.00, 0, 0, 1, NULL, 1, 'sample-product-2', '2022-11-23 07:13:18', '2022-11-23 07:13:18'),
	(3, 'PD-22-000003', 10, 2, NULL, 'NAdun', 'dasdsadas', '<p>dsadasd</p>', 'http://127.0.0.1:8000/uploads/products/16691930331299366493-nadun.jpg', 'http://127.0.0.1:8000/uploads/products/16691930332105443322-nadun.jpg', 'http://127.0.0.1:8000/uploads/products/1669193033909101063-nadun.jpg', 'http://127.0.0.1:8000/uploads/products/1669193033313644855-nadun.JPG', NULL, NULL, NULL, 100.00, 10.00, 10.00, 10.00, 10.00, 10.00, 0, NULL, 1, 1, 1, 'nadun', '2022-11-23 08:43:53', '2022-11-23 08:43:53');

-- Dumping structure for table myproduct.product_colors
CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `color_id` (`color_id`),
  CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_colors_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.product_colors: ~0 rows (approximately)
DELETE FROM `product_colors`;

-- Dumping structure for table myproduct.product_features
CREATE TABLE IF NOT EXISTS `product_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `feature_id` (`feature_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_features_ibfk_1` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
  CONSTRAINT `product_features_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.product_features: ~0 rows (approximately)
DELETE FROM `product_features`;

-- Dumping structure for table myproduct.saleproducts
CREATE TABLE IF NOT EXISTS `saleproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_discount_precentage` double DEFAULT NULL,
  `total_discount` double DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `saleproducts_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`),
  CONSTRAINT `saleproducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.saleproducts: ~0 rows (approximately)
DELETE FROM `saleproducts`;

-- Dumping structure for table myproduct.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_count` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_discount_precentage` double DEFAULT NULL,
  `total_discount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `balance_amount` double DEFAULT NULL,
  `referal_user_id` int(11) DEFAULT NULL,
  `referal_earn_amount` double DEFAULT NULL,
  `delivery_amount` double DEFAULT NULL,
  `delivery_number` varchar(255) DEFAULT NULL,
  `delivery_link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.sales: ~0 rows (approximately)
DELETE FROM `sales`;

-- Dumping structure for table myproduct.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1_path` varchar(255) DEFAULT NULL,
  `image2_path` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `metaname` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.sub_categories: ~4 rows (approximately)
DELETE FROM `sub_categories`;
INSERT INTO `sub_categories` (`id`, `category_id`, `title`, `description`, `image1_path`, `image2_path`, `is_active`, `metaname`, `created_at`, `updated_at`) VALUES
	(1, 10, 'dfsdsfsdf', 'asdasdasdas', 'http://127.0.0.1:8000/uploads/sub_categories/1668624803-dfsdsfsdf.jpg', 'http://127.0.0.1:8000/uploads/sub_categories/1668624803-dfsdsfsdf.jpg', 1, 'dfsdsfsdf', '2022-11-16 18:53:23', '2022-11-16 18:53:23'),
	(2, 10, 'Sub Category edited', 'edited', 'http://127.0.0.1:8000/uploads/sub_categories/1668625716-sub-category-edited.png', 'http://127.0.0.1:8000/uploads/sub_categories/1668625716-sub-category-edited.png', 1, 'sub-category-edited', '2022-11-16 19:08:36', '2022-11-16 19:08:36'),
	(3, 10, 'Sub Category 1', NULL, 'http://127.0.0.1:8000/uploads/sub_categories/1668624944-sub-category-1.png', 'http://127.0.0.1:8000/uploads/sub_categories/1668624944-sub-category-1.png', 1, 'sub-category-1', '2022-11-16 18:55:44', '2022-11-16 18:55:44'),
	(4, 10, 'Sub Category 12', NULL, 'http://127.0.0.1:8000/uploads/sub_categories/1668625141-sub-category-12.png', 'http://127.0.0.1:8000/uploads/sub_categories/1668625141-sub-category-12.png', 1, 'sub-category-12', '2022-11-16 18:59:01', '2022-11-16 18:59:01'),
	(5, 10, 'Sub Category 122', 'asdasasd', 'http://127.0.0.1:8000/uploads/sub_categories/1668625173-sub-category-122.png', 'http://127.0.0.1:8000/uploads/sub_categories/1668625173-sub-category-122.png', 1, 'sub-category-122', '2022-11-16 18:59:33', '2022-11-16 18:59:33');

-- Dumping structure for table myproduct.support_types
CREATE TABLE IF NOT EXISTS `support_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `support_type` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.support_types: ~0 rows (approximately)
DELETE FROM `support_types`;

-- Dumping structure for table myproduct.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `share_token` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `total_share_earning` double DEFAULT NULL,
  `total_share_refund` double DEFAULT NULL,
  `withdraw_share_refund` double DEFAULT NULL,
  `total_rebuy_share_refund` double DEFAULT NULL,
  `use_rebuy_share_refund` double DEFAULT NULL,
  `newsletter` tinyint(4) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type_id` (`user_type_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `user_type_id`, `first_name`, `last_name`, `email`, `mobile_number`, `password`, `share_token`, `address_1`, `address_2`, `city_id`, `postal_code`, `total_share_earning`, `total_share_refund`, `withdraw_share_refund`, `total_rebuy_share_refund`, `use_rebuy_share_refund`, `newsletter`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, NULL, 'Asiri', 'Nadun', 'asirinadun222@gmail.com', '0775330847', '$2y$10$zOyzwj5jA.wi8GElaJiTXuokJ.lP9bzGyWS6cwS2pt2VzR4D20coO', NULL, 'No.10 Thelawala Road', 'Mount Lavinia', 312, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-11-16 20:28:40', NULL, '2022-11-16 20:42:52', NULL);

-- Dumping structure for table myproduct.user_types
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table myproduct.user_types: ~2 rows (approximately)
DELETE FROM `user_types`;
INSERT INTO `user_types` (`id`, `user_type`, `is_active`, `created_at`, `updted_at`) VALUES
	(1, 'admin', 1, '2022-11-15 17:04:31', '2022-11-15 11:34:32'),
	(2, 'user', 1, '2022-11-15 17:04:46', '2022-11-15 11:34:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
