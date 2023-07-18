<?php
    require 'php/DadosGerais/buscaDados.php';
// $serverName = "BODAODELL\\SQLEXPRESS";
// $database = "DB_AVALICAO";

// try {
//     $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", "UsuarioServico", "Mengo");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Consulta SQL
//     $sql = "SELECT [IdProfessor],[NomeProfessor] FROM [dbo].[PROFESSOR]";
//     $stmt = $conn->query($sql);
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// } catch (PDOException $e) {
//     echo "Erro na conexão com o banco de dados: " . $e->getMessage();
// }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Portal de Avaliações">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
        >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title>Avaliação de Turmas e Professores</title>        
    </head>
    <body>
        <div class="container">
            <h1 class="py-5">Avaliação de turmas e professores</h1>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-muted">Escolha uma opção</h4>
                </div>
            </div>
            <div class="form-group">
            <label class="form-label">Professores(as)</label>
                <select class="form-control" id="professor">
                    <option value="0">Escolha um Professor</option>
                    <?php
                    foreach ($prof as $row) {
                        echo '<option value="' . $row['IdProfessor'] . '">' . $row['NomeProfessor'] . '</option>';
                    }                    
                    ?>
                </select>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
        <script language="JavaScript" type="text/javascript" src="iujs/index.js?v=7"></script>
        
    </body>
</html>
