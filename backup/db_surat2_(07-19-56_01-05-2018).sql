-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_surat2
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bagian`
--

DROP TABLE IF EXISTS `bagian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bagian` (
  `bagian_id` int(11) NOT NULL AUTO_INCREMENT,
  `bagian` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bagian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bagian`
--

LOCK TABLES `bagian` WRITE;
/*!40000 ALTER TABLE `bagian` DISABLE KEYS */;
INSERT INTO `bagian` (`bagian_id`, `bagian`, `keterangan`) VALUES (1,'Keuangan','Keuangan'),(2,'Personalia','Personalia'),(3,'Sekretaris','Sekretaris'),(4,'Admin','Admin'),(5,'Keamanan','Keamanan'),(6,'Kebersihan','Kebersihan'),(7,'Tata Usaha','Tata Usaha'),(8,'Konsumsi','Konsumsi');
/*!40000 ALTER TABLE `bagian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identitas`
--

DROP TABLE IF EXISTS `identitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `identitas` (
  `identitas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_identitas` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `pemilik` varchar(50) DEFAULT NULL,
  `keuangan` varchar(50) DEFAULT NULL,
  `logo_kiri` varchar(50) DEFAULT NULL,
  `logo_kanan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`identitas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identitas`
--

LOCK TABLES `identitas` WRITE;
/*!40000 ALTER TABLE `identitas` DISABLE KEYS */;
INSERT INTO `identitas` (`identitas_id`, `nama_identitas`, `alamat`, `kota`, `telp`, `website`, `pemilik`, `keuangan`, `logo_kiri`, `logo_kanan`) VALUES (1,'SMK Negeri 1 Jenangan','Jl. Niken Gandini No. 98, Setono, Jenangan','Ponorogo','352481236','www.smkn1jenpo.sch.id','-','-','logo.smk.jenangan.png','logo.smk.jenangan.png');
/*!40000 ALTER TABLE `identitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instansi`
--

DROP TABLE IF EXISTS `instansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instansi` (
  `instansi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `kontak_person` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`instansi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instansi`
--

LOCK TABLES `instansi` WRITE;
/*!40000 ALTER TABLE `instansi` DISABLE KEYS */;
INSERT INTO `instansi` (`instansi_id`, `nama_instansi`, `alamat`, `kota`, `telp`, `hp`, `email`, `website`, `kontak_person`) VALUES (1,'Antar Mitra Sembada (AMS)','Babadan','Ponorogo','132819328098','0832457238772','ams@gmail.com','-','-'),(3,'PT. Beras Bulog','Geger','Madiun','3489589384','320982304','bulog@gmail.com','bbulog.com','-'),(4,'PT. Roma Biskuit','Dolopo','Madiun','093294820','329482843','roma@gmail.com','-','-'),(5,'PT. Telkom Madiun','Mlilir','Madiun','038492384209384','8392048209','telkomad@gmail.com','-','-'),(6,'Lenovo Indonesia','Unknown','Jakarta','9842402943890','809384902849','lenovoindo@lenovo.com','lenovo.com','-'),(7,'SMKN 1 Jenangan','Jenangan','Ponorogo','3247298347','92387489274','smkn1jenpo@yahoo.com','smkn1jenpo.sch.id','-'),(9,'PT. Unilever','Unknown','Unknown','839183091','7382947294','unilever@gmail.com1','-','-');
/*!40000 ALTER TABLE `instansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`jenis_id`, `jenis`, `keterangan`) VALUES (1,'Surat Dinas','Surat Dinas'),(2,'Surat Rahasia','Surat Rahasia'),(3,'Surat Pribadi','Surat Pribadi'),(4,'Surat Resmi','Surat Resmi'),(5,'Surat Tidak Resmi','Surat Tidak Resmi'),(7,'Surat Ijin','Surat Ijin'),(12,'Surat Test','Test');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi` (
  `lokasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lokasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` (`lokasi_id`, `lokasi`, `keterangan`) VALUES (1,'Rak-01','Atas'),(2,'Rak-01','Tengah'),(3,'Rak-01','Bawah'),(4,'Rak-02','Atas'),(5,'Rak-02','Tengah'),(7,'Rak-03','Atas');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_keluar`
--

DROP TABLE IF EXISTS `surat_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat_keluar` (
  `surat_keluar_id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `waktu` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`surat_keluar_id`),
  KEY `bagian` (`bagian_id`),
  KEY `instansi` (`instansi_id`),
  KEY `jenis` (`jenis_id`),
  KEY `lokasi` (`lokasi_id`),
  KEY `user` (`user_id`),
  CONSTRAINT `surat_keluar_ibfk1` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `surat_keluar_ibfk2` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`instansi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `surat_keluar_ibfk3` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `surat_keluar_ibfk4` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `surat_keluar_ibfk5` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_keluar`
--

LOCK TABLES `surat_keluar` WRITE;
/*!40000 ALTER TABLE `surat_keluar` DISABLE KEYS */;
INSERT INTO `surat_keluar` (`surat_keluar_id`, `nomor_surat`, `bagian_id`, `sifat`, `perihal`, `tanggal_surat`, `tanggal_kirim`, `nomor_agenda`, `lampiran`, `disposisi`, `tembusan`, `instansi_id`, `jenis_id`, `lokasi_id`, `user_id`, `waktu`) VALUES (7,'21371',2,'RAHASIA','jdkljasd','2018-04-03','2018-04-05','12','Navbar.docx','ghghj','gjhgj',3,2,3,'admin','2018-04-28 06:56:59'),(8,'12',2,'SANGAT RAHASIA','Prihal','2018-04-06','2018-04-12','sadasd','Tabel (4).xls','hghgh','hggj',6,3,7,'admin',NULL),(9,'23321',4,'KONFIDENSIAL','njnjnjnj','2018-04-20','2018-04-13','990','Menu.docx','sasd','sadasd',7,4,5,'admin','2018-04-27 18:29:43');
/*!40000 ALTER TABLE `surat_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_masuk`
--

DROP TABLE IF EXISTS `surat_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat_masuk` (
  `surat_masuk_id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `waktu` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`surat_masuk_id`),
  KEY `bagian` (`bagian_id`),
  KEY `instansi` (`instansi_id`),
  KEY `jenis` (`jenis_id`),
  KEY `lokasi` (`lokasi_id`),
  KEY `user` (`user_id`),
  CONSTRAINT `bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `instansi` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`instansi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lokasi` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_masuk`
--

LOCK TABLES `surat_masuk` WRITE;
/*!40000 ALTER TABLE `surat_masuk` DISABLE KEYS */;
INSERT INTO `surat_masuk` (`surat_masuk_id`, `nomor_surat`, `bagian_id`, `sifat`, `perihal`, `tanggal_surat`, `tanggal_terima`, `tanggal_expired`, `nomor_agenda`, `lampiran`, `disposisi`, `tembusan`, `instansi_id`, `jenis_id`, `tindak_lanjut`, `lokasi_id`, `user_id`, `waktu`) VALUES (14,'8920',2,'BIASA','hjghjg','2018-04-20','2018-04-14','2018-04-19','89098','db_surat2.sql','hjhkj','fggfhf',1,2,'PERLU TINDAK LANJUT',2,'samodra30',NULL),(15,'898913',2,'RAHASIA','jskhkash','2018-04-03','2018-04-11','2018-04-13','8989','1.oxps','-','-',1,2,'TIDAK PERLU TINDAK LANJUT',1,'admin',NULL),(16,'1223',2,'RAHASIA','sda','2018-04-05','2018-04-06','2018-04-13','123','Menu.docx','asa','ghjgh',3,2,'PERLU TINDAK LANJUT',3,'admin','2018-04-28 03:46:18'),(22,'789798',5,'BIASA','Keuangan','2018-04-07','2018-04-13','2018-04-20','21','Menu.docx','sadas','sahdkj',6,4,'PERLU TINDAK LANJUT',3,'admin','2018-04-28 03:38:39');
/*!40000 ALTER TABLE `surat_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` varchar(25) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` enum('Admin','User') DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `password`, `level`, `nama`) VALUES ('admin','admin','Admin','Admin'),('iankco','iankco','User','Muh. Hardiansah'),('samodra30','Samodra','Admin','Samodra'),('Shinigami12','Shinigami12','User','Shinigami'),('user','user','User','User');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-01 12:19:56
