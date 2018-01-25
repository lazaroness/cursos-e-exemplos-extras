-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: qualyserv
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,POSTGRESQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "auth_configuracao"
--

DROP TABLE IF EXISTS "auth_configuracao";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "auth_configuracao" (
  "id" int(11) NOT NULL,
  "system_name" varchar(20) NOT NULL,
  "path_logo" text NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "auth_configuracao"
--

LOCK TABLES "auth_configuracao" WRITE;
/*!40000 ALTER TABLE "auth_configuracao" DISABLE KEYS */;
INSERT INTO "auth_configuracao" VALUES (1,'QualyServ','','2016-04-17 18:30:08','0000-00-00 00:00:00');
/*!40000 ALTER TABLE "auth_configuracao" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "cliente"
--

DROP TABLE IF EXISTS "cliente";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "cliente" (
  "id" int(11) NOT NULL,
  "nome" varchar(50) NOT NULL,
  "email" varchar(100) NOT NULL,
  "tipo" varchar(20) NOT NULL,
  "cpf_cnpj" varchar(20) NOT NULL,
  "data_nasc_fund" varchar(10) NOT NULL,
  "sexo" varchar(9) NOT NULL,
  "senha" varchar(32) NOT NULL,
  "confirmacao_senha" varchar(32) NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "cliente"
--

LOCK TABLES "cliente" WRITE;
/*!40000 ALTER TABLE "cliente" DISABLE KEYS */;
INSERT INTO "cliente" VALUES (1,'Lazarone Santos Santana2','lazarone.info.web@gmail.com','fisica','400.021.228-12','06/04/1992','masculino','d41d8cd98f00b204e9800998ecf8427e','d41d8cd98f00b204e9800998ecf8427e','2016-04-22 18:44:46','2016-04-22 19:26:32'),(2,'Calebe Danilo Rocha','lazarone_santana@hotmail.com','fisica','404.965.757-08','24/11/1994','masculino','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','2016-04-22 17:36:35','2016-04-22 17:36:35'),(3,'teste 2rwer','teste@teste.com','fisica','123.124.345-43','12/12/1998','feminino','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','2016-04-22 18:03:06','2016-04-22 18:03:06');
/*!40000 ALTER TABLE "cliente" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "empresa"
--

DROP TABLE IF EXISTS "empresa";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "empresa" (
  "id" int(11) NOT NULL,
  "cnpj" varchar(20) NOT NULL,
  "email" varchar(100) NOT NULL,
  "razao_social" varchar(100) NOT NULL,
  "nome_fantasia" varchar(60) NOT NULL,
  "data_fundacao" varchar(10) NOT NULL,
  "senha" varchar(32) NOT NULL,
  "confirmacao_senha" varchar(32) NOT NULL,
  "inscricao_estadual" varchar(20) NOT NULL,
  "site" varchar(100) NOT NULL,
  "cep" varchar(10) NOT NULL,
  "logradouro" varchar(60) NOT NULL,
  "numero" varchar(5) NOT NULL,
  "cidade" varchar(100) NOT NULL,
  "bairro" varchar(100) NOT NULL,
  "complemento" varchar(100) DEFAULT NULL,
  "estado" varchar(2) NOT NULL,
  "codigo_municipio" varchar(20) NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "empresa"
--

LOCK TABLES "empresa" WRITE;
/*!40000 ALTER TABLE "empresa" DISABLE KEYS */;
INSERT INTO "empresa" VALUES (1,'75.545.820/0001-68','estoque@rodrigorafaela.com.br','Rodrigo e Rafaela Marcenaria ME','RR Marcenaria','09/04/1998','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','108.280.945.766','www.rodrigorafaela.com.br','12245-320','Rua Major Francisco de Paula Elias','150','São José dos Campos','Vila Adyana','','SP','3549904','2016-04-22 18:27:57','2016-04-22 18:27:57'),(2,'05.278.703/0001-08','fabricacao@isabelbarbara.com.br','Isabel e Bárbara Doces & Salgados ME','Isabel e Bárbara','18/04/2006','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','430.540.390.818','www.isabelbarbara.com.br','07174-210','Rua Horácio de Almeida','192','Guarulhos','Residencial Parque Cumbica','','SP','3518800','2016-04-22 19:10:35','2016-04-22 19:10:35');
/*!40000 ALTER TABLE "empresa" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "endereco"
--

DROP TABLE IF EXISTS "endereco";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "endereco" (
  "id" int(11) NOT NULL,
  "cep" varchar(10) NOT NULL,
  "logradouro" varchar(60) NOT NULL,
  "numero" varchar(5) NOT NULL,
  "bairro" varchar(60) NOT NULL,
  "cidade" varchar(60) NOT NULL,
  "estado" varchar(2) NOT NULL,
  "complemento" varchar(60) DEFAULT NULL,
  "codigo_municipio" varchar(10) NOT NULL,
  "class_id" int(11) NOT NULL,
  "class_name" varchar(60) NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "endereco"
--

LOCK TABLES "endereco" WRITE;
/*!40000 ALTER TABLE "endereco" DISABLE KEYS */;
INSERT INTO "endereco" VALUES (1,'06150-510','Estrada dos Jasmins','9','Santa Maria','Osasco','SP','Casa, Atelie de costura','3534401',1,'Cliente','2016-04-22 14:55:27','2016-04-22 14:55:27');
/*!40000 ALTER TABLE "endereco" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "orcamento"
--

DROP TABLE IF EXISTS "orcamento";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "orcamento" (
  "id" int(11) NOT NULL,
  "cliente_id" int(11) NOT NULL,
  "observacao" text,
  "fechado" varchar(5) NOT NULL DEFAULT 'false',
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "orcamento"
--

LOCK TABLES "orcamento" WRITE;
/*!40000 ALTER TABLE "orcamento" DISABLE KEYS */;
INSERT INTO "orcamento" VALUES (1,1,NULL,'false','2016-04-17 19:11:07','2016-04-17 19:11:07');
/*!40000 ALTER TABLE "orcamento" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "orcamento_item"
--

DROP TABLE IF EXISTS "orcamento_item";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "orcamento_item" (
  "id" int(11) NOT NULL,
  "orcamento_id" int(11) NOT NULL,
  "servico_id" int(11) NOT NULL,
  "data_previsao_inicio" varchar(10) DEFAULT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "orcamento_item"
--

LOCK TABLES "orcamento_item" WRITE;
/*!40000 ALTER TABLE "orcamento_item" DISABLE KEYS */;
INSERT INTO "orcamento_item" VALUES (1,1,1,'20/04/2016','2016-04-17 19:11:08','2016-04-17 19:11:08'),(2,1,3,'25/04/2016','2016-04-17 19:11:49','2016-04-17 19:11:49');
/*!40000 ALTER TABLE "orcamento_item" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "servicos"
--

DROP TABLE IF EXISTS "servicos";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "servicos" (
  "id" int(11) NOT NULL,
  "descricao" varchar(50) DEFAULT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "servicos"
--

LOCK TABLES "servicos" WRITE;
/*!40000 ALTER TABLE "servicos" DISABLE KEYS */;
INSERT INTO "servicos" VALUES (1,'Eletrica','2016-04-17 18:26:33','0000-00-00 00:00:00'),(2,'Instalacao de Som e Imagem','2016-04-17 18:26:33','0000-00-00 00:00:00'),(3,'Encanador','2016-04-17 18:26:33','0000-00-00 00:00:00'),(4,'Pedreiro','2016-04-17 18:26:33','0000-00-00 00:00:00'),(5,'Instalacao de Pisos e Revestimentos','2016-04-17 18:26:33','0000-00-00 00:00:00'),(6,'Fixacao','2016-04-17 18:26:33','0000-00-00 00:00:00'),(7,'Montagem de moveis','2016-04-17 18:26:33','0000-00-00 00:00:00'),(8,'Ar Condicionado','2016-04-17 18:26:33','0000-00-00 00:00:00'),(9,'Caixa D\' agua','2016-04-17 18:26:33','0000-00-00 00:00:00'),(10,'Pintura e Papel de parede','2016-04-17 18:26:33','0000-00-00 00:00:00'),(11,'Portas e Janelas','2016-04-17 18:26:33','0000-00-00 00:00:00');
/*!40000 ALTER TABLE "servicos" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "telefone"
--

DROP TABLE IF EXISTS "telefone";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "telefone" (
  "id" int(11) NOT NULL,
  "tipo" varchar(20) NOT NULL,
  "ddd" varchar(3) NOT NULL,
  "numero" varchar(15) NOT NULL,
  "class_id" int(11) NOT NULL,
  "class_name" varchar(30) NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  "updated_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "telefone"
--

LOCK TABLES "telefone" WRITE;
/*!40000 ALTER TABLE "telefone" DISABLE KEYS */;
INSERT INTO "telefone" VALUES (1,'celular','011','9 6042-9643',1,'Cliente','2016-04-22 14:54:43','2016-04-22 14:54:43'),(2,'celular','011','9 9314-2917',1,'Cliente','2016-04-22 14:54:53','2016-04-22 14:54:53'),(9,'comercial','019','2995-8601',1,'Empresa','2016-04-17 18:45:03','2016-04-17 18:45:03'),(10,'celular','019','9 9826-0835',1,'Empresa','2016-04-17 18:45:26','2016-04-17 18:45:26');
/*!40000 ALTER TABLE "telefone" ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-22 16:30:45
