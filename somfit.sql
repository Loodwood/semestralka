-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1:3306
-- Čas generovania: Po 23.Nov 2020, 13:25
-- Verzia serveru: 5.7.31
-- Verzia PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `somfit`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pouzivatelia`
--

DROP TABLE IF EXISTS `pouzivatelia`;
CREATE TABLE IF NOT EXISTS `pouzivatelia` (
  `indexP` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prMeno` varchar(15) COLLATE utf8_slovak_ci NOT NULL,
  `heslo` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `meno` varchar(15) COLLATE utf8_slovak_ci NOT NULL,
  `priezvisko` varchar(15) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`indexP`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `pouzivatelia`
--

INSERT INTO `pouzivatelia` (`indexP`, `prMeno`, `heslo`, `email`, `meno`, `priezvisko`) VALUES
(8, 'Kuboo', '123456', 'Kubo@gmail.com', 'Kubo', 'Kubo'),
(12, 'JankoM', '369852', 'mail@email.com', 'Janko', 'MrkviÄka'),
(13, 'JoÅ¾ko', '123456', 'Jozef123@mail.com', 'Jozef', 'JozefovitÃ½');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
