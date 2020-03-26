-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Mar 2020, 18:53
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
-- Struktura tabeli dla tabeli `dane_konta`
--

CREATE TABLE `dane_konta` (
  `id_profilu` int(12) NOT NULL,
  `id_uzytkownika` int(12) NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `wiek` int(3) DEFAULT NULL,
  `plec` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `avatar` varchar(250) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_konta`
--

INSERT INTO `dane_konta` (`id_profilu`, `id_uzytkownika`, `imie`, `nazwisko`, `wiek`, `plec`, `avatar`) VALUES
(1, 1, 'Bartosz', NULL, 22, 'mężczyzna', NULL),
(2, 4, 'Piotr', NULL, 22, 'mężczyzna', NULL),
(3, 3, 'Paweł', NULL, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(12) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` char(128) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `email`, `uprawnienia`) VALUES
(1, 'bartoszjab', 'e407a0324880029203bfa2926eff9668ccd8557bc62f1d7a0bf5c84e1b130539a7c3acd5ecb08122075f261e431ee3044a333df9dfbe04d4a7230db9a6766b30', 'przykladowymail@wp.pl', 1),
(2, 'RobertSuperNarciarz', 'e407a0324880029203bfa2926eff9668ccd8557bc62f1d7a0bf5c84e1b130539a7c3acd5ecb08122075f261e431ee3044a333df9dfbe04d4a7230db9a6766b62', 'robi254@gmail.com', 3),
(3, 'radud', '0f6460d0ed7825fed6bda0f4d9c14942d88edc7ff236479212e69f081815e6f1742c272753b77cc6437f06ef93a46271c6ff9513c68945075212434080e60c82', 'radud@wp.pl', 3),
(4, 'feher', '8b58ba24942f65f14bdd712b6e08ba9d26b1ecc094f557acf1d06f652f486d34187dacd547df574028461be7e3abd1eb7f551dff8092093e0ef90f088992f4fc', 'feher@gmail.com', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wpisy`
--

CREATE TABLE `wpisy` (
  `id_wpisu` int(12) NOT NULL,
  `id_uzytkownika` int(12) NOT NULL,
  `nazwa` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `tresc` varchar(500) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wpisy`
--

INSERT INTO `wpisy` (`id_wpisu`, `id_uzytkownika`, `nazwa`, `tresc`) VALUES
(1, 1, 'Moj pierwszy wpis', 'Witam w moim pierwszym wpisie wszystkich uzytkownikow'),
(2, 3, 'Przywitanie', 'Czesc wszystkim jestem tu nowy :)'),
(3, 4, 'Dlugosc nart', 'Hej, zastanawiam sie nad kupnem nart. Mozecie cos doradzic dla poczatkujacego? :)');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_konta`
--
ALTER TABLE `dane_konta`
  ADD PRIMARY KEY (`id_profilu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  ADD PRIMARY KEY (`id_wpisu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dane_konta`
--
ALTER TABLE `dane_konta`
  MODIFY `id_profilu` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  MODIFY `id_wpisu` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dane_konta`
--
ALTER TABLE `dane_konta`
  ADD CONSTRAINT `dane_konta_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  ADD CONSTRAINT `wpisy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
