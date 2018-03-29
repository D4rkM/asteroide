-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db_asteroide
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acao` varchar(45) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcionario_idx` (`id_funcionario`),
  CONSTRAINT `fk_funcionario_auditoria` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caminho`
--

DROP TABLE IF EXISTS `caminho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caminho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caminho`
--

LOCK TABLES `caminho` WRITE;
/*!40000 ALTER TABLE `caminho` DISABLE KEYS */;
/*!40000 ALTER TABLE `caminho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caminho_parada`
--

DROP TABLE IF EXISTS `caminho_parada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caminho_parada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_caminho` int(11) DEFAULT NULL,
  `id_parada` int(11) DEFAULT NULL,
  `ponto_localizacao_onibus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_caminho_idx` (`id_caminho`),
  KEY `fk_parada_idx` (`id_parada`),
  CONSTRAINT `fk_caminho_parada` FOREIGN KEY (`id_caminho`) REFERENCES `caminho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_parada_caminho` FOREIGN KEY (`id_parada`) REFERENCES `parada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caminho_parada`
--

LOCK TABLES `caminho_parada` WRITE;
/*!40000 ALTER TABLE `caminho_parada` DISABLE KEYS */;
/*!40000 ALTER TABLE `caminho_parada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chegada`
--

DROP TABLE IF EXISTS `chegada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chegada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_postorodoviario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posto_rodoviario_idx` (`id_postorodoviario`),
  CONSTRAINT `fk_postorodoviario_chegada` FOREIGN KEY (`id_postorodoviario`) REFERENCES `posto_rodoviario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chegada`
--

LOCK TABLES `chegada` WRITE;
/*!40000 ALTER TABLE `chegada` DISABLE KEYS */;
/*!40000 ALTER TABLE `chegada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estado_idx` (`id_estado`),
  CONSTRAINT `fk_estado_cidade` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_classe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classe`
--

LOCK TABLES `classe` WRITE;
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_viagem` int(11) DEFAULT NULL,
  `qrcode` varchar(45) DEFAULT NULL,
  `validacao_qrcode` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `numero_poltrona` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_viagem_idx` (`id_viagem`),
  KEY `fk_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_usuario_compra` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_viagem_compra` FOREIGN KEY (`id_viagem`) REFERENCES `viagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_passagem`
--

DROP TABLE IF EXISTS `compra_passagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_passagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_postorodoviario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_idx` (`id_usuario`),
  KEY `fk_postorodoviario_idx` (`id_postorodoviario`),
  CONSTRAINT `fk_postorodoviario` FOREIGN KEY (`id_postorodoviario`) REFERENCES `posto_rodoviario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_passagem` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_passagem`
--

