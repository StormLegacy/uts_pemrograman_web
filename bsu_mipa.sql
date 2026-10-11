-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2026 at 03:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsu_mipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `setor_sampah`
--

CREATE TABLE `setor_sampah` (
  `id_setor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `kategori` varchar(50) NOT NULL,
  `jenis_sampah` varchar(100) NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `nilai_saldo` decimal(12,2) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setor_sampah`
--

INSERT INTO `setor_sampah` (`id_setor`, `id_user`, `tanggal`, `kategori`, `jenis_sampah`, `berat`, `nilai_saldo`, `poin`) VALUES
(4, 5, '2026-10-02 11:00:00', 'Anorganik', 'Gelas Plastik Mineral', 4.00, 14000.00, 28),
(5, 5, '2026-10-04 13:20:00', 'Anorganik', 'Kertas HVS Bekas Laporan/Ujian', 6.00, 15000.00, 30),
(6, 5, '2026-10-06 09:40:00', 'Organik', 'Dedaunan Kering Gugur Kampus', 3.00, 3000.00, 9),
(7, 6, '2026-09-25 08:00:00', 'Anorganik', 'Kaleng Minuman Aluminium', 10.00, 100000.00, 200),
(8, 6, '2026-09-28 10:30:00', 'Anorganik', 'Botol Plastik PET Bersih', 5.00, 20000.00, 40),
(9, 6, '2026-10-02 14:00:00', 'Organik', 'Sisa Kulit Buah Segar (Bahan Eco-Enzyme)', 5.00, 5000.00, 15),
(10, 7, '2026-10-04 15:10:00', 'Anorganik', 'Kardus Bekas Paket Tebal', 4.00, 12000.00, 24),
(11, 7, '2026-10-06 11:30:00', 'Organik', 'Dedaunan Kering Gugur Kampus', 4.50, 4500.00, 13),
(15, 1, '2026-10-07 10:55:00', 'Anorganik', 'Botol Plastik PET Bersih', 4.00, 16000.00, 32),
(16, 1, '2026-10-07 10:55:27', 'Organik', 'Dedaunan Kering Gugur Kampus', 2.00, 2000.00, 6),
(20, 8, '2026-10-07 11:01:28', 'Organik', 'Botol Plastik PET Bersih', 1.00, 4000.00, 8),
(22, 8, '2026-10-09 00:00:00', 'Anorganik', 'Botol Plastik PET Bersih', 8.00, 32000.00, 64);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nim_nip` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `status_civitas` enum('Mahasiswa Aktif','Dosen','Tenaga Kependidikan','Masyarakat Umum','Mitra Eksternal') NOT NULL,
  `prodi_unit` varchar(100) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT 1,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `saldo` decimal(12,2) DEFAULT 0.00,
  `poin` int(11) DEFAULT 0,
  `role` enum('nasabah','admin') DEFAULT 'nasabah',
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nim_nip`, `password`, `nama_lengkap`, `status_civitas`, `prodi_unit`, `id_fakultas`, `email`, `no_hp`, `saldo`, `poin`, `role`, `tanggal_daftar`) VALUES
(1, '210101502001', 'bsufmipa2026', 'Andi M. Resky Pratama', 'Mahasiswa Aktif', 'Pendidikan Kimia', 1, 'resky.pratama@mhs.unm.ac.id', NULL, 18000.00, 38, 'nasabah', '2026-10-06 16:52:32'),
(2, 'admin', 'admin123', 'Administrator BSU FMIPA UNM', 'Tenaga Kependidikan', 'Pusat Pengelolaan BSU FMIPA', 1, 'admin.bsu@unm.ac.id', NULL, 0.00, 0, 'admin', '2026-10-07 01:21:44'),
(3, '198501012010121001', 'admin123', 'Humaerah, S.Si (Admin Pos BSU)', 'Tenaga Kependidikan', 'Laboratorium & Lingkungan FMIPA', 1, NULL, NULL, 0.00, 0, 'admin', '2026-10-07 01:21:44'),
(5, '210101502002', 'bsufmipa2026', 'Nur Azizah S.', 'Mahasiswa Aktif', 'Biologi Lingkungan', 1, 'azizah.s@mhs.unm.ac.id', '081234567892', 32000.00, 110, 'nasabah', '2026-10-07 01:21:44'),
(6, '197903152005012002', 'bsufmipa2026', 'Dr. Ir. Sitti Rahma, M.Si.', 'Dosen', 'Jurusan Biologi FMIPA', 1, NULL, NULL, 125000.00, 420, 'nasabah', '2026-10-07 01:21:44'),
(7, '220102501005', 'bsufmipa2026', 'Muh. Fajar Ilham', 'Mahasiswa Aktif', 'Fisika Sains', 1, 'fajar.ilham@mhs.unm.ac.id', NULL, 18500.00, 65, 'nasabah', '2026-10-07 01:21:44'),
(8, '250210500030', '12345678', 'Sitti Aisyah', 'Mahasiswa Aktif', NULL, 1, NULL, NULL, 36000.00, 72, 'nasabah', '2026-10-07 02:36:30'),
(11, 'umum2', '123', 'strom', 'Mitra Eksternal', NULL, 1, NULL, NULL, 0.00, 0, 'nasabah', '2026-10-10 09:51:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nim_nip` (`nim_nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
