-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: db_asteroide
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) DEFAULT NULL,
  `nom_cidade` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estado_idx` (`id_estado`),
  CONSTRAINT `fk_estado_cidade` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5508 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,1,'Acrelândia'),(2,1,'Assis Brasil'),(3,1,'Brasiléia'),(4,1,'Bujari'),(5,1,'Capixaba'),(6,1,'Cruzeiro do Sul'),(7,1,'Epitaciolândia'),(8,1,'Feijó'),(9,1,'Jordão'),(10,1,'Mâncio Lima'),(11,1,'Manoel Urbano'),(12,1,'Marechal Thaumaturgo'),(13,1,'Plácido de Castro'),(14,1,'Porto Acre'),(15,1,'Porto Walter'),(16,1,'Rio Branco'),(17,1,'Rodrigues Alves'),(18,1,'Santa Rosa do Purus'),(19,1,'Sena Madureira'),(20,1,'Senador Guiomard'),(21,1,'Tarauacá'),(22,1,'Xapuri'),(23,2,'Água Branca'),(24,2,'Anadia'),(25,2,'Arapiraca'),(26,2,'Atalaia'),(27,2,'Barra de Santo Antônio'),(28,2,'Barra de São Miguel'),(29,2,'Batalha'),(30,2,'Belém'),(31,2,'Belo Monte'),(32,2,'Boca da Mata'),(33,2,'Branquinha'),(34,2,'Cacimbinhas'),(35,2,'Cajueiro'),(36,2,'Campestre'),(37,2,'Campo Alegre'),(38,2,'Campo Grande'),(39,2,'Canapi'),(40,2,'Capela'),(41,2,'Carneiros'),(42,2,'Chã Preta'),(43,2,'Coité do Nóia'),(44,2,'Colônia Leopoldina'),(45,2,'Coqueiro Seco'),(46,2,'Coruripe'),(47,2,'Craíbas'),(48,2,'Delmiro Gouveia'),(49,2,'Dois Riachos'),(50,2,'Estrela de Alagoas'),(51,2,'Feira Grande'),(52,2,'Feliz Deserto'),(53,2,'Flexeiras'),(54,2,'Girau do Ponciano'),(55,2,'Ibateguara'),(56,2,'Igaci'),(57,2,'Igreja Nova'),(58,2,'Inhapi'),(59,2,'Jacaré dos Homens'),(60,2,'Jacuípe'),(61,2,'Japaratinga'),(62,2,'Jaramataia'),(63,2,'Joaquim Gomes'),(64,2,'Jundiá'),(65,2,'Junqueiro'),(66,2,'Lagoa da Canoa'),(67,2,'Limoeiro de Anadia'),(68,2,'Maceió'),(69,2,'Major Isidoro'),(70,2,'Mar Vermelho'),(71,2,'Maragogi'),(72,2,'Maravilha'),(73,2,'Marechal Deodoro'),(74,2,'Maribondo'),(75,2,'Mata Grande'),(76,2,'Matriz de Camaragibe'),(77,2,'Messias'),(78,2,'Minador do Negrão'),(79,2,'Monteirópolis'),(80,2,'Murici'),(81,2,'Novo Lino'),(82,2,'Olho d`Água das Flores'),(83,2,'Olho d`Água do Casado'),(84,2,'Olho d`Água Grande'),(85,2,'Olivença'),(86,2,'Ouro Branco'),(87,2,'Palestina'),(88,2,'Palmeira dos Índios'),(89,2,'Pão de Açúcar'),(90,2,'Pariconha'),(91,2,'Paripueira'),(92,2,'Passo de Camaragibe'),(93,2,'Paulo Jacinto'),(94,2,'Penedo'),(95,2,'Piaçabuçu'),(96,2,'Pilar'),(97,2,'Pindoba'),(98,2,'Piranhas'),(99,2,'Poço das Trincheiras'),(100,2,'Porto Calvo'),(101,2,'Porto de Pedras'),(102,2,'Porto Real do Colégio'),(103,2,'Quebrangulo'),(104,2,'Rio Largo'),(105,2,'Roteiro'),(106,2,'Santa Luzia do Norte'),(107,2,'Santana do Ipanema'),(108,2,'Santana do Mundaú'),(109,2,'São Brás'),(110,2,'São José da Laje'),(111,2,'São José da Tapera'),(112,2,'São Luís do Quitunde'),(113,2,'São Miguel dos Campos'),(114,2,'São Miguel dos Milagres'),(115,2,'São Sebastião'),(116,2,'Satuba'),(117,2,'Senador Rui Palmeira'),(118,2,'Tanque d`Arca'),(119,2,'Taquarana'),(120,2,'Teotônio Vilela'),(121,2,'Traipu'),(122,2,'União dos Palmares'),(123,2,'Viçosa'),(124,3,'Amapá'),(125,3,'Calçoene'),(126,3,'Cutias'),(127,3,'Ferreira Gomes'),(128,3,'Itaubal'),(129,3,'Laranjal do Jari'),(130,3,'Macapá'),(131,3,'Mazagão'),(132,3,'Oiapoque'),(133,3,'Pedra Branca do Amaparí'),(134,3,'Porto Grande'),(135,3,'Pracuúba'),(136,3,'Santana'),(137,3,'Serra do Navio'),(138,3,'Tartarugalzinho'),(139,3,'Vitória do Jari'),(140,4,'Alvarães'),(141,4,'Amaturá'),(142,4,'namã'),(143,4,'Anori'),(144,4,'Apuí'),(145,4,'Atalaia do Norte'),(146,4,'Autazes'),(147,4,'Barcelos'),(148,4,'Barreirinha'),(149,4,'Benjamin Constant'),(150,4,'Beruri'),(151,4,'Boa Vista do Ramos'),(152,4,'Boca do Acre'),(153,4,'Borba'),(154,4,'Caapiranga'),(155,4,'Canutama'),(156,4,'Carauari'),(157,4,'Careiro'),(158,4,'Careiro da Várzea'),(159,4,'Coari'),(160,4,'Codajás'),(161,4,'Eirunepé'),(162,4,'Envira'),(163,4,'Fonte Boa'),(164,4,'Guajará'),(165,4,'Humaitá'),(166,4,'Ipixuna'),(167,4,'Iranduba'),(168,4,'Itacoatiara'),(169,4,'Itamarati'),(170,4,'Itapiranga'),(171,4,'Japurá'),(172,4,'Juruá'),(173,4,'Jutaí'),(174,4,'Lábrea'),(175,4,'Manacapuru'),(176,4,'Manaquiri'),(177,4,'Manaus'),(178,4,'Manicoré'),(179,4,'Maraã'),(180,4,'Maués'),(181,4,'Nhamundá'),(182,4,'Nova Olinda do Norte'),(183,4,'Novo Airão'),(184,4,'Novo Aripuanã'),(185,4,'Parintins'),(186,4,'Pauini'),(187,4,'Presidente Figueiredo'),(188,4,'Rio Preto da Eva'),(189,4,'Santa Isabel do Rio Negro'),(190,4,'Santo Antônio do Içá'),(191,4,'São Gabriel da Cachoeira'),(192,4,'São Paulo de Olivença'),(193,4,'São Sebastião do Uatumã'),(194,4,'Silves'),(195,4,'Tabatinga'),(196,4,'Tapauá'),(197,4,'Tefé'),(198,4,'Tonantins'),(199,4,'Uarini'),(200,4,'Urucará'),(201,4,'Urucurituba'),(202,5,'Abaíra'),(203,5,'Abaré'),(204,5,'Acajutiba'),(205,5,'Adustina'),(206,5,'Água Fria'),(207,5,'Aiquara'),(208,5,'Alagoinhas'),(209,5,'Alcobaça'),(210,5,'Almadina'),(211,5,'Amargosa'),(212,5,'Amélia Rodrigues'),(213,5,'América Dourada'),(214,5,'Anagé'),(215,5,'Andaraí'),(216,5,'Andorinha'),(217,5,'Angical'),(218,5,'Anguera'),(219,5,'Antas'),(220,5,'Antônio Cardoso'),(221,5,'Antônio Gonçalves'),(222,5,'Aporá'),(223,5,'Apuarema'),(224,5,'Araças'),(225,5,'Aracatu'),(226,5,'Araci'),(227,5,'Aramari'),(228,5,'Arataca'),(229,5,'Aratuípe'),(230,5,'Aurelino Leal'),(231,5,'Baianópolis'),(232,5,'Baixa Grande'),(233,5,'Banzaê'),(234,5,'Barra'),(235,5,'Barra da Estiva'),(236,5,'Barra do Choça'),(237,5,'Barra do Mendes'),(238,5,'Barra do Rocha'),(239,5,'Barreiras'),(240,5,'Barro Alto'),(241,5,'Belmonte'),(242,5,'Belo Campo'),(243,5,'Biritinga'),(244,5,'Boa Nova'),(245,5,'Boa Vista do Tupim'),(246,5,'Bom Jesus da Lapa'),(247,5,'Bom Jesus da Serra'),(248,5,'Boninal'),(249,5,'Bonito'),(250,5,'Boquira'),(251,5,'Botuporã'),(252,5,'Brejões'),(253,5,'Brejolândia'),(254,5,'Brotas de Macaúbas'),(255,5,'Brumado'),(256,5,'Buerarema'),(257,5,'Buritirama'),(258,5,'Caatiba'),(259,5,'Cabaceiras do Paraguaçu'),(260,5,'Cachoeira'),(261,5,'Caculé'),(262,5,'Caém'),(263,5,'Caetanos'),(264,5,'Caetité'),(265,5,'Cafarnaum'),(266,5,'Cairu'),(267,5,'Caldeirão Grande'),(268,5,'Camacan'),(269,5,'Camaçari'),(270,5,'Camamu'),(271,5,'Campo Alegre de Lourdes'),(272,5,'Campo Formoso'),(273,5,'Canápolis'),(274,5,'Canarana'),(275,5,'Canavieiras'),(276,5,'Candeal'),(277,5,'Candeias'),(278,5,'Candiba'),(279,5,'Cândido Sales'),(280,5,'Cansanção'),(281,5,'Canudos'),(282,5,'Capela do Alto Alegre'),(283,5,'Capim Grosso'),(284,5,'Caraíbas'),(285,5,'Caravelas'),(286,5,'Cardeal da Silva'),(287,5,'Carinhanha'),(288,5,'Casa Nova'),(289,5,'Castro Alves'),(290,5,'Catolândia'),(291,5,'Catu'),(292,5,'Caturama'),(293,5,'Central'),(294,5,'Chorrochó'),(295,5,'Cícero Dantas'),(296,5,'Cipó'),(297,5,'Coaraci'),(298,5,'Cocos'),(299,5,'Conceição da Feira'),(300,5,'Conceição do Almeida'),(301,5,'Conceição do Coité'),(302,5,'Conceição do Jacuípe'),(303,5,'Conde'),(304,5,'Condeúba'),(305,5,'Contendas do Sincorá'),(306,5,'Coração de Maria'),(307,5,'Cordeiros'),(308,5,'Coribe'),(309,5,'Coronel João Sá'),(310,5,'Correntina'),(311,5,'Cotegipe'),(312,5,'Cravolândia'),(313,5,'Crisópolis'),(314,5,'Cristópolis'),(315,5,'Cruz das Almas'),(316,5,'Curaçá'),(317,5,'Dário Meira'),(318,5,'Dias d`Ávila'),(319,5,'Dom Basílio'),(320,5,'Dom Macedo Costa'),(321,5,'Elísio Medrado'),(322,5,'Encruzilhada'),(323,5,'Entre Rios'),(324,5,'Érico Cardoso'),(325,5,'Esplanada'),(326,5,'Euclides da Cunha'),(327,5,'Eunápolis'),(328,5,'Fátima'),(329,5,'Feira da Mata'),(330,5,'Feira de Santana'),(331,5,'Filadélfia'),(332,5,'Firmino Alves'),(333,5,'Floresta Azul'),(334,5,'Formosa do Rio Preto'),(335,5,'Gandu'),(336,5,'Gavião'),(337,5,'Gentio do Ouro'),(338,5,'Glória'),(339,5,'Gongogi'),(340,5,'Governador Lomanto Júnior'),(341,5,'Governador Mangabeira'),(342,5,'Guajeru'),(343,5,'Guanambi'),(344,5,'Guaratinga'),(345,5,'Heliópolis'),(346,5,'Iaçu'),(347,5,'Ibiassucê'),(348,5,'Ibicaraí'),(349,5,'Ibicoara'),(350,5,'Ibicuí'),(351,5,'Ibipeba'),(352,5,'Ibipitanga'),(353,5,'Ibiquera'),(354,5,'Ibirapitanga'),(355,5,'Ibirapuã'),(356,5,'Ibirataia'),(357,5,'Ibitiara'),(358,5,'Ibititá'),(359,5,'Ibotirama'),(360,5,'Ichu'),(361,5,'Igaporã'),(362,5,'Igrapiúna'),(363,5,'Iguaí'),(364,5,'Ilhéus'),(365,5,'Inhambupe'),(366,5,'Ipecaetá'),(367,5,'Ipiaú'),(368,5,'Ipirá'),(369,5,'Ipupiara'),(370,5,'Irajuba'),(371,5,'Iramaia'),(372,5,'Iraquara'),(373,5,'Irará'),(374,5,'Irecê'),(375,5,'Itabela'),(376,5,'Itaberaba'),(377,5,'Itabuna'),(378,5,'Itacaré'),(379,5,'Itaeté'),(380,5,'Itagi'),(381,5,'Itagibá'),(382,5,'Itagimirim'),(383,5,'Itaguaçu da Bahia'),(384,5,'Itaju do Colônia'),(385,5,'Itajuípe'),(386,5,'Itamaraju'),(387,5,'Itamari'),(388,5,'Itambé'),(389,5,'Itanagra'),(390,5,'Itanhém'),(391,5,'Itaparica'),(392,5,'Itapé'),(393,5,'Itapebi'),(394,5,'Itapetinga'),(395,5,'Itapicuru'),(396,5,'Itapitanga'),(397,5,'Itaquara'),(398,5,'Itarantim'),(399,5,'Itatim'),(400,5,'Itiruçu'),(401,5,'Itiúba'),(402,5,'Itororó'),(403,5,'Ituaçu'),(404,5,'Ituberá'),(405,5,'Iuiú'),(406,5,'Jaborandi'),(407,5,'Jacaraci'),(408,5,'Jacobina'),(409,5,'Jaguaquara'),(410,5,'Jaguarari'),(411,5,'Jaguaripe'),(412,5,'Jandaíra'),(413,5,'Jequié'),(414,5,'Jeremoabo'),(415,5,'Jiquiriçá'),(416,5,'Jitaúna'),(417,5,'João Dourado'),(418,5,'Juazeiro'),(419,5,'Jucuruçu'),(420,5,'Jussara'),(421,5,'Jussari'),(422,5,'Jussiape'),(423,5,'Lafaiete Coutinho'),(424,5,'Lagoa Real'),(425,5,'Laje'),(426,5,'Lajedão'),(427,5,'Lajedinho'),(428,5,'Lajedo do Tabocal'),(429,5,'Lamarão'),(430,5,'Lapão'),(431,5,'Lauro de Freitas'),(432,5,'Lençóis'),(433,5,'Licínio de Almeida'),(434,5,'Livramento de Nossa Senhora'),(435,5,'Macajuba'),(436,5,'Macarani'),(437,5,'Macaúbas'),(438,5,'Macururé'),(439,5,'Madre de Deus'),(440,5,'Maetinga'),(441,5,'Maiquinique'),(442,5,'Mairi'),(443,5,'Malhada'),(444,5,'Malhada de Pedras'),(445,5,'Manoel Vitorino'),(446,5,'Mansidão'),(447,5,'Maracás'),(448,5,'Maragogipe'),(449,5,'Maraú'),(450,5,'Marcionílio Souza'),(451,5,'Mascote'),(452,5,'Mata de São João'),(453,5,'Matina'),(454,5,'Medeiros Neto'),(455,5,'Miguel Calmon'),(456,5,'Milagres'),(457,5,'Mirangaba'),(458,5,'Mirante'),(459,5,'Monte Santo'),(460,5,'Morpará'),(461,5,'Morro do Chapéu'),(462,5,'Mortugaba'),(463,5,'Mucugê'),(464,5,'Mucuri'),(465,5,'Mulungu do Morro'),(466,5,'Mundo Novo'),(467,5,'Muniz Ferreira'),(468,5,'Muquém de São Francisco'),(469,5,'Muritiba'),(470,5,'Mutuípe'),(471,5,'Nazaré'),(472,5,'Nilo Peçanha'),(473,5,'Nordestina'),(474,5,'Nova Canaã'),(475,5,'Nova Fátima'),(476,5,'Nova Ibiá'),(477,5,'Nova Itarana'),(478,5,'Nova Redenção'),(479,5,'Nova Soure'),(480,5,'Nova Viçosa'),(481,5,'Novo Horizonte'),(482,5,'Novo Triunfo'),(483,5,'Olindina'),(484,5,'Oliveira dos Brejinhos'),(485,5,'Ouriçangas'),(486,5,'Ourolândia'),(487,5,'Palmas de Monte Alto'),(488,5,'Palmeiras'),(489,5,'Paramirim'),(490,5,'Paratinga'),(491,5,'Paripiranga'),(492,5,'Pau Brasil'),(493,5,'Paulo Afonso'),(494,5,'Pé de Serra'),(495,5,'Pedrão'),(496,5,'Pedro Alexandre'),(497,5,'Piatã'),(498,5,'Pilão Arcado'),(499,5,'Pindaí'),(500,5,'Pindobaçu'),(501,5,'Pintadas'),(502,5,'Piraí do Norte'),(503,5,'Piripá'),(504,5,'Piritiba'),(505,5,'Planaltino'),(506,5,'Planalto'),(507,5,'Poções'),(508,5,'Pojuca'),(509,5,'Ponto Novo'),(510,5,'Porto Seguro'),(511,5,'Potiraguá'),(512,5,'Prado'),(513,5,'Presidente Dutra'),(514,5,'Presidente Jânio Quadros'),(515,5,'Presidente Tancredo Neves'),(516,5,'Queimadas'),(517,5,'Quijingue'),(518,5,'Quixabeira'),(519,5,'Rafael Jambeiro'),(520,5,'Remanso'),(521,5,'Retirolândia'),(522,5,'Riachão das Neves'),(523,5,'Riachão do Jacuípe'),(524,5,'Riacho de Santana'),(525,5,'Ribeira do Amparo'),(526,5,'Ribeira do Pombal'),(527,5,'Ribeirão do Largo'),(528,5,'Rio de Contas'),(529,5,'Rio do Antônio'),(530,5,'Rio do Pires'),(531,5,'Rio Real'),(532,5,'Rodelas'),(533,5,'Ruy Barbosa'),(534,5,'Salinas da Margarida'),(535,5,'Salvador'),(536,5,'Santa Bárbara'),(537,5,'Santa Brígida'),(538,5,'Santa Cruz Cabrália'),(539,5,'Santa Cruz da Vitória'),(540,5,'Santa Inês'),(541,5,'Santa Luzia'),(542,5,'Santa Maria da Vitória'),(543,5,'Santa Rita de Cássia'),(544,5,'Santa Teresinha'),(545,5,'Santaluz'),(546,5,'Santana'),(547,5,'Santanópolis'),(548,5,'Santo Amaro'),(549,5,'Santo Antônio de Jesus'),(550,5,'Santo Estêvão'),(551,5,'São Desidério'),(552,5,'São Domingos'),(553,5,'São Felipe'),(554,5,'São Félix'),(555,5,'São Félix do Coribe'),(556,5,'São Francisco do Conde'),(557,5,'São Gabriel'),(558,5,'São Gonçalo dos Campos'),(559,5,'São José da Vitória'),(560,5,'São José do Jacuípe'),(561,5,'São Miguel das Matas'),(562,5,'São Sebastião do Passé'),(563,5,'Sapeaçu'),(564,5,'Sátiro Dias'),(565,5,'Saubara'),(566,5,'Saúde'),(567,5,'Seabra'),(568,5,'Sebastião Laranjeiras'),(569,5,'Senhor do Bonfim'),(570,5,'Sento Sé'),(571,5,'Serra do Ramalho'),(572,5,'Serra Dourada'),(573,5,'Serra Preta'),(574,5,'Serrinha'),(575,5,'Serrolândia'),(576,5,'Simões Filho'),(577,5,'Sítio do Mato'),(578,5,'Sítio do Quinto'),(579,5,'Sobradinho'),(580,5,'Souto Soares'),(581,5,'Tabocas do Brejo Velho'),(582,5,'Tanhaçu'),(583,5,'Tanque Novo'),(584,5,'Tanquinho'),(585,5,'Taperoá'),(586,5,'Tapiramutá'),(587,5,'Teixeira de Freitas'),(588,5,'Teodoro Sampaio'),(589,5,'Teofilândia'),(590,5,'Teolândia'),(591,5,'Terra Nova'),(592,5,'Tremedal'),(593,5,'Tucano'),(594,5,'Uauá'),(595,5,'Ubaíra'),(596,5,'Ubaitaba'),(597,5,'Ubatã'),(598,5,'Uibaí'),(599,5,'Umburanas'),(600,5,'Una'),(601,5,'Urandi'),(602,5,'Uruçuca'),(603,5,'Utinga'),(604,5,'Valença'),(605,5,'Valente'),(606,5,'Várzea da Roça'),(607,5,'Várzea do Poço'),(608,5,'Várzea Nova'),(609,5,'Varzedo'),(610,5,'Vera Cruz'),(611,5,'Vereda'),(612,5,'Vitória da Conquista'),(613,5,'Wagner'),(614,5,'Wanderley'),(615,5,'Wenceslau Guimarães'),(616,5,'Xique-Xique'),(617,6,'Abaiara'),(618,6,'Acarapé'),(619,6,'Acaraú'),(620,6,'Acopiara'),(621,6,'Aiuaba'),(622,6,'Alcântaras'),(623,6,'Altaneira'),(624,6,'Alto Santo'),(625,6,'Amontada'),(626,6,'Antonina do Norte'),(627,6,'Apuiarés'),(628,6,'Aquiraz'),(629,6,'Aracati'),(630,6,'Aracoiaba'),(631,6,'Ararendá'),(632,6,'Araripe'),(633,6,'Aratuba'),(634,6,'Arneiroz'),(635,6,'Assaré'),(636,6,'Aurora'),(637,6,'Baixio'),(638,6,'Banabuiú'),(639,6,'Barbalha'),(640,6,'Barreira'),(641,6,'Barro'),(642,6,'Barroquinha'),(643,6,'Baturité'),(644,6,'Beberibe'),(645,6,'Bela Cruz'),(646,6,'Boa Viagem'),(647,6,'Brejo Santo'),(648,6,'Camocim'),(649,6,'Campos Sales'),(650,6,'Canindé'),(651,6,'Capistrano'),(652,6,'Caridade'),(653,6,'Cariré'),(654,6,'Caririaçu'),(655,6,'Cariús'),(656,6,'Carnaubal'),(657,6,'Cascavel'),(658,6,'Catarina'),(659,6,'Catunda'),(660,6,'Caucaia'),(661,6,'Cedro'),(662,6,'Chaval'),(663,6,'Choró'),(664,6,'Chorozinho'),(665,6,'Coreaú'),(666,6,'Crateús'),(667,6,'Crato'),(668,6,'Croatá'),(669,6,'Cruz'),(670,6,'Deputado Irapuan Pinheiro'),(671,6,'Ererê'),(672,6,'Eusébio'),(673,6,'Farias Brito'),(674,6,'Forquilha'),(675,6,'Fortaleza'),(676,6,'Fortim'),(677,6,'Frecheirinha'),(678,6,'General Sampaio'),(679,6,'Graça'),(680,6,'Granja'),(681,6,'Granjeiro'),(682,6,'Groaíras'),(683,6,'Guaiúba'),(684,6,'Guaraciaba do Norte'),(685,6,'Guaramiranga'),(686,6,'Hidrolândia'),(687,6,'Horizonte'),(688,6,'Ibaretama'),(689,6,'Ibiapina'),(690,6,'Ibicuitinga'),(691,6,'Icapuí'),(692,6,'Icó'),(693,6,'Iguatu'),(694,6,'Independência'),(695,6,'Ipaporanga'),(696,6,'Ipaumirim'),(697,6,'Ipu'),(698,6,'Ipueiras'),(699,6,'Iracema'),(700,6,'Irauçuba'),(701,6,'Itaiçaba'),(702,6,'Itaitinga'),(703,6,'Itapagé'),(704,6,'Itapipoca'),(705,6,'Itapiúna'),(706,6,'Itarema'),(707,6,'Itatira'),(708,6,'Jaguaretama'),(709,6,'Jaguaribara'),(710,6,'Jaguaribe'),(711,6,'Jaguaruana'),(712,6,'Jardim'),(713,6,'Jati'),(714,6,'Jijoca de Jericoacoara'),(715,6,'Juazeiro do Norte'),(716,6,'Jucás'),(717,6,'Lavras da Mangabeira'),(718,6,'Limoeiro do Norte'),(719,6,'Madalena'),(720,6,'Maracanaú'),(721,6,'Maranguape'),(722,6,'Marco'),(723,6,'Martinópole'),(724,6,'Massapê'),(725,6,'Mauriti'),(726,6,'Meruoca'),(727,6,'Milagres'),(728,6,'Milhã'),(729,6,'Miraíma'),(730,6,'Missão Velha'),(731,6,'Mombaça'),(732,6,'Monsenhor Tabosa'),(733,6,'Morada Nova'),(734,6,'Moraújo'),(735,6,'Morrinhos'),(736,6,'Mucambo'),(737,6,'Mulungu'),(738,6,'Nova Olinda'),(739,6,'Nova Russas'),(740,6,'Novo Oriente'),(741,6,'Ocara'),(742,6,'Orós'),(743,6,'Pacajus'),(744,6,'Pacatuba'),(745,6,'Pacoti'),(746,6,'Pacujá'),(747,6,'Palhano'),(748,6,'Palmácia'),(749,6,'Paracuru'),(750,6,'Paraipaba'),(751,6,'Parambu'),(752,6,'Paramoti'),(753,6,'Pedra Branca'),(754,6,'Penaforte'),(755,6,'Pentecoste'),(756,6,'Pereiro'),(757,6,'Pindoretama'),(758,6,'Piquet Carneiro'),(759,6,'Pires Ferreira'),(760,6,'Poranga'),(761,6,'Porteiras'),(762,6,'Potengi'),(763,6,'Potiretama'),(764,6,'Quiterianópolis'),(765,6,'Quixadá'),(766,6,'Quixelô'),(767,6,'Quixeramobim'),(768,6,'Quixeré'),(769,6,'Redenção'),(770,6,'Reriutaba'),(771,6,'Russas'),(772,6,'Saboeiro'),(773,6,'Salitre'),(774,6,'Santa Quitéria'),(775,6,'Santana do Acaraú'),(776,6,'Santana do Cariri'),(777,6,'São Benedito'),(778,6,'São Gonçalo do Amarante'),(779,6,'São João do Jaguaribe'),(780,6,'São Luís do Curu'),(781,6,'Senador Pompeu'),(782,6,'Senador Sá'),(783,6,'Sobral'),(784,6,'Solonópole'),(785,6,'Tabuleiro do Norte'),(786,6,'Tamboril'),(787,6,'Tarrafas'),(788,6,'Tauá'),(789,6,'Tejuçuoca'),(790,6,'Tianguá'),(791,6,'Trairi'),(792,6,'Tururu'),(793,6,'Ubajara'),(794,6,'Umari'),(795,6,'Umirim'),(796,6,'Uruburetama'),(797,6,'Uruoca'),(798,6,'Varjota'),(799,6,'Várzea Alegre'),(800,6,'Viçosa do Ceará'),(801,7,'Brasília'),(802,8,'Afonso Cláudio'),(803,8,'Água Doce do Norte'),(804,8,'Águia Branca'),(805,8,'Alegre'),(806,8,'Alfredo Chaves'),(807,8,'Alto Rio Novo'),(808,8,'Anchieta'),(809,8,'Apiacá'),(810,8,'Aracruz'),(811,8,'Atilio Vivacqua'),(812,8,'Baixo Guandu'),(813,8,'Barra de São Francisco'),(814,8,'Boa Esperança'),(815,8,'Bom Jesus do Norte'),(816,8,'Brejetuba'),(817,8,'Cachoeiro de Itapemirim'),(818,8,'Cariacica'),(819,8,'Castelo'),(820,8,'Colatina'),(821,8,'Conceição da Barra'),(822,8,'Conceição do Castelo'),(823,8,'Divino de São Lourenço'),(824,8,'Domingos Martins'),(825,8,'Dores do Rio Preto'),(826,8,'Ecoporanga'),(827,8,'Fundão'),(828,8,'Guaçuí'),(829,8,'Guarapari'),(830,8,'Ibatiba'),(831,8,'Ibiraçu'),(832,8,'Ibitirama'),(833,8,'Iconha'),(834,8,'Irupi'),(835,8,'Itaguaçu'),(836,8,'Itapemirim'),(837,8,'Itarana'),(838,8,'Iúna'),(839,8,'Jaguaré'),(840,8,'Jerônimo Monteiro'),(841,8,'João Neiva'),(842,8,'Laranja da Terra'),(843,8,'Linhares'),(844,8,'Mantenópolis'),(845,8,'Marataízes'),(846,8,'Marechal Floriano'),(847,8,'Marilândia'),(848,8,'Mimoso do Sul'),(849,8,'Montanha'),(850,8,'Mucurici'),(851,8,'Muniz Freire'),(852,8,'Muqui'),(853,8,'Nova Venécia'),(854,8,'Pancas'),(855,8,'Pedro Canário'),(856,8,'Pinheiros'),(857,8,'Piúma'),(858,8,'Ponto Belo'),(859,8,'Presidente Kennedy'),(860,8,'Rio Bananal'),(861,8,'Rio Novo do Sul'),(862,8,'Santa Leopoldina'),(863,8,'Santa Maria de Jetibá'),(864,8,'Santa Teresa'),(865,8,'São Domingos do Norte'),(866,8,'São Gabriel da Palha'),(867,8,'São José do Calçado'),(868,8,'São Mateus'),(869,8,'São Roque do Canaã'),(870,8,'Serra'),(871,8,'Sooretama'),(872,8,'Vargem Alta'),(873,8,'Venda Nova do Imigrante'),(874,8,'Viana'),(875,8,'Vila Pavão'),(876,8,'Vila Valério'),(877,8,'Vila Velha'),(878,8,'Vitória'),(879,9,'Abadia de Goiás'),(880,9,'Abadiânia'),(881,9,'Acreúna'),(882,9,'Adelândia'),(883,9,'Água Fria de Goiás'),(884,9,'Água Limpa'),(885,9,'Águas Lindas de Goiás'),(886,9,'Alexânia'),(887,9,'Aloândia'),(888,9,'Alto Horizonte'),(889,9,'Alto Paraíso de Goiás'),(890,9,'Alvorada do Norte'),(891,9,'Amaralina'),(892,9,'Americano do Brasil'),(893,9,'Amorinópolis'),(894,9,'Anápolis'),(895,9,'Anhanguera'),(896,9,'Anicuns'),(897,9,'Aparecida de Goiânia'),(898,9,'Aparecida do Rio Doce'),(899,9,'Aporé'),(900,9,'Araçu'),(901,9,'Aragarças'),(902,9,'Aragoiânia'),(903,9,'Araguapaz'),(904,9,'Arenópolis'),(905,9,'Aruanã'),(906,9,'Aurilândia'),(907,9,'Avelinópolis'),(908,9,'Baliza'),(909,9,'Barro Alto'),(910,9,'Bela Vista de Goiás'),(911,9,'Bom Jardim de Goiás'),(912,9,'Bom Jesus de Goiás'),(913,9,'Bonfinópolis'),(914,9,'Bonópolis'),(915,9,'Brazabrantes'),(916,9,'Britânia'),(917,9,'Buriti Alegre'),(918,9,'Buriti de Goiás'),(919,9,'Buritinópolis'),(920,9,'Cabeceiras'),(921,9,'Cachoeira Alta'),(922,9,'Cachoeira de Goiás'),(923,9,'Cachoeira Dourada'),(924,9,'Caçu'),(925,9,'Caiapônia'),(926,9,'Caldas Novas'),(927,9,'Caldazinha'),(928,9,'Campestre de Goiás'),(929,9,'Campinaçu'),(930,9,'Campinorte'),(931,9,'Campo Alegre de Goiás'),(932,9,'Campos Belos'),(933,9,'Campos Verdes'),(934,9,'Carmo do Rio Verde'),(935,9,'Castelândia'),(936,9,'Catalão'),(937,9,'Caturaí'),(938,9,'Cavalcante'),(939,9,'Ceres'),(940,9,'Cezarina'),(941,9,'Chapadão do Céu'),(942,9,'Cidade Ocidental'),(943,9,'Cocalzinho de Goiás'),(944,9,'Colinas do Sul'),(945,9,'Córrego do Ouro'),(946,9,'Corumbá de Goiás'),(947,9,'Corumbaíba'),(948,9,'Cristalina'),(949,9,'Cristianópolis'),(950,9,'Crixás'),(951,9,'Cromínia'),(952,9,'Cumari'),(953,9,'Damianópolis'),(954,9,'Damolândia'),(955,9,'Davinópolis'),(956,9,'Diorama'),(957,9,'Divinópolis de Goiás'),(958,9,'Doverlândia'),(959,9,'Edealina'),(960,9,'Edéia'),(961,9,'Estrela do Norte'),(962,9,'Faina'),(963,9,'Fazenda Nova'),(964,9,'Firminópolis'),(965,9,'Flores de Goiás'),(966,9,'Formosa'),(967,9,'Formoso'),(968,9,'Goianápolis'),(969,9,'Goiandira'),(970,9,'Goianésia'),(971,9,'Goiânia'),(972,9,'Goianira'),(973,9,'Goiás'),(974,9,'Goiatuba'),(975,9,'Gouvelândia'),(976,9,'Guapó'),(977,9,'Guaraíta'),(978,9,'Guarani de Goiás'),(979,9,'Guarinos'),(980,9,'Heitoraí'),(981,9,'Hidrolândia'),(982,9,'Hidrolina'),(983,9,'Iaciara'),(984,9,'Inaciolândia'),(985,9,'Indiara'),(986,9,'Inhumas'),(987,9,'Ipameri'),(988,9,'Iporá'),(989,9,'Israelândia'),(990,9,'Itaberaí'),(991,9,'Itaguari'),(992,9,'Itaguaru'),(993,9,'Itajá'),(994,9,'Itapaci'),(995,9,'Itapirapuã'),(996,9,'Itapuranga'),(997,9,'Itarumã'),(998,9,'Itauçu'),(999,9,'Itumbiara'),(1000,9,'Ivolândia'),(1001,9,'Jandaia'),(1002,9,'Jaraguá'),(1003,9,'Jataí'),(1004,9,'Jaupaci'),(1005,9,'Jesúpolis'),(1006,9,'Joviânia'),(1007,9,'Jussara'),(1008,9,'Leopoldo de Bulhões'),(1009,9,'Luziânia'),(1010,9,'Mairipotaba'),(1011,9,'Mambaí'),(1012,9,'Mara Rosa'),(1013,9,'Marzagão'),(1014,9,'Matrinchã'),(1015,9,'Maurilândia'),(1016,9,'Mimoso de Goiás'),(1017,9,'Minaçu'),(1018,9,'Mineiros'),(1019,9,'Moiporá'),(1020,9,'Monte Alegre de Goiás'),(1021,9,'Montes Claros de Goiás'),(1022,9,'Montividiu'),(1023,9,'Montividiu do Norte'),(1024,9,'Morrinhos'),(1025,9,'Morro Agudo de Goiás'),(1026,9,'Mossâmedes'),(1027,9,'Mozarlândia'),(1028,9,'Mundo Novo'),(1029,9,'Mutunópolis'),(1030,9,'Nazário'),(1031,9,'Nerópolis'),(1032,9,'Niquelândia'),(1033,9,'Nova América'),(1034,9,'Nova Aurora'),(1035,9,'Nova Crixás'),(1036,9,'Nova Glória'),(1037,9,'Nova Iguaçu de Goiás'),(1038,9,'Nova Roma'),(1039,9,'Nova Veneza'),(1040,9,'Novo Brasil'),(1041,9,'Novo Gama'),(1042,9,'Novo Planalto'),(1043,9,'Orizona'),(1044,9,'Ouro Verde de Goiás'),(1045,9,'Ouvidor'),(1046,9,'Padre Bernardo'),(1047,9,'Palestina de Goiás'),(1048,9,'Palmeiras de Goiás'),(1049,9,'Palmelo'),(1050,9,'Palminópolis'),(1051,9,'Panamá'),(1052,9,'Paranaiguara'),(1053,9,'Paraúna'),(1054,9,'Perolândia'),(1055,9,'Petrolina de Goiás'),(1056,9,'Pilar de Goiás'),(1057,9,'Piracanjuba'),(1058,9,'Piranhas'),(1059,9,'Pirenópolis'),(1060,9,'Pires do Rio'),(1061,9,'Planaltina'),(1062,9,'Pontalina'),(1063,9,'Porangatu'),(1064,9,'Porteirão'),(1065,9,'Portelândia'),(1066,9,'Posse'),(1067,9,'Professor Jamil'),(1068,9,'Quirinópolis'),(1069,9,'Rialma'),(1070,9,'Rianápolis'),(1071,9,'Rio Quente'),(1072,9,'Rio Verde'),(1073,9,'Rubiataba'),(1074,9,'Sanclerlândia'),(1075,9,'Santa Bárbara de Goiás'),(1076,9,'Santa Cruz de Goiás'),(1077,9,'Santa Fé de Goiás'),(1078,9,'Santa Helena de Goiás'),(1079,9,'Santa Isabel'),(1080,9,'Santa Rita do Araguaia'),(1081,9,'Santa Rita do Novo Destino'),(1082,9,'Santa Rosa de Goiás'),(1083,9,'Santa Tereza de Goiás'),(1084,9,'Santa Terezinha de Goiás'),(1085,9,'Santo Antônio da Barra'),(1086,9,'Santo Antônio de Goiás'),(1087,9,'Santo Antônio do Descoberto'),(1088,9,'São Domingos'),(1089,9,'São Francisco de Goiás'),(1090,9,'São João d`Aliança'),(1091,9,'São João da Paraúna'),(1092,9,'São Luís de Montes Belos'),(1093,9,'São Luíz do Norte'),(1094,9,'São Miguel do Araguaia'),(1095,9,'São Miguel do Passa Quatro'),(1096,9,'São Patrício'),(1097,9,'São Simão'),(1098,9,'Senador Canedo'),(1099,9,'Serranópolis'),(1100,9,'Silvânia'),(1101,9,'Simolândia'),(1102,9,'Sítio d`Abadia'),(1103,9,'Taquaral de Goiás'),(1104,9,'Teresina de Goiás'),(1105,9,'Terezópolis de Goiás'),(1106,9,'Três Ranchos'),(1107,9,'Trindade'),(1108,9,'Trombas'),(1109,9,'Turvânia'),(1110,9,'Turvelândia'),(1111,9,'Uirapuru'),(1112,9,'Uruaçu'),(1113,9,'Uruana'),(1114,9,'Urutaí'),(1115,9,'Valparaíso de Goiás'),(1116,9,'Varjão'),(1117,9,'Vianópolis'),(1118,9,'Vicentinópolis'),(1119,9,'Vila Boa'),(1120,9,'Vila Propício'),(1121,10,'Açailândia'),(1122,10,'Afonso Cunha'),(1123,10,'Água Doce do Maranhão'),(1124,10,'Alcântara'),(1125,10,'Aldeias Altas'),(1126,10,'Altamira do Maranhão'),(1127,10,'Alto Alegre do Maranhão'),(1128,10,'Alto Alegre do Pindaré'),(1129,10,'Alto Parnaíba'),(1130,10,'Amapá do Maranhão'),(1131,10,'Amarante do Maranhão'),(1132,10,'Anajatuba'),(1133,10,'Anapurus'),(1134,10,'Apicum-Açu'),(1135,10,'Araguanã'),(1136,10,'Araioses'),(1137,10,'Arame'),(1138,10,'Arari'),(1139,10,'Axixá'),(1140,10,'Bacabal'),(1141,10,'Bacabeira'),(1142,10,'Bacuri'),(1143,10,'Bacurituba'),(1144,10,'Balsas'),(1145,10,'Barão de Grajaú'),(1146,10,'Barra do Corda'),(1147,10,'Barreirinhas'),(1148,10,'Bela Vista do Maranhão'),(1149,10,'Belágua'),(1150,10,'Benedito Leite'),(1151,10,'Bequimão'),(1152,10,'Bernardo do Mearim'),(1153,10,'Boa Vista do Gurupi'),(1154,10,'Bom Jardim'),(1155,10,'Bom Jesus das Selvas'),(1156,10,'Bom Lugar'),(1157,10,'Brejo'),(1158,10,'Brejo de Areia'),(1159,10,'Buriti'),(1160,10,'Buriti Bravo'),(1161,10,'Buriticupu'),(1162,10,'Buritirana'),(1163,10,'Cachoeira Grande'),(1164,10,'Cajapió'),(1165,10,'Cajari'),(1166,10,'Campestre do Maranhão'),(1167,10,'Cândido Mendes'),(1168,10,'Cantanhede'),(1169,10,'Capinzal do Norte'),(1170,10,'Carolina'),(1171,10,'Carutapera'),(1172,10,'Caxias'),(1173,10,'Cedral'),(1174,10,'Central do Maranhão'),(1175,10,'Centro do Guilherme'),(1176,10,'Centro Novo do Maranhão'),(1177,10,'Chapadinha'),(1178,10,'Cidelândia'),(1179,10,'Codó'),(1180,10,'Coelho Neto'),(1181,10,'Colinas'),(1182,10,'Conceição do Lago-Açu'),(1183,10,'Coroatá'),(1184,10,'Cururupu'),(1185,10,'Davinópolis'),(1186,10,'Dom Pedro'),(1187,10,'Duque Bacelar'),(1188,10,'Esperantinópolis'),(1189,10,'Estreito'),(1190,10,'Feira Nova do Maranhão'),(1191,10,'Fernando Falcão'),(1192,10,'Formosa da Serra Negra'),(1193,10,'Fortaleza dos Nogueiras'),(1194,10,'Fortuna'),(1195,10,'Godofredo Viana'),(1196,10,'Gonçalves Dias'),(1197,10,'Governador Archer'),(1198,10,'Governador Edison Lobão'),(1199,10,'Governador Eugênio Barros'),(1200,10,'Governador Luiz Rocha'),(1201,10,'Governador Newton Bello'),(1202,10,'Governador Nunes Freire'),(1203,10,'Graça Aranha'),(1204,10,'Grajaú'),(1205,10,'Guimarães'),(1206,10,'Humberto de Campos'),(1207,10,'Icatu'),(1208,10,'Igarapé do Meio'),(1209,10,'Igarapé Grande'),(1210,10,'Imperatriz'),(1211,10,'Itaipava do Grajaú'),(1212,10,'Itapecuru Mirim'),(1213,10,'Itinga do Maranhão'),(1214,10,'Jatobá'),(1215,10,'Jenipapo dos Vieiras'),(1216,10,'João Lisboa'),(1217,10,'Joselândia'),(1218,10,'Junco do Maranhão'),(1219,10,'Lago da Pedra'),(1220,10,'Lago do Junco'),(1221,10,'Lago dos Rodrigues'),(1222,10,'Lago Verde'),(1223,10,'Lagoa do Mato'),(1224,10,'Lagoa Grande do Maranhão'),(1225,10,'Lajeado Novo'),(1226,10,'Lima Campos'),(1227,10,'Loreto'),(1228,10,'Luís Domingues'),(1229,10,'Magalhães de Almeida'),(1230,10,'Maracaçumé'),(1231,10,'Marajá do Sena'),(1232,10,'Maranhãozinho'),(1233,10,'Mata Roma'),(1234,10,'Matinha'),(1235,10,'Matões'),(1236,10,'Matões do Norte'),(1237,10,'Milagres do Maranhão'),(1238,10,'Mirador'),(1239,10,'Miranda do Norte'),(1240,10,'Mirinzal'),(1241,10,'Monção'),(1242,10,'Montes Altos'),(1243,10,'Morros'),(1244,10,'Nina Rodrigues'),(1245,10,'Nova Colinas'),(1246,10,'Nova Iorque'),(1247,10,'Nova Olinda do Maranhão'),(1248,10,'Olho d`Água das Cunhãs'),(1249,10,'Olinda Nova do Maranhão'),(1250,10,'Paço do Lumiar'),(1251,10,'Palmeirândia'),(1252,10,'Paraibano'),(1253,10,'Parnarama'),(1254,10,'Passagem Franca'),(1255,10,'Pastos Bons'),(1256,10,'Paulino Neves'),(1257,10,'Paulo Ramos'),(1258,10,'Pedreiras'),(1259,10,'Pedro do Rosário'),(1260,10,'Penalva'),(1261,10,'Peri Mirim'),(1262,10,'Peritoró'),(1263,10,'Pindaré-Mirim'),(1264,10,'Pinheiro'),(1265,10,'Pio XII'),(1266,10,'Pirapemas'),(1267,10,'Poção de Pedras'),(1268,10,'Porto Franco'),(1269,10,'Porto Rico do Maranhão'),(1270,10,'Presidente Dutra'),(1271,10,'Presidente Juscelino'),(1272,10,'Presidente Médici'),(1273,10,'Presidente Sarney'),(1274,10,'Presidente Vargas'),(1275,10,'Primeira Cruz'),(1276,10,'Raposa'),(1277,10,'Riachão'),(1278,10,'Ribamar Fiquene'),(1279,10,'Rosário'),(1280,10,'Sambaíba'),(1281,10,'Santa Filomena do Maranhão'),(1282,10,'Santa Helena'),(1283,10,'Santa Inês'),(1284,10,'Santa Luzia'),(1285,10,'Santa Luzia do Paruá'),(1286,10,'Santa Quitéria do Maranhão'),(1287,10,'Santa Rita'),(1288,10,'Santana do Maranhão'),(1289,10,'Santo Amaro do Maranhão'),(1290,10,'Santo Antônio dos Lopes'),(1291,10,'São Benedito do Rio Preto'),(1292,10,'São Bento'),(1293,10,'São Bernardo'),(1294,10,'São Domingos do Azeitão'),(1295,10,'São Domingos do Maranhão'),(1296,10,'São Félix de Balsas'),(1297,10,'São Francisco do Brejão'),(1298,10,'São Francisco do Maranhão'),(1299,10,'São João Batista'),(1300,10,'São João do Carú'),(1301,10,'São João do Paraíso'),(1302,10,'São João do Soter'),(1303,10,'São João dos Patos'),(1304,10,'São José de Ribamar'),(1305,10,'São José dos Basílios'),(1306,10,'São Luís'),(1307,10,'São Luís Gonzaga do Maranhão'),(1308,10,'São Mateus do Maranhão'),(1309,10,'São Pedro da Água Branca'),(1310,10,'São Pedro dos Crentes'),(1311,10,'São Raimundo das Mangabeiras'),(1312,10,'São Raimundo do Doca Bezerra'),(1313,10,'São Roberto'),(1314,10,'São Vicente Ferrer'),(1315,10,'Satubinha'),(1316,10,'Senador Alexandre Costa'),(1317,10,'Senador La Rocque'),(1318,10,'Serrano do Maranhão'),(1319,10,'Sítio Novo'),(1320,10,'Sucupira do Norte'),(1321,10,'Sucupira do Riachão'),(1322,10,'Tasso Fragoso'),(1323,10,'Timbiras'),(1324,10,'Timon'),(1325,10,'Trizidela do Vale'),(1326,10,'Tufilândia'),(1327,10,'Tuntum'),(1328,10,'Turiaçu'),(1329,10,'Turilândia'),(1330,10,'Tutóia'),(1331,10,'Urbano Santos'),(1332,10,'Vargem Grande'),(1333,10,'Viana'),(1334,10,'Vila Nova dos Martírios'),(1335,10,'Vitória do Mearim'),(1336,10,'Vitorino Freire'),(1337,10,'Zé Doca'),(1338,11,'Acorizal'),(1339,11,'Água Boa'),(1340,11,'Alta Floresta'),(1341,11,'Alto Araguaia'),(1342,11,'Alto Boa Vista'),(1343,11,'Alto Garças'),(1344,11,'Alto Paraguai'),(1345,11,'Alto Taquari'),(1346,11,'Apiacás'),(1347,11,'Araguaiana'),(1348,11,'Araguainha'),(1349,11,'Araputanga'),(1350,11,'Arenápolis'),(1351,11,'Aripuanã'),(1352,11,'Barão de Melgaço'),(1353,11,'Barra do Bugres'),(1354,11,'Barra do Garças'),(1355,11,'Brasnorte'),(1356,11,'Cáceres'),(1357,11,'Campinápolis'),(1358,11,'Campo Novo do Parecis'),(1359,11,'Campo Verde'),(1360,11,'Campos de Júlio'),(1361,11,'Canabrava do Norte'),(1362,11,'Canarana'),(1363,11,'Carlinda'),(1364,11,'Castanheira'),(1365,11,'Chapada dos Guimarães'),(1366,11,'Cláudia'),(1367,11,'Cocalinho'),(1368,11,'Colíder'),(1369,11,'Comodoro'),(1370,11,'Confresa'),(1371,11,'Cotriguaçu'),(1372,11,'Cuiabá'),(1373,11,'Denise'),(1374,11,'Diamantino'),(1375,11,'Dom Aquino'),(1376,11,'Feliz Natal'),(1377,11,'Figueirópolis d`Oeste'),(1378,11,'Gaúcha do Norte'),(1379,11,'General Carneiro'),(1380,11,'Glória d`Oeste'),(1381,11,'Guarantã do Norte'),(1382,11,'Guiratinga'),(1383,11,'Indiavaí'),(1384,11,'Itaúba'),(1385,11,'Itiquira'),(1386,11,'Jaciara'),(1387,11,'Jangada'),(1388,11,'Jauru'),(1389,11,'Juara'),(1390,11,'Juína'),(1391,11,'Juruena'),(1392,11,'Juscimeira'),(1393,11,'Lambari d`Oeste'),(1394,11,'Lucas do Rio Verde'),(1395,11,'Luciára'),(1396,11,'Marcelândia'),(1397,11,'Matupá'),(1398,11,'Mirassol d`Oeste'),(1399,11,'Nobres'),(1400,11,'Nortelândia'),(1401,11,'Nossa Senhora do Livramento'),(1402,11,'Nova Bandeirantes'),(1403,11,'Nova Brasilândia'),(1404,11,'Nova Canaã do Norte'),(1405,11,'Nova Guarita'),(1406,11,'Nova Lacerda'),(1407,11,'Nova Marilândia'),(1408,11,'Nova Maringá'),(1409,11,'Nova Monte Verde'),(1410,11,'Nova Mutum'),(1411,11,'Nova Olímpia'),(1412,11,'Nova Ubiratã'),(1413,11,'Nova Xavantina'),(1414,11,'Novo Horizonte do Norte'),(1415,11,'Novo Mundo'),(1416,11,'Novo São Joaquim'),(1417,11,'Paranaíta'),(1418,11,'Paranatinga'),(1419,11,'Pedra Preta'),(1420,11,'Peixoto de Azevedo'),(1421,11,'Planalto da Serra'),(1422,11,'Poconé'),(1423,11,'Pontal do Araguaia'),(1424,11,'Ponte Branca'),(1425,11,'Pontes e Lacerda'),(1426,11,'Porto Alegre do Norte'),(1427,11,'Porto dos Gaúchos'),(1428,11,'Porto Esperidião'),(1429,11,'Porto Estrela'),(1430,11,'Poxoréo'),(1431,11,'Primavera do Leste'),(1432,11,'Querência'),(1433,11,'Reserva do Cabaçal'),(1434,11,'Ribeirão Cascalheira'),(1435,11,'Ribeirãozinho'),(1436,11,'Rio Branco'),(1437,11,'Rondonópolis'),(1438,11,'Rosário Oeste'),(1439,11,'Salto do Céu'),(1440,11,'Santa Carmem'),(1441,11,'Santa Terezinha'),(1442,11,'Santo Afonso'),(1443,11,'Santo Antônio do Leverger'),(1444,11,'São Félix do Araguaia'),(1445,11,'São José do Povo'),(1446,11,'São José do Rio Claro'),(1447,11,'São José do Xingu'),(1448,11,'São José dos Quatro Marcos'),(1449,11,'São Pedro da Cipa'),(1450,11,'Sapezal'),(1451,11,'Sinop'),(1452,11,'Sorriso'),(1453,11,'Tabaporã'),(1454,11,'Tangará da Serra'),(1455,11,'Tapurah'),(1456,11,'Terra Nova do Norte'),(1457,11,'Tesouro'),(1458,11,'Torixoréu'),(1459,11,'União do Sul'),(1460,11,'Várzea Grande'),(1461,11,'Vera'),(1462,11,'Vila Bela da Santíssima Trindade'),(1463,11,'Vila Rica'),(1464,12,'Água Clara'),(1465,12,'Alcinópolis'),(1466,12,'Amambaí'),(1467,12,'Anastácio'),(1468,12,'Anaurilândia'),(1469,12,'Angélica'),(1470,12,'Antônio João'),(1471,12,'Aparecida do Taboado'),(1472,12,'Aquidauana'),(1473,12,'Aral Moreira'),(1474,12,'Bandeirantes'),(1475,12,'Bataguassu'),(1476,12,'Bataiporã'),(1477,12,'Bela Vista'),(1478,12,'Bodoquena'),(1479,12,'Bonito'),(1480,12,'Brasilândia'),(1481,12,'Caarapó'),(1482,12,'Camapuã'),(1483,12,'Campo Grande'),(1484,12,'Caracol'),(1485,12,'Cassilândia'),(1486,12,'Chapadão do Sul'),(1487,12,'Corguinho'),(1488,12,'Coronel Sapucaia'),(1489,12,'Corumbá'),(1490,12,'Costa Rica'),(1491,12,'Coxim'),(1492,12,'Deodápolis'),(1493,12,'Dois Irmãos do Buriti'),(1494,12,'Douradina'),(1495,12,'Dourados'),(1496,12,'Eldorado'),(1497,12,'Fátima do Sul'),(1498,12,'Glória de Dourados'),(1499,12,'Guia Lopes da Laguna'),(1500,12,'Iguatemi'),(1501,12,'Inocência'),(1502,12,'Itaporã'),(1503,12,'Itaquiraí'),(1504,12,'Ivinhema'),(1505,12,'Japorã'),(1506,12,'Jaraguari'),(1507,12,'Jardim'),(1508,12,'Jateí'),(1509,12,'Juti'),(1510,12,'Ladário'),(1511,12,'Laguna Carapã'),(1512,12,'Maracaju'),(1513,12,'Miranda'),(1514,12,'Mundo Novo'),(1515,12,'Naviraí'),(1516,12,'Nioaque'),(1517,12,'Nova Alvorada do Sul'),(1518,12,'Nova Andradina'),(1519,12,'Novo Horizonte do Sul'),(1520,12,'Paranaíba'),(1521,12,'Paranhos'),(1522,12,'Pedro Gomes'),(1523,12,'Ponta Porã'),(1524,12,'Porto Murtinho'),(1525,12,'Ribas do Rio Pardo'),(1526,12,'Rio Brilhante'),(1527,12,'Rio Negro'),(1528,12,'Rio Verde de Mato Grosso'),(1529,12,'Rochedo'),(1530,12,'Santa Rita do Pardo'),(1531,12,'São Gabriel do Oeste'),(1532,12,'Selvíria'),(1533,12,'Sete Quedas'),(1534,12,'Sidrolândia'),(1535,12,'Sonora'),(1536,12,'Tacuru'),(1537,12,'Taquarussu'),(1538,12,'Terenos'),(1539,12,'Três Lagoas'),(1540,12,'Vicentina'),(1541,13,'Abadia dos Dourados'),(1542,13,'Abaeté'),(1543,13,'Abre Campo'),(1544,13,'Acaiaca'),(1545,13,'Açucena'),(1546,13,'Água Boa'),(1547,13,'Água Comprida'),(1548,13,'Aguanil'),(1549,13,'Águas Formosas'),(1550,13,'Águas Vermelhas'),(1551,13,'Aimorés'),(1552,13,'Aiuruoca'),(1553,13,'Alagoa'),(1554,13,'Albertina'),(1555,13,'Além Paraíba'),(1556,13,'Alfenas'),(1557,13,'Alfredo Vasconcelos'),(1558,13,'Almenara'),(1559,13,'Alpercata'),(1560,13,'Alpinópolis'),(1561,13,'Alterosa'),(1562,13,'Alto Caparaó'),(1563,13,'Alto Jequitibá'),(1564,13,'Alto Rio Doce'),(1565,13,'Alvarenga'),(1566,13,'Alvinópolis'),(1567,13,'Alvorada de Minas'),(1568,13,'Amparo do Serra'),(1569,13,'Andradas'),(1570,13,'Andrelândia'),(1571,13,'Angelândia'),(1572,13,'Antônio Carlos'),(1573,13,'Antônio Dias'),(1574,13,'Antônio Prado de Minas'),(1575,13,'Araçaí'),(1576,13,'Aracitaba'),(1577,13,'Araçuaí'),(1578,13,'Araguari'),(1579,13,'Arantina'),(1580,13,'Araponga'),(1581,13,'Araporã'),(1582,13,'Arapuá'),(1583,13,'Araújos'),(1584,13,'Araxá'),(1585,13,'Arceburgo'),(1586,13,'Arcos'),(1587,13,'Areado'),(1588,13,'Argirita'),(1589,13,'Aricanduva'),(1590,13,'Arinos'),(1591,13,'Astolfo Dutra'),(1592,13,'Ataléia'),(1593,13,'Augusto de Lima'),(1594,13,'Baependi'),(1595,13,'Baldim'),(1596,13,'Bambuí'),(1597,13,'Bandeira'),(1598,13,'Bandeira do Sul'),(1599,13,'Barão de Cocais'),(1600,13,'Barão de Monte Alto'),(1601,13,'Barbacena'),(1602,13,'Barra Longa'),(1603,13,'Barroso'),(1604,13,'Bela Vista de Minas'),(1605,13,'Belmiro Braga'),(1606,13,'Belo Horizonte'),(1607,13,'Belo Oriente'),(1608,13,'Belo Vale'),(1609,13,'Berilo'),(1610,13,'Berizal'),(1611,13,'Bertópolis'),(1612,13,'Betim'),(1613,13,'Bias Fortes'),(1614,13,'Bicas'),(1615,13,'Biquinhas'),(1616,13,'Boa Esperança'),(1617,13,'Bocaina de Minas'),(1618,13,'Bocaiúva'),(1619,13,'Bom Despacho'),(1620,13,'Bom Jardim de Minas'),(1621,13,'Bom Jesus da Penha'),(1622,13,'Bom Jesus do Amparo'),(1623,13,'Bom Jesus do Galho'),(1624,13,'Bom Repouso'),(1625,13,'Bom Sucesso'),(1626,13,'Bonfim'),(1627,13,'Bonfinópolis de Minas'),(1628,13,'Bonito de Minas'),(1629,13,'Borda da Mata'),(1630,13,'Botelhos'),(1631,13,'Botumirim'),(1632,13,'Brás Pires'),(1633,13,'Brasilândia de Minas'),(1634,13,'Brasília de Minas'),(1635,13,'Brasópolis'),(1636,13,'Braúnas'),(1637,13,'Brumadinho'),(1638,13,'Bueno Brandão'),(1639,13,'Buenópolis'),(1640,13,'Bugre'),(1641,13,'Buritis'),(1642,13,'Buritizeiro'),(1643,13,'Cabeceira Grande'),(1644,13,'Cabo Verde'),(1645,13,'Cachoeira da Prata'),(1646,13,'Cachoeira de Minas'),(1647,13,'Cachoeira de Pajeú'),(1648,13,'Cachoeira Dourada'),(1649,13,'Caetanópolis'),(1650,13,'Caeté'),(1651,13,'Caiana'),(1652,13,'Cajuri'),(1653,13,'Caldas'),(1654,13,'Camacho'),(1655,13,'Camanducaia'),(1656,13,'Cambuí'),(1657,13,'Cambuquira'),(1658,13,'Campanário'),(1659,13,'Campanha'),(1660,13,'Campestre'),(1661,13,'Campina Verde'),(1662,13,'Campo Azul'),(1663,13,'Campo Belo'),(1664,13,'Campo do Meio'),(1665,13,'Campo Florido'),(1666,13,'Campos Altos'),(1667,13,'Campos Gerais'),(1668,13,'Cana Verde'),(1669,13,'Canaã'),(1670,13,'Canápolis'),(1671,13,'Candeias'),(1672,13,'Cantagalo'),(1673,13,'Caparaó'),(1674,13,'Capela Nova'),(1675,13,'Capelinha'),(1676,13,'Capetinga'),(1677,13,'Capim Branco'),(1678,13,'Capinópolis'),(1679,13,'Capitão Andrade'),(1680,13,'Capitão Enéas'),(1681,13,'Capitólio'),(1682,13,'Caputira'),(1683,13,'Caraí'),(1684,13,'Caranaíba'),(1685,13,'Carandaí'),(1686,13,'Carangola'),(1687,13,'Caratinga'),(1688,13,'Carbonita'),(1689,13,'Careaçu'),(1690,13,'Carlos Chagas'),(1691,13,'Carmésia'),(1692,13,'Carmo da Cachoeira'),(1693,13,'Carmo da Mata'),(1694,13,'Carmo de Minas'),(1695,13,'Carmo do Cajuru'),(1696,13,'Carmo do Paranaíba'),(1697,13,'Carmo do Rio Claro'),(1698,13,'Carmópolis de Minas'),(1699,13,'Carneirinho'),(1700,13,'Carrancas'),(1701,13,'Carvalhópolis'),(1702,13,'Carvalhos'),(1703,13,'Casa Grande'),(1704,13,'Cascalho Rico'),(1705,13,'Cássia'),(1706,13,'Cataguases'),(1707,13,'Catas Altas'),(1708,13,'Catas Altas da Noruega'),(1709,13,'Catuji'),(1710,13,'Catuti'),(1711,13,'Caxambu'),(1712,13,'Cedro do Abaeté'),(1713,13,'Central de Minas'),(1714,13,'Centralina'),(1715,13,'Chácara'),(1716,13,'Chalé'),(1717,13,'Chapada do Norte'),(1718,13,'Chapada Gaúcha'),(1719,13,'Chiador'),(1720,13,'Cipotânea'),(1721,13,'Claraval'),(1722,13,'Claro dos Poções'),(1723,13,'Cláudio'),(1724,13,'Coimbra'),(1725,13,'Coluna'),(1726,13,'Comendador Gomes'),(1727,13,'Comercinho'),(1728,13,'Conceição da Aparecida'),(1729,13,'Conceição da Barra de Minas'),(1730,13,'Conceição das Alagoas'),(1731,13,'Conceição das Pedras'),(1732,13,'Conceição de Ipanema'),(1733,13,'Conceição do Mato Dentro'),(1734,13,'Conceição do Pará'),(1735,13,'Conceição do Rio Verde'),(1736,13,'Conceição dos Ouros'),(1737,13,'Cônego Marinho'),(1738,13,'Confins'),(1739,13,'Congonhal'),(1740,13,'Congonhas'),(1741,13,'Congonhas do Norte'),(1742,13,'Conquista'),(1743,13,'Conselheiro Lafaiete'),(1744,13,'Conselheiro Pena'),(1745,13,'Consolação'),(1746,13,'Contagem'),(1747,13,'Coqueiral'),(1748,13,'Coração de Jesus'),(1749,13,'Cordisburgo'),(1750,13,'Cordislândia'),(1751,13,'Corinto'),(1752,13,'Coroaci'),(1753,13,'Coromandel'),(1754,13,'Coronel Fabriciano'),(1755,13,'Coronel Murta'),(1756,13,'Coronel Pacheco'),(1757,13,'Coronel Xavier Chaves'),(1758,13,'Córrego Danta'),(1759,13,'Córrego do Bom Jesus'),(1760,13,'Córrego Fundo'),(1761,13,'Córrego Novo'),(1762,13,'Couto de Magalhães de Minas'),(1763,13,'Crisólita'),(1764,13,'Cristais'),(1765,13,'Cristália'),(1766,13,'Cristiano Otoni'),(1767,13,'Cristina'),(1768,13,'Crucilândia'),(1769,13,'Cruzeiro da Fortaleza'),(1770,13,'Cruzília'),(1771,13,'Cuparaque'),(1772,13,'Curral de Dentro'),(1773,13,'Curvelo'),(1774,13,'Datas'),(1775,13,'Delfim Moreira'),(1776,13,'Delfinópolis'),(1777,13,'Delta'),(1778,13,'Descoberto'),(1779,13,'Desterro de Entre Rios'),(1780,13,'Desterro do Melo'),(1781,13,'Diamantina'),(1782,13,'Diogo de Vasconcelos'),(1783,13,'Dionísio'),(1784,13,'Divinésia'),(1785,13,'Divino'),(1786,13,'Divino das Laranjeiras'),(1787,13,'Divinolândia de Minas'),(1788,13,'Divinópolis'),(1789,13,'Divisa Alegre'),(1790,13,'Divisa Nova'),(1791,13,'Divisópolis'),(1792,13,'Dom Bosco'),(1793,13,'Dom Cavati'),(1794,13,'Dom Joaquim'),(1795,13,'Dom Silvério'),(1796,13,'Dom Viçoso'),(1797,13,'Dona Eusébia'),(1798,13,'Dores de Campos'),(1799,13,'Dores de Guanhães'),(1800,13,'Dores do Indaiá'),(1801,13,'Dores do Turvo'),(1802,13,'Doresópolis'),(1803,13,'Douradoquara'),(1804,13,'Durandé'),(1805,13,'Elói Mendes'),(1806,13,'Engenheiro Caldas'),(1807,13,'Engenheiro Navarro'),(1808,13,'Entre Folhas'),(1809,13,'Entre Rios de Minas'),(1810,13,'Ervália'),(1811,13,'Esmeraldas'),(1812,13,'Espera Feliz'),(1813,13,'Espinosa'),(1814,13,'Espírito Santo do Dourado'),(1815,13,'Estiva'),(1816,13,'Estrela Dalva'),(1817,13,'Estrela do Indaiá'),(1818,13,'Estrela do Sul'),(1819,13,'Eugenópolis'),(1820,13,'Ewbank da Câmara'),(1821,13,'Extrema'),(1822,13,'Fama'),(1823,13,'Faria Lemos'),(1824,13,'Felício dos Santos'),(1825,13,'Felisburgo'),(1826,13,'Felixlândia'),(1827,13,'Fernandes Tourinho'),(1828,13,'Ferros'),(1829,13,'Fervedouro'),(1830,13,'Florestal'),(1831,13,'Formiga'),(1832,13,'Formoso'),(1833,13,'Fortaleza de Minas'),(1834,13,'Fortuna de Minas'),(1835,13,'Francisco Badaró'),(1836,13,'Francisco Dumont'),(1837,13,'Francisco Sá'),(1838,13,'Franciscópolis'),(1839,13,'Frei Gaspar'),(1840,13,'Frei Inocêncio'),(1841,13,'Frei Lagonegro'),(1842,13,'Fronteira'),(1843,13,'Fronteira dos Vales'),(1844,13,'Fruta de Leite'),(1845,13,'Frutal'),(1846,13,'Funilândia'),(1847,13,'Galiléia'),(1848,13,'Gameleiras'),(1849,13,'Glaucilândia'),(1850,13,'Goiabeira'),(1851,13,'Goianá'),(1852,13,'Gonçalves'),(1853,13,'Gonzaga'),(1854,13,'Gouveia'),(1855,13,'Governador Valadares'),(1856,13,'Grão Mogol'),(1857,13,'Grupiara'),(1858,13,'Guanhães'),(1859,13,'Guapé'),(1860,13,'Guaraciaba'),(1861,13,'Guaraciama'),(1862,13,'Guaranésia'),(1863,13,'Guarani'),(1864,13,'Guarará'),(1865,13,'Guarda-Mor'),(1866,13,'Guaxupé'),(1867,13,'Guidoval'),(1868,13,'Guimarânia'),(1869,13,'Guiricema'),(1870,13,'Gurinhatã'),(1871,13,'Heliodora'),(1872,13,'Iapu'),(1873,13,'Ibertioga'),(1874,13,'Ibiá'),(1875,13,'Ibiaí'),(1876,13,'Ibiracatu'),(1877,13,'Ibiraci'),(1878,13,'Ibirité'),(1879,13,'Ibitiúra de Minas'),(1880,13,'Ibituruna'),(1881,13,'Icaraí de Minas'),(1882,13,'Igarapé'),(1883,13,'Igaratinga'),(1884,13,'Iguatama'),(1885,13,'Ijaci'),(1886,13,'Ilicínea'),(1887,13,'Imbé de Minas'),(1888,13,'Inconfidentes'),(1889,13,'Indaiabira'),(1890,13,'Indianópolis'),(1891,13,'Ingaí'),(1892,13,'Inhapim'),(1893,13,'Inhaúma'),(1894,13,'Inimutaba'),(1895,13,'Ipaba'),(1896,13,'Ipanema'),(1897,13,'Ipatinga'),(1898,13,'Ipiaçu'),(1899,13,'Ipuiúna'),(1900,13,'Iraí de Minas'),(1901,13,'Itabira'),(1902,13,'Itabirinha de Mantena'),(1903,13,'Itabirito'),(1904,13,'Itacambira'),(1905,13,'Itacarambi'),(1906,13,'Itaguara'),(1907,13,'Itaipé'),(1908,13,'Itajubá'),(1909,13,'Itamarandiba'),(1910,13,'Itamarati de Minas'),(1911,13,'Itambacuri'),(1912,13,'Itambé do Mato Dentro'),(1913,13,'Itamogi'),(1914,13,'Itamonte'),(1915,13,'Itanhandu'),(1916,13,'Itanhomi'),(1917,13,'Itaobim'),(1918,13,'Itapagipe'),(1919,13,'Itapecerica'),(1920,13,'Itapeva'),(1921,13,'Itatiaiuçu'),(1922,13,'Itaú de Minas'),(1923,13,'Itaúna'),(1924,13,'Itaverava'),(1925,13,'Itinga'),(1926,13,'Itueta'),(1927,13,'Ituiutaba'),(1928,13,'Itumirim'),(1929,13,'Iturama'),(1930,13,'Itutinga'),(1931,13,'Jaboticatubas'),(1932,13,'Jacinto'),(1933,13,'Jacuí'),(1934,13,'Jacutinga'),(1935,13,'Jaguaraçu'),(1936,13,'Jaíba'),(1937,13,'Jampruca'),(1938,13,'Janaúba'),(1939,13,'Januária'),(1940,13,'Japaraíba'),(1941,13,'Japonvar'),(1942,13,'Jeceaba'),(1943,13,'Jenipapo de Minas'),(1944,13,'Jequeri'),(1945,13,'Jequitaí'),(1946,13,'Jequitibá'),(1947,13,'Jequitinhonha'),(1948,13,'Jesuânia'),(1949,13,'Joaíma'),(1950,13,'Joanésia'),(1951,13,'João Monlevade'),(1952,13,'João Pinheiro'),(1953,13,'Joaquim Felício'),(1954,13,'Jordânia'),(1955,13,'José Gonçalves de Minas'),(1956,13,'José Raydan'),(1957,13,'Josenópolis'),(1958,13,'Juatuba'),(1959,13,'Juiz de Fora'),(1960,13,'Juramento'),(1961,13,'Juruaia'),(1962,13,'Juvenília'),(1963,13,'Ladainha'),(1964,13,'Lagamar'),(1965,13,'Lagoa da Prata'),(1966,13,'Lagoa dos Patos'),(1967,13,'Lagoa Dourada'),(1968,13,'Lagoa Formosa'),(1969,13,'Lagoa Grande'),(1970,13,'Lagoa Santa'),(1971,13,'Lajinha'),(1972,13,'Lambari'),(1973,13,'Lamim'),(1974,13,'Laranjal'),(1975,13,'Lassance'),(1976,13,'Lavras'),(1977,13,'Leandro Ferreira'),(1978,13,'Leme do Prado'),(1979,13,'Leopoldina'),(1980,13,'Liberdade'),(1981,13,'Lima Duarte'),(1982,13,'Limeira do Oeste'),(1983,13,'Lontra'),(1984,13,'Luisburgo'),(1985,13,'Luislândia'),(1986,13,'Luminárias'),(1987,13,'Luz'),(1988,13,'Machacalis'),(1989,13,'Machado'),(1990,13,'Madre de Deus de Minas'),(1991,13,'Malacacheta'),(1992,13,'Mamonas'),(1993,13,'Manga'),(1994,13,'Manhuaçu'),(1995,13,'Manhumirim'),(1996,13,'Mantena'),(1997,13,'Mar de Espanha'),(1998,13,'Maravilhas'),(1999,13,'Maria da Fé'),(2000,13,'Mariana'),(2001,13,'Marilac'),(2002,13,'Mário Campos'),(2003,13,'Maripá de Minas'),(2004,13,'Marliéria'),(2005,13,'Marmelópolis'),(2006,13,'Martinho Campos'),(2007,13,'Martins Soares'),(2008,13,'Mata Verde'),(2009,13,'Materlândia'),(2010,13,'Mateus Leme'),(2011,13,'Mathias Lobato'),(2012,13,'Matias Barbosa'),(2013,13,'Matias Cardoso'),(2014,13,'Matipó'),(2015,13,'Mato Verde'),(2016,13,'Matozinhos'),(2017,13,'Matutina'),(2018,13,'Medeiros'),(2019,13,'Medina'),(2020,13,'Mendes Pimentel'),(2021,13,'Mercês'),(2022,13,'Mesquita'),(2023,13,'Minas Novas'),(2024,13,'Minduri'),(2025,13,'Mirabela'),(2026,13,'Miradouro'),(2027,13,'Miraí'),(2028,13,'Miravânia'),(2029,13,'Moeda'),(2030,13,'Moema'),(2031,13,'Monjolos'),(2032,13,'Monsenhor Paulo'),(2033,13,'Montalvânia'),(2034,13,'Monte Alegre de Minas'),(2035,13,'Monte Azul'),(2036,13,'Monte Belo'),(2037,13,'Monte Carmelo'),(2038,13,'Monte Formoso'),(2039,13,'Monte Santo de Minas'),(2040,13,'Monte Sião'),(2041,13,'Montes Claros'),(2042,13,'Montezuma'),(2043,13,'Morada Nova de Minas'),(2044,13,'Morro da Garça'),(2045,13,'Morro do Pilar'),(2046,13,'Munhoz'),(2047,13,'Muriaé'),(2048,13,'Mutum'),(2049,13,'Muzambinho'),(2050,13,'Nacip Raydan'),(2051,13,'Nanuque'),(2052,13,'Naque'),(2053,13,'Natalândia'),(2054,13,'Natércia'),(2055,13,'Nazareno'),(2056,13,'Nepomuceno'),(2057,13,'Ninheira'),(2058,13,'Nova Belém'),(2059,13,'Nova Era'),(2060,13,'Nova Lima'),(2061,13,'Nova Módica'),(2062,13,'Nova Ponte'),(2063,13,'Nova Porteirinha'),(2064,13,'Nova Resende'),(2065,13,'Nova Serrana'),(2066,13,'Nova União'),(2067,13,'Novo Cruzeiro'),(2068,13,'Novo Oriente de Minas'),(2069,13,'Novorizonte'),(2070,13,'Olaria'),(2071,13,'Olhos-d`Água'),(2072,13,'Olímpio Noronha'),(2073,13,'Oliveira'),(2074,13,'Oliveira Fortes'),(2075,13,'Onça de Pitangui'),(2076,13,'Oratórios'),(2077,13,'Orizânia'),(2078,13,'Ouro Branco'),(2079,13,'Ouro Fino'),(2080,13,'Ouro Preto'),(2081,13,'Ouro Verde de Minas'),(2082,13,'Padre Carvalho'),(2083,13,'Padre Paraíso'),(2084,13,'Pai Pedro'),(2085,13,'Paineiras'),(2086,13,'Pains'),(2087,13,'Paiva'),(2088,13,'Palma'),(2089,13,'Palmópolis'),(2090,13,'Papagaios'),(2091,13,'Pará de Minas'),(2092,13,'Paracatu'),(2093,13,'Paraguaçu'),(2094,13,'Paraisópolis'),(2095,13,'Paraopeba'),(2096,13,'Passa Quatro'),(2097,13,'Passa Tempo'),(2098,13,'Passa-Vinte'),(2099,13,'Passabém'),(2100,13,'Passos'),(2101,13,'Patis'),(2102,13,'Patos de Minas'),(2103,13,'Patrocínio'),(2104,13,'Patrocínio do Muriaé'),(2105,13,'Paula Cândido'),(2106,13,'Paulistas'),(2107,13,'Pavão'),(2108,13,'Peçanha'),(2109,13,'Pedra Azul'),(2110,13,'Pedra Bonita'),(2111,13,'Pedra do Anta'),(2112,13,'Pedra do Indaiá'),(2113,13,'Pedra Dourada'),(2114,13,'Pedralva'),(2115,13,'Pedras de Maria da Cruz'),(2116,13,'Pedrinópolis'),(2117,13,'Pedro Leopoldo'),(2118,13,'Pedro Teixeira'),(2119,13,'Pequeri'),(2120,13,'Pequi'),(2121,13,'Perdigão'),(2122,13,'Perdizes'),(2123,13,'Perdões'),(2124,13,'Periquito'),(2125,13,'Pescador'),(2126,13,'Piau'),(2127,13,'Piedade de Caratinga'),(2128,13,'Piedade de Ponte Nova'),(2129,13,'Piedade do Rio Grande'),(2130,13,'Piedade dos Gerais'),(2131,13,'Pimenta'),(2132,13,'Pingo-d`Água'),(2133,13,'Pintópolis'),(2134,13,'Piracema'),(2135,13,'Pirajuba'),(2136,13,'Piranga'),(2137,13,'Piranguçu'),(2138,13,'Piranguinho'),(2139,13,'Pirapetinga'),(2140,13,'Pirapora'),(2141,13,'Piraúba'),(2142,13,'Pitangui'),(2143,13,'Piumhi'),(2144,13,'Planura'),(2145,13,'Poço Fundo'),(2146,13,'Poços de Caldas'),(2147,13,'Pocrane'),(2148,13,'Pompéu'),(2149,13,'Ponte Nova'),(2150,13,'Ponto Chique'),(2151,13,'Ponto dos Volantes'),(2152,13,'Porteirinha'),(2153,13,'Porto Firme'),(2154,13,'Poté'),(2155,13,'Pouso Alegre'),(2156,13,'Pouso Alto'),(2157,13,'Prados'),(2158,13,'Prata'),(2159,13,'Pratápolis'),(2160,13,'Pratinha'),(2161,13,'Presidente Bernardes'),(2162,13,'Presidente Juscelino'),(2163,13,'Presidente Kubitschek'),(2164,13,'Presidente Olegário'),(2165,13,'Prudente de Morais'),(2166,13,'Quartel Geral'),(2167,13,'Queluzito'),(2168,13,'Raposos'),(2169,13,'Raul Soares'),(2170,13,'Recreio'),(2171,13,'Reduto'),(2172,13,'Resende Costa'),(2173,13,'Resplendor'),(2174,13,'Ressaquinha'),(2175,13,'Riachinho'),(2176,13,'Riacho dos Machados'),(2177,13,'Ribeirão das Neves'),(2178,13,'Ribeirão Vermelho'),(2179,13,'Rio Acima'),(2180,13,'Rio Casca'),(2181,13,'Rio do Prado'),(2182,13,'Rio Doce'),(2183,13,'Rio Espera'),(2184,13,'Rio Manso'),(2185,13,'Rio Novo'),(2186,13,'Rio Paranaíba'),(2187,13,'Rio Pardo de Minas'),(2188,13,'Rio Piracicaba'),(2189,13,'Rio Pomba'),(2190,13,'Rio Preto'),(2191,13,'Rio Vermelho'),(2192,13,'Ritápolis'),(2193,13,'Rochedo de Minas'),(2194,13,'Rodeiro'),(2195,13,'Romaria'),(2196,13,'Rosário da Limeira'),(2197,13,'Rubelita'),(2198,13,'Rubim'),(2199,13,'Sabará'),(2200,13,'Sabinópolis'),(2201,13,'Sacramento'),(2202,13,'Salinas'),(2203,13,'Salto da Divisa'),(2204,13,'Santa Bárbara'),(2205,13,'Santa Bárbara do Leste'),(2206,13,'Santa Bárbara do Monte Verde'),(2207,13,'Santa Bárbara do Tugúrio'),(2208,13,'Santa Cruz de Minas'),(2209,13,'Santa Cruz de Salinas'),(2210,13,'Santa Cruz do Escalvado'),(2211,13,'Santa Efigênia de Minas'),(2212,13,'Santa Fé de Minas'),(2213,13,'Santa Helena de Minas'),(2214,13,'Santa Juliana'),(2215,13,'Santa Luzia'),(2216,13,'Santa Margarida'),(2217,13,'Santa Maria de Itabira'),(2218,13,'Santa Maria do Salto'),(2219,13,'Santa Maria do Suaçuí'),(2220,13,'Santa Rita de Caldas'),(2221,13,'Santa Rita de Ibitipoca'),(2222,13,'Santa Rita de Jacutinga'),(2223,13,'Santa Rita de Minas'),(2224,13,'Santa Rita do Itueto'),(2225,13,'Santa Rita do Sapucaí'),(2226,13,'Santa Rosa da Serra'),(2227,13,'Santa Vitória'),(2228,13,'Santana da Vargem'),(2229,13,'Santana de Cataguases'),(2230,13,'Santana de Pirapama'),(2231,13,'Santana do Deserto'),(2232,13,'Santana do Garambéu'),(2233,13,'Santana do Jacaré'),(2234,13,'Santana do Manhuaçu'),(2235,13,'Santana do Paraíso'),(2236,13,'Santana do Riacho'),(2237,13,'Santana dos Montes'),(2238,13,'Santo Antônio do Amparo'),(2239,13,'Santo Antônio do Aventureiro'),(2240,13,'Santo Antônio do Grama'),(2241,13,'Santo Antônio do Itambé'),(2242,13,'Santo Antônio do Jacinto'),(2243,13,'Santo Antônio do Monte'),(2244,13,'Santo Antônio do Retiro'),(2245,13,'Santo Antônio do Rio Abaixo'),(2246,13,'Santo Hipólito'),(2247,13,'Santos Dumont'),(2248,13,'São Bento Abade'),(2249,13,'São Brás do Suaçuí'),(2250,13,'São Domingos das Dores'),(2251,13,'São Domingos do Prata'),(2252,13,'São Félix de Minas'),(2253,13,'São Francisco'),(2254,13,'São Francisco de Paula'),(2255,13,'São Francisco de Sales'),(2256,13,'São Francisco do Glória'),(2257,13,'São Geraldo'),(2258,13,'São Geraldo da Piedade'),(2259,13,'São Geraldo do Baixio'),(2260,13,'São Gonçalo do Abaeté'),(2261,13,'São Gonçalo do Pará'),(2262,13,'São Gonçalo do Rio Abaixo'),(2263,13,'São Gonçalo do Rio Preto'),(2264,13,'São Gonçalo do Sapucaí'),(2265,13,'São Gotardo'),(2266,13,'São João Batista do Glória'),(2267,13,'São João da Lagoa'),(2268,13,'São João da Mata'),(2269,13,'São João da Ponte'),(2270,13,'São João das Missões'),(2271,13,'São João del Rei'),(2272,13,'São João do Manhuaçu'),(2273,13,'São João do Manteninha'),(2274,13,'São João do Oriente'),(2275,13,'São João do Pacuí'),(2276,13,'São João do Paraíso'),(2277,13,'São João Evangelista'),(2278,13,'São João Nepomuceno'),(2279,13,'São Joaquim de Bicas'),(2280,13,'São José da Barra'),(2281,13,'São José da Lapa'),(2282,13,'São José da Safira'),(2283,13,'São José da Varginha'),(2284,13,'São José do Alegre'),(2285,13,'São José do Divino'),(2286,13,'São José do Goiabal'),(2287,13,'São José do Jacuri'),(2288,13,'São José do Mantimento'),(2289,13,'São Lourenço'),(2290,13,'São Miguel do Anta'),(2291,13,'São Pedro da União'),(2292,13,'São Pedro do Suaçuí'),(2293,13,'São Pedro dos Ferros'),(2294,13,'São Romão'),(2295,13,'São Roque de Minas'),(2296,13,'São Sebastião da Bela Vista'),(2297,13,'São Sebastião da Vargem Alegre'),(2298,13,'São Sebastião do Anta'),(2299,13,'São Sebastião do Maranhão'),(2300,13,'São Sebastião do Oeste'),(2301,13,'São Sebastião do Paraíso'),(2302,13,'São Sebastião do Rio Preto'),(2303,13,'São Sebastião do Rio Verde'),(2304,13,'São Thomé das Letras'),(2305,13,'São Tiago'),(2306,13,'São Tomás de Aquino'),(2307,13,'São Vicente de Minas'),(2308,13,'Sapucaí-Mirim'),(2309,13,'Sardoá'),(2310,13,'Sarzedo'),(2311,13,'Sem-Peixe'),(2312,13,'Senador Amaral'),(2313,13,'Senador Cortes'),(2314,13,'Senador Firmino'),(2315,13,'Senador José Bento'),(2316,13,'Senador Modestino Gonçalves'),(2317,13,'Senhora de Oliveira'),(2318,13,'Senhora do Porto'),(2319,13,'Senhora dos Remédios'),(2320,13,'Sericita'),(2321,13,'Seritinga'),(2322,13,'Serra Azul de Minas'),(2323,13,'Serra da Saudade'),(2324,13,'Serra do Salitre'),(2325,13,'Serra dos Aimorés'),(2326,13,'Serrania'),(2327,13,'Serranópolis de Minas'),(2328,13,'Serranos'),(2329,13,'Serro'),(2330,13,'Sete Lagoas'),(2331,13,'Setubinha'),(2332,13,'Silveirânia'),(2333,13,'Silvianópolis'),(2334,13,'Simão Pereira'),(2335,13,'Simonésia'),(2336,13,'Sobrália'),(2337,13,'Soledade de Minas'),(2338,13,'Tabuleiro'),(2339,13,'Taiobeiras'),(2340,13,'Taparuba'),(2341,13,'Tapira'),(2342,13,'Tapiraí'),(2343,13,'Taquaraçu de Minas'),(2344,13,'Tarumirim'),(2345,13,'Teixeiras'),(2346,13,'Teófilo Otoni'),(2347,13,'Timóteo'),(2348,13,'Tiradentes'),(2349,13,'Tiros'),(2350,13,'Tocantins'),(2351,13,'Tocos do Moji'),(2352,13,'Toledo'),(2353,13,'Tombos'),(2354,13,'Três Corações'),(2355,13,'Três Marias'),(2356,13,'Três Pontas'),(2357,13,'Tumiritinga'),(2358,13,'Tupaciguara'),(2359,13,'Turmalina'),(2360,13,'Turvolândia'),(2361,13,'Ubá'),(2362,13,'Ubaí'),(2363,13,'Ubaporanga'),(2364,13,'Uberaba'),(2365,13,'Uberlândia'),(2366,13,'Umburatiba'),(2367,13,'Unaí'),(2368,13,'União de Minas'),(2369,13,'Uruana de Minas'),(2370,13,'Urucânia'),(2371,13,'Urucuia'),(2372,13,'Vargem Alegre'),(2373,13,'Vargem Bonita'),(2374,13,'Vargem Grande do Rio Pardo'),(2375,13,'Varginha'),(2376,13,'Varjão de Minas'),(2377,13,'Várzea da Palma'),(2378,13,'Varzelândia'),(2379,13,'Vazante'),(2380,13,'Verdelândia'),(2381,13,'Veredinha'),(2382,13,'Veríssimo'),(2383,13,'Vermelho Novo'),(2384,13,'Vespasiano'),(2385,13,'Viçosa'),(2386,13,'Vieiras'),(2387,13,'Virgem da Lapa'),(2388,13,'Virgínia'),(2389,13,'Virginópolis'),(2390,13,'Virgolândia'),(2391,13,'Visconde do Rio Branco'),(2392,13,'Volta Grande'),(2393,13,'Wenceslau Braz'),(2394,14,'Abaetetuba'),(2395,14,'Abel Figueiredo'),(2396,14,'Acará'),(2397,14,'Afuá'),(2398,14,'Água Azul do Norte'),(2399,14,'Alenquer'),(2400,14,'Almeirim'),(2401,14,'Altamira'),(2402,14,'Anajás'),(2403,14,'Ananindeua'),(2404,14,'Anapu'),(2405,14,'Augusto Corrêa'),(2406,14,'Aurora do Pará'),(2407,14,'Aveiro'),(2408,14,'Bagre'),(2409,14,'Baião'),(2410,14,'Bannach'),(2411,14,'Barcarena'),(2412,14,'Belém'),(2413,14,'Belterra'),(2414,14,'Benevides'),(2415,14,'Bom Jesus do Tocantins'),(2416,14,'Bonito'),(2417,14,'Bragança'),(2418,14,'Brasil Novo'),(2419,14,'Brejo Grande do Araguaia'),(2420,14,'Breu Branco'),(2421,14,'Breves'),(2422,14,'Bujaru'),(2423,14,'Cachoeira do Arari'),(2424,14,'Cachoeira do Piriá'),(2425,14,'Cametá'),(2426,14,'Canaã dos Carajás'),(2427,14,'Capanema'),(2428,14,'Capitão Poço'),(2429,14,'Castanhal'),(2430,14,'Chaves'),(2431,14,'Colares'),(2432,14,'Conceição do Araguaia'),(2433,14,'Concórdia do Pará'),(2434,14,'Cumaru do Norte'),(2435,14,'Curionópolis'),(2436,14,'Curralinho'),(2437,14,'Curuá'),(2438,14,'Curuçá'),(2439,14,'Dom Eliseu'),(2440,14,'Eldorado dos Carajás'),(2441,14,'Faro'),(2442,14,'Floresta do Araguaia'),(2443,14,'Garrafão do Norte'),(2444,14,'Goianésia do Pará'),(2445,14,'Gurupá'),(2446,14,'Igarapé-Açu'),(2447,14,'Igarapé-Miri'),(2448,14,'Inhangapi'),(2449,14,'Ipixuna do Pará'),(2450,14,'Irituia'),(2451,14,'Itaituba'),(2452,14,'Itupiranga'),(2453,14,'Jacareacanga'),(2454,14,'Jacundá'),(2455,14,'Juruti'),(2456,14,'Limoeiro do Ajuru'),(2457,14,'Mãe do Rio'),(2458,14,'Magalhães Barata'),(2459,14,'Marabá'),(2460,14,'Maracanã'),(2461,14,'Marapanim'),(2462,14,'Marituba'),(2463,14,'Medicilândia'),(2464,14,'Melgaço'),(2465,14,'Mocajuba'),(2466,14,'Moju'),(2467,14,'Monte Alegre'),(2468,14,'Muaná'),(2469,14,'Nova Esperança do Piriá'),(2470,14,'Nova Ipixuna'),(2471,14,'Nova Timboteua'),(2472,14,'Novo Progresso'),(2473,14,'Novo Repartimento'),(2474,14,'Óbidos'),(2475,14,'Oeiras do Pará'),(2476,14,'Oriximiná'),(2477,14,'Ourém'),(2478,14,'Ourilândia do Norte'),(2479,14,'Pacajá'),(2480,14,'Palestina do Pará'),(2481,14,'Paragominas'),(2482,14,'Parauapebas'),(2483,14,'Pau d`Arco'),(2484,14,'Peixe-Boi'),(2485,14,'Piçarra'),(2486,14,'Placas'),(2487,14,'Ponta de Pedras'),(2488,14,'Portel'),(2489,14,'Porto de Moz'),(2490,14,'Prainha'),(2491,14,'Primavera'),(2492,14,'Quatipuru'),(2493,14,'Redenção'),(2494,14,'Rio Maria'),(2495,14,'Rondon do Pará'),(2496,14,'Rurópolis'),(2497,14,'Salinópolis'),(2498,14,'Salvaterra'),(2499,14,'Santa Bárbara do Pará'),(2500,14,'Santa Cruz do Arari'),(2501,14,'Santa Isabel do Pará'),(2502,14,'Santa Luzia do Pará'),(2503,14,'Santa Maria das Barreiras'),(2504,14,'Santa Maria do Pará'),(2505,14,'Santana do Araguaia'),(2506,14,'Santarém'),(2507,14,'Santarém Novo'),(2508,14,'Santo Antônio do Tauá'),(2509,14,'São Caetano de Odivelas'),(2510,14,'São Domingos do Araguaia'),(2511,14,'São Domingos do Capim'),(2512,14,'São Félix do Xingu'),(2513,14,'São Francisco do Pará'),(2514,14,'São Geraldo do Araguaia'),(2515,14,'São João da Ponta'),(2516,14,'São João de Pirabas'),(2517,14,'São João do Araguaia'),(2518,14,'São Miguel do Guamá'),(2519,14,'São Sebastião da Boa Vista'),(2520,14,'Sapucaia'),(2521,14,'Senador José Porfírio'),(2522,14,'Soure'),(2523,14,'Tailândia'),(2524,14,'Terra Alta'),(2525,14,'Terra Santa'),(2526,14,'Tomé-Açu'),(2527,14,'Tracuateua'),(2528,14,'Trairão'),(2529,14,'Tucumã'),(2530,14,'Tucuruí'),(2531,14,'Ulianópolis'),(2532,14,'Uruará'),(2533,14,'Vigia'),(2534,14,'Viseu'),(2535,14,'Vitória do Xingu'),(2536,14,'Xinguara'),(2537,15,'Água Branca'),(2538,15,'Aguiar'),(2539,15,'Alagoa Grande'),(2540,15,'Alagoa Nova'),(2541,15,'Alagoinha'),(2542,15,'Alcantil'),(2543,15,'Algodão de Jandaíra'),(2544,15,'Alhandra'),(2545,15,'Amparo'),(2546,15,'Aparecida'),(2547,15,'Araçagi'),(2548,15,'Arara'),(2549,15,'Araruna'),(2550,15,'Areia'),(2551,15,'Areia de Baraúnas'),(2552,15,'Areial'),(2553,15,'Aroeiras'),(2554,15,'Assunção'),(2555,15,'Baía da Traição'),(2556,15,'Bananeiras'),(2557,15,'Baraúna'),(2558,15,'Barra de Santa Rosa'),(2559,15,'Barra de Santana'),(2560,15,'Barra de São Miguel'),(2561,15,'Bayeux'),(2562,15,'Belém'),(2563,15,'Belém do Brejo do Cruz'),(2564,15,'Bernardino Batista'),(2565,15,'Boa Ventura'),(2566,15,'Boa Vista'),(2567,15,'Bom Jesus'),(2568,15,'Bom Sucesso'),(2569,15,'Bonito de Santa Fé'),(2570,15,'Boqueirão'),(2571,15,'Borborema'),(2572,15,'Brejo do Cruz'),(2573,15,'Brejo dos Santos'),(2574,15,'Caaporã'),(2575,15,'Cabaceiras'),(2576,15,'Cabedelo'),(2577,15,'Cachoeira dos Índios'),(2578,15,'Cacimba de Areia'),(2579,15,'Cacimba de Dentro'),(2580,15,'Cacimbas'),(2581,15,'Caiçara'),(2582,15,'Cajazeiras'),(2583,15,'Cajazeirinhas'),(2584,15,'Caldas Brandão'),(2585,15,'Camalaú'),(2586,15,'Campina Grande'),(2587,15,'Campo de Santana'),(2588,15,'Capim'),(2589,15,'Caraúbas'),(2590,15,'Carrapateira'),(2591,15,'Casserengue'),(2592,15,'Catingueira'),(2593,15,'Catolé do Rocha'),(2594,15,'Caturité'),(2595,15,'Conceição'),(2596,15,'Condado'),(2597,15,'Conde'),(2598,15,'Congo'),(2599,15,'Coremas'),(2600,15,'Coxixola'),(2601,15,'Cruz do Espírito Santo'),(2602,15,'Cubati'),(2603,15,'Cuité'),(2604,15,'Cuité de Mamanguape'),(2605,15,'Cuitegi'),(2606,15,'Curral de Cima'),(2607,15,'Curral Velho'),(2608,15,'Damião'),(2609,15,'Desterro'),(2610,15,'Diamante'),(2611,15,'Dona Inês'),(2612,15,'Duas Estradas'),(2613,15,'Emas'),(2614,15,'Esperança'),(2615,15,'Fagundes'),(2616,15,'Frei Martinho'),(2617,15,'Gado Bravo'),(2618,15,'Guarabira'),(2619,15,'Gurinhém'),(2620,15,'Gurjão'),(2621,15,'Ibiara'),(2622,15,'Igaracy'),(2623,15,'Imaculada'),(2624,15,'Ingá'),(2625,15,'Itabaiana'),(2626,15,'Itaporanga'),(2627,15,'Itapororoca'),(2628,15,'Itatuba'),(2629,15,'Jacaraú'),(2630,15,'Jericó'),(2631,15,'João Pessoa'),(2632,15,'Juarez Távora'),(2633,15,'Juazeirinho'),(2634,15,'Junco do Seridó'),(2635,15,'Juripiranga'),(2636,15,'Juru'),(2637,15,'Lagoa'),(2638,15,'Lagoa de Dentro'),(2639,15,'Lagoa Seca'),(2640,15,'Lastro'),(2641,15,'Livramento'),(2642,15,'Logradouro'),(2643,15,'Lucena'),(2644,15,'Mãe d`Água'),(2645,15,'Malta'),(2646,15,'Mamanguape'),(2647,15,'Manaíra'),(2648,15,'Marcação'),(2649,15,'Mari'),(2650,15,'Marizópolis'),(2651,15,'Massaranduba'),(2652,15,'Mataraca'),(2653,15,'Matinhas'),(2654,15,'Mato Grosso'),(2655,15,'Maturéia'),(2656,15,'Mogeiro'),(2657,15,'Montadas'),(2658,15,'Monte Horebe'),(2659,15,'Monteiro'),(2660,15,'Mulungu'),(2661,15,'Natuba'),(2662,15,'Nazarezinho'),(2663,15,'Nova Floresta'),(2664,15,'Nova Olinda'),(2665,15,'Nova Palmeira'),(2666,15,'Olho d`Água'),(2667,15,'Olivedos'),(2668,15,'Ouro Velho'),(2669,15,'Parari'),(2670,15,'Passagem'),(2671,15,'Patos'),(2672,15,'Paulista'),(2673,15,'Pedra Branca'),(2674,15,'Pedra Lavrada'),(2675,15,'Pedras de Fogo'),(2676,15,'Pedro Régis'),(2677,15,'Piancó'),(2678,15,'Picuí'),(2679,15,'Pilar'),(2680,15,'Pilões'),(2681,15,'Pilõezinhos'),(2682,15,'Pirpirituba'),(2683,15,'Pitimbu'),(2684,15,'Pocinhos'),(2685,15,'Poço Dantas'),(2686,15,'Poço de José de Moura'),(2687,15,'Pombal'),(2688,15,'Prata'),(2689,15,'Princesa Isabel'),(2690,15,'Puxinanã'),(2691,15,'Queimadas'),(2692,15,'Quixabá'),(2693,15,'Remígio'),(2694,15,'Riachão'),(2695,15,'Riachão do Bacamarte'),(2696,15,'Riachão do Poço'),(2697,15,'Riacho de Santo Antônio'),(2698,15,'Riacho dos Cavalos'),(2699,15,'Rio Tinto'),(2700,15,'Salgadinho'),(2701,15,'Salgado de São Félix'),(2702,15,'Santa Cecília'),(2703,15,'Santa Cruz'),(2704,15,'Santa Helena'),(2705,15,'Santa Inês'),(2706,15,'Santa Luzia'),(2707,15,'Santa Rita'),(2708,15,'Santa Teresinha'),(2709,15,'Santana de Mangueira'),(2710,15,'Santana dos Garrotes'),(2711,15,'Santarém'),(2712,15,'Santo André'),(2713,15,'São Bentinho'),(2714,15,'São Bento'),(2715,15,'São Domingos de Pombal'),(2716,15,'São Domingos do Cariri'),(2717,15,'São Francisco'),(2718,15,'São João do Cariri'),(2719,15,'São João do Rio do Peixe'),(2720,15,'São João do Tigre'),(2721,15,'São José da Lagoa Tapada'),(2722,15,'São José de Caiana'),(2723,15,'São José de Espinharas'),(2724,15,'São José de Piranhas'),(2725,15,'São José de Princesa'),(2726,15,'São José do Bonfim'),(2727,15,'São José do Brejo do Cruz'),(2728,15,'São José do Sabugi'),(2729,15,'São José dos Cordeiros'),(2730,15,'São José dos Ramos'),(2731,15,'São Mamede'),(2732,15,'São Miguel de Taipu'),(2733,15,'São Sebastião de Lagoa de Roça'),(2734,15,'São Sebastião do Umbuzeiro'),(2735,15,'Sapé'),(2736,15,'Seridó'),(2737,15,'Serra Branca'),(2738,15,'Serra da Raiz'),(2739,15,'Serra Grande'),(2740,15,'Serra Redonda'),(2741,15,'Serraria'),(2742,15,'Sertãozinho'),(2743,15,'Sobrado'),(2744,15,'Solânea'),(2745,15,'Soledade'),(2746,15,'Sossêgo'),(2747,15,'Sousa'),(2748,15,'Sumé'),(2749,15,'Taperoá'),(2750,15,'Tavares'),(2751,15,'Teixeira'),(2752,15,'Tenório'),(2753,15,'Triunfo'),(2754,15,'Uiraúna'),(2755,15,'Umbuzeiro'),(2756,15,'Várzea'),(2757,15,'Vieirópolis'),(2758,15,'Vista Serrana'),(2759,15,'Zabelê'),(2760,16,'Abatiá'),(2761,16,'Adrianópolis'),(2762,16,'Agudos do Sul'),(2763,16,'Almirante Tamandaré'),(2764,16,'Altamira do Paraná'),(2765,16,'Alto Paraná'),(2766,16,'Alto Piquiri'),(2767,16,'Altônia'),(2768,16,'Alvorada do Sul'),(2769,16,'Amaporã'),(2770,16,'Ampére'),(2771,16,'Anahy'),(2772,16,'Andirá'),(2773,16,'Ângulo'),(2774,16,'Antonina'),(2775,16,'Antônio Olinto'),(2776,16,'Apucarana'),(2777,16,'Arapongas'),(2778,16,'Arapoti'),(2779,16,'Arapuã'),(2780,16,'Araruna'),(2781,16,'Araucária'),(2782,16,'Ariranha do Ivaí'),(2783,16,'Assaí'),(2784,16,'Assis Chateaubriand'),(2785,16,'Astorga'),(2786,16,'Atalaia'),(2787,16,'Balsa Nova'),(2788,16,'Bandeirantes'),(2789,16,'Barbosa Ferraz'),(2790,16,'Barra do Jacaré'),(2791,16,'Barracão'),(2792,16,'Bela Vista da Caroba'),(2793,16,'Bela Vista do Paraíso'),(2794,16,'Bituruna'),(2795,16,'Boa Esperança'),(2796,16,'Boa Esperança do Iguaçu'),(2797,16,'Boa Ventura de São Roque'),(2798,16,'Boa Vista da Aparecida'),(2799,16,'Bocaiúva do Sul'),(2800,16,'Bom Jesus do Sul'),(2801,16,'Bom Sucesso'),(2802,16,'Bom Sucesso do Sul'),(2803,16,'Borrazópolis'),(2804,16,'Braganey'),(2805,16,'Brasilândia do Sul'),(2806,16,'Cafeara'),(2807,16,'Cafelândia'),(2808,16,'Cafezal do Sul'),(2809,16,'Califórnia'),(2810,16,'Cambará'),(2811,16,'Cambé'),(2812,16,'Cambira'),(2813,16,'Campina da Lagoa'),(2814,16,'Campina do Simão'),(2815,16,'Campina Grande do Sul'),(2816,16,'Campo Bonito'),(2817,16,'Campo do Tenente'),(2818,16,'Campo Largo'),(2819,16,'Campo Magro'),(2820,16,'Campo Mourão'),(2821,16,'Cândido de Abreu'),(2822,16,'Candói'),(2823,16,'Cantagalo'),(2824,16,'Capanema'),(2825,16,'Capitão Leônidas Marques'),(2826,16,'Carambeí'),(2827,16,'Carlópolis'),(2828,16,'Cascavel'),(2829,16,'Castro'),(2830,16,'Catanduvas'),(2831,16,'Centenário do Sul'),(2832,16,'Cerro Azul'),(2833,16,'Céu Azul'),(2834,16,'Chopinzinho'),(2835,16,'Cianorte'),(2836,16,'Cidade Gaúcha'),(2837,16,'Clevelândia'),(2838,16,'Colombo'),(2839,16,'Colorado'),(2840,16,'Congonhinhas'),(2841,16,'Conselheiro Mairinck'),(2842,16,'Contenda'),(2843,16,'Corbélia'),(2844,16,'Cornélio Procópio'),(2845,16,'Coronel Domingos Soares'),(2846,16,'Coronel Vivida'),(2847,16,'Corumbataí do Sul'),(2848,16,'Cruz Machado'),(2849,16,'Cruzeiro do Iguaçu'),(2850,16,'Cruzeiro do Oeste'),(2851,16,'Cruzeiro do Sul'),(2852,16,'Cruzmaltina'),(2853,16,'Curitiba'),(2854,16,'Curiúva'),(2855,16,'Diamante d`Oeste'),(2856,16,'Diamante do Norte'),(2857,16,'Diamante do Sul'),(2858,16,'Dois Vizinhos'),(2859,16,'Douradina'),(2860,16,'Doutor Camargo'),(2861,16,'Doutor Ulysses'),(2862,16,'Enéas Marques'),(2863,16,'Engenheiro Beltrão'),(2864,16,'Entre Rios do Oeste'),(2865,16,'Esperança Nova'),(2866,16,'Espigão Alto do Iguaçu'),(2867,16,'Farol'),(2868,16,'Faxinal'),(2869,16,'Fazenda Rio Grande'),(2870,16,'Fênix'),(2871,16,'Fernandes Pinheiro'),(2872,16,'Figueira'),(2873,16,'Flor da Serra do Sul'),(2874,16,'Floraí'),(2875,16,'Floresta'),(2876,16,'Florestópolis'),(2877,16,'Flórida'),(2878,16,'Formosa do Oeste'),(2879,16,'Foz do Iguaçu'),(2880,16,'Foz do Jordão'),(2881,16,'Francisco Alves'),(2882,16,'Francisco Beltrão'),(2883,16,'General Carneiro'),(2884,16,'Godoy Moreira'),(2885,16,'Goioerê'),(2886,16,'Goioxim'),(2887,16,'Grandes Rios'),(2888,16,'Guaíra'),(2889,16,'Guairaçá'),(2890,16,'Guamiranga'),(2891,16,'Guapirama'),(2892,16,'Guaporema'),(2893,16,'Guaraci'),(2894,16,'Guaraniaçu'),(2895,16,'Guarapuava'),(2896,16,'Guaraqueçaba'),(2897,16,'Guaratuba'),(2898,16,'Honório Serpa'),(2899,16,'Ibaiti'),(2900,16,'Ibema'),(2901,16,'Ibiporã'),(2902,16,'Icaraíma'),(2903,16,'Iguaraçu'),(2904,16,'Iguatu'),(2905,16,'Imbaú'),(2906,16,'Imbituva'),(2907,16,'Inácio Martins'),(2908,16,'Inajá'),(2909,16,'Indianópolis'),(2910,16,'Ipiranga'),(2911,16,'Iporã'),(2912,16,'Iracema do Oeste'),(2913,16,'Irati'),(2914,16,'Iretama'),(2915,16,'Itaguajé'),(2916,16,'Itaipulândia'),(2917,16,'Itambaracá'),(2918,16,'Itambé'),(2919,16,'Itapejara d`Oeste'),(2920,16,'Itaperuçu'),(2921,16,'Itaúna do Sul'),(2922,16,'Ivaí'),(2923,16,'Ivaiporã'),(2924,16,'Ivaté'),(2925,16,'Ivatuba'),(2926,16,'Jaboti'),(2927,16,'Jacarezinho'),(2928,16,'Jaguapitã'),(2929,16,'Jaguariaíva'),(2930,16,'Jandaia do Sul'),(2931,16,'Janiópolis'),(2932,16,'Japira'),(2933,16,'Japurá'),(2934,16,'Jardim Alegre'),(2935,16,'Jardim Olinda'),(2936,16,'Jataizinho'),(2937,16,'Jesuítas'),(2938,16,'Joaquim Távora'),(2939,16,'Jundiaí do Sul'),(2940,16,'Juranda'),(2941,16,'Jussara'),(2942,16,'Kaloré'),(2943,16,'Lapa'),(2944,16,'Laranjal'),(2945,16,'Laranjeiras do Sul'),(2946,16,'Leópolis'),(2947,16,'Lidianópolis'),(2948,16,'Lindoeste'),(2949,16,'Loanda'),(2950,16,'Lobato'),(2951,16,'Londrina'),(2952,16,'Luiziana'),(2953,16,'Lunardelli'),(2954,16,'Lupionópolis'),(2955,16,'Mallet'),(2956,16,'Mamborê'),(2957,16,'Mandaguaçu'),(2958,16,'Mandaguari'),(2959,16,'Mandirituba'),(2960,16,'Manfrinópolis'),(2961,16,'Mangueirinha'),(2962,16,'Manoel Ribas'),(2963,16,'Marechal Cândido Rondon'),(2964,16,'Maria Helena'),(2965,16,'Marialva'),(2966,16,'Marilândia do Sul'),(2967,16,'Marilena'),(2968,16,'Mariluz'),(2969,16,'Maringá'),(2970,16,'Mariópolis'),(2971,16,'Maripá'),(2972,16,'Marmeleiro'),(2973,16,'Marquinho'),(2974,16,'Marumbi'),(2975,16,'Matelândia'),(2976,16,'Matinhos'),(2977,16,'Mato Rico'),(2978,16,'Mauá da Serra'),(2979,16,'Medianeira'),(2980,16,'Mercedes'),(2981,16,'Mirador'),(2982,16,'Miraselva'),(2983,16,'Missal'),(2984,16,'Moreira Sales'),(2985,16,'Morretes'),(2986,16,'Munhoz de Melo'),(2987,16,'Nossa Senhora das Graças'),(2988,16,'Nova Aliança do Ivaí'),(2989,16,'Nova América da Colina'),(2990,16,'Nova Aurora'),(2991,16,'Nova Cantu'),(2992,16,'Nova Esperança'),(2993,16,'Nova Esperança do Sudoeste'),(2994,16,'Nova Fátima'),(2995,16,'Nova Laranjeiras'),(2996,16,'Nova Londrina'),(2997,16,'Nova Olímpia'),(2998,16,'Nova Prata do Iguaçu'),(2999,16,'Nova Santa Bárbara'),(3000,16,'Nova Santa Rosa'),(3001,16,'Nova Tebas'),(3002,16,'Novo Itacolomi'),(3003,16,'Ortigueira'),(3004,16,'Ourizona'),(3005,16,'Ouro Verde do Oeste'),(3006,16,'Paiçandu'),(3007,16,'Palmas'),(3008,16,'Palmeira'),(3009,16,'Palmital'),(3010,16,'Palotina'),(3011,16,'Paraíso do Norte'),(3012,16,'Paranacity'),(3013,16,'Paranaguá'),(3014,16,'Paranapoema'),(3015,16,'Paranavaí'),(3016,16,'Pato Bragado'),(3017,16,'Pato Branco'),(3018,16,'Paula Freitas'),(3019,16,'Paulo Frontin'),(3020,16,'Peabiru'),(3021,16,'Perobal'),(3022,16,'Pérola'),(3023,16,'Pérola d`Oeste'),(3024,16,'Piên'),(3025,16,'Pinhais'),(3026,16,'Pinhal de São Bento'),(3027,16,'Pinhalão'),(3028,16,'Pinhão'),(3029,16,'Piraí do Sul'),(3030,16,'Piraquara'),(3031,16,'Pitanga'),(3032,16,'Pitangueiras'),(3033,16,'Planaltina do Paraná'),(3034,16,'Planalto'),(3035,16,'Ponta Grossa'),(3036,16,'Pontal do Paraná'),(3037,16,'Porecatu'),(3038,16,'Porto Amazonas'),(3039,16,'Porto Barreiro'),(3040,16,'Porto Rico'),(3041,16,'Porto Vitória'),(3042,16,'Prado Ferreira'),(3043,16,'Pranchita'),(3044,16,'Presidente Castelo Branco'),(3045,16,'Primeiro de Maio'),(3046,16,'Prudentópolis'),(3047,16,'Quarto Centenário'),(3048,16,'Quatiguá'),(3049,16,'Quatro Barras'),(3050,16,'Quatro Pontes'),(3051,16,'Quedas do Iguaçu'),(3052,16,'Querência do Norte'),(3053,16,'Quinta do Sol'),(3054,16,'Quitandinha'),(3055,16,'Ramilândia'),(3056,16,'Rancho Alegre'),(3057,16,'Rancho Alegre d`Oeste'),(3058,16,'Realeza'),(3059,16,'Rebouças'),(3060,16,'Renascença'),(3061,16,'Reserva'),(3062,16,'Reserva do Iguaçu'),(3063,16,'Ribeirão Claro'),(3064,16,'Ribeirão do Pinhal'),(3065,16,'Rio Azul'),(3066,16,'Rio Bom'),(3067,16,'Rio Bonito do Iguaçu'),(3068,16,'Rio Branco do Ivaí'),(3069,16,'Rio Branco do Sul'),(3070,16,'Rio Negro'),(3071,16,'Rolândia'),(3072,16,'Roncador'),(3073,16,'Rondon'),(3074,16,'Rosário do Ivaí'),(3075,16,'Sabáudia'),(3076,16,'Salgado Filho'),(3077,16,'Salto do Itararé'),(3078,16,'Salto do Lontra'),(3079,16,'Santa Amélia'),(3080,16,'Santa Cecília do Pavão'),(3081,16,'Santa Cruz de Monte Castelo'),(3082,16,'Santa Fé'),(3083,16,'Santa Helena'),(3084,16,'Santa Inês'),(3085,16,'Santa Isabel do Ivaí'),(3086,16,'Santa Izabel do Oeste'),(3087,16,'Santa Lúcia'),(3088,16,'Santa Maria do Oeste'),(3089,16,'Santa Mariana'),(3090,16,'Santa Mônica'),(3091,16,'Santa Tereza do Oeste'),(3092,16,'Santa Terezinha de Itaipu'),(3093,16,'Santana do Itararé'),(3094,16,'Santo Antônio da Platina'),(3095,16,'Santo Antônio do Caiuá'),(3096,16,'Santo Antônio do Paraíso'),(3097,16,'Santo Antônio do Sudoeste'),(3098,16,'Santo Inácio'),(3099,16,'São Carlos do Ivaí'),(3100,16,'São Jerônimo da Serra'),(3101,16,'São João'),(3102,16,'São João do Caiuá'),(3103,16,'São João do Ivaí'),(3104,16,'São João do Triunfo'),(3105,16,'São Jorge d`Oeste'),(3106,16,'São Jorge do Ivaí'),(3107,16,'São Jorge do Patrocínio'),(3108,16,'São José da Boa Vista'),(3109,16,'São José das Palmeiras'),(3110,16,'São José dos Pinhais'),(3111,16,'São Manoel do Paraná'),(3112,16,'São Mateus do Sul'),(3113,16,'São Miguel do Iguaçu'),(3114,16,'São Pedro do Iguaçu'),(3115,16,'São Pedro do Ivaí'),(3116,16,'São Pedro do Paraná'),(3117,16,'São Sebastião da Amoreira'),(3118,16,'São Tomé'),(3119,16,'Sapopema'),(3120,16,'Sarandi'),(3121,16,'Saudade do Iguaçu'),(3122,16,'Sengés'),(3123,16,'Serranópolis do Iguaçu'),(3124,16,'Sertaneja'),(3125,16,'Sertanópolis'),(3126,16,'Siqueira Campos'),(3127,16,'Sulina'),(3128,16,'Tamarana'),(3129,16,'Tamboara'),(3130,16,'Tapejara'),(3131,16,'Tapira'),(3132,16,'Teixeira Soares'),(3133,16,'Telêmaco Borba'),(3134,16,'Terra Boa'),(3135,16,'Terra Rica'),(3136,16,'Terra Roxa'),(3137,16,'Tibagi'),(3138,16,'Tijucas do Sul'),(3139,16,'Toledo'),(3140,16,'Tomazina'),(3141,16,'Três Barras do Paraná'),(3142,16,'Tunas do Paraná'),(3143,16,'Tuneiras do Oeste'),(3144,16,'Tupãssi'),(3145,16,'Turvo'),(3146,16,'Ubiratã'),(3147,16,'Umuarama'),(3148,16,'União da Vitória'),(3149,16,'Uniflor'),(3150,16,'Uraí'),(3151,16,'Ventania'),(3152,16,'Vera Cruz do Oeste'),(3153,16,'Verê'),(3154,16,'Vila Alta'),(3155,16,'Virmond'),(3156,16,'Vitorino'),(3157,16,'Wenceslau Braz'),(3158,16,'Xambrê'),(3159,17,'Abreu e Lima'),(3160,17,'Afogados da Ingazeira'),(3161,17,'Afrânio'),(3162,17,'Agrestina'),(3163,17,'Água Preta'),(3164,17,'Águas Belas'),(3165,17,'Alagoinha'),(3166,17,'Aliança'),(3167,17,'Altinho'),(3168,17,'Amaraji'),(3169,17,'Angelim'),(3170,17,'Araçoiaba'),(3171,17,'Araripina'),(3172,17,'Arcoverde'),(3173,17,'Barra de Guabiraba'),(3174,17,'Barreiros'),(3175,17,'Belém de Maria'),(3176,17,'Belém de São Francisco'),(3177,17,'Belo Jardim'),(3178,17,'Betânia'),(3179,17,'Bezerros'),(3180,17,'Bodocó'),(3181,17,'Bom Conselho'),(3182,17,'Bom Jardim'),(3183,17,'Bonito'),(3184,17,'Brejão'),(3185,17,'Brejinho'),(3186,17,'Brejo da Madre de Deus'),(3187,17,'Buenos Aires'),(3188,17,'Buíque'),(3189,17,'Cabo de Santo Agostinho'),(3190,17,'Cabrobó'),(3191,17,'Cachoeirinha'),(3192,17,'Caetés'),(3193,17,'Calçado'),(3194,17,'Calumbi'),(3195,17,'Camaragibe'),(3196,17,'Camocim de São Félix'),(3197,17,'Camutanga'),(3198,17,'Canhotinho'),(3199,17,'Capoeiras'),(3200,17,'Carnaíba'),(3201,17,'Carnaubeira da Penha'),(3202,17,'Carpina'),(3203,17,'Caruaru'),(3204,17,'Casinhas'),(3205,17,'Catende'),(3206,17,'Cedro'),(3207,17,'Chã de Alegria'),(3208,17,'Chã Grande'),(3209,17,'Condado'),(3210,17,'Correntes'),(3211,17,'Cortês'),(3212,17,'Cumaru'),(3213,17,'Cupira'),(3214,17,'Custódia'),(3215,17,'Dormentes'),(3216,17,'Escada'),(3217,17,'Exu'),(3218,17,'Feira Nova'),(3219,17,'Fernando de Noronha'),(3220,17,'Ferreiros'),(3221,17,'Flores'),(3222,17,'Floresta'),(3223,17,'Frei Miguelinho'),(3224,17,'Gameleira'),(3225,17,'Garanhuns'),(3226,17,'Glória do Goitá'),(3227,17,'Goiana'),(3228,17,'Granito'),(3229,17,'Gravatá'),(3230,17,'Iati'),(3231,17,'Ibimirim'),(3232,17,'Ibirajuba'),(3233,17,'Igarassu'),(3234,17,'Iguaraci'),(3235,17,'Inajá'),(3236,17,'Ingazeira'),(3237,17,'Ipojuca'),(3238,17,'Ipubi'),(3239,17,'Itacuruba'),(3240,17,'Itaíba'),(3241,17,'Itamaracá'),(3242,17,'Itambé'),(3243,17,'Itapetim'),(3244,17,'Itapissuma'),(3245,17,'Itaquitinga'),(3246,17,'Jaboatão dos Guararapes'),(3247,17,'Jaqueira'),(3248,17,'Jataúba'),(3249,17,'Jatobá'),(3250,17,'João Alfredo'),(3251,17,'Joaquim Nabuco'),(3252,17,'Jucati'),(3253,17,'Jupi'),(3254,17,'Jurema'),(3255,17,'Lagoa do Carro'),(3256,17,'Lagoa do Itaenga'),(3257,17,'Lagoa do Ouro'),(3258,17,'Lagoa dos Gatos'),(3259,17,'Lagoa Grande'),(3260,17,'Lajedo'),(3261,17,'Limoeiro'),(3262,17,'Macaparana'),(3263,17,'Machados'),(3264,17,'Manari'),(3265,17,'Maraial'),(3266,17,'Mirandiba'),(3267,17,'Moreilândia'),(3268,17,'Moreno'),(3269,17,'Nazaré da Mata'),(3270,17,'Olinda'),(3271,17,'Orobó'),(3272,17,'Orocó'),(3273,17,'Ouricuri'),(3274,17,'Palmares'),(3275,17,'Palmeirina'),(3276,17,'Panelas'),(3277,17,'Paranatama'),(3278,17,'Parnamirim'),(3279,17,'Passira'),(3280,17,'Paudalho'),(3281,17,'Paulista'),(3282,17,'Pedra'),(3283,17,'Pesqueira'),(3284,17,'Petrolândia'),(3285,17,'Petrolina'),(3286,17,'Poção'),(3287,17,'Pombos'),(3288,17,'Primavera'),(3289,17,'Quipapá'),(3290,17,'Quixaba'),(3291,17,'Recife'),(3292,17,'Riacho das Almas'),(3293,17,'Ribeirão'),(3294,17,'Rio Formoso'),(3295,17,'Sairé'),(3296,17,'Salgadinho'),(3297,17,'Salgueiro'),(3298,17,'Saloá'),(3299,17,'Sanharó'),(3300,17,'Santa Cruz'),(3301,17,'Santa Cruz da Baixa Verde'),(3302,17,'Santa Cruz do Capibaribe'),(3303,17,'Santa Filomena'),(3304,17,'Santa Maria da Boa Vista'),(3305,17,'Santa Maria do Cambucá'),(3306,17,'Santa Terezinha'),(3307,17,'São Benedito do Sul'),(3308,17,'São Bento do Una'),(3309,17,'São Caitano'),(3310,17,'São João'),(3311,17,'São Joaquim do Monte'),(3312,17,'São José da Coroa Grande'),(3313,17,'São José do Belmonte'),(3314,17,'São José do Egito'),(3315,17,'São Lourenço da Mata'),(3316,17,'São Vicente Ferrer'),(3317,17,'Serra Talhada'),(3318,17,'Serrita'),(3319,17,'Sertânia'),(3320,17,'Sirinhaém'),(3321,17,'Solidão'),(3322,17,'Surubim'),(3323,17,'Tabira'),(3324,17,'Tacaimbó'),(3325,17,'Tacaratu'),(3326,17,'Tamandaré'),(3327,17,'Taquaritinga do Norte'),(3328,17,'Terezinha'),(3329,17,'Terra Nova'),(3330,17,'Timbaúba'),(3331,17,'Toritama'),(3332,17,'Tracunhaém'),(3333,17,'Trindade'),(3334,17,'Triunfo'),(3335,17,'Tupanatinga'),(3336,17,'Tuparetama'),(3337,17,'Venturosa'),(3338,17,'Verdejante'),(3339,17,'Vertente do Lério'),(3340,17,'Vertentes'),(3341,17,'Vicência'),(3342,17,'Vitória de Santo Antão'),(3343,17,'Xexéu'),(3344,18,'Acauã'),(3345,18,'Agricolândia'),(3346,18,'Água Branca'),(3347,18,'Alagoinha do Piauí'),(3348,18,'Alegrete do Piauí'),(3349,18,'Alto Longá'),(3350,18,'Altos'),(3351,18,'Alvorada do Gurguéia'),(3352,18,'Amarante'),(3353,18,'Angical do Piauí'),(3354,18,'Anísio de Abreu'),(3355,18,'Antônio Almeida'),(3356,18,'Aroazes'),(3357,18,'Arraial'),(3358,18,'Assunção do Piauí'),(3359,18,'Avelino Lopes'),(3360,18,'Baixa Grande do Ribeiro'),(3361,18,'Barra d`Alcântara'),(3362,18,'Barras'),(3363,18,'Barreiras do Piauí'),(3364,18,'Barro Duro'),(3365,18,'Batalha'),(3366,18,'Bela Vista do Piauí'),(3367,18,'Belém do Piauí'),(3368,18,'Beneditinos'),(3369,18,'Bertolínia'),(3370,18,'Betânia do Piauí'),(3371,18,'Boa Hora'),(3372,18,'Bocaina'),(3373,18,'Bom Jesus'),(3374,18,'Bom Princípio do Piauí'),(3375,18,'Bonfim do Piauí'),(3376,18,'Boqueirão do Piauí'),(3377,18,'Brasileira'),(3378,18,'Brejo do Piauí'),(3379,18,'Buriti dos Lopes'),(3380,18,'Buriti dos Montes'),(3381,18,'Cabeceiras do Piauí'),(3382,18,'Cajazeiras do Piauí'),(3383,18,'Cajueiro da Praia'),(3384,18,'Caldeirão Grande do Piauí'),(3385,18,'Campinas do Piauí'),(3386,18,'Campo Alegre do Fidalgo'),(3387,18,'Campo Grande do Piauí'),(3388,18,'Campo Largo do Piauí'),(3389,18,'Campo Maior'),(3390,18,'Canavieira'),(3391,18,'Canto do Buriti'),(3392,18,'Capitão de Campos'),(3393,18,'Capitão Gervásio Oliveira'),(3394,18,'Caracol'),(3395,18,'Caraúbas do Piauí'),(3396,18,'Caridade do Piauí'),(3397,18,'Castelo do Piauí'),(3398,18,'Caxingó'),(3399,18,'Cocal'),(3400,18,'Cocal de Telha'),(3401,18,'Cocal dos Alves'),(3402,18,'Coivaras'),(3403,18,'Colônia do Gurguéia'),(3404,18,'Colônia do Piauí'),(3405,18,'Conceição do Canindé'),(3406,18,'Coronel José Dias'),(3407,18,'Corrente'),(3408,18,'Cristalândia do Piauí'),(3409,18,'Cristino Castro'),(3410,18,'Curimatá'),(3411,18,'Currais'),(3412,18,'Curral Novo do Piauí'),(3413,18,'Curralinhos'),(3414,18,'Demerval Lobão'),(3415,18,'Dirceu Arcoverde'),(3416,18,'Dom Expedito Lopes'),(3417,18,'Dom Inocêncio'),(3418,18,'Domingos Mourão'),(3419,18,'Elesbão Veloso'),(3420,18,'Eliseu Martins'),(3421,18,'Esperantina'),(3422,18,'Fartura do Piauí'),(3423,18,'Flores do Piauí'),(3424,18,'Floresta do Piauí'),(3425,18,'Floriano'),(3426,18,'Francinópolis'),(3427,18,'Francisco Ayres'),(3428,18,'Francisco Macedo'),(3429,18,'Francisco Santos'),(3430,18,'Fronteiras'),(3431,18,'Geminiano'),(3432,18,'Gilbués'),(3433,18,'Guadalupe'),(3434,18,'Guaribas'),(3435,18,'Hugo Napoleão'),(3436,18,'Ilha Grande'),(3437,18,'Inhuma'),(3438,18,'Ipiranga do Piauí'),(3439,18,'Isaías Coelho'),(3440,18,'Itainópolis'),(3441,18,'Itaueira'),(3442,18,'Jacobina do Piauí'),(3443,18,'Jaicós'),(3444,18,'Jardim do Mulato'),(3445,18,'Jatobá do Piauí'),(3446,18,'Jerumenha'),(3447,18,'João Costa'),(3448,18,'Joaquim Pires'),(3449,18,'Joca Marques'),(3450,18,'José de Freitas'),(3451,18,'Juazeiro do Piauí'),(3452,18,'Júlio Borges'),(3453,18,'Jurema'),(3454,18,'Lagoa Alegre'),(3455,18,'Lagoa de São Francisco'),(3456,18,'Lagoa do Barro do Piauí'),(3457,18,'Lagoa do Piauí'),(3458,18,'Lagoa do Sítio'),(3459,18,'Lagoinha do Piauí'),(3460,18,'Landri Sales'),(3461,18,'Luís Correia'),(3462,18,'Luzilândia'),(3463,18,'Madeiro'),(3464,18,'Manoel Emídio'),(3465,18,'Marcolândia'),(3466,18,'Marcos Parente'),(3467,18,'Massapê do Piauí'),(3468,18,'Matias Olímpio'),(3469,18,'Miguel Alves'),(3470,18,'Miguel Leão'),(3471,18,'Milton Brandão'),(3472,18,'Monsenhor Gil'),(3473,18,'Monsenhor Hipólito'),(3474,18,'Monte Alegre do Piauí'),(3475,18,'Morro Cabeça no Tempo'),(3476,18,'Morro do Chapéu do Piauí'),(3477,18,'Murici dos Portelas'),(3478,18,'Nazaré do Piauí'),(3479,18,'Nossa Senhora de Nazaré'),(3480,18,'Nossa Senhora dos Remédios'),(3481,18,'Nova Santa Rita'),(3482,18,'Novo Oriente do Piauí'),(3483,18,'Novo Santo Antônio'),(3484,18,'Oeiras'),(3485,18,'Olho d`Água do Piauí'),(3486,18,'Padre Marcos'),(3487,18,'Paes Landim'),(3488,18,'Pajeú do Piauí'),(3489,18,'Palmeira do Piauí'),(3490,18,'Palmeirais'),(3491,18,'Paquetá'),(3492,18,'Parnaguá'),(3493,18,'Parnaíba'),(3494,18,'Passagem Franca do Piauí'),(3495,18,'Patos do Piauí'),(3496,18,'Paulistana'),(3497,18,'Pavussu'),(3498,18,'Pedro II'),(3499,18,'Pedro Laurentino'),(3500,18,'Picos'),(3501,18,'Pimenteiras'),(3502,18,'Pio IX'),(3503,18,'Piracuruca'),(3504,18,'Piripiri'),(3505,18,'Porto'),(3506,18,'Porto Alegre do Piauí'),(3507,18,'Prata do Piauí'),(3508,18,'Queimada Nova'),(3509,18,'Redenção do Gurguéia'),(3510,18,'Regeneração'),(3511,18,'Riacho Frio'),(3512,18,'Ribeira do Piauí'),(3513,18,'Ribeiro Gonçalves'),(3514,18,'Rio Grande do Piauí'),(3515,18,'Santa Cruz do Piauí'),(3516,18,'Santa Cruz dos Milagres'),(3517,18,'Santa Filomena'),(3518,18,'Santa Luz'),(3519,18,'Santa Rosa do Piauí'),(3520,18,'Santana do Piauí'),(3521,18,'Santo Antônio de Lisboa'),(3522,18,'Santo Antônio dos Milagres'),(3523,18,'Santo Inácio do Piauí'),(3524,18,'São Braz do Piauí'),(3525,18,'São Félix do Piauí'),(3526,18,'São Francisco de Assis do Piauí'),(3527,18,'São Francisco do Piauí'),(3528,18,'São Gonçalo do Gurguéia'),(3529,18,'São Gonçalo do Piauí'),(3530,18,'São João da Canabrava'),(3531,18,'São João da Fronteira'),(3532,18,'São João da Serra'),(3533,18,'São João da Varjota'),(3534,18,'São João do Arraial'),(3535,18,'São João do Piauí'),(3536,18,'São José do Divino'),(3537,18,'São José do Peixe'),(3538,18,'São José do Piauí'),(3539,18,'São Julião'),(3540,18,'São Lourenço do Piauí'),(3541,18,'São Luis do Piauí'),(3542,18,'São Miguel da Baixa Grande'),(3543,18,'São Miguel do Fidalgo'),(3544,18,'São Miguel do Tapuio'),(3545,18,'São Pedro do Piauí'),(3546,18,'São Raimundo Nonato'),(3547,18,'Sebastião Barros'),(3548,18,'Sebastião Leal'),(3549,18,'Sigefredo Pacheco'),(3550,18,'Simões'),(3551,18,'Simplício Mendes'),(3552,18,'Socorro do Piauí'),(3553,18,'Sussuapara'),(3554,18,'Tamboril do Piauí'),(3555,18,'Tanque do Piauí'),(3556,18,'Teresina'),(3557,18,'União'),(3558,18,'Uruçuí'),(3559,18,'Valença do Piauí'),(3560,18,'Várzea Branca'),(3561,18,'Várzea Grande'),(3562,18,'Vera Mendes'),(3563,18,'Vila Nova do Piauí'),(3564,18,'Wall Ferraz'),(3565,19,'Angra dos Reis'),(3566,19,'Aperibé'),(3567,19,'Araruama'),(3568,19,'Areal'),(3569,19,'Armação dos Búzios'),(3570,19,'Arraial do Cabo'),(3571,19,'Barra do Piraí'),(3572,19,'Barra Mansa'),(3573,19,'Belford Roxo'),(3574,19,'Bom Jardim'),(3575,19,'Bom Jesus do Itabapoana'),(3576,19,'Cabo Frio'),(3577,19,'Cachoeiras de Macacu'),(3578,19,'Cambuci'),(3579,19,'Campos dos Goytacazes'),(3580,19,'Cantagalo'),(3581,19,'Carapebus'),(3582,19,'Cardoso Moreira'),(3583,19,'Carmo'),(3584,19,'Casimiro de Abreu'),(3585,19,'Comendador Levy Gasparian'),(3586,19,'Conceição de Macabu'),(3587,19,'Cordeiro'),(3588,19,'Duas Barras'),(3589,19,'Duque de Caxias'),(3590,19,'Engenheiro Paulo de Frontin'),(3591,19,'Guapimirim'),(3592,19,'Iguaba Grande'),(3593,19,'Itaboraí'),(3594,19,'Itaguaí'),(3595,19,'Italva'),(3596,19,'Itaocara'),(3597,19,'Itaperuna'),(3598,19,'Itatiaia'),(3599,19,'Japeri'),(3600,19,'Laje do Muriaé'),(3601,19,'Macaé'),(3602,19,'Macuco'),(3603,19,'Magé'),(3604,19,'Mangaratiba'),(3605,19,'Maricá'),(3606,19,'Mendes'),(3607,19,'Miguel Pereira'),(3608,19,'Miracema'),(3609,19,'Natividade'),(3610,19,'Nilópolis'),(3611,19,'Niterói'),(3612,19,'Nova Friburgo'),(3613,19,'Nova Iguaçu'),(3614,19,'Paracambi'),(3615,19,'Paraíba do Sul'),(3616,19,'Parati'),(3617,19,'Paty do Alferes'),(3618,19,'Petrópolis'),(3619,19,'Pinheiral'),(3620,19,'Piraí'),(3621,19,'Porciúncula'),(3622,19,'Porto Real'),(3623,19,'Quatis'),(3624,19,'Queimados'),(3625,19,'Quissamã'),(3626,19,'Resende'),(3627,19,'Rio Bonito'),(3628,19,'Rio Claro'),(3629,19,'Rio das Flores'),(3630,19,'Rio das Ostras'),(3631,19,'Rio de Janeiro'),(3632,19,'Santa Maria Madalena'),(3633,19,'Santo Antônio de Pádua'),(3634,19,'São Fidélis'),(3635,19,'São Francisco de Itabapoana'),(3636,19,'São Gonçalo'),(3637,19,'São João da Barra'),(3638,19,'São João de Meriti'),(3639,19,'São José de Ubá'),(3640,19,'São José do Vale do Rio Preto'),(3641,19,'São Pedro da Aldeia'),(3642,19,'São Sebastião do Alto'),(3643,19,'Sapucaia'),(3644,19,'Saquarema'),(3645,19,'Seropédica'),(3646,19,'Silva Jardim'),(3647,19,'Sumidouro'),(3648,19,'Tanguá'),(3649,19,'Teresópolis'),(3650,19,'Trajano de Morais'),(3651,19,'Três Rios'),(3652,19,'Valença'),(3653,19,'Varre-Sai'),(3654,19,'Vassouras'),(3655,19,'Volta Redonda'),(3656,20,'Acari'),(3657,20,'Açu'),(3658,20,'Afonso Bezerra'),(3659,20,'Água Nova'),(3660,20,'Alexandria'),(3661,20,'Almino Afonso'),(3662,20,'Alto do Rodrigues'),(3663,20,'Angicos'),(3664,20,'Antônio Martins'),(3665,20,'Apodi'),(3666,20,'Areia Branca'),(3667,20,'Arês'),(3668,20,'Augusto Severo'),(3669,20,'Baía Formosa'),(3670,20,'Baraúna'),(3671,20,'Barcelona'),(3672,20,'Bento Fernandes'),(3673,20,'Bodó'),(3674,20,'Bom Jesus'),(3675,20,'Brejinho'),(3676,20,'Caiçara do Norte'),(3677,20,'Caiçara do Rio do Vento'),(3678,20,'Caicó'),(3679,20,'Campo Redondo'),(3680,20,'Canguaretama'),(3681,20,'Caraúbas'),(3682,20,'Carnaúba dos Dantas'),(3683,20,'Carnaubais'),(3684,20,'Ceará-Mirim'),(3685,20,'Cerro Corá'),(3686,20,'Coronel Ezequiel'),(3687,20,'Coronel João Pessoa'),(3688,20,'Cruzeta'),(3689,20,'Currais Novos'),(3690,20,'Doutor Severiano'),(3691,20,'Encanto'),(3692,20,'Equador'),(3693,20,'Espírito Santo'),(3694,20,'Extremoz'),(3695,20,'Felipe Guerra'),(3696,20,'Fernando Pedroza'),(3697,20,'Florânia'),(3698,20,'Francisco Dantas'),(3699,20,'Frutuoso Gomes'),(3700,20,'Galinhos'),(3701,20,'Goianinha'),(3702,20,'Governador Dix-Sept Rosado'),(3703,20,'Grossos'),(3704,20,'Guamaré'),(3705,20,'Ielmo Marinho'),(3706,20,'Ipanguaçu'),(3707,20,'Ipueira'),(3708,20,'Itajá'),(3709,20,'Itaú'),(3710,20,'Jaçanã'),(3711,20,'Jandaíra'),(3712,20,'Janduís'),(3713,20,'Januário Cicco'),(3714,20,'Japi'),(3715,20,'Jardim de Angicos'),(3716,20,'Jardim de Piranhas'),(3717,20,'Jardim do Seridó'),(3718,20,'João Câmara'),(3719,20,'João Dias'),(3720,20,'José da Penha'),(3721,20,'Jucurutu'),(3722,20,'Lagoa d`Anta'),(3723,20,'Lagoa de Pedras'),(3724,20,'Lagoa de Velhos'),(3725,20,'Lagoa Nova'),(3726,20,'Lagoa Salgada'),(3727,20,'Lajes'),(3728,20,'Lajes Pintadas'),(3729,20,'Lucrécia'),(3730,20,'Luís Gomes'),(3731,20,'Macaíba'),(3732,20,'Macau'),(3733,20,'Major Sales'),(3734,20,'Marcelino Vieira'),(3735,20,'Martins'),(3736,20,'Maxaranguape'),(3737,20,'Messias Targino'),(3738,20,'Montanhas'),(3739,20,'Monte Alegre'),(3740,20,'Monte das Gameleiras'),(3741,20,'Mossoró'),(3742,20,'Natal'),(3743,20,'Nísia Floresta'),(3744,20,'Nova Cruz'),(3745,20,'Olho-d`Água do Borges'),(3746,20,'Ouro Branco'),(3747,20,'Paraná'),(3748,20,'Paraú'),(3749,20,'Parazinho'),(3750,20,'Parelhas'),(3751,20,'Parnamirim'),(3752,20,'Passa e Fica'),(3753,20,'Passagem'),(3754,20,'Patu'),(3755,20,'Pau dos Ferros'),(3756,20,'Pedra Grande'),(3757,20,'Pedra Preta'),(3758,20,'Pedro Avelino'),(3759,20,'Pedro Velho'),(3760,20,'Pendências'),(3761,20,'Pilões'),(3762,20,'Poço Branco'),(3763,20,'Portalegre'),(3764,20,'Porto do Mangue'),(3765,20,'Presidente Juscelino'),(3766,20,'Pureza'),(3767,20,'Rafael Fernandes'),(3768,20,'Rafael Godeiro'),(3769,20,'Riacho da Cruz'),(3770,20,'Riacho de Santana'),(3771,20,'Riachuelo'),(3772,20,'Rio do Fogo'),(3773,20,'Rodolfo Fernandes'),(3774,20,'Ruy Barbosa'),(3775,20,'Santa Cruz'),(3776,20,'Santa Maria'),(3777,20,'Santana do Matos'),(3778,20,'Santana do Seridó'),(3779,20,'Santo Antônio'),(3780,20,'São Bento do Norte'),(3781,20,'São Bento do Trairí'),(3782,20,'São Fernando'),(3783,20,'São Francisco do Oeste'),(3784,20,'São Gonçalo do Amarante'),(3785,20,'São João do Sabugi'),(3786,20,'São José de Mipibu'),(3787,20,'São José do Campestre'),(3788,20,'São José do Seridó'),(3789,20,'São Miguel'),(3790,20,'São Miguel de Touros'),(3791,20,'São Paulo do Potengi'),(3792,20,'São Pedro'),(3793,20,'São Rafael'),(3794,20,'São Tomé'),(3795,20,'São Vicente'),(3796,20,'Senador Elói de Souza'),(3797,20,'Senador Georgino Avelino'),(3798,20,'Serra de São Bento'),(3799,20,'Serra do Mel'),(3800,20,'Serra Negra do Norte'),(3801,20,'Serrinha'),(3802,20,'Serrinha dos Pintos'),(3803,20,'Severiano Melo'),(3804,20,'Sítio Novo'),(3805,20,'Taboleiro Grande'),(3806,20,'Taipu'),(3807,20,'Tangará'),(3808,20,'Tenente Ananias'),(3809,20,'Tenente Laurentino Cruz'),(3810,20,'Tibau'),(3811,20,'Tibau do Sul'),(3812,20,'Timbaúba dos Batistas'),(3813,20,'Touros'),(3814,20,'Triunfo Potiguar'),(3815,20,'Umarizal'),(3816,20,'Upanema'),(3817,20,'Várzea'),(3818,20,'Venha-Ver'),(3819,20,'Vera Cruz'),(3820,20,'Viçosa'),(3821,20,'Vila Flor'),(3822,21,'Água Santa'),(3823,21,'Agudo'),(3824,21,'Ajuricaba'),(3825,21,'Alecrim'),(3826,21,'Alegrete'),(3827,21,'Alegria'),(3828,21,'Alpestre'),(3829,21,'Alto Alegre'),(3830,21,'Alto Feliz'),(3831,21,'Alvorada'),(3832,21,'Amaral Ferrador'),(3833,21,'Ametista do Sul'),(3834,21,'André da Rocha'),(3835,21,'Anta Gorda'),(3836,21,'Antônio Prado'),(3837,21,'Arambaré'),(3838,21,'Araricá'),(3839,21,'Aratiba'),(3840,21,'Arroio do Meio'),(3841,21,'Arroio do Sal'),(3842,21,'Arroio do Tigre'),(3843,21,'Arroio dos Ratos'),(3844,21,'Arroio Grande'),(3845,21,'Arvorezinha'),(3846,21,'Augusto Pestana'),(3847,21,'Áurea'),(3848,21,'Bagé'),(3849,21,'Balneário Pinhal'),(3850,21,'Barão'),(3851,21,'Barão de Cotegipe'),(3852,21,'Barão do Triunfo'),(3853,21,'Barra do Guarita'),(3854,21,'Barra do Quaraí'),(3855,21,'Barra do Ribeiro'),(3856,21,'Barra do Rio Azul'),(3857,21,'Barra Funda'),(3858,21,'Barracão'),(3859,21,'Barros Cassal'),(3860,21,'Benjamin Constant do Sul'),(3861,21,'Bento Gonçalves'),(3862,21,'Boa Vista das Missões'),(3863,21,'Boa Vista do Buricá'),(3864,21,'Boa Vista do Sul'),(3865,21,'Bom Jesus'),(3866,21,'Bom Princípio'),(3867,21,'Bom Progresso'),(3868,21,'Bom Retiro do Sul'),(3869,21,'Boqueirão do Leão'),(3870,21,'Bossoroca'),(3871,21,'Braga'),(3872,21,'Brochier'),(3873,21,'Butiá'),(3874,21,'Caçapava do Sul'),(3875,21,'Cacequi'),(3876,21,'Cachoeira do Sul'),(3877,21,'Cachoeirinha'),(3878,21,'Cacique Doble'),(3879,21,'Caibaté'),(3880,21,'Caiçara'),(3881,21,'Camaquã'),(3882,21,'Camargo'),(3883,21,'Cambará do Sul'),(3884,21,'Campestre da Serra'),(3885,21,'Campina das Missões'),(3886,21,'Campinas do Sul'),(3887,21,'Campo Bom'),(3888,21,'Campo Novo'),(3889,21,'Campos Borges'),(3890,21,'Candelária'),(3891,21,'Cândido Godói'),(3892,21,'Candiota'),(3893,21,'Canela'),(3894,21,'Canguçu'),(3895,21,'Canoas'),(3896,21,'Capão da Canoa'),(3897,21,'Capão do Leão'),(3898,21,'Capela de Santana'),(3899,21,'Capitão'),(3900,21,'Capivari do Sul'),(3901,21,'Caraá'),(3902,21,'Carazinho'),(3903,21,'Carlos Barbosa'),(3904,21,'Carlos Gomes'),(3905,21,'Casca'),(3906,21,'Caseiros'),(3907,21,'Catuípe'),(3908,21,'Caxias do Sul'),(3909,21,'Centenário'),(3910,21,'Cerrito'),(3911,21,'Cerro Branco'),(3912,21,'Cerro Grande'),(3913,21,'Cerro Grande do Sul'),(3914,21,'Cerro Largo'),(3915,21,'Chapada'),(3916,21,'Charqueadas'),(3917,21,'Charrua'),(3918,21,'Chiapeta'),(3919,21,'Chuí'),(3920,21,'Chuvisca'),(3921,21,'Cidreira'),(3922,21,'Ciríaco'),(3923,21,'Colinas'),(3924,21,'Colorado'),(3925,21,'Condor'),(3926,21,'Constantina'),(3927,21,'Coqueiros do Sul'),(3928,21,'Coronel Barros'),(3929,21,'Coronel Bicaco'),(3930,21,'Cotiporã'),(3931,21,'Coxilha'),(3932,21,'Crissiumal'),(3933,21,'Cristal'),(3934,21,'Cristal do Sul'),(3935,21,'Cruz Alta'),(3936,21,'Cruzeiro do Sul'),(3937,21,'David Canabarro'),(3938,21,'Derrubadas'),(3939,21,'Dezesseis de Novembro'),(3940,21,'Dilermando de Aguiar'),(3941,21,'Dois Irmãos'),(3942,21,'Dois Irmãos das Missões'),(3943,21,'Dois Lajeados'),(3944,21,'Dom Feliciano'),(3945,21,'Dom Pedrito'),(3946,21,'Dom Pedro de Alcântara'),(3947,21,'Dona Francisca'),(3948,21,'Doutor Maurício Cardoso'),(3949,21,'Doutor Ricardo'),(3950,21,'Eldorado do Sul'),(3951,21,'Encantado'),(3952,21,'Encruzilhada do Sul'),(3953,21,'Engenho Velho'),(3954,21,'Entre Rios do Sul'),(3955,21,'Entre-Ijuís'),(3956,21,'Erebango'),(3957,21,'Erechim'),(3958,21,'Ernestina'),(3959,21,'Erval Grande'),(3960,21,'Erval Seco'),(3961,21,'Esmeralda'),(3962,21,'Esperança do Sul'),(3963,21,'Espumoso'),(3964,21,'Estação'),(3965,21,'Estância Velha'),(3966,21,'Esteio'),(3967,21,'Estrela'),(3968,21,'Estrela Velha'),(3969,21,'Eugênio de Castro'),(3970,21,'Fagundes Varela'),(3971,21,'Farroupilha'),(3972,21,'Faxinal do Soturno'),(3973,21,'Faxinalzinho'),(3974,21,'Fazenda Vilanova'),(3975,21,'Feliz'),(3976,21,'Flores da Cunha'),(3977,21,'Floriano Peixoto'),(3978,21,'Fontoura Xavier'),(3979,21,'Formigueiro'),(3980,21,'Fortaleza dos Valos'),(3981,21,'Frederico Westphalen'),(3982,21,'Garibaldi'),(3983,21,'Garruchos'),(3984,21,'Gaurama'),(3985,21,'General Câmara'),(3986,21,'Gentil'),(3987,21,'Getúlio Vargas'),(3988,21,'Giruá'),(3989,21,'Glorinha'),(3990,21,'Gramado'),(3991,21,'Gramado dos Loureiros'),(3992,21,'Gramado Xavier'),(3993,21,'Gravataí'),(3994,21,'Guabiju'),(3995,21,'Guaíba'),(3996,21,'Guaporé'),(3997,21,'Guarani das Missões'),(3998,21,'Harmonia'),(3999,21,'Herval'),(4000,21,'Herveiras'),(4001,21,'Horizontina'),(4002,21,'Hulha Negra'),(4003,21,'Humaitá'),(4004,21,'Ibarama'),(4005,21,'Ibiaçá'),(4006,21,'Ibiraiaras'),(4007,21,'Ibirapuitã'),(4008,21,'Ibirubá'),(4009,21,'Igrejinha'),(4010,21,'Ijuí'),(4011,21,'Ilópolis'),(4012,21,'Imbé'),(4013,21,'Imigrante'),(4014,21,'Independência'),(4015,21,'Inhacorá'),(4016,21,'Ipê'),(4017,21,'Ipiranga do Sul'),(4018,21,'Iraí'),(4019,21,'Itaara'),(4020,21,'Itacurubi'),(4021,21,'Itapuca'),(4022,21,'Itaqui'),(4023,21,'Itatiba do Sul'),(4024,21,'Ivorá'),(4025,21,'Ivoti'),(4026,21,'Jaboticaba'),(4027,21,'Jacutinga'),(4028,21,'Jaguarão'),(4029,21,'Jaguari'),(4030,21,'Jaquirana'),(4031,21,'Jari'),(4032,21,'Jóia'),(4033,21,'Júlio de Castilhos'),(4034,21,'Lagoa dos Três Cantos'),(4035,21,'Lagoa Vermelha'),(4036,21,'Lagoão'),(4037,21,'Lajeado'),(4038,21,'Lajeado do Bugre'),(4039,21,'Lavras do Sul'),(4040,21,'Liberato Salzano'),(4041,21,'Lindolfo Collor'),(4042,21,'Linha Nova'),(4043,21,'Maçambara'),(4044,21,'Machadinho'),(4045,21,'Mampituba'),(4046,21,'Manoel Viana'),(4047,21,'Maquiné'),(4048,21,'Maratá'),(4049,21,'Marau'),(4050,21,'Marcelino Ramos'),(4051,21,'Mariana Pimentel'),(4052,21,'Mariano Moro'),(4053,21,'Marques de Souza'),(4054,21,'Mata'),(4055,21,'Mato Castelhano'),(4056,21,'Mato Leitão'),(4057,21,'Maximiliano de Almeida'),(4058,21,'Minas do Leão'),(4059,21,'Miraguaí'),(4060,21,'Montauri'),(4061,21,'Monte Alegre dos Campos'),(4062,21,'Monte Belo do Sul'),(4063,21,'Montenegro'),(4064,21,'Mormaço'),(4065,21,'Morrinhos do Sul'),(4066,21,'Morro Redondo'),(4067,21,'Morro Reuter'),(4068,21,'Mostardas'),(4069,21,'Muçum'),(4070,21,'Muitos Capões'),(4071,21,'Muliterno'),(4072,21,'Não-Me-Toque'),(4073,21,'Nicolau Vergueiro'),(4074,21,'Nonoai'),(4075,21,'Nova Alvorada'),(4076,21,'Nova Araçá'),(4077,21,'Nova Bassano'),(4078,21,'Nova Boa Vista'),(4079,21,'Nova Bréscia'),(4080,21,'Nova Candelária'),(4081,21,'Nova Esperança do Sul'),(4082,21,'Nova Hartz'),(4083,21,'Nova Pádua'),(4084,21,'Nova Palma'),(4085,21,'Nova Petrópolis'),(4086,21,'Nova Prata'),(4087,21,'Nova Ramada'),(4088,21,'Nova Roma do Sul'),(4089,21,'Nova Santa Rita'),(4090,21,'Novo Barreiro'),(4091,21,'Novo Cabrais'),(4092,21,'Novo Hamburgo'),(4093,21,'Novo Machado'),(4094,21,'Novo Tiradentes'),(4095,21,'Osório'),(4096,21,'Paim Filho'),(4097,21,'Palmares do Sul'),(4098,21,'Palmeira das Missões'),(4099,21,'Palmitinho'),(4100,21,'Panambi'),(4101,21,'Pantano Grande'),(4102,21,'Paraí'),(4103,21,'Paraíso do Sul'),(4104,21,'Pareci Novo'),(4105,21,'Parobé'),(4106,21,'Passa Sete'),(4107,21,'Passo do Sobrado'),(4108,21,'Passo Fundo'),(4109,21,'Paverama'),(4110,21,'Pedro Osório'),(4111,21,'Pejuçara'),(4112,21,'Pelotas'),(4113,21,'Picada Café'),(4114,21,'Pinhal'),(4115,21,'Pinhal Grande'),(4116,21,'Pinheirinho do Vale'),(4117,21,'Pinheiro Machado'),(4118,21,'Pirapó'),(4119,21,'Piratini'),(4120,21,'Planalto'),(4121,21,'Poço das Antas'),(4122,21,'Pontão'),(4123,21,'Ponte Preta'),(4124,21,'Portão'),(4125,21,'Porto Alegre'),(4126,21,'Porto Lucena'),(4127,21,'Porto Mauá'),(4128,21,'Porto Vera Cruz'),(4129,21,'Porto Xavier'),(4130,21,'Pouso Novo'),(4131,21,'Presidente Lucena'),(4132,21,'Progresso'),(4133,21,'Protásio Alves'),(4134,21,'Putinga'),(4135,21,'Quaraí'),(4136,21,'Quevedos'),(4137,21,'Quinze de Novembro'),(4138,21,'Redentora'),(4139,21,'Relvado'),(4140,21,'Restinga Seca'),(4141,21,'Rio dos Índios'),(4142,21,'Rio Grande'),(4143,21,'Rio Pardo'),(4144,21,'Riozinho'),(4145,21,'Roca Sales'),(4146,21,'Rodeio Bonito'),(4147,21,'Rolante'),(4148,21,'Ronda Alta'),(4149,21,'Rondinha'),(4150,21,'Roque Gonzales'),(4151,21,'Rosário do Sul'),(4152,21,'Sagrada Família'),(4153,21,'Saldanha Marinho'),(4154,21,'Salto do Jacuí'),(4155,21,'Salvador das Missões'),(4156,21,'Salvador do Sul'),(4157,21,'Sananduva'),(4158,21,'Santa Bárbara do Sul'),(4159,21,'Santa Clara do Sul'),(4160,21,'Santa Cruz do Sul'),(4161,21,'Santa Maria'),(4162,21,'Santa Maria do Herval'),(4163,21,'Santa Rosa'),(4164,21,'Santa Tereza'),(4165,21,'Santa Vitória do Palmar'),(4166,21,'Santana da Boa Vista'),(4167,21,'Santana do Livramento'),(4168,21,'Santiago'),(4169,21,'Santo Ângelo'),(4170,21,'Santo Antônio da Patrulha'),(4171,21,'Santo Antônio das Missões'),(4172,21,'Santo Antônio do Palma'),(4173,21,'Santo Antônio do Planalto'),(4174,21,'Santo Augusto'),(4175,21,'Santo Cristo'),(4176,21,'Santo Expedito do Sul'),(4177,21,'São Borja'),(4178,21,'São Domingos do Sul'),(4179,21,'São Francisco de Assis'),(4180,21,'São Francisco de Paula'),(4181,21,'São Gabriel'),(4182,21,'São Jerônimo'),(4183,21,'São João da Urtiga'),(4184,21,'São João do Polêsine'),(4185,21,'São Jorge'),(4186,21,'São José das Missões'),(4187,21,'São José do Herval'),(4188,21,'São José do Hortêncio'),(4189,21,'São José do Inhacorá'),(4190,21,'São José do Norte'),(4191,21,'São José do Ouro'),(4192,21,'São José dos Ausentes'),(4193,21,'São Leopoldo'),(4194,21,'São Lourenço do Sul'),(4195,21,'São Luiz Gonzaga'),(4196,21,'São Marcos'),(4197,21,'São Martinho'),(4198,21,'São Martinho da Serra'),(4199,21,'São Miguel das Missões'),(4200,21,'São Nicolau'),(4201,21,'São Paulo das Missões'),(4202,21,'São Pedro da Serra'),(4203,21,'São Pedro do Butiá'),(4204,21,'São Pedro do Sul'),(4205,21,'São Sebastião do Caí'),(4206,21,'São Sepé'),(4207,21,'São Valentim'),(4208,21,'São Valentim do Sul'),(4209,21,'São Valério do Sul'),(4210,21,'São Vendelino'),(4211,21,'São Vicente do Sul'),(4212,21,'Sapiranga'),(4213,21,'Sapucaia do Sul'),(4214,21,'Sarandi'),(4215,21,'Seberi'),(4216,21,'Sede Nova'),(4217,21,'Segredo'),(4218,21,'Selbach'),(4219,21,'Senador Salgado Filho'),(4220,21,'Sentinela do Sul'),(4221,21,'Serafina Corrêa'),(4222,21,'Sério'),(4223,21,'Sertão'),(4224,21,'Sertão Santana'),(4225,21,'Sete de Setembro'),(4226,21,'Severiano de Almeida'),(4227,21,'Silveira Martins'),(4228,21,'Sinimbu'),(4229,21,'Sobradinho'),(4230,21,'Soledade'),(4231,21,'Tabaí'),(4232,21,'Tapejara'),(4233,21,'Tapera'),(4234,21,'Tapes'),(4235,21,'Taquara'),(4236,21,'Taquari'),(4237,21,'Taquaruçu do Sul'),(4238,21,'Tavares'),(4239,21,'Tenente Portela'),(4240,21,'Terra de Areia'),(4241,21,'Teutônia'),(4242,21,'Tiradentes do Sul'),(4243,21,'Toropi'),(4244,21,'Torres'),(4245,21,'Tramandaí'),(4246,21,'Travesseiro'),(4247,21,'Três Arroios'),(4248,21,'Três Cachoeiras'),(4249,21,'Três Coroas'),(4250,21,'Três de Maio'),(4251,21,'Três Forquilhas'),(4252,21,'Três Palmeiras'),(4253,21,'Três Passos'),(4254,21,'Trindade do Sul'),(4255,21,'Triunfo'),(4256,21,'Tucunduva'),(4257,21,'Tunas'),(4258,21,'Tupanci do Sul'),(4259,21,'Tupanciretã'),(4260,21,'Tupandi'),(4261,21,'Tuparendi'),(4262,21,'Turuçu'),(4263,21,'Ubiretama'),(4264,21,'União da Serra'),(4265,21,'Unistalda'),(4266,21,'Uruguaiana'),(4267,21,'Vacaria'),(4268,21,'Vale do Sol'),(4269,21,'Vale Real'),(4270,21,'Vale Verde'),(4271,21,'Vanini'),(4272,21,'Venâncio Aires'),(4273,21,'Vera Cruz'),(4274,21,'Veranópolis'),(4275,21,'Vespasiano Correa'),(4276,21,'Viadutos'),(4277,21,'Viamão'),(4278,21,'Vicente Dutra'),(4279,21,'Victor Graeff'),(4280,21,'Vila Flores'),(4281,21,'Vila Lângaro'),(4282,21,'Vila Maria'),(4283,21,'Vila Nova do Sul'),(4284,21,'Vista Alegre'),(4285,21,'Vista Alegre do Prata'),(4286,21,'Vista Gaúcha'),(4287,21,'Vitória das Missões'),(4288,21,'Xangri-lá'),(4289,22,'Alta Floresta d`Oeste'),(4290,22,'Alto Alegre dos Parecis'),(4291,22,'Alto Paraíso'),(4292,22,'Alvorada d`Oeste'),(4293,22,'Ariquemes'),(4294,22,'Buritis'),(4295,22,'Cabixi'),(4296,22,'Cacaulândia'),(4297,22,'Cacoal'),(4298,22,'Campo Novo de Rondônia'),(4299,22,'Candeias do Jamari'),(4300,22,'Castanheiras'),(4301,22,'Cerejeiras'),(4302,22,'Chupinguaia'),(4303,22,'Colorado do Oeste'),(4304,22,'Corumbiara'),(4305,22,'Costa Marques'),(4306,22,'Cujubim'),(4307,22,'Espigão d`Oeste'),(4308,22,'Governador Jorge Teixeira'),(4309,22,'Guajará-Mirim'),(4310,22,'Itapuã do Oeste'),(4311,22,'Jaru'),(4312,22,'Ji-Paraná'),(4313,22,'Machadinho d`Oeste'),(4314,22,'Ministro Andreazza'),(4315,22,'Mirante da Serra'),(4316,22,'Monte Negro'),(4317,22,'Nova Brasilândia d`Oeste'),(4318,22,'Nova Mamoré'),(4319,22,'Nova União'),(4320,22,'Novo Horizonte do Oeste'),(4321,22,'Ouro Preto do Oeste'),(4322,22,'Parecis'),(4323,22,'Pimenta Bueno'),(4324,22,'Pimenteiras do Oeste'),(4325,22,'Porto Velho'),(4326,22,'Presidente Médici'),(4327,22,'Primavera de Rondônia'),(4328,22,'Rio Crespo'),(4329,22,'Rolim de Moura'),(4330,22,'Santa Luzia d`Oeste'),(4331,22,'São Felipe d`Oeste'),(4332,22,'São Francisco do Guaporé'),(4333,22,'São Miguel do Guaporé'),(4334,22,'Seringueiras'),(4335,22,'Teixeirópolis'),(4336,22,'Theobroma'),(4337,22,'Urupá'),(4338,22,'Vale do Anari'),(4339,22,'Vale do Paraíso'),(4340,22,'Vilhena'),(4341,23,'Alto Alegre'),(4342,23,'Amajari'),(4343,23,'Boa Vista'),(4344,23,'Bonfim'),(4345,23,'Cantá'),(4346,23,'Caracaraí'),(4347,23,'Caroebe'),(4348,23,'Iracema'),(4349,23,'Mucajaí'),(4350,23,'Normandia'),(4351,23,'Pacaraima'),(4352,23,'Rorainópolis'),(4353,23,'São João da Baliza'),(4354,23,'São Luiz'),(4355,23,'Uiramutã'),(4356,24,'Abdon Batista'),(4357,24,'Abelardo Luz'),(4358,24,'Agrolândia'),(4359,24,'Agronômica'),(4360,24,'Água Doce'),(4361,24,'Águas de Chapecó'),(4362,24,'Águas Frias'),(4363,24,'Águas Mornas'),(4364,24,'Alfredo Wagner'),(4365,24,'Alto Bela Vista'),(4366,24,'Anchieta'),(4367,24,'Angelina'),(4368,24,'Anita Garibaldi'),(4369,24,'Anitápolis'),(4370,24,'Antônio Carlos'),(4371,24,'Apiúna'),(4372,24,'Arabutã'),(4373,24,'Araquari'),(4374,24,'Araranguá'),(4375,24,'Armazém'),(4376,24,'Arroio Trinta'),(4377,24,'Arvoredo'),(4378,24,'Ascurra'),(4379,24,'Atalanta'),(4380,24,'Aurora'),(4381,24,'Balneário Arroio do Silva'),(4382,24,'Balneário Barra do Sul'),(4383,24,'Balneário Camboriú'),(4384,24,'Balneário Gaivota'),(4385,24,'Bandeirante'),(4386,24,'Barra Bonita'),(4387,24,'Barra Velha'),(4388,24,'Bela Vista do Toldo'),(4389,24,'Belmonte'),(4390,24,'Benedito Novo'),(4391,24,'Biguaçu'),(4392,24,'Blumenau'),(4393,24,'Bocaina do Sul'),(4394,24,'Bom Jardim da Serra'),(4395,24,'Bom Jesus'),(4396,24,'Bom Jesus do Oeste'),(4397,24,'Bom Retiro'),(4398,24,'Bombinhas'),(4399,24,'Botuverá'),(4400,24,'Braço do Norte'),(4401,24,'Braço do Trombudo'),(4402,24,'Brunópolis'),(4403,24,'Brusque'),(4404,24,'Caçador'),(4405,24,'Caibi'),(4406,24,'Calmon'),(4407,24,'Camboriú'),(4408,24,'Campo Alegre'),(4409,24,'Campo Belo do Sul'),(4410,24,'Campo Erê'),(4411,24,'Campos Novos'),(4412,24,'Canelinha'),(4413,24,'Canoinhas'),(4414,24,'Capão Alto'),(4415,24,'Capinzal'),(4416,24,'Capivari de Baixo'),(4417,24,'Catanduvas'),(4418,24,'Caxambu do Sul'),(4419,24,'Celso Ramos'),(4420,24,'Cerro Negro'),(4421,24,'Chapadão do Lageado'),(4422,24,'Chapecó'),(4423,24,'Cocal do Sul'),(4424,24,'Concórdia'),(4425,24,'Cordilheira Alta'),(4426,24,'Coronel Freitas'),(4427,24,'Coronel Martins'),(4428,24,'Correia Pinto'),(4429,24,'Corupá'),(4430,24,'Criciúma'),(4431,24,'Cunha Porã'),(4432,24,'Cunhataí'),(4433,24,'Curitibanos'),(4434,24,'Descanso'),(4435,24,'Dionísio Cerqueira'),(4436,24,'Dona Emma'),(4437,24,'Doutor Pedrinho'),(4438,24,'Entre Rios'),(4439,24,'Ermo'),(4440,24,'Erval Velho'),(4441,24,'Faxinal dos Guedes'),(4442,24,'Flor do Sertão'),(4443,24,'Florianópolis'),(4444,24,'Formosa do Sul'),(4445,24,'Forquilhinha'),(4446,24,'Fraiburgo'),(4447,24,'Frei Rogério'),(4448,24,'Galvão'),(4449,24,'Garopaba'),(4450,24,'Garuva'),(4451,24,'Gaspar'),(4452,24,'Governador Celso Ramos'),(4453,24,'Grão Pará'),(4454,24,'Gravatal'),(4455,24,'Guabiruba'),(4456,24,'Guaraciaba'),(4457,24,'Guaramirim'),(4458,24,'Guarujá do Sul'),(4459,24,'Guatambú'),(4460,24,'Herval d`Oeste'),(4461,24,'Ibiam'),(4462,24,'Ibicaré'),(4463,24,'Ibirama'),(4464,24,'Içara'),(4465,24,'Ilhota'),(4466,24,'Imaruí'),(4467,24,'Imbituba'),(4468,24,'Imbuia'),(4469,24,'Indaial'),(4470,24,'Iomerê'),(4471,24,'Ipira'),(4472,24,'Iporã do Oeste'),(4473,24,'Ipuaçu'),(4474,24,'Ipumirim'),(4475,24,'Iraceminha'),(4476,24,'Irani'),(4477,24,'Irati'),(4478,24,'Irineópolis'),(4479,24,'Itá'),(4480,24,'Itaiópolis'),(4481,24,'Itajaí'),(4482,24,'Itapema'),(4483,24,'Itapiranga'),(4484,24,'Itapoá'),(4485,24,'Ituporanga'),(4486,24,'Jaborá'),(4487,24,'Jacinto Machado'),(4488,24,'Jaguaruna'),(4489,24,'Jaraguá do Sul'),(4490,24,'Jardinópolis'),(4491,24,'Joaçaba'),(4492,24,'Joinville'),(4493,24,'José Boiteux'),(4494,24,'Jupiá'),(4495,24,'Lacerdópolis'),(4496,24,'Lages'),(4497,24,'Laguna'),(4498,24,'Lajeado Grande'),(4499,24,'Laurentino'),(4500,24,'Lauro Muller'),(4501,24,'Lebon Régis'),(4502,24,'Leoberto Leal'),(4503,24,'Lindóia do Sul'),(4504,24,'Lontras'),(4505,24,'Luiz Alves'),(4506,24,'Luzerna'),(4507,24,'Macieira'),(4508,24,'Mafra'),(4509,24,'Major Gercino'),(4510,24,'Major Vieira'),(4511,24,'Maracajá'),(4512,24,'Maravilha'),(4513,24,'Marema'),(4514,24,'Massaranduba'),(4515,24,'Matos Costa'),(4516,24,'Meleiro'),(4517,24,'Mirim Doce'),(4518,24,'Modelo'),(4519,24,'Mondaí'),(4520,24,'Monte Carlo'),(4521,24,'Monte Castelo'),(4522,24,'Morro da Fumaça'),(4523,24,'Morro Grande'),(4524,24,'Navegantes'),(4525,24,'Nova Erechim'),(4526,24,'Nova Itaberaba'),(4527,24,'Nova Trento'),(4528,24,'Nova Veneza'),(4529,24,'Novo Horizonte'),(4530,24,'Orleans'),(4531,24,'Otacílio Costa'),(4532,24,'Ouro'),(4533,24,'Ouro Verde'),(4534,24,'Paial'),(4535,24,'Painel'),(4536,24,'Palhoça'),(4537,24,'Palma Sola'),(4538,24,'Palmeira'),(4539,24,'Palmitos'),(4540,24,'Papanduva'),(4541,24,'Paraíso'),(4542,24,'Passo de Torres'),(4543,24,'Passos Maia'),(4544,24,'Paulo Lopes'),(4545,24,'Pedras Grandes'),(4546,24,'Penha'),(4547,24,'Peritiba'),(4548,24,'Petrolândia'),(4549,24,'Piçarras'),(4550,24,'Pinhalzinho'),(4551,24,'Pinheiro Preto'),(4552,24,'Piratuba'),(4553,24,'Planalto Alegre'),(4554,24,'Pomerode'),(4555,24,'Ponte Alta'),(4556,24,'Ponte Alta do Norte'),(4557,24,'Ponte Serrada'),(4558,24,'Porto Belo'),(4559,24,'Porto União'),(4560,24,'Pouso Redondo'),(4561,24,'Praia Grande'),(4562,24,'Presidente Castelo Branco'),(4563,24,'Presidente Getúlio'),(4564,24,'Presidente Nereu'),(4565,24,'Princesa'),(4566,24,'Quilombo'),(4567,24,'Rancho Queimado'),(4568,24,'Rio das Antas'),(4569,24,'Rio do Campo'),(4570,24,'Rio do Oeste'),(4571,24,'Rio do Sul'),(4572,24,'Rio dos Cedros'),(4573,24,'Rio Fortuna'),(4574,24,'Rio Negrinho'),(4575,24,'Rio Rufino'),(4576,24,'Riqueza'),(4577,24,'Rodeio'),(4578,24,'Romelândia'),(4579,24,'Salete'),(4580,24,'Saltinho'),(4581,24,'Salto Veloso'),(4582,24,'Sangão'),(4583,24,'Santa Cecília'),(4584,24,'Santa Helena'),(4585,24,'Santa Rosa de Lima'),(4586,24,'Santa Rosa do Sul'),(4587,24,'Santa Terezinha'),(4588,24,'Santa Terezinha do Progresso'),(4589,24,'Santiago do Sul'),(4590,24,'Santo Amaro da Imperatriz'),(4591,24,'São Bento do Sul'),(4592,24,'São Bernardino'),(4593,24,'São Bonifácio'),(4594,24,'São Carlos'),(4595,24,'São Cristovão do Sul'),(4596,24,'São Domingos'),(4597,24,'São Francisco do Sul'),(4598,24,'São João Batista'),(4599,24,'São João do Itaperiú'),(4600,24,'São João do Oeste'),(4601,24,'São João do Sul'),(4602,24,'São Joaquim'),(4603,24,'São José'),(4604,24,'São José do Cedro'),(4605,24,'São José do Cerrito'),(4606,24,'São Lourenço do Oeste'),(4607,24,'São Ludgero'),(4608,24,'São Martinho'),(4609,24,'São Miguel da Boa Vista'),(4610,24,'São Miguel do Oeste'),(4611,24,'São Pedro de Alcântara'),(4612,24,'Saudades'),(4613,24,'Schroeder'),(4614,24,'Seara'),(4615,24,'Serra Alta'),(4616,24,'Siderópolis'),(4617,24,'Sombrio'),(4618,24,'Sul Brasil'),(4619,24,'Taió'),(4620,24,'Tangará'),(4621,24,'Tigrinhos'),(4622,24,'Tijucas'),(4623,24,'Timbé do Sul'),(4624,24,'Timbó'),(4625,24,'Timbó Grande'),(4626,24,'Três Barras'),(4627,24,'Treviso'),(4628,24,'Treze de Maio'),(4629,24,'Treze Tílias'),(4630,24,'Trombudo Central'),(4631,24,'Tubarão'),(4632,24,'Tunápolis'),(4633,24,'Turvo'),(4634,24,'União do Oeste'),(4635,24,'Urubici'),(4636,24,'Urupema'),(4637,24,'Urussanga'),(4638,24,'Vargeão'),(4639,24,'Vargem'),(4640,24,'Vargem Bonita'),(4641,24,'Vidal Ramos'),(4642,24,'Videira'),(4643,24,'Vitor Meireles'),(4644,24,'Witmarsum'),(4645,24,'Xanxerê'),(4646,24,'Xavantina'),(4647,24,'Xaxim'),(4648,24,'Zortéa'),(4649,25,'Adamantina'),(4650,25,'Adolfo'),(4651,25,'Aguaí'),(4652,25,'Águas da Prata'),(4653,25,'Águas de Lindóia'),(4654,25,'Águas de Santa Bárbara'),(4655,25,'Águas de São Pedro'),(4656,25,'Agudos'),(4657,25,'Alambari'),(4658,25,'Alfredo Marcondes'),(4659,25,'Altair'),(4660,25,'Altinópolis'),(4661,25,'Alto Alegre'),(4662,25,'Alumínio'),(4663,25,'Álvares Florence'),(4664,25,'Álvares Machado'),(4665,25,'Álvaro de Carvalho'),(4666,25,'Alvinlândia'),(4667,25,'Americana'),(4668,25,'Américo Brasiliense'),(4669,25,'Américo de Campos'),(4670,25,'Amparo'),(4671,25,'Analândia'),(4672,25,'Andradina'),(4673,25,'Angatuba'),(4674,25,'Anhembi'),(4675,25,'Anhumas'),(4676,25,'Aparecida'),(4677,25,'Aparecida d`Oeste'),(4678,25,'Apiaí'),(4679,25,'Araçariguama'),(4680,25,'Araçatuba'),(4681,25,'Araçoiaba da Serra'),(4682,25,'Aramina'),(4683,25,'Arandu'),(4684,25,'Arapeí'),(4685,25,'Araraquara'),(4686,25,'Araras'),(4687,25,'Arco-Íris'),(4688,25,'Arealva'),(4689,25,'Areias'),(4690,25,'Areiópolis'),(4691,25,'Ariranha'),(4692,25,'Artur Nogueira'),(4693,25,'Arujá'),(4694,25,'Aspásia'),(4695,25,'Assis'),(4696,25,'Atibaia'),(4697,25,'Auriflama'),(4698,25,'Avaí'),(4699,25,'Avanhandava'),(4700,25,'Avaré'),(4701,25,'Bady Bassitt'),(4702,25,'Balbinos'),(4703,25,'Bálsamo'),(4704,25,'Bananal'),(4705,25,'Barão de Antonina'),(4706,25,'Barbosa'),(4707,25,'Bariri'),(4708,25,'Barra Bonita'),(4709,25,'Barra do Chapéu'),(4710,25,'Barra do Turvo'),(4711,25,'Barretos'),(4712,25,'Barrinha'),(4713,25,'Barueri'),(4714,25,'Bastos'),(4715,25,'Batatais'),(4716,25,'Bauru'),(4717,25,'Bebedouro'),(4718,25,'Bento de Abreu'),(4719,25,'Bernardino de Campos'),(4720,25,'Bertioga'),(4721,25,'Bilac'),(4722,25,'Birigui'),(4723,25,'Biritiba-Mirim'),(4724,25,'Boa Esperança do Sul'),(4725,25,'Bocaina'),(4726,25,'Bofete'),(4727,25,'Boituva'),(4728,25,'Bom Jesus dos Perdões'),(4729,25,'Bom Sucesso de Itararé'),(4730,25,'Borá'),(4731,25,'Boracéia'),(4732,25,'Borborema'),(4733,25,'Borebi'),(4734,25,'Botucatu'),(4735,25,'Bragança Paulista'),(4736,25,'Braúna'),(4737,25,'Brejo Alegre'),(4738,25,'Brodowski'),(4739,25,'Brotas'),(4740,25,'Buri'),(4741,25,'Buritama'),(4742,25,'Buritizal'),(4743,25,'Cabrália Paulista'),(4744,25,'Cabreúva'),(4745,25,'Caçapava'),(4746,25,'Cachoeira Paulista'),(4747,25,'Caconde'),(4748,25,'Cafelândia'),(4749,25,'Caiabu'),(4750,25,'Caieiras'),(4751,25,'Caiuá'),(4752,25,'Cajamar'),(4753,25,'Cajati'),(4754,25,'Cajobi'),(4755,25,'Cajuru'),(4756,25,'Campina do Monte Alegre'),(4757,25,'Campinas'),(4758,25,'Campo Limpo Paulista'),(4759,25,'Campos do Jordão'),(4760,25,'Campos Novos Paulista'),(4761,25,'Cananéia'),(4762,25,'Canas'),(4763,25,'Cândido Mota'),(4764,25,'Cândido Rodrigues'),(4765,25,'Canitar'),(4766,25,'Capão Bonito'),(4767,25,'Capela do Alto'),(4768,25,'Capivari'),(4769,25,'Caraguatatuba'),(4770,25,'Carapicuíba'),(4771,25,'Cardoso'),(4772,25,'Casa Branca'),(4773,25,'Cássia dos Coqueiros'),(4774,25,'Castilho'),(4775,25,'Catanduva'),(4776,25,'Catiguá'),(4777,25,'Cedral'),(4778,25,'Cerqueira César'),(4779,25,'Cerquilho'),(4780,25,'Cesário Lange'),(4781,25,'Charqueada'),(4782,25,'Chavantes'),(4783,25,'Clementina'),(4784,25,'Colina'),(4785,25,'Colômbia'),(4786,25,'Conchal'),(4787,25,'Conchas'),(4788,25,'Cordeirópolis'),(4789,25,'Coroados'),(4790,25,'Coronel Macedo'),(4791,25,'Corumbataí'),(4792,25,'Cosmópolis'),(4793,25,'Cosmorama'),(4794,25,'Cotia'),(4795,25,'Cravinhos'),(4796,25,'Cristais Paulista'),(4797,25,'Cruzália'),(4798,25,'Cruzeiro'),(4799,25,'Cubatão'),(4800,25,'Cunha'),(4801,25,'Descalvado'),(4802,25,'Diadema'),(4803,25,'Dirce Reis'),(4804,25,'Divinolândia'),(4805,25,'Dobrada'),(4806,25,'Dois Córregos'),(4807,25,'Dolcinópolis'),(4808,25,'Dourado'),(4809,25,'Dracena'),(4810,25,'Duartina'),(4811,25,'Dumont'),(4812,25,'Echaporã'),(4813,25,'Eldorado'),(4814,25,'Elias Fausto'),(4815,25,'Elisiário'),(4816,25,'Embaúba'),(4817,25,'Embu'),(4818,25,'Embu-Guaçu'),(4819,25,'Emilianópolis'),(4820,25,'Engenheiro Coelho'),(4821,25,'Espírito Santo do Pinhal'),(4822,25,'Espírito Santo do Turvo'),(4823,25,'Estiva Gerbi'),(4824,25,'Estrela d`Oeste'),(4825,25,'Estrela do Norte'),(4826,25,'Euclides da Cunha Paulista'),(4827,25,'Fartura'),(4828,25,'Fernando Prestes'),(4829,25,'Fernandópolis'),(4830,25,'Fernão'),(4831,25,'Ferraz de Vasconcelos'),(4832,25,'Flora Rica'),(4833,25,'Floreal'),(4834,25,'Florínia'),(4835,25,'Flórida Paulista'),(4836,25,'Franca'),(4837,25,'Francisco Morato'),(4838,25,'Franco da Rocha'),(4839,25,'Gabriel Monteiro'),(4840,25,'Gália'),(4841,25,'Garça'),(4842,25,'Gastão Vidigal'),(4843,25,'Gavião Peixoto'),(4844,25,'General Salgado'),(4845,25,'Getulina'),(4846,25,'Glicério'),(4847,25,'Guaiçara'),(4848,25,'Guaimbê'),(4849,25,'Guaíra'),(4850,25,'Guapiaçu'),(4851,25,'Guapiara'),(4852,25,'Guará'),(4853,25,'Guaraçaí'),(4854,25,'Guaraci'),(4855,25,'Guarani d`Oeste'),(4856,25,'Guarantã'),(4857,25,'Guararapes'),(4858,25,'Guararema'),(4859,25,'Guaratinguetá'),(4860,25,'Guareí'),(4861,25,'Guariba'),(4862,25,'Guarujá'),(4863,25,'Guarulhos'),(4864,25,'Guatapará'),(4865,25,'Guzolândia'),(4866,25,'Herculândia'),(4867,25,'Holambra'),(4868,25,'Hortolândia'),(4869,25,'Iacanga'),(4870,25,'Iacri'),(4871,25,'Iaras'),(4872,25,'Ibaté'),(4873,25,'Ibirá'),(4874,25,'Ibirarema'),(4875,25,'Ibitinga'),(4876,25,'Ibiúna'),(4877,25,'Icém'),(4878,25,'Iepê'),(4879,25,'Igaraçu do Tietê'),(4880,25,'Igarapava'),(4881,25,'Igaratá'),(4882,25,'Iguape'),(4883,25,'Ilha Comprida'),(4884,25,'Ilha Solteira'),(4885,25,'Ilhabela'),(4886,25,'Indaiatuba'),(4887,25,'Indiana'),(4888,25,'Indiaporã'),(4889,25,'Inúbia Paulista'),(4890,25,'Ipauçu'),(4891,25,'Iperó'),(4892,25,'Ipeúna'),(4893,25,'Ipiguá'),(4894,25,'Iporanga'),(4895,25,'Ipuã'),(4896,25,'Iracemápolis'),(4897,25,'Irapuã'),(4898,25,'Irapuru'),(4899,25,'Itaberá'),(4900,25,'Itaí'),(4901,25,'Itajobi'),(4902,25,'Itaju'),(4903,25,'Itanhaém'),(4904,25,'Itaóca'),(4905,25,'Itapecerica da Serra'),(4906,25,'Itapetininga'),(4907,25,'Itapeva'),(4908,25,'Itapevi'),(4909,25,'Itapira'),(4910,25,'Itapirapuã Paulista'),(4911,25,'Itápolis'),(4912,25,'Itaporanga'),(4913,25,'Itapuí'),(4914,25,'Itapura'),(4915,25,'Itaquaquecetuba'),(4916,25,'Itararé'),(4917,25,'Itariri'),(4918,25,'Itatiba'),(4919,25,'Itatinga'),(4920,25,'Itirapina'),(4921,25,'Itirapuã'),(4922,25,'Itobi'),(4923,25,'Itu'),(4924,25,'Itupeva'),(4925,25,'Ituverava'),(4926,25,'Jaborandi'),(4927,25,'Jaboticabal'),(4928,25,'Jacareí'),(4929,25,'Jaci'),(4930,25,'Jacupiranga'),(4931,25,'Jaguariúna'),(4932,25,'Jales'),(4933,25,'Jambeiro'),(4934,25,'Jandira'),(4935,25,'Jardinópolis'),(4936,25,'Jarinu'),(4937,25,'Jaú'),(4938,25,'Jeriquara'),(4939,25,'Joanópolis'),(4940,25,'João Ramalho'),(4941,25,'José Bonifácio'),(4942,25,'Júlio Mesquita'),(4943,25,'Jumirim'),(4944,25,'Jundiaí'),(4945,25,'Junqueirópolis'),(4946,25,'Juquiá'),(4947,25,'Juquitiba'),(4948,25,'Lagoinha'),(4949,25,'Laranjal Paulista'),(4950,25,'Lavínia'),(4951,25,'Lavrinhas'),(4952,25,'Leme'),(4953,25,'Lençóis Paulista'),(4954,25,'Limeira'),(4955,25,'Lindóia'),(4956,25,'Lins'),(4957,25,'Lorena'),(4958,25,'Lourdes'),(4959,25,'Louveira'),(4960,25,'Lucélia'),(4961,25,'Lucianópolis'),(4962,25,'Luís Antônio'),(4963,25,'Luiziânia'),(4964,25,'Lupércio'),(4965,25,'Lutécia'),(4966,25,'Macatuba'),(4967,25,'Macaubal'),(4968,25,'Macedônia'),(4969,25,'Magda'),(4970,25,'Mairinque'),(4971,25,'Mairiporã'),(4972,25,'Manduri'),(4973,25,'Marabá Paulista'),(4974,25,'Maracaí'),(4975,25,'Marapoama'),(4976,25,'Mariápolis'),(4977,25,'Marília'),(4978,25,'Marinópolis'),(4979,25,'Martinópolis'),(4980,25,'Matão'),(4981,25,'Mauá'),(4982,25,'Mendonça'),(4983,25,'Meridiano'),(4984,25,'Mesópolis'),(4985,25,'Miguelópolis'),(4986,25,'Mineiros do Tietê'),(4987,25,'Mira Estrela'),(4988,25,'Miracatu'),(4989,25,'Mirandópolis'),(4990,25,'Mirante do Paranapanema'),(4991,25,'Mirassol'),(4992,25,'Mirassolândia'),(4993,25,'Mococa'),(4994,25,'Mogi das Cruzes'),(4995,25,'Mogi Guaçu'),(4996,25,'Mogi-Mirim'),(4997,25,'Mombuca'),(4998,25,'Monções'),(4999,25,'Mongaguá'),(5000,25,'Monte Alegre do Sul'),(5001,25,'Monte Alto'),(5002,25,'Monte Aprazível'),(5003,25,'Monte Azul Paulista'),(5004,25,'Monte Castelo'),(5005,25,'Monte Mor'),(5006,25,'Monteiro Lobato'),(5007,25,'Morro Agudo'),(5008,25,'Morungaba'),(5009,25,'Motuca'),(5010,25,'Murutinga do Sul'),(5011,25,'Nantes'),(5012,25,'Narandiba'),(5013,25,'Natividade da Serra'),(5014,25,'Nazaré Paulista'),(5015,25,'Neves Paulista'),(5016,25,'Nhandeara'),(5017,25,'Nipoã'),(5018,25,'Nova Aliança'),(5019,25,'Nova Campina'),(5020,25,'Nova Canaã Paulista'),(5021,25,'Nova Castilho'),(5022,25,'Nova Europa'),(5023,25,'Nova Granada'),(5024,25,'Nova Guataporanga'),(5025,25,'Nova Independência'),(5026,25,'Nova Luzitânia'),(5027,25,'Nova Odessa'),(5028,25,'Novais'),(5029,25,'Novo Horizonte'),(5030,25,'Nuporanga'),(5031,25,'Ocauçu'),(5032,25,'Óleo'),(5033,25,'Olímpia'),(5034,25,'Onda Verde'),(5035,25,'Oriente'),(5036,25,'Orindiúva'),(5037,25,'Orlândia'),(5038,25,'Osasco'),(5039,25,'Oscar Bressane'),(5040,25,'Osvaldo Cruz'),(5041,25,'Ourinhos'),(5042,25,'Ouro Verde'),(5043,25,'Ouroeste'),(5044,25,'Pacaembu'),(5045,25,'Palestina'),(5046,25,'Palmares Paulista'),(5047,25,'Palmeira d`Oeste'),(5048,25,'Palmital'),(5049,25,'Panorama'),(5050,25,'Paraguaçu Paulista'),(5051,25,'Paraibuna'),(5052,25,'Paraíso'),(5053,25,'Paranapanema'),(5054,25,'Paranapuã'),(5055,25,'Parapuã'),(5056,25,'Pardinho'),(5057,25,'Pariquera-Açu'),(5058,25,'Parisi'),(5059,25,'Patrocínio Paulista'),(5060,25,'Paulicéia'),(5061,25,'Paulínia'),(5062,25,'Paulistânia'),(5063,25,'Paulo de Faria'),(5064,25,'Pederneiras'),(5065,25,'Pedra Bela'),(5066,25,'Pedranópolis'),(5067,25,'Pedregulho'),(5068,25,'Pedreira'),(5069,25,'Pedrinhas Paulista'),(5070,25,'Pedro de Toledo'),(5071,25,'Penápolis'),(5072,25,'Pereira Barreto'),(5073,25,'Pereiras'),(5074,25,'Peruíbe'),(5075,25,'Piacatu'),(5076,25,'Piedade'),(5077,25,'Pilar do Sul'),(5078,25,'Pindamonhangaba'),(5079,25,'Pindorama'),(5080,25,'Pinhalzinho'),(5081,25,'Piquerobi'),(5082,25,'Piquete'),(5083,25,'Piracaia'),(5084,25,'Piracicaba'),(5085,25,'Piraju'),(5086,25,'Pirajuí'),(5087,25,'Pirangi'),(5088,25,'Pirapora do Bom Jesus'),(5089,25,'Pirapozinho'),(5090,25,'Pirassununga'),(5091,25,'Piratininga'),(5092,25,'Pitangueiras'),(5093,25,'Planalto'),(5094,25,'Platina'),(5095,25,'Poá'),(5096,25,'Poloni'),(5097,25,'Pompéia'),(5098,25,'Pongaí'),(5099,25,'Pontal'),(5100,25,'Pontalinda'),(5101,25,'Pontes Gestal'),(5102,25,'Populina'),(5103,25,'Porangaba'),(5104,25,'Porto Feliz'),(5105,25,'Porto Ferreira'),(5106,25,'Potim'),(5107,25,'Potirendaba'),(5108,25,'Pracinha'),(5109,25,'Pradópolis'),(5110,25,'Praia Grande'),(5111,25,'Pratânia'),(5112,25,'Presidente Alves'),(5113,25,'Presidente Bernardes'),(5114,25,'Presidente Epitácio'),(5115,25,'Presidente Prudente'),(5116,25,'Presidente Venceslau'),(5117,25,'Promissão'),(5118,25,'Quadra'),(5119,25,'Quatá'),(5120,25,'Queiroz'),(5121,25,'Queluz'),(5122,25,'Quintana'),(5123,25,'Rafard'),(5124,25,'Rancharia'),(5125,25,'Redenção da Serra'),(5126,25,'Regente Feijó'),(5127,25,'Reginópolis'),(5128,25,'Registro'),(5129,25,'Restinga'),(5130,25,'Ribeira'),(5131,25,'Ribeirão Bonito'),(5132,25,'Ribeirão Branco'),(5133,25,'Ribeirão Corrente'),(5134,25,'Ribeirão do Sul'),(5135,25,'Ribeirão dos Índios'),(5136,25,'Ribeirão Grande'),(5137,25,'Ribeirão Pires'),(5138,25,'Ribeirão Preto'),(5139,25,'Rifaina'),(5140,25,'Rincão'),(5141,25,'Rinópolis'),(5142,25,'Rio Claro'),(5143,25,'Rio das Pedras'),(5144,25,'Rio Grande da Serra'),(5145,25,'Riolândia'),(5146,25,'Riversul'),(5147,25,'Rosana'),(5148,25,'Roseira'),(5149,25,'Rubiácea'),(5150,25,'Rubinéia'),(5151,25,'Sabino'),(5152,25,'Sagres'),(5153,25,'Sales'),(5154,25,'Sales Oliveira'),(5155,25,'Salesópolis'),(5156,25,'Salmourão'),(5157,25,'Saltinho'),(5158,25,'Salto'),(5159,25,'Salto de Pirapora'),(5160,25,'Salto Grande'),(5161,25,'Sandovalina'),(5162,25,'Santa Adélia'),(5163,25,'Santa Albertina'),(5164,25,'Santa Bárbara d`Oeste'),(5165,25,'Santa Branca'),(5166,25,'Santa Clara d`Oeste'),(5167,25,'Santa Cruz da Conceição'),(5168,25,'Santa Cruz da Esperança'),(5169,25,'Santa Cruz das Palmeiras'),(5170,25,'Santa Cruz do Rio Pardo'),(5171,25,'Santa Ernestina'),(5172,25,'Santa Fé do Sul'),(5173,25,'Santa Gertrudes'),(5174,25,'Santa Isabel'),(5175,25,'Santa Lúcia'),(5176,25,'Santa Maria da Serra'),(5177,25,'Santa Mercedes'),(5178,25,'Santa Rita d`Oeste'),(5179,25,'Santa Rita do Passa Quatro'),(5180,25,'Santa Rosa de Viterbo'),(5181,25,'Santa Salete'),(5182,25,'Santana da Ponte Pensa'),(5183,25,'Santana de Parnaíba'),(5184,25,'Santo Anastácio'),(5185,25,'Santo André'),(5186,25,'Santo Antônio da Alegria'),(5187,25,'Santo Antônio de Posse'),(5188,25,'Santo Antônio do Aracanguá'),(5189,25,'Santo Antônio do Jardim'),(5190,25,'Santo Antônio do Pinhal'),(5191,25,'Santo Expedito'),(5192,25,'Santópolis do Aguapeí'),(5193,25,'Santos'),(5194,25,'São Bento do Sapucaí'),(5195,25,'São Bernardo do Campo'),(5196,25,'São Caetano do Sul'),(5197,25,'São Carlos'),(5198,25,'São Francisco'),(5199,25,'São João da Boa Vista'),(5200,25,'São João das Duas Pontes'),(5201,25,'São João de Iracema'),(5202,25,'São João do Pau d`Alho'),(5203,25,'São Joaquim da Barra'),(5204,25,'São José da Bela Vista'),(5205,25,'São José do Barreiro'),(5206,25,'São José do Rio Pardo'),(5207,25,'São José do Rio Preto'),(5208,25,'São José dos Campos'),(5209,25,'São Lourenço da Serra'),(5210,25,'São Luís do Paraitinga'),(5211,25,'São Manuel'),(5212,25,'São Miguel Arcanjo'),(5213,25,'São Paulo'),(5214,25,'São Pedro'),(5215,25,'São Pedro do Turvo'),(5216,25,'São Roque'),(5217,25,'São Sebastião'),(5218,25,'São Sebastião da Grama'),(5219,25,'São Simão'),(5220,25,'São Vicente'),(5221,25,'Sarapuí'),(5222,25,'Sarutaiá'),(5223,25,'Sebastianópolis do Sul'),(5224,25,'Serra Azul'),(5225,25,'Serra Negra'),(5226,25,'Serrana'),(5227,25,'Sertãozinho'),(5228,25,'Sete Barras'),(5229,25,'Severínia'),(5230,25,'Silveiras'),(5231,25,'Socorro'),(5232,25,'Sorocaba'),(5233,25,'Sud Mennucci'),(5234,25,'Sumaré'),(5235,25,'Suzanápolis'),(5236,25,'Suzano'),(5237,25,'Tabapuã'),(5238,25,'Tabatinga'),(5239,25,'Taboão da Serra'),(5240,25,'Taciba'),(5241,25,'Taguaí'),(5242,25,'Taiaçu'),(5243,25,'Taiúva'),(5244,25,'Tambaú'),(5245,25,'Tanabi'),(5246,25,'Tapiraí'),(5247,25,'Tapiratiba'),(5248,25,'Taquaral'),(5249,25,'Taquaritinga'),(5250,25,'Taquarituba'),(5251,25,'Taquarivaí'),(5252,25,'Tarabai'),(5253,25,'Tarumã'),(5254,25,'Tatuí'),(5255,25,'Taubaté'),(5256,25,'Tejupá'),(5257,25,'Teodoro Sampaio'),(5258,25,'Terra Roxa'),(5259,25,'Tietê'),(5260,25,'Timburi'),(5261,25,'Torre de Pedra'),(5262,25,'Torrinha'),(5263,25,'Trabiju'),(5264,25,'Tremembé'),(5265,25,'Três Fronteiras'),(5266,25,'Tuiuti'),(5267,25,'Tupã'),(5268,25,'Tupi Paulista'),(5269,25,'Turiúba'),(5270,25,'Turmalina'),(5271,25,'Ubarana'),(5272,25,'Ubatuba'),(5273,25,'Ubirajara'),(5274,25,'Uchoa'),(5275,25,'União Paulista'),(5276,25,'Urânia'),(5277,25,'Uru'),(5278,25,'Urupês'),(5279,25,'Valentim Gentil'),(5280,25,'Valinhos'),(5281,25,'Valparaíso'),(5282,25,'Vargem'),(5283,25,'Vargem Grande do Sul'),(5284,25,'Vargem Grande Paulista'),(5285,25,'Várzea Paulista'),(5286,25,'Vera Cruz'),(5287,25,'Vinhedo'),(5288,25,'Viradouro'),(5289,25,'Vista Alegre do Alto'),(5290,25,'Vitória Brasil'),(5291,25,'Votorantim'),(5292,25,'Votuporanga'),(5293,25,'Zacarias'),(5294,26,'Amparo de São Francisco'),(5295,26,'Aquidabã'),(5296,26,'Aracaju'),(5297,26,'Arauá'),(5298,26,'Areia Branca'),(5299,26,'Barra dos Coqueiros'),(5300,26,'Boquim'),(5301,26,'Brejo Grande'),(5302,26,'Campo do Brito'),(5303,26,'Canhoba'),(5304,26,'Canindé de São Francisco'),(5305,26,'Capela'),(5306,26,'Carira'),(5307,26,'Carmópolis'),(5308,26,'Cedro de São João'),(5309,26,'Cristinápolis'),(5310,26,'Cumbe'),(5311,26,'Divina Pastora'),(5312,26,'Estância'),(5313,26,'Feira Nova'),(5314,26,'Frei Paulo'),(5315,26,'Gararu'),(5316,26,'General Maynard'),(5317,26,'Gracho Cardoso'),(5318,26,'Ilha das Flores'),(5319,26,'Indiaroba'),(5320,26,'Itabaiana'),(5321,26,'Itabaianinha'),(5322,26,'Itabi'),(5323,26,'Itaporanga d`Ajuda'),(5324,26,'Japaratuba'),(5325,26,'Japoatã'),(5326,26,'Lagarto'),(5327,26,'Laranjeiras'),(5328,26,'Macambira'),(5329,26,'Malhada dos Bois'),(5330,26,'Malhador'),(5331,26,'Maruim'),(5332,26,'Moita Bonita'),(5333,26,'Monte Alegre de Sergipe'),(5334,26,'Muribeca'),(5335,26,'Neópolis'),(5336,26,'Nossa Senhora Aparecida'),(5337,26,'Nossa Senhora da Glória'),(5338,26,'Nossa Senhora das Dores'),(5339,26,'Nossa Senhora de Lourdes'),(5340,26,'Nossa Senhora do Socorro'),(5341,26,'Pacatuba'),(5342,26,'Pedra Mole'),(5343,26,'Pedrinhas'),(5344,26,'Pinhão'),(5345,26,'Pirambu'),(5346,26,'Poço Redondo'),(5347,26,'Poço Verde'),(5348,26,'Porto da Folha'),(5349,26,'Propriá'),(5350,26,'Riachão do Dantas'),(5351,26,'Riachuelo'),(5352,26,'Ribeirópolis'),(5353,26,'Rosário do Catete'),(5354,26,'Salgado'),(5355,26,'Santa Luzia do Itanhy'),(5356,26,'Santa Rosa de Lima'),(5357,26,'Santana do São Francisco'),(5358,26,'Santo Amaro das Brotas'),(5359,26,'São Cristóvão'),(5360,26,'São Domingos'),(5361,26,'São Francisco'),(5362,26,'São Miguel do Aleixo'),(5363,26,'Simão Dias'),(5364,26,'Siriri'),(5365,26,'Telha'),(5366,26,'Tobias Barreto'),(5367,26,'Tomar do Geru'),(5368,26,'Umbaúba'),(5369,27,'Abreulândia'),(5370,27,'Aguiarnópolis'),(5371,27,'Aliança do Tocantins'),(5372,27,'Almas'),(5373,27,'Alvorada'),(5374,27,'Ananás'),(5375,27,'Angico'),(5376,27,'Aparecida do Rio Negro'),(5377,27,'Aragominas'),(5378,27,'Araguacema'),(5379,27,'Araguaçu'),(5380,27,'Araguaína'),(5381,27,'Araguanã'),(5382,27,'Araguatins'),(5383,27,'Arapoema'),(5384,27,'Arraias'),(5385,27,'Augustinópolis'),(5386,27,'Aurora do Tocantins'),(5387,27,'Axixá do Tocantins'),(5388,27,'Babaçulândia'),(5389,27,'Bandeirantes do Tocantins'),(5390,27,'Barra do Ouro'),(5391,27,'Barrolândia'),(5392,27,'Bernardo Sayão'),(5393,27,'Bom Jesus do Tocantins'),(5394,27,'Brasilândia do Tocantins'),(5395,27,'Brejinho de Nazaré'),(5396,27,'Buriti do Tocantins'),(5397,27,'Cachoeirinha'),(5398,27,'Campos Lindos'),(5399,27,'Cariri do Tocantins'),(5400,27,'Carmolândia'),(5401,27,'Carrasco Bonito'),(5402,27,'Caseara'),(5403,27,'Centenário'),(5404,27,'Chapada da Natividade'),(5405,27,'Chapada de Areia'),(5406,27,'Colinas do Tocantins'),(5407,27,'Colméia'),(5408,27,'Combinado'),(5409,27,'Conceição do Tocantins'),(5410,27,'Couto de Magalhães'),(5411,27,'Cristalândia'),(5412,27,'Crixás do Tocantins'),(5413,27,'Darcinópolis'),(5414,27,'Dianópolis'),(5415,27,'Divinópolis do Tocantins'),(5416,27,'Dois Irmãos do Tocantins'),(5417,27,'Dueré'),(5418,27,'Esperantina'),(5419,27,'Fátima'),(5420,27,'Figueirópolis'),(5421,27,'Filadélfia'),(5422,27,'Formoso do Araguaia'),(5423,27,'Fortaleza do Tabocão'),(5424,27,'Goianorte'),(5425,27,'Goiatins'),(5426,27,'Guaraí'),(5427,27,'Gurupi'),(5428,27,'Ipueiras'),(5429,27,'Itacajá'),(5430,27,'Itaguatins'),(5431,27,'Itapiratins'),(5432,27,'Itaporã do Tocantins'),(5433,27,'Jaú do Tocantins'),(5434,27,'Juarina'),(5435,27,'Lagoa da Confusão'),(5436,27,'Lagoa do Tocantins'),(5437,27,'Lajeado'),(5438,27,'Lavandeira'),(5439,27,'Lizarda'),(5440,27,'Luzinópolis'),(5441,27,'Marianópolis do Tocantins'),(5442,27,'Mateiros'),(5443,27,'Maurilândia do Tocantins'),(5444,27,'Miracema do Tocantins'),(5445,27,'Miranorte'),(5446,27,'Monte do Carmo'),(5447,27,'Monte Santo do Tocantins'),(5448,27,'Muricilândia'),(5449,27,'Natividade'),(5450,27,'Nazaré'),(5451,27,'Nova Olinda'),(5452,27,'Nova Rosalândia'),(5453,27,'Novo Acordo'),(5454,27,'Novo Alegre'),(5455,27,'Novo Jardim'),(5456,27,'Oliveira de Fátima'),(5457,27,'Palmas'),(5458,27,'Palmeirante'),(5459,27,'Palmeiras do Tocantins'),(5460,27,'Palmeirópolis'),(5461,27,'Paraíso do Tocantins'),(5462,27,'Paranã'),(5463,27,'Pau d`Arco'),(5464,27,'Pedro Afonso'),(5465,27,'Peixe'),(5466,27,'Pequizeiro'),(5467,27,'Pindorama do Tocantins'),(5468,27,'Piraquê'),(5469,27,'Pium'),(5470,27,'Ponte Alta do Bom Jesus'),(5471,27,'Ponte Alta do Tocantins'),(5472,27,'Porto Alegre do Tocantins'),(5473,27,'Porto Nacional'),(5474,27,'Praia Norte'),(5475,27,'Presidente Kennedy'),(5476,27,'Pugmil'),(5477,27,'Recursolândia'),(5478,27,'Riachinho'),(5479,27,'Rio da Conceição'),(5480,27,'Rio dos Bois'),(5481,27,'Rio Sono'),(5482,27,'Sampaio'),(5483,27,'Sandolândia'),(5484,27,'Santa Fé do Araguaia'),(5485,27,'Santa Maria do Tocantins'),(5486,27,'Santa Rita do Tocantins'),(5487,27,'Santa Rosa do Tocantins'),(5488,27,'Santa Tereza do Tocantins'),(5489,27,'Santa Terezinha do Tocantins'),(5490,27,'São Bento do Tocantins'),(5491,27,'São Félix do Tocantins'),(5492,27,'São Miguel do Tocantins'),(5493,27,'São Salvador do Tocantins'),(5494,27,'São Sebastião do Tocantins'),(5495,27,'São Valério da Natividade'),(5496,27,'Silvanópolis'),(5497,27,'Sítio Novo do Tocantins'),(5498,27,'Sucupira'),(5499,27,'Taguatinga'),(5500,27,'Taipas do Tocantins'),(5501,27,'Talismã'),(5502,27,'Tocantínia'),(5503,27,'Tocantinópolis'),(5504,27,'Tupirama'),(5505,27,'Tupiratins'),(5506,27,'Wanderlândia'),(5507,27,'Xambioá');
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
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cidade_idx` (`id_cidade`),
  CONSTRAINT `fk_cidade_endereco` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'2020','teste','1','Jd Japão','teste123',1);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sgl_estado` varchar(45) NOT NULL,
  `nom_estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'AC','Acre'),(2,'AL','Alagoas'),(3,'AP','Amapá'),(4,'AM','Amazonas'),(5,'BA','Bahia'),(6,'CE','Ceará'),(7,'DF','Distrito Federal'),(8,'ES','Espírito Santo'),(9,'GO','Goiás'),(10,'MA','Maranhão'),(11,'MT','Mato Grosso'),(12,'MS','Mato Grosso do Sul'),(13,'MG','Minas Gerais'),(14,'PA','Pará'),(15,'PB','Paraíba'),(16,'PR','Paraná'),(17,'PE','Pernambuco'),(18,'PI','Piauí'),(19,'RJ','Rio de Janeiro'),(20,'RN','Rio Grande do Norte'),(21,'RS','Rio Grande do Sul'),(22,'RO','Rondônia'),(23,'RR','Roraima'),(24,'SC','Santa Catarina'),(25,'SP','São Paulo'),(26,'SE','Sergipe'),(27,'TO','Tocantins');
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
  `data_nasc` date NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_endereco_idx` (`id_endereco`),
  CONSTRAINT `fk_endereco_funcionario` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'Cleber','cleber@hotmail.com','123','1998-05-12','M','11 4611-4493','11 98949-5749','41360825843','123456789',1,1,0,'teste'),(2,'teste','teste','1','2000-12-12','M','123465','123456','123465','123465',1,0,0,'login');
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
  `placa` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgduvidas_frequentes`
