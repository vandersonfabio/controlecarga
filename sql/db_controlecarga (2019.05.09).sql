-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2019 às 16:30
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
  `id` int(11) NOT NULL,
  `dataEntrega` varchar(10) NOT NULL,
  `dataBaixa` varchar(10) DEFAULT NULL,
  `userBaixa` varchar(100) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `idItem` int(11) NOT NULL,
  `idSetor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alocacao`
--

INSERT INTO `alocacao` (`id`, `dataEntrega`, `dataBaixa`, `userBaixa`, `isActive`, `idItem`, `idSetor`) VALUES
(1, '06/05/2019', '06/05/2019', 'vanderson.fabio@gmail.com', 0, 1, 1),
(2, '07/05/2019', '07/05/2019', 'vanderson.fabio@gmail.com', 0, 5, 1),
(3, '07/05/2019', NULL, NULL, 1, 12, 1),
(4, '07/05/2019', NULL, NULL, 1, 11, 1),
(5, '07/05/2019', NULL, NULL, 1, 2, 1),
(6, '07/05/2019', NULL, NULL, 1, 1, 1),
(7, '07/05/2019', NULL, NULL, 1, 10, 1),
(8, '07/05/2019', NULL, NULL, 1, 9, 1),
(9, '09/05/2019', '09/05/2019', 'vanderson.fabio@gmail.com', 0, 4, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fabricante`
--

INSERT INTO `fabricante` (`id`, `descricao`, `isActive`) VALUES
(1, 'Daten', 1),
(2, 'BMI', 1),
(3, 'Huawei', 1),
(4, 'APC', 1);

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
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `idTipo` int(11) NOT NULL,
  `idFabricante` int(11) NOT NULL,
  `idSituacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `modelo`, `numSerie`, `numTombo`, `observacoes`, `isActive`, `idTipo`, `idFabricante`, `idSituacao`) VALUES
(1, 'DC1C-S', '01014602011802', '005153', 'Sem observações', 1, 1, 1, 2),
(2, 'DC1C-S', '01014602011758', '004927', 'Sem observações', 1, 1, 1, 2),
(3, 'DC1C-S', '01014602010817', '005093', 'Sem observações', 1, 1, 1, 1),
(4, 'DC1C-S', '01014602010417', '004987', 'Sem observações', 1, 1, 1, 1),
(5, 'DC1C-S', '01014602010545', '005077', 'Sem observações', 1, 1, 1, 1),
(6, 'DC1C-S', '01014602020097', '005005', 'Sem observações', 1, 1, 1, 1),
(7, 'DC1C-S', '01014602020077', '005151', 'Sem observações', 1, 1, 1, 1),
(8, 'DC1C-S', '01014602020057', '005149', 'Sem observações', 1, 1, 1, 1),
(9, '20M35PD-M', '151002433', '006762', 'Sem observações', 1, 2, 1, 2),
(10, '20M35PD-M', '151000352', '006646', 'Sem observações', 1, 2, 1, 2),
(11, 'ML1000B1', '0665', '001983', 'Sem observações', 1, 3, 2, 2),
(12, 'ML1000B1', '00033', '001960', 'Usado no rack da rede', 1, 3, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vanderson.fabio@gmail.com', '$2y$10$Rx2AqjFGA.Mj/yDC05uGU.4bopEwqXp4mD14dtxUGiH6.pLwG3cA2', '2019-05-08 11:55:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `policial`
--

CREATE TABLE `policial` (
  `id` int(11) NOT NULL,
  `matricula` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nomeFuncional` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nomeCompleto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `idPosto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `policial`
--

INSERT INTO `policial` (`id`, `matricula`, `nomeFuncional`, `nomeCompleto`, `isActive`, `idPosto`) VALUES
(1, '205.020-0', 'Vanderson', 'Vanderson Fábio de Araújo', 1, 1),
(2, '113.481-7', 'Costa', 'Walmary Costa', 1, 11),
(3, '194.153-4', 'Valdez', 'Flávio Valdez Martins da Silva Filho', 1, 9),
(4, '077.399-9', 'Quirino', 'Virgílio Quirino Neto', 1, 9),
(5, '195.131-9', 'Jardel', 'Jardel Cléber de Araújo', 1, 9),
(6, '124.138-9', 'Lopes', 'Alexandre Lopes de Andrade Gomes', 1, 8),
(7, '113.718-2', 'Filho', 'Severino Tibúrcio Filho', 1, 6),
(8, '113.616-0', 'De Lima', 'Damião Benvindo de Lima', 1, 5),
(9, '163.402-0', 'Aquino', 'Carlos Roberto de Aquino', 1, 4),
(10, '165.749-6', 'João Batista', 'João Batista Dantas', 1, 3),
(11, '202.154-4', 'M. Medeiros', 'Marcos Medeiros de Azevedo', 1, 1);

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
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `idResponsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `descricao`, `isActive`, `idResponsavel`) VALUES
(1, 'Suporte Técnico', 1, 1),
(2, 'Comando', 1, 2),
(3, '1ª Companhia', 1, 3),
(4, 'Sargenteação', 1, 9),
(5, 'Secretaria', 1, 5),
(6, 'Material Bélico', 1, 8),
(7, 'Assessoria Jurídica', 1, 11),
(8, 'PM4', 1, 4),
(9, 'COPOM', 1, 10),
(10, 'PM2', 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `descricao`, `isActive`) VALUES
(1, 'Disponível', 1),
(2, 'Alocado', 1),
(3, 'Em manutenção', 1);

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
-- Extraindo dados da tabela `tipo_item`
--

INSERT INTO `tipo_item` (`id`, `descricao`, `isActive`) VALUES
(1, 'Microcomputador', 1),
(2, 'Monitor', 1),
(3, 'Estabilizador', 1),
(4, 'Switch', 1),
(5, 'Roteador', 1),
(6, 'Nobreak', 1),
(7, 'Modem', 1),
(8, 'Mesa', 1),
(9, 'Cadeira acolchoada', 1),
(10, 'Cadeira plástica', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vanderson Fabio', 'vanderson.fabio@gmail.com', NULL, '$2y$10$oBH8NUeCQDNMhmpJhjVY8O2.8SFo9i8F4bc6gvEea8VqGFwB7L.4y', '3v3I8goI8BpIQmRfwJteJRw5mAJrycwdDwToNuO64knozf0SPpdXJraR25Gk', '2019-05-06 11:51:32', '2019-05-08 11:38:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alocacao`
--
ALTER TABLE `alocacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alocacao_item` (`idItem`),
  ADD KEY `fk_alocacao_setor` (`idSetor`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alocacao`
--
ALTER TABLE `alocacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policial`
--
ALTER TABLE `policial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_item`
--
ALTER TABLE `tipo_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alocacao`
--
ALTER TABLE `alocacao`
  ADD CONSTRAINT `fk_alocacao_item` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alocacao_setor` FOREIGN KEY (`idSetor`) REFERENCES `setor` (`id`) ON UPDATE CASCADE;

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
