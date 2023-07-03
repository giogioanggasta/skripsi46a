/*
 Navicat Premium Data Transfer

 Source Server         : localhost_mysql
 Source Server Type    : MySQL
 Source Server Version : 100138 (10.1.38-MariaDB)
 Source Host           : localhost:3307
 Source Schema         : web_kos46a

 Target Server Type    : MySQL
 Target Server Version : 100138 (10.1.38-MariaDB)
 File Encoding         : 65001

 Date: 18/06/2023 18:25:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `namaAdmin` varchar(500) NOT NULL,
  `nomorTelepon` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`idAdmin`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `nomorTelepon`, `email`, `password`) VALUES (1, 'Gio', '087742036248', 'gio@gmail.com', 'YWRtaW5rdQ==');
COMMIT;

-- ----------------------------
-- Table structure for diskon
-- ----------------------------
DROP TABLE IF EXISTS `diskon`;
CREATE TABLE `diskon` (
  `idDiskon` int(11) NOT NULL AUTO_INCREMENT,
  `gambarDiskon` varchar(500) DEFAULT NULL,
  `namaDiskon` varchar(500) DEFAULT NULL,
  `descDiskon` longtext,
  `potonganHarga` varchar(255) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `tglAwal` date DEFAULT NULL,
  `tglAkhir` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idAdmin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idDiskon`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of diskon
-- ----------------------------
BEGIN;
INSERT INTO `diskon` (`idDiskon`, `gambarDiskon`, `namaDiskon`, `descDiskon`, `potonganHarga`, `limit`, `tglAwal`, `tglAkhir`, `created_at`, `idAdmin`) VALUES (1, '1686745401_Pengguna Baru.png', 'PENGGUNABARU', 'Diskon 100.000 bagi 100 pengguna baru', '100000', 99, '2023-06-14', '2023-12-14', '2023-06-14 18:36:34', '1');
INSERT INTO `diskon` (`idDiskon`, `gambarDiskon`, `namaDiskon`, `descDiskon`, `potonganHarga`, `limit`, `tglAwal`, `tglAkhir`, `created_at`, `idAdmin`) VALUES (2, '1686745395_Pancasila.png', 'HARIPANCASILA', 'Diskon 150.000 untuk menyambut Hari Pancasila', '150000', 29, '2023-06-14', '2023-07-01', '2023-06-14 18:37:11', '1');
INSERT INTO `diskon` (`idDiskon`, `gambarDiskon`, `namaDiskon`, `descDiskon`, `potonganHarga`, `limit`, `tglAwal`, `tglAkhir`, `created_at`, `idAdmin`) VALUES (3, '1686745390_1111.png', '11.11', '110.000 untuk menyambut hari spesial 11.11', '110000', 110, '2023-11-11', '2023-12-11', '2023-06-14 18:38:42', '1');
INSERT INTO `diskon` (`idDiskon`, `gambarDiskon`, `namaDiskon`, `descDiskon`, `potonganHarga`, `limit`, `tglAwal`, `tglAkhir`, `created_at`, `idAdmin`) VALUES (4, '1686745385_Merdeka.png', 'MERDEKA', 'Diskon 170.000 untuk Hari Merdeka', '170000', 1, '2023-06-14', '2023-08-17', '2023-06-14 18:40:00', '1');
COMMIT;

-- ----------------------------
-- Table structure for fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas` (
  `idFasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `namaFasilitas` varchar(500) NOT NULL,
  `fotoFasilitas` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFasilitas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
BEGIN;
INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `fotoFasilitas`, `created_at`, `idAdmin`) VALUES (1, 'Televisi', '1686742815_tv.png', '2023-06-14 18:40:15', 1);
INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `fotoFasilitas`, `created_at`, `idAdmin`) VALUES (2, 'Air Conditioner', '1686742823_ac.png', '2023-06-14 18:40:23', 1);
INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `fotoFasilitas`, `created_at`, `idAdmin`) VALUES (3, 'Laundry', '1686742836_laundry.png', '2023-06-14 18:40:36', 1);
INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `fotoFasilitas`, `created_at`, `idAdmin`) VALUES (4, 'Parkiran Motor', '1686742848_motorcycle.png', '2023-06-14 18:40:48', 1);
INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `fotoFasilitas`, `created_at`, `idAdmin`) VALUES (5, 'Parkiran Mobil', '1686742859_car.png', '2023-06-14 18:40:59', 1);
COMMIT;

-- ----------------------------
-- Table structure for fasilitas_pengelolaan
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas_pengelolaan`;
CREATE TABLE `fasilitas_pengelolaan` (
  `idPengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `idFasilitas` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `hargaFasilitas` bigint(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `namaFasilitas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPengelolaan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of fasilitas_pengelolaan
-- ----------------------------
BEGIN;
INSERT INTO `fasilitas_pengelolaan` (`idPengelolaan`, `idFasilitas`, `idAdmin`, `hargaFasilitas`, `created_at`, `updated_at`, `deleted_at`, `namaFasilitas`) VALUES (1, 1, 1, 100000, '2023-06-14 18:40:15', '2023-06-14 18:40:15', NULL, 'Televisi');
INSERT INTO `fasilitas_pengelolaan` (`idPengelolaan`, `idFasilitas`, `idAdmin`, `hargaFasilitas`, `created_at`, `updated_at`, `deleted_at`, `namaFasilitas`) VALUES (2, 2, 1, 200000, '2023-06-14 18:40:23', '2023-06-14 18:40:23', NULL, 'Air Conditioner');
INSERT INTO `fasilitas_pengelolaan` (`idPengelolaan`, `idFasilitas`, `idAdmin`, `hargaFasilitas`, `created_at`, `updated_at`, `deleted_at`, `namaFasilitas`) VALUES (3, 3, 1, 150000, '2023-06-14 18:40:36', '2023-06-14 18:40:36', NULL, 'Laundry');
INSERT INTO `fasilitas_pengelolaan` (`idPengelolaan`, `idFasilitas`, `idAdmin`, `hargaFasilitas`, `created_at`, `updated_at`, `deleted_at`, `namaFasilitas`) VALUES (4, 4, 1, 75000, '2023-06-14 18:40:48', '2023-06-14 18:40:48', NULL, 'Parkiran Motor');
INSERT INTO `fasilitas_pengelolaan` (`idPengelolaan`, `idFasilitas`, `idAdmin`, `hargaFasilitas`, `created_at`, `updated_at`, `deleted_at`, `namaFasilitas`) VALUES (5, 5, 1, 100000, '2023-06-14 18:40:59', '2023-06-14 18:40:59', NULL, 'Parkiran Mobil');
COMMIT;

-- ----------------------------
-- Table structure for kamar
-- ----------------------------
DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar` (
  `idKamar` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin` int(11) DEFAULT NULL,
  `idTipeKamar` int(11) DEFAULT NULL,
  `nomorKamar` varchar(255) DEFAULT NULL,
  `status` enum('Tersedia','Tidak Tersedia') DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idKamar`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of kamar
-- ----------------------------
BEGIN;
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 1, 1, '1', 'Tidak Tersedia', '2023-06-14 18:41:11', '2023-06-14 18:41:11', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 1, 1, '2', 'Tersedia', '2023-06-14 18:41:15', '2023-06-14 18:41:15', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 1, 1, '3', 'Tidak Tersedia', '2023-06-14 18:41:19', '2023-06-14 18:41:19', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 1, 1, '4', 'Tidak Tersedia', '2023-06-14 18:41:24', '2023-06-14 18:41:24', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 1, 1, '5', 'Tersedia', '2023-06-14 18:41:27', '2023-06-14 18:41:27', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (6, 1, 1, '6', 'Tersedia', '2023-06-14 18:41:31', '2023-06-14 18:41:31', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (7, 1, 1, '7', 'Tersedia', '2023-06-14 18:41:35', '2023-06-14 18:41:35', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (8, 1, 1, '8', 'Tersedia', '2023-06-14 18:41:38', '2023-06-14 18:41:38', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (9, 1, 1, '9', 'Tidak Tersedia', '2023-06-14 18:41:43', '2023-06-14 18:41:43', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (10, 1, 1, '10', 'Tidak Tersedia', '2023-06-14 18:41:48', '2023-06-14 18:41:48', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (11, 1, 1, '11', 'Tersedia', '2023-06-14 18:41:52', '2023-06-14 18:41:52', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (12, 1, 1, '12', 'Tidak Tersedia', '2023-06-14 18:41:55', '2023-06-14 18:41:55', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (13, 1, 1, '13', 'Tidak Tersedia', '2023-06-14 18:41:58', '2023-06-14 18:41:58', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (14, 1, 1, '14', 'Tidak Tersedia', '2023-06-14 18:42:02', '2023-06-14 18:42:02', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (15, 1, 1, '15', 'Tidak Tersedia', '2023-06-14 18:42:06', '2023-06-14 18:42:06', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (16, 1, 1, '16', 'Tersedia', '2023-06-14 18:42:14', '2023-06-14 18:42:14', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (17, 1, 1, '17', 'Tidak Tersedia', '2023-06-14 18:42:17', '2023-06-14 18:42:17', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (18, 1, 1, '18', 'Tersedia', '2023-06-14 18:42:21', '2023-06-14 18:42:21', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (19, 1, 2, '19', 'Tidak Tersedia', '2023-06-14 18:42:25', '2023-06-14 18:42:25', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (20, 1, 2, '20', 'Tersedia', '2023-06-14 18:42:29', '2023-06-14 18:42:29', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (21, 1, 2, '21', 'Tersedia', '2023-06-14 18:42:33', '2023-06-14 18:42:33', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (22, 1, 2, '22', 'Tidak Tersedia', '2023-06-14 18:42:46', '2023-06-14 18:42:46', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (23, 1, 2, '23', 'Tersedia', '2023-06-14 18:42:52', '2023-06-14 18:42:52', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (24, 1, 2, '24', 'Tersedia', '2023-06-14 18:42:55', '2023-06-14 18:42:55', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (25, 1, 2, '25', 'Tidak Tersedia', '2023-06-14 18:42:59', '2023-06-14 18:42:59', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (26, 1, 2, '26', 'Tersedia', '2023-06-14 18:43:04', '2023-06-14 18:43:04', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (27, 1, 2, '27', 'Tidak Tersedia', '2023-06-14 18:43:08', '2023-06-14 18:43:08', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (28, 1, 2, '28', 'Tidak Tersedia', '2023-06-14 18:43:13', '2023-06-14 18:43:13', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (29, 1, 2, '29', 'Tersedia', '2023-06-14 18:43:18', '2023-06-14 18:43:18', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (30, 1, 2, '30', 'Tersedia', '2023-06-14 18:43:24', '2023-06-14 18:43:24', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (31, 1, 2, '31', 'Tidak Tersedia', '2023-06-14 18:43:32', '2023-06-14 18:43:32', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (32, 1, 2, '32', 'Tersedia', '2023-06-14 18:43:36', '2023-06-14 18:43:36', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (33, 1, 2, '33', 'Tidak Tersedia', '2023-06-14 18:43:41', '2023-06-14 18:43:41', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (34, 1, 2, '34', 'Tersedia', '2023-06-14 18:43:47', '2023-06-14 18:43:47', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (35, 1, 3, '35', 'Tersedia', '2023-06-14 18:43:51', '2023-06-14 18:43:51', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (36, 1, 3, '36', 'Tidak Tersedia', '2023-06-14 18:43:56', '2023-06-14 18:43:56', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (37, 1, 3, '37', 'Tersedia', '2023-06-14 18:44:00', '2023-06-14 18:44:00', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (38, 1, 3, '38', 'Tidak Tersedia', '2023-06-14 18:44:05', '2023-06-14 18:44:05', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (39, 1, 3, '39', 'Tersedia', '2023-06-14 18:44:09', '2023-06-14 18:44:09', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (40, 1, 3, '40', 'Tidak Tersedia', '2023-06-14 18:44:15', '2023-06-14 18:44:15', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (41, 1, 3, '41', 'Tersedia', '2023-06-14 18:44:20', '2023-06-14 18:44:20', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (42, 1, 3, '42', 'Tidak Tersedia', '2023-06-14 18:44:28', '2023-06-14 18:44:28', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (43, 1, 3, '43', 'Tersedia', '2023-06-14 18:44:32', '2023-06-14 18:44:32', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (44, 1, 3, '44', 'Tersedia', '2023-06-14 18:44:37', '2023-06-14 18:44:37', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (45, 1, 3, '45', 'Tidak Tersedia', '2023-06-14 18:44:41', '2023-06-14 18:44:41', NULL);
INSERT INTO `kamar` (`idKamar`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (46, 1, 3, '46', 'Tidak Tersedia', '2023-06-14 18:44:45', '2023-06-14 18:44:45', NULL);
COMMIT;

-- ----------------------------
-- Table structure for m_tipekamar
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar`;
CREATE TABLE `m_tipekamar` (
  `idTipeKamar` int(11) NOT NULL AUTO_INCREMENT,
  `namaTipeKamar` varchar(500) NOT NULL,
  `thumbnailKamar` varchar(500) NOT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `descTipeKamar` longtext,
  PRIMARY KEY (`idTipeKamar`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of m_tipekamar
-- ----------------------------
BEGIN;
INSERT INTO `m_tipekamar` (`idTipeKamar`, `namaTipeKamar`, `thumbnailKamar`, `idAdmin`, `created_at`, `updated_at`, `deleted_at`, `descTipeKamar`) VALUES (1, 'Small', '1686742418_Small.jpeg', 1, '2023-06-14 18:33:38', '2023-06-14 18:33:38', NULL, '<p>Luas kamar: 11m<sup>2</sup></p>\r\n\r\n<ul>\r\n	<li>1 Tempat tidur (120 x 200) 1 orang</li>\r\n	<li>Termasuk listrik</li>\r\n	<li>Kamar mandi dalam, Shower, Wastafel, Pemanas air</li>\r\n</ul>\r\n\r\n<p>Fasilitas kamar</p>\r\n\r\n<ul>\r\n	<li>Kursi</li>\r\n	<li>Lemari</li>\r\n	<li>Meja</li>\r\n	<li>Sprei</li>\r\n</ul>\r\n');
INSERT INTO `m_tipekamar` (`idTipeKamar`, `namaTipeKamar`, `thumbnailKamar`, `idAdmin`, `created_at`, `updated_at`, `deleted_at`, `descTipeKamar`) VALUES (2, 'Medium', '1686742454_Medium.jpeg', 1, '2023-06-14 18:34:14', '2023-06-14 18:34:14', NULL, '<p>Luas kamar: 12m<sup>2</sup></p>\r\n\r\n<ul>\r\n	<li>1 Tempat tidur (120 x 200) 1 orang</li>\r\n	<li>Termasuk listrik</li>\r\n	<li>Kamar mandi dalam, Shower, Wastafel, Pemanas air</li>\r\n</ul>\r\n\r\n<p>Fasilitas kamar</p>\r\n\r\n<ul>\r\n	<li>Kursi</li>\r\n	<li>Lemari</li>\r\n	<li>Meja</li>\r\n	<li>Sprei</li>\r\n</ul>\r\n');
INSERT INTO `m_tipekamar` (`idTipeKamar`, `namaTipeKamar`, `thumbnailKamar`, `idAdmin`, `created_at`, `updated_at`, `deleted_at`, `descTipeKamar`) VALUES (3, 'Deluxe', '1686742547_Deluxe.jpeg', 1, '2023-06-14 18:35:47', '2023-06-14 18:35:47', NULL, '<p>Luas kamar: 15m<sup>2</sup></p>\r\n\r\n<ul>\r\n	<li>1 Tempat tidur (120 x 200) 1 orang</li>\r\n	<li>Termasuk listrik</li>\r\n	<li>Kamar mandi dalam, Shower, Wastafel, Pemanas air</li>\r\n</ul>\r\n\r\n<p>Fasilitas kamar</p>\r\n\r\n<ul>\r\n	<li>Kursi</li>\r\n	<li>Lemari</li>\r\n	<li>Meja</li>\r\n	<li>Sprei</li>\r\n</ul>\r\n');
COMMIT;

-- ----------------------------
-- Table structure for m_tipekamar_foto
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar_foto`;
CREATE TABLE `m_tipekamar_foto` (
  `idFotoKamar` int(11) NOT NULL AUTO_INCREMENT,
  `idTipeKamar` int(11) DEFAULT NULL,
  `namaFoto` varchar(255) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idFotoKamar`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of m_tipekamar_foto
-- ----------------------------
BEGIN;
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (1, 1, '1686742418_Small.jpeg', 1, '2023-06-14 18:33:38', '2023-06-14 18:33:38');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (2, 1, '1686742418_Small2.jpeg', 1, '2023-06-14 18:33:38', '2023-06-14 18:33:38');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (3, 1, '1686742418_Small3.jpeg', 1, '2023-06-14 18:33:38', '2023-06-14 18:33:38');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (4, 1, '1686742418_Small4.jpeg', 1, '2023-06-14 18:33:38', '2023-06-14 18:33:38');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (5, 2, '1686742454_Medium.jpeg', 1, '2023-06-14 18:34:14', '2023-06-14 18:34:14');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (6, 2, '1686742454_Medium2.jpeg', 1, '2023-06-14 18:34:14', '2023-06-14 18:34:14');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (7, 2, '1686742454_Medium3.jpeg', 1, '2023-06-14 18:34:14', '2023-06-14 18:34:14');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (8, 3, '1686742547_Deluxe.jpeg', 1, '2023-06-14 18:35:47', '2023-06-14 18:35:47');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (9, 3, '1686742547_Deluxe2.jpeg', 1, '2023-06-14 18:35:47', '2023-06-14 18:35:47');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (10, 3, '1686742547_Deluxe3.jpeg', 1, '2023-06-14 18:35:47', '2023-06-14 18:35:47');
INSERT INTO `m_tipekamar_foto` (`idFotoKamar`, `idTipeKamar`, `namaFoto`, `idAdmin`, `created_at`, `updated_at`) VALUES (11, 3, '1686742547_Deluxe4.jpeg', 1, '2023-06-14 18:35:47', '2023-06-14 18:35:47');
COMMIT;

-- ----------------------------
-- Table structure for m_tipekamar_pengelolaan
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar_pengelolaan`;
CREATE TABLE `m_tipekamar_pengelolaan` (
  `idPengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `idTipeKamar` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `hargaTipeKamar` bigint(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `namaTipeKamar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPengelolaan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of m_tipekamar_pengelolaan
-- ----------------------------
BEGIN;
INSERT INTO `m_tipekamar_pengelolaan` (`idPengelolaan`, `idTipeKamar`, `idAdmin`, `hargaTipeKamar`, `created_at`, `updated_at`, `deleted_at`, `namaTipeKamar`) VALUES (1, 1, 1, 1500000, '2023-06-14 18:33:38', '2023-06-14 18:33:38', NULL, 'Small');
INSERT INTO `m_tipekamar_pengelolaan` (`idPengelolaan`, `idTipeKamar`, `idAdmin`, `hargaTipeKamar`, `created_at`, `updated_at`, `deleted_at`, `namaTipeKamar`) VALUES (2, 2, 1, 1800000, '2023-06-14 18:34:14', '2023-06-14 18:34:14', NULL, 'Medium');
INSERT INTO `m_tipekamar_pengelolaan` (`idPengelolaan`, `idTipeKamar`, `idAdmin`, `hargaTipeKamar`, `created_at`, `updated_at`, `deleted_at`, `namaTipeKamar`) VALUES (3, 3, 1, 2000000, '2023-06-14 18:35:47', '2023-06-14 18:35:47', NULL, 'Deluxe');
INSERT INTO `m_tipekamar_pengelolaan` (`idPengelolaan`, `idTipeKamar`, `idAdmin`, `hargaTipeKamar`, `created_at`, `updated_at`, `deleted_at`, `namaTipeKamar`) VALUES (4, 1, 1, 1300000, '2023-06-14 22:21:51', '2023-06-14 22:21:51', NULL, 'Small');
COMMIT;

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `namaUser` varchar(500) NOT NULL,
  `jenisKelamin` varchar(50) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nomorTelepon` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
BEGIN;
INSERT INTO `m_user` (`idUser`, `namaUser`, `jenisKelamin`, `tanggalLahir`, `nomorTelepon`, `email`, `password`) VALUES (1, 'Giovanni', 'Pria', '1997-10-18', '087742036248', 'gio@gmail.com', 'amVyYXBhaDEyMw==');
COMMIT;

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idAdmin` varchar(255) DEFAULT NULL,
  `idTipeKamar` int(11) DEFAULT NULL,
  `nomorKamar` varchar(255) DEFAULT NULL,
  `namaTipeKamar` varchar(255) DEFAULT NULL,
  `tanggalWaktuTransaksi` datetime DEFAULT CURRENT_TIMESTAMP,
  `lamaSewa` int(11) DEFAULT NULL,
  `buktiPembayaran` varchar(500) DEFAULT NULL,
  `pilihanDetailFasilitas` varchar(255) DEFAULT NULL,
  `status` enum('Diterima','Ditolak','Menunggu Pembayaran','Proses','Diterima dengan Pembaharuan') DEFAULT 'Menunggu Pembayaran',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `totalPembayaranNormal` varchar(255) DEFAULT NULL COMMENT 'totalHarga yang dibayar tanpa diskon',
  `potonganHarga` varchar(255) DEFAULT NULL COMMENT 'potonga diskon yang didapat',
  `namaDiskon` varchar(255) DEFAULT NULL,
  `totalPembayaran` varchar(255) DEFAULT NULL COMMENT 'totalHarga yang dibayar + diskon jika ada',
  `awalSewa` date DEFAULT NULL,
  `akhirSewa` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idTransaksi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
BEGIN;
INSERT INTO `transaksi` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`) VALUES (1, 1, '1', 1, '5', 'Small', '2023-06-14 19:06:57', 3, '1686746254_Buktibayar.jpeg', 'Parkiran Mobil,Air Conditioner,Televisi', 'Diterima dengan Pembaharuan', '2023-06-14 20:36:53', '5700000', '150000', 'HARIPANCASILA', '5550000', '2023-07-01', '2023-10-01', NULL);
INSERT INTO `transaksi` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`) VALUES (2, 1, '1', 3, '39', 'Deluxe', '2023-06-14 20:14:04', 6, '1686748617_Buktibayar.jpeg', 'Parkiran Mobil,Laundry,Air Conditioner,Televisi', 'Ditolak', '2023-06-14 20:17:15', '15300000', '170000', 'MERDEKA', '15130000', '2023-07-01', '2024-01-01', 'Sudah full');
INSERT INTO `transaksi` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`) VALUES (3, 1, '1', 3, '39', 'Deluxe', '2023-06-18 00:11:44', 6, '1687021925_Buktibayar.jpeg', 'Parkiran Motor,Laundry,Air Conditioner', 'Diterima', '2023-06-18 00:13:23', '14550000', '170000', 'MERDEKA', '14380000', '2023-07-01', '2024-01-01', NULL);
INSERT INTO `transaksi` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`) VALUES (4, 1, '1', 1, '7', 'Small', '2023-06-18 00:12:43', 3, '1687021973_Buktibayar.jpeg', 'Parkiran Motor,Laundry,Air Conditioner', 'Diterima', '2023-06-18 00:13:28', '5175000', '100000', 'PENGGUNABARU', '5075000', '2023-07-01', '2023-10-01', NULL);
COMMIT;

-- ----------------------------
-- Table structure for transaksi_pembaharuan
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembaharuan`;
CREATE TABLE `transaksi_pembaharuan` (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idAdmin` varchar(255) DEFAULT NULL,
  `idTipeKamar` int(11) DEFAULT NULL,
  `nomorKamar` varchar(255) DEFAULT NULL,
  `namaTipeKamar` varchar(255) DEFAULT NULL,
  `tanggalWaktuTransaksi` datetime DEFAULT CURRENT_TIMESTAMP,
  `lamaSewa` int(11) DEFAULT NULL,
  `buktiPembayaran` varchar(500) DEFAULT NULL,
  `pilihanDetailFasilitas` varchar(255) DEFAULT NULL,
  `status` enum('Diterima Perpanjangan','Ditolak Perpanjangan','Menunggu Pembayaran Perpanjangan','Proses','Diterima Pengembalian','Ditolak Pengembalian','Diterima Penambahan','Ditolak Penambahan','Menunggu Pembayaran Penambahan') DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `totalPembayaranNormal` varchar(255) DEFAULT NULL COMMENT 'totalHarga yang dibayar tanpa diskon',
  `potonganHarga` varchar(255) DEFAULT NULL COMMENT 'potonga diskon yang didapat',
  `namaDiskon` varchar(255) DEFAULT NULL,
  `totalPembayaran` varchar(255) DEFAULT NULL COMMENT 'totalHarga yang dibayar + diskon jika ada',
  `awalSewa` date DEFAULT NULL,
  `akhirSewa` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `idTransaksiRefrensi` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `detailLainnya` longtext,
  `totalKurangPenambahanFasilitas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idTransaksi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of transaksi_pembaharuan
-- ----------------------------
BEGIN;
INSERT INTO `transaksi_pembaharuan` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`, `idTransaksiRefrensi`, `type`, `detailLainnya`, `totalKurangPenambahanFasilitas`) VALUES (1, 1, '1', 1, '5', 'Small', '2023-06-14 20:35:33', 3, '1686749762_Buktibayar.jpeg', 'Parkiran Mobil,Air Conditioner,Televisi,Laundry', 'Diterima Penambahan', '2023-06-14 20:36:53', '6000000', '0', '', '6000000', '2023-07-01', '2023-10-01', NULL, 1, 'Penambahan Fasilitas', '{\"idTransaksi\":\"1\",\"totalPembayaranUtuh\":\"5550000\",\"fasilitas\":[\"Laundry|450000\"],\"totalPenambahanValue\":\"450000\",\"fasilitasNow\":\"Parkiran Mobil,Air Conditioner,Televisi\",\"BtnPenambahanFasilitas\":\"\"}', '450000');
INSERT INTO `transaksi_pembaharuan` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`, `idTransaksiRefrensi`, `type`, `detailLainnya`, `totalKurangPenambahanFasilitas`) VALUES (2, 1, '1', 1, '5', 'Small', '2023-06-14 20:37:33', 3, NULL, 'Parkiran Mobil,Air Conditioner,Laundry', 'Diterima Pengembalian', '2023-06-14 20:38:15', '5700000', '0', '', '5700000', '2023-07-01', '2023-10-01', NULL, 1, 'Pengurangan Fasilitas', '{\"idTransaksi\":\"1\",\"totalPembayaranUtuh\":\"6000000\",\"fasilitas\":[\"Parkiran Mobil|300000\",\"Air Conditioner|600000\",\"Laundry|450000\"],\"totalPengembalianValue\":\"300000\",\"BtnPenguranganFasilitas\":\"\"}', NULL);
INSERT INTO `transaksi_pembaharuan` (`idTransaksi`, `idUser`, `idAdmin`, `idTipeKamar`, `nomorKamar`, `namaTipeKamar`, `tanggalWaktuTransaksi`, `lamaSewa`, `buktiPembayaran`, `pilihanDetailFasilitas`, `status`, `updated_at`, `totalPembayaranNormal`, `potonganHarga`, `namaDiskon`, `totalPembayaran`, `awalSewa`, `akhirSewa`, `reason`, `idTransaksiRefrensi`, `type`, `detailLainnya`, `totalKurangPenambahanFasilitas`) VALUES (3, 1, NULL, 1, '7', 'Small', '2023-06-18 00:15:11', 3, '1687022118_Buktibayar.jpeg', 'Parkiran Motor,Laundry,Air Conditioner,Televisi', 'Proses', '2023-06-18 00:15:18', '5375000', '0', '', '5375000', '2023-07-01', '2023-10-01', NULL, 4, 'Penambahan Fasilitas', '{\"idTransaksi\":\"4\",\"totalPembayaranUtuh\":\"5075000\",\"fasilitas\":[\"Televisi|300000\"],\"totalPenambahanValue\":\"300000\",\"fasilitasNow\":\"Parkiran Motor,Laundry,Air Conditioner\",\"BtnPenambahanFasilitas\":\"\"}', '300000');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
