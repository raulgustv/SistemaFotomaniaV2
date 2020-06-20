-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2020 a las 06:24:48
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
  `tipoUsuario` enum('Admin','Otro') COLLATE utf8_spanish2_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaLogin` datetime NOT NULL,
  `notas` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `user`, `email`, `pass`, `tipoUsuario`, `fechaRegistro`, `fechaLogin`, `notas`) VALUES
(1, 'admin', 'admin@admin.com', '1234', 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(17, 'rgustv', 'raulgus@hotmail.com', '$2y$08$MMRrPIYY13Bjzj2w8U7S1eyN09u1AglynNztfd27x6ER8HTYNFuUm', 'Admin', '2020-05-19 01:50:55', '2020-06-19 09:52:09', ''),
(20, 'Erick Torres', 'erick@gmail.com', '$2y$08$prx6hA2Bg5EX.mzeHqKxYeXO9cIGQvbVo5abkONdprVv1UK0HJnwu', 'Admin', '2020-05-20 08:52:57', '2020-05-20 08:52:57', ''),
(21, 'rmmirand', 'rmmirand@amazon.com', '$2y$08$pADaL82JgQaOUEtxsWBNqOQS1H8GSqPWIIw3mp7w1hYA8o7DBA8LS', 'Admin', '2020-05-20 11:58:55', '2020-05-20 11:59:37', '');

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

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`id`, `idCliente`, `idProducto`, `nombreProducto`, `cantidad`, `precio`, `total`) VALUES
(184, 37, 81, 'Lente Tamron  SP', 2, 1269, 2538);

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
(79, 'Cámara fotográfica'),
(80, 'Televisores'),
(81, 'Cables');

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
  `pass` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tokenExpira` timestamp NOT NULL DEFAULT current_timestamp(),
  `idDireccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `usuario`, `email`, `pass`, `creado`, `token`, `tokenExpira`, `idDireccion`) VALUES
(34, 'Raul Rodriguez', 'rgustv', 'raulgus@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-06-08 06:00:00', '', '2020-06-08 21:20:03', 0),
(35, 'user', 'user', 'usuario@usuario.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-06-08 06:00:00', '', '2020-06-08 21:35:20', 0),
(37, 'Lulu Miranda', 'Lulu', 'lulumir@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-06-09 06:00:00', '', '2020-06-08 23:20:17', 0),
(38, 'Arturo Mendoza', 'art12', 'art12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-06-19 03:04:15', '', '2020-06-19 03:04:15', 0),
(39, 'Raul R', 'raulgus', 'raulgust@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-06-20 06:00:00', '', '2020-06-20 04:08:33', 0);

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
(0, 2),
(13, 2),
(15, 2),
(15, 3),
(17, 2),
(17, 3),
(19, 3),
(24, 4),
(25, 4),
(29, 4);

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
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comprafinalizada`
--

