-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 13. úno 2022, 09:32
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `blueghost`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kontakty`
--

CREATE TABLE `kontakty` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(25) NOT NULL,
  `prijmeni` varchar(25) NOT NULL,
  `telefonniCislo` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `poznamka` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `kontakty`
--

INSERT INTO `kontakty` (`id`, `jmeno`, `prijmeni`, `telefonniCislo`, `email`, `poznamka`) VALUES
(1, 'Otto', 'Mark', 854269871, '@mdo', 'sfsgsgsgerges'),
(2, 'Jacob', 'Thornton', 698475214, '@fat', 'dghdhhdhdhd'),
(3, 'Jakub', 'Kuba', 741258963, 'kuba@gmail.com', 'jgijsot'),
(4, 'Petr', 'Malý', 745987123, 'maly@seznam.cz', 'hlidr');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
