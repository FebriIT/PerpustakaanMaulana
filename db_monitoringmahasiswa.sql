-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2023 pada 12.41
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
-- Database: `db_monitoringmahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktifitas`
--

CREATE TABLE `aktifitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `ipk` double DEFAULT 0,
  `semester` int(11) DEFAULT 1,
  `ukt` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` tinyint(11) DEFAULT 0,
  `pembangunan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status_pembangunan` tinyint(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktifitas`
--

INSERT INTO `aktifitas` (`id`, `mahasiswa_id`, `ipk`, `semester`, `ukt`, `status`, `pembangunan`, `status_pembangunan`, `created_at`, `updated_at`) VALUES
(106, 137, 0, 1, '0', 0, '0', 0, '2023-01-02 22:42:15', '2023-01-02 22:42:15');

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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(6, '01pt2', '2022-12-21 13:50:17', '2022-12-21 06:50:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `kelas_id`, `nim`, `nama`, `prodi`, `fakultas`, `created_at`, `updated_at`) VALUES
(137, 6, '8020170172', 'febri', 'Sistem Informasi', 'Ilmu Komputer', '2023-01-02 22:42:15', '2023-01-02 22:42:15');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_18_072913_create_mahasiswa', 1),
(6, '2022_12_18_073354_create_orangtua', 1),
(7, '2022_12_18_073856_create_presensi', 1),
(8, '2022_12_18_074654_create_aktifitas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `nohp1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id`, `user_id`, `nama_ortu`, `mahasiswa_id`, `nohp1`, `nohp2`, `alamat`, `created_at`, `updated_at`) VALUES
(106, 10, 'budi', 137, '085266911477', NULL, 'febrida', '2023-01-02 22:42:45', '2023-01-02 22:42:45');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matakuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal_kuliah` date NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nama_dosen`, `matakuliah`, `pertemuan_ke`, `tanggal_kuliah`, `status`, `created_at`, `updated_at`) VALUES
(101, 'Kolby Anderson DVM', 'Agricultural Manager', 51, '2019-05-11', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(102, 'Prof. Demarcus Lubowitz IV', 'Recordkeeping Clerk', 97, '1999-03-06', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(103, 'Henry Huel', 'Stone Cutter', 27, '1999-03-09', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(104, 'Charity Jakubowski IV', 'Medical Records Technician', 54, '2006-03-03', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(105, 'Kurtis Tillman DVM', 'Architectural Drafter', 98, '1987-06-08', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(106, 'Dr. Rusty Mayer PhD', 'Press Machine Setter, Operator', 91, '2011-08-11', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(107, 'Prof. Louisa Kuvalis IV', 'Bellhop', 38, '1975-04-13', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(108, 'Marilyne Bergnaum DDS', 'Criminal Investigator', 65, '1990-06-10', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(109, 'Dr. Hoyt Dietrich', 'User Experience Manager', 76, '1992-12-24', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(110, 'Roxanne Stokes', 'Horticultural Worker', 17, '2013-07-18', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(111, 'Rosie Rogahn', 'Soil Conservationist', 38, '1985-07-18', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(112, 'Ms. Karine Schumm', 'Spotters', 77, '1987-03-01', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(113, 'Anissa McLaughlin', 'Real Estate Sales Agent', 48, '1995-01-31', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(114, 'Mr. Drake Block DDS', 'Epidemiologist', 69, '2012-04-25', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(115, 'Felix Mertz', 'Nutritionist', 97, '1978-04-24', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(116, 'Camila Quitzon', 'Occupational Therapist Assistant', 29, '1991-06-24', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(117, 'Marcelo Lindgren', 'Heat Treating Equipment Operator', 96, '1991-06-30', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(118, 'Leslie Wehner', 'Plating Machine Operator', 99, '2000-07-06', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(119, 'Prof. Jacynthe Hickle V', 'Telephone Operator', 12, '2015-01-02', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(120, 'Hazel Konopelski', 'Clerk', 63, '2016-05-01', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(121, 'Mr. Vinnie Volkman', 'Agricultural Manager', 61, '1998-08-12', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(122, 'Kirsten Hermiston', 'Human Resource Manager', 59, '1979-10-14', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(123, 'Mr. London Hudson Sr.', 'Textile Knitting Machine Operator', 89, '1981-04-06', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(124, 'Brad Yost', 'Civil Engineer', 27, '2000-01-07', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(125, 'Octavia Koepp', 'Logistician', 29, '2002-11-08', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(126, 'Okey Bernhard', 'Electric Meter Installer', 72, '1998-12-22', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(127, 'River McLaughlin PhD', 'Chemical Technician', 37, '1976-02-27', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(128, 'Dr. Mable Sauer', 'Media and Communication Worker', 76, '1985-07-20', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(129, 'Prof. Erica Yundt', 'Pantograph Engraver', 12, '2022-03-10', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(130, 'Leslie Crona', 'Stock Clerk', 99, '1985-08-19', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(131, 'Kacie Larson', 'Jewelry Model OR Mold Makers', 44, '1996-03-03', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(132, 'Domingo McGlynn PhD', 'Council', 72, '1994-04-27', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(133, 'Dr. Wiley Fritsch III', 'Pharmacy Technician', 40, '2013-05-12', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(134, 'Meaghan Cartwright', 'Supervisor of Customer Service', 66, '1985-01-15', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(135, 'Mavis Hahn', 'Agricultural Manager', 36, '2013-12-20', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(136, 'Liana Borer', 'Commercial and Industrial Designer', 84, '1979-06-13', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(137, 'Mr. Christian Swift', 'Environmental Science Teacher', 96, '1990-11-12', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(138, 'Columbus Windler DVM', 'Nuclear Power Reactor Operator', 63, '1989-11-01', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(139, 'Nels Swaniawski Jr.', 'Food Cooking Machine Operators', 55, '2004-04-12', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(140, 'Dr. Kyleigh Luettgen', 'Cafeteria Cook', 11, '1971-06-01', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(141, 'Dr. Moises Skiles Sr.', 'Music Director', 11, '1993-08-19', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(142, 'Alfreda Daniel', 'Petroleum Engineer', 16, '2001-05-19', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(143, 'Consuelo Herzog', 'Network Systems Analyst', 92, '1992-04-27', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(144, 'Mr. Bernie Hills Jr.', 'Gaming Service Worker', 64, '1979-04-18', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(145, 'Jose Feest', 'Medical Assistant', 21, '2022-08-28', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(146, 'Eugenia Flatley', 'Glass Cutting Machine Operator', 88, '2017-03-16', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(147, 'Jalen Lakin', 'Machinery Maintenance', 8, '2000-04-09', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(148, 'Quinton Erdman', 'Manicurists', 12, '1992-01-11', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(149, 'Constance Tremblay', 'Real Estate Sales Agent', 69, '1984-03-27', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(150, 'Dr. Alf Bergnaum', 'Biomedical Engineer', 3, '2012-04-27', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(151, 'Prof. Deron Heaney', 'Production Inspector', 82, '1990-04-25', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(152, 'Eileen Kunze', 'Kindergarten Teacher', 70, '1976-09-18', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(153, 'Octavia Keebler', 'Sports Book Writer', 34, '1989-04-22', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(154, 'Kaylie Jast', 'Education Teacher', 57, '2011-12-27', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(155, 'Lukas Purdy', 'Gauger', 37, '1970-03-13', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(156, 'Torrance Dibbert', 'Maintenance Worker', 65, '2017-07-12', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(157, 'Melba Welch', 'Supervisor Fire Fighting Worker', 15, '2019-10-30', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(158, 'Sam Borer', 'Mathematician', 19, '1972-01-05', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(159, 'Kaylah Stehr', 'Mathematical Science Teacher', 48, '1972-11-03', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(160, 'Lyla Schulist PhD', 'Glass Blower', 82, '1995-11-05', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(161, 'Ervin Lakin', 'Cooling and Freezing Equipment Operator', 78, '1991-11-07', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(162, 'Justus Fay', 'Telemarketer', 98, '1983-07-17', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(163, 'Benny Glover', 'Animal Breeder', 64, '1970-01-19', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(164, 'Rhea Jacobi', 'Electrical Sales Representative', 44, '1993-01-27', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(165, 'Dr. Monserrate Stehr MD', 'Computer-Controlled Machine Tool Operator', 94, '2009-10-07', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(166, 'Leola Orn', 'Chemical Equipment Operator', 2, '1977-12-06', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(167, 'Riley Hodkiewicz', 'Homeland Security', 62, '1976-06-20', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(168, 'Asha O\'Kon', 'Training Manager OR Development Manager', 37, '1971-12-24', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(169, 'Vance Wolff', 'Transportation Attendant', 9, '2008-03-22', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(170, 'Ms. Pearlie Jast', 'City Planning Aide', 91, '2009-07-06', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(171, 'Maxime Pacocha', 'Carpet Installer', 87, '2005-02-08', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(172, 'Tanner Runolfsdottir II', 'Paving Equipment Operator', 97, '2010-12-15', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(173, 'Mrs. Wilhelmine Metz II', 'Recreational Vehicle Service Technician', 23, '1979-06-08', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(174, 'Angelo Grimes', 'Food Service Manager', 30, '1985-12-03', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(175, 'Prof. Aurelio Champlin', 'Material Movers', 12, '2003-07-04', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(176, 'Mr. Agustin Feil Jr.', 'Health Specialties Teacher', 2, '2000-07-22', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(177, 'Tyson Ferry', 'Pipelayer', 23, '1973-09-20', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(178, 'Brianne Fisher', 'Radar Technician', 79, '2017-05-19', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(179, 'Helga O\'Hara', 'Set Designer', 41, '1996-11-06', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(180, 'Ambrose Schimmel', 'Auditor', 92, '1983-08-24', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(181, 'Angela VonRueden', 'Material Moving Worker', 55, '2005-04-25', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(182, 'Jazmin Leannon', 'Air Crew Officer', 84, '2010-11-27', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(183, 'Helen Cremin', 'Health Specialties Teacher', 58, '2000-11-09', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(184, 'Name O\'Hara', 'Compensation and Benefits Manager', 17, '1991-09-17', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(185, 'Jonatan Mitchell', 'Cabinetmaker', 28, '2003-05-03', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(186, 'Maddison Champlin', 'Architect', 31, '2000-08-11', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(187, 'Alyson Bogisich', 'Storage Manager OR Distribution Manager', 42, '2001-03-23', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(188, 'Cyril Greenholt Jr.', 'Molding and Casting Worker', 77, '1987-02-18', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(189, 'Malinda Padberg', 'Agricultural Crop Farm Manager', 25, '1976-01-05', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(190, 'Mr. Kadin O\'Reilly MD', 'Janitorial Supervisor', 9, '1978-07-08', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(191, 'Wallace Sauer', 'Gas Processing Plant Operator', 1, '2003-03-04', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(192, 'Prof. May Cormier', 'Podiatrist', 73, '1991-01-15', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(193, 'Bonita Flatley', 'Plating Operator', 2, '2016-07-08', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(194, 'Deion Krajcik', 'Audio and Video Equipment Technician', 35, '1970-06-02', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(195, 'Aron Wolf', 'Athletic Trainer', 1, '1998-08-03', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(196, 'Prof. Finn Lind', 'Travel Clerk', 56, '2012-06-16', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(197, 'Davonte Flatley', 'Courier', 83, '2000-12-09', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(198, 'Lorine Kuhic', 'Therapist', 57, '2003-10-02', 'Not Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(199, 'Kenyon Rau I', 'Silversmith', 9, '2011-11-25', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22'),
(200, 'Jamil Renner', 'Archivist', 76, '1986-12-22', 'Active', '2022-12-18 01:21:22', '2022-12-18 01:21:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', '2022-12-18 01:11:16', '$2y$10$UE6l9IYRWoAcJW0cUArbouFdRAJfHj9a.H2AurQvh24o61i7dd7a2', NULL, 'cL4HVvIDXkhLrKfQ9pFuFxJO82buUHFhFumeP2nAIiistlR4him4OcSftMNv', '2022-12-18 01:11:16', '2022-12-18 01:11:16'),
(10, 'budi', '085266911477', 'user', NULL, NULL, '$2y$10$E5Mf4Q4bfeiz19nhAnwzRemcSiTbp43LIj4FHt3UtcDCyAf.YX.wO', NULL, NULL, '2023-01-02 22:42:45', '2023-01-02 22:42:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
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
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
