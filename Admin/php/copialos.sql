-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-03-2017 a las 16:44:36
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `losjuegos`
--

--

--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_jugadores`

--
-- Estructura de tabla para la tabla `tb_lugares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_medallas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modulos`
--

CREATE TABLE IF NOT EXISTS `tb_modulos` (
`id_modulos` int(10) NOT NULL,
  `padre` int(11) DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(300) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'javascript:void();',
  `submenu` tinyint(1) NOT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `tipo` enum('admin','users') COLLATE utf8_spanish_ci NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_modulos`
--

INSERT INTO `tb_modulos` (`id_modulos`, `padre`, `nombre`, `ruta`, `submenu`, `icono`, `orden`, `tipo`, `estado`) VALUES
(1, 0, 'Principal', 'administracion.php', 0, 'home', 1, 'admin', 'activo'),
(2, 0, 'Jugadores', 'javascript:void();', 1, 'directions_run', 3, 'admin', 'activo'),
(3, 0, 'Partidos', 'javascript:void();', 1, 'games', 4, 'admin', 'activo'),
(4, 0, 'Amonestaciones', 'javascript:void();', 1, 'error', 5, 'admin', 'activo'),
(5, 0, 'Estadísticas', 'javascript:void();', 0, 'poll', 7, 'admin', 'activo'),
(6, 0, 'Noticias', 'javascript:void();', 0, 'picture_in_picture', 6, 'admin', 'activo'),
(7, 2, 'Nuevo', 'pages/jugadores/nuevo.php', 0, 'add_box', 1, 'admin', 'activo'),
(8, 0, 'Administración', 'javascript:void();', 0, 'account_balance', 2, 'admin', 'activo'),
(10, 2, 'Gestionar', 'pages/jugadores/gestionar.php', 0, 'edit', 2, 'admin', 'activo'),
(11, 3, 'Nuevo', 'pages/partidos/nuevo.php', 0, 'add_box', 1, 'admin', 'activo'),
(12, 3, 'Editar calendario', 'pages/partidos/editarcalendario.php', 0, 'edit', 3, 'admin', 'activo'),
(15, 0, 'Usuarios', 'javascript:void();', 1, 'power_settings_new', 1, 'admin', 'activo'),
(16, 15, 'Gestionar', 'pages/usuarios/gestionar.php', 0, 'edit', 1, 'admin', 'activo'),
(18, 0, 'Modulos', 'javascript:void();', 1, 'extension', 2, 'admin', 'activo'),
(19, 18, 'Nuevo', 'pages/modulos/nuevo.php', 0, 'fiber_new', 1, 'admin', 'activo'),
(20, 18, 'Gestionar', 'pages/modulos/gestionar.php', 0, 'dashboard', 2, 'admin', 'activo'),
(21, 0, 'Perfiles', 'javascript:void();', 1, 'local_parking', 2, 'admin', 'activo'),
(22, 21, 'Gestionar', 'pages/perfiles/gestionar.php', 0, 'open_in_new', 1, 'admin', 'activo'),
(23, 18, 'Iconos', 'pages/modulos/iconos.php', 0, 'bubble_chart', 3, 'admin', 'activo'),
(24, 3, 'Editar Resultado', 'pages/partidos/editarresultado.php', 0, 'filter_2', 4, 'admin', 'activo'),
(25, 3, 'Agregar resultados', 'pages/partidos/tabla-resultados.php', 0, 'videogame_asset', 2, 'admin', 'activo'),
(26, 4, 'Editar Amonestaciones partido', 'pages/amonestaciones/amonestacion-partido.php', 0, 'sim_card', 1, 'admin', 'activo'),
(27, 4, 'Editar Amonestaciones detalles', 'pages/amonestaciones/amonestacion-detalle.php', 0, 'tablet_mac', 2, 'admin', 'activo'),
(28, 0, 'Inicio', 'index.php', 0, 'no-aplica', 1, 'users', 'activo'),
(29, 0, 'Calendario y Resultados', 'web/calendario.php', 0, 'no-aplica', 4, 'users', 'activo'),
(30, 0, 'Estadísticas', 'web/estadisticas.php', 0, 'no-aplica', 4, 'users', 'inactivo'),
(31, 0, 'Colegios', 'web/equipos.php', 0, 'no-aplica', 3, 'users', 'activo'),
(32, 0, 'Noticias', 'web/eventos.php', 0, 'no-aplica', 5, 'users', 'activo'),
(33, 0, 'Galeria', 'web/galeria.php', 0, 'no-aplica', 6, 'users', 'activo'),
(34, 0, 'Nosotros', 'web/nosotros.php', 0, 'no-aplica', 7, 'users', 'activo'),
(35, 0, 'Contactenos', 'web/contacto.php', 0, 'no-aplica', 8, 'users', 'activo'),
(36, 0, 'Deportes', 'web/deportes.php', 0, 'no-aplica', 2, 'users', 'activo');




