<?php
class BuscaDados {
    public $professores;
    public $turmas;
    public $alunos;

    public function __construct() {
        $this->professoes = array();
        $this->turmas = array();
        $this->alunos = array();
    }
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
    public function consultaProfessores($conn){
        try {
            $sql = "SELECT [IdProfessor],[NomeProfessor] FROM [dbo].[PROFESSOR]";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->professores = $results;
            //echo "Consulta de professores realizada com sucesso!";
            //$conn->close();
        } catch (PDOException $e) {
            echo "Erro na buscar professores: " . $e->getMessage();
            //$conn->close();
        }
    }
    public function getProfessores() {
        return $this->professores;
    }
    public function consultaTurma($conn){
        try {
            $sql = "SELECT top 5 [IdTurma],[InformacoesTurma] FROM [dbo].[VW_BUSCA_TURMA] order by [CodDisciplina]";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->turmas = $results;
            // echo "Consulta de turmas realizada com sucesso!";
            //$conn->close();
        } catch (PDOException $e) {
            echo "Erro na buscar turma: " . $e->getMessage();
            //$conn->close();
        }
    }        
    public function getTurma() {
        return $this->turmas;
    }

    public function buscaProfessores(){        
        $conn = $this->conexaoBanco();
        if($conn){
            $this->consultaProfessores($conn);            
        }
        return $this->professores;
    }

    public function buscaTurma(){
        $conn = $this->conexaoBanco();
        if($conn){
            $this->consultaTurma($conn);            
        }
        return $this->turmas;  
    }
    
    public function buscaDenunciaProf(conn){
        try {
            $sql = "SELECT top 5 [IdTurma],[InformacoesTurma] FROM [dbo].[VW_BUSCA_TURMA] order by [CodDisciplina]";
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->turmas = $results;
            // echo "Consulta de turmas realizada com sucesso!";
            //$conn->close();
        } catch (PDOException $e) {
            echo "Erro na buscar turma: " . $e->getMessage();
            //$conn->close();
        }

    }

}
// $dados = new BuscaDados();
// $turmas =  $dados->buscaTurma();
?>