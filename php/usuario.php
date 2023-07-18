<?php
class usuario{
    public $usuario;
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
    public function cadastrarEstudante($matricula,$nome,$curso,$email){        
        $conn = $this->conexaoBanco();       
        try {
            $sql = "INSERT INTO [DB_AVALICAO].[dbo].[ESTUDANTES] ";
            $sql = $sql . "([MatriculaEstudante] ";
            $sql = $sql . ",[NomeEstudante] ";
            $sql = $sql . ",[Curso] ";
            $sql = $sql . ",[e-mail]) ";
            $sql = $sql . " VALUES ";
            $sql = $sql . "(" . $matricula;
            $sql = $sql . "," . $nome;
            $sql = $sql . "," . $curso;
            $sql = $sql . "," . $email . ")";
            //echo $sql;
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo "Insert estudante realizado com sucesso!";
            // $this->cadastrarLogin($matricula,$senha);
        } catch (PDOException $e) {
            echo "Erro no insert de estudante: " . $e->getMessage();
           //$conn->close();
        }
    }
    public function cadastrarLogin($matricula,$nome,$curso,$email,$senha,$adm){
        $conn2 = $this->conexaoBanco();
        try {
            $sql = "EXEC [DB_AVALICAO].[dbo].[CADASTRAR_ESTUDANTE] ";
            $sql = $sql . $matricula;
            $sql = $sql . "," . $nome;
            $sql = $sql . "," . $curso;
            $sql = $sql . "," . $email;
            $sql = $sql . "," . $senha;
            $sql = $sql . "," . $adm;            
            //echo $sql;
            $stmt = $conn2->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);           
            echo "Insert login realizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro no insert de login: " . $e->getMessage();
           //$conn->close();
        }
    }

    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o formulário foi submetido via método POST

    if (isset($_POST['matricula'])) {
        $matricula = $_POST['matricula'];
        $nome = "'" . $_POST['nome'] . "'";
        $curso = "'" . $_POST['curso'] . "'";
        $email = "'" . $_POST['email'] . "'";
        $senha = "'" . $_POST['senha'] . "'";
        $usuario = new usuario();
        $usuario->cadastrarLogin($matricula,$nome,$curso,$email,$senha,0);   
        
    }
}

?>