-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: livro_zend_expressive_db
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `tb_mensagem`
--

DROP TABLE IF EXISTS `tb_mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL COMMENT 'Id do usuário provenitente da tb_usuario',
  `ds_mensagem` text NOT NULL COMMENT 'Descrição da mensagem',
  `ds_resposta` text,
  `dt_mensagem` datetime NOT NULL COMMENT 'Data da mensagem',
  `st_ativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Está ativo?\n0 - Não\n1 - Sim',
  `dt_criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alterado_em` datetime DEFAULT NULL,
  `dt_deletado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_mensagem_tb_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_tb_mensagem_tb_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mensagem dos usuários';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mensagem`
--

LOCK TABLES `tb_mensagem` WRITE;
/*!40000 ALTER TABLE `tb_mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_usuario`
--

DROP TABLE IF EXISTS `tb_tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo` varchar(45) NOT NULL COMMENT 'Tipo',
  `st_ativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Está ativo?\n0 - Não\n1 - Sim',
  `dt_criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de criação',
  `dt_alterado_em` datetime DEFAULT NULL COMMENT 'Data de alteração',
  `dt_deletado_em` datetime DEFAULT NULL COMMENT 'Data de exclusão',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_usuario`
--

LOCK TABLES `tb_tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tb_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id` int(11) NOT NULL,
  `nm_nome_completo` varchar(150) NOT NULL COMMENT 'Nome completo do usuário',
  `cd_cpf` varchar(11) NOT NULL COMMENT 'CPF',
  `dt_nascimento` date NOT NULL COMMENT 'Data de nascimento',
  `nm_email` varchar(100) NOT NULL,
  `nm_senha` varchar(255) NOT NULL COMMENT 'Senha',
  `st_ativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Está ativo?\n0 - Não\n1 - Sim',
  `dt_criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de criação do registro',
  `dt_alterado_em` datetime DEFAULT NULL COMMENT 'Data de alteração do registro',
  `dt_deletado_em` datetime DEFAULT NULL COMMENT 'Data de exclusão do registro',
  PRIMARY KEY (`id`),
  KEY `fk_tb_usuario_tb_tipo_usuario1_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_tb_usuario_tb_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tb_tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contém os usuários da aplicação';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-29 19:17:42
