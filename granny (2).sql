-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 maj 2014 kl 23:19
-- Serverversion: 5.5.36
-- PHP-version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `granny`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `ArticleID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleName` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Color` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Image` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`ArticleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=9 ;

--
-- Dumpning av Data i tabell `article`
--

INSERT INTO `article` (`ArticleID`, `ArticleName`, `Price`, `Color`, `Description`, `CategoryID`, `Image`) VALUES
(1, 'Majpenna', '9.00', 'Blå', 'En vackert blå majpenna.', 1, ''),
(2, 'Penna', '40.00', 'Gul', 'Stor och tydlig penna för enkel hantering.', 1, 'images/bigpen.png'),
(5, 'Fjärrkontroll', '125.00', 'Svart', 'Fjärrkontroll med stora knappar.', 2, 'images/fjärr.png'),
(7, 'Suddigummi', '30.00', 'Rosa', 'Extra stort suddigummi', 3, 'images/bigeraser.png'),
(8, 'Miniräknare', '500.00', 'Svart', 'Stor miniräknare med extra minne.', 4, 'images/bigcalculator.png');

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Pennor', 'Våra finaste pennor i extra stora storlekar!'),
(2, 'Kontroller', 'Kontroller till TV, radio och Xbox.'),
(3, 'Suddgummi', 'Praktiska suddgummin för alla tillfällen.'),
(4, 'Räkneverk', 'Våra fina räkneverk hjälper dig hålla koll på dagarna.');

-- --------------------------------------------------------

--
-- Tabellstruktur `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Lname` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Zip` int(10) NOT NULL,
  `Email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`CustomerID`),
  UNIQUE KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=9 ;

--
-- Dumpning av Data i tabell `customer`
--

INSERT INTO `customer` (`CustomerID`, `Fname`, `Lname`, `Address`, `Zip`, `Email`, `Password`) VALUES
(1, 'Greta', 'Johansson', 'Majblommevägen 20', 31142, 'Greta.johansson@hotmail.com', 'hejsansvejsan'),
(8, 'Josefin', 'LH', 'address', 31142, 'mail', 'jlh');

-- --------------------------------------------------------

--
-- Tabellstruktur `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `ShipmentID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ShipmentID`),
  KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `shipment`
--

INSERT INTO `shipment` (`ShipmentID`, `ArticleID`, `CustomerID`, `Amount`, `Price`, `Date`) VALUES
(1, 2, 1, 2, '60.00', '2014-05-12 21:16:36'),
(2, 8, 8, 4, '500.00', '2014-05-12 21:17:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `zip`
--

CREATE TABLE IF NOT EXISTS `zip` (
  `Zipcode` int(10) NOT NULL,
  `City` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`Zipcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `zip`
--

INSERT INTO `zip` (`Zipcode`, `City`) VALUES
(31142, 'Majstaden');

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`ShipmentID`) REFERENCES `article` (`ArticleID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
