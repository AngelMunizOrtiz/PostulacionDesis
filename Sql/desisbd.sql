-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2023 a las 00:21:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desisbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infovotos`
--

CREATE TABLE `infovotos` (
  `rut` varchar(10) NOT NULL,
  `nombreApellido` varchar(20) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `region` varchar(30) NOT NULL,
  `comuna` varchar(30) NOT NULL,
  `candidato` varchar(50) NOT NULL,
  `comentarios` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombrecandidatos`
--

CREATE TABLE `nombrecandidatos` (
  `nomCandidato` varchar(30) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Comuna` varchar(50) NOT NULL,
  `IdCandidato` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nombrecandidatos`
--

INSERT INTO `nombrecandidatos` (`nomCandidato`, `Region`, `Comuna`, `IdCandidato`, `id`) VALUES
('Sergio Bitar', 'Arica y Parinacota', 'General Lagos', 1, 1),
('Marcela Ortega', '', 'Putre', 1, 2),
('Pilar Barrientos', '', 'Camarones', 1, 3),
('Mauricio Schmidt', '', 'Arica', 1, 4),
('Sebastián Parraguez', 'Maule', 'Cauquenes', 2, 21),
('Francisca Vargas', '', 'Chanco ', 2, 22),
('Luis Vergara', '', 'Pelluhue', 2, 23);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `infovotos`
--
ALTER TABLE `infovotos`
  ADD PRIMARY KEY (`rut`);

--
-- Indices de la tabla `nombrecandidatos`
--
ALTER TABLE `nombrecandidatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nombrecandidatos`
--
ALTER TABLE `nombrecandidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
