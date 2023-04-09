-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2023 a las 18:08:38
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_taller`
--
CREATE DATABASE IF NOT EXISTS `bd_taller` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_taller`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `estado`, `fecha_crea`) VALUES
(1, 'Auxiliar de bodega', 'A', '2023-03-12 03:33:23'),
(2, 'Asistente administrativo', 'A', '2023-03-12 03:33:23'),
(3, 'Gerente', 'A', '2023-03-12 03:33:23'),
(4, 'contador', 'A', '2023-03-12 03:33:23'),
(5, 'Logistica', 'A', '2023-03-12 03:33:23'),
(6, 'Administrador', 'A', '2023-03-13 20:49:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` smallint(2) NOT NULL,
  `id_pais` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `id_pais`, `nombre`, `estado`, `fecha_crea`) VALUES
(1, 1, 'Atlántico', 'A', '2023-03-12 03:05:59'),
(2, 2, 'Partido de general villegas', 'A', '2023-03-12 03:05:59'),
(3, 3, 'Amazonas', 'A', '2023-03-12 03:05:59'),
(4, 4, 'País Vasco', 'A', '2023-03-12 03:05:59'),
(5, 5, 'Piamonte', 'A', '2023-03-12 03:05:59'),
(8, 1, 'asdas', 'A', '2023-03-13 20:40:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` smallint(2) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacimiento` year(4) DEFAULT NULL,
  `id_municipio` smallint(2) DEFAULT NULL,
  `id_cargo` smallint(2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `apellidos`, `nacimiento`, `id_municipio`, `id_cargo`, `estado`, `fecha_crea`) VALUES
(1, 'Carlos andres', 'de las salas', 2003, 1, 4, 'A', '2023-03-12 03:34:05'),
(2, 'Kahterin vanessa', 'de las salas', 2000, 1, 4, 'A', '2023-03-12 03:34:05'),
(3, 'Carlos alberto', 'de las salas', 2003, 1, 4, 'A', '2023-03-12 03:34:05'),
(4, 'Lisbeth esther', 'Ospino', 1978, 1, 4, 'A', '2023-03-12 03:34:05'),
(5, 'Luisa maria', 'de las salas', 2005, 1, 4, 'A', '2023-03-12 03:34:05'),
(6, 'Alejandro1', 'gonzalo', 2003, 1, 2, 'E', '2023-03-27 23:18:53'),
(7, 'Arnulfo', 'Aliñado', 1991, 2, 1, 'A', '2023-03-12 03:34:05'),
(8, 'Bernardo', 'Culajay', 2003, 2, 1, 'A', '2023-03-12 03:34:05'),
(9, 'Héctor Leónidas', 'Rosales Arias', 1996, 2, 1, 'A', '2023-03-12 03:34:05'),
(10, 'Angelino', 'López', 2003, 2, 2, 'A', '2023-03-12 03:34:05'),
(11, 'Catalino', 'Chinchilla', 2003, 3, 2, 'A', '2023-03-12 03:34:05'),
(12, 'César', 'Valenzuela', 1997, 3, 2, 'A', '2023-03-12 03:34:05'),
(13, 'Faustino', 'Ixcajoc', 1996, 3, 2, 'A', '2023-03-12 03:34:05'),
(14, 'Fredy', 'Gramajo', 2003, 3, 2, 'A', '2023-03-12 03:34:05'),
(15, 'Juana Isabe', 'Dominguez', 1993, 3, 2, 'A', '2023-03-12 03:34:05'),
(16, 'Nazario', 'Gomez', 2003, 4, 3, 'A', '2023-03-12 03:34:05'),
(17, 'Primo', 'Miranda Castellanos', 1987, 4, 3, 'A', '2023-03-12 03:34:05'),
(18, 'Edy Benigno', 'Morales', 2003, 4, 3, 'A', '2023-03-12 03:34:05'),
(19, 'Maritza', 'Molina', 2003, 4, 3, 'A', '2023-03-12 03:34:05'),
(20, 'Flavio', 'Garcia', 1999, 4, 3, 'A', '2023-03-12 03:34:05'),
(21, 'Esdras Eliu', 'Morales Pu', 1998, 5, 5, 'A', '2023-03-12 03:34:05'),
(22, 'Edgar Mardoqueo', 'Flores', 2003, 5, 5, 'A', '2023-03-12 03:34:05'),
(23, 'Edvin', 'Orellana', 2003, 5, 5, 'A', '2023-03-12 03:34:05'),
(24, 'Edwin Manfredo', 'Garcia', 1999, 5, 5, 'A', '2023-03-12 03:34:05'),
(25, 'Fidel', 'Velasquez Lopez', 1992, 5, 5, 'A', '2023-03-12 03:34:05'),
(26, 'Nayeli andrea', 'altamar martinez', NULL, NULL, 4, 'A', '2023-03-13 20:56:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` smallint(2) NOT NULL,
  `id_departamento` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `id_departamento`, `nombre`, `estado`, `fecha_crea`) VALUES
(1, 1, 'Barranquilla', 'A', '2023-03-12 03:28:18'),
(2, 2, 'Piedritas', 'A', '2023-03-12 03:28:18'),
(3, 3, 'Manaos', 'A', '2023-03-12 03:28:18'),
(4, 4, 'Bilbao', 'A', '2023-03-12 03:28:18'),
(5, 5, 'Turín', 'A', '2023-03-12 03:28:18'),
(6, 1, 'asdas', 'A', '2023-03-13 15:47:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` smallint(2) NOT NULL,
  `codigo` varchar(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `codigo`, `nombre`, `estado`, `fecha_crea`) VALUES
(1, '57', 'colombia', 'A', '2023-03-13 15:07:36'),
(2, '1', 'argentina', 'A', '2023-03-11 16:29:30'),
(3, '1', 'brasil', 'A', '2023-03-11 16:29:32'),
(4, '1', 'españa', 'A', '2023-03-11 16:29:34'),
(5, '1', 'italia', 'A', '2023-03-11 16:29:35'),
(6, '445', 'gsgs', 'A', '2023-03-13 20:31:05'),
(7, '55', 'Mexico', 'A', '2023-03-13 20:31:27'),
(8, '52', 'Masdsa', 'A', '2023-03-28 21:16:54'),
(9, '12', '1', 'A', '2023-03-29 00:10:50'),
(10, '12', '2', 'A', '2023-03-29 00:14:44'),
(11, '78', 'Venecia', 'A', '2023-03-29 01:10:42'),
(12, '33', 'Venecia', 'A', '2023-04-07 15:29:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id` smallint(2) NOT NULL,
  `año` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `año`) VALUES
(1, '2000'),
(2, '2001'),
(3, '2002'),
(4, '2003'),
(5, '2004'),
(6, '2005'),
(7, '2006'),
(8, '2007'),
(9, '2008'),
(10, '2009'),
(11, '2010'),
(12, '2011'),
(13, '2012'),
(14, '2013'),
(15, '2014'),
(16, '2015'),
(17, '2016'),
(18, '2017'),
(19, '2018'),
(20, '2019'),
(21, '2020'),
(22, '2021'),
(23, '2022'),
(24, '2023'),
(25, '2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salarios`
--

CREATE TABLE `salarios` (
  `id` smallint(2) NOT NULL,
  `periodo` year(4) DEFAULT NULL,
  `id_empleado` smallint(2) NOT NULL,
  `sueldo` decimal(11,2) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salarios`
--

INSERT INTO `salarios` (`id`, `periodo`, `id_empleado`, `sueldo`, `estado`, `fecha_crea`) VALUES
(1, 2022, 1, '2300000.00', 'A', '2023-03-28 12:52:15'),
(2, 2022, 2, '2300000.00', 'A', '2023-03-28 12:52:17'),
(3, 2022, 3, '2300000.00', 'A', '2023-03-28 12:52:18'),
(4, 2022, 4, '2300000.00', 'A', '2023-03-28 12:52:20'),
(5, 2022, 5, '2300000.00', 'A', '2023-03-28 12:52:21'),
(6, 2022, 6, '4399000.00', 'A', '2023-03-28 12:52:23'),
(7, 2022, 7, '4399000.00', 'A', '2023-03-28 12:52:25'),
(8, 2022, 8, '4399000.00', 'A', '2023-03-28 12:52:27'),
(9, 2022, 9, '4399000.00', 'A', '2023-03-28 12:52:29'),
(10, 2022, 10, '4399000.00', 'A', '2023-03-28 12:52:31'),
(11, 2022, 11, '7500000.00', 'A', '2023-03-28 12:52:32'),
(12, 2022, 12, '7500000.00', 'A', '2023-03-28 12:52:33'),
(13, 2022, 13, '7500000.00', 'A', '2023-03-28 12:52:35'),
(14, 2022, 14, '7500000.00', 'A', '2023-03-28 12:52:36'),
(15, 2022, 15, '7500000.00', 'A', '2023-03-28 12:52:39'),
(16, 2022, 16, '1904000.00', 'A', '2023-03-28 12:52:41'),
(17, 2022, 17, '1904000.00', 'A', '2023-03-28 12:52:42'),
(18, 2022, 18, '1904000.00', 'A', '2023-03-28 12:52:44'),
(19, 2022, 19, '1904000.00', 'A', '2023-03-28 12:52:46'),
(20, 2022, 20, '19904000.00', 'A', '2023-03-28 12:52:50'),
(21, 2022, 21, '19904000.00', 'A', '2023-03-28 12:52:51'),
(22, 2022, 22, '19904000.00', 'A', '2023-03-28 12:52:53'),
(23, 2022, 23, '19904000.00', 'A', '2023-03-28 12:52:54'),
(24, 2022, 24, '19904000.00', 'A', '2023-03-28 12:52:56'),
(25, 2022, 25, '19904000.00', 'A', '2023-03-28 12:52:57'),
(30, 2023, 1, '0.00', 'A', '2023-03-28 17:55:17'),
(31, 2023, 1, '0.00', 'A', '2023-03-28 17:55:17'),
(32, 2023, 1, '150000.00', 'A', '2023-03-28 17:55:32'),
(33, 2005, 9, '1500000.00', 'A', '2023-03-28 18:01:25'),
(34, 2023, 2, '250000.00', 'A', '2023-03-28 18:01:56'),
(35, 2022, 22, '150000.00', 'E', '2023-03-28 13:15:59'),
(36, 2006, 4, '1000000.00', 'E', '2023-03-28 13:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(2) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `password`, `type`, `estado`, `usuario_crea`, `fecha_crea`) VALUES
(1, 'prueba', 'miprueba@gmail.com', '12312', 'user', 'A', 1, '2023-04-02 03:09:52'),
(2, 'Krast', 'delassalasospino2003@gmail.com', '$2y$10$Q0dUsuXomMzhOPzWzeqEquNY6HX./GAoHX52VCs/Kec0BZgkM0ex.', 'admin', 'A', 1, '2023-04-02 01:12:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salarios`
--
ALTER TABLE `salarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_usuario_crea` (`usuario_crea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `salarios`
--
ALTER TABLE `salarios`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `salarios`
--
ALTER TABLE `salarios`
  ADD CONSTRAINT `salarios_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_usuario_crea` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
