-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: ayobelajar
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kategori` (
  `id_kategori` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Teknologi'),(2,'Bisnis');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kelas` (
  `id_kelas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `poto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pengguna` int(10) unsigned NOT NULL,
  `id_kategori` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `kelas_id_pengguna_foreign` (`id_pengguna`),
  KEY `kelas_id_kategori_foreign` (`id_kategori`),
  CONSTRAINT `kelas_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `kelas_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'Belajar Android Dasar','Belajari dari 0 sampai jago',260000,'2018-07-24','photos/Belajar Android Dasar.png',3,1),(2,'Bisnis Model Canvas','Mengulas habis semua tentang bisnis model canvas, serta bagaimana memulai bisnis dari awal.',350000,'2018-07-24','photos/Basis Data II.jpeg',3,2);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelaspelajar`
--

DROP TABLE IF EXISTS `kelaspelajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kelaspelajar` (
  `id_kelas_pelajar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(10) unsigned NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_kelas_pelajar`),
  UNIQUE KEY `kelaspelajar_id_pengguna_unique` (`id_pengguna`),
  UNIQUE KEY `kelaspelajar_id_kelas_unique` (`id_kelas`),
  CONSTRAINT `kelaspelajar_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `kelaspelajar_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelaspelajar`
--

LOCK TABLES `kelaspelajar` WRITE;
/*!40000 ALTER TABLE `kelaspelajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelaspelajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materi` (
  `id_materi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_materi`),
  UNIQUE KEY `materi_id_kelas_unique` (`id_kelas`),
  CONSTRAINT `materi_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi`
--

LOCK TABLES `materi` WRITE;
/*!40000 ALTER TABLE `materi` DISABLE KEYS */;
/*!40000 ALTER TABLE `materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materikelaspelajar`
--

DROP TABLE IF EXISTS `materikelaspelajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materikelaspelajar` (
  `id_kelas_pelajar` int(10) unsigned NOT NULL,
  `id_materi` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  UNIQUE KEY `materikelaspelajar_id_kelas_pelajar_unique` (`id_kelas_pelajar`),
  UNIQUE KEY `materikelaspelajar_id_materi_unique` (`id_materi`),
  CONSTRAINT `materikelaspelajar_id_kelas_pelajar_foreign` FOREIGN KEY (`id_kelas_pelajar`) REFERENCES `kelaspelajar` (`id_kelas_pelajar`),
  CONSTRAINT `materikelaspelajar_id_materi_foreign` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materikelaspelajar`
--

LOCK TABLES `materikelaspelajar` WRITE;
/*!40000 ALTER TABLE `materikelaspelajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `materikelaspelajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pengguna` (
  `id_pengguna` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biografi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto_profil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('Admin','Pengajar','Pelajar') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (2,'Andri R. H.','Seorang mahasiswa UNIKOM yang juga merupakan desainer.','android cute.png','andri@gmail.com','$2y$10$YMIVN/ASIlhYpPeFROc41.GnIrLC6PYltLZIV2AD582m0jUH8ICI.','Pengajar'),(3,'Satria Adi Putra','Seorang mahasiswa UNIKOM jurusan Teknik Informatika angkatan 2016','photos/','satadii11@gmail.com','$2y$10$RmjgQWT5Ym58PpVVFsHKVuhn7sl4iqctz.cCOVqM3mAmsZoxw5FQW','Admin');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-24  8:13:39
