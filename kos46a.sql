/*
 Navicat Premium Data Transfer

 Source Server         : localwest_mariadb
 Source Server Type    : MariaDB
 Source Server Version : 101100
 Source Host           : localhost:3307
 Source Schema         : kos46a

 Target Server Type    : MariaDB
 Target Server Version : 101100
 File Encoding         : 65001

 Date: 09/06/2023 21:17:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `namaAdmin` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomorTelepon` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idAdmin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Gio', '6287742036248', 'gio@gmail.com', 'YWRtaW5rdQ==');
INSERT INTO `admin` VALUES (2, 'Satria', '083832204284', 'satria@gmail.com', 'YWRtaW5rdQ==');

-- ----------------------------
-- Table structure for diskon
-- ----------------------------
DROP TABLE IF EXISTS `diskon`;
CREATE TABLE `diskon`  (
  `idDiskon` int(11) NOT NULL AUTO_INCREMENT,
  `gambarDiskon` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `namaDiskon` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `descDiskon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `potonganHarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `limit` int(11) NULL DEFAULT NULL,
  `tglAwal` date NULL DEFAULT NULL,
  `tglAkhir` date NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `idAdmin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idDiskon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diskon
-- ----------------------------
INSERT INTO `diskon` VALUES (14, '1685630257_msg-463887772-4920 (1).jpg', 'KEMERDEKAAN', 'Dapatkan potongan Rp. 50.000', '50000', 9, '2023-06-01', '2023-06-30', '2023-06-01 21:37:37', '2');
INSERT INTO `diskon` VALUES (15, '1685630257_msg-463887772-4920 (1).jpg', 'MERDEKA', 'Dapatkan potongan Rp. 50.000', '100000', 10, '2023-06-01', '2023-06-30', '2023-06-01 21:37:37', '2');
INSERT INTO `diskon` VALUES (16, '1685630257_msg-463887772-4920 (1).jpg', 'KOSANYAR', 'Dapatkan potongan Rp. 50.000', '50000', 10, '2023-06-06', '2023-06-30', '2023-06-01 21:37:37', '2');
INSERT INTO `diskon` VALUES (17, '1686067527_89bd7ab5a5101874c911cef0a663780e.png', 'SEMBILANSEMBILAN', 'Dapatkan potongan 99.999', '99999', 0, '2023-06-06', '2023-07-08', '2023-06-06 23:05:27', '2');

-- ----------------------------
-- Table structure for fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas`  (
  `idFasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `namaFasilitas` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fotoFasilitas` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `idAdmin` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idFasilitas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
INSERT INTO `fasilitas` VALUES (2, 'Parkir Motor', '1686067196_89bd7ab5a5101874c911cef0a663780e.png', '2023-05-24 23:12:59', 2);
INSERT INTO `fasilitas` VALUES (3, 'Parkir Mobil', '1686067187_89bd7ab5a5101874c911cef0a663780e.png', '2023-05-24 23:12:59', 2);
INSERT INTO `fasilitas` VALUES (4, 'Televisi', '1684945874_20230522_083641_0000.png', '2023-05-24 23:12:59', 2);
INSERT INTO `fasilitas` VALUES (7, 'AC', '1684945824_Frame 2.png', '2023-05-24 23:17:43', 2);
INSERT INTO `fasilitas` VALUES (8, 'Televisi Samsung', '1684945800_3011d8ae-986e-4831-ae73-3decbdc02f6e.jpg', '2023-05-24 23:21:02', 2);
INSERT INTO `fasilitas` VALUES (9, 'tessss', '1686067321_89bd7ab5a5101874c911cef0a663780e.png', '2023-06-06 23:02:01', 2);

-- ----------------------------
-- Table structure for fasilitas_pengelolaan
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas_pengelolaan`;
CREATE TABLE `fasilitas_pengelolaan`  (
  `idPengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `idFasilitas` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `hargaFasilitas` bigint(100) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  `namaFasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idPengelolaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 83 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas_pengelolaan
-- ----------------------------
INSERT INTO `fasilitas_pengelolaan` VALUES (64, 7, 2, 100000, '2023-05-24 23:17:43', '2023-05-24 23:17:43', NULL, 'AC');
INSERT INTO `fasilitas_pengelolaan` VALUES (65, 8, 2, 150000, '2023-05-24 23:21:02', '2023-05-24 23:21:02', NULL, 'Televisi');
INSERT INTO `fasilitas_pengelolaan` VALUES (66, 8, 2, 180000, '2023-05-24 23:23:54', '2023-05-24 23:23:54', NULL, 'Televisi Samsung');
INSERT INTO `fasilitas_pengelolaan` VALUES (67, 5, 2, 80000, '2023-05-24 23:24:07', '2023-05-24 23:24:07', NULL, 'Laundry');
INSERT INTO `fasilitas_pengelolaan` VALUES (68, 8, 2, 180000, '2023-05-24 23:30:00', '2023-05-24 23:30:00', NULL, 'Televisi Samsung');
INSERT INTO `fasilitas_pengelolaan` VALUES (69, 7, 2, 100000, '2023-05-24 23:30:06', '2023-05-24 23:30:06', NULL, 'AC');
INSERT INTO `fasilitas_pengelolaan` VALUES (70, 5, 2, 80000, '2023-05-24 23:30:16', '2023-05-24 23:30:16', NULL, 'Laundry');
INSERT INTO `fasilitas_pengelolaan` VALUES (71, 7, 2, 100000, '2023-05-24 23:30:24', '2023-05-24 23:30:24', NULL, 'AC');
INSERT INTO `fasilitas_pengelolaan` VALUES (72, 5, 2, 80000, '2023-05-24 23:30:37', '2023-05-24 23:30:37', NULL, 'Laundry');
INSERT INTO `fasilitas_pengelolaan` VALUES (73, 4, 2, 60000, '2023-05-24 23:31:14', '2023-05-24 23:31:14', NULL, 'Televisi');
INSERT INTO `fasilitas_pengelolaan` VALUES (74, 3, 2, 800000, '2023-05-25 20:33:21', '2023-05-25 20:33:21', NULL, 'Parkir Mobil');
INSERT INTO `fasilitas_pengelolaan` VALUES (75, 2, 2, 800000, '2023-06-01 20:42:46', '2023-06-01 20:42:46', NULL, 'Parkir Motor');
INSERT INTO `fasilitas_pengelolaan` VALUES (76, 3, 2, 800000, '2023-06-06 22:59:47', '2023-06-06 22:59:47', NULL, 'Parkir Mobil');
INSERT INTO `fasilitas_pengelolaan` VALUES (77, 2, 2, 800000, '2023-06-06 22:59:56', '2023-06-06 22:59:56', NULL, 'Parkir Motor');
INSERT INTO `fasilitas_pengelolaan` VALUES (78, 9, 2, 2321233, '2023-06-06 23:02:01', '2023-06-06 23:02:01', NULL, 'tessss');
INSERT INTO `fasilitas_pengelolaan` VALUES (79, 9, 2, 1000000, '2023-06-06 23:03:38', '2023-06-06 23:03:38', NULL, 'tessss');
INSERT INTO `fasilitas_pengelolaan` VALUES (80, 9, 2, 1000001, '2023-06-06 23:23:05', '2023-06-06 23:23:05', NULL, 'tessss');
INSERT INTO `fasilitas_pengelolaan` VALUES (81, 9, 2, 1000002, '2023-06-06 23:23:28', '2023-06-06 23:23:28', NULL, 'tessss');
INSERT INTO `fasilitas_pengelolaan` VALUES (82, 9, 2, 2321233, '2023-06-06 23:23:37', '2023-06-06 23:23:37', NULL, 'tessss');

-- ----------------------------
-- Table structure for kamar
-- ----------------------------
DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar`  (
  `idKamar` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin` int(11) NULL DEFAULT NULL,
  `idTipeKamar` int(11) NULL DEFAULT NULL,
  `nomorKamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('Tersedia','Tidak Tersedia') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`idKamar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kamar
-- ----------------------------
INSERT INTO `kamar` VALUES (15, 2, 69, '100', 'Tersedia', '2023-05-24 22:43:49', '2023-06-01 19:36:45', NULL);
INSERT INTO `kamar` VALUES (16, 2, 69, '155', 'Tersedia', '2023-05-25 20:29:43', '2023-06-01 19:37:15', NULL);
INSERT INTO `kamar` VALUES (17, 2, 65, '16', 'Tersedia', '2023-05-25 20:29:53', '2023-05-25 20:41:25', NULL);
INSERT INTO `kamar` VALUES (18, 2, 65, '17', 'Tersedia', '2023-06-08 20:12:44', '2023-06-08 20:12:44', NULL);

-- ----------------------------
-- Table structure for m_tipekamar
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar`;
CREATE TABLE `m_tipekamar`  (
  `idTipeKamar` int(11) NOT NULL AUTO_INCREMENT,
  `namaTipeKamar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnailKamar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idAdmin` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  `descTipeKamar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idTipeKamar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar
-- ----------------------------
INSERT INTO `m_tipekamar` VALUES (64, 'Delux', '1684942578_kamar2.jpg', 2, '2023-05-24 22:48:53', '2023-05-25 19:36:29', NULL, '<ul>\r\n	<li>Kamar Luas</li>\r\n	<li>Kasur Tumpuk</li>\r\n</ul>\r\n');
INSERT INTO `m_tipekamar` VALUES (65, 'Small', '1684943059_kamar1.jpg', 2, '2023-05-24 22:44:19', '2023-05-24 22:44:19', NULL, NULL);
INSERT INTO `m_tipekamar` VALUES (66, 'Reguler', '1684943084_kamar2.jpg', 2, '2023-05-24 22:44:44', '2023-05-24 22:44:44', NULL, NULL);
INSERT INTO `m_tipekamar` VALUES (68, 'Big', '1684943648_kamar5.jpg', 2, '2023-05-24 22:54:08', '2023-06-06 23:27:30', NULL, '');
INSERT INTO `m_tipekamar` VALUES (69, 'Medium', '1685018335_20230522_083641_0000.png', 2, '2023-05-25 19:38:55', '2023-05-25 19:38:55', NULL, '<p>Dalam rangka meningkatkan ketahanan nasional, Pemerintah Desa Tanggulrejo bekerja sama dengan Badan Pangan Nasional melaksanakan program pembagian beras kepada masyarakat Desa Tanggulrejo yang berstatus ekonomi rendah. Program ini dilakukan untuk memenuhi kebutuhan pokok masyarakat Indonesia dalam hal pangan dan menstabilkan harga bahan pokok di pasar.</p>\r\n\r\n<p>Dengan dibarengi oleh bapak Syaifuddin Zuhri selaku petugas Kantor Pos Manyar, program ini dapat berjalan lancar dan masyarakat datang beramai-ramai untuk mendapatkan bantuan beras.</p>\r\n\r\n<p>Selain itu, pihak Pemerintah Desa Tanggulrejo turut membantu melaksanakan program ini mulai dari menyiapkan lokasi yang bertempat di Gedung Serbaguna RT. 04, RW. 01 Dusun Tanggulrejo Utara, waktu pelaksanaan program pembagian beras, hingga pendataan masyarakat desa yang telah mendapatkan beras.</p>\r\n\r\n<p>Dengan membagikan beras sebanyak 10kg kepada 287 orang, Pemerintah berharap dapat menstabilkan harga pokok pangan pada kuartal ke-2 tahun ini.</p>\r\n');
INSERT INTO `m_tipekamar` VALUES (70, 'Kamar Kaya', '1685977916_40940701_292197488041925_2337109043983679488_n.jpg', 2, '2023-06-05 22:11:56', '2023-06-05 22:11:56', NULL, '<p>tes ting</p>\r\n');
INSERT INTO `m_tipekamar` VALUES (71, 'TES', '1685979856_3011d8ae-986e-4831-ae73-3decbdc02f6e.jpg', 2, '2023-06-05 22:44:16', '2023-06-05 22:44:16', NULL, '<p>ASDASDAS</p>\r\n');

-- ----------------------------
-- Table structure for m_tipekamar_foto
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar_foto`;
CREATE TABLE `m_tipekamar_foto`  (
  `idFotoKamar` int(11) NOT NULL AUTO_INCREMENT,
  `idTipeKamar` int(11) NULL DEFAULT NULL,
  `namaFoto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `idAdmin` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idFotoKamar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar_foto
-- ----------------------------
INSERT INTO `m_tipekamar_foto` VALUES (97, 64, '1684942578_kamar2.jpg', 2, '2023-05-24 22:36:18', '2023-05-24 22:36:18');
INSERT INTO `m_tipekamar_foto` VALUES (98, 64, '1684942578_kamar3.jpg', 2, '2023-05-24 22:36:18', '2023-05-24 22:36:18');
INSERT INTO `m_tipekamar_foto` VALUES (99, 64, '1684942578_kamar4.jpg', 2, '2023-05-24 22:36:18', '2023-05-24 22:36:18');
INSERT INTO `m_tipekamar_foto` VALUES (100, 64, '1684942578_kamar5.jpg', 2, '2023-05-24 22:36:18', '2023-05-24 22:36:18');
INSERT INTO `m_tipekamar_foto` VALUES (102, 65, '1684943059_kamar3.jpg', 2, '2023-05-24 22:44:19', '2023-05-24 22:44:19');
INSERT INTO `m_tipekamar_foto` VALUES (103, 65, '1684943059_kamar4.jpg', 2, '2023-05-24 22:44:19', '2023-05-24 22:44:19');
INSERT INTO `m_tipekamar_foto` VALUES (104, 65, '1684943059_kamar5.jpg', 2, '2023-05-24 22:44:19', '2023-05-24 22:44:19');
INSERT INTO `m_tipekamar_foto` VALUES (105, 66, '1684943084_kamar3.jpg', 2, '2023-05-24 22:44:44', '2023-05-24 22:44:44');
INSERT INTO `m_tipekamar_foto` VALUES (106, 66, '1684943084_kamar4.jpg', 2, '2023-05-24 22:44:44', '2023-05-24 22:44:44');
INSERT INTO `m_tipekamar_foto` VALUES (107, 66, '1684943084_kamar5.jpg', 2, '2023-05-24 22:44:44', '2023-05-24 22:44:44');
INSERT INTO `m_tipekamar_foto` VALUES (111, 68, '1684943648_checked.png', 2, '2023-05-24 22:54:08', '2023-05-24 22:54:08');
INSERT INTO `m_tipekamar_foto` VALUES (112, 68, '1684943648_header.jpg', 2, '2023-05-24 22:54:08', '2023-05-24 22:54:08');
INSERT INTO `m_tipekamar_foto` VALUES (113, 68, '1684943648_itb.png', 2, '2023-05-24 22:54:08', '2023-05-24 22:54:08');
INSERT INTO `m_tipekamar_foto` VALUES (114, 69, '1685018335_iconapp (1) (1).jpg', 2, '2023-05-25 19:38:55', '2023-05-25 19:38:55');
INSERT INTO `m_tipekamar_foto` VALUES (115, 70, '1685977916_iconapp (1).jpg', 2, '2023-06-05 22:11:56', '2023-06-05 22:11:56');
INSERT INTO `m_tipekamar_foto` VALUES (116, 71, '1685979856_iconapp.png', 2, '2023-06-05 22:44:16', '2023-06-05 22:44:16');

-- ----------------------------
-- Table structure for m_tipekamar_pengelolaan
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar_pengelolaan`;
CREATE TABLE `m_tipekamar_pengelolaan`  (
  `idPengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `idTipeKamar` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `hargaTipeKamar` bigint(100) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  `namaTipeKamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idPengelolaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar_pengelolaan
-- ----------------------------
INSERT INTO `m_tipekamar_pengelolaan` VALUES (58, 68, 2, 2000000, '2023-05-24 22:54:08', '2023-05-24 22:54:08', NULL, 'Big');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (59, 68, 2, 2000000, '2023-05-24 23:00:50', '2023-05-24 23:00:50', NULL, 'Big');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (60, 68, 2, 2500000, '2023-05-24 23:01:01', '2023-05-24 23:01:01', NULL, 'Big');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (61, 66, 2, 3000000, '2023-05-24 23:01:19', '2023-05-24 23:01:19', NULL, 'Reguler');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (62, 65, 2, 1000000, '2023-05-24 23:03:34', '2023-05-24 23:03:34', NULL, 'Small');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (63, 64, 2, 900000, '2023-05-24 23:03:52', '2023-05-24 23:03:52', NULL, 'Delux');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (64, 64, 2, 900000, '2023-05-25 19:32:46', '2023-05-25 19:32:46', NULL, 'Delux');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (65, 64, 2, 900000, '2023-05-25 19:36:29', '2023-05-25 19:36:29', NULL, 'Delux');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (66, 69, 2, 1400000, '2023-05-25 19:38:55', '2023-05-25 19:38:55', NULL, 'Medium');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (67, 70, 2, 1500, '2023-06-05 22:11:56', '2023-06-05 22:11:56', NULL, 'Kamar Kaya');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (68, 71, 2, 15000000, '2023-06-05 22:44:16', '2023-06-05 22:44:16', NULL, 'TES');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (69, 71, 2, 15000000, '2023-06-06 22:59:12', '2023-06-06 22:59:12', NULL, 'TES');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (70, 70, 2, 15004444, '2023-06-06 23:33:58', '2023-06-06 23:33:58', NULL, 'Kamar Kaya');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (71, 68, 2, 2500000444, '2023-06-06 23:34:10', '2023-06-06 23:34:10', NULL, 'Big');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `namaUser` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenisKelamin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nomorTelepon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (39, 'Satria', 'Pria', '1999-01-20', '083832204284', 'satria@gmail.com', 'MTIzNDU2Nzg5');
INSERT INTO `m_user` VALUES (41, 'Satria Tes', 'Pria', '2000-01-20', '083832204284', 'satriags@gmail.com', 'MTIzNDU=');
INSERT INTO `m_user` VALUES (42, 'Udin', 'Pria', '1999-01-20', '083838383883', 'yahi@gmail.com', 'MTIzNDU2Nzg5');
INSERT INTO `m_user` VALUES (43, 'yoooo', 'Pria', '0002-02-22', '2222222', 'yahi2@gmail.com', 'MTIzNDU2Nzg5');
INSERT INTO `m_user` VALUES (44, 'Giovanni', 'Pria', '2001-12-31', '083838388383', 'gio@gmail.com', 'MTIz');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NULL DEFAULT NULL,
  `idAdmin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `idTipeKamar` int(11) NULL DEFAULT NULL,
  `nomorKamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `namaTipeKamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggalWaktuTransaksi` datetime NULL DEFAULT current_timestamp(),
  `lamaSewa` int(11) NULL DEFAULT NULL,
  `buktiPembayaran` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pilihanDetailFasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('Diterima','Ditolak','Menunggu Pembayaran','Proses','Diterima dengan Pembaharuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Menunggu Pembayaran',
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `totalPembayaranNormal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'totalHarga yang dibayar tanpa diskon',
  `potonganHarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'potonga diskon yang didapat',
  `namaDiskon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `totalPembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'totalHarga yang dibayar + diskon jika ada',
  `awalSewa` date NULL DEFAULT NULL,
  `akhirSewa` date NULL DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idTransaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (3, 41, '2', 65, '15', 'Small', '2023-05-26 00:00:00', 3, '1685448809_20230522_083641_0000.png', 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Ditolak', '2023-06-05 20:00:47', '6420000', '0', NULL, '6420000', '2023-07-01', '2023-12-01', 'mohon maaf notanya salah');
INSERT INTO `transaksi` VALUES (5, 41, NULL, 65, '15', 'Small', '2023-05-29 19:59:56', 1, NULL, 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Diterima', '2023-06-05 20:00:47', '12840000', '0', NULL, '12840000', '2023-06-01', '2023-06-30', NULL);
INSERT INTO `transaksi` VALUES (6, 41, NULL, 65, '15', 'Small', '2023-05-29 19:59:56', 3, NULL, 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Ditolak', '2023-06-05 20:00:47', '12840000', '0', NULL, '12840000', '2023-07-01', '2023-12-01', 'Testing bro');
INSERT INTO `transaksi` VALUES (7, 41, '2', 65, '15', 'Small', '2023-05-29 19:59:56', 6, NULL, 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Diterima', '2023-06-05 20:00:47', '12840000', '0', NULL, '12840000', '2024-01-01', '2024-06-01', NULL);
INSERT INTO `transaksi` VALUES (8, 41, '2', 65, '16', 'Small', '2023-05-29 21:31:54', 3, '1685373032_WhatsApp Image 2023-04-29 at 22.16.37.jpeg', 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Diterima', '2023-06-05 20:00:47', '6420000', '0', NULL, '6420000', '2023-06-03', '2023-09-03', NULL);
INSERT INTO `transaksi` VALUES (9, 41, '2', 64, '100', 'Delux', '2023-05-30 20:52:28', 3, '1685621288_WhatsApp Image 2023-04-29 at 22.16.37 (1).jpeg', 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Ditolak', '2023-06-06 22:38:11', '6120000', '0', NULL, '6120000', '2023-05-30', '2023-08-30', 'Kamar telah penuh');
INSERT INTO `transaksi` VALUES (10, 41, '2', 64, '100', 'Delux', '2023-06-01 19:07:34', 3, '1685621268_WhatsApp Image 2023-04-29 at 22.16.37 (1).jpeg', 'Televisi Samsung,AC,Televisi', 'Ditolak', '2023-06-06 22:38:51', '3720000', '0', NULL, '3720000', '2023-06-01', '2023-09-01', 'kamar telah penuh');
INSERT INTO `transaksi` VALUES (11, 41, NULL, 64, '100', 'Delux', '2023-06-01 19:18:32', 1, NULL, 'Televisi Samsung,AC,Televisi', 'Menunggu Pembayaran', '2023-06-05 20:00:47', '1240000', '0', NULL, '1240000', '2023-06-01', '2023-07-01', NULL);
INSERT INTO `transaksi` VALUES (12, 41, '2', 65, '16', 'Small', '2023-06-05 20:03:15', 1, '1685970811_40940701_292197488041925_2337109043983679488_n.jpg', 'Televisi Samsung', 'Diterima', '2023-06-05 20:15:20', '1180000', '100000', 'MERDEKA', '1080000', '2023-06-05', '2023-07-05', NULL);
INSERT INTO `transaksi` VALUES (13, 41, '2', 65, '16', 'Small', '2023-06-05 20:09:58', 1, '1685970805_40940701_292197488041925_2337109043983679488_n.jpg', 'Televisi Samsung', 'Ditolak', '2023-06-06 22:41:03', '1180000', '0', '', '1180000', '2023-06-06', '2023-07-06', 'kamar telah penuh, silahkan pilih kamar yang lain');
INSERT INTO `transaksi` VALUES (14, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:03:34', 3, NULL, '', 'Menunggu Pembayaran', NULL, '4200000', '100000', 'MERDEKA', '4100000', '2023-06-06', '2023-09-06', NULL);
INSERT INTO `transaksi` VALUES (15, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:05:27', 3, '1686066513_131e8d77-4f25-43a5-aaf0-722e924ad773.jpeg', '', 'Proses', '2023-06-06 22:48:33', '4200000', '100000', 'MERDEKA', '4100000', '2023-06-06', '2023-09-06', NULL);
INSERT INTO `transaksi` VALUES (16, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:10:16', 3, NULL, '', 'Menunggu Pembayaran', NULL, '4200000', '100000', 'MERDEKA', '4100000', '2023-06-06', '2023-09-06', NULL);
INSERT INTO `transaksi` VALUES (17, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:11:10', 1, NULL, 'Televisi', 'Menunggu Pembayaran', NULL, '1460000', '100000', 'MERDEKA', '1360000', '2023-06-14', '2023-07-14', NULL);
INSERT INTO `transaksi` VALUES (18, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:11:30', 1, NULL, 'AC', 'Menunggu Pembayaran', NULL, '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', NULL);
INSERT INTO `transaksi` VALUES (19, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:11:55', 1, NULL, 'AC', 'Menunggu Pembayaran', NULL, '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', NULL);
INSERT INTO `transaksi` VALUES (20, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:13:53', 1, '1686066790_89bd7ab5a5101874c911cef0a663780e.png', 'AC', 'Proses', '2023-06-06 22:53:10', '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', NULL);
INSERT INTO `transaksi` VALUES (21, 41, NULL, 69, '100', 'Medium', '2023-06-06 22:16:24', 1, '1686066339_2f990bf5-95ff-4d92-b973-7db312148429.jpg', 'AC', 'Proses', '2023-06-06 22:45:39', '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', NULL);
INSERT INTO `transaksi` VALUES (22, 41, '2', 69, '100', 'Medium', '2023-06-06 22:19:58', 1, '1686065478_1632799789925.jpg', 'AC', 'Ditolak', '2023-06-06 22:41:37', '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', 'kamar telah penuh');
INSERT INTO `transaksi` VALUES (23, 41, '2', 69, '100', 'Medium', '2023-06-06 22:20:38', 1, '1686065409_09032023.png', 'AC', 'Ditolak', '2023-06-06 22:42:03', '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', 'kamar telah penuh, silahkan pilih yang lain');
INSERT INTO `transaksi` VALUES (24, 41, '2', 69, '100', 'Medium', '2023-06-06 22:20:48', 1, '1686065352_1629794995703.jpg', 'AC', 'Diterima', '2023-06-06 22:43:40', '1500000', '50000', 'KEMERDEKAAN', '1450000', '2023-06-20', '2023-07-20', NULL);
INSERT INTO `transaksi` VALUES (25, 41, '2', 69, '100', 'Medium', '2023-06-06 22:22:03', 3, '1686065325_131e8d77-4f25-43a5-aaf0-722e924ad773.jpeg', 'Televisi Samsung,AC,Televisi,Parkir Mobil', 'Diterima dengan Pembaharuan', '2023-06-08 21:16:42', '7620000', '50000', 'KOSANYAR', '7570000', '2023-06-07', '2023-09-07', NULL);
INSERT INTO `transaksi` VALUES (26, 41, '2', 65, '16', 'Small', '2023-06-06 22:24:36', 1, '1686065297_89bd7ab5a5101874c911cef0a663780e.png', 'Televisi Samsung,AC,Televisi,Parkir Motor', 'Ditolak', '2023-06-06 22:45:04', '2140000', '100000', 'MERDEKA', '2040000', '2023-09-06', '2023-10-06', 'tes tolak');
INSERT INTO `transaksi` VALUES (27, 41, '2', 65, '16', 'Small', '2023-06-06 23:14:23', 1, '1686068150_1629794995703.jpg', 'tessss,Televisi Samsung,AC,Televisi,Parkir Mobil,Parkir Motor', 'Diterima', '2023-06-08 20:05:46', '3940000', '99999', 'SEMBILANSEMBILAN', '3840001', '2023-05-08', '2023-06-08', NULL);

-- ----------------------------
-- Table structure for transaksi_pembaharuan
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembaharuan`;
CREATE TABLE `transaksi_pembaharuan`  (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NULL DEFAULT NULL,
  `idAdmin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `idTipeKamar` int(11) NULL DEFAULT NULL,
  `nomorKamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `namaTipeKamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggalWaktuTransaksi` datetime NULL DEFAULT current_timestamp(),
  `lamaSewa` int(11) NULL DEFAULT NULL,
  `buktiPembayaran` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pilihanDetailFasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('Diterima Perpanjangan','Ditolak Perpanjangan','Menunggu Pembayaran Perpanjangan','Proses','Diterima Pengembalian','Ditolak Pengembalian') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `totalPembayaranNormal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'totalHarga yang dibayar tanpa diskon',
  `potonganHarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'potonga diskon yang didapat',
  `namaDiskon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `totalPembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'totalHarga yang dibayar + diskon jika ada',
  `awalSewa` date NULL DEFAULT NULL,
  `akhirSewa` date NULL DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `idTransaksiRefrensi` int(11) NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detailLainnya` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idTransaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pembaharuan
-- ----------------------------
INSERT INTO `transaksi_pembaharuan` VALUES (28, 41, '2', 69, '100', 'Medium', '2023-06-08 20:39:59', 3, '1686232896_satriags-api.png', 'AC', 'Proses', '2023-06-09 21:02:10', '4500000', '50000', 'KEMERDEKAAN', '4450000', '2023-09-08', '2023-12-08', NULL, 25, 'Perpanjangan', NULL);
INSERT INTO `transaksi_pembaharuan` VALUES (29, 41, '2', 69, '155', 'Medium', '2023-06-08 21:09:59', 1, '1686233423_Screen Shot 2023-04-14 at 01.11.35.png', 'AC,Televisi', 'Proses', '2023-06-09 21:02:10', '1560000', '50000', 'KOSANYAR', '1510000', '2023-07-21', '2023-08-21', 'tolak perpanjangan', 24, 'Perpanjangan', NULL);
INSERT INTO `transaksi_pembaharuan` VALUES (30, 41, '2', 69, '100', 'Medium', '2023-06-09 20:53:25', 3, NULL, 'Televisi Samsung,AC', 'Diterima Perpanjangan', '2023-06-09 21:09:18', '5850000', '0', '', '5850000', '2023-06-07', '2023-06-07', NULL, 25, 'Pengurangan Fasilitas', '{\"idTransaksi\":\"25\",\"totalPembayaranUtuh\":\"7570000\",\"fasilitas\":[\"Televisi Samsung|360000\",\"AC|200000\"],\"totalPengembalianValue\":\"1720000\",\"BtnPenguranganFasilitas\":\"\"}');

SET FOREIGN_KEY_CHECKS = 1;
