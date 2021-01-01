-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 02:02 PM
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
-- Database: `db_surat2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `bagian_id` int(11) NOT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`bagian_id`, `bagian`, `keterangan`) VALUES
(1, 'Keuangan', 'Keuangan'),
(2, 'Personalia', 'Personalia'),
(3, 'Sekretaris', 'Sekretaris'),
(4, 'Admin', 'Admin'),
(5, 'Keamanan', 'Keamanan'),
(6, 'Kebersihan', 'Kebersihan'),
(7, 'Tata Usaha', 'Tata Usaha'),
(8, 'Konsumsi', 'Konsumsi');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(11) NOT NULL,
  `nama_identitas` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `pemilik` varchar(50) DEFAULT NULL,
  `keuangan` varchar(50) DEFAULT NULL,
  `logo_kiri` varchar(50) DEFAULT NULL,
  `logo_kanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `nama_identitas`, `alamat`, `kota`, `telp`, `website`, `pemilik`, `keuangan`, `logo_kiri`, `logo_kanan`) VALUES
(1, 'SMK Negeri 1 Jenangan', 'Jl. Niken Gandini No. 98, Setono, Jenangan', 'Ponorogob', '352481236', 'www.smkn1jenpo.sch.id', '-', '-', 'logo.smk.jenangan.png', 'logo.smk.jenangan.png');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `instansi_id` int(11) NOT NULL,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `kontak_person` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`instansi_id`, `nama_instansi`, `alamat`, `kota`, `telp`, `hp`, `email`, `website`, `kontak_person`) VALUES
(1, 'Antar Mitra Sembada (AMS)', 'Babadan', 'Ponorogo', '132819328098', '0832457238772', 'ams@gmail.com', '-', '-'),
(3, 'PT. Beras Bulog', 'Geger', 'Madiun', '3489589384', '320982304', 'bulog@gmail.com', 'bbulog.com', '-'),
(4, 'PT. Roma Biskuit', 'Dolopo', 'Madiun', '093294820', '329482843', 'roma@gmail.com', '-', '-'),
(5, 'PT. Telkom Madiun', 'Mlilir', 'Madiun', '038492384209384', '8392048209', 'telkomad@gmail.com', '-', '-'),
(6, 'Lenovo Indonesia', 'Unknown', 'Jakarta', '9842402943890', '809384902849', 'lenovoindo@lenovo.com', 'lenovo.com', '-'),
(7, 'SMKN 1 Jenangan', 'Jenangan', 'Ponorogo', '3247298347', '92387489274', 'smkn1jenpo@yahoo.com', 'smkn1jenpo.sch.id', '-'),
(9, 'PT. Unilever', 'Unknown', 'Unknown', '839183091', '7382947294', 'unilever@gmail.com1', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis`, `keterangan`) VALUES
(1, 'Surat Dinas', 'Surat Dinas'),
(2, 'Surat Rahasia', 'Surat Rahasia'),
(3, 'Surat Pribadi', 'Surat Pribadi'),
(4, 'Surat Resmi', 'Surat Resmi'),
(5, 'Surat Tidak Resmi', 'Surat Tidak Resmi'),
(7, 'Surat Ijin', 'Surat Ijin'),
(12, 'Surat Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `lokasi_id` int(11) NOT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`lokasi_id`, `lokasi`, `keterangan`) VALUES
(1, 'Rak-01', 'Atas'),
(2, 'Rak-01', 'Tengah'),
(3, 'Rak-01', 'Bawah'),
(4, 'Rak-02', 'Atas'),
(5, 'Rak-02', 'Tengah'),
(7, 'Rak-03', 'Atas');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `surat_keluar_id` bigint(20) NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `sifat` varchar(50) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `nomor_agenda` varchar(100) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `disposisi` text,
  `tembusan` varchar(255) DEFAULT NULL,
  `instansi_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `lokasi_id` int(11) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`surat_keluar_id`, `nomor_surat`, `bagian_id`, `sifat`, `perihal`, `tanggal_surat`, `tanggal_kirim`, `nomor_agenda`, `lampiran`, `disposisi`, `tembusan`, `instansi_id`, `jenis_id`, `lokasi_id`, `user_id`, `waktu`) VALUES
