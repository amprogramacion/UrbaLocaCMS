-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-08-2015 a las 08:43:35
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `urbaloca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banip`
--

CREATE TABLE IF NOT EXISTS `banip` (
  `id` int(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `tiempo` varchar(255) NOT NULL,
  `motivo` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
  `id` int(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `mueble` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` varchar(50) NOT NULL,
  `miniatura` text NOT NULL,
  `imagen` text NOT NULL,
  `tipo` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id`, `categoria`, `mueble`, `descripcion`, `precio`, `miniatura`, `imagen`, `tipo`) VALUES
(1, '1', 'Cubo', 'Cubo 1 test', '1', '1.png', '1_', 3),
(2, '5', 'Planta', 'Queda muy decorativa.', '3', '2.png', '2_', 2),
(3, '4', 'Nevera', 'Para guardar los refrescos', '2', '3.png', '3_', 2),
(4, '2', 'Mesa de madera', 'Tambien vale de separador.', '2', '4.png', '4_', 2),
(5, '1', 'Trofeo de Oro', 'Para los ganadores.', '10', '5.png', '5_', 2),
(6, '1', 'Trofeo de Plata', 'Para los 2dos ganadores.', '5', '6.png', '6_', 2),
(7, '1', 'Trofeo de Bronce', 'Para los 3ros ganadores.', '3', '7.png', '7_', 2),
(8, '2', 'Separador azul', 'Para tener intimidad.', '2', '8.png', '8_', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_categorias`
--

CREATE TABLE IF NOT EXISTS `catalogo_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_categorias`
--

INSERT INTO `catalogo_categorias` (`id`, `nombre`) VALUES
(1, 'Trofeos'),
(2, 'Estantes'),
(3, 'Sillas'),
(4, 'Exclusivos'),
(5, 'Extras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clima`
--

CREATE TABLE IF NOT EXISTS `clima` (
  `id` int(50) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clima`
--

INSERT INTO `clima` (`id`, `estado`, `desc`) VALUES
(1, 'Soleado', 'Hace un dia tranquilo y agradable en Urbaloca, disfrútalo!'),
(2, 'Nublado', 'Parece ser que las nubes nos visitan, pero no hay previsión de lluvia.'),
(3, 'Lluvioso', 'Están cayendo algunas gotas por Urbaloca, pero que el tiempo no impida la diversión!'),
(4, 'Nevando', 'Vaya vaya! Parece que la nieve aparece en la urbanización, a jugar!'),
(5, 'Tormenta', 'La lluvia ha ido a más y atravesamos una pequeña tormenta, esperemos que pase rápido!'),
(6, 'Viento fuerte', 'El viento, procedente del norte viene con rachas elevadas, id con cuidado!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concursos`
--

CREATE TABLE IF NOT EXISTS `concursos` (
  `id` int(255) NOT NULL,
  `titulo` text NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE IF NOT EXISTS `contador` (
  `id` int(50) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `horau` varchar(255) NOT NULL,
  `diau` varchar(255) NOT NULL,
  `aniou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `ip`, `fecha`, `hora`, `horau`, `diau`, `aniou`) VALUES
(0, '79.109.97.59', '23 del 5 de 2013', '12:20:04', '12', '142', '2013'),
(0, '189.214.112.119', '23 del 5 de 2013', '12:33:02', '12', '142', '2013'),
(0, '92.57.128.177', '23 del 5 de 2013', '12:54:22', '12', '142', '2013'),
(0, '66.249.78.110', '23 del 5 de 2013', '01:01:39', '01', '142', '2013'),
(0, '66.249.76.237', '23 del 5 de 2013', '01:09:40', '01', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '01:09:57', '01', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '02:12:36', '02', '142', '2013'),
(0, '188.92.75.206', '23 del 5 de 2013', '02:33:22', '02', '142', '2013'),
(0, '190.159.31.81', '23 del 5 de 2013', '04:43:43', '04', '142', '2013'),
(0, '201.207.206.82', '23 del 5 de 2013', '06:02:51', '06', '142', '2013'),
(0, '188.92.75.206', '23 del 5 de 2013', '06:45:26', '06', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '09:55:23', '09', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '10:10:59', '10', '142', '2013'),
(0, '189.223.32.239', '23 del 5 de 2013', '10:38:01', '10', '142', '2013'),
(0, '188.92.75.206', '23 del 5 de 2013', '10:51:25', '10', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '11:30:54', '11', '142', '2013'),
(0, '213.143.58.219', '23 del 5 de 2013', '12:51:10', '12', '142', '2013'),
(0, '88.19.47.163', '23 del 5 de 2013', '02:39:33', '02', '142', '2013'),
(0, '188.92.75.206', '23 del 5 de 2013', '03:08:12', '03', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '03:55:16', '03', '142', '2013'),
(0, '95.19.24.186', '23 del 5 de 2013', '03:58:59', '03', '142', '2013'),
(0, '95.19.24.186', '23 del 5 de 2013', '04:00:05', '04', '142', '2013'),
(0, '66.249.76.2', '23 del 5 de 2013', '04:44:09', '04', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '05:07:36', '05', '142', '2013'),
(0, '88.19.47.163', '23 del 5 de 2013', '05:14:25', '05', '142', '2013'),
(0, '66.249.78.110', '23 del 5 de 2013', '05:17:44', '05', '142', '2013'),
(0, '90.170.116.58', '23 del 5 de 2013', '05:35:16', '05', '142', '2013'),
(0, '85.53.130.49', '23 del 5 de 2013', '05:35:24', '05', '142', '2013'),
(0, '189.221.205.231', '23 del 5 de 2013', '05:35:38', '05', '142', '2013'),
(0, '190.207.190.226', '23 del 5 de 2013', '05:36:26', '05', '142', '2013'),
(0, '79.144.71.4', '23 del 5 de 2013', '05:36:35', '05', '142', '2013'),
(0, '186.178.208.175', '23 del 5 de 2013', '05:37:05', '05', '142', '2013'),
(0, '65.49.14.142', '23 del 5 de 2013', '05:39:10', '05', '142', '2013'),
(0, '98.137.207.46', '23 del 5 de 2013', '05:39:12', '05', '142', '2013'),
(0, '201.207.206.82', '23 del 5 de 2013', '05:46:41', '05', '142', '2013'),
(0, '201.255.181.215', '23 del 5 de 2013', '05:48:29', '05', '142', '2013'),
(0, '189.138.194.136', '23 del 5 de 2013', '05:49:06', '05', '142', '2013'),
(0, '190.40.225.20', '23 del 5 de 2013', '05:51:27', '05', '142', '2013'),
(0, '85.59.144.73', '23 del 5 de 2013', '05:51:46', '05', '142', '2013'),
(0, '193.146.150.130', '23 del 5 de 2013', '05:53:03', '05', '142', '2013'),
(0, '108.46.107.117', '23 del 5 de 2013', '05:56:03', '05', '142', '2013'),
(0, '108.46.107.117', '23 del 5 de 2013', '06:05:53', '06', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '06:16:41', '06', '142', '2013'),
(0, '83.45.227.43', '23 del 5 de 2013', '06:27:32', '06', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '07:03:35', '07', '142', '2013'),
(0, '188.92.75.206', '23 del 5 de 2013', '07:48:21', '07', '142', '2013'),
(0, '79.109.97.59', '23 del 5 de 2013', '08:09:02', '08', '142', '2013'),
(0, '91.210.120.123', '23 del 5 de 2013', '08:55:32', '08', '142', '2013'),
(0, '66.249.78.110', '23 del 5 de 2013', '09:17:49', '09', '142', '2013'),
(0, '90.163.236.154', '23 del 5 de 2013', '09:18:27', '09', '142', '2013'),
(0, '188.84.104.139', '23 del 5 de 2013', '10:19:48', '10', '142', '2013'),
(0, '220.181.108.184', '23 del 5 de 2013', '10:42:12', '10', '142', '2013'),
(0, '66.249.76.237', '23 del 5 de 2013', '10:59:39', '10', '142', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '12:37:37', '12', '143', '2013'),
(0, '188.92.75.206', '24 del 5 de 2013', '12:38:54', '12', '143', '2013'),
(0, '85.59.27.61', '24 del 5 de 2013', '12:50:41', '12', '143', '2013'),
(0, '85.59.27.61', '24 del 5 de 2013', '01:05:35', '01', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '01:16:26', '01', '143', '2013'),
(0, '66.249.78.110', '24 del 5 de 2013', '01:19:43', '01', '143', '2013'),
(0, '95.19.24.186', '24 del 5 de 2013', '01:25:20', '01', '143', '2013'),
(0, '201.207.206.82', '24 del 5 de 2013', '01:47:45', '01', '143', '2013'),
(0, '190.96.12.23', '24 del 5 de 2013', '02:25:05', '02', '143', '2013'),
(0, '66.249.78.223', '24 del 5 de 2013', '04:46:55', '04', '143', '2013'),
(0, '190.96.12.23', '24 del 5 de 2013', '05:34:02', '05', '143', '2013'),
(0, '188.92.75.206', '24 del 5 de 2013', '06:00:09', '06', '143', '2013'),
(0, '190.96.12.23', '24 del 5 de 2013', '06:00:21', '06', '143', '2013'),
(0, '75.98.9.254', '24 del 5 de 2013', '06:00:25', '06', '143', '2013'),
(0, '189.223.32.239', '24 del 5 de 2013', '07:19:29', '07', '143', '2013'),
(0, '200.77.125.162', '24 del 5 de 2013', '07:19:31', '07', '143', '2013'),
(0, '66.249.75.237', '24 del 5 de 2013', '09:21:17', '09', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '09:42:12', '09', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '10:00:55', '10', '143', '2013'),
(0, '188.92.75.206', '24 del 5 de 2013', '11:42:40', '11', '143', '2013'),
(0, '213.143.58.87', '24 del 5 de 2013', '12:54:51', '12', '143', '2013'),
(0, '213.143.58.87', '24 del 5 de 2013', '01:02:53', '01', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '02:45:18', '02', '143', '2013'),
(0, '180.153.236.191', '24 del 5 de 2013', '03:41:47', '03', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '04:04:54', '04', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '05:05:47', '05', '143', '2013'),
(0, '65.55.52.89', '24 del 5 de 2013', '05:14:08', '05', '143', '2013'),
(0, '213.143.58.8', '24 del 5 de 2013', '05:36:05', '05', '143', '2013'),
(0, '188.92.75.206', '24 del 5 de 2013', '05:51:19', '05', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '06:39:08', '06', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '07:24:40', '07', '143', '2013'),
(0, '204.12.214.162', '24 del 5 de 2013', '07:41:11', '07', '143', '2013'),
(0, '201.207.206.82', '24 del 5 de 2013', '07:45:30', '07', '143', '2013'),
(0, '79.109.97.59', '24 del 5 de 2013', '08:20:35', '08', '143', '2013'),
(0, '190.96.12.23', '24 del 5 de 2013', '08:27:44', '08', '143', '2013'),
(0, '201.207.206.82', '24 del 5 de 2013', '08:31:36', '08', '143', '2013'),
(0, '180.76.5.55', '24 del 5 de 2013', '08:55:19', '08', '143', '2013'),
(0, '201.160.190.156', '24 del 5 de 2013', '09:03:54', '09', '143', '2013'),
(0, '180.76.5.57', '24 del 5 de 2013', '09:28:39', '09', '143', '2013'),
(0, '85.57.163.84', '24 del 5 de 2013', '10:20:01', '10', '143', '2013'),
(0, '201.160.190.156', '24 del 5 de 2013', '11:43:20', '11', '143', '2013'),
(0, '201.160.190.156', '25 del 5 de 2013', '12:01:02', '12', '144', '2013'),
(0, '88.16.19.4', '25 del 5 de 2013', '12:10:37', '12', '144', '2013'),
(0, '188.84.104.139', '25 del 5 de 2013', '12:22:08', '12', '144', '2013'),
(0, '188.92.75.206', '25 del 5 de 2013', '12:25:43', '12', '144', '2013'),
(0, '186.58.94.200', '25 del 5 de 2013', '12:39:57', '12', '144', '2013'),
(0, '85.57.163.84', '25 del 5 de 2013', '12:42:23', '12', '144', '2013'),
(0, '201.160.190.156', '25 del 5 de 2013', '01:21:21', '01', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '01:44:30', '01', '144', '2013'),
(0, '190.8.66.251', '25 del 5 de 2013', '03:28:56', '03', '144', '2013'),
(0, '190.8.66.251', '25 del 5 de 2013', '04:12:07', '04', '144', '2013'),
(0, '66.249.75.2', '25 del 5 de 2013', '04:51:06', '04', '144', '2013'),
(0, '190.8.66.251', '25 del 5 de 2013', '05:24:57', '05', '144', '2013'),
(0, '118.173.88.173', '25 del 5 de 2013', '06:58:25', '06', '144', '2013'),
(0, '201.207.206.82', '25 del 5 de 2013', '07:06:35', '07', '144', '2013'),
(0, '118.173.88.173', '25 del 5 de 2013', '07:12:58', '07', '144', '2013'),
(0, '188.92.75.206', '25 del 5 de 2013', '07:27:18', '07', '144', '2013'),
(0, '66.249.78.223', '25 del 5 de 2013', '07:54:28', '07', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '09:18:46', '09', '144', '2013'),
(0, '189.214.112.119', '25 del 5 de 2013', '09:50:07', '09', '144', '2013'),
(0, '66.249.78.223', '25 del 5 de 2013', '09:57:32', '09', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '10:32:59', '10', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '11:23:28', '11', '144', '2013'),
(0, '188.84.104.139', '25 del 5 de 2013', '01:27:46', '01', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '02:08:14', '02', '144', '2013'),
(0, '66.249.78.223', '25 del 5 de 2013', '02:14:23', '02', '144', '2013'),
(0, '188.92.75.206', '25 del 5 de 2013', '02:55:51', '02', '144', '2013'),
(0, '5.248.251.76', '25 del 5 de 2013', '02:56:45', '02', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '03:29:47', '03', '144', '2013'),
(0, '84.76.43.50', '25 del 5 de 2013', '03:51:39', '03', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '04:16:24', '04', '144', '2013'),
(0, '77.229.61.250', '25 del 5 de 2013', '04:26:33', '04', '144', '2013'),
(0, '66.249.78.110', '25 del 5 de 2013', '04:53:45', '04', '144', '2013'),
(0, '84.76.43.50', '25 del 5 de 2013', '04:54:07', '04', '144', '2013'),
(0, '90.224.199.189', '25 del 5 de 2013', '05:02:07', '05', '144', '2013'),
(0, '180.76.5.93', '25 del 5 de 2013', '05:43:29', '05', '144', '2013'),
(0, '201.244.174.122', '25 del 5 de 2013', '05:47:10', '05', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '06:06:11', '06', '144', '2013'),
(0, '90.224.199.189', '25 del 5 de 2013', '06:21:51', '06', '144', '2013'),
(0, '201.160.190.156', '25 del 5 de 2013', '06:38:34', '06', '144', '2013'),
(0, '201.207.206.82', '25 del 5 de 2013', '06:51:28', '06', '144', '2013'),
(0, '79.109.97.59', '25 del 5 de 2013', '07:31:42', '07', '144', '2013'),
(0, '201.160.190.156', '25 del 5 de 2013', '08:15:00', '08', '144', '2013'),
(0, '46.118.113.231', '25 del 5 de 2013', '09:08:18', '09', '144', '2013'),
(0, '188.84.104.139', '25 del 5 de 2013', '09:34:03', '09', '144', '2013');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `id` int(50) NOT NULL,
  `estado_web` varchar(250) NOT NULL DEFAULT '1',
  `estado_cliente` varchar(250) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `estado_web`, `estado_cliente`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(255) NOT NULL,
  `titulo` text NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `fecha`, `descripcion`, `texto`) VALUES
(1, 'Bienvenido a Urbaloca', '16/05/2013', '<p>&iexcl;Hey Loko,&nbsp;<strong>bienvenido a Urbaloca</strong>!&nbsp;Como habr&aacute;s podido observar, hemos reabierto UrbaLoca con un nuevo dise&ntilde;o, un s<strong>ervidor 24 horas</strong>, un juego&nbsp;<strong>propio</strong>,&nbsp;<strong>muebles</strong>,&nbsp;<strong>salas</strong>.... estamos<strong>&nbsp;trabajando dia a dia</strong>&nbsp;para actualizar UL para que disfrutes al maximo de todos nuestros servicios...</p>', '<p>&iexcl;Hey Loko, <strong>bienvenido a Urbaloca</strong>!</p>\r\n<p>Como habr&aacute;s podido observar, hemos reabierto UrbaLoca con un nuevo dise&ntilde;o, un s<strong>ervidor 24 horas</strong>, un juego <strong>propio</strong>, <strong>muebles</strong>, <strong>salas</strong>.... estamos<strong> trabajando dia a dia</strong> para actualizar UL para que disfrutes al maximo de todos nuestros servicios.</p>\r\n<p>Ya puedes comprar <strong>muebles</strong>, hacerte socio del <strong>club vip</strong> o, simplemente, <strong>hacer amigos</strong> dentro de la Urba.&nbsp;</p>\r\n<p><em>&iexcl;Un saludo loko!</em></p>'),
(2, 'Ya puedes pintar tu sala en Urbaloca', '18/05/2013', '<p>Hola loko! Ya puedes pintar tu sala en UrbaLoca y personalizarla al m&aacute;ximo!</p>', '<p>&iexcl;Hola Loko!</p>\r\n<p>Ya puedes <strong>pintar tu sala</strong> en <strong>UrbaLoca</strong> y personalizarla al m&aacute;ximo! Para ello,<strong> ve al cat&aacute;logo</strong> y haz click <strong>aqu&iacute;</strong>:</p>\r\n<p><img src="img/pintarsala2.png" alt="" width="350" /></p>\r\n<p>Selecciona tus colores favoritos, <strong>son gratis</strong>! Disfruta de estas actualizaciones, y a pintar!</p>'),
(3, 'Nuevos cambios en UrbaLoca', '20/05/2013', '<p>&iexcl;Hola loko!&nbsp;Hemos visto que a<strong>lgunos usuarios han reportado recientes bugs</strong>&nbsp;en&nbsp;<strong>UrbaLoca</strong>; esto se debe a que&nbsp;<strong>hemos programado un nuevo sistema de Log-in</strong>&nbsp;para entrar a la urbanizaci&oacute;n, ahora no deber&aacute;s tener ning&uacute;n problema con los accesos...</p>', '<p>&iexcl;Hola loko!</p>\r\n<p>Hemos visto que a<strong>lgunos usuarios han reportado recientes bugs</strong> en <strong>UrbaLoca</strong>; esto se debe a que <strong>hemos programado un nuevo sistema de Log-in</strong> para entrar a la urbanizaci&oacute;n, ahora no deber&aacute;s tener ning&uacute;n problema con los accesos.</p>\r\n<p><strong>&iexcl;Recuerda iniciar sesi&oacute;n en la Web para entrar!</strong></p>\r\n<p>Tambien hemos implementado las <strong>nuevas ropas</strong> en UL, ahora tu loko ya no ir&aacute; desnudo.</p>\r\n<p>Aprobecho tambien para dar las felicitaciones a <strong>Antonio285</strong>, el nuevo <strong>Gu&iacute;a de la urbanizaci&oacute;n</strong>.</p>'),
(4, 'Se han reiniciado las fichas', '21/05/2013', '<p>Hola a todos, en estos momentos estamos arreglando algunos bugs en UrbaLoca...</p>', '<p>Hola a todos,</p>\r\n<p>En estos momentos, estamos arreglando algunos bugs en el navegador. Un ejemplo de &eacute;stas actualizaciones ser&aacute;:</p>\r\n<ul>\r\n<li>La posibilidad de establecer <strong>contrase&ntilde;a</strong> a tus salas</li>\r\n<li>No podr&aacute;s crear salas <strong>sin nombre</strong></li>\r\n<li>Activacion de los<strong> usuarios en sala </strong><em>(0/25)</em></li>\r\n<li>Arreglos en el <strong>navegador</strong><em> (se duplica)</em></li>\r\n</ul>\r\n<p><em>Te recordamos que estos cambios van a ser introducidos de forma paulatina, no te asustes si en las pr&oacute;ximas horas est&aacute; el servidor cerrado, pues nuestro equipo est&aacute; trabajando en la mejora de la urbanizaci&oacute;n.</em></p>'),
(5, 'La versión 1 cada vez más cerca', '23/05/2013', '<p>Hola loko!&nbsp;Cada vez est&aacute; m&aacute;s cerca la versi&oacute;n&nbsp;<strong>Estable</strong>&nbsp;de UrbaLoca. Desde que ha salido la beta, muchos de vosotros habeis&nbsp;<strong>colaborado reportando bugs y errores</strong>&nbsp;encontrados. Como habr&eacute;is podido observar, el dise&ntilde;o se encuentra en fase Beta...</p>', '<p>Hola loko!</p>\r\n<p>Cada vez est&aacute; m&aacute;s cerca la versi&oacute;n <strong>Estable</strong> de UrbaLoca. Desde que ha salido la beta, muchos de vosotros habeis <strong>colaborado reportando bugs y errores</strong> encontrados. Como habr&eacute;is podido observar, el dise&ntilde;o se encuentra en fase Beta.</p>\r\n<p>Desde UrbaLoca estamos <strong>preparando la nueva versi&oacute;n Estable</strong>, que incluir&aacute; las siguientes<strong> funciones</strong> nuevas:</p>\r\n<p>Dentro de la<strong> Web</strong>:</p>\r\n<ul>\r\n<li>Un nuevo<strong> dise&ntilde;o Web</strong>, con nuevas funciones</li>\r\n<li>Posibilidad de<strong> elegir ropa</strong> en el <strong>registro</strong> de usuarios</li>\r\n<li>Panel de Mi cuenta mejorado, posibilidad de <strong>cambiar la placa a traves de la web</strong>.</li>\r\n<li>Cambio de<strong> datos personales</strong> (contrase&ntilde;a, email, fecha de nacimiento...)</li>\r\n<li><strong>Cat&aacute;logo Web</strong> mejorado</li>\r\n<li>Sistema de <strong>denuncias/ayuda</strong> propio y mejorado</li>\r\n<li>Se abrir&aacute;n las <strong>solicitudes de Gu&iacute;a</strong></li>\r\n<li>Sistema de<strong> referidos</strong>, con el que podr&aacute;s <strong>ganar loks por conseguir registrados</strong></li>\r\n<li>Y m&aacute;s sorpresas :)</li>\r\n</ul>\r\n<p>Dentro de la <strong>Urbanizaci&oacute;n</strong>:</p>\r\n<ul>\r\n<li>Nueva<strong> interfaz gr&aacute;fica</strong></li>\r\n<li>Posibilidad de<strong> poner contrase&ntilde;a a tus salas</strong></li>\r\n<li>Se activar&aacute; el<strong> contador de usuarios en sala</strong> (0/25)</li>\r\n<li>Una <strong>zona p&uacute;blica</strong> para uso y disfrute de todos</li>\r\n<li>M&aacute;s<strong> muebles y placas</strong></li>\r\n<li>Regalos por ser<strong> miembro del club Vip</strong></li>\r\n<li>Nuevo sistema de<strong> ayuda</strong> dentro del juego</li>\r\n<li>Ayuda para llamar a un Gu&iacute;a</li>\r\n<li>Ropas de<strong> chica</strong></li>\r\n<li>Y lo dem&aacute;s, es un secreto :)</li>\r\n</ul>\r\n<p>Espero que estas noticias os vayan abriendo el apetito...<strong> &iexcl;y estad atentos de la web!</strong></p>'),
(6, 'Ya falta menos para el gran estreno', '25/05/2013', '<p>Ya falta cada vez menos para el estreno de la nueva web, junto con todas las funciones que ello conlleva. Estamos trabajando duro para...</p>', '<p>Ya falta cada vez menos para el estreno de la nueva web, junto con todas las funciones que ello conlleva. Estamos trabajando duro para que puedas disfrutar de la version Stable lo antes posible.</p>\r\n<p>&iexcl;&iexcl;Nos vemos en la urba!!</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicas`
--

CREATE TABLE IF NOT EXISTS `publicas` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `max` varchar(50) NOT NULL DEFAULT '50',
  `cerrada` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(17) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `maxu` varchar(255) NOT NULL,
  `muebles` text NOT NULL,
  `color` varchar(50) NOT NULL DEFAULT '1',
  `suelo` int(50) NOT NULL DEFAULT '1',
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `owner`, `maxu`, `muebles`, `color`, `suelo`, `pass`) VALUES
(1, 'Casa de Escavo', 'escavo', '25', '2;1;0;2::2;1;8;3', '3', 3, ''),
(3, 'Casa de Rafa', 'rafa', '25', '', '1', 1, ''),
(14, 'hola', 'escavo', '25', '', '1', 1, '123'),
(15, 'asdasasd', 'escavo', '25', '', '1', 1, ''),
(16, 'basi', 'escavo', '25', '', '1', 1, '123'),
(17, 'Sala de Test', 'test', '25', '1;1;1;1::1;1;3;1', '1', 1, ''),
(18, 'Test 2', 'test', '25', '', '1', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useronline`
--

CREATE TABLE IF NOT EXISTS `useronline` (
  `timestamp` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `useronline`
--

INSERT INTO `useronline` (`timestamp`, `ip`) VALUES
('1369510357', '79.109.97.59'),
('1369510443', '188.84.104.139');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(17) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fnac` varchar(255) NOT NULL,
  `baneado` int(2) NOT NULL DEFAULT '0',
  `fechaban` varchar(255) NOT NULL,
  `motivo` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `rango` varchar(100) NOT NULL DEFAULT 'USR',
  `fichas` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `activado` varchar(50) NOT NULL DEFAULT '0',
  `codeact` varchar(255) NOT NULL,
  `placas` text NOT NULL,
  `puesta` varchar(255) NOT NULL,
  `visible` varchar(5) NOT NULL DEFAULT '1',
  `nuevo` varchar(25) NOT NULL DEFAULT '1',
  `vip` varchar(50) NOT NULL,
  `muebles` text NOT NULL,
  `pelo` varchar(200) NOT NULL DEFAULT '1',
  `camisa` varchar(200) NOT NULL DEFAULT '1',
  `pants` varchar(200) NOT NULL DEFAULT '1',
  `zapatos` varchar(200) NOT NULL DEFAULT '1',
  `logueado` int(50) NOT NULL DEFAULT '0',
  `idserver` varchar(255) NOT NULL DEFAULT '0',
  `mision` varchar(255) NOT NULL DEFAULT 'No tengo mision',
  `estoyen` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `pass`, `fnac`, `baneado`, `fechaban`, `motivo`, `ip`, `rango`, `fichas`, `email`, `activado`, `codeact`, `placas`, `puesta`, `visible`, `nuevo`, `vip`, `muebles`, `pelo`, `camisa`, `pants`, `zapatos`, `logueado`, `idserver`, `mision`, `estoyen`) VALUES
(1, 'rafa', '5ef48ef29d73004f7334823da49a7350', '', 0, '', '', '', 'ADM', '649', 'rafabcn1991@gmail.com', '1', '', 'ADM;MOD;VIP;GUI', 'ADM', '1', '1', '1371832016', '15;1::7;1::8;3', '10', '8', '3', '2', 0, '', 'No tengo mision', ''),
(3, 'test', 'fb469d7ef430b0baf0cab6c436e70375', '', 0, '', '', '/127.0.0.1', 'GUI', '809', 'angelmp2@hotmail.es', '1', '', 'ADM;GUI', 'ADM', '1', '1', '', '1;5::2;2::3;1', '1', '6', '2', '1', 0, '', 'No tengo mision', ''),
(4, 'test1', '418d89a45edadb8ce4da17e07f72536c', '', 0, '', '', '79.109.97.59', 'USR', '0', 'test1@hotmail.es', '1', '', '', '', '1', '1', '', '', '1', '1', '1', '1', 0, '', 'No tengo mision', ''),
(5, 'escavo', 'fb469d7ef430b0baf0cab6c436e70375', '27/5/1991', 0, '', '', '/127.0.0.1', 'ADM', '31', 'amansoperez@gmail.com', '1', 'e15143f3c5aa10a4d648a04911a15cff', 'ADM;MOD;VIP;GUI', 'VIP', '1', '1', '1372096052', '2;30::1;40', '10', '4', '6', '2', 0, '', 'Ayudandote en UrbaLoca ;)', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banip`
--
ALTER TABLE `banip`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo_categorias`
--
ALTER TABLE `catalogo_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clima`
--
ALTER TABLE `clima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concursos`
--
ALTER TABLE `concursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicas`
--
ALTER TABLE `publicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banip`
--
ALTER TABLE `banip`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `catalogo_categorias`
--
ALTER TABLE `catalogo_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `clima`
--
ALTER TABLE `clima`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `concursos`
--
ALTER TABLE `concursos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `publicas`
--
ALTER TABLE `publicas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(17) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(17) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
