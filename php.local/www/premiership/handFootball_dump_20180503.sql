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
) ENGINE=InnoDB AUTO_INCREMENT=381 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` VALUES (1,1,'2017-12-05',9,3,1,2,NULL),(2,1,'2017-12-05',16,8,2,1,NULL),(3,1,'2017-12-05',21,2,4,0,NULL),(4,1,'2017-12-05',10,23,1,2,NULL),(5,1,'2017-12-05',17,5,7,1,NULL),(6,1,'2017-12-05',19,4,1,5,NULL),(7,1,'2017-12-05',18,1,4,2,NULL),(8,1,'2017-12-05',20,22,3,4,NULL),(9,1,'2017-12-05',11,6,6,3,NULL),(10,1,'2017-12-05',13,14,8,2,NULL),(11,2,'2017-12-05',11,16,1,3,NULL),(12,2,'2017-12-05',2,17,2,3,NULL),(13,2,'2017-12-05',13,3,3,3,NULL),(14,2,'2017-12-05',10,22,3,3,NULL),(15,2,'2017-12-05',21,20,5,1,NULL),(16,2,'2017-12-05',19,1,6,1,NULL),(17,2,'2017-12-05',14,6,5,2,NULL),(18,2,'2017-12-05',4,5,3,2,NULL),(19,2,'2017-12-05',23,9,0,0,NULL),(20,2,'2017-12-05',8,18,2,3,NULL),(21,3,'2017-12-05',2,23,3,4,NULL),(22,3,'2017-12-05',16,14,5,1,NULL),(23,3,'2017-12-05',11,1,5,2,NULL),(24,3,'2017-12-05',10,6,2,2,NULL),(25,3,'2017-12-05',18,3,2,3,NULL),(26,3,'2017-12-05',8,19,2,3,NULL),(27,3,'2017-12-05',17,21,5,2,NULL),(28,3,'2017-12-05',13,22,9,2,NULL),(29,3,'2017-12-05',20,4,6,3,NULL),(30,3,'2017-12-05',5,9,3,3,NULL),(31,4,'2017-12-08',18,4,3,0,NULL),(32,4,'2017-12-08',8,2,2,2,NULL),(33,4,'2017-12-08',6,17,5,3,NULL),(34,4,'2017-12-08',23,16,8,1,NULL),(35,4,'2017-12-08',9,20,11,8,NULL),(36,4,'2017-12-08',14,21,6,1,NULL),(37,4,'2017-12-08',22,5,5,6,NULL),(38,4,'2017-12-08',11,10,3,5,NULL),(39,4,'2017-12-08',13,19,3,2,NULL),(40,4,'2017-12-08',1,3,4,4,NULL),(41,5,'2017-12-08',10,20,2,1,NULL),(42,5,'2017-12-08',4,16,5,7,NULL),(43,5,'2017-12-08',21,23,5,2,NULL),(44,5,'2017-12-08',22,3,4,5,NULL),(45,5,'2017-12-08',11,14,4,0,NULL),(46,5,'2017-12-08',9,13,5,3,NULL),(47,5,'2017-12-08',1,18,3,4,NULL),(48,5,'2017-12-08',17,8,6,6,NULL),(49,5,'2017-12-08',6,5,1,4,NULL),(50,5,'2017-12-08',19,2,5,6,NULL),(51,6,'2017-12-08',23,16,4,0,NULL),(52,6,'2017-12-08',21,1,0,4,NULL),(53,6,'2017-12-08',22,9,1,3,NULL),(54,6,'2017-12-08',11,8,4,4,NULL),(55,6,'2017-12-08',13,2,2,3,NULL),(56,6,'2017-12-08',14,4,11,7,NULL),(57,6,'2017-12-08',10,5,5,4,NULL),(58,6,'2017-12-08',6,3,5,3,NULL),(59,6,'2017-12-08',17,18,7,2,NULL),(60,6,'2017-12-08',19,20,5,3,NULL),(61,7,'2017-12-08',11,2,4,2,NULL),(62,7,'2017-12-08',5,1,1,0,NULL),(63,7,'2017-12-08',8,14,4,1,NULL),(64,7,'2017-12-08',19,17,5,1,NULL),(65,7,'2017-12-08',10,13,4,2,NULL),(66,7,'2017-12-08',3,23,1,0,NULL),(67,7,'2017-12-08',20,16,1,0,NULL),(68,7,'2017-12-08',22,18,2,3,NULL),(69,7,'2017-12-08',9,21,3,1,NULL),(70,7,'2017-12-08',4,6,5,2,NULL),(71,8,'2017-12-09',17,9,3,3,NULL),(72,8,'2017-12-09',3,14,2,3,NULL),(73,8,'2017-12-11',6,20,4,0,NULL),(74,8,'2017-12-11',10,4,2,4,NULL),(75,8,'2017-12-11',23,1,4,3,NULL),(76,8,'2017-12-11',11,5,7,0,NULL),(77,8,'2017-12-11',13,21,3,2,NULL),(78,8,'2017-12-11',8,22,6,2,NULL),(79,8,'2017-12-11',19,18,4,1,NULL),(80,8,'2017-12-11',2,16,4,4,NULL),(81,9,'2017-12-11',22,6,2,2,NULL),(82,9,'2017-12-11',17,13,1,3,NULL),(83,9,'2017-12-11',21,3,3,1,NULL),(84,9,'2017-12-11',23,4,4,4,NULL),(85,9,'2017-12-11',16,1,1,3,NULL),(86,9,'2017-12-11',14,18,1,3,NULL),(87,9,'2017-12-11',2,9,2,2,NULL),(88,9,'2017-12-11',8,20,3,1,NULL),(89,9,'2017-12-11',10,19,5,2,NULL),(90,9,'2017-12-11',5,11,1,3,NULL),(91,10,'2017-12-12',22,4,4,3,NULL),(92,10,'2017-12-12',18,2,2,3,NULL),(93,10,'2017-12-12',9,11,4,2,NULL),(94,10,'2017-12-12',8,21,4,1,NULL),(95,10,'2017-12-12',13,6,3,2,NULL),(96,10,'2017-12-12',17,14,4,2,NULL),(97,10,'2017-12-12',20,5,2,2,NULL),(98,10,'2017-12-12',3,16,3,2,NULL),(99,10,'2017-12-12',10,1,1,1,NULL),(100,10,'2017-12-12',19,23,1,1,NULL),(101,11,'2017-12-13',11,13,4,3,NULL),(102,11,'2017-12-13',14,5,2,3,NULL),(103,11,'2017-12-13',23,18,6,2,NULL),(104,11,'2017-12-13',10,17,1,1,NULL),(105,11,'2017-12-13',21,4,3,2,NULL),(106,11,'2017-12-13',22,16,4,2,NULL),(107,11,'2017-12-13',1,20,3,1,NULL),(108,11,'2017-12-13',19,3,1,4,NULL),(109,11,'2017-12-13',6,9,2,3,NULL),(110,11,'2017-12-13',2,8,3,3,NULL),(111,12,'2017-12-14',1,17,3,1,NULL),(112,12,'2017-12-14',19,5,3,1,NULL),(113,12,'2017-12-14',8,3,4,2,NULL),(114,12,'2017-12-14',9,14,4,3,NULL),(115,12,'2017-12-14',10,21,2,3,NULL),(116,12,'2017-12-14',11,20,8,3,NULL),(117,12,'2017-12-14',13,18,6,3,NULL),(118,12,'2017-12-14',6,2,4,1,NULL),(119,12,'2017-12-14',4,16,6,3,NULL),(120,12,'2017-12-14',22,23,2,1,NULL),(121,13,'2017-12-19',21,5,1,1,NULL),(122,13,'2017-12-19',8,4,4,1,NULL),(123,13,'2017-12-19',10,14,7,2,NULL),(124,13,'2017-12-19',22,2,1,5,NULL),(125,13,'2017-12-19',23,6,4,2,NULL),(126,13,'2017-12-19',16,13,2,1,NULL),(127,13,'2017-12-19',9,19,5,1,NULL),(128,13,'2017-12-19',17,3,3,1,NULL),(129,13,'2017-12-19',11,18,1,3,NULL),(130,13,'2017-12-19',20,1,3,1,NULL),(131,14,'2017-12-19',2,5,2,2,NULL),(132,14,'2017-12-19',10,8,3,3,NULL),(133,14,'2017-12-19',6,21,3,1,NULL),(134,14,'2017-12-19',20,13,0,4,NULL),(135,14,'2017-12-19',18,16,1,5,NULL),(136,14,'2017-12-19',22,14,4,0,NULL),(137,14,'2017-12-19',4,1,2,2,NULL),(138,14,'2017-12-19',19,11,2,5,NULL),(139,14,'2017-12-19',3,23,4,2,NULL),(140,14,'2017-12-19',9,17,5,2,NULL),(141,15,'2017-12-19',1,13,2,5,NULL),(142,15,'2017-12-19',5,16,2,2,NULL),(143,15,'2017-12-19',14,20,4,3,NULL),(144,15,'2017-12-19',17,22,6,5,NULL),(145,15,'2017-12-19',21,18,7,6,NULL),(146,15,'2017-12-19',4,2,3,1,NULL),(147,15,'2017-12-19',9,8,6,6,NULL),(148,15,'2017-12-19',10,3,1,2,NULL),(149,15,'2017-12-19',11,23,2,2,NULL),(150,15,'2017-12-19',19,6,1,1,NULL),(151,16,'2017-12-19',9,1,0,3,NULL),(152,16,'2017-12-19',21,16,0,1,NULL),(153,16,'2017-12-19',23,14,3,1,NULL),(154,16,'2017-12-19',22,19,4,3,NULL),(155,16,'2017-12-19',4,17,3,4,NULL),(156,16,'2017-12-19',2,20,2,0,NULL),(157,16,'2017-12-19',8,5,6,4,NULL),(158,16,'2017-12-19',11,3,2,1,NULL),(159,16,'2017-12-19',10,18,6,1,NULL),(160,16,'2017-12-19',6,13,1,1,NULL),(161,17,'2017-12-19',16,17,1,0,NULL),(162,17,'2017-12-19',23,5,1,0,NULL),(163,17,'2017-12-19',20,18,2,1,NULL),(164,17,'2017-12-19',14,19,2,0,NULL),(165,17,'2017-12-19',6,1,2,3,NULL),(166,17,'2017-12-19',8,13,2,3,NULL),(167,17,'2017-12-19',21,22,0,0,NULL),(168,17,'2017-12-19',9,4,0,1,NULL),(169,17,'2017-12-19',11,3,6,0,NULL),(170,17,'2017-12-19',10,2,3,3,NULL),(171,18,'2017-12-19',17,11,3,2,NULL),(172,18,'2017-12-19',9,10,7,5,NULL),(173,18,'2017-12-19',22,1,3,5,NULL),(174,18,'2017-12-19',5,3,5,4,NULL),(175,18,'2017-12-19',20,23,5,8,NULL),(176,18,'2017-12-19',16,6,3,1,NULL),(177,18,'2017-12-19',13,4,3,1,NULL),(178,18,'2017-12-19',14,2,1,2,NULL),(179,18,'2017-12-19',19,21,0,2,NULL),(180,18,'2017-12-19',8,18,1,2,NULL),(181,19,'2018-02-21',20,17,3,1,NULL),(182,19,'2018-02-21',1,2,5,4,NULL),(183,19,'2018-02-21',21,11,3,2,NULL),(184,19,'2018-02-21',14,3,3,2,NULL),(185,19,'2018-02-21',5,18,6,2,NULL),(186,19,'2018-02-21',10,16,2,3,NULL),(187,19,'2018-02-21',23,8,1,1,NULL),(188,19,'2018-02-21',4,13,1,2,NULL),(189,19,'2018-02-21',6,19,2,5,NULL),(190,19,'2018-02-21',22,9,4,2,NULL),(191,20,'2018-02-21',5,13,6,0,NULL),(192,20,'2018-02-21',20,3,4,5,NULL),(193,20,'2018-02-21',8,1,2,2,NULL),(194,20,'2018-02-21',4,11,2,2,NULL),(195,20,'2018-02-21',16,19,2,1,NULL),(196,20,'2018-02-21',22,21,7,2,NULL),(197,20,'2018-02-21',2,6,3,1,NULL),(198,20,'2018-02-21',14,18,3,4,NULL),(199,20,'2018-02-21',17,23,5,2,NULL),(200,20,'2018-02-21',9,10,2,2,NULL),(201,21,'2018-02-21',14,1,1,2,NULL),(202,21,'2018-02-21',8,6,2,1,NULL),(203,21,'2018-02-21',22,11,5,2,NULL),(204,21,'2018-02-21',10,9,5,4,NULL),(205,21,'2018-02-21',2,3,2,1,NULL),(206,21,'2018-02-21',21,16,3,2,NULL),(207,21,'2018-02-21',4,19,3,4,NULL),(208,21,'2018-02-21',20,5,4,0,NULL),(209,21,'2018-02-21',23,13,1,3,NULL),(210,21,'2018-02-21',18,17,1,1,NULL),(211,22,'2018-02-21',1,16,3,0,NULL),(212,22,'2018-02-21',8,2,5,0,NULL),(213,22,'2018-02-21',20,21,6,6,NULL),(214,22,'2018-02-21',14,19,7,4,NULL),(215,22,'2018-02-21',4,6,5,2,NULL),(216,22,'2018-02-21',10,13,4,3,NULL),(217,22,'2018-02-21',3,17,6,3,NULL),(218,22,'2018-02-21',11,23,6,0,NULL),(219,22,'2018-02-21',9,22,6,0,NULL),(220,22,'2018-02-21',5,18,4,2,NULL),(221,23,'2018-02-21',16,6,6,3,NULL),(222,23,'2018-02-21',19,23,7,2,NULL),(223,23,'2018-02-21',4,2,9,2,NULL),(224,23,'2018-02-21',14,18,6,2,NULL),(225,23,'2018-02-21',8,21,3,1,NULL),(226,23,'2018-02-21',20,13,3,1,NULL),(227,23,'2018-02-21',5,1,6,8,NULL),(228,23,'2018-02-21',22,3,7,3,NULL),(229,23,'2018-02-21',17,9,3,3,NULL),(230,23,'2018-02-21',10,11,5,0,NULL),(231,24,'2018-03-19',21,1,3,6,NULL),(232,24,'2018-03-19',6,5,0,0,NULL),(233,24,'2018-03-19',23,16,0,1,NULL),(234,24,'2018-03-19',2,19,2,1,NULL),(235,24,'2018-03-19',14,22,3,1,NULL),(236,24,'2018-03-19',20,13,3,1,NULL),(237,24,'2018-03-19',4,8,6,3,NULL),(238,24,'2018-03-19',9,18,6,2,NULL),(239,24,'2018-03-19',10,17,6,4,NULL),(240,24,'2018-03-19',11,3,9,4,NULL),(241,25,'2018-03-19',19,20,6,0,NULL),(242,25,'2018-03-19',18,4,7,1,NULL),(243,25,'2018-03-19',23,21,7,1,NULL),(244,25,'2018-03-19',14,17,6,2,NULL),(245,25,'2018-03-19',9,13,4,4,NULL),(246,25,'2018-03-19',8,1,6,3,NULL),(247,25,'2018-03-19',2,6,4,4,NULL),(248,25,'2018-03-19',22,3,6,6,NULL),(249,25,'2018-03-19',16,10,5,3,NULL),(250,25,'2018-03-19',5,11,4,3,NULL),(251,26,'2018-03-19',18,20,5,3,NULL),(252,26,'2018-03-19',1,2,1,3,NULL),(253,26,'2018-03-19',8,3,3,2,NULL),(254,26,'2018-03-19',21,6,2,2,NULL),(255,26,'2018-03-19',11,16,6,1,NULL),(256,26,'2018-03-19',4,5,7,1,NULL),(257,26,'2018-03-19',22,19,0,0,NULL),(258,26,'2018-03-19',23,17,10,0,NULL),(259,26,'2018-03-19',9,14,5,1,NULL),(260,26,'2018-03-19',10,13,5,2,NULL),(261,27,'2018-03-19',16,19,7,2,NULL),(262,27,'2018-03-19',1,3,3,1,NULL),(263,27,'2018-03-19',13,2,2,1,NULL),(264,27,'2018-03-19',22,6,6,0,NULL),(265,27,'2018-03-19',8,14,8,1,NULL),(266,27,'2018-03-19',4,18,5,8,NULL),(267,27,'2018-03-19',17,9,7,0,NULL),(268,27,'2018-03-19',11,21,5,0,NULL),(269,27,'2018-03-19',10,23,3,1,NULL),(270,27,'2018-03-19',20,5,3,1,NULL),(271,28,'2018-03-19',17,22,4,0,NULL),(272,28,'2018-03-19',21,18,4,2,NULL),(273,28,'2018-03-19',11,4,6,0,NULL),(274,28,'2018-03-19',23,14,4,4,NULL),(275,28,'2018-03-19',10,16,7,3,NULL),(276,28,'2018-03-19',5,19,7,5,NULL),(277,28,'2018-03-19',20,2,4,0,NULL),(278,28,'2018-03-19',3,13,7,1,NULL),(279,28,'2018-03-19',9,6,6,4,NULL),(280,28,'2018-03-19',8,1,0,0,NULL),(281,29,'2018-03-19',11,14,6,0,NULL),(282,29,'2018-03-19',4,5,7,0,NULL),(283,29,'2018-03-19',13,23,6,1,NULL),(284,29,'2018-03-19',8,21,6,0,NULL),(285,29,'2018-03-19',22,2,5,0,NULL),(286,29,'2018-03-19',9,18,6,0,NULL),(287,29,'2018-03-19',17,16,7,3,NULL),(288,29,'2018-03-19',19,6,2,1,NULL),(289,29,'2018-03-19',10,3,7,0,NULL),(290,29,'2018-03-19',20,1,2,1,NULL),(291,30,'2018-03-19',19,18,5,1,NULL),(292,30,'2018-03-19',14,21,5,1,NULL),(293,30,'2018-03-19',22,8,3,4,NULL),(294,30,'2018-03-19',4,20,3,1,NULL),(295,30,'2018-03-19',9,13,1,0,NULL),(296,30,'2018-03-19',10,23,6,6,NULL),(297,30,'2018-03-19',17,1,3,0,NULL),(298,30,'2018-03-19',11,6,3,1,NULL),(299,30,'2018-03-19',5,2,2,0,NULL),(300,30,'2018-03-19',16,3,5,4,NULL),(301,31,'2018-03-19',13,17,4,5,NULL),(302,31,'2018-03-19',4,14,4,5,NULL),(303,31,'2018-03-19',22,18,5,1,NULL),(304,31,'2018-03-19',8,19,4,2,NULL),(305,31,'2018-03-19',23,21,1,1,NULL),(306,31,'2018-03-19',2,16,4,4,NULL),(307,31,'2018-03-19',11,10,4,5,NULL),(308,31,'2018-03-19',3,5,1,3,NULL),(309,31,'2018-03-19',1,6,6,1,NULL),(310,31,'2018-03-19',20,9,5,1,NULL),(311,32,'2018-03-19',1,5,3,1,NULL),(312,32,'2018-03-19',10,16,7,3,NULL),(313,32,'2018-03-19',2,6,3,0,NULL),(314,32,'2018-03-19',11,17,3,2,NULL),(315,32,'2018-03-19',21,22,3,1,NULL),(316,32,'2018-03-19',23,18,0,3,NULL),(317,32,'2018-03-19',3,8,4,1,NULL),(318,32,'2018-03-19',13,19,0,3,NULL),(319,32,'2018-03-19',4,9,4,1,NULL),(320,32,'2018-03-19',14,20,1,5,NULL),(321,33,'2018-03-19',1,2,2,2,NULL),(322,33,'2018-03-19',21,3,4,1,NULL),(323,33,'2018-03-19',4,5,2,3,NULL),(324,33,'2018-03-19',6,22,3,1,NULL),(325,33,'2018-03-19',8,9,1,1,NULL),(326,33,'2018-03-19',11,10,2,4,NULL),(327,33,'2018-03-19',23,13,3,1,NULL),(328,33,'2018-03-19',14,16,5,1,NULL),(329,33,'2018-03-19',17,18,4,2,NULL),(330,33,'2018-03-19',19,20,4,5,NULL),(331,34,'2018-03-19',1,6,7,2,NULL),(332,34,'2018-03-19',23,19,2,0,NULL),(333,34,'2018-03-19',2,22,4,1,NULL),(334,34,'2018-03-19',13,20,2,1,NULL),(335,34,'2018-03-19',8,21,5,3,NULL),(336,34,'2018-03-19',14,3,6,0,NULL),(337,34,'2018-03-19',9,4,5,4,NULL),(338,34,'2018-03-19',11,5,1,3,NULL),(339,34,'2018-03-19',10,18,5,3,NULL),(340,34,'2018-03-19',17,16,2,1,NULL),(341,35,'2018-03-19',22,4,7,2,NULL),(342,35,'2018-03-19',5,19,5,5,NULL),(343,35,'2018-03-19',13,17,5,0,NULL),(344,35,'2018-03-19',21,8,1,0,NULL),(345,35,'2018-03-19',3,1,4,1,NULL),(346,35,'2018-03-19',9,2,4,2,NULL),(347,35,'2018-03-19',10,20,3,1,NULL),(348,35,'2018-03-19',11,6,6,3,NULL),(349,35,'2018-03-19',23,14,6,2,NULL),(350,35,'2018-03-19',18,16,2,4,NULL),(351,36,'2018-03-19',20,6,4,2,NULL),(352,36,'2018-03-19',22,17,3,0,NULL),(353,36,'2018-03-19',21,18,1,1,NULL),(354,36,'2018-03-19',4,14,2,2,NULL),(355,36,'2018-03-19',11,2,3,1,NULL),(356,36,'2018-03-19',5,19,5,2,NULL),(357,36,'2018-03-19',3,13,2,2,NULL),(358,36,'2018-03-19',23,1,2,0,NULL),(359,36,'2018-03-19',8,16,2,2,NULL),(360,36,'2018-03-19',10,9,7,4,NULL),(361,37,'2018-03-20',20,19,4,3,NULL),(362,37,'2018-03-20',21,4,5,5,NULL),(363,37,'2018-03-20',5,18,6,2,NULL),(364,37,'2018-03-20',9,16,9,3,NULL),(365,37,'2018-03-20',1,14,6,2,NULL),(366,37,'2018-03-20',13,22,3,0,NULL),(367,37,'2018-03-20',10,23,0,2,NULL),(368,37,'2018-03-20',11,3,3,3,NULL),(369,37,'2018-03-20',8,6,4,0,NULL),(370,37,'2018-03-20',17,2,2,2,NULL),(371,38,'2018-03-27',16,14,5,2,NULL),(372,38,'2018-03-27',1,13,5,4,NULL),(373,38,'2018-03-27',22,3,5,3,NULL),(374,38,'2018-03-27',8,20,7,0,NULL),(375,38,'2018-03-27',10,4,2,2,NULL),(376,38,'2018-03-27',9,21,5,1,NULL),(377,38,'2018-03-27',11,18,1,0,NULL),(378,38,'2018-03-27',19,17,4,1,NULL),(379,38,'2018-03-27',23,5,3,0,NULL),(380,38,'2018-03-27',6,2,6,0,NULL);
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek13`
--

