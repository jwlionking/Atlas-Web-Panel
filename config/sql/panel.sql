-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2019 at 06:20 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `atlas`
--

CREATE TABLE IF NOT EXISTS `atlas` (
  `id` int(6) unsigned NOT NULL,
  `SessionName` varchar(255) DEFAULT NULL,
  `ServerAdminPassword` varchar(255) DEFAULT NULL,
  `RCONEnabled` varchar(255) DEFAULT NULL,
  `RCONPort` varchar(255) DEFAULT NULL,
  `ServerX` varchar(255) DEFAULT NULL,
  `ServerY` varchar(255) DEFAULT NULL,
  `AltSaveDirectoryName` varchar(255) DEFAULT NULL,
  `Port` varchar(255) DEFAULT NULL,
  `QueryPort` varchar(255) DEFAULT NULL,
  `MaxPlayers` varchar(255) DEFAULT NULL,
  `ReservedPlayerSlots` varchar(255) DEFAULT NULL,
  `SeamlessIP` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atlas`
--

INSERT INTO `atlas` (`id`, `SessionName`, `ServerAdminPassword`, `RCONEnabled`, `RCONPort`, `ServerX`, `ServerY`, `AltSaveDirectoryName`, `Port`, `QueryPort`, `MaxPlayers`, `ReservedPlayerSlots`, `SeamlessIP`) VALUES
(1, '[CrimsonFusion.org]', 'Alienwarem17', 'True', '32340', '0', '0', '0_0', '5760', '57560', '50', '25', '207.255.60.143'),
(2, '[CrimsonFusion.org]', 'Alienwarem17', 'True', '32341', '1', '0', '1_0', '5775', '57575', '50', '25', '207.255.60.143'),
(3, '[CrimsonFusion.org]', 'Alienwarem17', 'True', '32342', '0', '1', '0_1', '5777', '57577', '50', '25', '207.255.60.143'),
(4, '[CrimsonFusion.org]', 'Alienwarem17', 'True', '32343', '1', '1', '1_1', '5789', '57589', '50', '25', '207.255.60.143');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atlas`
--
ALTER TABLE `atlas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atlas`
--
ALTER TABLE `atlas`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
