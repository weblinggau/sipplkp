-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 05:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipplkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dpl`
--

CREATE TABLE `tb_dpl` (
  `id_dpl` int(11) NOT NULL,
  `nama_dpl` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `id_anggota` int(11) NOT NULL,
  `mahasiswa1` int(11) NOT NULL,
  `mahasiswa2` int(11) NOT NULL,
  `mahasiswa3` int(11) DEFAULT NULL,
  `dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`id_anggota`, `mahasiswa1`, `mahasiswa2`, `mahasiswa3`, `dosen`) VALUES
(3, 17, 18, 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kp`
--

CREATE TABLE `tb_kp` (
  `id_kp` int(11) NOT NULL,
  `id_pembimbingkp` int(11) NOT NULL,
  `judul_kp` varchar(100) DEFAULT NULL,
  `pesan_dosen` text DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2','3','4','5') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbingkp`
--

CREATE TABLE `tb_pembimbingkp` (
  `id_pembimbingkp` int(11) NOT NULL,
  `mahasiswa` int(11) NOT NULL,
  `dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembimbingkp`
--

INSERT INTO `tb_pembimbingkp` (`id_pembimbingkp`, `mahasiswa`, `dosen`) VALUES
(2, 13, 11),
(3, 14, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppl`
--

CREATE TABLE `tb_ppl` (
  `id_ppl` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `judul_ppl` varchar(100) DEFAULT NULL,
  `pesan_dosen` text DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2','3','4','5') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `role_id` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `username`, `nip`, `npm`, `password`, `nama`, `jk`, `angkatan`, `role_id`) VALUES
(4, 'rahmat15april@gmail.co.id', 'rahmad', '', '', '$2y$10$646DasfAAA6hJljU8UcTIunj1SBhcPmtFj6VBIe8YcPRkwX.svQRG', 'Rahmad Alnasiman', 'L', '', '1'),
(5, 'raju@gmail.com', 'raju', '', '', '$2y$10$6Hm7wOfcDBvSgCOx4OdmCe6TEl/.KWrbnKPoqhKZaSC4wshvwo0B.', 'Raju Wahyudi Pratama', 'L', '', '1'),
(6, 'rahmad@gmail.com', '', '', 'g1a018061', 'mahasiswanolep', 'Rahmad Alnasiman', 'L', '2018', '3'),
(7, 'fatma@gmail.com', 'fatma', '', '', '$2y$10$68kCfxNRZqu9rITxAxkznuoWqxQdXCqSqduoDoglCISnzpCofUwzO', 'Fatma Juwita', 'P', '', '1'),
(11, 'fputama@unib.ac.id', '', '198906232018031001', '', '$2y$10$SbA82nOjj32eDiFArloAfeVs1p.SG6PYo2iXiOgVqUFjorAoxJpK.', 'Ferzha Putra Utama, S.T., M.Eng.', 'L', '', '2'),
(12, 'raju@gmail.com', '', '', 'g1a018091', '$2y$10$fT5/.kKQxAMrKh42q2y.r.pBsEXmOT3R0w8AJ8GNosQsNDP3H5ArW', 'Raju Wahyudi Pratama', 'L', '2018', '3'),
(13, 'fatma@gmail.com', '', '', 'g1a018044', '$2y$10$5zl2oG4kL/50TpDHMBQGJeJXglFKIIGaRqMYQgGb9xgHkljNTQKLa', 'Fatma Juwita', 'P', '2018', '3'),
(14, 'agung@gmail.com', '', '', 'g1a018001', '$2y$10$uTGZS7k5rp2Ghhync8.otOO/Pdivj6Q8GYUDZ.mrzCs6GFcwuZ/Ca', 'Agung Destio', 'L', '2018', '3'),
(15, 'tedhy@gmail.com', '', '', 'g1a018045', '', 'Tedhy Erlansyah', 'L', '2018', '3'),
(16, 'naufal@gmail.com', '', '', 'g1a018037', '$2y$10$Ak0Mb2ERjNptP2NlLc/0s.km2wNl.rpORvShBDrZJOaWDICLKreK2', 'Naufal Rizky Ananda', 'L', '2018', '3'),
(17, 'wasep@gmail.com', '', '', 'g1a018053', '$2y$10$QDwXUJ2PfuVdRlvptBbp/eAvGPJZIvu8AvgQPkMkuXKDh1Mpe/FQu', 'Wasep Triansyah', 'L', '2018', '3'),
(18, 'zaldy@gmail.com', '', '', 'g1a018057', '$2y$10$g.nDsQeG44GQJhVtfe71qO4DEHwEJTogvj.Br7lI2lPnXczxU3Hou', 'Harizaldy Cahya Pratama', 'L', '2018', '3'),
(19, 'abie@gmail.com', '', '', 'g1a018063', '$2y$10$hdLZXlH0HkloMSUsOY6RluUdvPYnUU2Mww.CiOSYpLJWmZlR0p70i', 'Muhammad Farabie', 'L', '2018', '3'),
(20, 'danny@gmail.com', '', '', 'g1a018065', '$2y$10$yYGESwVfzc66kHF2z78KV.N..IPDcdIaYkb0rkOyQfbafWaTc9ATO', 'Danny Brantadikara', 'L', '2018', '3'),
(22, 'dea@gmail.com', '', '', 'g1a018073', '', 'Dea Fania', 'P', '2018', '3'),
(23, 'awang@gmail.com', '', '', 'g1a018079', '$2y$10$npblngVDvIDU3nCnQYffWuWf.JTcRPAjbhf/taPMS5NixCcfrPOzm', 'Achmad Rilwanul Izzati', 'L', '2018', '3'),
(24, 'wahyu@gmail.com', '', '', 'g1a018093', '$2y$10$eWSmcyViMk4dciMEoxcpz.GcTFaj6ko/TQXV8S/yij77rUj.aeTbK', 'Wahyu Saputra', 'L', '2018', '3'),
(25, 'arie.vatresia@unib.ac.id', '', '198502042008122002', '', '$2y$10$b/a.CZgLn8kUe4D2yDP6iOpo2CTyTTgcWJQXUaT2.OdhUOVqEOuqW', 'Arie Vatresia, S.T., M.T.I., Ph.D.', 'P', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dpl`
--
ALTER TABLE `tb_dpl`
  ADD PRIMARY KEY (`id_dpl`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `mahasiswa1` (`mahasiswa1`),
  ADD KEY `mahasiswa2` (`mahasiswa2`),
  ADD KEY `dosen` (`dosen`);

--
-- Indexes for table `tb_kp`
--
ALTER TABLE `tb_kp`
  ADD PRIMARY KEY (`id_kp`),
  ADD KEY `id_pembimbingkp` (`id_pembimbingkp`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_pembimbingkp`
--
ALTER TABLE `tb_pembimbingkp`
  ADD PRIMARY KEY (`id_pembimbingkp`),
  ADD KEY `mahasiswa` (`mahasiswa`),
  ADD KEY `dosen` (`dosen`);

--
-- Indexes for table `tb_ppl`
--
ALTER TABLE `tb_ppl`
  ADD PRIMARY KEY (`id_ppl`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dpl`
--
ALTER TABLE `tb_dpl`
  MODIFY `id_dpl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kp`
--
ALTER TABLE `tb_kp`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pembimbingkp`
--
ALTER TABLE `tb_pembimbingkp`
  MODIFY `id_pembimbingkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ppl`
--
ALTER TABLE `tb_ppl`
  MODIFY `id_ppl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dpl`
--
ALTER TABLE `tb_dpl`
  ADD CONSTRAINT `tb_dpl_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`);

--
-- Constraints for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD CONSTRAINT `tb_kelompok_ibfk_1` FOREIGN KEY (`mahasiswa1`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_kelompok_ibfk_2` FOREIGN KEY (`mahasiswa2`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_kelompok_ibfk_4` FOREIGN KEY (`dosen`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_kp`
--
ALTER TABLE `tb_kp`
  ADD CONSTRAINT `tb_kp_ibfk_1` FOREIGN KEY (`id_pembimbingkp`) REFERENCES `tb_pembimbingkp` (`id_pembimbingkp`);

--
-- Constraints for table `tb_pembimbingkp`
--
ALTER TABLE `tb_pembimbingkp`
  ADD CONSTRAINT `tb_pembimbingkp_ibfk_1` FOREIGN KEY (`mahasiswa`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_pembimbingkp_ibfk_2` FOREIGN KEY (`dosen`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_ppl`
--
ALTER TABLE `tb_ppl`
  ADD CONSTRAINT `tb_ppl_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_kelompok` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
