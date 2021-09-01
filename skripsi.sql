-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Sep 2021 pada 13.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` timestamp NULL DEFAULT NULL,
  `jam_keluar` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `id_jadwal`, `id_dosen`, `keterangan`, `alesan`, `tanggal`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Masuk', NULL, '2021-01-13', '2021-01-07 17:00:10', '2021-01-07 17:00:00', '2021-01-07 23:00:00', '2021-01-07 17:00:00'),
(2, 2, 2, 'Masuk', 'Masuk', '2021-01-12', '2021-01-07 17:00:00', '2021-01-07 17:00:00', '2021-01-07 21:00:00', '2021-01-07 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin123', 'admin@admin.com', '$2a$12$0HBMBe49IRwv8jC2ECo7aevf.nyGyohbc3nftCZch0MJa.iJ9F77y', NULL, '2020-07-11 00:21:37', '2020-07-30 22:50:46'),
(7, 'iqbal', 'iqbalnurw9@gmail.com', '$2y$10$QeQEy4x5vggnE4Xy70NLA.gKbVNRosPIOShv4RQ0vj0mlHB9q3s8G', NULL, '2020-07-31 15:28:43', '2020-07-31 15:28:43'),
(8, 'jancok', 'jancok@jancok.com', '$2y$10$srScQT4HUuNM2v7dsMtoeOhvvDk5r/fqlLt92Tt4B9ntmaHv9Fs82', NULL, '2021-08-31 06:11:23', '2021-08-31 06:11:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('honorer','tetap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `name`, `kode`, `password`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Abdul Kholiq,S.kom,M.Kom', '0123', '$2y$10$h1AtCJUi1cYR6/y12X/bEezSE4KsumqTuUNdlySgou4WWZ9/vU/V2', 'tetap', NULL, '2020-07-27 06:53:31', '2020-07-27 07:36:44'),
(5, 'EDY WIDODO,S.Kom,M.Kom', '0972', '$2y$10$h1AtCJUi1cYR6/y12X/bEezSE4KsumqTuUNdlySgou4WWZ9/vU/V2', 'honorer', NULL, '2020-07-27 06:57:16', '2020-08-05 05:00:55'),
(6, 'Merchy Hermawati M.Pd,M.Kom', '0763', '$2y$10$h1AtCJUi1cYR6/y12X/bEezSE4KsumqTuUNdlySgou4WWZ9/vU/V2', 'honorer', NULL, '2020-07-27 06:57:59', '2020-08-05 05:00:43'),
(9, 'Cepi Cahyadi S.Kom., M.Kom', '15145', '$2y$10$h1AtCJUi1cYR6/y12X/bEezSE4KsumqTuUNdlySgou4WWZ9/vU/V2', 'tetap', NULL, '2020-08-01 22:27:22', '2020-08-01 22:31:17'),
(14, 'Iqbal Nur W M.Pd S.Kom', '1234', '$2y$10$h1AtCJUi1cYR6/y12X/bEezSE4KsumqTuUNdlySgou4WWZ9/vU/V2', 'honorer', NULL, '2020-07-31 15:49:36', '2020-07-31 15:51:43'),
(15, 'Akbar Rizkqi M.pd, S.kom', '7777', '$2y$10$sppxbK0zFPAhHiw5Ms0UPuwrEhnEcPIk3b9J3MtT95U7O3fdr4pNm', 'honorer', NULL, '2020-08-05 04:47:03', '2020-08-05 04:47:18'),
(16, 'Masum s.pd', '012345', '$2y$10$YYgP70iDO1/7EpAyL.JbWOuEuQr5zlntMoi1/ZtSyCy6P5456HLRO', 'honorer', NULL, '2020-08-05 05:01:26', '2020-08-05 05:01:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_matkul` int(255) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jenis_kelas` enum('pagi','sore') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_matkul`, `id_dosen`, `id_jurusan`, `jenis_kelas`, `hari`, `jam_mulai`, `jam_selesai`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'sore', 'Senin', '10.00', '08.00', '2020-08-05 07:30:11', '2020-07-27 00:27:59', '2020-08-05 07:50:07'),
(2, 2, 4, 2, 'sore', 'Selasa', '02:03', '12:32', '2020-08-05 07:30:11', '2020-07-30 17:00:13', '2020-07-30 22:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '2020-07-11 05:06:10', '2020-07-30 09:42:11'),
(2, 'Manajemen Informasi', '2020-07-11 05:31:00', '2020-07-30 09:36:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `name`, `id_semester`, `id_jurusan`, `email`, `password`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12345', 'Ilyas Kahfi Suhaya', 2, 1, 'test@test.com', '$2a$12$0HBMBe49IRwv8jC2ECo7aevf.nyGyohbc3nftCZch0MJa.iJ9F77y', 'Bekasi', '2020-07-27 07:18:24', '2020-07-27 07:18:24', '2020-07-30 13:41:09'),
(5, '29910029', 'Iqbal Nur W', 1, 2, 'iqbalnurw9@gmail.com', '$2a$12$0HBMBe49IRwv8jC2ECo7aevf.nyGyohbc3nftCZch0MJa.iJ9F77y', 'Babelan Utara', '2020-07-31 15:31:51', '2020-07-31 15:47:35', '2020-07-31 22:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(12) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `sks` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode`, `nama`, `sks`, `created_at`, `updated_at`) VALUES
(1, 'K222', 'Sistem Informasi', '123', '2020-07-29 17:26:00', '2020-07-29 17:00:27'),
(2, 'K222', 'PKN', '1', '2020-07-29 17:13:00', '2020-07-29 21:00:00'),
(3, 'K222', 'IPS', '0', '2020-07-30 16:59:16', '2020-07-30 16:59:16'),
(6, 'K2212', 'Teknik Elektronik', '2', '2020-07-31 13:01:30', '2020-07-31 13:01:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `id_jadwal`, `name`, `materi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, 'test', 'VaQMUqqPM', NULL, NULL, NULL);

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_10_025222_create_mahasiswa_table', 1),
(4, '2020_07_10_025857_create_dosen_table', 1),
(5, '2020_07_11_061156_create_admin_table', 1),
(6, '2020_07_11_115656_create_table_jurusan', 2),
(7, '2020_07_11_120545_create_jurusan_table', 3),
(8, '2020_07_11_120854_create_semester_table', 4),
(9, '2020_07_11_122345_create_mahasiswa_table', 5),
(10, '2020_07_11_125255_create_matakuliah_table', 6),
(11, '2020_07_11_125829_add_id_semester_to_matakuliah', 7),
(12, '2020_07_11_130652_add_id_jurusan_to_matakuliah', 8),
(13, '2020_07_27_133611_create_jadwal_table', 9),
(14, '2020_07_27_134333_create_absen_table', 9),
(15, '2020_07_27_152653_create_materi_table', 10),
(16, '2020_07_27_152955_add_jam_masuk_and_jam_keluar_to_absen', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Semester 1', '2020-07-11 05:14:15', '2020-07-11 05:14:15'),
(2, 'Semsester 2', '2020-07-11 05:32:39', '2020-07-11 05:32:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_email_unique` (`kode`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
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
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
