-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 03:09:10
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
-- Base de datos: `tiendaonline`
--
CREATE DATABASE IF NOT EXISTS `tiendaonline` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `tiendaonline`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `brandId` int(11) NOT NULL,
  `brandTitle` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`brandId`, `brandTitle`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Huaweii'),
(4, 'Apple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `ipAddress` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `prodTitle` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `prodImage` text COLLATE utf8_spanish2_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catTitle` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`catId`, `catTitle`) VALUES
(1, 'Electrónicos'),
(2, 'Electrodomésticos'),
(3, 'Celulares'),
(4, 'Televisores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productCat` int(100) NOT NULL,
  `productBrand` int(100) NOT NULL,
  `productTitle` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `productPrice` int(100) NOT NULL,
  `productDes` text COLLATE utf8_spanish2_ci NOT NULL,
  `productImage` text COLLATE utf8_spanish2_ci NOT NULL,
  `productKeywords` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`productId`, `productCat`, `productBrand`, `productTitle`, `productPrice`, `productDes`, `productImage`, `productKeywords`) VALUES
(1, 1, 3, 'Radio', 50, 'Radio de sala', 'radio.png', 'audio, cultura, entretenimiento'),
(2, 4, 4, 'Televisor HD', 599, 'Televisor HD 50\", Full HD, 4k, 2 USB', 'televisor.png', 'Entretenimiento, HD, 4K'),
(3, 3, 1, 'Plancha', 79, 'Plancha Black & Decker', 'plancha.png', 'Hogar, Oficio'),
(4, 2, 1, 'Licuadora', 87, 'Licuadora de 9 niveles de potencia', 'licuadora.png', 'licuadoras, batidoras, refrescos, batidos'),
(5, 4, 1, 'Reproductor BluRay', 159, 'Reproductor Blu Ray, Full HD', 'bluray.png', 'bluray, reproductor, familiar'),
(6, 4, 4, 'Equipo de Sonido', 199, 'Equipo sonido audio full', 'equipo.png', 'sonido, audio, musica'),
(7, 4, 2, 'Cocina', 699, 'Cocina 4 discos, horno', 'cocina.png', 'cocina, casa, electrodomesticos'),
(8, 1, 2, 'Horno', 49, 'Horno pequeño para hornear', 'horno.png', 'horno, cocina, hornear.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mobile` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandId`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indices de la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user_info`
--
ALTER TABLE `user_info`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
