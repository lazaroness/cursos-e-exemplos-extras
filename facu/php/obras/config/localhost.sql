-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 01, 2015 as 03:36 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `obra_2_0`
--
CREATE DATABASE `obra_2_0` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `obra_2_0`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consiste`
--

CREATE TABLE IF NOT EXISTS `consiste` (
  `id_apartamento` int(11) NOT NULL,
  `id_etapa` int(11) NOT NULL,
  PRIMARY KEY (`id_etapa`,`id_apartamento`),
  UNIQUE KEY `ID_consiste_IND` (`id_etapa`,`id_apartamento`),
  KEY `EQU_consi_tb_ap_IND` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consiste`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `pertence`
--

CREATE TABLE IF NOT EXISTS `pertence` (
  `id_apartamento` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`,`id_apartamento`),
  UNIQUE KEY `ID_pertence_IND` (`id_produto`,`id_apartamento`),
  KEY `EQU_perte_tb_ap_IND` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pertence`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ambiente`
--

CREATE TABLE IF NOT EXISTS `tb_ambiente` (
  `id_ambiente` int(11) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `tipo` char(50) NOT NULL,
  `id_apartamento` int(11) NOT NULL,
  PRIMARY KEY (`id_ambiente`),
  UNIQUE KEY `ID_tb_ambiente_IND` (`id_ambiente`),
  KEY `EQU_tb_am_tb_ap_IND` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_ambiente`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_apartamento`
--

CREATE TABLE IF NOT EXISTS `tb_apartamento` (
  `id_apartamento` int(11) NOT NULL,
  `descricao` char(50) NOT NULL,
  `data_ini` date NOT NULL,
  `data_prev` date NOT NULL,
  `data_atualizacao` date NOT NULL,
  `nome` char(50) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  PRIMARY KEY (`id_apartamento`),
  UNIQUE KEY `ID_tb_apartamento_IND` (`id_apartamento`),
  KEY `EQU_tb_ap_tb_fu_IND` (`id_funcionario`),
  KEY `EQU_tb_ap_tb_or_IND` (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_apartamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `telefone` char(12) NOT NULL,
  `celular` char(13) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `id_apartamento` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `ID_tb_cliente_IND` (`id_cliente`),
  KEY `EQU_tb_cl_tb_or_IND` (`id_orcamento`),
  KEY `EQU_tb_cl_tb_ap_IND` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente_fisico`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_fisico` (
  `id_cliente` int(11) NOT NULL,
  `cpf` char(12) NOT NULL,
  `nome` char(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `ID_tb_cl_tb_cl_1_IND` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente_fisico`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente_juridico`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_juridico` (
  `id_cliente` int(11) NOT NULL,
  `cnpj` char(19) NOT NULL,
  `razao_social` char(50) NOT NULL,
  `nome_fantasia` char(50) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `ID_tb_cl_tb_cl_IND` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente_juridico`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_etapa`
--

CREATE TABLE IF NOT EXISTS `tb_etapa` (
  `id_etapa` int(11) NOT NULL,
  `andamento` char(5) NOT NULL,
  `descricao` char(50) NOT NULL,
  PRIMARY KEY (`id_etapa`),
  UNIQUE KEY `ID_tb_etapa_IND` (`id_etapa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_etapa`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` char(50) NOT NULL,
  `telefone` char(12) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_fornecedor`),
  UNIQUE KEY `ID_tb_fornecedor_IND` (`id_fornecedor`),
  KEY `EQU_tb_fo_tb_pr_IND` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedor`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` char(50) NOT NULL,
  `cargo` char(50) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `ID_tb_funcionario_IND` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_layout_site`
--

CREATE TABLE IF NOT EXISTS `tb_layout_site` (
  `id_layout` int(11) NOT NULL,
  `tipo` char(50) NOT NULL,
  PRIMARY KEY (`id_layout`),
  UNIQUE KEY `ID_tb_layout_site_IND` (`id_layout`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_layout_site`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orcamento`
--

CREATE TABLE IF NOT EXISTS `tb_orcamento` (
  `id_orcamento` int(11) NOT NULL,
  `valor` char(10) NOT NULL,
  `libera_orcamento` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_orcamento`),
  UNIQUE KEY `ID_tb_orcamento_IND` (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_orcamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_permissao`
--

CREATE TABLE IF NOT EXISTS `tb_permissao` (
  `id_permissao` int(11) NOT NULL,
  `funcionalidade` char(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_permissao`),
  UNIQUE KEY `ID_tb_permissao_IND` (`id_permissao`),
  KEY `EQU_tb_pe_tb_us_IND` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_permissao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `cor` char(10) NOT NULL,
  `material` char(50) NOT NULL,
  `preco_compra` char(10) NOT NULL,
  `preco_venda` char(10) NOT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `ID_tb_produto_IND` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_profissao`
--

CREATE TABLE IF NOT EXISTS `tb_profissao` (
  `id_profissao` int(11) NOT NULL,
  `nome` char(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_profissao`),
  UNIQUE KEY `ID_tb_profissao_IND` (`id_profissao`),
  KEY `EQU_tb_pr_tb_cl_IND` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_profissao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_produto`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_produto` (
  `id_tipo_produto` int(11) NOT NULL,
  `nome` char(50) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_produto`),
  UNIQUE KEY `ID_tb_tipo_produto_IND` (`id_tipo_produto`),
  KEY `EQU_tb_ti_tb_pr_IND` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_produto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `senha` char(10) NOT NULL,
  `email` char(20) NOT NULL,
  `telefone` char(12) NOT NULL,
  `celular` char(13) NOT NULL,
  `nome` char(50) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `ID_tb_usuario_IND` (`id_usuario`),
  KEY `EQU_tb_us_tb_fu_IND` (`id_funcionario`),
  KEY `EQU_tb_us_tb_la_IND` (`id_layout`),
  KEY `EQU_tb_us_tb_cl_IND` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
