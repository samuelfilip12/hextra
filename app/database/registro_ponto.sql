-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2023 às 18:06
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_ponto`
--

CREATE TABLE `registro_ponto` (
  `idPonto` int(11) NOT NULL,
  `data` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `inicioIntervalo` time NOT NULL,
  `fimIntervalo` time NOT NULL,
  `horaSaida` time NOT NULL,
  `horasTrabalhadas` time NOT NULL,
  `horasExtras` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registro_ponto`
--

INSERT INTO `registro_ponto` (`idPonto`, `data`, `horaEntrada`, `inicioIntervalo`, `fimIntervalo`, `horaSaida`, `horasTrabalhadas`, `horasExtras`) VALUES
(1, '2023-10-02', '12:00:00', '00:00:00', '00:00:00', '19:00:00', '00:00:07', '-00:00:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registro_ponto`
--
ALTER TABLE `registro_ponto`
  ADD PRIMARY KEY (`idPonto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registro_ponto`
--
ALTER TABLE `registro_ponto`
  MODIFY `idPonto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
