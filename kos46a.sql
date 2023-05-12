-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 12 Bulan Mei 2023 pada 16.40
-- Versi server: 10.11.0-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `namaAdmin` varchar(500) NOT NULL,
  `nomorTelepon` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `nomorTelepon`, `email`, `password`) VALUES
(1, 'Erick', '087742037644', 'erickadmin46a@gmail.com', 'jerapah12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idFasilitas` int(11) NOT NULL,
  `namaFasilitas` varchar(500) NOT NULL,
  `hargaFasilitas` double NOT NULL,
  `fotoFasilitas` varchar(500) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `hargaFasilitas`, `fotoFasilitas`, `stok`) VALUES
(1, 'Air Conditioner', 250000, '', 15),
(2, 'Parkir Motor', 100000, '', 18),
(3, 'Parkir Mobil', 150000, '', 6),
(4, 'Televisi', 200000, '', 19),
(5, 'Laundry', 150000, '', 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `nomorKamar` int(11) NOT NULL,
  `tipeKamar` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
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
-- Struktur dari tabel `tipekamar`
--

CREATE TABLE `tipekamar` (
  `idTipeKamar` int(11) NOT NULL,
  `namaTipeKamar` varchar(500) NOT NULL,
  `hargaKamar` double NOT NULL,
  `fotoKamar` varchar(500) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipekamar`
--

INSERT INTO `tipekamar` (`idTipeKamar`, `namaTipeKamar`, `hargaKamar`, `fotoKamar`, `stok`) VALUES
(1, 'Small', 2250000, '', 1),
(2, 'Medium', 2500000, '', 2),
(3, 'Deluxe', 2850000, '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `tanggalTransaksi` date NOT NULL,
  `waktuTransaksi` time NOT NULL,
  `lamaSewa` int(11) NOT NULL,
  `buktiPembayaran` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(500) NOT NULL,
  `jenisKelamin` varchar(50) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nomorTelepon` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `jenisKelamin`, `tanggalLahir`, `nomorTelepon`, `email`, `password`) VALUES
(39, 'Satria', 'Pria', '1999-01-20', '083832204284', 'satria@gmail.com', 'MTIzNDU2Nzg5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idFasilitas`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`nomorKamar`);

--
-- Indeks untuk tabel `tipekamar`
--
ALTER TABLE `tipekamar`
  ADD PRIMARY KEY (`idTipeKamar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idFasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `nomorKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tipekamar`
--
ALTER TABLE `tipekamar`
  MODIFY `idTipeKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
