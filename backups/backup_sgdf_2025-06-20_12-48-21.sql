-- MySQL dump 10.13  Distrib 8.3.0, for Win64 (x86_64)
--
-- Host: localhost    Database: sgdf
-- ------------------------------------------------------
-- Server version	8.4.4

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
-- Table structure for table `deudas`
--

DROP TABLE IF EXISTS `deudas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deudas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `persona_id` int NOT NULL,
  `monto_inicial` int NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `monto_actual` int NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `descripcion_pago` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `persona_id` (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deudas`
--

LOCK TABLES `deudas` WRITE;
/*!40000 ALTER TABLE `deudas` DISABLE KEYS */;
INSERT INTO `deudas` VALUES (20,29,600,'2025-06-15','No Pagada','asdasd',600,'2025-06-15',''),(21,29,600,'2025-06-15','No Pagada','asdasd',600,'2025-06-15',''),(22,29,600,'2025-06-15','No Pagada','asdasd',600,'2025-06-15',''),(23,29,600,'2025-06-15','No Pagada','asdasd',600,'2025-06-15',''),(24,29,600,'2025-06-15','No Pagada','asdasd',600,'2025-06-15',''),(28,11,200,'2025-06-16','No Pagada','asdasd',100,'2025-06-18','asdasdads'),(29,11,200,'2025-06-16','Pagada','',0,'2025-06-16',''),(33,11,200,'2025-06-16','No Pagada','qweqwe',200,'2025-06-16',''),(34,11,200,'2025-06-16','No Pagada','qwe',200,'2025-06-16',''),(35,11,200,'2025-06-16','No Pagada','we',200,'2025-06-16',''),(36,11,200,'2025-06-16','No Pagada','we',200,'2025-06-16',''),(37,30,200,'2025-06-16','No Pagada','we',200,'2025-06-16',''),(38,30,200,'2025-06-16','No Pagada','qwe',200,'2025-06-16',''),(39,31,200,'2025-06-16','No Pagada','qwe',200,'2025-06-16',''),(42,32,500,'2025-06-16','No Pagada','asd',500,'2025-06-16',''),(43,32,500,'2025-06-16','No Pagada','asd',500,'2025-06-16',''),(44,32,500,'2025-06-16','No Pagada','asd',500,'2025-06-16',''),(45,32,500,'2025-06-16','No Pagada','asd',500,'2025-06-16',''),(46,33,500,'2025-06-16','No Pagada','asd',500,'2025-06-16',''),(47,11,200,'2025-06-19','No Pagada','asdads',200,'2025-06-19',''),(48,11,500,'2025-06-19','No Pagada','asdads',500,'2025-06-19',''),(49,34,500,'2025-06-19','No Pagada','asd',500,'2025-06-19',''),(50,34,500,'2025-06-19','No Pagada','asd',500,'2025-06-19',''),(51,11,500,'2025-06-19','No Pagada','asd',500,'2025-06-19',''),(52,11,500,'2025-06-19','No Pagada','asd',500,'2025-06-19',''),(53,35,500,'2025-06-19','No Pagada','asd',500,'2025-06-19',''),(54,12,500,'2025-06-20','No Pagada','asd',500,'2025-06-20',''),(55,12,500,'2025-06-20','No Pagada','asd',500,'2025-06-20',''),(56,36,500,'2025-06-20','No Pagada','asd',500,'2025-06-20','');
/*!40000 ALTER TABLE `deudas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proveedor_id` int NOT NULL,
  `monto_inicial` int NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `monto_actual` int NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `descripcion_pago` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proveedor_id` (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (11,1,500,'2025-06-16','Pagada','asd',0,'2025-06-19','asd'),(12,1,500,'2025-06-16','No Pagada','asd',500,'2025-06-16',''),(14,1,5000,'2025-06-19','No Pagada','',500,'2025-06-19','');
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cedula` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (11,'Archivaldo','Baldosa',19336904),(12,'Oliver','Castillo',28030110),(13,'Juan','Pérez',15975348),(14,'Marie','Gomez',11176043),(15,'Carlos','López',11176049),(16,'Juan','Pérez',19336904),(20,'María','Gómez',11176048),(22,'Ana','Martínez',28030110),(25,'Pedro','Sánchez',22334455),(26,'Sofía','Díaz',28628174),(29,'Jonatan','Urbano',28628174),(30,'Archivald','Baldosa',19336903),(31,'Archivalde','Baldos',19336902),(32,'Simón','Castillo',1803463),(33,'Simón','Baldosa',74185296),(34,'Dioskary','Monroy',12136456),(35,'Aliobel','Castillo',26292171),(36,'Jane','Doe',74859612);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas1`
--

DROP TABLE IF EXISTS `preguntas1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preguntas1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas1`
--

LOCK TABLES `preguntas1` WRITE;
/*!40000 ALTER TABLE `preguntas1` DISABLE KEYS */;
INSERT INTO `preguntas1` VALUES (1,'¿Cómo se llama su personaje favorito de la infancia?'),(2,'¿En qué ciudad se conocieron sus padres?'),(3,'¿Cómo se llamaba su primera mascota?'),(4,'¿Cuál es el segundo nombre de su primo más mayor?'),(5,'¿Cuál es el segundo nombre de tu primo mayor?'),(6,'¿En qué ciudad se conocieron tus padres?'),(7,'¿Cuál era el apellido de tu profesora de tercero de primaria?'),(8,'¿A qué universidad intentaste entrar pero finalmente no fuiste?'),(9,'¿Con quién te diste tu primer beso?');
/*!40000 ALTER TABLE `preguntas1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas2`
--

DROP TABLE IF EXISTS `preguntas2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preguntas2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas2`
--

LOCK TABLES `preguntas2` WRITE;
/*!40000 ALTER TABLE `preguntas2` DISABLE KEYS */;
INSERT INTO `preguntas2` VALUES (1,'¿Cómo se llama su personaje favorito de la infancia?'),(2,'¿En qué ciudad se conocieron sus padres?'),(3,'¿Cómo se llamaba su primera mascota?'),(4,'¿Cuál es el segundo nombre de su primo más mayor?'),(5,'¿Cuál es el segundo nombre de tu primo mayor?'),(6,'¿En qué ciudad se conocieron tus padres?'),(7,'¿Cuál era el apellido de tu profesora de tercero de primaria?'),(8,'¿A qué universidad intentaste entrar pero finalmente no fuiste?'),(9,'¿Con quién te diste tu primer beso?');
/*!40000 ALTER TABLE `preguntas2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rif` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'FritoLay','1597534628'),(2,'ConfiGuayana','1234567894'),(3,'Tinito','1234567890'),(6,'LelePons','987654322'),(8,'Pepsi Femsa','741852963'),(10,'Coca Cola Femsa','963258741'),(12,'Coca Cola Fems','963258747');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pass` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `respuesta_1` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `respuesta_2` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `preguntas1_id` int NOT NULL,
  `preguntas2_id` int NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_id` (`preguntas1_id`),
  KEY `preguntas2_id` (`preguntas2_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`preguntas1_id`) REFERENCES `preguntas1` (`id`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`preguntas2_id`) REFERENCES `preguntas2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (7,'adminar','$2y$10$pmppR0xB1aWKR71UbKiF3.RTKGxLBs6qcboPV65fRmIfwRdrbWn/6','asd','asd',8,9,0),(8,'admin','$2y$10$jqc4JhGvbNytghQgAzta4.OKZTRXgJnNuPEIJ3i883afyRYlTGjNO','asd','asd',8,9,1),(9,'user1','$2y$10$7FGCY1GB8dpNIiHm9A5gn.eBQI.rsMO.P7MZa.jhaYAT9nQxd1L9a','asd','asd',8,9,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-20  8:48:21
