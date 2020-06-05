-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: 178.32.219.12
-- Czas wygenerowania: 06 Cze 2020, 00:50
-- Wersja serwera: 5.6.12
-- Wersja PHP: 5.6.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `1197239_EkE`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_konta`
--

CREATE TABLE IF NOT EXISTS `dane_konta` (
  `id_profilu` int(12) NOT NULL AUTO_INCREMENT,
  `id_uzytkownika` int(12) NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `wiek` int(3) DEFAULT NULL,
  `plec` char(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `avatar` varchar(250) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_profilu`),
  KEY `id_uzytkownika` (`id_uzytkownika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `dane_konta`
--

INSERT INTO `dane_konta` (`id_profilu`, `id_uzytkownika`, `imie`, `nazwisko`, `wiek`, `plec`, `avatar`) VALUES
(13, 32, 'Artur', 'Marcinkiewicz', NULL, 'm', '../images/default_avatar.PNG'),
(14, 33, 'Piotr', NULL, 26, 'm', '../images/default_avatar.PNG'),
(15, 34, NULL, NULL, NULL, NULL, '../images/default_avatar.PNG'),
(16, 35, 'Artur', NULL, NULL, '', '../images/default_avatar.PNG'),
(17, 31, 'Bartosz', NULL, 22, 'm', NULL),
(18, 36, NULL, NULL, NULL, NULL, '../images/default_avatar.PNG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE IF NOT EXISTS `komentarze` (
  `id_komentarza` int(24) NOT NULL AUTO_INCREMENT,
  `id_wpisu` int(12) NOT NULL,
  `id_uzytkownika` int(12) NOT NULL,
  `tresc` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_komentarza`),
  KEY `id_uzytkownika` (`id_uzytkownika`),
  KEY `id_wpisu` (`id_wpisu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=76 ;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id_komentarza`, `id_wpisu`, `id_uzytkownika`, `tresc`, `login`) VALUES
(71, 47, 32, 'Bardzo ciekawa informacja. Pozdrawiam.', 'user1'),
(72, 49, 33, 'Uwielbiam biegi narciarskie!', 'user2'),
(73, 50, 32, 'Polecam zacząć w Polsce i wziąć sobie jakiegoś dobrego instruktora na 2 godzinki, żeby załapać podstawy.', 'user1'),
(74, 51, 31, 'witam', 'admin'),
(75, 51, 33, 'dzień dobry', 'user2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id_uzytkownika` int(12) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` char(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(1) NOT NULL,
  `zbanowany` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_uzytkownika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=37 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `email`, `uprawnienia`, `zbanowany`) VALUES
(31, 'admin', '$2y$10$jf.PNUefdZMABMt7PXKMLOTazoM5QJEJxVrVsH9wcjUwIwCcMR9ym', 'admin@wp.pl', 1, 0),
(32, 'user1', '$2y$10$5ZCj6YNLjbueIr1O.E69O.gGqscG5qtbKlCc.sI5aPqvQUftnWkRW', 'user1@gmail.com', 3, 0),
(33, 'user2', '$2y$10$kFxgeCdneSNvqmsSJdCmaejz9xxgkaH.JlBLPzFC92KzdHvJxmVGC', 'user2@gmail.com', 3, 0),
(34, 'user3', '$2y$10$WmHBlLuh1RhRjvVLYycqh.3zKi3HgL4kd8cHaIE50maOP/NUxOAx.', 'user3@gmail.com', 3, 0),
(35, 'skoczek252', '$2y$10$1QjWwcrNTw2XbhwR2neDeOUbRnOTjSsE7VS/kDfNrp.cmEn2FnuDS', 'skoczek252@wp.pl', 3, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wpisy`
--

CREATE TABLE IF NOT EXISTS `wpisy` (
  `id_wpisu` int(12) NOT NULL AUTO_INCREMENT,
  `id_uzytkownika` int(12) NOT NULL,
  `nazwa` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `tresc` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_wpisu`),
  KEY `id_uzytkownika` (`id_uzytkownika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=53 ;

--
-- Zrzut danych tabeli `wpisy`
--

INSERT INTO `wpisy` (`id_wpisu`, `id_uzytkownika`, `nazwa`, `tresc`) VALUES
(47, 31, 'Narty biegowe', 'służą do uprawiania biegów narciarskich, są to wąskie narty nie posiadające metalowych krawędzi; ze względu na styl jazdy dzielą się na narty do stylu klasycznego i stylu łyżwowego, ze względu na charakter wykorzystania dzielą się na sportowe i rekreacyjne. Rekreacyjne narty do stylu klasycznego zazwyczaj posiadają nacięcia w ślizgu (tzw. łuskę) w strefie komory odbiciowej'),
(48, 31, 'Narty telemarkowe', 'o funkcji podobnej jak narty turowe; w najczęstszym rozumieniu są to narty zjazdowe do zjazdów z zastosowaniem techniki telemarkowej; narty dedykowane jako telemarkowe posiadają metalowe krawędzie, są stosunkowo lekkie, umożliwiają zarówno podejścia (jak w nartach turowych) jak i zjeżdżanie z "wolną piętą" i z tego względu potrzebują specyficznych wiązań umożliwiających zjazd tą techniką'),
(49, 34, 'Biegi narciarskie - historia', 'Biegi narciarskie zostały zapoczątkowane w krajach Półwyspu Fennoskandzkiego w czasach prehistorycznych[8]. Były one nadal szeroko praktykowane w XIX wieku jako sposób transportu podczas zimy. Polowania na łosie, jelenie i inne zwierzęta odbywały się właśnie na nartach. Obecnie prawie każdy mieszkaniec krajów z bogatymi tradycjami narciarskimi, takich jak Norwegia, Szwecja, Finlandia i Estonia, używał, bądź regularnie używa nart biegowych\r\n\r\n'),
(50, 33, 'Narty - początkujący', 'Czy wyjazd za granicę dla początkującego narciarza to dobry pomysł? Gdzie najlepiej uczyć się zjeżdżać, żeby nie uczyć się złych nawyków?'),
(51, 35, 'Witam serdecznie', 'Witam wszystkich, z tej strony skoczek252');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
