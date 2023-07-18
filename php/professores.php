<?php
require 'buscaDados.php';

$dados = new BuscaDados();
// function prof($tipo){
//     if($tipo = 1){
//         $prof =  $dados->buscaProfessores();
//     }else{
//         $turmas =  $dados->buscaTurma();
//     }
//     $prof =  $dados->buscaProfessores();
// }
// $prof =  $dados->buscaProfessores();
// $turmas =  $dados->buscaTurma();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo']) == 1) {
        //$tipo = $_POST['usuario'];
        $prof =  $dados->buscaProfessores();
        header('Content-Type: application/json');
        echo json_encode($prof);
    } else {
        $turmas =  $dados->buscaTurma();
        header('Content-Type: application/json');
        echo json_encode($turmas);
    }
}
?>