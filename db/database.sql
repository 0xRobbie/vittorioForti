drop database mydb;
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`departamentos` (
  `idDepartamentos` INT(11) NOT NULL AUTO_INCREMENT,
  `departamento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDepartamentos`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`formato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`formato` (
  `idFormato` INT(11) NOT NULL AUTO_INCREMENT,
  `formato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idFormato`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`sucursales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`sucursales` (
  `idSucursales` INT(11) NOT NULL,
  `sucursal` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(150) NOT NULL,
  `region` VARCHAR(45) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `municipio` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `cp` INT(11) NOT NULL,
  PRIMARY KEY (`idSucursales`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`lugarTrabajo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`lugarTrabajo` (
  `idLugarTrabajo` INT(11) NOT NULL AUTO_INCREMENT,
  `idDepartamentos` INT(11) NULL,
  `idSucursales` INT(11) NULL,
  PRIMARY KEY (`idLugarTrabajo`),
  INDEX `fk_tipousuario_departamentos1_idx` (`idDepartamentos` ASC) ,
  INDEX `fk_tipousuario_sucursales1_idx` (`idSucursales` ASC) ,
  CONSTRAINT `fk_tipousuario_departamentos1`
    FOREIGN KEY (`idDepartamentos`)
    REFERENCES `mydb`.`departamentos` (`idDepartamentos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipousuario_sucursales1`
    FOREIGN KEY (`idSucursales`)
    REFERENCES `mydb`.`sucursales` (`idSucursales`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoUsuario` (
  `idTipoUsuario` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `usuarios` VARCHAR(20) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `idLugarTrabajo` INT(11) NOT NULL,
  `idTipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  INDEX `fk_usuarios_lugarTrabajo1_idx` (`idLugarTrabajo` ASC) ,
  INDEX `fk_usuarios_tipoUsuario1_idx` (`idTipoUsuario` ASC) ,
  CONSTRAINT `fk_usuarios_lugarTrabajo1`
    FOREIGN KEY (`idLugarTrabajo`)
    REFERENCES `mydb`.`lugarTrabajo` (`idLugarTrabajo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_tipoUsuario1`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `mydb`.`tipoUsuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 62
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tipopapeleria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipopapeleria` (
  `idTipoPapeleria` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoPapeleria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoPapeleria`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`solicitudes` (
  `idSolicitudes` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuarios` INT(11) NOT NULL,
  `idTipoPapeleria` INT(11) NOT NULL,
  `observaciones` MEDIUMTEXT NULL DEFAULT NULL,
  `idRastreo` INT(11) NOT NULL,
  `ultimoMovimiento` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSolicitudes`),
  INDEX `fk_solicitudes_usuarios1_idx` (`idUsuarios` ASC) ,
  INDEX `fk_solicitudes_tipoPapeleria1_idx` (`idTipoPapeleria` ASC) ,
  INDEX `fk_solicitudes_rastreo1_idx` (`idTipoPapeleria` ASC) ,
  CONSTRAINT `fk_solicitudes_tipoPapeleria1`
    FOREIGN KEY (`idTipoPapeleria`)
    REFERENCES `mydb`.`tipopapeleria` (`idTipoPapeleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitudes_rastreo1`
    FOREIGN KEY (`idRastreo`)
    REFERENCES `mydb`.`rastreo` (`idRastreo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitudes_usuarios1`
    FOREIGN KEY (`idUsuarios`)
    REFERENCES `mydb`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`rastreo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rastreo` (
  `idRastreo` INT(11) NOT NULL AUTO_INCREMENT,
  `rastreo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRastreo`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`movimientoConsumibles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`movimientoConsumibles` (
  `idMovimientoConsumibles` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuarios` INT(11) NOT NULL,
  `idPapeleria` INT(11) NOT NULL,
  `piezas` INT(11) NOT NULL,
  `ultimoMovimiento` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSolicitudes` INT(11) NULL DEFAULT NULL,
  `idLugarTrabajo` INT(11) NOT NULL,
  PRIMARY KEY (`idMovimientoConsumibles`),
  INDEX `fk_movimientos_usuarios1_idx` (`idUsuarios` ASC) ,
  INDEX `fk_movimientos_papeleria1_idx` (`idPapeleria` ASC) ,
  INDEX `fk_movimientos_requerimientos1_idx` (`idSolicitudes` ASC) ,
  INDEX `fk_movimientos_tipousuario1_idx` (`idLugarTrabajo` ASC) ,
  CONSTRAINT `fk_movimientos_Usuarios1`
    FOREIGN KEY (`idUsuarios`)
    REFERENCES `mydb`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimientos_Papeleria1`
    FOREIGN KEY (`idPapeleria`)
    REFERENCES `mydb`.`papeleria` (`idPapeleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimientos_requerimientos1`
    FOREIGN KEY (`idSolicitudes`)
    REFERENCES `mydb`.`solicitudes` (`idSolicitudes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimientos_tipousuario1`
    FOREIGN KEY (`idLugarTrabajo`)
    REFERENCES `mydb`.`lugarTrabajo` (`idLugarTrabajo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 362
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`papeleria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`papeleria` (
  `idPapeleria` INT(11) NOT NULL AUTO_INCREMENT,
  `producto` VARCHAR(45) NOT NULL,
  `stockMinimo` INT(11) NOT NULL DEFAULT '0',
  `minimoSucursal` INT(11) NOT NULL DEFAULT '0',
  `idFormato` INT(11) NOT NULL,
  `idTipoPapeleria` INT(11) NOT NULL,
  PRIMARY KEY (`idPapeleria`),
  INDEX `fk_insumo_tipoDeInsumo1_idx` (`idTipoPapeleria` ASC) ,
  INDEX `fk_insumos_formato1_idx` (`idFormato` ASC) ,
  CONSTRAINT `fk_insumo_tipoDeInsumo1`
    FOREIGN KEY (`idTipoPapeleria`)
    REFERENCES `mydb`.`tipopapeleria` (`idTipoPapeleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_insumos_formato1`
    FOREIGN KEY (`idFormato`)
    REFERENCES `mydb`.`formato` (`idFormato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`folios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`folios` (
  `idFolios` INT NOT NULL AUTO_INCREMENT,
  `folioInicial` INT NOT NULL,
  `folioFinal` INT NOT NULL,
  `idPapeleria` INT(11) NOT NULL,
  `idMovimientoConsumibles` INT(11) NOT NULL,
  PRIMARY KEY (`idFolios`),
  INDEX `fk_folios_papeleria1_idx` (`idPapeleria` ASC) ,
  INDEX `fk_folios_movimientoConsumibles1_idx` (`idMovimientoConsumibles` ASC) ,
  CONSTRAINT `fk_folios_papeleria1`
    FOREIGN KEY (`idPapeleria`)
    REFERENCES `mydb`.`papeleria` (`idPapeleria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_folios_movimientoConsumibles1`
    FOREIGN KEY (`idMovimientoConsumibles`)
    REFERENCES `mydb`.`movimientoConsumibles` (`idMovimientoConsumibles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`insumos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`insumos` (
  `idInsumos` INT NOT NULL AUTO_INCREMENT,
  `insumo` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `piezas` INT NOT NULL,
  PRIMARY KEY (`idInsumos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`impresoras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`impresoras` (
  `idImpresoras` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(45) NOT NULL,
  `idInsumos` INT NOT NULL,
  PRIMARY KEY (`idImpresoras`),
  INDEX `fk_equipos_insumos1_idx` (`idInsumos` ASC) ,
  CONSTRAINT `fk_equipos_insumos1`
    FOREIGN KEY (`idInsumos`)
    REFERENCES `mydb`.`insumos` (`idInsumos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`fuentePoder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`fuentePoder` (
  `idFuentePoder` INT NOT NULL AUTO_INCREMENT,
  `fuentePoder` VARCHAR(45) NOT NULL,
  `watts` INT NOT NULL,
  PRIMARY KEY (`idFuentePoder`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ram`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ram` (
  `idRam` INT NOT NULL AUTO_INCREMENT,
  `ram` VARCHAR(45) NOT NULL,
  `capacidad` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRam`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`discosDuros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`discosDuros` (
  `idDiscosDuros` INT NOT NULL AUTO_INCREMENT,
  `disco` VARCHAR(45) NOT NULL,
  `capacidad` VARCHAR(45) NOT NULL,
  `tipoConexion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDiscosDuros`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`teclados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`teclados` (
  `idTeclados` INT NOT NULL AUTO_INCREMENT,
  `teclado` VARCHAR(45) NOT NULL,
  `inalambrico` BIT(1) NOT NULL,
  PRIMARY KEY (`idTeclados`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`mouses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`mouses` (
  `idMouses` INT NOT NULL AUTO_INCREMENT,
  `mouse` VARCHAR(45) NOT NULL,
  `inalambrico` BIT(1) NOT NULL,
  PRIMARY KEY (`idMouses`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`monitores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`monitores` (
  `idMonitores` INT NOT NULL AUTO_INCREMENT,
  `monitor` VARCHAR(45) NOT NULL,
  `resolucion` VARCHAR(45) NOT NULL,
  `puertos` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMonitores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tarjetasMadre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tarjetasMadre` (
  `idTarjetasMadre` INT NOT NULL AUTO_INCREMENT,
  `tarjeta` VARCHAR(45) NOT NULL,
  `procesador` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTarjetasMadre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`SO` (
  `idSO` INT NOT NULL AUTO_INCREMENT,
  `sistema` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipoArmado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipoArmado` (
  `idEquipoArmado` INT NOT NULL,
  `idFuentePoder` INT NOT NULL,
  `idRam` INT NOT NULL,
  `idDiscosDuros` INT NOT NULL,
  `idTeclados` INT NOT NULL,
  `idMouses` INT NOT NULL,
  `idMonitores` INT NOT NULL,
  `idTarjetasMadre` INT NOT NULL,
  `idSO` INT NOT NULL,
  PRIMARY KEY (`idEquipoArmado`),
  INDEX `fk_equipoArmado_fuentePoder1_idx` (`idFuentePoder` ASC) ,
  INDEX `fk_equipoArmado_ram1_idx` (`idRam` ASC) ,
  INDEX `fk_equipoArmado_hdd1_idx` (`idDiscosDuros` ASC) ,
  INDEX `fk_equipoArmado_teclados1_idx` (`idTeclados` ASC) ,
  INDEX `fk_equipoArmado_Mouses1_idx` (`idMouses` ASC) ,
  INDEX `fk_equipoArmado_Monitores1_idx` (`idMonitores` ASC) ,
  INDEX `fk_equipoArmado_tarjetasMadre1_idx` (`idTarjetasMadre` ASC) ,
  INDEX `fk_equipoArmado_sistemaOperativo1_idx` (`idSO` ASC) ,
  CONSTRAINT `fk_equipoArmado_fuentePoder1`
    FOREIGN KEY (`idFuentePoder`)
    REFERENCES `mydb`.`fuentePoder` (`idFuentePoder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_ram1`
    FOREIGN KEY (`idRam`)
    REFERENCES `mydb`.`ram` (`idRam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_hdd1`
    FOREIGN KEY (`idDiscosDuros`)
    REFERENCES `mydb`.`discosDuros` (`idDiscosDuros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_teclados1`
    FOREIGN KEY (`idTeclados`)
    REFERENCES `mydb`.`teclados` (`idTeclados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_Mouses1`
    FOREIGN KEY (`idMouses`)
    REFERENCES `mydb`.`mouses` (`idMouses`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_Monitores1`
    FOREIGN KEY (`idMonitores`)
    REFERENCES `mydb`.`monitores` (`idMonitores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_tarjetasMadre1`
    FOREIGN KEY (`idTarjetasMadre`)
    REFERENCES `mydb`.`tarjetasMadre` (`idTarjetasMadre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoArmado_sistemaOperativo1`
    FOREIGN KEY (`idSO`)
    REFERENCES `mydb`.`SO` (`idSO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoAsignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoAsignacion` (
  `idTipoAsignacion` INT NOT NULL AUTO_INCREMENT,
  `asignacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoAsignacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dispositivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`dispositivo` (
  `idDispositivo` INT NOT NULL AUTO_INCREMENT,
  `dispositivo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDispositivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dispositivoMovil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`dispositivoMovil` (
  `idDispositivoMovil` INT NOT NULL AUTO_INCREMENT,
  `idDispositivo` INT NOT NULL,
  `idSO` INT NOT NULL,
  `memoria` VARCHAR(45) NOT NULL,
  `almacenamiento` VARCHAR(45) NOT NULL,
  `identificador` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDispositivoMovil`),
  INDEX `fk_dispositivoMovil_dispositivo1_idx` (`idDispositivo` ASC) ,
  INDEX `fk_dispositivoMovil_sistemaOperativo1_idx` (`idSO` ASC) ,
  CONSTRAINT `fk_dispositivoMovil_dispositivo1`
    FOREIGN KEY (`idDispositivo`)
    REFERENCES `mydb`.`dispositivo` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dispositivoMovil_sistemaOperativo1`
    FOREIGN KEY (`idSO`)
    REFERENCES `mydb`.`SO` (`idSO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipos` (
  `idEquipos` INT NOT NULL AUTO_INCREMENT,
  `idImpresoras` INT NULL,
  `idEquipoArmado` INT NULL,
  `idDispositivoMovil` INT NULL,
  `idInsumos` INT NULL,
  PRIMARY KEY (`idEquipos`),
  INDEX `fk_equipos_impresoras1_idx` (`idImpresoras` ASC) ,
  INDEX `fk_equipos_equipoArmado1_idx` (`idEquipoArmado` ASC) ,
  INDEX `fk_equipos_dispositivoMovil1_idx` (`idDispositivoMovil` ASC) ,
  INDEX `fk_equipos_insumos2_idx` (`idInsumos` ASC) ,
  CONSTRAINT `fk_equipos_impresoras1`
    FOREIGN KEY (`idImpresoras`)
    REFERENCES `mydb`.`impresoras` (`idImpresoras`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipos_equipoArmado1`
    FOREIGN KEY (`idEquipoArmado`)
    REFERENCES `mydb`.`equipoArmado` (`idEquipoArmado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipos_dispositivoMovil1`
    FOREIGN KEY (`idDispositivoMovil`)
    REFERENCES `mydb`.`dispositivoMovil` (`idDispositivoMovil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipos_insumos2`
    FOREIGN KEY (`idInsumos`)
    REFERENCES `mydb`.`insumos` (`idInsumos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asignacionEquipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`asignacionEquipo` (
  `idAsignacionEquipo` INT NOT NULL AUTO_INCREMENT,
  `idUsuarios` INT(11) NOT NULL,
  `idTipoAsignacion` INT NOT NULL,
  `ultimoMovimiento` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idEquipos` INT NOT NULL,
  PRIMARY KEY (`idAsignacionEquipo`),
  INDEX `fk_asignacionEquipo_usuarios1_idx` (`idUsuarios` ASC) ,
  INDEX `fk_asignacionEquipo_tipoAsignacion1_idx` (`idTipoAsignacion` ASC) ,
  INDEX `fk_asignacionEquipo_equipos1_idx` (`idEquipos` ASC) ,
  CONSTRAINT `fk_asignacionEquipo_usuarios1`
    FOREIGN KEY (`idUsuarios`)
    REFERENCES `mydb`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacionEquipo_tipoAsignacion1`
    FOREIGN KEY (`idTipoAsignacion`)
    REFERENCES `mydb`.`tipoAsignacion` (`idTipoAsignacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacionEquipo_equipos1`
    FOREIGN KEY (`idEquipos`)
    REFERENCES `mydb`.`equipos` (`idEquipos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`marca` (
  `idMarca` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(45) NOT NULL,
  `idEquipos` INT NOT NULL,
  PRIMARY KEY (`idMarca`),
  INDEX `fk_marca_equipos1_idx` (`idEquipos` ASC) ,
  CONSTRAINT `fk_marca_equipos1`
    FOREIGN KEY (`idEquipos`)
    REFERENCES `mydb`.`equipos` (`idEquipos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`servicio` (
  `idServicio` INT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idServicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`claves`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`claves` (
  `idClaves` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `idServicio` INT NOT NULL,
  `idUsuarios` INT(11) NOT NULL,
  PRIMARY KEY (`idClaves`),
  INDEX `fk_claves_servicio1_idx` (`idServicio` ASC) ,
  INDEX `fk_claves_usuarios1_idx` (`idUsuarios` ASC) ,
  CONSTRAINT `fk_claves_servicio1`
    FOREIGN KEY (`idServicio`)
    REFERENCES `mydb`.`servicio` (`idServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_claves_usuarios1`
    FOREIGN KEY (`idUsuarios`)
    REFERENCES `mydb`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO sucursales (idSucursales, sucursal, direccion, region, colonia, municipio, estado, telefono, correo, cp) VALUES ("1",	"bolivar",	"Bolivar 34 P.B",	"(106) Cdmx - Centro Sur",	"Centro Histórico",	 "Delegacion Cuauhtemoc",	 "Ciudad de México",	"4593-8058",	"vfbolivar@vittorioforti.com.mx",	"6000");
INSERT INTO departamentos (idDepartamentos, departamento) VALUES (1, "sistemas");
INSERT INTO lugarTrabajo (idLugarTrabajo, idDepartamentos, idSucursales) VALUES (1, 1, null);
INSERT INTO lugarTrabajo (idLugarTrabajo, idDepartamentos, idSucursales) VALUES (16, null, 1);
INSERT INTO tipoUsuario (idTipoUsuario, tipo) VALUES (1, "persona");
INSERT INTO tipoUsuario (idTipoUsuario, tipo) VALUES (2, "sucursal");
INSERT INTO tipoUsuario (idTipoUsuario, tipo) VALUES (3, "departamento");
INSERT INTO usuarios (idUsuarios, usuarios, password, idLugarTrabajo, idTipoUsuario) VALUES (1, "Roberto", "1234", 1, 1);

INSERT INTO tipoPapeleria (idTipoPapeleria, tipoPapeleria) VALUES (1, "papeleria");
INSERT INTO tipoPapeleria (idTipoPapeleria, tipoPapeleria) VALUES (2, "papeleria impresa");
INSERT INTO formato (idFormato, formato) VALUES (1, "piezas");
INSERT INTO formato (idFormato, formato) VALUES (2, "block");
INSERT INTO formato (idFormato, formato) VALUES (3, "paquete");

alter table papeleria add column maximoSucursal int not null after minimoSucursal; 
INSERT INTO papeleria (idPapeleria, producto, stockMinimo, minimoSucursal, maximoSucursal, idFormato, idTipoPapeleria) VALUES (1, "lapiz", 10, 15, 50, 1, 1);
INSERT INTO papeleria (idPapeleria, producto, stockMinimo, minimoSucursal, maximoSucursal, idFormato, idTipoPapeleria) VALUES (2, "pluma", 10, 15, 50, 1, 1);
INSERT INTO papeleria (idPapeleria, producto, stockMinimo, minimoSucursal, maximoSucursal, idFormato, idTipoPapeleria) VALUES (3, "doc01", 10, 15, 50, 2, 2);
INSERT INTO papeleria (idPapeleria, producto, stockMinimo, minimoSucursal, maximoSucursal, idFormato, idTipoPapeleria) VALUES (4, "doc02", 10, 15, 50, 3, 2);

INSERT INTO rastreo (idRastreo, rastreo) VALUES (1, 'solicitud');
INSERT INTO rastreo (idRastreo, rastreo) VALUES (2, 'enviado');
INSERT INTO rastreo (idRastreo, rastreo) VALUES (3, 'sucursal/depto');

INSERT INTO servicio (idServicio, servicio) VALUES (1, 'correo');
INSERT INTO servicio (idServicio, servicio) VALUES (2, 'skype');
INSERT INTO servicio (idServicio, servicio) VALUES (3, 'proscai');

ALTER TABLE `papeleria` ADD `folio` BIT(1) NOT NULL DEFAULT b'0' AFTER `maximoSucursal`;
UPDATE `papeleria` SET `folio` = b'1' WHERE `papeleria`.`idPapeleria` = 4;