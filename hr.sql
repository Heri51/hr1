-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Okt 2024 pada 03.53
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gaji` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tgl_lahir`, `gaji`) VALUES
(8, 'heri', '2024-10-19', 1.00),
(9, 'setiawan', '2024-10-10', 1500.00);

--
-- Trigger `karyawan`
--
DELIMITER $$
CREATE TRIGGER `tlog_karyawan_delete` AFTER DELETE ON `karyawan` FOR EACH ROW BEGIN
    INSERT INTO tlog (tanggal, jam, keterangan)
    VALUES (CURRENT_DATE, CURRENT_TIME, CONCAT('Data karyawan dihapus. ID: ', OLD.id, ', Nama: ', OLD.nama));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tlog_karyawan_insert` AFTER INSERT ON `karyawan` FOR EACH ROW BEGIN
    INSERT INTO tlog (tanggal, jam, keterangan)
    VALUES (CURRENT_DATE, CURRENT_TIME, CONCAT('Data karyawan ditambahkan. ID: ', NEW.id, ', Nama: ', NEW.nama));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tlog_karyawan_update` AFTER UPDATE ON `karyawan` FOR EACH ROW BEGIN
    INSERT INTO tlog (tanggal, jam, keterangan)
    VALUES (CURRENT_DATE, CURRENT_TIME, CONCAT('Data karyawan diperbarui. ID: ', NEW.id, ', Nama: ', NEW.nama));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tlog`
--

CREATE TABLE `tlog` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tlog`
--

INSERT INTO `tlog` (`id`, `tanggal`, `jam`, `keterangan`) VALUES
(1, '2024-10-21', '09:34:12', 'Log 1'),
(2, '2024-10-21', '09:34:12', 'Log 2'),
(3, '2024-10-21', '10:10:21', 'Data karyawan ditambahkan. ID: 3, Nama: q12121'),
(4, '2024-10-21', '10:10:47', 'Data karyawan ditambahkan. ID: 4, Nama: asas'),
(5, '2024-10-21', '10:19:17', 'Data karyawan ditambahkan. ID: 5, Nama: 23'),
(6, '2024-10-21', '10:24:08', 'Data karyawan dihapus. ID: 5, Nama: 23'),
(7, '2024-10-21', '10:24:11', 'Data karyawan dihapus. ID: 4, Nama: asas'),
(8, '2024-10-21', '10:24:12', 'Data karyawan dihapus. ID: 3, Nama: q12121'),
(9, '2024-10-21', '10:30:46', 'Data karyawan ditambahkan. ID: 6, Nama: Al'),
(10, '2024-10-21', '10:31:44', 'Data karyawan diperbarui. ID: 6, Nama: AlA'),
(11, '2024-10-21', '10:31:47', 'Data karyawan dihapus. ID: 6, Nama: AlA'),
(12, '2024-10-21', '10:32:11', 'Data karyawan dihapus. ID: 2, Nama: Setiawan Heri'),
(13, '2024-10-21', '10:34:53', 'Data karyawan ditambahkan. ID: 7, Nama: 1'),
(14, '2024-10-21', '10:34:56', 'Data karyawan dihapus. ID: 7, Nama: 1'),
(15, '2024-10-21', '10:39:40', 'Data karyawan diperbarui. ID: 1, Nama: Heri Setiawan'),
(16, '2024-10-21', '10:39:54', 'Data karyawan dihapus. ID: 1, Nama: Heri Setiawan'),
(17, '2024-10-21', '10:40:18', 'Data karyawan ditambahkan. ID: 8, Nama: heri'),
(18, '2024-10-21', '10:40:37', 'Data karyawan ditambahkan. ID: 9, Nama: setiawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Heri', 'admin@gmail.com', 'pass123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tlog`
--
ALTER TABLE `tlog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tlog`
--
ALTER TABLE `tlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
