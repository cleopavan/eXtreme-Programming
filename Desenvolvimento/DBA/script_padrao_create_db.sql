SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `a6233819_000web` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `a6233819_000web` ;

-- -----------------------------------------------------
-- Table `a6233819_000web`.`cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`cargos` (
  `idcargos` INT NOT NULL ,
  `cargo` VARCHAR(45) NULL COMMENT 'ex. Professor do magistério superior\nAssistente adm\n...\n' ,
  PRIMARY KEY (`idcargos`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`jornada`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`jornada` (
  `idJornada` INT NOT NULL AUTO_INCREMENT COMMENT '40 horas DE\n20 horas\nsubstituto\nvisitante	' ,
  `jornada` VARCHAR(45) NULL ,
  PRIMARY KEY (`idJornada`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`situacaoServidor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`situacaoServidor` (
  `idsituacaoServidor` INT NOT NULL COMMENT 'Ativo\nAfastado\nRemovido\n...\n' ,
  `situacao` VARCHAR(45) NULL COMMENT 'Ativo\nRemovido\nLicença Maternidade\nLicença Formação\n...\n' ,
  `dataEntrada` DATETIME NULL COMMENT 'para o caso de afastamento\n' ,
  `dataSaida` DATETIME NULL ,
  PRIMARY KEY (`idsituacaoServidor`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`servidores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`servidores` (
  `siape` CHAR(7) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `sobrenome` VARCHAR(60) NOT NULL ,
  `observacao` TEXT NULL ,
  `quemSubstitui` CHAR(7) NULL COMMENT 'indicar docente que será substituido\n' ,
  `cargo` INT NOT NULL ,
  `jornada` INT NOT NULL ,
  `situacao` INT NOT NULL ,
  `fone1` CHAR(15) NULL ,
  `fone2` CHAR(15) NULL ,
  `endereco` VARCHAR(60) NULL ,
  `cidade` VARCHAR(45) NULL ,
  PRIMARY KEY (`siape`) ,
  INDEX `cargo_idx` (`cargo` ASC) ,
  INDEX `jornada_idx` (`jornada` ASC) ,
  INDEX `situacao_idx` (`situacao` ASC) ,
  INDEX `quemSubstitui_idx` (`quemSubstitui` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`nivelCursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`nivelCursos` (
  `idnivelCursos` INT NOT NULL AUTO_INCREMENT COMMENT 'graduação, especialização,\n mestrado, doutorado.' ,
  `nivel` VARCHAR(45) NULL ,
  PRIMARY KEY (`idnivelCursos`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`cursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`cursos` (
  `codCurso` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `nivel` INT NOT NULL ,
  PRIMARY KEY (`codCurso`) ,
  INDEX `nivel_idx` (`nivel` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`dominios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`dominios` (
  `iddominios` INT NOT NULL ,
  `dominio` VARCHAR(45) NULL COMMENT 'Específico\nConexo\nComum\n' ,
  PRIMARY KEY (`iddominios`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`ccrs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`ccrs` (
  `codCcr` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `cHoraria` SMALLINT NULL ,
  `dominio` INT NOT NULL ,
  PRIMARY KEY (`codCcr`) ,
  INDEX `dominio_idx` (`dominio` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`cursosCcrs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`cursosCcrs` (
  `codCcr` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  PRIMARY KEY (`codCcr`, `codCurso`) ,
  INDEX `fk_cursosCcrs_cursos1_idx` (`codCurso` ASC) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`ServidorCursoCcr`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`ServidorCursoCcr` (
  `anoSemestre` CHAR(8) NOT NULL COMMENT 'ex. 2014.1, 2014.2\n' ,
  `codCcr` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  `siape` CHAR(7) NOT NULL ,
  `observacoes` TEXT NULL ,
  PRIMARY KEY (`anoSemestre`, `codCcr`, `codCurso`, `siape`) ,
  INDEX `fk_ServidorCursoCcr_cursosCcrs1_idx` (`codCcr` ASC, `codCurso` ASC) ,
  INDEX `fk_ServidorCursoCcr_servidores1_idx` (`siape` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`funcao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`funcao` (
  `idFuncao` INT NOT NULL ,
  `funcao` VARCHAR(45) NULL COMMENT 'Ex. Coordenador de laboratório\n' ,
  PRIMARY KEY (`idFuncao`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `a6233819_000web`.`servidoresFuncoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `a6233819_000web`.`servidoresFuncoes` (
  `idFuncao` INT NOT NULL COMMENT 'três chaves para que o servidor possa retornar ao cargo varias vezes em períodos diferentes.\n' ,
  `siape` CHAR(7) NOT NULL ,
  `dataInicio` DATETIME NOT NULL ,
  `dataSaida` DATETIME NULL ,
  `cargaHoraria` TINYINT NOT NULL ,
  PRIMARY KEY (`idFuncao`, `siape`, `dataInicio`) ,
  INDEX `idFuncao_idx` (`idFuncao` ASC) ,
  INDEX `siape_idx` (`siape` ASC) )
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
