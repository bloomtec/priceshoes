-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-04-2011 a las 14:25:27
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `priceshoes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `acos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `aros`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `aros_acos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `session_id` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carts_inventories1` (`inventory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `carts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL,
  `promocionar` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `descripcion`, `imagen`, `promocionar`, `order`) VALUES
(2, 'categoria2', '', '6371138151301830695546111.jpg', 1, 2),
(3, 'Novedades', 'Novedades Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '8880047201302050840655104.png', 1, 2),
(4, 'Casual', 'Casual Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '7650048501302050930737878.png', 1, 3),
(5, 'Formal', 'Formal Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1370050301302051030678362.png', 1, 4),
(6, 'Outlet', 'Te ofrecemos una gran selecciÃ³n de zapatos en liquidaciÃ³n, es tu oportundad para conseguir los mejores modelos casuales o elegantes con los mejores precios.', '2240051271302051087524625.png', 1, 5),
(7, 'Bolsos', 'Bolsos Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '944142725130210004577246.JPG', NULL, 6),
(8, 'Planos', 'Planos Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '5881429581302100198661630.jpg', NULL, 7),
(9, 'Fiesta', 'Fiesta lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '8411433391302100419955257.jpg', NULL, 8),
(10, 'Botas', 'Botas lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '5091434031302100443621142.jpg', 1, 9),
(11, 'Deportivos', 'Deportivos lore ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '676144014130210081491627.jpg', NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `codigo`) VALUES
(1, 'blanco', '#ffffff'),
(2, 'negro', '#000000'),
(3, 'rojo', '#FF0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoritodelusuario` (`user_id`),
  KEY `productofavorito` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `favorites`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcar la base de datos para la tabla `galleries`
--

INSERT INTO `galleries` (`id`, `inventory_id`, `nombre`, `descripcion`) VALUES
(1, NULL, '3-1', 'blanco'),
(2, NULL, '3-2', 'negro'),
(3, NULL, '19-1', 'blanco'),
(4, NULL, '19-2', 'negro'),
(5, NULL, '19-3', 'rojo'),
(6, NULL, '18-1', 'blanco'),
(7, NULL, '18-2', 'negro'),
(8, NULL, '18-3', 'rojo'),
(9, NULL, '8-1', 'blanco'),
(10, NULL, '8-2', 'negro'),
(11, NULL, '8-3', 'rojo'),
(12, NULL, '10-1', 'blanco'),
(13, NULL, '10-2', 'negro'),
(14, NULL, '10-3', 'rojo'),
(15, NULL, '12-1', 'blanco'),
(16, NULL, '12-2', 'negro'),
(17, NULL, '12-3', 'rojo'),
(18, NULL, '16-1', 'blanco'),
(19, NULL, '16-2', 'negro'),
(20, NULL, '16-3', 'rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `caption` text,
  `path` varchar(45) NOT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `foreign_key` varchar(45) DEFAULT NULL,
  `field_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_galleries1` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `caption`, `path`, `thumb`, `created`, `updated`, `model`, `foreign_key`, `field_name`) VALUES
(1, 1, NULL, '8421425431301840743623216.jpg', NULL, '2011-04-03 10:25:45', '2011-04-03 10:25:45', NULL, NULL, NULL),
(2, 1, NULL, '4741425431301840743623856.jpg', NULL, '2011-04-03 10:25:46', '2011-04-03 10:25:46', NULL, NULL, NULL),
(3, 1, NULL, '7471425441301840744183495.jpg', NULL, '2011-04-03 10:25:48', '2011-04-03 10:25:48', NULL, NULL, NULL),
(4, 2, NULL, '8851426301301840790208996.jpg', NULL, '2011-04-03 10:26:31', '2011-04-03 10:26:31', NULL, NULL, NULL),
(5, 2, NULL, '586142630130184079066325.jpg', NULL, '2011-04-03 10:26:32', '2011-04-03 10:26:32', NULL, NULL, NULL),
(6, 2, NULL, '321142630130184079085623.jpg', NULL, '2011-04-03 10:26:33', '2011-04-03 10:26:33', NULL, NULL, NULL),
(8, 5, NULL, '5301531201302103880832246.jpg', NULL, '2011-04-06 10:31:21', '2011-04-06 10:31:21', NULL, NULL, NULL),
(9, 10, NULL, '8921533361302104016805686.jpg', NULL, '2011-04-06 10:33:38', '2011-04-06 10:33:38', NULL, NULL, NULL),
(10, 13, NULL, '7931534351302104075604672.jpg', NULL, '2011-04-06 10:34:37', '2011-04-06 10:34:37', NULL, NULL, NULL),
(11, 17, NULL, '536153518130210411874659.jpg', NULL, '2011-04-06 10:35:20', '2011-04-06 10:35:20', NULL, NULL, NULL),
(12, 19, NULL, '2601536011302104161747715.jpg', NULL, '2011-04-06 10:36:03', '2011-04-06 10:36:03', NULL, NULL, NULL),
(13, 8, NULL, '7431536171302104177857364.jpg', NULL, '2011-04-06 10:36:19', '2011-04-06 10:36:19', NULL, NULL, NULL),
(16, 5, NULL, '883153823130210430380367.jpg', NULL, '2011-04-06 10:38:23', '2011-04-06 10:38:23', NULL, NULL, NULL),
(17, 5, NULL, '606153823130210430396111.jpg', NULL, '2011-04-06 10:38:23', '2011-04-06 10:38:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `talla_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inventories_products1` (`product_id`),
  KEY `fk_inventories_tallas1` (`talla_id`),
  KEY `fk_inventories_colores1` (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Volcar la base de datos para la tabla `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `talla_id`, `color_id`, `disponible`) VALUES
(1, 3, 1, 1, 1),
(2, 3, 2, 1, 1),
(3, 3, 3, 1, 1),
(4, 3, 4, 1, 0),
(5, 3, 5, 1, 0),
(6, 3, 6, 1, 0),
(7, 3, 7, 1, 0),
(8, 3, 1, 2, 1),
(9, 3, 2, 2, 0),
(10, 3, 3, 2, 0),
(11, 3, 4, 2, 0),
(12, 3, 5, 2, 0),
(13, 3, 6, 2, 0),
(14, 3, 7, 2, 0),
(15, 19, 1, 1, 0),
(16, 19, 2, 1, 0),
(17, 19, 3, 1, 0),
(18, 19, 4, 1, 0),
(19, 19, 5, 1, 0),
(20, 19, 6, 1, 0),
(21, 19, 7, 1, 0),
(22, 19, 1, 2, 0),
(23, 19, 2, 2, 0),
(24, 19, 3, 2, 0),
(25, 19, 4, 2, 0),
(26, 19, 5, 2, 0),
(27, 19, 6, 2, 0),
(28, 19, 7, 2, 0),
(29, 19, 1, 3, 1),
(30, 19, 2, 3, 1),
(31, 19, 3, 3, 1),
(32, 19, 4, 3, 0),
(33, 19, 5, 3, 0),
(34, 19, 6, 3, 0),
(35, 19, 7, 3, 0),
(36, 18, 1, 1, 0),
(37, 18, 2, 1, 0),
(38, 18, 3, 1, 0),
(39, 18, 4, 1, 0),
(40, 18, 5, 1, 0),
(41, 18, 6, 1, 0),
(42, 18, 7, 1, 0),
(43, 18, 1, 2, 0),
(44, 18, 2, 2, 0),
(45, 18, 3, 2, 0),
(46, 18, 4, 2, 0),
(47, 18, 5, 2, 0),
(48, 18, 6, 2, 0),
(49, 18, 7, 2, 0),
(50, 18, 1, 3, 1),
(51, 18, 2, 3, 1),
(52, 18, 3, 3, 1),
(53, 18, 4, 3, 0),
(54, 18, 5, 3, 0),
(55, 18, 6, 3, 0),
(56, 18, 7, 3, 0),
(57, 8, 1, 1, 0),
(58, 8, 2, 1, 0),
(59, 8, 3, 1, 0),
(60, 8, 4, 1, 0),
(61, 8, 5, 1, 0),
(62, 8, 6, 1, 0),
(63, 8, 7, 1, 0),
(64, 8, 1, 2, 1),
(65, 8, 2, 2, 0),
(66, 8, 3, 2, 0),
(67, 8, 4, 2, 1),
(68, 8, 5, 2, 1),
(69, 8, 6, 2, 1),
(70, 8, 7, 2, 0),
(71, 8, 1, 3, 0),
(72, 8, 2, 3, 0),
(73, 8, 3, 3, 0),
(74, 8, 4, 3, 0),
(75, 8, 5, 3, 0),
(76, 8, 6, 3, 0),
(77, 8, 7, 3, 0),
(78, 10, 1, 1, 0),
(79, 10, 2, 1, 0),
(80, 10, 3, 1, 0),
(81, 10, 4, 1, 0),
(82, 10, 5, 1, 0),
(83, 10, 6, 1, 0),
(84, 10, 7, 1, 0),
(85, 10, 1, 2, 1),
(86, 10, 2, 2, 1),
(87, 10, 3, 2, 1),
(88, 10, 4, 2, 0),
(89, 10, 5, 2, 0),
(90, 10, 6, 2, 0),
(91, 10, 7, 2, 0),
(92, 10, 1, 3, 0),
(93, 10, 2, 3, 0),
(94, 10, 3, 3, 0),
(95, 10, 4, 3, 0),
(96, 10, 5, 3, 0),
(97, 10, 6, 3, 0),
(98, 10, 7, 3, 0),
(99, 12, 1, 1, 0),
(100, 12, 2, 1, 0),
(101, 12, 3, 1, 0),
(102, 12, 4, 1, 0),
(103, 12, 5, 1, 0),
(104, 12, 6, 1, 0),
(105, 12, 7, 1, 0),
(106, 12, 1, 2, 0),
(107, 12, 2, 2, 0),
(108, 12, 3, 2, 0),
(109, 12, 4, 2, 0),
(110, 12, 5, 2, 0),
(111, 12, 6, 2, 0),
(112, 12, 7, 2, 0),
(113, 12, 1, 3, 1),
(114, 12, 2, 3, 1),
(115, 12, 3, 3, 1),
(116, 12, 4, 3, 0),
(117, 12, 5, 3, 0),
(118, 12, 6, 3, 0),
(119, 12, 7, 3, 0),
(120, 16, 1, 1, 0),
(121, 16, 2, 1, 0),
(122, 16, 3, 1, 0),
(123, 16, 4, 1, 0),
(124, 16, 5, 1, 0),
(125, 16, 6, 1, 0),
(126, 16, 7, 1, 0),
(127, 16, 1, 2, 1),
(128, 16, 2, 2, 1),
(129, 16, 3, 2, 1),
(130, 16, 4, 2, 0),
(131, 16, 5, 2, 0),
(132, 16, 6, 2, 0),
(133, 16, 7, 2, 0),
(134, 16, 1, 3, 0),
(135, 16, 2, 3, 0),
(136, 16, 3, 3, 0),
(137, 16, 4, 3, 0),
(138, 16, 5, 3, 0),
(139, 16, 6, 3, 0),
(140, 16, 7, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `news`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) NOT NULL,
  `order_state_id` int(11) NOT NULL DEFAULT '0',
  `envio_nombre` varchar(45) DEFAULT NULL,
  `envio_apellido` varchar(45) DEFAULT NULL,
  `envio_direccion` varchar(45) DEFAULT NULL,
  `envio_telefono` varchar(45) DEFAULT NULL,
  `envio_ciudad` varchar(45) DEFAULT NULL,
  `envio_estado` varchar(45) DEFAULT NULL,
  `envio_costo` decimal(5,2) DEFAULT NULL,
  `tarjeta_codigo` int(4) DEFAULT NULL,
  `tarjeta_numero` int(16) DEFAULT NULL,
  `pago_nombre` varchar(45) DEFAULT NULL,
  `pago_apellido` varchar(45) DEFAULT NULL,
  `pago_direccion` varchar(45) DEFAULT NULL,
  `pago_cedula` varchar(45) DEFAULT NULL,
  `pago_telefono` varchar(45) DEFAULT NULL,
  `pago_ciudad` varchar(45) DEFAULT NULL,
  `pago_estado` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_users1` (`user_id`),
  KEY `orders_order_states1` (`order_state_id`),
  KEY `orders_payment_types1` (`payment_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `orders`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`inventory_id`),
  KEY `order_items_inventories1` (`inventory_id`),
  KEY `order_items_orders1` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `order_items`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_states`
--

CREATE TABLE IF NOT EXISTS `order_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `order_states`
--

INSERT INTO `order_states` (`id`, `estado`) VALUES
(0, 'Creado'),
(1, 'Nuevo'),
(2, 'Pagado'),
(3, 'Enviado'),
(4, 'Completado'),
(5, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `content` longtext,
  `slug` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `content`, `slug`, `created`, `updated`) VALUES
(1, 'Ayuda', '', NULL, 'ayuda', NULL, NULL),
(2, 'Acerca de', '', '<p>\r\n	acerca de</p>\r\n', 'acerca-de', '2011-04-28 12:28:25', '2011-04-28 12:34:23'),
(3, 'Nuestras Tiendas', '', NULL, 'nuestras_tiendas', '2011-04-28 12:28:49', '2011-04-28 12:28:49'),
(4, 'Tendencias', '', NULL, 'tendencias', '2011-04-28 12:29:10', '2011-04-28 12:29:10'),
(5, 'Franquicias', '', NULL, 'franquicias', '2011-04-28 12:29:37', '2011-04-28 12:29:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medio_de_pago` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `payment_types`
--

INSERT INTO `payment_types` (`id`, `medio_de_pago`) VALUES
(1, 'tarjeta credito'),
(2, 'tarjeta debito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `base_iva` double DEFAULT NULL,
  `valor_iva` double DEFAULT NULL,
  `descripcion` text,
  `order` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `promocionar` tinyint(1) DEFAULT NULL,
  `novedad` tinyint(1) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `nombre`, `precio`, `base_iva`, `valor_iva`, `descripcion`, `order`, `activo`, `promocionar`, `novedad`, `imagen`) VALUES
(3, 2, 'Pandales', 5000, 10000, 16000, 'descripcion', NULL, 1, 1, 1, '7051145301301831130235738.jpg'),
(4, 2, 'zapato 2', 5000, 20000, 32000, 'descripcion', NULL, 1, 1, 0, '7051145301301831130235738.jpg'),
(5, 6, 'Azaleia Aleshanee', 60000, 1253, 1325, 'Azaleia Aleshanee Lorem ipsum', NULL, 1, 1, 1, '5981445341302101134822625.jpg'),
(7, 6, 'Minetta', 45000, 2154, 3212, 'Minetta Lorem ipsum', NULL, 1, 1, 1, '622144712130210123276831.jpg'),
(8, 6, 'Vanliere', 55000, 4210, 125, 'Vanliere Lorem ipsum', NULL, 1, 1, 1, '5471448441302101324958254.jpg'),
(10, 6, 'Claribelle', 55000, 4120, 1420, 'Claribelle Lorem ipsum', NULL, 1, 1, 1, '508145011130210141138634.jpg'),
(12, 6, 'Ladonna', 60000, 4512, 1245, 'Ladonna Lorem ipsum', NULL, 1, 0, 0, '2911451401302101500417356.jpg'),
(13, 6, 'Beaume', 50000, 1240, 1245, 'Beaume Lorem ipsum', NULL, 1, 1, 0, '4061452341302101554210258.jpg'),
(14, 6, 'Affina', 60000, 5412, 2541, 'Affina lorem ipsum', NULL, 1, 1, 1, '6101453461302101626246693.jpg'),
(15, 6, 'Latasha', 50000, 4150, 5142, 'Latasha Lorem ipsum', NULL, 1, 1, 0, '2281455081302101708613368.jpg'),
(16, 6, 'Xiaomei', 50000, 1420, 2450, 'Xiaomei Lorem ipsum', NULL, 1, 1, 0, '178145600130210176049287.jpg'),
(17, 6, 'Samella', 50000, 1520, 5412, 'Samella Lorem ipsum', NULL, 1, 0, 0, '975145641130210180117015.jpg'),
(18, 6, 'Tiziana', 50000, 1452, 2451, 'Tiziana Lorem ipsum', NULL, 1, 0, 1, '7671457491302101869823189.jpg'),
(19, 6, 'Scandall', 60000, 1256, 125, '<p>Elegante, sexy y con estilo son definiciones adecuadas paras estos tacones de tiras. Las caracterÃ­sticas clave incluyen una plataforma de gran altura, acabado mate, y detalles en cuero.</p>\r\n<ul>\r\n<li>Altura TacÃ³n: 10.5 centimetros</li>\r\n<li>Altura Plataforma: 2 centimetros</li>\r\n</ul>', NULL, 1, 1, 1, '5831505281302102328979471.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text,
  `estado` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `surveys`
--

INSERT INTO `surveys` (`id`, `titulo`, `estado`, `created`, `updated`) VALUES
(1, 'Como te enteraste de nuestro sitio web?', 1, '2011-04-28 12:54:43', '2011-04-28 12:55:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `survey_options`
--

CREATE TABLE IF NOT EXISTS `survey_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `votos` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_survey_options_surveys1` (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `survey_options`
--

INSERT INTO `survey_options` (`id`, `survey_id`, `name`, `votos`) VALUES
(1, 1, 'Publicidad en prensa', 0),
(2, 1, 'Internet', 0),
(3, 1, 'Nuestras Tiendas', 1),
(4, 1, 'Voz a Voz', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE IF NOT EXISTS `tallas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `nombre`) VALUES
(1, '34'),
(2, '35'),
(3, '36'),
(4, '37'),
(5, '38'),
(6, '39'),
(7, '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user.role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `created`, `updated`) VALUES
(1, 1, 'administrador', 'e2acc0c6bfd00a2d36ffecb19918d45fa92c5bee', 'administrador@priceshoes.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_fields`
--

CREATE TABLE IF NOT EXISTS `user_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `departamento_residencia` varchar(45) DEFAULT NULL,
  `ciudad_residencia` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `direccion2` varchar(45) DEFAULT NULL,
  `telefono_fijo` varchar(45) DEFAULT NULL,
  `telefono_movil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userfileds` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `user_fields`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_carts_inventories1` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favoritodelusuario` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productofavorito` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_galleries1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `fk_inventories_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventories_tallas1` FOREIGN KEY (`talla_id`) REFERENCES `tallas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventories_colores1` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_order_states1` FOREIGN KEY (`order_state_id`) REFERENCES `order_states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_payment_types1` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_inventories1` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `survey_options`
--
ALTER TABLE `survey_options`
  ADD CONSTRAINT `fk_survey_options_surveys1` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user.role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_fields`
--
ALTER TABLE `user_fields`
  ADD CONSTRAINT `userfileds` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
