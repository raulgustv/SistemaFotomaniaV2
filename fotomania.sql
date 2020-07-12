-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2020 a las 01:17:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fotomaniacr`
--
CREATE DATABASE IF NOT EXISTS `fotomaniacr` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `fotomaniacr`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoUsuario` enum('Admin','Servicio') COLLATE utf8_spanish2_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaLogin` datetime NOT NULL,
  `notas` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `user`, `email`, `pass`, `tipoUsuario`, `fechaRegistro`, `fechaLogin`, `notas`, `status`) VALUES
(1, 'admin', 'admin@admin.com', '1234', 'Servicio', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1),
(20, 'Erick Torres', 'erick@gmail.com', '$2y$08$prx6hA2Bg5EX.mzeHqKxYeXO9cIGQvbVo5abkONdprVv1UK0HJnwu', 'Admin', '2020-05-20 08:52:57', '2020-05-20 08:52:57', '', 1),
(21, 'rmmirand', 'rmmirand@amazon.com', '$2y$08$pADaL82JgQaOUEtxsWBNqOQS1H8GSqPWIIw3mp7w1hYA8o7DBA8LS', 'Admin', '2020-05-20 11:58:55', '2020-07-08 03:50:12', '', 1),
(22, 'Carlos', 'carlos@gmail.com', '$2y$08$Q5ugfLr/jOpHl4mx4cEX1u6odRgaIopD.ag88GXiYI.dIOLXsTLoy', 'Servicio', '2020-07-06 01:50:40', '2020-07-09 11:00:33', '', 1),
(23, 'Raul Rodriguez', 'raulgus@hotmail.com', '$2y$08$dZEOB3KUDOlA.kRJ1PKfY.I6xZmw/m3Dia0ngCA6MNsh/GkGOSZtS', 'Admin', '2020-07-08 03:50:31', '2020-07-12 01:57:59', '', 1),
(25, 'test', 'test@gmail.com', '$2y$08$O5rKOvG3zUi6tR9UTU7WieU0njDbpaZDSNUgcan7JM7g2QN7ugRLe', 'Servicio', '2020-07-09 10:39:43', '2020-07-11 08:48:19', 'Prueba', 1),
(26, 'Pedro', 'pedroram@gmail.com', '$2y$08$kjhdmcoc0cpbO6SkueN2d.JP.DLkrXpwu6J1DnsdRvxo.GtIdQqze', 'Admin', '2020-07-09 02:13:25', '2020-07-09 02:13:25', '', 1),
(27, 'Andres', 'andres@gmail.com', '$2y$08$1TL4umF7oTTGjL5vaTNgludLHreSvufBYuvAw1uYooFMdaGpMZhZ.', 'Servicio', '2020-07-12 12:06:04', '2020-07-12 01:47:52', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton`
--

