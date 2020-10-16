-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Okt 2020 um 13:57
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `liga-tabelle`
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
  `datum` datetime NOT NULL,
  `spieltagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `spiele`
--

INSERT INTO `spiele` (`spielId`, `heimVerein`, `heimVereinTore`, `auswaertsVerein`, `auswaertsVereinTore`, `datum`, `spieltagId`) VALUES
(2, 4, -1, 18, -1, '2020-09-18 20:30:00', 1),
(3, 3, -1, 10, -1, '2020-09-19 15:30:00', 1),
(4, 4, -1, 2, -1, '2021-05-22 15:30:00', 15),
(5, 5, -1, 14, -1, '2021-05-22 15:30:00', 15),
(6, 6, -1, 13, -1, '2021-05-22 15:30:00', 15),
(7, 9, -1, 2, -1, '2020-09-18 15:30:00', 1),
(8, 15, -1, 17, -1, '2021-05-22 15:30:00', 15),
(9, 3, -1, 12, -1, '2021-05-22 15:30:00', 15),
(10, 16, -1, 6, -1, '2020-09-19 15:30:00', 1),
(11, 9, -1, 1, -1, '2021-05-22 15:30:00', 15),
(12, 7, -1, 13, -1, '2020-09-19 15:30:00', 1),
(14, 2, -1, 11, -1, '2021-05-22 15:30:00', 15),
(15, 8, -1, 12, -1, '2020-09-19 15:30:00', 1),
(16, 8, -1, 10, -1, '2021-05-22 15:30:00', 15),
(17, 16, -1, 18, -1, '2021-05-22 15:30:00', 15),
(18, 5, -1, 11, -1, '2020-09-19 18:30:00', 1),
(19, 1, -1, 15, -1, '2021-05-15 15:30:00', 18),
(20, 1, -1, 17, -1, '2020-09-20 15:30:00', 1),
(21, 11, -1, 8, -1, '2021-05-15 15:30:00', 18),
(22, 14, -1, 9, -1, '2021-05-15 15:30:00', 18),
(23, 12, -1, 4, -1, '2021-05-15 15:30:00', 18),
(24, 15, -1, 14, -1, '2020-09-20 18:00:00', 1),
(25, 13, -1, 16, -1, '2021-05-15 15:30:00', 18),
(26, 18, -1, 3, -1, '2021-05-15 15:30:00', 18),
(28, 17, -1, 5, -1, '2021-05-15 15:30:00', 18),
(29, 2, -1, 7, -1, '2021-05-15 15:30:00', 18),
(31, 10, -1, 6, -1, '2021-05-15 15:30:00', 18),
(33, 4, -1, 11, -1, '2021-05-07 18:30:00', 19),
(35, 5, -1, 1, -1, '2021-05-07 18:30:00', 19),
(36, 6, -1, 18, -1, '2021-05-07 18:30:00', 19),
(38, 15, -1, 9, -1, '2021-05-08 15:30:00', 19),
(40, 3, -1, 17, -1, '2021-05-08 15:30:00', 19),
(41, 13, -1, 10, -1, '2021-05-09 14:30:00', 19),
(43, 16, -1, 12, -1, '2021-05-09 14:30:00', 19),
(45, 7, -1, 14, -1, '2021-05-10 18:30:00', 19),
(46, 8, -1, 2, -1, '2021-05-10 18:30:00', 19),
(47, 13, -1, 3, -1, '2020-10-02 20:30:00', 3),
(48, 5, -1, 9, -1, '2020-10-03 15:30:00', 3),
(49, 1, -1, 8, -1, '2021-04-23 18:30:00', 21),
(50, 11, -1, 10, -1, '2021-04-23 18:30:00', 21),
(51, 14, -1, 1, -1, '2020-10-03 15:30:00', 3),
(52, 14, -1, 3, -1, '2021-04-23 18:30:00', 21),
(53, 17, -1, 8, -1, '2020-10-03 15:30:00', 3),
(54, 15, -1, 5, -1, '2021-04-24 15:30:00', 21),
(55, 2, -1, 5, -1, '2020-10-03 15:30:00', 3),
(56, 12, -1, 6, -1, '2021-04-24 15:30:00', 21),
(57, 9, -1, 7, -1, '2021-04-24 15:30:00', 21),
(58, 10, -1, 16, -1, '2020-10-03 15:30:00', 3),
(59, 18, -1, 13, -1, '2021-04-24 15:30:00', 21),
(60, 18, -1, 7, -1, '2020-10-03 18:30:00', 3),
(61, 17, -1, 4, -1, '2021-04-26 18:30:00', 21),
(62, 6, -1, 4, -1, '2020-10-04 15:30:00', 3),
(63, 2, -1, 16, -1, '2021-04-26 18:30:00', 21),
(64, 12, -1, 15, -1, '2020-10-04 18:00:00', 3),
(65, 4, -1, 14, -1, '2021-04-20 18:30:00', 23),
(66, 5, -1, 9, -1, '2021-04-20 18:30:00', 23),
(67, 6, -1, 11, -1, '2021-04-20 18:30:00', 23),
(68, 3, -1, 2, -1, '2021-04-20 18:30:00', 23),
(69, 13, -1, 12, -1, '2021-04-20 18:30:00', 23),
(70, 16, -1, 1, -1, '2021-04-20 20:00:00', 23),
(71, 7, -1, 17, -1, '2021-04-21 18:30:00', 23),
(72, 10, -1, 18, -1, '2021-04-21 18:30:00', 23),
(73, 8, -1, 15, -1, '2021-04-21 20:00:00', 23),
(74, 9, -1, 17, -1, '2020-10-02 20:30:00', 35),
(75, 5, -1, 7, -1, '2021-04-16 18:30:00', 24),
(76, 5, -1, 4, -1, '2020-10-03 15:30:00', 35),
(77, 1, -1, 6, -1, '2021-04-16 18:30:00', 24),
(78, 3, -1, 6, -1, '2020-10-03 15:30:00', 35),
(79, 11, -1, 3, -1, '2021-04-16 20:00:00', 24),
(80, 16, -1, 11, -1, '2020-10-03 15:30:00', 35),
(81, 14, -1, 16, -1, '2021-04-17 15:30:00', 24),
(82, 15, -1, 4, -1, '2021-04-17 15:30:00', 24),
(83, 12, -1, 18, -1, '2021-04-17 15:30:00', 24),
(84, 7, -1, 10, -1, '2020-10-03 15:30:00', 35),
(85, 9, -1, 8, -1, '2021-04-17 15:30:00', 24),
(86, 8, -1, 14, -1, '2020-10-03 15:30:00', 35),
(87, 1, -1, 18, -1, '2020-10-03 18:30:00', 35),
(88, 17, -1, 13, -1, '2021-04-18 18:30:00', 24),
(89, 2, -1, 10, -1, '2021-04-18 18:30:00', 24),
(90, 15, -1, 2, -1, '2020-10-04 15:30:00', 35),
(91, 4, -1, 9, -1, '2021-04-09 18:30:00', 26),
(92, 4, -1, 13, -1, '2020-10-04 18:00:00', 35),
(93, 6, -1, 14, -1, '2021-04-09 18:30:00', 26),
(94, 3, -1, 15, -1, '2021-04-09 20:00:00', 26),
(95, 13, -1, 11, -1, '2021-04-10 15:30:00', 26),
(96, 6, -1, 5, -1, '2020-10-17 15:30:00', 4),
(97, 18, -1, 2, -1, '2021-04-10 15:30:00', 26),
(98, 12, -1, 7, -1, '2020-10-17 15:30:00', 4),
(99, 16, -1, 17, -1, '2021-04-10 15:30:00', 26),
(100, 13, -1, 8, -1, '2020-10-17 15:30:00', 4),
(101, 7, -1, 1, -1, '2021-04-10 15:30:00', 26),
(102, 10, -1, 12, -1, '2021-04-11 15:30:00', 26),
(103, 8, -1, 5, -1, '2021-04-12 20:00:00', 26),
(104, 17, -1, 14, -1, '2020-10-17 15:30:00', 4),
(105, 2, -1, 1, -1, '2020-10-17 15:30:00', 4),
(106, 5, -1, 3, -1, '2021-04-03 15:30:00', 28),
(107, 1, -1, 4, -1, '2021-04-03 15:30:00', 28),
(108, 10, -1, 4, -1, '2020-10-17 18:30:00', 4),
(109, 11, -1, 12, -1, '2021-04-03 15:30:00', 28),
(110, 14, -1, 18, -1, '2021-04-04 15:30:00', 28),
(111, 11, -1, 15, -1, '2020-10-17 20:30:00', 4),
(112, 15, -1, 16, -1, '2021-04-04 15:30:00', 28),
(113, 16, -1, 3, -1, '2020-10-18 15:30:00', 4),
(114, 9, -1, 13, -1, '2021-04-04 15:30:00', 28),
(115, 18, -1, 9, -1, '2020-10-18 18:00:00', 4),
(116, 17, -1, 10, -1, '2021-04-05 20:00:00', 28),
(117, 2, -1, 6, -1, '2021-04-05 18:30:00', 28),
(118, 8, -1, 7, -1, '2021-04-05 20:00:00', 28),
(119, 8, -1, 16, -1, '2020-10-23 20:30:00', 5),
(120, 4, -1, 8, -1, '2021-03-19 18:30:00', 30),
(121, 6, -1, 17, -1, '2021-03-19 18:30:00', 30),
(122, 12, -1, 2, -1, '2021-03-19 20:00:00', 30),
(123, 3, -1, 9, -1, '2021-03-20 15:30:00', 30),
(124, 4, -1, 3, -1, '2020-10-24 15:30:00', 5),
(125, 13, -1, 14, -1, '2021-03-20 15:30:00', 30),
(126, 1, -1, 3, -1, '2020-10-24 15:30:00', 5),
(127, 18, -1, 11, -1, '2021-04-04 15:30:00', 28),
(128, 16, -1, 5, -1, '2021-03-21 13:00:00', 30),
(129, 9, -1, 12, -1, '2020-10-24 15:30:00', 5),
(130, 7, -1, 15, -1, '2021-03-21 15:30:00', 30),
(131, 10, -1, 1, -1, '2021-03-21 13:30:00', 30),
(132, 18, -1, 11, -1, '2021-03-20 15:30:00', 30),
(133, 17, -1, 11, -1, '2020-10-24 15:30:00', 5),
(134, 5, -1, 18, -1, '2020-10-24 18:30:00', 5),
(135, 7, -1, 6, -1, '2020-10-25 18:00:00', 5),
(136, 14, -1, 2, -1, '2020-10-26 20:30:00', 5),
(137, 15, -1, 10, -1, '2020-10-25 15:30:00', 5);

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
(3, '2020-09-25', '2020-09-27', 1),
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
(34, '2021-03-05', '2021-03-08', 1),
(35, '2020-10-02', '2020-10-04', 1);

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
  MODIFY `spielId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT für Tabelle `spieltage`
--
ALTER TABLE `spieltage`
  MODIFY `spieltagId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `vereine`
--
ALTER TABLE `vereine`
  MODIFY `vereinsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
