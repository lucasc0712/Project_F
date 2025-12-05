-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03/12/2025 às 04:01
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `supraforce`
--
-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_produto` int NOT NULL,
  `quantidade` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_carrinho_usuario` (`id_usuario`),
  KEY `fk_carrinho_produto` (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `inativo` tinyint(1) DEFAULT '0',
  `marca` varchar(50) DEFAULT NULL,
  `url_foto` varchar(200) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `descricao`, `valor`, `inativo`, `marca`, `url_foto`, `estoque`) VALUES
(29, 'Creatina 250g', 50.00, 0, 'Growth', 'creatina1.png', 10),
(30, 'Magnésio 300mg', 75.00, 0, 'OficialFarma', 'magnesio1.png', 1),
(31, 'Pré-treino', 125.00, 0, 'Haze', 'pretreino1.png', 15),
(32, 'Whey 80% Baunilha', 180.00, 0, 'Growth', 'whey1.png', 22),
(33, 'Whey 80% Chocolate', 180.00, 0, 'Growth', 'whey2.png', 5),
(34, 'Whey Kit', 350.00, 0, 'Max Titanium', 'wheypro1.png', 18),
(35, 'Whey 100%', 300.00, 0, 'Integral Médica', 'wheypure.png', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `token`) VALUES
(1, 'lucas', '123', '865944acebd3d4063ae1e1b908973531'),
(2, 'felipe', '123', '0aa759527642aa380123cd5be437ec2e'),
(3, 'jheyck', '123', 'b567b44fff3aa7f8452fc96894b75311'),
(4, 'michel', '123', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
