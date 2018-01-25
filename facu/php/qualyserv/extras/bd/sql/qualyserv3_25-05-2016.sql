-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 25-Maio-2016 às 13:04
-- Versão do servidor: 5.5.49-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qualyserv3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmacao_senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nome_completo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arquivado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `email`, `senha`, `confirmacao_senha`, `nome_completo`, `arquivado`) VALUES
(1, 'lazarone.info.web@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'admin_lazarone', 'false');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_configuracao`
--

CREATE TABLE IF NOT EXISTS `auth_configuracao` (
`id` int(11) NOT NULL,
  `system_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `path_logo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `web_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'localhost:8000',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_smtp_secure` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_smtp_auth` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_port` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_configuracao`
--

INSERT INTO `auth_configuracao` (`id`, `system_name`, `path_logo`, `web_site`, `email`, `email_password`, `email_smtp_secure`, `email_smtp_auth`, `email_host`, `email_port`) VALUES
(1, 'QualyServ', '', 'www.qualyserv.16mb.com', 'qualyserv2016@gmail.com', 'tcc2016qualyserv', 'tls', 'true', 'smtp.gmail.com', '587');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_cnpj` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc_fund` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmacao_senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `tipo`, `cpf_cnpj`, `data_nasc_fund`, `sexo`, `senha`, `confirmacao_senha`, `token`) VALUES
(1, 'Lazarone Santos Santana', 'lazarone.info.web@gmail.com', 'fisica', '400.021.228-12', '06/04/1992', 'masculino', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '0ef420eb5ba772af7ed268c9e4e62865'),
(2, 'Silas Andrade', 'silas.s.andrade@gmail.com', 'fisica', '123.456.789-00', '09/10/1988', 'masculino', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', NULL),
(3, 'ana carolina', 'fernandes.ac@outlook.com', 'fisica', '427.379.978-28', '19/12/1993', 'feminino', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
`id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
`id` int(11) NOT NULL,
  `cnpj` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `razao_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `data_fundacao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmacao_senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `inscricao_estadual` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `logradouro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_municipio` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `cnpj`, `email`, `razao_social`, `nome_fantasia`, `data_fundacao`, `senha`, `confirmacao_senha`, `inscricao_estadual`, `site`, `cep`, `logradouro`, `numero`, `cidade`, `bairro`, `complemento`, `estado`, `codigo_municipio`, `token`) VALUES
(1, '05.259.747/0001-82', 'financeiro@hadassaheitor.com.br', 'Hadassa e Heitor Limpeza Ltda', 'Hadassa e Heitor Limpeza', '11/02/2011', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '154.411.668.405', 'www.hadassaheitor.com.br', '03627-030', 'Rua Sebastião José Francisco', '351', 'São Paulo', 'Vila Buenos Aires', '', 'SP', '3550308', 'd28cf4152439ed9e5f6c1f7c1a2bc56b'),
(2, '12.345.678/9091-23', 'silas.s.andrade@gmail.com', 'mbrune serv', 'mbrune Serv', '08/09/1998', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '', 'silas.s.andrade@gmail.com', '06655-000', 'Rua Cláudia', '12', 'Itapevi', 'Jardim Santo Américo', 'Escritorio', 'SP', '3522505', NULL),
(3, '11.111.111/1111-11', 'sbrune100@gmail.com', 'silas silva', 'abrune', '09/10/1998', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', 'sbrune100@gmail.com', '08598-000', 'Estrada Municipal do Mandi', '11', 'Itaquaquecetuba', 'Mandi', 'Escritorio', 'SP', '3523107', NULL),
(4, '22.222.222/2222-22', 'mbrune10@gmail.com', 'Marcos Andrade', 'mbrune wbrune', '22/09/1999', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', '', '06622-000', 'Rua Ailton Esteves de Melo', '22', 'Jandira', 'Jardim Sol Nascente', '', 'SP', '3525003', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_avaliacao`
--

CREATE TABLE IF NOT EXISTS `empresa_avaliacao` (
`id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `msg_avaliacao` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `data_avaliacao` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `empresa_avaliacao`
--

INSERT INTO `empresa_avaliacao` (`id`, `empresa_id`, `orcamento_id`, `msg_avaliacao`, `data_avaliacao`) VALUES
(2, 1, 1, 'teste de exibição das avaliações', '22/05/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_servicos`
--

CREATE TABLE IF NOT EXISTS `empresa_servicos` (
`id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `empresa_servicos`
--

INSERT INTO `empresa_servicos` (`id`, `empresa_id`, `servico_id`) VALUES
(1, 1, 6),
(2, 1, 9),
(3, 1, 11),
(4, 1, 2),
(5, 1, 1),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 2, 6),
(12, 2, 7),
(13, 2, 8),
(14, 2, 9),
(15, 2, 10),
(16, 2, 11),
(17, 3, 1),
(18, 3, 2),
(19, 3, 3),
(21, 3, 5),
(22, 3, 6),
(23, 3, 7),
(24, 3, 8),
(25, 3, 9),
(26, 3, 10),
(27, 3, 11),
(28, 4, 1),
(29, 4, 2),
(30, 4, 3),
(31, 4, 4),
(32, 4, 5),
(33, 4, 6),
(34, 4, 7),
(35, 4, 8),
(36, 4, 9),
(37, 4, 10),
(38, 4, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
`id` int(11) NOT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `logradouro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_municipio` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `codigo_municipio`, `class_id`, `class_name`) VALUES
(1, '06150-510', 'Estrada dos Jasmins', '9', 'Santa Maria', 'Osasco', 'SP', '', '3534401', 1, 'Cliente'),
(2, '40286-020', 'Rua Jardim Lucaia', '201', 'Brotas', 'Salvador', 'BA', 'Desenvolvimento', '2927408', 1, 'Cliente'),
(3, '06656-110', 'Avenida dos Bugres', '104', 'Jardim Bela Vista', 'Itapevi', 'SP', '', '3522505', 2, 'Cliente'),
(4, '06326-455', 'Rua Tatuí', '185', 'Conjunto Habitacional Presidente Castelo Branco', 'Carapicuíba', 'SP', '', '3510609', 3, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
`id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `observacao` mediumtext COLLATE utf8_unicode_ci,
  `fechado` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `concluido` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `endereco_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `cliente_id`, `observacao`, `fechado`, `concluido`, `endereco_id`) VALUES
(1, 1, NULL, 'true', 'true', 1),
(2, 1, NULL, 'false', 'true', 2),
(3, 1, NULL, 'false', 'true', 1),
(4, 2, NULL, 'true', 'true', 3),
(5, 1, NULL, 'false', 'false', NULL),
(6, 3, NULL, 'false', 'true', 4),
(7, 2, NULL, 'false', 'true', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_item`
--

CREATE TABLE IF NOT EXISTS `orcamento_item` (
`id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `data_previsao_inicio` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `orcamento_item`
--

INSERT INTO `orcamento_item` (`id`, `orcamento_id`, `servico_id`, `data_previsao_inicio`) VALUES
(1, 1, 1, '17/05/2016'),
(2, 2, 6, '20/05/2016'),
(3, 3, 1, '17/05/2016'),
(9, 4, 4, '23/05/2016'),
(8, 4, 4, '23/05/2016'),
(7, 5, 1, '25/05/2016'),
(10, 6, 1, '25/05/2016'),
(11, 6, 4, '25/05/2016'),
(12, 7, 8, '24/06/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_proposta`
--

CREATE TABLE IF NOT EXISTS `orcamento_proposta` (
`id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `valor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `data_prev_inicio` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cancelado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `fechado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `orcamento_proposta`
--

INSERT INTO `orcamento_proposta` (`id`, `orcamento_id`, `empresa_id`, `valor`, `observacao`, `data_prev_inicio`, `cancelado`, `fechado`) VALUES
(1, 1, 1, '50.00', 'sÃ³ posso comeÃ§ar o serviÃ§o a partir do dia 19/05', '19/05/2016', 'false', 'true'),
(3, 2, 1, '75.00', 'teste de filtro', '18/05/2016', 'false', 'false'),
(4, 3, 1, '250.00', 'teste de envio de email', '18/05/2016', 'false', 'false'),
(5, 2, 2, '120,00', 'Inicio dia 28/05', 'inicio', 'false', 'false'),
(6, 3, 3, '400', '18/05/2016', 'fechado', 'false', 'false'),
(7, 4, 3, '100.00', 'Cobro 100 reais o dia de trabalho', '30/05/2016', 'false', 'true');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
`id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `descricao`) VALUES
(1, 'Eletrica'),
(2, 'Instalacao de Som e Imagem'),
(3, 'Encanador'),
(4, 'Pedreiro'),
(5, 'Instalacao de Pisos e Revestimentos'),
(6, 'Fixacao'),
(7, 'Montagem de moveis'),
(8, 'Ar Condicionado'),
(9, 'Caixa D'' agua'),
(10, 'Pintura e Papel de parede'),
(11, 'Portas e Janelas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_materiais`
--

CREATE TABLE IF NOT EXISTS `servico_materiais` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
`id` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ddd` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `tipo`, `ddd`, `numero`, `class_id`, `class_name`) VALUES
(1, 'celular', '011', '9 9862-3698', 1, 'Empresa'),
(2, 'comercial', '011', '2941-0580', 1, 'Empresa'),
(3, 'residencial', '011', '3683-4998', 1, 'Empresa'),
(4, 'celular', '011', '9 6042-9643', 1, 'Cliente'),
(5, 'celular', '011', '9 9314-2917', 1, 'Cliente'),
(6, 'residencial', '011', '4141-4141', 2, 'Cliente'),
(7, 'comercial', '011', '2332-1122', 3, 'Empresa'),
(8, 'celular', '011', '9 8913-2564', 3, 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_configuracao`
--
ALTER TABLE `auth_configuracao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa_avaliacao`
--
ALTER TABLE `empresa_avaliacao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa_servicos`
--
ALTER TABLE `empresa_servicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamento_item`
--
ALTER TABLE `orcamento_item`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamento_proposta`
--
ALTER TABLE `orcamento_proposta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico_materiais`
--
ALTER TABLE `servico_materiais`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auth_configuracao`
--
ALTER TABLE `auth_configuracao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `empresa_avaliacao`
--
ALTER TABLE `empresa_avaliacao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empresa_servicos`
--
ALTER TABLE `empresa_servicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orcamento_item`
--
ALTER TABLE `orcamento_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orcamento_proposta`
--
ALTER TABLE `orcamento_proposta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `servico_materiais`
--
ALTER TABLE `servico_materiais`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
