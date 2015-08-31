/*
  Autor: Donovan Sousa
  Data: 27/08/2015
  Objetivo:  Executar Query para criação da base dados do sistema Prova Online.
*/

drop database provaonline;

create database provaonline;

use provaonline;

create table perfilUsuario
(
	idPerfilUsuario int primary key auto_increment,
	descricao varchar(50) not null
);

insert into perfilUsuario values (1,'Aluno');
insert into perfilUsuario values (2,'Professor');
insert into perfilUsuario values (3,'Coordenador');


CREATE TABLE IF NOT EXISTS provaonline.Usuario -- primeiro cadastra o usuário.
(
  idUsuario INT(11) NOT NULL PRIMARY KEY auto_increment ,
  login VARCHAR(45) NOT NULL ,
  senha VARCHAR(45) NOT NULL ,
  perfil INT(11) NOT NULL,
	foreign key (perfil) references perfilUsuario(idPerfilUsuario) 
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into Usuario  values (1,'donovan','123456',3); 
insert into Usuario values (2,'thiago','123456',3) ;


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


CREATE TABLE IF NOT EXISTS provaonline.Curso 
(
  idCurso INT(11) NOT NULL primary key auto_increment ,
  descricao VARCHAR(45) NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- então insero um curso para me matricular.
insert into Curso values (1,'TADS');


CREATE TABLE IF NOT EXISTS provaonline.Matricula  -- aqui deve se utilizar Sequence, não por auto increment!
(
  matricula INT(11) NOT NULL primary key,
  data_matricula date NOT NULL,
  idCurso int default null,
  foreign key (idCurso) references Curso(idCurso)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- então me matriculo.
insert into Matricula values (1,20150826,1);


CREATE TABLE IF NOT EXISTS provaonline.Aluno -- depois vincula o usuário ao aluno/professor/coordenador.
(
  idAluno INT(11) NOT NULL AUTO_INCREMENT primary key ,

  idMatricula INT(11) NOT NULL ,
  foreign key (idMatricula) REFERENCES Matricula(matricula),

  idUsuario INT(11) NOT NULL ,
  foreign key (idUsuario) references Usuario(idUsuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- insiro um aluno, com codigo 1,matricula 1, e usuario 1
insert into Aluno values (1,1,1);


CREATE TABLE IF NOT EXISTS provaonline.Coordenador -- depois vincula o usuário ao aluno/professor/coordenador.
(
  idCoordenador INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,

  idPessoa INT(11) NOT NULL ,
  foreign key (idPessoa) references pessoa(idPessoa),

  idUsuario INT(11) NOT NULL,
	foreign key (idUsuario) references Usuario(idUsuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS provaonline.Periodo 
(
  idPeriodo INT(11) NOT NULL primary key auto_increment ,
  descricao VARCHAR(70) NOT NULL 
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into Periodo values (1,'Primeiro periodo');
insert into Periodo values (2,'Segundo periodo');

CREATE TABLE IF NOT EXISTS provaonline.Disciplinas
(
  idDisciplina INT(11) NOT NULL primary key auto_increment ,
  descricao VARCHAR(45) NOT NULL,
  idCurso int not null,
  foreign key (idCurso) references Curso(idCurso),
  idPeriodo int,
  foreign key(idPeriodo) references Periodo(idPeriodo)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into Disciplinas values(1,'Matemática Discreta I',1,1);
insert into Disciplinas values(2,'Banco de dados',1,2);

create table Turno
(
	idTurno int primary key auto_increment,
	descricao varchar(100) not null
);

insert into Turno values (1,'Dia');
insert into Turno values (2,'Noite');

CREATE TABLE IF NOT EXISTS provaonline.Turma 
(
  idTurma INT(11) NOT NULL primary key auto_increment ,

  Idturno INT(11) NOT NULL ,
  foreign key (Idturno) REFERENCES Turno(idTurno),

   Idcurso INT(11) NOT NULL ,
   foreign key (Idcurso) references Curso(idCurso),

   Idperiodo INT(11) NOT NULL ,
	 foreign key(Idperiodo) references Periodo(idPeriodo)
 )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- Turma 1,turno 1, curso 1, 2 periodo 
insert into Turma values (1,1,1,2);

-- depois vincula o usuário ao aluno/professor/coordenador.
CREATE TABLE IF NOT EXISTS provaonline.Professor 
(
idProfessor INT(11) NOT NULL primary key,
  
idUsuario INT(11) NOT NULL,
FOREIGN key (idUsuario) references Usuario(idUsuario),
  
matricula INT(11) NOT NULL,
foreign key (matricula) REFERENCES Matricula(matricula)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- Inseri o professor, cujo codigo e 1, de usuario tb e 1, e matricula e 1 tb
insert into Professor values (1,1,1);


-- essa tabela e responsavel pelas disciplinas do professor.
create table if not exists provaonline.DisciplinasProfessor
(
 IdDisciplinasProfessor int(11) primary key auto_increment,

 IdProfessor int(11) not null, 
 foreign key (IdProfessor) references Professor(idProfessor),

 disciplina INT(11) not null, 
 foreign key (disciplina) references Disciplinas(idDisciplina)
);

-- IdProfessor,Disciplina
insert into DisciplinasProfessor values (1,1,2);


-- Tabela com as disciplinas que estão sendo cursadas
CREATE TABLE IF NOT EXISTS provaonline.Cursando 
(
  idCursando int primary key auto_increment,

  idAluno INT(11) NOT NULL ,
  foreign key (idAluno) references Aluno(idAluno),
 
  idMatricula INT(11) NOT NULL ,
  foreign key (idMatricula) references Matricula(matricula),

  idDisciplina INT(11) NOT NULL,
  foreign key (idDisciplina) references Disciplinas(idDisciplina) 

)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


insert into Cursando values (1,1,1,1);
insert into Cursando values (2,1,1,2);


-- Tabelas com Provas relacionadas
create table Provas
(
	idProva int primary key auto_increment,
	disciplina int,
	foreign key (disciplina) references Disciplinas(idDisciplina)
);

insert into Provas values (1,1);

-- Tabelas com Perguntas relacionadas as provas
create table Perguntas
(
	idPergunta int primary key auto_increment,
  idProva int not null,
  foreign key(idProva) references Provas(idProva),
	pergunta varchar(1000) not null,
	resposta01 varchar(100),
	resposta02 varchar(100),
	resposta03 varchar(100),
	resposta04 varchar(100),
	respostaCorreta char(1) -- Aqui deve entrar, A,B,C,D
);

insert into Perguntas values(1,1,'Quem descobriu o brasil?','Pedro','Joao','Matheus','Teste','A');