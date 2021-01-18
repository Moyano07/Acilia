-- MySQL dump 10.13  Distrib 8.0.21, for osx10.15 (x86_64)
--
-- Host: localhost    Database: acilia
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `acilia`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `acilia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `acilia`;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (32,'Category 1','XU7AZdywMFrm5NRtKZijDV','Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),(33,'Category 2','CDuTsakYEhcmJB7eYLpnDV','Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),(34,'Category 3','T8ysJacPWLivgXGcxovnDV','Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),(35,'Category 4','pd83sbbgE4PYZSUy8S3oDV','Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),(36,'Category 5','9jhX6oyUccMBwF8Khw8oDV','Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),(37,'New name','fUcachE4vEaetfaHfNwV7E','This is a new category');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`),
  CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (151,32,'M6YksnH2pbMkJGtiTfEoDV','Product 1',551,'USD',1),(152,32,'iyuUVd6nqFz8mqYL7NLoDV','Product 2',760,'EUR',0),(153,32,'tqCxNYEfV2zZFF6rYrRoDV','Product 3',415,'USD',1),(154,32,'PAyyJF5vNjvzidcNzMXoDV','Product 4',719,'EUR',0),(155,32,'uY82zjrEhRqFKc36LqcoDV','Product 5',532,'USD',1),(156,32,'TCXaesCknHpJzAMyXJioDV','Product 6',363,'EUR',0),(157,32,'eFjjdgRR8mJmyTKTPhooDV','Product 7',861,'USD',1),(158,32,'Dd2TZkmegv5SsBQjM8uoDV','Product 8',316,'EUR',0),(159,32,'9MhBBhSQJtnHfKbpSZzoDV','Product 9',987,'USD',1),(160,32,'viiteSTncDDkecZJJx6pDV','Product 10',930,'EUR',0),(161,33,'hmYgZEXpibegxjEdVEEpDV','Product 1',987,'USD',1),(162,33,'UK5Wz56YeesLrJo2B2SpDV','Product 2',151,'EUR',0),(163,33,'SRkGQCZ9fmBHWXXUfyZpDV','Product 3',938,'USD',1),(164,33,'DBKDgx2BRsTgUJnQchhpDV','Product 4',481,'EUR',0),(165,33,'YuooWQHgu2K8xxUJxKqpDV','Product 5',737,'USD',1),(166,33,'sEaBiV5dPHvxjPqkwsxpDV','Product 6',483,'EUR',0),(167,33,'MMDyit7HvrXpXoCEwS7qDV','Product 7',936,'USD',1),(168,33,'UM3ss9Wr2c47dxDGawEqDV','Product 8',737,'EUR',0),(169,33,'zSCEMhsS8MGBph8V6SNqDV','Product 9',494,'USD',1),(170,33,'4w2PAgwwEsS483vtUtVqDV','Product 10',880,'EUR',0),(171,34,'fTHqwRV2eBk8Kmp8zNdqDV','Product 1',138,'USD',1),(172,34,'s4LwfHHCvVg69ovQbYkqDV','Product 2',410,'EUR',0),(173,34,'j2BduDZNuJ9E2GfRc8sqDV','Product 3',226,'USD',1),(174,34,'knNyoGyL2eFpszMuU76rDV','Product 4',112,'EUR',0),(175,34,'cg6g6y7zGah6yAPw7cDrDV','Product 5',929,'USD',1),(176,34,'GY7TfuDrVatVcqakkcLrDV','Product 6',342,'EUR',0),(177,34,'oXQNDXvVHidjrz7igWTrDV','Product 7',781,'USD',1),(178,34,'3KHDVMCDa3ADXVCS9LarDV','Product 8',394,'EUR',0),(179,34,'GLpegujzrshUHZAMU8hrDV','Product 9',860,'USD',1),(180,34,'SHVPQbHY6JsMFntdZsorDV','Product 10',460,'EUR',0),(181,35,'ZDsY6MDKBsxqQBRKRbvrDV','Product 1',547,'USD',1),(182,35,'EKzd8JNXBrz9g9pBAJ4sDV','Product 2',677,'EUR',0),(183,35,'vxWMtMtSmz2qjwSf83BsDV','Product 3',978,'USD',1),(184,35,'wipm7Zscr4AXok5A7mHsDV','Product 4',298,'EUR',0),(185,35,'ULeZAiN4SvCp5jU2qTQsDV','Product 5',158,'USD',1),(186,35,'T2TKZbaH3x3QS2RoVJYsDV','Product 6',871,'EUR',0),(187,35,'3H3osiuPzgKfC6Pip6fsDV','Product 7',921,'USD',1),(188,35,'DoctMo9zKtv8rZTSHumsDV','Product 8',167,'EUR',0),(189,35,'xj5h6zdzcb4d2xx79dtsDV','Product 9',673,'USD',1),(190,35,'mF2nSwfkWebfNhPGwV2tDV','Product 10',433,'EUR',0),(191,36,'mwfrqJbid5kxdfn8gC9tDV','Product 1',292,'USD',1),(192,36,'pMR433GVTtbs7oxNBrFtDV','Product 2',839,'EUR',0),(193,36,'wE7Kxp4ynBZB4gK8cqMtDV','Product 3',838,'USD',1),(194,36,'tYERg8nhpmmCZRFCi7UtDV','Product 4',872,'EUR',0),(195,36,'3Mdi7UxJyXvD5BBGpNatDV','Product 5',122,'USD',1),(196,36,'8Mr8aD2yHRmG6pXHLYgtDV','Product 6',682,'EUR',0),(197,36,'7qdiGxdNkJvHbZTMSontDV','Product 7',412,'USD',1),(198,36,'Z9temajMvxYdYeVrBD6uDV','Product 8',865,'EUR',0),(199,36,'UpsHv4X9hW9YMsiEyZDuDV','Product 9',945,'USD',1),(200,36,'7NeQaRM5gRwiF9LAowKuDV','Product 10',562,'EUR',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-18 12:20:12