CREATE TABLE IF NOT EXISTS `tb_perfiles` (
`id_perfiles` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_perfiles`
--

INSERT INTO `tb_perfiles` (`id_perfiles`, `nombre`, `descripcion`, `nivel`) VALUES
(1, 'Administrador', 'Tiene derecho a todo dentro de la pagina.', 1),
(2, 'Gestionador', 'Usuario que administra el sistema pero no tiene permitido la creación de usuarios o asignación de características.', 2),
(3, 'Super', '...', 3);



CREATE TABLE IF NOT EXISTS `tb_preguntas` (
`id_preguntas` int(3) NOT NULL,
  `pregunta` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



INSERT INTO `tb_preguntas` (`id_preguntas`, `pregunta`) VALUES
(1, '¿Cuál es el objeto más raro de tu habitación?'),
(2, '¿Cuál es tu palabra favorita?'),
(3, '¿Dónde serían tus vacaciones ideales?'),
(4, '¿Cuál era tu serie de dibujos animados favorita?'),
(5, 'Si pudieras ser un animal, ¿cuál serías?');

-

CREATE TABLE IF NOT EXISTS `tb_sesion` (
`id_sesion` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `tr_modulosxperfiles` (
  `id_modulos` int(11) NOT NULL,
  `id_perfiles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tr_modulosxperfiles`
--

INSERT INTO `tr_modulosxperfiles` (`id_modulos`, `id_perfiles`) VALUES
(1, 1),
(1, 2),
(1, 3),
(7, 2),
(8, 2),
(11, 1),
(12, 1),
(12, 2),
(16, 2),
(16, 3),
(19, 3),
(20, 3),
(22, 3),
(23, 3),
(24, 1),
(25, 1),
(26, 1),
(27, 1);


ALTER TABLE `tb_modulos`
 ADD PRIMARY KEY (`id_modulos`);

-- Indices de la tabla `tb_perfiles`
--
ALTER TABLE `tb_perfiles`
 ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `tb_preguntas`
--
ALTER TABLE `tb_preguntas`
 ADD PRIMARY KEY (`id_preguntas`);

-- Indices de la tabla `tb_sesion`
--
ALTER TABLE `tb_sesion`
 ADD PRIMARY KEY (`id_sesion`), ADD KEY `id_usuario` (`id_usuario`);

-- Indices de la tabla `te_comentarios`

-- Indices de la tabla `tr_amonestacionesxjugador`
--

--
-- Indices de la tabla `tr_equiposxpartidos`
--

-- Indices de la tabla `tr_modulosxperfiles`
--
ALTER TABLE `tr_modulosxperfiles`
 ADD PRIMARY KEY (`id_modulos`,`id_perfiles`);

--
-- Indices de la tabla `tr_sesionxmovimientos`
--
ALTER TABLE `tr_sesionxmovimientos`
 ADD PRIMARY KEY (`id_sesionxmovimiento`), ADD KEY `id_sesion` (`id_sesion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

-- AUTO_INCREMENT de la tabla `tb_modulos`
--
ALTER TABLE `tb_modulos`
MODIFY `id_modulos` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `tb_noticias`

-- AUTO_INCREMENT de la tabla `tb_perfiles`
--
ALTER TABLE `tb_perfiles`
MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_preguntas`
--
ALTER TABLE `tb_preguntas`
MODIFY `id_preguntas` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--

-- AUTO_INCREMENT de la tabla `tb_sesion`
--
ALTER TABLE `tb_sesion`
MODIFY `id_sesion` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--

-- AUTO_INCREMENT de la tabla `tr_sesionxmovimientos`
--
ALTER TABLE `tr_sesionxmovimientos`
MODIFY `id_sesionxmovimiento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12438;
--
-- Restricciones para tablas volcadas
