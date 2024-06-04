-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-06-2024 a las 03:29:19
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
-- Base de datos: `db_01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `mensaje` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `telefono`, `mensaje`) VALUES
(1, 'Brenda', 'breivoser@gmail.com', '666666', 'Hola es una prueba.'),
(2, 'Brenda', 'breivoser@gmail.com', '666666', 'Hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_form`
--

DROP TABLE IF EXISTS `reserva_form`;
CREATE TABLE IF NOT EXISTS `reserva_form` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `ubicacion` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `invitados` int(50) NOT NULL,
  `llegada` date NOT NULL,
  `salida` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Volcado de datos para la tabla `reserva_form`
--

INSERT INTO `reserva_form` (`id`, `nombre`, `correo`, `telefono`, `direccion`, `ubicacion`, `invitados`, `llegada`, `salida`) VALUES
(1, 'Brenda', 'breivoser@gmail.com', '555555', 'Av. Aticlan', 'Mexico', 2, '2024-05-15', '2024-05-16'),
(2, 'ana', 'breivoser@gmail.com', '3', 'Av. Aticlan', 'Mexico', 3, '2024-05-21', '2024-05-23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
