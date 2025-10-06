-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2025 a las 14:06:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `turno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `nivel`, `turno`) VALUES
(1, '1°A', 'Primario', 'Mañana'),
(2, '2°B', 'Primario', 'Tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `especialidad`, `email`) VALUES
(1, 'María López', 'Matemática', 'maria@colegio.edu.ar'),
(2, 'Carlos Pérez', 'Historia', 'carlos@colegio.edu.ar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `nota` decimal(4,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `alumno_id`, `materia`, `nota`, `fecha`) VALUES
(1, 1, 'Matemática', 8.50, '2025-09-01'),
(2, 1, 'Historia', 7.00, '2025-09-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `docente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `docente`) VALUES
(1, 'Matemática', 'María López'),
(2, 'Historia', 'Carlos Pérez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asistencia`
--

CREATE TABLE `tbl_asistencia` (
  `id` int(11) NOT NULL,
  `presente` tinyint(4) NOT NULL,
  `ausente` tinyint(4) NOT NULL,
  `asistencia_fecha` date NOT NULL,
  `estudiante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabla Asistencia';

--
-- Volcado de datos para la tabla `tbl_asistencia`
--

INSERT INTO `tbl_asistencia` (`id`, `presente`, `ausente`, `asistencia_fecha`, `estudiante_id`) VALUES
(14, 1, 0, '2025-10-03', 11),
(15, 1, 0, '2025-10-03', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiante`
--

CREATE TABLE `tbl_estudiante` (
  `id` int(11) NOT NULL,
  `nombres` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rol_numero` int(11) NOT NULL,
  `fecha_estudiante` date NOT NULL,
  `clase` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabla Estudiante';

--
-- Volcado de datos para la tabla `tbl_estudiante`
--

INSERT INTO `tbl_estudiante` (`id`, `nombres`, `rol_numero`, `fecha_estudiante`, `clase`) VALUES
(11, 'Pedro', 5, '2001-12-11', 'PHP'),
(12, 'Juan', 6, '2019-01-27', 'PHP');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`estudiante_id`);

--
-- Indices de la tabla `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD CONSTRAINT `tbl_asistencia_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `tbl_estudiante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
