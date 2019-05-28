-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 07:11 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `grafik_notash`
--

CREATE TABLE `grafik_notash` (
  `id_grafik_notash` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `lenda_1` text,
  `nota_1` text,
  `lenda_2` text,
  `nota_2` text,
  `lenda_3` text,
  `nota_3` text,
  `lenda_4` text,
  `nota_4` text,
  `lenda_5` text,
  `nota_5` text,
  `lenda_6` text,
  `nota_6` text,
  `lenda_7` text,
  `nota_7` text,
  `lenda_8` text,
  `nota_8` text,
  `lenda_9` text,
  `nota_9` text,
  `lenda_10` text,
  `nota_10` text,
  `lenda_11` text,
  `nota_11` text,
  `lenda_12` text,
  `nota_12` text,
  `emri_grafikut` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klasa`
--

CREATE TABLE `klasa` (
  `id_klasa` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `emri` text,
  `pershkrimi` text,
  `data_krijimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materiale`
--

CREATE TABLE `materiale` (
  `id_materiale` int(11) NOT NULL,
  `id_mesues` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `id_klasa` int(11) DEFAULT NULL,
  `materiali` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mesues`
--

CREATE TABLE `mesues` (
  `id_mesues` int(11) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `numri` int(11) NOT NULL,
  `profili` varchar(80) DEFAULT NULL,
  `email` text NOT NULL,
  `fjalekalimi` text NOT NULL,
  `tipi` set('1') DEFAULT '1',
  `data_regjistrimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `njoftim`
--

CREATE TABLE `njoftim` (
  `id_njoftim` int(11) NOT NULL,
  `id_klasa` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `titulli` varchar(200) DEFAULT NULL,
  `pershkrimi` text,
  `data_krijimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orari_mesimor`
--

CREATE TABLE `orari_mesimor` (
  `id_orari` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `id_klasa` int(11) NOT NULL,
  `emri_orarit` varchar(50) NOT NULL,
  `e_hene` text,
  `e_marte` text,
  `e_merkure` text,
  `e_enjte` text,
  `e_premte` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provimi`
--

CREATE TABLE `provimi` (
  `id_provim` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `pyetja_1` text,
  `per_1` text,
  `pyetja_2` text,
  `per_2` text,
  `pyetja_3` text,
  `per_3` text,
  `pyetja_4` text,
  `per_4` text,
  `pyetja_5` text,
  `per_5` text,
  `pyetja_6` text,
  `per_6` text,
  `pyetja_7` text,
  `per_7` text,
  `pyetja_8` text,
  `per_8` text,
  `pyetja_9` text,
  `per_9` text,
  `pyetja_10` text,
  `per_10` text,
  `pyetja_11` text,
  `per_11` text,
  `pyetja_12` text,
  `per_12` text,
  `pyetja_13` text,
  `per_13` text,
  `pyetja_14` text,
  `per_14` text,
  `pyetja_15` text,
  `per_15` text,
  `pyetja_16` text,
  `per_16` text,
  `pyetja_17` text,
  `per_17` text,
  `pyetja_18` text,
  `per_18` text,
  `pyetja_19` text,
  `per_19` text,
  `pyetja_20` text,
  `per_20` text,
  `pyetja_21` text,
  `per_21` text,
  `pyetja_22` text,
  `per_22` text,
  `pyetja_23` text,
  `per_23` text,
  `pyetja_24` text,
  `per_24` text,
  `pyetja_25` text,
  `per_25` text,
  `pyetja_26` text,
  `per_26` text,
  `pyetja_27` text,
  `per_27` text,
  `pyetja_28` text,
  `per_28` text,
  `pyetja_29` text,
  `per_29` text,
  `pyetja_30` text,
  `per_30` text,
  `emri` varchar(50) DEFAULT NULL,
  `mbiemri` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `id_klasa` int(11) NOT NULL,
  `email` text NOT NULL,
  `fjalekalimi` text NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `numri` int(11) DEFAULT NULL,
  `numri_prindit` int(11) DEFAULT NULL,
  `ditelindja` date DEFAULT NULL,
  `vendlindja` varchar(50) DEFAULT NULL,
  `vendbanimi` varchar(50) DEFAULT NULL,
  `gjinia` text,
  `id_personale` text,
  `certifikate` varchar(2000) DEFAULT NULL,
  `atesia` varchar(70) DEFAULT NULL,
  `tipi` set('2') DEFAULT '2',
  `data_regjistrimit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teze_provimi`
--

CREATE TABLE `teze_provimi` (
  `id_provim` int(11) NOT NULL,
  `id_mesues` int(11) NOT NULL,
  `id_klasa` int(11) NOT NULL,
  `pyetja1` text,
  `pyetja2` text,
  `pyetja3` text,
  `pyetja4` text,
  `pyetja5` text,
  `pyetja6` text,
  `pyetja7` text,
  `pyetja8` text,
  `pyetja9` text,
  `pyetja10` text,
  `pyetja11` text,
  `pyetja12` text,
  `pyetja13` text,
  `pyetja14` text,
  `pyetja15` text,
  `pyetja16` text,
  `pyetja17` text,
  `pyetja18` text,
  `pyetja19` text,
  `pyetja20` text,
  `pyetja21` text,
  `pyetja22` text,
  `pyetja23` text,
  `pyetja24` text,
  `pyetja25` text,
  `pyetja26` text,
  `pyetja27` text,
  `pyetja28` text,
  `pyetja29` text,
  `pyetja30` text,
  `emri` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grafik_notash`
--
ALTER TABLE `grafik_notash`
  ADD PRIMARY KEY (`id_grafik_notash`),
  ADD KEY `id_mesues` (`id_mesues`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasa`),
  ADD KEY `id_mesues` (`id_mesues`);

--
-- Indexes for table `materiale`
--
ALTER TABLE `materiale`
  ADD PRIMARY KEY (`id_materiale`),
  ADD KEY `id_mesues` (`id_mesues`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_klasa` (`id_klasa`);

--
-- Indexes for table `mesues`
--
ALTER TABLE `mesues`
  ADD PRIMARY KEY (`id_mesues`);

--
-- Indexes for table `njoftim`
--
ALTER TABLE `njoftim`
  ADD PRIMARY KEY (`id_njoftim`),
  ADD KEY `id_klasa` (`id_klasa`),
  ADD KEY `id_mesues` (`id_mesues`);

--
-- Indexes for table `orari_mesimor`
--
ALTER TABLE `orari_mesimor`
  ADD PRIMARY KEY (`id_orari`),
  ADD KEY `id_mesues` (`id_mesues`),
  ADD KEY `id_klasa` (`id_klasa`);

--
-- Indexes for table `provimi`
--
ALTER TABLE `provimi`
  ADD PRIMARY KEY (`id_provim`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_mesues` (`id_mesues`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_mesues` (`id_mesues`),
  ADD KEY `id_klasa` (`id_klasa`);

--
-- Indexes for table `teze_provimi`
--
ALTER TABLE `teze_provimi`
  ADD PRIMARY KEY (`id_provim`),
  ADD KEY `id_mesues` (`id_mesues`),
  ADD KEY `id_klasa` (`id_klasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grafik_notash`
--
ALTER TABLE `grafik_notash`
  MODIFY `id_grafik_notash` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materiale`
--
ALTER TABLE `materiale`
  MODIFY `id_materiale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mesues`
--
ALTER TABLE `mesues`
  MODIFY `id_mesues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `njoftim`
--
ALTER TABLE `njoftim`
  MODIFY `id_njoftim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orari_mesimor`
--
ALTER TABLE `orari_mesimor`
  MODIFY `id_orari` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provimi`
--
ALTER TABLE `provimi`
  MODIFY `id_provim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teze_provimi`
--
ALTER TABLE `teze_provimi`
  MODIFY `id_provim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grafik_notash`
--
ALTER TABLE `grafik_notash`
  ADD CONSTRAINT `grafik_notash_ibfk_1` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`),
  ADD CONSTRAINT `grafik_notash_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Constraints for table `klasa`
--
ALTER TABLE `klasa`
  ADD CONSTRAINT `klasa_ibfk_1` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`);

--
-- Constraints for table `materiale`
--
ALTER TABLE `materiale`
  ADD CONSTRAINT `materiale_ibfk_1` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`),
  ADD CONSTRAINT `materiale_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`),
  ADD CONSTRAINT `materiale_ibfk_3` FOREIGN KEY (`id_klasa`) REFERENCES `klasa` (`id_klasa`);

--
-- Constraints for table `njoftim`
--
ALTER TABLE `njoftim`
  ADD CONSTRAINT `njoftim_ibfk_1` FOREIGN KEY (`id_klasa`) REFERENCES `klasa` (`id_klasa`),
  ADD CONSTRAINT `njoftim_ibfk_2` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`);

--
-- Constraints for table `orari_mesimor`
--
ALTER TABLE `orari_mesimor`
  ADD CONSTRAINT `orari_mesimor_ibfk_1` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`),
  ADD CONSTRAINT `orari_mesimor_ibfk_2` FOREIGN KEY (`id_klasa`) REFERENCES `klasa` (`id_klasa`);

--
-- Constraints for table `provimi`
--
ALTER TABLE `provimi`
  ADD CONSTRAINT `provimi_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`),
  ADD CONSTRAINT `provimi_ibfk_2` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`id_klasa`) REFERENCES `klasa` (`id_klasa`);

--
-- Constraints for table `teze_provimi`
--
ALTER TABLE `teze_provimi`
  ADD CONSTRAINT `teze_provimi_ibfk_1` FOREIGN KEY (`id_mesues`) REFERENCES `mesues` (`id_mesues`),
  ADD CONSTRAINT `teze_provimi_ibfk_2` FOREIGN KEY (`id_klasa`) REFERENCES `klasa` (`id_klasa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
