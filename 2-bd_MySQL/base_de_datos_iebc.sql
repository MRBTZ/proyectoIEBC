-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2021 a las 12:05:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_de_datos_iebc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idasistencia` bigint(20) NOT NULL,
  `codigoid` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `entrada` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `salida` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fecha` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`idasistencia`, `codigoid`, `entrada`, `salida`, `fecha`, `status`) VALUES
(13, 'tavo', '20:29:12 PM', '22:57:52 PM', '2021-11-03', '1'),
(14, 'elexito', '20:29:38 PM', '22:56:18 PM', '2021-11-03', '1'),
(15, 'tavo', '20:30:09 PM', '22:57:52 PM', '2021-11-03', '1'),
(16, 'tavo', '22:58:21 PM', '', '2021-11-03', '0'),
(17, 'Poco a poco', '00:13:10 AM', '03:08:54 AM', '2021-11-04', '1'),
(18, 'elexito', '00:13:48 AM', '03:07:50 AM', '2021-11-04', '1'),
(19, 'tavo', '00:14:02 AM', '00:14:18 AM', '2021-11-04', '1'),
(20, 'elexito', '03:07:04 AM', '03:07:50 AM', '2021-11-04', '1'),
(21, 'tavo', '05:01:13 AM', '', '2021-11-04', '0'),
(22, 'elexito', '05:01:20 AM', '', '2021-11-04', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` bigint(20) NOT NULL,
  `cursos` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `cursos`, `status`) VALUES
(1, 'Matemáticas', 1),
(2, 'Comunicación y Lenguaje', 1),
(3, 'Ciencias Naturales ', 1),
(4, 'Ciencias Sociales ', 1),
(5, 'Ingles ', 1),
(6, 'Kiche', 1),
(7, 'Musica ', 1),
(8, 'Artes Plasticas ', 1),
(9, 'Emprendimiento ', 1),
(10, 'Hogar', 1),
(11, 'Educación Fisica', 1),
(12, 'Computación ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` bigint(20) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombresE` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidosE` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fechaN` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ciclo` bigint(20) NOT NULL,
  `papeleria` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcionP` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `gradoid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `identificacion`, `nombres`, `apellidos`, `telefono`, `direccion`, `nombresE`, `apellidosE`, `fechaN`, `ciclo`, `papeleria`, `descripcionP`, `gradoid`) VALUES
(25, '1234567899874', 'Pablo Roberto', 'Batz Perez', 14785236, 'Canton Chotacaj', 'Misael Rodolfo', 'Batz Tzunun', '1998-05-12', 2021, '1', 'Papeleria Recibida', 3),
(26, '1478523699632', 'Juana Josefa', 'Tzunun Chaclan', 77664455, 'Ciudad', 'Roberto Armando', 'Batz Tzunun', '1990-10-11', 2021, '1', 'Papeleria Archivada', 1),
(27, '5465465', 'Hjjhbb', 'Bjhbjhb', 6536732, 'Cajxac', 'Marta', 'Barreno', '2021-10-18', 2021, '1', 'Gdsfg', 1),
(28, '7738734387', 'Abner', 'Chaclan', 14785236, 'Totonicapan', 'Brayan', 'Batz', '2021-10-20', 2021, '1', 'Completo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idgrado` bigint(20) NOT NULL,
  `grado` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idgrado`, `grado`, `status`) VALUES
(1, 'Primero', 1),
(2, 'Segundo', 1),
(3, 'Tercero', 1),
(4, 'Opcion ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `idmaestro` bigint(20) NOT NULL,
  `identificacion` varchar(13) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cursoid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`idmaestro`, `identificacion`, `nombres`, `apellidos`, `telefono`, `direccion`, `codigo`, `cursoid`, `status`) VALUES
(1, '34234324', 'Juan', 'Cutz', 234234, 'Chotacaj', 'elexito', 1, 1),
(2, '1234567891245', 'Maria', 'Gonzales', 345345, 'Fsdfdsf', 'sfgs43654', 11, 1),
(3, '1234567898745', 'Gustavo', 'Alberto', 1478523, 'Ciudad', 'tavo', 6, 1),
(4, '1478523698745', 'Enrique', 'Mendez', 14785236, 'Sdfgsdfg', 'Poco a poco', 7, 1),
(5, '1478523698741', 'Angelica', 'Batz', 77778888, 'Cojxac', 'que vida la lengua', 2, 1),
(6, '9874518745896', 'Ana', 'Cua', 9874588, 'Paqui', '2021iebcchota', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Alumnos', 'Estudiantes del establecimiento', 1),
(4, 'Maestros', 'Personal docente', 1),
(5, 'SMS', 'mensajes de textos para maestros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(93, 2, 1, 1, 1, 1, 1),
(94, 2, 2, 1, 1, 1, 1),
(95, 2, 3, 1, 1, 1, 1),
(96, 2, 4, 1, 1, 1, 1),
(97, 2, 5, 1, 1, 1, 1),
(98, 3, 1, 1, 1, 1, 1),
(99, 3, 2, 0, 0, 0, 0),
(100, 3, 3, 1, 1, 1, 1),
(101, 3, 4, 1, 1, 1, 1),
(102, 3, 5, 0, 0, 0, 0),
(103, 4, 1, 1, 0, 0, 0),
(104, 4, 2, 0, 0, 0, 0),
(105, 4, 3, 1, 1, 1, 0),
(106, 4, 4, 1, 0, 0, 0),
(107, 4, 5, 0, 0, 0, 0),
(108, 5, 1, 1, 0, 0, 0),
(109, 5, 2, 0, 0, 0, 0),
(110, 5, 3, 1, 0, 0, 0),
(111, 5, 4, 1, 0, 0, 0),
(112, 5, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `status`) VALUES
(1, 'admin', 'Admin', 'Admin', 123, 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'CF', 'Misael', 'Guatemala', '', 1, '2021-10-10 02:28:53', 1),
(2, '1234567896321', 'Misael Rodolfo', 'Batz Tzunun', 41706394, 'mrbtzjp@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', '', '', '', 1, '2021-10-10 02:31:00', 1),
(8, '12345678998745', 'Gustavo', 'Lopez', 12345678, 'tavo@gmail.com', 'cd14d5273f185317a580869b512c6b6dfd367c818f6dff1b75339aa21681ef09', '', '', '', '', 1, '2021-10-29 23:33:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Acceso Total', 'Acceso a todo el sistema', 1),
(2, 'Director', 'Encargado del sistema', 1),
(3, 'Secretaria', 'Encargada de los registros', 1),
(4, 'Maestros', 'Personal docente', 1),
(5, 'Invitados', 'Colaborador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idasistencia`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`),
  ADD KEY `gradoid` (`gradoid`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idgrado`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`idmaestro`),
  ADD KEY `cursoid` (`cursoid`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idasistencia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idestudiante` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idgrado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `idmaestro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`gradoid`) REFERENCES `grado` (`idgrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`cursoid`) REFERENCES `curso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
