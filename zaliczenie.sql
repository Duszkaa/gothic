-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Cze 2024, 00:10
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zaliczenie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy1`
--

CREATE TABLE `filmy1` (
  `ID` int(11) NOT NULL,
  `tytul_filmu` varchar(255) DEFAULT NULL,
  `autor_scenariusza` varchar(255) DEFAULT NULL,
  `rezyser` varchar(255) DEFAULT NULL,
  `krotki_opis` varchar(1020) DEFAULT NULL,
  `data_premiery` date DEFAULT NULL,
  `producent` varchar(255) DEFAULT NULL,
  `kraj_pochodzenia` varchar(255) DEFAULT NULL,
  `wersje_jezykowe` varchar(255) DEFAULT NULL,
  `liczba_widzow` int(16) DEFAULT NULL,
  `aktorzy` varchar(255) DEFAULT NULL,
  `okladka_filmu` varchar(1020) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `filmy1`
--

INSERT INTO `filmy1` (`ID`, `tytul_filmu`, `autor_scenariusza`, `rezyser`, `krotki_opis`, `data_premiery`, `producent`, `kraj_pochodzenia`, `wersje_jezykowe`, `liczba_widzow`, `aktorzy`, `okladka_filmu`) VALUES
(1, 'Mroczny_Rycerz', 'Christopher Nolan, David S. Goyer', 'Christopher Nolan', 'Batman staje w obliczu Jokera, psychopatycznego geniusza zagraÅ¼ajÄ…cego Gotham City.', '2008-07-18', 'Warner Bros.', 'USA', 'angielski, polski (dubbing)', 100000000, 'Christian Bale, Heath Ledger, Michael Caine', 'https://fwcdn.pl/fpo/63/51/236351/7198307_2.6.jpg'),
(2, 'Kiler', 'Krzysztof Krauze, Piotr Trzaskowski', 'Krzysztof Krauze', 'Historia o pÅ‚atnym zabÃ³jcy, ktÃ³ry zostaje wplÄ…tany w aferÄ™ politycznÄ….', '1997-09-12', 'Studio Filmowe Zebra', 'Polska', 'polski', 3000000, 'Jerzy Stuhr, Cezary Pazura, Tomasz Konieczny', 'https://fwcdn.pl/fpo/05/29/529/6900785_1.6.jpg'),
(3, 'Interstellar', 'Jonathan Nolan, Christopher Nolan', 'Christopher Nolan', 'Grupa astronautÃ³w wyrusza w kosmos w poszukiwaniu nowego domu dla ludzkoÅ›ci.', '2014-11-07', 'Warner Bros., Legendary Pictures, Syncopy Films', 'USA, Wielka Brytania', 'angielski, polski (dubbing)', 1000000000, 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'https://fwcdn.pl/fpo/56/29/375629/7670122_2.6.jpg'),
(4, 'Sami_swoi', 'Sylwester ChÄ™ciÅ„ski', 'Sylwester ChÄ™ciÅ„ski', 'Komedia przedstawiajÄ…ca perypetie dwÃ³ch skÅ‚Ã³conych rodzin: KargulÃ³w i PawlakÃ³w.', '1967-10-02', 'WytwÃ³rnia FilmÃ³w Fabularnych', 'Polska', 'polski', 15000000, 'Roman SykaÅ‚a, WacÅ‚aw Kowalik, Kazimierz WÃ³jt.', 'https://fwcdn.pl/fpo/11/13/1113/7886201_1.6.jpg'),
(5, 'Szybcy_i_wÅ›ciekli', 'Chris Morgan, Derek Haas', 'Justin Lin', 'Dom Toretto staje w obliczu nowego zagroÅ¼enia ze strony swojego dawnego wroga.', '2001-05-22', 'Universal Pictures', 'USA', 'angielski, polski (dubbing)', 1300000000, 'Vin Diesel, Michelle Rodriguez, Charlize Theron', 'https://fwcdn.pl/fpo/05/88/30588/7145648_1.6.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `ID_komentarz` int(11) NOT NULL,
  `id_filmu` int(11) DEFAULT NULL,
  `nick` varchar(255) DEFAULT NULL,
  `ocena` int(2) DEFAULT NULL,
  `komentarz` varchar(1020) DEFAULT NULL,
  `data_komentarza` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`ID_komentarz`, `id_filmu`, `nick`, `ocena`, `komentarz`, `data_komentarza`) VALUES
(1, 1, 'Jan Kowalski', 7, 'Swietny film', '2024-06-11'),
(2, 1, 'Anna Kowalska', 4, 'Sciek', '2024-06-10'),
(3, 1, 'Tomasz Nowak', 3, 'Nie polecam', '2024-06-09'),
(4, 2, 'Krzysztof WiÅ›niewski', 7, 'Ujdzie na wsi', '2024-06-08'),
(5, 2, 'Marta ZieliÅ„ska', 4, 'TrochÄ™ przewidywalny', '2024-06-07'),
(6, 2, 'Piotr Kowalski', 8, 'W pyte', '2024-06-06'),
(7, 3, 'Katarzyna Nowak', 5, 'Gniot', '2024-06-05'),
(8, 3, 'Andrzej Kowalski', 6, 'Dobry Gniot', '2024-06-04'),
(9, 3, 'Zuzanna WiÅ›niewska', 3, 'Moze byc', '2024-06-03'),
(10, 4, 'Mateusz WiÅ›niewski', 9, 'Giga chad', '2024-06-02'),
(11, 4, 'Beata Nowak', 4, 'WzruszajÄ…ca historia ale sÅ‚aba', '2024-06-01'),
(12, 5, 'Jakub Kowalski', 2, 'Film, ale dzieci', '2024-05-31');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filmy1`
--
ALTER TABLE `filmy1`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`ID_komentarz`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `filmy1`
--
ALTER TABLE `filmy1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `ID_komentarz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
