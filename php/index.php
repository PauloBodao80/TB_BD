<?php
    require 'professores.php';
    require 'inseriComentario.php';
   

    
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

        <title>Avaliador</title>
    </head>
    <body>
    <div class="container">
            <h1 class="py-5">Avaliação de turmas e professores</h1>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-muted">Escolha a opção para comentar</h2>
                </div>
                <div class="col-md-5">
                    <label style="width: 100px">
                        <input class="" type="radio" class="cbx" id="opcao" name="opcao" value="Turma" onchange="configuraTurmas()"> 
                        Turma
                    </label>
                    <label style="width: 100px">
                        <input class="" type="radio" class="cbx" id="opcao" name="opcao" value="professor" checked onchange="configuraProfessores()">
                        Professor												
                    </label>
                </div>
            </div>            
             <!-- Formulário para escolher quem comentar style="display: none" --> 
            <div>
                <div id= "divTurma" class="form-group" style="display: none">
                    <label class="form-label" for="turma">Turma</label>
                    <select class="form-control" id="turma" name="turma" onclick="buscaProf(2)";>
                        <option value="0">Escolha uma Turma</option>
                        
                    </select>
                </div>
                <div id="divProfessor" class="form-group">
                    <label class="form-label" for="professor">Professor</label>
                    <select class="form-control" id="professor" onclick="buscaProf(1)";>
                        <option value="0">Escolha um Professor</option>                        
                    </select>
                </div>
            </div>
            <!-- Formulário para adicionar comentários -->
            <div id="comment-section">
                <h2>Deixe um comentário:</h2>
                <form id="formComentario" method="post" action="inseriComentario.php" onsubmit="adicionaComentario(event)">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Deixe seu comentário" id="textoComentario" name="textoComentario"></textarea>
                        <label for="floatingTextarea">Comentário</label>
                    </div>
                    <button class="btn btn-lg btn-primary my-3" type="submit">Enviar</button>
                </form>
            </div>
            <!-- Lista de comentários -->
            <div id="comment-list">
                <h2>Comentários:</h2>
                <!-- Comentários serão adicionados dinamicamente aqui -->
                <div id="comments"></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
        <script language="JavaScript" type="text/javascript" src="js/index.js?v=7"></script>
        
    </body>
</html>
