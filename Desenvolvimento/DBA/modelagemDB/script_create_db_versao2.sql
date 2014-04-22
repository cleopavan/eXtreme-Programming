SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `controleAcademico` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `controleAcademico` ;

-- -----------------------------------------------------
-- Table `controleAcademico`.`cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`cargos` (
  `idcargos` INT NOT NULL ,
  `cargo` VARCHAR(45) NULL COMMENT 'ex. Professor do magistério superior\nAssistente adm\n...\n' ,
  PRIMARY KEY (`idcargos`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `controleAcademico`.`jornada`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`jornada` (
  `idJornada` INT NOT NULL AUTO_INCREMENT COMMENT '40 horas DE\n20 horas\nsubstituto\nvisitante	' ,
  `jornada` VARCHAR(45) NULL ,
  PRIMARY KEY (`idJornada`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `controleAcademico`.`situacaoServidor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`situacaoServidor` (
  `idsituacaoServidor` INT NOT NULL COMMENT 'Ativo\nAfastado\nRemovido\n...\n' ,
  `situacao` VARCHAR(45) NULL COMMENT 'Ativo\nRemovido\nLicença Maternidade\nLicença Formação\n...\n' ,
  `dataEntrada` DATETIME NULL COMMENT 'para o caso de afastamento\n' ,
  `dataSaida` DATETIME NULL ,
  PRIMARY KEY (`idsituacaoServidor`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `controleAcademico`.`servidores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`servidores` (
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
-- Table `controleAcademico`.`nivelCursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`nivelCursos` (
  `idnivelCursos` INT NOT NULL AUTO_INCREMENT COMMENT 'graduação, especialização,\n mestrado, doutorado.' ,
  `nivel` VARCHAR(45) NULL ,
  PRIMARY KEY (`idnivelCursos`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `controleAcademico`.`cursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`cursos` (
  `codCurso` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `nivel` INT NOT NULL ,
  PRIMARY KEY (`codCurso`) ,
  INDEX `nivel_idx` (`nivel` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `controleAcademico`.`dominios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`dominios` (
  `iddominios` INT NOT NULL ,
  `dominio` VARCHAR(45) NULL COMMENT 'Específico\nConexo\nComum\n' ,
  PRIMARY KEY (`iddominios`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `controleAcademico`.`ccrs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`ccrs` (
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
-- Table `controleAcademico`.`cursosCcrs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`cursosCcrs` (
  `codCcr` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  PRIMARY KEY (`codCcr`, `codCurso`) ,
  INDEX `fk_cursosCcrs_cursos1_idx` (`codCurso` ASC) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `controleAcademico`.`Salas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`Salas` (
  `numBloco` VARCHAR(1) NOT NULL ,
  `numSala` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  PRIMARY KEY (`numBloco`, `numSala`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controleAcademico`.`DiaSemana`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`DiaSemana` (
  `idSemana` INT NOT NULL ,
  `idDia` INT NOT NULL ,
  `dia` VARCHAR(45) NULL ,
  `semana` VARCHAR(45) NULL ,
  PRIMARY KEY (`idSemana`, `idDia`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controleAcademico`.`Periodos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`Periodos` (
  `idPeriodo` INT NOT NULL ,
  `idSubPeriodo` INT NOT NULL ,
  `periodo` VARCHAR(45) NULL ,
  `horaInicio` TIME NULL ,
  `horaFim` TIME NULL ,
  PRIMARY KEY (`idPeriodo`, `idSubPeriodo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controleAcademico`.`Horarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`Horarios` (
  `idHorario` INT NOT NULL AUTO_INCREMENT ,
  `semana` INT NOT NULL ,
  `dia` INT NOT NULL ,
  `periodo` INT NOT NULL ,
  `subPeriodo` INT NOT NULL ,
  PRIMARY KEY (`idHorario`) ,
  INDEX `fk_Horarios_DiaSemana1` (`semana` ASC, `dia` ASC) ,
  INDEX `fk_Horarios_Periodos1` (`periodo` ASC, `subPeriodo` ASC) ,
  CONSTRAINT `fk_Horarios_DiaSemana1`
    FOREIGN KEY (`semana` , `dia` )
    REFERENCES `controleAcademico`.`DiaSemana` (`idSemana` , `idDia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Horarios_Periodos1`
    FOREIGN KEY (`periodo` , `subPeriodo` )
    REFERENCES `controleAcademico`.`Periodos` (`idPeriodo` , `idSubPeriodo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controleAcademico`.`Alocacao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`Alocacao` (
  `idAlocacao` INT NOT NULL AUTO_INCREMENT ,
  `bloco` VARCHAR(1) NOT NULL ,
  `sala` INT NOT NULL ,
  `horario` INT NOT NULL ,
  PRIMARY KEY (`idAlocacao`) ,
  INDEX `fk_Salas_has_Horarios_Horarios1` (`horario` ASC) ,
  INDEX `fk_Salas_has_Horarios_Salas1` (`bloco` ASC, `sala` ASC) ,
  CONSTRAINT `fk_Salas_has_Horarios_Salas1`
    FOREIGN KEY (`bloco` , `sala` )
    REFERENCES `controleAcademico`.`Salas` (`numBloco` , `numSala` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Salas_has_Horarios_Horarios1`
    FOREIGN KEY (`horario` )
    REFERENCES `controleAcademico`.`Horarios` (`idHorario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controleAcademico`.`ServidorCursoCcr`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`ServidorCursoCcr` (
  `anoSemestre` CHAR(8) NOT NULL COMMENT 'ex. 2014.1, 2014.2\n' ,
  `codCcr` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  `siape` CHAR(7) NOT NULL ,
  `alocacao` INT NULL ,
  `observacoes` TEXT NULL ,
  PRIMARY KEY (`anoSemestre`, `codCcr`, `codCurso`, `siape`) ,
  INDEX `fk_ServidorCursoCcr_cursosCcrs1_idx` (`codCcr` ASC, `codCurso` ASC) ,
  INDEX `fk_ServidorCursoCcr_servidores1_idx` (`siape` ASC) ,
  INDEX `fk_ServidorCursoCcr_Salas_has_Horarios1` (`alocacao` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `controleAcademico`.`funcao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`funcao` (
  `idFuncao` INT NOT NULL ,
  `funcao` VARCHAR(45) NULL COMMENT 'Ex. Coordenador de laboratório\n' ,
  PRIMARY KEY (`idFuncao`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `controleAcademico`.`servidoresFuncoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `controleAcademico`.`servidoresFuncoes` (
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
