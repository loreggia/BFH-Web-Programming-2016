-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Okt 2016 um 17:44
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 5.6.24

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
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `pseudoprice` double DEFAULT NULL,
  `descrtiption_de` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_fr` varchar(255) DEFAULT NULL,
  `description_long_de` text,
  `description_long_en` text,
  `description_long_fr` text,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`article_id`, `category_id`, `manufacturer_id`, `ordernumber`, `name_de`, `name_en`, `name_fr`, `price`, `pseudoprice`, `descrtiption_de`, `description_en`, `description_fr`, `description_long_de`, `description_long_en`, `description_long_fr`, `image_id`) VALUES
(11, 3, 2, 'a001', 'Testartikel 1', 'Testarticle 1', 'Article de teste 1', 12, 24, 'Vorschau', 'Preview', 'Prevue', NULL, NULL, NULL, NULL),
(12, 5, 1, 'a002', 'Testartikel 2', 'Testarticle 2', 'Article de teste 2', 16, NULL, 'Hat Sets', 'Has sets', 'Il a sets', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `name_de`, `name_en`, `name_fr`) VALUES
(1, 'Höhe', 'Height', 'Hauteur'),
(2, 'Breite', 'Width', 'Largeur'),
(3, 'Farbe', 'Color', 'Couleur'),
(4, 'Grösse', 'Size', 'Taille');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attribute_article`
--

CREATE TABLE `attribute_article` (
  `attribute_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value_de` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `attribute_article`
--

INSERT INTO `attribute_article` (`attribute_article_id`, `article_id`, `attribute_id`, `value_de`, `value_en`, `value_fr`) VALUES
(12, 11, 1, '100', '100', '100'),
(13, 11, 2, '50', '50', '50'),
(14, 12, 3, 'Grau', 'Grey', 'Gris'),
(15, 12, 4, '20', '20', '20');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_id_parent` int(11) DEFAULT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description_de` text,
  `description_en` text,
  `description_fr` text,
  `image_id` int(11) DEFAULT NULL,
  `sortkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`category_id`, `category_id_parent`, `name_de`, `name_en`, `name_fr`, `url`, `description_de`, `description_en`, `description_fr`, `image_id`, `sortkey`) VALUES
(1, NULL, 'Testkat 1', '', '', 'testkat1', 'Testkategorie 1, Hauptkategorie', NULL, NULL, NULL, 1),
(2, NULL, 'Testkat 2', '', '', 'testkat2', 'Auch eine Hauptkategorie', NULL, NULL, NULL, 1),
(3, 2, 'Unterkat1', '', '', 'unterkat1', 'Unterkategorie von Kat1', NULL, NULL, NULL, 1),
(4, 3, 'Unterkat2', '', '', 'unterkat2', 'Unterkategorie von Kat 2', NULL, NULL, NULL, 1),
(5, 2, 'Unterkat 1.2', '', '', 'unterkat12', 'Zweite Unterkat von Kat1', NULL, NULL, NULL, 2),
(6, 4, 'UUKat', '', '', 'uukat', 'UnterUnterkat', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description_de` text,
  `description_en` text,
  `description_fr` text,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `description_de`, `description_en`, `description_fr`, `image_id`) VALUES
