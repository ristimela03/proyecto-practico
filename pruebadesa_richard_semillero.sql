-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2021 a las 23:01:38
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebadesa_richard_semillero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_lista`
--

CREATE TABLE `tipos_lista` (
  `Id` int(11) NOT NULL,
  `tipo_identificacion` varchar(200) NOT NULL,
  `tipo_tercero` varchar(200) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `tipo_contribuyente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_lista`
--

INSERT INTO `tipos_lista` (`Id`, `tipo_identificacion`, `tipo_tercero`, `departamento`, `ciudad`, `tipo_contribuyente`) VALUES
(3, 'cedula', 'paciente', 'cundinamarca', 'bogota', 'gran contribullente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipos_lista`
--
ALTER TABLE `tipos_lista`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipos_lista`
--
ALTER TABLE `tipos_lista`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
