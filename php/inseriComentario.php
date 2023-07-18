<?php
$comentario1;


// if (isset($_GET['comentarioTexto'])) {
//     $nome = $_GET['comentarioTexto'];

//     // Faça o processamento necessário com o parâmetro "nome"
//     echo "Olá, " . $comentario;
// }

class InseriDados {
    private $idComentario;
    // public function __construct() {
    //     $this->professoes = array();
        
    // }
    public function conexaoBanco(){    
        $serverName = "BODAODELL\\SQLEXPRESS";
        $database = "DB_AVALICAO";
        try {
            $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", "UsuarioServico", "Mengo");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            return null;
        }    
    }
    public function inseriComentario($usuario,$idProfessor,$comentario){
        $conn = $this->conexaoBanco();
        

        try {
            $sql= "EXEC [dbo].[INSERIR_AVALIACAO_PROFESSOR] ";
            $sql = $sql . $usuario;
            $sql = $sql . "," . $idProfessor;
            $sql = $sql . "," . $comentario;
            
           
            echo $sql;
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //$this->professores = $results;
            echo "Insert comentário realizado com sucesso!";
           // $conn->close();
        } catch (PDOException $e) {
            echo "Erro no insert de comentário: " . $e->getMessage();
           //$conn->close();
        }
    }

    
    public function inserirComentarioNEW($matriculaEstudante, $idProfessor, $comentario) {
        $dataInclusao = "getdate()";
        $conn = $this->conexaoBanco();
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
        $stmt = $conn->query($consulta);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    }

    
   
}   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o formulário foi submetido via método POST

    if (isset($_POST['comentario'])) {
        $usuario = $_POST['usuario'];
        $idProfessor = $_POST['idProfessor'];
        $comentario = "'" . $_POST['comentario'] . "'";        
        $comet = new InseriDados();
        //$comet->inserirComentarioNEW($usuario, $idProfessor, $comentario);
        $comet->inseriComentario($usuario, $idProfessor, $comentario);
        //$turmas =  $dados->buscaTurma();
        echo $comentario;
    }
}

?>