<?php
class LoginUsuario{
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
    public function verificaUsuario($usuario,$senha){  
        //$resultado = 0;     
        $conn = $this->conexaoBanco();       
        try {
            // $sql = "DECLARE @resultado INT; ";
            // $sql = $sql . "SET @resultado = [dbo].[verificalogin] ( ";
            // $sql = $sql . $usuario;
            // $sql = $sql . "," . $senha; 
            // $sql = $sql . ");  ";
            // echo $sql;
            // $stmt = $conn->query($sql);
            // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);           
            
            $stmt = $conn->prepare("SELECT dbo.verificalogin(?, ?) AS Resultado");
            $stmt->bindParam(1, $usuario, PDO::PARAM_INT);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC)['Resultado'];
            echo $resultado;
        } catch (PDOException $e) {
            echo "Erro na verificação de usuário: " . $e->getMessage();
           //$conn->close();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o formulário foi submetido via método POST
    if (isset($_POST['senha'])) {
   
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $login = new LoginUsuario();
        $resp = $login->verificaUsuario($usuario,$senha,);  
        //echo $resp;
        $login = null;
    }
}