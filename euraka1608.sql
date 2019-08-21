-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for euraka-my
CREATE DATABASE IF NOT EXISTS `euraka-my` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `euraka-my`;

-- Dumping structure for table euraka-my.activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `logname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  `cause_id` int(10) NOT NULL,
  `cause_type` varchar(255) NOT NULL,
  `properties` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.activity_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;

-- Dumping structure for table euraka-my.campaign_user
CREATE TABLE IF NOT EXISTS `campaign_user` (
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table euraka-my.campaign_user: ~5 rows (approximately)
/*!40000 ALTER TABLE `campaign_user` DISABLE KEYS */;
INSERT INTO `campaign_user` (`user_id`, `campaign_id`) VALUES
	(7, 2),
	(6, 1),
	(2, 1),
	(1, 1),
	(11, 3);
/*!40000 ALTER TABLE `campaign_user` ENABLE KEYS */;

-- Dumping structure for table euraka-my.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(150) CHARACTER SET latin1 NOT NULL,
  `parent_id` int(10) NOT NULL,
  `image` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET latin1 NOT NULL,
  `about_user` text CHARACTER SET latin1,
  `created_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- Dumping data for table euraka-my.categories: ~11 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `slug`, `parent_id`, `image`, `status`, `about_user`, `created_by`, `created_at`, `updated_at`) VALUES
	(46, 'Education', 'education', 0, NULL, 'active', 'This is all about education', 2, '2019-08-01 15:47:03', '2019-08-01 15:47:03'),
	(47, 'Quis', 'quis', 0, NULL, 'active', 'Aut quae illo aperiam repellat optio fugit sit. Consequuntur doloribus et doloremque iure. Qui delectus possimus autem minima et architecto est. Molestiae iure aliquid hic perferendis eius nihil.', 2, '2019-08-14 14:17:16', NULL),
	(48, 'Necessitatibus', 'necessitatibus', 0, NULL, 'active', 'Illo doloribus porro magnam commodi nobis doloremque voluptate. Mollitia alias voluptatem eos quam voluptas blanditiis. Ut eius quas ea quo mollitia officiis qui. A quos explicabo nihil quasi cum.', 2, '2019-08-14 14:17:16', NULL),
	(49, 'Minus', 'minus', 15, NULL, 'active', 'Autem minus dolores quia molestiae tempora cupiditate. Ut at et necessitatibus. Voluptas similique autem hic. Qui ea laudantium reiciendis. Tempore vero rem nihil.', 2, '2019-08-14 14:17:16', NULL),
	(50, 'Magnam', 'magnam', 15, NULL, 'active', 'Error aut ipsa earum facilis corporis est iusto accusamus. Laboriosam consequuntur suscipit veniam qui fugiat aut. Sit deserunt ex dolorem.', 2, '2019-08-14 14:17:16', NULL),
	(51, 'Tenetur', 'tenetur', 0, NULL, 'active', 'Quis assumenda magnam vitae. Maiores aut quo ut quasi eligendi molestiae dolorem. Sit debitis laboriosam voluptatem. Illum deserunt fuga aut ut eveniet veritatis.', 2, '2019-08-14 14:17:16', NULL),
	(52, 'Maiores', 'maiores', 0, NULL, 'active', 'Dignissimos a consequatur quae maxime repellendus. Explicabo eaque est illo ut ea.', 2, '2019-08-14 14:17:16', NULL),
	(53, 'Officiis', 'officiis', 16, NULL, 'active', 'Voluptatem qui et delectus aliquam sed aspernatur perferendis. Magnam rerum necessitatibus sit iste quod ducimus. Unde quaerat sunt corporis doloremque ab ut. Sapiente laborum cupiditate velit nam.', 2, '2019-08-14 14:17:16', NULL),
	(54, 'Amet', 'amet', 0, NULL, 'active', 'Voluptatibus consectetur deleniti quia consequuntur dignissimos. Perspiciatis eum ab explicabo quis aperiam possimus officiis. Natus tenetur unde facere dolore et quae.', 2, '2019-08-14 14:17:17', NULL),
	(55, 'Temporibus', 'temporibus', 40, NULL, 'active', 'Nesciunt dolorum quis provident quia quia illo laudantium. Incidunt ratione culpa et vel dolorem. Occaecati autem quidem impedit repellendus aut. Cupiditate pariatur delectus cupiditate.', 2, '2019-08-14 14:17:17', NULL),
	(56, 'Et', 'et', 0, NULL, 'active', 'Id dolores quo eligendi cupiditate illo id et. Ipsum hic sint molestiae voluptatem minus sint consequuntur est.', 2, '2019-08-14 14:17:17', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table euraka-my.category_challenge
CREATE TABLE IF NOT EXISTS `category_challenge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `challenge_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.category_challenge: ~231 rows (approximately)
/*!40000 ALTER TABLE `category_challenge` DISABLE KEYS */;
INSERT INTO `category_challenge` (`id`, `challenge_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(22, 40, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 41, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 42, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 43, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, 44, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, 45, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, 46, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, 47, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(30, 48, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(31, 49, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(32, 50, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(33, 51, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(34, 52, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(35, 53, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(36, 54, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(37, 55, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(38, 56, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(39, 57, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(40, 58, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(41, 59, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(42, 60, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(43, 61, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(44, 62, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(45, 63, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(46, 64, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(47, 65, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(48, 66, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(49, 67, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, 68, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(51, 69, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(52, 70, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(53, 71, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(54, 72, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, 73, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(56, 74, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(57, 75, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(58, 76, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, 77, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(60, 78, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(61, 79, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(62, 80, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(63, 81, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(64, 82, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(65, 83, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(66, 84, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(67, 85, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(68, 86, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(69, 87, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(70, 88, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(71, 89, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(72, 90, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(73, 91, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(74, 92, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(75, 93, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(76, 94, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(77, 95, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(78, 96, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(79, 97, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(80, 98, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(81, 99, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(82, 100, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(83, 101, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(84, 102, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(85, 103, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(86, 104, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(87, 105, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(88, 106, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(89, 107, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(90, 108, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(91, 109, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(92, 110, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(93, 111, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(94, 112, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(95, 113, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(96, 114, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(97, 115, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(98, 116, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(99, 117, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(100, 118, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(101, 119, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(102, 120, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(103, 121, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(104, 122, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(105, 123, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(106, 124, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(107, 125, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(108, 126, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(109, 127, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(110, 128, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(111, 129, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(112, 130, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(113, 131, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(114, 132, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(115, 133, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(116, 134, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(117, 135, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(118, 136, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(119, 137, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(120, 138, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(121, 139, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(122, 140, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(123, 141, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(124, 142, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(125, 143, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(126, 144, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(127, 145, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(128, 146, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(129, 147, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(130, 148, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(131, 149, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(132, 150, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(133, 151, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(134, 152, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(135, 153, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(136, 154, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(137, 155, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(138, 156, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(139, 157, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(140, 158, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(141, 159, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(142, 160, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(143, 161, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(144, 162, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(145, 163, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(146, 164, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(147, 165, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(148, 166, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(149, 167, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(150, 168, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(151, 169, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(152, 170, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(153, 171, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(154, 172, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(155, 173, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(156, 174, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(157, 175, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(158, 176, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(159, 177, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(160, 178, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(161, 179, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(162, 180, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(163, 181, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(164, 182, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(165, 183, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(166, 184, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(167, 185, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(168, 186, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(169, 187, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(170, 188, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(171, 189, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(172, 190, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(173, 191, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(174, 192, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(175, 193, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(176, 194, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(177, 195, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(178, 196, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(179, 197, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(180, 198, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(181, 199, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(182, 200, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(183, 201, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(184, 202, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(185, 203, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(186, 204, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(187, 205, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(188, 206, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(189, 207, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(190, 208, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(191, 209, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(192, 210, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(193, 211, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(194, 212, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(195, 213, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(196, 214, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(197, 215, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(198, 216, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(199, 217, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(200, 218, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(201, 219, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(202, 220, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(203, 221, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(204, 222, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(205, 223, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(206, 224, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(207, 225, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(208, 226, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(209, 227, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(210, 228, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(211, 229, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(212, 230, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(213, 231, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(214, 232, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(215, 233, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(216, 234, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(217, 235, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(218, 236, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(219, 237, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(220, 238, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(221, 239, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(222, 240, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(223, 241, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(224, 242, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(225, 243, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(226, 244, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(227, 245, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(228, 246, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(229, 247, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(230, 248, 53, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(231, 249, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(232, 250, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(233, 251, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(234, 252, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(235, 253, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(236, 254, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(237, 255, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(238, 256, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(239, 257, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(240, 258, 56, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(241, 259, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(242, 260, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(243, 261, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(244, 262, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(245, 263, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(246, 264, 55, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(247, 265, 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(248, 266, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(249, 267, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(250, 268, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(251, 269, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(252, 270, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `category_challenge` ENABLE KEYS */;

-- Dumping structure for table euraka-my.challenges
CREATE TABLE IF NOT EXISTS `challenges` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(70) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `active_from` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.challenges: ~232 rows (approximately)
/*!40000 ALTER TABLE `challenges` DISABLE KEYS */;
INSERT INTO `challenges` (`id`, `title`, `slug`, `description`, `image`, `status`, `category_id`, `active_from`, `created_by`, `created_at`, `updated_at`) VALUES
	(19, 'Dolore temporibus architecto laboriosam.', 'dolore-temporibus-architecto-laboriosam', 'Similique qui error explicabo cupiditate et quis. Repudiandae excepturi aut qui magni qui et ea. Et nulla temporibus repellendus consequatur qui ratione ut.', '', 'active', 0, '2019-07-11 00:00:00', 186, NULL, NULL),
	(40, 'Sunt ab soluta aspernatur recusandae ut consequatu', 'sunt-ab-soluta-aspernatur-recusandae-ut-consequatu', 'Omnis quo voluptates porro maxime. Quam quibusdam fugit ut esse et. Ea magni asperiores qui cumque dolore.', '', 'active', NULL, '2019-07-11 00:00:00', 54, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(41, 'Tempore neque aliquam quos libero mollitia nam.', 'tempore-neque-aliquam-quos-libero-mollitia-nam', 'Quia eos vero facilis blanditiis ex sunt. Iure sit itaque cum aut nostrum iure qui. Quaerat distinctio tempora dicta sed.', '', 'active', NULL, '2019-07-11 00:00:00', 143, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(42, 'Aspernatur incidunt dolores laborum tempora.', 'aspernatur-incidunt-dolores-laborum-tempora', 'Quam omnis voluptas est velit. Et ut ut quia dolor ipsam. Accusamus quam quod quae voluptatum. Iure molestiae ut aliquam sapiente aut architecto perspiciatis.', '', 'active', NULL, '2019-07-11 00:00:00', 60, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(43, 'Qui aut aliquam reiciendis amet id ea dolorem nesc', 'qui-aut-aliquam-reiciendis-amet-id-ea-dolorem-nesc', 'Voluptate inventore ullam sed sunt. Soluta ut nesciunt architecto enim fuga quis. Ratione aperiam et ex vero totam. Voluptas molestias dolore nam ratione aspernatur sunt.', '', 'active', NULL, '2019-07-11 00:00:00', 138, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(44, 'Dolore earum reiciendis ut atque et natus.', 'dolore-earum-reiciendis-ut-atque-et-natus', 'Aut sunt maxime incidunt omnis cupiditate. Praesentium unde molestiae quos amet consequuntur et atque. Quam soluta qui omnis illo numquam corporis.', '', 'active', NULL, '2019-07-11 00:00:00', 81, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(45, 'Et doloremque aut velit totam error ducimus.', 'et-doloremque-aut-velit-totam-error-ducimus', 'Quasi velit autem illum. Vero quo voluptatibus consequatur ut. Maiores sint odit a ut iure. Optio placeat debitis autem numquam.', '', 'active', NULL, '2019-07-11 00:00:00', 68, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(46, 'Dolor qui animi sit reprehenderit.', 'dolor-qui-animi-sit-reprehenderit', 'Perferendis voluptatibus aut itaque doloribus. Temporibus qui et eum itaque est natus quae. Doloremque eius voluptates mollitia vitae dolorum.', '', 'active', NULL, '2019-07-11 00:00:00', 39, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(47, 'Quod ducimus dolor sunt dolorum quos qui facilis e', 'quod-ducimus-dolor-sunt-dolorum-quos-qui-facilis-e', 'Eaque ipsam possimus eum animi sunt atque soluta. Dicta optio ipsa fuga consectetur numquam ut. Velit velit dolorum facere porro. Hic totam et totam nulla veniam culpa quisquam.', '', 'active', NULL, '2019-07-11 00:00:00', 99, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(48, 'Qui ex magni cupiditate placeat fugiat eum.', 'qui-ex-magni-cupiditate-placeat-fugiat-eum', 'Dolores nam autem ratione. Aliquid dolor est molestias ut sit illum. Qui eum ullam magni mollitia et optio ad. Ex id aut cumque illo.', '', 'active', NULL, '2019-07-11 00:00:00', 139, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(49, 'Officiis ut excepturi sint qui repudiandae fuga.', 'officiis-ut-excepturi-sint-qui-repudiandae-fuga', 'Qui similique ut a voluptate dolores. Amet est quae est aliquam sunt et ipsam dolorem. Minus dolore dolorem assumenda quia nobis molestiae.', '', 'active', NULL, '2019-07-11 00:00:00', 142, '2019-08-14 09:11:06', '2019-08-14 09:11:06'),
	(50, 'Vitae alias vel quis sit qui est exercitationem.', 'vitae-alias-vel-quis-sit-qui-est-exercitationem', 'Repellat inventore et aut eos. Vero dolor voluptas ipsam facere laudantium tempore praesentium. Reprehenderit quaerat qui culpa voluptas quidem in.', '', 'active', NULL, '2019-07-11 00:00:00', 167, '2019-08-14 09:11:35', '2019-08-14 09:11:35'),
	(51, 'Vero dolores provident in voluptas.', 'vero-dolores-provident-in-voluptas', 'Delectus hic animi laboriosam. Quos quae placeat quam quo velit ipsam. Ut id quibusdam consequatur voluptatem sunt autem eum. Tempore quis quisquam eligendi.', '', 'active', NULL, '2019-07-11 00:00:00', 30, '2019-08-14 09:11:35', '2019-08-14 09:11:35'),
	(52, 'Et suscipit occaecati debitis.', 'et-suscipit-occaecati-debitis', 'Sapiente qui non totam incidunt. Ut exercitationem sit quia repellendus aliquid similique totam. Quia in omnis eaque officia alias amet. Aut placeat autem aut est modi repellendus.', '', 'active', NULL, '2019-07-11 00:00:00', 38, '2019-08-14 09:11:35', '2019-08-14 09:11:35'),
	(53, 'Ratione accusamus quis sed sint enim ut.', 'ratione-accusamus-quis-sed-sint-enim-ut', 'Aut doloremque et consequatur maxime. Nobis accusamus qui veritatis. Iste quas numquam qui ipsum maiores ipsum. Consequatur tempora et praesentium impedit qui temporibus.', '', 'active', NULL, '2019-07-11 00:00:00', 50, '2019-08-14 09:11:35', '2019-08-14 09:11:35'),
	(54, 'Quia expedita suscipit sed ipsum et qui atque.', 'quia-expedita-suscipit-sed-ipsum-et-qui-atque', 'Quibusdam numquam et voluptas dolorem est. Ea quod ipsa hic dolore omnis qui quae. Ut odit aspernatur alias sint.', '', 'active', NULL, '2019-07-11 00:00:00', 145, '2019-08-14 09:11:35', '2019-08-14 09:11:35'),
	(55, 'Pariatur reprehenderit quos natus nihil sint facil', 'pariatur-reprehenderit-quos-natus-nihil-sint-facil', 'Sunt quae iste consequatur impedit corporis odio sed. Omnis voluptatem laborum est quas perferendis. Vel dolorum autem quia vero velit quod.', '', 'active', NULL, '2019-07-11 00:00:00', 166, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(56, 'Et nisi numquam autem qui similique voluptate eaqu', 'et-nisi-numquam-autem-qui-similique-voluptate-eaqu', 'Error enim quis rerum reiciendis est qui quis. Eligendi maxime est qui omnis odit. Necessitatibus aut ut sequi veritatis recusandae. Corporis saepe error qui atque eveniet.', '', 'active', NULL, '2019-07-11 00:00:00', 18, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(57, 'Delectus ea perferendis sit cum.', 'delectus-ea-perferendis-sit-cum', 'Voluptatem hic qui illum. Vitae aut odio est nam velit dolorum consectetur. Corporis ipsum nemo voluptates numquam iure. Officiis autem quibusdam exercitationem qui dolore unde.', '', 'active', NULL, '2019-07-11 00:00:00', 113, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(58, 'In aut porro distinctio culpa qui cupiditate.', 'in-aut-porro-distinctio-culpa-qui-cupiditate', 'Veniam blanditiis deserunt nemo in sit nihil voluptas commodi. Vel sequi est blanditiis explicabo. Et tempore aspernatur voluptatem. Sequi qui enim explicabo.', '', 'active', NULL, '2019-07-11 00:00:00', 212, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(59, 'Reiciendis nobis voluptatem labore maxime est dese', 'reiciendis-nobis-voluptatem-labore-maxime-est-dese', 'Adipisci tempora sit et ullam quidem. Nulla doloremque delectus molestiae alias adipisci. Optio itaque aspernatur dolore ratione.', '', 'active', NULL, '2019-07-11 00:00:00', 146, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(60, 'Molestiae reprehenderit ut rerum occaecati sequi.', 'molestiae-reprehenderit-ut-rerum-occaecati-sequi', 'Rerum delectus consequatur dolorum vel sed ea et quam. Quisquam commodi ut quo esse incidunt. Possimus maiores itaque unde nam ut expedita possimus molestiae.', '', 'active', NULL, '2019-07-11 00:00:00', 30, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(61, 'Natus nesciunt consequatur et iure nihil.', 'natus-nesciunt-consequatur-et-iure-nihil', 'Hic asperiores magnam vel quia. Impedit dignissimos enim animi distinctio.', '', 'active', NULL, '2019-07-11 00:00:00', 166, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(62, 'Qui tempore hic doloribus eius.', 'qui-tempore-hic-doloribus-eius', 'Possimus aut qui harum rerum. Nulla consequatur id possimus eum ratione voluptatem. Porro adipisci minima quas aspernatur.', '', 'active', NULL, '2019-07-11 00:00:00', 175, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(63, 'Voluptatem et incidunt et.', 'voluptatem-et-incidunt-et', 'Excepturi alias praesentium consequatur beatae. Vitae aut magnam quia. Quos illo a dolorum sequi neque voluptatem.', '', 'active', NULL, '2019-07-11 00:00:00', 170, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(64, 'Quas odit assumenda nam corrupti.', 'quas-odit-assumenda-nam-corrupti', 'A est modi quia possimus. Impedit porro harum sunt labore qui. Odit qui commodi sunt earum ut sed et laborum. Repellendus quam quia quaerat voluptatum. Laudantium est corrupti iste itaque officiis.', '', 'active', NULL, '2019-07-11 00:00:00', 173, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(65, 'Quas itaque quod dolor culpa.', 'quas-itaque-quod-dolor-culpa', 'Asperiores sunt dolorum eius perspiciatis ea reiciendis eveniet dolorem. Dicta quam quas iusto id dolore et. Ut earum ipsum omnis ipsam consequatur voluptates a.', '', 'active', NULL, '2019-07-11 00:00:00', 72, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(66, 'Eaque possimus temporibus et animi in esse vero.', 'eaque-possimus-temporibus-et-animi-in-esse-vero', 'Magni est provident quia non velit reiciendis modi. Blanditiis in doloremque aut repudiandae iusto quia. Voluptate adipisci dolores perferendis neque sunt consequatur quis.', '', 'active', NULL, '2019-07-11 00:00:00', 71, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(67, 'Cumque rem magnam aperiam unde.', 'cumque-rem-magnam-aperiam-unde', 'Necessitatibus neque tenetur aperiam explicabo. Adipisci eum labore voluptate minus cumque. Necessitatibus hic animi in corporis.', '', 'active', NULL, '2019-07-11 00:00:00', 147, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(68, 'Enim veniam adipisci est asperiores delectus.', 'enim-veniam-adipisci-est-asperiores-delectus', 'Molestiae ut nisi repellat iure corrupti ut. Et itaque quae possimus officia voluptas. Autem dolor optio sequi praesentium ut id.', '', 'active', NULL, '2019-07-11 00:00:00', 93, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(69, 'Voluptas unde et sint ratione autem.', 'voluptas-unde-et-sint-ratione-autem', 'Dolor commodi voluptatibus accusantium aut dolor. Odit esse non dolorem totam et dolorem. Iure ut at enim earum porro ullam minus. Aut beatae ut autem.', '', 'active', NULL, '2019-07-11 00:00:00', 193, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(70, 'Ut et ex sed qui et.', 'ut-et-ex-sed-qui-et', 'Quas culpa quia atque et quod facere. Magnam modi et omnis optio expedita. Rem qui qui quas ad reiciendis vel.', '', 'active', NULL, '2019-07-11 00:00:00', 53, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(71, 'Dolores perspiciatis tenetur accusantium repellat ', 'dolores-perspiciatis-tenetur-accusantium-repellat-', 'Quisquam illo possimus ipsam eos. Mollitia quos et et maiores consequatur. Aut voluptatibus earum consequatur amet qui.', '', 'active', NULL, '2019-07-11 00:00:00', 30, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(72, 'Vero molestias ut facere quasi tempore possimus ne', 'vero-molestias-ut-facere-quasi-tempore-possimus-ne', 'Corporis omnis molestias harum laboriosam nobis voluptatibus cumque ea. Dolore consequatur consectetur commodi illo excepturi illo. Id corrupti incidunt soluta commodi repudiandae exercitationem.', '', 'active', NULL, '2019-07-11 00:00:00', 11, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(73, 'Est eos et vitae nulla.', 'est-eos-et-vitae-nulla', 'Est est vel modi deserunt. Voluptatem et saepe optio amet explicabo quo magni. Odit hic eum aperiam. Soluta quaerat magnam eligendi ut qui. Expedita repellendus quidem voluptatum.', '', 'active', NULL, '2019-07-11 00:00:00', 178, '2019-08-14 09:11:36', '2019-08-14 09:11:36'),
	(74, 'Magnam quia sint tempora voluptas quibusdam.', 'magnam-quia-sint-tempora-voluptas-quibusdam', 'Fuga totam non et aut sunt quis. Est saepe aperiam nemo dolorum. Ut temporibus et delectus autem nobis ad. Soluta iusto occaecati molestiae beatae.', '', 'active', NULL, '2019-07-11 00:00:00', 49, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(75, 'Sunt recusandae dicta corrupti quae fugit numquam ', 'sunt-recusandae-dicta-corrupti-quae-fugit-numquam-', 'Tempora est nobis nobis veritatis. Qui aut sunt sed a rerum itaque quis. Possimus itaque iste dolorum quasi aut magni ullam.', '', 'active', NULL, '2019-07-11 00:00:00', 33, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(76, 'Sequi nobis quae aut minima corporis repellendus s', 'sequi-nobis-quae-aut-minima-corporis-repellendus-s', 'Et autem voluptates inventore ut exercitationem eum tempora. Consequatur exercitationem suscipit natus cum. Qui sed ut quaerat voluptas.', '', 'active', NULL, '2019-07-11 00:00:00', 60, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(77, 'Iure iste autem ratione corrupti aut.', 'iure-iste-autem-ratione-corrupti-aut', 'Veniam eaque sit aspernatur officia. Eaque eum enim corrupti tempore voluptates rerum corrupti. Aut in doloribus voluptas doloribus autem. Ut quia natus quia soluta.', '', 'active', NULL, '2019-07-11 00:00:00', 81, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(78, 'Repellendus aliquam deserunt perspiciatis consecte', 'repellendus-aliquam-deserunt-perspiciatis-consecte', 'Perferendis aut quis eius ducimus officiis cum. Non eaque omnis eaque autem. Quos tempora ut dolore vitae. Autem et alias qui explicabo animi. Quod sequi veniam natus modi quos.', '', 'active', NULL, '2019-07-11 00:00:00', 199, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(79, 'Molestiae magnam possimus accusamus harum.', 'molestiae-magnam-possimus-accusamus-harum', 'Veritatis rerum dolorum et labore cupiditate enim eum. Aut rem ipsa iusto eos possimus repudiandae quis. Amet laboriosam veniam est ipsum quasi. Ex repellendus earum soluta aperiam ducimus ipsa.', '', 'active', NULL, '2019-07-11 00:00:00', 167, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(80, 'Ab quia quos nulla.', 'ab-quia-quos-nulla', 'Laboriosam tempora id provident dicta qui quia aut. Ullam aliquam soluta magnam beatae. Sequi ea voluptatum tenetur recusandae harum rerum quam. Quam et soluta laborum velit velit sed.', '', 'active', NULL, '2019-07-11 00:00:00', 168, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(81, 'Ea dolores cumque officia unde repellendus vitae.', 'ea-dolores-cumque-officia-unde-repellendus-vitae', 'Ut numquam et necessitatibus ducimus. Quo officia aperiam perferendis. Occaecati sed vel cumque facere suscipit. Eos corrupti dolores omnis et voluptatem.', '', 'active', NULL, '2019-07-11 00:00:00', 161, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(82, 'Quo id consequatur recusandae nam.', 'quo-id-consequatur-recusandae-nam', 'Voluptatibus ea voluptatem molestias qui nesciunt. Ipsum corrupti nemo libero quia velit impedit nihil reprehenderit. Ut ullam et consequatur.', '', 'active', NULL, '2019-07-11 00:00:00', 129, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(83, 'Dignissimos magnam id aliquam recusandae rerum.', 'dignissimos-magnam-id-aliquam-recusandae-rerum', 'Est sunt odit corrupti maxime quasi voluptas. Ipsum exercitationem culpa possimus omnis praesentium enim. Et nisi aut adipisci quis voluptas rerum voluptates.', '', 'active', NULL, '2019-07-11 00:00:00', 168, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(84, 'Eveniet debitis quis quia laudantium sit.', 'eveniet-debitis-quis-quia-laudantium-sit', 'Exercitationem totam quis molestiae commodi facilis mollitia. Rem ad laboriosam animi quae sit sit. Odit quis et similique sit blanditiis deserunt qui aut.', '', 'active', NULL, '2019-07-11 00:00:00', 36, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(85, 'Neque expedita corporis voluptatem quae doloribus ', 'neque-expedita-corporis-voluptatem-quae-doloribus-', 'Natus magni et sit rerum aut occaecati ea. Ut rerum aut hic nesciunt sapiente in natus. Ipsa totam dolor nihil doloremque dolores similique.', '', 'active', NULL, '2019-07-11 00:00:00', 36, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(86, 'Iusto nihil iure minus et.', 'iusto-nihil-iure-minus-et', 'Sint fugiat cum itaque optio ut totam doloribus. Ad blanditiis est cupiditate error enim earum tempore.', '', 'active', NULL, '2019-07-11 00:00:00', 51, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(87, 'Odio sunt repudiandae dolor quos.', 'odio-sunt-repudiandae-dolor-quos', 'Repellat iure consequuntur quam illo velit quo. Labore voluptates sapiente iste quis consectetur. Ut error in et amet provident. Alias sapiente eveniet quia pariatur omnis assumenda.', '', 'active', NULL, '2019-07-11 00:00:00', 169, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(88, 'Et harum qui fugiat.', 'et-harum-qui-fugiat', 'Commodi velit expedita doloremque dolorum magni. Dolores velit id laborum voluptatem placeat et libero. Et perspiciatis quo nihil. Officia suscipit qui quos.', '', 'active', NULL, '2019-07-11 00:00:00', 55, '2019-08-14 09:11:37', '2019-08-14 09:11:37'),
	(89, 'Ipsum sequi rem qui quo.', 'ipsum-sequi-rem-qui-quo', 'Quo ipsam quis provident architecto voluptatem totam. Qui aliquid sunt enim. Aliquam id quisquam fuga dignissimos debitis. Voluptate quasi voluptatum consequatur nostrum nam et sequi.', '', 'active', NULL, '2019-07-11 00:00:00', 172, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(90, 'Vel doloribus et voluptatem.', 'vel-doloribus-et-voluptatem', 'Nisi aut quia aut. Totam nemo rem aspernatur voluptatem quaerat similique et. Quaerat iure aut ut ut. Quo exercitationem eius iure minima non alias qui.', '', 'active', NULL, '2019-07-11 00:00:00', 186, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(91, 'Natus nemo ipsam dolores doloribus sed sed hic.', 'natus-nemo-ipsam-dolores-doloribus-sed-sed-hic', 'Qui omnis reprehenderit eos non minima nisi amet. Voluptatem at aut quam exercitationem. Maiores asperiores expedita molestias ad.', '', 'active', NULL, '2019-07-11 00:00:00', 38, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(92, 'Omnis molestias minus incidunt earum sit voluptate', 'omnis-molestias-minus-incidunt-earum-sit-voluptate', 'Autem possimus et commodi voluptas. Corporis dolor sed officia. Quia ut architecto porro ratione velit ipsam.', '', 'active', NULL, '2019-07-11 00:00:00', 165, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(93, 'Eaque laudantium accusamus repudiandae eum.', 'eaque-laudantium-accusamus-repudiandae-eum', 'Explicabo fuga qui ut aut modi ut est et. Vero numquam illum optio officia dolores et quo. A maiores autem dolorum quod quis debitis voluptatem rerum.', '', 'active', NULL, '2019-07-11 00:00:00', 152, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(94, 'Deleniti commodi sapiente ex sit ipsum.', 'deleniti-commodi-sapiente-ex-sit-ipsum', 'Deserunt veritatis voluptatibus amet molestiae aspernatur dolores nam. Quos ipsum in minima. In et repudiandae fugiat laborum quis. Omnis maiores ut dolor quod quae.', '', 'active', NULL, '2019-07-11 00:00:00', 31, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(95, 'Et ut amet alias aspernatur.', 'et-ut-amet-alias-aspernatur', 'Illum impedit error dolor tempora quia molestiae. Sint est minus aspernatur est nobis dicta quae. Aut aspernatur rerum impedit totam sunt est dolores. Minus aut aspernatur placeat ipsum dolorem.', '', 'active', NULL, '2019-07-11 00:00:00', 36, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(96, 'Error consequatur dolor quas laborum.', 'error-consequatur-dolor-quas-laborum', 'Et laborum nihil perferendis aut. Nihil vero quaerat sed rem dicta.', '', 'active', NULL, '2019-07-11 00:00:00', 171, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(97, 'Provident labore inventore placeat fugiat hic cons', 'provident-labore-inventore-placeat-fugiat-hic-cons', 'Possimus tenetur animi reiciendis rem laborum dolor aspernatur. Sit quia impedit qui magnam. Porro tenetur sit consequuntur voluptate est atque consequuntur.', '', 'active', NULL, '2019-07-11 00:00:00', 47, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(98, 'Maiores eius voluptas eum assumenda omnis.', 'maiores-eius-voluptas-eum-assumenda-omnis', 'Soluta iure laboriosam sit vitae assumenda necessitatibus. Tempora ut rerum ut facere magnam ut voluptatum officia. Dolorem officiis et ad corporis nostrum illo et.', '', 'active', NULL, '2019-07-11 00:00:00', 33, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(99, 'Aut eum qui repudiandae dolores officia impedit.', 'aut-eum-qui-repudiandae-dolores-officia-impedit', 'Eum explicabo ut aut consequatur et. Et hic quidem dolorem adipisci laborum cupiditate. Quam aliquid iusto saepe fugit necessitatibus. Quis doloremque quia perferendis.', '', 'active', NULL, '2019-07-11 00:00:00', 37, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(100, 'Expedita dolore qui maiores possimus possimus et.', 'expedita-dolore-qui-maiores-possimus-possimus-et', 'Qui facere aut quae qui mollitia. Fugit sed est ad porro sunt. Reiciendis vitae natus tempora quis.', '', 'active', NULL, '2019-07-11 00:00:00', 92, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(101, 'Consectetur adipisci et voluptates odio optio in.', 'consectetur-adipisci-et-voluptates-odio-optio-in', 'Dicta fugiat quasi molestias. Quia laboriosam rem tempore eum aperiam est. Aliquam aut voluptatibus autem consequatur ducimus.', '', 'active', NULL, '2019-07-11 00:00:00', 139, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(102, 'Nihil hic deserunt officia quos iure ut est.', 'nihil-hic-deserunt-officia-quos-iure-ut-est', 'Dignissimos placeat non suscipit possimus dolor aliquid. Perspiciatis veritatis est in fugiat.', '', 'active', NULL, '2019-07-11 00:00:00', 45, '2019-08-14 09:11:38', '2019-08-14 09:11:38'),
	(103, 'Vitae non voluptatem dolor in.', 'vitae-non-voluptatem-dolor-in', 'Sed et aperiam veritatis ut consequuntur et. Optio veritatis molestiae rerum quo. Et voluptatibus cumque consectetur. Molestiae rerum impedit dolores exercitationem.', '', 'active', NULL, '2019-07-11 00:00:00', 185, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(104, 'Quae aut consequatur tempora est fuga.', 'quae-aut-consequatur-tempora-est-fuga', 'Cum excepturi voluptas provident ab assumenda cumque. Laborum voluptatem voluptatem qui sapiente odit. Magnam quia voluptas mollitia et dolor.', '', 'active', NULL, '2019-07-11 00:00:00', 14, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(105, 'Placeat eaque eligendi odio asperiores sed quisqua', 'placeat-eaque-eligendi-odio-asperiores-sed-quisqua', 'Quibusdam pariatur odit recusandae natus harum. Pariatur odit quia sit quidem. Sit quidem architecto consequuntur ut.', '', 'active', NULL, '2019-07-11 00:00:00', 129, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(106, 'Ut iusto rem repudiandae.', 'ut-iusto-rem-repudiandae', 'Possimus est ut excepturi hic labore. Delectus sint molestiae dicta atque quos quam tenetur. Tempora est fugiat vel eum quos sunt.', '', 'active', NULL, '2019-07-11 00:00:00', 163, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(107, 'Aut animi ex dolores est.', 'aut-animi-ex-dolores-est', 'Excepturi eius voluptates saepe qui in modi suscipit. Harum minus qui quidem et sed dolor fugit. Qui ut eius tempore cupiditate sint debitis voluptatem nisi.', '', 'active', NULL, '2019-07-11 00:00:00', 53, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(108, 'Qui veritatis voluptatum sint quam distinctio.', 'qui-veritatis-voluptatum-sint-quam-distinctio', 'Dolorem deserunt beatae ullam inventore. Error ut possimus qui quia. Numquam qui exercitationem alias nulla occaecati quidem accusamus quo.', '', 'active', NULL, '2019-07-11 00:00:00', 108, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(109, 'Est dolores placeat consectetur iste.', 'est-dolores-placeat-consectetur-iste', 'Non ea molestias magni ullam. Nobis ipsam qui ullam dicta in veritatis sit. Dignissimos neque doloremque enim quasi aut. Sed eum asperiores molestiae qui.', '', 'active', NULL, '2019-07-11 00:00:00', 11, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(110, 'A dolorem fugiat rerum laudantium in rerum volupta', 'a-dolorem-fugiat-rerum-laudantium-in-rerum-volupta', 'Dolore consequatur voluptatem amet occaecati. Ut id quas ullam corporis tenetur velit. Itaque perferendis non sed. Aspernatur veniam quidem ullam in suscipit et.', '', 'active', NULL, '2019-07-11 00:00:00', 75, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(111, 'Laboriosam repudiandae fugiat quia ut ipsam.', 'laboriosam-repudiandae-fugiat-quia-ut-ipsam', 'Sit itaque itaque dolor rerum eligendi. Temporibus et iure cumque doloribus ipsum ex. Id tempore et et fugiat.', '', 'active', NULL, '2019-07-11 00:00:00', 56, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(112, 'Dolores corrupti facere animi quidem sunt repudian', 'dolores-corrupti-facere-animi-quidem-sunt-repudian', 'Beatae soluta unde temporibus dolorum adipisci nisi modi eligendi. Ut minima assumenda commodi natus dolorum omnis iste.', '', 'active', NULL, '2019-07-11 00:00:00', 99, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(113, 'Sit libero est expedita repellat culpa dolorem.', 'sit-libero-est-expedita-repellat-culpa-dolorem', 'Aspernatur deserunt sapiente sunt quaerat voluptate qui nam. Provident qui impedit qui quisquam dignissimos. Qui consectetur quasi incidunt nihil modi sed.', '', 'active', NULL, '2019-07-11 00:00:00', 164, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(114, 'Aut culpa dicta non id numquam ea architecto.', 'aut-culpa-dicta-non-id-numquam-ea-architecto', 'Qui qui neque deserunt non in. Et hic omnis est ea dolor dolor. Voluptatum ut dicta dignissimos esse libero. Voluptatem quia explicabo distinctio.', '', 'active', NULL, '2019-07-11 00:00:00', 70, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(115, 'Magnam voluptate expedita ut veniam molestias est ', 'magnam-voluptate-expedita-ut-veniam-molestias-est-', 'Consectetur ipsam optio omnis dolorem vero eum et. Doloremque aut fugiat aliquid aspernatur et beatae magnam porro. Dignissimos vel quae sit. Error ut enim quas ex. Provident natus natus ratione.', '', 'active', NULL, '2019-07-11 00:00:00', 194, '2019-08-14 09:11:39', '2019-08-14 09:11:39'),
	(116, 'Ipsum quia magni voluptatibus ipsam necessitatibus', 'ipsum-quia-magni-voluptatibus-ipsam-necessitatibus', 'Unde aut aperiam qui at sit eum repudiandae. Eum ut et consequatur. Tempora neque fugiat nesciunt aut. Odit magnam eaque aliquid aliquam maiores quo deleniti facere.', '', 'active', NULL, '2019-07-11 00:00:00', 59, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(117, 'Animi est sed et voluptas enim et.', 'animi-est-sed-et-voluptas-enim-et', 'Tempora quibusdam labore eum numquam molestias. Id dolorem unde occaecati possimus. Sint quia itaque ea architecto sunt pariatur eligendi.', '', 'active', NULL, '2019-07-11 00:00:00', 107, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(118, 'Ipsum odio est qui omnis adipisci debitis.', 'ipsum-odio-est-qui-omnis-adipisci-debitis', 'Et laborum nemo aliquam et et fugit impedit. Repudiandae eum sed animi. Ut iure molestias recusandae neque error molestias nulla. Quod fugit perspiciatis distinctio labore.', '', 'active', NULL, '2019-07-11 00:00:00', 191, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(119, 'In debitis fuga quis fugit sed.', 'in-debitis-fuga-quis-fugit-sed', 'Fugit nisi autem qui et eaque sapiente deserunt et. Atque sint ipsum sequi. Ullam fugit aliquid sunt corrupti culpa laborum aut. Est quia sed animi repudiandae ullam voluptatem eos.', '', 'active', NULL, '2019-07-11 00:00:00', 176, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(120, 'Odit ipsum ex laborum fugiat provident eveniet.', 'odit-ipsum-ex-laborum-fugiat-provident-eveniet', 'Fugit ut deserunt officia neque id hic tenetur quia. Numquam hic cumque sed omnis. Consequatur dolore facere repellendus optio omnis expedita aut.', '', 'active', NULL, '2019-07-11 00:00:00', 47, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(121, 'Iste quibusdam totam illo magni aut.', 'iste-quibusdam-totam-illo-magni-aut', 'Voluptatum ea culpa esse omnis cupiditate. Est laborum repudiandae est ipsa quo. Cupiditate pariatur ipsa repudiandae maxime at perspiciatis sint.', '', 'active', NULL, '2019-07-11 00:00:00', 19, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(122, 'Aut aut minima dolor nisi ut et et.', 'aut-aut-minima-dolor-nisi-ut-et-et', 'Ullam eum aut ut quae molestiae error. In itaque architecto officiis laboriosam. Dignissimos accusamus tempora maxime ullam temporibus nesciunt voluptatibus.', '', 'active', NULL, '2019-07-11 00:00:00', 187, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(123, 'Esse eos inventore iure aut molestiae minus repudi', 'esse-eos-inventore-iure-aut-molestiae-minus-repudi', 'Possimus sed dolore est nisi et quaerat ab illum. Saepe molestias vel magni perferendis omnis. Est autem rerum eligendi non quia sequi qui nesciunt.', '', 'active', NULL, '2019-07-11 00:00:00', 180, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(124, 'Veritatis voluptas odit doloremque modi laboriosam', 'veritatis-voluptas-odit-doloremque-modi-laboriosam', 'Tenetur quidem blanditiis quam ab minima earum consequuntur. Modi aliquid consequatur assumenda maiores.', '', 'active', NULL, '2019-07-11 00:00:00', 167, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(125, 'Qui asperiores cupiditate dolore dolores doloribus', 'qui-asperiores-cupiditate-dolore-dolores-doloribus', 'Autem omnis exercitationem excepturi. Consequatur explicabo quod dolores dolor molestiae ab. Eos repellat vitae autem in. Deleniti sed omnis vel debitis sint ad.', '', 'active', NULL, '2019-07-11 00:00:00', 106, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(126, 'Est harum fugiat veritatis maxime aut perferendis ', 'est-harum-fugiat-veritatis-maxime-aut-perferendis-', 'Illo accusantium aut quo alias laboriosam dolor et. Consequatur itaque dolorem minus. Excepturi repellat pariatur animi id est. Amet sed similique tempore.', '', 'active', NULL, '2019-07-11 00:00:00', 82, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(127, 'Ipsum voluptas cumque maxime enim.', 'ipsum-voluptas-cumque-maxime-enim', 'Est aut debitis aut accusantium ut et. Qui rem commodi doloribus aut voluptatibus quo quo. Laboriosam sed magni officiis quasi.', '', 'active', NULL, '2019-07-11 00:00:00', 203, '2019-08-14 09:11:40', '2019-08-14 09:11:40'),
	(128, 'Assumenda labore sint est nobis blanditiis volupta', 'assumenda-labore-sint-est-nobis-blanditiis-volupta', 'Aliquam quia inventore ut dicta officia. Et aperiam eum tempora molestias est deleniti eos. Ut voluptatem dolor hic et.', '', 'active', NULL, '2019-07-11 00:00:00', 18, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(129, 'Dolorem qui reprehenderit magnam inventore qui.', 'dolorem-qui-reprehenderit-magnam-inventore-qui', 'Magnam in aut nihil architecto alias nisi. Placeat sint ullam sit dolorum. Et voluptatem sed sequi libero ullam et. Et ut minus a pariatur voluptatem a sapiente.', '', 'active', NULL, '2019-07-11 00:00:00', 205, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(130, 'Cum et dolorem accusamus ratione id.', 'cum-et-dolorem-accusamus-ratione-id', 'Eum consequuntur fugiat eligendi. Ea ullam et ab quasi tenetur minima. Animi qui sapiente at quis.', '', 'active', NULL, '2019-07-11 00:00:00', 36, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(131, 'Omnis iusto nemo neque ea voluptatem rem et.', 'omnis-iusto-nemo-neque-ea-voluptatem-rem-et', 'Iste omnis labore eius id cum qui est nam. Qui sit dicta ex voluptatem sit minima architecto. Atque earum sapiente quod quaerat laborum eos. Autem aliquam qui consequuntur ducimus explicabo.', '', 'active', NULL, '2019-07-11 00:00:00', 50, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(132, 'Et mollitia dicta voluptatem minus molestiae omnis', 'et-mollitia-dicta-voluptatem-minus-molestiae-omnis', 'Illum in eum omnis ab aut sed rerum. Incidunt ex consequuntur dolorum autem laudantium deleniti quae placeat. Id nihil soluta similique qui non.', '', 'active', NULL, '2019-07-11 00:00:00', 96, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(133, 'Temporibus aut doloremque eligendi amet eveniet co', 'temporibus-aut-doloremque-eligendi-amet-eveniet-co', 'Inventore explicabo aut voluptatem excepturi beatae ea. Quae repellendus quia et officia est. Cumque aut laboriosam error ut. Doloribus expedita voluptatum aspernatur eius neque rerum modi modi.', '', 'active', NULL, '2019-07-11 00:00:00', 213, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(134, 'Quia tempore et dolore voluptas.', 'quia-tempore-et-dolore-voluptas', 'Exercitationem laborum aut natus dolores fuga alias. Animi necessitatibus id rerum molestias hic sint qui ipsum. Sint perferendis reprehenderit non sit.', '', 'active', NULL, '2019-07-11 00:00:00', 215, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(135, 'Est sapiente ipsa adipisci et ab quibusdam accusan', 'est-sapiente-ipsa-adipisci-et-ab-quibusdam-accusan', 'Delectus maxime et praesentium corrupti. Reprehenderit dolor repellat non fugit eum ea dolores occaecati. Id fugiat provident velit ut.', '', 'active', NULL, '2019-07-11 00:00:00', 127, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(136, 'Libero voluptates iste rerum eaque itaque.', 'libero-voluptates-iste-rerum-eaque-itaque', 'Quia asperiores voluptatem aut ipsum. Quis qui sed autem sed sed. Aperiam repellendus ipsa unde vero.', '', 'active', NULL, '2019-07-11 00:00:00', 132, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(137, 'Esse consequatur eos nulla.', 'esse-consequatur-eos-nulla', 'Asperiores non iusto tempora quidem amet. Sit sit accusamus culpa quo eius enim. Provident sit dolore dolorem rerum voluptates.', '', 'active', NULL, '2019-07-11 00:00:00', 43, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(138, 'Molestiae optio nihil deserunt in at.', 'molestiae-optio-nihil-deserunt-in-at', 'Ut aperiam dicta excepturi ex dolorem. Quibusdam quia nulla tempore autem non ullam molestias. Corporis laboriosam aut numquam rerum omnis. Minus ut voluptate sunt quaerat.', '', 'active', NULL, '2019-07-11 00:00:00', 61, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(139, 'Nemo possimus libero eius corrupti sapiente quia v', 'nemo-possimus-libero-eius-corrupti-sapiente-quia-v', 'Asperiores quis quia pariatur. Consequatur deserunt esse et. Omnis voluptas sint nesciunt qui vero. Ipsam porro sint voluptatibus quia quo enim deserunt. Enim fugiat soluta quidem omnis nemo.', '', 'active', NULL, '2019-07-11 00:00:00', 96, '2019-08-14 09:11:41', '2019-08-14 09:11:41'),
	(140, 'Vel quisquam omnis veritatis veritatis.', 'vel-quisquam-omnis-veritatis-veritatis', 'Omnis omnis autem numquam voluptatum et dolor. Voluptatibus unde aliquam repellat non animi. Qui libero earum velit sint nemo qui earum. Eos doloremque possimus amet molestiae.', '', 'active', NULL, '2019-07-11 00:00:00', 100, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(141, 'Ut dolore inventore quam cupiditate quo inventore ', 'ut-dolore-inventore-quam-cupiditate-quo-inventore-', 'Rerum quibusdam rerum ut saepe. Sapiente doloribus et impedit et sunt. Quis sequi quos in adipisci tempore. Adipisci dolores et occaecati numquam distinctio consequatur cupiditate reiciendis.', '', 'active', NULL, '2019-07-11 00:00:00', 171, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(142, 'Odio molestias ea qui fugit vero.', 'odio-molestias-ea-qui-fugit-vero', 'Ea rerum a ut eum et maiores libero. Ducimus voluptatibus voluptas est.', '', 'active', NULL, '2019-07-11 00:00:00', 19, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(143, 'Nobis veniam quibusdam velit omnis nihil.', 'nobis-veniam-quibusdam-velit-omnis-nihil', 'Aut dolorem sit culpa minima impedit rerum aut vitae. Est tenetur reiciendis facere magnam omnis cumque ut. Consequatur aut at delectus itaque ut. Vel facilis ut error.', '', 'active', NULL, '2019-07-11 00:00:00', 59, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(144, 'Voluptatibus ex velit quia cumque.', 'voluptatibus-ex-velit-quia-cumque', 'Qui molestiae optio et. Rem quas libero amet molestias. Dolorem nisi qui aut repellendus veniam suscipit hic maiores.', '', 'active', NULL, '2019-07-11 00:00:00', 157, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(145, 'Et et error repellendus earum.', 'et-et-error-repellendus-earum', 'Enim laborum omnis consequatur dolores commodi natus id deleniti. Alias laborum et tempora dolore. Ut et qui minus laudantium qui asperiores fugiat sint.', '', 'active', NULL, '2019-07-11 00:00:00', 142, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(146, 'Cupiditate officiis nihil quis error dolorum ut.', 'cupiditate-officiis-nihil-quis-error-dolorum-ut', 'Reiciendis libero inventore eaque saepe. Exercitationem architecto error sed accusantium maiores. Et incidunt nesciunt id cupiditate assumenda at. Voluptatum quisquam hic ipsam.', '', 'active', NULL, '2019-07-11 00:00:00', 98, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(147, 'Odio ab vitae explicabo minus velit.', 'odio-ab-vitae-explicabo-minus-velit', 'Ut vero unde animi. Vero iste sit dolores amet. Voluptatem quae laboriosam modi consequatur excepturi consequuntur.', '', 'active', NULL, '2019-07-11 00:00:00', 143, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(148, 'Et qui commodi et tempore pariatur.', 'et-qui-commodi-et-tempore-pariatur', 'Omnis ducimus et maxime sunt sapiente sint et. Quis ut omnis rerum officia voluptatem fugit. Et sint blanditiis voluptates in tenetur et et.', '', 'active', NULL, '2019-07-11 00:00:00', 85, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(149, 'Aliquam ab et ducimus in quia eos deserunt.', 'aliquam-ab-et-ducimus-in-quia-eos-deserunt', 'Qui odit accusamus delectus laborum maxime. Rerum ea eius molestias quasi. Eos quae magni et accusantium eum nulla quia tempora.', '', 'active', NULL, '2019-07-11 00:00:00', 87, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(150, 'Error nihil aut suscipit omnis nisi.', 'error-nihil-aut-suscipit-omnis-nisi', 'Reiciendis officia iusto laboriosam omnis optio voluptatem. Molestiae repellat ad consequatur ratione nostrum aspernatur et maxime. Ratione sint hic eum. Iste modi eum quasi ut voluptatibus.', '', 'active', NULL, '2019-07-11 00:00:00', 70, '2019-08-14 09:11:42', '2019-08-14 09:11:42'),
	(151, 'In dolorem minus voluptatem velit voluptas.', 'in-dolorem-minus-voluptatem-velit-voluptas', 'Praesentium dolorem quia porro ut non. Officia saepe voluptatem et nam sunt molestiae. Quas incidunt ab minus commodi expedita.', '', 'active', NULL, '2019-07-11 00:00:00', 213, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(152, 'In unde vel consequatur veritatis.', 'in-unde-vel-consequatur-veritatis', 'Ducimus vel cumque quo voluptatem molestiae et. Velit deserunt ducimus nulla ut asperiores qui. Aut rerum id ducimus magni eos. Numquam odio sed quis necessitatibus illo est ut voluptatum.', '', 'active', NULL, '2019-07-11 00:00:00', 166, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(153, 'Aut rerum id distinctio.', 'aut-rerum-id-distinctio', 'Perferendis qui omnis velit sed. Odio accusamus eum rerum nihil qui nulla.', '', 'active', NULL, '2019-07-11 00:00:00', 211, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(154, 'Officia recusandae ea maiores repudiandae voluptat', 'officia-recusandae-ea-maiores-repudiandae-voluptat', 'Totam nesciunt a qui. Quas voluptas earum et nihil ullam. Pariatur nihil nesciunt velit dolorum.', '', 'active', NULL, '2019-07-11 00:00:00', 117, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(155, 'At quia voluptatum odio eos sed non.', 'at-quia-voluptatum-odio-eos-sed-non', 'Aliquid corporis eaque ut ab quas. Est error sint facere optio necessitatibus et. Voluptate nihil at cum provident dolore. Ipsam non animi minus reiciendis ea labore.', '', 'active', NULL, '2019-07-11 00:00:00', 177, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(156, 'Sequi iure perspiciatis quos perferendis.', 'sequi-iure-perspiciatis-quos-perferendis', 'Consequatur est vero cupiditate quo. Natus perferendis sit et nesciunt rerum aut beatae et. Sapiente ipsum nemo labore et non accusantium illo.', '', 'active', NULL, '2019-07-11 00:00:00', 81, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(157, 'Ex ut rerum voluptatem inventore autem eveniet con', 'ex-ut-rerum-voluptatem-inventore-autem-eveniet-con', 'Et qui corrupti numquam sunt necessitatibus vitae. Sapiente consequatur quasi corrupti corrupti itaque reiciendis. Minus doloremque dolor sed voluptas voluptatem repellat voluptatem.', '', 'active', NULL, '2019-07-11 00:00:00', 37, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(158, 'Aut voluptatum saepe hic quia similique vero.', 'aut-voluptatum-saepe-hic-quia-similique-vero', 'Eos dolores aut voluptatem et aut libero. Dignissimos non inventore voluptatibus rerum. Eveniet illum qui velit. Nihil corporis sit eum consequatur sunt quia ea.', '', 'active', NULL, '2019-07-11 00:00:00', 45, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(159, 'Perspiciatis et blanditiis recusandae.', 'perspiciatis-et-blanditiis-recusandae', 'Et tenetur tempore esse laudantium quasi possimus sit eius. Ipsa pariatur sit tempore molestiae. Eos autem nesciunt est.', '', 'active', NULL, '2019-07-11 00:00:00', 210, '2019-08-14 09:11:43', '2019-08-14 09:11:43'),
	(160, 'Soluta molestiae ex ut aliquam inventore earum per', 'soluta-molestiae-ex-ut-aliquam-inventore-earum-per', 'Vitae animi in quo aspernatur pariatur eligendi corrupti praesentium. Nisi ipsam ratione ut dolor dicta. Dicta magni error soluta nihil labore.', '', 'active', NULL, '2019-07-11 00:00:00', 124, '2019-08-14 09:12:08', '2019-08-14 09:12:08'),
	(161, 'Laudantium qui id in sit dolorum ut.', 'laudantium-qui-id-in-sit-dolorum-ut', 'At nam sequi quas quibusdam. Ipsum vel nulla voluptate suscipit pariatur.', '', 'active', NULL, '2019-07-11 00:00:00', 61, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(162, 'Reprehenderit ducimus perspiciatis fugit amet.', 'reprehenderit-ducimus-perspiciatis-fugit-amet', 'Dolorum et reprehenderit consequuntur. Nam sed voluptatem excepturi corrupti ut sequi accusamus. Occaecati explicabo unde at quisquam. Rerum est voluptatem omnis quam libero quasi et.', '', 'active', NULL, '2019-07-11 00:00:00', 189, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(163, 'Itaque voluptas ut odit quia in.', 'itaque-voluptas-ut-odit-quia-in', 'Enim maxime et et accusantium similique. Sint dolores iste praesentium. Dignissimos aut iusto et id aut dolor aperiam. Eius in temporibus et suscipit quaerat sit.', '', 'active', NULL, '2019-07-11 00:00:00', 189, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(164, 'Labore ipsam voluptatem quam provident id.', 'labore-ipsam-voluptatem-quam-provident-id', 'Quae iusto dignissimos blanditiis voluptatum. Esse dolorum suscipit consequatur alias minus et adipisci. Delectus vel dolor hic ullam recusandae. Doloremque beatae eos eveniet rerum eum.', '', 'active', NULL, '2019-07-11 00:00:00', 31, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(165, 'Impedit maxime numquam incidunt praesentium non sa', 'impedit-maxime-numquam-incidunt-praesentium-non-sa', 'Sit eaque amet numquam animi repellendus. Quasi magni consectetur ullam voluptas. Excepturi vel magni fugiat neque. Reprehenderit placeat nihil dolores aut explicabo.', '', 'active', NULL, '2019-07-11 00:00:00', 194, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(166, 'Est labore voluptatum voluptate qui.', 'est-labore-voluptatum-voluptate-qui', 'Repellat deserunt necessitatibus reprehenderit rerum repellat. Illo in occaecati quia dignissimos autem itaque. Hic adipisci qui rem et asperiores aut sequi.', '', 'active', NULL, '2019-07-11 00:00:00', 56, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(167, 'Ut tenetur culpa rerum rerum repudiandae ut provid', 'ut-tenetur-culpa-rerum-rerum-repudiandae-ut-provid', 'Nihil omnis voluptates et ratione. Corrupti in recusandae odio fuga. Quis qui alias blanditiis recusandae. Et omnis temporibus aut dolor itaque eligendi aut quia.', '', 'active', NULL, '2019-07-11 00:00:00', 213, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(168, 'Vero et assumenda consequatur necessitatibus.', 'vero-et-assumenda-consequatur-necessitatibus', 'Atque voluptas unde ut quaerat accusamus maiores aut ea. Nihil fugit et et illum quia animi qui. Velit minima perferendis fugit.', '', 'active', NULL, '2019-07-11 00:00:00', 211, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(169, 'Sint nihil amet quidem a est.', 'sint-nihil-amet-quidem-a-est', 'Molestiae blanditiis ut quia quo deserunt omnis reiciendis. Voluptas aliquam reprehenderit iste. Sapiente labore voluptatum inventore praesentium numquam vitae fugiat. Minima sunt sunt nihil.', '', 'active', NULL, '2019-07-11 00:00:00', 21, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(170, 'Doloribus voluptatem eos quasi optio necessitatibu', 'doloribus-voluptatem-eos-quasi-optio-necessitatibu', 'Soluta et earum vero ea aliquid non. Aut fuga aut praesentium est molestiae consequatur. Nemo dolor eligendi eaque ratione at unde nesciunt quia.', '', 'active', NULL, '2019-07-11 00:00:00', 65, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(171, 'Dolores laboriosam dicta esse nulla.', 'dolores-laboriosam-dicta-esse-nulla', 'Beatae et corrupti aliquid libero aperiam consequatur. Itaque fuga sed sed incidunt repudiandae laudantium. Consequuntur iste maiores quidem modi pariatur sit. Eos aliquam aliquid corporis totam.', '', 'active', NULL, '2019-07-11 00:00:00', 157, '2019-08-14 09:12:09', '2019-08-14 09:12:09'),
	(172, 'Adipisci ipsam aspernatur sint distinctio.', 'adipisci-ipsam-aspernatur-sint-distinctio', 'Incidunt autem facere laboriosam eos. Aut odio eveniet consequuntur consequatur. Unde et molestiae eos saepe corrupti tempora.', '', 'active', NULL, '2019-07-11 00:00:00', 80, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(173, 'Voluptatem qui odit maxime est.', 'voluptatem-qui-odit-maxime-est', 'Debitis similique aut totam aperiam adipisci sed doloribus dolore. Doloremque sit sit iusto consequatur. Rerum aliquam sed et tempore est blanditiis voluptas.', '', 'active', NULL, '2019-07-11 00:00:00', 130, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(174, 'Qui laudantium assumenda dolorem impedit nemo.', 'qui-laudantium-assumenda-dolorem-impedit-nemo', 'Labore temporibus voluptatem qui eum saepe. Autem assumenda laudantium amet et non est ut. Dolorum repudiandae dolor delectus nihil.', '', 'active', NULL, '2019-07-11 00:00:00', 156, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(175, 'Exercitationem ratione repudiandae consequatur rer', 'exercitationem-ratione-repudiandae-consequatur-rer', 'Ex doloremque nostrum dolores doloremque sint. Adipisci voluptatem debitis reiciendis aut molestiae ut tempora nostrum. Hic ut alias repellat et. Et nihil iure et dolor.', '', 'active', NULL, '2019-07-11 00:00:00', 107, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(176, 'Officia quia ratione modi vel accusantium.', 'officia-quia-ratione-modi-vel-accusantium', 'Illum aut veniam eum officiis deserunt aut vel doloribus. In inventore asperiores doloremque laudantium laborum enim. Et nemo provident dolorum placeat enim. Quidem totam facere ut sed.', '', 'active', NULL, '2019-07-11 00:00:00', 69, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(177, 'Eius asperiores nisi dolor.', 'eius-asperiores-nisi-dolor', 'Occaecati provident at labore corporis quod. Occaecati porro adipisci iusto repellat veniam nostrum ex tempora. Aut et alias et alias ratione. Expedita alias nulla earum aut inventore beatae tempora.', '', 'active', NULL, '2019-07-11 00:00:00', 201, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(178, 'Omnis voluptatum aut aut voluptatem ab illo.', 'omnis-voluptatum-aut-aut-voluptatem-ab-illo', 'Ut minima eveniet aut dolor quos officiis. Consequuntur eveniet molestiae autem itaque. Rerum fuga voluptatem enim. Aspernatur vitae ut laudantium dolore beatae sint nostrum nihil.', '', 'active', NULL, '2019-07-11 00:00:00', 182, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(179, 'Dolores maxime et at modi sint commodi ullam.', 'dolores-maxime-et-at-modi-sint-commodi-ullam', 'Excepturi aliquam beatae sit facere iusto quos. In eum error voluptas. Placeat aut saepe laudantium tempore iste suscipit. Aut dolorum voluptatem quam quos veritatis repellendus iusto aut.', '', 'active', NULL, '2019-07-11 00:00:00', 215, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(180, 'Omnis dolorum minima ut voluptate qui quidem aut.', 'omnis-dolorum-minima-ut-voluptate-qui-quidem-aut', 'Facilis molestias accusantium asperiores aperiam reprehenderit recusandae non. Quis quasi et facilis soluta voluptas.', '', 'active', NULL, '2019-07-11 00:00:00', 180, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(181, 'Consectetur unde non iure aut quidem.', 'consectetur-unde-non-iure-aut-quidem', 'Officia dolorem inventore recusandae. Et sed assumenda voluptate sapiente et. Vel labore quia suscipit voluptatem aut. Temporibus aut sint et magni.', '', 'active', NULL, '2019-07-11 00:00:00', 17, '2019-08-14 09:12:10', '2019-08-14 09:12:10'),
	(182, 'Laboriosam ratione dicta ea eveniet dolores fugit ', 'laboriosam-ratione-dicta-ea-eveniet-dolores-fugit-', 'Magnam amet in enim ut eos. Et quo illo dicta ex corrupti assumenda esse. Veniam aut ut aut rerum voluptatum nisi molestiae.', '', 'active', NULL, '2019-07-11 00:00:00', 185, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(183, 'Distinctio beatae enim et illum.', 'distinctio-beatae-enim-et-illum', 'Maiores consectetur magnam ipsa debitis nesciunt. Sed pariatur odit mollitia veritatis inventore. Aliquid inventore vitae tempore ea rerum deserunt.', '', 'active', NULL, '2019-07-11 00:00:00', 178, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(184, 'Iure consequuntur aut consequatur occaecati.', 'iure-consequuntur-aut-consequatur-occaecati', 'Ratione eum aut doloribus repellendus doloribus. Quam mollitia ad ratione architecto. Repudiandae neque atque officia. Nostrum perspiciatis nostrum aspernatur expedita.', '', 'active', NULL, '2019-07-11 00:00:00', 121, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(185, 'Voluptas autem laudantium molestiae inventore.', 'voluptas-autem-laudantium-molestiae-inventore', 'Vero fuga fuga magnam. Voluptatem aspernatur unde tempora facere. Mollitia recusandae corrupti nulla quo culpa. Laudantium quia asperiores cupiditate iusto occaecati voluptas totam itaque.', '', 'active', NULL, '2019-07-11 00:00:00', 65, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(186, 'Aut ab aut veniam.', 'aut-ab-aut-veniam', 'Autem voluptatem quaerat ab quasi labore. Vel et expedita corporis dolorum laudantium. Tempore quia aut nostrum reiciendis nemo ea.', '', 'active', NULL, '2019-07-11 00:00:00', 8, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(187, 'Est neque enim quia tempore aspernatur quia.', 'est-neque-enim-quia-tempore-aspernatur-quia', 'Doloribus deleniti nihil delectus hic. Incidunt explicabo quia ea placeat. Quia ut porro voluptatem quae. Et sit qui aut sit suscipit ut.', '', 'active', NULL, '2019-07-11 00:00:00', 165, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(188, 'Amet aspernatur repellendus et nemo ad.', 'amet-aspernatur-repellendus-et-nemo-ad', 'Mollitia saepe aperiam sit qui ullam. Est voluptas sequi modi rerum deserunt odit quia. Veniam quia ipsa optio perspiciatis nemo molestiae expedita.', '', 'active', NULL, '2019-07-11 00:00:00', 189, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(189, 'Odio quo molestiae sunt quia in earum dolor illo.', 'odio-quo-molestiae-sunt-quia-in-earum-dolor-illo', 'Aut aut eius assumenda odit quia. Cumque nostrum voluptatem voluptatem earum consectetur unde ratione adipisci.', '', 'active', NULL, '2019-07-11 00:00:00', 184, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(190, 'Perferendis veritatis vel voluptas qui.', 'perferendis-veritatis-vel-voluptas-qui', 'Possimus ea magni maiores necessitatibus qui. Incidunt aliquam id cumque id architecto eaque. Saepe recusandae esse autem odit.', '', 'active', NULL, '2019-07-11 00:00:00', 91, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(191, 'Omnis laboriosam enim quae et sunt.', 'omnis-laboriosam-enim-quae-et-sunt', 'Quasi dolores omnis in optio id. Sed quo aliquid tenetur temporibus. Corporis eligendi unde ullam voluptatem deleniti repellat quas ea.', '', 'active', NULL, '2019-07-11 00:00:00', 115, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(192, 'Nam culpa libero vitae velit commodi eveniet.', 'nam-culpa-libero-vitae-velit-commodi-eveniet', 'Autem modi vitae ut optio aut quam. Autem in nostrum blanditiis quam aut sit. Omnis est accusamus minus sequi est dicta quas.', '', 'active', NULL, '2019-07-11 00:00:00', 33, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(193, 'Aliquam cumque veniam enim aliquam aperiam cum fug', 'aliquam-cumque-veniam-enim-aliquam-aperiam-cum-fug', 'Repellat sunt quidem cupiditate ratione ducimus. Sit eveniet nemo facilis consequuntur enim. Et et sit suscipit modi unde minima.', '', 'active', NULL, '2019-07-11 00:00:00', 112, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(194, 'Provident aut voluptatem unde et doloribus quidem ', 'provident-aut-voluptatem-unde-et-doloribus-quidem-', 'Exercitationem commodi enim unde sed consequatur praesentium est nobis. Consequatur aut aperiam nemo et. Quae molestiae sunt pariatur nesciunt magni.', '', 'active', NULL, '2019-07-11 00:00:00', 48, '2019-08-14 09:12:11', '2019-08-14 09:12:11'),
	(195, 'Id voluptatem nisi ratione quas.', 'id-voluptatem-nisi-ratione-quas', 'Et ex temporibus officiis perferendis. Blanditiis optio eaque qui nam mollitia aliquid. Rem aut autem laboriosam unde enim omnis. Sed nam est nostrum nisi doloribus quia et.', '', 'active', NULL, '2019-07-11 00:00:00', 122, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(196, 'Qui laboriosam debitis nostrum quisquam est aut.', 'qui-laboriosam-debitis-nostrum-quisquam-est-aut', 'Et ad totam quia quas. Architecto molestiae minus illum nemo sed. Voluptatem enim esse animi laborum magnam ea vitae.', '', 'active', NULL, '2019-07-11 00:00:00', 132, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(197, 'Voluptas voluptas provident voluptatem incidunt qu', 'voluptas-voluptas-provident-voluptatem-incidunt-qu', 'Aut ex aliquid dolorum fugit repellat. Est rerum natus odio omnis. Laborum et quo molestiae incidunt perferendis voluptas.', '', 'active', NULL, '2019-07-11 00:00:00', 92, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(198, 'Consequuntur nemo doloremque incidunt aliquam faci', 'consequuntur-nemo-doloremque-incidunt-aliquam-faci', 'Dolores dolor blanditiis sapiente dolorem veritatis quod et. Minima atque eius distinctio ipsa. Repellat debitis qui illo debitis quod veritatis aut voluptatem.', '', 'active', NULL, '2019-07-11 00:00:00', 204, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(199, 'Ut cupiditate non enim et.', 'ut-cupiditate-non-enim-et', 'Voluptatem iusto molestias atque enim libero ullam doloribus. Occaecati esse est aut. Dolores non repudiandae laudantium qui.', '', 'active', NULL, '2019-07-11 00:00:00', 100, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(200, 'Assumenda expedita ab sunt mollitia voluptatum fug', 'assumenda-expedita-ab-sunt-mollitia-voluptatum-fug', 'Sit maiores voluptate et laudantium quasi deleniti. Odit explicabo et rem sed. Quia ad autem voluptatibus amet. Dignissimos asperiores et dolore tempora facilis.', '', 'active', NULL, '2019-07-11 00:00:00', 22, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(201, 'Voluptatem quaerat dolorem ex eius eaque corporis.', 'voluptatem-quaerat-dolorem-ex-eius-eaque-corporis', 'Suscipit natus qui autem alias qui totam modi. Enim sit id quam nemo vel est. Et provident sint ea qui et nulla.', '', 'active', NULL, '2019-07-11 00:00:00', 181, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(202, 'Iusto doloribus vero voluptatem ea quisquam cumque', 'iusto-doloribus-vero-voluptatem-ea-quisquam-cumque', 'Suscipit sequi veniam ipsum totam. Consectetur animi eum provident repellat dolor hic. Sit ab aut sit aperiam iusto dolorem.', '', 'active', NULL, '2019-07-11 00:00:00', 195, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(203, 'Minus aliquid dicta maxime quis id quo et.', 'minus-aliquid-dicta-maxime-quis-id-quo-et', 'Eveniet accusamus occaecati ducimus at et totam sint id. Consectetur dolor harum enim ducimus ipsum libero officia itaque. Voluptatibus vel unde rerum ut eum.', '', 'active', NULL, '2019-07-11 00:00:00', 26, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(204, 'Quibusdam veniam alias praesentium possimus quis.', 'quibusdam-veniam-alias-praesentium-possimus-quis', 'Rerum vel nulla dolor facilis. Ut eligendi ut sunt deleniti rerum consectetur ut consectetur.', '', 'active', NULL, '2019-07-11 00:00:00', 145, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(205, 'Mollitia voluptates consequatur quam voluptatibus ', 'mollitia-voluptates-consequatur-quam-voluptatibus-', 'Recusandae voluptas quo quia cum ad id. Velit occaecati delectus vero consectetur. Incidunt est vel ex exercitationem sint autem dolores. Hic odit officiis tenetur architecto.', '', 'active', NULL, '2019-07-11 00:00:00', 119, '2019-08-14 09:12:12', '2019-08-14 09:12:12'),
	(206, 'Iure id sed asperiores voluptatem quia voluptas.', 'iure-id-sed-asperiores-voluptatem-quia-voluptas', 'Cumque nihil dicta eaque porro laudantium illo cum. Nihil quasi et eos. Facere odio nihil fugit ipsam et.', '', 'active', NULL, '2019-07-11 00:00:00', 31, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(207, 'Soluta qui et dolor et ea.', 'soluta-qui-et-dolor-et-ea', 'Odio ratione ducimus accusamus voluptas rerum ea nobis. Voluptate in minima officiis optio. Dicta fuga architecto aut suscipit. Beatae quibusdam aliquam quia quam.', '', 'active', NULL, '2019-07-11 00:00:00', 72, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(208, 'Unde explicabo omnis aut sed ut est maiores.', 'unde-explicabo-omnis-aut-sed-ut-est-maiores', 'Sit in ea aliquid ipsam ducimus atque. Natus corrupti blanditiis odit et reiciendis eveniet illum consequuntur. Vero nihil laboriosam ab. Voluptatibus voluptatem aliquid eos illo.', '', 'active', NULL, '2019-07-11 00:00:00', 158, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(209, 'Est et sapiente nobis placeat corrupti ex quis et.', 'est-et-sapiente-nobis-placeat-corrupti-ex-quis-et', 'Aut quos est et deserunt accusamus quisquam ex. Ipsum velit quis et veniam totam eum. Repellendus eligendi officia natus vero blanditiis quos. Nesciunt dignissimos veniam et doloremque suscipit.', '', 'active', NULL, '2019-07-11 00:00:00', 187, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(210, 'Assumenda voluptatum similique vel nam enim.', 'assumenda-voluptatum-similique-vel-nam-enim', 'Fuga eveniet ducimus consectetur voluptatem voluptatem sunt provident. Maiores quo odio dolorem non neque soluta maiores. Autem eius totam qui sunt.', '', 'active', NULL, '2019-07-11 00:00:00', 88, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(211, 'Quasi doloribus magni qui esse laborum et.', 'quasi-doloribus-magni-qui-esse-laborum-et', 'Vero et aspernatur culpa assumenda vitae ullam alias. Sapiente animi velit ab nihil error quia sunt sed. Ut dolorum sint vel fuga. Sed natus dolor qui reiciendis quos et dolor.', '', 'active', NULL, '2019-07-11 00:00:00', 51, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(212, 'Nemo a corrupti vel.', 'nemo-a-corrupti-vel', 'Aliquid qui id officia. Aut ut soluta ea aut fugiat sed quia. Est eius voluptatem et quia labore debitis. Natus perferendis eaque ipsum dignissimos repellendus sequi quia.', '', 'active', NULL, '2019-07-11 00:00:00', 53, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(213, 'Necessitatibus sint qui et eligendi autem pariatur', 'necessitatibus-sint-qui-et-eligendi-autem-pariatur', 'Impedit voluptates et quae et voluptatem sint. Beatae quas quas dolore ipsa esse saepe voluptas. Sed assumenda in illo iste et magni. Excepturi quis eum dolorem eius perferendis.', '', 'active', NULL, '2019-07-11 00:00:00', 176, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(214, 'Magni aut quo et inventore.', 'magni-aut-quo-et-inventore', 'Provident cum voluptas et illum. Earum placeat ea eaque. Voluptatem veritatis quae ut ullam. Omnis in totam facere debitis nihil.', '', 'active', NULL, '2019-07-11 00:00:00', 19, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(215, 'Soluta est est aut architecto.', 'soluta-est-est-aut-architecto', 'Perspiciatis laudantium a ut nemo. Explicabo enim sint illum et. Optio corporis maxime et quia aut et. Consequatur quae debitis nobis autem quo nobis hic magni.', '', 'active', NULL, '2019-07-11 00:00:00', 173, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(216, 'Tempore omnis natus ipsum consequatur et sunt.', 'tempore-omnis-natus-ipsum-consequatur-et-sunt', 'Maxime nostrum eos fugit cum. Repellat vel libero iure officiis est asperiores. Vel iste eum odio amet quos sit.', '', 'active', NULL, '2019-07-11 00:00:00', 105, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(217, 'Enim possimus sed perspiciatis doloremque odio ass', 'enim-possimus-sed-perspiciatis-doloremque-odio-ass', 'In voluptates blanditiis est dolore reprehenderit fuga. Nam et aut est. Vero quia libero nisi nihil veritatis ullam quia.', '', 'active', NULL, '2019-07-11 00:00:00', 91, '2019-08-14 09:12:13', '2019-08-14 09:12:13'),
	(218, 'Necessitatibus dolorum voluptatum rerum voluptates', 'necessitatibus-dolorum-voluptatum-rerum-voluptates', 'Quis ullam harum qui rem quae sed est. Et adipisci quidem quo molestiae voluptatem.', '', 'active', NULL, '2019-07-11 00:00:00', 87, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(219, 'Et ut nam voluptas autem.', 'et-ut-nam-voluptas-autem', 'Neque fugiat voluptas cumque. Officiis sit commodi fuga ducimus neque. Maiores sint rerum quibusdam dolore ipsum. Culpa sint qui quidem.', '', 'active', NULL, '2019-07-11 00:00:00', 129, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(220, 'Odio fugiat qui aperiam numquam suscipit possimus.', 'odio-fugiat-qui-aperiam-numquam-suscipit-possimus', 'Mollitia eligendi dolor perspiciatis dicta adipisci et sed illum. Et sunt qui assumenda laboriosam et. Repellat sed nesciunt placeat corporis odio.', '', 'active', NULL, '2019-07-11 00:00:00', 211, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(221, 'Qui consequatur maiores qui autem voluptas unde ex', 'qui-consequatur-maiores-qui-autem-voluptas-unde-ex', 'Veritatis autem voluptatum dolorem quia cum rem consectetur. Quasi facilis vel iste qui.', '', 'active', NULL, '2019-07-11 00:00:00', 171, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(222, 'Culpa et architecto nisi qui voluptates.', 'culpa-et-architecto-nisi-qui-voluptates', 'Est voluptatem doloremque quae autem soluta est. Doloremque iste sed et voluptas enim quia aut.', '', 'active', NULL, '2019-07-11 00:00:00', 194, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(223, 'Tempore est et labore ea rerum autem.', 'tempore-est-et-labore-ea-rerum-autem', 'Quo voluptate aut quisquam quasi ut doloribus. Deserunt dolor voluptatum numquam minus illum. Ut non nesciunt non voluptas.', '', 'active', NULL, '2019-07-11 00:00:00', 63, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(224, 'Aspernatur voluptatem illum ut quibusdam nostrum l', 'aspernatur-voluptatem-illum-ut-quibusdam-nostrum-l', 'Et error ipsam error doloribus quam deleniti. Necessitatibus laudantium ipsum ipsum eius. Ea fuga alias odio quia unde. Excepturi et maiores et eum reprehenderit.', '', 'active', NULL, '2019-07-11 00:00:00', 21, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(225, 'Aut voluptatem possimus ut.', 'aut-voluptatem-possimus-ut', 'Quis rem esse assumenda sed. Laboriosam incidunt exercitationem praesentium omnis. Hic eum nihil voluptas mollitia at dolor.', '', 'active', NULL, '2019-07-11 00:00:00', 34, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(226, 'Quas non necessitatibus possimus in itaque.', 'quas-non-necessitatibus-possimus-in-itaque', 'Et vero ratione quia repellendus et. Aliquam ut in aut. Dolorem pariatur qui voluptatem consequatur. Dolorem porro est odio aut.', '', 'active', NULL, '2019-07-11 00:00:00', 44, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(227, 'Id veniam autem tempore dolores et.', 'id-veniam-autem-tempore-dolores-et', 'Error architecto soluta omnis doloremque quod ut non quia. Ut sit dolore laboriosam maiores iure aut doloribus. At nulla nihil rerum sapiente. Eum hic rerum voluptates in in.', '', 'active', NULL, '2019-07-11 00:00:00', 106, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(228, 'Assumenda culpa sed sed officia et tenetur.', 'assumenda-culpa-sed-sed-officia-et-tenetur', 'Omnis cupiditate voluptatem voluptas rerum illum. Reprehenderit fuga et consectetur. Quis voluptatibus alias velit magni delectus. Laborum cupiditate est non quia pariatur voluptatem.', '', 'active', NULL, '2019-07-11 00:00:00', 8, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(229, 'Quidem excepturi ab qui voluptatibus optio qui.', 'quidem-excepturi-ab-qui-voluptatibus-optio-qui', 'Voluptas autem et rerum tempore. Voluptas qui ut ipsum excepturi dolores et mollitia. Officia fuga ex a. Accusamus culpa aliquam iste.', '', 'active', NULL, '2019-07-11 00:00:00', 46, '2019-08-14 09:12:14', '2019-08-14 09:12:14'),
	(230, 'Voluptatibus perspiciatis aut exercitationem omnis', 'voluptatibus-perspiciatis-aut-exercitationem-omnis', 'Necessitatibus voluptatem vel itaque omnis quod. Deserunt natus perspiciatis saepe et quos explicabo. Et quia voluptatum voluptatibus vel tempore sed quo.', '', 'active', NULL, '2019-07-11 00:00:00', 182, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(231, 'Et sit possimus facere dolorum.', 'et-sit-possimus-facere-dolorum', 'Voluptatibus sint expedita debitis iste omnis aperiam non. Illum aut aut ut commodi voluptatem. Doloribus ducimus quod aut nulla.', '', 'active', NULL, '2019-07-11 00:00:00', 66, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(232, 'Atque ab odit dolores ut alias minima hic voluptas', 'atque-ab-odit-dolores-ut-alias-minima-hic-voluptas', 'Culpa error quia iste similique enim eius. Reiciendis qui officia doloremque distinctio. Officia itaque velit rerum dolores est voluptatem explicabo et.', '', 'active', NULL, '2019-07-11 00:00:00', 20, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(233, 'Quos architecto mollitia et minima sint ut cumque ', 'quos-architecto-mollitia-et-minima-sint-ut-cumque-', 'Voluptate tenetur doloribus voluptatem cupiditate voluptates et id autem. Illum illo tempore est. Et nihil similique illum et nihil.', '', 'active', NULL, '2019-07-11 00:00:00', 122, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(234, 'Assumenda neque quam dignissimos aut eligendi quis', 'assumenda-neque-quam-dignissimos-aut-eligendi-quis', 'Dolorem dolore in laborum et quaerat. Omnis unde commodi necessitatibus iure dicta odit odio. Vitae blanditiis voluptates voluptatem aut animi alias sunt voluptas. Dolore quod at fuga ipsam.', '', 'active', NULL, '2019-07-11 00:00:00', 160, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(235, 'Quo soluta omnis illo illum modi totam.', 'quo-soluta-omnis-illo-illum-modi-totam', 'Quia sapiente quod quo perspiciatis et minus ab sit. Eos aut sapiente qui consequatur. Aut nostrum iusto aut. Cupiditate nisi tenetur vitae molestiae dolor qui et omnis.', '', 'active', NULL, '2019-07-11 00:00:00', 25, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(236, 'Ut non esse fugiat assumenda et aut.', 'ut-non-esse-fugiat-assumenda-et-aut', 'Quo sint sapiente sapiente placeat. Exercitationem quia est modi. Blanditiis nisi voluptates aperiam pariatur quia eum.', '', 'active', NULL, '2019-07-11 00:00:00', 168, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(237, 'Nihil esse quos nulla in.', 'nihil-esse-quos-nulla-in', 'Delectus vitae qui cumque tempora rerum. Voluptatem eaque numquam vero itaque. Qui sit qui et iusto. Nobis quia labore placeat et inventore.', '', 'active', NULL, '2019-07-11 00:00:00', 178, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(238, 'Quis beatae aliquid velit quaerat accusantium aut.', 'quis-beatae-aliquid-velit-quaerat-accusantium-aut', 'Recusandae amet impedit facere molestias veniam adipisci aut. Debitis odio reiciendis eveniet omnis. Eos placeat porro sit enim. Accusantium recusandae nisi mollitia placeat.', '', 'active', NULL, '2019-07-11 00:00:00', 157, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(239, 'Minima omnis quas dolorem fuga qui earum.', 'minima-omnis-quas-dolorem-fuga-qui-earum', 'Labore nam error nemo inventore aliquid. Porro tenetur debitis vel. Esse ipsam eveniet amet fugiat vitae dolorem eius. Accusamus occaecati voluptatem asperiores et.', '', 'active', NULL, '2019-07-11 00:00:00', 148, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(240, 'Eveniet similique alias corporis possimus consequu', 'eveniet-similique-alias-corporis-possimus-consequu', 'Consequatur et aut beatae qui et sunt nisi. Sint quis provident minus inventore. Vel perspiciatis commodi ut harum quasi commodi.', '', 'active', NULL, '2019-07-11 00:00:00', 67, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(241, 'Ea aspernatur amet unde.', 'ea-aspernatur-amet-unde', 'Veritatis est non voluptatibus voluptatem molestiae laudantium. Delectus placeat optio voluptatum nobis itaque.', '', 'active', NULL, '2019-07-11 00:00:00', 198, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(242, 'Blanditiis suscipit vel veritatis consequuntur vel', 'blanditiis-suscipit-vel-veritatis-consequuntur-vel', 'Ullam iure similique quaerat id accusamus. Quod non tempore omnis architecto.', '', 'active', NULL, '2019-07-11 00:00:00', 106, '2019-08-14 09:12:15', '2019-08-14 09:12:15'),
	(243, 'Voluptas consectetur qui doloremque ut laborum sun', 'voluptas-consectetur-qui-doloremque-ut-laborum-sun', 'Ullam ut qui excepturi maxime. Tenetur officia tempore ut consectetur. Quos quasi explicabo omnis labore qui doloremque.', '', 'active', NULL, '2019-07-11 00:00:00', 141, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(244, 'Natus autem et fugit ullam explicabo ut.', 'natus-autem-et-fugit-ullam-explicabo-ut', 'Et voluptas molestiae accusantium alias vel. Similique eius placeat vitae itaque eos. Eius voluptatum itaque error sint qui.', '', 'active', NULL, '2019-07-11 00:00:00', 122, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(245, 'Quia et iure blanditiis at sit velit ut eos.', 'quia-et-iure-blanditiis-at-sit-velit-ut-eos', 'Ipsam nemo dolorem fugiat aspernatur. Sunt ea cum corporis provident ut. Sed doloremque error debitis sit dolor nesciunt.', '', 'active', NULL, '2019-07-11 00:00:00', 102, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(246, 'Deserunt dignissimos aliquid culpa a velit eveniet', 'deserunt-dignissimos-aliquid-culpa-a-velit-eveniet', 'Ipsa eum beatae ducimus ipsam officia consequatur. Et quam inventore rerum dolores. Hic aperiam veniam occaecati nobis.', '', 'active', NULL, '2019-07-11 00:00:00', 133, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(247, 'Mollitia odio ullam facere ullam voluptas ut place', 'mollitia-odio-ullam-facere-ullam-voluptas-ut-place', 'Ea quia et modi blanditiis et facilis ipsa. Maiores optio et ad officia voluptas quia. Reiciendis aperiam saepe ab deserunt. Et veritatis quae aut unde.', '', 'active', NULL, '2019-07-11 00:00:00', 79, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(248, 'Molestiae et provident iure.', 'molestiae-et-provident-iure', 'Quia non necessitatibus quod provident omnis perspiciatis eos. Error ut nesciunt nihil earum odit quis. Quisquam illo expedita quis sed saepe incidunt iste.', '', 'active', NULL, '2019-07-11 00:00:00', 87, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(249, 'Hic voluptates inventore corrupti repellendus sed ', 'hic-voluptates-inventore-corrupti-repellendus-sed-', 'Assumenda perferendis et eos. Et est et rerum earum voluptatem. Delectus libero eum cum id qui dolorem minus non. Ad cupiditate iure inventore sunt aut fugiat.', '', 'active', NULL, '2019-07-11 00:00:00', 66, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(250, 'Fugiat id dolorem maxime consequatur vel sed.', 'fugiat-id-dolorem-maxime-consequatur-vel-sed', 'Esse quaerat amet aut pariatur. Et rem quam sed explicabo aut enim recusandae. Distinctio nihil officiis et aut. Rerum ex qui natus itaque vel.', '', 'active', NULL, '2019-07-11 00:00:00', 93, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(251, 'Dolorum autem beatae commodi consequatur ut repudi', 'dolorum-autem-beatae-commodi-consequatur-ut-repudi', 'Quam velit cumque nobis modi distinctio sunt minus. Officia quia rerum voluptatibus quis. Quia esse neque aspernatur.', '', 'active', NULL, '2019-07-11 00:00:00', 147, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(252, 'Voluptate error magni reprehenderit vero.', 'voluptate-error-magni-reprehenderit-vero', 'Aspernatur rerum necessitatibus minima enim quae veritatis veritatis. Iste labore aspernatur velit est. Fugiat officiis eveniet officiis dolor et.', '', 'active', NULL, '2019-07-11 00:00:00', 165, '2019-08-14 09:12:16', '2019-08-14 09:12:16'),
	(253, 'Et accusamus sint aut non incidunt deserunt aut.', 'et-accusamus-sint-aut-non-incidunt-deserunt-aut', 'Sit eveniet debitis in inventore vel deleniti et. Commodi culpa quia labore ad rerum qui. Eaque laudantium expedita labore voluptatem sint consequatur qui.', '', 'active', NULL, '2019-07-11 00:00:00', 12, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(254, 'Aut repudiandae quidem neque rerum quia.', 'aut-repudiandae-quidem-neque-rerum-quia', 'Eos unde id occaecati neque illo dolor id vel. Repellendus ex natus sunt et odio aspernatur voluptatem. Quia blanditiis alias impedit a quasi maxime.', '', 'active', NULL, '2019-07-11 00:00:00', 35, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(255, 'Magnam consequatur unde omnis cumque libero quisqu', 'magnam-consequatur-unde-omnis-cumque-libero-quisqu', 'Eum dolore molestias fugiat aut praesentium quas. Non alias corporis libero dolorem. Dolor qui consequuntur tempore maiores iusto iure rem.', '', 'active', NULL, '2019-07-11 00:00:00', 166, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(256, 'Nisi porro eum dolores id accusantium consequatur ', 'nisi-porro-eum-dolores-id-accusantium-consequatur-', 'Officiis sed dolores at qui aut necessitatibus at. Et aut nam hic eius natus provident. Est eum velit incidunt itaque cum odit suscipit.', '', 'active', NULL, '2019-07-11 00:00:00', 83, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(257, 'Eos voluptate tempore ad voluptatum.', 'eos-voluptate-tempore-ad-voluptatum', 'Eos exercitationem consequuntur iste quia excepturi ducimus assumenda. Error assumenda adipisci enim repellendus. Minus eius beatae ipsa omnis.', '', 'active', NULL, '2019-07-11 00:00:00', 169, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(258, 'Est sit voluptates blanditiis cum.', 'est-sit-voluptates-blanditiis-cum', 'Temporibus veniam qui ipsa consequuntur et. Voluptates saepe ea necessitatibus voluptatem amet illo. Sapiente quibusdam ex et. Animi quis omnis aut aliquam.', '', 'active', NULL, '2019-07-11 00:00:00', 114, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(259, 'Dolorem provident in aut molestiae.', 'dolorem-provident-in-aut-molestiae', 'Molestiae eos earum beatae similique incidunt nesciunt. Molestiae nesciunt cum commodi qui sed. In corrupti aut voluptatem reiciendis.', '', 'active', NULL, '2019-07-11 00:00:00', 94, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(260, 'Qui possimus veniam corporis nulla adipisci quo et', 'qui-possimus-veniam-corporis-nulla-adipisci-quo-et', 'Blanditiis minus aut occaecati eius excepturi ratione. Harum deserunt autem eos. Ipsam laborum consequatur eaque. Nesciunt consequuntur qui aut iste tempore. Sint et autem corrupti nemo.', '', 'active', NULL, '2019-07-11 00:00:00', 10, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(261, 'Non deleniti ea minus dolor.', 'non-deleniti-ea-minus-dolor', 'Illum expedita ad maxime officia. Aut consectetur voluptatem sit architecto.', '', 'active', NULL, '2019-07-11 00:00:00', 204, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(262, 'Aut cupiditate eos magni molestiae.', 'aut-cupiditate-eos-magni-molestiae', 'Eos qui consequatur explicabo cum placeat. Velit cumque excepturi consectetur perspiciatis nobis. Alias aliquam dolores ab sint sit non aliquam.', '', 'active', NULL, '2019-07-11 00:00:00', 175, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(263, 'Sed tenetur iure nesciunt quae aut.', 'sed-tenetur-iure-nesciunt-quae-aut', 'Inventore vel sequi dolores esse sed autem. Voluptates error deleniti cum accusamus aspernatur. Ab et perspiciatis et quam possimus ut.', '', 'active', NULL, '2019-07-11 00:00:00', 183, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(264, 'At qui saepe similique nisi illo nesciunt impedit.', 'at-qui-saepe-similique-nisi-illo-nesciunt-impedit', 'Aliquid molestias commodi at consequuntur adipisci vel vel. Adipisci magnam eligendi totam dignissimos a. Consequatur placeat error non rerum numquam sit.', '', 'active', NULL, '2019-07-11 00:00:00', 87, '2019-08-14 09:12:17', '2019-08-14 09:12:17'),
	(265, 'Aut blanditiis nostrum eos architecto veniam.', 'aut-blanditiis-nostrum-eos-architecto-veniam', 'Qui rerum fugit consequatur dicta ratione. Omnis amet alias laudantium totam aut quaerat et. Vitae adipisci quas dignissimos id eaque qui voluptatibus odio. Aut est a sunt quis.', '', 'active', NULL, '2019-07-11 00:00:00', 47, '2019-08-14 09:12:18', '2019-08-14 09:12:18'),
	(266, 'Rem amet quis facilis voluptatibus vero qui.', 'rem-amet-quis-facilis-voluptatibus-vero-qui', 'Quos in ad sunt quia voluptatem laudantium rerum. Voluptates commodi nesciunt libero qui et quia illum. Autem dolores molestias ipsa omnis tenetur. Tenetur aliquam eos enim nemo.', '', 'active', NULL, '2019-07-11 00:00:00', 63, '2019-08-14 09:12:18', '2019-08-14 09:12:18'),
	(267, 'Voluptatibus ut eos culpa quis error rerum saepe n', 'voluptatibus-ut-eos-culpa-quis-error-rerum-saepe-n', 'Laboriosam deleniti impedit deserunt sit atque error sunt expedita. Dolores ut ut necessitatibus animi. Tempora illum autem maxime harum hic praesentium natus.', '', 'active', NULL, '2019-07-11 00:00:00', 215, '2019-08-14 09:12:18', '2019-08-14 09:12:18'),
	(268, 'Libero et eaque consequuntur fugiat beatae consequ', 'libero-et-eaque-consequuntur-fugiat-beatae-consequ', 'Odit ducimus sequi sed similique. Minus velit nisi exercitationem autem. Optio deserunt saepe mollitia. Commodi tenetur sunt eum quia quo in.', '', 'active', NULL, '2019-07-11 00:00:00', 92, '2019-08-14 09:12:18', '2019-08-14 09:12:18'),
	(269, 'Sed perspiciatis delectus non laborum velit natus ', 'sed-perspiciatis-delectus-non-laborum-velit-natus-', 'Dolores sed voluptatem qui veniam quia ut perferendis. Labore nostrum quod nam recusandae delectus deserunt id. Necessitatibus velit molestiae ad labore.', '', 'active', NULL, '2019-07-11 00:00:00', 55, '2019-08-14 09:12:18', '2019-08-14 09:12:18'),
	(270, 'My New challenge', 'my-new-challenge', 'This is a new challenge', 'challenges/1A0Y4hVsgn1tuqECY4jkBRulcZ7CBNJJvsvO2soJ.jpeg', 'active', 0, NULL, 15, '2019-08-14 09:58:07', '2019-08-14 09:58:07');
/*!40000 ALTER TABLE `challenges` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_campaigns
CREATE TABLE IF NOT EXISTS `eureka_campaigns` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `campaign` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_campaigns: ~3 rows (approximately)
/*!40000 ALTER TABLE `eureka_campaigns` DISABLE KEYS */;
INSERT INTO `eureka_campaigns` (`id`, `campaign`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Hyderabad', '', 0, NULL, NULL),
	(2, 'Delhi', '', 0, NULL, NULL),
	(3, 'digital lab', '-1', 9, '2019-08-02 03:01:58', '2019-08-02 03:01:58');
/*!40000 ALTER TABLE `eureka_campaigns` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_comments
CREATE TABLE IF NOT EXISTS `eureka_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `body` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_comments` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_contributors
CREATE TABLE IF NOT EXISTS `eureka_contributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` datetime NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `branch_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_contributors: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_contributors` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_contributors` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_contributors_friends
CREATE TABLE IF NOT EXISTS `eureka_contributors_friends` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL,
  `requested_date` datetime NOT NULL,
  `accepted_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_contributors_friends: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_contributors_friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_contributors_friends` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_contributor_campaign
CREATE TABLE IF NOT EXISTS `eureka_contributor_campaign` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_contributor_campaign: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_contributor_campaign` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_contributor_campaign` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_countries
CREATE TABLE IF NOT EXISTS `eureka_countries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_countries: ~2 rows (approximately)
/*!40000 ALTER TABLE `eureka_countries` DISABLE KEYS */;
INSERT INTO `eureka_countries` (`id`, `title`, `short_code`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'Malaysia', 'MY', '2019-08-02 04:10:16', '2019-08-02 00:00:00', 'active'),
	(2, 'Singapore', 'SG', '2019-08-02 04:00:00', '2019-08-02 00:00:00', 'active');
/*!40000 ALTER TABLE `eureka_countries` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_likable_like
CREATE TABLE IF NOT EXISTS `eureka_likable_like` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `likable_id` varchar(36) NOT NULL,
  `likable_type` varchar(150) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_likable_like: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_likable_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_likable_like` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_lkabale_counters
CREATE TABLE IF NOT EXISTS `eureka_lkabale_counters` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `likable_id` varchar(36) NOT NULL,
  `likable_type` varchar(150) NOT NULL,
  `count` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_lkabale_counters: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_lkabale_counters` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_lkabale_counters` ENABLE KEYS */;

-- Dumping structure for table euraka-my.eureka_notifications
CREATE TABLE IF NOT EXISTS `eureka_notifications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `notifiable` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `read_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table euraka-my.eureka_notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `eureka_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `eureka_notifications` ENABLE KEYS */;

-- Dumping structure for table euraka-my.followables
CREATE TABLE IF NOT EXISTS `followables` (
  `user_id` bigint(20) unsigned NOT NULL,
  `followable_id` int(10) unsigned NOT NULL,
  `followable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'follow' COMMENT 'follow/like/subscribe/favorite/upvote/downvote',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `followables_user_id_foreign` (`user_id`),
  KEY `followables_followable_type_index` (`followable_type`),
  CONSTRAINT `followables_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.followables: ~0 rows (approximately)
/*!40000 ALTER TABLE `followables` DISABLE KEYS */;
INSERT INTO `followables` (`user_id`, `followable_id`, `followable_type`, `relation`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(15, 49, 'App\\Challenge', 'like', NULL, '2019-08-16 02:40:03', NULL),
	(15, 44, 'App\\Challenge', 'like', NULL, '2019-08-16 03:07:48', NULL),
	(15, 54, 'App\\Challenge', 'like', NULL, '2019-08-16 03:07:57', NULL),
	(15, 19, 'App\\Challenge', 'like', NULL, '2019-08-16 03:08:43', NULL);
/*!40000 ALTER TABLE `followables` ENABLE KEYS */;

-- Dumping structure for table euraka-my.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_07_31_071748_create_categories_table', 2),
	(4, '2019_08_04_034520_add_reputation_field_on_user_table', 3),
	(5, '2018_06_29_032244_create_laravel_follow_tables', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table euraka-my.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table euraka-my.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table euraka-my.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table euraka-my.reputations
CREATE TABLE IF NOT EXISTS `reputations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` mediumint(9) NOT NULL DEFAULT '0',
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payee_id` int(10) unsigned DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.reputations: ~0 rows (approximately)
/*!40000 ALTER TABLE `reputations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reputations` ENABLE KEYS */;

-- Dumping structure for table euraka-my.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', NULL, NULL, NULL),
	(2, 'user', 'User', NULL, NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table euraka-my.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.role_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
	(2, 1),
	(11, 1),
	(1, 2),
	(7, 2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table euraka-my.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reputation` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table euraka-my.users: ~210 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `slug`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `reputation`, `created_at`, `updated_at`) VALUES
	(1, 'sairam', 'sei', 'gounisairam@gmail.com', NULL, NULL, '$2y$10$KZlrMQ6ss0mHHqgiQbHq5.NHwG74kHT/3uxl/a2Ej9xOAt2nMkeEy', NULL, 0, '2019-07-31 04:50:18', '2019-07-31 04:50:18'),
	(2, 'Admin', 'jack', 'jack@jack.com', NULL, NULL, '$2y$10$hr/TxkNKbKgvELi5A7mehebgjt7W/e02fSUSDx/rZymcPzj/xv2GS', NULL, 0, '2019-07-31 10:36:57', '2019-07-31 10:36:57'),
	(7, 'Benny', 'benny', 'benny@gmail.com', NULL, NULL, '$2y$10$krMMY3oKXwdfpX7fuUr50OotF3cB6D.dxeF2Y2TfO8L.6Gcz.XKha', NULL, 0, '2019-08-01 16:02:01', '2019-08-01 16:02:01'),
	(8, 'sairam', 'sairam', 'sairam.gouni@teledirectgroup.com', NULL, NULL, '$2y$10$RfppNE0w7VtOa4Ar4s1kbObwzvj6OShplTh7qRjhfEH60bL5Ho2eO', NULL, 0, '2019-08-01 23:48:22', '2019-08-01 23:48:22'),
	(10, 'sairam', 'sairam-2', 'contact@milon.im', NULL, NULL, '$2y$10$4D3c8K/gVKYsQXdqkiP4Iu2ZcWrUaPTDFZzYlmPJCHcRDA0veL3H.', NULL, 0, '2019-08-02 00:37:09', '2019-08-02 00:37:09'),
	(11, 'sairam', 'sairam-3', 'jack@gmail.com', 'users/09DkEfUtV8PobgrWtZ2NH9Wd3Dg28e2nUELdZzyh.png', NULL, '$2y$10$nCLknFR6I9rutxHrY1D1weJa.Hrcr5YC3fUTejVOn1kxSFkpl9Lbq', NULL, 0, '2019-08-02 00:38:07', '2019-08-02 00:38:08'),
	(12, 'gautham', 'gautham', 'gautham@gmail.com', NULL, NULL, '$2y$10$cP4Mj4mSrDHxXZZ0GVdzO.yV6LDYbfR2pA2rFK5a2oeCjwgv.APo2', NULL, 0, '2019-08-02 04:51:22', '2019-08-02 04:51:22'),
	(13, 'raj', 'raj', 'raj@gmail.com', NULL, NULL, '$2y$10$0f9ba1OxduE3GxtRGYXnoONCPKQuxkFr/pyNm60/Xdf///1wMkvxS', NULL, 0, '2019-08-04 14:17:58', '2019-08-04 14:17:58'),
	(14, 'sairams', 'sairams', 'gounisairams@gmail.com', NULL, NULL, '$2y$10$m8AEj/aoKA0h7fCBmWFrle8wQ5SO7GL5CA12h6bJ4bV23KzKuseZO', NULL, 0, '2019-08-05 05:32:41', '2019-08-05 05:32:41'),
	(15, 'Jarvis', 'jarvis', 'user@user.com', NULL, NULL, '$2y$10$aiyph5ND3n1GBE6bT0UJmeT59yutxGQLaA7HTcCjuRQ.Q892Ym82i', NULL, 0, '2019-08-11 11:45:51', '2019-08-11 11:45:51'),
	(16, 'Ms. Estrella Streich', 'ms-estrella-streich', 'salvador99@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '878Lu4ZPev', 0, '2019-08-14 08:01:48', '2019-08-14 08:01:48'),
	(17, 'Mrs. Leann Stark', 'mrs-leann-stark', 'tillman.hagenes@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OTwjH3Aqcn', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(18, 'Terrill Feeney', 'terrill-feeney', 'ugerlach@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ooMSYuwN37', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(19, 'Juliana Spinka', 'juliana-spinka', 'jeffery27@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '84OFtdqKJZ', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(20, 'Dale Ferry DVM', 'dale-ferry-dvm', 'dejah85@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gUrNGJOcYN', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(21, 'Emmett Witting', 'emmett-witting', 'yreynolds@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0EXKcf2bF2', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(22, 'Lulu Doyle', 'lulu-doyle', 'sabryna.grant@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'X0ydv1T1JR', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(23, 'Donato Hamill DVM', 'donato-hamill-dvm', 'hrau@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VtYvHLp5AZ', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(24, 'Jeromy Connelly', 'jeromy-connelly', 'wilhelmine.wiza@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UmhbysoiE3', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(25, 'Lonnie Wolff', 'lonnie-wolff', 'mack.jakubowski@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'c4BeKWRBSg', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(26, 'Dedrick Fahey', 'dedrick-fahey', 'dicki.barton@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iwV7mqQK97', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(27, 'Miss Treva Corwin V', 'miss-treva-corwin-v', 'skiles.mossie@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tECzU5z0Ew', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(28, 'Rodrigo Mueller', 'rodrigo-mueller', 'precious.rodriguez@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lfjwURe04A', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(29, 'Demarco Schuppe', 'demarco-schuppe', 'janice.gleason@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '35GRqbFR40', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(30, 'Euna Schultz', 'euna-schultz', 'dicki.rollin@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Yot8SRPDVL', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(31, 'Phoebe Welch', 'phoebe-welch', 'sadams@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WDERFVV7pO', 0, '2019-08-14 08:01:49', '2019-08-14 08:01:49'),
	(32, 'Edmund Pfannerstill V', 'edmund-pfannerstill-v', 'lrowe@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kTAFc7FLgp', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(33, 'Clarabelle Reichel', 'clarabelle-reichel', 'arthur71@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8M9cDGBAgo', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(34, 'Theresa Grady', 'theresa-grady', 'icormier@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tuheL8nQfS', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(35, 'Wanda Ferry DVM', 'wanda-ferry-dvm', 'tillman.gabe@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VHCSgxAmkI', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(36, 'Lewis Greenfelder', 'lewis-greenfelder', 'weber.kaelyn@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RQn8gMpptZ', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(37, 'Brionna Schultz MD', 'brionna-schultz-md', 'jordi27@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oE7PlxK41r', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(38, 'Mr. Samir Eichmann', 'mr-samir-eichmann', 'florencio.hills@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5gx8E5uyrW', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(39, 'Mara Stiedemann', 'mara-stiedemann', 'claudie.marks@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wLCQmI4YO7', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(40, 'Abdul Wiegand', 'abdul-wiegand', 'kpacocha@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FgEVX75JC4', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(41, 'Ms. Dessie Feil', 'ms-dessie-feil', 'tyshawn.block@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aIB1B7hWXc', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(42, 'Macie Hagenes', 'macie-hagenes', 'qrolfson@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dn6ws4gsnw', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(43, 'Ms. Ona Paucek', 'ms-ona-paucek', 'casper.keon@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OhxZp96iiA', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(44, 'Dina Schmeler Sr.', 'dina-schmeler-sr', 'noe.medhurst@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7k6htFdAdZ', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(45, 'Erna Dach PhD', 'erna-dach-phd', 'devyn.batz@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FUxoPRHHZ7', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(46, 'Miss Jada D\'Amore', 'miss-jada-damore', 'romaguera.reymundo@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tjxIyV7Fvy', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(47, 'Verna McCullough', 'verna-mccullough', 'garth94@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'X0PGWRrxkD', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(48, 'Prof. Destiney Robel V', 'prof-destiney-robel-v', 'santino.bailey@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MrujCpmktd', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(49, 'Fern Cruickshank', 'fern-cruickshank', 'dameon44@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9DRB8tBbLX', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(50, 'Amira Kautzer', 'amira-kautzer', 'camden77@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cnUiWhzPt6', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(51, 'Mary Hills', 'mary-hills', 'orn.nicolas@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2e8piVjxEN', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(52, 'Rowan Schaefer', 'rowan-schaefer', 'balistreri.kyle@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BopeGSs9rs', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(53, 'Prof. Gianni Sawayn PhD', 'prof-gianni-sawayn-phd', 'jacynthe.farrell@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H6by1DGSnp', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(54, 'Susana Reynolds IV', 'susana-reynolds-iv', 'hans.towne@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dgmxU5NWe1', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(55, 'Boris Hamill', 'boris-hamill', 'tania69@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bznMtUTR1v', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(56, 'Maybelle Russel', 'maybelle-russel', 'javier.buckridge@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ldjjtMi59c', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(57, 'Mona Bernhard', 'mona-bernhard', 'rahsaan58@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bzBz6wWhov', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(58, 'Keith Kris V', 'keith-kris-v', 'lowe.carter@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6MQYlUkSlI', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(59, 'Wyman Stokes', 'wyman-stokes', 'lucile53@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aMRJeX4Pvu', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(60, 'Orval Sanford', 'orval-sanford', 'adriana07@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mI0AwPbUqP', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(61, 'Mariam Kozey', 'mariam-kozey', 'gbins@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'taTQY4td7x', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(62, 'Mrs. Vicky Buckridge', 'mrs-vicky-buckridge', 'geovany.spinka@example.org', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'M9qsAl3hQg', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(63, 'Kailey Lesch DDS', 'kailey-lesch-dds', 'mhagenes@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DDNNFYrMfS', 0, '2019-08-14 08:01:50', '2019-08-14 08:01:50'),
	(64, 'Audie Ratke IV', 'audie-ratke-iv', 'hdare@example.net', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MokJflue0P', 0, '2019-08-14 08:01:51', '2019-08-14 08:01:51'),
	(65, 'Miss Kari Morar Sr.', 'miss-kari-morar-sr', 'jsmitham@example.com', NULL, '2019-08-14 08:01:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dWlPgn7QSw', 0, '2019-08-14 08:01:51', '2019-08-14 08:01:51'),
	(66, 'Tamara Hills', 'tamara-hills', 'jammie.lueilwitz@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'y1rXRktdbq', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(67, 'Dr. Jonathon Mraz DVM', 'dr-jonathon-mraz-dvm', 'flatley.tavares@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8VqPtacmhs', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(68, 'Cierra Fahey IV', 'cierra-fahey-iv', 'cindy78@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'A7kUacnT2Y', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(69, 'Miss Leta Beier', 'miss-leta-beier', 'ehomenick@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LxRxKyw0CX', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(70, 'Mr. Elijah Maggio PhD', 'mr-elijah-maggio-phd', 'darlene.durgan@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5iX4EHb7I4', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(71, 'Rhianna Hegmann', 'rhianna-hegmann', 'gstiedemann@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nOU85RVc3B', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(72, 'Darren Leannon DDS', 'darren-leannon-dds', 'koby.mraz@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sQYiCMvvJT', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(73, 'Conrad Simonis', 'conrad-simonis', 'matt26@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uU16yUzC6o', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(74, 'Shad Kirlin V', 'shad-kirlin-v', 'taurean74@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U0krLmleQC', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(75, 'Eleanore Durgan', 'eleanore-durgan', 'stroman.franco@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VKLllWvBF6', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(76, 'Mrs. Evelyn Kassulke', 'mrs-evelyn-kassulke', 'bergnaum.prince@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aXtSoW1brs', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(77, 'Isaiah Kuhn', 'isaiah-kuhn', 'will.vincenzo@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KNsTXllogQ', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(78, 'Christelle Murazik', 'christelle-murazik', 'reanna84@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'o4cxN12X2i', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(79, 'Michale Altenwerth', 'michale-altenwerth', 'anderson.lacy@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i3pY0WNJzG', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(80, 'Manuel Altenwerth', 'manuel-altenwerth', 'shayna.will@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P58XojFtss', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(81, 'Leopold Lebsack IV', 'leopold-lebsack-iv', 'zemlak.hugh@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iW8zPywdxV', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(82, 'Mr. Triston Tremblay', 'mr-triston-tremblay', 'mcglynn.citlalli@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nbiy5kMWZx', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(83, 'Prof. Rosie Powlowski MD', 'prof-rosie-powlowski-md', 'streich.kenna@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BBIxzezeOR', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(84, 'Miss Carolyn Cronin', 'miss-carolyn-cronin', 'spfeffer@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DctyhXBhW3', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(85, 'Sheila Kuphal', 'sheila-kuphal', 'jaiden.smith@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'l8mWPc6TsM', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(86, 'Delphia Bauch', 'delphia-bauch', 'cassidy.hickle@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cRnGUgj4l7', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(87, 'Alia Halvorson', 'alia-halvorson', 'feeney.morgan@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qMFF2QEA7S', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(88, 'Haylie Hahn MD', 'haylie-hahn-md', 'andrew.kohler@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dn3tYSvI98', 0, '2019-08-14 08:02:09', '2019-08-14 08:02:09'),
	(89, 'Anissa Mayer', 'anissa-mayer', 'jess.stark@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4O1KAyAzik', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(90, 'Laurel Pfannerstill', 'laurel-pfannerstill', 'nleffler@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xwXGiBVWKS', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(91, 'Nedra Stroman', 'nedra-stroman', 'milton97@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SY8f3kS7wj', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(92, 'Fredy Feil', 'fredy-feil', 'hkoelpin@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aDcBiyAfR9', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(93, 'Greg Torp', 'greg-torp', 'roosevelt.langworth@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tSkhGfZIvd', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(94, 'Gracie Crona', 'gracie-crona', 'genoveva.schneider@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '93khzqH1nX', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(95, 'Ethel Cronin', 'ethel-cronin', 'npfannerstill@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hXPQmVFHpW', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(96, 'Joanny Kuhn', 'joanny-kuhn', 'jkihn@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sjQWbgEF7N', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(97, 'Janis Doyle III', 'janis-doyle-iii', 'lavon.dooley@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kKYxiJp7X4', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(98, 'Rosalyn Prosacco I', 'rosalyn-prosacco-i', 'samir39@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BhKae28eIT', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(99, 'Hassie Hackett', 'hassie-hackett', 'ehaag@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5R1B2iTgnQ', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(100, 'Micheal VonRueden', 'micheal-vonrueden', 'vaughn34@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i3Mlsu6uLj', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(101, 'Alva Satterfield', 'alva-satterfield', 'elueilwitz@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lHtmWeApxI', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(102, 'Ms. Mina Schamberger PhD', 'ms-mina-schamberger-phd', 'alessia.nolan@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CceEsXCZNY', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(103, 'Enid Robel III', 'enid-robel-iii', 'morar.lamar@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wf1m6CbMRG', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(104, 'Aleen Wintheiser', 'aleen-wintheiser', 'joesph.bayer@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UnLKMBpwlr', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(105, 'Heidi Fay', 'heidi-fay', 'lrussel@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3JyAtSaYps', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(106, 'Lilla Bradtke', 'lilla-bradtke', 'ayla.mcglynn@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's967Er0X6V', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(107, 'Hortense Bahringer DVM', 'hortense-bahringer-dvm', 'sswift@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dCBQOtkZPh', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(108, 'Judd Ritchie', 'judd-ritchie', 'arunte@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ofgHrwZHJo', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(109, 'Jessika Schneider', 'jessika-schneider', 'kvolkman@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EGD2SVVYJF', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(110, 'Princess Koch', 'princess-koch', 'zane.hermiston@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nSdeLm9nHy', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(111, 'Abbigail Cummings', 'abbigail-cummings', 'madilyn.wuckert@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EazfE6meGo', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(112, 'Prof. Jamel Witting', 'prof-jamel-witting', 'ned88@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xzg5qKFsOX', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(113, 'Jerrold Blick', 'jerrold-blick', 'douglas.petra@example.net', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rSxSwfrHKM', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(114, 'Chaya Lesch', 'chaya-lesch', 'krystina.hintz@example.org', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'j21KxyFPd2', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(115, 'Randall Eichmann', 'randall-eichmann', 'lind.maybelle@example.com', NULL, '2019-08-14 08:02:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'roL9Q98L31', 0, '2019-08-14 08:02:10', '2019-08-14 08:02:10'),
	(116, 'Clemens Eichmann IV', 'clemens-eichmann-iv', 'murray.adolfo@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lvZTDYGNuY', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(117, 'Lyla Langosh', 'lyla-langosh', 'hershel17@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FTjTpMUXzv', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(118, 'Prof. Rhianna Dare Sr.', 'prof-rhianna-dare-sr', 'laurianne84@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jKtwW74KGL', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(119, 'Jannie Gutmann', 'jannie-gutmann', 'ulubowitz@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bpQRDK6RIp', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(120, 'Abner Doyle', 'abner-doyle', 'shanelle74@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ptSJLEya7u', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(121, 'Dr. Felicia Huel Sr.', 'dr-felicia-huel-sr', 'natalie.sauer@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vNcPwU4ULF', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(122, 'Ezra Sporer', 'ezra-sporer', 'ritchie.nelle@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bOBDcqK7Tj', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(123, 'Lily Kassulke', 'lily-kassulke', 'shane.hettinger@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3fbayx8rmi', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(124, 'Stanley Hansen Jr.', 'stanley-hansen-jr', 'noble.kuhic@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uNwJWSTV6M', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(125, 'Albert Mante Jr.', 'albert-mante-jr', 'pagac.thalia@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'beswBW2P2l', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(126, 'Krystina Lueilwitz', 'krystina-lueilwitz', 'cole.nadia@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jMdTqkIqpD', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(127, 'Obie Jast', 'obie-jast', 'uharvey@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yCTkkIagIK', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(128, 'Bert Rippin I', 'bert-rippin-i', 'vhilpert@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'd4SEaMd9yf', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(129, 'Jude Mueller', 'jude-mueller', 'colt33@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8uOcN9mVFl', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(130, 'Erik Hermann', 'erik-hermann', 'jarrett80@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LGAf2GFlo3', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(131, 'Aaron Lueilwitz II', 'aaron-lueilwitz-ii', 'kbashirian@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YoPGgTmp08', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(132, 'Dulce Thompson', 'dulce-thompson', 'bhintz@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UfaDId5XC0', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(133, 'Hubert Brekke', 'hubert-brekke', 'rath.boris@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PwGxGb61V8', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(134, 'Stella Sporer Jr.', 'stella-sporer-jr', 'anderson.lueilwitz@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DH1QniYvMa', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(135, 'Delaney Jacobi', 'delaney-jacobi', 'pasquale.rolfson@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1Pda0OGxlm', 0, '2019-08-14 08:02:45', '2019-08-14 08:02:45'),
	(136, 'Halle Kohler', 'halle-kohler', 'tomasa09@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9peNgeEJgN', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(137, 'Mrs. Coralie Bode DDS', 'mrs-coralie-bode-dds', 'rachael.swaniawski@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vNyyftZhF0', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(138, 'Reva Konopelski', 'reva-konopelski', 'hadley10@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5aq3IWsxuA', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(139, 'Mr. Devin Lehner', 'mr-devin-lehner', 'boris.hilpert@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DSwDjtqB4n', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(140, 'Prof. Mathias Mayer Sr.', 'prof-mathias-mayer-sr', 'mason.hayes@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GO3a29fDuV', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(141, 'Ms. Kaela Langworth', 'ms-kaela-langworth', 'emoen@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'g0NMVLDz0g', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(142, 'Zena Weber', 'zena-weber', 'gdeckow@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vGg2OSaGGO', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(143, 'Mrs. Vivien Stroman', 'mrs-vivien-stroman', 'kobe44@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cGVI6CDVos', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(144, 'Bianka Dach MD', 'bianka-dach-md', 'haley.karolann@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u63FQKtzEG', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(145, 'Mateo Goodwin Sr.', 'mateo-goodwin-sr', 'rzboncak@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'APQlzYgtqZ', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(146, 'Taylor Mayert II', 'taylor-mayert-ii', 'wilma50@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '28GoQ4bIPt', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(147, 'Adah Shields', 'adah-shields', 'haag.alison@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2ZlWYHj7Ql', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(148, 'Dr. Kiel Hackett PhD', 'dr-kiel-hackett-phd', 'ruby19@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eZWZcBHxph', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(149, 'Greg Rolfson', 'greg-rolfson', 'daugherty.adrienne@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HVKpPyE0m9', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(150, 'Hildegard Walter Jr.', 'hildegard-walter-jr', 'bernier.davin@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XlezeuZ6T8', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(151, 'Destiny Reichel', 'destiny-reichel', 'jrice@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yvC8rFfa68', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(152, 'Magdalena Kirlin', 'magdalena-kirlin', 'alanna.hansen@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qJrVMiiba9', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(153, 'Tabitha Padberg V', 'tabitha-padberg-v', 'tharber@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WCYxl99eIN', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(154, 'Mr. Burley McCullough', 'mr-burley-mccullough', 'valerie88@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FkbnfmLIfd', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(155, 'Mabelle Rutherford V', 'mabelle-rutherford-v', 'priscilla73@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'y14Ixl3Qrc', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(156, 'Mr. Gerard Maggio I', 'mr-gerard-maggio-i', 'wanda.conn@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yeDhpFPLn7', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(157, 'Melissa Beier Sr.', 'melissa-beier-sr', 'vsporer@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fLPFnZWRp6', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(158, 'Alize Wiza', 'alize-wiza', 'chauncey86@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tClr7krJPF', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(159, 'Reta Moore', 'reta-moore', 'aisha51@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'trD9fxkevl', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(160, 'Mariela Heaney', 'mariela-heaney', 'rocio.shanahan@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kuMdVSrL2k', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(161, 'Winnifred Okuneva', 'winnifred-okuneva', 'corkery.jeremie@example.net', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MvaIn0T7Tb', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(162, 'Hadley Kohler', 'hadley-kohler', 'aurore66@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '69HRa3ufPb', 0, '2019-08-14 08:02:46', '2019-08-14 08:02:46'),
	(163, 'Jamir Collins MD', 'jamir-collins-md', 'abby.will@example.com', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8oVTjeYRxs', 0, '2019-08-14 08:02:47', '2019-08-14 08:02:47'),
	(164, 'Mariana Cassin Jr.', 'mariana-cassin-jr', 'kulas.felton@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tJkXjpnHxq', 0, '2019-08-14 08:02:47', '2019-08-14 08:02:47'),
	(165, 'Milford Harris', 'milford-harris', 'mcrist@example.org', NULL, '2019-08-14 08:02:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VS1rYWNYyj', 0, '2019-08-14 08:02:47', '2019-08-14 08:02:47'),
	(166, 'Prof. Peter Littel MD', 'prof-peter-littel-md', 'trudie.reichel@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kBFmfPvj2N', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(167, 'Sarina Medhurst', 'sarina-medhurst', 'faye41@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'e9Vn4FZLyG', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(168, 'Katelin Moen', 'katelin-moen', 'deckow.kelly@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LaBI4IEORD', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(169, 'Mrs. Zetta O\'Conner', 'mrs-zetta-oconner', 'russel.schroeder@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KYyBhaaCcI', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(170, 'Dr. Henriette Gibson Sr.', 'dr-henriette-gibson-sr', 'ole.williamson@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'seYB4pOGPw', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(171, 'Prof. Moshe Ryan DVM', 'prof-moshe-ryan-dvm', 'nicola.reilly@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hd2AKDjpt0', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(172, 'Mr. Kyler Heidenreich', 'mr-kyler-heidenreich', 'leonor.schroeder@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P8imwglAvh', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(173, 'Ernesto Krajcik', 'ernesto-krajcik', 'gwolff@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1DQZ4YDqie', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(174, 'Berenice Reichel', 'berenice-reichel', 'destinee54@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HFXSaeQCUf', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(175, 'Maurice Champlin', 'maurice-champlin', 'alexandrine.keebler@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kSDmYFe1Gc', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(176, 'Dr. Richmond Will', 'dr-richmond-will', 'johnston.norberto@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Kjm48yNRxM', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(177, 'Dr. Stewart Kerluke DDS', 'dr-stewart-kerluke-dds', 'providenci.okuneva@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u3jctLLy3V', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(178, 'Jalyn Gislason', 'jalyn-gislason', 'maverick.greenholt@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ANKPYBlOio', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(179, 'William Goldner', 'william-goldner', 'savanna03@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mYMMe491G7', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(180, 'Lucio Rogahn', 'lucio-rogahn', 'umaggio@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BvDINROxSJ', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(181, 'Evans Rippin', 'evans-rippin', 'kelly58@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ksdwaxijUy', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(182, 'Furman Wilderman DVM', 'furman-wilderman-dvm', 'sandra.denesik@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qA4WinZ8uC', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(183, 'Raphaelle Olson MD', 'raphaelle-olson-md', 'ireilly@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qKOKYJR6qe', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(184, 'Leilani Boyle', 'leilani-boyle', 'camren11@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5d7aD9ByhT', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(185, 'Icie Davis', 'icie-davis', 'tod35@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F4waL4SGhJ', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(186, 'Kaelyn Osinski', 'kaelyn-osinski', 'itzel.denesik@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hcIR0etjmd', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(187, 'Wallace Labadie', 'wallace-labadie', 'adelle.reichert@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'X58ce3U9z1', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(188, 'Mr. Hank Harber', 'mr-hank-harber', 'skye.von@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I3q8rbKqHu', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(189, 'Alvis Johnson I', 'alvis-johnson-i', 'psmith@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'M1wcjwoPvW', 0, '2019-08-14 08:04:59', '2019-08-14 08:04:59'),
	(190, 'Bernhard Jacobson', 'bernhard-jacobson', 'sanford.madge@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5KXbcvqQgd', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(191, 'Joanie Fisher', 'joanie-fisher', 'kuhic.guillermo@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dsqab3emWX', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(192, 'Mauricio Kessler', 'mauricio-kessler', 'toby.pfannerstill@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GK27LA9gWA', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(193, 'Dayna Kirlin', 'dayna-kirlin', 'lourdes.stark@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h6J0IfDHVx', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(194, 'Prof. Gerald Sauer V', 'prof-gerald-sauer-v', 'gabriel.runolfsson@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CTbxcy34rL', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(195, 'Orpha Stracke', 'orpha-stracke', 'lesch.moises@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NhcPvp1Zt3', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(196, 'Francisca Mohr', 'francisca-mohr', 'jayda51@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XWaqltAF7H', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(197, 'Antonina Glover Jr.', 'antonina-glover-jr', 'austyn86@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SYwVnKmGJt', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(198, 'Ima Quitzon', 'ima-quitzon', 'tierra01@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'S2BxPvNCVU', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(199, 'Genesis Wiza', 'genesis-wiza', 'pfannerstill.audie@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RtLDjRp7TM', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(200, 'Irma Stokes', 'irma-stokes', 'stefanie56@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8h7E5yCthQ', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(201, 'Dr. Shania Wilkinson', 'dr-shania-wilkinson', 'runolfsdottir.briana@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FqFaBnjxKx', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(202, 'Delpha Treutel', 'delpha-treutel', 'wehner.loyce@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zY78XNZ29V', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(203, 'Jo Watsica', 'jo-watsica', 'wehner.ruthe@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4rtV7NMGrn', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(204, 'Gust Wilkinson', 'gust-wilkinson', 'effertz.lizeth@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L03tSzdyqD', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(205, 'Mr. Jarod Zieme DVM', 'mr-jarod-zieme-dvm', 'gdaniel@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3jzxdFjk6T', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(206, 'Austin Schneider', 'austin-schneider', 'iva66@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z9hNh4zX15', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(207, 'Alessandra Zieme', 'alessandra-zieme', 'rachael22@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3ftHJVO2Xq', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(208, 'Mrs. Adrienne Parisian', 'mrs-adrienne-parisian', 'tgutmann@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Kr9vY6ubT3', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(209, 'Ms. Hosea Quitzon', 'ms-hosea-quitzon', 'lucy.abbott@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nagc320vmS', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(210, 'Antonietta Swaniawski', 'antonietta-swaniawski', 'pleffler@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FIpXJUigAF', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(211, 'Rolando Huels', 'rolando-huels', 'jayden37@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'J7pZvjhH5z', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(212, 'Destiny Jaskolski', 'destiny-jaskolski', 'pbauch@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0xB5pGXdIy', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(213, 'Lisette O\'Reilly', 'lisette-oreilly', 'danielle46@example.net', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pIVCdX1dfq', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(214, 'Mr. Lukas Kris MD', 'mr-lukas-kris-md', 'jermain.lehner@example.org', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qvVd9SuanP', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00'),
	(215, 'Brendon Runolfsdottir', 'brendon-runolfsdottir', 'bkilback@example.com', NULL, '2019-08-14 08:04:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yQkzvZNLpt', 0, '2019-08-14 08:05:00', '2019-08-14 08:05:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
