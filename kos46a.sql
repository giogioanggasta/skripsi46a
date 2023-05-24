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

 Date: 24/05/2023 23:40:24
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
INSERT INTO `admin` VALUES (1, 'Gio', '087742037644', 'gio@gmail.com', 'YWRtaW5rdQ==');
INSERT INTO `admin` VALUES (2, 'Satria', '087742037644', 'satria@gmail.com', 'YWRtaW5rdQ==');

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
INSERT INTO `fasilitas` VALUES (2, 'Parkir Motor', '', '2023-05-24 23:12:59', NULL);
INSERT INTO `fasilitas` VALUES (3, 'Parkir Mobil', '', '2023-05-24 23:12:59', NULL);
INSERT INTO `fasilitas` VALUES (4, 'Televisi', '1684945874_20230522_083641_0000.png', '2023-05-24 23:12:59', 2);
INSERT INTO `fasilitas` VALUES (7, 'AC', '1684945824_Frame 2.png', '2023-05-24 23:17:43', 2);
INSERT INTO `fasilitas` VALUES (8, 'Televisi Samsung', '1684945800_3011d8ae-986e-4831-ae73-3decbdc02f6e.jpg', '2023-05-24 23:21:02', 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kamar
-- ----------------------------
INSERT INTO `kamar` VALUES (15, 2, 64, '100', 'Tersedia', '2023-05-24 22:43:49', '2023-05-24 22:43:49', NULL);

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
  PRIMARY KEY (`idTipeKamar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar
-- ----------------------------
INSERT INTO `m_tipekamar` VALUES (64, 'Delux', '1684942578_kamar2.jpg', 2, '2023-05-24 22:48:53', '2023-05-24 22:48:53', NULL);
INSERT INTO `m_tipekamar` VALUES (65, 'Small', '1684943059_kamar1.jpg', 2, '2023-05-24 22:44:19', '2023-05-24 22:44:19', NULL);
INSERT INTO `m_tipekamar` VALUES (66, 'Reguler', '1684943084_kamar2.jpg', 2, '2023-05-24 22:44:44', '2023-05-24 22:44:44', NULL);
INSERT INTO `m_tipekamar` VALUES (68, 'Big', '1684943648_kamar5.jpg', 2, '2023-05-24 22:54:08', '2023-05-24 22:54:08', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 114 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar_pengelolaan
-- ----------------------------
INSERT INTO `m_tipekamar_pengelolaan` VALUES (58, 68, 2, 2000000, '2023-05-24 22:54:08', '2023-05-24 22:54:08', NULL, 'Big');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (59, 68, 2, 2000000, '2023-05-24 23:00:50', '2023-05-24 23:00:50', NULL, 'Big');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (60, 68, 2, 2500000, '2023-05-24 23:01:01', '2023-05-24 23:01:01', NULL, 'Big');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (61, 66, 2, 3000000, '2023-05-24 23:01:19', '2023-05-24 23:01:19', NULL, 'Reguler');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (62, 65, 2, 1000000, '2023-05-24 23:03:34', '2023-05-24 23:03:34', NULL, 'Small');
INSERT INTO `m_tipekamar_pengelolaan` VALUES (63, 64, 2, 900000, '2023-05-24 23:03:52', '2023-05-24 23:03:52', NULL, 'Delux');

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
INSERT INTO `m_user` VALUES (41, 'Satria', 'Pria', '1999-01-20', '083832204284', 'satriags@gmail.com', 'MTIzNDU2Nzg5');
INSERT INTO `m_user` VALUES (42, 'Udin', 'Pria', '1999-01-20', '083838383883', 'yahi@gmail.com', 'MTIzNDU2Nzg5');
INSERT INTO `m_user` VALUES (43, 'yoooo', 'Pria', '0002-02-22', '2222222', 'yahi2@gmail.com', 'MTIzNDU2Nzg5');
INSERT INTO `m_user` VALUES (44, 'Giovanni', 'Pria', '2001-12-31', '083838388383', 'gio@gmail.com', 'MTIz');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalTransaksi` date NOT NULL,
  `waktuTransaksi` time NOT NULL,
  `lamaSewa` int(11) NOT NULL,
  `buktiPembayaran` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idTransaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
