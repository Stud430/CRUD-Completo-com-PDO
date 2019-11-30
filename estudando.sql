-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2019 às 01:09
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estudando`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(30) NOT NULL,
  `idade` int(3) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome_completo`, `idade`, `email`, `usuario`, `senha`) VALUES
(1, 'Fred Flintstone', 30, 'bedrock.fred@gmail.com', 'bR0ckFr3d', 'wilmapebbles'),
(2, 'Wilma Flintstone', 29, 'wilmafred@gmail.com', 'W1lm4', 'Pebbles1'),
(3, 'Pebbles Flintstone', 1, 'pebbles001@gmail.com', 'M3Pebbles', 'babyP3bbles'),
(4, 'Lola LooneyTunes', 4, 'tuneslola@yahoo.com.br', 'LooTunes', 'lola10'),
(5, 'Frajola LooneyTunes', 5, 'frajtunes@ig.com.br', 'looneyF', 'frajolakid'),
(6, 'Patolino LooneyTunes', 7, 'pat_lt@yahoo.com.br', 'P4tL1n0', 'patoLind0'),
(7, 'Lord Farquaad', 37, 'farquaadlord@gmail.com', 'LordRei', 'FionaFarquaad'),
(8, 'Natasha Romanoff', 32, 'nat.romanoff@avengers.com.br', 'NatRMFF', 'ag3ntRm4nofF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
