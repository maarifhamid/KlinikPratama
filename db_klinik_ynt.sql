-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 07:03 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik_ynt`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `kode_barang`, `nama_barang`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'IN-001', 'Meja Laboratorium', 'Oke', '2022-05-25 13:09:02', '2022-05-25 13:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Kolesterol', 25000, '2022-05-25 13:32:20', '2022-05-25 13:32:20'),
(2, 'Asam Urat', 15000, '2022-05-25 13:32:44', '2022-05-25 13:32:44'),
(3, 'Gula Darah', 25000, '2022-05-25 13:33:37', '2022-05-25 13:33:37'),
(4, 'Jasa Klinik', 50000, '2022-05-25 14:20:07', '2022-05-25 14:20:07');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_04_052343_create_inventaris_table', 1),
(4, '2022_05_05_051549_create_alat_lab', 1),
(5, '2022_05_05_052027_create_tenaga_kesehatan_table', 1),
(6, '2022_05_05_163907_create_profesi_table', 1),
(7, '2022_05_06_101921_add_relationship_to_tenaga_kesehatan_table', 1),
(8, '2022_05_06_103245_add_relationship_to_inventaris', 1),
(9, '2022_05_06_103413_pasien', 1),
(10, '2022_05_06_104837_ruang', 1),
(11, '2022_05_06_105034_rekam_medis', 1),
(12, '2022_05_06_105632_add_relationship_to_rekam_medis', 1),
(13, '2022_05_06_111333_resep_obat', 1),
(14, '2022_05_06_120456_obat', 1),
(15, '2022_05_06_121623_transaksi_berobat', 1),
(16, '2022_05_06_122027_add_relationship_to_transaksi_obat_table', 1),
(17, '2022_05_07_043040_supplier', 1),
(18, '2022_05_07_043229_obat_masuk', 1),
(19, '2022_05_07_043522_obat_keluar', 1),
(20, '2022_05_07_062012_add_relationship_to_resep_obat_table', 1),
(21, '2022_05_07_072104_add_relationship_to_obat_table', 1),
(22, '2022_05_07_072903_add_relationship_to_obat_masuk_table', 1),
(23, '2022_05_07_073209_add_relationship_to_obat_keluar_table', 1),
(24, '2022_05_21_162030_add_tenaga_kesehatan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `keterangan`, `harga_beli`, `harga_jual`, `supplier_id`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', '3x1', 5000, 7000, 2, 10, '2022-05-25 14:18:21', '2022-05-25 14:18:21'),
(2, 'Amoxilin', 'Anti Biotik', 8000, 10000, 2, 10, '2022-05-25 14:19:26', '2022-05-25 14:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_rw` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` bigint(20) NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `profesi`
--

CREATE TABLE `profesi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_profesi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profesi`
--

INSERT INTO `profesi` (`id`, `nama_profesi`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', '2022-05-25 12:35:32', '2022-05-25 12:35:32'),
(2, 'Bidan', '2022-05-25 12:35:32', '2022-05-25 12:35:32'),
(3, 'Perawat', '2022-05-25 12:35:32', '2022-05-25 12:35:32'),
(4, 'Analisis Kesehatan', '2022-05-25 12:35:32', '2022-05-25 12:35:32'),
(5, 'Apoteker', '2022-05-25 12:35:32', '2022-05-25 12:35:32'),
(6, 'Admin', '2022-05-25 12:35:32', '2022-05-25 12:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `ruang_id` bigint(20) UNSIGNED NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periksa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekam_medis_id` bigint(20) UNSIGNED NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_supplier` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1, 'KS-001', 'PT', 'Jambi Selatan', 81254908786, '2022-05-25 14:04:35', '2022-05-25 14:04:35'),
(2, 'KS-002', 'PT PELITA INDAH', 'Jambi', 81254908786, '2022-05-25 14:05:32', '2022-05-25 14:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_kesehatan`
--

CREATE TABLE `tenaga_kesehatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profesi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenaga_kesehatan`
--

INSERT INTO `tenaga_kesehatan` (`id`, `profesi_id`, `nama_pegawai`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `spesialis`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 1, 'dr Ilham Hamid Maarif S.PD', 'Laki-Laki', 'Tebo', '2022-05-25', 'Rimbo Bujang', 'Penyakit Dalam', '081254908786', '2022-05-25 14:26:05', '2022-05-25 14:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_berobat`
--

CREATE TABLE `transaksi_berobat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `rekam_medis_id` bigint(20) UNSIGNED NOT NULL,
  `resep_obat_id` bigint(20) UNSIGNED NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$uulwVUCvEc7Has6ty3r40e5K3dE4QukWqFLDmv71VDDqureRfNlxO', 'admin', NULL, '2022-05-25 12:35:32', '2022-05-25 12:35:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat_keluar_obat_id_foreign` (`obat_id`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat_masuk_obat_id_foreign` (`obat_id`),
  ADD KEY `obat_masuk_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profesi`
--
ALTER TABLE `profesi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_medis_pasien_id_foreign` (`pasien_id`),
  ADD KEY `rekam_medis_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `rekam_medis_ruang_id_foreign` (`ruang_id`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resep_obat_rekam_medis_id_foreign` (`rekam_medis_id`),
  ADD KEY `resep_obat_obat_id_foreign` (`obat_id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenaga_kesehatan_profesi_id_foreign` (`profesi_id`);

--
-- Indexes for table `transaksi_berobat`
--
ALTER TABLE `transaksi_berobat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_berobat_pasien_id_foreign` (`pasien_id`),
  ADD KEY `transaksi_berobat_rekam_medis_id_foreign` (`rekam_medis_id`),
  ADD KEY `transaksi_berobat_resep_obat_id_foreign` (`resep_obat_id`);

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
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profesi`
--
ALTER TABLE `profesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_berobat`
--
ALTER TABLE `transaksi_berobat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD CONSTRAINT `obat_keluar_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD CONSTRAINT `obat_masuk_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `obat_masuk_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_medis_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `tenaga_kesehatan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_medis_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_obat_rekam_medis_id_foreign` FOREIGN KEY (`rekam_medis_id`) REFERENCES `rekam_medis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenaga_kesehatan`
--
ALTER TABLE `tenaga_kesehatan`
  ADD CONSTRAINT `tenaga_kesehatan_profesi_id_foreign` FOREIGN KEY (`profesi_id`) REFERENCES `profesi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_berobat`
--
ALTER TABLE `transaksi_berobat`
  ADD CONSTRAINT `transaksi_berobat_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_berobat_rekam_medis_id_foreign` FOREIGN KEY (`rekam_medis_id`) REFERENCES `rekam_medis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_berobat_resep_obat_id_foreign` FOREIGN KEY (`resep_obat_id`) REFERENCES `resep_obat` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
