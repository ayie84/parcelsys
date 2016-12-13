-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnueabihf (armv7l)
--
-- Host: localhost    Database: pms
-- ------------------------------------------------------
-- Server version	5.6.30-1+b1

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
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courier_name` text NOT NULL COMMENT 'Courier Name',
  `courier_address` varchar(255) NOT NULL COMMENT 'Courier Address',
  `courier_contact_no` varchar(50) NOT NULL COMMENT 'Courier Contact Number',
  `courier_fax_no` varchar(15) NOT NULL,
  `courier_pic_staff` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courier`
--

LOCK TABLES `courier` WRITE;
/*!40000 ALTER TABLE `courier` DISABLE KEYS */;
INSERT INTO `courier` VALUES (1,'POS LAJU','A 141, Jalan Haji Abdul Aziz, 25000 Kuantan Pahang.','09-5161809','',''),(2,'GDEX','A-271, Jalan Air Putih, 25300 Kuantan Pahang.','09-5672033','',''),(3,'ABX','E-1325, Wisma Al-Warisan, Jln Bukit Ubi, 25200 Kuantan Pahang.','09-5141700','',''),(4,'NATIONWIDE','B-184, Gorung & @nd Floor, Jln Dato Lim Hoe Lek, 25000 Kuantan Pahang','09-5136303','',''),(5,'KTMD','18, Jalan Kenanga off Jln Bukit Ubi, Perkampungan Bukit Ubi 25200 Kuantan Pahang.','1-800-22-5863','',''),(6,'SKY NET','A-79, GF Jalan Bukit Ubi, 25200 Kuantan Pahang.',' 09-5156996','',''),(7,'DHL','B-38 Jalan Gebeng 2/6, Pusat Komersial Gebeng, 26080 Kuantan Pahang.','09-5834893','',''),(8,'DEX','','','',''),(9,'POS DAFTAR','','','',''),(10,'POS EKSPRESS','','','',''),(11,'COM ONE','','','',''),(12,'UPS','','','',''),(13,'AIR PAK','B 12, GF, Lorong IM 5/2, Jln Persiaran Sultan Abu Bakar, 25200 Kuantan Pahang.','09-5733881','',''),(14,'CITY LINK','B 90 1st Floor, Seri Dagangan 2, Jln Tun Ismail 25000 Kuantan Pahang.','09-5121424','',''),(15,'TAQ\'BIN','No 20. Jln IM 3/3, Bandar Indera Mahkota 25200 Kuantan Pahang.','','',''),(16,'NINJA VAN','','','',''),(17,'WEZCARGO','No. 20, Jalan Tiara 2, Tiara Square Centre, Taman Perindustrian UEP 47600 Subang Jaya Selangor DE.','03-80249927','',''),(18,'MY BEST','','','',''),(19,'DEI','','','',''),(20,'TNT','','1-300-882-882','',''),(21,'SF EXPRESS','','','',''),(22,'MY POST ONLINE','','','',''),(23,'BUMI X','17, Jalan PJS 9/5, Bandar Sunway, 46150 Petaling Jaya Selangor.','03-56211226','',''),(24,'GEM WORLD','','','',''),(25,'SURE REACH','B-10, GF Lorong Seri Teruntum 85, off Jalan Wong Ah Jang 25100 Kuantan Pahang.','0123341932','',''),(26,'JUMBO','','','',''),(27,'BANTING EXPRESS','','','',''),(28,'LWE','','','','');
/*!40000 ALTER TABLE `courier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_user`
--

DROP TABLE IF EXISTS `login_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_user` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_user`
--

LOCK TABLES `login_user` WRITE;
/*!40000 ALTER TABLE `login_user` DISABLE KEYS */;
INSERT INTO `login_user` VALUES (1,'admin','admin','root','7b24afc8bc80e548d66c4e7ff72171c5'),(2,'abc','cde','abc','7815696ecbf1c96e6894b779456d330e'),(3,'123','321','246','7f1de29e6da19d22b51c68001e7e0e54');
/*!40000 ALTER TABLE `login_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcel`
--

DROP TABLE IF EXISTS `parcel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parcel_cnumber` varchar(50) NOT NULL COMMENT 'Parcel Tracking Number',
  `parcel_rcpt_name` varchar(80) NOT NULL COMMENT 'Receipent Name',
  `parcel_ptj` varchar(80) NOT NULL COMMENT 'Distributor',
  `parcel_takenby` varchar(255) NOT NULL,
  `parcel_courier` varchar(80) NOT NULL COMMENT 'Courier Name',
  `parcel_remark` varchar(255) NOT NULL,
  `parcel_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parcel_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcel`
--

LOCK TABLES `parcel` WRITE;
/*!40000 ALTER TABLE `parcel` DISABLE KEYS */;
INSERT INTO `parcel` VALUES (1,'SP89445103MY','','FAKULTI SAINS & TEKNOLOGI INDUSTRI (FIST)','','NINJA VAN','','2016-12-09 16:18:39','2016-12-09 16:18:39'),(3,'123456','','','','','','2016-12-10 05:19:49','2016-12-10 05:19:49');
/*!40000 ALTER TABLE `parcel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptj`
--

DROP TABLE IF EXISTS `ptj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ptj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptj_name` text NOT NULL COMMENT 'Dsitributor Name',
  `ptj_acro` varchar(20) NOT NULL,
  `ptj_pic` varchar(50) NOT NULL,
  `ptj_pic_email` varchar(50) NOT NULL COMMENT 'Distributor Code',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptj`
--

LOCK TABLES `ptj` WRITE;
/*!40000 ALTER TABLE `ptj` DISABLE KEYS */;
INSERT INTO `ptj` VALUES (1,'UMP PEKAN','','UMP PEKAN',''),(2,'JABATAN BENDAHARI (BEND)','BEND','UMP PEKAN',''),(3,'UMP PEKAN','','UMP PEKAN',''),(4,'JABATAN JARINGAN INDUSTRI & MASYARAKAT (JJIM)','JJIM','MOHD ZULFADLI BIN BOHARI','zulfadli@ump.edu.my'),(5,'PEJABAT ANTARABANGSA (IO)','IO','SALMI BIN IBRAHIM','salmi88@ump.edu.my'),(6,'INSTITUT PENGAJIAN SISWAZAH (IPS)','IPS','MOHD RAHMAD BIN YA','mrahmad@ump.edu.my'),(7,'PUSAT KEUSAHAWANAN (PKU)','PKU','SAHAROL NIZIM BIN SALIMIN','snizim@ump.edu.my'),(8,'PUSAT ISLAM & PEMBANGUNAN INSAN (PIMPIN)','PIMPIN','MOHAMMAD FAIZAL BIN BAHARUDDIN','faizalb@ump.edu.my'),(9,'JABATAN HAL EHWAL PELAJAR & ALUMNI (JHEPA)','JHEPA','ARISHAM BIN MOHD ASRI','arisham@ump.edu.my'),(10,'PUSAT KESIHATAN PELAJAR (PKP)','PKP','SUHAIMI BIN KHALID','suhaimikhalid@ump.edu.my'),(11,'PERPUSTAKAAN (KMC)','KMC','MOHD IRWANSHAH BIN ABD TALIB','mirwanshah@ump.edu.my'),(12,'PUSAT SUKAN DAN KEBUDAYAAN (PSU)','PSU','MUHAMMAD SYAZWAN BIN HUSIN','syazwan@ump.edu.my'),(13,'JABATAN PEMBANGUNAN & PENGURUSAN HARTA (JPPH)','JPPH','AIZUDDIN-NOR BIN MD TIA','aizu@ump.edu.my'),(14,'FAKULTI KEJURUTERAAN AWAM & SUMBER ALAM (FKASA)','FKASA','MUHAMMAD HAFIZ BIN YAN','mhafizyan@ump.edu.my'),(15,'FAKULTI TEKNOLOGI KEJURUTERAAN (FTEK)','FTEK','AHMAD MAHDI BIN SULAIMAN','mahdi@ump.edu.my'),(16,'FAKULTI PENGURUSAN INDUSTRI (FIM)','FIM','MOHAMAD FAZRIL BIN JOHORE','fazril@ump.edu.my'),(17,'FAKULTI KEJURUTERAAN KIMIA & SUMBER ASLI (FKKSA)','FKKSA','AHMAD AZAFAR BIN KASSIM','azafar@ump.edu.my'),(18,'FAKULTI SISTEM KOMPUTER & KEJURUTERAAN PERISIAN (FSKKP)','FSKKP','MAHMUD BIN ABDUL SAMAD','mahmud@ump.edu.my'),(19,'FAKULTI SAINS & TEKNOLOGI INDUSTRI (FIST)','FIST','JAFREE BIN IBRAHIM','jafree@ump.edu.my'),(20,'MAKMAL BERPUSAT UMP (CLAB)','CLAB','',''),(21,'PUSAT KECEMERLANGAN PENYELIDIKAN ALIRAN BENDALIR TERMAJU (CARIFF)','CARIFF','WAN FARID BIN WAN RUSLI','wfarid@ump.edu.my'),(22,'PUSAT KAJIAN NADIR BUMI (RERC)','RERC','SUZLINA BINTI MOHAMAD','suzlina@ump.edu.my'),(23,'PUSAT PENYELIDIKAN & PENGURUSAN SUMBER ALAM (CERRM)','CERRM','NORAZLIA BINTI MALIKI','azlia@ump.edu.my'),(24,'PEJABAT PENGURUSAN KESELAMATAN & KESIHATAN PEKERJAAN (OSHMO)','OSHMO','MOHD HARITH ZUBAIDI BIN HASHIM','mharith@ump.edu.my'),(25,'UMP HOLDING (UMPH)','UMPH','MOHD FADZIKRIL HAKIM BIN MOHD FADZIR',''),(26,'PUSAT PENGAJIAN BERTERUSAN & PEMBANGUNAN PROFESIONAL (UAE)','UAE','',''),(27,'BAHAGIAN KESELAMATAN (BKES)','BKES','',''),(28,'KOPERASI UMP (KOOP)','KOOP','',''),(29,'PENERBIT (PENERBIT)','PENERBIT','MOHD AL-FADHIR BIN KASIM','fadhir@ump.edu.my'),(30,'KOLEJ KEDIAMAN 1 (KK1)','KK1','MUHAMMAD KAMARULZAMAN BIN SAFIEE','mkamarulzaman@ump.edu.my'),(31,'KOLEJ KEDIAMAN 2 (KK2)','KK2','MOHD ZAMZAMIR BIN AZMAN','zamzamir@ump.edu.my'),(32,'KOLEJ KEDIAMAN 3 (KK3)','KK3','MOHD ZULFAHMI BIN ZULKIFLI','zulfahmiz@ump.edu.my'),(33,'KOLEJ KEDIAMAN 4 (KK4)','KK4','MOHD RAZALI BIN MOHAMMAD','mdrazali@ump.edu.my'),(34,'KOLEJ KEDIAMAN 5 (KK5)','KK5','UMP PEKAN',''),(35,'PEJABAT NAIB CANSELOR (PNC)','PNC','UMP PEKAN',''),(36,'JABATAN PENDAFTAR KAMPUS GAMBANG (PEND)','PEND','SHAHARUL ANUAR BIN ISMAIL','shaharul@ump.edu.my'),(37,'JABATAN PENDAFTAR KAMPUS PEKAN (PEND)','PEND','UMP PEKAN',''),(38,'BAHAGIAN PENGURUSAN AKADEMIK KAMPUS GAMBANG (BPA)','BPA','',''),(39,'BAHAGIAN PENGURUSAN AKADEMIK KAMPUS PEKAN (BPA)','BPA','UMP PEKAN',''),(40,'JABATAN PENYELIDIKAN & INOVASI (JP&I)','JP&I','UMP PEKAN',''),(41,'JABATAN HAL EHWAL KORPORAT & KUALITI (JHKK)','JHKK','',''),(42,'AUDIT DALAM (UAD)','UAD','',''),(43,'JABATAN HAL EHWAL AKADEMIK & ANTARABANGSA (JHEAA)','JHEAA','',''),(44,'PUSAT BAHASA MODEN & SAINS KEMANUSIAAN (PBMSK)','PBMSK','',''),(45,'PUSAT TEKNOLOGI MAKLUMAT & KOMUNIKASI KAMPUS GAMBANG (PTMK)','PTMK','',''),(46,'PUSAT TEKNOLOGI MAKLUMAT & KOMUNIKASI KAMPUS PEKAN','PTMK','','');
/*!40000 ALTER TABLE `ptj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_log`
--

DROP TABLE IF EXISTS `temp_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cpu` varchar(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_log`
--

LOCK TABLES `temp_log` WRITE;
/*!40000 ALTER TABLE `temp_log` DISABLE KEYS */;
INSERT INTO `temp_log` VALUES (1,'34.7','2016-12-07 14:30:01'),(2,'34.7','2016-12-07 15:00:01'),(3,'34.1','2016-12-07 15:30:01'),(4,'34.1','2016-12-07 16:00:01'),(5,'34.7','2016-12-07 16:30:01'),(6,'34.7','2016-12-07 17:00:01'),(7,'34.1','2016-12-07 17:30:01'),(8,'34.7','2016-12-07 18:00:01'),(9,'34.7','2016-12-07 18:30:01'),(10,'34.7','2016-12-07 19:00:01'),(11,'34.1','2016-12-07 19:30:01'),(12,'34.7','2016-12-07 20:00:01'),(13,'33.6','2016-12-07 20:30:01'),(14,'34.1','2016-12-07 21:00:01'),(15,'34.7','2016-12-07 21:30:01'),(16,'34.7','2016-12-07 22:00:01'),(17,'34.7','2016-12-07 22:30:01'),(18,'34.7','2016-12-07 23:00:01'),(19,'32.5','2016-12-07 23:30:01'),(20,'31.4','2016-12-08 00:00:01'),(21,'29.8','2016-12-08 00:30:01'),(22,'29.8','2016-12-08 01:00:01'),(23,'29.3','2016-12-08 01:30:01'),(24,'29.3','2016-12-08 02:00:01'),(25,'30.3','2016-12-08 02:30:01'),(26,'30.3','2016-12-08 03:00:01'),(27,'29.3','2016-12-08 03:30:01'),(28,'29.3','2016-12-08 04:00:01'),(29,'29.3','2016-12-08 04:30:01'),(30,'30.9','2016-12-08 05:00:02'),(31,'29.8','2016-12-08 05:30:01'),(32,'28.7','2016-12-08 06:00:01'),(33,'29.3','2016-12-08 06:30:01'),(34,'28.7','2016-12-08 07:00:01'),(35,'28.2','2016-12-08 07:30:01'),(36,'28.7','2016-12-08 08:00:01'),(37,'29.8','2016-12-08 08:30:01'),(38,'29.3','2016-12-08 09:00:01'),(39,'28.2','2016-12-08 09:30:01'),(40,'28.7','2016-12-08 10:00:01'),(41,'29.3','2016-12-08 10:30:01'),(42,'29.8','2016-12-08 11:00:01'),(43,'29.3','2016-12-08 11:30:02'),(44,'29.8','2016-12-08 12:00:01'),(45,'29.8','2016-12-08 12:30:01'),(46,'29.8','2016-12-08 13:00:01'),(47,'29.8','2016-12-08 13:30:01'),(48,'29.8','2016-12-08 14:00:01'),(49,'30.3','2016-12-08 14:30:01'),(50,'29.8','2016-12-08 15:00:02'),(51,'29.8','2016-12-08 15:30:01'),(52,'30.3','2016-12-08 16:00:01'),(53,'29.3','2016-12-08 16:30:01'),(54,'29.8','2016-12-08 17:00:01'),(55,'29.8','2016-12-08 17:30:01'),(56,'29.8','2016-12-08 18:00:01'),(57,'29.8','2016-12-08 18:30:01'),(58,'29.8','2016-12-08 19:00:02'),(59,'29.8','2016-12-08 19:30:01'),(60,'29.8','2016-12-08 20:00:01'),(61,'29.8','2016-12-08 20:30:01'),(62,'29.3','2016-12-08 21:00:01'),(63,'29.3','2016-12-08 21:30:01'),(64,'30.3','2016-12-08 22:00:01'),(65,'29.3','2016-12-08 22:30:02'),(66,'29.8','2016-12-08 23:00:01'),(67,'29.8','2016-12-08 23:30:01'),(68,'29.3','2016-12-09 00:00:01'),(69,'29.8','2016-12-09 00:30:01'),(70,'29.3','2016-12-09 01:00:01'),(71,'28.7','2016-12-09 01:30:01'),(72,'28.2','2016-12-09 02:00:01'),(73,'27.7','2016-12-09 02:30:01'),(74,'27.7','2016-12-09 03:00:01'),(75,'27.7','2016-12-09 03:30:02'),(76,'25.5','2016-12-09 04:00:01'),(77,'25.5','2016-12-09 04:30:01'),(78,'25.0','2016-12-09 05:00:01'),(79,'25.0','2016-12-09 05:30:01'),(80,'25.0','2016-12-09 06:00:01'),(81,'25.0','2016-12-09 06:30:01'),(82,'25.5','2016-12-09 07:00:01'),(83,'25.5','2016-12-09 07:03:09'),(84,'25.5','2016-12-09 07:03:20'),(85,'25.5','2016-12-09 07:06:54'),(86,'26.0','2016-12-09 07:07:02'),(87,'25.5','2016-12-09 07:07:15'),(88,'25.0','2016-12-09 07:07:23'),(89,'25.0','2016-12-09 07:08:59'),(90,'25.0','2016-12-09 07:09:11'),(91,'26.0','2016-12-09 07:09:21'),(92,'25.5','2016-12-09 07:09:36'),(93,'25.5','2016-12-09 07:30:01'),(94,'26.0','2016-12-09 08:00:01'),(95,'25.5','2016-12-09 08:30:02'),(96,'25.0','2016-12-09 09:00:01'),(97,'26.0','2016-12-09 09:30:01'),(98,'26.0','2016-12-09 10:00:01'),(99,'26.0','2016-12-09 10:30:01'),(100,'26.0','2016-12-09 11:00:01'),(101,'26.6','2016-12-09 11:30:01'),(102,'27.1','2016-12-09 12:00:01'),(103,'27.1','2016-12-09 12:30:01'),(104,'27.1','2016-12-09 13:00:01'),(105,'27.1','2016-12-09 13:30:01'),(106,'27.1','2016-12-09 14:00:01'),(107,'27.1','2016-12-09 14:30:01'),(108,'27.1','2016-12-09 15:00:01'),(109,'27.1','2016-12-09 15:30:01'),(110,'27.1','2016-12-09 16:00:01'),(111,'27.7','2016-12-09 16:30:01'),(112,'27.1','2016-12-09 17:00:01'),(113,'27.1','2016-12-09 17:30:02'),(114,'27.1','2016-12-09 18:00:01'),(115,'27.1','2016-12-09 18:30:01'),(116,'27.1','2016-12-09 19:00:02'),(117,'26.6','2016-12-09 19:30:01'),(118,'27.1','2016-12-09 20:00:01'),(119,'27.1','2016-12-09 20:30:01'),(120,'27.1','2016-12-09 21:00:01'),(121,'27.1','2016-12-09 21:30:01'),(122,'27.1','2016-12-09 22:00:01'),(123,'27.1','2016-12-09 22:30:01'),(124,'27.1','2016-12-09 23:00:01'),(125,'27.1','2016-12-09 23:30:01'),(126,'27.1','2016-12-10 00:00:01'),(127,'27.1','2016-12-10 00:30:01'),(128,'26.0','2016-12-10 01:00:01'),(129,'27.1','2016-12-10 01:30:01'),(130,'27.1','2016-12-10 02:00:01'),(131,'27.1','2016-12-10 02:30:01'),(132,'26.0','2016-12-10 03:00:01'),(133,'25.5','2016-12-10 03:30:01'),(134,'26.0','2016-12-10 04:00:02'),(135,'25.5','2016-12-10 04:30:01'),(136,'25.5','2016-12-10 05:00:01');
/*!40000 ALTER TABLE `temp_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-10 13:26:40
