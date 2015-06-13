-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jun 2015 um 11:35
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- Username: myBooks
-- Password: myBooks
-- Datenbank: `mybooks`
--
CREATE DATABASE IF NOT EXISTS `mybooks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mybooks`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tl_books`
--

CREATE TABLE IF NOT EXISTS `tl_books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(45) NOT NULL,
  `book_author` varchar(45) NOT NULL,
  `book_chapters` varchar(45) NOT NULL,
  `book_type` varchar(45) NOT NULL,
  `book_isbn` varchar(25) NOT NULL,
  `book_yearOfPublish` varchar(25) NOT NULL,
  `book_run` varchar(45) NOT NULL,
  `book_forename` varchar(45) NOT NULL,
  `book_surname` varchar(45) NOT NULL,
  `book_genre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tl_books`
--

INSERT INTO `tl_books` (`book_id`, `book_title`, `book_author`, `book_chapters`, `book_type`, `book_isbn`, `book_yearOfPublish`, `book_run`, `book_forename`, `book_surname`, `book_genre`) VALUES
(2, 'The Last Stand', 'Stephen King', '36', 'Taschenbuch', '1234567890123', '1980', '1', 'max', 'mustermann', 'horror'),
(5, 'buuuch', 'outthor', '36', 'hardcover', '1111111111111', '1200', '12', 'max', 'nachname', 'Psycho');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tl_books`
--
ALTER TABLE `tl_books`
  ADD PRIMARY KEY (`book_id`), ADD UNIQUE KEY `book_name` (`book_forename`,`book_surname`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tl_books`
--
ALTER TABLE `tl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
