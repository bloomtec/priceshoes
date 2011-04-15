SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `priceshoes` ;
CREATE SCHEMA IF NOT EXISTS `priceshoes` ;
USE `priceshoes` ;

-- -----------------------------------------------------
-- Table `priceshoes`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`roles` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`users` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `role_id` INT NULL DEFAULT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `updated` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `user.role_id` (`role_id` ASC) ,
  CONSTRAINT `user.role_id`
    FOREIGN KEY (`role_id` )
    REFERENCES `priceshoes`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`user_fields`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`user_fields` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`user_fields` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL DEFAULT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `userfileds` (`user_id` ASC) ,
  CONSTRAINT `userfileds`
    FOREIGN KEY (`user_id` )
    REFERENCES `priceshoes`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`acos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`acos` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`acos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `parent_id` INT(10) NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  `foreign_key` INT(10) NULL DEFAULT NULL ,
  `alias` VARCHAR(255) NULL DEFAULT NULL ,
  `lft` INT(10) NULL DEFAULT NULL ,
  `rght` INT(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `priceshoes`.`aros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`aros` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`aros` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `parent_id` INT(10) NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  `foreign_key` INT(10) NULL DEFAULT NULL ,
  `alias` VARCHAR(255) NULL DEFAULT NULL ,
  `lft` INT(10) NULL DEFAULT NULL ,
  `rght` INT(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `priceshoes`.`aros_acos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`aros_acos` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`aros_acos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `aro_id` INT(10) NOT NULL ,
  `aco_id` INT(10) NOT NULL ,
  `_create` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_read` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_update` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_delete` VARCHAR(2) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `ARO_ACO_KEY` (`aro_id` ASC, `aco_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `priceshoes`.`galleries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`galleries` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`galleries` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `inventory_id` INT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`images`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`images` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`images` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `gallery_id` INT(11) NOT NULL ,
  `caption` TEXT NULL DEFAULT NULL ,
  `path` VARCHAR(45) NOT NULL ,
  `thumb` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `updated` DATETIME NULL DEFAULT NULL ,
  `model` VARCHAR(45) NULL DEFAULT NULL ,
  `foreign_key` VARCHAR(45) NULL DEFAULT NULL ,
  `field_name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_images_galleries1` (`gallery_id` ASC) ,
  CONSTRAINT `fk_images_galleries1`
    FOREIGN KEY (`gallery_id` )
    REFERENCES `priceshoes`.`galleries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`pages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`pages` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`pages` (
  `id` INT NOT NULL ,
  `title` VARCHAR(45) NULL DEFAULT NULL ,
  `description` VARCHAR(45) NULL DEFAULT NULL ,
  `content` LONGTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`news` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`news` (
  `id` INT NOT NULL ,
  `title` VARCHAR(45) NULL DEFAULT NULL ,
  `description` TEXT NULL DEFAULT NULL ,
  `content` LONGTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`categories` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `descripcion` TEXT NULL DEFAULT NULL ,
  `imagen` VARCHAR(200) NULL DEFAULT NULL ,
  `promocionar` TINYINT(1)  NULL ,
  `order` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`products` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `precio` DOUBLE NULL DEFAULT NULL ,
  `base_iva` DOUBLE NULL DEFAULT NULL ,
  `valor_iva` DOUBLE NULL DEFAULT NULL ,
  `descripcion` TEXT NULL DEFAULT NULL ,
  `order` INT NULL ,
  `activo` TINYINT(1)  NULL ,
  `promocionar` TINYINT(1)  NULL ,
  `novedad` TINYINT(1)  NULL ,
  `imagen` VARCHAR(200) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_categories1` (`category_id` ASC) ,
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`category_id` )
    REFERENCES `priceshoes`.`categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`colores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`colores` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`colores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `codigo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`tallas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`tallas` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`tallas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`inventories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`inventories` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`inventories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `product_id` INT NOT NULL ,
  `talla_id` INT NOT NULL ,
  `color_id` INT NOT NULL ,
  `disponible` TINYINT(1)  NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_inventories_products1` (`product_id` ASC) ,
  INDEX `fk_inventories_tallas1` (`talla_id` ASC) ,
  INDEX `fk_inventories_colores1` (`color_id` ASC) ,
  CONSTRAINT `fk_inventories_products1`
    FOREIGN KEY (`product_id` )
    REFERENCES `priceshoes`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventories_tallas1`
    FOREIGN KEY (`talla_id` )
    REFERENCES `priceshoes`.`tallas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventories_colores1`
    FOREIGN KEY (`color_id` )
    REFERENCES `priceshoes`.`colores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`surveys`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`surveys` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`surveys` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` TEXT NULL DEFAULT NULL ,
  `estado` TINYINT(1) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `updated` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `priceshoes`.`survey_options`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`survey_options` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`survey_options` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `survey_id` INT(11) NOT NULL ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `votos` INT(11) NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_survey_options_surveys1` (`survey_id` ASC) ,
  CONSTRAINT `fk_survey_options_surveys1`
    FOREIGN KEY (`survey_id` )
    REFERENCES `priceshoes`.`surveys` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `priceshoes`.`carts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`carts` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`carts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `inventory_id` INT NOT NULL ,
  `qty` INT NOT NULL DEFAULT 0 ,
  `ct_session_id` INT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_carts_inventories1` (`inventory_id` ASC) ,
  CONSTRAINT `fk_carts_inventories1`
    FOREIGN KEY (`inventory_id` )
    REFERENCES `priceshoes`.`inventories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `priceshoes`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `priceshoes`;
INSERT INTO `priceshoes`.`roles` (`id`, `name`) VALUES (1, 'administrador');
INSERT INTO `priceshoes`.`roles` (`id`, `name`) VALUES (2, 'cliente');

COMMIT;

-- -----------------------------------------------------
-- Data for table `priceshoes`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `priceshoes`;
INSERT INTO `priceshoes`.`users` (`id`, `role_id`, `username`, `password`, `email`, `created`, `updated`) VALUES (1, 1, 'administrador', 'e2acc0c6bfd00a2d36ffecb19918d45fa92c5bee', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- INSERTS
-- -----------------------------------------------------

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

COMMIT;

INSERT INTO `colores` (`id`, `nombre`, `codigo`) VALUES
(1, 'blanco', '#ffffff'),
(2, 'negro', '#000000'),
(3, 'rojo', '#FF0000');

COMMIT;

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

COMMIT;

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

COMMIT;

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

COMMIT;

INSERT INTO `tallas` (`id`, `nombre`) VALUES
(1, '34'),
(2, '35'),
(3, '36'),
(4, '37'),
(5, '38'),
(6, '39'),
(7, '40');

COMMIT;

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

COMMIT;