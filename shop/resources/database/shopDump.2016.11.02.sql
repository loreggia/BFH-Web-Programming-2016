-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Nov 2016 um 23:53
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 5.6.24

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_mode` int(11) NOT NULL,
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salutation` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `additional_address_line1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `address`
--

TRUNCATE TABLE `address`;
--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address_mode`, `company`, `department`, `firstname`, `lastname`, `salutation`, `street`, `zipcode`, `city`, `country_id`, `additional_address_line1`, `additional_address_line2`) VALUES
(1, 1, 0, '', '', 'Ken', 'Lestander', 'mr', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, '', '', 'Ken', 'Lestander', 'mr', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `article_category_category_id_fk` (`category_id`),
  KEY `article_manufacturer_manufacturer_id_fk` (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `article`
--

TRUNCATE TABLE `article`;
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

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `attribute`
--

TRUNCATE TABLE `attribute`;
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

DROP TABLE IF EXISTS `attribute_article`;
CREATE TABLE IF NOT EXISTS `attribute_article` (
  `attribute_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value_de` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_fr` varchar(255) NOT NULL,
  PRIMARY KEY (`attribute_article_id`),
  KEY `attribute_article_article_article_id_fk` (`article_id`),
  KEY `attribute_article_attribute_attribute_id_fk` (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `attribute_article`
--

TRUNCATE TABLE `attribute_article`;
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

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id_parent` int(11) DEFAULT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description_de` text,
  `description_en` text,
  `description_fr` text,
  `image_id` int(11) DEFAULT NULL,
  `sortkey` int(11) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `category_category_category_id_fk` (`category_id_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `category`
--

TRUNCATE TABLE `category`;
--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`category_id`, `category_id_parent`, `name_de`, `name_en`, `name_fr`, `url`, `description_de`, `description_en`, `description_fr`, `image_id`, `sortkey`) VALUES
(1, NULL, 'Testkat 1', 'Testcat 1', '', 'testkat1', 'Testkategorie 1, Hauptkategorie', NULL, NULL, NULL, 1),
(2, NULL, 'Testkat 2', 'Testcat 2', '', 'testkat2', 'Auch eine Hauptkategorie', NULL, NULL, NULL, 1),
(3, 1, 'Unterkat1', 'Subcat 1', '', 'unterkat1', 'Unterkategorie von Kat1', NULL, NULL, NULL, 1),
(4, 2, 'Unterkat2', 'Subcat 2', '', 'unterkat2', 'Unterkategorie von Kat 2', NULL, NULL, NULL, 1),
(5, 1, 'Unterkat 1.2', 'Subcat 1.2', '', 'unterkat12', 'Zweite Unterkat von Kat1', NULL, NULL, NULL, 2),
(6, 4, 'UUKat', 'UUcat', '', 'uukat', 'UnterUnterkat', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `configuration_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`configuration_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `configuration`
--

TRUNCATE TABLE `configuration`;
--
-- Daten für Tabelle `configuration`
--

INSERT INTO `configuration` (`configuration_id`, `category`, `key`, `value`) VALUES
(1, 'general', 'sitename', 'Computershop');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `counrty`
--

DROP TABLE IF EXISTS `counrty`;
CREATE TABLE IF NOT EXISTS `counrty` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) DEFAULT NULL,
  `name_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `iso2` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso3` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shippingfree` int(11) DEFAULT NULL,
  `tax` double NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `counrty`
--

TRUNCATE TABLE `counrty`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `alt` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `image`
--

TRUNCATE TABLE `image`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description_de` text,
  `description_en` text,
  `description_fr` text,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `manufacturer`
--

TRUNCATE TABLE `manufacturer`;
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

DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_group_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `option`
--

TRUNCATE TABLE `option`;
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

DROP TABLE IF EXISTS `option_article`;
CREATE TABLE IF NOT EXISTS `option_article` (
  `option_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `pseudoprice` double DEFAULT NULL,
  `isDefault` tinyint(1) NOT NULL,
  PRIMARY KEY (`option_article_id`),
  KEY `option_article_article_article_id_fk` (`article_id`),
  KEY `option_article_option_option_id_fk` (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `option_article`
--

TRUNCATE TABLE `option_article`;
--
-- Daten für Tabelle `option_article`
--

INSERT INTO `option_article` (`option_article_id`, `article_id`, `option_id`, `price`, `pseudoprice`, `isDefault`) VALUES
(9, 11, 4, 150, NULL, 0),
(10, 11, 5, 200, 250, 1),
(11, 11, 6, 300, NULL, 0),
(12, 11, 7, 100, NULL, 1),
(13, 11, 9, 200, NULL, 0),
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

DROP TABLE IF EXISTS `option_group`;
CREATE TABLE IF NOT EXISTS `option_group` (
  `option_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  PRIMARY KEY (`option_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `option_group`
--

TRUNCATE TABLE `option_group`;
--
-- Daten für Tabelle `option_group`
--

INSERT INTO `option_group` (`option_group_id`, `name_de`, `name_en`, `name_fr`) VALUES
(1, 'GB RAM', 'GB RAM', 'GB RAM'),
(2, 'Processor', 'Processor', 'Processor'),
(3, 'Speichergrösse (GB)', 'Datasize (GB)', 'Taille de data (GB)');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordernumber` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_amount` double NOT NULL DEFAULT '0',
  `invoice_shipping` double NOT NULL DEFAULT '0',
  `ordertime` datetime DEFAULT NULL,
  `payment_id` int(11) NOT NULL DEFAULT '0',
  `comment` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `orders`
--

TRUNCATE TABLE `orders`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders_address`
--

DROP TABLE IF EXISTS `orders_address`;
CREATE TABLE IF NOT EXISTS `orders_address` (
  `orders_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `orders_id` int(11) NOT NULL,
  `address_mode` int(11) NOT NULL,
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salutation` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `additional_address_line1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`orders_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `orders_address`
--

TRUNCATE TABLE `orders_address`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders_article`
--

DROP TABLE IF EXISTS `orders_article`;
CREATE TABLE IF NOT EXISTS `orders_article` (
  `orders_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `current_price` double DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `descrtiption_de` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_fr` varchar(255) DEFAULT NULL,
  `description_long_de` text,
  `description_long_en` text,
  `description_long_fr` text,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`orders_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `orders_article`
--

TRUNCATE TABLE `orders_article`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `description_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `description_fr` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `payment`
--

TRUNCATE TABLE `payment`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets`
--

DROP TABLE IF EXISTS `sets`;
CREATE TABLE IF NOT EXISTS `sets` (
  `sets_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `isDefault` tinyint(1) NOT NULL,
  PRIMARY KEY (`sets_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `sets`
--

TRUNCATE TABLE `sets`;
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

DROP TABLE IF EXISTS `sets_option_article`;
CREATE TABLE IF NOT EXISTS `sets_option_article` (
  `sets_option_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `sets_id` int(11) NOT NULL,
  `option_article_id` int(11) NOT NULL,
  PRIMARY KEY (`sets_option_article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `sets_option_article`
--

TRUNCATE TABLE `sets_option_article`;
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `encoder` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'md5',
  `company` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `salutation` varchar(255) NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `payment_id` int(11) NOT NULL DEFAULT '1',
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `newsletter` int(1) NOT NULL DEFAULT '0',
  `failedlogins` int(11) NOT NULL,
  `lockeduntil` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- TRUNCATE Tabelle vor dem Einfügen `user`
--

TRUNCATE TABLE `user`;
--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `password`, `encoder`, `company`, `department`, `firstname`, `lastname`, `salutation`, `email`, `active`, `payment_id`, `lastlogin`, `newsletter`, `failedlogins`, `lockeduntil`) VALUES
(1, '5259ee4a034fdeddd1b65be92debe731', 'md5', '', '', 'Ken', 'Lestander', 'mr', 'kenlestander@hotmail.com', 1, 1, '2016-11-02 11:37:50', 0, 0, NULL);

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
