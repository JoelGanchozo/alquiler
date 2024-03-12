-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2024 a las 03:46:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedal911`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id_salones` int(11) NOT NULL,
  `nombre_salon` varchar(9999) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inf_salon` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_salon` tinyint(99) NOT NULL,
  `ubicacion_salon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id_salones`, `nombre_salon`, `inf_salon`, `precio_salon`, `ubicacion_salon`) VALUES
(1, 'Rancho Coyoacan', 'Salón De Eventos En Coyoacan ofrecemos servicios para XV años, Bodas, Primeras Comuniones y Eventos Empresariales, contamos con una gran variedad de paquetes a tu disposición busca tu fecha disponible para realizar tu evento donde tendrás el servicio que te mereces en este momento más importante de tu vida. Nuestro salón de eventos en Coyoacán se adapta a tus necesidades y puede estar seguro de que tu evento será mágico e inolvidable.', 50, 'Guayabamba'),
(2, 'Quinta El Churrinchi', 'Un lugar muy muy bonito, muy bien cuidado, todas sus instalaciones en buen funcionamiento. Hermosos sus árboles frutales, fácil de llegar, precios cómodos, totalmente recomendable. Es un lugar para eventos, más no ofrece servicios como restaurante.', 30, 'WMV2+XP5, Quito 170209');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id_salones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id_salones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
