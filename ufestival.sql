-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 mei 2026 om 13:14
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ufestival`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acts`
--

CREATE TABLE `acts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `acts`
--

INSERT INTO `acts` (`id`, `name`, `type`) VALUES
(1, 'Armin van Buuren', 'DJ'),
(2, 'Kensington', 'Band'),
(3, 'De Staat', 'Band'),
(4, 'Navarone', 'Band'),
(5, 'Dotan', 'Singer'),
(6, 'Froukje', 'Singer'),
(7, 'Martin Garrix', 'DJ'),
(8, 'Within Temptation', 'Band'),
(9, 'Chef\'Special', 'Band'),
(10, 'Eefje de Visser', 'Singer'),
(11, 'Spinvis', 'Singer'),
(12, 'Talent set 1', 'Talent'),
(13, 'Talent set 2', 'Talent'),
(14, 'Talent set 3', 'Talent'),
(15, 'Talent set 4', 'Talent'),
(16, 'Talent set 5', 'Talent'),
(17, 'Talent set 6', 'Talent'),
(18, 'Talent set 7', 'Talent'),
(19, 'Comedy', 'Comedy'),
(20, 'Lecture', 'Theater'),
(21, 'Theater', 'Theater'),
(22, 'Movie', 'Movie'),
(23, 'Performance', 'Performance'),
(24, 'Illusionist', 'Magic'),
(25, 'Magic Show', 'Magic'),
(26, 'DJ set 1', 'DJ'),
(27, 'DJ set 2', 'DJ'),
(28, 'DJ set 3', 'DJ'),
(29, 'DJ set 4', 'DJ'),
(30, 'DJ set 5', 'DJ'),
(31, 'DJ set 6', 'DJ'),
(32, 'DJ set 7', 'DJ'),
(33, 'DJ set 8', 'DJ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `title_nl` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `text_nl` text DEFAULT NULL,
  `text_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`id`, `section_id`, `title_nl`, `title_en`, `text_nl`, `text_en`) VALUES
