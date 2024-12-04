-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Jun-2023 às 20:44
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbprojalpha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_cliente` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_cliente` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_cliente` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fone_cliente` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `email_client` (`email_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `end_cliente`, `email_cliente`, `senha_cliente`, `fone_cliente`) VALUES
(1, 'Mateus', 'rua rua ', 'mateus@mateus', '1021', '12345687984');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidomb`
--

DROP TABLE IF EXISTS `pedidomb`;
CREATE TABLE IF NOT EXISTS `pedidomb` (
  `id_pedidoMB` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(50) NOT NULL,
  `endereco_cliente` varchar(50) NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `condicao_parcela` varchar(10) NOT NULL,
  `valor_parcela` decimal(8,2) NOT NULL,
  `valor_pedido` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pedidoMB`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_prod` int NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quilates_prod` decimal(8,2) NOT NULL,
  `dimensoes_prod` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_prod` decimal(8,2) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome_prod`, `quilates_prod`, `dimensoes_prod`, `preco_prod`, `img`) VALUES
(1, 'Anel de Diamante', '5.00', '1,5 cm x 1,5 cm', '50000.00', 'IMG/ANEL_DIAMANTE.png'),
(2, 'Colar de Esmeraldas', '12.00', '45 cm de comprimento', '100000.00', ''),
(3, 'Anel de Rubi', '8.00', '2 cm x 1,5 cm', '75000.00', 'IMG/ANEL_RUBI.png'),
(4, 'Colar de Perolas', '0.00', '60 cm de comprimento', '85000.00', ''),
(5, 'Anel de Safira', '6.00', '2 cm x 1,5 cm', '60000.00', 'IMG/ANEL_SAFIRA.png'),
(6, 'Colar de Diamantes', '20.00', '50 cm de comprimento', '500000.00', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
