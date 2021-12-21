-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2021 pada 13.46
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '96a6abf652f5a4b20706d3e513514325', '2021-06-25 07:36:10'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'c391572c7b6938f00b36582551d2cad2', '2021-06-25 07:41:55'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'fd5b261f70917fa1664e1326802dd170', '2021-06-25 07:48:21'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', NULL, '2021-06-25 18:46:40'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '690594dca21dbfdc2bd2e4857317a918', '2021-06-30 15:35:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'Regular User/Kolektor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 07:49:50', 1),
(2, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 08:11:17', 1),
(3, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 08:12:47', 1),
(4, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 12:45:12', 1),
(5, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 12:45:49', 1),
(6, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 13:17:57', 1),
(7, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 19:25:01', 1),
(8, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 19:25:36', 1),
(9, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-25 22:39:26', 1),
(10, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-26 07:19:07', 1),
(11, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-26 12:50:06', 1),
(12, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-26 13:23:46', 1),
(13, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-26 14:11:00', 1),
(14, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-27 11:35:18', 1),
(15, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-28 06:43:52', 1),
(16, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-28 21:43:48', 1),
(17, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-28 23:36:01', 1),
(18, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-28 23:36:31', 1),
(19, '::1', 'h06216015@uinsby.ac.id', NULL, '2021-06-28 23:36:51', 0),
(20, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-28 23:37:00', 1),
(21, '::1', 'h06216015@uinsby.ac.id', NULL, '2021-06-28 23:39:48', 0),
(22, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-28 23:39:55', 1),
(23, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 00:13:28', 1),
(24, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 12:21:29', 1),
(25, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 12:23:26', 1),
(26, '::1', 'h06216015@uinsby.ac.id', NULL, '2021-06-29 12:25:56', 0),
(27, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 12:26:02', 1),
(28, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 12:26:29', 1),
(29, '::1', 'h06216015@uinsby.ac.id', NULL, '2021-06-29 12:26:52', 0),
(30, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 12:26:59', 1),
(31, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 13:55:06', 1),
(32, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-29 15:17:31', 1),
(33, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-29 20:36:02', 1),
(34, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-30 00:03:46', 1),
(35, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-30 00:05:18', 1),
(36, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-30 06:33:34', 1),
(37, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-30 10:50:42', 1),
(38, '::1', 'paduansuara@uinsby.ac.id', 4, '2021-06-30 15:37:24', 1),
(39, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-30 17:13:15', 1),
(40, '::1', 'h06216015@uinsby.ac.id', 2, '2021-06-30 17:14:12', 1),
(41, '::1', 'asnanmustakim126@gmail.com', 1, '2021-06-30 17:42:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All User'),
(2, 'manage-profile', 'Manage users\'s profile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_koleksi`
--

CREATE TABLE `kategori_koleksi` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_koleksi`
--

INSERT INTO `kategori_koleksi` (`id`, `kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Buku', '2021-06-25 22:18:03', NULL, NULL),
(2, 'Novel', '2021-06-26 15:37:43', '2021-06-26 15:37:43', NULL),
(3, 'DVD', '2021-06-30 14:21:33', '2021-06-30 14:58:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi`
--

CREATE TABLE `koleksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `tahun_terbit` char(5) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `foto1` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `foto2` varchar(255) DEFAULT 'default.jpg',
  `foto3` varchar(255) DEFAULT 'default.jpg',
  `foto4` varchar(255) DEFAULT 'default.jpg',
  `foto5` varchar(255) DEFAULT 'default.jpg',
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `koleksi`
--

INSERT INTO `koleksi` (`id`, `id_user`, `id_kategori`, `nama`, `slug`, `pengarang`, `tahun_terbit`, `penerbit`, `status`, `jumlah`, `tag`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 1, 'Naruto', 'asnanmustakim-1-naruto', 'Irfan Kurniawan', '2019', 'mTakim', 'Tersedia', 1, 'pendidikan', 'asnanmustakim-1-naruto-1.jpg', 'default.jpg', 'doraemon.jpg', 'default.jpg', 'default.jpg', 'Ini contoh deskripsi', '2021-06-26 03:02:50', '2021-06-29 13:59:49', NULL),
(4, 2, 2, 'Batman', 'asnanmustakim-2-batman', 'Asnan mustakim', '2005', 'mTakim', 'Tersedia', 10, 'olahraga', 'asnanmustakim-2-batman-1.jpg', 'asnanmustakim-2-batman-2.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Komik DC hero batman', '2021-06-27 19:15:51', '2021-06-28 10:36:54', NULL),
(6, 2, 1, 'Conan', 'asnanmustakim-1-conan', 'Andrian DF', '2007', 'Comsafect', 'Tersedia', 1, 'pendidikan,sejarah', 'asnanmustakim-1-conan-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Detektif Conan', '2021-06-29 13:56:57', '2021-06-29 13:56:57', NULL),
(7, 2, 1, 'Proposal Penawaran', 'asnanmustakim-1-proposal-penawaran', 'Yosep', '2007', 'Comsafect', 'Tersedia', 5, 'pendidikan', 'asnanmustakim-1-proposal-penawaran-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Proposal Penawaran', '2021-06-29 14:05:04', '2021-06-29 14:05:04', NULL),
(8, 2, 1, 'Memori', 'asnanmustakim-1-memori', 'Nurul Maulidiyah', '2020', 'mTakim', 'Tersedia', 1, 'pendidikan', 'asnanmustakim-1-memori-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Memori', '2021-06-29 14:07:54', '2021-06-29 14:07:54', NULL),
(9, 2, 1, 'Kisah Perjuangan B.J. Habibie', 'asnanmustakim-1-kisah-perjuangan-bj-habibie', 'Asnan mustakim', '2005', 'mTakim', 'Tersedia', 1, 'pendidikan', 'asnanmustakim-1-kisah-perjuangan-bj-habibie-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'deskripsi Kisah Perjuangan B.J. Habibie', '2021-06-29 14:09:57', '2021-06-29 14:09:57', NULL),
(10, 2, 1, 'Love in the Fast Lane', 'asnanmustakim-1-love-in-the-fast-lane', 'Amanda Peterson', '2016', 'mTakim', 'Tersedia', 2, 'pendidikan', 'asnanmustakim-1-love-in-the-fast-lane-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Love in the Fast Lane', '2021-06-29 14:12:27', '2021-06-29 14:12:27', NULL),
(11, 2, 1, 'Mystic Emperors of the Deep', 'asnanmustakim-1-mystic-emperors-of-the-deep', 'Tom Douglas', '2016', 'mTakim', 'Tersedia', 1, 'pendidikan', 'asnanmustakim-1-mystic-emperors-of-the-deep-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Mystic Emperors of the Deep', '2021-06-29 14:14:17', '2021-06-29 14:14:17', NULL),
(12, 2, 1, 'In the Heart of the Sea', 'asnanmustakim-1-in-the-heart-of-the-sea', 'Nathaniel Phlibrick', '2005', 'mTakim', 'Tersedia', 1, 'pendidikan', 'asnanmustakim-1-in-the-heart-of-the-sea-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi In the Heart of the Sea', '2021-06-29 14:16:20', '2021-06-29 14:16:20', NULL),
(13, 2, 1, 'Gandhi the Man', 'asnanmustakim-1-gandhi-the-man', 'Eaknat Eswaran', '2007', 'mTakim', 'Tersedia', 1, 'pendidikan', 'asnanmustakim-1-gandhi-the-man-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Gandhi the Man', '2021-06-29 14:20:18', '2021-06-29 14:20:18', NULL),
(14, 2, 1, 'Untuk Negeriku', 'asnanmustakim-1-untuk-negeriku', 'Mohammad Hatta', '1950', 'Taufik Abdullah', 'Tersedia', 3, 'pendidikan', 'asnanmustakim-1-untuk-negeriku-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Untuk Negeriku', '2021-06-29 14:22:23', '2021-06-29 14:22:23', NULL),
(15, 1, 2, 'Firegate Piramida Gunung Padang', 'asnanmtakim-2-firegate-piramida-gunung-padang', 'Rizky Ridyasmara', '2007', 'mTakim', 'Tersedia', 4, 'pendidikan,sejarah', 'asnanmtakim-2-firegate-piramida-gunung-padang-1.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'Deskripsi Novel Firegate Piramida Gunung Padang', '2021-06-29 21:10:37', '2021-06-29 21:10:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_koleksi` int(11) DEFAULT NULL,
  `informasi` varchar(225) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_koleksi`, `informasi`, `catatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '1 buku dipinjam teman, 1 buku rusak', 'buku yg dipinjam belum dikembalikan', '2021-06-29 11:06:29', '2021-06-29 11:06:29', NULL),
(4, 13, 'Buku hilang pada tanggal 29 Juni 2020', 'Catatan aja', '2021-06-29 20:04:24', '2021-06-29 20:04:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1624858230, 1),
(4, '2021-06-28-064928', 'App\\Database\\Migrations\\AlterTableUsers', 'default', 'App', 1624875071, 2),
(5, '2021-06-28-101846', 'App\\Database\\Migrations\\AlterTableUser', 'default', 'App', 1624875593, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_koleksi`
--

CREATE TABLE `tag_koleksi` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tag_koleksi`
--

INSERT INTO `tag_koleksi` (`id`, `tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pendidikan', NULL, NULL, NULL),
(2, 'sejarah', NULL, NULL, NULL),
(3, 'olahraga', NULL, NULL, NULL),
(4, 'fiksi', '2021-06-30 15:06:15', '2021-06-30 15:06:15', NULL),
(5, 'mainan', '2021-06-30 15:11:25', '2021-06-30 15:13:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `perpus` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT 'default.jpg',
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `fullname`, `address`, `phone`, `perpus`, `user_image`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asnanmustakim126@gmail.com', 'asnanmtakim', '$2y$10$d/fPMeiHQwPt3IOKCMvwh.kvVs6EiTDJStmg8sLnwLfnQi0Xa28DG', 'Asnan Mustakim', 'Bojonegoro', '082334282708', 'mTakim', 'default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-25 07:28:24', '2021-06-30 17:42:49', NULL),
(2, 'h06216015@uinsby.ac.id', 'asnanmustakim', '$2y$10$WxVAu/pov1jtDDWu2ieB5OO9kO6kA71kBDDrL2Z2aGxFtqSHHRNqa', 'M Asnan Mustakim', 'Jl. Kayangan Api RT 29 RW 03 Ds. Dander Kec. Dander Kab. Bojonegoro', '082334282708', 'Abatasa', 'h06216015uinsbyacid.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-25 07:41:00', '2021-06-28 23:47:29', NULL),
(3, 'festivalpsmuinsa2018@gmail.com', 'coba', '$2y$10$ImgWWYOXyyaXyYe9ndQfy.AOl1jCg1e/w2tXlLDFqDtJnO9hvOP8a', 'Paduan Suara', 'Surabaya', '085257610789', 'Padus', 'asnanmustakim126gmailcom.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-25 07:47:17', '2021-06-30 13:23:19', NULL),
(4, 'paduansuara@uinsby.ac.id', 'psmuinsa', '$2y$10$EWnmiiX3fJKKS299Yt3g1OxkOF4iVX7u2tYjJrhGJ44cOItGrmGKu', NULL, NULL, NULL, NULL, 'default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-30 15:35:06', '2021-06-30 15:35:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `kategori_koleksi`
--
ALTER TABLE `kategori_koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_koleksi` (`id_koleksi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tag_koleksi`
--
ALTER TABLE `tag_koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_koleksi`
--
ALTER TABLE `kategori_koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tag_koleksi`
--
ALTER TABLE `tag_koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_koleksi` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_koleksi` FOREIGN KEY (`id_koleksi`) REFERENCES `koleksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