DROP TABLE IF EXISTS `tableWeek13`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek13` (
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
-- Dumping data for table `tableWeek13`
--

LOCK TABLES `tableWeek13` WRITE;
/*!40000 ALTER TABLE `tableWeek13` DISABLE KEYS */;
INSERT INTO `tableWeek13` VALUES (1,2,'Liverpool',13,8,4,1,47,31,16,28),(2,1,'Manchester United',13,8,1,4,52,33,19,25),(3,4,'Newcastle United',13,7,3,3,40,25,15,24),(4,6,'Leicester City',13,6,4,3,45,31,14,22),(5,3,'Southampton',13,7,1,5,49,35,14,22),(6,7,'Manchester City',13,6,4,3,40,30,10,22),(7,9,'Tottenham Hotspur',13,6,3,4,45,36,9,21),(8,11,'Watford',13,7,0,6,35,40,-5,21),(9,5,'Burnley',13,6,2,5,34,35,-1,20),(10,8,'West Bromwich Albion',13,6,1,6,39,38,1,19),(11,10,'Brighton & Hove Albion',13,6,1,6,31,34,-3,19),(12,17,'Bournemouth',13,4,4,5,36,40,-4,16),(13,12,'Chelsea',13,5,1,7,48,52,-4,16),(14,18,'Swansea City',13,5,1,7,32,42,-10,16),(15,16,'Crystal Palace',13,4,3,6,29,42,-13,15),(16,13,'Arsenal',13,4,2,7,30,35,-5,14),(17,14,'Everton',13,4,2,7,36,41,-5,14),(18,15,'Huddersfield',13,4,2,7,36,51,-15,14),(19,19,'Stoke City',13,4,0,9,39,54,-15,12),(20,20,'West Ham',13,3,1,9,33,51,-18,10);
/*!40000 ALTER TABLE `tableWeek13` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek14`
--