(1, '001/002', 3, 'RAHASIA', '-', '2018-03-02', '2018-03-01', '-', '-', '-', '-', 1, 1, 3, '1', '2018-03-27 09:55:53'),
(2, '002/003', 2, 'KONFIDENSIAL', 'asd', '2018-03-05', '2018-03-06', '45', 'adsasd', 'sadads', 'ddssda', 3, 2, 3, '12', NULL),
(3, '003/004', 1, 'BIASA', '-', '2018-03-07', '2018-03-05', '-', '-', '-', '-', 4, 3, 7, '2', NULL),
(4, '004/005', 4, 'KONFIDENSIAL', '-', '2018-03-08', '2018-03-07', '32', 'dsasd', 'adsads', 'adsasd', 5, 4, 5, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `surat_masuk_id` bigint(20) NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `sifat` varchar(50) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_expired` date DEFAULT NULL,
  `nomor_agenda` varchar(100) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `disposisi` text,
  `tembusan` varchar(255) DEFAULT NULL,
  `instansi_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `tindak_lanjut` varchar(255) DEFAULT NULL,
  `lokasi_id` int(11) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`surat_masuk_id`, `nomor_surat`, `bagian_id`, `sifat`, `perihal`, `tanggal_surat`, `tanggal_terima`, `tanggal_expired`, `nomor_agenda`, `lampiran`, `disposisi`, `tembusan`, `instansi_id`, `jenis_id`, `tindak_lanjut`, `lokasi_id`, `user_id`, `waktu`) VALUES
(6, '001/1009', 1, 'BIASA', '-', '2018-03-06', '2018-03-07', '2018-03-08', '2', 'Lamp', 'Disp', 'Temb', 7, 4, 'TIDAK PERLU TINDAK LANJUT', 3, NULL, '2018-03-26 11:27:59'),
(7, '002/4819281', 5, 'KONFIDENSIAL', '-', '2018-03-13', '2018-03-10', '2018-03-16', '23', '-', '-', '-', 6, 4, 'PERLU TINDAK LANJUT', 3, NULL, NULL),
(8, '56', 3, 'RAHASIA', '-', '2018-03-22', '2018-03-24', '2018-03-24', '2', '-', '-', '-', 5, 3, 'PERLU TINDAK LANJUT', 4, '12', NULL),
(9, '21389013', 1, 'SANGAT RAHASIA', 'sadas', '2018-03-16', '2018-03-16', '2018-03-16', '123', 'sad', 'asd', 'fdf', 4, 3, 'PERLU TINDAK LANJUT', 4, '1', NULL),
(11, '987565324', 1, 'LAIN-LAIN', '-', '2018-03-08', '2018-03-11', '2018-03-13', '55757', '--', '-', '-', 9, 5, 'TIDAK PERLU TINDAK LANJUT', 3, '12', '2018-03-26 21:36:24'),
(13, '123213', 2, 'SANGAT RAHASIA', '-', '2018-03-10', '2018-03-18', '2018-03-20', '1', '-', '-', '-', 7, 3, 'PERLU TINDAK LANJUT', 3, '2', '2018-04-14 13:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(25) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` enum('Admin','User') DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `level`, `nama`) VALUES
('1', 'Samodra', 'Admin', 'Samodra12'),
('12', 'iankco', 'User', 'iankco'),
('2', 'Shinigami12', 'User', 'Shinigami12'),
('3', 'admin', 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`bagian_id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`instansi_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`surat_keluar_id`),
  ADD KEY `bagian` (`bagian_id`),
  ADD KEY `instansi` (`instansi_id`),
  ADD KEY `jenis` (`jenis_id`),
  ADD KEY `lokasi` (`lokasi_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`surat_masuk_id`),
  ADD KEY `bagian` (`bagian_id`),
  ADD KEY `instansi` (`instansi_id`),
  ADD KEY `jenis` (`jenis_id`),
  ADD KEY `lokasi` (`lokasi_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `bagian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `instansi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `surat_keluar_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `surat_masuk_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk1` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk2` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`instansi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk3` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk4` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk5` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `instansi` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`instansi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lokasi` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
