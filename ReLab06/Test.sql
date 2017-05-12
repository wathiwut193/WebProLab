
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------

-- Schema mydb

-- -----------------------------------------------------

-- 
-----------------------------------------------------

-- Schema mydb

-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;

USE `mydb` ;
-- -----------------------------------------------------

-- Table `mydb`.`Member`

-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Member` (
  
`M_id` INT NOT NULL,
  
`M_fname` VARCHAR(25) NOT NULL,
  
`M_lname` VARCHAR(25) NOT NULL,
  
`M_Position` VARCHAR(50) NOT NULL,
  
PRIMARY KEY (`M_id`))

ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `mydb`.`Commend`

-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`Commend` (
 
 `C_id` INT NOT NULL,
  
`C_genid` VARCHAR(50) NOT NULL,
  
`C_startdate` DATE NOT NULL,
  
`C_enddate` DATE NULL,
  
`C_status` VARCHAR(1) NOT NULL,
  
`C_link` VARCHAR(300) NOT NULL,
 
 PRIMARY KEY (`C_id`))

ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `mydb`.`Member_has_Commend`

-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`Member_has_Commend` (

  `M_id` INT NOT NULL,
  
`C_id` INT NOT NULL,
  
PRIMARY KEY (`M_id`, `C_id`),
  
INDEX `fk_Member_has_Commend_Commend1_idx` (`C_id` ASC),
  
INDEX `fk_Member_has_Commend_Member_idx` (`M_id` ASC))

ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
