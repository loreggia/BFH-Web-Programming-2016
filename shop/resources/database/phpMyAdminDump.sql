-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2016 at 02:21 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_id_parent` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `pseudoprice` double DEFAULT NULL,
  `descrtiption` varchar(255) DEFAULT NULL,
  `description_long` text,
  `image` text,
  `isAlone` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_id_parent`, `category_id`, `manufacturer_id`, `ordernumber`, `name`, `price`, `pseudoprice`, `descrtiption`, `description_long`, `image`, `isAlone`) VALUES
(1, NULL, 4, 1, 't001', 'Einzelartikel', 12.5, 20, 'Dies ist ein Testartikel', 'Testartikel sind die Hello Worlds...', NULL, 1),
(2, NULL, 5, 2, 't002v', 'Veterartikel', NULL, NULL, 'Dies ist ein Vaterartikel', 'Vaterartikel sind nicht käuflich!', NULL, 0),
(3, 2, NULL, NULL, 't002c1', 'Kindartikel 1', 15, NULL, NULL, NULL, NULL, 0),
(4, 2, NULL, NULL, 't002c2', 'Kindartikel 2', 13, 15, 'Dies ist ein Kindartikel', 'Kinder sind kaufbar', NULL, 0),
(5, NULL, 6, 2, 't003v', 'MultiDimVater', NULL, NULL, 'Dies ist ein weiterer Vaterartikel', 'Sieht gleich aus...', NULL, 0),
(6, 5, NULL, NULL, 't003c1', 'MultiKind 1', 12, NULL, NULL, NULL, NULL, 0),
(7, 5, NULL, NULL, 't003c2', 'MultiKind 2', 24, NULL, NULL, NULL, NULL, 0),
(8, 5, NULL, NULL, 't003c3', 'MultiKind 3', 40, 48, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `name`) VALUES
(1, 'height'),
(2, 'width'),
(3, 'color'),
(4, 'size');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_article`
--

DROP TABLE IF EXISTS `attribute_article`;
CREATE TABLE `attribute_article` (
  `attribute_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_article`
--

INSERT INTO `attribute_article` (`attribute_article_id`, `article_id`, `attribute_id`, `value`) VALUES
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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_id_parent` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `sortkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_id_parent`, `name`, `url`, `description`, `image`, `sortkey`) VALUES
(2, NULL, 'Testkat 1', 'testkat1', 'Testkategorie 1, Hauptkategorie', NULL, 1),
(3, NULL, 'Testkat 2', 'testkat2', 'Auch eine Hauptkategorie', NULL, 1),
(4, 2, 'Unterkat1', 'unterkat1', 'Unterkategorie von Kat1', NULL, 1),
(5, 3, 'Unterkat2', 'unterkat2', 'Unterkategorie von Kat 2', NULL, 1),
(6, 2, 'Unterkat 1.2', 'unterkat12', 'Zweite Unterkat von Kat1', NULL, 1),
(7, 4, 'UUKat', 'uukat', 'UnterUnterkat', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `description`, `image`) VALUES
(1, 'NoName', NULL, NULL),
(2, 'CH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE `option` (
  `option_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `name`) VALUES
(1, 'height'),
(2, 'width'),
(3, 'color');

-- --------------------------------------------------------

--
-- Table structure for table `option_article`
--

DROP TABLE IF EXISTS `option_article`;
CREATE TABLE `option_article` (
  `option_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_article`
--

INSERT INTO `option_article` (`option_article_id`, `article_id`, `option_id`, `value`) VALUES
(1, 3, 3, 'Grün'),
(2, 4, 3, 'Rot'),
(3, 6, 1, '200'),
(4, 6, 2, '100'),
(5, 7, 1, '200'),
(6, 7, 2, '200'),
(7, 8, 1, '400'),
(8, 8, 2, '200');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attribute_article`
--
ALTER TABLE `attribute_article`
  MODIFY `attribute_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `option_article`
--
ALTER TABLE `option_article`
  MODIFY `option_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