DROP TABLE IF EXISTS `tableWeek14`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek14` (
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
-- Dumping data for table `tableWeek14`
--

LOCK TABLES `tableWeek14` WRITE;
/*!40000 ALTER TABLE `tableWeek14` DISABLE KEYS */;
INSERT INTO `tableWeek14` VALUES (1,1,'Liverpool',14,9,4,1,52,33,19,31),(2,2,'Manchester United',14,9,1,4,57,35,22,28),(3,5,'Southampton',14,8,1,5,53,35,18,25),(4,3,'Newcastle United',14,7,3,4,42,29,13,24),(5,4,'Leicester City',14,6,5,3,48,34,14,23),(6,6,'Manchester City',14,6,5,3,43,33,10,23),(7,9,'Burnley',14,7,2,5,38,37,1,23),(8,7,'Tottenham Hotspur',14,6,3,5,47,41,6,21),(9,8,'Watford',14,7,0,7,36,45,-9,21),(10,10,'West Bromwich Albion',14,6,1,7,41,43,-2,19),(11,11,'Brighton & Hove Albion',14,6,1,7,32,37,-5,19),(12,14,'Swansea City',14,6,1,7,37,43,-6,19),(13,17,'Everton',14,5,2,7,39,42,-3,17),(14,12,'Bournemouth',14,4,5,5,38,42,-4,17),(15,13,'Chelsea',14,5,2,7,50,54,-4,17),(16,18,'Huddersfield',14,5,2,7,40,51,-11,17),(17,15,'Crystal Palace',14,4,4,6,31,44,-13,16),(18,16,'Arsenal',14,4,3,7,32,37,-5,15),(19,19,'Stoke City',14,4,0,10,39,58,-19,12),(20,20,'West Ham',14,3,1,10,33,55,-22,10);
/*!40000 ALTER TABLE `tableWeek14` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek15`
--

DROP TABLE IF EXISTS `tableWeek15`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek15` (
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
-- Dumping data for table `tableWeek15`
--

LOCK TABLES `tableWeek15` WRITE;
/*!40000 ALTER TABLE `tableWeek15` DISABLE KEYS */;
INSERT INTO `tableWeek15` VALUES (1,1,'Liverpool',15,9,5,1,58,39,19,32),(2,2,'Manchester United',15,9,2,4,59,37,22,29),(3,3,'Southampton',15,9,1,5,58,37,21,28),(4,7,'Burnley',15,8,2,5,40,38,2,26),(5,4,'Newcastle United',15,7,4,4,44,31,13,25),(6,5,'Leicester City',15,6,6,3,54,40,14,24),(7,8,'Tottenham Hotspur',15,7,3,5,53,46,7,24),(8,6,'Manchester City',15,6,5,4,44,35,9,23),(9,11,'Brighton & Hove Albion',15,7,1,7,39,43,-4,22),(10,9,'Watford',15,7,0,8,42,52,-10,21),(11,10,'West Bromwich Albion',15,6,2,7,42,44,-2,20),(12,15,'Chelsea',15,6,2,7,53,55,-2,20),(13,12,'Swansea City',15,6,2,7,39,45,-6,20),(14,13,'Everton',15,5,3,7,40,43,-3,18),(15,14,'Bournemouth',15,4,5,6,39,45,-6,17),(16,16,'Huddersfield',15,5,2,8,45,57,-12,17),(17,17,'Crystal Palace',15,4,5,6,33,46,-13,17),(18,18,'Arsenal',15,4,3,8,34,42,-8,15),(19,19,'Stoke City',15,5,0,10,43,61,-18,15),(20,20,'West Ham',15,3,1,11,36,59,-23,10);
/*!40000 ALTER TABLE `tableWeek15` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek16`
--

DROP TABLE IF EXISTS `tableWeek16`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek16` (
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
-- Dumping data for table `tableWeek16`
--

LOCK TABLES `tableWeek16` WRITE;
/*!40000 ALTER TABLE `tableWeek16` DISABLE KEYS */;
INSERT INTO `tableWeek16` VALUES (1,2,'Manchester United',16,10,2,4,61,38,23,32),(2,1,'Liverpool',16,9,5,2,58,42,16,32),(3,3,'Southampton',16,9,2,5,59,38,21,29),(4,5,'Newcastle United',16,8,4,4,47,32,15,28),(5,6,'Leicester City',16,7,6,3,60,44,16,27),(6,7,'Tottenham Hotspur',16,8,3,5,57,49,8,27),(7,8,'Manchester City',16,7,5,4,50,36,14,26),(8,4,'Burnley',16,8,2,6,41,40,1,26),(9,13,'Swansea City',16,7,2,7,40,45,-5,23),(10,9,'Brighton & Hove Albion',16,7,1,8,39,44,-5,22),(11,10,'Watford',16,7,0,9,43,58,-15,21),(12,11,'West Bromwich Albion',16,6,2,8,45,48,-3,20),(13,12,'Chelsea',16,6,2,8,56,59,-3,20),(14,15,'Bournemouth',16,5,5,6,41,45,-4,20),(15,16,'Huddersfield',16,6,2,8,49,60,-11,20),(16,14,'Everton',16,5,4,7,41,44,-3,19),(17,18,'Arsenal',16,5,3,8,37,42,-5,18),(18,17,'Crystal Palace',16,4,5,7,37,52,-15,17),(19,19,'Stoke City',16,5,0,11,44,64,-20,15),(20,20,'West Ham',16,3,1,12,36,61,-25,10);
/*!40000 ALTER TABLE `tableWeek16` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek17`
--

