-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2024 at 07:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `user_uuid`, `criteria_id`, `value`, `month`, `year`, `created_at`, `updated_at`) VALUES
(10, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 1, '80', '6', '2023', '2023-06-18 19:41:45', '2023-06-18 19:41:45'),
(11, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 2, '90', '6', '2023', '2023-06-18 19:41:57', '2023-06-18 19:41:57'),
(12, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 3, '85', '6', '2023', '2023-06-18 19:42:10', '2023-06-18 19:42:10'),
(13, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 4, '82', '6', '2023', '2023-06-18 19:42:29', '2023-06-18 19:43:25'),
(18, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 1, '80', '6', '2023', '2023-06-18 19:46:03', '2023-06-18 19:46:03'),
(19, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 2, '89', '6', '2023', '2023-06-18 19:46:57', '2023-06-18 19:46:57'),
(20, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 3, '85', '6', '2023', '2023-06-18 19:47:11', '2023-06-18 19:47:11'),
(21, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 4, '90', '6', '2023', '2023-06-18 19:47:26', '2023-06-18 19:47:26'),
(26, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 1, '78', '6', '2023', '2023-06-18 19:48:34', '2023-06-18 19:48:34'),
(27, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 2, '85', '6', '2023', '2023-06-18 19:48:45', '2023-06-18 19:48:45'),
(28, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 3, '80', '6', '2023', '2023-06-18 19:48:57', '2023-06-18 19:48:57'),
(29, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 4, '90', '6', '2023', '2023-06-18 19:49:11', '2023-06-18 19:49:11'),
(34, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 1, '82', '6', '2023', '2023-06-18 19:53:05', '2023-06-18 19:53:05'),
(35, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 2, '84', '6', '2023', '2023-06-18 19:53:16', '2023-06-18 19:53:16'),
(36, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 3, '92', '6', '2023', '2023-06-18 19:53:27', '2023-06-18 19:53:27'),
(37, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 4, '82', '6', '2023', '2023-06-18 19:53:39', '2023-06-18 19:53:39'),
(42, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 1, '82', '6', '2023', '2023-06-18 19:56:10', '2023-06-18 19:56:10'),
(43, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 2, '80', '6', '2023', '2023-06-18 19:56:21', '2023-06-18 19:56:21'),
(44, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 3, '75', '6', '2023', '2023-06-18 19:56:32', '2023-06-18 19:56:32'),
(45, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 4, '80', '6', '2023', '2023-06-18 19:56:43', '2023-06-18 19:56:43'),
(50, '7046c342-79e2-4863-8762-11cfc5dc8612', 1, '85', '6', '2023', '2023-06-18 19:57:52', '2023-06-18 19:57:52'),
(51, '7046c342-79e2-4863-8762-11cfc5dc8612', 2, '80', '6', '2023', '2023-06-18 19:58:05', '2023-06-18 19:58:05'),
(52, '7046c342-79e2-4863-8762-11cfc5dc8612', 3, '90', '6', '2023', '2023-06-18 19:58:18', '2023-06-18 19:58:18'),
(53, '7046c342-79e2-4863-8762-11cfc5dc8612', 4, '85', '6', '2023', '2023-06-18 19:58:29', '2023-06-18 19:58:29'),
(58, '5128018d-bac6-4313-bede-af4cb320bbef', 1, '88', '6', '2023', '2023-06-18 19:59:39', '2023-06-18 19:59:39'),
(59, '5128018d-bac6-4313-bede-af4cb320bbef', 2, '80', '6', '2023', '2023-06-18 19:59:52', '2023-06-18 19:59:52'),
(60, '5128018d-bac6-4313-bede-af4cb320bbef', 3, '92', '6', '2023', '2023-06-18 20:00:02', '2023-06-18 20:00:02'),
(61, '5128018d-bac6-4313-bede-af4cb320bbef', 4, '90', '6', '2023', '2023-06-18 20:00:11', '2023-06-18 20:00:11'),
(96, '1d19a309-a59c-46ae-a6de-02984c746a04', 1, '3', '5', '2024', '2024-05-24 14:23:21', '2024-05-24 14:23:21'),
(97, '1d19a309-a59c-46ae-a6de-02984c746a04', 2, '4', '5', '2024', '2024-05-24 14:23:21', '2024-05-24 14:23:21'),
(98, '1d19a309-a59c-46ae-a6de-02984c746a04', 3, '5', '5', '2024', '2024-05-24 14:23:21', '2024-05-24 14:23:21'),
(99, '1d19a309-a59c-46ae-a6de-02984c746a04', 4, '2', '5', '2024', '2024-05-24 14:23:21', '2024-05-24 14:23:21'),
(100, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 1, '2', '5', '2024', '2024-05-24 14:23:41', '2024-05-24 14:23:41'),
(101, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 2, '3', '5', '2024', '2024-05-24 14:23:41', '2024-05-24 14:23:41'),
(102, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 3, '4', '5', '2024', '2024-05-24 14:23:41', '2024-05-24 14:23:41'),
(103, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 4, '3', '5', '2024', '2024-05-24 14:23:41', '2024-05-24 14:23:41'),
(104, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 1, '4', '5', '2024', '2024-05-24 14:24:15', '2024-05-24 14:24:15'),
(105, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 2, '2', '5', '2024', '2024-05-24 14:24:15', '2024-05-24 14:24:15'),
(106, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 3, '3', '5', '2024', '2024-05-24 14:24:15', '2024-05-24 14:24:15'),
(107, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 4, '4', '5', '2024', '2024-05-24 14:24:15', '2024-05-24 14:24:15'),
(108, '4e1ae9bd-2118-44e0-96d3-da51f57a7b5e', 1, '5', '5', '2024', '2024-05-24 14:24:43', '2024-05-24 14:24:43'),
(109, '4e1ae9bd-2118-44e0-96d3-da51f57a7b5e', 2, '5', '5', '2024', '2024-05-24 14:24:43', '2024-05-24 14:24:43'),
(110, '4e1ae9bd-2118-44e0-96d3-da51f57a7b5e', 3, '2', '5', '2024', '2024-05-24 14:24:43', '2024-05-24 14:24:43'),
(111, '4e1ae9bd-2118-44e0-96d3-da51f57a7b5e', 4, '1', '5', '2024', '2024-05-24 14:24:43', '2024-05-24 14:24:43'),
(112, '5128018d-bac6-4313-bede-af4cb320bbef', 1, '3', '5', '2024', '2024-05-24 14:25:18', '2024-05-24 14:25:18'),
(113, '5128018d-bac6-4313-bede-af4cb320bbef', 2, '3', '5', '2024', '2024-05-24 14:25:18', '2024-05-24 14:25:18'),
(114, '5128018d-bac6-4313-bede-af4cb320bbef', 3, '5', '5', '2024', '2024-05-24 14:25:18', '2024-05-24 14:25:18'),
(115, '5128018d-bac6-4313-bede-af4cb320bbef', 4, '2', '5', '2024', '2024-05-24 14:25:18', '2024-05-24 14:25:18'),
(116, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 1, '4', '5', '2024', '2024-05-26 06:26:07', '2024-05-26 06:26:07'),
(117, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 2, '4', '5', '2024', '2024-05-26 06:26:07', '2024-05-26 06:26:07'),
(118, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 3, '4', '5', '2024', '2024-05-26 06:26:07', '2024-05-26 06:26:07'),
(119, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 4, '3', '5', '2024', '2024-05-26 06:26:07', '2024-05-26 06:26:07'),
(120, '7046c342-79e2-4863-8762-11cfc5dc8612', 1, '2', '5', '2024', '2024-05-26 06:26:26', '2024-05-26 06:26:26'),
(121, '7046c342-79e2-4863-8762-11cfc5dc8612', 2, '2', '5', '2024', '2024-05-26 06:26:26', '2024-05-26 06:26:26'),
(122, '7046c342-79e2-4863-8762-11cfc5dc8612', 3, '3', '5', '2024', '2024-05-26 06:26:26', '2024-05-26 06:26:26'),
(123, '7046c342-79e2-4863-8762-11cfc5dc8612', 4, '4', '5', '2024', '2024-05-26 06:26:26', '2024-05-26 06:26:26'),
(124, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 1, '5', '5', '2024', '2024-05-26 06:26:51', '2024-05-26 06:26:51'),
(125, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 2, '4', '5', '2024', '2024-05-26 06:26:51', '2024-05-26 06:26:51'),
(126, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 3, '5', '5', '2024', '2024-05-26 06:26:51', '2024-05-26 06:26:51'),
(127, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 4, '5', '5', '2024', '2024-05-26 06:26:51', '2024-05-26 06:26:51'),
(128, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 1, '3', '5', '2024', '2024-05-26 06:27:07', '2024-05-26 06:27:07'),
(129, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 2, '3', '5', '2024', '2024-05-26 06:27:07', '2024-05-26 06:27:07'),
(130, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 3, '4', '5', '2024', '2024-05-26 06:27:07', '2024-05-26 06:27:07'),
(131, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 4, '4', '5', '2024', '2024-05-26 06:27:07', '2024-05-26 06:27:07'),
(132, '9baf31a7-4ba0-459d-8c3d-10ee6620dee0', 1, '4', '5', '2024', '2024-05-26 06:27:24', '2024-05-26 06:27:24'),
(133, '9baf31a7-4ba0-459d-8c3d-10ee6620dee0', 2, '5', '5', '2024', '2024-05-26 06:27:24', '2024-05-26 06:27:24'),
(134, '9baf31a7-4ba0-459d-8c3d-10ee6620dee0', 3, '5', '5', '2024', '2024-05-26 06:27:24', '2024-05-26 06:27:24'),
(135, '9baf31a7-4ba0-459d-8c3d-10ee6620dee0', 4, '1', '5', '2024', '2024-05-26 06:27:24', '2024-05-26 06:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `description`, `category`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Pengabdian diri dalam bidang Kesehatan', 'Pengabdian diri dalam bidang Kesehatan', 'Benefit', '3', '2023-06-17 06:26:57', '2024-05-24 14:29:43'),
(2, 'Ketepatan dalam melakukan absensi', 'Ketepatan dalam melakukan absensi', 'Benefit', '2', '2023-06-18 19:30:16', '2024-05-24 14:29:51'),
(3, 'Kompetensi dalam melaksanakan tugas dan tanggung jawab', 'Kompetensi dalam melaksanakan tugas dan tanggung jawab', 'Benefit', '4', '2023-06-18 19:30:44', '2024-05-24 14:30:14'),
(4, 'Etika dan profesi', 'Etika dan profesi', 'Benefit', '1', '2023-06-18 19:31:08', '2024-05-24 14:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(3, '2023_06_13_005627_create_criterias_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(9, '2023_06_14_010839_drop_personal_access_tokens_table', 2),
(10, '2023_06_14_004326_create_assessments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('karyawan','hr') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uuid`, `name`, `email`, `password`, `phone_number`, `address`, `role`, `created_at`, `updated_at`) VALUES
('1d19a309-a59c-46ae-a6de-02984c746a04', 'A1', 'deni@gmail.com', '$2y$10$2ulKY2tO0YtQeNVwwkUpnu9amhFnF0d4LShwa8tjlHJI1iQZFoqh2', '082340352704', 'JL. Anggrek No 7', 'karyawan', '2023-06-18 18:47:43', '2024-05-24 14:26:05'),
('2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 'A2', 'sari@gmail.com', '$2y$10$1KZvKZswicQqyo.KkYS6bOr736klgjR13rBzFLgXBVYqUSfpnoqfC', '082340358702', 'JL. Anggrek No 7', 'karyawan', '2023-06-18 19:35:18', '2024-05-24 14:26:11'),
('39ccd1e2-2cea-46b4-9681-c617a0fa0725', 'A3', 'fajar@gmail.com', '$2y$10$pgNIdlIpbdonZpotqlC38.R7nzk8K43YLfKqSZCRKRElUHgzEm3cy', '082340352709', 'JL. Anggrek No 18', 'karyawan', '2023-06-18 19:35:41', '2024-05-24 14:26:19'),
('4e1ae9bd-2118-44e0-96d3-da51f57a7b5e', 'A4', 'ikhsan@gmail.com', '$2y$10$mxiewxNQE4Pc9bS2ZNQT9.52AzkmTaT.WLHdiSgube4fA1rTUeQ02', '085454545454', 'solo', 'karyawan', '2024-05-24 13:43:47', '2024-05-24 14:26:30'),
('5128018d-bac6-4313-bede-af4cb320bbef', 'A5', 'ali@gmail.com', '$2y$10$8VSCj9.HmNMAqCflyiT9u.kWVsZwde6DhjN5fqMt2/kLMmxRpUnuu', '081340358787', 'JL. Anggrek No 6', 'karyawan', '2023-06-18 19:36:52', '2024-05-24 14:26:43'),
('6f0cc33f-4f7f-4488-9a32-5908652f5941', 'A6', 'putra@gmail.com', '$2y$10$paXVOWx7xkBEP0HzgRs5buHf29oUzIhgE7N6rNN2FkL860ClF3hRK', '082346352709', 'JL. Anggrek No 45', 'karyawan', '2023-06-18 19:36:06', '2024-05-26 06:23:25'),
('7046c342-79e2-4863-8762-11cfc5dc8612', 'A7', 'dini@gmail.com', '$2y$10$dR8bzz7hWlXhq8ZEH0x63umL.ZoL1PqHECAvYlIpCeFGitgPiOS.a', '081340358702', 'JL. Anggrek No 12', 'karyawan', '2023-06-18 19:36:29', '2024-05-26 06:23:37'),
('8d601826-7e9f-47cc-b756-770f3c03b8d5', 'A8', 'doni@gmail.com', '$2y$10$tsf7sF7QoHIUj2bsMzetMe2vUGxwYWL30AU7QnVPrRSo7Zm/rtmjC', '082340612702', 'JL. Anggrek No 18', 'karyawan', '2023-06-18 19:34:53', '2024-05-26 06:23:55'),
('9baf31a7-4ba0-459d-8c3d-10ee6620dee0', 'A10', 'herawatipuspitaningrum00@gmail.com', '$2y$10$08L6HebnOQLioYlsTIDJne/fi2hxFUxOsSuj7XHaGGpaSpzSoY9mi', '085156726352', 'ngruki', 'karyawan', '2024-05-26 06:25:31', '2024-05-26 06:25:31'),
('dd483a1c-0d0b-11ee-9696-d05f643b5f59', 'admin', 'admin', '$2y$10$dR8bzz7hWlXhq8ZEH0x63umL.ZoL1PqHECAvYlIpCeFGitgPiOS.a', '082340372701', 'Jl Subandi 12', 'hr', NULL, NULL),
('face50dd-d119-4a68-a2dc-5e217771a0d4', 'A9', 'hari@gmail.com', '$2y$10$36QTV9bN2MUlTpqSLjYJmeb90RrP5awAEexqmIZZWho30C5rQfqg2', '082340352702', 'JL. Anggrek No 4', 'karyawan', '2023-06-18 04:33:55', '2024-05-26 06:24:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessments_user_uuid_foreign` (`user_uuid`),
  ADD KEY `assessments_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assessments_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
