-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Mar 2022 pada 15.54
-- Versi server: 10.5.12-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16699319_system_comment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`) VALUES
(1, 'arsyil', 'moch.arsyil@gmail.com', 'test comment\r\n'),
(2, 'arsyil', 'moch.arsyil@gmail.com', 'test comment\r\n'),
(3, 'arsyil', 'moch.arsyil@gmail.com', 'test comment\r\n'),
(4, 'arsyil', 'moch.arsyil@gmail.com', 'test comment\r\n'),
(5, 'arsyil', 'moch.arsyil@gmail.com', 'test comment\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `Nimd` int(10) NOT NULL,
  `Nama_Dsn` varchar(50) NOT NULL,
  `Jenis_Kelamind` varchar(50) NOT NULL,
  `Program_Studid` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`Nimd`, `Nama_Dsn`, `Jenis_Kelamind`, `Program_Studid`) VALUES
(1803040098, 'Dosen 2', 'Laki-Laki', 'Teknik Sipil'),
(1803040099, 'dosen 2', 'Laki-Laki', 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` int(10) NOT NULL,
  `Nama_Mhs` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL,
  `Program_Studi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama_Mhs`, `Jenis_Kelamin`, `Program_Studi`) VALUES
(1803040003, 'Mahasiswa 5', 'Laki-Laki', 'Teknik Informatika'),
(1803040004, 'Mahasiswa 4', 'Laki-Laki', 'Teknik Kimia'),
(1803040005, 'Mahasiswa 3', 'Perempuan', 'Teknik Sipil'),
(1803040007, 'Mahasiswa 2', 'Perempuan', 'Kedokteran'),
(1803040008, 'Mahasiswa 1', 'Perempuan', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_hp` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `user_email`, `password`, `user_hp`, `date`) VALUES
(1, 73181481217360369, 'arsyil', 'moch.arsyil@gmail.com', '123', '081280800414', '2021-06-21 00:55:19'),
(2, 38718000338, 'contoh1', '', '1234', '0', '2021-05-03 14:11:54'),
(4, 2151, 'haze', '', '1234', '0', '2021-06-20 14:12:57'),
(5, 704603039696642565, 'ayoo', 'anjay123@gmail.com', '123', '8125548', '2021-06-20 16:09:38'),
(11, 4793475098075143910, 'mantap', 'asdas@gmail.com', '123', '088454', '2021-06-21 06:54:04'),
(13, 4700898, 'lol', 'moch.arsyil@gmail.com', '123', '08554677', '2021-06-22 09:09:16'),
(14, 59507823, 'moch.arsyil.albany', 'arsyil@gmail.com', '123', '08546546', '2021-06-22 09:26:24'),
(15, 94871069094, 'asd', 'asd@gmail.com', '123', '1230932', '2022-03-02 06:59:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`Nimd`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
