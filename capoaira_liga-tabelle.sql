-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 15. Okt 2020 um 14:50
-- Server-Version: 10.3.22-MariaDB-1:10.3.22+maria~stretch
-- PHP-Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `capoaira_liga-tabelle`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `liga-verein`
--

CREATE TABLE `liga-verein` (
  `ligaId` int(11) NOT NULL,
  `vereinsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `liga-verein`
--

INSERT INTO `liga-verein` (`ligaId`, `vereinsId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ligen`
--

CREATE TABLE `ligen` (
  `ligaId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `beschreibung` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `erstelltVon` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ligen`
--

INSERT INTO `ligen` (`ligaId`, `name`, `beschreibung`, `logo`, `erstelltVon`, `keywords`) VALUES
(1, 'Bundesliga', 'Deutsche Profiliga', '1.png', '2', 'Deutschland Bundesliga');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiele`
--

CREATE TABLE `spiele` (
  `spielId` int(11) NOT NULL,
  `heimVerein` int(11) NOT NULL,
  `heimVereinTore` int(11) NOT NULL,
  `auswaertsVerein` int(11) NOT NULL,
  `auswaertsVereinTore` int(11) NOT NULL,
  `spieltagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spieltage`
--

CREATE TABLE `spieltage` (
  `spieltagId` int(11) NOT NULL,
  `von` date NOT NULL,
  `bis` date NOT NULL,
  `ligaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `spieltage`
--

INSERT INTO `spieltage` (`spieltagId`, `von`, `bis`, `ligaId`) VALUES
(1, '2020-09-18', '2020-09-20', 1),
(2, '2020-09-25', '2020-09-27', 1),
(3, '2020-10-02', '2020-10-04', 1),
(4, '2020-10-17', '2020-10-18', 1),
(5, '2020-10-23', '2020-10-26', 1),
(6, '2020-10-30', '2020-11-02', 1),
(7, '2020-11-06', '2020-11-08', 1),
(8, '2020-11-21', '2020-11-22', 1),
(9, '2020-11-27', '2020-11-29', 1),
(10, '2020-12-04', '2020-12-07', 1),
(11, '2020-12-11', '2020-12-13', 1),
(12, '2020-12-15', '2020-12-16', 1),
(13, '2020-12-18', '2020-12-21', 1),
(14, '2021-01-02', '2021-01-04', 1),
(15, '2021-05-22', '2021-05-22', 1),
(16, '2021-01-08', '2021-01-11', 1),
(17, '2021-01-15', '2021-01-17', 1),
(18, '2021-05-15', '2021-05-15', 1),
(19, '2021-05-07', '2021-05-10', 1),
(20, '2021-01-19', '2021-01-20', 1),
(21, '2021-04-23', '2021-04-26', 1),
(22, '2021-01-22', '2021-01-25', 1),
(23, '2021-04-20', '2021-04-21', 1),
(24, '2021-04-16', '2021-04-18', 1),
(25, '2021-01-29', '2021-02-01', 1),
(26, '2021-04-09', '2021-04-12', 1),
(27, '2021-02-05', '2021-02-08', 1),
(28, '2021-04-03', '2021-04-05', 1),
(29, '2021-02-12', '2021-02-15', 1),
(30, '2021-03-19', '2021-03-21', 1),
(31, '2021-02-19', '2021-02-22', 1),
(32, '2021-03-12', '2021-03-15', 1),
(33, '2021-02-26', '2021-03-01', 1),
(34, '2021-03-05', '2021-03-08', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` text NOT NULL,
  `profilbild` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userId`, `username`, `email`, `passwort`, `profilbild`, `status`, `createdAt`) VALUES
(1, 'admin', 'admin@admin.admin', '$2y$10$EdcseY8ry2tCXU7PPHMC9eR5rBi1E.lgM4o2in52k3zOiBq5tK1Aa', 'keinPB.png', 'admin', '2020-10-05'),
(2, 'capoaira', 'capoaira@web.de', '$2y$10$GSJ.hZpkaQfqHayErvUjoe7SbT86Ww89PmERm6Gdx8IVGeuBgOMv.', '2.jpg', 'member', '2020-10-06');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vereine`
--

CREATE TABLE `vereine` (
  `vereinsId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `beschreibung` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `erstelltVon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `vereine`
--

INSERT INTO `vereine` (`vereinsId`, `name`, `beschreibung`, `logo`, `erstelltVon`) VALUES
(1, 'RB Leibzig', '', '1.jpg', '2'),
(2, 'Augsburg', '', '2.jpg', '2'),
(3, 'Eintracht Frankfurt', '', '3.jpg', '2'),
(4, 'FC Bayern', '', '4.jpg', '2'),
(5, 'Borussia Dortmund', '', '5.jpg', '2'),
(6, 'Hoffenheim', '', '6.jpg', '2'),
(7, 'Werder Bremen', '', '7.jpg', '2'),
(8, 'VfB Stuttgart', '', '8.jpg', '2'),
(9, 'Union Berlin', '', '9.jpg', '2'),
(10, 'Arminia Bielefeld', '', '10.jpg', '2'),
(11, 'Mönchengladbach', '', '11.jpg', '2'),
(12, 'Freiburg', '', '12.jpg', '2'),
(13, 'Herta BSC', '', '13.jpg', '2'),
(14, 'Leverkusen', '', '14.jpg', '2'),
(15, 'Hannover 96', '', '15.jpg', '2'),
(16, '1. FC Köln', '', '16.jpg', '2'),
(17, 'Mainz 05', '', '17.jpg', '2'),
(18, 'Schalke 04', '', '18.jpg', '2');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `liga-verein`
--
ALTER TABLE `liga-verein`
  ADD PRIMARY KEY (`ligaId`,`vereinsId`);

--
-- Indizes für die Tabelle `ligen`
--
ALTER TABLE `ligen`
  ADD PRIMARY KEY (`ligaId`);

--
-- Indizes für die Tabelle `spiele`
--
ALTER TABLE `spiele`
  ADD PRIMARY KEY (`spielId`);

--
-- Indizes für die Tabelle `spieltage`
--
ALTER TABLE `spieltage`
  ADD PRIMARY KEY (`spieltagId`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indizes für die Tabelle `vereine`
--
ALTER TABLE `vereine`
  ADD PRIMARY KEY (`vereinsId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ligen`
--
ALTER TABLE `ligen`
  MODIFY `ligaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `spiele`
--
ALTER TABLE `spiele`
  MODIFY `spielId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `spieltage`
--
ALTER TABLE `spieltage`
  MODIFY `spieltagId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `vereine`
--
ALTER TABLE `vereine`
  MODIFY `vereinsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
