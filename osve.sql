-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 06 jan 2022 om 17:47
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
(1, '*', 'All abilities', NULL, '*', 0, NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31'),
(2, 'examen-beheer', 'Examen beheer', NULL, NULL, 0, NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31'),
(3, 'documentatie', 'Documentatie', NULL, NULL, 0, NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31');

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
(1, 3, 1, 'App\\Models\\User', NULL, NULL, NULL),
(5, 2, 4, 'App\\Models\\User', NULL, NULL, NULL),
(6, 3, 3, 'App\\Models\\User', NULL, NULL, NULL),
(7, 3, 2, 'App\\Models\\User', NULL, NULL, NULL);

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
(1, 5, '2022-01-24', '12:15:00', 54, '97071583@st.deltion.nl', '2021-12-12', '2022-01-24'),
(2, 6, '2022-01-10', '15:30:00', 31, '97047008@st.deltion.nl', '2021-12-06', '2022-01-10'),
(3, 4, '2022-01-10', '08:30:00', 56, '97047008@st.deltion.nl', '2021-12-17', '2022-01-10'),
(4, 11, '2022-01-18', '09:30:00', 32, '97047005@st.deltion.nl', '2021-12-17', '2022-01-18'),
(5, 5, '2022-01-07', '14:30:00', 28, '97047008@st.deltion.nl', '2021-12-12', '2022-01-07'),
(6, 4, '2022-01-06', '16:45:00', 11, '97071583@st.deltion.nl', '2021-12-14', '2022-01-06'),
(7, 4, '2022-01-28', '08:15:00', 5, '97071583@st.deltion.nl', '2021-12-14', '2022-01-28'),
(8, 4, '2022-01-12', '13:45:00', 27, '97047005@st.deltion.nl', '2021-12-13', '2022-01-12'),
(9, 10, '2022-01-04', '10:00:00', 26, '97047008@st.deltion.nl', '2021-12-14', '2022-01-04'),
(10, 11, '2022-01-19', '13:45:00', 22, '97071583@st.deltion.nl', '2021-12-10', '2022-01-19'),
(11, 10, '2022-01-26', '14:45:00', 17, '97071583@st.deltion.nl', '2021-12-03', '2022-01-26'),
(12, 1, '2022-01-27', '13:00:00', 31, '97047008@st.deltion.nl', '2021-12-04', '2022-01-27'),
(13, 6, '2022-01-27', '10:15:00', 17, '97047005@st.deltion.nl', '2021-12-10', '2022-01-27'),
(14, 9, '2022-01-25', '13:30:00', 22, '97071583@st.deltion.nl', '2021-12-03', '2022-01-25'),
(15, 4, '2022-01-28', '16:30:00', 32, '97047008@st.deltion.nl', '2021-12-14', '2022-01-28'),
(16, 8, '2022-01-19', '17:30:00', 16, '97047005@st.deltion.nl', '2021-12-14', '2022-01-19'),
(17, 6, '2022-01-21', '11:15:00', 16, '97071583@st.deltion.nl', '2021-12-14', '2022-01-21'),
(18, 5, '2022-01-14', '15:00:00', 4, '97047008@st.deltion.nl', '2021-12-12', '2022-01-14'),
(19, 4, '2022-01-03', '16:00:00', 24, '97047008@st.deltion.nl', '2021-12-04', '2022-01-03'),
(20, 7, '2022-01-31', '11:15:00', 42, '97047005@st.deltion.nl', '2021-12-13', '2022-01-31'),
(21, 7, '2022-01-11', '08:00:00', 10, '97071583@st.deltion.nl', '2021-12-10', '2022-01-11'),
(22, 1, '2022-01-13', '12:00:00', 8, '97047008@st.deltion.nl', '2021-12-11', '2022-01-13'),
(23, 6, '2022-01-14', '17:30:00', 50, '97047008@st.deltion.nl', '2021-12-13', '2022-01-14'),
(24, 10, '2022-01-06', '14:45:00', 60, '97047008@st.deltion.nl', '2021-12-03', '2022-01-06'),
(25, 5, '2022-01-13', '14:30:00', 14, '97047005@st.deltion.nl', '2021-12-05', '2022-01-13'),
(26, 8, '2022-01-18', '09:30:00', 25, '97047005@st.deltion.nl', '2021-12-12', '2022-01-18'),
(27, 8, '2022-01-06', '12:45:00', 53, '97071583@st.deltion.nl', '2021-12-05', '2022-01-06'),
(28, 3, '2022-01-28', '14:15:00', 3, '97047005@st.deltion.nl', '2021-12-05', '2022-01-28'),
(29, 6, '2022-01-24', '13:15:00', 46, '97047008@st.deltion.nl', '2021-12-17', '2022-01-24'),
(30, 6, '2022-01-20', '17:00:00', 1, '97071583@st.deltion.nl', '2021-12-10', '2022-01-20'),
(31, 2, '2022-01-03', '17:30:00', 14, '97047008@st.deltion.nl', '2021-12-05', '2022-01-03'),
(32, 6, '2022-01-18', '10:00:00', 16, '97047005@st.deltion.nl', '2021-12-06', '2022-01-18'),
(33, 6, '2022-01-04', '15:00:00', 9, '97071583@st.deltion.nl', '2021-12-11', '2022-01-04'),
(34, 10, '2022-01-05', '11:00:00', 16, '97047005@st.deltion.nl', '2021-12-12', '2022-01-05'),
(35, 9, '2022-01-05', '09:30:00', 36, '97047008@st.deltion.nl', '2021-12-07', '2022-01-05'),
(36, 5, '2022-01-10', '15:00:00', 12, '97047008@st.deltion.nl', '2021-12-14', '2022-01-10'),
(37, 6, '2022-01-21', '11:00:00', 8, '97047008@st.deltion.nl', '2021-12-05', '2022-01-21'),
(38, 10, '2022-01-11', '15:45:00', 27, '97047008@st.deltion.nl', '2021-12-10', '2022-01-11'),
(39, 7, '2022-01-11', '13:15:00', 16, '97047005@st.deltion.nl', '2021-12-07', '2022-01-11'),
(40, 11, '2022-01-19', '08:45:00', 6, '97071583@st.deltion.nl', '2021-12-10', '2022-01-19'),
(41, 7, '2022-01-25', '10:15:00', 54, '97047005@st.deltion.nl', '2021-12-06', '2022-01-25'),
(42, 10, '2022-01-13', '11:30:00', 11, '97047008@st.deltion.nl', '2021-12-17', '2022-01-13'),
(43, 6, '2022-01-06', '17:00:00', 15, '97071583@st.deltion.nl', '2021-12-05', '2022-01-06'),
(44, 11, '2022-01-27', '11:15:00', 43, '97047005@st.deltion.nl', '2021-12-07', '2022-01-27'),
(45, 7, '2022-01-07', '17:30:00', 33, '97071583@st.deltion.nl', '2021-12-11', '2022-01-07'),
(46, 1, '2022-01-17', '08:15:00', 37, '97047008@st.deltion.nl', '2021-12-07', '2022-01-17'),
(47, 1, '2022-01-06', '08:00:00', 41, '97071583@st.deltion.nl', '2021-12-03', '2022-01-06'),
(48, 11, '2022-01-12', '13:15:00', 32, '97071583@st.deltion.nl', '2021-12-05', '2022-01-12'),
(49, 7, '2022-01-17', '08:30:00', 32, '97071583@st.deltion.nl', '2021-12-10', '2022-01-17'),
(50, 8, '2022-01-21', '12:45:00', 23, '97071583@st.deltion.nl', '2021-12-10', '2022-01-21');

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
(1, 'ontwikkelaar', 'Ontwikkelaar', NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31'),
(2, 'docent', 'Docent', NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31'),
(3, 'beheerder', 'Beheerder', NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31');

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
('8gWWzV77E1ahgUMHtfgAfNprJ9YvuhC9QkoL0j8H', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWGdMUXZVUnJkSUdpY3M1aUdYVG1yMmttT2ZwQW9vMVk3Z0U0RVJiQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZWhlZXIvdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkb0FCOGVHSkg1bFFQejBqbm84QXlJLlc1SlViMDJ5SC93Z1BZLmlhTUlxQWhjblJJQVhLeW0iO30=', 1641491200),
('m7MGOWpu2NSqvirBX88uA3AbLrp0iwvWJlHm8PCI', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUndIbGw2cUdDcXhLZkQwVmJDN1Z6ZEFTbEY3dmVPWHExVndIRk5mVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZWhlZXIvZXhhbWVucyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRoMy5rbWZVWDRMeWpOLnF3b29UdG9PYnJBeEZaeWdkVFhoQjh4WFJYamVuVm9mazNDNGlrVyI7fQ==', 1641491234);

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
(1, 'Martijn', 'Schuman', 'martijnschuman@hotmail.com', '$2y$10$oAB8eGJH5lQPz0jno8AyI.W5JUb02yH/wgPY.iaMIqAhcnRIAXKym', NULL, NULL, NULL, NULL, NULL, '2022-01-06 15:46:31', '2022-01-06 15:46:31'),
(2, 'Koos', 'Starreveld', 'kstarreveld@deltion.nl', '$2y$10$sqtrZlPE6.3cKzViO4o.wOUZY03MVFkux8RkrLX0508.Qsg4L8xdm', NULL, NULL, NULL, NULL, NULL, '2022-01-06 16:43:48', '2022-01-06 16:43:48'),
(3, 'Annelies', 'van Midwoud', 'amidwoud@deltion.nl', '$2y$10$o/trMVhgW47LsJtrFAvVG.ArAUlieL.CuqQ3gLj/Zj3OBNDVhp38.', NULL, NULL, NULL, NULL, NULL, '2022-01-06 16:45:08', '2022-01-06 16:45:08'),
(4, 'Test', 'Docent', 'testdocent@deltion.nl', '$2y$10$h3.kmfUX4LyjN.qwooTtoObrAxFZygdTXhB8xXRXjenVofk3C4ikW', NULL, NULL, NULL, NULL, NULL, '2022-01-06 16:46:03', '2022-01-06 16:46:03');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
