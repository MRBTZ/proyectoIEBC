-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-10-2021 a las 23:01:18
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_iebc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `idasistencia` bigint(20) NOT NULL AUTO_INCREMENT,
  `ingreso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salida` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idasistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idcursos` bigint(20) NOT NULL AUTO_INCREMENT,
  `cursos` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idcursos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `idestudiante` bigint(20) NOT NULL AUTO_INCREMENT,
  `personaid` bigint(20) NOT NULL,
  `gradoid` bigint(20) NOT NULL,
  `seccionid` bigint(20) NOT NULL,
  `ciclo` varchar(4) COLLATE utf8mb4_swedish_ci NOT NULL,
  `encargado` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `detalle` text COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idestudiante`),
  KEY `personaid` (`personaid`),
  KEY `seccionid` (`seccionid`),
  KEY `gradoid` (`gradoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `idgrado` bigint(20) NOT NULL AUTO_INCREMENT,
  `grado` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idgrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `idmaestros` bigint(20) NOT NULL AUTO_INCREMENT,
  `personaid` bigint(20) NOT NULL,
  `asistenciaid` bigint(20) NOT NULL,
  `cursosid` bigint(20) NOT NULL,
  `codigoQR` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idmaestros`),
  KEY `cursosid` (`cursosid`),
  KEY `asistenciaid` (`asistenciaid`),
  KEY `personaid` (`personaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard ', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistemas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `idpermisos` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0',
  `u` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpermisos`),
  KEY `rolid` (`rolid`),
  KEY `moduloid` (`moduloid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermisos`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(3, 2, 1, 1, 0, 0, 0),
(4, 2, 2, 1, 1, 1, 1),
(7, 17, 1, 1, 1, 1, 1),
(8, 17, 2, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `idpersona` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolid` bigint(20) NOT NULL,
  `dpi` int(13) NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fecha de nacimiento` datetime NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(8) NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `datacreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpersona`),
  KEY `rolid` (`rolid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`, `descripcion`, `status`) VALUES
(1, 'Encargados', 'Encargados ', 1),
(2, 'Administrador', 'Administrador', 1),
(3, 'hfdhfdg', 'hdfhgdfhfdh', 0),
(4, '', '', 0),
(5, 'ncvnc', 'vbncvncn', 0),
(6, 'visitante', 'visitante s', 0),
(7, 'nuevo', 'sdfasdf', 0),
(8, 'ING', 'solo sabes chingar', 0),
(9, 'profesores', 'solo puden agreagar estudiantes y pueden chingar en mi sistema jajajaajja', 0),
(10, 'rol del coca', 'Este rol es del coca', 0),
(11, 'Roles akjskdjf', 'dfg', 0),
(12, 'el coca es un gey', 'Porque se pone de a 4 jajajajajaj', 0),
(13, 'jijiji', 'gsdgsfdg', 0),
(14, 'hfghfgjhj', 'fgjfh', 0),
(15, 'tavo', 'ksjdkgvfds', 0),
(16, 'roles', 'jajajaja', 0),
(17, 'nuevo rol', 'saber que hace pero algo', 1),
(18, 'sfgbsdfg', 'sdfgsdfg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

DROP TABLE IF EXISTS `seccion`;
CREATE TABLE IF NOT EXISTS `seccion` (
  `idseccion` bigint(20) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(1) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idseccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`gradoid`) REFERENCES `grado` (`idgrado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`seccionid`) REFERENCES `seccion` (`idseccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`asistenciaid`) REFERENCES `asistencia` (`idasistencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maestros_ibfk_2` FOREIGN KEY (`cursosid`) REFERENCES `cursos` (`idcursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maestros_ibfk_3` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

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
