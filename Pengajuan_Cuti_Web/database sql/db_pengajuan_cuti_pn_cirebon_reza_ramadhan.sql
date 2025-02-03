-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 03:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengajuan_cuti_pn_cirebon_reza_ramadhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_cuti_pegawai`
--

CREATE TABLE `tbl_data_cuti_pegawai` (
  `id_cuti_pegawai` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `nomor_hp` char(13) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `masa_kerja` varchar(50) DEFAULT NULL,
  `jenis_cuti` varchar(100) DEFAULT NULL,
  `alasan_cuti` varchar(225) DEFAULT NULL,
  `lama_cuti` varchar(100) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nama_panitera` varchar(100) DEFAULT NULL,
  `nama_ketua` varchar(100) DEFAULT NULL,
  `app_panitera` varchar(100) DEFAULT NULL,
  `app_ketua` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_cuti_pegawai`
--

INSERT INTO `tbl_data_cuti_pegawai` (`id_cuti_pegawai`, `id_pegawai`, `id_jabatan`, `jenis_kelamin`, `nomor_hp`, `kabupaten`, `masa_kerja`, `jenis_cuti`, `alasan_cuti`, `lama_cuti`, `tanggal_mulai`, `tanggal_selesai`, `nama_panitera`, `nama_ketua`, `app_panitera`, `app_ketua`) VALUES
(11, 96, 105, 'Laki-Laki', '083807303753', 'cirebon', '11 thn', 'cuti karena alasan penting', 'acara keluarga', '1 hari', '2024-01-30', '2024-01-30', 'm.reza', 'm.yuda', 'disetujui', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_golongan`
--

CREATE TABLE `tbl_data_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_golongan`
--

INSERT INTO `tbl_data_golongan` (`id_golongan`, `nama_golongan`, `id_user`) VALUES
(35, '4/a', 136),
(36, '1/a', 137),
(39, 'I/b', 140);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_jabatan`
--

CREATE TABLE `tbl_data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_jabatan`
--

INSERT INTO `tbl_data_jabatan` (`id_jabatan`, `nama_jabatan`, `id_user`) VALUES
(96, 'manager', 136),
(97, 'sekretaris', 137),
(105, 'sekretaris', NULL),
(106, 'sekretaris', NULL),
(108, 'manager', NULL),
(109, 'sekretaris', 140);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_ketua`
--

