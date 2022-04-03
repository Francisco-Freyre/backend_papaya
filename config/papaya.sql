-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 03-04-2022 a las 19:41:08
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

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
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id`, `categoria_id`, `nombre`, `unidad`, `cantidad`) VALUES
(1, 1, 'Fresa', 'pieza', 17),
(2, 1, 'Mango', 'pieza', 1),
(3, 2, 'Chayoteas', 'gr', 213);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculo_calorico`
--

CREATE TABLE `calculo_calorico` (
  `id` int(10) NOT NULL,
  `id_medico` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `cer_tub_cg` double(10,2) NOT NULL,
  `cer_tub_sg` double(10,2) NOT NULL,
  `leguminosas` double(10,2) NOT NULL,
  `frutas` double(10,2) NOT NULL,
  `verduras` double(10,2) NOT NULL,
  `poa_muy_bajo` double(10,2) NOT NULL,
  `poa_bajo` double(10,2) NOT NULL,
  `poa_mod` double(10,2) NOT NULL,
  `poa_alto` double(10,2) NOT NULL,
  `lec_entera` double(10,2) NOT NULL,
  `lec_semi` double(10,2) NOT NULL,
  `lec_desc` double(10,2) NOT NULL,
  `lec_azuc` double(10,2) NOT NULL,
  `gra_s_pro` double(10,2) NOT NULL,
  `gra_c_pro` double(10,2) NOT NULL,
  `azu_s_gra` double(10,2) NOT NULL,
  `azu_c_gra` double(10,2) NOT NULL,
  `ali_lib` double(10,2) NOT NULL,
  `beb_alco` double(10,2) NOT NULL,
  `id_revision` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_alimentos`
--

CREATE TABLE `categorias_alimentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `kcal` float NOT NULL,
  `carbohidratos` float NOT NULL,
  `proteinas` float NOT NULL,
  `lipidos` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_alimentos`
--

INSERT INTO `categorias_alimentos` (`id`, `nombre`, `kcal`, `carbohidratos`, `proteinas`, `lipidos`) VALUES
(1, 'Frutas', 60, 15, 0, 0),
(2, 'Verduras', 24, 4, 2, 0),
(3, 'Leguminosas', 121, 20, 8, 1),
(4, 'Cereales y Tuberculos c/g', 113, 15, 2, 5),
(5, 'Cereales y tuberculos s/g', 68, 15, 2, 0),
(6, 'POA Muy Bajos en Grasa', 37, 0, 7, 1),
(7, 'POA Bajos en Grasa', 55, 0, 7, 3),
(8, 'POA Moderado en Grasa', 73, 0, 7, 5),
(9, 'POA Alto en Grasa', 100, 0, 7, 8),
(10, 'Leche entera', 156, 12, 9, 8),
(11, 'Leche Semidescremada', 120, 12, 9, 4),
(12, 'Leche descremada', 102, 12, 9, 2),
(13, 'Leche con azucar', 197, 30, 8, 5),
(14, 'Grasa sin proteina', 45, 0, 0, 5),
(15, 'Grasa con proteina', 69, 3, 3, 5),
(16, 'Azucares sin grasa', 40, 10, 0, 0),
(17, 'Azucares con grasa', 85, 10, 0, 0),
(18, 'Alimentos Libres de energia', 0, 0, 0, 0),
(19, 'Bebidas alcoholicas', 1, 140, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `check_dia`
--

CREATE TABLE `check_dia` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `check1` int(1) NOT NULL,
  `check2` int(1) NOT NULL,
  `check3` int(1) NOT NULL,
  `check4` int(1) NOT NULL,
  `check5` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `check_dia`
--

INSERT INTO `check_dia` (`id`, `cliente_id`, `fecha`, `check1`, `check2`, `check3`, `check4`, `check5`) VALUES
(17, 1, '2022-03-15', 0, 0, 0, 0, 0),
(18, 2, '2022-03-15', 1, 0, 0, 0, 0),
(19, 3, '2022-03-18', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `estado`, `edad`, `sexo`, `email`, `password`, `url_img`) VALUES
(1, 'francisco', 'freyre', 'Durango', 26, 'Hombre', 'algo@algo.com', 'asda', ''),
(2, 'Laurita', 'Garza', 'Durango', 22, 'Mujer', 'algo@algodon.com', '123425323', ''),
(3, 'Karina', 'Mireles', 'Durango', 27, 'Mujer', 'algo@pos.com', '2132l´s1s1s11ss1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id`, `cliente_id`, `fecha`, `dia`) VALUES
(105, 1, '2022-03-15', 'd1'),
(106, 1, '2022-03-16', 'd2'),
(107, 1, '2022-03-17', 'd3'),
(108, 1, '2022-03-18', 'd4'),
(109, 1, '2022-03-19', 'd5'),
(110, 1, '2022-03-21', 'd6'),
(111, 1, '2022-03-22', 'd7'),
(112, 1, '2022-03-23', 'd8'),
(113, 1, '2022-03-24', 'd9'),
(114, 1, '2022-03-25', 'd10'),
(115, 1, '2022-03-26', 'd11'),
(116, 1, '2022-03-28', 'd12'),
(117, 2, '2022-03-15', 'd1'),
(118, 2, '2022-03-16', 'd2'),
(119, 2, '2022-03-17', 'd3'),
(120, 2, '2022-03-18', 'd4'),
(121, 2, '2022-03-19', 'd5'),
(122, 2, '2022-03-21', 'd6'),
(123, 2, '2022-03-22', 'd7'),
(124, 2, '2022-03-23', 'd8'),
(125, 2, '2022-03-24', 'd9'),
(126, 2, '2022-03-25', 'd10'),
(127, 2, '2022-03-26', 'd11'),
(128, 2, '2022-03-28', 'd12'),
(129, 3, '2022-03-15', 'd1'),
(130, 3, '2022-03-16', 'd2'),
(131, 3, '2022-03-17', 'd3'),
(132, 3, '2022-03-18', 'd4'),
(133, 3, '2022-03-19', 'd5'),
(134, 3, '2022-03-21', 'd6'),
(135, 3, '2022-03-22', 'd7'),
(136, 3, '2022-03-23', 'd8'),
(137, 3, '2022-03-24', 'd9'),
(138, 3, '2022-03-25', 'd10'),
(139, 3, '2022-03-26', 'd11'),
(140, 3, '2022-03-28', 'd12');

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
-- Estructura de tabla para la tabla `dos_semanas`
--

