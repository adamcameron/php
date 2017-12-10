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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` VALUES (2,1,'2017-03-12',17,1,4,3,NULL),(3,1,'2017-03-12',14,13,1,0,NULL),(4,1,'2017-03-12',19,3,1,1,NULL),(5,1,'2017-03-12',7,16,4,3,NULL),(6,1,'2017-03-12',15,8,0,3,NULL),(7,1,'2017-03-12',9,12,3,3,NULL),(8,1,'2017-03-12',4,6,5,1,NULL),(9,1,'2017-03-12',10,18,4,0,NULL),(10,1,'2017-03-12',2,5,2,0,NULL),(11,1,'2017-03-12',11,20,5,5,NULL),(12,2,'2017-04-02',8,5,3,0,NULL),(13,2,'2017-04-02',15,4,6,0,NULL),(14,2,'2017-04-02',7,2,1,2,NULL),(15,2,'2017-04-02',13,20,2,1,NULL),(16,2,'2017-04-02',19,3,2,1,NULL),(17,2,'2017-04-02',11,17,5,0,NULL),(18,2,'2017-04-02',10,6,4,2,NULL),(19,2,'2017-04-02',9,14,5,2,NULL),(20,2,'2017-04-02',16,12,3,2,NULL),(21,2,'2017-04-02',1,18,5,1,NULL),(22,3,'2017-04-23',8,12,5,0,NULL),(23,3,'2017-04-23',11,6,2,1,NULL),(24,3,'2017-04-23',16,2,5,0,NULL),(25,3,'2017-04-23',9,20,3,3,NULL),(26,3,'2017-04-23',10,15,6,5,NULL),(27,3,'2017-04-23',1,5,2,0,NULL),(28,3,'2017-04-23',13,7,3,2,NULL),(29,3,'2017-04-23',19,3,5,2,NULL),(30,3,'2017-04-23',14,17,4,0,NULL),(31,3,'2017-04-23',4,18,5,2,NULL),(32,4,'2017-04-23',10,6,4,2,NULL),(33,4,'2017-04-23',8,5,6,2,NULL),(34,4,'2017-04-23',2,18,1,1,NULL),(35,4,'2017-04-23',9,12,3,4,NULL),(36,4,'2017-04-23',19,17,1,3,NULL),(37,4,'2017-04-23',15,3,4,0,NULL),(38,4,'2017-04-30',16,20,6,2,NULL),(39,4,'2017-04-30',14,4,4,0,NULL),(40,4,'2017-04-30',7,1,4,2,NULL),(41,4,'2017-04-30',11,13,2,0,NULL),(42,5,'2017-04-30',8,18,0,0,NULL),(43,5,'2017-04-30',16,13,4,2,NULL),(44,5,'2017-04-30',4,7,4,1,NULL),(45,5,'2017-04-30',2,6,2,1,NULL),(46,5,'2017-04-30',15,12,5,5,NULL),(47,5,'2017-04-30',1,3,1,0,NULL),(48,5,'2017-04-30',14,20,5,7,NULL),(49,5,'2017-04-30',18,5,7,2,NULL),(50,5,'2017-04-30',10,19,4,4,NULL),(51,5,'2017-04-30',9,11,3,0,NULL),(52,6,'2017-04-30',8,14,3,1,NULL);
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek1`
--

