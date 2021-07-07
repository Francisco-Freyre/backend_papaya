-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2021 a las 16:28:30
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papaya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE `alergias` (
  `id` int(11) NOT NULL,
  `alimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aporte_nutricional`
--

CREATE TABLE `aporte_nutricional` (
  `id` int(11) NOT NULL,
  `platillo_id` int(11) NOT NULL,
  `energia` varchar(255) NOT NULL,
  `proteinas` varchar(255) NOT NULL,
  `carbohidratos` varchar(255) NOT NULL,
  `grasas` varchar(255) NOT NULL,
  `sodio` varchar(255) NOT NULL,
  `potasio` varchar(255) NOT NULL,
  `calcio` varchar(255) NOT NULL,
  `hierro` varchar(255) NOT NULL,
  `vitamina_a` varchar(255) NOT NULL,
  `vitamina_e` varchar(255) NOT NULL,
  `vitamina_d` varchar(255) NOT NULL,
  `vitamina_c` varchar(255) NOT NULL,
  `acido_folico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas`
--

CREATE TABLE `dietas` (
  `id` int(10) NOT NULL,
  `d_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `d_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `d_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `d_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `d_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `d_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `c_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `c_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `c_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `c_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `c_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `c_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `co_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `co_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `co_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `co_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `co_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `co_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `id_medico` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `kcal` double(10,2) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `tiem_alimen` int(12) NOT NULL,
  `periodo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c3_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `c3_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `c3_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `c3_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `c3_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `c3_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `gr_car` double(10,2) NOT NULL,
  `gr_pro` double(10,2) NOT NULL,
  `gr_gra` double(10,2) NOT NULL,
  `por_car` double(10,2) NOT NULL,
  `por_pro` double(10,2) NOT NULL,
  `por_gra` double(10,2) NOT NULL,
  `d_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `c_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `c3_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `co_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `c2_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `ce_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `c4_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `fibra` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excluido`
--

CREATE TABLE `excluido` (
  `id` int(11) NOT NULL,
  `alimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios`
--

CREATE TABLE `formularios` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `altura` float(10,2) NOT NULL,
  `peso` float(10,2) NOT NULL,
  `meta` varchar(100) NOT NULL,
  `actividad_fisica` varchar(100) NOT NULL,
  `vasos_bebidas` varchar(100) NOT NULL,
  `comida_grande` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `platillo_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesos`
--

CREATE TABLE `pesos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos`
--

CREATE TABLE `platillos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `procedimiento` text NOT NULL,
  `tiempo_elaboracion` varchar(30) NOT NULL,
  `energia` varchar(50) NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_token`
--

CREATE TABLE `usuarios_token` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aporte_nutricional`
--
ALTER TABLE `aporte_nutricional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platillo_id` (`platillo_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `excluido`
--
ALTER TABLE `excluido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platillo_id` (`platillo_id`);

--
-- Indices de la tabla `pesos`
--
ALTER TABLE `pesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `platillos`
--
ALTER TABLE `platillos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_token`
--
ALTER TABLE `usuarios_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alergias`
--
ALTER TABLE `alergias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aporte_nutricional`
--
ALTER TABLE `aporte_nutricional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dietas`
--
ALTER TABLE `dietas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `excluido`
--
ALTER TABLE `excluido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pesos`
--
ALTER TABLE `pesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platillos`
--
ALTER TABLE `platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_token`
--
ALTER TABLE `usuarios_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aporte_nutricional`
--
ALTER TABLE `aporte_nutricional`
  ADD CONSTRAINT `aporte_nutricional_ibfk_1` FOREIGN KEY (`platillo_id`) REFERENCES `platillos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD CONSTRAINT `formularios_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`platillo_id`) REFERENCES `platillos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pesos`
--
ALTER TABLE `pesos`
  ADD CONSTRAINT `pesos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
