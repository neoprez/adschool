-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema adschool
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `adschool` ;

-- -----------------------------------------------------
-- Schema adschool
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `adschool` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `adschool` ;

-- -----------------------------------------------------
-- Table `adschool`.`SCHOOL`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adschool`.`SCHOOL` ;

CREATE TABLE IF NOT EXISTS `adschool`.`SCHOOL` (
  `IDT_SCHOOL` INT NOT NULL,
  `NAM_SCHOOL` VARCHAR(45) NOT NULL,
  `LAT_LOC_SCHOOL` DOUBLE NOT NULL,
  `LON_LOC_SCHOOL` DOUBLE NOT NULL,
  `SUF_SCHOOL` VARCHAR(45) NOT NULL COMMENT 'SUFFIX OF SCHOOL EMAIL',
  PRIMARY KEY (`IDT_SCHOOL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adschool`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adschool`.`USER` ;

CREATE TABLE IF NOT EXISTS `adschool`.`USER` (
  `IDT_USER` INT NOT NULL,
  `FNM_USER` VARCHAR(45) NOT NULL COMMENT 'USER\'S FIRST NAME',
  `LNM_USER` VARCHAR(45) NULL COMMENT 'USER\'S LAST NAME',
  `PMS_USER` INT NOT NULL COMMENT '1: SCHOOL\n2: STUDENTS\n3: ORGANIZATIONS',
  `PSW_USER` VARCHAR(45) NOT NULL COMMENT 'PASSWORD',
  `EML_USER` VARCHAR(45) NOT NULL COMMENT 'User email',
  `CPN_USER` VARCHAR(45) NULL COMMENT 'CELLPHONE NUMBER OF USER',
  `SND_EML_USER` VARCHAR(45) NULL,
  `IMG_USER` VARCHAR(45) NULL,
  `SCHOOL_IDT_SCHOOL` INT NULL,
  PRIMARY KEY (`IDT_USER`),
  INDEX `fk_USER_SCHOOL1_idx` (`SCHOOL_IDT_SCHOOL` ASC),
  CONSTRAINT `fk_USER_SCHOOL1`
    FOREIGN KEY (`SCHOOL_IDT_SCHOOL`)
    REFERENCES `adschool`.`SCHOOL` (`IDT_SCHOOL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adschool`.`EVENT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adschool`.`EVENT` ;

CREATE TABLE IF NOT EXISTS `adschool`.`EVENT` (
  `IDT_EVENT` INT NOT NULL,
  `NAM_EVENT` VARCHAR(45) NOT NULL,
  `DAT_STR_EVENT` DATETIME NOT NULL COMMENT 'START TIME OF EVENT',
  `DAT_END_EVENT` DATETIME NOT NULL COMMENT 'END TIME OF EVENT',
  `PRC_EVENT` DOUBLE NOT NULL,
  `LOC_EVENT` TEXT NOT NULL COMMENT 'LOCATION OF EVENT',
  `LNK_EVENT` VARCHAR(45) NULL,
  `DSC_EVENT` LONGTEXT NULL COMMENT 'DEscription of event',
  `TAG_EVENT` VARCHAR(45) NULL COMMENT 'TAGS OF EVENT',
  `PIC_EVENT` LONGTEXT NULL COMMENT 'PATH PICTURE OF EVENT',
  PRIMARY KEY (`IDT_EVENT`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adschool`.`CREATOR_EVENT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adschool`.`CREATOR_EVENT` ;

CREATE TABLE IF NOT EXISTS `adschool`.`CREATOR_EVENT` (
  `IDT_USER_EVENT` INT NOT NULL,
  `USER_IDT_USER` INT NOT NULL,
  `EVENT_IDT_EVENT` INT NOT NULL,
  `DAT_USER_EVENT` DATETIME NOT NULL COMMENT 'WHEN THE EVENT WAS CREATED BY USER.',
  PRIMARY KEY (`IDT_USER_EVENT`),
  INDEX `fk_USER_EVENT_USER_idx` (`USER_IDT_USER` ASC),
  INDEX `fk_USER_EVENT_EVENT1_idx` (`EVENT_IDT_EVENT` ASC),
  CONSTRAINT `fk_USER_EVENT_USER`
    FOREIGN KEY (`USER_IDT_USER`)
    REFERENCES `adschool`.`USER` (`IDT_USER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USER_EVENT_EVENT1`
    FOREIGN KEY (`EVENT_IDT_EVENT`)
    REFERENCES `adschool`.`EVENT` (`IDT_EVENT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adschool`.`USER_EVENT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adschool`.`USER_EVENT` ;

CREATE TABLE IF NOT EXISTS `adschool`.`USER_EVENT` (
  `IDT_USER_EVENT` INT NOT NULL,
  `USER_IDT_USER` INT NOT NULL,
  `EVENT_IDT_EVENT` INT NOT NULL,
  `SND_MSG_EVENT` TINYINT(1) NOT NULL COMMENT '1: TEXT ME WHEN EVENT IS NEAR TO START\n0: DON\'T TEXT ME',
  `WHN_TXT_EVENT` DATETIME NULL COMMENT 'WHEN TEXT USER ABOUT THE EVENT: OPTIONS ARE\n1 DAY BEFORE THE EVENT\n8 HOURS BEFORE EVENT\n2 HOURS BEFORE EVENT',
  PRIMARY KEY (`IDT_USER_EVENT`),
  INDEX `fk_USER_EVENT_USER1_idx` (`USER_IDT_USER` ASC),
  INDEX `fk_USER_EVENT_EVENT2_idx` (`EVENT_IDT_EVENT` ASC),
  CONSTRAINT `fk_USER_EVENT_USER1`
    FOREIGN KEY (`USER_IDT_USER`)
    REFERENCES `adschool`.`USER` (`IDT_USER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USER_EVENT_EVENT2`
    FOREIGN KEY (`EVENT_IDT_EVENT`)
    REFERENCES `adschool`.`EVENT` (`IDT_EVENT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE = '';
GRANT USAGE ON *.* TO ROOT_ADSCHOOL;
 DROP USER ROOT_ADSCHOOL;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'ROOT_ADSCHOOL' IDENTIFIED BY 'root';

GRANT ALL ON `adschool`.* TO 'ROOT_ADSCHOOL';
SET SQL_MODE = '';
GRANT USAGE ON *.* TO APP_ADSCHOOL;
 DROP USER APP_ADSCHOOL;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'APP_ADSCHOOL' IDENTIFIED BY 'app';

GRANT SELECT, INSERT, TRIGGER ON TABLE `adschool`.* TO 'APP_ADSCHOOL';
GRANT SELECT ON TABLE `adschool`.* TO 'APP_ADSCHOOL';
GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `adschool`.* TO 'APP_ADSCHOOL';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `adschool`.`SCHOOL`
-- -----------------------------------------------------
START TRANSACTION;
USE `adschool`;
INSERT INTO `adschool`.`SCHOOL` (`IDT_SCHOOL`, `NAM_SCHOOL`, `LAT_LOC_SCHOOL`, `LON_LOC_SCHOOL`, `SUF_SCHOOL`) VALUES (1, 'Lehman College', 40.8725, -73.8939, 'lc.cuny.edu');
INSERT INTO `adschool`.`SCHOOL` (`IDT_SCHOOL`, `NAM_SCHOOL`, `LAT_LOC_SCHOOL`, `LON_LOC_SCHOOL`, `SUF_SCHOOL`) VALUES (2, 'City College of New York', 40.8194, -73.9500, 'ccny.cuny.edu');
INSERT INTO `adschool`.`SCHOOL` (`IDT_SCHOOL`, `NAM_SCHOOL`, `LAT_LOC_SCHOOL`, `LON_LOC_SCHOOL`, `SUF_SCHOOL`) VALUES (3, 'Columbia University', 40.8075, -73.9619, 'columbia.edu');

COMMIT;

