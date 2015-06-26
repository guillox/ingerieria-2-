-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-06-2015 a las 16:05:21
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Bestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `categoriaID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`categoriaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoriaID`, `Nombre`, `Descripcion`) VALUES
(1, 'Televisor', NULL),
(2, 'Informatica', NULL),
(3, 'Deportivo', NULL),
(4, 'Rodados', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `clientesID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `nro_tarjeta` int(11) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `pasw` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`clientesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clientesID`, `nombre`, `apellido`, `email`, `fecha_nac`, `fecha_registro`, `nro_tarjeta`, `usuario`, `pasw`) VALUES
(1, 'Ale', 'valdez', '', '0000-00-00', '0000-00-00', 111, 'avico', 'hola'),
(2, 'Lionel', 'Messi', 'lio@barsa.com', '2015-05-23', '2015-06-03', 1243, 'lio10messi', 'goles'),
(3, 'pepe', 'argento', 'argento@telefe.com', '1978-05-16', '2015-06-06', 1234, 'pepe', 'hola'),
(4, 'juan', 'jose', 'jose@perez.com', '1987-07-19', '2015-06-06', 1342, 'josep', 'josep'),
(5, 'asds1', 'aasdasd', 'ale.v_1988@hotmail.com', '1988-03-19', '2015-06-06', 1243, 'asdasd', 'asdasd'),
(6, 'alejandro', 'valdez', 'ale.v_1988@hotmail.com', '1988-03-19', '2015-06-06', 1234, 'ale88', 'ale88');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `comentariosID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `subastaID` int(11) DEFAULT NULL,
  `fechaPregunta` datetime DEFAULT NULL,
  `pregunta` text,
  `fechaRespuesta` datetime DEFAULT NULL,
  `respuesta` text,
  PRIMARY KEY (`comentariosID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ventas`
--

CREATE TABLE IF NOT EXISTS `historial_ventas` (
  `historial_ventasID` int(11) NOT NULL AUTO_INCREMENT,
  `subastaID` int(11) DEFAULT NULL,
  `ofertaID` int(11) DEFAULT NULL,
  `comision` int(11) DEFAULT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`historial_ventasID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE IF NOT EXISTS `ofertas` (
  `ofertaID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `subastaID` int(11) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `necesidad` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`ofertaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
  `subastaID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `categoriaID` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `imagen` text,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`subastaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`subastaID`, `usuarioID`, `categoriaID`, `nombre`, `descripcion`, `imagen`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, NULL, 'Televisor Max', 'Un gran televisor', 'view/img/imgProducto/televisormax.jpg', '2015-06-01', '2015-06-26'),
(2, 1, 2, 'Notebook Sony', 'Computadora linda\r\nPantalla Tactil', 'view/img/imgProducto/sony_notebook.jpg', '2015-06-26', '2015-07-26'),
(3, 3, NULL, 'notebook mac', 'es la que hiso steve jobs', 'view/img/imgProducto/notebookmac.jpg', '2015-06-15', '2015-06-30'),
(4, 1, 2, 'Notebook Samsung', ' Linda computadora con varias funcionalidades', 'view/img/imgProducto/note_samsung.jpg', '2015-06-26', '2015-07-26'),
(5, 2, NULL, 'Samsung Galaxy ', 'Tiene variedad de funcionalidades', 'view/img/imgProducto/celSamsung.jpg', '2015-06-17', '2015-06-30'),
(9, 1, 2, 'Cronometro ULTRA', '*100 laps!!\r\n*3 botones para simplificarte todo - Start/Stop - Laps - Recall - \r\n*3 lineas de digitos\r\n*minutos, segundos y centesimos.\r\n*excelento posicion para tu mano\r\n', 'view/img/imgProducto/default-error', '2015-06-24', '2015-07-24'),
(21, 3, 2, 'Cronometro ULTRA', 'Cronometro con varias funcionalidades', 'view/img/imgProducto/reloj.jpg', '2015-06-24', '2015-07-09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
