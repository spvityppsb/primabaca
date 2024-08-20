-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2024 at 08:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint UNSIGNED NOT NULL,
  `kode_buku` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rak` text COLLATE utf8mb4_unicode_ci,
  `stok_buku` int DEFAULT NULL,
  `foto_buku` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` text COLLATE utf8mb4_unicode_ci,
  `tahun_terbit` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `nama_buku`, `penerbit`, `rak`, `stok_buku`, `foto_buku`, `created_at`, `updated_at`, `penulis`, `isbn`, `tahun_terbit`) VALUES
(1, '123', 'TIK', 'Gramedia', '2', 2, 'TIK.jpg', '2024-04-08 22:53:20', '2024-04-24 02:47:09', 'adi', '978-602-03-2305-3', '2022'),
(2, '124', 'Paper Umberella', 'Sinar', '4', 1, 'Paper Umberella.jpg', '2024-04-08 22:54:08', '2024-04-08 22:54:08', NULL, NULL, NULL),
(3, '125', 'Kamus Indonesi', 'Erlangga', '3', 1, 'Kamus Indonesia.jpg', '2024-04-08 22:54:44', '2024-04-08 22:54:44', NULL, NULL, NULL),
(4, '126', 'Bahasa Indonesia Nina Epan', 'unknown', '1', 1, 'Bahasa Indonesia Nina epan.jpg', '2024-04-08 22:55:17', '2024-04-08 22:55:17', NULL, NULL, NULL),
(7, 'YP.1194 NF', 'Harga Sebuah Loyalitas', NULL, '1', 1, NULL, '2024-04-24 04:23:21', '2024-04-24 04:28:56', 'Tasirun Sulaiman', NULL, NULL),
(8, 'SLTP.034', 'Jalan Menikung', NULL, '3', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Umar Kayam', NULL, NULL),
(9, 'YP.6933NF', 'Teknik Menulis Cerita Rakyat', NULL, '808 RAM t', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Korrie Layun Rampan', NULL, NULL),
(10, 'YP.8636FI678FYP8678F', 'Sang Alkemis', 'PT. Gramedia Pustaka Utama', '813 PAU s', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Paulu Coelho', '978-602-03-2305-3', '2019'),
(11, 'SLTP 1085SLTP.1130', 'Gending-Gending Karawitan Jawa Lengkap Slendro-Pelog Jilid 3', NULL, '781.6 KOP g.3.2', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Ki Harsono Kodrat', NULL, NULL),
(12, 'YP.537RYP.542RYP.543RYP.541R', 'Dictionary Of Slang ( Kamus Slang )', NULL, NULL, NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'M.T. Luthan', NULL, NULL),
(13, 'SD.16511102', 'Mengenal Ilmu : Indera Perasa dan Pencium', 'Grolier International Inc', '621.47 WRI m', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Lilian Wright', '979-8087-84-4', '2007'),
(14, 'SLTP.4929', 'Teleskop', NULL, '621 BEN t', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', NULL, NULL, NULL),
(15, 'YP.3020NF', 'Riset Menakjubkan - Memerangi Penyakit dan Mencapai Kesehatan Optimal', 'Indonesia Publishing House', '641 NED r', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Neil Nedley, M.D.', NULL, '2009'),
(16, 'YP.1515NF', 'Panduan Lengkap Kelapa Sawit', 'Penebar Sadaya', '634.5 PAH p.1', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Iyung Pahan', '9790000000000', '2008'),
(17, 'SLTP.5177', 'Hoegeng', 'Pustaka Sinar Harapan', '920 YUS h.2', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Abrar Yusra', NULL, '1994'),
(18, 'YP.6702NFYP.6699NFYP.6700NFYP.6701NFYP.6698NF', 'Peranan Indonesia di Dunia Internasional', 'Genesindo,', '327.1 SAN p.1', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Budi Sanjaya', '9790000000000', '2010'),
(19, 'SLTP.5569', 'Pedoman Pengajaran Apresiasi Puisi SLTP & SLTA untuk Guru dan Siswa', NULL, '808.1 SUM p.1', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Drs.Sumardi', NULL, NULL),
(20, 'YP.8550406', 'Surat Bagimu Negeri', 'Kompas', '303.48 MAN', NULL, NULL, '2024-04-24 04:23:21', '2024-04-24 04:23:21', 'Y.B. Mangunwijaya', NULL, '1999');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` bigint UNSIGNED NOT NULL,
  `nominal_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` bigint UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `judul`, `slug`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Tes Banner 1', 'tes-banner-1', 'foto_banner/Big Sale Furniture Interior Design.png', '2024-04-08 23:08:43', '2024-04-08 23:08:43'),
(2, 'Tes Banner 2', 'tes-banner-2', 'foto_banner/Sale Interior Desain.png', '2024-04-08 23:13:51', '2024-04-08 23:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint UNSIGNED NOT NULL,
  `jenis_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `jenis_kelas`, `created_at`, `updated_at`) VALUES
(1, 'SDYPPSB1-4C', '2024-04-12 05:38:52', '2024-04-22 07:16:52'),
(2, 'SDYPPSB1-1A', '2024-04-23 00:43:07', '2024-04-23 00:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `id_kepsek` bigint UNSIGNED NOT NULL,
  `nip_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_kepsek` enum('p','l') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir_kepsek` date NOT NULL,
  `foto_kepsek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id_kepsek`, `nip_kepsek`, `nama_kepsek`, `jenis_kelamin_kepsek`, `tgl_lahir_kepsek`, `foto_kepsek`, `created_at`, `updated_at`) VALUES
(1, '406', 'Wahid', 'l', '2023-06-15', 'pngwing.com.png', '2024-04-15 01:19:27', '2024-04-15 01:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `judul`, `keterangan`, `slug`, `foto`, `created_at`, `updated_at`, `url`) VALUES
(1, 'OPAC', 'OPEN PUBLIC ACCESS CATALOG 1', 'open-public-access-catalog-1', 'foto_layanan/opac.png', '2024-04-09 02:32:18', '2024-04-12 02:26:10', 'https://opacprimabaca.yppsb.web.id'),
(2, 'Literasi', 'Literasi Anak Bersama Keluarga', 'literasi-anak-bersama-keluarga', 'foto_layanan/literasikeluarga.png', '2024-04-09 02:41:12', '2024-04-09 02:41:12', NULL),
(3, 'Podcast', 'Podcast Primabaca', 'podcast-primabaca', 'foto_layanan/channels4_profile.jpg', '2024-04-12 02:19:04', '2024-04-12 02:19:04', 'https://www.youtube.com/@primabacaperpustakaanyppsb5097'),
(4, 'Registrasi Anggota', 'Pendaftaran Online Anggota Perpustakaan', 'pendaftaran-online-anggota-perpustakaan', 'foto_layanan/daftar.png', '2024-04-12 06:48:12', '2024-04-12 06:48:12', 'https://docs.google.com/forms/d/e/1FAIpQLSdbnM8gyHa4R8cXQOVp8m9BNjbPTvcLRIqVOviPYp6fJLTHUA/viewform');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_12_02_051558_create_siswa_table', 1),
(5, '2022_12_02_070552_create_kelas_table', 1),
(6, '2022_12_03_214202_create_rak_table', 1),
(7, '2022_12_04_135623_create_buku_table', 1),
(8, '2022_12_06_005647_create_pinjambuku_table', 1),
(9, '2022_12_06_121632_create_riwayat_pinjam_table', 1),
(10, '2023_01_18_000007_create_denda_table', 1),
(11, '2023_01_18_184407_create_kepala_sekolah_table', 1),
(12, '2024_04_05_093459_tentang_kami', 1),
(13, '2024_04_05_100255_tata_peminjaman_table', 1),
(14, '2024_04_05_100312_tata_pengembalian_table', 1),
(15, '2024_04_08_142331_iklan', 1),
(16, '2024_04_09_095610_layanan', 2),
(17, '2024_04_12_101023_add_url_to_layanan', 3),
(18, '2024_04_19_090828_add_foto_visi_to_tentang_kami_table', 4),
(19, '2024_04_22_101236_add_penulis_to_buku_table', 5),
(20, '2024_04_22_135803_add_sekolah_to_siswa_table', 6),
(21, '2024_04_22_142518_create_sekolah_table', 6),
(22, '2024_04_24_074048_add_alamat_to_siswa_table', 7);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjambuku`
--

CREATE TABLE `pinjambuku` (
  `id_pinjam` bigint UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `id_buku` int NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` bigint UNSIGNED NOT NULL,
  `jenis_rak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `jenis_rak`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa', '2024-04-08 22:49:10', '2024-04-08 22:49:10'),
(2, 'Teknologi', '2024-04-08 22:49:19', '2024-04-08 22:49:19'),
(3, 'Kamus', '2024-04-08 22:49:26', '2024-04-08 22:49:26'),
(4, 'Novel', '2024-04-08 22:49:35', '2024-04-08 22:49:35'),
(5, '813 PAU s', '2024-04-22 02:16:05', '2024-04-22 02:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pinjam`
--

CREATE TABLE `riwayat_pinjam` (
  `id_riwayat` bigint UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `id_buku` int NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` bigint DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` bigint UNSIGNED NOT NULL,
  `jenis_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `jenis_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'SD YPPSB 1', '2024-04-22 07:12:27', '2024-04-22 07:13:10'),
(2, 'SD YPPSB 2', '2024-04-23 00:54:18', '2024-04-23 00:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint UNSIGNED NOT NULL,
  `nis` text COLLATE utf8mb4_unicode_ci,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('p','l') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sekolah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telp` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `barcode`, `nama_siswa`, `jenis_kelamin`, `tgl_lahir`, `kelas`, `foto`, `created_at`, `updated_at`, `sekolah`, `alamat`, `telp`) VALUES
(1, '123', '606308239', 'Jiso', 'p', '2024-04-04', '1', 'B612_20220513_104354_196.jpg', '2024-04-12 05:39:21', '2024-04-12 05:39:21', '1', NULL, '1'),
(4, 'Y-407', '24042324', 'Irfan', 'l', '2024-04-07', '1', 'e5063050a56e2992ef2295ee78791a6d.jpeg', '2024-04-23 00:08:29', '2024-04-24 00:14:56', '1', 'Wisma Raya', '088'),
(6, 'Y-406', '24042424', 'Adi', 'l', '2024-04-01', '2', 'kak-yulfan.jpg', '2024-04-23 23:58:43', '2024-04-24 00:12:48', '1', 'Munthe', '0811111'),
(7, 'Y-405', '24042424', 'Irfan s', 'l', NULL, '1', '086593900_1553668873-LISA_BLACKPINK_1.jpg', '2024-04-24 01:06:54', '2024-04-24 01:06:54', '1', 'a', '123'),
(8, '16201', '16201', 'Agus Susanto', 'l', '2024-04-04', '1', 'WhatsApp Image 2022-09-03 at 05.39.01.jpeg', '2024-04-24 01:27:46', '2024-04-24 01:39:47', '1', 'Prima Camp', '81346403610'),
(9, '1117532', '1117532', 'Cindi Aulia', 'p', NULL, 'SDYPPSB2-3B', NULL, '2024-04-24 01:27:46', '2024-04-24 01:27:46', 'SD YPPSB 2', 'Jl.Durian Rt.06 No.04', '85250327400'),
(10, '1514246', '1514246', 'Malisa Marcela Daman', 'p', NULL, 'ALUMNI-2022-SMPYPPSB-9C', NULL, '2024-04-24 01:27:46', '2024-04-24 01:27:46', 'SMP YPPSB', 'G.House No.103', '82157074309'),
(11, '1514303', '1514303', 'Pedro Reimadiya Aisyah', 'l', NULL, 'ALUMNI-2022-SMPYPPSB-9F', NULL, '2024-04-24 01:27:46', '2024-04-24 01:27:46', 'SMP YPPSB', 'Gg. Merpati, Sangatta', '82156375540');

-- --------------------------------------------------------

--
-- Table structure for table `tata_peminjaman`
--

CREATE TABLE `tata_peminjaman` (
  `id_tata_peminjaman` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tata_peminjaman`
--

INSERT INTO `tata_peminjaman` (`id_tata_peminjaman`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Siswa Di Wajibkan Mendaftarkan Diri Sebagai Anggota Perpustakaan', '2024-04-09 00:05:54', '2024-04-09 00:52:23'),
(2, 'Telah Mengembalikan Semua Buku Yang Di Pinjam Sebelumnya', '2024-04-09 00:06:19', '2024-04-09 00:06:19'),
(3, 'Memberikan Buku Dan Kartu Anggota Kepada Petugas Perpustakaan Untuk Proses Peminjaman', '2024-04-09 00:06:28', '2024-04-09 00:06:28'),
(4, 'Siswa Hanya Dapat Meminjam Maksimal 3 Buku', '2024-04-09 00:06:36', '2024-04-09 00:06:36'),
(5, 'Dilarang Bagi Siswa Yang Meminjam Buku Untuk Mencoret, Menyobek, Atau Menghilangkan Buku Yang Di Pinjam', '2024-04-09 00:06:44', '2024-04-09 00:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `tata_pengembalian`
--

CREATE TABLE `tata_pengembalian` (
  `id_tata_pengembalian` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tata_pengembalian`
--

INSERT INTO `tata_pengembalian` (`id_tata_pengembalian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'MEMBAWA KARTU ANGGOTA PERPUSTAKAAN DAN MEMBAWA BUKU YANG AKAN DI KEMBALIKAN', '2024-04-09 00:40:08', '2024-04-09 00:48:44'),
(2, 'Buku Dalam Keadaan Baik Dan Tidak Di Coret - Coret :\')', '2024-04-09 00:49:00', '2024-04-09 00:53:17'),
(3, 'Keterlambatan Pengembalian Akan Di Kenakan Denda Rp 1.000 Perhari', '2024-04-09 00:52:59', '2024-04-09 00:52:59'),
(4, 'Menghilangkan Buku Akan Di Denda Rp 50.000 PerBuku Yang Hilang', '2024-04-09 00:53:09', '2024-04-09 00:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id_tentang_kami` bigint UNSIGNED NOT NULL,
  `profil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id_tentang_kami`, `profil`, `visi`, `misi`, `alamat`, `email`, `telepon`, `maps`, `jam_buka_1`, `jam_buka_2`, `foto`, `created_at`, `updated_at`, `foto_visi`) VALUES
(1, 'Perpustakaan sebagai wahana belajar sepanjang hayat dalam mengembangkan potensi masyarakat agar menjadi manusia yang beriman dan bertakwa kepada Tuhan yang Maha Esa, berakhlak mulia, sehat, berilmu,cakap, kreatif, mandiri dan menjadi warga negara yang demokratis serta bertanggung jawab dalam mendukung penyelenggaraan pendidikan nasional.', '\"Terwujudnya Indonesia maju yang berdaulat, mandiri, dan berkepribadian berlandaskan gotong royong melalui penguatan budaya literasi\"', '\"Meningkatkan Perpustakaan sesusai Standar Nasional Perpustakaan, Pelayanan Prima Perpustakaan, dan Pelestarian Bahan Pustaka dan Naskah Nusantara\"', 'Kompleks PT. Kaltim Prima Coal, Jl. Dr. Sutomo, Swarga Bara, Kec. Sangatta Utara, Kabupaten Kutai Timur, Kalimantan Timur 75683', 'perpus@gmail.com', '9298282', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.705146380929!2d117.51230366528038!3d0.5399237010142566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320bcbaa41ea14cf%3A0x29cfb338dc966a7e!2sPerpustakaan%20YPPSB!5e0!3m2!1sid!2sid!4v1712125507165!5m2!1sid!2sid', '6.00 am - 10.00 pm', '8.00 am - 6.00 pm', 'foto_tentang_kami/yppsb.png', '2024-04-08 23:03:25', '2024-04-19 01:53:34', 'foto_tentang_kami/Kirayu1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `telp`, `email_verified_at`, `password`, `type`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'IT', '08172733', NULL, '$2y$10$wWe1uNVRaJYVnfioc.zh4e.M.9Qx68r6rbe36UjixcKMgX8XAkmWG', 'Petugas', 'WhatsApp Image 2022-12-11 at 17.38.08.jpeg', NULL, '2024-04-08 22:46:17', '2024-04-08 22:46:17'),
(2, '11111', 'Tes1', '123213', NULL, '$2y$10$CRR3Ldz7Wz7WoGQCxS8OHOSrFm6L73Da8ETwqOIaye7FIRT1mEF2O', 'Petugas', 'pngwing.com.png', NULL, '2024-04-14 23:42:59', '2024-04-14 23:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tata_peminjaman`
--
ALTER TABLE `tata_peminjaman`
  ADD PRIMARY KEY (`id_tata_peminjaman`);

--
-- Indexes for table `tata_pengembalian`
--
ALTER TABLE `tata_pengembalian`
  ADD PRIMARY KEY (`id_tata_pengembalian`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id_tentang_kami`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  MODIFY `id_kepsek` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  MODIFY `id_pinjam` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  MODIFY `id_riwayat` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tata_peminjaman`
--
ALTER TABLE `tata_peminjaman`
  MODIFY `id_tata_peminjaman` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tata_pengembalian`
--
ALTER TABLE `tata_pengembalian`
  MODIFY `id_tata_pengembalian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id_tentang_kami` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
