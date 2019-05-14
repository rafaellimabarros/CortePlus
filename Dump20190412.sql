-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: newcorteplus
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `agendamento` (
  `idagenda` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `idcabel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idagenda`),
  KEY `id` (`id`),
  KEY `idcabel` (`idcabel`),
  CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`idcabel`) REFERENCES `cabeleireiro` (`idcabel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento`
--

LOCK TABLES `agendamento` WRITE;
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
INSERT INTO `agendamento` VALUES (1,'08:00:00','2019-04-05',1,3),(2,'00:08:30','2019-04-05',2,3),(3,'09:30:00','2019-04-05',2,1);
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabeleireiro`
--

DROP TABLE IF EXISTS `cabeleireiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cabeleireiro` (
  `idcabel` int(11) NOT NULL AUTO_INCREMENT,
  `nomecabel` varchar(30) DEFAULT NULL,
  `cpfcabel` varchar(14) DEFAULT NULL,
  `logradouro` varchar(30) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `abertura` time DEFAULT NULL,
  `encerramento` time DEFAULT NULL,
  `contato` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idcabel`),
  UNIQUE KEY `cpfcabel` (`cpfcabel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabeleireiro`
--

LOCK TABLES `cabeleireiro` WRITE;
/*!40000 ALTER TABLE `cabeleireiro` DISABLE KEYS */;
INSERT INTO `cabeleireiro` VALUES (1,'Loira','064',NULL,NULL,NULL,NULL,NULL,NULL),(2,'Jao','054',NULL,NULL,NULL,NULL,NULL,NULL),(3,'Juca','888',NULL,NULL,NULL,NULL,NULL,NULL),(4,'Gastro','654',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cabeleireiro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `senha` varchar(20) NOT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Rafael','064.666.623-14',NULL,NULL,NULL,'',NULL),(2,'Jardriel','054.999.999-99',NULL,NULL,NULL,'',NULL),(3,'Auricelio','044.999.999-99',NULL,NULL,NULL,'',NULL),(4,'Bruna','034.999.999-99',NULL,NULL,NULL,'',NULL),(5,'Thiado','024.999.999-99',NULL,NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-12 10:39:44
