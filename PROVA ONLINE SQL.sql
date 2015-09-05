/*
  Autor: Donovan Sousa
  Data: 27/08/2015
  Objetivo:  Executar Query para criação da base dados do sistema prova Online.
*/

drop database provaonline;

create database provaonline;

use provaonline;

create table perfilusuario
(
	idperfilusuario int primary key auto_increment,
	descricao varchar(50) not null
);

insert into perfilusuario values (1,'aluno');
insert into perfilusuario values (2,'professor');
insert into perfilusuario values (3,'coordenador');


CREATE TABLE IF NOT EXISTS provaonline.usuario -- primeiro cadastra o usuário.
(
  idusuario INT(11) NOT NULL PRIMARY KEY auto_increment ,
  login VARCHAR(45) NOT NULL ,
  senha VARCHAR(45) NOT NULL ,
  perfil INT(11) NOT NULL,
	foreign key (perfil) references perfilusuario(idperfilusuario) 
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into usuario  values (1,'donovan','123456',3); 
insert into usuario values (2,'thiago','123456',3) ;


CREATE TABLE IF NOT EXISTS provaonline.pessoa  -- depois cadastra a pessoa.
(
  idpessoa INT(11) NOT NULL AUTO_INCREMENT primary key ,
  nome VARCHAR(45) NOT NULL ,
  sexo VARCHAR(1) NOT NULL ,
  data_nascimento VARCHAR(45) NOT NULL ,
  endereco VARCHAR(70) NOT NULL ,
  cpf VARCHAR(15) NOT NULL ,
  email VARCHAR(70) NOT NULL ,
  telefone VARCHAR(20) NOT NULL  
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into pessoa values 
(1,'donovan muniz de sousa','M',19941201,'rua dos agronomos','12188899900','donovansousa@yahoo.com.br','26632663');


CREATE TABLE IF NOT EXISTS provaonline.curso 
(
  idcurso INT(11) NOT NULL primary key auto_increment ,
  descricao VARCHAR(45) NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- então insero um curso para me matricular.
insert into curso values (1,'TADS');


CREATE TABLE IF NOT EXISTS provaonline.matricula  -- aqui deve se utilizar Sequence, não por auto increment!
(
  matricula INT(11) NOT NULL primary key,
  data_matricula date NOT NULL,
  idcurso int default null,
  foreign key (idcurso) references curso(idcurso)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- então me matriculo.
insert into matricula values (1,20150826,1);


CREATE TABLE IF NOT EXISTS provaonline.aluno -- depois vincula o usuário ao aluno/professor/coordenador.
(
  idaluno INT(11) NOT NULL AUTO_INCREMENT primary key ,

  idpessoa INT(11) NOT NULL ,
  foreign key (idpessoa) references pessoa(idpessoa),

  idmatricula INT(11) NOT NULL ,
  foreign key (idmatricula) REFERENCES matricula(matricula),

  idusuario INT(11) NOT NULL ,
  foreign key (idusuario) references usuario(idusuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- insiro um aluno, com codigo 1,matricula 1, e usuario 1
insert into aluno values (1,1,1,1);


CREATE TABLE IF NOT EXISTS provaonline.coordenador -- depois vincula o usuário ao aluno/professor/coordenador.
(
  idcoordenador INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,

  idpessoa INT(11) NOT NULL ,
  foreign key (idpessoa) references pessoa(idpessoa),

  idusuario INT(11) NOT NULL,
	foreign key (idusuario) references usuario(idusuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS provaonline.periodo 
(
  idperiodo INT(11) NOT NULL primary key auto_increment ,
  descricao VARCHAR(70) NOT NULL 
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into periodo values (1,'Primeiro periodo');
insert into periodo values (2,'Segundo periodo');

CREATE TABLE IF NOT EXISTS provaonline.disciplinas
(
  iddisciplina INT(11) NOT NULL primary key auto_increment ,
  descricao VARCHAR(45) NOT NULL,
  idcurso int not null,
  foreign key (idcurso) references curso(idcurso),
  idperiodo int,
  foreign key(idperiodo) references periodo(idperiodo)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into disciplinas values(1,'Matemática Discreta I',1,1);
insert into disciplinas values(2,'Banco de dados',1,2);

create table turno
(
	idturno int primary key auto_increment,
	descricao varchar(100) not null
);

insert into turno values (1,'Dia');
insert into turno values (2,'Noite');

CREATE TABLE IF NOT EXISTS provaonline.turma 
(
  idturma INT(11) NOT NULL primary key auto_increment ,

  idturno INT(11) NOT NULL ,
  foreign key (Idturno) REFERENCES turno(idturno),

   idcurso INT(11) NOT NULL ,
   foreign key (Idcurso) references curso(idcurso),

   idperiodo INT(11) NOT NULL ,
	 foreign key(Idperiodo) references periodo(idperiodo)
 )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- turma 1,turno 1, curso 1, 2 periodo 
insert into turma values (1,1,1,2);

-- depois vincula o usuário ao aluno/professor/coordenador.
CREATE TABLE IF NOT EXISTS provaonline.professor 
(
idprofessor INT(11) NOT NULL primary key,
  
idusuario INT(11) NOT NULL,
FOREIGN key (idusuario) references usuario(idusuario),
  
idpessoa INT(11) NOT NULL ,
foreign key (idpessoa) references pessoa(idpessoa),  
  
matricula INT(11) NOT NULL,
foreign key (matricula) REFERENCES matricula(matricula)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- Inseri o professor, cujo codigo e 1, de usuario tb e 1, pessoa tb e 1, e matricula e 1 tb
insert into professor values (1,1,1,1);


-- essa tabela e responsavel pelas disciplinas do professor.
create table if not exists provaonline.disciplinasprofessor
(
 Iddisciplinasprofessor int(11) primary key auto_increment,

 Idprofessor int(11) not null, 
 foreign key (Idprofessor) references professor(idprofessor),

 disciplina INT(11) not null, 
 foreign key (disciplina) references disciplinas(iddisciplina)
);

-- Idprofessor,disciplina
insert into disciplinasprofessor values (1,1,2);


-- Tabela com as disciplinas que estão sendo cursadas
CREATE TABLE IF NOT EXISTS provaonline.cursando 
(
  idCursando int primary key auto_increment,

  idaluno INT(11) NOT NULL ,
  foreign key (idaluno) references aluno(idaluno),
 
  idmatricula INT(11) NOT NULL ,
  foreign key (idmatricula) references matricula(matricula),

  iddisciplina INT(11) NOT NULL,
  foreign key (iddisciplina) references disciplinas(iddisciplina) 

)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


insert into cursando values (1,1,1,1);
insert into cursando values (2,1,1,2);


-- Tabelas com provas relacionadas
create table provas
(
	idprova int primary key auto_increment,
	disciplina int,
	foreign key (disciplina) references disciplinas(iddisciplina),
	idturma int,
	foreign key (idturma) references turma(idturma),
	inicio datetime,
	termino datetime
);

-- idProva,disciplina,idturma.
insert into provas values (1,1,1,);

-- Tabelas com perguntas relacionadas as provas
create table perguntas
(
	idPergunta int primary key auto_increment,
  idprova int not null,
  foreign key(idprova) references provas(idprova),
	pergunta varchar(1000) not null,
	resposta01 varchar(100),
	resposta02 varchar(100),
	resposta03 varchar(100),
	resposta04 varchar(100),
	respostaCorreta char(1) -- Aqui deve entrar, A,B,C,D
);

insert into perguntas values(1,1,'Quem descobriu o brasil?','Pedro','Joao','Matheus','Teste','A');