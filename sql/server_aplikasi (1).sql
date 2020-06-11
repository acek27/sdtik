-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2020 at 02:19 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server_aplikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_core`
--

CREATE TABLE `tb_core` (
  `id_core` int(11) NOT NULL,
  `jumlah_core` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_core`
--

INSERT INTO `tb_core` (`id_core`, `jumlah_core`) VALUES
(1, '4'),
(2, '6'),
(3, '8'),
(5, '48'),
(6, '~'),
(9, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_aplikasi`
--

CREATE TABLE `tb_daftar_aplikasi` (
  `id_aplikasi` int(11) NOT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `ip_vps` varchar(16) DEFAULT NULL,
  `ip_public` varchar(16) DEFAULT NULL,
  `id_perangkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_aplikasi`
--

INSERT INTO `tb_daftar_aplikasi` (`id_aplikasi`, `nama_aplikasi`, `ip_vps`, `ip_public`, `id_perangkat`) VALUES
(62, 'Aplikasi Datawarehouse IR', '192.168.99.83', NULL, 40),
(63, 'Server Backup Data Aplikasi Programer', '192.168.99.88', NULL, 40),
(64, 'VPS untuk Dinas Perikanan dan Peternakan', '192.168.99.79', '103.76.175.169', 40),
(65, 'jdih.situbondokab.go.id', '192.168.99.94', '103.76.175.148', 41),
(66, 'sriti.situbondokab.go.id', NULL, NULL, 41),
(67, 'Aplikasi Servis Kominfo Provinsi', NULL, NULL, 41),
(68, 'Aplikasi Quick Count', NULL, NULL, 41),
(69, 'Aplikasi Lapor Mr. X', NULL, NULL, 41),
(70, 'upbjj.situbondokab.go.id', NULL, NULL, 41),
(71, 'e-sakip.situbondokab.go.id', NULL, NULL, 41),
(72, 'Server Backup Data Aplikasi Programer', '192.168.99.93', '103.76.175.149', 41),
(73, 'Website Puskesmas', '192.168.99.92', '103.76.175.152', 41),
(74, 'Website OPD', NULL, NULL, 41),
(75, 'Website Kelurahan', NULL, NULL, 41),
(76, 'Sistem Pencapaian Target Kinerja', NULL, NULL, 41),
(77, 'Aplikasi Agenda Bupati', NULL, NULL, 41),
(78, 'Aplikasi RTLH KODIM', NULL, NULL, 41),
(80, 'Aplikasi Kobessa', '192.168.99.149', '103.76.175.183', 43),
(81, 'Aplikasi Ekinerja', '192.168.99.82', '103.76.175.162', 42),
(82, 'Database Server Kobessa', '192.168.99.148', NULL, 43),
(83, 'Database Server E-Pad', '192.168.99.153', NULL, 43),
(84, 'Aplikasi Tax Monitor E-Pad', '192.168.99.154', '103.76.175.192', 43),
(85, 'Aplikasi PhpMyadmin Database', '192.168.99.98', NULL, 45),
(86, 'Aplikasi Enterprise Service Bus IR', '192.168.99.91', NULL, 45),
(87, 'Aplikasi Sp2d IR <-> Bank Jatim', '192.168.99.100', NULL, 45),
(88, 'Vmware (NET)', NULL, NULL, 46),
(89, 'Database Aplikasi Programer', '192.168.99.99', NULL, 47),
(90, 'Server Cpanel (Proses Instalasi)', NULL, '103.76.175.182', 48),
(92, 'e-pajak.situbondokab.go.id', NULL, '103.76.175.138', 70),
(93, 'epamandhi.situbondokab.go.id', NULL, NULL, 70),
(94, 'esurat.situbondokab.go.id', NULL, NULL, 70),
(95, 'Website Kecamatan', NULL, NULL, 70),
(96, 'sirka.situbondokab.go.id', NULL, '103.76.175.134', 66),
(98, 'E-Kinerja', NULL, NULL, 69),
(99, NULL, NULL, NULL, 39),
(100, NULL, '192.168.99.96', '103.76.175.145', 44),
(101, NULL, '192.168.99.95', '103.76.175.147', 44),
(102, NULL, NULL, NULL, 49),
(103, NULL, NULL, NULL, 50),
(104, NULL, NULL, NULL, 51),
(105, NULL, NULL, NULL, 52),
(106, NULL, NULL, NULL, 53),
(107, NULL, NULL, NULL, 54),
(108, NULL, NULL, NULL, 55),
(109, NULL, NULL, NULL, 56),
(110, NULL, NULL, NULL, 57),
(111, NULL, NULL, NULL, 62),
(112, NULL, NULL, NULL, 63),
(113, NULL, NULL, NULL, 61),
(114, NULL, NULL, NULL, 64),
(115, NULL, NULL, NULL, 65),
(116, NULL, NULL, NULL, 66),
(117, NULL, NULL, NULL, 68);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hdd`
--

CREATE TABLE `tb_hdd` (
  `id_hdd` int(11) NOT NULL,
  `ukuran_hdd` varchar(11) NOT NULL,
  `keterangan` varchar(115) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hdd`
--

INSERT INTO `tb_hdd` (`id_hdd`, `ukuran_hdd`, `keterangan`) VALUES
(1, '300', 'GB'),
(2, '500', 'GB'),
(3, '600', 'GB'),
(4, '1', 'TB'),
(5, '2', 'TB'),
(7, '4,8', 'TB'),
(9, '10', 'TB'),
(10, '~', '~'),
(11, '800', 'TB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perangkat`
--

CREATE TABLE `tb_perangkat` (
  `id_perangkat` int(11) NOT NULL,
  `nama_perangkat` varchar(50) NOT NULL,
  `tipe_perangkat` varchar(30) NOT NULL,
  `status_kepemilikan` varchar(30) NOT NULL,
  `ip_server` varchar(16) DEFAULT NULL,
  `status_server` enum('Aktif','Tidak Aktif','Rusak','') NOT NULL,
  `id_hdd` int(11) NOT NULL,
  `id_ram` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_core` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perangkat`
--

INSERT INTO `tb_perangkat` (`id_perangkat`, `nama_perangkat`, `tipe_perangkat`, `status_kepemilikan`, `ip_server`, `status_server`, `id_hdd`, `id_ram`, `id_rak`, `id_core`) VALUES
(39, 'DELL R730', 'RACK MOUNT', 'KOMINFO', '192.168.99.63', 'Aktif', 4, 3, 2, 2),
(40, 'DELL R730', 'RACK MOUNT', 'KOMINFO', '192.168.99.62', 'Aktif', 4, 3, 2, 2),
(41, 'DELL R730', 'RACK MOUNT', 'KOMINFO', '192.168.99.61', 'Aktif', 4, 3, 2, 2),
(42, 'DELL R530', 'RACK MOUNT', 'KOMINFO/EKIN', '192.168.99.64', 'Aktif', 4, 2, 2, 2),
(43, 'LENOVO SR650', 'RACK MOUNT', 'KOMINFO', '192.168.99.151', 'Aktif', 7, 6, 2, 5),
(44, 'DELL R730', 'RACK MOUNT', 'KOMINFO', '192.168.99.60', 'Aktif', 4, 3, 3, 2),
(45, 'DELL R430', 'RACK MOUNT', 'KOMINFO', '192.168.99.59', 'Aktif', 5, 2, 3, 1),
(46, 'LENOVO 3550', 'RACK MOUNT', 'KOMINFO', '192.168.99.10', 'Aktif', 4, 3, 3, 3),
(47, 'LENOVO 3650', 'RACK MOUNT', 'KOMINFO', '192.168.99.58', 'Aktif', 2, 2, 3, 2),
(48, 'HP DL380', 'RACK MOUNT', 'KOMINFO', '192.168.99.75', 'Aktif', 9, 6, 3, 5),
(49, 'HP ML110', 'TOWER', 'COLOCATION/INSPEKTORAT', '192.168.99.68', 'Aktif', 4, 2, 4, 3),
(50, 'LENOVO 3500', 'TOWER', 'COLOCATION/BPPKAD ASSET', '192.168.99.69', 'Aktif', 4, 3, 4, 3),
(51, 'LENOVO 3650', 'RACK MOUNT', 'COLOCATION/AKP', '192.168.99.86', 'Aktif', 1, 2, 5, 2),
(52, 'HP ML110', 'TOWER', 'KOMINFO/KEJAKSAAN', NULL, 'Aktif', 4, 2, 5, 2),
(53, 'IBM X3100 M4', 'TOWER', 'COLOCATION/BAPEDDA', '192.168.99.103', 'Aktif', 2, 1, 5, 1),
(54, 'RAINER', 'TOWER', 'COLOCATION/DISHUB', '192.168.99.65', 'Aktif', 10, 7, 6, 6),
(55, 'HP PROLIANT ML30', 'TOWER', 'COLOCATION/PERPUS', NULL, 'Aktif', 10, 7, 6, 6),
(56, 'IBM 3300-M4', 'TOWER', 'KOMINFO/BADAK', '192.168.99.56', 'Aktif', 2, 1, 6, 1),
(57, 'HP PROLIANT ML110 G7', 'TOWER', 'COLOCATION', NULL, 'Aktif', 10, 7, 6, 6),
(61, 'RAINER S1200V3', 'RACK MOUNT', 'COLOCATION/KPPT', '192.168.99.47', 'Aktif', 4, 1, 7, 9),
(62, 'DELL R730', 'RACK MOUNT', 'COLOCATION/DPMD', '192.168.99.76', 'Aktif', 5, 3, 7, 9),
(63, 'DELL R730', 'RACK MOUNT', 'COLOCATION/DPMD', '192.168.99.77', 'Aktif', 5, 3, 7, 9),
(64, 'BAPPEDA', 'RACK MOUNT', 'COLOCATION/BAPEDDA', NULL, 'Aktif', 10, 7, 7, 6),
(65, 'LENOVO 3550 M5', 'RACK MOUNT', 'COLOCATION/AKP LAMA', '192.168.99.85', 'Aktif', 10, 7, 7, 6),
(66, 'HP DL360', 'RACK MOUNT', 'KOMINFO/SIRKA', '192.168.99.53', 'Aktif', 3, 4, 7, 2),
(68, 'RAINER', 'RACK MOUNT', 'KOMINFO', NULL, 'Rusak', 10, 7, 8, 6),
(69, 'LENOVO', 'TOWER', 'KOMINFO', NULL, 'Rusak', 10, 7, 8, 6),
(70, 'HP DL80', 'RACK MOUNT', 'KOMINFO', '192.168.99.50', 'Aktif', 2, 1, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nomer_rak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nomer_rak`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ram`
--

CREATE TABLE `tb_ram` (
  `id_ram` int(11) NOT NULL,
  `ukuran_ram` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ram`
--

INSERT INTO `tb_ram` (`id_ram`, `ukuran_ram`) VALUES
(1, '4'),
(2, '8'),
(3, '16'),
(4, '32'),
(5, '64'),
(6, '128'),
(7, '~'),
(8, '11');

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
(1, 'Mahendra', 'mahendrayoyok@gmail.com', NULL, '$2y$10$ehglph3qq7mLAjeGdxX1P.udMsy1lGSnkq7.qHkk1bYfjbYdnVI7W', NULL, '2020-03-01 14:44:48', '2020-03-01 14:44:48'),
(2, 'Bara', 'bara@gmail.com', NULL, '$2y$10$0SMHJ5IqciYm0i.TNgsUoeFCkWK6kTmw.GFfd5WRVC/dJe.tEazdG', NULL, '2020-03-01 14:46:56', '2020-03-01 14:46:56'),
(3, 'user', 'user@gmail.com', NULL, '$2y$10$TdjK8RRS8G5p5C6pu3oA0.VwJTAp/aAPAtOVJF.jCkni5k3sZDX66', NULL, '2020-03-01 15:08:51', '2020-03-01 15:08:51'),
(4, 'Bara', 'yoyok@gmail.com', NULL, '$2y$10$6p8z2k3VdIDiwzDImq7jJOqcoiKWQNq7svLx4vqZvEBnc5zMqnqcq', NULL, '2020-03-09 02:38:43', '2020-03-09 02:38:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_core`
--
ALTER TABLE `tb_core`
  ADD PRIMARY KEY (`id_core`);

--
-- Indexes for table `tb_daftar_aplikasi`
--
ALTER TABLE `tb_daftar_aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`),
  ADD KEY `id_perangkat` (`id_perangkat`);

--
-- Indexes for table `tb_hdd`
--
ALTER TABLE `tb_hdd`
  ADD PRIMARY KEY (`id_hdd`);

--
-- Indexes for table `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD PRIMARY KEY (`id_perangkat`),
  ADD KEY `id_hdd` (`id_hdd`,`id_ram`,`id_rak`),
  ADD KEY `id_core` (`id_core`),
  ADD KEY `id_rak` (`id_rak`),
  ADD KEY `id_ram` (`id_ram`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_ram`
--
ALTER TABLE `tb_ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_core`
--
ALTER TABLE `tb_core`
  MODIFY `id_core` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_daftar_aplikasi`
--
ALTER TABLE `tb_daftar_aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `tb_hdd`
--
ALTER TABLE `tb_hdd`
  MODIFY `id_hdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  MODIFY `id_perangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_ram`
--
ALTER TABLE `tb_ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_daftar_aplikasi`
--
ALTER TABLE `tb_daftar_aplikasi`
  ADD CONSTRAINT `tb_daftar_aplikasi_ibfk_1` FOREIGN KEY (`id_perangkat`) REFERENCES `tb_perangkat` (`id_perangkat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD CONSTRAINT `tb_perangkat_ibfk_5` FOREIGN KEY (`id_hdd`) REFERENCES `tb_hdd` (`id_hdd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perangkat_ibfk_6` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_perangkat_ibfk_7` FOREIGN KEY (`id_ram`) REFERENCES `tb_ram` (`id_ram`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