CREATE TABLE `tbl_data_ketua` (
  `id_ketua` int(11) NOT NULL,
  `nama_ketua` varchar(100) DEFAULT NULL,
  `nip_ketua` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_ketua`
--

INSERT INTO `tbl_data_ketua` (`id_ketua`, `nama_ketua`, `nip_ketua`) VALUES
(1, 'yuda afandi, S.kom', '200113425');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_panitera`
--

CREATE TABLE `tbl_data_panitera` (
  `id_panitera` int(11) NOT NULL,
  `nama_panitera` varchar(100) DEFAULT NULL,
  `nip_panitera` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_panitera`
--

INSERT INTO `tbl_data_panitera` (`id_panitera`, `nama_panitera`, `nip_panitera`) VALUES
(4, 'm.reza', '087218271821');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pegawai`
--

CREATE TABLE `tbl_data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `nip` char(18) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_pegawai`
--

INSERT INTO `tbl_data_pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `id_jabatan`, `id_user`, `id_golongan`, `unit_kerja`, `pendidikan_terakhir`, `alamat`) VALUES
(83, 'reza ramadhan', '200511078', 96, 136, 35, 'sdn 1 pamengkang 2', 's1 teknik web', 'DUSUN SITUNGGAK RT 002 RW 005 DESA SETUPATOK KECAMATAN MUNDU'),
(84, 'faqih wirahadi kusuma ', '201511079', 97, 137, 36, 'pn negeri cirebon', 's1', 'desa apa aja bisa'),
(96, 'faqih wirahadi kusuma ', '201511079', NULL, NULL, NULL, 'pn negeri cirebon', 's1', 'desa apa aja bisa'),
(100, 'Yuda Afandi', '200511000', 109, 140, 39, 'Pengadilan Negeri Cirebon Kelas 1B', 'S1 Teknik Informatika', 'Jl.Setupatok Kec.mundu Kab.cirebon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_user`
--

CREATE TABLE `tbl_multi_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nip` char(18) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `pass_user` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_multi_user`
--

INSERT INTO `tbl_multi_user` (`id_user`, `nama_lengkap`, `nama_depan`, `nip`, `jenis_kelamin`, `pass_user`, `level`) VALUES
(136, 'reza ramadhan', 'reza R4', '200511078', 'Laki-Laki', '7bf5667fa5864d4b78117115a8e47000', 'admin'),
(137, 'faqih wirahadi kusuma ', 'faqih', '201511079', 'Laki-Laki', '5fc7c823dd08630552fa0e8a2e576183', 'pegawai'),
(140, 'Yuda Afandi', 'Yuda', '200511000', 'Laki-Laki', 'b7f9bb016f13f9133e97c73f3317e63d', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_cuti_pegawai`
--
ALTER TABLE `tbl_data_cuti_pegawai`
  ADD PRIMARY KEY (`id_cuti_pegawai`),
  ADD KEY `FK_tbl_data_cuti_pegawai_tbl_data_pegawai` (`id_pegawai`),
  ADD KEY `FK_tbl_data_cuti_pegawai_tbl_data_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_data_golongan`
--
ALTER TABLE `tbl_data_golongan`
  ADD PRIMARY KEY (`id_golongan`),
  ADD KEY `FK_tbl_data_golongan_tbl_multi_user` (`id_user`);

--
-- Indexes for table `tbl_data_jabatan`
--
ALTER TABLE `tbl_data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `FK_tbl_data_jabatan_tbl_multi_user` (`id_user`);

--
-- Indexes for table `tbl_data_ketua`
--
ALTER TABLE `tbl_data_ketua`
  ADD PRIMARY KEY (`id_ketua`),
  ADD UNIQUE KEY `nip_ketua` (`nip_ketua`);

--
-- Indexes for table `tbl_data_panitera`
--
ALTER TABLE `tbl_data_panitera`
  ADD PRIMARY KEY (`id_panitera`),
  ADD UNIQUE KEY `nip_panitera` (`nip_panitera`);

--
-- Indexes for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `FK_tbl_data_pegawai_tbl_data_golongan` (`id_golongan`) USING BTREE,
  ADD KEY `FK_tbl_data_pegawai_tbl_data_jabatan` (`id_jabatan`),
  ADD KEY `FK_tbl_data_pegawai_tbl_multi_user` (`id_user`);

--
-- Indexes for table `tbl_multi_user`
--
ALTER TABLE `tbl_multi_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_cuti_pegawai`
--
ALTER TABLE `tbl_data_cuti_pegawai`
  MODIFY `id_cuti_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_data_golongan`
--
ALTER TABLE `tbl_data_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_data_jabatan`
--
ALTER TABLE `tbl_data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_data_ketua`
--
ALTER TABLE `tbl_data_ketua`
  MODIFY `id_ketua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_data_panitera`
--
ALTER TABLE `tbl_data_panitera`
  MODIFY `id_panitera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_multi_user`
--
ALTER TABLE `tbl_multi_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_data_cuti_pegawai`
--
ALTER TABLE `tbl_data_cuti_pegawai`
  ADD CONSTRAINT `FK_tbl_data_cuti_pegawai_tbl_data_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_data_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_data_cuti_pegawai_tbl_data_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_data_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_data_golongan`
--
ALTER TABLE `tbl_data_golongan`
  ADD CONSTRAINT `FK_tbl_data_golongan_tbl_multi_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_multi_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_data_jabatan`
--
ALTER TABLE `tbl_data_jabatan`
  ADD CONSTRAINT `FK_tbl_data_jabatan_tbl_multi_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_multi_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  ADD CONSTRAINT `FK_tbl_data_pegawai_tbl_data_golongan` FOREIGN KEY (`id_golongan`) REFERENCES `tbl_data_golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_data_pegawai_tbl_data_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_data_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_data_pegawai_tbl_multi_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_multi_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
