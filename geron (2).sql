-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2023 a las 11:04:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geron`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `usuario` char(11) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `usuario`, `contraseña`) VALUES
(1, 'admin', 'cinco4321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Psicologo'),
(4, 'fisioterapeuta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_Cita` int(11) NOT NULL,
  `nombre_pa` varchar(30) NOT NULL,
  `apellidos_pa` varchar(30) NOT NULL,
  `dia_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `id_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Correo` char(50) NOT NULL,
  `Teléfono` varchar(15) NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Fecha_nac` date NOT NULL,
  `Pers_contact` varchar(100) NOT NULL,
  `tel_contac` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `Nombre`, `Apellidos`, `Correo`, `Teléfono`, `Domicilio`, `Fecha_nac`, `Pers_contact`, `tel_contac`) VALUES
(69, 'Rocio', 'Cruz', 'cruzpenarocio0105@gmail.com', '7752148497', 'el calvario ', '1968-07-05', 'Alicia Peña Martinez', '7721267345'),
(74, 'Lucia', 'Sánchez Hernández', 'Lucia@gmail.com', '7712345678', 'Panales', '1950-08-10', 'Andrea Hernández Cruz', '7724567890'),
(76, 'Maria', 'Ortiz López ', 'maria@gmail.com', '7721567890', 'San Nicolás ', '1965-08-11', 'Liliana Martínez Cruz', '7721599045'),
(81, 'Catalina ', 'Mata Corona', 'catalina@gmail.com', '7725678056', 'Cerritos', '1916-07-07', 'Eric Herreros Ramos', '7714326789'),
(82, 'Bernardino ', 'Camacho Castellano', 'Berna@gmail.com', '7724567843', 'San antonio', '1961-12-07', 'Emiliano Peiro Ortiz ', '7712314980'),
(106, 'Arturo', 'Cruz Peña', 'atun@gmail.com', '7721294932', 'el calvario ', '1962-07-12', 'Alicia Peña Martinez', '7721139780'),
(107, 'Luis', 'Olvera Grande', 'olvera@gmail.com', '7721366745', 'Panales', '1961-07-05', 'Rocio Cruz Peña', '7721294932');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_salud`
--

CREATE TABLE `personal_salud` (
  `id_per` int(11) NOT NULL,
  `Nombre_Sa` varchar(100) NOT NULL,
  `id_ser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal_salud`
--

INSERT INTO `personal_salud` (`id_per`, `Nombre_Sa`, `id_ser`) VALUES
(1, 'Psicólogo ', 6),
(2, 'Medico', 4),
(3, 'Fisioterapeuta', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertaller`
--

