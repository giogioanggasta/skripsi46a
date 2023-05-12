-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2023 at 06:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos46a`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `namaAdmin` varchar(500) NOT NULL,
  `nomorTelepon` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `nomorTelepon`, `email`, `password`) VALUES
(1, 'Erick', '087742037644', 'erickadmin46a@gmail.com', 'jerapah12');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idFasilitas` int(11) NOT NULL,
  `namaFasilitas` varchar(500) NOT NULL,
  `hargaFasilitas` double NOT NULL,
  `fotoFasilitas` varchar(500) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `hargaFasilitas`, `fotoFasilitas`, `stok`) VALUES
(1, 'Air Conditioner', 250000, '', 15),
(2, 'Parkir Motor', 100000, '', 18),
(3, 'Parkir Mobil', 150000, '', 6),
(4, 'Televisi', 200000, '', 19),
(5, 'Laundry', 150000, '', 32);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `nomorKamar` int(11) NOT NULL,
  `tipeKamar` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`nomorKamar`, `tipeKamar`, `status`) VALUES
(1, 'Small', 'Tersedia'),
(2, 'Small', 'Tidak Tersedia'),
(3, 'Small', 'Tidak Tersedia'),
(4, 'Small', 'Tidak Tersedia'),
(5, 'Small', 'Tidak Tersedia'),
(6, 'Medium', 'Tidak Tersedia'),
(7, 'Medium', 'Tidak Tersedia'),
(8, 'Medium', 'Tersedia'),
(9, 'Medium', 'Tersedia'),
(10, 'Deluxe', 'Tidak Tersedia'),
(11, 'Deluxe', 'Tersedia'),
(12, 'Deluxe', 'Tidak Tersedia'),
(13, 'Deluxe', 'Tidak Tersedia'),
(14, 'Deluxe', 'Tersedia'),
(15, 'Deluxe', 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tipeKamar`
--

CREATE TABLE `tipeKamar` (
  `idTipeKamar` int(11) NOT NULL,
  `namaTipeKamar` varchar(500) NOT NULL,
  `hargaKamar` double NOT NULL,
  `fotoKamar` varchar(500) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipeKamar`
--

INSERT INTO `tipeKamar` (`idTipeKamar`, `namaTipeKamar`, `hargaKamar`, `fotoKamar`, `stok`) VALUES
(1, 'Small', 2250000, '', 1),
(2, 'Medium', 2500000, '', 2),
(3, 'Deluxe', 2850000, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `tanggalTransaksi` date NOT NULL,
  `waktuTransaksi` time NOT NULL,
  `lamaSewa` int(11) NOT NULL,
  `buktiPembayaran` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(500) NOT NULL,
  `jenisKelamin` varchar(50) NOT NULL,
  `nomorTelepon` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `jenisKelamin`, `nomorTelepon`, `email`, `password`) VALUES
(1, 'Greg', 'Pria', '087742036278', 'gregantoni@gmail.com', 'jerapah12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idFasilitas`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`nomorKamar`);

--
-- Indexes for table `tipeKamar`
--
ALTER TABLE `tipeKamar`
  ADD PRIMARY KEY (`idTipeKamar`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idFasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `nomorKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tipeKamar`
--
ALTER TABLE `tipeKamar`
  MODIFY `idTipeKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
