-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2025 at 09:33 AM
-- Server version: 5.7.39
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parja`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_foto`
--

CREATE TABLE `album_foto` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `album_foto` text,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asal_surat`
--

CREATE TABLE `asal_surat` (
  `id` int(11) NOT NULL,
  `asal_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dapil`
--

CREATE TABLE `dapil` (
  `No` double DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `id_dapil` int(11) DEFAULT NULL,
  `dapil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_parja`
--

CREATE TABLE `email_parja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bentuk_pendidikan` varchar(255) DEFAULT NULL,
  `npsn` double DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `nama_dusun` varchar(255) DEFAULT NULL,
  `desa_kelurahan` varchar(255) DEFAULT NULL,
  `kode_kecamatan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kode_kabupaten` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kode_provinsi` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `nomor_fax` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `kebutuhan_khusus` varchar(255) DEFAULT NULL,
  `status_sekolah` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `cabang_kcp_unit` varchar(255) DEFAULT NULL,
  `sumber_listrik` varchar(255) DEFAULT NULL,
  `sertifikasi_iso` varchar(255) DEFAULT NULL,
  `akses_internet` varchar(255) DEFAULT NULL,
  `akses_internet_2` varchar(255) DEFAULT NULL,
  `status_kirim` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `tanggal_update` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` text,
  `jawaban` text,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_album_foto` int(11) DEFAULT NULL,
  `judul` text,
  `image_name` varchar(100) DEFAULT NULL,
  `image_type` varchar(100) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `status_slider` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id` int(11) NOT NULL,
  `klasifikasi_surat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kode_surat`
--

CREATE TABLE `kode_surat` (
  `id` int(11) NOT NULL,
  `kode_surat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konten_setting`
--

CREATE TABLE `konten_setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nilai` text,
  `tipe` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `konten_statis`
--

CREATE TABLE `konten_statis` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `konten` text,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(100) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kustom`
--

CREATE TABLE `laporan_kustom` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `sql` text,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mak`
--

CREATE TABLE `mak` (
  `id` int(11) NOT NULL,
  `kode_mak` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mak` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_mak` text COLLATE utf8mb4_unicode_ci,
  `contoh_mak` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_09_01_083743_create_tahun_table', 1),
(4, '2025_09_02_032538_create_arsip_table', 1),
(5, '2025_09_02_033042_create_asal_surat_table', 1),
(6, '2025_09_02_040258_create_informasi_table', 1),
(7, '2025_09_02_040457_create_jabatan_table', 1),
(8, '2025_09_02_041005_create_klasifikasi_surat_table', 1),
(9, '2025_09_02_041238_create_kode_surat_table', 1),
(10, '2025_09_02_041632_create_mak_table', 1),
(11, '2025_09_02_041826_create_nota_dinas_revisi_table', 1),
(12, '2025_11_02_083611_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_revisi`
--

