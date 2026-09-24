-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 22/09/2026 às 18:43
-- Versão do servidor: 8.4.10
-- Versão do PHP: 8.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vivabem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('M5WhF51oHkNZr7Y83kp9s16XeOyOZpof0hz3S2SY', NULL, '172.20.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0', 'eyJfdG9rZW4iOiJUODhUQXEya1ozVjdIM3lyZ3hQc1U1QVlXTUEyZUR6MEdHTlozWEhuIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAzXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImFkbWluLmRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790020057),
('Z9fvQe0T30xY0DyMuESusySErWuRlB6MrETzrAIa', NULL, '172.20.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0', 'eyJfdG9rZW4iOiJ4TG0xN1NpVkN6M3E5SWY5VWNhNHkyMm1LVjZvVlZCTDJrQ3kxN3VTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAzXC9hZG1pblwvZm9udHNcL1F1aWNrc2FuZC1WYXJpYWJsZUZvbnRfd2dodC50dGYiLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790020720);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_agendamento`
--

CREATE TABLE `tbl_agendamento` (
  `id_agendamento` int NOT NULL,
  `id_cliente` int NOT NULL,
  `id_servico` int NOT NULL,
  `id_especialista` int NOT NULL,
  `id_sala` int NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario_agendamento` time NOT NULL,
  `observacao_agendamento` text COLLATE utf8mb4_general_ci,
  `status_agendamento` enum('PENDENTE','CONFIRMADO','CONCLUIDO','CANCELADO') COLLATE utf8mb4_general_ci DEFAULT 'PENDENTE',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_agendamento`
--

INSERT INTO `tbl_agendamento` (`id_agendamento`, `id_cliente`, `id_servico`, `id_especialista`, `id_sala`, `data_agendamento`, `horario_agendamento`, `observacao_agendamento`, `status_agendamento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 1, 1, 1, '2026-09-03', '12:00:00', 'Primeira sessão do cliente', 'CONFIRMADO', '2026-07-02 15:38:44', '2026-07-02 15:38:44'),
(2, 2, 2, 2, 2, '2026-09-11', '15:00:00', 'Cliente com alergia a óleos', 'PENDENTE', '2026-07-02 15:38:44', '2026-07-02 15:38:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id_categoria` int NOT NULL,
  `nome_categoria` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `status_categoria` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id_categoria`, `nome_categoria`, `status_categoria`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Workshop', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43'),
(2, 'Sensorial', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int NOT NULL,
  `nome_cliente` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email_cliente` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `senha_cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `genero_cliente` enum('MASCULINO','FEMININO','OUTRO') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `condicao_saude` text COLLATE utf8mb4_general_ci,
  `status_cliente` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nome_cliente`, `email_cliente`, `senha_cliente`, `genero_cliente`, `condicao_saude`, `status_cliente`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Alessandro Santos', 'alessandro@gmail.com', '123456', 'MASCULINO', 'Sem restrições', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43'),
(2, 'John Spencer', 'john@gmail.com', '123456', 'MASCULINO', 'Alergia a óleos essenciais', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_contato`
--

CREATE TABLE `tbl_contato` (
  `id_contato` int NOT NULL,
  `nome_contato` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `email_contato` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone_contato` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `assunto_contato` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mensagem_contato` text COLLATE utf8mb4_general_ci NOT NULL,
  `status_contato` enum('PENDENTE','RESPONDIDO') COLLATE utf8mb4_general_ci DEFAULT 'PENDENTE',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_depoimento`
--

CREATE TABLE `tbl_depoimento` (
  `id_depoimento` int NOT NULL,
  `id_cliente` int NOT NULL,
  `titulo_depoimento` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_depoimento` text COLLATE utf8mb4_general_ci NOT NULL,
  `nota_depoimento` decimal(2,1) NOT NULL,
  `status_depoimento` enum('PENDENTE','APROVADO','REJEITADO') COLLATE utf8mb4_general_ci DEFAULT 'PENDENTE',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_depoimento`
--

INSERT INTO `tbl_depoimento` (`id_depoimento`, `id_cliente`, `titulo_depoimento`, `descricao_depoimento`, `nota_depoimento`, `status_depoimento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Excelente atendimento', 'Fui muito bem atendido e saí relaxado', 9.5, 'APROVADO', '2026-07-02 15:52:46', '2026-07-02 15:52:46'),
(2, 2, 'Muito bom', 'Serviço de qualidade, recomendo', 8.0, 'APROVADO', '2026-07-02 15:52:46', '2026-07-02 15:52:46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_equipamento`
--

CREATE TABLE `tbl_equipamento` (
  `id_equipamento` int NOT NULL,
  `nome_equipamento` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_equipamento` text COLLATE utf8mb4_general_ci,
  `status_equipamento` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_equipamento`
--

INSERT INTO `tbl_equipamento` (`id_equipamento`, `nome_equipamento`, `descricao_equipamento`, `status_equipamento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Aparelho de Massagem', 'Equipamento para relaxamento muscular', 'ATIVO', '2026-07-02 15:38:44', '2026-07-02 15:38:44'),
(2, 'Óleos Terapêuticos', 'Óleos utilizados em tratamentos', 'ATIVO', '2026-07-02 15:38:44', '2026-07-02 15:38:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_especialista`
--

CREATE TABLE `tbl_especialista` (
  `id_especialista` int NOT NULL,
  `nome_especialista` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `genero_especialista` enum('MASCULINO','FEMININO','OUTRO') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_especialista` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_especialista`
--

INSERT INTO `tbl_especialista` (`id_especialista`, `nome_especialista`, `genero_especialista`, `status_especialista`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Mariana Silva', 'FEMININO', 'ATIVO', '2026-07-02 15:38:44', '2026-07-02 15:38:44'),
(2, 'Carlos Souza', 'MASCULINO', 'ATIVO', '2026-07-02 15:38:44', '2026-07-02 15:38:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id_evento` int NOT NULL,
  `id_categoria` int NOT NULL,
  `nome_evento` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_evento` text COLLATE utf8mb4_general_ci NOT NULL,
  `data_evento` date NOT NULL,
  `horario_evento` time NOT NULL,
  `status_evento` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_evento`
--

INSERT INTO `tbl_evento` (`id_evento`, `id_categoria`, `nome_evento`, `descricao_evento`, `data_evento`, `horario_evento`, `status_evento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Manhã de Relaxamento', 'Experiência de relaxamento e automassagem', '2026-05-10', '09:00:00', 'ATIVO', '2026-07-02 15:38:44', '2026-07-02 15:38:44'),
(2, 2, 'Noite de Autocuidado', 'Rituais sensoriais e relaxamento profundo', '2026-05-24', '19:00:00', 'ATIVO', '2026-07-02 15:38:44', '2026-07-02 15:38:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_galeria`
--

CREATE TABLE `tbl_galeria` (
  `id_galeria` int NOT NULL,
  `nome_galeria` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categoria_galeria` varchar(80) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imagem_galeria` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_galeria` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_galeria` text COLLATE utf8mb4_general_ci,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_galeria`
--

INSERT INTO `tbl_galeria` (`id_galeria`, `nome_galeria`, `categoria_galeria`, `imagem_galeria`, `status_galeria`, `descricao_galeria`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Toque e Relaxamento', 'Terapias', 'galeria/toque.png', 'ATIVO', 'Momentos de relaxamento profundo', '2026-07-02 15:35:14', '2026-09-18 19:16:57'),
(2, 'Atmosfera Aconchegante', 'Ambiente', 'galeria/ambiente.png', 'ATIVO', 'Ambiente pensado para bem-estar', '2026-07-02 15:35:14', '2026-09-18 19:17:10'),
(3, 'Momento de Paz', 'Terapias', 'galeria/momento_de_paz.png', '', 'Momento dedicado ao relaxamento e bem-estar', '2026-09-18 17:53:48', '2026-09-18 17:53:48'),
(4, 'Área de Descanso', 'Ambiente', 'galeria/area_de_descanço.png', '', 'Espaço preparado para momentos de tranquilidade', '2026-09-18 17:59:57', '2026-09-18 19:10:52'),
(5, 'Espaço Tranquilo', 'Ambiente', 'galeria/espaco_tranquilo.png', '', 'Ambiente acolhedor pensado para proporcionar conforto', '2026-09-18 18:17:45', '2026-09-18 19:09:04'),
(6, 'Massagem Relaxante', 'Ambiente', 'galeria/massagemrelaxante.png', '', 'Experiência de relaxamento para aliviar as tensões', '2026-09-18 18:20:20', '2026-09-18 18:23:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_sala`
--

CREATE TABLE `tbl_sala` (
  `id_sala` int NOT NULL,
  `nome_sala` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_sala` text COLLATE utf8mb4_general_ci,
  `status_sala` enum('ATIVA','INATIVA') COLLATE utf8mb4_general_ci DEFAULT 'ATIVA',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_sala`
--

INSERT INTO `tbl_sala` (`id_sala`, `nome_sala`, `descricao_sala`, `status_sala`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Sala Relaxamento', 'Ambiente calmo para terapias', 'ATIVA', '2026-07-02 15:38:44', '2026-07-02 15:38:44'),
(2, 'Sala Estética', 'Ambiente para tratamentos estéticos', 'ATIVA', '2026-07-02 15:38:44', '2026-07-02 15:38:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_servico`
--

CREATE TABLE `tbl_servico` (
  `id_servico` int NOT NULL,
  `nome_servico` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao_servico` text COLLATE utf8mb4_general_ci NOT NULL,
  `indicacoes_servico` text COLLATE utf8mb4_general_ci,
  `imagem_servico` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_servico` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_servico`
--

INSERT INTO `tbl_servico` (`id_servico`, `nome_servico`, `descricao_servico`, `indicacoes_servico`, `imagem_servico`, `status_servico`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Quick Massage', 'Massagem rápida para relaxamento e alívio de tensões.', 'Alívio muscular e estresse', 'servicos/quick.png', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43'),
(2, 'Drenagem Linfática', 'Técnica para redução de inchaço e retenção de líquidos.', 'Circulação e bem-estar', 'servicos/drenagem.png', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_servico_equipamento`
--

CREATE TABLE `tbl_servico_equipamento` (
  `id_servico` int NOT NULL,
  `id_equipamento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_servico_equipamento`
--

INSERT INTO `tbl_servico_equipamento` (`id_servico`, `id_equipamento`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int NOT NULL,
  `nome_usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email_usuario` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `senha_usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel_usuario` enum('ADMIN','FUNCIONARIO') COLLATE utf8mb4_general_ci NOT NULL,
  `status_usuario` enum('ATIVO','INATIVO') COLLATE utf8mb4_general_ci DEFAULT 'ATIVO',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`, `status_usuario`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Bruno Henrique', 'bruno@gmail.com', '123456', 'ADMIN', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43'),
(2, 'Pedro Reis', 'pedro@gmail.com', '123456', 'FUNCIONARIO', 'ATIVO', '2026-07-02 15:38:43', '2026-07-02 15:38:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `tbl_agendamento`
--
ALTER TABLE `tbl_agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servico` (`id_servico`),
  ADD KEY `id_especialista` (`id_especialista`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Índices de tabela `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email_cliente` (`email_cliente`);

--
-- Índices de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices de tabela `tbl_depoimento`
--
ALTER TABLE `tbl_depoimento`
  ADD PRIMARY KEY (`id_depoimento`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `tbl_equipamento`
--
ALTER TABLE `tbl_equipamento`
  ADD PRIMARY KEY (`id_equipamento`);

--
-- Índices de tabela `tbl_especialista`
--
ALTER TABLE `tbl_especialista`
  ADD PRIMARY KEY (`id_especialista`);

--
-- Índices de tabela `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `tbl_galeria`
--
ALTER TABLE `tbl_galeria`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Índices de tabela `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Índices de tabela `tbl_servico`
--
ALTER TABLE `tbl_servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `tbl_servico_equipamento`
--
ALTER TABLE `tbl_servico_equipamento`
  ADD PRIMARY KEY (`id_servico`,`id_equipamento`),
  ADD KEY `id_equipamento` (`id_equipamento`);

--
-- Índices de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_agendamento`
--
ALTER TABLE `tbl_agendamento`
  MODIFY `id_agendamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id_contato` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_depoimento`
--
ALTER TABLE `tbl_depoimento`
  MODIFY `id_depoimento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_equipamento`
--
ALTER TABLE `tbl_equipamento`
  MODIFY `id_equipamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_especialista`
--
ALTER TABLE `tbl_especialista`
  MODIFY `id_especialista` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id_evento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_galeria`
--
ALTER TABLE `tbl_galeria`
  MODIFY `id_galeria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_sala`
--
ALTER TABLE `tbl_sala`
  MODIFY `id_sala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_servico`
--
ALTER TABLE `tbl_servico`
  MODIFY `id_servico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_agendamento`
--
ALTER TABLE `tbl_agendamento`
  ADD CONSTRAINT `tbl_agendamento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  ADD CONSTRAINT `tbl_agendamento_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `tbl_servico` (`id_servico`),
  ADD CONSTRAINT `tbl_agendamento_ibfk_3` FOREIGN KEY (`id_especialista`) REFERENCES `tbl_especialista` (`id_especialista`),
  ADD CONSTRAINT `tbl_agendamento_ibfk_4` FOREIGN KEY (`id_sala`) REFERENCES `tbl_sala` (`id_sala`);

--
-- Restrições para tabelas `tbl_depoimento`
--
ALTER TABLE `tbl_depoimento`
  ADD CONSTRAINT `tbl_depoimento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`);

--
-- Restrições para tabelas `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD CONSTRAINT `tbl_evento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`);

--
-- Restrições para tabelas `tbl_servico_equipamento`
--
ALTER TABLE `tbl_servico_equipamento`
  ADD CONSTRAINT `tbl_servico_equipamento_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `tbl_servico` (`id_servico`),
  ADD CONSTRAINT `tbl_servico_equipamento_ibfk_2` FOREIGN KEY (`id_equipamento`) REFERENCES `tbl_equipamento` (`id_equipamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
