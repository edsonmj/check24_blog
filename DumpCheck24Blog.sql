-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: check24_blog
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `insertion_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Comments_Posts_idx` (`post_id`),
  CONSTRAINT `fk_Comments_Posts` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (1,1,'teste',NULL,NULL,'teste',NULL,1,'2019-01-29 09:25:15'),(2,7,'123','','','123','127.0.0.1',1,'2019-01-29 11:36:36'),(3,7,'123','','','123','127.0.0.1',1,'2019-01-29 11:36:46'),(4,7,'1234','','','1234','127.0.0.1',1,'2019-01-29 11:38:03'),(5,7,'123','','','123','127.0.0.1',1,'2019-01-29 11:48:26'),(6,7,'123','','','123','127.0.0.1',1,'2019-01-29 11:48:58'),(7,7,'123','','test.com','123','127.0.0.1',1,'2019-01-29 11:53:38');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Posts`
--

DROP TABLE IF EXISTS `Posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_user_id` int(11) unsigned NOT NULL,
  `insertion_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user_id` int(11) unsigned DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Posts_Users_idx` (`author_id`),
  KEY `fk_Posts_UsersInsert_idx` (`created_user_id`),
  KEY `fk_Posts_UsersUpdate_idx` (`updated_user_id`),
  CONSTRAINT `fk_Posts_Users` FOREIGN KEY (`author_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Posts_UsersInsert` FOREIGN KEY (`created_user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Posts_UsersUpdate` FOREIGN KEY (`updated_user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Posts`
--

LOCK TABLES `Posts` WRITE;
/*!40000 ALTER TABLE `Posts` DISABLE KEYS */;
INSERT INTO `Posts` VALUES (1,'Test','test',1,1,1,'2019-01-29 08:38:13',NULL,NULL),(2,'Test2','test',1,1,1,'2019-01-29 08:44:16',NULL,NULL),(3,'123','123',1,1,1,'2019-01-29 10:10:01',NULL,NULL),(4,'123','1234',1,1,1,'2019-01-29 10:10:13',NULL,NULL),(5,'123','1234',1,0,1,'2019-01-29 10:11:03',NULL,NULL),(6,'123','123',1,0,1,'2019-01-29 10:11:10',1,'2019-01-29 10:29:36'),(7,'Author','Author',2,1,2,'2019-01-29 11:02:36',2,'2019-01-29 11:02:40');
/*!40000 ALTER TABLE `Posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_user_id` int(11) unsigned NOT NULL,
  `insertion_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_user_id` int(11) unsigned DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Roles_UsersInsert_idx` (`created_user_id`),
  KEY `fk_Roles_UsersUpdate_idx` (`updated_user_id`),
  CONSTRAINT `fk_Roles_UsersInsert` FOREIGN KEY (`created_user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Roles_UsersUpdate` FOREIGN KEY (`updated_user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'admin',1,1,'2019-01-29 10:51:42',NULL,NULL),(2,'author',1,1,'2019-01-29 10:51:42',NULL,NULL);
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(40) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `created_user_id` int(11) unsigned NOT NULL,
  `insertion_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user_id` int(11) unsigned DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_Users_idx` (`created_user_id`,`updated_user_id`),
  KEY `fk_Users_UsersUpdate_idx` (`updated_user_id`),
  KEY `fk_Users_Roles_idx` (`role_id`),
  CONSTRAINT `fk_Users_Roles` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_UsersInsert` FOREIGN KEY (`created_user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_UsersUpdate` FOREIGN KEY (`updated_user_id`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,1,'Admin','edson_mj@hotmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',1,1,'0000-00-00 00:00:00',NULL,NULL),(2,2,'Author','author@author.com','7c4a8d09ca3762af61e59520943dc26494f8941b',1,1,'2019-01-29 11:01:40',NULL,NULL);
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

-- Dump completed on 2019-01-29 11:59:40
