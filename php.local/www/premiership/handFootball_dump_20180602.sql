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
  `matchcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fkHomeTeam_idx` (`homeTeam`),
  KEY `fkAwayTeam_idx` (`awayTeam`),
  CONSTRAINT `fkAwayTeam` FOREIGN KEY (`awayTeam`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkHomeTeam` FOREIGN KEY (`homeTeam`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` VALUES (1,1,'2018-04-23',9,26,4,1,NULL),(2,1,'2018-04-23',20,21,1,1,NULL),(3,1,'2018-04-23',23,1,4,1,NULL),(4,1,'2018-04-23',8,24,4,1,NULL),(5,1,'2018-04-23',25,10,2,1,NULL),(6,1,'2018-04-23',17,5,4,2,NULL),(7,1,'2018-04-23',22,14,1,0,NULL),(8,1,'2018-04-23',2,4,6,1,NULL),(9,1,'2018-04-23',11,16,4,2,NULL),(10,1,'2018-04-30',19,13,4,4,NULL),(11,2,'2018-04-30',14,1,6,2,NULL),(12,2,'2018-04-30',17,25,4,1,NULL),(13,2,'2018-04-30',2,22,4,3,NULL),(14,2,'2018-04-30',24,19,8,1,NULL),(15,2,'2018-04-30',16,4,6,1,NULL),(16,2,'2018-04-30',9,13,4,1,NULL),(17,2,'2018-04-30',10,8,3,2,NULL),(18,2,'2018-04-30',11,20,1,0,NULL),(19,2,'2018-04-30',21,26,3,0,NULL),(20,2,'2018-04-30',23,5,2,0,NULL);
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
-- Dumping data for table `tableWeek1`
--

LOCK TABLES `tableWeek1` WRITE;
/*!40000 ALTER TABLE `tableWeek1` DISABLE KEYS */;
INSERT INTO `tableWeek1` VALUES (1,NULL,'Bournemouth',1,1,0,0,6,1,5,3),(2,NULL,'Leicester City',1,1,0,0,4,1,3,3),(3,NULL,'Liverpool',1,1,0,0,4,1,3,3),(4,NULL,'Newcastle United',1,1,0,0,4,1,3,3),(5,NULL,'Manchester United',1,1,0,0,4,2,2,3),(6,NULL,'Tottenham Hotspur',1,1,0,0,4,2,2,3),(7,NULL,'Huddersfield Town',1,1,0,0,1,0,1,3),(8,NULL,'Fulham',1,1,0,0,2,1,1,3),(9,NULL,'Brighton & Hove Albion',1,0,1,0,1,1,0,1),(10,NULL,'West Ham United',1,0,1,0,1,1,0,1),(11,NULL,'Southampton',1,0,1,0,4,4,0,1),(12,NULL,'West Bromwich Albion',1,0,1,0,4,4,0,1),(13,NULL,'Stoke City',1,0,0,1,0,1,-1,0),(14,NULL,'Manchester City',1,0,0,1,1,2,-1,0),(15,NULL,'Crystal Palace',1,0,0,1,2,4,-2,0),(16,NULL,'Swansea City',1,0,0,1,2,4,-2,0),(17,NULL,'Arsenal',1,0,0,1,1,4,-3,0),(18,NULL,'Cardiff City',1,0,0,1,1,4,-3,0),(19,NULL,'Wolverhampton Wanderers',1,0,0,1,1,4,-3,0),(20,NULL,'Chelsea',1,0,0,1,1,6,-5,0);
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
INSERT INTO `tableWeek2` VALUES (1,3,'Liverpool',2,2,0,0,8,2,6,6),(2,1,'Bournemouth',2,2,0,0,10,4,6,6),(3,4,'Newcastle United',2,2,0,0,6,1,5,6),(4,6,'Tottenham Hotspur',2,2,0,0,8,3,5,6),(5,5,'Manchester United',2,2,0,0,5,2,3,6),(6,9,'Brighton & Hove Albion',2,1,1,0,4,1,3,4),(7,18,'Cardiff City',2,1,0,1,9,5,4,3),(8,13,'Stoke City',2,1,0,1,6,3,3,3),(9,16,'Swansea City',2,1,0,1,8,5,3,3),(10,2,'Leicester City',2,1,0,1,6,4,2,3),(11,7,'Huddersfield Town',2,1,0,1,4,4,0,3),(12,14,'Manchester City',2,1,0,1,4,4,0,3),(13,8,'Fulham',2,1,0,1,3,5,-2,3),(14,10,'West Ham United',2,0,1,1,1,2,-1,1),(15,11,'Southampton',2,0,1,1,5,8,-3,1),(16,12,'West Bromwich Albion',2,0,1,1,5,12,-7,1),(17,15,'Crystal Palace',2,0,0,2,2,6,-4,0),(18,19,'Wolverhampton Wanderers',2,0,0,2,1,7,-6,0),(19,17,'Arsenal',2,0,0,2,3,10,-7,0),(20,20,'Chelsea',2,0,0,2,2,12,-10,0);
/*!40000 ALTER TABLE `tableWeek2` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Arsenal','ARS',''),(2,'Bournemouth','BOU',''),(3,'Burnley','BUR','\0'),(4,'Chelsea','CHE',''),(5,'Crystal Palace','CRY',''),(6,'Everton','EVE','\0'),(7,'Hull City','HUL','\0'),(8,'Leicester City','LEI',''),(9,'Liverpool','LIV',''),(10,'Manchester City','MCI',''),(11,'Manchester United','MUN',''),(12,'Middlesbrough','MID','\0'),(13,'Southampton','SOU',''),(14,'Stoke City','STO',''),(15,'Sunderland','SUN','\0'),(16,'Swansea City','SWA',''),(17,'Tottenham Hotspur','TOT',''),(18,'Watford','WAT','\0'),(19,'West Bromwich Albion','WBA',''),(20,'West Ham United','WHU',''),(21,'Brighton & Hove Albion','BHA',''),(22,'Huddersfield Town','HUD',''),(23,'Newcastle United','NEW',''),(24,'Cardiff City','CAR',''),(25,'Fulham','FUL',''),(26,'Wolverhampton Wanderers','WOL','');
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

-- Dump completed on 2018-06-02 11:38:06
