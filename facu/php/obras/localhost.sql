-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11-Maio-2015 às 23:17
-- Versão do servidor: 5.5.41-0ubuntu1
-- PHP Version: 5.6.4-4ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tcc_obra`
--
CREATE DATABASE IF NOT EXISTS `tcc_obra` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tcc_obra`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_apartamento`
--

CREATE TABLE IF NOT EXISTS `tb_apartamento` (
`apartamento_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `descricao` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_previsao_entrega` date NOT NULL,
  `data_ultima_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `andamento` varchar(5) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_apartamento_ambiente`
--

CREATE TABLE IF NOT EXISTS `tb_apartamento_ambiente` (
`apartamento_ambiente_id` int(11) NOT NULL,
  `apartamento_id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
`cliente_id` int(11) NOT NULL,
  `ativo` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente_fisico`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_fisico` (
  `cliente_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente_juridico`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_juridico` (
  `cliente_id` int(11) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `data_fundacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_configuracoes`
--

CREATE TABLE IF NOT EXISTS `tb_configuracoes` (
`configuracao_id` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `path_logo` varchar(255) NOT NULL,
  `cor_primaria` varchar(7) NOT NULL,
  `cor_secundaria` varchar(7) NOT NULL,
  `descricao` text NOT NULL,
  `usuario_permite_editar_proprio_cadastro` int(11) NOT NULL,
  `cliente_permite_editar_proprio_cadastro` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_configuracoes`
--

INSERT INTO `tb_configuracoes` (`configuracao_id`, `empresa`, `path_logo`, `cor_primaria`, `cor_secundaria`, `descricao`, `usuario_permite_editar_proprio_cadastro`, `cliente_permite_editar_proprio_cadastro`) VALUES
(1, 'TCC OBRA 2015', 'upload/logo/logo.jpg', '#000000', '#a02c2c', '<p>Empresa Padr&atilde;o</p>\r\n', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_etapa`
--

CREATE TABLE IF NOT EXISTS `tb_etapa` (
`etapa_id` int(11) NOT NULL,
  `apartamento_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `liberar_orcamento` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
`fornecedor_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`fornecedor_id`, `nome`, `cnpj`, `telefone`, `email`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`) VALUES
(1, 'Votorantim', '06.710.372/0001-98', '(11)2324-2343', 'votorantim@fornecedor.com', '06150-512', 'Viela JosÃ© Cubas de Miranda', 'Jardim das Flores', 'Osasco', 'SP', '12'),
(2, 'Philips', '21.324.636/3714-57', '(11)2125-4361', 'teste@philips.com', '06150-500', 'Rua Doutor Armando Anjo Correa Filho', 'Jardim Paulista', 'Osasco', 'SP', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE IF NOT EXISTS `tb_funcionario` (
`funcionario_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `ativo` int(1) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`funcionario_id`, `nome`, `cpf`, `cargo`, `ativo`, `telefone`, `celular`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`) VALUES
(1, 'Lazarone Santos Santana', '701.162.245-41', 'Programador Ruby on Rails', 1, '(11)2443-2154', '(11)96042-9643', '20260-160', 'Rua Alberto de Sequeira', 'Tijuca', 'Rio de Janeiro', 'RJ', '9'),
(2, 'teste testando', '984.260.309-12', 'Testador de AplicaÃ§Ã£o', 1, '(11)4231-5436', '', '13500-110', 'Rua 12', 'ConsolaÃ§Ã£o', 'Rio Claro', 'SP', '56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orcamento`
--

CREATE TABLE IF NOT EXISTS `tb_orcamento` (
`orcamento_id` int(11) NOT NULL,
  `apartamento_id` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orcamento_item`
--

CREATE TABLE IF NOT EXISTS `tb_orcamento_item` (
`orcamento_item_id` int(11) NOT NULL,
  `orcamento_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` float NOT NULL,
  `valor_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_permissao`
--

CREATE TABLE IF NOT EXISTS `tb_permissao` (
`permissao_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_permissao`
--

INSERT INTO `tb_permissao` (`permissao_id`, `path`, `descricao`) VALUES
(1, 'adicionar_usuario', 'Permite cadastrar um usuario'),
(2, 'editar_usuario', 'Permite editar cadastro de usuario'),
(3, 'filtrar_usuario', 'Permite buscar usuarios'),
(4, 'adicionar_funcionario', 'Permite cadastrar um funcionario'),
(5, 'deletar_usuario', 'Permite deletar um usuario'),
(6, 'configuracoes', 'Permite editar as configuracoes do sistema'),
(7, 'exportar_pdf_usuario', 'Permite exportar usuario no formato .pdf'),
(8, 'exportar_xls_usuario', 'Permite exportar usuario no formato .xls'),
(9, 'filtrar_funcionario', 'Permite buscar funcionario'),
(10, 'editar_funcionario', 'Permite editar cadastro de funcionario'),
(11, 'adicionar_permissao', 'Permite dar permissao para o usuario'),
(12, 'deletar_permissao', 'Permite retirar a permissao do usuario'),
(13, 'permissao_usuario', 'Permite visualizar as permissoes do usuario'),
(14, 'exportar_pdf_funcionario', 'Permite exportar pdf de funcionario'),
(15, 'exportar_xls_funcionario', 'Permite exportar xls de funcionario'),
(16, 'list_tipo_produto', 'Permite visualizar os tipos de produtos'),
(17, 'adicionar_tipo_produto', 'Permite cadastrar tipo de produto'),
(18, 'deletar_tipo_produto', 'Permite deletar tipo de produto'),
(19, 'exportar_pdf_tipo_produto', 'Permite exportar os tipos de produtos no formato .pdf'),
(20, 'exportar_xls_tipo_produto', 'Permite exportar os tipos de produtos no formato .xls'),
(21, 'adicionar_fornecedor_produto', 'Permite cadastrar fornecedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE IF NOT EXISTS `tb_produto` (
`produto_id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  `tipo_produto_id` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `preco_compra` float NOT NULL,
  `preco_venda` float NOT NULL,
  `cor` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`produto_id`, `descricao`, `fornecedor_id`, `tipo_produto_id`, `material`, `preco_compra`, `preco_venda`, `cor`) VALUES
(1, 'Cascola', 1, 1, 'Colante', 2, 5, 'Branca'),
(2, 'Cascola 5L', 1, 1, 'Colante', 2.5, 5.3, 'Branca'),
(3, 'Teste', 1, 7, 'massa', 2.5, 5.45, 'Preta'),
(4, 'Testando', 1, 3, 'tilibra', 4.8, 10.15, 'Marron'),
(5, 'Super Cola Universal', 2, 4, 'Colante', 4.9, 6.75, 'Branca'),
(6, 'Teste 2', 2, 3, 'Ferro', 3.57, 9.5, 'Azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_produto`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_produto` (
`tipo_produto_id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_produto`
--

INSERT INTO `tb_tipo_produto` (`tipo_produto_id`, `descricao`) VALUES
(3, 'Cimento'),
(4, 'Ãreia'),
(6, 'teste'),
(7, 'testando'),
(8, 'sandisk'),
(9, 'tigre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
`usuario_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `ativo` int(1) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`usuario_id`, `nome`, `email`, `senha`, `ativo`, `telefone`, `celular`, `admin`) VALUES
(1, 'lazarone', 'lazarone@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '(11)4565-0032', '(11)96042-9643', 1),
(2, 'teste aplicacÃ£o', 'teste@usuario.com', '698dc19d489c4e4db73e28a713eab07b', 1, '(11)2321-5436', '(11)23215-4367', 0),
(3, 'lazarone', 'teste@teste.com.br', 'c33367701511b4f6020ec61ded352059', 1, '(11)2321-4515', '', 0),
(4, 'teste', 'teste21@usuario.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '(11)2126-3543', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_permissao`
--

CREATE TABLE IF NOT EXISTS `tb_usuario_permissao` (
`usuario_permissao_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
 ADD PRIMARY KEY (`apartamento_id`);

--
-- Indexes for table `tb_apartamento_ambiente`
--
ALTER TABLE `tb_apartamento_ambiente`
 ADD PRIMARY KEY (`apartamento_ambiente_id`);

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
 ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `tb_cliente_fisico`
--
ALTER TABLE `tb_cliente_fisico`
 ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `tb_cliente_juridico`
--
ALTER TABLE `tb_cliente_juridico`
 ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `tb_configuracoes`
--
ALTER TABLE `tb_configuracoes`
 ADD PRIMARY KEY (`configuracao_id`);

--
-- Indexes for table `tb_etapa`
--
ALTER TABLE `tb_etapa`
 ADD PRIMARY KEY (`etapa_id`);

--
-- Indexes for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
 ADD PRIMARY KEY (`fornecedor_id`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
 ADD PRIMARY KEY (`funcionario_id`);

--
-- Indexes for table `tb_orcamento`
--
ALTER TABLE `tb_orcamento`
 ADD PRIMARY KEY (`orcamento_id`);

--
-- Indexes for table `tb_orcamento_item`
--
ALTER TABLE `tb_orcamento_item`
 ADD PRIMARY KEY (`orcamento_item_id`);

--
-- Indexes for table `tb_permissao`
--
ALTER TABLE `tb_permissao`
 ADD PRIMARY KEY (`permissao_id`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
 ADD PRIMARY KEY (`produto_id`);

--
-- Indexes for table `tb_tipo_produto`
--
ALTER TABLE `tb_tipo_produto`
 ADD PRIMARY KEY (`tipo_produto_id`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
 ADD PRIMARY KEY (`usuario_id`);

--
-- Indexes for table `tb_usuario_permissao`
--
ALTER TABLE `tb_usuario_permissao`
 ADD PRIMARY KEY (`usuario_permissao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
MODIFY `apartamento_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_apartamento_ambiente`
--
ALTER TABLE `tb_apartamento_ambiente`
MODIFY `apartamento_ambiente_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_configuracoes`
--
ALTER TABLE `tb_configuracoes`
MODIFY `configuracao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_etapa`
--
ALTER TABLE `tb_etapa`
MODIFY `etapa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
MODIFY `funcionario_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_orcamento`
--
ALTER TABLE `tb_orcamento`
MODIFY `orcamento_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_orcamento_item`
--
ALTER TABLE `tb_orcamento_item`
MODIFY `orcamento_item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_permissao`
--
ALTER TABLE `tb_permissao`
MODIFY `permissao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_tipo_produto`
--
ALTER TABLE `tb_tipo_produto`
MODIFY `tipo_produto_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_usuario_permissao`
--
ALTER TABLE `tb_usuario_permissao`
MODIFY `usuario_permissao_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