CREATE TABLE `dos_semanas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `d5` int(11) NOT NULL,
  `d6` int(11) NOT NULL,
  `d7` int(11) NOT NULL,
  `d8` int(11) NOT NULL,
  `d9` int(11) NOT NULL,
  `d10` int(11) NOT NULL,
  `d11` int(11) NOT NULL,
  `d12` int(11) NOT NULL,
  `dia_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dos_semanas`
--

INSERT INTO `dos_semanas` (`id`, `cliente_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `dia_final`) VALUES
(60, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-28'),
(61, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-28'),
(62, 3, 1, 0, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excluido`
--

CREATE TABLE `excluido` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
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
  `alcohol` varchar(100) NOT NULL,
  `apetito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formularios`
--

INSERT INTO `formularios` (`id`, `id_cliente`, `altura`, `peso`, `meta`, `actividad_fisica`, `alcohol`, `apetito`) VALUES
(1, 1, 1.82, 65.00, '85', 'Intensa', 'No', '0.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_result`
--

CREATE TABLE `form_result` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `kcal` int(11) NOT NULL,
  `dieta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `form_result`
--

INSERT INTO `form_result` (`id`, `cliente_id`, `kcal`, `dieta_id`) VALUES
(1, 1, 2010, 1);

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
-- Estructura de tabla para la tabla `ingredientes2`
--

CREATE TABLE `ingredientes2` (
  `id` int(11) NOT NULL,
  `platillo_id` int(11) NOT NULL,
  `alimento_id` int(11) NOT NULL,
  `equivalente` double NOT NULL,
  `cambiar` int(1) NOT NULL,
  `energia` float NOT NULL,
  `carbohidratos` float NOT NULL,
  `proteina` float NOT NULL,
  `lipidos` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_platillos`
--

CREATE TABLE `ingredientes_platillos` (
  `id` int(11) NOT NULL,
  `ingredientes_id` int(11) NOT NULL,
  `platillo_id` int(11) NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Volcado de datos para la tabla `pesos`
--

INSERT INTO `pesos` (`id`, `id_cliente`, `peso`, `tipo`, `fecha`) VALUES
(3, 1, '110.00', 'inicial', '2022-02-02'),
(4, 1, '105.00', 'continuo', '2022-02-16'),
(5, 1, '100.00', 'continuo', '2022-03-02'),
(7, 2, '100.00', 'inicial', '2022-02-17'),
(8, 2, '98.00', 'continuo', '2022-03-03'),
(12, 2, '95.00', 'continuo', '2022-03-17'),
(13, 3, '130.00', 'inicial', '2022-01-17'),
(14, 3, '125.00', 'continuo', '2022-02-03'),
(15, 3, '120.00', 'continuo', '2022-02-17'),
(16, 1, '95.00', 'continuo', '2022-03-16'),
(17, 1, '85.00', 'meta', '2022-02-02'),
(18, 2, '60.00', 'meta', '2022-02-17'),
(19, 1, '90.00', 'continuo', '2022-03-30'),
(20, 1, '90.00', 'continuo', '2022-03-30'),
(21, 1, '85.00', 'continuo', '2022-03-30'),
(22, 1, '80.00', 'continuo', '2022-03-30'),
(23, 1, '80.00', 'continuo', '2022-03-30'),
(24, 1, '75.00', 'continuo', '2022-03-30'),
(25, 1, '70.00', 'continuo', '2022-03-30'),
(26, 1, '65.00', 'continuo', '2022-03-30');

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
  `proteina` varchar(255) NOT NULL,
  `carbohidratos` varchar(255) NOT NULL,
  `grasas` varchar(255) NOT NULL,
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
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `calculo_calorico`
--
ALTER TABLE `calculo_calorico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `check_dia`
--
ALTER TABLE `check_dia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dos_semanas`
--
ALTER TABLE `dos_semanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `cliente_id_2` (`cliente_id`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
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
-- Indices de la tabla `form_result`
--
ALTER TABLE `form_result`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `platillo_id` (`platillo_id`);

--
-- Indices de la tabla `ingredientes2`
--
ALTER TABLE `ingredientes2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes_platillos`
--
ALTER TABLE `ingredientes_platillos`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

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
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `calculo_calorico`
--
ALTER TABLE `calculo_calorico`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `check_dia`
--
ALTER TABLE `check_dia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `dietas`
--
ALTER TABLE `dietas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dos_semanas`
--
ALTER TABLE `dos_semanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `excluido`
--
ALTER TABLE `excluido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `form_result`
--
ALTER TABLE `form_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes2`
--
ALTER TABLE `ingredientes2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes_platillos`
--
ALTER TABLE `ingredientes_platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pesos`
--
ALTER TABLE `pesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
