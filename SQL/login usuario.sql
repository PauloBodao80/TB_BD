USE master;
GO

---- Criar o login com senha para o serviço
--CREATE LOGIN [UsuarioServico] WITH PASSWORD = 'Mengo';
--GO

---- Criar o usuário de serviço para o login
--CREATE USER [UsuarioServico] FOR LOGIN [UsuarioServico];
--GO

---- Conceder permissão de sysadmin para o usuário de serviço
--ALTER SERVER ROLE sysadmin ADD MEMBER [UsuarioServico];
GO

SELECT 
    SERVERPROPERTY('MachineName') AS [NomeDoServidor],
    SERVERPROPERTY('InstanceName') AS [NomeDaInstancia],
    SERVERPROPERTY('IsClustered') AS [EstaEmCluster]
	SELECT @@VERSION AS [VersaoDoSQLServer]
