-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2023 a las 22:03:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombre`, `Apellido`, `Correo`, `Telefono`) VALUES
(1, '', '', '', '0'),
(2, 'Daniel', 'Ramos Espino', 'alfredodanielramos123456@gmail.com', '2147483647'),
(3, 'Cielmar', 'Cruz Peña', 'chema', '0'),
(4, 'Cielmar', 'Cruz Peña', 'chema', '2147483647'),
(5, 'Cielmar', 'Cruz Peña', 'chema', '2147483647'),
(6, 'Daniel', 'Ramos', 'josearmandofranco123@gmail.com', '2147483647'),
(7, 'Rocio  ', 'Cruz Peña', 'rocio@gmail.com', '2147483647'),
(8, 'Rocio', 'Cruz Peña', 'rocio@gmail.com', '2147483647'),
(9, 'Rocio', 'Cruz Peña', 'rocio@gmail.com', '2147483647'),
(10, '', '', '', '0'),
(11, 'Daniel', 'Ramos Espino', 'rocio@gmail.com', '2147483647'),
(12, 'Daniel', 'Ramos Espino', 'rocio@gmail.com', '2147483647'),
(13, 'Rocio', 'Cruz Peña ', 'rocio@gmail.com', '7721597174');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
