use [DB_AVALICAO]
go

CREATE VIEW BUSCA_INFORMACAO AS
SELECT [Turma]
	  ,[NomeProfessor]
	  ,[Horario]
	  ,[NomeDisciplina]
	  ,[NomeDepartamento]
FROM [dbo].[TURMAS] AS TM
LEFT JOIN [dbo].[DISCIPLINA] AS DC
	ON TM.[CodDisciplina] = DC.CodDisciplina
	LEFT JOIN [dbo].[DEPARTAMENTO] AS DP
		ON TM.[CodDepartamento] = DP.CodDepartamento