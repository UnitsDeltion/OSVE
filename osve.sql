-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 21 jun 2022 om 12:17
-- Serverversie: 5.7.33
-- PHP-versie: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osve`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `options` json DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', 'All abilities', NULL, '*', 0, NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21'),
(2, 'examen-beheer', 'Examen beheer', NULL, NULL, 0, NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21'),
(3, 'documentatie', 'Documentatie', NULL, NULL, 0, NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'App\\Models\\User', NULL, NULL, NULL),
(2, 2, 2, 'App\\Models\\User', NULL, NULL, NULL),
(3, 3, 3, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examens`
--

CREATE TABLE `examens` (
  `id` int(10) UNSIGNED NOT NULL,
  `opleiding_id` int(10) UNSIGNED NOT NULL,
  `uitleg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vak_docent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `examens`
--

INSERT INTO `examens` (`id`, `opleiding_id`, `uitleg`, `examen`, `vak`, `vak_docent`, `active`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'B1 K1 Hospitality', 'Hospitality', '97057005@st.deltion.nl', 1),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'P1 K1 TREX', 'TREX', '97057005@st.deltion.nl', 1),
(3, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Schrijven', 'Duits', '97057005@st.deltion.nl', 1),
(4, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Spreken', 'Duits', '97057005@st.deltion.nl', 1),
(5, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Schrijven B1', 'Engels Generiek', '97057005@st.deltion.nl', 1),
(6, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Spreken B1', 'Engels Generiek', '97057005@st.deltion.nl', 1),
(7, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Gesprekken voeren B1', 'Engels Generiek', '97057005@st.deltion.nl', 1),
(8, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Lezen A2', 'Engels Generiek', '97057005@st.deltion.nl', 1),
(9, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'B1 K2 Back Office', 'Back Office', '97057005@st.deltion.nl', 1),
(10, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Luisteren', 'Duits', '97057005@st.deltion.nl', 1),
(11, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.', 'Luisteren', 'Duits', '97057005@st.deltion.nl', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examen_moment`
--

CREATE TABLE `examen_moment` (
  `id` int(10) UNSIGNED NOT NULL,
  `examenid` int(10) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `plaatsen` int(11) NOT NULL,
  `geplande_docenten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examen_opgeven_begin` date NOT NULL,
  `examen_opgeven_eind` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `examen_moment`
--

INSERT INTO `examen_moment` (`id`, `examenid`, `datum`, `tijd`, `plaatsen`, `geplande_docenten`, `examen_opgeven_begin`, `examen_opgeven_eind`) VALUES
(1, 7, '2022-04-10', '16:15:00', 52, '97047008@st.deltion.nl', '2022-01-11', '2022-04-10'),
(2, 6, '2022-04-05', '13:45:00', 35, '97047005@st.deltion.nl', '2022-01-12', '2022-04-05'),
(3, 9, '2022-04-14', '13:30:00', 28, '97047005@st.deltion.nl', '2022-01-07', '2022-04-14'),
(4, 4, '2022-04-13', '13:45:00', 57, '97047005@st.deltion.nl', '2022-01-13', '2022-04-13'),
(5, 4, '2022-04-21', '13:15:00', 27, '97047005@st.deltion.nl', '2022-01-07', '2022-04-21'),
(6, 8, '2022-04-20', '13:15:00', 45, '97047008@st.deltion.nl', '2022-01-07', '2022-04-20'),
(7, 5, '2022-04-06', '15:15:00', 30, '97071583@st.deltion.nl', '2022-01-17', '2022-04-06'),
(8, 11, '2022-04-11', '16:30:00', 47, '97071583@st.deltion.nl', '2022-01-03', '2022-04-11'),
(9, 2, '2022-04-04', '08:15:00', 1, '97071583@st.deltion.nl', '2022-01-13', '2022-04-04'),
(10, 10, '2022-04-27', '11:30:00', 30, '97047008@st.deltion.nl', '2022-01-04', '2022-04-27'),
(11, 7, '2022-04-10', '09:30:00', 56, '97047005@st.deltion.nl', '2022-01-04', '2022-04-10'),
(12, 1, '2022-04-14', '09:15:00', 1, '97071583@st.deltion.nl', '2022-01-11', '2022-04-14'),
(13, 7, '2022-04-28', '17:00:00', 35, '97047008@st.deltion.nl', '2022-01-04', '2022-04-28'),
(14, 6, '2022-04-27', '08:15:00', 15, '97047005@st.deltion.nl', '2022-01-12', '2022-04-27'),
(15, 8, '2022-04-10', '13:00:00', 27, '97071583@st.deltion.nl', '2022-01-12', '2022-04-10'),
(16, 1, '2022-04-06', '08:30:00', 46, '97071583@st.deltion.nl', '2022-01-14', '2022-04-06'),
(17, 11, '2022-04-06', '14:45:00', 24, '97071583@st.deltion.nl', '2022-01-17', '2022-04-06'),
(18, 2, '2022-04-14', '14:45:00', 28, '97047005@st.deltion.nl', '2022-01-05', '2022-04-14'),
(19, 11, '2022-04-12', '17:00:00', 22, '97047008@st.deltion.nl', '2022-01-13', '2022-04-12'),
(20, 7, '2022-04-04', '15:15:00', 13, '97047008@st.deltion.nl', '2022-01-04', '2022-04-04'),
(21, 11, '2022-04-27', '13:00:00', 26, '97071583@st.deltion.nl', '2022-01-14', '2022-04-27'),
(22, 4, '2022-04-06', '08:30:00', 21, '97047005@st.deltion.nl', '2022-01-03', '2022-04-06'),
(23, 5, '2022-04-05', '10:00:00', 16, '97047008@st.deltion.nl', '2022-01-05', '2022-04-05'),
(24, 1, '2022-04-10', '14:45:00', 44, '97071583@st.deltion.nl', '2022-01-06', '2022-04-10'),
(25, 4, '2022-04-18', '17:30:00', 56, '97071583@st.deltion.nl', '2022-01-04', '2022-04-18'),
(26, 2, '2022-04-17', '10:30:00', 47, '97071583@st.deltion.nl', '2022-01-11', '2022-04-17'),
(27, 1, '2022-04-21', '11:00:00', 25, '97047005@st.deltion.nl', '2022-01-17', '2022-04-21'),
(28, 11, '2022-04-10', '16:00:00', 29, '97047005@st.deltion.nl', '2022-01-05', '2022-04-10'),
(29, 5, '2022-04-12', '09:45:00', 38, '97071583@st.deltion.nl', '2022-01-13', '2022-04-12'),
(30, 6, '2022-04-20', '15:30:00', 52, '97071583@st.deltion.nl', '2022-01-06', '2022-04-20'),
(31, 6, '2022-04-25', '09:30:00', 18, '97047008@st.deltion.nl', '2022-01-04', '2022-04-25'),
(32, 6, '2022-04-26', '14:15:00', 23, '97071583@st.deltion.nl', '2022-01-17', '2022-04-26'),
(33, 8, '2022-04-13', '16:45:00', 42, '97047008@st.deltion.nl', '2022-01-06', '2022-04-13'),
(34, 8, '2022-04-12', '08:45:00', 55, '97071583@st.deltion.nl', '2022-01-07', '2022-04-12'),
(35, 8, '2022-04-05', '09:15:00', 1, '97047005@st.deltion.nl', '2022-01-14', '2022-04-05'),
(36, 1, '2022-04-12', '17:30:00', 24, '97047005@st.deltion.nl', '2022-01-06', '2022-04-12'),
(37, 4, '2022-04-28', '15:15:00', 30, '97071583@st.deltion.nl', '2022-01-06', '2022-04-28'),
(38, 11, '2022-04-28', '09:00:00', 52, '97047005@st.deltion.nl', '2022-01-06', '2022-04-28'),
(39, 8, '2022-04-06', '14:15:00', 51, '97047005@st.deltion.nl', '2022-01-03', '2022-04-06'),
(40, 4, '2022-04-18', '17:15:00', 48, '97047008@st.deltion.nl', '2022-01-11', '2022-04-18'),
(41, 7, '2022-04-17', '09:45:00', 16, '97047005@st.deltion.nl', '2022-01-07', '2022-04-17'),
(42, 2, '2022-04-11', '10:30:00', 35, '97047005@st.deltion.nl', '2022-01-13', '2022-04-11'),
(43, 2, '2022-04-18', '12:15:00', 52, '97071583@st.deltion.nl', '2022-01-12', '2022-04-18'),
(44, 10, '2022-04-27', '09:30:00', 26, '97047005@st.deltion.nl', '2022-01-12', '2022-04-27'),
(45, 7, '2022-04-21', '13:00:00', 31, '97047008@st.deltion.nl', '2022-01-10', '2022-04-21'),
(46, 1, '2022-04-28', '12:15:00', 9, '97047005@st.deltion.nl', '2022-01-14', '2022-04-28'),
(47, 7, '2022-04-27', '08:00:00', 35, '97047005@st.deltion.nl', '2022-01-13', '2022-04-27'),
(48, 1, '2022-04-12', '08:15:00', 3, '97071583@st.deltion.nl', '2022-01-04', '2022-04-12'),
(49, 5, '2022-04-17', '16:45:00', 7, '97047005@st.deltion.nl', '2022-01-06', '2022-04-17'),
(50, 8, '2022-04-05', '11:15:00', 43, '97047008@st.deltion.nl', '2022-01-14', '2022-04-05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `geplande_examens`
--

CREATE TABLE `geplande_examens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faciliteitenpas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentnummer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opleiding_id` int(10) UNSIGNED NOT NULL,
  `examen` int(10) UNSIGNED NOT NULL,
  `examen_moment` int(10) UNSIGNED NOT NULL,
  `std_bevestigd` int(11) NOT NULL DEFAULT '0',
  `doc_bevestigd` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `geplande_examens_tokens`
--

CREATE TABLE `geplande_examens_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gepland_examen_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_05_100940_create_sessions_table', 1),
(7, '2021_10_05_103113_create_opleidingen_table', 1),
(8, '2021_10_05_103114_create_examens_table', 1),
(9, '2021_10_05_103115_create_examen_moment_table', 1),
(10, '2021_10_05_103116_create_geplande_examens_table', 1),
(11, '2021_11_04_140412_create_geplande_examens_tokens', 1),
(12, '2021_11_08_131753_create_bouncer_tables', 1),
(13, '2021_11_16_121814_create_reglementen_beheer_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleidingen`
--

CREATE TABLE `opleidingen` (
  `id` int(10) UNSIGNED NOT NULL,
  `crebo_nr` int(11) NOT NULL,
  `opleiding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `opleidingen`
--

INSERT INTO `opleidingen` (`id`, `crebo_nr`, `opleiding`) VALUES
(1, 25351, 'Leidinggevende Leisure & Hospitality'),
(2, 25352, 'Leidinggevende Travel & Hospitality'),
(3, 25352, 'Leidinggevende Travel & Hospitality (Internationaal)'),
(4, 25353, 'Zelfstandig medewerker Leisure & Hospitality'),
(5, 25354, 'Zelfstandig medewerker Travel & Hospitality');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ability_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(1, 1, 3, 'roles', 0, NULL),
(2, 2, 2, 'roles', 0, NULL),
(3, 3, 1, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reglement`
--

CREATE TABLE `reglement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reglement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reglement`
--

INSERT INTO `reglement` (`id`, `reglement`) VALUES
(1, 'https://www.deltion.nl/getmedia/ec790e9f-53cc-4be7-9f26-ac8947fd7ebb/N20050CvB-Examenreglement-schooljaar-2020-2021-def.pdf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'ontwikkelaar', 'Ontwikkelaar', NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21'),
(2, 'docent', 'Docent', NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21'),
(3, 'beheerder', 'Beheerder', NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yN8m4kI1UHdTOZrRXSRcTs1Kp6JrGUESiKxBMHqu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2lPZk4yMkhvUERncHNjOFVWVHJCbWg2QVlZTjMxZVNiSTY3RGVZNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1655813847);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Martijn', 'Schuman', 'martijnschuman@hotmail.com', '$2y$10$BYehzU1mdRX2Ml9YNju2DuTG2wEKChzLmMiwIl1QLYXt5IZZMKW5.', NULL, NULL, NULL, NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21'),
(2, 'Koos', 'Starreveld', 'kstarreveld@deltion.nl', '$2y$10$qmZ2UhlIEk7RskfaXI8gYOCX04BpErN3dwbe85i7LXs0jGDDNnP6C', NULL, NULL, NULL, NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21'),
(3, 'Annelies', 'van Midwoud', 'amidwoud@deltion.nl', '$2y$10$d9nC5jTdkcLQ7RsGecJG.ONZFTQLd4Gascee7aiER6zgIBpk9P9OS', NULL, NULL, NULL, NULL, NULL, '2022-06-21 10:17:21', '2022-06-21 10:17:21');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexen voor tabel `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexen voor tabel `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examens_opleiding_id_index` (`opleiding_id`);

--
-- Indexen voor tabel `examen_moment`
--
ALTER TABLE `examen_moment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_moment_examenid_index` (`examenid`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexen voor tabel `geplande_examens`
--
ALTER TABLE `geplande_examens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `geplande_examens_opleiding_id_foreign` (`opleiding_id`),
  ADD KEY `geplande_examens_examen_foreign` (`examen`),
  ADD KEY `geplande_examens_examen_moment_foreign` (`examen_moment`);

--
-- Indexen voor tabel `geplande_examens_tokens`
--
ALTER TABLE `geplande_examens_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crebo_nr` (`crebo_nr`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indexen voor tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexen voor tabel `reglement`
--
ALTER TABLE `reglement`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexen voor tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `examens`
--
ALTER TABLE `examens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `examen_moment`
--
ALTER TABLE `examen_moment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `geplande_examens`
--
ALTER TABLE `geplande_examens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `geplande_examens_tokens`
--
ALTER TABLE `geplande_examens_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reglement`
--
ALTER TABLE `reglement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `examens`
--
ALTER TABLE `examens`
  ADD CONSTRAINT `examens_ibfk_1` FOREIGN KEY (`opleiding_id`) REFERENCES `opleidingen` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `examen_moment`
--
ALTER TABLE `examen_moment`
  ADD CONSTRAINT `examen_moment_ibfk_1` FOREIGN KEY (`examenid`) REFERENCES `examens` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `geplande_examens`
--
ALTER TABLE `geplande_examens`
  ADD CONSTRAINT `geplande_examens_examen_foreign` FOREIGN KEY (`examen`) REFERENCES `examens` (`id`),
  ADD CONSTRAINT `geplande_examens_examen_moment_foreign` FOREIGN KEY (`examen_moment`) REFERENCES `examen_moment` (`id`),
  ADD CONSTRAINT `geplande_examens_opleiding_id_foreign` FOREIGN KEY (`opleiding_id`) REFERENCES `opleidingen` (`id`);

--
-- Beperkingen voor tabel `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
