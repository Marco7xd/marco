-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 14. Nov 2017 um 18:49
-- Server-Version: 5.7.17
-- PHP-Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `laravel-basics`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_13_134318_create_users_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `email`, `first_name`, `password`, `remember_token`) VALUES
(1, '2017-11-13 13:39:46', '2017-11-13 13:39:46', 'test@test.de', 'max', '$2y$10$i6zI/DAmtNtDzagFRmoZtONmtBmmNMzfzt8Hm19Rq8UPAypVi5SDq', NULL),
(6, '2017-11-13 14:17:01', '2017-11-13 14:17:01', 'test@web.de', 'test', '$2y$10$qd39ZbHvRdwWeAi66fbwlekaqk7MRQXFP4JYe6hKZWLPpj9JhWVr.', NULL),
(7, '2017-11-13 14:47:12', '2017-11-13 14:47:12', 'chris@web.de', 'chris', '$2y$10$cTw87LeDFIYm0.x/RJxAF.xUC0OT8jWpYgPawCfU8rwt6wLD6Et/i', NULL),
(10, '2017-11-13 15:41:24', '2017-11-13 15:41:24', 'test@hotmail.com', 'test', '$2y$10$ogEmiDDuf4bsvdcRxoja5egd0.BdZq/xFoFyy8wnY63bdQ7ft3vOu', NULL),
(11, '2017-11-13 15:52:25', '2017-11-13 15:52:25', 'test@hotmail.com', 'test', '$2y$10$tdD.jGOCjEJc3v18YYz8/OSAcbFtmQoIYKZaGPA2MScWjrRoJTG06', NULL),
(12, '2017-11-13 15:58:24', '2017-11-13 15:58:24', 'test@hotmail.com', 'test', '$2y$10$EJWR8AUHvdN3C0TIbPMWQek5LPoi.v3w0DFXUD8oMch4hyBSl0eym', NULL),
(13, '2017-11-13 16:03:55', '2017-11-13 16:03:55', 'test@hotmail.com', 'test', '$2y$10$zCSDuWjkn0pNlUEjJXOADuIjQgTHaXplzb.Nk5H6gayfpIdBfGtlu', NULL),
(14, '2017-11-13 16:09:10', '2017-11-13 16:09:10', 'test@hotmail.com', 'test', '$2y$10$9ccSYZoXAvwOrV1RYkcyPe3oMuhx5zy2FFHKDO.Sl6KPOd5EuGlkS', NULL),
(15, '2017-11-13 16:09:24', '2017-11-13 16:09:24', 'test@hotmail.com', 'test', '$2y$10$x1yMRJUCx1bwYGU1kS5aM.HlUjNwHtROYafUrgtnsFQDzkkFLYbRq', NULL),
(16, '2017-11-13 16:12:55', '2017-11-13 16:12:55', 'test@hotmail.com', 'test', '$2y$10$RspH4Kyi.HVM2gAfF//lxe1ssInocW0nn699UI6qlLnhLVgVg.xOC', NULL),
(17, '2017-11-14 11:18:59', '2017-11-14 11:18:59', 'test@test.to', 'root', '$2y$10$srQRQTmWotg7LU5lP5Fng.GLx0nTNf3nrO1x83ZZuQYaW3Lb4xra6', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