INSERT INTO `comprafinalizada` (`compraId`, `clienteId`, `productoId`, `cantidad`, `monto`, `transaccionId`, `FechaCompra`, `estado`) VALUES
(36, 34, 85, 2, 138, '0J620943PD7590623', '2020-06-12 19:36:09', 8),
(37, 34, 83, 1, 172, '43B13314UG350334W', '2020-06-12 19:42:19', 7),
(38, 34, 85, 1, 172, '43B13314UG350334W', '2020-06-12 19:42:19', 7),
(39, 34, 82, 1, 172, '43B13314UG350334W', '2020-06-12 19:42:19', 7),
(40, 37, 81, 1, 1269, '15871900600026356', '2020-06-14 22:14:17', 1),
(41, 34, 79, 4, 2499, '235548626N162371X', '2020-06-15 18:14:30', 9),
(42, 34, 81, 2, 1269, '235548626N162371X', '2020-06-15 18:14:31', 9),
(43, 34, 87, 2, 88, '2TM80116P07222703', '2020-06-19 02:47:15', 1),
(44, 34, 84, 3, 15, '2TM80116P07222703', '2020-06-19 02:47:15', 1);

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
(6, 'Ganate una Canon X420!', 'Concurso para ganar una Canon X420', 11, '2020-04-01 11:00:00', '2020-04-05 11:00:00', 60, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrareset`
--

DROP TABLE IF EXISTS `contrareset`;
CREATE TABLE `contrareset` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contrareset`
--

INSERT INTO `contrareset` (`id`, `email`, `token`) VALUES
(26, 'raulgus@hotmail.com', 'OAgsOQvHFHpKWvIqfYuAaoTcElq57XCx4HWMcDSO'),
(27, 'raulgust@gmail.com', 'jKux2wy52OEkBdCxiH5nNVqogL5oa0J6B5zBA8VH');

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
(2, 'Preparando Entregado'),
(3, 'Preparando Pedido/Enviando Pedido'),
(4, 'Pedido en Camino'),
(5, 'Atraso en el Envío'),
(6, 'Pedido Previsto para la Entrega Hoy'),
(7, 'Intento De Entrega Fallido'),
(8, 'Problema con el Envío'),
(9, 'No se pudo entregar el pedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `idGaleria` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagenThumb` varchar(250) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`idGaleria`, `nombre`, `imagenThumb`, `imagen`) VALUES
(26, 'girl', 'girl601.png', 'girl864.png'),
(27, 'desk', 'desk157.png', 'desk964.png'),
(28, 'Escritorio', 'Escritorio498.png', 'Escritorio829.png'),
(29, 'confRoom', 'confRoom757.png', 'confRoom580.png'),
(30, 'conference', 'conference715.png', 'conference296.png'),
(31, 'emptyRoom', 'emptyRoom853.png', 'emptyRoom771.png'),
(32, 'hall', 'hall874.png', 'hall300.png'),
(33, 'fullRoom', 'fullRoom516.png', 'fullRoom786.png'),
(34, 'food', 'food319.png', 'food535.png'),
(35, 'event', 'event578.png', 'event591.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE `ofertas` (
  `idOferta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `totalOferta` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL DEFAULT current_timestamp(),
  `fechaFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`idOferta`, `idProducto`, `titulo`, `totalOferta`, `fechaInicio`, `fechaFinal`) VALUES
(2, 10, 'Oferta test', 10, '2020-03-02 14:49:39', '2020-03-02 14:49:39'),
(25, 35, 'Oferta video Sony', 10, '0000-00-00 00:00:00', '2020-04-15 10:00:00'),
(26, 14, 'Oferta Accesorio', 60, '2020-04-08 15:00:00', '2020-04-30 11:15:00');

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
(84, 'Cable HDMI', 81, 15, 'Cable HDMI 20\"', 'hdmiCableHP.PNG5edf14340ddc59.66137949.png', 1),
(85, 'Plancha Samsung', 80, 69, 'Plancha para la casa ', 'plancha.PNG5ee30006a59bb4.57023261.png', 0),
(86, 'Equipo de sonido', 80, 299, 'Equipo sony de sonido', 'equipo.PNG5ee3002bdb75b2.35288469.png', 0),
(87, 'bati', 80, 88, 'jlñjk', 'batidora.png5ee7baf305ed24.73198341.png', 1);

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
-- Estructura de tabla para la tabla `quienessomos`
--

DROP TABLE IF EXISTS `quienessomos`;
CREATE TABLE `quienessomos` (
  `idNosotros` int(11) NOT NULL,
  `SobreNosotros` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quienessomos`
--

INSERT INTO `quienessomos` (`idNosotros`, `SobreNosotros`) VALUES
(4, '<p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci ac auctor augue mauris. Mauris augue neque gravida in fermentum. Sit amet facilisis magna etiam tempor. Morbi tincidunt augue interdum velit euismod in pellentesque massa placerat. Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Orci phasellus egestas tellus rutrum. Molestie ac feugiat sed lectus. Tincidunt id aliquet risus feugiat in ante metus dictum at. Pretium lectus quam id leo in vitae turpis. Tellus id interdum velit laoreet id donec ultrices tincidunt. Turpis massa sed elementum tempus egestas sed sed risus. Diam phasellus vestibulum lorem sed. Velit aliquet sagittis id consectetur.</p>\r\n\r\n<hr />\r\n<p>Dictumst quisque sagittis purus sit amet. Nisl pretium fusce id velit ut tortor pretium viverra suspendisse. Quam vulputate dignissim suspendisse in est. Elementum nibh tellus molestie nunc non blandit massa. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Pharetra sit amet aliquam id diam maecenas. Eget nullam non nisi est sit amet. Facilisis leo vel fringilla est ullamcorper. Et egestas quis ipsum suspendisse ultrices. Leo a diam sollicitudin tempor. Quam vulputate dignissim suspendisse in est. Interdum velit euismod in pellentesque massa placerat. Sit amet porttitor eget dolor morbi non arcu risus. Pellentesque habitant morbi tristique senectus et netus et. Pellentesque massa placerat duis ultricies. Ac ut consequat semper viverra nam. Duis convallis convallis tellus id interdum. Neque viverra justo nec ultrices dui sapien eget mi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Facilisis sed odio morbi quis commodo odio aenean. Nunc id cursus metus aliquam eleifend mi in. Et sollicitudin ac orci phasellus egestas tellus rutrum. Sit amet dictum sit amet justo donec enim diam vulputate. Sem integer vitae justo eget magna fermentum iaculis eu. Amet commodo nulla facilisi nullam vehicula. Sit amet consectetur adipiscing elit pellentesque habitant morbi tristique. Ante metus dictum at tempor commodo ullamcorper. Nunc sed augue lacus viverra vitae. Vitae justo eget magna fermentum iaculis eu. Scelerisque purus semper eget duis. Faucibus vitae aliquet nec ullamcorper sit amet risus. Elit ut aliquam purus sit amet luctus. Adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `productoscompra`
--
ALTER TABLE `productoscompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quienessomos`
--
ALTER TABLE `quienessomos`
  ADD PRIMARY KEY (`idNosotros`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `comprafinalizada`
--
ALTER TABLE `comprafinalizada`
  MODIFY `compraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `idConcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contrareset`
--
ALTER TABLE `contrareset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `idGaleria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `productoscompra`
--
ALTER TABLE `productoscompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `quienessomos`
--
ALTER TABLE `quienessomos`
  MODIFY `idNosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprafinalizada`
--
ALTER TABLE `comprafinalizada`
  ADD CONSTRAINT `comprafinalizada_ibfk_1` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `comprafinalizada_ibfk_2` FOREIGN KEY (`productoId`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `comprafinalizada_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estados` (`idEstado`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
