-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2022 a las 17:41:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

--
-- Base de datos: `registro_propuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canceladas`
--

CREATE TABLE `canceladas` (
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `producto` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `comprador` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `inventario` (
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `producto` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `comprador` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `propuestas` (
  `empresa` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `ide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ide`);

ALTER TABLE `propuestas`
  ADD PRIMARY KEY (`ide`);


