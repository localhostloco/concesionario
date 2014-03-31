-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2014 a las 15:41:46
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `concesionariophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE IF NOT EXISTS `accesorios` (
  `idAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`idAccesorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`idAccesorio`, `nombre`, `precio`) VALUES
(0, 'Asiento calefactable', 350),
(1, 'Luz Xenon', 100),
(2, 'Volante de cuero', 110),
(3, 'Llantas 17p', 850),
(4, 'Bluetooth', 85),
(5, 'Kit deportivo', 385),
(6, 'Baca', 55),
(7, 'Malla de transporte', 20),
(8, 'Reproductor de DVD', 295);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocheaccesorio`
--

CREATE TABLE IF NOT EXISTS `cocheaccesorio` (
  `idCoche` int(11) NOT NULL,
  `idAccesorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `cocheaccesorio`
--

INSERT INTO `cocheaccesorio` (`idCoche`, `idAccesorio`) VALUES
(1, 0),
(1, 2),
(1, 3),
(1, 1),
(2, 1),
(3, 1),
(6, 3),
(4, 2),
(6, 6),
(2, 3),
(4, 4),
(4, 5),
(3, 3),
(3, 1),
(9, 3),
(7, 5),
(0, 8),
(1, 8),
(2, 8),
(4, 8),
(6, 8),
(7, 8),
(8, 8),
(1, 7),
(2, 7),
(3, 7),
(6, 7),
(9, 7),
(6, 6),
(0, 6),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(7, 6),
(8, 6),
(9, 6),
(4, 5),
(7, 5),
(3, 5),
(6, 5),
(8, 5),
(4, 4),
(0, 4),
(1, 4),
(2, 4),
(3, 4),
(9, 4),
(1, 2),
(4, 2),
(0, 2),
(2, 2),
(3, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(1, 3),
(6, 3),
(2, 3),
(3, 3),
(9, 3),
(0, 3),
(0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE IF NOT EXISTS `coches` (
  `idCoche` int(11) NOT NULL,
  `modelo` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `cantidad` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `color` enum('Verde','Gris','Azul','Rojo','Blanco','Granate','Amarillo') COLLATE ucs2_spanish2_ci NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `marca` enum('Fiat','Hyundai','Opel','Audi','Renault') COLLATE ucs2_spanish2_ci NOT NULL,
  `foto` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  PRIMARY KEY (`idCoche`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`idCoche`, `modelo`, `cantidad`, `color`, `precio`, `marca`, `foto`) VALUES
(0, 'Punto', '19', 'Azul', 13700, 'Fiat', 'punto.png'),
(1, 'i30', '1', 'Rojo', 11700, 'Hyundai', 'i30.png'),
(2, 'R8', '2', 'Verde', 80000, 'Audi', 'r8.png'),
(3, 'Megane', '4', 'Amarillo', 15000, 'Renault', 'megane.png'),
(4, 'Ampera', '5', 'Blanco', 20000, 'Opel', 'ampera.png'),
(5, 'ix35', '15', 'Azul', 20000, 'Hyundai', 'ix35.png'),
(6, 'Captur', '54', 'Blanco', 15000, 'Renault', 'captur.png'),
(7, 'A3', '6', 'Gris', 35000, 'Audi', 'a3.png'),
(8, 'Freemont', '13', 'Verde', 47500, 'Fiat', 'freemont.png'),
(9, 'Astra', '3', 'Granate', 15700, 'Opel', 'astra.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confcoche`
--

CREATE TABLE IF NOT EXISTS `confcoche` (
  `idConfCoche` int(11) NOT NULL,
  `idCoche` int(11) NOT NULL,
  `idConf` int(11) NOT NULL,
  PRIMARY KEY (`idConfCoche`),
  KEY `idCoche` (`idCoche`,`idConf`),
  KEY `idconf` (`idConf`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `confcoche`
--

INSERT INTO `confcoche` (`idConfCoche`, `idCoche`, `idConf`) VALUES
(18, 0, 10),
(19, 0, 11),
(20, 0, 12),
(0, 1, 1),
(1, 1, 2),
(2, 1, 3),
(24, 2, 13),
(25, 2, 14),
(26, 2, 15),
(9, 3, 7),
(10, 3, 8),
(11, 3, 9),
(3, 4, 4),
(4, 4, 5),
(5, 4, 6),
(15, 5, 1),
(16, 5, 2),
(17, 5, 3),
(27, 5, 13),
(28, 5, 14),
(29, 5, 15),
(12, 6, 7),
(13, 6, 8),
(14, 6, 9),
(21, 8, 10),
(22, 8, 11),
(23, 8, 12),
(6, 9, 4),
(7, 9, 5),
(8, 9, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE IF NOT EXISTS `configuraciones` (
  `idConfiguracion` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `motor` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `navegador` varchar(3) COLLATE ucs2_spanish2_ci NOT NULL,
  `AC` varchar(3) COLLATE ucs2_spanish2_ci NOT NULL,
  `techoSolar` varchar(3) COLLATE ucs2_spanish2_ci NOT NULL,
  `transmision` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`idConfiguracion`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`idConfiguracion`, `nombre`, `motor`, `navegador`, `AC`, `techoSolar`, `transmision`, `precio`) VALUES
(1, 'City S', '1.4', 'No', 'Sí', 'No', 'Manual', 1500),
(2, 'Tecno S', '1.6', 'Sí', 'Sí', 'No', 'Manual', 2500),
(3, 'Blue Drive', '2.0', 'Sí', 'Sí', 'Sí', 'Automática/Manual', 4000),
(4, 'Expression', '1.4 EPi', 'No', 'Sí', 'No', 'Automática/Manual', 3750),
(5, 'Selective', '1.8 EPi', 'Sí', 'Sí', 'No', 'Automática', 4500),
(6, 'Sportive', '2.0 EPi', 'Sí', 'Sí', 'Sí', 'Automática/Manual', 5300),
(7, 'Life', '1.0 EPi', 'No', 'No', 'No', 'Manual', 1500),
(8, 'Intense', '1.2 EPi', 'No', 'Sí', 'No', 'Manual', 2750),
(9, 'Zen', '2.2 EPi', 'Sí', 'Sí', 'No', 'Automática', 3200),
(10, 'Pop', '1.0 EPi', 'No', 'No', 'No', 'Manual', 750),
(11, 'Easy', '1.1 EPi', 'No', 'Sí', 'No', 'Automática/Manual', 1350),
(12, '20 Aniversario', '1.8 EPi', 'Sí', 'Sí', 'No', 'Automática', 2500),
(13, 'Essence', '2.0 EPi', 'Sí', 'Sí', 'No', 'Manual', 3550),
(14, 'Vision', '2.4 EPi', 'Sí', 'No', 'Sí', 'Manual', 4550),
(15, 'Exterior S Line', '2.8 EPi', 'Sí', 'Sí', 'Sí', 'Automática/Manual', 6750);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoaccesorio`
--

CREATE TABLE IF NOT EXISTS `pedidoaccesorio` (
  `idPedido` int(11) NOT NULL,
  `idAccesorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidoaccesorio`
--

INSERT INTO `pedidoaccesorio` (`idPedido`, `idAccesorio`) VALUES
(10, 0),
(10, 1),
(10, 3),
(11, 0),
(11, 1),
(11, 3),
(16, 0),
(16, 1),
(16, 2),
(20, 3),
(21, 6),
(22, 1),
(22, 7),
(22, 6),
(22, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idUsr` int(11) NOT NULL,
  `idConfCoche` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPedido`),
  KEY `idConfCoche` (`idConfCoche`),
  KEY `a` (`idUsr`,`idConfCoche`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsr`, `idConfCoche`, `fecha`, `confirmado`) VALUES
(4, 1, 0, '2014-03-19 17:05:12', 1),
(5, 1, 1, '2014-03-19 17:05:19', 1),
(6, 1, 2, '2014-03-19 17:05:25', 1),
(7, 0, 0, '2014-03-19 17:13:20', 0),
(9, 1, 0, '2014-03-21 14:59:24', 0),
(10, 1, 0, '2014-03-21 15:02:56', 1),
(11, 1, 1, '2014-03-21 15:35:45', 1),
(12, 1, 0, '2014-03-21 15:58:29', 0),
(13, 1, 1, '2014-03-21 15:59:44', 1),
(14, 1, 2, '2014-03-21 16:05:31', 0),
(15, 1, 1, '2014-03-21 16:05:59', 1),
(16, 1, 1, '2014-03-22 02:04:23', 0),
(17, 0, 5, '2014-03-22 02:51:09', 0),
(18, 0, 7, '2014-03-22 03:39:46', 0),
(19, 0, 3, '2014-03-22 03:40:02', 1),
(20, 0, 7, '2014-03-22 05:10:55', 1),
(21, 0, 12, '2014-03-22 05:11:54', 0),
(22, 1, 25, '2014-03-24 19:33:37', 0),
(23, 1, 10, '2014-03-24 21:55:40', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `password` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `tipo`, `nombre`, `password`) VALUES
(0, 'Vendedor', 'pruebaVendedor', 'pruebaVendedor'),
(1, 'Vendedor', 'admin', 'admin'),
(2, 'Fabricante', 'fab', 'fab');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idConfCoche`) REFERENCES `confcoche` (`idConfCoche`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
