-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2025 pada 13.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calculations`
--

CREATE TABLE `calculations` (
  `id` int(11) NOT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `diskon` decimal(5,2) DEFAULT NULL,
  `nilai_diskon` decimal(15,2) DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `calculations`
--

INSERT INTO `calculations` (`id`, `harga`, `diskon`, `nilai_diskon`, `total_harga`, `created_at`) VALUES
(1, 1000.00, 12.00, 120.00, 880.00, '2025-01-29 06:54:52'),
(2, 12000.00, 12.00, 1440.00, 10560.00, '2025-01-29 06:56:38'),
(3, 12000.00, 12.00, 1440.00, 10560.00, '2025-01-29 06:58:29'),
(4, 999999999999.00, 12.00, 119999999999.88, 879999999999.12, '2025-01-29 06:59:32'),
(5, 1231231.00, 1.00, 12312.31, 1218918.69, '2025-01-29 07:00:52'),
(6, 123.00, 12.00, 14.76, 108.24, '2025-01-29 07:01:22'),
(7, 123.00, 100.00, 123.00, 0.00, '2025-01-29 07:01:44'),
(8, 122.00, 11.00, 13.42, 108.58, '2025-01-29 07:02:28'),
(9, 123.00, 12.00, 14.76, 108.24, '2025-01-29 07:08:27'),
(10, 1200.00, 12.00, 144.00, 1056.00, '2025-01-29 09:58:02'),
(11, 12000.00, 12.00, 1440.00, 10560.00, '2025-01-30 04:39:55'),
(12, 12000.00, 32.00, 3840.00, 8160.00, '2025-01-30 05:20:46'),
(13, 20000.00, 3.20, 640.00, 19360.00, '2025-01-30 05:21:35'),
(14, 2000000.00, 18.70, 374000.00, 1626000.00, '2025-01-30 05:28:53'),
(15, 0.50, 0.50, 0.00, 0.50, '2025-01-30 07:02:03'),
(16, 2.15, 2.20, 0.05, 2.10, '2025-01-30 07:02:42'),
(17, 4.00, 30.00, 1.20, 2.80, '2025-01-30 07:02:53'),
(18, 12000.00, 60.00, 7200.00, 4800.00, '2025-01-30 07:04:53'),
(19, 2000.00, 12.00, 240.00, 1760.00, '2025-01-30 07:07:38'),
(20, 1200.00, 12.00, 144.00, 1056.00, '2025-01-31 01:00:48'),
(21, 1200.00, 12.00, 144.00, 1056.00, '2025-02-03 01:00:48'),
(22, 122222.00, 2.70, 3299.99, 118922.01, '2025-02-03 01:42:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
