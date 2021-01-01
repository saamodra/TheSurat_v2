-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 08:07 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(20) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `kepala_sekolah` varchar(100) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `nama_sekolah`, `kepala_sekolah`, `bendahara`, `alamat`, `no_telp`, `email`, `website`, `logo`) VALUES
(1, 'SMK Negeri 1 Jenangan', 'Drs. H. Mustari, MM.', 'Samodra', 'Jl. Niken Gandini No. 98, Setono, Jenangan, Ponorogo', '083845307457', 'smkn1jenpo@yahoo.co.id', 'www.smkn1jenpo.sch.id', 'logo.smk.jenangan.png');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(20) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `letter` varchar(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas`, `jurusan`, `letter`, `keterangan`) VALUES
(7, '10', 'RPL', 'A', 'X RPL A'),
(8, '10', 'RPL', 'B', 'X RPL B'),
(9, '10', 'RPL', 'C', 'X RPL C'),
(10, '10', 'T. GB', 'A', 'X T. GB A'),
(11, '10', 'T. GB', 'B', 'X T. GB B'),
(12, '10', 'T. GB', 'C', 'X T. GB C'),
(13, '10', 'T. KKy', 'A', 'X T. KKy A'),
(14, '10', 'T. KKy', 'C', 'X T. KKy C'),
(15, '10', 'T. KKy', 'B', 'X T. KKy B'),
(16, '10', 'T. EI', 'A', 'X T. EI A'),
(17, '10', 'T. EI', 'B', 'X T. EI B'),
(18, '10', 'T. OI', 'A', 'X T. OI A'),
(19, '10', 'T. OI', 'B', 'X T. OI B'),
(20, '10', 'T. Pm', 'A', 'X T. Pm A'),
(21, '10', 'T. Pm', 'B', 'X T. Pm B'),
(22, '10', 'T. Pm', 'C', 'X T. Pm C');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `no_induk` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nisn` int(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nama_wali` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `kelas_id` int(20) NOT NULL,
  `tahunajaran_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `tahunajaran_id` int(20) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`tahunajaran_id`, `tahun_ajaran`, `keterangan`) VALUES
(1, '2017/2018', 'Ganjil'),
(4, '2017/2018', 'Genap'),
(5, '2015/2016', 'Ganjil'),
(6, '2015/2016', 'Genap'),
(7, '2016/2017', 'Ganjil'),
(8, '2016/2017', 'Genap'),
(10, '2014/2015', 'Ganjil'),
(11, '2014/2015', 'Genap'),
(12, '2013/2014', 'Ganjil'),
(13, '2013/2014', 'Genap'),
(14, '2012/2013', 'Ganjil'),
(19, '2012/2013', 'Genap'),
(20, '1990/1991', 'Jaman Raenak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('Admin','User') NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `level`, `email`, `password`) VALUES
(1, 'Samodra30', 'Samodra', 'Admin', 'samodra30@gmail.com', 'Samodra'),
(2, 'admin', 'Administrator', 'Admin', 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `kelas` (`kelas_id`),
  ADD KEY `tahunajaran` (`tahunajaran_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`tahunajaran_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `tahunajaran_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tahunajaran` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tahun_ajaran` (`tahunajaran_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