DROP TABLE IF EXISTS `tableweek1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek1` (
  `place` int(11) NOT NULL AUTO_INCREMENT,
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
  `background` varchar(45) NOT NULL,
  `text` varchar(45) NOT NULL,
  `border` varchar(45) NOT NULL,
  PRIMARY KEY (`place`),
  UNIQUE KEY `id_UNIQUE` (`place`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableweek1`
--

LOCK TABLES `tableweek1` WRITE;
/*!40000 ALTER TABLE `tableweek1` DISABLE KEYS */;
INSERT INTO `tableweek1` VALUES (1,'-','Leicester City',6,5,1,0,20,3,17,16,'#0053A0','white','#FDBE11'),(2,'-','Manchester City',5,4,1,0,22,13,9,13,'#6CADDF','white','#4E6A93'),(3,'-','Swansea City',5,4,0,1,21,10,11,12,'white','black','black'),(4,'-','Manchester United',5,3,1,1,14,9,5,10,'red','white','black'),(5,'-','Bournemouth',5,3,1,1,7,8,-1,10,'red','black','white'),(6,'-','Arsenal',5,3,0,2,13,9,4,9,'#ED1B24','#FFFDFA','#9B8347'),(7,'-','Stoke City',6,3,0,3,17,15,2,9,'red','white','#1B449C'),(8,'-','Chelsea',5,3,0,2,14,14,0,9,'rgb(14,30,125)','white','rgb(217,152,8)'),(9,'-','Liverpool',5,2,2,1,17,12,5,8,'#D00027','white','#fef667'),(10,'-','West Bromwich Albion',5,2,2,1,13,11,2,8,'white','#00003A','#8484AA'),(11,'-','Sunderland',5,2,1,2,20,14,6,7,'red','white','black'),(12,'-','Hull City',5,2,0,3,12,14,-2,6,'#F5971D','black','white'),(13,'-','Southampton',5,2,0,3,7,10,-3,6,'red','white','black'),(14,'-','Tottenham Hotspur',4,2,0,2,7,13,-6,6,'white','#0F204B','gold'),(15,'-','West Ham',5,1,2,2,18,21,-3,5,'#7C2C3B','white','#2CAFE5'),(16,'-','Middlesbrough',5,1,2,2,14,19,-5,5,'red','white','blue'),(17,'-','Watford',6,1,2,3,11,17,-6,5,'#FBEE23','black','#ED2127'),(18,'-','Burnley',5,0,1,4,4,13,-9,1,'#7f1734','#9DBAFC','white'),(19,'-','Everton',5,0,0,5,7,17,-10,0,'#274488','white','#FFDF19'),(20,'-','Crystal Palace',5,0,0,5,4,20,-16,0,'blue','red','white');
/*!40000 ALTER TABLE `tableweek1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek2`
--

DROP TABLE IF EXISTS `tableweek2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek2` (
  `place` int(11) NOT NULL AUTO_INCREMENT,
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
  `background` varchar(45) NOT NULL,
  `text` varchar(45) NOT NULL,
  `border` varchar(45) NOT NULL,
  PRIMARY KEY (`place`),
  UNIQUE KEY `id_UNIQUE` (`place`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableweek2`
--

LOCK TABLES `tableweek2` WRITE;
/*!40000 ALTER TABLE `tableweek2` DISABLE KEYS */;
INSERT INTO `tableweek2` VALUES (1,2,'Manchester City',2,2,0,0,8,2,6,6,'#6CADDF','white','#4E6A93'),(2,1,'Leicester City',2,2,0,0,6,0,6,6,'#0053A0','white','#FDBE11'),(3,5,'Bournemouth',2,2,0,0,4,1,3,6,'red','black','white'),(4,4,'Manchester United',2,1,1,0,10,5,5,4,'red','white','black'),(5,9,'Liverpool',2,1,1,0,8,5,3,4,'#D00027','white','#fef667'),(6,10,'West Bromwich Albion',2,1,1,0,3,2,1,4,'white','#00003A','#8484AA'),(7,6,'Arsenal',2,1,0,1,8,5,3,3,'#ED1B24','#FFFDFA','#9B8347'),(8,11,'Sunderland',2,1,0,1,6,3,3,3,'red','white','black'),(9,3,'Swansea City',2,1,0,1,6,6,0,3,'white','black','black'),(10,12,'Hull City',2,1,0,1,5,5,0,3,'#F5971D','black','white'),(11,13,'Southampton',2,1,0,1,2,2,0,3,'red','white','black'),(12,8,'Chelsea',2,1,0,1,5,7,-2,3,'rgb(14,30,125)','white','rgb(217,152,8)'),(13,7,'Stoke City',2,1,0,1,3,5,-2,3,'red','white','#1B449C'),(14,14,'Tottenham Hotspur',2,1,0,1,4,8,-4,3,'white','#0F204B','gold'),(15,15,'West Ham',2,0,1,1,6,7,-1,1,'#7C2C3B','white','#2CAFE5'),(16,16,'Middlesbrough',2,0,1,1,5,6,-1,1,'red','white','blue'),(17,18,'Burnley',2,0,1,1,2,3,-1,1,'#7f1734','#9DBAFC','white'),(18,20,'Crystal Palace',2,0,0,2,0,5,-5,0,'blue','red','white'),(19,19,'Everton',2,0,0,2,3,9,-6,0,'#274488','white','#FFDF19'),(20,17,'Watford',2,0,0,2,1,9,-8,0,'#FBEE23','black','#ED2127');
/*!40000 ALTER TABLE `tableweek2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek3`
--

DROP TABLE IF EXISTS `tableweek3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek3` (
  `place` int(11) NOT NULL AUTO_INCREMENT,
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
  `background` varchar(45) NOT NULL,
  `text` varchar(45) NOT NULL,
  `border` varchar(45) NOT NULL,
  PRIMARY KEY (`place`),
  UNIQUE KEY `id_UNIQUE` (`place`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableweek3`
--

LOCK TABLES `tableweek3` WRITE;
/*!40000 ALTER TABLE `tableweek3` DISABLE KEYS */;
INSERT INTO `tableweek3` VALUES (1,2,'Leicester City',3,3,0,0,11,0,11,9,'#0053A0','white','#FDBE11'),(2,1,'Manchester City',3,3,0,0,14,7,7,9,'#6CADDF','white','#4E6A93'),(3,4,'Manchester United',3,2,1,0,12,6,6,7,'red','white','black'),(4,6,'West Bromwich Albion',3,2,1,0,8,4,4,7,'white','#00003A','#8484AA'),(5,9,'Swansea City',3,2,0,1,11,6,5,6,'white','black','black'),(6,7,'Arsenal',3,2,0,1,10,5,5,6,'#ED1B24','#FFFDFA','#9B8347'),(7,13,'Stoke City',3,2,0,1,7,5,2,6,'red','white','#1B449C'),(8,12,'Chelsea',3,2,0,1,10,9,1,6,'rgb(14,30,125)','white','rgb(217,152,8)'),(9,11,'Southampton',3,2,0,1,5,4,1,6,'red','white','black'),(10,3,'Bournemouth',3,2,0,1,4,6,-2,6,'red','black','white'),(11,5,'Liverpool',3,1,2,0,11,8,3,5,'#D00027','white','#fef667'),(12,8,'Sunderland',3,1,0,2,11,9,2,3,'red','white','black'),(13,10,'Hull City',3,1,0,2,7,8,-1,3,'#F5971D','black','white'),(14,14,'Tottenham Hotspur',3,1,0,2,4,12,-8,3,'white','#0F204B','gold'),(15,15,'West Ham',3,0,2,1,9,10,-1,2,'#7C2C3B','white','#2CAFE5'),(16,17,'Burnley',3,0,1,2,4,8,-4,1,'#7f1734','#9DBAFC','white'),(17,16,'Middlesbrough',3,0,1,2,5,11,-6,1,'red','white','blue'),(18,19,'Everton',3,0,0,3,4,11,-7,0,'#274488','white','#FFDF19'),(19,18,'Crystal Palace',3,0,0,3,0,7,-7,0,'blue','red','white'),(20,20,'Watford',3,0,0,3,3,14,-11,0,'#FBEE23','black','#ED2127');
/*!40000 ALTER TABLE `tableweek3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek4`
--

DROP TABLE IF EXISTS `tableweek4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek4` (
  `place` int(11) NOT NULL AUTO_INCREMENT,
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
  `background` varchar(45) NOT NULL,
  `text` varchar(45) NOT NULL,
  `border` varchar(45) NOT NULL,
  PRIMARY KEY (`place`),
  UNIQUE KEY `id_UNIQUE` (`place`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableweek4`
--

LOCK TABLES `tableweek4` WRITE;
/*!40000 ALTER TABLE `tableweek4` DISABLE KEYS */;
INSERT INTO `tableweek4` VALUES (1,1,'Leicester City',4,4,0,0,17,2,15,12,'#0053A0','white','#FDBE11'),(2,2,'Manchester City',4,4,0,0,18,9,9,12,'#6CADDF','white','#4E6A93'),(3,3,'Manchester United',4,3,1,0,14,6,8,10,'red','white','black'),(4,5,'Swansea City',4,3,0,1,17,8,9,9,'white','black','black'),(5,7,'Stoke City',4,3,0,1,11,5,6,9,'red','white','#1B449C'),(6,4,'West Bromwich Albion',4,2,1,1,9,7,2,7,'white','#00003A','#8484AA'),(7,10,'Bournemouth',4,2,1,1,5,7,-2,7,'red','black','white'),(8,12,'Sunderland',4,2,0,2,15,9,6,6,'red','white','black'),(9,6,'Arsenal',4,2,0,2,12,9,3,6,'#ED1B24','#FFFDFA','#9B8347'),(10,13,'Hull City',4,2,0,2,11,10,1,6,'#F5971D','black','white'),(11,9,'Southampton',4,2,0,2,5,6,-1,6,'red','white','black'),(12,8,'Chelsea',4,2,0,2,10,13,-3,6,'rgb(14,30,125)','white','rgb(217,152,8)'),(13,14,'Tottenham Hotspur',4,2,0,2,7,13,-6,6,'white','#0F204B','gold'),(14,11,'Liverpool',4,1,2,1,14,12,2,5,'#D00027','white','#fef667'),(15,17,'Middlesbrough',4,1,1,2,9,14,-5,4,'red','white','blue'),(16,15,'West Ham',4,0,2,2,11,16,-5,2,'#7C2C3B','white','#2CAFE5'),(17,16,'Burnley',4,0,1,3,4,12,-8,1,'#7f1734','#9DBAFC','white'),(18,20,'Watford',4,0,1,3,4,15,-11,1,'#FBEE23','black','#ED2127'),(19,18,'Everton',4,0,0,4,6,15,-9,0,'#274488','white','#FFDF19'),(20,19,'Crystal Palace',4,0,0,4,2,13,-11,0,'blue','red','white');
/*!40000 ALTER TABLE `tableweek4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableweek5`
--

DROP TABLE IF EXISTS `tableweek5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableweek5` (
  `place` int(11) NOT NULL AUTO_INCREMENT,
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
  `background` varchar(45) NOT NULL,
  `text` varchar(45) NOT NULL,
  `border` varchar(45) NOT NULL,
  PRIMARY KEY (`place`),
  UNIQUE KEY `id_UNIQUE` (`place`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableweek5`
--

LOCK TABLES `tableweek5` WRITE;
/*!40000 ALTER TABLE `tableweek5` DISABLE KEYS */;
INSERT INTO `tableweek5` VALUES (1,1,'Leicester City',5,4,1,0,17,2,15,13,'#0053A0','white','#FDBE11'),(2,2,'Manchester City',5,4,1,0,22,13,9,13,'#6CADDF','white','#4E6A93'),(3,4,'Swansea City',5,4,0,1,21,10,11,12,'white','black','black'),(4,3,'Manchester United',5,3,1,1,14,9,5,10,'red','white','black'),(5,7,'Bournemouth',5,3,1,1,7,8,-1,10,'red','black','white'),(6,5,'Stoke City',5,3,0,2,16,12,4,9,'red','white','#1B449C'),(7,9,'Arsenal',5,3,0,2,13,9,4,9,'#ED1B24','#FFFDFA','#9B8347'),(8,12,'Chelsea',5,3,0,2,14,14,0,9,'rgb(14,30,125)','white','rgb(217,152,8)'),(9,14,'Liverpool',5,2,2,1,17,12,5,8,'#D00027','white','#fef667'),(10,6,'West Bromwich Albion',5,2,2,1,13,11,2,8,'white','#00003A','#8484AA'),(11,8,'Sunderland',5,2,1,2,20,14,6,7,'red','white','black'),(12,10,'Hull City',5,2,0,3,12,14,-2,6,'#F5971D','black','white'),(13,11,'Southampton',5,2,0,3,7,10,-3,6,'red','white','black'),(14,13,'Tottenham Hotspur',4,2,0,2,7,13,-6,6,'white','#0F204B','gold'),(15,16,'West Ham',5,1,2,2,18,21,-3,5,'#7C2C3B','white','#2CAFE5'),(16,15,'Middlesbrough',5,1,2,2,14,19,-5,5,'red','white','blue'),(17,18,'Watford',6,1,2,3,11,17,-6,5,'#FBEE23','black','#ED2127'),(18,17,'Burnley',5,0,1,4,4,13,-9,1,'#7f1734','#9DBAFC','white'),(19,19,'Everton',5,0,0,5,7,17,-10,0,'#274488','white','#FFDF19'),(20,20,'Crystal Palace',5,0,0,5,4,20,-16,0,'blue','red','white');
/*!40000 ALTER TABLE `tableweek5` ENABLE KEYS */;
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

-- Dump completed on 2017-12-10 10:37:51