LOCK TABLES `compra_passagem` WRITE;
/*!40000 ALTER TABLE `compra_passagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra_passagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fale_conosco`
--

DROP TABLE IF EXISTS `fale_conosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fale_conosco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `sugestao` varchar(255) DEFAULT NULL,
  `reclamacoes` varchar(255) DEFAULT NULL,
  `elogios` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_usuario_fale` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fale_conosco`
--

LOCK TABLES `fale_conosco` WRITE;
/*!40000 ALTER TABLE `fale_conosco` DISABLE KEYS */;
/*!40000 ALTER TABLE `fale_conosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freio`
--

DROP TABLE IF EXISTS `freio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `estoque` varchar(45) NOT NULL,
  `id_tipofreio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipofreio_idx` (`id_tipofreio`),
  CONSTRAINT `fk_tipofreio` FOREIGN KEY (`id_tipofreio`) REFERENCES `tipo_freio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freio`
--

LOCK TABLES `freio` WRITE;
/*!40000 ALTER TABLE `freio` DISABLE KEYS */;
/*!40000 ALTER TABLE `freio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freio_onibus`
--

DROP TABLE IF EXISTS `freio_onibus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freio_onibus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_freio` int(11) DEFAULT NULL,
  `id_onibus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_freio_idx` (`id_freio`),
  KEY `fk_onibus_idx` (`id_onibus`),
  CONSTRAINT `fk_freio_onibus` FOREIGN KEY (`id_freio`) REFERENCES `freio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_onibus_freio` FOREIGN KEY (`id_onibus`) REFERENCES `onibus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freio_onibus`
--

LOCK TABLES `freio_onibus` WRITE;
/*!40000 ALTER TABLE `freio_onibus` DISABLE KEYS */;
/*!40000 ALTER TABLE `freio_onibus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `datanasc` date NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `login` varchar(45) NOT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcionario_cidade_idx` (`id_cidade`),
  CONSTRAINT `fk_funcionario_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'teste','asdasd','123','2000-10-02','F','123123','123','23123','123123',1,'teste','123123','1','123','123','123',NULL);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_nivel`
--

DROP TABLE IF EXISTS `funcionario_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcionario_idx` (`id_funcionario`),
  KEY `fk_nivel_idx` (`id_nivel`),
  CONSTRAINT `fk_funcionario_nivel` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nivel_fn` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_nivel`
--

LOCK TABLES `funcionario_nivel` WRITE;
/*!40000 ALTER TABLE `funcionario_nivel` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interacao`
--

DROP TABLE IF EXISTS `interacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(45) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `aparecer` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_usuario_interacao` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interacao`
--

LOCK TABLES `interacao` WRITE;
/*!40000 ALTER TABLE `interacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `interacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca_oleo`
--

DROP TABLE IF EXISTS `marca_oleo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca_oleo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca_oleo`
--

LOCK TABLES `marca_oleo` WRITE;
/*!40000 ALTER TABLE `marca_oleo` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca_oleo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca_pneu`
--

DROP TABLE IF EXISTS `marca_pneu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca_pneu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca_pneu`
--

LOCK TABLES `marca_pneu` WRITE;
/*!40000 ALTER TABLE `marca_pneu` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca_pneu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem_notificacao`
--

DROP TABLE IF EXISTS `mensagem_notificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem_notificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem_notificacao`
--

LOCK TABLES `mensagem_notificacao` WRITE;
/*!40000 ALTER TABLE `mensagem_notificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem_notificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motorista`
--

DROP TABLE IF EXISTS `motorista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motorista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `cnh` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `rg` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `datanasc` date NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motorista`
--

LOCK TABLES `motorista` WRITE;
/*!40000 ALTER TABLE `motorista` DISABLE KEYS */;
/*!40000 ALTER TABLE `motorista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_modulo`
--

DROP TABLE IF EXISTS `nivel_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nivel_nm_idx` (`id_modulo`),
  KEY `fk_nv_idx` (`id_nivel`),
  CONSTRAINT `fk_nivel_nm` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nv` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_modulo`
--

LOCK TABLES `nivel_modulo` WRITE;
/*!40000 ALTER TABLE `nivel_modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivel_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oleo`
--

DROP TABLE IF EXISTS `oleo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oleo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `estoque` varchar(45) DEFAULT NULL,
  `id_marcaoleo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marcaoleo_idx` (`id_marcaoleo`),
  CONSTRAINT `fk_marcaoleo` FOREIGN KEY (`id_marcaoleo`) REFERENCES `marca_oleo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oleo`
--

LOCK TABLES `oleo` WRITE;
/*!40000 ALTER TABLE `oleo` DISABLE KEYS */;
/*!40000 ALTER TABLE `oleo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oleo_onibus`
--

DROP TABLE IF EXISTS `oleo_onibus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oleo_onibus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_oleo` int(11) DEFAULT NULL,
  `id_onibus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_onibus_idx` (`id_onibus`),
  KEY `fk_oleo_idx` (`id_oleo`),
  CONSTRAINT `fk_oleo_onibus` FOREIGN KEY (`id_oleo`) REFERENCES `oleo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_onibus_oleo` FOREIGN KEY (`id_onibus`) REFERENCES `onibus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oleo_onibus`
--

LOCK TABLES `oleo_onibus` WRITE;
/*!40000 ALTER TABLE `oleo_onibus` DISABLE KEYS */;
/*!40000 ALTER TABLE `oleo_onibus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onibus`
--

DROP TABLE IF EXISTS `onibus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `onibus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeros_poltronas` varchar(45) DEFAULT NULL,
  `status_manutencao` varchar(45) DEFAULT NULL,
  `km_rodado` varchar(45) DEFAULT NULL,
  `km_manutencao` varchar(45) DEFAULT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classe_idx` (`id_classe`),
  CONSTRAINT `fk_classe_onibus` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `onibus`
--

LOCK TABLES `onibus` WRITE;
/*!40000 ALTER TABLE `onibus` DISABLE KEYS */;
/*!40000 ALTER TABLE `onibus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onibus_pneu`
--

DROP TABLE IF EXISTS `onibus_pneu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `onibus_pneu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pneu` int(11) DEFAULT NULL,
  `id_onibus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pneu_idx` (`id_pneu`),
  KEY `fk_onibus_idx` (`id_onibus`),
  CONSTRAINT `fk_onibus_pneu` FOREIGN KEY (`id_onibus`) REFERENCES `onibus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pneu_onibus` FOREIGN KEY (`id_pneu`) REFERENCES `pneu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `onibus_pneu`
--

LOCK TABLES `onibus_pneu` WRITE;
/*!40000 ALTER TABLE `onibus_pneu` DISABLE KEYS */;
/*!40000 ALTER TABLE `onibus_pneu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parada`
--

DROP TABLE IF EXISTS `parada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parada`
--

LOCK TABLES `parada` WRITE;
/*!40000 ALTER TABLE `parada` DISABLE KEYS */;
/*!40000 ALTER TABLE `parada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida`
--

DROP TABLE IF EXISTS `partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_postorodoviario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posto_rodoviario_idx` (`id_postorodoviario`),
  CONSTRAINT `fk_postorodoviario_partida` FOREIGN KEY (`id_postorodoviario`) REFERENCES `posto_rodoviario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida`
--

LOCK TABLES `partida` WRITE;
/*!40000 ALTER TABLE `partida` DISABLE KEYS */;
/*!40000 ALTER TABLE `partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pergunta_chatbot`
--

DROP TABLE IF EXISTS `pergunta_chatbot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pergunta_chatbot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(100) DEFAULT NULL,
  `resposta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta_chatbot`
--

LOCK TABLES `pergunta_chatbot` WRITE;
/*!40000 ALTER TABLE `pergunta_chatbot` DISABLE KEYS */;
/*!40000 ALTER TABLE `pergunta_chatbot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pgduvidas_frequentes`
--

DROP TABLE IF EXISTS `pgduvidas_frequentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pgduvidas_frequentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` varchar(100) DEFAULT NULL,
  `aparecer` int(11) DEFAULT NULL,
  `pergunta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgduvidas_frequentes`
--

LOCK TABLES `pgduvidas_frequentes` WRITE;
/*!40000 ALTER TABLE `pgduvidas_frequentes` DISABLE KEYS */;
INSERT INTO `pgduvidas_frequentes` VALUES (4,'asdasdasd123123',0,'teste123');
/*!40000 ALTER TABLE `pgduvidas_frequentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pgfrota_onibus`
--

DROP TABLE IF EXISTS `pgfrota_onibus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pgfrota_onibus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgfrota_onibus`
--

LOCK TABLES `pgfrota_onibus` WRITE;
/*!40000 ALTER TABLE `pgfrota_onibus` DISABLE KEYS */;
/*!40000 ALTER TABLE `pgfrota_onibus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pginteracao`
--

DROP TABLE IF EXISTS `pginteracao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pginteracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `subtitulo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pginteracao`
--

LOCK TABLES `pginteracao` WRITE;
/*!40000 ALTER TABLE `pginteracao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pginteracao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pgposto_rodoviarios`
--

DROP TABLE IF EXISTS `pgposto_rodoviarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pgposto_rodoviarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` varchar(45) DEFAULT NULL,
  `titulo_pagina` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgposto_rodoviarios`
--

LOCK TABLES `pgposto_rodoviarios` WRITE;
/*!40000 ALTER TABLE `pgposto_rodoviarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `pgposto_rodoviarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pgsobre_nos`
--

DROP TABLE IF EXISTS `pgsobre_nos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pgsobre_nos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt1` varchar(45) DEFAULT NULL,
  `txt2` varchar(45) DEFAULT NULL,
  `imagemGrande` varchar(200) DEFAULT NULL,
  `imagem1` varchar(200) DEFAULT NULL,
  `imagem2` varchar(200) DEFAULT NULL,
  `imagem3` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgsobre_nos`
--

LOCK TABLES `pgsobre_nos` WRITE;
/*!40000 ALTER TABLE `pgsobre_nos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pgsobre_nos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pneu`
--

DROP TABLE IF EXISTS `pneu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pneu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `estoque` varchar(45) DEFAULT NULL,
  `km_rodado` varchar(45) DEFAULT NULL,
  `id_marcapeneu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`nome`),
  KEY `fk_marcapeneu_idx` (`id_marcapeneu`),
  CONSTRAINT `fk_marcapneu` FOREIGN KEY (`id_marcapeneu`) REFERENCES `marca_pneu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pneu`
--

LOCK TABLES `pneu` WRITE;
/*!40000 ALTER TABLE `pneu` DISABLE KEYS */;
/*!40000 ALTER TABLE `pneu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posto_rodoviario`
--

DROP TABLE IF EXISTS `posto_rodoviario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posto_rodoviario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `logradouro_UNIQUE` (`logradouro`),
  KEY `fk_pr_cidade_idx` (`id_cidade`),
  CONSTRAINT `fk_pr_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posto_rodoviario`
--

LOCK TABLES `posto_rodoviario` WRITE;
/*!40000 ALTER TABLE `posto_rodoviario` DISABLE KEYS */;
/*!40000 ALTER TABLE `posto_rodoviario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_freio`
--

DROP TABLE IF EXISTS `tipo_freio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_freio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_freio`
--

LOCK TABLES `tipo_freio` WRITE;
/*!40000 ALTER TABLE `tipo_freio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_freio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `datanasc` date DEFAULT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_cidade_idx` (`id_cidade`),
  CONSTRAINT `fk_usuario_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viagem`
--

DROP TABLE IF EXISTS `viagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `id_onibus` int(11) DEFAULT NULL,
  `id_chegada` int(11) DEFAULT NULL,
  `id_partida` int(11) DEFAULT NULL,
  `km` varchar(45) DEFAULT NULL,
  `id_caminho` int(11) DEFAULT NULL,
  `id_motorista` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_onibus_idx` (`id_onibus`),
  KEY `gk_chegada_idx` (`id_chegada`),
  KEY `fk_partida_idx` (`id_partida`),
  KEY `fk_caminho_idx` (`id_caminho`),
  KEY `fk_motorista_idx` (`id_motorista`),
  CONSTRAINT `fk_caminho_viagem` FOREIGN KEY (`id_caminho`) REFERENCES `caminho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chegada_viagem` FOREIGN KEY (`id_chegada`) REFERENCES `chegada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_motorista_viagem` FOREIGN KEY (`id_motorista`) REFERENCES `motorista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_onibus_viagem` FOREIGN KEY (`id_onibus`) REFERENCES `onibus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partida_viagem` FOREIGN KEY (`id_partida`) REFERENCES `partida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viagem`
--

LOCK TABLES `viagem` WRITE;
/*!40000 ALTER TABLE `viagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `viagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viagem_notificacao`
--

DROP TABLE IF EXISTS `viagem_notificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viagem_notificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_viagem` int(11) DEFAULT NULL,
  `id_mensagemnotificacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_viagem_idx` (`id_viagem`),
  KEY `fk_mensagemnotificacao_idx` (`id_mensagemnotificacao`),
  CONSTRAINT `fk_mensagem_ntf` FOREIGN KEY (`id_mensagemnotificacao`) REFERENCES `mensagem_notificacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_viagem_ntf` FOREIGN KEY (`id_viagem`) REFERENCES `viagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viagem_notificacao`
--

LOCK TABLES `viagem_notificacao` WRITE;
/*!40000 ALTER TABLE `viagem_notificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `viagem_notificacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-29 11:08:56
