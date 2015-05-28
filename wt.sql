-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 10:39 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `novosti` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `novosti` (`novosti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`novosti`, `email`, `tekst`, `autor`, `vrijeme`) VALUES
(1, 'ajdin@hotmail.com', 'Testni komentar', 'Ajdin', '0000-00-00 00:00:00'),
(1, 'ajdin@hotmail.com', 'klklkl', 'Ajdin', '2015-05-28 19:30:44'),
(1, 'klkl', 'klklkl', 'klkl', '2015-05-28 19:33:30'),
(1, 'kl', 'iiiii', 'kl', '2015-05-28 19:46:59'),
(1, 'test@hotmail.com', 'ovo je komentar', 'ajdin', '2015-05-28 20:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `detaljno` text COLLATE utf8_slovenian_ci NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `slika`, `detaljno`, `naslov`, `tekst`, `autor`, `datum`) VALUES
(1, 'https://zamger.etf.unsa.ba/images/16x16/zad_ok.png', 'Ovdje sada slijedi detaljniji tekst novosti. \r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.\r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.', 'Ovo je neki naslov', 'Sada ću napisati neki osnovni tekst.\r\nOvaj osnovni tekst se nalazi u više redova.\r\nDatum je 28.', 'Vedran Ljubović', '2015-05-28 19:03:16'),
(2, 'https://zamger.etf.unsa.ba/images/16x16/zad_ok.png', 'Ovdje sada slijedi detaljniji tekst novosti. \r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.\r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.', 'Test naslov', 'Sada ću napisati neki osnovni tekst.\r\nOvaj osnovni tekst se nalazi u više redova.', 'Vedran Ljubović', '2015-05-07 19:03:59'),
(3, 'https://zamger.etf.unsa.ba/images/16x16/zad_ok.png', '', 'Test test', 'Sada ću napisati neki osnovni tekst.\r\nOvaj osnovni tekst se nalazi u više redova.', 'Vedran Ljubović', '2015-05-01 19:04:28');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`novosti`) REFERENCES `novosti` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
