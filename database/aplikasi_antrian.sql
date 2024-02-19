/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : aplikasi_antrian

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 20/02/2024 00:05:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for queue_antrian_admisi
-- ----------------------------
DROP TABLE IF EXISTS `queue_antrian_admisi`;
CREATE TABLE `queue_antrian_admisi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of queue_antrian_admisi
-- ----------------------------
BEGIN;
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (1, '2023-09-13', '001', '1', '2023-09-13 21:34:40');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (2, '2023-09-13', '002', '1', '2023-09-13 23:15:18');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (3, '2023-09-13', '003', '1', '2023-09-13 23:18:32');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (4, '2023-09-13', '004', '1', '2023-09-13 23:29:56');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (5, '2023-09-13', '005', '1', '2023-09-13 23:36:54');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (6, '2023-09-13', '006', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (7, '2023-09-13', '007', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (8, '2023-09-13', '008', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (9, '2023-09-13', '009', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (10, '2023-09-13', '010', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (11, '2023-09-14', '001', '1', '2023-09-14 14:19:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (12, '2023-09-14', '002', '1', '2023-09-14 14:17:53');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (13, '2023-09-14', '003', '1', '2023-09-14 14:28:27');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (14, '2023-09-14', '004', '1', '2023-09-14 14:31:40');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (15, '2023-09-14', '005', '1', '2023-09-14 14:29:34');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (16, '2023-09-14', '006', '1', '2023-09-14 14:46:30');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (17, '2023-09-14', '007', '1', '2023-09-14 14:58:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (18, '2023-09-14', '008', '1', '2023-09-14 16:12:32');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (19, '2023-09-14', '009', '1', '2023-09-14 20:45:27');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (20, '2023-09-14', '010', '1', '2023-09-14 20:25:55');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (21, '2023-09-14', '011', '1', '2023-09-14 20:47:53');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (22, '2023-09-14', '012', '1', '2023-09-14 20:45:54');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (23, '2023-09-14', '013', '1', '2023-09-14 20:49:50');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (24, '2023-09-14', '014', '1', '2023-09-14 20:43:30');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (25, '2023-09-14', '015', '1', '2023-09-14 20:43:46');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (26, '2023-09-14', '016', '1', '2023-09-14 20:40:45');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (27, '2023-09-14', '017', '1', '2023-09-14 22:51:19');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (28, '2023-09-14', '018', '1', '2023-09-14 22:52:26');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (29, '2023-09-14', '019', '1', '2023-09-14 22:51:21');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (30, '2023-09-14', '020', '1', '2023-09-14 22:51:22');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (31, '2023-09-14', '021', '1', '2023-09-14 22:52:28');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (32, '2023-09-14', '022', '1', '2023-09-14 22:51:53');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (33, '2023-09-14', '023', '1', '2023-09-14 22:51:52');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (34, '2023-09-14', '024', '1', '2023-09-14 22:52:15');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (35, '2023-09-14', '025', '1', '2023-09-14 22:52:36');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (36, '2023-09-14', '026', '1', '2023-09-14 22:52:41');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (37, '2023-09-14', '027', '1', '2023-09-14 23:18:45');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (38, '2023-09-14', '028', '1', '2023-09-14 23:18:49');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (39, '2023-09-14', '029', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (40, '2023-09-16', '001', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (41, '2023-09-16', '002', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (42, '2023-09-16', '003', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (43, '2023-09-16', '004', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (44, '2023-09-16', '005', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (45, '2023-09-19', '001', '1', '2023-09-19 23:34:53');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (46, '2023-09-19', '002', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (47, '2023-10-25', '001', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (48, '2023-11-09', '001', '1', '2023-11-09 20:42:11');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (49, '2023-11-09', '002', '1', '2023-11-09 20:43:21');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (50, '2023-11-09', '003', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES (51, '2024-02-01', '001', '0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for queue_penggilan_antrian
-- ----------------------------
DROP TABLE IF EXISTS `queue_penggilan_antrian`;
CREATE TABLE `queue_penggilan_antrian` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `antrian` varchar(255) DEFAULT NULL,
  `loket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_antrian` (`antrian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of queue_penggilan_antrian
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for queue_setting
-- ----------------------------
DROP TABLE IF EXISTS `queue_setting`;
CREATE TABLE `queue_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `running_text` varchar(255) DEFAULT NULL,
  `youtube_id` varchar(255) DEFAULT NULL,
  `list_loket` longtext,
  `warna_primary` varchar(255) DEFAULT NULL,
  `warna_secondary` varchar(255) DEFAULT NULL,
  `warna_accent` varchar(255) DEFAULT NULL,
  `warna_background` varchar(255) DEFAULT NULL,
  `warna_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of queue_setting
-- ----------------------------
BEGIN;
INSERT INTO `queue_setting` (`id`, `nama_instansi`, `logo`, `alamat`, `telpon`, `email`, `running_text`, `youtube_id`, `list_loket`, `warna_primary`, `warna_secondary`, `warna_accent`, `warna_background`, `warna_text`) VALUES (1, 'RSU SRIWIJAYA', 'logo-removebg-preview.png', 'Lorhbh', '558450845', 'ade2mail.com', 'SELAMAT DATANG DI RSU SRIWIJAYA', 'Dfzmsb_57XM', '[{\"no_loket\":\"1\",\"nama_loket\":\"Loket 1\"},{\"no_loket\":\"2\",\"nama_loket\":\"Loket 2\"},{\"no_loket\":\"3\",\"nama_loket\":\"Loket 3\"}]', '#00923f', '#c39292', '#6083a9', '#3a9862', '#ffffff');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
