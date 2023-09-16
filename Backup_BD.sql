-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bd_projeto
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cod` int(4) NOT NULL AUTO_INCREMENT,
  `senha` int(9) NOT NULL,
  `plano` varchar(12) NOT NULL,
  `vencimento` varchar(2) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `rg` int(13) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(55) NOT NULL,
  `numero` int(6) NOT NULL,
  `complemento` varchar(55) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `ibge` int(8) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (3,13456788,'100mb','30','Isabela Araujo 01',6741548,'320.191.460-61','(81)98216-8368','isabela@apc','53425-430','Avenida Antônio Cabral de Souza',289,'torre8 apt406','Nossa Senhora da Conceição','Paulista','PE',0,'2023-09-03 17:17:37','Teste','0000-00-00'),(4,12345678,'100mb','08','VALDERY SILVA 03',8888888,'320.191.460-61','(81)99999-9999','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-03 18:46:07','','0000-00-00'),(5,88888888,'100mb','17','VALDERY SILVA 04',8888888,'320.191.460-61','(81)99999-9999','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-03 19:38:26','','0000-00-00'),(7,88888888,'100mb','17','VALDERY SILVA 06',88888888,'320.191.460-61','(81)99999-9999','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-03 19:41:30','','0000-00-00'),(15,12345678,'200mb','17','VALDERY SILVA DE SANTANA 01',888888888,'974.883.930-31','(81)98888-8888','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:31:30','teste','0000-00-00'),(16,87654321,'100mb','17','VALDERY SILVA DE SANTANA 02',2147483647,'974.883.930-31','(81)98888-8888','VALDERY@APC','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:32:36','teste','0000-00-00'),(17,65437890,'100mb','17','Valdery Silva de Satana',888888888,'974.883.930-31','(81)98888-8888','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:33:35','teste','0000-00-00'),(18,12345678,'200mb','08','ANTONIO CABRAL',777777777,'974.883.930-31','(81)98765-3425','antonio@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:34:38','teste','0000-00-00'),(19,23456789,'400mb','08','João Carlos',4444444,'974.883.930-31','(81)84443-5552','joao@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:42:31','teste','0000-00-00'),(20,34444455,'200mb','08','Isabel Maria',3425555,'974.883.930-31','(81)98767-7744','isabel@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:43:45','teste','0000-00-00'),(21,23456789,'200mb','08','CASSIA LINS',45436788,'974.883.930-31','(81)98372-8583','cassia@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:45:33','teste','0000-00-00'),(22,87654377,'200mb','17','ALESSANDO SILVA',3425678,'974.883.930-31','(81)98822-7363','alesandro@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:46:42','teste','0000-00-00'),(23,44556666,'400mb','17','Bertolo Manoel',54678222,'974.883.930-31','(81)98872-7722','manoel@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:48:14','teste','0000-00-00'),(24,34566789,'200mb','08','Kelvin Soares',43567899,'974.883.930-31','(81)98876-4533','kelvin@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:49:24','teste','0000-00-00'),(25,456789,'200mb','17','Fabio Augusto',54367893,'974.883.930-31','(81)98888-8822','fabio@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:50:42','teste','0000-00-00'),(26,56789033,'200mb','17','CARLOS DE ANDRADE',34521111,'974.883.930-31','(81)98888-8888','carlos@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:51:59','teste','0000-00-00'),(27,55555555,'200mb','08','Gabrielly Silva',5436678,'974.883.930-31','(81)97738-3777','gabrielly@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:53:37','teste','0000-00-00'),(28,33333333,'400mb','17','Andre Souza de Assis',3333333,'974.883.930-31','(81)98827-7222','andre@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:54:43','teste','0000-00-00'),(29,45556666,'100mb','08','Hamilton Carvalho da Silva',3456789,'974.883.930-31','(81)98726-5499','hamilton@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:56:04','teste','0000-00-00'),(30,56789999,'100mb','08','Vagner Rocha da Silva',44444444,'974.883.930-31','(81)98873-7366','vagner@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:57:14','teste','0000-00-00'),(31,4567890,'400mb','17','WALDEMAR DA SILVA',456789,'974.883.930-31','(81)98837-6666','waldemar@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',0,'2023-09-11 20:58:14','teste','2001-09-14'),(32,44444444,'200mb','17','WALTER DE SANTANA',1232321,'974.883.930-31','(81)98873-6333','walter@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-11 20:59:21','teste','0000-00-00'),(34,12345,'100mb','17','VALDERY SILVA 01',99999999,'471.419.380-52','(81)88888-8888','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',0,'2023-09-13 16:53:38','teste','0000-00-00'),(35,12345,'200mb','17','VALDERY SILVA 02',2147483647,'264.112.820-99','(81)98888-8888','valdery@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',0,'2023-09-14 08:46:53','teste','2000-08-02'),(36,12345,'100mb','17','VALDERY SILVA 03',888888888,'264.112.820-99','(81)98888-8888','valdery2@apc','53425-430','Avenida Antônio Cabral de Souza',67,'casa','Nossa Senhora da Conceição','Paulista','PE',2610707,'2023-09-14 08:50:08','teste','1978-10-02');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (84,'valdery','(88)88888-8888','valdery@apc','teste','2023-09-14 20:51:01'),(85,'teste','(99)99999-9999','teste@teste','teste','2023-09-14 20:51:26');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(255) NOT NULL,
  `numero` int(4) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(80) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'administrador','admin','827ccb0eea8a706c4c34a16891f84e7b'),(5,'administrador1','valdery','01cfcd4f6b8770febfb40cb906715822');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(80) NOT NULL,
  `login_usuario` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'valdery','admin','$2y$10$1P5Uz/eWGOWJB8keCHcS6OJm0uYfkPHlg.Lhgz07J4Nj5k26pZe6K'),(2,'Isabela','root','$2y$10$kz8H23Hi0bW5O9xlKJx1YetQgNFrU9HtiItKcNdyZNtLnZ/TkiSdy');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_projeto'
--

--
-- Dumping routines for database 'bd_projeto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-15 17:25:58
