-- MySQL Script generated by MySQL Workbench
-- Mon Jan 29 16:27:10 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mame
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mame
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mame` DEFAULT CHARACTER SET utf8 ;
USE `mame` ;

-- -----------------------------------------------------
-- Table `mame`.`mangas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mame`.`mangas` (
  `idMangas` INT(11) NOT NULL AUTO_INCREMENT,
  `infos` TEXT NOT NULL,
  `mangaStatus` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`idMangas`),
  UNIQUE INDEX `idMangas_UNIQUE` (`idMangas` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mame`.`volumes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mame`.`volumes` (
  `volumeId` INT(11) NOT NULL AUTO_INCREMENT,
  `imgVol` VARCHAR(255) NULL DEFAULT NULL,
  `volNum` VARCHAR(10) NOT NULL,
  `volLink` VARCHAR(255) NOT NULL,
  `volServerName` VARCHAR(70) NOT NULL,
  `mangas_idMangas` INT(11) NOT NULL,
  PRIMARY KEY (`volumeId`, `mangas_idMangas`),
  UNIQUE INDEX `volumeId_UNIQUE` (`volumeId` ASC),
  INDEX `fk_volumes_mangas_idx` (`mangas_idMangas` ASC),
  CONSTRAINT `fk_volumes_mangas`
    FOREIGN KEY (`mangas_idMangas`)
    REFERENCES `mame`.`mangas` (`idMangas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mame`.`capitulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mame`.`capitulos` (
  `idcapitulos` INT NOT NULL AUTO_INCREMENT,
  `capname` VARCHAR(255) NOT NULL,
  `caplink` VARCHAR(255) NOT NULL,
  `capServerName` VARCHAR(70) NOT NULL,
  `mangas_idMangas` INT(11) NOT NULL,
  `volumes_volumeId` INT(11) NOT NULL,
  `volumes_mangas_idMangas` INT(11) NOT NULL,
  PRIMARY KEY (`idcapitulos`, `mangas_idMangas`, `volumes_volumeId`, `volumes_mangas_idMangas`),
  UNIQUE INDEX `idcapitulos_UNIQUE` (`idcapitulos` ASC),
  INDEX `fk_capitulos_mangas1_idx` (`mangas_idMangas` ASC),
  INDEX `fk_capitulos_volumes1_idx` (`volumes_volumeId` ASC, `volumes_mangas_idMangas` ASC),
  CONSTRAINT `fk_capitulos_mangas1`
    FOREIGN KEY (`mangas_idMangas`)
    REFERENCES `mame`.`mangas` (`idMangas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_capitulos_volumes1`
    FOREIGN KEY (`volumes_volumeId` , `volumes_mangas_idMangas`)
    REFERENCES `mame`.`volumes` (`volumeId` , `mangas_idMangas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
