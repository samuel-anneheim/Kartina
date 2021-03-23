-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema kartina
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kartina
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kartina` DEFAULT CHARACTER SET utf8 ;
USE `kartina` ;

-- -----------------------------------------------------
-- Table `kartina`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `civilite` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `pwd` VARCHAR(255) NOT NULL,
  `telephone` VARCHAR(45) NULL,
  `isArtiste` TINYINT NOT NULL,
  `presentation` LONGTEXT NULL,
  `facebook` VARCHAR(255) NULL,
  `instagram` VARCHAR(255) NULL,
  `pinterest` VARCHAR(255) NULL,
  `twitter` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`orientation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`orientation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`oeuvre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`oeuvre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `prix` FLOAT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `quantite` INT NOT NULL,
  `orientation_id` INT NOT NULL,
  `categorie_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ouevre_orientation1_idx` (`orientation_id` ASC),
  INDEX `fk_ouevre_categorie1_idx` (`categorie_id` ASC),
  INDEX `fk_ouevre_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ouevre_orientation1`
    FOREIGN KEY (`orientation_id`)
    REFERENCES `kartina`.`orientation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ouevre_categorie1`
    FOREIGN KEY (`categorie_id`)
    REFERENCES `kartina`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ouevre_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kartina`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`adresse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`adresse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NOT NULL,
  `typeRue` VARCHAR(45) NOT NULL,
  `rue` VARCHAR(255) NOT NULL,
  `cp` VARCHAR(45) NOT NULL,
  `ville` VARCHAR(255) NOT NULL,
  `supplement` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`finition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`finition` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`cadre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`cadre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`format`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`format` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `dimension` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`tag` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`commande` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_commande_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_commande_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kartina`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`LigneArticle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`LigneArticle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantite` INT NOT NULL,
  `ouevre_id` INT NOT NULL,
  `commande_id` INT NOT NULL,
  `finition_id` INT NOT NULL,
  `cadre_id` INT NOT NULL,
  `format_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_LigneArticle_ouevre1_idx` (`ouevre_id` ASC),
  INDEX `fk_LigneArticle_commande1_idx` (`commande_id` ASC),
  INDEX `fk_LigneArticle_finition1_idx` (`finition_id` ASC),
  INDEX `fk_LigneArticle_cadre1_idx` (`cadre_id` ASC),
  INDEX `fk_LigneArticle_format1_idx` (`format_id` ASC),
  CONSTRAINT `fk_LigneArticle_ouevre1`
    FOREIGN KEY (`ouevre_id`)
    REFERENCES `kartina`.`oeuvre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LigneArticle_commande1`
    FOREIGN KEY (`commande_id`)
    REFERENCES `kartina`.`commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LigneArticle_finition1`
    FOREIGN KEY (`finition_id`)
    REFERENCES `kartina`.`finition` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LigneArticle_cadre1`
    FOREIGN KEY (`cadre_id`)
    REFERENCES `kartina`.`cadre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LigneArticle_format1`
    FOREIGN KEY (`format_id`)
    REFERENCES `kartina`.`format` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`facture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`facture` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `commande_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_facture_commande1_idx` (`commande_id` ASC),
  CONSTRAINT `fk_facture_commande1`
    FOREIGN KEY (`commande_id`)
    REFERENCES `kartina`.`commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`adresse_has_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`adresse_has_user` (
  `adresse_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`adresse_id`, `user_id`),
  INDEX `fk_adresse_has_user_user1_idx` (`user_id` ASC),
  INDEX `fk_adresse_has_user_adresse1_idx` (`adresse_id` ASC),
  CONSTRAINT `fk_adresse_has_user_adresse1`
    FOREIGN KEY (`adresse_id`)
    REFERENCES `kartina`.`adresse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adresse_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `kartina`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`oeuvre_has_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`oeuvre_has_tag` (
  `ouevre_id` INT NOT NULL,
  `tag_id` INT NOT NULL,
  PRIMARY KEY (`ouevre_id`, `tag_id`),
  INDEX `fk_ouevre_has_tag_tag1_idx` (`tag_id` ASC),
  INDEX `fk_ouevre_has_tag_ouevre1_idx` (`ouevre_id` ASC),
  CONSTRAINT `fk_ouevre_has_tag_ouevre1`
    FOREIGN KEY (`ouevre_id`)
    REFERENCES `kartina`.`oeuvre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ouevre_has_tag_tag1`
    FOREIGN KEY (`tag_id`)
    REFERENCES `kartina`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`oeuvre_has_format`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`oeuvre_has_format` (
  `ouevre_id` INT NOT NULL,
  `format_id` INT NOT NULL,
  PRIMARY KEY (`ouevre_id`, `format_id`),
  INDEX `fk_ouevre_has_format_format1_idx` (`format_id` ASC),
  INDEX `fk_ouevre_has_format_ouevre1_idx` (`ouevre_id` ASC),
  CONSTRAINT `fk_ouevre_has_format_ouevre1`
    FOREIGN KEY (`ouevre_id`)
    REFERENCES `kartina`.`oeuvre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ouevre_has_format_format1`
    FOREIGN KEY (`format_id`)
    REFERENCES `kartina`.`format` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`couleur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`couleur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kartina`.`oeuvre_has_couleur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kartina`.`oeuvre_has_couleur` (
  `ouevre_id` INT NOT NULL,
  `couleur_id` INT NOT NULL,
  PRIMARY KEY (`ouevre_id`, `couleur_id`),
  INDEX `fk_ouevre_has_couleur_couleur1_idx` (`couleur_id` ASC),
  INDEX `fk_ouevre_has_couleur_ouevre1_idx` (`ouevre_id` ASC),
  CONSTRAINT `fk_ouevre_has_couleur_ouevre1`
    FOREIGN KEY (`ouevre_id`)
    REFERENCES `kartina`.`oeuvre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ouevre_has_couleur_couleur1`
    FOREIGN KEY (`couleur_id`)
    REFERENCES `kartina`.`couleur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
