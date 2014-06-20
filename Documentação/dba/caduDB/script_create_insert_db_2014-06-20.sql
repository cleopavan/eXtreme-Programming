SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `u454558226_cadu` ;
CREATE SCHEMA IF NOT EXISTS `u454558226_cadu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `u454558226_cadu` ;

-- -----------------------------------------------------
-- Table `u454558226_cadu`.`cargo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`cargo` (
  `idCargos` INT NOT NULL AUTO_INCREMENT ,
  `cargo` VARCHAR(45) NULL COMMENT 'ex. Professor do magistério superior\nAssistente adm\n...\n' ,
  `regValido` TINYINT(1) NULL ,
  PRIMARY KEY (`idCargos`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`jornada`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`jornada` (
  `idJornada` INT NOT NULL AUTO_INCREMENT COMMENT '40 horas DE\n20 horas\nsubstituto\nvisitante	' ,
  `jornada` VARCHAR(45) NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idJornada`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`situacaoServidor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`situacaoServidor` (
  `idSituacaoServidor` INT NOT NULL AUTO_INCREMENT COMMENT 'Ativo\nAfastado\nRemovido\n...\n' ,
  `situacao` VARCHAR(45) NULL COMMENT 'Ativo\nRemovido\nLicença Maternidade\nLicença Formação\n...\n' ,
  `dataEntrada` DATETIME NULL COMMENT 'para o caso de afastamento\n' ,
  `dataSaida` DATETIME NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idSituacaoServidor`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`nivelServidor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`nivelServidor` (
  `idNivelServidor` INT NOT NULL AUTO_INCREMENT ,
  `nivel` VARCHAR(45) NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idNivelServidor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`servidor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`servidor` (
  `siape` CHAR(15) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `sobrenome` VARCHAR(60) NOT NULL ,
  `observacao` TEXT NULL ,
  `quemSubstitui` CHAR(15) NULL COMMENT 'indicar docente que será substituido\n' ,
  `idCargo` INT NOT NULL ,
  `idJornada` INT NOT NULL ,
  `idSituacaoServidor` INT NOT NULL ,
  `email` VARCHAR(60) NULL ,
  `fone1` CHAR(15) NULL ,
  `fone2` CHAR(15) NULL ,
  `endereco` VARCHAR(60) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `senha` VARCHAR(45) NULL ,
  `idNivelServidor` INT NOT NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`siape`) ,
  INDEX `cargo_idx` (`idCargo` ASC) ,
  INDEX `jornada_idx` (`idJornada` ASC) ,
  INDEX `situacao_idx` (`idSituacaoServidor` ASC) ,
  INDEX `quemSubstitui_idx` (`quemSubstitui` ASC) ,
  INDEX `fk_servidores_nivel1_idx` (`idNivelServidor` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`nivelCurso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`nivelCurso` (
  `idNivelCursos` INT NOT NULL AUTO_INCREMENT COMMENT 'graduação, especialização,\n mestrado, doutorado.' ,
  `nomeNivelCurso` VARCHAR(45) NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idNivelCursos`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`curso` (
  `codCurso` INT NOT NULL ,
  `nomeCurso` VARCHAR(45) NULL ,
  `idNivelCursos` INT NOT NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`codCurso`) ,
  INDEX `nivel_idx` (`idNivelCursos` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`dominio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`dominio` (
  `idDominio` INT NOT NULL AUTO_INCREMENT ,
  `nomeDominio` VARCHAR(45) NULL COMMENT 'Específico\nConexo\nComum\n' ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idDominio`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`ccr`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`ccr` (
  `codCcr` INT NOT NULL ,
  `nomeCcr` VARCHAR(145) NULL ,
  `cHoraria` SMALLINT NULL ,
  `idDominio` INT NOT NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`codCcr`) ,
  INDEX `dominio_idx` (`idDominio` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`cursoCcr`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`cursoCcr` (
  `codCcr` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`codCcr`, `codCurso`) ,
  INDEX `fk_cursosCcrs_cursos1_idx` (`codCurso` ASC) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`servidorCursoCcr`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`servidorCursoCcr` (
  `anoSemestre` VARCHAR(8) NOT NULL ,
  `codCcr` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  `siape` CHAR(15) NOT NULL ,
  `observacoes` TEXT NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`anoSemestre`, `codCcr`, `codCurso`, `siape`) ,
  INDEX `fk_ServidorCursoCcr_cursosCcrs1_idx` (`codCcr` ASC, `codCurso` ASC) ,
  INDEX `fk_ServidorCursoCcr_servidores1_idx` (`siape` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`funcao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`funcao` (
  `idFuncao` INT NOT NULL AUTO_INCREMENT ,
  `funcao` VARCHAR(45) NULL COMMENT 'Ex. Coordenador de laboratório\n' ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idFuncao`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`servidorFuncao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`servidorFuncao` (
  `idFuncao` INT NOT NULL COMMENT 'três chaves para que o servidor possa retornar ao cargo varias vezes em períodos diferentes.\n' ,
  `siape` CHAR(15) NOT NULL ,
  `dataInicio` DATETIME NOT NULL ,
  `dataSaida` DATETIME NULL ,
  `cargaHoraria` TINYINT NOT NULL ,
  `regValido` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idFuncao`, `siape`, `dataInicio`) ,
  INDEX `idFuncao_idx` (`idFuncao` ASC) ,
  INDEX `siape_idx` (`siape` ASC) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`sala`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`sala` (
  `numBloco` VARCHAR(1) NOT NULL ,
  `numSala` INT NOT NULL ,
  `descricaoSala` VARCHAR(45) NULL ,
  PRIMARY KEY (`numBloco`, `numSala`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`periodo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`periodo` (
  `idDiaSemana` VARCHAR(45) NOT NULL ,
  `idTurno` INT NOT NULL ,
  `idPeriodo` INT NOT NULL ,
  `diaSemana` VARCHAR(45) NULL ,
  `turno` VARCHAR(45) NULL ,
  `horaInicio` TIME NULL ,
  `horaFim` TIME NULL ,
  PRIMARY KEY (`idDiaSemana`, `idTurno`, `idPeriodo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`areaMenu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`areaMenu` (
  `idAreaMenu` INT NOT NULL AUTO_INCREMENT ,
  `nomeAreaMenu` VARCHAR(45) NULL ,
  `descricaoAreaMenu` VARCHAR(45) NULL ,
  `linkAreaMenu` VARCHAR(45) NULL ,
  PRIMARY KEY (`idAreaMenu`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`nivelServidor_areaMenu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`nivelServidor_areaMenu` (
  `idNivelServidor` INT NOT NULL ,
  `idAreaMenu` INT NOT NULL ,
  PRIMARY KEY (`idNivelServidor`, `idAreaMenu`) ,
  INDEX `fk_nivelServidor_has_menu1_menu1_idx` (`idAreaMenu` ASC) ,
  INDEX `fk_nivelServidor_has_menu1_nivelServidor1_idx` (`idNivelServidor` ASC) ,
  CONSTRAINT `fk_nivelServidor_has_menu1_nivelServidor1`
    FOREIGN KEY (`idNivelServidor` )
    REFERENCES `u454558226_cadu`.`nivelServidor` (`idNivelServidor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nivelServidor_has_menu1_menu1`
    FOREIGN KEY (`idAreaMenu` )
    REFERENCES `u454558226_cadu`.`areaMenu` (`idAreaMenu` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`statusAlocacao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`statusAlocacao` (
  `idStatusAlocacao` INT NOT NULL ,
  `descricaoStatusAlocacao` VARCHAR(45) NULL ,
  PRIMARY KEY (`idStatusAlocacao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u454558226_cadu`.`alocacao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `u454558226_cadu`.`alocacao` (
  `anoSemestre` VARCHAR(8) NOT NULL ,
  `idDiaSemana` VARCHAR(45) NOT NULL ,
  `idTurno` INT NOT NULL ,
  `idPeriodo` INT NOT NULL ,
  `numBloco` VARCHAR(1) NOT NULL ,
  `numSala` INT NOT NULL ,
  `codCurso` INT NOT NULL ,
  `codCcr` INT NOT NULL ,
  `siape` CHAR(15) NOT NULL ,
  `idStatusAlocacao` INT NOT NULL ,
  INDEX `fk_alocacao_servidorCursoCcr1` (`anoSemestre` ASC, `codCcr` ASC, `codCurso` ASC, `siape` ASC) ,
  INDEX `fk_alocacao_sala1` (`numBloco` ASC, `numSala` ASC) ,
  INDEX `fk_alocacao_statusAlocacao1` (`idStatusAlocacao` ASC) ,
  PRIMARY KEY (`anoSemestre`, `idDiaSemana`, `idTurno`, `idPeriodo`, `numBloco`, `numSala`) ,
  INDEX `fk_alocacao_periodo1` (`idDiaSemana` ASC, `idTurno` ASC, `idPeriodo` ASC) ,
  CONSTRAINT `fk_alocacao_servidorCursoCcr1`
    FOREIGN KEY (`anoSemestre` , `codCcr` , `codCurso` , `siape` )
    REFERENCES `u454558226_cadu`.`servidorCursoCcr` (`anoSemestre` , `codCcr` , `codCurso` , `siape` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alocacao_sala1`
    FOREIGN KEY (`numBloco` , `numSala` )
    REFERENCES `u454558226_cadu`.`sala` (`numBloco` , `numSala` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alocacao_statusAlocacao1`
    FOREIGN KEY (`idStatusAlocacao` )
    REFERENCES `u454558226_cadu`.`statusAlocacao` (`idStatusAlocacao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alocacao_periodo1`
    FOREIGN KEY (`idDiaSemana` , `idTurno` , `idPeriodo` )
    REFERENCES `u454558226_cadu`.`periodo` (`idDiaSemana` , `idTurno` , `idPeriodo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`cargo` (`idCargos`, `cargo`, `regValido`) VALUES (1, 'Docente', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`jornada`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`jornada` (`idJornada`, `jornada`, `regValido`) VALUES (1, 'jornada?', 1);
INSERT INTO `u454558226_cadu`.`jornada` (`idJornada`, `jornada`, `regValido`) VALUES (2, 'jornada?', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`situacaoServidor`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`situacaoServidor` (`idSituacaoServidor`, `situacao`, `dataEntrada`, `dataSaida`, `regValido`) VALUES (1, 'ativo', '2010-01-25', NULL, 1);
INSERT INTO `u454558226_cadu`.`situacaoServidor` (`idSituacaoServidor`, `situacao`, `dataEntrada`, `dataSaida`, `regValido`) VALUES (2, 'ativo', '2010-01-25', NULL, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`nivelServidor`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`nivelServidor` (`idNivelServidor`, `nivel`, `regValido`) VALUES (0, 'Administrador', 1);
INSERT INTO `u454558226_cadu`.`nivelServidor` (`idNivelServidor`, `nivel`, `regValido`) VALUES (1, 'Domínio comum', 1);
INSERT INTO `u454558226_cadu`.`nivelServidor` (`idNivelServidor`, `nivel`, `regValido`) VALUES (2, 'Domínio conexo', 1);
INSERT INTO `u454558226_cadu`.`nivelServidor` (`idNivelServidor`, `nivel`, `regValido`) VALUES (3, 'Domínio específico', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`servidor`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`servidor` (`siape`, `nome`, `sobrenome`, `observacao`, `quemSubstitui`, `idCargo`, `idJornada`, `idSituacaoServidor`, `email`, `fone1`, `fone2`, `endereco`, `cidade`, `senha`, `idNivelServidor`, `regValido`) VALUES ('1011100117', 'Claunir', 'Pavan', 'Bom professor', '1011100118', 1, 1, 1, 'claunir.pavan@uffs.edu.br', '(49) 8822-1234', 'não info.', 'Av. cidade', 'Chapecó - SC', '1234', 0, 1);
INSERT INTO `u454558226_cadu`.`servidor` (`siape`, `nome`, `sobrenome`, `observacao`, `quemSubstitui`, `idCargo`, `idJornada`, `idSituacaoServidor`, `email`, `fone1`, `fone2`, `endereco`, `cidade`, `senha`, `idNivelServidor`, `regValido`) VALUES ('1011100118', 'Denio', 'Duarte', 'Bom professor', '1011100117', 1, 2, 2, 'denio.duarte@uffs.edu.br', '(49) 9110-1234', 'não info.', 'Av. cidade', 'Chapecó - SC', '1234', 3, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`nivelCurso`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`nivelCurso` (`idNivelCursos`, `nomeNivelCurso`, `regValido`) VALUES (1, 'Graduação', 1);
INSERT INTO `u454558226_cadu`.`nivelCurso` (`idNivelCursos`, `nomeNivelCurso`, `regValido`) VALUES (2, 'Pós graduação', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`curso`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`curso` (`codCurso`, `nomeCurso`, `idNivelCursos`, `regValido`) VALUES (1001, 'Ciência da computação', 1, 1);
INSERT INTO `u454558226_cadu`.`curso` (`codCurso`, `nomeCurso`, `idNivelCursos`, `regValido`) VALUES (1002, 'Enfermagem', 1, 1);
INSERT INTO `u454558226_cadu`.`curso` (`codCurso`, `nomeCurso`, `idNivelCursos`, `regValido`) VALUES (1003, 'Agronomia', 1, 1);
INSERT INTO `u454558226_cadu`.`curso` (`codCurso`, `nomeCurso`, `idNivelCursos`, `regValido`) VALUES (1004, 'Matemática', 1, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`dominio`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`dominio` (`idDominio`, `nomeDominio`, `regValido`) VALUES (1, 'Domínio comum', 1);
INSERT INTO `u454558226_cadu`.`dominio` (`idDominio`, `nomeDominio`, `regValido`) VALUES (2, 'Domínio conexo', 1);
INSERT INTO `u454558226_cadu`.`dominio` (`idDominio`, `nomeDominio`, `regValido`) VALUES (3, 'Domínio expecífico', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`ccr`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`ccr` (`codCcr`, `nomeCcr`, `cHoraria`, `idDominio`, `regValido`) VALUES (100, 'Redes', 80, 3, 1);
INSERT INTO `u454558226_cadu`.`ccr` (`codCcr`, `nomeCcr`, `cHoraria`, `idDominio`, `regValido`) VALUES (101, 'Computação gráfica', 80, 3, 1);
INSERT INTO `u454558226_cadu`.`ccr` (`codCcr`, `nomeCcr`, `cHoraria`, `idDominio`, `regValido`) VALUES (200, 'Leitura e produção textual I', 60, 1, 1);
INSERT INTO `u454558226_cadu`.`ccr` (`codCcr`, `nomeCcr`, `cHoraria`, `idDominio`, `regValido`) VALUES (201, 'Leitura e produção textual II', 60, 1, 1);
INSERT INTO `u454558226_cadu`.`ccr` (`codCcr`, `nomeCcr`, `cHoraria`, `idDominio`, `regValido`) VALUES (102, 'Banco de dados I', 60, 3, 1);
INSERT INTO `u454558226_cadu`.`ccr` (`codCcr`, `nomeCcr`, `cHoraria`, `idDominio`, `regValido`) VALUES (103, 'Banco de dados II', 60, 3, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`cursoCcr`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (100, 1001, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (101, 1001, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (200, 1001, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (201, 1001, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (200, 1002, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (201, 1002, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (102, 1001, 1);
INSERT INTO `u454558226_cadu`.`cursoCcr` (`codCcr`, `codCurso`, `regValido`) VALUES (103, 1001, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`servidorCursoCcr`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`servidorCursoCcr` (`anoSemestre`, `codCcr`, `codCurso`, `siape`, `observacoes`, `regValido`) VALUES ('2014/2', 102, 1001, '1011100118', 'Laboratório banco de dados', 1);
INSERT INTO `u454558226_cadu`.`servidorCursoCcr` (`anoSemestre`, `codCcr`, `codCurso`, `siape`, `observacoes`, `regValido`) VALUES ('2014/2', 103, 1001, '1011100118', 'Sala não alocada', 1);
INSERT INTO `u454558226_cadu`.`servidorCursoCcr` (`anoSemestre`, `codCcr`, `codCurso`, `siape`, `observacoes`, `regValido`) VALUES ('2014/2', 100, 1001, '1011100117', 'Laboratório Redes', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`funcao`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`funcao` (`idFuncao`, `funcao`, `regValido`) VALUES (1, 'Professor', 1);
INSERT INTO `u454558226_cadu`.`funcao` (`idFuncao`, `funcao`, `regValido`) VALUES (2, 'Coordenador', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`servidorFuncao`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`servidorFuncao` (`idFuncao`, `siape`, `dataInicio`, `dataSaida`, `cargaHoraria`, `regValido`) VALUES (2, '1011100117', '2010-01-25', NULL, 60, 1);
INSERT INTO `u454558226_cadu`.`servidorFuncao` (`idFuncao`, `siape`, `dataInicio`, `dataSaida`, `cargaHoraria`, `regValido`) VALUES (1, '1011100118', '2010-01-25', NULL, 40, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`sala`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('A', 101, 'Sala de aula');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('A', 102, 'Sala de aula');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('A', 103, 'Sala de aula');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('A', 104, 'Sala de aula');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('A', 105, 'Sala de aula');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('B', 101, 'Laboratório redes');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('B', 102, 'Laboratório computação gráfica');
INSERT INTO `u454558226_cadu`.`sala` (`numBloco`, `numSala`, `descricaoSala`) VALUES ('B', 103, 'Laboratório banco de dados');

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`periodo`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('1', 1, 1, 'sabado', 'manhã', '07:30', '10:00');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('1', 1, 2, 'sabado', 'manhã', '10:10', '11:50');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('1', 2, 1, 'sabado', 'tarde', '13:30', '16:00');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('1', 2, 2, 'sabado', 'tarde', '16:10', '18:00');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('1', 3, 1, 'sabado', 'noite', '19:10', '20:50');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('1', 3, 2, 'sabado', 'noite', '21:00', '22:50');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('2', 1, 1, 'segunda', 'manhã', '07:30', '10:00');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('2', 1, 2, 'segunda', 'manhã', '10:10', '11:50');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('2', 2, 1, 'segunda', 'tarde', '13:30', '16:00');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('2', 2, 2, 'segunda', 'tarde', '16:10', '18:00');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('2', 3, 1, 'segunda', 'noite', '19:10', '20:50');
INSERT INTO `u454558226_cadu`.`periodo` (`idDiaSemana`, `idTurno`, `idPeriodo`, `diaSemana`, `turno`, `horaInicio`, `horaFim`) VALUES ('2', 3, 2, 'segunda', 'noite', '21:00', '22:50');

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`areaMenu`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`areaMenu` (`idAreaMenu`, `nomeAreaMenu`, `descricaoAreaMenu`, `linkAreaMenu`) VALUES (1, 'servidor', 'Servidor', 'servidor.php');
INSERT INTO `u454558226_cadu`.`areaMenu` (`idAreaMenu`, `nomeAreaMenu`, `descricaoAreaMenu`, `linkAreaMenu`) VALUES (2, 'relatorios', 'Relatórios', 'relatorios.php');
INSERT INTO `u454558226_cadu`.`areaMenu` (`idAreaMenu`, `nomeAreaMenu`, `descricaoAreaMenu`, `linkAreaMenu`) VALUES (3, 'cursos', 'Cursos', 'cursos.php');
INSERT INTO `u454558226_cadu`.`areaMenu` (`idAreaMenu`, `nomeAreaMenu`, `descricaoAreaMenu`, `linkAreaMenu`) VALUES (4, 'salas', 'Salas', 'salas.php');
INSERT INTO `u454558226_cadu`.`areaMenu` (`idAreaMenu`, `nomeAreaMenu`, `descricaoAreaMenu`, `linkAreaMenu`) VALUES (5, 'horarios', 'Horários', 'horarios.php');
INSERT INTO `u454558226_cadu`.`areaMenu` (`idAreaMenu`, `nomeAreaMenu`, `descricaoAreaMenu`, `linkAreaMenu`) VALUES (6, 'alocacao', 'Alocação', 'alocacao.php');

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`nivelServidor_areaMenu`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (1, 1);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (1, 2);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (1, 3);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (1, 4);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (1, 5);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (1, 6);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (2, 1);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (2, 2);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (2, 3);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (2, 4);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (2, 5);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (2, 6);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (3, 1);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (3, 2);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (3, 3);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (3, 4);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (3, 5);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (3, 6);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (0, 1);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (0, 2);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (0, 3);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (0, 4);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (0, 5);
INSERT INTO `u454558226_cadu`.`nivelServidor_areaMenu` (`idNivelServidor`, `idAreaMenu`) VALUES (0, 6);

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`statusAlocacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`statusAlocacao` (`idStatusAlocacao`, `descricaoStatusAlocacao`) VALUES (1, 'Alocado');
INSERT INTO `u454558226_cadu`.`statusAlocacao` (`idStatusAlocacao`, `descricaoStatusAlocacao`) VALUES (2, 'Conflito');

COMMIT;

-- -----------------------------------------------------
-- Data for table `u454558226_cadu`.`alocacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `u454558226_cadu`;
INSERT INTO `u454558226_cadu`.`alocacao` (`anoSemestre`, `idDiaSemana`, `idTurno`, `idPeriodo`, `numBloco`, `numSala`, `codCurso`, `codCcr`, `siape`, `idStatusAlocacao`) VALUES ('2014/2', '2', 1, 1, 'B', 103, 1001, 102, '1011100118', 1);
INSERT INTO `u454558226_cadu`.`alocacao` (`anoSemestre`, `idDiaSemana`, `idTurno`, `idPeriodo`, `numBloco`, `numSala`, `codCurso`, `codCcr`, `siape`, `idStatusAlocacao`) VALUES ('2014/2', '2', 1, 2, 'B', 101, 1001, 100, '1011100117', 1);

COMMIT;
