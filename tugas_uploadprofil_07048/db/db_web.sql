-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2025 pada 15.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_profil`
--

CREATE TABLE `foto_profil` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto_profil`
--

INSERT INTO `foto_profil` (`id`, `id_pengguna`, `nama_file`, `lokasi_file`, `uploaded_at`) VALUES
(1, 2147483647, '12202307048_1744723287.jpg', 'profile_pics/12202307048_1744723287.jpg', '2025-04-15 13:21:27'),
(2, 2147483647, '22222222222_1744723765.png', 'profile_pics/22222222222_1744723765.png', '2025-04-15 13:29:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto_profil`
--
ALTER TABLE `foto_profil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto_profil`
--
ALTER TABLE `foto_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
