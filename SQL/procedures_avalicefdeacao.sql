USE [DB_AVALICAO]
GO
/****** Object:  StoredProcedure [dbo].[INSERIR_DENUNCIA]    Script Date: 10/07/2023 20:11:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

--CREATE PROCEDURE INSERIR_ALUNO
--    @MatriculaEstudante INT
--   ,@NomeEstudante NVARCHAR(MAX)
--   ,@Curso nvarchar(50)
--   ,@email nvarchar(20)
--AS
--BEGIN
--    INSERT INTO [dbo].[ESTUDANTES]
--           ([MatriculaEstudante]
--           ,[NomeEstudante]
--           ,[Curso]
--           ,[e-mail])
--     VALUES
--           (@MatriculaEstudante
--		   ,@NomeEstudante
--		   ,@Curso
--		   ,@email)

--    PRINT 'Aluno cadastrado com sucesso.' 
--END

--CREATE PROCEDURE EXCLUIR_ESTUDANTE
--    @MatriculaEstudante INT
   
--AS
--BEGIN
--    DELETE FROM [dbo].[ESTUDANTES]
--      WHERE MatriculaEstudante = @MatriculaEstudante

--    PRINT 'Aluno excluído com sucesso.' 
--END

--CREATE PROCEDURE INSERIR_AVALIACAO_PROFESSOR
--    @MatriculaEstudante INT
--   ,@IdProfessor INT
--   ,@AvaliacaoProfessor nvarchar(MAX)
--   
--AS
--BEGIN
--    INSERT INTO [dbo].[AvaliacaoProfessor]
--           ([MatriculaEstudante]
--           ,[IdProfessor]
--           ,[AvaliacaoProfessor]
--           ,[DataInclusao])
--     VALUES
--           (@MatriculaEstudante
--		   ,@IdProfessor
--		   ,@AvaliacaoProfessor
--		   ,GETDATE())

--    PRINT 'Avaliação cadastrada com sucesso.' 
--END

--CREATE PROCEDURE INSERIR_AVALIACAO_TURMA
--    @MatriculaEstudante INT
--   ,@IdTurma INT
--   ,@AvaliacaoTurma nvarchar(MAX)
--   
--AS
--BEGIN
--    INSERT INTO [dbo].[AvaliacaoTurma]
--           ([MatriculaEstudante]
--           ,[IdTurma]
--           ,[AvaliacaoTurma]
--           ,[DataInclusao])
--     VALUES
--           (@MatriculaEstudante
--		   ,@IdTurma
--		   ,@AvaliacaoTurma
--		   ,GETDATE())

--    PRINT 'Avaliação cadastrada com sucesso.' 
--END

--ALTER PROCEDURE [dbo].[INSERIR_DENUNCIA]
--    @MatriculaEstudante INT
--   ,@IdAvaliacao INT
--   ,@TipoDenuncia bit
   
--AS
--BEGIN
--    INSERT INTO [dbo].[dbo].[Denuncias]
--           ([MatriculaEstudante]
--           ,[IdAvaliacao]
--           ,[TipoDenuncia]
--           ,[DataInclusao])
--     VALUES
--           (@MatriculaEstudante
--		   ,@IdAvaliacao
--		   ,@TipoDenuncia
--		   ,GETDATE()
--		   )

--    PRINT 'Denúncia cadastrada com sucesso.' 
--END


CREATE PROCEDURE [dbo].[VERIFICA_LOGIN]
    @Matricula INT
   ,@Senha varchar(10)
   
AS
BEGIN
    SET NOCOUNT ON;

    DECLARE @usuario INT, @adm BIT,@resultado INT ;

    -- Verifica se existe correspondência na tabela de login
    SELECT @usuario = COUNT(*) FROM [dbo].[Login] WHERE MatriculaEstudante = @matricula AND Senha = @senha;    
	-- Verifica se a coluna  é administrador
	SELECT @adm = Administrador FROM [dbo].[Login] WHERE MatriculaEstudante = @matricula AND Senha = @senha;
    IF @usuario > 0 AND @adm = 1
    BEGIN		
        -- Acesso permitido para usuário administrador
        --PRINT 'Acesso permitido para usuário administrador.';
		SET @resultado = 1;
		select @resultado;
    END
    ELSE IF @usuario > 0 AND @adm = 0
    BEGIN
        -- Acesso permitido para usuário não-administrador
       -- PRINT 'Acesso permitido para usuário não-administrador.';
		SET @resultado = 0;
		select @resultado;
    END
    ELSE
    BEGIN
        -- Acesso negado
       -- PRINT 'Acesso negado.';
		SET @resultado = 2;
		select @resultado;
    END
END;

