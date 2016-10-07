-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Okt 2016 um 12:44
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_manufracturer` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `pseudoprice` double DEFAULT NULL,
  `descrtiption` varchar(255) DEFAULT NULL,
  `description_long` text,
  `image` text,
  `isAlone` tinyint(1) NOT NULL,
  `father` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`article_id`, `ordernumber`, `name`, `id_manufracturer`, `id_category`, `price`, `pseudoprice`, `descrtiption`, `description_long`, `image`, `isAlone`, `father`) VALUES
(1, 't001', 'Einzelartikel', 1, 4, 12.5, 20, 'Dies ist ein Testartikel', 'Testartikel sind die Hello Worlds...', NULL, 1, NULL),
(2, 't002v', 'Veterartikel', 2, 5, NULL, NULL, 'Dies ist ein Vaterartikel', 'Vaterartikel sind nicht käuflich!', NULL, 0, NULL),
(3, 't002c1', 'Kindartikel 1', NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, 2),
(4, 't002c2', 'Kindartikel 2', NULL, NULL, 13, 15, 'Dies ist ein Kindartikel', 'Kinder sind kaufbar', NULL, 0, 2),
(5, 't003v', 'MultiDimVater', 2, 6, NULL, NULL, 'Dies ist ein weiterer Vaterartikel', 'Sieht gleich aus...', NULL, 0, NULL),
(6, 't003c1', 'MultiKind 1', NULL, NULL, 12, NULL, NULL, NULL, NULL, 0, 5),
(7, 't003c2', 'MultiKind 2', NULL, NULL, 24, NULL, NULL, NULL, NULL, 0, 5),
(8, 't003c3', 'MultiKind 3', NULL, NULL, 40, 48, NULL, NULL, NULL, 0, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attributes`
--

CREATE TABLE `attributes` (
  `attributes_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `attributes`
--

INSERT INTO `attributes` (`attributes_id`, `name`) VALUES
(1, 'height'),
(2, 'width'),
(3, 'color'),
(4, 'size');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attributes2article`
--

CREATE TABLE `attributes2article` (
  `attributes2article_id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_attributes` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `attributes2article`
--

INSERT INTO `attributes2article` (`attributes2article_id`, `id_article`, `id_attributes`, `value`) VALUES
(1, 1, 3, 'Blau'),
(2, 3, 3, 'Grün'),
(3, 3, 4, '10'),
(4, 4, 3, 'Rot'),
(5, 4, 4, '12'),
(6, 6, 1, '200'),
(7, 6, 2, '100'),
(8, 7, 1, '200'),
(9, 7, 2, '200'),
(10, 8, 1, '400'),
(11, 8, 2, '200');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `parentId` int(11) NOT NULL,
  `tree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`category_id`, `name`, `url`, `description`, `image`, `parentId`, `tree`) VALUES
(1, 'Root', '', 'Alle gehören dem Root, muahaha', NULL, 1, '1'),
(2, 'Testkat 1', 'testkat1', 'Testkategorie 1, Hauptkategorie', NULL, 1, '1'),
(3, 'Testkat 2', 'testkat2', 'Auch eine Hauptkategorie', NULL, 1, '1'),
(4, 'Unterkat1', 'unterkat1', 'Unterkategorie von Kat1', NULL, 2, '2|1'),
(5, 'Unterkat2', 'unterkat2', 'Unterkategorie von Kat 2', NULL, 3, '3|1'),
(6, 'Unterkat 1.2', 'unterkat12', 'Zweite Unterkat von Kat1', NULL, 2, '2|1'),
(7, 'UUKat', 'uukat', 'UnterUnterkat', NULL, 4, '4|2|1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `manufracturer`
--

CREATE TABLE `manufracturer` (
  `manufracturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `manufracturer`
--

INSERT INTO `manufracturer` (`manufracturer_id`, `name`, `description`, `image`) VALUES
(1, 'NoName', NULL, NULL),
(2, 'CH', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `options`
--

CREATE TABLE `options` (
  `options_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `options`
--

INSERT INTO `options` (`options_id`, `name`) VALUES
(1, 'height'),
(2, 'width'),
(3, 'color');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `options2article`
--

CREATE TABLE `options2article` (
  `options2article_id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `options2article`
--

INSERT INTO `options2article` (`options2article_id`, `id_article`, `id_option`, `value`) VALUES
(1, 3, 3, 'Grün'),
(2, 4, 3, 'Rot'),
(3, 6, 1, '200'),
(4, 6, 2, '100'),
(5, 7, 1, '200'),
(6, 7, 2, '200'),
(7, 8, 1, '400'),
(8, 8, 2, '200');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indizes für die Tabelle `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attributes_id`);

--
-- Indizes für die Tabelle `attributes2article`
--
ALTER TABLE `attributes2article`
  ADD PRIMARY KEY (`attributes2article_id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indizes für die Tabelle `manufracturer`
--
ALTER TABLE `manufracturer`
  ADD PRIMARY KEY (`manufracturer_id`);

--
-- Indizes für die Tabelle `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`options_id`);

--
-- Indizes für die Tabelle `options2article`
--
ALTER TABLE `options2article`
  ADD PRIMARY KEY (`options2article_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attributes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `attributes2article`
--
ALTER TABLE `attributes2article`
  MODIFY `attributes2article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `manufracturer`
--
ALTER TABLE `manufracturer`
  MODIFY `manufracturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `options`
--
ALTER TABLE `options`
  MODIFY `options_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `options2article`
--
ALTER TABLE `options2article`
  MODIFY `options2article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
