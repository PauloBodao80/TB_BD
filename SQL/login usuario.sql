USE master;
GO

---- Criar o login com senha para o servi�o
--CREATE LOGIN [UsuarioServico] WITH PASSWORD = 'Mengo';
--GO

---- Criar o usu�rio de servi�o para o login
--CREATE USER [UsuarioServico] FOR LOGIN [UsuarioServico];
--GO

---- Conceder permiss�o de sysadmin para o usu�rio de servi�o
--ALTER SERVER ROLE sysadmin ADD MEMBER [UsuarioServico];
GO

SELECT 
    SERVERPROPERTY('MachineName') AS [NomeDoServidor],
    SERVERPROPERTY('InstanceName') AS [NomeDaInstancia],
    SERVERPROPERTY('IsClustered') AS [EstaEmCluster]
	SELECT @@VERSION AS [VersaoDoSQLServer]
