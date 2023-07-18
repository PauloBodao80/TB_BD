<?php
    // require 'professores.php';
    // require 'inseriComentario.php';
    
?>
<!------ Include the above in your HEAD tag ---------->
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
        <title>Login</title>
    </head>
    <body>
        <div id="   ">
            <h3 class="text-center text-white pt-5">Login form</h3>
            <div class="container" id="divContainer>
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center text-info">Login</h3>
                                <div class="form-group">
                                    <label for="usuario" class="text-info">Usuário:</label><br>
                                    <input type="text" name="usuario" id="usuario" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="senha" class="text-info">Senha:</label><br>
                                    <input type="text" name="senha" id="senha" class="form-control">
                                </div>
                                <form id="formComentario" method="post" action="inseriComentario.php" onsubmit="adicionaComentario(event)">
                                <div class="form-group">
                                    <label for="lembrar" class="text-info"><span>Lembrar-me</span> <span><input id="lembrar" name="lembrar" type="checkbox"></span></label><br>
                                    <input type="button" name="entrar" class="btn btn-info btn-md" value="entrar" onclick="validarUsuario(event)">
                                </div>
                                <div id="register-link" class="text-right">
                                    <a href="cadastro.php" class="text-info">Cadastro</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/index.js?v=7"></script>
    </body>
</html>