CREATE TABLE `pertaller` (
  `tallerPa` int(30) NOT NULL,
  `nombre_ta` varchar(1000) DEFAULT NULL,
  `id_taller` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pertaller`
--

INSERT INTO `pertaller` (`tallerPa`, `nombre_ta`, `id_taller`, `id_paciente`) VALUES
(4, 'Cocina', 3, 74),
(49, 'Papel nono', 1, 82),
(59, 'Danza', 2, 69),
(60, 'Cocina', 3, 69),
(75, 'Danza', 2, 107),
(77, 'Papel nono', 1, 106),
(79, 'Cocina', 3, 106);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `nombre_re` varchar(30) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `nombre_re`, `fecha`, `hora`, `id_admin`) VALUES
(1, 'pacientes', '2023-11-05', '05:22:49', 1),
(5, 'pacientes', '2023-11-04', '22:30:46', 1),
(6, 'talleres', '2023-11-04', '23:24:53', 1),
(7, 'talleres', '2023-11-04', '23:25:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rep_citas`
--

CREATE TABLE `rep_citas` (
  `rep_citas` int(11) NOT NULL,
  `id_reporte` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rep_paciente`
--

CREATE TABLE `rep_paciente` (
  `rep_paciente` int(11) NOT NULL,
  `id_reporte` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rep_taller`
--

CREATE TABLE `rep_taller` (
  `re_taller` int(11) NOT NULL,
  `id_reporte` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_ser` int(11) NOT NULL,
  `nom_ser` varchar(50) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_ser`, `nom_ser`, `id_paciente`) VALUES
(4, 'Medico', NULL),
(5, 'Fisioterapia', NULL),
(6, 'Psicologia', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `nombre_ta` varchar(30) NOT NULL,
  `dias_taller` varchar(30) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_taller`, `nombre_ta`, `dias_taller`, `id_paciente`) VALUES
(1, 'Papel nono', 'Lunes y Miércoles ', NULL),
(2, 'Danza', 'Martes y Viernes', NULL),
(3, 'Cocina', 'Jueves', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(30) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `id_cargo` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contraseña`, `id_cargo`) VALUES
(5, 'Administrador', 'admin', 'cinco4321', 1),
(6, 'Medico', 'medico', '5cuatro321', 2),
(7, 'Psicologo', 'psicologia', '5cuatro321', 3),
(8, 'fisioterapeuta', 'fisioterapia', '5cuatro321', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_Cita`),
  ADD UNIQUE KEY `id_per` (`id_per`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `personal_salud`
--
ALTER TABLE `personal_salud`
  ADD PRIMARY KEY (`id_per`),
  ADD UNIQUE KEY `id_ser` (`id_ser`);

--
-- Indices de la tabla `pertaller`
--
ALTER TABLE `pertaller`
  ADD PRIMARY KEY (`tallerPa`),
  ADD KEY `nombre_ta` (`nombre_ta`(768)),
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE,
  ADD KEY `id_taller_2` (`id_taller`) USING BTREE;

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_admin` (`id_admin`) USING BTREE;

--
-- Indices de la tabla `rep_citas`
--
ALTER TABLE `rep_citas`
  ADD PRIMARY KEY (`rep_citas`),
  ADD UNIQUE KEY `id_reporte` (`id_reporte`),
  ADD UNIQUE KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `rep_paciente`
--
ALTER TABLE `rep_paciente`
  ADD PRIMARY KEY (`rep_paciente`),
  ADD UNIQUE KEY `id_reporte` (`id_reporte`),
  ADD UNIQUE KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `rep_taller`
--
ALTER TABLE `rep_taller`
  ADD PRIMARY KEY (`re_taller`),
  ADD UNIQUE KEY `id_reporte` (`id_reporte`),
  ADD UNIQUE KEY `id_taller` (`id_taller`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_ser`),
  ADD UNIQUE KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`),
  ADD UNIQUE KEY `nombre_ta` (`nombre_ta`),
  ADD UNIQUE KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_Cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `personal_salud`
--
ALTER TABLE `personal_salud`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pertaller`
--
ALTER TABLE `pertaller`
  MODIFY `tallerPa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rep_citas`
--
ALTER TABLE `rep_citas`
  MODIFY `rep_citas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rep_paciente`
--
ALTER TABLE `rep_paciente`
  MODIFY `rep_paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rep_taller`
--
ALTER TABLE `rep_taller`
  MODIFY `re_taller` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_ser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personal_salud` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_salud`
--
ALTER TABLE `personal_salud`
  ADD CONSTRAINT `personal_salud_ibfk_1` FOREIGN KEY (`id_ser`) REFERENCES `servicio` (`id_ser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pertaller`
--
ALTER TABLE `pertaller`
  ADD CONSTRAINT `pertaller_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertaller_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertaller_ibfk_3` FOREIGN KEY (`nombre_ta`) REFERENCES `taller` (`nombre_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rep_citas`
--
ALTER TABLE `rep_citas`
  ADD CONSTRAINT `rep_citas_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_Cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_citas_ibfk_2` FOREIGN KEY (`id_reporte`) REFERENCES `reportes` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rep_paciente`
--
ALTER TABLE `rep_paciente`
  ADD CONSTRAINT `rep_paciente_ibfk_1` FOREIGN KEY (`id_reporte`) REFERENCES `reportes` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_paciente_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rep_taller`
--
ALTER TABLE `rep_taller`
  ADD CONSTRAINT `rep_taller_ibfk_1` FOREIGN KEY (`id_reporte`) REFERENCES `reportes` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_taller_ibfk_2` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`id_per`) REFERENCES `personal_salud` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
