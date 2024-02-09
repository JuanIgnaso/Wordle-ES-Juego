-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: Wordle_ES_db
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Table structure for table `categoria`
--
CREATE DATABASE IF NOT EXISTS Wordle_ES_db;
DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_categoria` (`nombre_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (71,'Bababoey'),(9,'Caramelo'),(11,'Colores'),(4,'Deportes'),(8,'Deportes de motor'),(5,'Frutas'),(6,'Informatica'),(3,'Paises'),(10,'Poblaciones'),(1,'Predeterminado');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `palabras`
--

DROP TABLE IF EXISTS `palabras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `palabras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `palabra` varchar(15) NOT NULL,
  `categoria` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `palabra` (`palabra`),
  KEY `FK_categoria` (`categoria`),
  CONSTRAINT `FK_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE SET DEFAULT
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `palabras`
--

LOCK TABLES `palabras` WRITE;
/*!40000 ALTER TABLE `palabras` DISABLE KEYS */;
INSERT INTO `palabras` VALUES (1,'dado',1),(2,'estufa',1),(3,'percha',1),(7,'francia',3),(8,'bulgaria',3),(9,'canada',3),(10,'futbol',4),(11,'baloncesto',4),(12,'volley',4),(13,'mandarina',5),(14,'pera',5),(15,'arandano',5),(16,'procesador',6),(17,'byte',6),(39,'software',6),(42,'platano',5),(43,'magenta',11),(44,'beige',11),(45,'blanco',11),(46,'cyan',11),(47,'regaliz',9),(49,'golf',4),(52,'piruleta',9),(53,'chupachups',9),(54,'nvidia',6),(55,'extension',6),(56,'cereza',5),(58,'manzana',5),(59,'chucheria',9),(60,'india',3);
/*!40000 ALTER TABLE `palabras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'changeme',
  `status` tinyint NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'Raul','raul@gmail.com','$2y$10$che9ovjK2LZbksXsUe0ajeJDRFZVG/bk4MDsGiC5UZ1WS1rYfagVS',0,'2024-01-05 13:03:16'),(9,'usuarioTest','test@gmail.com','$2y$10$vTxKmiyVtMAL2lq7fNWip.rt.lI29CV6bSoZq63aTgXYfUWg7Q/yu',0,'2024-01-14 17:05:08'),(10,'patata','patata@gmail.com','$2y$10$kMR1nw/iC.Ivxl5OSCgwXOjDnfNgojKdqa4S0gbN9KCEVHTLjVPNa',0,'2024-01-14 19:14:43'),(11,'JuanCarlos','juancarlos@gmail.com','$2y$10$wgTj2MvTi71vMbeHx0yhXOWdzs9AM54Bf7OGejyRqpsdhSf9m/oW2',0,'2024-01-15 17:03:44'),(12,'Jose','jose@gmail.com','$2y$10$rEAW35WkkU9tWL7JEdLZD.mPeBekQFzZfRLhGhw0GKeY4dAa6FlgG',0,'2024-01-15 17:04:25');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'Wordle_ES_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-17 13:54:22
