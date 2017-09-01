-- MySQL dump 10.13  Distrib 5.7.18, for Win64 (x86_64)
--
-- Host: localhost    Database: handFootball
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Current Database: `handFootball`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `handFootball` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `handFootball`;

--
-- Table structure for table `match`
--

DROP TABLE IF EXISTS `match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `round` int(11) NOT NULL,
  `datePlayed` date NOT NULL,
  `homeTeam` int(11) NOT NULL,
  `awayTeam` int(11) NOT NULL,
  `homeGoals` int(11) NOT NULL,
  `awayGoals` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fkHomeTeam_idx` (`homeTeam`),
  KEY `fkAwayTeam_idx` (`awayTeam`),
  CONSTRAINT `fkAwayTeam` FOREIGN KEY (`awayTeam`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkHomeTeam` FOREIGN KEY (`homeTeam`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` VALUES (2,1,'2017-03-12',17,1,4,3),(3,1,'2017-03-12',14,13,1,0),(4,1,'2017-03-12',19,3,1,1),(5,1,'2017-03-12',7,16,4,3),(6,1,'2017-03-12',15,8,0,3),(7,1,'2017-03-12',9,12,3,3),(8,1,'2017-03-12',4,6,5,1),(9,1,'2017-03-12',10,18,4,0),(10,1,'2017-03-12',2,5,2,0),(11,1,'2017-03-12',11,20,5,5),(12,2,'2017-04-02',8,5,3,0),(13,2,'2017-04-02',15,4,6,0),(14,2,'2017-04-02',7,2,1,2),(15,2,'2017-04-02',13,20,2,1),(16,2,'2017-04-02',19,3,2,1),(17,2,'2017-04-02',11,17,5,0),(18,2,'2017-04-02',10,6,4,2),(19,2,'2017-04-02',9,14,5,2),(20,2,'2017-04-02',16,12,3,2),(21,2,'2017-04-02',1,18,5,1),(22,3,'2017-04-23',8,12,5,0),(23,3,'2017-04-23',11,6,2,1),(24,3,'2017-04-23',16,2,5,0),(25,3,'2017-04-23',9,20,3,3),(26,3,'2017-04-23',10,15,6,5),(27,3,'2017-04-23',1,5,2,0),(28,3,'2017-04-23',13,7,3,2),(29,3,'2017-04-23',19,3,5,2),(30,3,'2017-04-23',14,17,4,0),(31,3,'2017-04-23',4,18,5,2),(32,4,'2017-04-23',10,6,4,2),(33,4,'2017-04-23',8,5,6,2),(34,4,'2017-04-23',2,18,1,1),(35,4,'2017-04-23',9,12,3,4),(36,4,'2017-04-23',19,17,1,3),(37,4,'2017-04-23',15,3,4,0),(38,4,'2017-04-30',16,20,6,2),(39,4,'2017-04-30',14,4,4,0),(40,4,'2017-04-30',7,1,4,2),(41,4,'2017-04-30',11,13,2,0),(42,5,'2017-04-30',8,18,0,0),(43,5,'2017-04-30',16,13,4,2),(44,5,'2017-04-30',4,7,4,1),(45,5,'2017-04-30',2,6,2,1),(46,5,'2017-04-30',15,12,5,5),(47,5,'2017-04-30',1,3,1,0),(48,5,'2017-04-30',14,20,5,7),(49,5,'2017-04-30',18,5,7,2),(50,5,'2017-04-30',10,19,4,4),(51,5,'2017-04-30',9,11,3,0),(52,6,'2017-04-30',8,14,3,1),(53,6,'2017-04-14',16,20,3,0),(54,6,'2017-04-14',12,17,1,5),(55,6,'2017-04-14',7,4,4,2),(56,6,'2017-04-14',17,5,5,1),(57,6,'2017-04-14',1,3,5,2),(58,6,'2017-04-14',11,15,4,2),(59,6,'2017-04-14',9,6,4,2),(60,6,'2017-04-15',10,2,4,2),(61,6,'2017-04-15',13,19,3,1);
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek1`
--

DROP TABLE IF EXISTS `tableWeek1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek1` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` varchar(1) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL,
  `p` bigint(21) NOT NULL DEFAULT '0',
  `w` decimal(41,0) DEFAULT NULL,
  `d` decimal(41,0) DEFAULT NULL,
  `l` decimal(41,0) DEFAULT NULL,
  `gf` decimal(32,0) DEFAULT NULL,
  `ga` decimal(32,0) DEFAULT NULL,
  `gd` decimal(33,0) DEFAULT NULL,
  `pts` decimal(43,0) DEFAULT NULL,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableWeek1`
--

LOCK TABLES `tableWeek1` WRITE;
/*!40000 ALTER TABLE `tableWeek1` DISABLE KEYS */;
INSERT INTO `tableWeek1` VALUES (1,'-','Manchester City',1,1,0,0,4,0,4,3),(2,'-','Chelsea',1,1,0,0,5,1,4,3),(3,'-','Leicester City',1,1,0,0,3,0,3,3),(4,'-','Bournemouth',1,1,0,0,2,0,2,3),(5,'-','Stoke City',1,1,0,0,1,0,1,3),(6,'-','Hull City',1,1,0,0,4,3,1,3),(7,'-','Tottenham Hotspur',1,1,0,0,4,3,1,3),(8,'-','Burnley',1,0,1,0,1,1,0,1),(9,'-','West Bromwich Albion',1,0,1,0,1,1,0,1),(10,'-','Liverpool',1,0,1,0,3,3,0,1),(11,'-','Middlesbrough',1,0,1,0,3,3,0,1),(12,'-','Manchester United',1,0,1,0,5,5,0,1),(13,'-','West Ham',1,0,1,0,5,5,0,1),(14,'-','Southampton',1,0,0,1,0,1,-1,0),(15,'-','Arsenal',1,0,0,1,3,4,-1,0),(16,'-','Swansea City',1,0,0,1,3,4,-1,0),(17,'-','Crystal Palace',1,0,0,1,0,2,-2,0),(18,'-','Sunderland',1,0,0,1,0,3,-3,0),(19,'-','Watford',1,0,0,1,0,4,-4,0),(20,'-','Everton',1,0,0,1,1,5,-4,0);
/*!40000 ALTER TABLE `tableWeek1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek2`
--

DROP TABLE IF EXISTS `tableWeek2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek2` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `p` bigint(21) NOT NULL DEFAULT '0',
  `w` decimal(41,0) DEFAULT NULL,
  `d` decimal(41,0) DEFAULT NULL,
  `l` decimal(41,0) DEFAULT NULL,
  `gf` decimal(32,0) DEFAULT NULL,
  `ga` decimal(32,0) DEFAULT NULL,
  `gd` decimal(33,0) DEFAULT NULL,
  `pts` decimal(43,0) DEFAULT NULL,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableWeek2`
--

LOCK TABLES `tableWeek2` WRITE;
/*!40000 ALTER TABLE `tableWeek2` DISABLE KEYS */;
INSERT INTO `tableWeek2` VALUES (1,3,'Leicester City',2,2,0,0,6,0,6,6),(2,1,'Manchester City',2,2,0,0,8,2,6,6),(3,4,'Bournemouth',2,2,0,0,4,1,3,6),(4,12,'Manchester United',2,1,1,0,10,5,5,4),(5,10,'Liverpool',2,1,1,0,8,5,3,4),(6,9,'West Bromwich Albion',2,1,1,0,3,2,1,4),(7,18,'Sunderland',2,1,0,1,6,3,3,3),(8,15,'Arsenal',2,1,0,1,8,5,3,3),(9,14,'Southampton',2,1,0,1,2,2,0,3),(10,6,'Hull City',2,1,0,1,5,5,0,3),(11,16,'Swansea City',2,1,0,1,6,6,0,3),(12,5,'Stoke City',2,1,0,1,3,5,-2,3),(13,2,'Chelsea',2,1,0,1,5,7,-2,3),(14,7,'Tottenham Hotspur',2,1,0,1,4,8,-4,3),(15,8,'Burnley',2,0,1,1,2,3,-1,1),(16,11,'Middlesbrough',2,0,1,1,5,6,-1,1),(17,13,'West Ham',2,0,1,1,6,7,-1,1),(18,17,'Crystal Palace',2,0,0,2,0,5,-5,0),(19,20,'Everton',2,0,0,2,3,9,-6,0),(20,19,'Watford',2,0,0,2,1,9,-8,0);
/*!40000 ALTER TABLE `tableWeek2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek3`
--

DROP TABLE IF EXISTS `tableWeek3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek3` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `p` bigint(21) NOT NULL DEFAULT '0',
  `w` decimal(41,0) DEFAULT NULL,
  `d` decimal(41,0) DEFAULT NULL,
  `l` decimal(41,0) DEFAULT NULL,
  `gf` decimal(32,0) DEFAULT NULL,
  `ga` decimal(32,0) DEFAULT NULL,
  `gd` decimal(33,0) DEFAULT NULL,
  `pts` decimal(43,0) DEFAULT NULL,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableWeek3`
--

LOCK TABLES `tableWeek3` WRITE;
/*!40000 ALTER TABLE `tableWeek3` DISABLE KEYS */;
INSERT INTO `tableWeek3` VALUES (1,3,'Leicester City',3,3,0,0,11,0,11,9),(2,1,'Manchester City',3,3,0,0,14,7,7,9),(3,12,'Manchester United',3,2,1,0,12,6,6,7),(4,9,'West Bromwich Albion',3,2,1,0,8,4,4,7),(5,15,'Arsenal',3,2,0,1,10,5,5,6),(6,16,'Swansea City',3,2,0,1,11,6,5,6),(7,5,'Stoke City',3,2,0,1,7,5,2,6),(8,14,'Southampton',3,2,0,1,5,4,1,6),(9,2,'Chelsea',3,2,0,1,10,9,1,6),(10,4,'Bournemouth',3,2,0,1,4,6,-2,6),(11,10,'Liverpool',3,1,2,0,11,8,3,5),(12,18,'Sunderland',3,1,0,2,11,9,2,3),(13,6,'Hull City',3,1,0,2,7,8,-1,3),(14,7,'Tottenham Hotspur',3,1,0,2,4,12,-8,3),(15,13,'West Ham',3,0,2,1,9,10,-1,2),(16,8,'Burnley',3,0,1,2,4,8,-4,1),(17,11,'Middlesbrough',3,0,1,2,5,11,-6,1),(18,17,'Crystal Palace',3,0,0,3,0,7,-7,0),(19,20,'Everton',3,0,0,3,4,11,-7,0),(20,19,'Watford',3,0,0,3,3,14,-11,0);
/*!40000 ALTER TABLE `tableWeek3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek4`
--

DROP TABLE IF EXISTS `tableWeek4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek4` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `p` bigint(21) NOT NULL DEFAULT '0',
  `w` decimal(41,0) DEFAULT NULL,
  `d` decimal(41,0) DEFAULT NULL,
  `l` decimal(41,0) DEFAULT NULL,
  `gf` decimal(32,0) DEFAULT NULL,
  `ga` decimal(32,0) DEFAULT NULL,
  `gd` decimal(33,0) DEFAULT NULL,
  `pts` decimal(43,0) DEFAULT NULL,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableWeek4`
--

LOCK TABLES `tableWeek4` WRITE;
/*!40000 ALTER TABLE `tableWeek4` DISABLE KEYS */;
INSERT INTO `tableWeek4` VALUES (1,3,'Leicester City',4,4,0,0,17,2,15,12),(2,1,'Manchester City',4,4,0,0,18,9,9,12),(3,12,'Manchester United',4,3,1,0,14,6,8,10),(4,16,'Swansea City',4,3,0,1,17,8,9,9),(5,5,'Stoke City',4,3,0,1,11,5,6,9),(6,9,'West Bromwich Albion',4,2,1,1,9,7,2,7),(7,4,'Bournemouth',4,2,1,1,5,7,-2,7),(8,18,'Sunderland',4,2,0,2,15,9,6,6),(9,15,'Arsenal',4,2,0,2,12,9,3,6),(10,6,'Hull City',4,2,0,2,11,10,1,6),(11,14,'Southampton',4,2,0,2,5,6,-1,6),(12,2,'Chelsea',4,2,0,2,10,13,-3,6),(13,7,'Tottenham Hotspur',4,2,0,2,7,13,-6,6),(14,10,'Liverpool',4,1,2,1,14,12,2,5),(15,11,'Middlesbrough',4,1,1,2,9,14,-5,4),(16,13,'West Ham',4,0,2,2,11,16,-5,2),(17,8,'Burnley',4,0,1,3,4,12,-8,1),(18,19,'Watford',4,0,1,3,4,15,-11,1),(19,20,'Everton',4,0,0,4,6,15,-9,0),(20,17,'Crystal Palace',4,0,0,4,2,13,-11,0);
/*!40000 ALTER TABLE `tableWeek4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek5`
--

DROP TABLE IF EXISTS `tableWeek5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek5` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `p` bigint(21) NOT NULL DEFAULT '0',
  `w` decimal(41,0) DEFAULT NULL,
  `d` decimal(41,0) DEFAULT NULL,
  `l` decimal(41,0) DEFAULT NULL,
  `gf` decimal(32,0) DEFAULT NULL,
  `ga` decimal(32,0) DEFAULT NULL,
  `gd` decimal(33,0) DEFAULT NULL,
  `pts` decimal(43,0) DEFAULT NULL,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableWeek5`
--

LOCK TABLES `tableWeek5` WRITE;
/*!40000 ALTER TABLE `tableWeek5` DISABLE KEYS */;
INSERT INTO `tableWeek5` VALUES (1,3,'Leicester City',5,4,1,0,17,2,15,13),(2,1,'Manchester City',5,4,1,0,22,13,9,13),(3,16,'Swansea City',5,4,0,1,21,10,11,12),(4,12,'Manchester United',5,3,1,1,14,9,5,10),(5,4,'Bournemouth',5,3,1,1,7,8,-1,10),(6,15,'Arsenal',5,3,0,2,13,9,4,9),(7,5,'Stoke City',5,3,0,2,16,12,4,9),(8,2,'Chelsea',5,3,0,2,14,14,0,9),(9,10,'Liverpool',5,2,2,1,17,12,5,8),(10,9,'West Bromwich Albion',5,2,2,1,13,11,2,8),(11,18,'Sunderland',5,2,1,2,20,14,6,7),(12,6,'Hull City',5,2,0,3,12,14,-2,6),(13,14,'Southampton',5,2,0,3,7,10,-3,6),(14,7,'Tottenham Hotspur',4,2,0,2,7,13,-6,6),(15,13,'West Ham',5,1,2,2,18,21,-3,5),(16,11,'Middlesbrough',5,1,2,2,14,19,-5,5),(17,19,'Watford',6,1,2,3,11,17,-6,5),(18,8,'Burnley',5,0,1,4,4,13,-9,1),(19,20,'Everton',5,0,0,5,7,17,-10,0),(20,17,'Crystal Palace',5,0,0,5,4,20,-16,0);
/*!40000 ALTER TABLE `tableWeek5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek6`
--

DROP TABLE IF EXISTS `tableWeek6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek6` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `p` bigint(21) NOT NULL DEFAULT '0',
  `w` decimal(41,0) DEFAULT NULL,
  `d` decimal(41,0) DEFAULT NULL,
  `l` decimal(41,0) DEFAULT NULL,
  `gf` decimal(32,0) DEFAULT NULL,
  `ga` decimal(32,0) DEFAULT NULL,
  `gd` decimal(33,0) DEFAULT NULL,
  `pts` decimal(43,0) DEFAULT NULL,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableWeek6`
--

LOCK TABLES `tableWeek6` WRITE;
/*!40000 ALTER TABLE `tableWeek6` DISABLE KEYS */;
INSERT INTO `tableWeek6` VALUES (1,1,'Leicester City',6,5,1,0,20,3,17,16),(2,2,'Manchester City',6,5,1,0,26,15,11,16),(3,3,'Swansea City',6,5,0,1,24,10,14,15),(4,4,'Manchester United',6,4,1,1,18,11,7,13),(5,6,'Arsenal',6,4,0,2,18,11,7,12),(6,14,'Tottenham Hotspur',6,4,0,2,17,15,2,12),(7,9,'Liverpool',6,3,2,1,21,14,7,11),(8,5,'Bournemouth',6,3,1,2,9,12,-3,10),(9,7,'Stoke City',6,3,0,3,17,15,2,9),(10,12,'Hull City',6,3,0,3,16,16,0,9),(11,13,'Southampton',6,3,0,3,10,11,-1,9),(12,8,'Chelsea',6,3,0,3,16,18,-2,9),(13,10,'West Bromwich Albion',6,2,2,2,14,14,0,8),(14,11,'Sunderland',6,2,1,3,22,18,4,7),(15,17,'Watford',6,1,2,3,11,17,-6,5),(16,15,'West Ham',6,1,2,3,18,24,-6,5),(17,16,'Middlesbrough',6,1,2,3,15,24,-9,5),(18,18,'Burnley',6,0,1,5,6,18,-12,1),(19,19,'Everton',6,0,0,6,9,21,-12,0),(20,20,'Crystal Palace',6,0,0,6,5,25,-20,0);
/*!40000 ALTER TABLE `tableWeek6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `abbrev` varchar(45) NOT NULL,
  `colour1` varchar(45) NOT NULL,
  `colour2` varchar(45) NOT NULL,
  `colour3` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `abbrev_UNIQUE` (`abbrev`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Arsenal','ARS','#ED1B24','#FFFDFA','#9B8347'),(2,'Bournemouth','BOU','red','black','white'),(3,'Burnley','BUR','#7f1734','#9DBAFC','white'),(4,'Chelsea','CHE','rgb(14,30,125)','white','rgb(217,152,8)'),(5,'Crystal Palace','CRY','blue','red','white'),(6,'Everton','EVE','#274488','white','#FFDF19'),(7,'Hull City','HUL','#F5971D','black','white'),(8,'Leicester City','LEI','#0053A0','white','#FDBE11'),(9,'Liverpool','LIV','#D00027','white','#fef667'),(10,'Manchester City','MCI','#6CADDF','white','#4E6A93'),(11,'Manchester United','MUN','red','white','black'),(12,'Middlesbrough','MID','red','white','blue'),(13,'Southampton','SOU','red','white','black'),(14,'Stoke City','STO','red','white','#1B449C'),(15,'Sunderland','SUN','red','white','black'),(16,'Swansea City','SWA','white','black','black'),(17,'Tottenham Hotspur','TOT','white','#0F204B','gold'),(18,'Watford','WAT','#FBEE23','black','#ED2127'),(19,'West Bromwich Albion','WBA','white','#00003A','#8484AA'),(20,'West Ham','WHU','#7C2C3B','white','#2CAFE5');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 17:26:52
