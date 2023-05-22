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

 Date: 22/05/2023 21:21:25
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
  `hargaFasilitas` double NOT NULL,
  `fotoFasilitas` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`idFasilitas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
INSERT INTO `fasilitas` VALUES (1, 'Air Conditioner', 250000, '', 15);
INSERT INTO `fasilitas` VALUES (2, 'Parkir Motor', 100000, '', 18);
INSERT INTO `fasilitas` VALUES (3, 'Parkir Mobil', 150000, '', 6);
INSERT INTO `fasilitas` VALUES (4, 'Televisi', 200000, '', 19);
INSERT INTO `fasilitas` VALUES (5, 'Laundry', 150000, '', 32);

-- ----------------------------
-- Table structure for kamar
-- ----------------------------
DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar`  (
  `nomorKamar` int(11) NOT NULL AUTO_INCREMENT,
  `tipeKamar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nomorKamar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kamar
-- ----------------------------
INSERT INTO `kamar` VALUES (1, 'Small', 'Tersedia');
INSERT INTO `kamar` VALUES (2, 'Small', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (3, 'Small', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (4, 'Small', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (5, 'Small', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (6, 'Medium', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (7, 'Medium', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (8, 'Medium', 'Tersedia');
INSERT INTO `kamar` VALUES (9, 'Medium', 'Tersedia');
INSERT INTO `kamar` VALUES (10, 'Deluxe', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (11, 'Deluxe', 'Tersedia');
INSERT INTO `kamar` VALUES (12, 'Deluxe', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (13, 'Deluxe', 'Tidak Tersedia');
INSERT INTO `kamar` VALUES (14, 'Deluxe', 'Tersedia');
INSERT INTO `kamar` VALUES (15, 'Deluxe', 'Tidak Tersedia');

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
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar
-- ----------------------------
INSERT INTO `m_tipekamar` VALUES (42, 'Small', '1684502105_header.jpg', 2, '2023-05-19 21:00:55', NULL, NULL);
INSERT INTO `m_tipekamar` VALUES (43, 'Medium', '1684762813_msg-463887772-4921.jpg', 2, '2023-05-19 21:00:55', '2023-05-22 20:40:13', NULL);
INSERT INTO `m_tipekamar` VALUES (50, 'Kos', '1684504728_kamarkos.png', 2, '2023-05-19 21:00:55', '2023-05-19 21:01:48', NULL);
INSERT INTO `m_tipekamar` VALUES (51, 'Royal', '1684762836_Screen Shot 2023-04-14 at 01.11.35.png', 2, '2023-05-22 20:40:36', '2023-05-22 20:40:36', NULL);

-- ----------------------------
-- Table structure for m_tipekamar_pengelolaan
-- ----------------------------
DROP TABLE IF EXISTS `m_tipekamar_pengelolaan`;
CREATE TABLE `m_tipekamar_pengelolaan`  (
  `idPengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `idTipeKamar` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `harga` bigint(100) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`idPengelolaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tipekamar_pengelolaan
-- ----------------------------
INSERT INTO `m_tipekamar_pengelolaan` VALUES (52, 42, 2, 1000000, '2023-05-22 20:49:45', NULL, NULL);
INSERT INTO `m_tipekamar_pengelolaan` VALUES (53, 43, 2, 1500000, '2023-05-22 21:02:22', '2023-05-22 21:02:27', NULL);
INSERT INTO `m_tipekamar_pengelolaan` VALUES (54, 50, 2, 2000000, '2023-05-22 21:02:22', '2023-05-22 21:02:32', NULL);
INSERT INTO `m_tipekamar_pengelolaan` VALUES (55, 51, 2, 2500000, '2023-05-22 21:02:22', '2023-05-22 21:02:35', NULL);
INSERT INTO `m_tipekamar_pengelolaan` VALUES (56, 42, 1, 1100000, '2023-05-22 21:03:10', '2023-05-22 21:03:10', NULL);
INSERT INTO `m_tipekamar_pengelolaan` VALUES (57, 43, 2, 1550000, '2023-05-22 21:02:23', '2023-05-22 21:10:52', NULL);

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
