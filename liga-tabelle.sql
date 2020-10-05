-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Okt 2020 um 09:47
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiele`
--

CREATE TABLE `spiele` (
  `spielId` int(11) NOT NULL,
  `heimVerein` int(11) NOT NULL,
  `heimVereinTore` int(11) NOT NULL,
  `auswertsVerein` int(11) NOT NULL,
  `auswertsVereinTore` int(11) NOT NULL,
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
  `beschreibung` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `ligaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `spiele`
--
ALTER TABLE `spiele`
  MODIFY `spielId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `spieltage`
--
ALTER TABLE `spieltage`
  MODIFY `spieltagId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `vereine`
--
ALTER TABLE `vereine`
  MODIFY `vereinsId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
