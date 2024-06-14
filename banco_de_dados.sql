-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Set-2021 às 16:55
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_basico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`) VALUES
(1, 'Fabio da Silva', 'fabio@codeigniter.com.br'),
(2, 'Pedro da Silva', 'pedro@dasilva.com'),
(3, 'Jose', 'jose@email.com'),
(5, 'Felipe', 'felipe@email.com'),
(6, 'Gabriel Borges da Silva', 'gabriel@email.com'),
(7, 'Luciana da Silva', 'luciana@email.com'),
(9, 'Joaquim', 'joaquim@email.com'),
(11, 'Joaquim', 'joaquim@email.com'),
(12, 'Carlos da Silva', 'carlos@dasilva.com'),
(13, 'Abc Cliente', 'abc@email.com'),
(14, 'Carlos Araújo', 'carlos@email.com'),
(15, 'José Mané', 'jose@mane.com'),
(16, 'Cliente Novo', 'cliente@email.com'),
(17, 'Cliente 2', 'cliente2@uol.com.br'),
(18, 'Maria da Silva', 'maria@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `id` int(11) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `clientes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`id`, `telefone`, `clientes_id`) VALUES
(2, '41123456789', 1),
(3, '97987987964', 1),
(4, '776566', 1),
(13, '88797897899', 1),
(14, '33333333', 13),
(15, '654987654', 15),
(16, '6597894', 15),
(17, '3213213', 15),
(18, '999888777', 15),
(19, '99884455678', 12),
(20, '55556666111', 16),
(21, '78978946789', 16),
(22, '123456789', 17),
(23, '98765431', 17),
(24, '56456498', 17);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_id` (`clientes_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `telefones`
--
ALTER TABLE `telefones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `telefones_ibfk_1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
