
--insert INTO DB_AVALICAO.[dbo].[DISCIPLINA]

--select tb.[cod],tb.[nome] ,tb.[cod_depto],qtd
--from (
--	select [cod], [nome] , [cod_depto] , COUNT([cod_depto]) as qtd 
--	from [TRABALHO_BD].[dbo].[disciplinas_2022-1]
--	group by [cod],[nome] ,[cod_depto]
--)as  tb 
--where tb.qtd > 1

select * from  DB_AVALICAO.[dbo].[DISCIPLINA] 
--where NomeDisciplina in ('ARTE E MANIFESTAÇÕES CULTURAIS','SAÚDE DIREITOS HUMANOS E ANTROPOLOGIA','INTRODUÇÃO AO CURSO','PROJETO DE URBANISMO 2')

--select * from [TRABALHO_BD].[dbo].[disciplinas_2022-1] tb1
--	--left join [TRABALHO_BD].[dbo].[disciplinas_2022-1] tb2
--	--	on tb1.cod = tb2.cod
--	--	left join [TRABALHO_BD].[dbo].[disciplinas_2022-1] tb3
--	--	on tb1.cod = tb3.cod

--where tb1.cod in ('CEM0007','PRO0021')
--group by tb1.cod,tb1.cod_depto,tb1.nome,tb2.cod,tb2.cod_depto,tb2.nome,tb3.cod,tb3.cod_depto,tb3.nome