CREATE TABLE `nota_dinas_revisi` (
  `id` int(11) NOT NULL,
  `nomor` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `satker` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ppk` int(11) DEFAULT NULL,
  `nama_ppk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_ppk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ppk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_eselon` int(11) DEFAULT NULL,
  `nama_eselon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_eselon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_eselon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_satker` int(11) DEFAULT NULL,
  `nama_satker` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partisipasi`
--

CREATE TABLE `partisipasi` (
  `id` int(11) NOT NULL,
  `partisipasi` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL COMMENT 'l=laki-laki;p=perempuan',
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `ukuran_pakaian` varchar(9) DEFAULT NULL,
  `alamat_rumah` text,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `nama_provinsi` varchar(100) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `nama_kabupaten` varchar(100) DEFAULT NULL,
  `id_dapil` int(11) DEFAULT NULL COMMENT 'lokasi diambil dari prov->kab menjadi dapil; dapil dari sigota',
  `nama_dapil` varchar(100) DEFAULT NULL,
  `tipe_sekolah` varchar(9) DEFAULT NULL,
  `kelas_sekolah` varchar(4) DEFAULT NULL,
  `alamat_sekolah` text,
  `telepon_sekolah` varchar(100) DEFAULT NULL,
  `handphone` varchar(100) DEFAULT NULL,
  `handphone_orangtua` varchar(100) DEFAULT NULL,
  `handphone_wali_murid` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `akun_instagram` text,
  `akun_youtube` text,
  `akun_facebook` text,
  `akun_twitter` text,
  `akun_tiktok` text,
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `short_quiz` text,
  `sandi` varchar(32) DEFAULT NULL,
  `sandi_random` varchar(100) DEFAULT NULL,
  `credential_access` varchar(100) DEFAULT NULL COMMENT 'buat reset password',
  `credential_expire` datetime DEFAULT NULL COMMENT 'kadaluarsa reset password 3 jam',
  `peran` varchar(20) DEFAULT 'guest',
  `nilai_turnitin` float DEFAULT '0',
  `status_durasi_video` tinyint(1) DEFAULT '0',
  `status_lokasi_video` tinyint(1) DEFAULT '0',
  `nilai_cv` float DEFAULT NULL,
  `nilai_esai` float DEFAULT NULL,
  `nilai_video` float DEFAULT NULL,
  `nilai_total` float DEFAULT NULL,
  `user_cv` varchar(100) DEFAULT NULL,
  `user_esai` varchar(100) DEFAULT NULL,
  `user_video` varchar(100) DEFAULT NULL,
  `sumber_informasi` varchar(255) DEFAULT NULL,
  `sumber_informasi_lainnya` varchar(255) DEFAULT NULL,
  `catatan_cv` text,
  `catatan_esai` text,
  `catatan_video` text,
  `status_pernyataan` tinyint(1) DEFAULT '0',
  `status_cv` tinyint(1) DEFAULT '0',
  `status_esai` tinyint(1) DEFAULT '0',
  `status_video` tinyint(1) DEFAULT '0',
  `status_lolos` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `status_lama` tinyint(1) DEFAULT NULL,
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_audit`
--

CREATE TABLE `pengguna_audit` (
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_berkas`
--

CREATE TABLE `pengguna_berkas` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL COMMENT '1:Surat Izin,2:Surat Pernyataan;3:Salinan Kartu Tanda Siswa;4:Pas Foto Terbaru',
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_data`
--

CREATE TABLE `pengguna_data` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_tingkat` int(11) DEFAULT NULL,
  `id_partisipasi` int(11) DEFAULT NULL,
  `judul` text,
  `lokasi` varchar(255) DEFAULT NULL,
  `tahun` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `status_verifikasi` tinyint(1) DEFAULT '1',
  `alasan_verifikasi` varchar(100) DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_esai`
--

CREATE TABLE `pengguna_esai` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `daftar_pustaka` text,
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_nilai`
--

CREATE TABLE `pengguna_nilai` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_skoring` int(11) NOT NULL,
  `bobot` float DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_nilai_15082025`
--

CREATE TABLE `pengguna_nilai_15082025` (
  `id` int(11) NOT NULL DEFAULT '0',
  `id_pengguna` int(11) NOT NULL,
  `id_skoring` int(11) NOT NULL,
  `bobot` float DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_pesan`
--

CREATE TABLE `pengguna_pesan` (
  `id` int(11) NOT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `pesan` text,
  `tipe` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_total`
--

CREATE TABLE `pengguna_total` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `bobot` int(11) DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_video`
--

CREATE TABLE `pengguna_video` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `media_sosial` varchar(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `status_publikasi` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `file_publikasi_uri` varchar(255) DEFAULT NULL,
  `cover_uri` varchar(255) DEFAULT NULL,
  `status_publikasi` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nilai` text,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skoring`
--

CREATE TABLE `skoring` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skoring_cv`
--

CREATE TABLE `skoring_cv` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_tingkat` int(11) DEFAULT NULL,
  `id_partisipasi` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_input` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-11-02 01:48:56', '$2y$12$6IpthGb5OtiFhpBugObTR.0r/mcCzjiPFjWH9hHq0akUUVtqc0THe', 'DtEn8vZBJJ', '2025-11-02 01:48:56', '2025-11-02 01:48:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_foto`
--
ALTER TABLE `album_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asal_surat`
--
ALTER TABLE `asal_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `email_parja`
--
ALTER TABLE `email_parja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_surat`
--
ALTER TABLE `kode_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten_setting`
--
ALTER TABLE `konten_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten_statis`
--
ALTER TABLE `konten_statis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kustom`
--
ALTER TABLE `laporan_kustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mak`
--
ALTER TABLE `mak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mak_kode_mak_index` (`kode_mak`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_dinas_revisi`
--
ALTER TABLE `nota_dinas_revisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partisipasi`
--
ALTER TABLE `partisipasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_dapil` (`id_dapil`),
  ADD KEY `tanggal_pendaftaran` (`tanggal_pendaftaran`),
  ADD KEY `nilai_cv` (`nilai_cv`),
  ADD KEY `nilai_esai` (`nilai_esai`),
  ADD KEY `nilai_video` (`nilai_video`),
  ADD KEY `status_pernyataan` (`status_pernyataan`),
  ADD KEY `status_cv` (`status_cv`),
  ADD KEY `status_esai` (`status_esai`),
  ADD KEY `status_video` (`status_video`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kabupaten` (`id_kabupaten`),
  ADD KEY `handphone` (`handphone`),
  ADD KEY `status` (`status`),
  ADD KEY `credential_access` (`credential_access`),
  ADD KEY `credential_expire` (`credential_expire`),
  ADD KEY `email` (`email`),
  ADD KEY `sandi` (`sandi`);

--
-- Indexes for table `pengguna_berkas`
--
ALTER TABLE `pengguna_berkas`
  ADD UNIQUE KEY `pengguna_berkas_id_IDX` (`id`) USING BTREE,
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `tipe` (`tipe`);

--
-- Indexes for table `pengguna_data`
--
ALTER TABLE `pengguna_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_partisipasi` (`id_partisipasi`);

--
-- Indexes for table `pengguna_esai`
--
ALTER TABLE `pengguna_esai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna_nilai`
--
ALTER TABLE `pengguna_nilai`
  ADD KEY `id` (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_skoring` (`id_skoring`);

--
-- Indexes for table `pengguna_pesan`
--
ALTER TABLE `pengguna_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna_total`
--
ALTER TABLE `pengguna_total`
  ADD KEY `id` (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `pengguna_video`
--
ALTER TABLE `pengguna_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skoring`
--
ALTER TABLE `skoring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `skoring_cv`
--
ALTER TABLE `skoring_cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
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
-- AUTO_INCREMENT for table `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asal_surat`
--
ALTER TABLE `asal_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_parja`
--
ALTER TABLE `email_parja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28413;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode_surat`
--
ALTER TABLE `kode_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konten_setting`
--
ALTER TABLE `konten_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konten_statis`
--
ALTER TABLE `konten_statis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_kustom`
--
ALTER TABLE `laporan_kustom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `mak`
--
ALTER TABLE `mak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nota_dinas_revisi`
--
ALTER TABLE `nota_dinas_revisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partisipasi`
--
ALTER TABLE `partisipasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47256;

--
-- AUTO_INCREMENT for table `pengguna_berkas`
--
ALTER TABLE `pengguna_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116860;

--
-- AUTO_INCREMENT for table `pengguna_data`
--
ALTER TABLE `pengguna_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177905;

--
-- AUTO_INCREMENT for table `pengguna_esai`
--
ALTER TABLE `pengguna_esai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20963;

--
-- AUTO_INCREMENT for table `pengguna_nilai`
--
ALTER TABLE `pengguna_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267722;

--
-- AUTO_INCREMENT for table `pengguna_pesan`
--
ALTER TABLE `pengguna_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna_total`
--
ALTER TABLE `pengguna_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54078;

--
-- AUTO_INCREMENT for table `pengguna_video`
--
ALTER TABLE `pengguna_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16580;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `skoring`
--
ALTER TABLE `skoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `skoring_cv`
--
ALTER TABLE `skoring_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
