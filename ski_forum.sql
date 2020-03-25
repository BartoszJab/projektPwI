-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Mar 2020, 14:12
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ski_forum`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `moderatorzy`
--

CREATE TABLE `moderatorzy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `wiek` int(3) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` char(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `stopien_uprawnien` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `moderatorzy`
--

INSERT INTO `moderatorzy` (`id`, `imie`, `nazwisko`, `wiek`, `login`, `haslo`, `email`, `stopien_uprawnien`) VALUES
(1, 'Bartosz', 'Jabłoński', 22, 'bartoszjab', '932ef3eb6d0c33d5f7aa98fb41ea99f246cfb55f0408d20b3e7a33e021def62ee0dc9a22bc6b7419e20b0d5d132781ac7fc43062534f8d7df49ab96482f42e0d', 'przykladowymail@wp.pl', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `wiek` int(3) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` char(128) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `wiek`, `login`, `haslo`, `email`) VALUES
(1, 'Czarek', NULL, NULL, 'ProSkiier', '67d7a10741bcf42acf5fb5a0a57558faf08567532f282a6f1e36f06e00899b0a5bdda4c807134b0399884d8042eeba949b84056002d0878a14bfab911df5ad5b', 'czarek.rybicki@onet.pl'),
(2, NULL, NULL, NULL, 'RobertSuperNarciarz', '8723db9b762f5e9aa9a3117c43e5fe385b0b74398d3ff07e2d94da0f86697b5f3773271c2aeb0da75aa6b836f1f15b83b0f48decd75ac5a2d11301b15851a96a', 'robi254@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zbanowani_uzytkownicy`
--

CREATE TABLE `zbanowani_uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` char(128) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `moderatorzy`
--
ALTER TABLE `moderatorzy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zbanowani_uzytkownicy`
--
ALTER TABLE `zbanowani_uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `moderatorzy`
--
ALTER TABLE `moderatorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
