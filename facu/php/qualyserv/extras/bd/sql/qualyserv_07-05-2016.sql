-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2016 at 12:45 PM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qualyserv`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_configuracao`
--

CREATE TABLE `auth_configuracao` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_configuracao`
--

INSERT INTO `auth_configuracao` (`id`, `system_name`, `path_logo`, `web_site`, `email`, `email_password`, `email_smtp_secure`, `email_smtp_auth`, `email_host`, `email_port`) VALUES
(1, 'QualyServ', '', 'www.qualyserv.16mb.com', 'qualyserv2016@gmail.com', 'tcc2016qualyserv', 'tls', 'true', 'smtp.gmail.com', '587');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `tipo`, `cpf_cnpj`, `data_nasc_fund`, `sexo`, `senha`, `confirmacao_senha`, `token`) VALUES
(1, 'Lazarone Santos Santana', 'lazarone.info.web@gmail.com', 'fisica', '400.021.228-12', '06/04/1992', 'masculino', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'ffa04c32ea7253daebc6d64b49bf3aa4'),
(2, 'Calebe Danilo Rocha', 'lazarone_santana@hotmail.com', 'fisica', '404.965.757-08', '24/11/1994', 'masculino', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '39af118100180f8108b98fdd0d07eea9'),
(3, 'teste 2rwer', 'teste@teste.com', 'fisica', '123.124.345-43', '12/12/1998', 'feminino', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(4, 'Nicole Sophia Gomes', 'nicole.sophia.gomes@spires.com.br', 'fisica', '134.944.997-05', '24/06/1998', 'feminino', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
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
  `codigo_municipio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id`, `cnpj`, `email`, `razao_social`, `nome_fantasia`, `data_fundacao`, `senha`, `confirmacao_senha`, `inscricao_estadual`, `site`, `cep`, `logradouro`, `numero`, `cidade`, `bairro`, `complemento`, `estado`, `codigo_municipio`) VALUES
(1, '75.545.820/0001-68', 'estoque@rodrigorafaela.com.br', 'Rodrigo e Rafaela Marcenaria ME', 'RR Marcenaria', '09/04/1998', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '108.280.945.766', 'www.rodrigorafaela.com.br', '12245-320', 'Rua Major Francisco de Paula Elias', '150', 'SÃ£o JosÃ© dos Campos', 'Vila Adyana', '', 'SP', '3549904'),
(2, '05.278.703/0001-08', 'fabricacao@isabelbarbara.com.br', 'Isabel e BÃ¡rbara Doces & Salgados ME', 'Isabel e BÃ¡rbara', '18/04/2006', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '430.540.390.818', 'www.isabelbarbara.com.br', '07174-210', 'Rua HorÃ¡cio de Almeida', '192', 'Guarulhos', 'Residencial Parque Cumbica', '', 'SP', '3518800');

-- --------------------------------------------------------

--
-- Table structure for table `empresa_servicos`
--

CREATE TABLE `empresa_servicos` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresa_servicos`
--

INSERT INTO `empresa_servicos` (`id`, `empresa_id`, `servico_id`) VALUES
(6, 1, 1),
(7, 1, 2),
(8, 1, 6),
(9, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `codigo_municipio`, `class_id`, `class_name`) VALUES
(1, '06150-510', 'Estrada dos Jasmins', '9', 'Santa Maria', 'Osasco', 'SP', 'Casa, Atelie de costura', '3534401', 1, 'Cliente'),
(2, '06213-110', 'Rua Carlos da Costa Ramalho JÃºnior', '201', 'Presidente Altino', 'Osasco', 'SP', '', '3534401', 1, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `orcamento`
--

CREATE TABLE `orcamento` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `observacao` text,
  `fechado` varchar(5) NOT NULL DEFAULT 'false',
  `concluido` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orcamento`
--

INSERT INTO `orcamento` (`id`, `cliente_id`, `observacao`, `fechado`, `concluido`) VALUES
(2, 1, NULL, 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `orcamento_item`
--

CREATE TABLE `orcamento_item` (
  `id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `data_previsao_inicio` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orcamento_item`
--

INSERT INTO `orcamento_item` (`id`, `orcamento_id`, `servico_id`, `data_previsao_inicio`) VALUES
(3, 2, 1, '06/06/2016');

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicos`
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
(9, 'Caixa D\' agua'),
(10, 'Pintura e Papel de parede'),
(11, 'Portas e Janelas');

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `ddd` varchar(3) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`id`, `tipo`, `ddd`, `numero`, `class_id`, `class_name`) VALUES
(9, 'comercial', '019', '2995-8601', 1, 'Empresa'),
(10, 'celular', '019', '9 9826-0835', 1, 'Empresa'),
(13, 'celular', '011', '9604-2964', 1, 'Cliente');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
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
-- AUTO_INCREMENT for table `auth_configuracao`
--
ALTER TABLE `auth_configuracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empresa_servicos`
--
ALTER TABLE `empresa_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orcamento_item`
--
ALTER TABLE `orcamento_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
