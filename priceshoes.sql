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
  `cantidad` INT NOT NULL DEFAULT 0 ,
  `session_id` VARCHAR(45) NOT NULL ,
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


-- -----------------------------------------------------
-- Table `priceshoes`.`clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`clientes` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `genero` CHAR(1) NULL ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `fecha_nacimiento` DATETIME NULL ,
  `email` VARCHAR(45) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`order_states`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`order_states` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`order_states` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`orders` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT NOT NULL ,
  `estado_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  `envio_nombre` VARCHAR(45) NULL ,
  `envio_apellido` VARCHAR(45) NULL ,
  `envio_direccion` VARCHAR(45) NULL ,
  `envio_telefono` VARCHAR(45) NULL ,
  `envio_ciudad` VARCHAR(45) NULL ,
  `envio_estado` VARCHAR(45) NULL ,
  `envio_costo` DECIMAL(5,2) NULL ,
  `pago_nombre` VARCHAR(45) NULL ,
  `pago_apellido` VARCHAR(45) NULL ,
  `pago_direccion` VARCHAR(45) NULL ,
  `pago_telefono` VARCHAR(45) NULL ,
  `pago_ciudad` VARCHAR(45) NULL ,
  `pago_estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `orders_clientes1` (`cliente_id` ASC) ,
  INDEX `orders_order_states1` (`estado_id` ASC) ,
  CONSTRAINT `orders_clientes1`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `priceshoes`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `orders_order_states1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `priceshoes`.`order_states` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `priceshoes`.`order_items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `priceshoes`.`order_items` ;

CREATE  TABLE IF NOT EXISTS `priceshoes`.`order_items` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `inventory_id` INT NOT NULL ,
  `order_id` INT NOT NULL ,
  `cantidad` INT NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`, `inventory_id`) ,
  INDEX `order_items_inventories1` (`inventory_id` ASC) ,
  INDEX `order_items_orders1` (`order_id` ASC) ,
  CONSTRAINT `order_items_inventories1`
    FOREIGN KEY (`inventory_id` )
    REFERENCES `priceshoes`.`inventories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `order_items_orders1`
    FOREIGN KEY (`order_id` )
    REFERENCES `priceshoes`.`orders` (`id` )
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
-- Data for table `priceshoes`.`order_states`
-- -----------------------------------------------------
START TRANSACTION;
USE `priceshoes`;
INSERT INTO `priceshoes`.`order_states` (`id`, `estado`) VALUES (1, 'Nuevo');
INSERT INTO `priceshoes`.`order_states` (`id`, `estado`) VALUES (2, 'Pagado');
INSERT INTO `priceshoes`.`order_states` (`id`, `estado`) VALUES (3, 'Enviado');
INSERT INTO `priceshoes`.`order_states` (`id`, `estado`) VALUES (4, 'Completado');
INSERT INTO `priceshoes`.`order_states` (`id`, `estado`) VALUES (5, 'Cancelado');
INSERT INTO `priceshoes`.`order_states` (`id`, `estado`) VALUES (0, 'Creado');

COMMIT;
