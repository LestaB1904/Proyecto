-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 03:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibo`
--

-- --------------------------------------------------------

--
-- Table structure for table `herramientas`
--

CREATE TABLE `herramientas` (
  `ID` int(11) NOT NULL,
  `Nombre_Herramienta` varchar(100) NOT NULL,
  `Cantidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maquinas`
--

CREATE TABLE `maquinas` (
  `ID` int(11) NOT NULL,
  `Tipo_Maquina` varchar(100) NOT NULL,
  `Marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movimientos`
--

CREATE TABLE `movimientos` (
  `ID` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Herramienta` int(11) DEFAULT NULL,
  `ID_Repuesto` int(11) DEFAULT NULL,
  `ID_Maquina` int(11) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repuestos`
--

CREATE TABLE `repuestos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `ID_Maquina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Tipo_Usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Herramienta` (`ID_Herramienta`),
  ADD KEY `ID_Repuesto` (`ID_Repuesto`),
  ADD KEY `ID_Maquina` (`ID_Maquina`);

--
-- Indexes for table `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_maquina` (`ID_Maquina`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`ID_Herramienta`) REFERENCES `herramientas` (`ID`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`ID_Repuesto`) REFERENCES `repuestos` (`ID`),
  ADD CONSTRAINT `movimientos_ibfk_4` FOREIGN KEY (`ID_Maquina`) REFERENCES `maquinas` (`ID`);

--
-- Constraints for table `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `fk_maquina` FOREIGN KEY (`ID_Maquina`) REFERENCES `maquinas` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
