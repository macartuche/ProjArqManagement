SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projectSCRUMBD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projectSCRUMBD` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `projectSCRUMBD` ;

-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`organizacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`organizacion` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `logo` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `sitioweb` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`proyectos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`proyectos` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `fechaInicio` DATETIME NULL,
  `fechaFin` DATETIME NULL,
  `presupuestoResumen` DECIMAL(6,4) NULL,
  `observaciones` VARCHAR(45) NULL,
  `organizacion_id` INT NOT NULL,
  PRIMARY KEY (`id`, `organizacion_id`),
  INDEX `fk_projectos_organizacion1_idx` (`organizacion_id` ASC),
  CONSTRAINT `fk_projectos_organizacion1`
    FOREIGN KEY (`organizacion_id`)
    REFERENCES `projectSCRUMBD`.`organizacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`usuarios` (
  `id` INT NOT NULL,
  `nombres` VARCHAR(100) NULL,
  `apellidos` VARCHAR(100) NULL,
  `mail` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `avatar` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`roles` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`permisos` (
  `id` INT NOT NULL,
  `tipoPermiso` VARCHAR(250) NULL,
  `descripcion` VARCHAR(400) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`equipos` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`iteraciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`iteraciones` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `fechaInicio` VARCHAR(45) NULL,
  `FechaFin` VARCHAR(45) NULL,
  `ptosResumen` DECIMAL(6,4) NULL,
  `presupuestoResumen` DECIMAL(6,4) NULL,
  `projectos_id` INT NOT NULL,
  PRIMARY KEY (`id`, `projectos_id`),
  INDEX `fk_iteraciones_projectos1_idx` (`projectos_id` ASC),
  CONSTRAINT `fk_iteraciones_projectos1`
    FOREIGN KEY (`projectos_id`)
    REFERENCES `projectSCRUMBD`.`proyectos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`categoria` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`, `categoria_id`),
  INDEX `fk_categoria_categoria1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_categoria_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `projectSCRUMBD`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`historias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`historias` (
  `id` INT NOT NULL,
  `resumen` VARCHAR(45) NULL,
  `detalle` VARCHAR(45) NULL,
  `presupuesto` VARCHAR(45) NULL,
  `estadoActual` VARCHAR(45) NULL,
  `puntuacion` VARCHAR(45) NULL,
  `etiquetas` VARCHAR(45) NULL,
  `iteraciones_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  `categoria_categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`, `iteraciones_id`),
  INDEX `fk_historias_iteraciones1_idx` (`iteraciones_id` ASC),
  INDEX `fk_historias_categoria1_idx` (`categoria_id` ASC, `categoria_categoria_id` ASC),
  CONSTRAINT `fk_historias_iteraciones1`
    FOREIGN KEY (`iteraciones_id`)
    REFERENCES `projectSCRUMBD`.`iteraciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historias_categoria1`
    FOREIGN KEY (`categoria_id` , `categoria_categoria_id`)
    REFERENCES `projectSCRUMBD`.`categoria` (`id` , `categoria_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`material` (
  `id` INT NOT NULL,
  `nombreMaterial` VARCHAR(45) NULL,
  `cantidad` VARCHAR(45) NULL,
  `valor` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`comentarios` (
  `id` INT NOT NULL,
  `comentario` VARCHAR(45) NULL,
  `fecha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`tarea` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(250) NULL,
  `descripcion` VARCHAR(500) NULL,
  `etiquetas` VARCHAR(45) NULL,
  `historias_id` INT NOT NULL,
  `historias_iteraciones_id` INT NOT NULL,
  `comentarios_id` INT NOT NULL,
  `estimado` VARCHAR(45) NULL,
  `faltante` VARCHAR(45) NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`, `historias_id`, `historias_iteraciones_id`),
  INDEX `fk_tarea_historias1_idx` (`historias_id` ASC, `historias_iteraciones_id` ASC),
  INDEX `fk_tarea_comentarios1_idx` (`comentarios_id` ASC),
  INDEX `fk_tarea_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_tarea_historias1`
    FOREIGN KEY (`historias_id` , `historias_iteraciones_id`)
    REFERENCES `projectSCRUMBD`.`historias` (`id` , `iteraciones_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_comentarios1`
    FOREIGN KEY (`comentarios_id`)
    REFERENCES `projectSCRUMBD`.`comentarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarea_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `projectSCRUMBD`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`estadosScrum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`estadosScrum` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `tarea_id` INT NOT NULL,
  PRIMARY KEY (`id`, `tarea_id`),
  INDEX `fk_estadosScrum_tarea1_idx` (`tarea_id` ASC),
  CONSTRAINT `fk_estadosScrum_tarea1`
    FOREIGN KEY (`tarea_id`)
    REFERENCES `projectSCRUMBD`.`tarea` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`roles_has_permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`roles_has_permisos` (
  `roles_id` INT NOT NULL,
  `permisos_id` INT NOT NULL,
  PRIMARY KEY (`roles_id`, `permisos_id`),
  INDEX `fk_roles_has_permisos_permisos1_idx` (`permisos_id` ASC),
  INDEX `fk_roles_has_permisos_roles_idx` (`roles_id` ASC),
  CONSTRAINT `fk_roles_has_permisos_roles`
    FOREIGN KEY (`roles_id`)
    REFERENCES `projectSCRUMBD`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_permisos_permisos1`
    FOREIGN KEY (`permisos_id`)
    REFERENCES `projectSCRUMBD`.`permisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`miembrosEquipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`miembrosEquipo` (
  `usuarios_id` INT NOT NULL,
  `equipos_id` INT NOT NULL,
  `id` INT NOT NULL,
  `projectos_id` INT NOT NULL,
  `projectos_organizacion_id` INT NOT NULL,
  PRIMARY KEY (`id`, `projectos_id`, `projectos_organizacion_id`),
  INDEX `fk_usuarios_has_equipos_equipos1_idx` (`equipos_id` ASC),
  INDEX `fk_usuarios_has_equipos_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_miembrosEquipo_projectos1_idx` (`projectos_id` ASC, `projectos_organizacion_id` ASC),
  CONSTRAINT `fk_usuarios_has_equipos_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `projectSCRUMBD`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_equipos_equipos1`
    FOREIGN KEY (`equipos_id`)
    REFERENCES `projectSCRUMBD`.`equipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_miembrosEquipo_projectos1`
    FOREIGN KEY (`projectos_id` , `projectos_organizacion_id`)
    REFERENCES `projectSCRUMBD`.`proyectos` (`id` , `organizacion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`material_has_tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`material_has_tarea` (
  `material_id` INT NOT NULL,
  `tarea_id` INT NOT NULL,
  PRIMARY KEY (`material_id`, `tarea_id`),
  INDEX `fk_material_has_tarea_tarea1_idx` (`tarea_id` ASC),
  INDEX `fk_material_has_tarea_material1_idx` (`material_id` ASC),
  CONSTRAINT `fk_material_has_tarea_material1`
    FOREIGN KEY (`material_id`)
    REFERENCES `projectSCRUMBD`.`material` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_has_tarea_tarea1`
    FOREIGN KEY (`tarea_id`)
    REFERENCES `projectSCRUMBD`.`tarea` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`personal` (
  `id` INT NOT NULL,
  `tipoPersonal` VARCHAR(500) NULL,
  `presupuesto` DECIMAL(6,4) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`personal_has_tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`personal_has_tarea` (
  `personal_id` INT NOT NULL,
  `tarea_id` INT NOT NULL,
  `tarea_historias_id` INT NOT NULL,
  `tarea_historias_iteraciones_id` INT NOT NULL,
  PRIMARY KEY (`personal_id`, `tarea_id`, `tarea_historias_id`, `tarea_historias_iteraciones_id`),
  INDEX `fk_personal_has_tarea_tarea1_idx` (`tarea_id` ASC, `tarea_historias_id` ASC, `tarea_historias_iteraciones_id` ASC),
  INDEX `fk_personal_has_tarea_personal1_idx` (`personal_id` ASC),
  CONSTRAINT `fk_personal_has_tarea_personal1`
    FOREIGN KEY (`personal_id`)
    REFERENCES `projectSCRUMBD`.`personal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personal_has_tarea_tarea1`
    FOREIGN KEY (`tarea_id` , `tarea_historias_id` , `tarea_historias_iteraciones_id`)
    REFERENCES `projectSCRUMBD`.`tarea` (`id` , `historias_id` , `historias_iteraciones_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`roles_has_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`roles_has_usuarios` (
  `roles_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`roles_id`, `usuarios_id`),
  INDEX `fk_roles_has_usuarios_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_roles_has_usuarios_roles1_idx` (`roles_id` ASC),
  CONSTRAINT `fk_roles_has_usuarios_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `projectSCRUMBD`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `projectSCRUMBD`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projectSCRUMBD`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectSCRUMBD`.`registro` (
  `id` INT NOT NULL,
  `accion` VARCHAR(100) NULL,
  `organizacion_id` INT NOT NULL,
  `hora` VARCHAR(45) NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`, `organizacion_id`, `usuarios_id`),
  INDEX `fk_registro_organizacion1_idx` (`organizacion_id` ASC),
  INDEX `fk_registro_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_registro_organizacion1`
    FOREIGN KEY (`organizacion_id`)
    REFERENCES `projectSCRUMBD`.`organizacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registro_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `projectSCRUMBD`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

 
 


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