(1, 'NoName', NULL, NULL, NULL, NULL),
(2, 'CH', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `option`
--

CREATE TABLE `option` (
  `option_id` int(11) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `option`
--

INSERT INTO `option` (`option_id`, `option_group_id`, `name_de`, `name_en`, `name_fr`) VALUES
(4, 1, '4', '4', '4'),
(5, 1, '8', '8', '8'),
(6, 1, '16', '16', '16'),
(7, 2, 'i5 6020', 'i5 6020', 'i5 6020'),
(8, 2, 'i5 5040', 'i5 5040', 'i5 5040'),
(9, 2, 'i7 6020', 'i7 6020', 'i7 6020'),
(10, 3, '500', '500', '500'),
(11, 3, '1000', '1000', '1000'),
(12, 3, '2000', '2000', '2000');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `option_article`
--

CREATE TABLE `option_article` (
  `option_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `pseudoprice` double DEFAULT NULL,
  `isDefault` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `option_article`
--

INSERT INTO `option_article` (`option_article_id`, `article_id`, `option_id`, `price`, `pseudoprice`, `isDefault`) VALUES
(9, 11, 4, 150, NULL, 0),
(10, 11, 5, 200, 250, 1),
(11, 11, 6, 300, NULL, 0),
(12, 11, 7, 100, NULL, 1),
(13, 11, 9, 200, NULL, 1),
(14, 11, 11, 11, NULL, 1),
(15, 12, 4, 1, NULL, 1),
(16, 12, 5, 1, NULL, 0),
(17, 12, 6, 1, NULL, 0),
(18, 12, 7, 1, NULL, 0),
(19, 12, 8, 1, NULL, 1),
(20, 12, 10, 1, NULL, 1),
(21, 12, 11, 1, NULL, 0),
(22, 12, 12, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `option_group`
--

CREATE TABLE `option_group` (
  `option_group_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `option_group`
--

INSERT INTO `option_group` (`option_group_id`, `name_de`, `name_en`, `name_fr`) VALUES
(1, 'GB RAM', 'GB RAM', 'GB RAM'),
(2, 'Processor', 'Processor', 'Processor'),
(3, 'Speichergrösse (GB)', 'Datasize (GB)', 'Taille de data (GB)');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets`
--

CREATE TABLE `sets` (
  `sets_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `isDefault` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `sets`
--

INSERT INTO `sets` (`sets_id`, `article_id`, `name_de`, `name_en`, `name_fr`, `isDefault`) VALUES
(1, 12, 'TestSet1', 'Test set 1', 'Set de teste 1', 0),
(2, 12, 'TestSet2', 'Test set 2', 'Set teste 2', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets_option_article`
--

CREATE TABLE `sets_option_article` (
  `sets_option_article_id` int(11) NOT NULL,
  `sets_id` int(11) NOT NULL,
  `option_article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `sets_option_article`
--

INSERT INTO `sets_option_article` (`sets_option_article_id`, `sets_id`, `option_article_id`) VALUES
(1, 1, 15),
(2, 1, 18),
(3, 1, 21),
(4, 2, 16),
(5, 2, 19),
(6, 2, 22);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_category_category_id_fk` (`category_id`),
  ADD KEY `article_manufacturer_manufacturer_id_fk` (`manufacturer_id`);

--
-- Indizes für die Tabelle `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indizes für die Tabelle `attribute_article`
--
ALTER TABLE `attribute_article`
  ADD PRIMARY KEY (`attribute_article_id`),
  ADD KEY `attribute_article_article_article_id_fk` (`article_id`),
  ADD KEY `attribute_article_attribute_attribute_id_fk` (`attribute_id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_category_category_id_fk` (`category_id_parent`);

--
-- Indizes für die Tabelle `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indizes für die Tabelle `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indizes für die Tabelle `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indizes für die Tabelle `option_article`
--
ALTER TABLE `option_article`
  ADD PRIMARY KEY (`option_article_id`),
  ADD KEY `option_article_article_article_id_fk` (`article_id`),
  ADD KEY `option_article_option_option_id_fk` (`option_id`);

--
-- Indizes für die Tabelle `option_group`
--
ALTER TABLE `option_group`
  ADD PRIMARY KEY (`option_group_id`);

--
-- Indizes für die Tabelle `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`sets_id`);

--
-- Indizes für die Tabelle `sets_option_article`
--
ALTER TABLE `sets_option_article`
  ADD PRIMARY KEY (`sets_option_article_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `attribute_article`
--
ALTER TABLE `attribute_article`
  MODIFY `attribute_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `option`
--
ALTER TABLE `option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `option_article`
--
ALTER TABLE `option_article`
  MODIFY `option_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT für Tabelle `option_group`
--
ALTER TABLE `option_group`
  MODIFY `option_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `sets`
--
ALTER TABLE `sets`
  MODIFY `sets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `sets_option_article`
--
ALTER TABLE `sets_option_article`
  MODIFY `sets_option_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_category_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `article_manufacturer_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`);

--
-- Constraints der Tabelle `attribute_article`
--
ALTER TABLE `attribute_article`
  ADD CONSTRAINT `attribute_article_article_article_id_fk` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `attribute_article_attribute_attribute_id_fk` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`);

--
-- Constraints der Tabelle `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_category_category_id_fk` FOREIGN KEY (`category_id_parent`) REFERENCES `category` (`category_id`);

--
-- Constraints der Tabelle `option_article`
--
ALTER TABLE `option_article`
  ADD CONSTRAINT `option_article_article_article_id_fk` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `option_article_option_option_id_fk` FOREIGN KEY (`option_id`) REFERENCES `option` (`option_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
