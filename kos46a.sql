-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 19 Bulan Mei 2023 pada 16.04
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
(1, 'Gio', '087742037644', 'gio@gmail.com', 'YWRtaW5rdQ=='),
(2, 'Satria', '087742037644', 'satria@gmail.com', 'YWRtaW5rdQ==');

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
-- Struktur dari tabel `m_tipekamar`
--

CREATE TABLE `m_tipekamar` (
  `idTipeKamar` int(11) NOT NULL,
  `namaTipeKamar` varchar(500) NOT NULL,
  `thumbnailKamar` varchar(500) NOT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_tipekamar`
--

INSERT INTO `m_tipekamar` (`idTipeKamar`, `namaTipeKamar`, `thumbnailKamar`, `idAdmin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(42, 'Small', '1684502105_header.jpg', 2, '2023-05-19 21:00:55', NULL, NULL),
(43, 'Medium', '1684504734_logo46a.png', 1, '2023-05-19 21:00:55', NULL, NULL),
(50, 'Kos', '1684504728_kamarkos.png', 2, '2023-05-19 21:00:55', '2023-05-19 21:01:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(500) NOT NULL,
  `jenisKelamin` varchar(50) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nomorTelepon` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`idUser`, `namaUser`, `jenisKelamin`, `tanggalLahir`, `nomorTelepon`, `email`, `password`) VALUES
(39, 'Satria', 'Pria', '1999-01-20', '083832204284', 'satria@gmail.com', 'MTIzNDU2Nzg5'),
(41, 'Satria', 'Pria', '1999-01-20', '083832204284', 'satriags@gmail.com', 'MTIzNDU2Nzg5'),
(42, 'Udin', 'Pria', '1999-01-20', '083838383883', 'yahi@gmail.com', 'MTIzNDU2Nzg5'),
(43, 'yoooo', 'Pria', '0002-02-22', '2222222', 'yahi2@gmail.com', 'MTIzNDU2Nzg5'),
(44, 'Giovanni', 'Pria', '2001-12-31', '083838388383', 'gio@gmail.com', 'MTIz');

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
-- Indeks untuk tabel `m_tipekamar`
--
ALTER TABLE `m_tipekamar`
  ADD PRIMARY KEY (`idTipeKamar`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT untuk tabel `m_tipekamar`
--
ALTER TABLE `m_tipekamar`
  MODIFY `idTipeKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