(1, 1, 'Algemeen & Contact', NULL, 'Het ❤️U Festival is voor studenten in Utrecht. Locatie: Strijkviertel. Datum: 5 september 2026 12:00 - 23:00', NULL),
(2, 2, 'Fiets', NULL, 'Gratis fietsenstalling beschikbaar', NULL),
(3, 2, 'Auto', NULL, 'Parkeren bij P+R Papendorp, VOL=VOL', NULL),
(4, 2, 'OV', NULL, 'Plan via 9292.nl', NULL),
(5, 2, 'Shuttlebus', NULL, 'Vanaf Utrecht Centraal gratis bus', NULL),
(6, 2, 'Taxi', NULL, 'Gebruik Kiss & Ride zone', NULL),
(7, 3, 'Lockers', NULL, 'Kluisjes voor 3-4 jassen, onbeperkt openen/sluiten', NULL),
(8, 4, 'Golden GLU', NULL, 'Speciale privileges zoals snelle toiletten en bars', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `festival_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `days`
--

INSERT INTO `days` (`id`, `name`, `festival_date`) VALUES
(1, 'Zaterdag', '2026-08-15'),
(2, 'Zondag', '2026-08-16');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question_nl` text DEFAULT NULL,
  `question_en` text DEFAULT NULL,
  `answer_nl` text DEFAULT NULL,
  `answer_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `faq`
--

INSERT INTO `faq` (`id`, `question_nl`, `question_en`, `answer_nl`, `answer_en`) VALUES
(1, 'Ik gebruik medicatie. Wat nu?', NULL, 'Medicatie toegestaan met doktersverklaring', NULL),
(2, 'Mag ik het terrein verlaten?', NULL, 'Nee, dat is niet toegestaan', NULL),
(3, 'Zijn er lockers?', NULL, 'Ja, medium & grote lockers beschikbaar', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `schedule`
--

INSERT INTO `schedule` (`id`, `day_id`, `stage_id`, `act_id`, `start_time`, `end_time`) VALUES
(1, 1, 1, 1, '10:30:00', '12:00:00'),
(2, 1, 1, 2, '12:30:00', '14:00:00'),
(3, 1, 1, 3, '14:30:00', '16:30:00'),
(4, 1, 1, 4, '17:00:00', '18:30:00'),
(5, 1, 1, 5, '19:15:00', '21:15:00'),
(6, 1, 1, 6, '22:00:00', '00:00:00'),
(7, 1, 2, 12, '10:00:00', '11:00:00'),
(8, 1, 2, 13, '11:30:00', '13:00:00'),
(9, 1, 2, 14, '13:30:00', '15:00:00'),
(10, 1, 2, 15, '15:30:00', '17:00:00'),
(11, 1, 2, 16, '17:30:00', '18:30:00'),
(12, 1, 2, 17, '19:15:00', '20:45:00'),
(13, 1, 2, 18, '21:30:00', '23:00:00'),
(14, 1, 3, 19, '12:15:00', '13:15:00'),
(15, 1, 3, 20, '13:45:00', '14:45:00'),
(16, 1, 3, 21, '15:15:00', '16:45:00'),
(17, 1, 3, 22, '17:30:00', '19:30:00'),
(18, 1, 3, 23, '20:15:00', '21:15:00'),
(19, 1, 3, 24, '22:00:00', '23:00:00'),
(20, 1, 4, 26, '10:00:00', '11:00:00'),
(21, 1, 4, 27, '11:00:00', '12:30:00'),
(22, 1, 4, 28, '12:30:00', '14:00:00'),
(23, 1, 4, 29, '14:00:00', '15:30:00'),
(24, 1, 4, 30, '15:30:00', '17:30:00'),
(25, 1, 4, 31, '17:30:00', '19:30:00'),
(26, 1, 4, 32, '19:30:00', '21:30:00'),
(27, 1, 4, 33, '21:30:00', '00:00:00'),
(28, 2, 1, 7, '11:00:00', '13:00:00'),
(29, 2, 1, 8, '13:45:00', '15:45:00'),
(30, 2, 1, 9, '16:30:00', '18:30:00'),
(31, 2, 1, 10, '19:15:00', '21:15:00'),
(32, 2, 1, 11, '22:00:00', '00:00:00'),
(33, 2, 2, 12, '10:00:00', '11:00:00'),
(34, 2, 2, 13, '11:30:00', '13:00:00'),
(35, 2, 2, 14, '13:30:00', '15:00:00'),
(36, 2, 2, 15, '15:30:00', '17:30:00'),
(37, 2, 2, 16, '18:15:00', '19:45:00'),
(38, 2, 2, 17, '20:30:00', '22:30:00'),
(39, 2, 3, 19, '12:00:00', '13:00:00'),
(40, 2, 3, 20, '13:30:00', '14:30:00'),
(41, 2, 3, 21, '15:30:00', '16:30:00'),
(42, 2, 3, 22, '17:30:00', '19:30:00'),
(43, 2, 3, 25, '20:15:00', '21:45:00'),
(44, 2, 4, 26, '10:00:00', '10:30:00'),
(45, 2, 4, 27, '10:30:00', '12:30:00'),
(46, 2, 4, 28, '12:30:00', '13:30:00'),
(47, 2, 4, 29, '13:30:00', '15:30:00'),
(48, 2, 4, 30, '15:30:00', '17:00:00'),
(49, 2, 4, 31, '17:00:00', '18:30:00'),
(50, 2, 4, 32, '18:30:00', '21:00:00'),
(51, 2, 4, 33, '21:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `key_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `sections`
--

INSERT INTO `sections` (`id`, `key_name`) VALUES
(1, 'general'),
(2, 'transport'),
(3, 'lockers'),
(4, 'golden_glu');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `stages`
--

INSERT INTO `stages` (`id`, `name`) VALUES
(1, 'Poton'),
(2, 'The Lake'),
(3, 'The Club'),
(4, 'Hanggar');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `acts`
--
ALTER TABLE `acts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexen voor tabel `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `acts`
--
ALTER TABLE `acts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT voor een tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
