-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 08:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nip`, `nama`, `jk`, `nohp`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '333213123', 'admin', 'Laki-Laki', '089944922321', '2023-07-18', 'jambi', '2023-07-26 16:46:51', '2023-07-26 14:47:10'),
(3, '999211212', 'febri', 'Laki-Laki', '21212112', '2023-09-19', 'dwadwadwa', '2023-09-19 13:22:16', '2023-09-19 06:22:16'),
(4, '221918218', 'wdawdwak', 'Laki-Laki', '0812872112121', '2023-09-13', 'dwadwadaw', '2023-09-19 13:46:32', '2023-09-19 06:46:32'),
(5, '1029203929122', 'Febrie', 'Laki-Laki', '083293921123', '2000-02-20', 'dadwadwadwa', '2023-09-19 14:28:02', '2023-09-19 08:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_buku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` int(4) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `isbn`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `deskripsi`, `lokasi`, `cover`, `created_at`, `updated_at`) VALUES
(38, '2312323324', 'Penjas', NULL, 'Diana', 'Casandra', 2010, 100, 'Buku Pelajaran', 'Rak 3', 'buku penjas.jpg.1674579033.jpg', '2023-01-15 19:01:10', '2023-01-24 09:50:33'),
(39, '1234567', 'Kewarganegaraan', '342342343', 'Sutaji', 'Angga Ferdian', 2020, 50, 'Buku Pelajaran', 'Rak 1', 'buku pkn.jpg.1674578955.jpg', '2023-01-24 09:49:15', '2023-01-24 09:49:15'),
(40, '1213', 'Bahasa Indonesia', '4544564545', 'Putranto Abimanyu', 'Casandra', 2019, 30, 'Buku Pelajaran', 'Rak 5', 'Buku bahasa indo.jpg.1674579352.jpg', '2023-01-24 09:55:52', '2023-01-24 09:55:52'),
(41, '3123', 'Bahasa Inggris', '64575634523', 'Sugeng Raharjo', 'Wahyu Prakasa', 2019, 50, 'Buku Pelajaran', 'Rak 4', 'buku bahasa inggris.jpg.1674583085.jpg', '2023-01-24 10:58:05', '2023-01-24 10:58:05'),
(42, '45453452', 'Sembilu', '65664786', 'Diana', 'Kaesang', 2015, 10, 'Buku umum', 'Rak 3', 'novel sembilu.jpg.1674583234.jpg', '2023-01-24 11:00:34', '2023-01-24 11:00:34'),
(43, '3453235', 'Biologi', '3465657346', 'Putranto Abimanyu', 'Casandra', 2018, 49, 'Buku Pelajaran', 'Rak 2', 'biologi.jpg.1674583386.jpg', '2023-01-24 11:03:06', '2023-01-24 11:16:51'),
(44, '865674745', 'Kimia', '564564547', 'Angga Ferdian', 'Wahyu Prakasa', 2020, 29, 'Buku Pelajaran', 'Rak 2', 'kimia.jpg.1674583493.jpg', '2023-01-24 11:04:53', '2023-01-24 11:16:14'),
(45, '34452352', 'Matematika', '787856565', 'Sugeng Raharjo', 'Casandra', 2020, 30, 'Buku Pelajaran', 'Rak 3', 'matematika.jpg.1674583643.jpg', '2023-01-24 11:07:23', '2023-09-19 21:34:05'),
(46, '635634344', 'Ekonomi', '4254353638', 'Diana', 'Wahyu Prakasa', 2021, 22, 'Buku Pelajaran', 'Rak 1', 'ekonomi.jpg.1674583761.jpg', '2023-01-24 11:09:21', '2023-09-19 21:31:41'),
(47, '8567564564', 'Sosiologi', '675453454', 'boy', 'Kaesang', 2021, 26, 'Buku Pelajaran', 'Rak 5', 'Sosiologi.jpg.1674583867.jpg', '2023-01-24 11:11:07', '2023-07-26 09:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(13) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `jk`, `nohp`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(31, '19920302199802032001', 'Febri', 'Laki-Laki', '085266911477', '2000-02-20', 'febri', '2023-09-19 14:10:26', '2023-09-19 07:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_perpustakaan`
--

CREATE TABLE `kepala_perpustakaan` (
  `id` int(11) NOT NULL,
  `nip` varchar(24) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `sendto` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `transaksi_id`, `user_id`, `buku_id`, `sendto`, `status`, `created_at`, `updated_at`) VALUES
(125, 27, 17, 27, 1, 1, '2022-02-28 16:04:26', '2023-08-11 04:13:33'),
(126, 27, 17, 27, 17, 0, '2022-02-28 16:04:26', '2022-02-28 09:04:26'),
(127, 28, 21, 26, 1, 1, '2022-02-28 16:04:26', '2023-08-11 04:13:33'),
(128, 28, 21, 26, 21, 0, '2022-02-28 16:04:26', '2022-02-28 09:04:26'),
(131, 32, 19, 20, 1, 1, '2022-02-28 18:56:46', '2023-08-11 04:13:33'),
(132, 32, 19, 20, 19, 0, '2022-02-28 18:56:46', '2022-02-28 11:56:46'),
(133, 33, 24, 18, 1, 1, '2022-03-06 04:25:15', '2023-08-11 04:13:33'),
(134, 33, 24, 18, 24, 0, '2022-03-06 04:25:15', '2022-03-05 21:25:15'),
(135, 34, 16, 26, 1, 1, '2022-03-06 04:25:15', '2023-08-11 04:13:33'),
(136, 34, 16, 26, 16, 0, '2022-03-06 04:25:15', '2022-03-05 21:25:15'),
(137, 35, 15, 10, 1, 1, '2022-03-06 13:56:52', '2023-08-11 04:13:33'),
(138, 35, 15, 10, 15, 0, '2022-03-06 13:56:52', '2022-03-06 06:56:52'),
(141, 55, 135, 30, 1, 1, '2023-01-05 12:47:45', '2023-08-11 04:13:33'),
(142, 55, 135, 30, 135, 0, '2023-01-05 12:47:45', '2023-01-05 05:47:45'),
(143, 56, 135, 36, 1, 1, '2023-01-09 05:48:16', '2023-08-11 04:13:33'),
(144, 56, 135, 36, 135, 0, '2023-01-09 05:48:16', '2023-01-08 22:48:16'),
(145, 57, 1, 36, 1, 1, '2023-01-12 08:22:11', '2023-08-11 04:13:33'),
(146, 57, 1, 36, 1, 1, '2023-01-12 08:22:11', '2023-08-11 04:13:33'),
(147, 59, 143, 36, 1, 1, '2023-01-13 02:14:48', '2023-08-11 04:13:33'),
(148, 59, 143, 36, 143, 0, '2023-01-13 02:14:48', '2023-01-12 19:14:48'),
(149, 60, 146, 36, 1, 1, '2023-01-13 02:14:48', '2023-08-11 04:13:33'),
(150, 60, 146, 36, 146, 0, '2023-01-13 02:14:48', '2023-01-12 19:14:48'),
(151, 61, 144, 36, 1, 1, '2023-01-13 02:14:48', '2023-08-11 04:13:33'),
(152, 61, 144, 36, 144, 0, '2023-01-13 02:14:48', '2023-01-12 19:14:48'),
(153, 62, 143, 36, 1, 1, '2023-01-14 07:02:01', '2023-08-11 04:13:33'),
(154, 62, 143, 36, 143, 0, '2023-01-14 07:02:02', '2023-01-14 00:02:02'),
(155, 63, 144, 37, 1, 1, '2023-01-14 07:02:02', '2023-08-11 04:13:33'),
(156, 63, 144, 37, 144, 0, '2023-01-14 07:02:02', '2023-01-14 00:02:02'),
(157, 64, 144, 38, 1, 1, '2023-01-16 02:12:53', '2023-08-11 04:13:33'),
(158, 64, 144, 38, 144, 0, '2023-01-16 02:12:53', '2023-01-15 19:12:53'),
(159, 65, 158, 47, 1, 1, '2023-01-25 02:59:18', '2023-08-11 04:13:33'),
(160, 65, 158, 47, 158, 0, '2023-01-25 02:59:18', '2023-01-24 19:59:18'),
(161, 66, 149, 45, 1, 1, '2023-01-25 02:59:18', '2023-08-11 04:13:33'),
(162, 66, 149, 45, 149, 0, '2023-01-25 02:59:18', '2023-01-24 19:59:18'),
(163, 67, 155, 44, 1, 1, '2023-01-25 02:59:18', '2023-08-11 04:13:33'),
(164, 67, 155, 44, 155, 0, '2023-01-25 02:59:18', '2023-01-24 19:59:18'),
(169, 70, 154, 47, 1, 1, '2023-07-14 17:31:36', '2023-08-11 04:13:33'),
(170, 70, 154, 47, 154, 0, '2023-07-14 17:31:36', '2023-07-14 10:31:36'),
(171, 71, 148, 47, 1, 1, '2023-07-26 10:53:29', '2023-08-11 04:13:33'),
(172, 71, 148, 47, 148, 0, '2023-07-26 10:53:29', '2023-07-26 03:53:29'),
(175, 72, 146, 45, 1, 1, '2023-07-29 04:53:30', '2023-08-11 04:13:33'),
(176, 72, 146, 45, 146, 0, '2023-07-29 04:53:30', '2023-07-28 21:53:30'),
(177, 73, 174, 45, 1, 1, '2023-07-29 04:53:30', '2023-08-11 04:13:33'),
(178, 73, 174, 45, 174, 0, '2023-07-29 04:53:30', '2023-07-28 21:53:30'),
(179, 75, 1, 47, 1, 1, '2023-07-29 04:53:30', '2023-08-11 04:13:33'),
(180, 75, 1, 47, 1, 1, '2023-07-29 04:53:30', '2023-08-11 04:13:33'),
(181, 76, 146, 46, 1, 1, '2023-08-09 07:35:50', '2023-08-11 04:13:33'),
(182, 76, 146, 46, 146, 0, '2023-08-09 07:35:50', '2023-08-09 00:35:50'),
(185, 78, 205, 45, 1, 0, '2023-09-20 02:26:46', '2023-09-19 19:26:46'),
(186, 78, 205, 45, 205, 0, '2023-09-20 02:26:46', '2023-09-19 19:26:46'),
(187, 84, 205, 45, 1, 0, '2023-09-20 06:36:11', '2023-09-19 23:36:11'),
(188, 84, 205, 45, 205, 0, '2023-09-20 06:36:11', '2023-09-19 23:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `jk`, `nohp`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(26, '150501202020002', 'Febri', 'Laki-Laki', '122121121', '2000-02-20', 'adadwada', '2023-09-19 14:16:10', '2023-09-19 07:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buku_id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalterlambat` int(11) DEFAULT 0,
  `denda` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `buku_id`, `kode_transaksi`, `tgl_pinjam`, `tgl_kembali`, `status`, `totalterlambat`, `denda`, `created_at`, `updated_at`) VALUES
