-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2016 at 09:04 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
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
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `category_id`, `manufacturer_id`, `ordernumber`, `name_de`, `name_en`, `name_fr`, `price`, `pseudoprice`, `descrtiption_de`, `description_en`, `description_fr`, `description_long_de`, `description_long_en`, `description_long_fr`, `image_id`) VALUES
(11, 3, 2, 'a001', 'Testartikel 1', 'Testarticle 1', 'Article de teste 1', 12, 24, 'Vorschau', 'Preview', 'Prevue', NULL, NULL, NULL, 1),
(12, 5, 1, 'a002', 'Testartikel 2', 'Testarticle 2', 'Article de teste 2', 16, NULL, 'Hat Sets', 'Has sets', 'Il a sets', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `name_de`, `name_en`, `name_fr`) VALUES
(1, 'Höhe', 'Height', 'Hauteur'),
(2, 'Breite', 'Width', 'Largeur'),
(3, 'Farbe', 'Color', 'Couleur'),
(4, 'Grösse', 'Size', 'Taille');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_article`
--

DROP TABLE IF EXISTS `attribute_article`;
CREATE TABLE `attribute_article` (
  `attribute_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value_de` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_article`
--

INSERT INTO `attribute_article` (`attribute_article_id`, `article_id`, `attribute_id`, `value_de`, `value_en`, `value_fr`) VALUES
(12, 11, 1, '100', '100', '100'),
(13, 11, 2, '50', '50', '50'),
(14, 12, 3, 'Grau', 'Grey', 'Gris'),
(15, 12, 4, '20', '20', '20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
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
-- Dumping data for table `category`
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
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE `configuration` (
  `configuration_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`configuration_id`, `category`, `key`, `value`) VALUES
(1, 'general', 'sitename', 'Computershop');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `url`, `alt`) VALUES
(1, 'resources/images/uploaded/computer.png', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description_de` text,
  `description_en` text,
  `description_fr` text,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `description_de`, `description_en`, `description_fr`, `image_id`) VALUES
(1, 'NoName', NULL, NULL, NULL, NULL),
(2, 'CH', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE `option` (
  `option_id` int(11) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
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
-- Table structure for table `option_article`
--

DROP TABLE IF EXISTS `option_article`;
CREATE TABLE `option_article` (
  `option_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `pseudoprice` double DEFAULT NULL,
  `isDefault` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_article`
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
-- Table structure for table `option_group`
--

DROP TABLE IF EXISTS `option_group`;
CREATE TABLE `option_group` (
  `option_group_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_group`
--

INSERT INTO `option_group` (`option_group_id`, `name_de`, `name_en`, `name_fr`) VALUES
(1, 'GB RAM', 'GB RAM', 'GB RAM'),
(2, 'Processor', 'Processor', 'Processor'),
(3, 'Speichergrösse (GB)', 'Datasize (GB)', 'Taille de data (GB)');

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

DROP TABLE IF EXISTS `sets`;
CREATE TABLE `sets` (
  `sets_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `isDefault` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`sets_id`, `article_id`, `name_de`, `name_en`, `name_fr`, `isDefault`) VALUES
(1, 12, 'TestSet1', 'Test set 1', 'Set de teste 1', 0),
(2, 12, 'TestSet2', 'Test set 2', 'Set teste 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sets_option_article`
--

DROP TABLE IF EXISTS `sets_option_article`;
CREATE TABLE `sets_option_article` (
  `sets_option_article_id` int(11) NOT NULL,
  `sets_id` int(11) NOT NULL,
  `option_article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sets_option_article`
--

INSERT INTO `sets_option_article` (`sets_option_article_id`, `sets_id`, `option_article_id`) VALUES
(1, 1, 15),
(2, 1, 18),
(3, 1, 21),
(4, 2, 16),
(5, 2, 19),
(6, 2, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_category_category_id_fk` (`category_id`),
  ADD KEY `article_manufacturer_manufacturer_id_fk` (`manufacturer_id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attribute_article`
--
ALTER TABLE `attribute_article`
  ADD PRIMARY KEY (`attribute_article_id`),
  ADD KEY `attribute_article_article_article_id_fk` (`article_id`),
  ADD KEY `attribute_article_attribute_attribute_id_fk` (`attribute_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_category_category_id_fk` (`category_id_parent`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`configuration_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `option_article`
--
ALTER TABLE `option_article`
  ADD PRIMARY KEY (`option_article_id`),
  ADD KEY `option_article_article_article_id_fk` (`article_id`),
  ADD KEY `option_article_option_option_id_fk` (`option_id`);

--
-- Indexes for table `option_group`
--
ALTER TABLE `option_group`
  ADD PRIMARY KEY (`option_group_id`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`sets_id`);

--
-- Indexes for table `sets_option_article`
--
ALTER TABLE `sets_option_article`
  ADD PRIMARY KEY (`sets_option_article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attribute_article`
--
ALTER TABLE `attribute_article`
  MODIFY `attribute_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `configuration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `option_article`
--
ALTER TABLE `option_article`
  MODIFY `option_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `option_group`
--
ALTER TABLE `option_group`
  MODIFY `option_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `sets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sets_option_article`
--
ALTER TABLE `sets_option_article`
  MODIFY `sets_option_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_category_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `article_manufacturer_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`);

--
-- Constraints for table `attribute_article`
--
ALTER TABLE `attribute_article`
  ADD CONSTRAINT `attribute_article_article_article_id_fk` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `attribute_article_attribute_attribute_id_fk` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_category_category_id_fk` FOREIGN KEY (`category_id_parent`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `option_article`
--
ALTER TABLE `option_article`
  ADD CONSTRAINT `option_article_article_article_id_fk` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `option_article_option_option_id_fk` FOREIGN KEY (`option_id`) REFERENCES `option` (`option_id`);
