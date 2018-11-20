-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Lis 2018, 21:39
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mapit`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `preferences` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `organiser_id` int(11) DEFAULT NULL,
  `title` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `preferences` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_start_h` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `date_end` date NOT NULL,
  `date_end_h` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `target_sex` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `target_age_from` int(20) NOT NULL,
  `target_age_to` int(20) NOT NULL,
  `deadline` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `deadline_h` varchar(5) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`id`, `organiser_id`, `title`, `description`, `address`, `latitude`, `longitude`, `preferences`, `date_start`, `date_start_h`, `date_end`, `date_end_h`, `target_sex`, `target_age_from`, `target_age_to`, `deadline`, `deadline_h`) VALUES
(1, 31, 'qwe', '123', 'ulica Pastelowa 42, 30-386 Kraków, Polska', 50, 20, '1', '2018-11-21', '01:01', '2018-11-28', '02:02', '2', 5, 11, '2018-', '02:02'),
(2, 31, 'asd', 'asdddd', 'ulica Tomasza Janiszewskiego 2, 31-807 KrakÃ³w, Polska', 50, 20, '1', '2018-11-20', '01:01', '2018-11-29', '01:01', '1', 5, 11, '2018-', '01:01'),
(3, 31, 'asdasd', 'asdads', '31-983 KrakÃ³w, Polska', 50, 20, '2', '2018-11-20', '01:01', '2018-11-28', '02:02', '3', 55, 66, '2018-', '02:02'),
(4, 31, 'asdasd', 'asdasd', '30-305 KrakÃ³w, Polska', 50, 20, '2', '2018-11-19', '01:02', '2018-11-29', '02:03', '1', 55, 11, '2018-', '02:03'),
(5, 31, 'Kupa', 'Tak', 'ulica MosiÄ™Å¼nicza, 31-547 KrakÃ³w, Polska', 50.0655, 19.9631, '1,2,3', '2018-11-20', '01:02', '2018-11-28', '03:04', '1', 5, 11, '2018-', '03:04'),
(6, 31, '12312', '123132', 'KÄ™pa 9A, 32-090 KÄ™pa, Polska', 50.2213, 20.1252, '2,10', '2018-11-20', '01:02', '2018-11-27', '03:04', '2', 5, 55, '2018-11-21', '03:04'),
(7, 31, 'Kupa', 'GÃ³wno', '30-527 KrakÃ³w, Polska', 50.0488, 19.9549, '1,2,3', '2018-11-21', '02:02', '2018-11-29', '03:04', '2', 5, 11, '2018-11-22', '02:02'),
(8, 10, 'dsfsdfs', 'dfsfsdfsdfs', 'ÐœÐ°Ñ‚Ð²ÐµÐµÐ²ÑÐºÐ¸Ð¹ Ñ€Ð°Ð¹Ð¾Ð½, Ð Ð¾ÑÑÐ¸Ñ, 461880', 53.5287, 53.4872, '1,2,3', '2018-11-23', '23:23', '2018-11-25', '23:32', '3', 11, 33, '2018-11-24', '23:23'),
(9, 12, 'qwe', 'asdasdasd', 'Ø±Ù…Ø§Ø¯Ø©, ØªÙˆÙ†Ø³', 32.0799, 10.2866, '1,2', '2018-11-23', '23:23', '2018-11-30', '12:32', '2', 11, 55, '2018-11-24', '23:23'),
(10, 12, 'qwe', 'asdasdasd', 'Ø±Ù…Ø§Ø¯Ø©, ØªÙˆÙ†Ø³', 32.0799, 10.2866, '1,2', '2018-11-23', '23:23', '2018-11-30', '12:32', '2', 11, 55, '2018-11-24', '23:23'),
(11, 12, 'qwe', 'asdasdasd', 'Ø±Ù…Ø§Ø¯Ø©, ØªÙˆÙ†Ø³', 32.0799, 10.2866, '1,2', '2018-11-23', '23:23', '2018-11-30', '12:32', '2', 11, 55, '2018-11-24', '23:23'),
(12, 12, 'qwe', 'asdasdasd', 'Ø±Ù…Ø§Ø¯Ø©, ØªÙˆÙ†Ø³', 32.0799, 10.2866, '1,2', '2018-11-23', '23:23', '2018-11-30', '12:32', '2', 11, 55, '2018-11-24', '23:23'),
(13, 12, 'qwe', 'asdasdasd', 'Ø±Ù…Ø§Ø¯Ø©, ØªÙˆÙ†Ø³', 32.0799, 10.2866, '1,2', '2018-11-23', '23:23', '2018-11-30', '12:32', '2', 11, 55, '2018-11-24', '23:23'),
(14, 12, 'qwe', 'asdasdasd', 'Ø±Ù…Ø§Ø¯Ø©, ØªÙˆÙ†Ø³', 32.0799, 10.2866, '1,2', '2018-11-23', '23:23', '2018-11-30', '12:32', '2', 11, 55, '2018-11-24', '23:23'),
(15, 12, 'TO niezle', 'HEHEHHEHEHE', 'ulica Widok 20, 31-564 KrakÃ³w, Polska', 50.0576, 19.9793, '1,2,3', '2018-11-23', '01:02', '2018-11-30', '03:44', '1', 5, 55, '2018-11-24', '01:02'),
(16, 15, 'Opening a new restaurant', '...', 'rynek GÅ‚Ã³wny 9, 31-042 KrakÃ³w, Polska', 50.0607, 19.9381, '3', '2018-11-19', '12:00', '2018-11-20', '09:00', '3', 12, 60, '2018-11-20', '12:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `preferences`
--

INSERT INTO `preferences` (`id`, `name`) VALUES
(1, 'Computer programming'),
(2, 'Sport'),
(3, 'Food'),
(4, 'Art'),
(5, 'Photography'),
(6, 'Shopping'),
(7, 'Camping'),
(8, 'Fishing'),
(9, 'Travel'),
(10, 'Electronics'),
(11, 'Technology');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `surname` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `age` int(100) DEFAULT NULL,
  `sex` varchar(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `preferences` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `search_range` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `address`, `latitude`, `longitude`, `age`, `sex`, `preferences`, `search_range`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(2, 'olekjanur@gmail.com', 'asdasd', 'asdasda', 'Janur', 'asdasda', 511, 5151, 55, '1', '123123', 123),
(3, 'adasds2@ads', 'asdas', 'asdasd', 'asdas', 'RÄ…czna, 32-060 RÄ…czna, Polska', 50.0129, 19.7568, 55, 'a', 'asda', 14),
(4, 'loffneostrada@gmail.com', 'asd', 'Diego', 'Costa', '30-363 KrakÃ³w, Polska', 50.0314, 19.9326, 55, 'S', '792090699', 11),
(5, 'das@aa', 'asdasd', 'sadas', 'dadas', '32-080 ZabierzÃ³w, Polska', 50.1064, 19.8269, 55, 'd', 'adsad', 15),
(6, 'asdads@aasd', 'asd', 'asdsadas', 'dasdas', 'ulica prof. MichaÅ‚a Å»yczkowskiego, 31-866 KrakÃ³', 50.0799, 19.9944, 55, 'd', 'as', 18),
(7, 'asdasdadasdsaD2@asda', 'asdasdas', 'czxcxzczczczxczcz', 'zxczzxczcz', '30-224 KrakÃ³w, Polska', 50.0632, 19.8667, 0, 'c', 'asdasd', 6),
(8, 'czxcxcvxvxv@asda', 'asdasdas', 'asdadasd', 'asdsadas', '30-085 KrakÃ³w, Polska', 50.0782, 19.9065, 55, 'a', 'dasdasd', 20),
(9, 'aczxcxvxcvbxbbdsfb@sdad', 'asdasdasdas', 'bcvbvbvcbcbcv', 'cvbcvbcvbcv', 'ulica ks. Adolfa BaÅ›cika 145, 32-060 Liszki, Pols', 50.0412, 19.7665, 55345, 'b', 'adasda', 8),
(10, 'asdsdfdsdfgdfdgd@asdasd', 'a5353253', 'adsadasdasdqweqeq', 'dasdadasd', 'aleja Pustelnika, 30-249 KrakÃ³w, Polska', 50.0517, 19.8447, 0, 'a', 'asdasda', 16),
(11, 'adadasdasdadasd@asdasdas', 'asdasd', 'qasdasda', 'asdasdad', 'ulica StarowiÅ›lna 54, 31-035 KrakÃ³w, Polska', 50.0535, 19.9491, 55, 'a', '', 11),
(12, 'diego@gmail.com', 'asdasd', 'Kamil', 'Diego', '31-031 KrakÃ³w, Polska', 50.0544, 19.9491, 18, 'm', '', 18),
(13, 'asdads@gmail.com', 'asdasd', 'Diego', 'asdasda', 'ulica Ludwika Krzywickiego 13, 30-210 KrakÃ³w, Pol', 50.0632, 19.8873, 55, 'M', '1,2,3', 9),
(14, 'kurcze@op', 'asdasd', 'Krystian', 'Takd', '30-703 KrakÃ³w, Polska', 50.0482, 19.9656, 52, 'm', '1,2,3', 20),
(15, 'dawid.liberda@yahoo.com', 'dawid', 'Dawid', 'Liberda', 'ulica Stolarska 12, 31-043 KrakÃ³w, Polska', 50.0595, 19.9395, 19, 'm', '1,10,11', 10);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