DROP TABLE IF EXISTS `tableWeek17`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek17` (
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
-- Dumping data for table `tableWeek17`
--

LOCK TABLES `tableWeek17` WRITE;
/*!40000 ALTER TABLE `tableWeek17` DISABLE KEYS */;
INSERT INTO `tableWeek17` VALUES (1,1,'Manchester United',17,11,2,4,67,38,29,35),(2,3,'Southampton',17,10,2,5,62,40,22,32),(3,2,'Liverpool',17,9,5,3,58,43,15,32),(4,4,'Newcastle United',17,9,4,4,48,32,16,31),(5,5,'Leicester City',17,7,6,4,62,47,15,27),(6,7,'Manchester City',17,7,6,4,53,39,14,27),(7,6,'Tottenham Hotspur',17,8,3,6,57,50,7,27),(8,9,'Swansea City',17,8,2,7,41,45,-4,26),(9,8,'Burnley',17,8,2,7,41,46,-5,26),(10,13,'Chelsea',17,7,2,8,57,59,-2,23),(11,10,'Brighton & Hove Albion',17,7,2,8,39,44,-5,23),(12,17,'Arsenal',17,6,3,8,40,44,-4,21),(13,14,'Bournemouth',17,5,6,6,44,48,-4,21),(14,15,'Huddersfield',17,6,3,8,49,60,-11,21),(15,11,'Watford',17,7,0,10,44,60,-16,21),(16,12,'West Bromwich Albion',17,6,2,9,45,50,-5,20),(17,16,'Everton',17,5,4,8,43,47,-4,19),(18,19,'Stoke City',17,6,0,11,46,64,-18,18),(19,18,'Crystal Palace',17,4,5,8,37,53,-16,17),(20,20,'West Ham',17,4,1,12,38,62,-24,13);
/*!40000 ALTER TABLE `tableWeek17` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek18`
--

DROP TABLE IF EXISTS `tableWeek18`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek18` (
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
-- Dumping data for table `tableWeek18`
--

LOCK TABLES `tableWeek18` WRITE;
/*!40000 ALTER TABLE `tableWeek18` DISABLE KEYS */;
INSERT INTO `tableWeek18` VALUES (1,1,'Manchester United',18,11,2,5,69,41,28,35),(2,2,'Southampton',18,11,2,5,65,41,24,35),(3,3,'Liverpool',18,10,5,3,65,48,17,35),(4,4,'Newcastle United',18,10,4,4,56,37,19,34),(5,7,'Tottenham Hotspur',18,9,3,6,60,52,8,30),(6,8,'Swansea City',18,9,2,7,44,46,-2,29),(7,5,'Leicester City',18,7,6,5,63,49,14,27),(8,6,'Manchester City',18,7,6,5,58,46,12,27),(9,11,'Brighton & Hove Albion',18,8,2,8,41,44,-3,26),(10,9,'Burnley',18,8,2,8,45,51,-6,26),(11,12,'Arsenal',18,7,3,8,45,47,-2,24),(12,13,'Bournemouth',18,6,6,6,46,49,-3,24),(13,15,'Watford',18,8,0,10,46,61,-15,24),(14,10,'Chelsea',18,7,2,9,58,62,-4,23),(15,14,'Huddersfield',18,6,3,9,52,65,-13,21),(16,16,'West Bromwich Albion',18,6,2,10,45,52,-7,20),(17,19,'Crystal Palace',18,5,5,8,42,57,-15,20),(18,17,'Everton',18,5,4,9,44,50,-6,19),(19,18,'Stoke City',18,6,0,12,47,66,-19,18),(20,20,'West Ham',18,4,1,13,43,70,-27,13);
/*!40000 ALTER TABLE `tableWeek18` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek19`
--

DROP TABLE IF EXISTS `tableWeek19`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek19` (
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
-- Dumping data for table `tableWeek19`
--

LOCK TABLES `tableWeek19` WRITE;
/*!40000 ALTER TABLE `tableWeek19` DISABLE KEYS */;
INSERT INTO `tableWeek19` VALUES (1,2,'Southampton',19,12,2,5,67,42,25,38),(2,1,'Manchester United',19,11,2,6,71,44,27,35),(3,4,'Newcastle United',19,10,5,4,57,38,19,35),(4,3,'Liverpool',19,10,5,4,67,52,15,35),(5,6,'Swansea City',19,10,2,7,47,48,-1,32),(6,5,'Tottenham Hotspur',19,9,3,7,61,55,6,30),(7,9,'Brighton & Hove Albion',19,9,2,8,44,46,-2,29),(8,7,'Leicester City',19,7,7,5,64,50,14,28),(9,8,'Manchester City',19,7,6,6,60,49,11,27),(10,11,'Arsenal',19,8,3,8,50,51,-1,27),(11,10,'Burnley',19,8,2,9,47,54,-7,26),(12,12,'Bournemouth',19,6,6,7,50,54,-4,24),(13,15,'Huddersfield',19,7,3,9,56,67,-11,24),(14,13,'Watford',19,8,0,11,48,67,-19,24),(15,16,'West Bromwich Albion',19,7,2,10,50,54,-4,23),(16,14,'Chelsea',19,7,2,10,59,64,-5,23),(17,17,'Crystal Palace',19,6,5,8,48,59,-11,23),(18,19,'Stoke City',19,7,0,12,50,68,-18,21),(19,18,'Everton',19,5,4,10,46,55,-9,19),(20,20,'West Ham',19,5,1,13,46,71,-25,16);
/*!40000 ALTER TABLE `tableWeek19` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek1_old`
--

