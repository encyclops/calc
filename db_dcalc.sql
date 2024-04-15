-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 06:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dcalc`
--

-- --------------------------------------------------------

--
-- Table structure for table `dcalc_foodtype`
--

CREATE TABLE `dcalc_foodtype` (
  `FTYPE_ID` int(11) NOT NULL,
  `FTYPE_NAME` varchar(500) NOT NULL,
  `FTYPE_PROTEIN` double NOT NULL,
  `FTYPE_COMPLYS` double NOT NULL,
  `FTYPE_COMPSAA` double NOT NULL,
  `FTYPE_COMPTHR` double NOT NULL,
  `FTYPE_COMPTRP` double NOT NULL,
  `FTYPE_TRUELYS` double NOT NULL,
  `FTYPE_TRUESAA` double NOT NULL,
  `FTYPE_TRUETHR` double NOT NULL,
  `FTYPE_TRUETRP` double NOT NULL,
  `FTYPE_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcalc_foodtype`
--

INSERT INTO `dcalc_foodtype` (`FTYPE_ID`, `FTYPE_NAME`, `FTYPE_PROTEIN`, `FTYPE_COMPLYS`, `FTYPE_COMPSAA`, `FTYPE_COMPTHR`, `FTYPE_COMPTRP`, `FTYPE_TRUELYS`, `FTYPE_TRUESAA`, `FTYPE_TRUETHR`, `FTYPE_TRUETRP`, `FTYPE_STATUS`) VALUES
(1, 'Wheat', 11, 28, 38, 29, 12, 0.82, 0.895, 0.86, 0.91, 1),
(2, 'Pea', 21, 71, 25, 37, 9, 0.79, 0.69, 0.73, 0.66, 1),
(3, 'Milk Powder', 28, 78, 35, 44, 13, 0.95, 0.94, 0.9, 0.9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dcalc_refpattern`
--

CREATE TABLE `dcalc_refpattern` (
  `RPATT_ID` int(11) NOT NULL,
  `RPATT_NAME` varchar(500) NOT NULL,
  `RPATT_HIS` double NOT NULL,
  `RPATT_ILE` double NOT NULL,
  `RPATT_LEU` double NOT NULL,
  `RPATT_LYS` double NOT NULL,
  `RPATT_SAA` double NOT NULL,
  `RPATT_AAA` double NOT NULL,
  `RPATT_THR` double NOT NULL,
  `RPATT_TRP` double NOT NULL,
  `RPATT_VAL` double NOT NULL,
  `RPATT_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcalc_refpattern`
--

INSERT INTO `dcalc_refpattern` (`RPATT_ID`, `RPATT_NAME`, `RPATT_HIS`, `RPATT_ILE`, `RPATT_LEU`, `RPATT_LYS`, `RPATT_SAA`, `RPATT_AAA`, `RPATT_THR`, `RPATT_TRP`, `RPATT_VAL`, `RPATT_STATUS`) VALUES
(1, 'Infant (birth to 6 months)', 21, 55, 96, 69, 33, 94, 44, 17, 55, 1),
(2, 'Child (6 months to 3 year)', 20, 32, 66, 57, 27, 52, 31, 8.5, 43, 1),
(3, 'Older child, adolescent, adult', 16, 30, 61, 48, 23, 41, 25, 6.6, 40, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dcalc_foodtype`
--
ALTER TABLE `dcalc_foodtype`
  ADD PRIMARY KEY (`FTYPE_ID`);

--
-- Indexes for table `dcalc_refpattern`
--
ALTER TABLE `dcalc_refpattern`
  ADD PRIMARY KEY (`RPATT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dcalc_foodtype`
--
ALTER TABLE `dcalc_foodtype`
  MODIFY `FTYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dcalc_refpattern`
--
ALTER TABLE `dcalc_refpattern`
  MODIFY `RPATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
