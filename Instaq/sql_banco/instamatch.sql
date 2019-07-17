-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jul-2019 às 08:11
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `instamatch`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios_imgs`
--

CREATE TABLE `comentarios_imgs` (
  `id_img` int(11) NOT NULL,
  `id_user_comentario` int(11) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `dt_comentario` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `img_desc` varchar(200) DEFAULT NULL,
  `img_local` varchar(50) DEFAULT NULL,
  `dt_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_user`, `id_img`, `img_path`, `img_desc`, `img_local`, `dt_post`) VALUES
(8, 1, '../users/ramon/uploads/15633410045d2eb0ccd0812.jpg', 'foto legal que tirei do zap', 'localiza ai menÃ³', '2019-07-17 02:23:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(8, 'Ramon Garcia', 'ramon.g.camargo42@gmail.com', 'ramon', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios_imgs`
--
ALTER TABLE `comentarios_imgs`
  ADD PRIMARY KEY (`id_img`,`id_user_comentario`),
  ADD UNIQUE KEY `id_img` (`id_img`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_user`,`id_img`),
  ADD UNIQUE KEY `id_img` (`id_img`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
