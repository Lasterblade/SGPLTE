/*
  Autor: Donovan Sousa
  Data: 27/08/2015
  Objetivo:  Executar Query para criação da base dados do sistema prova Online.
*/

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema provaonline
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `provaonline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `provaonline` ;

-- -----------------------------------------------------
-- Table `provaonline`.`perfilusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`perfilusuario` (
  `idperfilusuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NULL COMMENT '',
  `data_exclusao` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idperfilusuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `login` VARCHAR(45) NULL COMMENT '',
  `senha` VARCHAR(45) NULL COMMENT '',
  `perfil` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idusuario`)  COMMENT '',
  INDEX `fk_usuario_perfilusuario1_idx` (`perfil` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_perfilusuario1`
    FOREIGN KEY (`perfil`)
    REFERENCES `provaonline`.`perfilusuario` (`idperfilusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`pessoa` (
  `idpessoa` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `sexo` VARCHAR(45) NULL COMMENT '',
  `data_nascimento` DATE NULL COMMENT '',
  `rg` VARCHAR(12) NOT NULL COMMENT '',
  `cpf` varchar(11) NOT NULL unique,
  `email` VARCHAR(100) NOT NULL COMMENT '',
  `telefone` VARCHAR(20) NULL COMMENT '',
  `cep` VARCHAR(10) NULL COMMENT '',
  `rua` VARCHAR(45) NULL COMMENT '',
  `numero` VARCHAR(3) NULL COMMENT '',
  `cidade` VARCHAR(25) NULL COMMENT '',
  `bairro` VARCHAR(70) NULL COMMENT '',
  `uf` CHAR(2) NULL COMMENT '',
  PRIMARY KEY (`idpessoa`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`curso` (
  `idcurso` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idcurso`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`matricula` (
  `idmatricula` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `data_matricula` DATETIME NULL COMMENT '',
  `data_exclusao` DATETIME NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idmatricula`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 9000;


-- -----------------------------------------------------
-- Table `provaonline`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`aluno` (
  `idaluno` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pessoa_idpessoa` INT NOT NULL COMMENT '',
  `usuario_idusuario` INT NOT NULL COMMENT '',
  `matricula_idmatricula` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idaluno`)  COMMENT '',
  INDEX `fk_Aluno_pessoa1_idx` (`pessoa_idpessoa` ASC)  COMMENT '',
  INDEX `fk_Aluno_usuario1_idx` (`usuario_idusuario` ASC)  COMMENT '',
  INDEX `fk_Aluno_matricula1_idx` (`matricula_idmatricula` ASC)  COMMENT '',
  CONSTRAINT `fk_Aluno_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `provaonline`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `provaonline`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_matricula1`
    FOREIGN KEY (`matricula_idmatricula`)
    REFERENCES `provaonline`.`matricula` (`idmatricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`coordenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`coordenador` (
  `idcoordenador` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pessoa_idpessoa` INT NOT NULL COMMENT '',
  `usuario_idusuario` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idcoordenador`)  COMMENT '',
  INDEX `fk_coordenador_pessoa1_idx` (`pessoa_idpessoa` ASC)  COMMENT '',
  INDEX `fk_coordenador_usuario1_idx` (`usuario_idusuario` ASC)  COMMENT '',
  CONSTRAINT `fk_coordenador_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `provaonline`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_coordenador_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `provaonline`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`periodo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`periodo` (
  `idperiodo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idperiodo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`turno` (
  `idturno` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idturno`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`turma` (
  `idturma` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NULL COMMENT '',
  `data_exclusao` VARCHAR(45) NULL COMMENT '',
  `curso_idcurso` INT NOT NULL COMMENT '',
  `periodo_idperiodo` INT NOT NULL COMMENT '',
  `turno_idturno` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idturma`)  COMMENT '',
  INDEX `fk_turma_curso1_idx` (`curso_idcurso` ASC)  COMMENT '',
  INDEX `fk_turma_periodo1_idx` (`periodo_idperiodo` ASC)  COMMENT '',
  INDEX `fk_turma_turno1_idx` (`turno_idturno` ASC)  COMMENT '',
  CONSTRAINT `fk_turma_curso1`
    FOREIGN KEY (`curso_idcurso`)
    REFERENCES `provaonline`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_periodo1`
    FOREIGN KEY (`periodo_idperiodo`)
    REFERENCES `provaonline`.`periodo` (`idperiodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_turno1`
    FOREIGN KEY (`turno_idturno`)
    REFERENCES `provaonline`.`turno` (`idturno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`disciplina` (
  `iddisciplina` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NULL COMMENT '',
  `turma_idturma` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`iddisciplina`)  COMMENT '',
  INDEX `fk_disciplina_turma1_idx` (`turma_idturma` ASC)  COMMENT '',
  CONSTRAINT `fk_disciplina_turma1`
    FOREIGN KEY (`turma_idturma`)
    REFERENCES `provaonline`.`turma` (`idturma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`professor` (
  `idprofessor` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `graduacao` VARCHAR(45) NULL COMMENT '',
  `pessoa_idpessoa` INT NOT NULL COMMENT '',
  `usuario_idusuario` INT NOT NULL COMMENT '',
  `matricula_idmatricula` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idprofessor`)  COMMENT '',
  INDEX `fk_professor_pessoa1_idx` (`pessoa_idpessoa` ASC)  COMMENT '',
  INDEX `fk_professor_usuario1_idx` (`usuario_idusuario` ASC)  COMMENT '',
  INDEX `fk_professor_matricula1_idx` (`matricula_idmatricula` ASC)  COMMENT '',
  CONSTRAINT `fk_professor_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa`)
    REFERENCES `provaonline`.`pessoa` (`idpessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `provaonline`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_matricula1`
    FOREIGN KEY (`matricula_idmatricula`)
    REFERENCES `provaonline`.`matricula` (`idmatricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`provas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`provas` (
  `idprovas` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NULL COMMENT '',
  `introducao` TEXT(500) NULL COMMENT '',
  `inicio` DATE NULL COMMENT '',
  `termino` DATE NULL COMMENT '',
  `turma_idturma` INT NOT NULL COMMENT '',
  `disciplina_iddisciplina` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`idprovas`)  COMMENT '',
  INDEX `fk_provas_turma1_idx` (`turma_idturma` ASC)  COMMENT '',
  INDEX `fk_provas_disciplina1_idx` (`disciplina_iddisciplina` ASC)  COMMENT '',
  CONSTRAINT `fk_provas_turma1`
    FOREIGN KEY (`turma_idturma`)
    REFERENCES `provaonline`.`turma` (`idturma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_provas_disciplina1`
    FOREIGN KEY (`disciplina_iddisciplina`)
    REFERENCES `provaonline`.`disciplina` (`iddisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`perguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`perguntas` (
  `idperguntas` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `titulo` VARCHAR(100) NULL COMMENT '',
  `pergunta` TEXT(500) NULL COMMENT '',
  `respostaA` VARCHAR(100) NULL COMMENT '',
  `respostaB` VARCHAR(150) NULL COMMENT '',
  `respostaC` VARCHAR(150) NULL COMMENT '',
  `respostaD` VARCHAR(150) BINARY NULL COMMENT '',
  `respostaCorreta` CHAR(1) NULL COMMENT '',
  `data_exclusao` DATETIME NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idperguntas`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`cursando`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`cursando` (
  `Aluno_idAluno` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `disciplina_iddisciplina` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`Aluno_idAluno`, `disciplina_iddisciplina`)  COMMENT '',
  INDEX `fk_Aluno_has_turma_Aluno1_idx` (`Aluno_idAluno` ASC)  COMMENT '',
  INDEX `fk_Cursando_disciplina1_idx` (`disciplina_iddisciplina` ASC)  COMMENT '',
  CONSTRAINT `fk_Aluno_has_turma_Aluno1`
    FOREIGN KEY (`Aluno_idAluno`)
    REFERENCES `provaonline`.`aluno` (`idaluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cursando_disciplina1`
    FOREIGN KEY (`disciplina_iddisciplina`)
    REFERENCES `provaonline`.`disciplina` (`iddisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`disciplinas_professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`disciplinas_professor` (
  `professor_idprofessor` INT NOT NULL COMMENT '',
  `disciplina_iddisciplina` INT NOT NULL COMMENT '',
  PRIMARY KEY (`professor_idprofessor`, `disciplina_iddisciplina`)  COMMENT '',
  INDEX `fk_professor_has_disciplina_disciplina1_idx` (`disciplina_iddisciplina` ASC)  COMMENT '',
  INDEX `fk_professor_has_disciplina_professor1_idx` (`professor_idprofessor` ASC)  COMMENT '',
  CONSTRAINT `fk_professor_has_disciplina_professor1`
    FOREIGN KEY (`professor_idprofessor`)
    REFERENCES `provaonline`.`professor` (`idprofessor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_has_disciplina_disciplina1`
    FOREIGN KEY (`disciplina_iddisciplina`)
    REFERENCES `provaonline`.`disciplina` (`iddisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`matriculados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`matriculados` (
  `matricula_idmatricula` INT NOT NULL COMMENT '',
  `turma_idturma` INT NOT NULL COMMENT '',
  `data_exclusao` DATETIME NULL COMMENT '',
  PRIMARY KEY (`matricula_idmatricula`, `turma_idturma`)  COMMENT '',
  INDEX `fk_matricula_has_turma_turma1_idx` (`turma_idturma` ASC)  COMMENT '',
  INDEX `fk_matricula_has_turma_matricula1_idx` (`matricula_idmatricula` ASC)  COMMENT '',
  CONSTRAINT `fk_matricula_has_turma_matricula1`
    FOREIGN KEY (`matricula_idmatricula`)
    REFERENCES `provaonline`.`matricula` (`idmatricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_has_turma_turma1`
    FOREIGN KEY (`turma_idturma`)
    REFERENCES `provaonline`.`turma` (`idturma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `provaonline`.`questoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provaonline`.`questoes` (
  `provas_idprovas` INT NOT NULL COMMENT '',
  `perguntas_idperguntas` INT NOT NULL COMMENT '',
  `notas` FLOAT(5) NULL COMMENT '',
  PRIMARY KEY (`provas_idprovas`, `perguntas_idperguntas`)  COMMENT '',
  INDEX `fk_provas_has_Questoes_Questoes1_idx` (`perguntas_idperguntas` ASC)  COMMENT '',
  INDEX `fk_provas_has_Questoes_provas1_idx` (`provas_idprovas` ASC)  COMMENT '',
  CONSTRAINT `fk_provas_has_Questoes_provas1`
    FOREIGN KEY (`provas_idprovas`)
    REFERENCES `provaonline`.`provas` (`idprovas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_provas_has_Questoes_Questoes1`
    FOREIGN KEY (`perguntas_idperguntas`)
    REFERENCES `provaonline`.`perguntas` (`idperguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