--

LOCK TABLES `pgduvidas_frequentes` WRITE;
/*!40000 ALTER TABLE `pgduvidas_frequentes` DISABLE KEYS */;
INSERT INTO `pgduvidas_frequentes` VALUES (1,'teste122',1,'teste'),(2,'teste',1,'teste2');
/*!40000 ALTER TABLE `pgduvidas_frequentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pgestados_postos`
--

DROP TABLE IF EXISTS `pgestados_postos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pgestados_postos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgestados_postos`
--

LOCK TABLES `pgestados_postos` WRITE;
/*!40000 ALTER TABLE `pgestados_postos` DISABLE KEYS */;
INSERT INTO `pgestados_postos` VALUES (1,'dfdsf'),(2,'sdf');
/*!40000 ALTER TABLE `pgestados_postos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pgfrota_onibus`
--

DROP TABLE IF EXISTS `pgfrota_onibus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pgfrota_onibus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
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
-- Table structure for table `pghome`
--

DROP TABLE IF EXISTS `pghome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pghome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(45) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkidTipo_idx` (`idTipo`),
  CONSTRAINT `fkidTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo_destino` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pghome`
--

LOCK TABLES `pghome` WRITE;
/*!40000 ALTER TABLE `pghome` DISABLE KEYS */;
/*!40000 ALTER TABLE `pghome` ENABLE KEYS */;
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
  `nome` varchar(45) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `localização` text,
  `texto` varchar(255) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkidEstado_idx` (`idEstado`),
  CONSTRAINT `fkidEstado` FOREIGN KEY (`idEstado`) REFERENCES `pgestados_postos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `titulo1` varchar(45) DEFAULT NULL,
  `texto1` text,
  `titulo2` varchar(45) DEFAULT NULL,
  `texto2` text,
  `imagem` varchar(255) DEFAULT NULL,
  `icon1` varchar(255) DEFAULT NULL,
  `detalhes1` varchar(45) DEFAULT NULL,
  `icon2` varchar(255) DEFAULT NULL,
  `detalhes2` varchar(45) DEFAULT NULL,
  `icon3` varchar(255) DEFAULT NULL,
  `detalhes3` varchar(45) DEFAULT NULL,
  `icon4` varchar(255) DEFAULT NULL,
  `detalhes4` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pgsobre_nos`
--

LOCK TABLES `pgsobre_nos` WRITE;
/*!40000 ALTER TABLE `pgsobre_nos` DISABLE KEYS */;
INSERT INTO `pgsobre_nos` VALUES (1,'gfdf','fgdg','fd','gdfgdf','','','dfg','','dfgdf','','dfg','','fdg');
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
  `id_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_endereco_idx` (`id_endereco`),
  CONSTRAINT `fk_endereco_posto` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for table `tipo_destino`
--

DROP TABLE IF EXISTS `tipo_destino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_destino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujestivos` varchar(45) DEFAULT NULL,
  `mais vendidos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_destino`
--

LOCK TABLES `tipo_destino` WRITE;
/*!40000 ALTER TABLE `tipo_destino` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_destino` ENABLE KEYS */;
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
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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

-- Dump completed on 2018-04-16 11:23:06
