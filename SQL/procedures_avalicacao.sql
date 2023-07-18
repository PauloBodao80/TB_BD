USE [DB_AVALICAO]
GO

CREATE PROCEDURE INSERIR_ESTUDANTE
    @MatriculaEstudante INT
   ,@NomeEstudante NVARCHAR(MAX)
   ,@Curso nvarchar(50)
   ,@email nvarchar(20)
AS
BEGIN
    INSERT INTO [dbo].[ESTUDANTES]
           ([MatriculaEstudante]
           ,[NomeEstudante]
           ,[Curso]
           ,[e-mail])
     VALUES
           (@MatriculaEstudante
		   ,@NomeEstudante
		   ,@Curso
		   ,@email)

    PRINT 'Aluno cadastrado com sucesso.' 
END

CREATE PROCEDURE [dbo].[CADASTRAR_LOGIN]
    @Matricula INT
   ,@Senha varchar(10)
   ,@Administrador BIT
AS
BEGIN	
    INSERT INTO [dbo].[Login]
           ([MatriculaEstudante]
           ,[Senha]
           ,[Administrador])
     VALUES
           (@Matricula
		   ,@Senha
		   ,@Administrador)

    PRINT 'Login cadastrado com sucesso.' 
END

CREATE PROCEDURE CADASTRAR_ESTUDANTE
    @Matricula INT
   ,@Nome NVARCHAR(MAX)
   ,@Curso nvarchar(50)
   ,@email nvarchar(20)
   ,@Senha varchar(10)
   ,@Administrador BIT
AS
BEGIN
	exec INSERIR_ESTUDANTE
		@MatriculaEstudante = @Matricula
	   ,@NomeEstudante = @Nome
	   ,@Curso = @Curso
	   ,@email = @email
	
    INSERT INTO [dbo].[Login]
           ([MatriculaEstudante]
           ,[Senha]
           ,[Administrador])
     VALUES
           (@Matricula
		   ,@Senha
		   ,@Administrador)

    PRINT 'Login cadastrado com sucesso.' 
END

CREATE PROCEDURE EXCLUIR_ESTUDANTE
    @MatriculaEstudante INT
   
AS
BEGIN
    DELETE FROM [dbo].[ESTUDANTES]
      WHERE MatriculaEstudante = @MatriculaEstudante

    PRINT 'Aluno excluído com sucesso.' 
END

CREATE PROCEDURE INSERIR_AVALIACAO_PROFESSOR
    @MatriculaEstudante INT
   ,@IdProfessor INT
   ,@AvaliacaoProfessor nvarchar(MAX)
   
AS
BEGIN
    INSERT INTO [dbo].[AvaliacaoProfessor]
           ([MatriculaEstudante]
           ,[IdProfessor]
           ,[AvaliacaoProfessor]
           ,[DataInclusao])
     VALUES
           (@MatriculaEstudante
		   ,@IdProfessor
		   ,@AvaliacaoProfessor
		   ,GETDATE())

    PRINT 'Avaliação cadastrada com sucesso.' 
END

CREATE PROCEDURE INSERIR_AVALIACAO_TURMA
    @MatriculaEstudante INT
   ,@IdTurma INT
   ,@AvaliacaoTurma nvarchar(MAX)
   
AS
BEGIN
    INSERT INTO [dbo].[AvaliacaoTurma]
           ([MatriculaEstudante]
           ,[IdTurma]
           ,[AvaliacaoTurma]
           ,[DataInclusao])
     VALUES
           (@MatriculaEstudante
		   ,@IdTurma
		   ,@AvaliacaoTurma
		   ,GETDATE())

    PRINT 'Avaliação cadastrada com sucesso.' 
END

CREATE PROCEDURE INSERIR_DENUNCIA
    @MatriculaEstudante INT
   ,@IdAvaliacao INT
   ,@TipoDenuncia bit
   
AS
BEGIN
    INSERT INTO [dbo].[dbo].[Denuncias]
           ([MatriculaEstudante]
           ,[IdAvaliacao]
           ,[TipoDenuncia]
           ,[DataInclusao])
     VALUES
           (@MatriculaEstudante
		   ,@IdAvaliacao
		   ,@TipoDenuncia
		   ,GETDATE()
		   )

    PRINT 'Denúncia cadastrada com sucesso.' 
END

CREATE PROCEDURE EXCLUIR_DENUNCIA
    @IdDenuncias INT
   
AS
BEGIN
    DELETE FROM [dbo].[Denuncias]
      WHERE [IdDenuncias] = @IdDenuncias

    PRINT 'Denúncia excluída com sucesso.' 
END

CREATE PROCEDURE EXCLUIR_AVALIACAO
    @IdDenuncias INT,
	@Tipo BIT
   
AS
BEGIN
	if @Tipo = 0 
		DELETE FROM [dbo].[AvaliacaoProfessor]
		WHERE [IdAvaliacaoProfessor] = @IdDenuncias
	else
		DELETE FROM [dbo].[dbo].[AvaliacaoTurma]
		WHERE [IdAvaliacaoTurma] = @IdDenuncias

    PRINT 'Avaliação excluída com sucesso.' 
END

CREATE PROCEDURE ALTERAR_AVALIACAO
    @IdAvaliacao INT,
	@Tipo BIT, -- tipo 0 refere-se à avaliação do professor
	@Avaliacao nvarchar(max)
   
AS
BEGIN
	if @Tipo = 0 
		UPDATE [dbo].[AvaliacaoProfessor]
		   SET [AvaliacaoProfessor] = @Avaliacao
			  ,[DataInclusao] = GETDATE()
		 WHERE [IdAvaliacaoProfessor] = @IdAvaliacao;
	else
		UPDATE [dbo].[AvaliacaoTurma]
		   SET [AvaliacaoTurma] = @Avaliacao
			  ,[DataInclusao] = GETDATE()
		 WHERE [IdAvaliacaoTurma] = @IdAvaliacao;

    PRINT 'Avaliação alterada com sucesso.' 
END