DROP TABLE IF EXISTS `tableWeek1_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek1_old` (
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
-- Dumping data for table `tableWeek1_old`
--

LOCK TABLES `tableWeek1_old` WRITE;
/*!40000 ALTER TABLE `tableWeek1_old` DISABLE KEYS */;
INSERT INTO `tableWeek1_old` VALUES (1,'-','Manchester City',1,1,0,0,4,0,4,3),(2,'-','Chelsea',1,1,0,0,5,1,4,3),(3,'-','Leicester City',1,1,0,0,3,0,3,3),(4,'-','Bournemouth',1,1,0,0,2,0,2,3),(5,'-','Stoke City',1,1,0,0,1,0,1,3),(6,'-','Hull City',1,1,0,0,4,3,1,3),(7,'-','Tottenham Hotspur',1,1,0,0,4,3,1,3),(8,'-','Burnley',1,0,1,0,1,1,0,1),(9,'-','West Bromwich Albion',1,0,1,0,1,1,0,1),(10,'-','Liverpool',1,0,1,0,3,3,0,1),(11,'-','Middlesbrough',1,0,1,0,3,3,0,1),(12,'-','Manchester United',1,0,1,0,5,5,0,1),(13,'-','West Ham',1,0,1,0,5,5,0,1),(14,'-','Southampton',1,0,0,1,0,1,-1,0),(15,'-','Arsenal',1,0,0,1,3,4,-1,0),(16,'-','Swansea City',1,0,0,1,3,4,-1,0),(17,'-','Crystal Palace',1,0,0,1,0,2,-2,0),(18,'-','Sunderland',1,0,0,1,0,3,-3,0),(19,'-','Watford',1,0,0,1,0,4,-4,0),(20,'-','Everton',1,0,0,1,1,5,-4,0);
/*!40000 ALTER TABLE `tableWeek1_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek20`
--

DROP TABLE IF EXISTS `tableWeek20`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek20` (
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
-- Dumping data for table `tableWeek20`
--

LOCK TABLES `tableWeek20` WRITE;
/*!40000 ALTER TABLE `tableWeek20` DISABLE KEYS */;
INSERT INTO `tableWeek20` VALUES (1,1,'Southampton',20,12,2,6,67,48,19,38),(2,2,'Manchester United',20,11,3,6,73,46,27,36),(3,4,'Liverpool',20,10,6,4,69,54,15,36),(4,3,'Newcastle United',20,10,5,5,59,43,16,35),(5,5,'Swansea City',20,11,2,7,49,49,0,35),(6,6,'Tottenham Hotspur',20,10,3,7,66,57,9,33),(7,8,'Leicester City',20,7,8,5,66,52,14,29),(8,11,'Burnley',20,9,2,9,52,58,-6,29),(9,7,'Brighton & Hove Albion',20,9,2,9,46,53,-7,29),(10,9,'Manchester City',20,7,7,6,62,51,11,28),(11,10,'Arsenal',20,8,4,8,52,53,-1,28),(12,12,'Bournemouth',20,7,6,7,53,55,-2,27),(13,13,'Huddersfield',20,8,3,9,63,69,-6,27),(14,14,'Watford',20,9,0,11,52,70,-18,27),(15,17,'Crystal Palace',20,7,5,8,54,59,-5,26),(16,16,'Chelsea',20,7,3,10,61,66,-5,24),(17,15,'West Bromwich Albion',20,7,2,11,51,56,-5,23),(18,18,'Stoke City',20,7,0,13,53,72,-19,21),(19,19,'Everton',20,5,4,11,47,58,-11,19),(20,20,'West Ham',20,5,1,14,50,76,-26,16);
/*!40000 ALTER TABLE `tableWeek20` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek21`
--

DROP TABLE IF EXISTS `tableWeek21`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek21` (
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
-- Dumping data for table `tableWeek21`
--

LOCK TABLES `tableWeek21` WRITE;
/*!40000 ALTER TABLE `tableWeek21` DISABLE KEYS */;
INSERT INTO `tableWeek21` VALUES (1,1,'Southampton',21,13,2,6,70,49,21,41),(2,2,'Manchester United',21,11,3,7,75,51,24,36),(3,3,'Liverpool',21,10,6,5,73,59,14,36),(4,4,'Newcastle United',21,10,5,6,60,46,14,35),(5,5,'Swansea City',21,11,2,8,51,52,-1,35),(6,6,'Tottenham Hotspur',21,10,4,7,67,58,9,34),(7,7,'Leicester City',21,8,8,5,68,53,15,32),(8,9,'Brighton & Hove Albion',21,10,2,9,49,55,-6,32),(9,10,'Manchester City',21,8,7,6,67,55,12,31),(10,11,'Arsenal',21,9,4,8,54,54,0,31),(11,12,'Bournemouth',21,8,6,7,55,56,-1,30),(12,13,'Huddersfield',21,9,3,9,68,71,-3,30),(13,8,'Burnley',21,9,2,10,53,60,-7,29),(14,14,'Watford',21,9,1,11,53,71,-18,28),(15,17,'West Bromwich Albion',21,8,2,11,55,59,-4,26),(16,15,'Crystal Palace',21,7,5,9,54,63,-9,26),(17,16,'Chelsea',21,7,3,11,64,70,-6,24),(18,18,'Stoke City',21,7,0,14,54,74,-20,21),(19,19,'Everton',21,5,4,12,48,60,-12,19),(20,20,'West Ham',21,6,1,14,54,76,-22,19);
/*!40000 ALTER TABLE `tableWeek21` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek22`
--

DROP TABLE IF EXISTS `tableWeek22`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek22` (
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
-- Dumping data for table `tableWeek22`
--

LOCK TABLES `tableWeek22` WRITE;
/*!40000 ALTER TABLE `tableWeek22` DISABLE KEYS */;
INSERT INTO `tableWeek22` VALUES (1,1,'Southampton',22,13,2,7,73,53,20,41),(2,2,'Manchester United',22,12,3,7,81,51,30,39),(3,3,'Liverpool',22,11,6,5,79,59,20,39),(4,7,'Leicester City',22,9,8,5,73,53,20,35),(5,4,'Newcastle United',22,10,5,7,60,52,8,35),(6,5,'Swansea City',22,11,2,9,51,55,-4,35),(7,9,'Manchester City',22,9,7,6,71,58,13,34),(8,6,'Tottenham Hotspur',22,10,4,8,70,64,6,34),(9,10,'Arsenal',22,10,4,8,57,54,3,34),(10,8,'Brighton & Hove Albion',22,10,3,9,55,61,-6,33),(11,13,'Burnley',22,10,2,10,59,63,-4,32),(12,11,'Bournemouth',22,8,6,8,55,61,-6,30),(13,12,'Huddersfield',22,9,3,10,68,77,-9,30),(14,16,'Crystal Palace',22,8,5,9,58,65,-7,29),(15,14,'Watford',22,9,1,12,55,75,-20,28),(16,17,'Chelsea',22,8,3,11,69,72,-3,27),(17,15,'West Bromwich Albion',22,8,2,12,59,66,-7,26),(18,18,'Stoke City',22,8,0,14,61,78,-17,24),(19,20,'West Ham',22,6,2,14,60,82,-22,20),(20,19,'Everton',22,5,4,13,50,65,-15,19);
/*!40000 ALTER TABLE `tableWeek22` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek23`
--

DROP TABLE IF EXISTS `tableWeek23`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek23` (
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
-- Dumping data for table `tableWeek23`
--

LOCK TABLES `tableWeek23` WRITE;
/*!40000 ALTER TABLE `tableWeek23` DISABLE KEYS */;
INSERT INTO `tableWeek23` VALUES (1,1,'Southampton',23,13,2,8,74,56,18,41),(2,3,'Liverpool',23,11,7,5,82,62,20,40),(3,2,'Manchester United',23,12,3,8,81,56,25,39),(4,4,'Leicester City',23,10,8,5,76,54,22,38),(5,6,'Swansea City',23,12,2,9,57,58,-1,38),(6,7,'Manchester City',23,10,7,6,76,58,18,37),(7,9,'Arsenal',23,11,4,8,65,60,5,37),(8,8,'Tottenham Hotspur',23,10,5,8,73,67,6,35),(9,5,'Newcastle United',23,10,5,8,62,59,3,35),(10,13,'Huddersfield',23,10,3,10,75,80,-5,33),(11,10,'Brighton & Hove Albion',23,10,3,10,56,64,-8,33),(12,11,'Burnley',23,10,2,11,62,70,-8,32),(13,16,'Chelsea',23,9,3,11,78,74,4,30),(14,12,'Bournemouth',23,8,6,9,57,70,-13,30),(15,17,'West Bromwich Albion',23,9,2,12,66,68,-2,29),(16,14,'Crystal Palace',23,8,5,10,64,73,-9,29),(17,15,'Watford',23,9,1,13,57,81,-24,28),(18,18,'Stoke City',23,9,0,14,67,80,-13,27),(19,19,'West Ham',23,7,2,14,63,83,-20,23),(20,20,'Everton',23,5,4,14,53,71,-18,19);
/*!40000 ALTER TABLE `tableWeek23` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek24`
--

DROP TABLE IF EXISTS `tableWeek24`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek24` (
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
-- Dumping data for table `tableWeek24`
--

LOCK TABLES `tableWeek24` WRITE;
/*!40000 ALTER TABLE `tableWeek24` DISABLE KEYS */;
INSERT INTO `tableWeek24` VALUES (1,2,'Liverpool',24,12,7,5,88,64,24,43),(2,3,'Manchester United',24,13,3,8,90,60,30,42),(3,1,'Southampton',24,13,2,9,75,59,16,41),(4,5,'Swansea City',24,13,2,9,58,58,0,41),(5,6,'Manchester City',24,11,7,6,82,62,20,40),(6,7,'Arsenal',24,12,4,8,71,63,8,40),(7,4,'Leicester City',24,10,8,6,79,60,19,38),(8,8,'Tottenham Hotspur',24,10,5,9,77,73,4,35),(9,9,'Newcastle United',24,10,5,9,62,60,2,35),(10,13,'Chelsea',24,10,3,11,84,77,7,33),(11,10,'Huddersfield',24,10,3,11,76,83,-7,33),(12,11,'Brighton & Hove Albion',24,10,3,11,59,70,-11,33),(13,14,'Bournemouth',24,9,6,9,59,71,-12,33),(14,12,'Burnley',24,10,2,12,66,79,-13,32),(15,16,'Crystal Palace',24,8,6,10,64,73,-9,30),(16,18,'Stoke City',24,10,0,14,70,81,-11,30),(17,15,'West Bromwich Albion',24,9,2,13,67,70,-3,29),(18,17,'Watford',24,9,1,14,59,87,-28,28),(19,19,'West Ham',24,8,2,14,66,84,-18,26),(20,20,'Everton',24,5,5,14,53,71,-18,20);
/*!40000 ALTER TABLE `tableWeek24` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek25`
--

DROP TABLE IF EXISTS `tableWeek25`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek25` (
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
-- Dumping data for table `tableWeek25`
--

LOCK TABLES `tableWeek25` WRITE;
/*!40000 ALTER TABLE `tableWeek25` DISABLE KEYS */;
INSERT INTO `tableWeek25` VALUES (1,1,'Liverpool',25,12,8,5,92,68,24,44),(2,4,'Swansea City',25,14,2,9,63,61,2,44),(3,2,'Manchester United',25,13,3,9,93,64,29,42),(4,3,'Southampton',25,13,3,9,79,63,16,42),(5,7,'Leicester City',25,11,8,6,85,63,22,41),(6,5,'Manchester City',25,11,7,7,85,67,18,40),(7,6,'Arsenal',25,12,4,9,74,69,5,40),(8,9,'Newcastle United',25,11,5,9,69,61,8,38),(9,8,'Tottenham Hotspur',25,10,5,10,79,79,0,35),(10,11,'Huddersfield',25,10,4,11,82,89,-7,34),(11,13,'Bournemouth',25,9,7,9,63,75,-12,34),(12,10,'Chelsea',25,10,3,12,85,84,1,33),(13,16,'Stoke City',25,11,0,14,76,83,-7,33),(14,15,'Crystal Palace',25,9,6,10,68,76,-8,33),(15,14,'Burnley',25,10,3,12,72,85,-13,33),(16,12,'Brighton & Hove Albion',25,10,3,12,60,77,-17,33),(17,17,'West Bromwich Albion',25,10,2,13,73,70,3,32),(18,18,'Watford',25,10,1,14,66,88,-22,31),(19,19,'West Ham',25,8,2,15,66,90,-24,26),(20,20,'Everton',25,5,6,14,57,75,-18,21);
/*!40000 ALTER TABLE `tableWeek25` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek26`
--

DROP TABLE IF EXISTS `tableWeek26`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek26` (
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
-- Dumping data for table `tableWeek26`
--

LOCK TABLES `tableWeek26` WRITE;
/*!40000 ALTER TABLE `tableWeek26` DISABLE KEYS */;
INSERT INTO `tableWeek26` VALUES (1,1,'Liverpool',26,13,8,5,97,69,28,47),(2,3,'Manchester United',26,14,3,9,99,65,34,45),(3,5,'Leicester City',26,12,8,6,88,65,23,44),(4,2,'Swansea City',26,14,2,10,64,67,-3,44),(5,6,'Manchester City',26,12,7,7,90,69,21,43),(6,4,'Southampton',26,13,3,10,81,68,13,42),(7,8,'Newcastle United',26,12,5,9,79,61,18,41),(8,7,'Arsenal',26,12,4,10,75,72,3,40),(9,11,'Bournemouth',26,10,7,9,66,76,-10,37),(10,12,'Chelsea',26,11,3,12,92,85,7,36),(11,10,'Huddersfield',26,10,5,11,82,89,-7,35),(12,9,'Tottenham Hotspur',26,10,5,11,79,89,-10,35),(13,16,'Brighton & Hove Albion',26,10,4,12,62,79,-17,34),(14,18,'Watford',26,11,1,14,71,91,-20,34),(15,17,'West Bromwich Albion',26,10,3,13,73,70,3,33),(16,13,'Stoke City',26,11,0,15,77,88,-11,33),(17,14,'Crystal Palace',26,9,6,11,69,83,-14,33),(18,15,'Burnley',26,10,3,13,74,88,-14,33),(19,19,'West Ham',26,8,2,16,69,95,-26,26),(20,20,'Everton',26,5,7,14,59,77,-18,22);
/*!40000 ALTER TABLE `tableWeek26` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek27`
--

DROP TABLE IF EXISTS `tableWeek27`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek27` (
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
-- Dumping data for table `tableWeek27`
--

LOCK TABLES `tableWeek27` WRITE;
/*!40000 ALTER TABLE `tableWeek27` DISABLE KEYS */;
INSERT INTO `tableWeek27` VALUES (1,2,'Manchester United',27,15,3,9,104,65,39,48),(2,3,'Leicester City',27,13,8,6,96,66,30,47),(3,1,'Liverpool',27,13,8,6,97,76,21,47),(4,4,'Swansea City',27,15,2,10,71,69,2,47),(5,5,'Manchester City',27,13,7,7,93,70,23,46),(6,6,'Southampton',27,14,3,10,83,69,14,45),(7,8,'Arsenal',27,13,4,10,78,73,5,43),(8,7,'Newcastle United',27,12,5,10,80,64,16,41),(9,11,'Huddersfield',27,11,5,11,88,89,-1,38),(10,12,'Tottenham Hotspur',27,11,5,11,86,89,-3,38),(11,9,'Bournemouth',27,10,7,10,67,78,-11,37),(12,14,'Watford',27,12,1,14,79,96,-17,37),(13,10,'Chelsea',27,11,3,13,97,93,4,36),(14,13,'Brighton & Hove Albion',27,10,4,13,62,84,-22,34),(15,15,'West Bromwich Albion',27,10,3,14,75,77,-2,33),(16,17,'Crystal Palace',27,9,6,12,70,86,-16,33),(17,18,'Burnley',27,10,3,14,75,91,-16,33),(18,16,'Stoke City',27,11,0,16,78,96,-18,33),(19,19,'West Ham',27,9,2,16,72,96,-24,29),(20,20,'Everton',27,5,7,15,59,83,-24,22);
/*!40000 ALTER TABLE `tableWeek27` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek28`
--

DROP TABLE IF EXISTS `tableWeek28`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek28` (
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
-- Dumping data for table `tableWeek28`
--

LOCK TABLES `tableWeek28` WRITE;
/*!40000 ALTER TABLE `tableWeek28` DISABLE KEYS */;
INSERT INTO `tableWeek28` VALUES (1,1,'Manchester United',28,16,3,9,110,65,45,51),(2,3,'Liverpool',28,14,8,6,103,80,23,50),(3,5,'Manchester City',28,14,7,7,100,73,27,49),(4,2,'Leicester City',28,13,9,6,96,66,30,48),(5,4,'Swansea City',28,15,2,11,74,76,-2,47),(6,6,'Southampton',28,14,3,11,84,76,8,45),(7,7,'Arsenal',28,13,5,10,78,73,5,44),(8,8,'Newcastle United',28,12,6,10,84,68,16,42),(9,10,'Tottenham Hotspur',28,12,5,11,90,89,1,41),(10,9,'Huddersfield',28,11,5,12,88,93,-5,38),(11,11,'Bournemouth',28,10,7,11,67,82,-15,37),(12,12,'Watford',28,12,1,15,81,100,-19,37),(13,14,'Brighton & Hove Albion',28,11,4,13,66,86,-20,37),(14,13,'Chelsea',28,11,3,14,97,99,-2,36),(15,17,'Burnley',28,11,3,14,82,92,-10,36),(16,16,'Crystal Palace',28,10,6,12,77,91,-14,36),(17,18,'Stoke City',28,11,1,16,82,100,-18,34),(18,15,'West Bromwich Albion',28,10,3,15,80,84,-4,33),(19,19,'West Ham',28,10,2,16,76,96,-20,32),(20,20,'Everton',28,5,7,16,63,89,-26,22);
/*!40000 ALTER TABLE `tableWeek28` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek29`
--

DROP TABLE IF EXISTS `tableWeek29`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek29` (
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
-- Dumping data for table `tableWeek29`
--

LOCK TABLES `tableWeek29` WRITE;
/*!40000 ALTER TABLE `tableWeek29` DISABLE KEYS */;
INSERT INTO `tableWeek29` VALUES (1,1,'Manchester United',29,17,3,9,116,65,51,54),(2,2,'Liverpool',29,15,8,6,109,80,29,53),(3,3,'Manchester City',29,15,7,7,107,73,34,52),(4,4,'Leicester City',29,14,9,6,102,66,36,51),(5,6,'Southampton',29,15,3,11,90,77,13,48),(6,5,'Swansea City',29,15,2,12,77,83,-6,47),(7,9,'Tottenham Hotspur',29,13,5,11,97,92,5,44),(8,7,'Arsenal',29,13,5,11,79,75,4,44),(9,8,'Newcastle United',29,12,6,11,85,74,11,42),(10,10,'Huddersfield',29,12,5,12,93,93,0,41),(11,14,'Chelsea',29,12,3,14,104,99,5,39),(12,11,'Bournemouth',29,10,7,12,67,87,-20,37),(13,12,'Watford',29,12,1,16,81,106,-25,37),(14,13,'Brighton & Hove Albion',29,11,4,14,66,92,-26,37),(15,18,'West Bromwich Albion',29,11,3,15,82,85,-3,36),(16,15,'Burnley',29,11,3,15,82,99,-17,36),(17,16,'Crystal Palace',29,10,6,13,77,98,-21,36),(18,19,'West Ham',29,11,2,16,78,97,-19,35),(19,17,'Stoke City',29,11,1,17,82,106,-24,34),(20,20,'Everton',29,5,7,17,64,91,-27,22);
/*!40000 ALTER TABLE `tableWeek29` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek2_old`
--

DROP TABLE IF EXISTS `tableWeek2_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek2_old` (
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
-- Dumping data for table `tableWeek2_old`
--

LOCK TABLES `tableWeek2_old` WRITE;
/*!40000 ALTER TABLE `tableWeek2_old` DISABLE KEYS */;
INSERT INTO `tableWeek2_old` VALUES (1,3,'Leicester City',2,2,0,0,6,0,6,6),(2,1,'Manchester City',2,2,0,0,8,2,6,6),(3,4,'Bournemouth',2,2,0,0,4,1,3,6),(4,12,'Manchester United',2,1,1,0,10,5,5,4),(5,10,'Liverpool',2,1,1,0,8,5,3,4),(6,9,'West Bromwich Albion',2,1,1,0,3,2,1,4),(7,18,'Sunderland',2,1,0,1,6,3,3,3),(8,15,'Arsenal',2,1,0,1,8,5,3,3),(9,14,'Southampton',2,1,0,1,2,2,0,3),(10,6,'Hull City',2,1,0,1,5,5,0,3),(11,16,'Swansea City',2,1,0,1,6,6,0,3),(12,5,'Stoke City',2,1,0,1,3,5,-2,3),(13,2,'Chelsea',2,1,0,1,5,7,-2,3),(14,7,'Tottenham Hotspur',2,1,0,1,4,8,-4,3),(15,8,'Burnley',2,0,1,1,2,3,-1,1),(16,11,'Middlesbrough',2,0,1,1,5,6,-1,1),(17,13,'West Ham',2,0,1,1,6,7,-1,1),(18,17,'Crystal Palace',2,0,0,2,0,5,-5,0),(19,20,'Everton',2,0,0,2,3,9,-6,0),(20,19,'Watford',2,0,0,2,1,9,-8,0);
/*!40000 ALTER TABLE `tableWeek2_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek30`
--

DROP TABLE IF EXISTS `tableWeek30`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek30` (
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
-- Dumping data for table `tableWeek30`
--

LOCK TABLES `tableWeek30` WRITE;
/*!40000 ALTER TABLE `tableWeek30` DISABLE KEYS */;
INSERT INTO `tableWeek30` VALUES (1,1,'Manchester United',30,18,3,9,119,66,53,57),(2,2,'Liverpool',30,16,8,6,110,80,30,56),(3,4,'Leicester City',30,15,9,6,106,69,37,54),(4,3,'Manchester City',30,15,8,7,113,79,34,53),(5,6,'Swansea City',30,16,2,12,82,87,-5,50),(6,5,'Southampton',30,15,3,12,90,78,12,48),(7,7,'Tottenham Hotspur',30,14,5,11,100,92,8,47),(8,8,'Arsenal',30,13,5,12,79,78,1,44),(9,9,'Newcastle United',30,12,7,11,91,80,11,43),(10,11,'Chelsea',30,13,3,14,107,100,7,42),(11,10,'Huddersfield',30,12,5,13,96,97,-1,41),(12,15,'West Bromwich Albion',30,12,3,15,87,86,1,39),(13,17,'Crystal Palace',30,11,6,13,79,98,-19,39),(14,19,'Stoke City',30,12,1,17,87,107,-20,37),(15,12,'Bournemouth',30,10,7,13,67,89,-22,37),(16,13,'Watford',30,12,1,17,82,111,-29,37),(17,14,'Brighton & Hove Albion',30,11,4,15,67,97,-30,37),(18,16,'Burnley',30,11,3,16,86,104,-18,36),(19,18,'West Ham',30,11,2,17,79,100,-21,35),(20,20,'Everton',30,5,7,18,65,94,-29,22);
/*!40000 ALTER TABLE `tableWeek30` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek31`
--

DROP TABLE IF EXISTS `tableWeek31`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek31` (
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
-- Dumping data for table `tableWeek31`
--

LOCK TABLES `tableWeek31` WRITE;
/*!40000 ALTER TABLE `tableWeek31` DISABLE KEYS */;
INSERT INTO `tableWeek31` VALUES (1,1,'Manchester United',31,18,3,10,123,71,52,57),(2,3,'Leicester City',31,16,9,6,110,71,39,57),(3,4,'Manchester City',31,16,8,7,118,83,35,56),(4,2,'Liverpool',31,16,8,7,111,85,26,56),(5,5,'Swansea City',31,16,3,12,86,91,-5,51),(6,7,'Tottenham Hotspur',31,15,5,11,105,96,9,50),(7,6,'Southampton',31,15,3,13,94,83,11,48),(8,8,'Arsenal',31,14,5,12,85,79,6,47),(9,9,'Newcastle United',31,12,8,11,92,81,11,44),(10,11,'Huddersfield',31,13,5,13,101,98,3,44),(11,10,'Chelsea',31,13,3,15,111,105,6,42),(12,13,'Crystal Palace',31,12,6,13,82,99,-17,42),(13,14,'Stoke City',31,13,1,17,92,111,-19,40),(14,12,'West Bromwich Albion',31,12,3,16,89,90,-1,39),(15,19,'West Ham',31,12,2,17,84,101,-17,38),(16,15,'Bournemouth',31,10,8,13,71,93,-22,38),(17,17,'Brighton & Hove Albion',31,11,5,15,68,98,-30,38),(18,16,'Watford',31,12,1,18,83,116,-33,37),(19,18,'Burnley',31,11,3,17,87,107,-20,36),(20,20,'Everton',31,5,7,19,66,100,-34,22);
/*!40000 ALTER TABLE `tableWeek31` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek32`
--

DROP TABLE IF EXISTS `tableWeek32`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek32` (
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
-- Dumping data for table `tableWeek32`
--

LOCK TABLES `tableWeek32` WRITE;
/*!40000 ALTER TABLE `tableWeek32` DISABLE KEYS */;
INSERT INTO `tableWeek32` VALUES (1,1,'Manchester United',32,19,3,10,126,73,53,60),(2,3,'Manchester City',32,17,8,7,125,86,39,59),(3,2,'Leicester City',32,16,9,7,111,75,36,57),(4,4,'Liverpool',32,16,8,8,112,89,23,56),(5,5,'Swansea City',32,16,3,13,89,98,-9,51),(6,8,'Arsenal',32,15,5,12,88,80,8,50),(7,6,'Tottenham Hotspur',32,15,5,12,107,99,8,50),(8,7,'Southampton',32,15,3,14,94,86,8,48),(9,11,'Chelsea',32,14,3,15,115,106,9,45),(10,9,'Newcastle United',32,12,8,12,92,84,8,44),(11,10,'Huddersfield',32,13,5,14,102,101,1,44),(12,14,'West Bromwich Albion',32,13,3,16,92,90,2,42),(13,12,'Crystal Palace',32,12,6,14,83,102,-19,42),(14,15,'West Ham',32,13,2,17,89,102,-13,41),(15,16,'Bournemouth',32,11,8,13,74,93,-19,41),(16,17,'Brighton & Hove Albion',32,12,5,15,71,99,-28,41),(17,13,'Stoke City',32,13,1,18,93,116,-23,40),(18,18,'Watford',32,13,1,18,86,116,-30,40),(19,19,'Burnley',32,12,3,17,91,108,-17,39),(20,20,'Everton',32,5,7,20,66,103,-37,22);
/*!40000 ALTER TABLE `tableWeek32` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek33`
--

DROP TABLE IF EXISTS `tableWeek33`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek33` (
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
-- Dumping data for table `tableWeek33`
--

LOCK TABLES `tableWeek33` WRITE;
/*!40000 ALTER TABLE `tableWeek33` DISABLE KEYS */;
INSERT INTO `tableWeek33` VALUES (1,2,'Manchester City',33,18,8,7,129,88,41,62),(2,1,'Manchester United',33,19,3,11,128,77,51,60),(3,3,'Leicester City',33,16,10,7,112,76,36,58),(4,4,'Liverpool',33,16,9,8,113,90,23,57),(5,7,'Tottenham Hotspur',33,16,5,12,111,101,10,53),(6,6,'Arsenal',33,15,6,12,90,82,8,51),(7,5,'Swansea City',33,16,3,14,90,103,-13,51),(8,8,'Southampton',33,15,3,15,95,89,6,48),(9,10,'Newcastle United',33,13,8,12,95,85,10,47),(10,9,'Chelsea',33,14,3,16,117,109,8,45),(11,13,'Crystal Palace',33,13,6,14,86,104,-18,45),(12,11,'Huddersfield',33,13,5,15,103,104,-1,44),(13,14,'West Ham',33,14,2,17,94,106,-12,44),(14,16,'Brighton & Hove Albion',33,13,5,15,75,100,-25,44),(15,17,'Stoke City',33,14,1,18,98,117,-19,43),(16,12,'West Bromwich Albion',33,13,3,17,96,95,1,42),(17,15,'Bournemouth',33,11,9,13,76,95,-19,42),(18,18,'Watford',33,13,1,19,88,120,-32,40),(19,19,'Burnley',33,12,3,18,92,112,-20,39),(20,20,'Everton',33,6,7,20,69,104,-35,25);
/*!40000 ALTER TABLE `tableWeek33` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek34`
--

DROP TABLE IF EXISTS `tableWeek34`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek34` (
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
-- Dumping data for table `tableWeek34`
--

LOCK TABLES `tableWeek34` WRITE;
/*!40000 ALTER TABLE `tableWeek34` DISABLE KEYS */;
INSERT INTO `tableWeek34` VALUES (1,1,'Manchester City',34,19,8,7,134,91,43,65),(2,3,'Leicester City',34,17,10,7,117,79,38,61),(3,2,'Manchester United',34,19,3,12,129,80,49,60),(4,4,'Liverpool',34,17,9,8,118,94,24,60),(5,5,'Tottenham Hotspur',34,17,5,12,113,102,11,56),(6,6,'Arsenal',34,16,6,12,97,84,13,54),(7,8,'Southampton',34,16,3,15,97,90,7,51),(8,7,'Swansea City',34,16,3,15,91,105,-14,51),(9,9,'Newcastle United',34,14,8,12,97,85,12,50),(10,11,'Crystal Palace',34,14,6,14,89,105,-16,48),(11,15,'Stoke City',34,15,1,18,104,117,-13,46),(12,10,'Chelsea',34,14,3,17,121,114,7,45),(13,17,'Bournemouth',34,12,9,13,80,96,-16,45),(14,12,'Huddersfield',34,13,5,16,104,108,-4,44),(15,13,'West Ham',34,14,2,18,95,108,-13,44),(16,14,'Brighton & Hove Albion',34,13,5,16,78,105,-27,44),(17,16,'West Bromwich Albion',34,13,3,18,96,97,-1,42),(18,18,'Watford',34,13,1,20,91,125,-34,40),(19,19,'Burnley',34,12,3,19,92,118,-26,39),(20,20,'Everton',34,6,7,21,71,111,-40,25);
/*!40000 ALTER TABLE `tableWeek34` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek35`
--

DROP TABLE IF EXISTS `tableWeek35`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek35` (
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
-- Dumping data for table `tableWeek35`
--

LOCK TABLES `tableWeek35` WRITE;
/*!40000 ALTER TABLE `tableWeek35` DISABLE KEYS */;
INSERT INTO `tableWeek35` VALUES (1,1,'Manchester City',35,20,8,7,137,92,45,68),(2,3,'Manchester United',35,20,3,12,135,83,52,63),(3,4,'Liverpool',35,18,9,8,122,96,26,63),(4,2,'Leicester City',35,17,10,8,117,80,37,61),(5,5,'Tottenham Hotspur',35,17,5,13,113,107,6,56),(6,7,'Southampton',35,17,3,15,102,90,12,54),(7,6,'Arsenal',35,16,6,13,98,88,10,54),(8,8,'Swansea City',35,17,3,15,95,107,-12,54),(9,9,'Newcastle United',35,15,8,12,103,87,16,53),(10,10,'Crystal Palace',35,14,7,14,94,110,-16,49),(11,14,'Huddersfield',35,14,5,16,111,110,1,47),(12,16,'Brighton & Hove Albion',35,14,5,16,79,105,-26,47),(13,11,'Stoke City',35,15,1,19,106,123,-17,46),(14,12,'Chelsea',35,14,3,18,123,121,2,45),(15,13,'Bournemouth',35,12,9,14,82,100,-18,45),(16,15,'West Ham',35,14,2,19,96,111,-15,44),(17,17,'West Bromwich Albion',35,13,4,18,101,102,-1,43),(18,19,'Burnley',35,13,3,19,96,119,-23,42),(19,18,'Watford',35,13,1,21,93,129,-36,40),(20,20,'Everton',35,6,7,22,74,117,-43,25);
/*!40000 ALTER TABLE `tableWeek35` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek36`
--

DROP TABLE IF EXISTS `tableWeek36`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek36` (
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
-- Dumping data for table `tableWeek36`
--

LOCK TABLES `tableWeek36` WRITE;
/*!40000 ALTER TABLE `tableWeek36` DISABLE KEYS */;
INSERT INTO `tableWeek36` VALUES (1,1,'Manchester City',36,21,8,7,144,96,48,71),(2,2,'Manchester United',36,21,3,12,138,84,54,66),(3,3,'Liverpool',36,18,9,9,126,103,23,63),(4,4,'Leicester City',36,17,11,8,119,82,37,62),(5,9,'Newcastle United',36,16,8,12,105,87,18,56),(6,5,'Tottenham Hotspur',36,17,5,14,113,110,3,56),(7,6,'Southampton',36,17,4,15,104,92,12,55),(8,8,'Swansea City',36,17,4,15,97,109,-12,55),(9,7,'Arsenal',36,16,6,14,98,90,8,54),(10,10,'Crystal Palace',36,15,7,14,99,112,-13,52),(11,11,'Huddersfield',36,15,5,16,114,110,4,50),(12,12,'Brighton & Hove Albion',36,14,6,16,80,106,-26,48),(13,16,'West Ham',36,15,2,19,100,113,-13,47),(14,13,'Stoke City',36,15,2,19,108,125,-17,47),(15,14,'Chelsea',36,14,4,18,125,123,2,46),(16,15,'Bournemouth',36,12,9,15,83,103,-20,45),(17,17,'West Bromwich Albion',36,13,4,19,103,107,-4,43),(18,18,'Burnley',36,13,4,19,98,121,-23,43),(19,19,'Watford',36,13,2,21,94,130,-36,41),(20,20,'Everton',36,6,7,23,76,121,-45,25);
/*!40000 ALTER TABLE `tableWeek36` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek37`
--

DROP TABLE IF EXISTS `tableWeek37`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek37` (
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
-- Dumping data for table `tableWeek37`
--

LOCK TABLES `tableWeek37` WRITE;
/*!40000 ALTER TABLE `tableWeek37` DISABLE KEYS */;
INSERT INTO `tableWeek37` VALUES (1,1,'Manchester City',37,21,8,8,144,98,46,71),(2,2,'Manchester United',37,21,4,12,141,87,54,67),(3,3,'Liverpool',37,19,9,9,135,106,29,66),(4,4,'Leicester City',37,18,11,8,123,82,41,65),(5,5,'Newcastle United',37,17,8,12,107,87,20,59),(6,7,'Southampton',37,18,4,15,107,92,15,58),(7,9,'Arsenal',37,17,6,14,104,92,12,57),(8,6,'Tottenham Hotspur',37,17,6,14,115,112,3,57),(9,10,'Crystal Palace',37,16,7,14,105,114,-9,55),(10,8,'Swansea City',37,17,4,16,100,118,-18,55),(11,11,'Huddersfield',37,15,5,17,114,113,1,50),(12,13,'West Ham',37,16,2,19,104,116,-12,50),(13,12,'Brighton & Hove Albion',37,14,7,16,85,111,-26,49),(14,15,'Chelsea',37,14,5,18,130,128,2,47),(15,14,'Stoke City',37,15,2,20,110,131,-21,47),(16,16,'Bournemouth',37,12,10,15,85,105,-20,46),(17,18,'Burnley',37,13,5,19,101,124,-23,44),(18,17,'West Bromwich Albion',37,13,4,20,106,111,-5,43),(19,19,'Watford',37,13,2,22,96,136,-40,41),(20,20,'Everton',37,6,7,24,76,125,-49,25);
/*!40000 ALTER TABLE `tableWeek37` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek38`
--

DROP TABLE IF EXISTS `tableWeek38`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek38` (
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
-- Dumping data for table `tableWeek38`
--

LOCK TABLES `tableWeek38` WRITE;
/*!40000 ALTER TABLE `tableWeek38` DISABLE KEYS */;
INSERT INTO `tableWeek38` VALUES (1,1,'Manchester City',38,21,9,8,146,100,46,72),(2,2,'Manchester United',38,22,4,12,142,87,55,70),(3,3,'Liverpool',38,20,9,9,140,107,33,69),(4,4,'Leicester City',38,19,11,8,130,82,48,68),(5,5,'Newcastle United',38,18,8,12,110,87,23,62),(6,7,'Arsenal',38,18,6,14,109,96,13,60),(7,6,'Southampton',38,18,4,16,111,97,14,58),(8,10,'Swansea City',38,18,4,16,105,120,-15,58),(9,8,'Tottenham Hotspur',38,17,6,15,116,116,0,57),(10,9,'Crystal Palace',38,16,7,15,105,117,-12,55),(11,11,'Huddersfield',38,16,5,17,119,116,3,53),(12,12,'West Ham',38,16,2,20,104,123,-19,50),(13,13,'Brighton & Hove Albion',38,14,7,17,86,116,-30,49),(14,14,'Chelsea',38,14,6,18,132,130,2,48),(15,15,'Stoke City',38,15,2,21,112,136,-24,47),(16,18,'West Bromwich Albion',38,14,4,20,110,112,-2,46),(17,16,'Bournemouth',38,12,10,16,85,111,-26,46),(18,17,'Burnley',38,13,5,20,104,129,-25,44),(19,19,'Watford',38,13,2,23,96,137,-41,41),(20,20,'Everton',38,7,7,24,82,125,-43,28);
/*!40000 ALTER TABLE `tableWeek38` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek3_old`
--

DROP TABLE IF EXISTS `tableWeek3_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek3_old` (
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
-- Dumping data for table `tableWeek3_old`
--

LOCK TABLES `tableWeek3_old` WRITE;
/*!40000 ALTER TABLE `tableWeek3_old` DISABLE KEYS */;
INSERT INTO `tableWeek3_old` VALUES (1,3,'Leicester City',3,3,0,0,11,0,11,9),(2,1,'Manchester City',3,3,0,0,14,7,7,9),(3,12,'Manchester United',3,2,1,0,12,6,6,7),(4,9,'West Bromwich Albion',3,2,1,0,8,4,4,7),(5,15,'Arsenal',3,2,0,1,10,5,5,6),(6,16,'Swansea City',3,2,0,1,11,6,5,6),(7,5,'Stoke City',3,2,0,1,7,5,2,6),(8,14,'Southampton',3,2,0,1,5,4,1,6),(9,2,'Chelsea',3,2,0,1,10,9,1,6),(10,4,'Bournemouth',3,2,0,1,4,6,-2,6),(11,10,'Liverpool',3,1,2,0,11,8,3,5),(12,18,'Sunderland',3,1,0,2,11,9,2,3),(13,6,'Hull City',3,1,0,2,7,8,-1,3),(14,7,'Tottenham Hotspur',3,1,0,2,4,12,-8,3),(15,13,'West Ham',3,0,2,1,9,10,-1,2),(16,8,'Burnley',3,0,1,2,4,8,-4,1),(17,11,'Middlesbrough',3,0,1,2,5,11,-6,1),(18,17,'Crystal Palace',3,0,0,3,0,7,-7,0),(19,20,'Everton',3,0,0,3,4,11,-7,0),(20,19,'Watford',3,0,0,3,3,14,-11,0);
/*!40000 ALTER TABLE `tableWeek3_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek4_old`
--

DROP TABLE IF EXISTS `tableWeek4_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek4_old` (
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
-- Dumping data for table `tableWeek4_old`
--

LOCK TABLES `tableWeek4_old` WRITE;
/*!40000 ALTER TABLE `tableWeek4_old` DISABLE KEYS */;
INSERT INTO `tableWeek4_old` VALUES (1,3,'Leicester City',4,4,0,0,17,2,15,12),(2,1,'Manchester City',4,4,0,0,18,9,9,12),(3,12,'Manchester United',4,3,1,0,14,6,8,10),(4,16,'Swansea City',4,3,0,1,17,8,9,9),(5,5,'Stoke City',4,3,0,1,11,5,6,9),(6,9,'West Bromwich Albion',4,2,1,1,9,7,2,7),(7,4,'Bournemouth',4,2,1,1,5,7,-2,7),(8,18,'Sunderland',4,2,0,2,15,9,6,6),(9,15,'Arsenal',4,2,0,2,12,9,3,6),(10,6,'Hull City',4,2,0,2,11,10,1,6),(11,14,'Southampton',4,2,0,2,5,6,-1,6),(12,2,'Chelsea',4,2,0,2,10,13,-3,6),(13,7,'Tottenham Hotspur',4,2,0,2,7,13,-6,6),(14,10,'Liverpool',4,1,2,1,14,12,2,5),(15,11,'Middlesbrough',4,1,1,2,9,14,-5,4),(16,13,'West Ham',4,0,2,2,11,16,-5,2),(17,8,'Burnley',4,0,1,3,4,12,-8,1),(18,19,'Watford',4,0,1,3,4,15,-11,1),(19,20,'Everton',4,0,0,4,6,15,-9,0),(20,17,'Crystal Palace',4,0,0,4,2,13,-11,0);
/*!40000 ALTER TABLE `tableWeek4_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek5_old`
--

DROP TABLE IF EXISTS `tableWeek5_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek5_old` (
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
-- Dumping data for table `tableWeek5_old`
--

LOCK TABLES `tableWeek5_old` WRITE;
/*!40000 ALTER TABLE `tableWeek5_old` DISABLE KEYS */;
INSERT INTO `tableWeek5_old` VALUES (1,3,'Leicester City',5,4,1,0,17,2,15,13),(2,1,'Manchester City',5,4,1,0,22,13,9,13),(3,16,'Swansea City',5,4,0,1,21,10,11,12),(4,12,'Manchester United',5,3,1,1,14,9,5,10),(5,4,'Bournemouth',5,3,1,1,7,8,-1,10),(6,15,'Arsenal',5,3,0,2,13,9,4,9),(7,5,'Stoke City',5,3,0,2,16,12,4,9),(8,2,'Chelsea',5,3,0,2,14,14,0,9),(9,10,'Liverpool',5,2,2,1,17,12,5,8),(10,9,'West Bromwich Albion',5,2,2,1,13,11,2,8),(11,18,'Sunderland',5,2,1,2,20,14,6,7),(12,6,'Hull City',5,2,0,3,12,14,-2,6),(13,14,'Southampton',5,2,0,3,7,10,-3,6),(14,7,'Tottenham Hotspur',4,2,0,2,7,13,-6,6),(15,13,'West Ham',5,1,2,2,18,21,-3,5),(16,11,'Middlesbrough',5,1,2,2,14,19,-5,5),(17,19,'Watford',6,1,2,3,11,17,-6,5),(18,8,'Burnley',5,0,1,4,4,13,-9,1),(19,20,'Everton',5,0,0,5,7,17,-10,0),(20,17,'Crystal Palace',5,0,0,5,4,20,-16,0);
/*!40000 ALTER TABLE `tableWeek5_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tableWeek6_old`
--

DROP TABLE IF EXISTS `tableWeek6_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableWeek6_old` (
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
-- Dumping data for table `tableWeek6_old`
--

LOCK TABLES `tableWeek6_old` WRITE;
/*!40000 ALTER TABLE `tableWeek6_old` DISABLE KEYS */;
INSERT INTO `tableWeek6_old` VALUES (1,1,'Leicester City',6,5,1,0,20,3,17,16),(2,2,'Manchester City',6,5,1,0,26,15,11,16),(3,3,'Swansea City',6,5,0,1,24,10,14,15),(4,4,'Manchester United',6,4,1,1,18,11,7,13),(5,6,'Arsenal',6,4,0,2,18,11,7,12),(6,14,'Tottenham Hotspur',6,4,0,2,17,15,2,12),(7,9,'Liverpool',6,3,2,1,21,14,7,11),(8,5,'Bournemouth',6,3,1,2,9,12,-3,10),(9,7,'Stoke City',6,3,0,3,17,15,2,9),(10,12,'Hull City',6,3,0,3,16,16,0,9),(11,13,'Southampton',6,3,0,3,10,11,-1,9),(12,8,'Chelsea',6,3,0,3,16,18,-2,9),(13,10,'West Bromwich Albion',6,2,2,2,14,14,0,8),(14,11,'Sunderland',6,2,1,3,22,18,4,7),(15,17,'Watford',6,1,2,3,11,17,-6,5),(16,15,'West Ham',6,1,2,3,18,24,-6,5),(17,16,'Middlesbrough',6,1,2,3,15,24,-9,5),(18,18,'Burnley',6,0,1,5,6,18,-12,1),(19,19,'Everton',6,0,0,6,9,21,-12,0),(20,20,'Crystal Palace',6,0,0,6,5,25,-20,0);
/*!40000 ALTER TABLE `tableWeek6_old` ENABLE KEYS */;
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

-- Dump completed on 2018-05-03  7:20:10