(78, 205, 45, 'TRS0452050001', '2023-09-17', '2023-09-19', 'Dikembalikan', 1, '1000', '2023-09-19 19:24:30', '2023-09-19 19:47:34'),
(79, 206, 46, 'TRS1462060078', '2023-09-20', '2023-09-25', 'Dikembalikan', 0, '0', '2023-09-19 19:49:12', '2023-09-19 19:52:39'),
(80, 205, 46, 'TRS2462050079', '2023-09-20', '2023-09-21', 'Dipinjam', 0, '0', '2023-09-19 21:24:42', '2023-09-19 21:24:42'),
(81, 205, 46, 'TRS3462050080', '2023-09-20', '2023-09-27', 'Dipinjam', 0, '0', '2023-09-19 21:26:39', '2023-09-19 21:26:39'),
(82, 205, 46, 'TRS4462050081', '2023-09-20', '2023-09-27', 'Dipinjam', 0, '0', '2023-09-19 21:27:54', '2023-09-19 21:27:54'),
(83, 205, 46, 'TRS5462050082', '2023-09-20', '2023-09-27', 'Dipinjam', 0, '0', '2023-09-19 21:31:41', '2023-09-19 21:31:41'),
(84, 205, 45, 'TRS6452050083', '2023-09-18', '2023-09-19', 'Terlambat', 0, '0', '2023-09-19 21:34:05', '2023-09-19 23:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `no_anggota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `no_anggota`, `name`, `jk`, `username`, `role`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Admins', 'Perempuan', 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$e.rRYSuR51DjSlO/DuU0Uuq8vJtJY5QdPnGG1vyLVfplbE9styoOe', NULL, NULL, '2021-10-16 23:34:06', '2022-02-27 23:14:46'),
(205, 31, '2020230031', 'Febri', 'Laki-Laki', '19920302199802032001', 'guru', NULL, NULL, '$2y$10$63KxLOk.hhHny85dyCf8sOvk5nrqTjO7X00LPhFgOgZdcBWTWwjlO', NULL, NULL, '2023-09-19 07:10:26', '2023-09-19 07:10:26'),
(206, 26, '1020230026', 'Febri', 'Laki-Laki', '150501202020002', 'siswa', NULL, NULL, '$2y$10$Zfb2Qdyg.FB0nOaR7rQ8iutmSzR.7oG8KMOEIjepBqy8ckVKEIQv.', NULL, NULL, '2023-09-19 07:16:10', '2023-09-19 07:16:10'),
(207, 5, '9120230005', 'Febrie', 'Laki-Laki', '1029203929122', 'admin', NULL, NULL, '$2y$10$LCRnYtuclmmWyuSWP8xYQu5.bORW6uU667vaOLEXXJW121gp.PL.K', NULL, NULL, '2023-09-19 07:28:02', '2023-09-19 08:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepala_perpustakaan`
--
ALTER TABLE `kepala_perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kepala_perpustakaan`
--
ALTER TABLE `kepala_perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
