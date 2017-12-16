
D:\src\php\php.local\www\premiership>mysqldump --host localhost --port 3306 -uhandfootball -phandfootball --databases handfootball 
-- MySQL dump 10.13  Distrib 5.6.26, for Win64 (x86_64)
--
-- Host: localhost    Database: handfootball
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Current Database: `handfootball`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `handfootball` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `handfootball`;

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
  `matchcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fkHomeTeam_idx` (`homeTeam`),
  KEY `fkAwayTeam_idx` (`awayTeam`),
  CONSTRAINT `fkAwayTeam` FOREIGN KEY (`awayTeam`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkHomeTeam` FOREIGN KEY (`homeTeam`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` VALUES (1,1,'2017-12-05',9,3,1,2,NULL),(2,1,'2017-12-05',16,8,2,1,NULL),(3,1,'2017-12-05',21,2,4,0,NULL),(4,1,'2017-12-05',10,23,1,2,NULL),(5,1,'2017-12-05',17,5,7,1,NULL),(6,1,'2017-12-05',19,4,1,5,NULL),(7,1,'2017-12-05',18,1,4,2,NULL),(8,1,'2017-12-05',20,22,3,4,NULL),(9,1,'2017-12-05',11,6,6,3,NULL),(10,1,'2017-12-05',13,14,8,2,NULL),(11,2,'2017-12-05',11,16,1,3,NULL),(12,2,'2017-12-05',2,17,2,3,NULL),(13,2,'2017-12-05',13,3,3,3,NULL),(14,2,'2017-12-05',10,22,3,3,NULL),(15,2,'2017-12-05',21,20,5,1,NULL),(16,2,'2017-12-05',19,1,6,1,NULL),(17,2,'2017-12-05',14,6,5,2,NULL),(18,2,'2017-12-05',4,5,3,2,NULL),(19,2,'2017-12-05',23,9,0,0,NULL),(20,2,'2017-12-05',8,18,2,3,NULL),(21,3,'2017-12-05',2,23,3,4,NULL),(22,3,'2017-12-05',16,14,5,1,NULL),(23,3,'2017-12-05',11,1,5,2,NULL),(24,3,'2017-12-05',10,6,2,2,NULL),(25,3,'2017-12-05',18,3,2,3,NULL),(26,3,'2017-12-05',8,19,2,3,NULL),(27,3,'2017-12-05',17,21,5,2,NULL),(28,3,'2017-12-05',13,22,9,2,NULL),(29,3,'2017-12-05',20,4,6,3,NULL),(30,3,'2017-12-05',5,9,3,3,NULL),(31,4,'2017-12-08',18,4,3,0,NULL),(32,4,'2017-12-08',8,2,2,2,NULL),(33,4,'2017-12-08',6,17,5,3,NULL),(34,4,'2017-12-08',23,16,8,1,NULL),(35,4,'2017-12-08',9,20,11,8,NULL),(36,4,'2017-12-08',14,21,6,1,NULL),(37,4,'2017-12-08',22,5,5,6,NULL),(38,4,'2017-12-08',11,10,3,5,NULL),(39,4,'2017-12-08',13,19,3,2,NULL),(40,4,'2017-12-08',1,3,4,4,NULL),(41,5,'2017-12-08',10,20,2,1,NULL),(42,5,'2017-12-08',4,16,5,7,NULL),(43,5,'2017-12-08',21,23,5,2,NULL),(44,5,'2017-12-08',22,3,4,5,NULL),(45,5,'2017-12-08',11,14,4,0,NULL),(46,5,'2017-12-08',9,13,5,3,NULL),(47,5,'2017-12-08',1,18,3,4,NULL),(48,5,'2017-12-08',17,8,6,6,NULL),(49,5,'2017-12-08',6,5,1,4,NULL),(50,5,'2017-12-08',19,2,5,6,NULL),(51,6,'2017-12-08',23,16,4,0,NULL),(52,6,'2017-12-08',21,1,0,4,NULL),(53,6,'2017-12-08',22,9,1,3,NULL),(54,6,'2017-12-08',11,8,4,4,NULL),(55,6,'2017-12-08',13,2,2,3,NULL),(56,6,'2017-12-08',14,4,11,7,NULL),(57,6,'2017-12-08',10,5,5,4,NULL),(58,6,'2017-12-08',6,3,5,3,NULL),(59,6,'2017-12-08',17,18,7,2,NULL),(60,6,'2017-12-08',19,20,5,3,NULL),(61,7,'2017-12-08',11,2,4,2,NULL),(62,7,'2017-12-08',5,1,1,0,NULL),(63,7,'2017-12-08',8,14,4,1,NULL),(64,7,'2017-12-08',19,17,5,1,NULL),(65,7,'2017-12-08',10,13,4,2,NULL),(66,7,'2017-12-08',3,23,1,0,NULL),(67,7,'2017-12-08',20,16,1,0,NULL),(68,7,'2017-12-08',22,18,2,3,NULL),(69,7,'2017-12-08',9,21,3,1,NULL),(70,7,'2017-12-08',4,6,5,2,NULL),(71,8,'2017-12-09',17,9,3,3,NULL),(72,8,'2017-12-09',3,14,2,3,NULL),(73,8,'2017-12-11',6,20,4,0,NULL),(74,8,'2017-12-11',10,4,2,4,NULL),(75,8,'2017-12-11',23,1,4,3,NULL),(76,8,'2017-12-11',11,5,7,0,NULL),(77,8,'2017-12-11',13,21,3,2,NULL),(78,8,'2017-12-11',8,22,6,2,NULL),(79,8,'2017-12-11',19,18,4,1,NULL),(80,8,'2017-12-11',2,16,4,4,NULL),(81,9,'2017-12-11',22,6,2,2,NULL),(82,9,'2017-12-11',17,13,1,3,NULL),(83,9,'2017-12-11',21,3,3,1,NULL),(84,9,'2017-12-11',23,4,4,4,NULL),(85,9,'2017-12-11',16,1,1,3,NULL),(86,9,'2017-12-11',14,18,1,3,NULL),(87,9,'2017-12-11',2,9,2,2,NULL),(88,9,'2017-12-11',8,20,3,1,NULL),(89,9,'2017-12-11',10,19,5,2,NULL),(90,9,'2017-12-11',5,11,1,3,NULL),(91,10,'2017-12-12',22,4,4,3,NULL),(92,10,'2017-12-12',18,2,2,3,NULL),(93,10,'2017-12-12',9,11,4,2,NULL),(94,10,'2017-12-12',8,21,4,1,NULL),(95,10,'2017-12-12',13,6,3,2,NULL),(96,10,'2017-12-12',17,14,4,2,NULL),(97,10,'2017-12-12',20,5,2,2,NULL),(98,10,'2017-12-12',3,16,3,2,NULL),(99,10,'2017-12-12',10,1,1,1,NULL),(100,10,'2017-12-12',19,23,1,1,NULL),(101,11,'2017-12-13',11,13,4,3,NULL),(102,11,'2017-12-13',14,5,2,3,NULL),(103,11,'2017-12-13',23,18,6,2,NULL),(104,11,'2017-12-13',10,17,1,1,NULL),(105,11,'2017-12-13',21,4,3,2,NULL),(106,11,'2017-12-13',22,16,4,2,NULL),(107,11,'2017-12-13',1,20,3,1,NULL),(108,11,'2017-12-13',19,3,1,4,NULL),(109,11,'2017-12-13',6,9,2,3,NULL),(110,11,'2017-12-13',2,8,3,3,NULL),(111,12,'2017-12-14',1,17,3,1,NULL),(112,12,'2017-12-14',19,5,3,1,NULL),(113,12,'2017-12-14',8,3,4,2,NULL),(114,12,'2017-12-14',9,14,4,3,NULL),(115,12,'2017-12-14',10,21,2,3,NULL),(116,12,'2017-12-14',11,20,8,3,NULL),(117,12,'2017-12-14',13,18,6,3,NULL),(118,12,'2017-12-14',6,2,4,1,NULL),(119,12,'2017-12-14',4,16,6,3,NULL),(120,12,'2017-12-14',22,23,2,1,NULL);
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek1`
--

DROP TABLE IF EXISTS `tableweek1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek1` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  `prev` binary(0) DEFAULT NULL,
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
-- Dumping data for table `tableweek1`
--

LOCK TABLES `tableweek1` WRITE;
/*!40000 ALTER TABLE `tableweek1` DISABLE KEYS */;
INSERT INTO `tableweek1` VALUES (1,NULL,'Tottenham Hotspur',1,1,0,0,7,1,6,3),(2,NULL,'Southampton',1,1,0,0,8,2,6,3),(3,NULL,'Brighton & Hove Albion',1,1,0,0,4,0,4,3),(4,NULL,'Chelsea',1,1,0,0,5,1,4,3),(5,NULL,'Manchester United',1,1,0,0,6,3,3,3),(6,NULL,'Watford',1,1,0,0,4,2,2,3),(7,NULL,'Burnley',1,1,0,0,2,1,1,3),(8,NULL,'Newcastle United',1,1,0,0,2,1,1,3),(9,NULL,'Swansea City',1,1,0,0,2,1,1,3),(10,NULL,'Huddersfield',1,1,0,0,4,3,1,3),(11,NULL,'Manchester City',1,0,0,1,1,2,-1,0),(12,NULL,'Leicester City',1,0,0,1,1,2,-1,0),(13,NULL,'Liverpool',1,0,0,1,1,2,-1,0),(14,NULL,'West Ham',1,0,0,1,3,4,-1,0),(15,NULL,'Arsenal',1,0,0,1,2,4,-2,0),(16,NULL,'Everton',1,0,0,1,3,6,-3,0),(17,NULL,'Bournemouth',1,0,0,1,0,4,-4,0),(18,NULL,'West Bromwich Albion',1,0,0,1,1,5,-4,0),(19,NULL,'Crystal Palace',1,0,0,1,1,7,-6,0),(20,NULL,'Stoke City',1,0,0,1,2,8,-6,0);
/*!40000 ALTER TABLE `tableweek1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek10`
--

DROP TABLE IF EXISTS `tableweek10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek10` (
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
-- Dumping data for table `tableweek10`
--

LOCK TABLES `tableweek10` WRITE;
/*!40000 ALTER TABLE `tableweek10` DISABLE KEYS */;
INSERT INTO `tableweek10` VALUES (1,1,'Manchester United',10,6,1,3,39,24,15,19),(2,5,'Southampton',10,6,1,3,39,26,13,19),(3,6,'Liverpool',10,5,4,1,35,25,10,19),(4,3,'Newcastle United',10,5,3,2,29,19,10,18),(5,4,'Manchester City',10,5,3,2,30,24,6,18),(6,2,'Watford',10,6,0,4,27,27,0,18),(7,8,'Tottenham Hotspur',10,5,2,3,40,31,9,17),(8,9,'Burnley',10,5,2,3,27,27,0,17),(9,7,'West Bromwich Albion',10,5,1,4,34,28,6,16),(10,12,'Leicester City',10,4,3,3,34,25,9,15),(11,10,'Chelsea',10,4,1,5,39,42,-3,13),(12,11,'Swansea City',10,4,1,5,25,31,-6,13),(13,13,'Brighton & Hove Albion',10,4,0,6,24,29,-5,12),(14,17,'Bournemouth',10,3,3,4,27,32,-5,12),(15,14,'Stoke City',10,4,0,6,32,40,-8,12),(16,15,'Everton',10,3,2,5,28,33,-5,11),(17,16,'Crystal Palace',10,3,2,5,24,36,-12,11),(18,18,'Arsenal',10,2,2,6,23,30,-7,8),(19,20,'Huddersfield',10,2,2,6,29,43,-14,8),(20,19,'West Ham',10,2,1,7,26,39,-13,7);
/*!40000 ALTER TABLE `tableweek10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek11`
--

DROP TABLE IF EXISTS `tableweek11`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek11` (
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
-- Dumping data for table `tableweek11`
--

LOCK TABLES `tableweek11` WRITE;
/*!40000 ALTER TABLE `tableweek11` DISABLE KEYS */;
INSERT INTO `tableweek11` VALUES (1,1,'Manchester United',11,7,1,3,43,27,16,22),(2,3,'Liverpool',11,6,4,1,38,27,11,22),(3,4,'Newcastle United',11,6,3,2,35,21,14,21),(4,8,'Burnley',11,6,2,3,31,28,3,20),(5,2,'Southampton',11,6,1,4,42,30,12,19),(6,5,'Manchester City',11,5,4,2,31,25,6,19),(7,7,'Tottenham Hotspur',11,5,3,3,41,32,9,18),(8,6,'Watford',11,6,0,5,29,33,-4,18),(9,10,'Leicester City',11,4,4,3,37,28,9,16),(10,9,'West Bromwich Albion',11,5,1,5,35,32,3,16),(11,13,'Brighton & Hove Albion',11,5,0,6,27,31,-4,15),(12,17,'Crystal Palace',11,4,2,5,27,38,-11,14),(13,11,'Chelsea',11,4,1,6,41,45,-4,13),(14,14,'Bournemouth',11,3,4,4,30,35,-5,13),(15,12,'Swansea City',11,4,1,6,27,35,-8,13),(16,15,'Stoke City',11,4,0,7,34,43,-9,12),(17,18,'Arsenal',11,3,2,6,26,31,-5,11),(18,16,'Everton',11,3,2,6,30,36,-6,11),(19,19,'Huddersfield',11,3,2,6,33,45,-12,11),(20,20,'West Ham',11,2,1,8,27,42,-15,7);
/*!40000 ALTER TABLE `tableweek11` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek12`
--

DROP TABLE IF EXISTS `tableweek12`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek12` (
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
-- Dumping data for table `tableweek12`
--

LOCK TABLES `tableweek12` WRITE;
/*!40000 ALTER TABLE `tableweek12` DISABLE KEYS */;
INSERT INTO `tableweek12` VALUES (1,1,'Manchester United',12,8,1,3,51,30,21,25),(2,2,'Liverpool',12,7,4,1,42,30,12,25),(3,5,'Southampton',12,7,1,4,48,33,15,22),(4,3,'Newcastle United',12,6,3,3,36,23,13,21),(5,4,'Burnley',12,6,2,4,33,32,1,20),(6,9,'Leicester City',12,5,4,3,41,30,11,19),(7,6,'Manchester City',12,5,4,3,33,28,5,19),(8,10,'West Bromwich Albion',12,6,1,5,38,33,5,19),(9,7,'Tottenham Hotspur',12,5,3,4,42,35,7,18),(10,11,'Brighton & Hove Albion',12,6,0,6,30,33,-3,18),(11,8,'Watford',12,6,0,6,32,39,-7,18),(12,13,'Chelsea',12,5,1,6,47,48,-1,16),(13,17,'Arsenal',12,4,2,6,29,32,-3,14),(14,18,'Everton',12,4,2,6,34,37,-3,14),(15,19,'Huddersfield',12,4,2,6,35,46,-11,14),(16,12,'Crystal Palace',12,4,2,6,28,41,-13,14),(17,14,'Bournemouth',12,3,4,5,31,39,-8,13),(18,15,'Swansea City',12,4,1,7,30,41,-11,13),(19,16,'Stoke City',12,4,0,8,37,47,-10,12),(20,20,'West Ham',12,2,1,9,30,50,-20,7);
/*!40000 ALTER TABLE `tableweek12` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek2`
--

DROP TABLE IF EXISTS `tableweek2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek2` (
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
-- Dumping data for table `tableweek2`
--

LOCK TABLES `tableweek2` WRITE;
/*!40000 ALTER TABLE `tableweek2` DISABLE KEYS */;
INSERT INTO `tableweek2` VALUES (1,3,'Brighton & Hove Albion',2,2,0,0,9,1,8,6),(2,1,'Tottenham Hotspur',2,2,0,0,10,3,7,6),(3,4,'Chelsea',2,2,0,0,8,3,5,6),(4,9,'Swansea City',2,2,0,0,5,2,3,6),(5,6,'Watford',2,2,0,0,7,4,3,6),(6,2,'Southampton',2,1,1,0,11,5,6,4),(7,8,'Newcastle United',2,1,1,0,2,1,1,4),(8,7,'Burnley',2,1,1,0,5,4,1,4),(9,10,'Huddersfield',2,1,1,0,7,6,1,4),(10,18,'West Bromwich Albion',2,1,0,1,7,6,1,3),(11,5,'Manchester United',2,1,0,1,7,6,1,3),(12,20,'Stoke City',2,1,0,1,7,10,-3,3),(13,13,'Liverpool',2,0,1,1,1,2,-1,1),(14,11,'Manchester City',2,0,1,1,4,5,-1,1),(15,12,'Leicester City',2,0,0,2,3,5,-2,0),(16,17,'Bournemouth',2,0,0,2,2,7,-5,0),(17,14,'West Ham',2,0,0,2,4,9,-5,0),(18,16,'Everton',2,0,0,2,5,11,-6,0),(19,15,'Arsenal',2,0,0,2,3,10,-7,0),(20,19,'Crystal Palace',2,0,0,2,3,10,-7,0);
/*!40000 ALTER TABLE `tableweek2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek3`
--

DROP TABLE IF EXISTS `tableweek3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek3` (
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
-- Dumping data for table `tableweek3`
--

LOCK TABLES `tableweek3` WRITE;
/*!40000 ALTER TABLE `tableweek3` DISABLE KEYS */;
INSERT INTO `tableweek3` VALUES (1,2,'Tottenham Hotspur',3,3,0,0,15,5,10,9),(2,4,'Swansea City',3,3,0,0,10,3,7,9),(3,6,'Southampton',3,2,1,0,20,7,13,7),(4,7,'Newcastle United',3,2,1,0,6,4,2,7),(5,8,'Burnley',3,2,1,0,8,6,2,7),(6,1,'Brighton & Hove Albion',3,2,0,1,11,6,5,6),(7,11,'Manchester United',3,2,0,1,12,8,4,6),(8,5,'Watford',3,2,0,1,9,7,2,6),(9,10,'West Bromwich Albion',3,2,0,1,10,8,2,6),(10,3,'Chelsea',3,2,0,1,11,9,2,6),(11,9,'Huddersfield',3,1,1,1,9,15,-6,4),(12,17,'West Ham',3,1,0,2,10,12,-2,3),(13,12,'Stoke City',3,1,0,2,8,15,-7,3),(14,13,'Liverpool',3,0,2,1,4,5,-1,2),(15,14,'Manchester City',3,0,2,1,6,7,-1,2),(16,18,'Everton',3,0,1,2,7,13,-6,1),(17,20,'Crystal Palace',3,0,1,2,6,13,-7,1),(18,15,'Leicester City',3,0,0,3,5,8,-3,0),(19,16,'Bournemouth',3,0,0,3,5,11,-6,0),(20,19,'Arsenal',3,0,0,3,5,15,-10,0);
/*!40000 ALTER TABLE `tableweek3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek4`
--

DROP TABLE IF EXISTS `tableweek4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek4` (
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
-- Dumping data for table `tableweek4`
--

LOCK TABLES `tableweek4` WRITE;
/*!40000 ALTER TABLE `tableweek4` DISABLE KEYS */;
INSERT INTO `tableweek4` VALUES (1,3,'Southampton',4,3,1,0,23,9,14,10),(2,4,'Newcastle United',4,3,1,0,14,5,9,10),(3,1,'Tottenham Hotspur',4,3,0,1,18,10,8,9),(4,8,'Watford',4,3,0,1,12,7,5,9),(5,2,'Swansea City',4,3,0,1,11,11,0,9),(6,5,'Burnley',4,2,2,0,12,10,2,8),(7,7,'Manchester United',4,2,0,2,15,13,2,6),(8,9,'West Bromwich Albion',4,2,0,2,12,11,1,6),(9,6,'Brighton & Hove Albion',4,2,0,2,12,12,0,6),(10,10,'Chelsea',4,2,0,2,11,12,-1,6),(11,13,'Stoke City',4,2,0,2,14,16,-2,6),(12,14,'Liverpool',4,1,2,1,15,13,2,5),(13,15,'Manchester City',4,1,2,1,11,10,1,5),(14,16,'Everton',4,1,1,2,12,16,-4,4),(15,17,'Crystal Palace',4,1,1,2,12,18,-6,4),(16,11,'Huddersfield',4,1,1,2,14,21,-7,4),(17,12,'West Ham',4,1,0,3,18,23,-5,3),(18,18,'Leicester City',4,0,1,3,7,10,-3,1),(19,19,'Bournemouth',4,0,1,3,7,13,-6,1),(20,20,'Arsenal',4,0,1,3,9,19,-10,1);
/*!40000 ALTER TABLE `tableweek4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek5`
--

DROP TABLE IF EXISTS `tableweek5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek5` (
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
-- Dumping data for table `tableweek5`
--

LOCK TABLES `tableweek5` WRITE;
/*!40000 ALTER TABLE `tableweek5` DISABLE KEYS */;
INSERT INTO `tableweek5` VALUES (1,4,'Watford',5,4,0,1,16,10,6,12),(2,5,'Swansea City',5,4,0,1,18,16,2,12),(3,6,'Burnley',5,3,2,0,17,14,3,11),(4,1,'Southampton',5,3,1,1,26,14,12,10),(5,3,'Tottenham Hotspur',5,3,1,1,24,16,8,10),(6,2,'Newcastle United',5,3,1,1,16,10,6,10),(7,7,'Manchester United',5,3,0,2,19,13,6,9),(8,9,'Brighton & Hove Albion',5,3,0,2,17,14,3,9),(9,12,'Liverpool',5,2,2,1,20,16,4,8),(10,13,'Manchester City',5,2,2,1,13,11,2,8),(11,15,'Crystal Palace',5,2,1,2,16,19,-3,7),(12,8,'West Bromwich Albion',5,2,0,3,17,17,0,6),(13,10,'Chelsea',5,2,0,3,16,19,-3,6),(14,11,'Stoke City',5,2,0,3,14,20,-6,6),(15,19,'Bournemouth',5,1,1,3,13,18,-5,4),(16,14,'Everton',5,1,1,3,13,20,-7,4),(17,16,'Huddersfield',5,1,1,3,18,26,-8,4),(18,17,'West Ham',5,1,0,4,19,25,-6,3),(19,18,'Leicester City',5,0,2,3,13,16,-3,2),(20,20,'Arsenal',5,0,1,4,12,23,-11,1);
/*!40000 ALTER TABLE `tableweek5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek6`
--

DROP TABLE IF EXISTS `tableweek6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek6` (
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
-- Dumping data for table `tableweek6`
--

LOCK TABLES `tableweek6` WRITE;
/*!40000 ALTER TABLE `tableweek6` DISABLE KEYS */;
INSERT INTO `tableweek6` VALUES (1,5,'Tottenham Hotspur',6,4,1,1,31,18,13,13),(2,6,'Newcastle United',6,4,1,1,20,10,10,13),(3,1,'Watford',6,4,0,2,18,17,1,12),(4,2,'Swansea City',6,4,0,2,18,20,-2,12),(5,9,'Liverpool',6,3,2,1,23,17,6,11),(6,10,'Manchester City',6,3,2,1,18,15,3,11),(7,3,'Burnley',6,3,2,1,20,19,1,11),(8,4,'Southampton',6,3,1,2,28,17,11,10),(9,7,'Manchester United',6,3,1,2,23,17,6,10),(10,12,'West Bromwich Albion',6,3,0,3,22,20,2,9),(11,8,'Brighton & Hove Albion',6,3,0,3,17,18,-1,9),(12,14,'Stoke City',6,3,0,3,25,27,-2,9),(13,15,'Bournemouth',6,2,1,3,16,20,-4,7),(14,11,'Crystal Palace',6,2,1,3,20,24,-4,7),(15,16,'Everton',6,2,1,3,18,23,-5,7),(16,13,'Chelsea',6,2,0,4,23,30,-7,6),(17,20,'Arsenal',6,1,1,4,16,23,-7,4),(18,17,'Huddersfield',6,1,1,4,19,29,-10,4),(19,19,'Leicester City',6,0,3,3,17,20,-3,3),(20,18,'West Ham',6,1,0,5,22,30,-8,3);
/*!40000 ALTER TABLE `tableweek6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek7`
--

DROP TABLE IF EXISTS `tableweek7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek7` (
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
-- Dumping data for table `tableweek7`
--

LOCK TABLES `tableweek7` WRITE;
/*!40000 ALTER TABLE `tableweek7` DISABLE KEYS */;
INSERT INTO `tableweek7` VALUES (1,3,'Watford',7,5,0,2,21,19,2,15),(2,5,'Liverpool',7,4,2,1,26,18,8,14),(3,6,'Manchester City',7,4,2,1,22,17,5,14),(4,7,'Burnley',7,4,2,1,21,19,2,14),(5,2,'Newcastle United',7,4,1,2,20,11,9,13),(6,1,'Tottenham Hotspur',7,4,1,2,32,23,9,13),(7,9,'Manchester United',7,4,1,2,27,19,8,13),(8,10,'West Bromwich Albion',7,4,0,3,27,21,6,12),(9,4,'Swansea City',7,4,0,3,18,21,-3,12),(10,8,'Southampton',7,3,1,3,30,21,9,10),(11,14,'Crystal Palace',7,3,1,3,21,24,-3,10),(12,11,'Brighton & Hove Albion',7,3,0,4,18,21,-3,9),(13,16,'Chelsea',7,3,0,4,28,32,-4,9),(14,12,'Stoke City',7,3,0,4,26,31,-5,9),(15,13,'Bournemouth',7,2,1,4,18,24,-6,7),(16,15,'Everton',7,2,1,4,20,28,-8,7),(17,19,'Leicester City',7,1,3,3,21,21,0,6),(18,20,'West Ham',7,2,0,5,23,30,-7,6),(19,17,'Arsenal',7,1,1,5,16,24,-8,4),(20,18,'Huddersfield',7,1,1,5,21,32,-11,4);
/*!40000 ALTER TABLE `tableweek7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek8`
--

DROP TABLE IF EXISTS `tableweek8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek8` (
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
-- Dumping data for table `tableweek8`
--

LOCK TABLES `tableweek8` WRITE;
/*!40000 ALTER TABLE `tableweek8` DISABLE KEYS */;
INSERT INTO `tableweek8` VALUES (1,7,'Manchester United',8,5,1,2,34,19,15,16),(2,5,'Newcastle United',8,5,1,2,24,14,10,16),(3,8,'West Bromwich Albion',8,5,0,3,31,22,9,15),(4,2,'Liverpool',8,4,3,1,29,21,8,15),(5,1,'Watford',8,5,0,3,22,23,-1,15),(6,6,'Tottenham Hotspur',8,4,2,2,35,26,9,14),(7,3,'Manchester City',8,4,2,2,24,21,3,14),(8,4,'Burnley',8,4,2,2,23,22,1,14),(9,10,'Southampton',8,4,1,3,33,23,10,13),(10,9,'Swansea City',8,4,1,3,22,25,-3,13),(11,13,'Chelsea',8,4,0,4,32,34,-2,12),(12,14,'Stoke City',8,4,0,4,29,33,-4,12),(13,16,'Everton',8,3,1,4,24,28,-4,10),(14,11,'Crystal Palace',8,3,1,4,21,31,-10,10),(15,17,'Leicester City',8,2,3,3,27,23,4,9),(16,12,'Brighton & Hove Albion',8,3,0,5,20,24,-4,9),(17,15,'Bournemouth',8,2,2,4,22,28,-6,8),(18,18,'West Ham',8,2,0,6,23,34,-11,6),(19,19,'Arsenal',8,1,1,6,19,28,-9,4),(20,20,'Huddersfield',8,1,1,6,23,38,-15,4);
/*!40000 ALTER TABLE `tableweek8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek9`
--

DROP TABLE IF EXISTS `tableweek9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek9` (
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
-- Dumping data for table `tableweek9`
--

LOCK TABLES `tableweek9` WRITE;
/*!40000 ALTER TABLE `tableweek9` DISABLE KEYS */;
INSERT INTO `tableweek9` VALUES (1,1,'Manchester United',9,6,1,2,37,20,17,19),(2,5,'Watford',9,6,0,3,25,24,1,18),(3,2,'Newcastle United',9,5,2,2,28,18,10,17),(4,7,'Manchester City',9,5,2,2,29,23,6,17),(5,9,'Southampton',9,5,1,3,36,24,12,16),(6,4,'Liverpool',9,4,4,1,31,23,8,16),(7,3,'West Bromwich Albion',9,5,0,4,33,27,6,15),(8,6,'Tottenham Hotspur',9,4,2,3,36,29,7,14),(9,8,'Burnley',9,4,2,3,24,25,-1,14),(10,11,'Chelsea',9,4,1,4,36,38,-2,13),(11,10,'Swansea City',9,4,1,4,23,28,-5,13),(12,15,'Leicester City',9,3,3,3,30,24,6,12),(13,16,'Brighton & Hove Albion',9,4,0,5,23,25,-2,12),(14,12,'Stoke City',9,4,0,5,30,36,-6,12),(15,13,'Everton',9,3,2,4,26,30,-4,11),(16,14,'Crystal Palace',9,3,1,5,22,34,-12,10),(17,17,'Bournemouth',9,2,3,4,24,30,-6,9),(18,19,'Arsenal',9,2,1,6,22,29,-7,7),(19,18,'West Ham',9,2,0,7,24,37,-13,6),(20,20,'Huddersfield',9,1,2,6,25,40,-15,5);
/*!40000 ALTER TABLE `tableweek9` ENABLE KEYS */;
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
  `abbrev` varchar(3) NOT NULL,
  `current` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `abbrev_UNIQUE` (`abbrev`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Arsenal','ARS',''),(2,'Bournemouth','BOU',''),(3,'Burnley','BUR',''),(4,'Chelsea','CHE',''),(5,'Crystal Palace','CRY',''),(6,'Everton','EVE',''),(7,'Hull City','HUL','\0'),(8,'Leicester City','LEI',''),(9,'Liverpool','LIV',''),(10,'Manchester City','MCI',''),(11,'Manchester United','MUN',''),(12,'Middlesbrough','MID','\0'),(13,'Southampton','SOU',''),(14,'Stoke City','STO',''),(15,'Sunderland','SUN','\0'),(16,'Swansea City','SWA',''),(17,'Tottenham Hotspur','TOT',''),(18,'Watford','WAT',''),(19,'West Bromwich Albion','WBA',''),(20,'West Ham','WHU',''),(21,'Brighton & Hove Albion','BHA',''),(22,'Huddersfield','HUD',''),(23,'Newcastle United','NEW','');
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

-- Dump completed on 2017-12-16 13:18:21
