-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2017 a las 23:32:46
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `hash_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `hash_pass`) VALUES
(4, 'admin', '$2y$12$OGR2T0qFYtguGmoYBYkKm.EIpVySmb002/aljhlD8RPnCXpF5EUqG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` int(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`) VALUES
(1, 'seminario', 'fa-university'),
(2, 'conferencia', 'fa-comment'),
(3, 'talleres', 'fa-code'),
(4, 'cursos lbires', 'fa facebook');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `numero`) VALUES
(33, 'xcxxdf', 'sdsd'),
(34, 'sdf', 'y87'),
(35, 'sdfsd', 'xdfdf'),
(36, 'dfd', 'dfd'),
(37, 'sdf', 'sds'),
(42, 'luis', 'andia'),
(43, 'juan', 'juan'),
(62, 'd', 'd'),
(63, 'q', 'q'),
(64, 's', 's'),
(65, 's', 's'),
(66, 'r', 'r'),
(67, 'd', 'd'),
(68, 'dv', 'dc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` int(11) NOT NULL,
  `nombre_evento` varchar(90) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clave` varchar(50) NOT NULL,
  `id_cat_evento` int(10) NOT NULL,
  `id_inv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `clave`, `id_cat_evento`, `id_inv`) VALUES
(3, 'Responsive Web Design', '2016-12-09', '0000-00-00 00:00:00', 'taller_01', 3, 1),
(4, 'Flexbox', '2016-12-09', '0000-00-00 00:00:00', 'taller_02', 3, 2),
(5, 'HTML5 y CSS3', '2016-12-09', '0000-00-00 00:00:00', 'taller_03', 3, 3),
(6, 'Drupal', '2016-12-09', '0000-00-00 00:00:00', 'taller_04', 3, 4),
(7, 'WordPress', '2016-12-09', '0000-00-00 00:00:00', 'taller_05', 3, 5),
(8, 'Como ser freelancer', '2016-12-09', '0000-00-00 00:00:00', 'conf_01', 2, 6),
(9, 'Tecnologías del Futuro', '2016-12-09', '0000-00-00 00:00:00', 'conf_02', 2, 1),
(10, 'Seguridad en la Web', '2016-12-09', '0000-00-00 00:00:00', 'conf_03', 2, 2),
(11, 'Diseño UI y UX para móviles', '2016-12-09', '0000-00-00 00:00:00', 'sem_01', 1, 6),
(12, 'AngularJS', '2016-12-10', '0000-00-00 00:00:00', 'taller_06', 3, 1),
(13, 'PHP y MySQL', '2016-12-10', '0000-00-00 00:00:00', 'taller_07', 3, 2),
(14, 'JavaScript Avanzado', '2016-12-10', '0000-00-00 00:00:00', 'taller_08', 3, 3),
(15, 'SEO en Google', '2016-12-10', '0000-00-00 00:00:00', 'taller_09', 3, 4),
(16, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '0000-00-00 00:00:00', 'taller_10', 3, 5),
(17, 'PHP Intermedio y Avanzado', '2016-12-10', '0000-00-00 00:00:00', 'taller_11', 3, 6),
(18, 'Como crear una tienda online que venda millones en pocos días', '2016-12-10', '0000-00-00 00:00:00', 'conf_04', 2, 6),
(19, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '0000-00-00 00:00:00', 'conf_05', 2, 1),
(20, 'Pasos para crear un negocio rentable ', '2016-12-10', '0000-00-00 00:00:00', 'conf_06', 2, 2),
(21, 'Aprende a Programar en una mañana', '2016-12-10', '0000-00-00 00:00:00', 'sem_02', 1, 3),
(22, 'Diseño UI y UX para móviles', '2016-12-10', '0000-00-00 00:00:00', 'sem_03', 1, 5),
(23, 'Laravel', '2016-12-11', '0000-00-00 00:00:00', 'taller_12', 3, 1),
(24, 'Crea tu propia API', '2016-12-11', '0000-00-00 00:00:00', 'taller_13', 3, 2),
(25, 'JavaScript y jQuery', '2016-12-11', '0000-00-00 00:00:00', 'taller_14', 3, 3),
(26, 'Creando Plantillas para WordPress', '2016-12-11', '0000-00-00 00:00:00', 'taller_15', 3, 4),
(27, 'Tiendas Virtuales en Magento', '2016-12-11', '0000-00-00 00:00:00', 'taller_16', 3, 5),
(28, 'Como hacer Marketing en línea', '2016-12-11', '0000-00-00 00:00:00', 'conf_07', 2, 6),
(29, '¿Con que lenguaje debo empezar?', '2016-12-11', '0000-00-00 00:00:00', 'conf_08', 2, 2),
(30, 'Frameworks y librerias Open Source', '2016-12-11', '0000-00-00 00:00:00', 'conf_09', 2, 3),
(31, 'Creando una App en Android en una mañana', '2016-12-11', '0000-00-00 00:00:00', 'sem_04', 1, 4),
(32, 'Creando una App en iOS en una tarde', '2016-12-11', '0000-00-00 00:00:00', 'sem_05', 1, 1),
(33, 'prueba curso', '2017-08-17', '0000-00-00 00:00:00', 'semin_5', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` int(11) NOT NULL,
  `nombre_invitado` varchar(90) NOT NULL,
  `apellido_invitado` varchar(90) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Andia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado1.jpg'),
(2, 'carlos', 'mamani', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado2.jpg'),
(3, 'ana', 'cuadros', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado3.jpg'),
(4, 'renso mor', 'mendez', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado4.jpg'),
(5, 'marcia', 'regalado', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado5.jpg'),
(6, 'maricarmen', 'mari', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado6.jpg'),
(7, 'a', 'a', 'a			', 'arquitectura.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(1, 'pulsera'),
(2, 'etiquetas'),
(3, 'plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id_registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id_registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(1, 'sdf', 'sdf', 'za@gmail.com', '2017-07-31 06:16:35', '{"un dia":1,"camisa":2,"etiquetas":4}', '{"evento":["taller_01","conf_01","taller_11","conf_07"]}', 1, '151.6', 0),
(2, 'luis', 'andia', 'aa@gmail.com', '2017-08-08 22:23:18', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","conf_01","sem_01"]}', 2, '181.3', 0),
(3, 'luis', 'andia', 'aa@gmail.com', '2017-08-08 22:23:33', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","conf_01","sem_01"]}', 2, '181.3', 0),
(4, 'luis', 'andia', 'aa@gmail.com', '2017-08-08 22:24:23', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","conf_01","sem_01"]}', 2, '181.3', 0),
(5, 'lusi', 'andia', '1asdf@gmailc.com', '2017-08-08 22:25:12', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","conf_01","sem_01"]}', 2, '136.3', 0),
(6, 'sdf', 'dv', 'df', '2017-08-08 22:26:24', '{"un dia":1,"camisa":1,"etiquetas":1}', '[]', 2, '41.3', 0),
(7, '', '', '', '2017-08-08 22:29:01', '{"un dia":1,"camisa":1,"etiquetas":1}', '[]', 1, '41.3', 0),
(8, '', '', '', '2017-08-08 22:29:30', '{"un dia":1,"camisa":1,"etiquetas":1}', '[]', 1, '41.3', 0),
(9, '', '', '', '2017-08-08 23:15:16', '{"un dia":1,"camisa":1,"etiquetas":1}', '[]', 1, '41.3', 0),
(10, '', '', '', '2017-08-08 23:17:42', '{"un dia":1,"camisa":1,"etiquetas":1}', '[]', 1, '41.3', 0),
(11, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:18:51', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(12, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:19:17', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(13, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:19:57', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(14, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:20:37', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(15, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:22:34', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(16, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:23:15', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(17, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:38:15', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(18, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:38:52', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(19, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:40:01', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(20, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:40:16', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(21, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:40:29', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(22, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:41:23', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(23, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:41:46', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(24, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:42:06', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(25, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:42:54', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(26, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:45:16', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(27, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:45:44', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(28, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:46:05', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(29, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:47:38', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(30, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:49:47', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(31, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:50:52', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_02","taller_06","taller_07","taller_16"]}', 1, '136.3', 0),
(32, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:51:38', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(33, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:52:52', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(34, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:54:05', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(35, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:54:53', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(36, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-08 23:55:01', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(37, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-09 00:04:36', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(38, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-09 00:04:58', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(39, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-09 00:06:05', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(40, 'luis', 'andia', '1asdf@gmailc.com', '2017-08-09 00:06:31', '{"un dia":1,"camisa":2,"etiquetas":1}', '{"evento":["taller_03","taller_04","taller_05"]}', 2, '145.6', 0),
(41, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:08:03', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(42, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:09:27', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(43, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:09:52', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(44, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:12:46', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(45, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:13:34', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(46, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:13:50', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(47, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:13:59', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(48, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:14:39', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(49, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:15:28', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(50, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:16:13', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(51, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:16:25', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(52, 'luis', 'dv', '1asdf@gmailc.com', '2017-08-09 00:17:09', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["taller_01","taller_03","taller_07","taller_13"]}', 2, '136.3', 0),
(53, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:17:51', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(54, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:19:06', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(55, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:20:19', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(56, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:20:29', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(57, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:21:59', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(58, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:24:21', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(59, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:26:00', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(60, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:27:02', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(61, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:28:21', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(62, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:28:31', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(63, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:38:10', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(64, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:41:53', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(65, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:42:09', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(66, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:43:10', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(67, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:44:58', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(68, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:45:20', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(69, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:46:08', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(70, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:46:57', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(71, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:47:10', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(72, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:48:08', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(73, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:48:15', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(74, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:48:54', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(75, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:55:10', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(76, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 00:58:50', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(77, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:00:58', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(78, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:03:18', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(79, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:04:06', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(80, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:04:25', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(81, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:04:52', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(82, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:05:50', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(83, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:06:01', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(84, 'r', 'andia', '1asdf@gmailc.com', '2017-08-09 01:06:31', '{"un dia":1,"camisa":1,"etiquetas":1}', '{"evento":["conf_01","conf_07","conf_08"]}', 2, '136.3', 0),
(85, 'luis', 'sliui', '1asdf@gmailc.com', '2017-08-09 01:29:19', '{"un dia":1,"camisa":1,"etiquetas":2}', '{"evento":["conf_01","conf_02","conf_03","conf_05","conf_06","conf_08"]}', 2, '93.3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `idx_cat_evento` (`id_cat_evento`),
  ADD KEY `idx_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id_registrado`),
  ADD KEY `regalo` (`regalo`),
  ADD KEY `regalo_2` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `foreign_cat_evento` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
