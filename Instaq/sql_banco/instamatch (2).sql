-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Ago-2019 às 01:34
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instamatch`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios_imgs`
--

CREATE TABLE `comentarios_imgs` (
  `id_img` int(11) NOT NULL,
  `id_user_comentario` int(11) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `dt_comentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios_imgs`
--

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
  `dt_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `id_user` int(11) NOT NULL,
  `id_user_segue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seguidores`
--


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


-- --------------------------------------------------------

--
-- Stand-in structure for view `v_postagens`
-- (See below for the actual view)
--
CREATE TABLE `v_postagens` (
`id_user_segue` int(11)
,`id_user` int(11)
,`id_img` int(11)
,`img_path` varchar(100)
,`img_desc` varchar(200)
,`img_local` varchar(50)
,`dt_post` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_postagens`
--
DROP TABLE IF EXISTS `v_postagens`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_postagens`  AS  select `s`.`id_user_segue` AS `id_user_segue`,`s`.`id_user` AS `id_user`,`i`.`id_img` AS `id_img`,`i`.`img_path` AS `img_path`,`i`.`img_desc` AS `img_desc`,`i`.`img_local` AS `img_local`,`i`.`dt_post` AS `dt_post` from (`seguidores` `s` left join `imagens` `i` on((`s`.`id_user_segue` = `i`.`id_user`))) order by `i`.`dt_post` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_user`,`id_img`),
  ADD UNIQUE KEY `id_img` (`id_img`);

--
-- Indexes for table `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id_user`,`id_user_segue`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `fk_foreign_key_id_user` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
