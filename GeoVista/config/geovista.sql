-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Mrz 2025 um 12:28
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `geovista`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `isCorrectAnswer` tinyint(1) NOT NULL,
  `fk_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `answer`
--

INSERT INTO `answer` (`id_answer`, `description`, `isCorrectAnswer`, `fk_question`) VALUES
(5, 'Vilnius', 0, 1),
(6, 'Brüssel', 1, 1),
(7, 'Podgorica', 0, 1),
(8, 'Dublin', 0, 1),
(9, 'London', 1, 2),
(10, 'Reykjavík', 0, 2),
(11, 'Wien', 0, 2),
(12, 'Bern', 0, 2),
(13, 'Wien', 0, 3),
(14, 'Paris', 0, 3),
(15, 'Brüssel', 0, 3),
(16, 'Berlin', 1, 3),
(17, 'Lissabon', 1, 4),
(18, 'Madrid', 0, 4),
(19, 'Skopje', 0, 4),
(20, 'Sofia', 0, 4),
(21, 'Rom', 0, 5),
(22, 'Zagreb', 0, 5),
(23, 'Prag', 1, 5),
(24, 'Belgrad', 0, 5),
(25, 'Wien', 1, 6),
(26, 'Amsterdam', 0, 6),
(27, 'Oslo', 0, 6),
(28, 'Stockholm', 0, 6),
(29, 'London', 0, 7),
(30, 'Dublin', 1, 7),
(31, 'Amsterdam', 0, 7),
(32, 'Wien', 0, 7),
(33, 'Warschau', 0, 8),
(34, 'Berlin', 0, 8),
(35, 'Brüssel', 0, 8),
(36, 'Bratislava', 1, 8),
(37, 'Bratislava', 0, 9),
(38, 'Dublin', 0, 9),
(39, 'Helsinki', 0, 9),
(40, 'Reykjavík', 1, 9),
(41, 'Stockholm', 0, 10),
(42, 'Luxemburg', 0, 10),
(43, 'Oslo', 1, 10),
(44, 'Kirschinau', 0, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geovista`
--

CREATE TABLE `geovista` (
  `pk_geovista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `geovista`
--

INSERT INTO `geovista` (`pk_geovista`) VALUES
(1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fk_quiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `question`
--

INSERT INTO `question` (`id_question`, `description`, `image`, `fk_quiz`) VALUES
(1, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/bruessel.jpg', 2),
(2, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/london.jpg', 2),
(3, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/berlin.jpg', 2),
(4, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/lissabon.jpg', 2),
(5, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/prag.jpg', 2),
(6, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/wien.jpg', 2),
(7, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/dublin.jpg', 2),
(8, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/bratislava', 2),
(9, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/reykjavik', 2),
(10, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/oslo.jpg', 2),
(11, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/vaduz.jpg', 2),
(12, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/madrid.jpg', 2),
(13, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/rom', 2),
(14, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/athen', 2),
(15, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/paris.jpg', 2),
(16, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/sofia', 2),
(17, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/ljubljana.jpg', 2),
(18, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/kopenhagen.jpg', 2),
(19, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/amsterdam.jpg', 2),
(20, 'Um welche Hauptstadt handelt es sich?', '/res/img/question_img/budapest.jpg', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `fk_geovista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `name`, `icon`, `fk_geovista`) VALUES
(1, 'Länder', NULL, 1),
(2, 'Hauptstädte', NULL, 1),
(3, 'Flaggen', NULL, 1),
(4, 'Länder (Umrisse)', NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `fk_geovista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `fk_question` (`fk_question`);

--
-- Indizes für die Tabelle `geovista`
--
ALTER TABLE `geovista`
  ADD PRIMARY KEY (`pk_geovista`);

--
-- Indizes für die Tabelle `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_quiz` (`fk_quiz`);

--
-- Indizes für die Tabelle `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `fk_geovista_l` (`fk_geovista`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD KEY `fk_geovista` (`fk_geovista`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT für Tabelle `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`fk_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_quiz` FOREIGN KEY (`fk_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_geovista_l` FOREIGN KEY (`fk_geovista`) REFERENCES `geovista` (`pk_geovista`);

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_geovista` FOREIGN KEY (`fk_geovista`) REFERENCES `geovista` (`pk_geovista`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
