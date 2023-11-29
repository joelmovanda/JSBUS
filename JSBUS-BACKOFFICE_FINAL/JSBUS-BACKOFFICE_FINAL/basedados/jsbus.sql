-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Ago-2022 às 18:42
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jsbus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cartaoCidadao` varchar(9) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nome_admin`, `senha`, `email`, `cartaoCidadao`, `dataNasc`) VALUES
(1, 'admin', '123', 'admin@gmail.com', '123999555', '1998-07-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autocarro`
--

CREATE TABLE `autocarro` (
  `id_autocarro` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `lotacao` int(11) NOT NULL,
  `dataReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autocarro`
--

INSERT INTO `autocarro` (`id_autocarro`, `modelo`, `matricula`, `numero`, `lotacao`, `dataReg`) VALUES
(1, 'Hyunday', 'eu123fh', 1, 20, '2022-08-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `avaliacao`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_horario`
--

CREATE TABLE `avaliacao_horario` (
  `id_avaliacao` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacao_horario`
--

INSERT INTO `avaliacao_horario` (`id_avaliacao`, `id_horario`) VALUES
(1, 1),
(3, 1),
(4, 1),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `descricao_horario` varchar(30) NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `id_rota` int(11) NOT NULL,
  `id_autocarro` int(11) NOT NULL,
  `tempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id_horario`, `descricao_horario`, `id_motorista`, `id_rota`, `id_autocarro`, `tempo`) VALUES
(1, 'linha azul manha (ida)', 1, 1, 1, '06:15:00'),
(2, 'linha azul manha (volta)', 1, 2, 1, '06:45:00'),
(3, 'linha vermelha manha(ida)', 1, 3, 1, '08:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `incidente`
--

CREATE TABLE `incidente` (
  `id_incidente` int(11) NOT NULL,
  `descricao_incidente` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `incidente`
--

INSERT INTO `incidente` (`id_incidente`, `descricao_incidente`) VALUES
(1, 'Problemas com motor'),
(2, 'Pneu Furado'),
(3, 'Problemas electricos'),
(4, 'Obras na estrada'),
(5, 'Acidente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id_motorista` int(11) NOT NULL,
  `nome_motorista` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cartaoCidadao` varchar(9) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id_motorista`, `nome_motorista`, `email`, `senha`, `cartaoCidadao`, `dataNasc`) VALUES
(1, 'Manuel alves', 'manuel@gmail.com', '123', '000222999', '1989-07-09'),
(2, 'Silva Gomes', 'silva@gmail.com', '123', '111666777', '1982-03-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `descricao_notificacao` varchar(300) NOT NULL,
  `dataNot` datetime NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`id_notificacao`, `descricao_notificacao`, `dataNot`, `id_horario`) VALUES
(8, 'Pneu Furado', '2022-08-11 12:38:03', 1),
(9, 'Problemas electricos', '2022-08-11 12:43:01', 1),
(10, 'Problemas com motor', '2022-08-22 15:32:30', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paragem`
--

CREATE TABLE `paragem` (
  `id_paragem` int(11) NOT NULL,
  `descricao_paragem` varchar(50) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paragem`
--

INSERT INTO `paragem` (`id_paragem`, `descricao_paragem`, `latitude`, `longitude`) VALUES
(1, 'sr de mercoles', 39.8194, -7.4509),
(2, 'escola agraria', 39.8215, -7.46127),
(3, 'avenida brasil', 39.821, -7.47965),
(4, 'avenida general humberto delgado', 39.8248, -7.48797),
(5, 'alameda da liberdade', 39.8242, -7.49198);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passageiro`
--

CREATE TABLE `passageiro` (
  `id_passageiro` int(11) NOT NULL,
  `nome_passageiro` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cartaoCidadao` varchar(9) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `passageiro`
--

INSERT INTO `passageiro` (`id_passageiro`, `nome_passageiro`, `email`, `senha`, `cartaoCidadao`, `dataNasc`) VALUES
(1, 'Maria Vanda', 'm@gmail.com', '123', '123000888', '1980-03-25'),
(2, 'pedro nogueira', 'p@gmail.com', '123', '321456789', '2002-07-09'),
(7, 'Felipe Muabi Vanda', 'felipe@gmail.com', '123', '111000222', '1980-08-10'),
(9, 'hegel', 'hegel@gmail.com ', '123', '111222333', '2000-12-12'),
(11, '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE `rota` (
  `id_rota` int(11) NOT NULL,
  `descricao_rota` varchar(50) NOT NULL,
  `cor` varchar(10) NOT NULL,
  `sentido` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rota`
--

INSERT INTO `rota` (`id_rota`, `descricao_rota`, `cor`, `sentido`) VALUES
(1, 'linha azul manha(ida)', 'blue', 'ida'),
(2, 'linha azul manha(volta)', 'blue', 'volta'),
(3, 'linha vermelha manha(ida)', 'red', 'ida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota_paragem`
--

CREATE TABLE `rota_paragem` (
  `id_rota` int(11) NOT NULL,
  `id_paragem` int(11) NOT NULL,
  `ordemParagem` int(11) NOT NULL,
  `offset` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rota_paragem`
--

INSERT INTO `rota_paragem` (`id_rota`, `id_paragem`, `ordemParagem`, `offset`) VALUES
(1, 2, 2, '00:05:00'),
(1, 3, 3, '00:10:00'),
(1, 4, 4, '00:20:00'),
(1, 5, 5, '00:30:00'),
(2, 1, 5, '00:00:00'),
(2, 2, 4, '00:10:00'),
(2, 3, 3, '00:20:00'),
(2, 4, 2, '00:30:00'),
(2, 5, 1, '00:40:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `autocarro`
--
ALTER TABLE `autocarro`
  ADD PRIMARY KEY (`id_autocarro`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Índices para tabela `avaliacao_horario`
--
ALTER TABLE `avaliacao_horario`
  ADD PRIMARY KEY (`id_avaliacao`,`id_horario`),
  ADD KEY `horario_classificacao_horario` (`id_horario`);

--
-- Índices para tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_autocarro` (`id_autocarro`),
  ADD KEY `id_motorista` (`id_motorista`),
  ADD KEY `id_rota` (`id_rota`);

--
-- Índices para tabela `incidente`
--
ALTER TABLE `incidente`
  ADD PRIMARY KEY (`id_incidente`);

--
-- Índices para tabela `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id_motorista`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Índices para tabela `paragem`
--
ALTER TABLE `paragem`
  ADD PRIMARY KEY (`id_paragem`);

--
-- Índices para tabela `passageiro`
--
ALTER TABLE `passageiro`
  ADD PRIMARY KEY (`id_passageiro`);

--
-- Índices para tabela `rota`
--
ALTER TABLE `rota`
  ADD PRIMARY KEY (`id_rota`);

--
-- Índices para tabela `rota_paragem`
--
ALTER TABLE `rota_paragem`
  ADD PRIMARY KEY (`id_rota`,`id_paragem`),
  ADD KEY `rota_paragem_paragem` (`id_paragem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `autocarro`
--
ALTER TABLE `autocarro`
  MODIFY `id_autocarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `avaliacao_horario`
--
ALTER TABLE `avaliacao_horario`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `incidente`
--
ALTER TABLE `incidente`
  MODIFY `id_incidente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `paragem`
--
ALTER TABLE `paragem`
  MODIFY `id_paragem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `passageiro`
--
ALTER TABLE `passageiro`
  MODIFY `id_passageiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `rota`
--
ALTER TABLE `rota`
  MODIFY `id_rota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao_horario`
--
ALTER TABLE `avaliacao_horario`
  ADD CONSTRAINT `classificacao_classificacao_horario` FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacao` (`id_avaliacao`),
  ADD CONSTRAINT `horario_classificacao_horario` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`);

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_autocarro`) REFERENCES `autocarro` (`id_autocarro`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_motorista`) REFERENCES `motorista` (`id_motorista`),
  ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`id_rota`) REFERENCES `rota` (`id_rota`);

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`);

--
-- Limitadores para a tabela `rota_paragem`
--
ALTER TABLE `rota_paragem`
  ADD CONSTRAINT `rota_paragem_paragem` FOREIGN KEY (`id_paragem`) REFERENCES `paragem` (`id_paragem`),
  ADD CONSTRAINT `rota_paragem_rota` FOREIGN KEY (`id_rota`) REFERENCES `rota` (`id_rota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
