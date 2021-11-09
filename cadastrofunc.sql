-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2021 às 21:09
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastrofunc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionalidades`
--

CREATE TABLE `funcionalidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `descricao` text NOT NULL,
  `criacao` date NOT NULL,
  `votacao` enum('S','N') NOT NULL,
  `desenvolvimento` enum('S','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionalidades`
--

INSERT INTO `funcionalidades` (`id`, `nome`, `descricao`, `criacao`, `votacao`, `desenvolvimento`) VALUES
(15, 'Funcionalidade1', 'Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1, Descrição sobre a funcionalidade 1,', '2021-11-09', 'S', 'N'),
(16, 'Funcionalidade 2', 'nnnnnn', '2021-11-10', 'S', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rating_info`
--

CREATE TABLE `rating_info` (
  `func_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rating_info`
--

INSERT INTO `rating_info` (`func_id`, `user_id`, `rating_action`) VALUES
(1, 0, 'dislike');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionalidades`
--
ALTER TABLE `funcionalidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `func_id` (`func_id`,`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionalidades`
--
ALTER TABLE `funcionalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
