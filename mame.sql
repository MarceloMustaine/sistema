-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/04/2018 às 14:11
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mame`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `capitulos`
--

CREATE TABLE `capitulos` (
  `idcapitulos` int(11) NOT NULL,
  `capname` varchar(255) NOT NULL,
  `caplink` varchar(255) NOT NULL,
  `capServerName` varchar(70) NOT NULL,
  `mangas_idMangas` int(11) NOT NULL,
  `volumes_volumeId` int(11) NOT NULL,
  `volumes_mangas_idMangas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mangas`
--

CREATE TABLE `mangas` (
  `idMangas` int(11) NOT NULL,
  `infos` text NOT NULL,
  `mangaStatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `mangas`
--

INSERT INTO `mangas` (`idMangas`, `infos`, `mangaStatus`) VALUES
(2, '{\"mangaName\":\"teste\",\"mangaDesc\":\"teste\",\"imgManga\":\"teste-5ad107b18abb7.jpg\"}', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `nick_usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_usuario` varchar(255) DEFAULT NULL,
  `senha_usuario` varchar(40) DEFAULT NULL,
  `status_usuario` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `avatar_usuario` varchar(70) DEFAULT NULL,
  `data_criada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `nick_usuario`, `email_usuario`, `senha_usuario`, `status_usuario`, `tipo_usuario`, `avatar_usuario`, `data_criada`) VALUES
(1, 'Marcelo Ferreira', 'MarceloMustaine', 'marceloffdeoliveira@gmail.com', 'marcelo1', 1, 1, 'imgs/avatar/foto.jpg', '2018-04-19 16:34:34'),
(2, 'Admin', 'Administrador', 'admin@admin', '123456', 1, 1, NULL, '2018-04-19 16:34:38'),
(6, 'Marcelo Ferreira', 'Marcelo', 'abc@acb.com', 'abc', 1, 1, NULL, '2018-04-19 15:42:24'),
(7, 'Yusuke', 'Urameshi', 'urameshi@yuyu.com', 'bd488fca04edb0df2c6e75b8df941f539fdec6d4', 1, 1, NULL, '2018-04-20 20:00:34'),
(8, 'Kuwabara', 'Kuwabara', 'kuwabara@yuyu.com', '1b2ef5986e8cffcd462f411a0769addac4aa889f', 1, 1, NULL, '2018-04-20 20:01:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `volumes`
--

CREATE TABLE `volumes` (
  `volumeId` int(11) NOT NULL,
  `imgVol` varchar(255) DEFAULT NULL,
  `volNum` varchar(10) NOT NULL,
  `volLink` varchar(255) NOT NULL,
  `volServerName` varchar(70) NOT NULL,
  `mangas_idMangas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`idcapitulos`,`mangas_idMangas`,`volumes_volumeId`,`volumes_mangas_idMangas`),
  ADD UNIQUE KEY `idcapitulos_UNIQUE` (`idcapitulos`),
  ADD KEY `fk_capitulos_mangas1_idx` (`mangas_idMangas`),
  ADD KEY `fk_capitulos_volumes1_idx` (`volumes_volumeId`,`volumes_mangas_idMangas`);

--
-- Índices de tabela `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`idMangas`),
  ADD UNIQUE KEY `idMangas_UNIQUE` (`idMangas`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nome_usuario` (`nick_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- Índices de tabela `volumes`
--
ALTER TABLE `volumes`
  ADD PRIMARY KEY (`volumeId`,`mangas_idMangas`),
  ADD UNIQUE KEY `volumeId_UNIQUE` (`volumeId`),
  ADD KEY `fk_volumes_mangas_idx` (`mangas_idMangas`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `idcapitulos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mangas`
--
ALTER TABLE `mangas`
  MODIFY `idMangas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `volumes`
--
ALTER TABLE `volumes`
  MODIFY `volumeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `fk_capitulos_mangas1` FOREIGN KEY (`mangas_idMangas`) REFERENCES `mangas` (`idMangas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_capitulos_volumes1` FOREIGN KEY (`volumes_volumeId`,`volumes_mangas_idMangas`) REFERENCES `volumes` (`volumeId`, `mangas_idMangas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `volumes`
--
ALTER TABLE `volumes`
  ADD CONSTRAINT `fk_volumes_mangas` FOREIGN KEY (`mangas_idMangas`) REFERENCES `mangas` (`idMangas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
