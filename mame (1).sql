-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2018 às 19:52
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mame`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mangas`
--

CREATE TABLE `mangas` (
  `idMangas` int(11) NOT NULL,
  `infos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mangas`
--

INSERT INTO `mangas` (`idMangas`, `infos`) VALUES
(1, '{\"mangaName\":\"Sidooh\",\"mangaDesc\":\"Durante as convulsÃµes polÃ­ticas e conflitos sociais no final do shogunato Tokugawa no JapÃ£o (1855), dois irmÃ£os Yukimura Shoutarou e Yukimura Gentarou lutam para sobreviver nestes tempos turbulentos. Com sua Ãºnica posse, uma espada de seu pai falecido, e agarrando a sabedoria das palavras finais de sua mÃ£e, os irmÃ£os pretendem embarcar no Caminho do Guerreiro: Sidooh.\",\"imgManga\":\"Sidooh-5a674e9890c55.jpg\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `volumes`
--

CREATE TABLE `volumes` (
  `volumeId` int(11) NOT NULL,
  `imgVol` varchar(255) DEFAULT NULL,
  `volNum` varchar(10) NOT NULL,
  `volCaps` varchar(10) NOT NULL,
  `linkCaps` varchar(255) NOT NULL,
  `mangas_idMangas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `volumes`
--

INSERT INTO `volumes` (`volumeId`, `imgVol`, `volNum`, `volCaps`, `linkCaps`, `mangas_idMangas`) VALUES
(1, 'Sidooh-5a688f5b98190.jpg', '1', '1', 'http://localhost/#', 1),
(2, 'Sidooh-5a688f5b98190.jpg', '2', '', '', 1),
(4, 'Sidooh-5a688f5b98190.jpg', '3', '', '', 1),
(5, 'Sidooh-5a68915125072.jpg', '3', '', '', 1),
(6, 'Sidooh-5a6893102d942.jpg', '1', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`idMangas`),
  ADD UNIQUE KEY `idMangas_UNIQUE` (`idMangas`);

--
-- Indexes for table `volumes`
--
ALTER TABLE `volumes`
  ADD PRIMARY KEY (`volumeId`,`mangas_idMangas`),
  ADD UNIQUE KEY `volumeId_UNIQUE` (`volumeId`),
  ADD KEY `fk_volumes_mangas_idx` (`mangas_idMangas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mangas`
--
ALTER TABLE `mangas`
  MODIFY `idMangas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volumes`
--
ALTER TABLE `volumes`
  MODIFY `volumeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `volumes`
--
ALTER TABLE `volumes`
  ADD CONSTRAINT `fk_volumes_mangas` FOREIGN KEY (`mangas_idMangas`) REFERENCES `mangas` (`idMangas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
