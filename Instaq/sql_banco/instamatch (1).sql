-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jul-2019 às 21:26
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
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_user` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `img_desc` varchar(200) DEFAULT NULL,
  `img_local` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_user`, `img_path`, `img_desc`, `img_local`) VALUES
(5, '../users/testePasta/uploads/15623083305d1eeeea0630b.jpeg', 'foto teste 1', 'localiza bro'),
(5, '../users/testePasta/uploads/15623083495d1eeefd157a6.jpeg', 'foto teste 2', 'nzei'),
(5, '../users/testePasta/uploads/15623083635d1eef0bd7bd6.jpeg', 'foto teste 3', 'na casa do caralho'),
(7, '../users/testinha/uploads/15623110035d1ef95b54fed.png', 'iai meu irmÃ£o aqui Ã© o testinho dois', 'bandeirontes');

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
(1, 'ABC junior', 'abc@gmail.com', 'Buster', '1234'),
(2, 'Ramon Garcia', 'ramon@gmail.com', 'ramon42', '12345'),
(3, 'Ketilen', 'teste2@hotmail.com', 'ket', '1235'),
(4, 'teste123', 'alg@gmail.com', 'ramon', '1236'),
(5, 'Ramon Garcia', 'ramon.g.camargo42@gmail.com', 'testePasta', '12345'),
(7, 'Teste da Silva Santo', 'teste2IMG@gmail.com', 'testinha', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_user`,`img_path`);

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
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_user_img` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
