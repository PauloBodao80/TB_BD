
--exec [dbo].[INSERIR_AVALIACAO_PROFESSOR]
--@matriculaEstudante = 180049445,
--@IdProfessor = 1,
--@AvaliacaoProfessor = 'Muito bom mengo'

--exec [dbo].[INSERIR_AVALIACAO_TURMA]
--@matriculaEstudante = 180049445,
--@IdTurma = 121,
--@AvaliacaoTurma = 'Muito bom mengo turma'

--exec [dbo].[INSERIR_DENUNCIA]
--@matriculaEstudante = 180049445,
--@IdAvaliacao = 1,
--@TipoDenuncia = 0

--exec [dbo].[EXCLUIR_AVALIACAO]
--	@IdDenuncias = 1,
--	@Tipo = 0

--exec [dbo].[EXCLUIR_DENUNCIA] 
--	@IdDenuncias = 2

--exec [dbo].[EXCLUIR_ESTUDANTE]
--	@matriculaEstudante = 180049445

--exec [dbo].[CADASTRAR_ESTUDANTE]
--	@matricula = 180049445,
--	@Nome = 'PAULO OCTÁVIO LOPES SCHOTTZ',
--	@Curso = 'CIÊNCIAS DA COMPUTAÇÃO',
--	@email = 'bodaoschottz@hotmail.com',
--	@senha = 'Mengo1980',
--	@Administrador = 1

select * from [dbo].[AvaliacaoTurma]
select * from [dbo].[AvaliacaoProfessor]
select * from [dbo].[ESTUDANTES]
select * from [dbo].[Denuncias]
select * from [dbo].[Login]