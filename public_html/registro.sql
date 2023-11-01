-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2022 a las 17:41:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `claves` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `experiencia` varchar(500) CHARACTER SET utf8 NOT NULL,
  `imagen` longblob NOT NULL,
  `identificacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cont_mensajes` int(11) DEFAULT 0,
  `mensajes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `persona_aux` (
  `nombres` varchar(50) NOT NULL,
  `claves` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `persona_comprador` (
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `claves` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notas` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `compras` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `cont_mensajes` int(11) DEFAULT 0,
  `mensajes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `proveedor_aux` (
  `nombres` varchar(50) NOT NULL,
  `claves` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `comprador_aux` (
  `nombres` varchar(50) NOT NULL,
  `claves` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `claves_aux` (
  `nombres` varchar(50) NOT NULL,
  `claves` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


