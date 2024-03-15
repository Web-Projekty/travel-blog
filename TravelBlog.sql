-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: TravelBlog
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Articles`
--

DROP TABLE IF EXISTS `Articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Articles` (
  `idArticles` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(120) COLLATE utf8_czech_ci NOT NULL,
  `Content` longtext COLLATE utf8_czech_ci NOT NULL,
  `ProfileImg` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `Author` int(11) NOT NULL,
  `Destination` int(11) NOT NULL,
  `DatePublic` date NOT NULL,
  PRIMARY KEY (`idArticles`),
  KEY `Author_idx` (`Author`),
  KEY `Destination_idx` (`Destination`),
  CONSTRAINT `Author` FOREIGN KEY (`Author`) REFERENCES `Users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Destination` FOREIGN KEY (`Destination`) REFERENCES `Destination` (`idDestination`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Articles`
--

LOCK TABLES `Articles` WRITE;
/*!40000 ALTER TABLE `Articles` DISABLE KEYS */;
INSERT INTO `Articles` VALUES (1,'Šumavské slatě','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.','uploadImages/slateSumava.jpg',2,2,'2017-06-15'),(2,'Materhorn v noci','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.','uploadImages/Matterhorn.jpg',3,4,'2017-07-15'),(3,'Šumava slatě II','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque pretium lectus id turpis. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Nulla quis diam. In enim a arcu imperdiet malesuada. Nulla pulvinar eleifend sem. Aenean placerat. Aliquam erat volutpat. In convallis. Phasellus faucibus molestie nisl. Suspendisse nisl. Nulla non lectus sed nisl molestie malesuada. Maecenas lorem. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Proin mattis lacinia justo.','uploadImages/slateSumava.jpg',2,2,'2017-07-15');
/*!40000 ALTER TABLE `Articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Destination`
--

DROP TABLE IF EXISTS `Destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Destination` (
  `idDestination` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`idDestination`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Destination`
--

LOCK TABLES `Destination` WRITE;
/*!40000 ALTER TABLE `Destination` DISABLE KEYS */;
INSERT INTO `Destination` VALUES (1,'Vysoké Tatry'),(2,'Šumava'),(3,'Norsko'),(4,'Švýcarsko'),(5,'Itálie');
/*!40000 ALTER TABLE `Destination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `User` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `UserEmail` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Pasword` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Role` set('admin','delegate') COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE KEY `UserEmail_UNIQUE` (`UserEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Admin','Administrátor','admin@travelblog.cz','efacc4001e857f7eba4ae781c2932dedf843865e','admin'),(2,'Delegat1','Karel Novák','novak@travelblog.cz','bec6d274aba05aeeb195b870b6c595c44b05c086','delegate'),(3,'Delegat2','Jana Malá','mala@travelblog.cz','8b0e26325bc7b6ff6a3c7c573dd8dd35932b23cc','delegate');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-27 15:13:55
