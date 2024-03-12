-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2024 a las 01:23:55
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
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pasadmin` varchar(250) NOT NULL,
  `rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`, `rol`) VALUES
(1, 'Administrador', 'admin', 'admin', '123456', 1),
(2, 'Joel Ganchozo', '123456789', 'joel@gmail.com', '', 2),
(6, 'Juan', '1999', 'juan@gmail.com', '', 2),
(7, 'Kevin Escola', '2002', 'kj@gmail.com', '', 2),
(8, 'Juliana', '2002', 'juliana@gmail.com', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `Id_factura` int(11) NOT NULL,
  `Nombre_solicitante` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Salon` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_hora` datetime NOT NULL,
  `Categoria_plato` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_proteina` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_bebida` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad_platos` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estremes` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Rancho Coyoacan', 'Salón De Eventos En Coyoacan ofrecemos servicios para XV años, Bodas, Primeras Comuniones y Eventos Empresariales, contamos con una gran variedad de paquetes a tu disposición busca tu fecha disponible para realizar tu evento donde tendrás el servicio que te mereces en este momento más importante de tu vida. Nuestro salón de eventos en Coyoacán se adapta a tus necesidades y puede estar seguro de que tu evento será mágico e inolvidable.|', 50, 'Guayabamba'),
(6, 'Quinta San Cayetano', 'Bufet de comidas', 28, 'Sur de Quito'),
(8, 'Eventos & Banquetes', 'Nos caracterizamos por ofrecer servicios de alta calidad en el área de Banquetes, Eventos Sociales y Corporativos, manteniéndonos durante 24 años a la vanguardia, marcando ventajas competitivas en servicio, calidad, responsabilidad, precios y seguridad para nuestros clientes.', 25, 'Av. La Prensa s/n y Juan Galarza. Quito - Ecuador'),
(9, 'QUITO HOTEL', 'Un hotel sostenible con una vista espectacular de Quito y un diseño inspirado en la belleza natural y cultural de los Andes.', 84, 'Av. Eloy Alfaro &, Quito 170504');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`Id_factura`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id_salones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id_salones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
