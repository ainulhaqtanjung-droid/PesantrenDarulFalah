-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_psbpesantren
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `santri`
--

DROP TABLE IF EXISTS `santri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_santri` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_hp_orang_tua` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_verifikasi` enum('pending','verified','rejected') DEFAULT 'pending',
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `nilai_ujian` int(11) DEFAULT NULL,
  `status_kelulusan` enum('Lulus','Tidak Lulus','Belum Ujian') DEFAULT 'Belum Ujian',
  PRIMARY KEY (`id_santri`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`Id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `santri`
--

LOCK TABLES `santri` WRITE;
/*!40000 ALTER TABLE `santri` DISABLE KEYS */;
INSERT INTO `santri` VALUES (1,1,'Ainul Haq Tanjung','Perempuan','Aek Kanopan','2005-04-17','Jl. Kasuari, Medan Sunggal','Usman Tanjung','Berliana Sagala','085275615061','2025-12-07 04:48:44','verified','1765083637_WhatsApp Image 2025-12-07 at 11.54.45_c7a9c2f2.jpg',100,'Lulus'),(2,3,'Pitri Ayu SYahilla Sitorus','Perempuan','Sei Piring','2004-11-09','Jl. Sei Batang Hari, Sei Kambing B','PUTRA ','FITRI','082345657889','2025-12-11 02:39:30','verified',NULL,NULL,'Belum Ujian'),(3,4,'Dzakiya Naifa Naibaho','Perempuan','','2012-04-24','Sidamanik, Simalungun','Afridon Naibaho','Mardiana','085275615061','2025-12-18 02:22:16','verified',NULL,90,'Lulus'),(4,5,'Aisyah Nuha Azzahra','Perempuan','Siantar','2026-01-14','Medan','Naibaho','Diana','083467876534','2026-01-14 14:12:12','verified','1768401685_free-user-login-icon-305-thumb.png',80,'Lulus'),(5,6,'Fitri Ayu','Laki-laki','Medan','2026-01-07','Medan','Satria','Yuni','081234567898','2026-01-14 15:06:47','verified','1768403333_free-user-login-icon-305-thumb.png',100,'Lulus'),(6,7,'Abdul Aziz','Laki-laki','Medan','2015-03-06','Jl. Baru Gg. Berkat','Bagus','Marni','0812345716781','2026-01-14 15:49:58','verified','1768406216_free-user-login-icon-305-thumb.png',100,'Lulus');
/*!40000 ALTER TABLE `santri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_ujian`
--

DROP TABLE IF EXISTS `soal_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_ujian` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `jawaban` enum('a','b','c','d') NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_ujian`
--

LOCK TABLES `soal_ujian` WRITE;
/*!40000 ALTER TABLE `soal_ujian` DISABLE KEYS */;
INSERT INTO `soal_ujian` VALUES (1,'Rukun Islam yang pertama adalah?','Puasa','Syahadat','Shalat','Zakat','b'),(2,'Kitab suci umat Islam adalah?','Injil','Taurat','Al-Qur\'an','Zabur','c'),(3,'Nabi terakhir yang diutus Allah adalah?','Nabi Isa','Nabi Musa','Nabi Ibrahim','Nabi Muhammad SAW','d'),(4,'Shalat wajib dalam sehari semalam sebanyak?','3 waktu','4 waktu','5 waktu','6 waktu','c'),(5,'Puasa Ramadhan hukumnya adalah?','Wajib','Sunnah','Makruh','Mubah','a'),(6,'Hari raya umat Islam setelah puasa Ramadhan adalah?','Idul Adha','Idul Fitri','Tahun Baru Hijriah','Maulid Nabi','b'),(7,'Menghormati kedua orang tua adalah perintah untuk?','Durhaka','Berbuat baik','Mengabaikan','Menyakiti','b'),(8,'Kalimat \"La ilaha illallah\" disebut?','Tasbih','Tahlil','Tahmid','Takbir','b'),(9,'Kiblat umat Islam ketika shalat adalah?','Masjid Nabawi','Ka\'bah','Masjid Al-Aqsa','Langit','b'),(10,'Puasa berarti menahan diri dari?','Makan, minum, dan hawa nafsu','Tidur','Berbicara','Belajar','a');
/*!40000 ALTER TABLE `soal_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `Id_user` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nama_lengkap` varchar(100) NOT NULL,
  `Role` enum('admin','santri') NOT NULL DEFAULT 'santri',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Id_user`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ainul','Ainul04','Ainul Haq Tanjung','santri','2025-12-07 04:40:42'),(2,'adminpsb','adminpsb','Admin PSB','admin','2025-12-07 04:51:56'),(3,'PutriAyu','091105','Putri Ayu Sitorus','santri','2025-12-11 02:21:02'),(4,'Dzakiya','240412','Dzakiya Naifa','santri','2025-12-18 02:18:30'),(5,'Aisyah','Azzahra04','Aisyah Nuha Azzahra','santri','2026-01-14 14:10:29'),(6,'Fitri','Fitri123','Fitri Ayu','santri','2026-01-14 15:04:48'),(7,'saya123','123456','Abdul Aziz','santri','2026-01-14 15:47:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-14 23:09:55
