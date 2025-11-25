-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2025 a las 23:52:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociados`
--

CREATE TABLE `asociados` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asociados`
--

INSERT INTO `asociados` (`ID`, `nombre`, `logo`, `descripcion`) VALUES
(2, '12edd3d4d4f4f3f4ff4f3fqfwffwfwfw', 'Captura de pantalla 2024-04-26 034810.jpg', 'primera descripción'),
(3, 'israel', 'players.png', 'esta bien funciona es la segunda vez'),
(4, '12edd3d4d4f4f3f4ff4f3fqfwffwfwfw', 'home.png', 'qwd'),
(5, '12edd3d4d4f4f3f4ff4f3fqfwffwfwfw', 'RacingCar.jpg', 'JUAN'),
(6, 'compi con AsociadosRepositori', 'Captura de pantalla 2024-04-26 034810.jpg', 'A ver como funciona con el repository que no me aco de enterar porque si funciona o porque no'),
(22, 'asdsac', 'Captura de pantalla 2024-04-26 034810.jpg', 'imagen a demasd d mas'),
(23, '12edd3d4d4f4f3f4ff4f3fqfwffwfwfw', 'Captura de pantalla 2024-04-26 034810.jpg', 'a ver que funciona con el getRepository'),
(24, '12edd3d4d4f4f3f4ff4f3fqfwffwfwfw', 'Captura de pantalla 2024-04-26 034810.jpg', '#FUNCTION'),
(25, '', '', ''),
(26, 'compi con AsociadosRepositori', 'Captura de pantalla 2024-04-26 034810.jpg', 'dqwedweq'),
(27, '12edd3d4d4f4f3f4ff4f3fqfwffwfwfw', 'Captura de pantalla 2024-04-26 034810.jpg', 'SIN FILES EXTRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numImagenes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `numImagenes`) VALUES
(1, 'categoría I', 17),
(2, 'categoría II', 16),
(3, 'categoría III', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposiciones`
--

CREATE TABLE `exposiciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `exposiciones`
--

INSERT INTO `exposiciones` (`id`, `nombre`, `descripcion`, `fechaInicio`, `fechaFin`, `activa`, `idUsuario`) VALUES
(1, 'israel', 'cqecew', '2025-11-30', '2025-11-30', 1, 10),
(2, 'compi con AsociadosRepositori', 'a ver si hay errore snada mas añadir que no me queda claro', '2025-11-23', '2025-11-30', 0, 10),
(3, 'compi con AsociadosRepositori', 'a ver si hay errore snada mas añadir que no me queda claro', '2025-11-23', '2025-11-30', 0, 10),
(4, 'compi con AsociadosRepositori', 'a ver si hay errore snada mas añadir que no me queda claro', '2025-11-23', '2025-11-30', 0, 10),
(5, 'SWQ', 'cdwc', '2025-11-30', '2025-12-02', 1, 10),
(6, 'a ver si funciona al añadir solo', 'ns que va a pasar', '2025-11-30', '2025-12-07', 0, 10),
(7, 'Aracelyu', 'la mejor exposicion', '2025-12-07', '2025-12-25', 1, 10),
(8, 'porfi funcioan ya', 'A ver que tal ahora que he hehco la query de buscar todo de golpe al añadir', '2025-11-30', '2026-01-16', 0, 10),
(9, 'compi con AsociadosRepositori', 'a ver que tal ahora por fi', '2025-11-23', '2025-12-07', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicionimagen`
--

CREATE TABLE `exposicionimagen` (
  `idImagen` int(11) NOT NULL,
  `idExposicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `exposicionimagen`
--

INSERT INTO `exposicionimagen` (`idImagen`, `idExposicion`) VALUES
(78, 1),
(78, 5),
(86, 8),
(89, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` int(11) NOT NULL DEFAULT 1,
  `numVisualizaciones` int(11) NOT NULL DEFAULT 0,
  `numLikes` int(11) NOT NULL DEFAULT 0,
  `numDownloads` int(11) NOT NULL DEFAULT 0,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `descripcion`, `categoria`, `numVisualizaciones`, `numLikes`, `numDownloads`, `idUsuario`) VALUES
(78, 'Captura de pantalla 2024-04-26 034810.jpg', 'a ver que pasa con filtro de user', 3, 0, 0, 0, 10),
(79, 'Captura de pantalla 2024-04-26 034810.jpg', 'a ver que pasa con filtro de user', 3, 0, 0, 0, 0),
(84, 'Captura de pantalla 2024-04-26 034810.jpg', 'desde juan PERO SOLO 1', 1, 0, 0, 0, 8),
(86, 'Captura de pantalla 2024-04-26 034810.jpg', 'cwecwed', 2, 0, 0, 0, 8),
(87, 'Captura de pantalla 2024-04-26 034810.jpg', 'QEWCWQECWEC', 3, 0, 0, 0, 8),
(88, 'chalet1.jpg', 'A ver que pasa con la img', 2, 0, 0, 0, 10),
(89, 'duplex1.jpeg', 'a ver que pasa', 1, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role`) VALUES
(1, 'israel ', '44764476', 'ROLE_USER'),
(2, 'Fran', 'franfran', 'ROLE_ANONYMOUS'),
(3, 'Fran', 'franfran', 'ROLE_ANONYMOUS'),
(4, 'Admin', 'israel7/12', 'ROLE_ADMIN'),
(6, 'israel registrado desde web ', '446', 'ROLE_USER'),
(7, 'israel registrado desde web en', '$2y$10$S2rRNFIIcclPrBDKLDACK.08LCc8pCqV9jRZS4xvhKBMOG7GyYXQG', 'ROLE_USER'),
(8, 'juan', '$2y$10$Zr6fSauI1LGA0TjT6FoDz.pawKyTvedoCOc9kky2RG17vr4dIqnjm', 'ROLE_ADMIN'),
(9, 'admin', '$2y$10$LI2AaKsuVvIN0LrHE7/Vn.qHZ8C6F.sgAaMKgXoEuUpDxKcMHo.6e', 'ROLE_ADMIN'),
(10, 'ari', '$2y$10$sf0iH825kaMzCWdp5t5duucbEdZ4RxcsY.JjI7wSfZKMP2lOS8ksC', 'ROLE_ADMIN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociados`
--
ALTER TABLE `asociados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exposiciones`
--
ALTER TABLE `exposiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exposicionimagen`
--
ALTER TABLE `exposicionimagen`
  ADD PRIMARY KEY (`idImagen`,`idExposicion`),
  ADD KEY `fk_expoimg_exposicion` (`idExposicion`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociados`
--
ALTER TABLE `asociados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exposiciones`
--
ALTER TABLE `exposiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `exposicionimagen`
--
ALTER TABLE `exposicionimagen`
  ADD CONSTRAINT `fk_expoimg_exposicion` FOREIGN KEY (`idExposicion`) REFERENCES `exposiciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_expoimg_imagen` FOREIGN KEY (`idImagen`) REFERENCES `imagenes` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
