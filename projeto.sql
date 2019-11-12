-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2019 às 02:24
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `caminho` varchar(65) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `createdon` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(768, 'default', '{\"displayName\":\"App\\\\Jobs\\\\DownloadXml\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DownloadXml\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\DownloadXml\\\":7:{s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 255, NULL, 1573601287, 1573601287);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `d_nasc` varchar(40) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `altura` double DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `posicoes_id` int(11) NOT NULL,
  `times_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id`, `nome`, `numero`, `d_nasc`, `pais`, `altura`, `peso`, `posicoes_id`, `times_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Luiz Gustavo Ventura', 10, '1996-06-27', 'Brasil', 1.87, 80.5, 7, 4, '2019-11-12 06:08:34', '2019-11-12 21:21:17', NULL),
(3, 'Hernandes', 15, '1990-01-10', 'Argentina', 1.7, 60, 4, 3, '2019-11-12 06:24:21', '2019-11-12 21:45:06', NULL),
(4, 'Gustavo', 8, '1994-05-05', 'Brasil', 1.8, 69, 2, 3, '2019-11-12 06:27:20', '2019-11-12 08:14:35', NULL),
(5, 'Gabriel', 10, '1990-07-02', 'Brasil', 1.8, 75, 7, 5, '2019-11-12 21:17:03', '2019-11-12 21:21:28', NULL),
(6, 'Tafarel', 1, '1987-02-07', 'Brasil', 1.92, 60, 1, 4, '2019-11-12 21:17:40', '2019-11-12 23:33:57', NULL),
(7, 'Dida', 12, '1989-09-06', 'Brasil', 1.92, 86, 1, 5, '2019-11-12 21:18:25', '2019-11-12 21:21:28', NULL),
(8, 'Thiago Silva', 3, '1984-03-16', 'Brasil', 1.79, 69, 2, 4, '2019-11-12 21:19:02', '2019-11-12 21:21:17', NULL),
(9, 'David Luiz', 3, '1990-04-23', 'Espanha', 1.82, 73, 2, 5, '2019-11-12 21:19:45', '2019-11-12 21:21:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_11_12_225517_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `texto` varchar(65) NOT NULL,
  `createdon` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicoes`
--

CREATE TABLE `posicoes` (
  `id` int(11) NOT NULL,
  `posicao` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posicoes`
--

INSERT INTO `posicoes` (`id`, `posicao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GOLEIRO', NULL, NULL, NULL),
(2, 'ZAGUEIRO', NULL, NULL, NULL),
(3, 'LATERAL ESQ', NULL, NULL, NULL),
(4, 'LATERAL DIR', NULL, NULL, NULL),
(5, 'VOLANTE', NULL, NULL, NULL),
(6, 'MEIA', NULL, NULL, NULL),
(7, 'ATACANTE', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `ano_fundacao` int(11) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `abreviado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id`, `nome`, `ano_fundacao`, `cidade`, `uf`, `abreviado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SEM TIME', 2019, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Time', 2005, 'São Paulo', 'SP', 'TME', '2019-11-12 06:53:39', '2019-11-12 21:57:18', NULL),
(3, 'Time 2', 2005, 'Araucaria', 'PR', 'TM2', '2019-11-12 06:57:23', '2019-11-12 06:57:23', NULL),
(4, 'Athletico PR', 1920, 'Curitiba', 'PR', 'CAP', '2019-11-12 21:20:15', '2019-11-12 21:20:15', NULL),
(5, 'Curitiba', 1920, 'Curitiba', 'PR', 'CFC', '2019-11-12 21:20:59', '2019-11-12 21:20:59', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xmls`
--

CREATE TABLE `xmls` (
  `id` int(11) NOT NULL,
  `caminho` varchar(65) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xmls`
--

INSERT INTO `xmls` (`id`, `caminho`, `created_at`, `updated_at`, `deleted_at`, `nome`) VALUES
(1, 'storage/xml/172604201911125dcaeb2c15946.xml', '2019-11-12 20:26:04', '2019-11-12 20:26:04', NULL, '172604201911125dcaeb2c15946.xml'),
(2, 'storage/xml/174011201911125dcaee7b18a21.xml', '2019-11-12 20:40:11', '2019-11-12 20:40:11', NULL, '174011201911125dcaee7b18a21.xml'),
(3, 'storage/xml/174039201911125dcaee97520f3.xml', '2019-11-12 20:40:39', '2019-11-12 20:40:39', NULL, '174039201911125dcaee97520f3.xml'),
(4, 'storage/xml/174158201911125dcaeee608159.xml', '2019-11-12 20:41:58', '2019-11-12 20:41:58', NULL, '174158201911125dcaeee608159.xml'),
(5, 'storage/xml/174214201911125dcaeef682228.xml', '2019-11-12 20:42:14', '2019-11-12 20:42:14', NULL, '174214201911125dcaeef682228.xml'),
(6, 'storage/xml/175451201911125dcaf1eba2de0.xml', '2019-11-12 20:54:51', '2019-11-12 20:54:51', NULL, '175451201911125dcaf1eba2de0.xml'),
(7, 'storage/xml/181054201911125dcaf5aed75dd.xml', '2019-11-12 21:10:54', '2019-11-12 21:10:54', NULL, '181054201911125dcaf5aed75dd.xml');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id`,`posicoes_id`,`times_id`),
  ADD KEY `fk_jogadores_posicoes1_idx` (`posicoes_id`),
  ADD KEY `fk_jogadores_times1_idx` (`times_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posicoes`
--
ALTER TABLE `posicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `xmls`
--
ALTER TABLE `xmls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=769;

--
-- AUTO_INCREMENT de tabela `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posicoes`
--
ALTER TABLE `posicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `xmls`
--
ALTER TABLE `xmls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD CONSTRAINT `fk_jogadores_posicoes1` FOREIGN KEY (`posicoes_id`) REFERENCES `posicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogadores_times1` FOREIGN KEY (`times_id`) REFERENCES `times` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
