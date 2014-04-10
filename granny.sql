-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- VÃ¤rd: 127.0.0.1
-- Tid vid skapande: 10 apr 2014 kl 14:53
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
  PRIMARY KEY (`ArticleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `article`
--

INSERT INTO `article` (`ArticleID`, `ArticleName`, `Price`, `Color`, `Description`, `CategoryID`) VALUES
(1, 'Majpenna', '9.00', 'BlÃ¥', 'En vackert blÃ¥ majpenna.', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Pennor', 'VÃ¥ra finaste pennor i extra stora storlekar!');

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
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `customer`
--

INSERT INTO `customer` (`CustomerID`, `Fname`, `Lname`, `Address`, `Zip`, `Email`, `Password`) VALUES
(1, 'Greta', 'Johansson', 'MajblommevÃ¤gen 20', 31142, 'Greta.johansson@hotmail.com', 'hejsansvejsan');

-- --------------------------------------------------------

--
-- Tabellstruktur `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `order`
--

INSERT INTO `order` (`OrderID`, `CustomerID`, `ArticleID`, `Amount`, `Price`, `Date`) VALUES
(1, 1, 1, 2, '18.00', '2014-04-10 12:50:47');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
