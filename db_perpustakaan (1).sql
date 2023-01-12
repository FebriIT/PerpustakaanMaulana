-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2023 pada 10.14
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
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
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `isbn`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `deskripsi`, `lokasi`, `cover`, `created_at`, `updated_at`) VALUES
(36, '99220119229', 'Febri', '2233', 'BUDI', 'DOKNWA', 2022, 11, 'dowadowa', 'Rak 2', 'WhatsApp_Image_2022-12-13_at_17.48.57-removebg-preview.png.1673190808.png', '2023-01-08 08:13:28', '2023-01-12 02:08:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `umur` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `kode_anggota`, `nip`, `nama`, `jk`, `nohp`, `umur`, `created_at`, `updated_at`) VALUES
(7, '1', '8020170172', 'Budi', 'Laki-Laki', '085266911477', 22, '2023-01-12 08:20:45', '2023-01-12 01:20:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_perpustakaan`
--

CREATE TABLE `kepala_perpustakaan` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(50) NOT NULL,
  `nip` varchar(24) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `umur` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepala_perpustakaan`
--

INSERT INTO `kepala_perpustakaan` (`id`, `kode_anggota`, `nip`, `nama`, `jk`, `nohp`, `umur`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(2, '3', '21211221', 'kaperpus', 'Laki-Laki', '085266911477', 22, '2023-01-12', '2023-01-12 09:07:45', '2023-01-12 02:07:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
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
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `transaksi_id`, `user_id`, `buku_id`, `sendto`, `status`, `created_at`, `updated_at`) VALUES
(125, 27, 17, 27, 1, 1, '2022-02-28 16:04:26', '2023-01-05 17:30:08'),
(126, 27, 17, 27, 17, 0, '2022-02-28 16:04:26', '2022-02-28 09:04:26'),
(127, 28, 21, 26, 1, 1, '2022-02-28 16:04:26', '2023-01-05 17:30:08'),
(128, 28, 21, 26, 21, 0, '2022-02-28 16:04:26', '2022-02-28 09:04:26'),
(131, 32, 19, 20, 1, 1, '2022-02-28 18:56:46', '2023-01-05 17:30:08'),
(132, 32, 19, 20, 19, 0, '2022-02-28 18:56:46', '2022-02-28 11:56:46'),
(133, 33, 24, 18, 1, 1, '2022-03-06 04:25:15', '2023-01-05 17:30:08'),
(134, 33, 24, 18, 24, 0, '2022-03-06 04:25:15', '2022-03-05 21:25:15'),
(135, 34, 16, 26, 1, 1, '2022-03-06 04:25:15', '2023-01-05 17:30:08'),
(136, 34, 16, 26, 16, 0, '2022-03-06 04:25:15', '2022-03-05 21:25:15'),
(137, 35, 15, 10, 1, 1, '2022-03-06 13:56:52', '2023-01-05 17:30:08'),
(138, 35, 15, 10, 15, 0, '2022-03-06 13:56:52', '2022-03-06 06:56:52'),
(141, 55, 135, 30, 1, 1, '2023-01-05 12:47:45', '2023-01-05 17:30:08'),
(142, 55, 135, 30, 135, 0, '2023-01-05 12:47:45', '2023-01-05 05:47:45'),
(143, 56, 135, 36, 1, 0, '2023-01-09 05:48:16', '2023-01-08 22:48:16'),
(144, 56, 135, 36, 135, 0, '2023-01-09 05:48:16', '2023-01-08 22:48:16'),
(145, 57, 1, 36, 1, 0, '2023-01-12 08:22:11', '2023-01-12 01:22:11'),
(146, 57, 1, 36, 1, 0, '2023-01-12 08:22:11', '2023-01-12 01:22:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(50) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `umur` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `kode_anggota`, `nisn`, `nama`, `jk`, `nohp`, `umur`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(3, '2', '155522', 'sudi', 'Laki-Laki', '21122222112', 22, '2023-01-26', 'dwadwad', '2023-01-12 08:21:55', '2023-01-12 01:21:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buku_id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `buku_id`, `kode_transaksi`, `tgl_pinjam`, `tgl_kembali`, `status`, `created_at`, `updated_at`) VALUES
(57, 1, 36, 'dwa12', '2023-01-12', '2023-01-15', 'Dipinjam', '2023-01-11 23:37:56', '2023-01-11 23:37:56'),
(59, 143, 36, '333', '2023-01-12', '2023-02-02', 'Dipinjam', '2023-01-12 02:08:16', '2023-01-12 02:08:16'),
(60, 146, 36, '22', '2023-01-12', '2023-01-31', 'Dipinjam', '2023-01-12 02:08:31', '2023-01-12 02:08:31'),
(61, 144, 36, '2e2e', '2023-01-12', '2023-01-09', 'Terlambat', '2023-01-12 02:08:52', '2023-01-12 02:08:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `akses` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_anggota` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `akses`, `no_anggota`, `name`, `jk`, `nohp`, `username`, `role`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'Admins', 'Perempuan', '081366520353', 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$e.rRYSuR51DjSlO/DuU0Uuq8vJtJY5QdPnGG1vyLVfplbE9styoOe', '0c0139ec3530077a8342a18064de0267.jpg', NULL, '2021-10-16 23:34:06', '2022-02-27 23:14:46'),
(143, NULL, 1, 'Budi', 'Laki-Laki', '085266911477', 'guru', 'guru', 'Budi@gmail.com', NULL, '$2y$10$jP.Zd..PuwPu5exWPpgyHe4Hf1hOm2UdS3YewNAyScldgLMRa.5rK', NULL, NULL, '2023-01-12 01:20:45', '2023-01-12 01:20:45'),
(144, NULL, 2, 'sudi', 'Laki-Laki', '21122222112', 'siswa', 'siswa', 'wdwadwa@dwak.com', NULL, '$2y$10$UUmyD6ULgekkz5kuaDC0HuUn.ELY0E7U/UPKL0OMPv8wRto3w6BHa', NULL, NULL, '2023-01-12 01:21:55', '2023-01-12 01:21:55'),
(146, NULL, 3, 'kaperpus', 'Laki-Laki', '085266911477', 'kaperpus', 'kaperpus', 'kaperpus@gmail.com', NULL, '$2y$10$5CAT5Hg1/bXIDIL7H7Xod.R.LCjlIuMNh/VYy6vq1a9tEZkOMMToy', NULL, NULL, '2023-01-12 02:07:45', '2023-01-12 02:07:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kepala_perpustakaan`
--
ALTER TABLE `kepala_perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kepala_perpustakaan`
--
ALTER TABLE `kepala_perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
