-- Criação do banco de dados
CREATE DATABASE DB_AVALIACAO;

-- Utilização do banco de dados
USE DB_AVALIACAO;

-- Criação da tabela Estudantes (usuários)
CREATE TABLE Estudantes (
    MatriculaEstudante INT PRIMARY KEY,
    NomeEstudante NVARCHAR(100),
	[Curso] NVARCHAR(50) NOT NULL,
    Email NVARCHAR(100) NOT NULL,
    Senha NVARCHAR(100) NOT NULL
);
-- Criação da tabela Departamentos
CREATE TABLE Departamentos (
    CodDepartamento INT PRIMARY KEY,
    NomeDepartamento NVARCHAR(150) NOT NULL
);
-- Criação da tabela Professores
CREATE TABLE Professores (
    IdProfessor INT PRIMARY KEY,
    NomeProfessor NVARCHAR(100) NOT NULL,
    Email NVARCHAR(100) NOT NULL,
    CodDepartamento INT NOT NULL,
    FOREIGN KEY (CodDepartamento) REFERENCES Departamentos (CodDepartamento)
);

-- Criação da tabela Disciplinas
CREATE TABLE Disciplinas (
    CodigoDisciplina INT PRIMARY KEY,
    NomeDisciplina NVARCHAR(100) NOT NULL,
	CodDepartamento INT NOT NULL,
    FOREIGN KEY (CodDepartamento) REFERENCES Departamentos (CodDepartamento)
);

-- Criação da tabela Turmas
CREATE TABLE Turmas (
    IdTurma INT PRIMARY KEY,
    Turma NVARCHAR(10) NOT NULL,
	Periodo NVARCHAR(10) NOT NULL,
	IdProfessor INT NOT NULL,
	Horario VARCHAR(MAX)  NOT NULL,
	VagasOcupadas INT NOT NULL,
	TotalVagas INT NOT NULL,
	Local NVARCHAR(100) NOT NULL,
	CodigoDisciplina INT NOT NULL,
	CodDepartamento INT NOT NULL,
	FOREIGN KEY (IdProfessor) REFERENCES Professores (IdProfessor),
	FOREIGN KEY (CodigoDisciplina) REFERENCES Disciplinas (CodigoDisciplina),
    FOREIGN KEY (CodDepartamento) REFERENCES Departamentos (CodDepartamento)
 
);

-- Criação da tabela Avaliações Turmas
CREATE TABLE AvaliacaoTurma (
    IdAvaliacaoTurma INT PRIMARY KEY,
    MatriculaEstudante INT NOT NULL,
    IdTurma INT NOT NULL,
    AvalicaoTurma INT NOT NULL,
    DataInclusao DATE NOT NULL,
    FOREIGN KEY (MatriculaEstudante) REFERENCES Estudantes (MatriculaEstudante),
    FOREIGN KEY (IdTurma) REFERENCES Turmas (IdTurma)
    
);

-- Criação da tabela Avaliações Professores
CREATE TABLE AvaliacaoProfessor (
    IdAvaliacaoProfessor INT PRIMARY KEY,
    MatriculaEstudante INT NOT NULL,
    IdProfessor INT NOT NULL,
    AvalicaoProfessor INT NOT NULL,
    DataInclusao DATE NOT NULL,
    FOREIGN KEY (MatriculaEstudante) REFERENCES Estudantes (MatriculaEstudante),
    FOREIGN KEY (IdProfessor) REFERENCES Professores (IdProfessor)
    
);

-- Criação da tabela Denúncias
CREATE TABLE Denuncias (
    IdDenuncia INT PRIMARY KEY,
	MatriculaEstudante NOT NULL,
    IdAvaliacao INT NOT NULL,
    TipoDenuncia BIT NOT NULL,
    DataInclusao DATE NOT NULL,
    FOREIGN KEY (MatriculaEstudante) REFERENCES Estudantes (IdEstudante)
    
);

-- Criação da tabela Login
CREATE TABLE Login (
	IdLogin INT PRIMARY KEY,
	MatriculaEstudante INT NOT NULL,
	Senha VARCHAR(10) NOT NULL,
	Administrador BIT,
	FOREIGN KEY (MatriculaEstudante) REFERENCES Estudantes (MatriculaEstudante),
);
