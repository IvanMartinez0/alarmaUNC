-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2023 a las 16:07:33
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
-- Base de datos: `alarmaunc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoridad`
--

CREATE TABLE `autoridad` (
  `id_autoridad` int(11) NOT NULL,
  `nombre_autoridad` varchar(30) NOT NULL,
  `descrip_autoridad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autoridad`
--

INSERT INTO `autoridad` (`id_autoridad`, `nombre_autoridad`, `descrip_autoridad`) VALUES
(1, 'Nivel estudiante', 'Nivel mas bajo, solo recibe notificaciones'),
(2, 'Nivel Profesor', 'Nivel intermedio, recibe notificaciones y puede reportar emergencias'),
(3, 'Nivel administrador', 'Nivel mas alto, recibe notificaciones, puede reportar emergencias y puede apagar alarmas de emergencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bdunc`
--

CREATE TABLE `bdunc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bdunc`
--

INSERT INTO `bdunc` (`id`, `nombre`, `apellido`, `dni`) VALUES
(1, 'ivan', 'martinez', '45932126'),
(2, 'sebastian', 'juarez', '462312432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `numero_contacto` varchar(30) NOT NULL,
  `info_contacto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `numero_contacto`, `info_contacto`) VALUES
(1, '12345678', 'Bomberos UNC'),
(2, '23456789', 'Seguridad UNC'),
(3, '01234567', 'Ecco emergencia'),
(4, '911', 'Policia y bomberos de cordoba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_doc` int(11) NOT NULL,
  `tipo_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_doc`, `tipo_doc`) VALUES
(1, 'Documento nacional de identidad'),
(2, 'Extranjero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `id_edif` int(11) NOT NULL,
  `nombre_edif` varchar(30) NOT NULL,
  `descrip_edif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergencia`
--

CREATE TABLE `emergencia` (
  `id_emerg` int(11) NOT NULL,
  `nombre_emerg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_his` int(11) NOT NULL,
  `razon_his` int(11) NOT NULL,
  `usuarioinicia_his` int(11) NOT NULL,
  `usuarioapaga_his` int(11) NOT NULL,
  `iniciohora_his` date NOT NULL,
  `apagahora_his` date NOT NULL,
  `edificio_his` int(11) NOT NULL,
  `descrip_his` text NOT NULL,
  `conracto_his` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` int(11) NOT NULL,
  `nombre_us` varchar(30) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `dni_us` varchar(30) NOT NULL,
  `numero_us` varchar(30) NOT NULL,
  `correo_us` varchar(30) NOT NULL,
  `autoridad_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autoridad`
--
ALTER TABLE `autoridad`
  ADD PRIMARY KEY (`id_autoridad`);

--
-- Indices de la tabla `bdunc`
--
ALTER TABLE `bdunc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`id_edif`);

--
-- Indices de la tabla `emergencia`
--
ALTER TABLE `emergencia`
  ADD PRIMARY KEY (`id_emerg`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_his`),
  ADD KEY `razon_emerg` (`razon_his`),
  ADD KEY `us_inicio_his` (`usuarioinicia_his`),
  ADD KEY `us_apaga_his` (`usuarioapaga_his`),
  ADD KEY `edificio_his` (`edificio_his`),
  ADD KEY `conracto_his` (`conracto_his`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`),
  ADD KEY `autoridad_us` (`autoridad_us`),
  ADD KEY `id_doc` (`id_doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autoridad`
--
ALTER TABLE `autoridad`
  MODIFY `id_autoridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bdunc`
--
ALTER TABLE `bdunc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emergencia`
--
ALTER TABLE `emergencia`
  MODIFY `id_emerg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_his` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`edificio_his`) REFERENCES `edificio` (`id_edif`),
  ADD CONSTRAINT `historial_ibfk_4` FOREIGN KEY (`razon_his`) REFERENCES `emergencia` (`id_emerg`),
  ADD CONSTRAINT `historial_ibfk_5` FOREIGN KEY (`usuarioapaga_his`) REFERENCES `usuario` (`id_us`),
  ADD CONSTRAINT `historial_ibfk_6` FOREIGN KEY (`usuarioinicia_his`) REFERENCES `usuario` (`id_us`),
  ADD CONSTRAINT `historial_ibfk_7` FOREIGN KEY (`conracto_his`) REFERENCES `contacto` (`id_contacto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`autoridad_us`) REFERENCES `autoridad` (`id_autoridad`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_doc`) REFERENCES `documento` (`id_doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
