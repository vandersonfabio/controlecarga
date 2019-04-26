-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Abr-2019 às 17:58
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_controlecarga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocacao`
--

CREATE TABLE `alocacao` (
  `idItem` int(11) NOT NULL,
  `idSetor` int(11) NOT NULL,
  `dataEntrega` date NOT NULL,
  `dataBaixa` date DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numSerie` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numTombo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacoes` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idTipo` int(11) NOT NULL,
  `idFabricante` int(11) NOT NULL,
  `idSituacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `policial`
--

CREATE TABLE `policial` (
  `id` int(11) NOT NULL,
  `matricula` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nomeFuncional` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nomeCompleto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `idPosto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto`
--

CREATE TABLE `posto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `posto`
--

INSERT INTO `posto` (`id`, `descricao`, `sigla`) VALUES
(1, 'Soldado', 'SD'),
(2, 'Cabo', 'CB'),
(3, '3º Sargento', '3º SGT'),
(4, '2º Sargento', '2º SGT'),
(5, '1º Sargento', '1º SGT'),
(6, 'Sub-Tenente', 'ST'),
(7, '2º Tenente', '2º TEN'),
(8, '1º Tenente', '1º TEN'),
(9, 'Capitão', 'CAP'),
(10, 'Major', 'MAJ'),
(11, 'Tenente-Coronel', 'TC'),
(12, 'Coronel', 'CEL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idResponsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_item`
--

CREATE TABLE `tipo_item` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alocacao`
--
ALTER TABLE `alocacao`
  ADD PRIMARY KEY (`idItem`,`idSetor`),
  ADD KEY `fk_alocacao_Setor` (`idSetor`);

--
-- Indexes for table `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_tipo` (`idTipo`),
  ADD KEY `fk_item_fabricante` (`idFabricante`),
  ADD KEY `fk_item_situacao` (`idSituacao`);

--
-- Indexes for table `policial`
--
ALTER TABLE `policial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_policial_posto` (`idPosto`);

--
-- Indexes for table `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_setor_responsavel` (`idResponsavel`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_item`
--
ALTER TABLE `tipo_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policial`
--
ALTER TABLE `policial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_item`
--
ALTER TABLE `tipo_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alocacao`
--
ALTER TABLE `alocacao`
  ADD CONSTRAINT `fk_alocacao_Item` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alocacao_Setor` FOREIGN KEY (`idSetor`) REFERENCES `setor` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_fabricante` FOREIGN KEY (`idFabricante`) REFERENCES `fabricante` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_situacao` FOREIGN KEY (`idSituacao`) REFERENCES `situacao` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo_item` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `policial`
--
ALTER TABLE `policial`
  ADD CONSTRAINT `fk_policial_posto` FOREIGN KEY (`idPosto`) REFERENCES `posto` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `setor`
--
ALTER TABLE `setor`
  ADD CONSTRAINT `fk_setor_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `policial` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