DROP TABLE IF EXISTS `canton`;
CREATE TABLE `canton` (
  `idCanton` int(11) NOT NULL,
  `canton` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idProv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `canton`
--

INSERT INTO `canton` (`idCanton`, `canton`, `idProv`) VALUES
(1, 'San José', 1),
(2, 'Escazú', 1),
(3, 'Desamparados', 1),
(4, 'Puriscal', 1),
(5, 'Tarrazú', 1),
(6, 'Aserrí', 1),
(7, 'Mora', 1),
(8, 'Goicoechea', 1),
(9, 'Santa Ana', 1),
(10, 'Alajuelita', 1),
(11, 'Vásquez de Coronado', 1),
(12, 'Acosta', 1),
(13, 'Tibás', 1),
(14, 'Moravia', 1),
(15, 'Montes de Oca', 1),
(16, 'Turrubares', 1),
(17, 'Dota', 1),
(18, 'Currridabat', 1),
(19, 'Perez Zeledón', 1),
(20, 'Leon Cortés', 1),
(21, 'Alajuela', 2),
(22, 'San Ramón', 2),
(23, 'Grecia', 2),
(24, 'San Mateo', 2),
(25, 'Atenas', 2),
(26, 'Naranjo', 2),
(27, 'Palmares', 2),
(28, 'Poás', 2),
(29, 'Orotina', 2),
(30, 'San Carlos', 2),
(31, 'Alfaro Ruíz', 2),
(32, 'Valverde Vega', 2),
(33, 'Upala', 2),
(34, 'Los Chiles', 2),
(35, 'Guatuso', 2),
(36, 'Cartago', 3),
(37, 'Paraíso', 3),
(38, 'La Unión', 3),
(39, 'Jiménez', 3),
(40, 'Turrialba', 3),
(41, 'Alvarado', 3),
(42, 'Oreamuno', 3),
(43, 'El Guarco', 3),
(44, 'Heredia', 4),
(45, 'Barva', 4),
(46, 'Santo Domingo', 4),
(47, 'Santa Bárbara', 4),
(48, 'San Rafael', 4),
(49, 'San Isidro', 4),
(50, 'Belén', 4),
(51, 'San Joaquín de Flores', 4),
(52, 'San Pablo', 4),
(53, 'Sarapiquí', 4),
(54, 'Liberia', 5),
(55, 'Nicoya', 5),
(56, 'Santa Cruz', 5),
(57, 'Bagaces', 5),
(58, 'Carrillo', 5),
(59, 'Cañas', 5),
(60, 'Abangares', 5),
(61, 'Tilarán', 5),
(62, 'Nandayure', 5),
(63, 'La Cruz', 5),
(64, 'Hojancha', 5),
(65, 'Puntarenas', 6),
(66, 'Esparza', 6),
(67, 'Buenos Aires', 6),
(68, 'Montes de Oro', 6),
(69, 'Osa', 6),
(70, 'Aguirre', 6),
(71, 'Golfito', 6),
(72, 'Coto Brus', 6),
(73, 'Parrita', 6),
(74, 'Corredores', 6),
(75, 'Garabito', 6),
(76, 'Limón', 7),
(77, 'Pococí', 7),
(78, 'Siquirres', 7),
(79, 'Talamanca', 7),
(80, 'Matina', 7),
(81, 'Guácimo', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`) VALUES
(77, 'Lentes de Cámaras'),
(78, 'Cámaras de video'),
(79, 'Cámaras Sony'),
(80, 'Mantenimiento y limpieza'),
(81, 'Cables'),
(82, 'Maletines'),
(83, 'Tripodes'),
(89, 'Cámara Canon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` text COLLATE utf8_spanish2_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tokenExpira` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `usuario`, `email`, `pass`, `nota`, `creado`, `token`, `tokenExpira`, `estado`) VALUES
(34, 'Raul Rodriguez Miranda', 'rgustv', 'raulgus@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer closed', '2020-07-11 04:14:57', '', '2020-06-08 21:20:03', 1),
(35, 'user', 'user', 'usuario@usuario.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-06-08 06:00:00', '', '2020-06-08 21:35:20', 1),
(37, 'Lulu Ramirez', 'Lulu', 'lulumir@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-07-09 22:27:12', '', '2020-06-08 23:20:17', 1),
(38, 'Arturo Mendoza', 'art12', 'art12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-06-19 03:04:15', '', '2020-06-19 03:04:15', 1),
(39, 'Raul R', 'raulgus', 'raulgust@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Customer abuse', '2020-07-11 04:15:18', '', '2020-06-20 04:08:33', 1),
(40, 'Nina Espinoza Mianda', 'nina', 'ninaes@gmail.es', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-06-26 04:39:22', '', '2020-06-22 03:01:14', 1),
(47, 'Alberto', 'Alb321', 'alb321@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Cuenta cerrada', '2020-07-12 19:47:05', '', '2020-07-09 04:32:30', 0),
(48, 'test', 'test', 'test@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-07-09 22:22:51', '', '2020-07-09 14:54:55', 0),
(49, 'Eli', 'Elia', 'eli@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-07-12 18:17:02', '', '2020-07-12 18:17:02', 1),
(50, 'Camilo', 'camil', 'camil@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Inactividad', '2020-07-12 19:46:22', '', '2020-07-12 19:03:47', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesxconcurso`
--

DROP TABLE IF EXISTS `clientesxconcurso`;
CREATE TABLE `clientesxconcurso` (
  `idCliente` int(11) NOT NULL,
  `idConcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientesxconcurso`
--

INSERT INTO `clientesxconcurso` (`idCliente`, `idConcurso`) VALUES
(34, 10),
(37, 10),
(38, 10),
(39, 10),
(40, 10),
(49, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `idCliente`, `fecha`, `monto`, `estado`) VALUES
(48, 25, '2020-04-01', 338, 0),
(49, 25, '2020-04-01', 225, 0),
(52, 25, '2020-04-01', 2255, 0),
(53, 25, '2020-04-02', 382, 0),
(54, 25, '2020-04-02', 3597, 0),
(55, 25, '2020-04-02', 828, 0),
(56, 24, '2020-04-02', 1128, 0),
(57, 24, '2020-04-02', 394, 0),
(58, 25, '2020-04-03', 721, 0),
(59, 25, '2020-04-03', 628, 0),
(60, 25, '2020-04-03', 394, 0),
(61, 25, '2020-04-03', 652, 0),
(63, 25, '2020-04-03', 671, 0),
(65, 24, '2020-04-08', 564, 0),
(66, 24, '2020-04-08', 450, 0),
(72, 29, '2020-04-11', 338, 0),
(73, 25, '2020-04-12', 1965, 0),
(74, 25, '2020-04-12', 394, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprafinalizada`
--

DROP TABLE IF EXISTS `comprafinalizada`;
CREATE TABLE `comprafinalizada` (
  `compraId` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `productoId` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `transaccionId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FechaCompra` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `idDireccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comprafinalizada`
--

INSERT INTO `comprafinalizada` (`compraId`, `clienteId`, `productoId`, `cantidad`, `monto`, `transaccionId`, `FechaCompra`, `estado`, `idDireccion`) VALUES
(37, 34, 83, 1, 172, '43B13314UG350334W', '2020-06-12 19:42:19', 7, 0),
(38, 34, 85, 1, 172, '43B13314UG350334W', '2020-06-12 19:42:19', 7, 0),
(39, 34, 82, 1, 172, '43B13314UG350334W', '2020-06-12 19:42:19', 7, 0),
(40, 37, 81, 1, 1269, '15871900600026356', '2020-06-14 22:14:17', 1, 0),
(41, 34, 79, 4, 2499, '235548626N162371X', '2020-06-15 18:14:30', 9, 0),
(42, 34, 81, 2, 1269, '235548626N162371X', '2020-06-15 18:14:31', 9, 0),
(43, 34, 87, 2, 88, '2TM80116P07222703', '2020-06-19 02:47:15', 1, 0),
(44, 34, 84, 3, 15, '2TM80116P07222703', '2020-06-19 02:47:15', 1, 0),
(45, 34, 87, 2, 88, '3RD21106SH765772R', '2020-06-22 01:04:15', 11, 1),
(46, 34, 79, 1, 2499, '3RD21106SH765772R', '2020-06-22 01:04:16', 11, 0),
(47, 34, 87, 1, 88, '23A03331X2595492N', '2020-06-22 01:26:54', 11, 0),
(48, 34, 83, 2, 89, '0EP07294KA088814S', '2020-06-22 01:29:45', 4, 8),
(49, 34, 82, 3, 14, '0EP07294KA088814S', '2020-06-22 01:30:40', 4, 8),
(50, 34, 87, 1, 88, '0EP07294KA088814S', '2020-06-22 01:30:40', 4, 8),
(51, 34, 84, 2, 15, '5N4939448S324823X', '2020-06-22 01:33:11', 1, 9),
(52, 34, 87, 1, 88, '5N4939448S324823X', '2020-06-22 01:33:11', 1, 9),
(53, 34, 84, 2, 15, '36L47641KY323825F', '2020-06-22 02:53:16', 4, 9),
(54, 40, 84, 1, 15, '01G37730N9634831U', '2020-06-26 04:41:06', 11, 14),
(55, 40, 89, 1, 699, '01G37730N9634831U', '2020-06-26 04:41:07', 11, 14),
(56, 37, 89, 1, 699, '15E8632713177242R', '2020-06-26 04:48:57', 1, 16),
(57, 37, 87, 3, 88, '15E8632713177242R', '2020-06-26 04:48:58', 1, 16),
(58, 34, 89, 1, 699, '1KK510286P3602802', '2020-06-27 02:13:04', 11, 1),
(59, 34, 84, 2, 15, '1KK510286P3602802', '2020-06-27 02:13:05', 11, 1),
(60, 34, 84, 1, 15, '3R133912PG050412U', '2020-06-27 16:00:34', 11, 1),
(61, 34, 91, 2, 155, '18X36100LN906831Y', '2020-06-27 16:59:31', 4, 15),
(62, 34, 90, 1, 69, '18X36100LN906831Y', '2020-06-27 16:59:31', 4, 15),
(63, 34, 93, 2, 12, '18X36100LN906831Y', '2020-06-27 16:59:31', 4, 15),
(64, 34, 89, 2, 699, '9KA75393G8136692W', '2020-07-01 18:09:26', 1, 9),
(65, 34, 84, 4, 15, '9KA75393G8136692W', '2020-07-01 18:09:26', 1, 9),
(66, 34, 91, 1, 155, '9KA75393G8136692W', '2020-07-01 18:09:26', 1, 9),
(67, 34, 92, 1, 3199, '9KA75393G8136692W', '2020-07-01 18:09:26', 1, 9),
(68, 34, 93, 1, 12, '9KA75393G8136692W', '2020-07-01 18:09:26', 1, 9),
(69, 34, 99, 1, 59, '9KA75393G8136692W', '2020-07-01 18:09:26', 1, 9),
(70, 34, 84, 3, 15, '1NL270584V380971U', '2020-07-08 23:21:38', 4, 9),
(71, 34, 91, 1, 155, '02Y7787565991662V', '2020-07-08 23:38:35', 1, 9),
(72, 34, 89, 1, 699, '7HR10385A9071782U', '2020-07-09 00:31:23', 9, 12),
(73, 34, 90, 1, 69, '8DR37853G9114204H', '2020-07-10 15:17:32', 1, 12),
(74, 34, 93, 1, 12, '8DR37853G9114204H', '2020-07-10 15:17:32', 1, 12),
(75, 34, 84, 3, 15, '05T32622PG7509537', '2020-07-10 15:33:59', 1, 12),
(76, 34, 93, 1, 12, '05T32622PG7509537', '2020-07-10 15:34:00', 1, 12),
(77, 34, 84, 4, 15, '51753371UX271931V', '2020-07-11 03:36:49', 1, 12),
(78, 34, 90, 1, 69, '51753371UX271931V', '2020-07-11 03:36:49', 1, 12),
(79, 34, 91, 2, 155, '2FC33791T8271402V', '2020-07-11 04:12:29', 1, 12),
(80, 50, 91, 2, 93, '3W953403DH252492Y', '2020-07-12 19:19:44', 1, 21),
(81, 50, 99, 2, 59, '3W953403DH252492Y', '2020-07-12 19:19:44', 1, 21),
(82, 37, 84, 2, 11, '7JX32982682887814', '2020-07-12 22:57:23', 1, 16),
(83, 37, 90, 1, 69, '7JX32982682887814', '2020-07-12 22:57:23', 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

DROP TABLE IF EXISTS `concurso`;
CREATE TABLE `concurso` (
  `idConcurso` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idPremio` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFinal` datetime NOT NULL,
  `cantidadMaxima` int(11) NOT NULL,
  `ganador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`idConcurso`, `nombre`, `descripcion`, `idPremio`, `fechaInicio`, `fechaFinal`, `cantidadMaxima`, `ganador`) VALUES
(4, 'Rifa prueba', 'Algo', 12, '2020-04-10 10:00:00', '2020-04-10 10:00:00', 7, 25),
(6, 'Ganate una Canon X420!', 'Concurso para ganar una Canon X420', 11, '2020-04-01 11:00:00', '2020-04-05 11:00:00', 60, 0),
(10, 'Rifa Julio Cable', 'Rifa de cable gratis', 84, '2020-07-12 02:29:00', '2020-07-14 02:29:00', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrareset`
--

DROP TABLE IF EXISTS `contrareset`;
CREATE TABLE `contrareset` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tokenExpira` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contrareset`
--

INSERT INTO `contrareset` (`id`, `email`, `token`, `tokenExpira`) VALUES
(26, 'raulgus@hotmail.com', 'OAgsOQvHFHpKWvIqfYuAaoTcElq57XCx4HWMcDSO', '0000-00-00 00:00:00'),
(27, 'raulgust@gmail.com', 'jKux2wy52OEkBdCxiH5nNVqogL5oa0J6B5zBA8VH', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `idDir` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idProv` int(11) DEFAULT NULL,
  `idCanton` int(11) DEFAULT NULL,
  `idDistrito` int(11) DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `main` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDir`, `direccion`, `direccion2`, `idProv`, `idCanton`, `idDistrito`, `zip`, `telefono`, `idCliente`, `main`, `status`) VALUES
(2, 'Parque sabanilla 250 m sur casa 12', '', 1, 15, 91, '11502', '', 37, 0, 0),
(5, 'Del palo de mango 600m este', '12a', 3, 38, 255, '33457', '', 38, 1, 1),
(6, 'Gimanasio George angulo', '', 2, 22, 138, '45689', '', 38, 0, 1),
(9, 'De la atalaya sur ', '', 1, 16, 96, '11567', '', 34, 0, 0),
(10, '10000 Turkey Lake Rd', '', 2, 26, 174, '11349', '', 34, 0, 0),
(11, 'Del parque de alajuelita 450sur', 'casa 5a', 1, 10, 70, '45707', '', 34, 0, 0),
(12, 'Jaco beach', '', 6, 75, 454, '66795', '', 34, 1, 1),
(14, 'De la pozuelo 600 oeste', '', 4, 46, 299, '34790', '', 40, 1, 1),
(16, 'De la iglesa de San Felipe 300 al este, 200 al sur', 'casa color naranja', 5, 55, 341, '66783', '', 37, 1, 1),
(17, '10000 Turkey Lake Rd', '', 3, 37, 249, '32819', '', 37, 0, 1),
(18, 'De la antigua panadería valverde 350m sur, ', '', 4, 52, 329, '89768', '', 34, 0, 1),
(19, 'De la antigua casa 450m Sur', 'apartamento 12', 3, 38, 258, '34567', '', 34, 0, 1),
(20, 'De la antigua fábrica 100m este', 'apt 12', 2, 23, 153, '22345', '', 34, 0, 1),
(21, 'De la cosecha 450 m este', '', 3, 37, 250, '45791', '', 50, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `idDistrito` int(11) NOT NULL,
  `distrito` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idCanton` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`idDistrito`, `distrito`, `idCanton`) VALUES
(1, 'Carmen', 1),
(2, 'Merced', 1),
(3, 'Hospital', 1),
(4, 'Catedral', 1),
(5, 'Zapote', 1),
(6, 'San Francisco de Dos Ríos', 1),
(7, 'La Uruca', 1),
(8, 'Mata Redonda', 1),
(9, 'Pavas', 1),
(10, 'Hatillo', 1),
(11, 'San Sebastián', 1),
(12, 'San Miguel', 2),
(13, 'San Antonio', 2),
(14, 'San Rafael', 2),
(15, 'Desamparados', 3),
(16, 'San Miguel', 3),
(17, 'San Juan de Dios', 3),
(18, 'San Rafael Arriba', 3),
(19, 'San Antonio', 3),
(20, 'Frailes', 3),
(21, 'Patarrá', 3),
(22, 'San Cristóbal', 3),
(23, 'Rosario', 3),
(24, 'Damas', 3),
(25, 'San Rafael Abajo', 3),
(26, 'Gravilias', 3),
(27, 'Los Guido', 3),
(28, 'Santiago', 4),
(29, 'Mercedes Sur', 4),
(30, 'Barbacoas', 4),
(31, 'Grifo Alto', 4),
(32, 'San Rafael', 4),
(33, 'Candelarita', 4),
(34, 'Desamparaditos', 4),
(35, 'San Antonio', 4),
(36, 'Chires', 4),
(37, 'San Marcos', 5),
(38, 'San Lorenzo', 5),
(39, 'San Carlos', 5),
(40, 'Aserrí', 6),
(41, 'Tarbaca', 6),
(42, 'Vuelta de Jorco', 6),
(43, 'San Gabriel', 6),
(44, 'Legua', 6),
(45, 'Monterrey', 6),
(46, 'Salitrillos', 6),
(47, 'Colón', 7),
(48, 'Guayabo', 7),
(49, 'Tabarcia', 7),
(50, 'Piedras Negras', 7),
(51, 'Picagres', 7),
(52, 'Jaris', 7),
(53, 'Quitirrisí', 7),
(54, 'Guadalupe', 8),
(55, 'San Francisco', 8),
(56, 'Calle Blancos', 8),
(57, 'Mata de Plátano', 8),
(58, 'Ipís', 8),
(59, 'Rancho Redondo', 8),
(60, 'Purral', 8),
(61, 'Santa Ana', 9),
(62, 'Salitral', 9),
(63, 'Pozos', 9),
(64, 'Uruca', 9),
(65, 'Piedades', 9),
(66, 'Brasil', 9),
(67, 'Alajuelita', 10),
(68, 'San Josecito', 10),
(69, 'San Antonio', 10),
(70, 'Concepción', 10),
(71, 'San Felipe', 10),
(72, 'San Isidro', 11),
(73, 'San Rafael', 11),
(74, 'Dulce Nombre de Jesús', 11),
(75, 'Patalillo', 11),
(76, 'Cascajal', 11),
(77, 'San Ignacio', 12),
(78, 'Guaitil', 12),
(79, 'Palmichal', 12),
(80, 'Cangrejal', 12),
(81, 'Sabanillas', 12),
(82, 'San Juan', 13),
(83, 'Cinco Esquinas', 13),
(84, 'Anselmo llorente', 13),
(85, 'León XIII', 13),
(86, 'Colima', 13),
(87, 'San Vicente', 14),
(88, 'San Jerónimo', 14),
(89, 'La Trinidad', 14),
(90, 'San Pedro', 15),
(91, 'Sabanilla', 15),
(92, 'Mercedes', 15),
(93, 'San Rafael', 15),
(94, 'San Pablo', 16),
(95, 'San Pedro', 16),
(96, 'San Juan de Mata', 16),
(97, 'San Luis', 16),
(98, 'Carara', 16),
(99, 'Santa María', 17),
(100, 'Jardín', 17),
(101, 'Copey', 17),
(102, 'Curridabat', 18),
(103, 'Granadilla', 18),
(104, 'Sánchez', 18),
(105, 'Tirrases', 18),
(106, 'San Isidro de El General', 19),
(107, 'El General', 19),
(108, 'Daniel Flores', 19),
(109, 'Rivas', 19),
(110, 'San Pedro', 19),
(111, 'Platanares', 19),
(112, 'Pejibaye', 19),
(113, 'Cajón', 19),
(114, 'Barú', 19),
(115, 'Río Nuevo', 19),
(116, 'Páramo', 19),
(117, 'La Amistad', 19),
(118, 'San Pablo', 20),
(119, 'San Andrés', 20),
(120, 'Llano Bonito', 20),
(121, 'San Isidro', 20),
(122, 'Santa Cruz', 20),
(123, 'San Antonio', 20),
(124, 'Alajuela', 21),
(125, 'San José', 21),
(126, 'Carrizal', 21),
(127, 'San Antonio', 21),
(128, 'Guácima', 21),
(129, 'San Isidro', 21),
(130, 'Sabanilla', 21),
(131, 'San Rafael', 21),
(132, 'Río Segundo', 21),
(133, 'Desamparados', 21),
(134, 'Turrúcares', 21),
(135, 'Tambor', 21),
(136, 'La Garita', 21),
(137, 'Sarapiquí', 21),
(138, 'San Ramón', 22),
(139, 'Santiago', 22),
(140, 'San Juan', 22),
(141, 'Piedades Norte', 22),
(142, 'Piedades Sur', 22),
(143, 'San Rafael', 22),
(144, 'San Isidro', 22),
(145, 'Ángeles', 22),
(146, 'Alfaro', 22),
(147, 'Volio', 22),
(148, 'Concepción', 22),
(149, 'Zapotal', 22),
(150, 'Peñas Blancas', 22),
(151, 'San Lorenzo', 22),
(152, 'Grecia', 23),
(153, 'San Isidro', 23),
(154, 'San José', 23),
(155, 'San Roque', 23),
(156, 'Tacares', 23),
(157, 'Puente de Piedra', 23),
(158, 'Bolívar', 23),
(159, 'San Mateo', 24),
(160, 'Desmonte', 24),
(161, 'Jesús María', 24),
(162, 'Labrador', 24),
(163, 'Atenas', 25),
(164, 'Jesús', 25),
(165, 'Mercedes', 25),
(166, 'San Isidro', 25),
(167, 'Concepción', 25),
(168, 'San José', 25),
(169, 'Santa Eulalia', 25),
(170, 'Escobal', 25),
(171, 'Naranjo', 26),
(172, 'San Miguel', 26),
(173, 'San José', 26),
(174, 'Cirrí Sur', 26),
(175, 'San Jerónimo', 26),
(176, 'San Juan', 26),
(177, 'El Rosario', 26),
(178, 'Palmitos', 26),
(179, 'Palmares', 27),
(180, 'Zaragoza', 27),
(181, 'Buenos Aires', 27),
(182, 'Santiago', 27),
(183, 'Candelaria', 27),
(184, 'Esquipulas', 27),
(185, 'La Granja', 27),
(186, 'San Pedro', 28),
(187, 'San Juan', 28),
(188, 'San Rafael', 28),
(189, 'Carrillos', 28),
(190, 'Sabana Redonda', 28),
(191, 'Orotina', 29),
(192, 'Mastate', 29),
(193, 'Hacienda Vieja', 29),
(194, 'Coyolar', 29),
(195, 'La Ceiba', 29),
(196, 'Quesada', 30),
(197, 'Florencia', 30),
(198, 'Buenavista', 30),
(199, 'Aguas Zarcas', 30),
(200, 'Venecia', 30),
(201, 'Pital', 30),
(202, 'La Fortuna', 30),
(203, 'La Tigra', 30),
(204, 'La Palmera', 30),
(205, 'Venado', 30),
(206, 'Cutris', 30),
(207, 'Monterrey', 30),
(208, 'Pocosol', 30),
(209, 'Zarcero', 31),
(210, 'Laguna', 31),
(211, 'Tapezco', 31),
(212, 'Guadalupe', 31),
(213, 'Palmira', 31),
(214, 'Zapote', 31),
(215, 'Brisas', 31),
(216, 'Sarchí Norte', 32),
(217, 'Sarchí Sur', 32),
(218, 'Toro Amarillo', 32),
(219, 'San Pedro', 32),
(220, 'Rodríguez', 32),
(221, 'Upala', 33),
(222, 'Aguas Claras', 33),
(223, 'San José (Pizote)', 33),
(224, 'Bijagua', 33),
(225, 'Delicias', 33),
(226, 'Dos Ríos', 33),
(227, 'Yolillal', 33),
(228, 'Canalete', 33),
(229, 'Los Chiles', 34),
(230, 'Caño Negro', 34),
(231, 'El Amparo', 34),
(232, 'San Jorge', 34),
(233, 'San Rafael', 35),
(234, 'Buenavista', 35),
(235, 'Cote', 35),
(236, 'Katira', 35),
(237, 'Oriental', 36),
(238, 'Occidental', 36),
(239, 'Carmen', 36),
(240, 'San Nicolás', 36),
(241, 'Agua Caliente', 36),
(242, 'Guadalupe', 36),
(243, 'Corralillo', 36),
(244, 'Tierra Blanca', 36),
(245, 'Dulce Nombre', 36),
(246, 'Llano Grande', 36),
(247, 'Quebradilla', 36),
(248, 'Paraíso', 37),
(249, 'Santiago', 37),
(250, 'Orosi', 37),
(251, 'Cachí', 37),
(252, 'Llanos de Santa Lucía', 37),
(253, 'Tres Ríos', 38),
(254, 'San Diego', 38),
(255, 'San Juan', 38),
(256, 'San Rafael', 38),
(257, 'Concepción', 38),
(258, 'Dulce Nombre', 38),
(259, 'San Ramón', 38),
(260, 'Río Azul', 38),
(261, 'Juan Viñas', 39),
(262, 'Tucurrique', 39),
(263, 'Pejibaye', 39),
(264, 'Turrialba', 40),
(265, 'La Suiza', 40),
(266, 'Peralta', 40),
(267, 'Santa Cruz', 40),
(268, 'Santa Teresita', 40),
(269, 'Pavones', 40),
(270, 'Tuis', 40),
(271, 'Tayutic', 40),
(272, 'Santa Rosa', 40),
(273, 'Tres Equis', 40),
(274, 'La Isabel', 40),
(275, 'Chirripó', 40),
(276, 'Pacayas', 41),
(277, 'Cervantes', 41),
(278, 'Capellades', 41),
(279, 'San Rafael', 42),
(280, 'Cot', 42),
(281, 'Potrero Cerrado', 42),
(282, 'Cipreses', 42),
(283, 'Santa Rosa', 42),
(284, 'El Tejar', 43),
(285, 'San Isidro', 43),
(286, 'Tobosi', 43),
(287, 'Patio de Agua', 43),
(288, 'Heredia', 44),
(289, 'Mercedes', 44),
(290, 'San Francisco', 44),
(291, 'Ulloa', 44),
(292, 'Varablanca', 44),
(293, 'Barva', 45),
(294, 'San Pedro', 45),
(295, 'San Pablo', 45),
(296, 'San Roque', 45),
(297, 'Santa Lucía', 45),
(298, 'San José de la Montaña', 45),
(299, 'Santo Domingo', 46),
(300, 'San Vicente', 46),
(301, 'San Miguel', 46),
(302, 'Paracito', 46),
(303, 'Santo Tomás', 46),
(304, 'Santa Rosa', 46),
(305, 'Tures', 46),
(306, 'Pará', 46),
(307, 'Santa Bárbara', 47),
(308, 'San Pedro', 47),
(309, 'San Juan', 47),
(310, 'Jesús', 47),
(311, 'Santo Domingo', 47),
(312, 'Purabá', 47),
(313, 'San Rafael', 48),
(314, 'San Josecito', 48),
(315, 'Santiago', 48),
(316, 'Ángeles', 48),
(317, 'Concepción', 48),
(318, 'San Isidro', 49),
(319, 'San José', 49),
(320, 'Concepción', 49),
(321, 'San Francisco', 49),
(322, 'San Antonio', 50),
(323, 'La Ribera', 50),
(324, 'La Asunción', 50),
(325, 'San Joaquín', 51),
(326, 'Barrantes', 51),
(327, 'Llorente', 51),
(328, 'San Pablo', 52),
(329, 'Rincón de Sabanilla', 52),
(330, 'Puerto Viejo', 53),
(331, 'La Virgen', 53),
(332, 'Horquetas', 53),
(333, 'Llanuras del Gaspar', 53),
(334, 'Cureña', 53),
(335, 'Liberia', 54),
(336, 'Cañas Dulces', 54),
(337, 'Mayorga', 54),
(338, 'Nacascolo', 54),
(339, 'Curubandé', 54),
(340, 'Nicoya', 55),
(341, 'Mansión', 55),
(342, 'San Antonio', 55),
(343, 'Quebrada Honda', 55),
(344, 'Sámara', 55),
(345, 'Nosara', 55),
(346, 'Belén de Nosarita', 55),
(347, 'Santa Cruz', 56),
(348, 'Bolsón', 56),
(349, 'Veintisiete de Abril', 56),
(350, 'Tempate', 56),
(351, 'Cartagena', 56),
(352, 'Cuajiniquil', 56),
(353, 'Diriá', 56),
(354, 'Cabo Velas', 56),
(355, 'Tamarindo', 56),
(356, 'Bagaces', 57),
(357, 'La Fortuna', 57),
(358, 'Mogote', 57),
(359, 'Río Naranjo', 57),
(360, 'Filadelfia', 58),
(361, 'Palmira', 58),
(362, 'Sardinal', 58),
(363, 'Belén', 58),
(364, 'Cañas', 59),
(365, 'Palmira', 59),
(366, 'San Miguel', 59),
(367, 'Bebedero', 59),
(368, 'Porozal', 59),
(369, 'Las Juntas', 60),
(370, 'Sierra', 60),
(371, 'San Juan', 60),
(372, 'Colorado', 60),
(373, 'Tilarán', 61),
(374, 'Quebrada Grande', 61),
(375, 'Tronadora', 61),
(376, 'Santa Rosa', 61),
(377, 'Líbano', 61),
(378, 'Tierras Morenas', 61),
(379, 'Arenal', 61),
(380, 'Cabeceras', 61),
(381, 'Carmona', 62),
(382, 'Santa Rita', 62),
(383, 'Zapotal', 62),
(384, 'San Pablo', 62),
(385, 'Porvenir', 62),
(386, 'Bejuco', 62),
(387, 'La Cruz', 63),
(388, 'Santa Cecilia', 63),
(389, 'La Garita', 63),
(390, 'Santa Elena', 63),
(391, 'Hojancha', 64),
(392, 'Monte Romo', 64),
(393, 'Puerto Carrillo', 64),
(394, 'Huacas', 64),
(395, 'Matambú', 64),
(396, 'Puntarenas', 65),
(397, 'Pitahaya', 65),
(398, 'Chomes', 65),
(399, 'Lepanto', 65),
(400, 'Paquera', 65),
(401, 'Manzanillo', 65),
(402, 'Guacimal', 65),
(403, 'Barranca', 65),
(404, 'Monte Verde', 65),
(405, 'Isla del Coco', 65),
(406, 'Cóbano', 65),
(407, 'Chacarita', 65),
(408, 'Chira', 65),
(409, 'Acapulco', 65),
(410, 'El Roble', 65),
(411, 'Arancibia', 65),
(412, 'Espíritu Santo', 66),
(413, 'San Juan Grande', 66),
(414, 'Macacona', 66),
(415, 'San Rafael', 66),
(416, 'San Jerónimo', 66),
(417, 'Caldera', 66),
(418, 'Buenos Aires', 67),
(419, 'Volcán', 67),
(420, 'Potrero Grande', 67),
(421, 'Boruca', 67),
(422, 'Pilas', 67),
(423, 'Colinas', 67),
(424, 'Chánguena', 67),
(425, 'Biolley', 67),
(426, 'Brunka', 67),
(427, 'Miramar', 68),
(428, 'La Unión', 68),
(429, 'San Isidro', 68),
(430, 'Puerto Cortés', 69),
(431, 'Palmar', 69),
(432, 'Sierpe', 69),
(433, 'Bahía Ballena', 69),
(434, 'Piedras Blancas', 69),
(435, 'Bahía Drake', 69),
(436, 'Quepos', 70),
(437, 'Savegre', 70),
(438, 'Naranjito', 70),
(439, 'Golfito', 71),
(440, 'Puerto Jiménez', 71),
(441, 'Guaycará', 71),
(442, 'Pavón', 71),
(443, 'San Vito', 72),
(444, 'Sabalito', 72),
(445, 'Aguabuena', 72),
(446, 'Limoncito', 72),
(447, 'Pittier', 72),
(448, 'Gutiérrez Braun', 72),
(449, 'Parrita', 73),
(450, 'Corredor', 74),
(451, 'La Cuesta', 74),
(452, 'Canoas', 74),
(453, 'Laurel', 74),
(454, 'Jacó', 75),
(455, 'Tárcoles', 75),
(456, 'Limón', 76),
(457, 'Valle La Estrella', 76),
(458, 'Río Blanco', 76),
(459, 'Matama', 76),
(460, 'Guápiles', 77),
(461, 'Jiménez', 77),
(462, 'La Rita', 77),
(463, 'Roxana', 77),
(464, 'Cariari', 77),
(465, 'Colorado', 77),
(466, 'La Colonia', 77),
(467, 'Siquirres', 78),
(468, 'Pacuarito', 78),
(469, 'Florida', 78),
(470, 'Germania', 78),
(471, 'Cairo', 78),
(472, 'Alegría', 78),
(473, 'Reventazón', 78),
(474, 'Bratsi', 79),
(475, 'Sixaola', 79),
(476, 'Cahuita', 79),
(477, 'Telire', 79),
(478, 'Matina', 80),
(479, 'Batán', 80),
(480, 'Carrandi', 80),
(481, 'Guácimo', 81),
(482, 'Mercedes', 81),
(483, 'Pocora', 81),
(484, 'Río Jiménez', 81),
(485, 'Duacarí', 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `idEstado` int(11) NOT NULL,
  `nombreEstado` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstado`, `nombreEstado`) VALUES
(1, 'Pedido Recibido'),
(2, 'Preparando pedido'),
(3, 'Preparando Pedido/Enviando Pedido'),
(4, 'Pedido en Camino'),
(5, 'Atraso en el Envío'),
(6, 'Pedido Previsto para la Entrega Hoy'),
(7, 'Intento De Entrega Fallido'),
(8, 'Problema con el Envío'),
(9, 'No se pudo entregar el pedido'),
(11, 'Pedido Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `idGaleria` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `cam` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`idGaleria`, `nombre`, `autor`, `cam`, `imagen`) VALUES
(41, 'Conferencia Cadiz', 'Karina Montoya', 'Canon PowerShot SX540', '17.jpg5efa868fa328c6.53988246.png'),
(50, 'Menú Boquitas', 'Anónimo', 'Nikon D3500', '11.jpg5efcb9b8572c69.52163646.png'),
(51, 'Aurora Borealis', 'Nomse Name', 'Nikon P1000', 'kayaganLake.jpg5efccaa59038f6.71415052.png'),
(54, 'Aurora Borealis Alaska', 'Andrea De Santi', 'Canon EOS Rebel T6', 'auroraBorealis.jpg5f07f4ab066a86.38891118.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE `ofertas` (
  `idOferta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `totalOferta` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL DEFAULT current_timestamp(),
  `fechaFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`idOferta`, `idProducto`, `titulo`, `descripcion`, `totalOferta`, `fechaInicio`, `fechaFinal`) VALUES
(2, 10, 'Oferta test', '', 10, '2020-03-02 14:49:39', '2020-03-02 14:49:39'),
(25, 35, 'Oferta video Sony', '', 10, '0000-00-00 00:00:00', '2020-04-15 10:00:00'),
(26, 14, 'Oferta Accesorio', '', 60, '2020-04-08 15:00:00', '2020-04-30 11:15:00'),
(27, 87, '', 'Nuevo descuentos', 35, '2020-07-06 09:01:00', '2020-07-07 09:01:00'),
(29, 91, '', '', 40, '2020-07-05 09:05:00', '2020-08-14 09:05:00'),
(32, 99, '', 'crash', 30, '2020-07-09 10:58:00', '2020-07-09 11:00:00'),
(34, 90, 'nueva', 'nueva', 65, '2020-07-22 08:16:00', '2020-07-23 08:16:00'),
(35, 84, 'Descuento cables', 'Descuentos de cables', 25, '2020-07-11 01:58:00', '2020-07-30 01:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `precio` float NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `idCategoria`, `precio`, `Descripcion`, `imagen`, `status`) VALUES
(79, 'Cámara video panasonic Pro', 78, 2499, 'Cámara video profesional panasonic experta', 'camPanasonic.jpg5edeabb3f0a640.75901416.png', 1),
(80, 'Lente Tamron', 77, 2359, 'Lente Tamron Profesional Cam 4k', 'lentetamron2.PNG5edeb18d45e998.10685181.png', 0),
(81, 'Lente Tamron  SP', 77, 1269, 'Profesional Lente Full HD', 'leteTamron.PNG5edeb1f77ab011.47049899.png', 0),
(82, 'Cable HDMI', 81, 14, 'Cable HDMI Marca HP', 'hdmiCableHP.PNG5edecadadff080.49662330.png', 0),
(83, 'Reproductor de DVD ', 80, 89, 'Reproductor de DVD ', 'dvd.PNG5edecb2cb54b38.00239305.png', 0),
(84, 'Cable HDMI', 81, 15, 'Cable HDMI 20\" Pulgadas', 'hdmiCableHP.PNG5edf14340ddc59.66137949.png', 1),
(85, 'Plancha Samsung', 80, 69, 'Plancha para la casa ', 'plancha.PNG5ee30006a59bb4.57023261.png', 0),
(86, 'Equipo de sonido', 80, 299, 'Equipo sony de sonido', 'equipo.PNG5ee3002bdb75b2.35288469.png', 0),
(87, 'bati', 80, 88, 'jlñjk', 'batidora.png5ee7baf305ed24.73198341.png', 0),
(88, 'Lente Tamron', 77, 1990, 'Lente Tamron profesional', 'lentetamron2.PNG5ef57b35e27dd0.66187859.png', 1),
(89, 'Televisor Samsung UHD700', 80, 699, 'Televisor Samsung 4K Ultra HD ', 'televisorSamsung.PNG5ef57b925ac472.52636682.png', 1),
(90, 'Maletin Neewer', 82, 69, 'Maletin Neewer 36x9x9\" color negro amplio, duradero', 'neewer.PNG5ef775c63cd6f1.83833170.png', 1),
(91, 'Tripode Viltrox', 83, 155, 'Soporta has 6kg de peso de, giro panorámico', 'tripodeVil.PNG5ef77696e017b0.57478341.png', 1),
(92, 'Camara Nikon Z7', 79, 3199, 'Camara Nikon Z7 con Adaptador FTZ', 'nikonz7.PNG5ef779f7ef5148.52243117.png', 1),
(93, 'Cargador Camara Nikon', 81, 12, 'Cargador USB de cámara NIKON para también transferencia de datos', 'cargadorNikon.PNG5ef77a8728d565.23772767.png', 1),
(98, 'Playstation 5', 80, 1589, 'Playstation 5 with two controllers', 'ps5.jpg5efccfb634eb84.00214744.png', 1),
(99, 'Crash Bandicoot 4', 80, 59, 'Crash Bandicoot for PS5', 'crash4.PNG5efcd01d8d2558.82328519.png', 1),
(101, 'New Nikon ', 89, 799, 'Nikon New with more info', 'nikon transparent.png5f0b6a9999d851.44085310.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscompra`
--

DROP TABLE IF EXISTS `productoscompra`;
CREATE TABLE `productoscompra` (
  `id` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productoscompra`
--

INSERT INTO `productoscompra` (`id`, `idCompra`, `idProducto`, `cantidad`, `monto`) VALUES
(49, 48, 11, 1, 299),
(50, 49, 14, 1, 225),
(51, 52, 13, 4, 2255),
(52, 53, 14, 1, 382),
(53, 53, 15, 1, 382),
(54, 54, 10, 7, 3597),
(55, 55, 10, 1, 828),
(56, 55, 15, 2, 828),
(57, 56, 13, 2, 1128),
(58, 57, 12, 1, 394),
(59, 58, 15, 1, 721),
(60, 58, 13, 1, 721),
(61, 59, 15, 4, 628),
(62, 60, 12, 1, 394),
(63, 61, 15, 2, 652),
(64, 61, 11, 1, 652),
(65, 63, 15, 1, 671),
(66, 63, 10, 1, 671),
(67, 65, 13, 1, 564),
(68, 66, 14, 2, 450),
(69, 72, 11, 1, 338),
(70, 73, 14, 3, 1965),
(71, 73, 35, 1, 1965),
(72, 74, 12, 1, 394);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `idProv` int(11) NOT NULL,
  `provincia` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProv`, `provincia`) VALUES
(1, 'San José'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia'),
(5, 'Guanacaste'),
(6, 'Puntarenas'),
(7, 'Limón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `idStatus` tinyint(1) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`idStatus`, `status`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`idCanton`),
  ADD KEY `fk_canton_provincia` (`idProv`);

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `clientesxconcurso`
--
ALTER TABLE `clientesxconcurso`
  ADD PRIMARY KEY (`idCliente`,`idConcurso`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprafinalizada`
--
ALTER TABLE `comprafinalizada`
  ADD PRIMARY KEY (`compraId`),
  ADD KEY `productoId` (`productoId`),
  ADD KEY `clienteId` (`clienteId`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`idConcurso`);

--
-- Indices de la tabla `contrareset`
--
ALTER TABLE `contrareset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDir`),
  ADD KEY `fk_direccion_provincia` (`idProv`),
  ADD KEY `fk_direccion_canton` (`idCanton`),
  ADD KEY `fk_direccion_distrito` (`idDistrito`),
  ADD KEY `fk_direccion_clientes` (`idCliente`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`idDistrito`),
  ADD KEY `fk_distrito_provincia` (`idCanton`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`idGaleria`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`idOferta`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `status` (`status`),
  ADD KEY `status_2` (`status`);

--
-- Indices de la tabla `productoscompra`
--
ALTER TABLE `productoscompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProv`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `canton`
--
ALTER TABLE `canton`
  MODIFY `idCanton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `comprafinalizada`
--
ALTER TABLE `comprafinalizada`
  MODIFY `compraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `idConcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contrareset`
--
ALTER TABLE `contrareset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `idDistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `idGaleria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `productoscompra`
--
ALTER TABLE `productoscompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idProv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`idStatus`);

--
-- Filtros para la tabla `canton`
--
ALTER TABLE `canton`
  ADD CONSTRAINT `fk_canton_provincia` FOREIGN KEY (`idProv`) REFERENCES `provincia` (`idProv`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `status` (`idStatus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprafinalizada`
--
ALTER TABLE `comprafinalizada`
  ADD CONSTRAINT `comprafinalizada_ibfk_1` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `comprafinalizada_ibfk_2` FOREIGN KEY (`productoId`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `comprafinalizada_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estados` (`idEstado`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_direccion_canton` FOREIGN KEY (`idCanton`) REFERENCES `canton` (`idCanton`),
  ADD CONSTRAINT `fk_direccion_clientes` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_direccion_distrito` FOREIGN KEY (`idDistrito`) REFERENCES `distrito` (`idDistrito`),
  ADD CONSTRAINT `fk_direccion_provincia` FOREIGN KEY (`idProv`) REFERENCES `provincia` (`idProv`);

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `fk_distrito_provincia` FOREIGN KEY (`idCanton`) REFERENCES `canton` (`idCanton`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
