-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lut 2016, 13:53
-- Wersja serwera: 5.6.26
-- Wersja PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `nsgz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `name`, `id_user`) VALUES
(1, 'Undefined', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'artyr', 'artyr'),
(2, 'zdzichu', 'asdfasdf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_path` varchar(2048) COLLATE utf8_polish_ci NOT NULL,
  `comment` text COLLATE utf8_polish_ci,
  `date_time` date NOT NULL,
  `category_name` varchar(1024) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `file_path`, `comment`, `date_time`, `category_name`) VALUES
(1, 1, 'uploads/artyrphoto.jpg', 'asdf', '2016-02-04', 'Undefined'),
(2, 1, 'uploads/artyrcomment_g6u3VcqOzBo3gTreTOSXwofs3TdPoxS3.jpg', 'asdf', '2016-02-04', 'Undefined'),
(3, 1, 'uploads/artyre86a3e51035456bf7993d1e32640cd6f.jpg', 'asdf', '2016-02-04', 'Undefined'),
(5, 1, 'uploads/artyr8454_jrnf4c.jpg', 'asdf', '2016-02-04', 'Undefined');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
