-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Ago-2019 às 19:44
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
  `comentario` varchar(200) NOT NULL,
  `dt_comentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios_imgs`
--

INSERT INTO `comentarios_imgs` (`id_img`, `id_user_comentario`, `comentario`, `dt_comentario`) VALUES
(2, 3, 'opa bacana', '2019-08-26 03:40:09'),
(5, 1, 'teste2', '2019-08-30 03:29:59'),
(5, 1, 'vo quebra o sistema xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2019-08-28 04:59:27'),
(8, 1, 'bacanÃ£o bro', '2019-08-28 04:56:40'),
(10, 1, '<?php die;?>', '2019-08-28 05:03:23'),
(10, 1, 'teste', '2019-08-30 03:27:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curtidas`
--

INSERT INTO `curtidas` (`id_user`, `id_img`) VALUES
(1, 5),
(1, 11),
(3, 5),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12);

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

INSERT INTO `imagens` (`id_user`, `id_img`, `img_path`, `img_desc`, `img_local`, `dt_post`) VALUES
(1, 1, '../users/ramon42/uploads/15662914375d5bb5ed48838.png', 'Foto teste', 'Algum lugar', '2019-08-20 05:57:18'),
(1, 2, '../users/ramon42/uploads/15668004645d637a50553d3.png', ' ', 'nÃ£o identificado', '2019-08-26 03:21:05'),
(1, 5, '../users/ramon42/uploads/15668954285d64ed441629c.png', ' ', 'nÃ£o identificado', '2019-08-27 05:43:48'),
(1, 8, '../users/ramon42/uploads/15668955865d64ede2002a3.png', ' ', 'nÃ£o identificado', '2019-08-27 05:46:26'),
(1, 9, '../users/ramon42/uploads/15668966975d64f239b929c.png', ' ', 'nÃ£o identificado', '2019-08-27 06:05:07'),
(1, 10, '../users/ramon42/uploads/15669782245d6630b089d20.jpg', ' ', 'nÃ£o identificado', '2019-08-28 04:43:50'),
(1, 11, '../users/ramon42/uploads/15671505615d68d1e1c5e23.jpg', ' ', 'nÃ£o identificado', '2019-08-30 04:36:39'),
(3, 12, '../users/keth123/uploads/15671841735d69552d669d4.gif', ' ', 'nÃ£o identificado', '2019-08-30 13:56:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(50) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `img_perfil` varchar(200) NOT NULL,
  `dt_att` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `bio`, `img_perfil`, `dt_att`) VALUES
(1, 'Este Ã© um perfil teste criado obviamente para testar as coisas (ora ora) mais um teste ai, agora foi eu acho. OI DELLA', '../users/ramon42/img_perfil/15670259865d66eb4260fd7.jpg', '2019-08-28 01:11:44'),
(2, 'Conte mais sobre você!', '../images/profile_icon.png', '2019-08-28 17:34:51'),
(3, 'Teste de Bio Keth', '../images/profile_icon.png', '2019-08-28 03:24:02'),
(4, 'Conte mais sobre você!', '../images/profile_icon.png', '2019-08-28 17:34:51'),
(6, 'Conte mais sobre você!', '../images/profile_icon.png', '2019-08-28 17:34:51'),
(7, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '../users/aaa1234/img_perfil/15669654265d65feb289f20.jpg', '2019-08-28 01:11:44');

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

INSERT INTO `seguidores` (`id_user`, `id_user_segue`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 1),
(3, 3),
(4, 4),
(6, 1),
(6, 6),
(7, 7);

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
(1, 'Ramon Garcia', 'ramon.g.camargo42@gmail.com', 'ramon42', '12345'),
(2, 'Thiellen Oliveira', 'tiele@gmail.com', 'tiele123', '12345'),
(3, 'Kethllyn Failla', 'keth@gmail.com', 'keth123', '12345'),
(4, 'Ramon Camargo', 'rga@hotmail.com', 'abc123', '12345'),
(6, 'Ramon', 'ramon.c@hotmail.com', 'aaa123', '123456'),
(7, 'Ramon', 'ramc@hotmail.com', 'aaa1234', '12345');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_post`
-- (See below for the actual view)
--
CREATE TABLE `v_post` (
`id_user` int(11)
,`id_user_segue` int(11)
,`usuario` varchar(50)
,`img_path` varchar(100)
,`img_desc` varchar(200)
,`img_local` varchar(50)
,`id_user_comentario` int(11)
,`comentario` varchar(200)
);

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
-- Structure for view `v_post`
--
DROP TABLE IF EXISTS `v_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_post`  AS  select `img`.`id_user` AS `id_user`,`s`.`id_user_segue` AS `id_user_segue`,`u`.`usuario` AS `usuario`,`img`.`img_path` AS `img_path`,`img`.`img_desc` AS `img_desc`,`img`.`img_local` AS `img_local`,`cm`.`id_user_comentario` AS `id_user_comentario`,`cm`.`comentario` AS `comentario` from (((`comentarios_imgs` `cm` join `imagens` `img`) join `seguidores` `s`) join `usuarios` `u`) where ((`img`.`id_user` = `s`.`id_user_segue`) and (`u`.`id` = `img`.`id_user`) and (`u`.`id` = `cm`.`id_user_comentario`)) order by `img`.`dt_post`,`cm`.`dt_comentario` ;

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
-- Indexes for table `comentarios_imgs`
--
ALTER TABLE `comentarios_imgs`
  ADD PRIMARY KEY (`id_img`,`id_user_comentario`,`comentario`),
  ADD KEY `fk_id_comment` (`id_img`) USING BTREE;

--
-- Indexes for table `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`id_user`,`id_img`),
  ADD KEY `fk_foreign_key_id_curtida` (`id_img`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_user`,`id_img`),
  ADD UNIQUE KEY `id_img` (`id_img`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentarios_imgs`
--
ALTER TABLE `comentarios_imgs`
  ADD CONSTRAINT `fk_foreign_key_id_img` FOREIGN KEY (`id_img`) REFERENCES `imagens` (`id_img`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD CONSTRAINT `fk_foreign_key_id_img_curtida` FOREIGN KEY (`id_img`) REFERENCES `imagens` (`id_img`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `fk_foreign_key_id_user` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_foreign_key_id_user_curtida` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
