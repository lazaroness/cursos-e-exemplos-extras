-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18-Maio-2016 às 12:54
-- Versão do servidor: 5.5.49-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qualyserv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `confirmacao_senha` varchar(32) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `arquivado` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_configuracao`
--

CREATE TABLE IF NOT EXISTS `auth_configuracao` (
`id` int(11) NOT NULL,
  `system_name` varchar(20) NOT NULL,
  `path_logo` text NOT NULL,
  `web_site` varchar(255) NOT NULL DEFAULT 'localhost:8000',
  `email` varchar(255) DEFAULT NULL,
  `email_password` varchar(100) DEFAULT NULL,
  `email_smtp_secure` varchar(10) DEFAULT NULL,
  `email_smtp_auth` varchar(10) DEFAULT NULL,
  `email_host` varchar(255) DEFAULT NULL,
  `email_port` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `data_nasc_fund` varchar(10) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `confirmacao_senha` varchar(32) NOT NULL,
  `token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `tipo`, `cpf_cnpj`, `data_nasc_fund`, `sexo`, `senha`, `confirmacao_senha`, `token`) VALUES
(1, 'Lazarone Santos Santana', 'lazarone.info.web@gmail.com', 'fisica', '400.021.228-12', '06/04/1992', 'masculino', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
`id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
`id` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(60) NOT NULL,
  `data_fundacao` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `confirmacao_senha` varchar(32) NOT NULL,
  `inscricao_estadual` varchar(20) NOT NULL,
  `site` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `codigo_municipio` varchar(20) NOT NULL,
  `token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `cnpj`, `email`, `razao_social`, `nome_fantasia`, `data_fundacao`, `senha`, `confirmacao_senha`, `inscricao_estadual`, `site`, `cep`, `logradouro`, `numero`, `cidade`, `bairro`, `complemento`, `estado`, `codigo_municipio`, `token`) VALUES
(1, '05.259.747/0001-82', 'financeiro@hadassaheitor.com.br', 'Hadassa e Heitor Limpeza Ltda', 'Hadassa e Heitor Limpeza', '11/02/2011', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '154.411.668.405', 'www.hadassaheitor.com.br', '03627-030', 'Rua SebastiÃ£o JosÃ© Francisco', '351', 'SÃ£o Paulo', 'Vila Buenos Aires', '', 'SP', '3550308', 'd28cf4152439ed9e5f6c1f7c1a2bc56b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_servicos`
--

CREATE TABLE IF NOT EXISTS `empresa_servicos` (
`id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa_servicos`
--

INSERT INTO `empresa_servicos` (`id`, `empresa_id`, `servico_id`) VALUES
(1, 1, 6),
(2, 1, 9),
(3, 1, 11),
(4, 1, 2),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
`id` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `codigo_municipio` varchar(10) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `codigo_municipio`, `class_id`, `class_name`) VALUES
(1, '06150-510', 'Estrada dos Jasmins', '9', 'Santa Maria', 'Osasco', 'SP', '', '3534401', 1, 'Cliente'),
(2, '40286-020', 'Rua Jardim Lucaia', '201', 'Brotas', 'Salvador', 'BA', 'Desenvolvimento', '2927408', 1, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
`id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `observacao` text,
  `fechado` varchar(5) NOT NULL DEFAULT 'false',
  `concluido` varchar(5) NOT NULL DEFAULT 'false',
  `endereco_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `cliente_id`, `observacao`, `fechado`, `concluido`, `endereco_id`) VALUES
(1, 1, NULL, 'true', 'true', 1),
(2, 1, NULL, 'false', 'true', 2),
(3, 1, NULL, 'false', 'true', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_item`
--

CREATE TABLE IF NOT EXISTS `orcamento_item` (
`id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `data_previsao_inicio` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento_item`
--

INSERT INTO `orcamento_item` (`id`, `orcamento_id`, `servico_id`, `data_previsao_inicio`) VALUES
(1, 1, 1, '17/05/2016'),
(2, 2, 6, '20/05/2016'),
(3, 3, 1, '17/05/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_proposta`
--

CREATE TABLE IF NOT EXISTS `orcamento_proposta` (
`id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `observacao` text NOT NULL,
  `data_prev_inicio` varchar(20) NOT NULL,
  `cancelado` varchar(10) NOT NULL DEFAULT 'false',
  `fechado` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento_proposta`
--

INSERT INTO `orcamento_proposta` (`id`, `orcamento_id`, `empresa_id`, `valor`, `observacao`, `data_prev_inicio`, `cancelado`, `fechado`) VALUES
(1, 1, 1, '50.00', 'sÃ³ posso comeÃ§ar o serviÃ§o a partir do dia 19/05', '19/05/2016', 'false', 'true'),
(3, 2, 1, '75.00', 'teste de filtro', '18/05/2016', 'false', 'false'),
(4, 3, 1, '250.00', 'teste de envio de email', '18/05/2016', 'false', 'false');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
`id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
`id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `ddd` varchar(3) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `tipo`, `ddd`, `numero`, `class_id`, `class_name`) VALUES
(1, 'celular', '011', '9 9862-3698', 1, 'Empresa'),
(2, 'comercial', '011', '2941-0580', 1, 'Empresa'),
(3, 'residencial', '011', '3683-4998', 1, 'Empresa'),
(4, 'celular', '011', '9 6042-9643', 1, 'Cliente');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_configuracao`
--
ALTER TABLE `auth_configuracao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `empresa_servicos`
--
ALTER TABLE `empresa_servicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orcamento_item`
--
ALTER TABLE `orcamento_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orcamento_proposta`
--
ALTER TABLE `orcamento_proposta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
