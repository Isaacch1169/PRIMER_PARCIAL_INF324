-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 18:12:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdisaac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `id` int(11) NOT NULL,
  `cod_cat` varchar(20) NOT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `superficie` float DEFAULT NULL,
  `tipo_propiedad` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `tipo_impuesto` varchar(10) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `cod_cat`, `distrito`, `zona`, `superficie`, `tipo_propiedad`, `fecha_registro`, `tipo_impuesto`, `ci`) VALUES
(3, '2000', '8', 'Larecaja', 45, 'industrial', '2024-10-22', 'medio', 10076213),
(5, '3000', '15', 'Los Alamos', 124, 'Industrial', '2018-05-23', 'Bajo', 10076213),
(6, '1006', '4', 'Tupac Katari', 125, 'Comercial', '2024-10-11', 'Alto', 71281407),
(7, '1005', '5', '41', 24, 'Residencial', '2024-10-12', 'Alto', 0),
(10, '2002', 'Distrito 5', 'Faro Murillo', 23, 'Residencial', '2021-01-28', 'Medio', 111111),
(15, '3003', 'Distrito 6', 'Belén', 54, 'Industrial', '2022-06-24', 'Bajo', 111111),
(18, '3004', 'Distrito 3', 'Adela Samudio', 35, 'Comercial', '2024-11-02', 'Bajo', 33333),
(22, '20034', '13', 'Tacahira', 35, 'Residencial', '2024-10-31', 'Medio', 4249187),
(24, '20067', 'Distrito 7', 'Gran Poder', 24, 'Residencial', '2023-10-11', 'Medio', 10076213),
(100, '1034', 'Distrito 8', 'Callampaya', 13, 'Residencial', '2024-10-31', 'Alto', 4249187);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `idD` int(11) NOT NULL,
  `nombreD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`idD`, `nombreD`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5'),
(6, 'Distrito 6'),
(7, 'Distrito 7'),
(8, 'Distrito 8'),
(9, 'Distrito 9'),
(10, 'Distrito 10'),
(11, 'Distrito 11'),
(12, 'Distrito 12'),
(13, 'Distrito 13'),
(14, 'Distrito 14'),
(15, 'Distrito 15'),
(16, 'Distrito 16'),
(17, 'Distrito 17'),
(18, 'Distrito 18'),
(19, 'Distrito 19'),
(20, 'Distrito 20'),
(21, 'Distrito 21'),
(22, 'Distrito 22'),
(23, 'Distrito 23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `paterno` varchar(20) DEFAULT NULL,
  `materno` varchar(20) DEFAULT NULL,
  `contrasenia` varchar(30) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`, `contrasenia`, `id_rol`) VALUES
(4249187, 'Luis', 'Ramos', 'Bautista', 'luisito', 2),
(10076212, 'Isaac', 'Choque', 'Yujra', '123456', 1),
(10076213, 'David', 'Yujra', 'Ramos', '123456', 2),
(71281407, 'Abigail', 'Chasqui', 'Inda', '123456', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre_rol`) VALUES
(1, 'funcionario'),
(2, 'duenio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `idZ` int(11) NOT NULL,
  `nombreZ` varchar(100) NOT NULL,
  `idD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZ`, `nombreZ`, `idD`) VALUES
(1, 'El Rosario', 1),
(2, 'Central Casco Viejo', 1),
(3, 'Santa Bárbara', 1),
(4, '4Univ. Cancha Zapata', 1),
(5, 'San Jorge', 1),
(6, 'San Sebastián', 1),
(7, 'Alto Miraflores', 2),
(8, 'Miraflores', 2),
(9, 'Tte. Edmundo Andrade', 2),
(10, 'Prol. Víctor Eduardo', 2),
(11, 'Soqueri', 2),
(12, 'Santa Fe de Miraflores', 2),
(13, 'Sopocachi', 3),
(14, 'Adela Samudio', 3),
(15, '8 De Diciembre', 3),
(16, 'Jinchupalla', 3),
(17, 'Kantutani', 3),
(18, 'Cristo Rey', 3),
(19, 'San Luís', 3),
(20, 'Inmaculada Concepción', 3),
(21, 'Llojeta', 4),
(22, 'Tiwiña Tres Marías', 4),
(23, 'Calamarca', 4),
(24, 'Pasankeri', 4),
(25, 'Ernesto Torrez', 4),
(26, 'San Martín', 4),
(27, 'Las Lomas', 4),
(28, 'Obispo Bosque', 4),
(29, 'Nieves', 4),
(30, 'Tembladerani', 4),
(31, 'Mari Auxiliadora', 4),
(32, 'Jukumarini', 4),
(33, 'San Miguel Los Pinos', 4),
(34, 'Faro Murillo', 5),
(35, 'San Juan Cotahuma', 5),
(36, 'San Juan Alto Tembladerani', 5),
(37, 'Cotahuma', 5),
(38, 'Tupac Amaru', 5),
(39, 'Tacagua', 5),
(40, 'Tejada', 5),
(41, 'Calvario', 5),
(42, 'Villamil de Rada', 5),
(43, 'Villa Nuevo Potosí', 5),
(44, 'San Pedro', 6),
(45, 'Belén', 6),
(46, 'Juan XXIII', 6),
(47, 'Bello Horizonte', 6),
(48, 'El Carmen', 6),
(49, 'Vivienda Obrera', 6),
(50, 'Olimpic', 6),
(51, 'Gran Poder', 7),
(52, 'Los Andes', 7),
(53, '14 de Septiembre', 7),
(54, 'Obispo Indaburo', 7),
(55, '23 de Marzo', 7),
(56, 'Chamoco Chico', 7),
(57, 'Barrio Lindo', 7),
(58, 'Callampaya', 8),
(59, 'Villa Victoria', 8),
(60, 'El Tejar', 8),
(61, 'Mariscal Santa Cruz', 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`idD`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZ`),
  ADD KEY `idD` (`idD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catastro`
--
ALTER TABLE `catastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `idZ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`idD`) REFERENCES `distrito` (`idD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
