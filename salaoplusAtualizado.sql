-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 30-Maio-2019 às 14:21
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salaoplus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `codAgendamento` int(11) NOT NULL AUTO_INCREMENT,
  `codCliente` int(11) NOT NULL,
  `codSalao` int(11) NOT NULL,
  `codSalaoServico_fk` int(11) NOT NULL,
  `codSalaoFuncionamento_fk` int(11) NOT NULL,
  `codSalaoFormaPagamento_fk` int(11) NOT NULL,
  PRIMARY KEY (`codAgendamento`),
  KEY `codCliente` (`codCliente`),
  KEY `codSalao` (`codSalao`),
  KEY `codSalaoServico_fk` (`codSalaoServico_fk`),
  KEY `codSalaoFuncionamento_fk` (`codSalaoFuncionamento_fk`),
  KEY `codSalaoFormaPagamento_fk` (`codSalaoFormaPagamento_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`codAgendamento`, `codCliente`, `codSalao`, `codSalaoServico_fk`, `codSalaoFuncionamento_fk`, `codSalaoFormaPagamento_fk`) VALUES
(1, 2, 1, 1, 1, 1),
(2, 2, 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `codCliente` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dataNascimento` date NOT NULL,
  `contato` varchar(15) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  PRIMARY KEY (`codCliente`),
  UNIQUE KEY `CPF` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codCliente`, `cpf`, `nome`, `dataNascimento`, `contato`, `cidade`, `bairro`, `logradouro`, `email`, `senha`) VALUES
(1, '064', 'Rafael Lima', '1998-02-14', '988404291', 'aquiraz', 'alto alegre', 'rua dos coqueiros', 'rafael@gmail.com', '123456'),
(2, '064.666.623-14', 'Rafael Lima Barros', '1998-02-14', '85996153959', 'Aquiraz', 'Alto Alegre', 'Rua dos coqueiros, 182', 'rafael.redes38@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma  de pagamento`
--

DROP TABLE IF EXISTS `forma  de pagamento`;
CREATE TABLE IF NOT EXISTS `forma  de pagamento` (
  `codPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoPagamento` varchar(50) NOT NULL,
  PRIMARY KEY (`codPagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forma  de pagamento`
--

INSERT INTO `forma  de pagamento` (`codPagamento`, `descricaoPagamento`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão de Crédito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionamento`
--

DROP TABLE IF EXISTS `funcionamento`;
CREATE TABLE IF NOT EXISTS `funcionamento` (
  `codFuncionamento` int(11) NOT NULL AUTO_INCREMENT,
  `diasFuncionamento` date NOT NULL,
  `horarioAbertura` time NOT NULL,
  `horarioEncerramento` time NOT NULL,
  PRIMARY KEY (`codFuncionamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionamento`
--

INSERT INTO `funcionamento` (`codFuncionamento`, `diasFuncionamento`, `horarioAbertura`, `horarioEncerramento`) VALUES
(1, '2019-05-05', '08:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salao`
--

DROP TABLE IF EXISTS `salao`;
CREATE TABLE IF NOT EXISTS `salao` (
  `codSalao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeResponsavel` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `nomeSalao` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `contato` varchar(15) NOT NULL,
  `codSalaoServico_fk` int(11) NOT NULL,
  `codSalaofuncionamento_fk` int(11) NOT NULL,
  `codSalaoFormaPagamento_fk` int(11) NOT NULL,
  PRIMARY KEY (`codSalao`),
  UNIQUE KEY `cnpj` (`cnpj`),
  KEY `codSalaoServico_fk` (`codSalaoServico_fk`),
  KEY `codSalaofuncionamento_fk` (`codSalaofuncionamento_fk`),
  KEY `codSalaoFormaPagamento_fk` (`codSalaoFormaPagamento_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salao`
--

INSERT INTO `salao` (`codSalao`, `nomeResponsavel`, `cnpj`, `nomeSalao`, `cidade`, `bairro`, `logradouro`, `contato`, `codSalaoServico_fk`, `codSalaofuncionamento_fk`, `codSalaoFormaPagamento_fk`) VALUES
(1, 'Evando Alencar', '06.099.370/0001-04', 'Infolink', 'Eusebio', 'Centro', 'Rua Santa Adelia', '32600450', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salao forma de pagamento`
--

DROP TABLE IF EXISTS `salao forma de pagamento`;
CREATE TABLE IF NOT EXISTS `salao forma de pagamento` (
  `codSalaoFormaPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `codSalao_fk` int(11) NOT NULL,
  `codPagamento_fk` int(11) NOT NULL,
  PRIMARY KEY (`codSalaoFormaPagamento`),
  KEY `codSalao_fk` (`codSalao_fk`),
  KEY `codPagamento_fk` (`codPagamento_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salao forma de pagamento`
--

INSERT INTO `salao forma de pagamento` (`codSalaoFormaPagamento`, `codSalao_fk`, `codPagamento_fk`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salao funcionamento`
--

DROP TABLE IF EXISTS `salao funcionamento`;
CREATE TABLE IF NOT EXISTS `salao funcionamento` (
  `codSalaoFuncionamento` int(11) NOT NULL AUTO_INCREMENT,
  `codSalao_fk` int(11) NOT NULL,
  `codFuncionamento_fk` int(11) NOT NULL,
  PRIMARY KEY (`codSalaoFuncionamento`),
  KEY `codSalao_fk` (`codSalao_fk`),
  KEY `codFuncionamento_fk` (`codFuncionamento_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salao funcionamento`
--

INSERT INTO `salao funcionamento` (`codSalaoFuncionamento`, `codSalao_fk`, `codFuncionamento_fk`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salaoservico`
--

DROP TABLE IF EXISTS `salaoservico`;
CREATE TABLE IF NOT EXISTS `salaoservico` (
  `codSalaoServico` int(11) NOT NULL AUTO_INCREMENT,
  `codSalao_fk` int(11) NOT NULL,
  `codServico_fk` int(11) NOT NULL,
  PRIMARY KEY (`codSalaoServico`),
  KEY `codSalao_fk` (`codSalao_fk`),
  KEY `codServico_fk` (`codServico_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salaoservico`
--

INSERT INTO `salaoservico` (`codSalaoServico`, `codSalao_fk`, `codServico_fk`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `codServico` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoServico` varchar(100) NOT NULL,
  `precoServico` float NOT NULL,
  PRIMARY KEY (`codServico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`codServico`, `descricaoServico`, `precoServico`) VALUES
(1, 'Corte masculino', 20),
(2, 'Barba', 10);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `CodSalaoServicoAgendamento` FOREIGN KEY (`codSalaoServico_fk`) REFERENCES `salaoservico` (`codSalaoServico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codSalaoFuncionamentoAgendamento` FOREIGN KEY (`codSalaoFuncionamento_fk`) REFERENCES `salao funcionamento` (`codSalaoFuncionamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cosSalaoFormaPagamentoAgendamento` FOREIGN KEY (`codSalaoFormaPagamento_fk`) REFERENCES `salao forma de pagamento` (`codSalaoFormaPagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rel_cliente_agendamento` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rel_salao_agendamento` FOREIGN KEY (`codSalao`) REFERENCES `salao` (`codSalao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `salao`
--
ALTER TABLE `salao`
  ADD CONSTRAINT `codSalaoFormaPagamento` FOREIGN KEY (`codSalaoFormaPagamento_fk`) REFERENCES `salao forma de pagamento` (`codSalaoFormaPagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codSalaoFuncionamento_fk` FOREIGN KEY (`codSalaofuncionamento_fk`) REFERENCES `salao funcionamento` (`codSalaoFuncionamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codSalaoServico` FOREIGN KEY (`codSalaoServico_fk`) REFERENCES `salaoservico` (`codSalaoServico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `salao forma de pagamento`
--
ALTER TABLE `salao forma de pagamento`
  ADD CONSTRAINT `codPagamento` FOREIGN KEY (`codPagamento_fk`) REFERENCES `forma  de pagamento` (`codPagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codSalaoPaga` FOREIGN KEY (`codSalao_fk`) REFERENCES `salao` (`codSalao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `salao funcionamento`
--
ALTER TABLE `salao funcionamento`
  ADD CONSTRAINT `codFuncionamento` FOREIGN KEY (`codFuncionamento_fk`) REFERENCES `funcionamento` (`codFuncionamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codSalaoFunc` FOREIGN KEY (`codSalao_fk`) REFERENCES `salao` (`codSalao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `salaoservico`
--
ALTER TABLE `salaoservico`
  ADD CONSTRAINT `codSalao` FOREIGN KEY (`codSalao_fk`) REFERENCES `salao` (`codSalao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codServico` FOREIGN KEY (`codServico_fk`) REFERENCES `servico` (`codServico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
