<?php
require 'buscaDados.php';
$dados = new BuscaDados();
$turmas =  $dados->buscaTurma();

class ComentarioDAO {
    private $conexao;

    public function __construct($host, $database, $usuario, $senha) {
        $dsn = "sqlsrv:Server=$host;Database=$database";
        $this->conexao = new PDO($dsn, $usuario, $senha);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserirComentario($matriculaEstudante, $idProfessor, $comentario) {
        $dataInclusao = date('Y-m-d');
        
        $sql = "INSERT INTO [DB_AVALICAO].[dbo].[AvaliacaoProfessor]
                ([MatriculaEstudante]
                ,[IdProfessor]
                ,[AvaliacaoProfessor]
                ,[DataInclusao])
                VALUES
                (:matriculaEstudante
                ,:idProfessor
                ,:comentario
                ,:dataInclusao)";

        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':matriculaEstudante', $matriculaEstudante);
        $consulta->bindParam(':idProfessor', $idProfessor);
        $consulta->bindParam(':comentario', $comentario);
        $consulta->bindParam(':dataInclusao', $dataInclusao);

        if ($consulta->execute()) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }
}


?>