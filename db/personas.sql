-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2023 a las 00:02:33
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
-- Base de datos: `tienda_ventasoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `primer_nombre`, `primer_apellido`, `email`, `password`) VALUES
(1, 'Yair', 'Garizabalo', 'yair@vs.com', '$2y$10$qe0usrOlOy8Rp5IjLt4rVuCgBS1B3zTGGXl/Rs7WTx24SS3PQQCZq'),
(2, 'Joel', 'Rodriguez', 'joel@vs.com', '$2y$10$FqsYJ1qOZJrw/X6Y47a2Vu6zy5mx8doO7Qysq03y.cO4dB1AmDVD2'),
(3, 'joe', 'arroyo', 'arro@vs.co', '$2y$10$ojoUkIwYJtWKecsXiq2Qv.P2W4LWMkvt9x9PponDP8QKCxs.kwIjO'),
(4, 'jose', 'puello', 'pue@vs.com', '$2y$10$pEa.zbIuyjMjUeVz6GEZw.VWPHPiR8zjGrFPIdHbgw2NcOAAiRmpW'),
(5, 'Laura', 'Jaimes', 'laura@vs.com', '$2y$10$fJnCp.VixHFTw/yziC9d2ONn1t36oievl/soIU0WkHmtlPgGTEFe2'),
(6, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$1m/LT3XHReh3E3kqtaTSjeKRamHWnt0Lr7f3ioShzrBwgtjUUIpnO'),
(7, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$g/6zOST55itHoBRiMjZ0oe.46csK6WeEDJdh71JARbKarPS2UuG62'),
(8, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$eFSxU5tgJCAkkGZkwDUDR.K5xiNpNkZqUpTjxZKQysQJ9qSWae0SK'),
(9, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$m2BmMbm4eBKfaW1GLVYvRe/1aFsr1kDUK/5C4SysGt0hKZmR8PGBC'),
(10, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$gW5BB55S9.TigZz5HM0YQOx/GoRvcliSJTbziYJ4gjQWbBLsL3bOi'),
(11, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$W5VKVz4UiVWu8Xv/4DO6sOLH2trid14wNRuO2vr3TRCqgz4r5Ziou'),
(12, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$poEseU0aiC0QEXe0qR6NcuuVHBaAUslGrFuPOkzlz05arq0mloacK'),
(13, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$7bDIePgEj2DUL3SJXAhLI..OhtvlFbsoFsYDkwVgLbR/RbDufWgw2'),
(14, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$0qSuwXhXJHQAODfWdWZwD./ArPkocMXNWAYIjOaGc3Qds9wOEqdPS'),
(15, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$MT1kJ1UlmYmDiW1QDEN8iOKLnQyYtAvy5NFvxQfuLV4pOihSEXnr.'),
(16, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$OnPvXgY2An85H7eqSmEM9uJJkuZ319SopTrQpMiW8T4FiBJX9OXFi'),
(17, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$Pb6eD/JAPyaX7xnFBQMlA.7BtzcRfXxBnwGuSWOtnbSgNpq9HzcHq'),
(18, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$ZbIebnCPeVojU.img5bwseISM2qPgBfbXr6xtADsVWebynpr9NBPG'),
(19, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$FHceb4Z0z2JATW3/KaleIubN9UXSAR.2raapWWU.GUH30qd3QOAPe'),
(20, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$ZW4O/.cM0Mzw9XhRf0QhfO/Y17sl7LkLNj4KIKVEMtTPux7Obz9q.'),
(21, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$790CLHI5MdckK5cMKnEfZu5C2j1QSWvmUbrBiMMtYo1r/5TVJOzT2'),
(22, 'Migue', 'as', 'mig@cuc.edu.co', '$2y$10$evw1/hCQvNj.MWJYhPiYPONIzMT8hY6WizofOnnSemjlvpoVnblCm'),
(23, 'Andres', 'Iniesta', 'ani@vs.co', '$2y$10$ClP7N2GQY02gPp/ifQrEdOV30nHvEABlI9D6XH.4ATtlBXtgi2lu2'),
(24, 'Andres', 'Tarra', 'atarra@vs.co', '$2y$10$Ml8EhqkWsR.lhH1nav2eAOQAEVu6uc/WKE9w2DK.EbycWz80kwGl6'),
(25, 'Carlos', 'Nieto', 'cnie@vs.co', '$2y$10$xeLaBxPvTquT1FuNwfat2ORNH1IXY6/LZKuuwucbZ0qcBqR1IvLu2'),
(26, 'Gabriel', 'Castro', 'gab@vs.com', '$2y$10$TSQJKXKAq3CFKB3feQSMfe8hVSWYCtrnJeLpRoosAgSvtngdA79Oi'),
(27, 'Pedro', 'Ruiz', 'pruiz@vs.co', '$2y$10$pm9zLUb8CZDujpXfCLCglOzFq6Vp5iXDT/sXnK1yppxzrdnIDTTs.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
