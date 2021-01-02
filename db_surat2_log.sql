-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 05:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat2_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(20) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `menu` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `log` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `userid`, `waktu`, `menu`, `ip`, `log`) VALUES
(1362, 'admin@gmail.com', '2018-10-10 18:07:47', 'Log Aktifitas', '172.16.10.58', 'delete from log'),
(1363, 'admin@gmail.com', '2018-10-10 18:07:55', 'Backup', '172.16.10.58', 'Buka Halaman Backup (admin@gmail.com)'),
(1364, 'admin@gmail.com', '2018-10-10 18:07:58', 'Backup', '172.16.10.58', 'Buka Halaman Backup (admin@gmail.com)'),
(1365, 'admin@gmail.com', '2018-10-10 18:08:02', 'Surat Masuk', '172.16.10.58', 'Buka Halaman User (admin@gmail.com)'),
(1366, 'admin@gmail.com', '2018-10-10 18:08:05', 'Instansi', '172.16.10.58', 'Buka Halaman Instansi (admin@gmail.com)'),
(1367, 'admin@gmail.com', '2018-10-10 18:08:09', 'Block IP', '172.16.10.58', 'Buka Halaman Block IP (admin@gmail.com)'),
(1368, 'admin@gmail.com', '2018-10-10 18:08:28', 'Login', '172.16.10.84', 'Login User (admin@gmail.com)'),
(1369, 'admin@gmail.com', '2018-10-10 18:08:42', 'Block IP', '172.16.10.84', 'Buka Halaman Block IP (admin@gmail.com)'),
(1370, 'admin@gmail.com', '2018-10-10 18:08:46', 'Block IP', '172.16.10.84', 'Buka Halaman Tambah Block IP (admin@gmail.com)'),
(1371, 'admin@gmail.com', '2018-10-10 18:08:47', 'Block IP', '172.16.10.84', 'Buka Halaman Tambah Block IP (admin@gmail.com)'),
(1372, 'admin@gmail.com', '2018-10-10 18:08:58', 'Block IP', '172.16.10.84', 'Buka Halaman Tambah Block IP (admin@gmail.com)'),
(1373, 'admin@gmail.com', '2018-10-10 18:08:58', 'Block IP', '172.16.10.84', 'insert into block_ip(ip, keterangan) values (\'172.16.10.58\',\'\')'),
(1374, 'admin@gmail.com', '2018-10-10 18:09:00', 'Block IP', '172.16.10.84', 'Buka Halaman Block IP (admin@gmail.com)'),
(1375, '', '2018-10-10 18:09:19', 'Block IP', '172.16.10.84', 'delete from block_ip where blockip_id =\'46\''),
(1376, 'admin@gmail.com', '2018-10-10 18:09:19', 'Block IP', '172.16.10.84', 'Buka Halaman Block IP (admin@gmail.com)'),
(1377, 'admin@gmail.com', '2018-10-10 18:09:28', 'Identitas', '172.16.10.58', 'Buka Menu Identitas (admin@gmail.com)'),
(1378, 'admin@gmail.com', '2018-10-10 18:09:45', 'Jenis', '172.16.10.58', 'Buka Halaman Jenis (admin@gmail.com)'),
(1379, 'admin@gmail.com', '2018-10-10 18:09:48', 'Bagian', '172.16.10.58', 'Buka Halaman Laporan Bagian (admin@gmail.com)'),
(1380, 'admin@gmail.com', '2018-10-10 18:09:55', 'Backup', '172.16.10.58', 'Buka Halaman Backup (admin@gmail.com)'),
(1381, 'admin@gmail.com', '2018-10-10 18:10:05', 'Backup', '172.16.10.58', 'Buka Halaman Backup (admin@gmail.com)'),
(1382, 'admin@gmail.com', '2018-10-10 18:10:11', 'Surat Masuk', '172.16.10.58', 'Buka Halaman User (admin@gmail.com)'),
(1383, 'admin@gmail.com', '2018-10-10 18:10:14', 'Instansi', '172.16.10.58', 'Buka Halaman Instansi (admin@gmail.com)'),
(1384, 'admin@gmail.com', '2018-10-10 18:10:21', 'Surat Masuk', '172.16.10.58', 'Buka Halaman Surat Masuk (admin@gmail.com)'),
(1385, '', '2021-01-01 03:52:20', 'Backup', '::1', 'Buka Halaman Backup'),
(1386, '', '2021-01-01 03:52:23', 'User', '::1', 'Buka Halaman User'),
(1387, '', '2021-01-01 03:53:11', 'User', '::1', 'Buka Halaman User'),
(1388, '', '2021-01-01 03:53:23', 'Instansi', '::1', 'Buka Halaman Instansi'),
(1389, '', '2021-01-01 03:53:39', 'Bagian', '::1', 'Buka Halaman Bagian'),
(1390, '', '2021-01-01 03:53:50', 'User', '::1', 'Buka Halaman User'),
(1391, '', '2021-01-01 03:54:21', 'User', '::1', 'Buka Halaman User'),
(1392, '', '2021-01-01 03:55:37', 'User', '::1', 'Buka Halaman User'),
(1393, '', '2021-01-01 03:55:58', 'User', '::1', 'Buka Halaman User'),
(1394, '', '2021-01-01 03:58:13', 'Surat Masuk', '::1', 'Buka Halaman Surat Masuk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1395;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
