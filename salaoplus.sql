-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 12-Jun-2019 às 03:33
-- Versão do servidor: 5.7.20
-- PHP Version: 7.1.13

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

CREATE TABLE `agendamento` (
  `codAgendamento` int(11) NOT NULL,
  `horaAgendamento` time DEFAULT NULL,
  `dataAgendamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`codAgendamento`, `horaAgendamento`, `dataAgendamento`) VALUES
(3, '08:00:00', '2019-06-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dataNascimento` date NOT NULL,
  `contato` varchar(15) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codCliente`, `cpf`, `nome`, `dataNascimento`, `contato`, `cidade`, `bairro`, `logradouro`, `email`, `senha`) VALUES
(1, '064', 'Rafael Lima', '1998-02-14', '988404291', 'aquiraz', 'alto alegre', 'rua dos coqueiros', 'rafael@gmail.com', '123456'),
(2, '064.666.623-14', 'Rafael Lima Barros', '1998-02-14', '85996153959', 'Aquiraz', 'Alto Alegre', 'Rua dos coqueiros, 182', 'rafael.redes38@gmail.com', '123456'),
(3, '000.052.064-12', 'Jose Alves de Sousa', '2019-06-13', '32600450', 'Aquiraz', 'Gruta', 'santa efigenia', 'jose@gmail.com', '123456'),
(4, '056', 'jardriel', '1997-10-08', '99999999', 'aquiraz', 'gruta', 'rua francisca faustino de c', 'root@123', 'qwe123'),
(5, '06666487609', 'Rafael Lima', '1998-02-14', '85988765432', 'aquiraz', 'alto alegre', 'rua 123', 'rafa@gmail.com', '123456'),
(6, '05520070081', 'AURICELIO', '2019-06-10', '986405654', 'aquiraz', 'alto alegre', '123456', 'auricelio.redes2@gmail.com', '123456'),
(7, '999999', 'jardri sousa', '1997-08-10', '985528894', 'aquiraz', 'centro', 'rua a ', 'jardri@07', 'qwe123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clienteagendamento`
--

CREATE TABLE `clienteagendamento` (
  `codClienteAgendamento` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `codSalao` int(11) NOT NULL,
  `codSalaoServico_fk` int(11) NOT NULL,
  `codSalaoFuncionamento_fk` int(11) NOT NULL,
  `codSalaoFormaPagamento_fk` int(11) NOT NULL,
  `dataAgendamento` date DEFAULT NULL,
  `horaAgendamento` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clienteagendamento`
--

INSERT INTO `clienteagendamento` (`codClienteAgendamento`, `codCliente`, `codSalao`, `codSalaoServico_fk`, `codSalaoFuncionamento_fk`, `codSalaoFormaPagamento_fk`, `dataAgendamento`, `horaAgendamento`) VALUES
(1, 2, 1, 1, 1, 1, NULL, NULL),
(2, 2, 1, 2, 1, 2, NULL, NULL),
(4, 4, 1, 1, 1, 1, '2019-06-11', '10:00:00'),
(5, 4, 1, 1, 1, 1, '2019-06-10', '09:00:00'),
(9, 4, 1, 1, 1, 1, '2019-06-10', '10:00:00'),
(45, 7, 3, 1, 1, 1, '1997-01-10', '08:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formadepagamento`
--

CREATE TABLE `formadepagamento` (
  `codPagamento` int(11) NOT NULL,
  `descricaoPagamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formadepagamento`
--

INSERT INTO `formadepagamento` (`codPagamento`, `descricaoPagamento`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão de Crédito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionamento`
--

CREATE TABLE `funcionamento` (
  `codFuncionamento` int(11) NOT NULL,
  `descricaoFuncionamento` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionamento`
--

INSERT INTO `funcionamento` (`codFuncionamento`, `descricaoFuncionamento`) VALUES
(1, 'Segunda a Sexta, 08:00 as 17:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salao`
--

CREATE TABLE `salao` (
  `codSalao` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nomeResponsavel` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `nomeSalao` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `contato` varchar(15) NOT NULL,
  `codSalaoServico_fk` int(11) NOT NULL,
  `codSalaofuncionamento_fk` int(11) NOT NULL,
  `codSalaoFormaPagamento_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salao`
--

INSERT INTO `salao` (`codSalao`, `email`, `senha`, `nomeResponsavel`, `cnpj`, `nomeSalao`, `cidade`, `bairro`, `logradouro`, `contato`, `codSalaoServico_fk`, `codSalaofuncionamento_fk`, `codSalaoFormaPagamento_fk`) VALUES
(1, '', '', 'Evando Alencar', '06.099.370/0001-04', 'Infolink', 'Eusebio', 'Centro', 'Rua Santa Adelia', '32600450', 1, 1, 1),
(2, 'loira@gmail.com', '123456', 'Edivania Sousa', '000.000.000/0001-01', 'Salão da Loira', 'Aquiraz', 'Centro', 'Rua Virgilio Coelho', '3260-7852', 1, 1, 2),
(3, 'estilo@beleza', '123456', 'estilo', '098765432', 'estilo', 'Aquiraz', 'centro', 'rua b', '997654321', 4, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salaoagendamento`
--

CREATE TABLE `salaoagendamento` (
  `codSalaoAgendamento` int(11) NOT NULL,
  `codSalao` int(11) NOT NULL,
  `codAgendamento` int(11) NOT NULL,
  `codCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salao forma de pagamento`
--

CREATE TABLE `salao forma de pagamento` (
  `codSalaoFormaPagamento` int(11) NOT NULL,
  `codSalao_fk` int(11) NOT NULL,
  `codPagamento_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `salao funcionamento` (
  `codSalaoFuncionamento` int(11) NOT NULL,
  `codSalao_fk` int(11) NOT NULL,
  `codFuncionamento_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salao funcionamento`
--

INSERT INTO `salao funcionamento` (`codSalaoFuncionamento`, `codSalao_fk`, `codFuncionamento_fk`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salaoservico`
--

CREATE TABLE `salaoservico` (
  `codSalaoServico` int(11) NOT NULL,
  `codSalao_fk` int(11) NOT NULL,
  `codServico_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salaoservico`
--

INSERT INTO `salaoservico` (`codSalaoServico`, `codSalao_fk`, `codServico_fk`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `codServico` int(11) NOT NULL,
  `descricaoServico` varchar(100) NOT NULL,
  `precoServico` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`codServico`, `descricaoServico`, `precoServico`) VALUES
(1, 'Corte masculino', 20),
(2, 'Barba', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`codAgendamento`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`),
  ADD UNIQUE KEY `CPF` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `clienteagendamento`
--
ALTER TABLE `clienteagendamento`
  ADD PRIMARY KEY (`codClienteAgendamento`),
  ADD KEY `codCliente` (`codCliente`),
  ADD KEY `codSalao` (`codSalao`),
  ADD KEY `codSalaoServico_fk` (`codSalaoServico_fk`),
  ADD KEY `codSalaoFuncionamento_fk` (`codSalaoFuncionamento_fk`),
  ADD KEY `codSalaoFormaPagamento_fk` (`codSalaoFormaPagamento_fk`);

--
-- Indexes for table `formadepagamento`
--
ALTER TABLE `formadepagamento`
  ADD PRIMARY KEY (`codPagamento`);

--
-- Indexes for table `funcionamento`
--
ALTER TABLE `funcionamento`
  ADD PRIMARY KEY (`codFuncionamento`);

--
-- Indexes for table `salao`
--
ALTER TABLE `salao`
  ADD PRIMARY KEY (`codSalao`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `codSalaoServico_fk` (`codSalaoServico_fk`),
  ADD KEY `codSalaofuncionamento_fk` (`codSalaofuncionamento_fk`),
  ADD KEY `codSalaoFormaPagamento_fk` (`codSalaoFormaPagamento_fk`);

--
-- Indexes for table `salaoagendamento`
--
ALTER TABLE `salaoagendamento`
  ADD PRIMARY KEY (`codSalaoAgendamento`),
  ADD KEY `codSalao` (`codSalao`),
  ADD KEY `codAgendamento` (`codAgendamento`);

--
-- Indexes for table `salao forma de pagamento`
--
ALTER TABLE `salao forma de pagamento`
  ADD PRIMARY KEY (`codSalaoFormaPagamento`),
  ADD KEY `codSalao_fk` (`codSalao_fk`),
  ADD KEY `codPagamento_fk` (`codPagamento_fk`);

--
-- Indexes for table `salao funcionamento`
--
ALTER TABLE `salao funcionamento`
  ADD PRIMARY KEY (`codSalaoFuncionamento`),
  ADD KEY `codSalao_fk` (`codSalao_fk`),
  ADD KEY `codFuncionamento_fk` (`codFuncionamento_fk`);

--
-- Indexes for table `salaoservico`
--
ALTER TABLE `salaoservico`
  ADD PRIMARY KEY (`codSalaoServico`),
  ADD KEY `codSalao_fk` (`codSalao_fk`),
  ADD KEY `codServico_fk` (`codServico_fk`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`codServico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `codAgendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clienteagendamento`
--
ALTER TABLE `clienteagendamento`
  MODIFY `codClienteAgendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `formadepagamento`
--
ALTER TABLE `formadepagamento`
  MODIFY `codPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `funcionamento`
--
ALTER TABLE `funcionamento`
  MODIFY `codFuncionamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salao`
--
ALTER TABLE `salao`
  MODIFY `codSalao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaoagendamento`
--
ALTER TABLE `salaoagendamento`
  MODIFY `codSalaoAgendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salao forma de pagamento`
--
ALTER TABLE `salao forma de pagamento`
  MODIFY `codSalaoFormaPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salao funcionamento`
--
ALTER TABLE `salao funcionamento`
  MODIFY `codSalaoFuncionamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salaoservico`
--
ALTER TABLE `salaoservico`
  MODIFY `codSalaoServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clienteagendamento`
--
ALTER TABLE `clienteagendamento`
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
-- Limitadores para a tabela `salaoagendamento`
--
ALTER TABLE `salaoagendamento`
  ADD CONSTRAINT `codAgendamento+fk` FOREIGN KEY (`codAgendamento`) REFERENCES `agendamento` (`codAgendamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codSalao_fk` FOREIGN KEY (`codSalao`) REFERENCES `salao` (`codSalao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `salao forma de pagamento`
--
ALTER TABLE `salao forma de pagamento`
  ADD CONSTRAINT `codPagamento` FOREIGN KEY (`codPagamento_fk`) REFERENCES `formadepagamento` (`codPagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
