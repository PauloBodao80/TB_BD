$(document).ready(function () {         
    console.log("mengo submit")

})
var usuarioGlobal;
var parametro = 'valor'; // Parâmetro que será passado para o PHP
var url = 'arquivo.php?parametro=' + encodeURIComponent(parametro); // Construção da URL com o parâmetro


function validar(){     console.log("mengo validar")
console.log($('#professor').val())
console.log($('#turma').val())
// $('#divProfessor').hide()
// $('#divTurma').show()   
}

function configuraProfessores(){
    
	$('#divTurma').val('');
    $('#divTurma').hide();
    $('#divProfessor').show();
}

function configuraTurmas(){
    
    $('#divProfessor').val('');
    $('#divProfessor').hide();
    $('#divTurma').show();
}
// Função que valida usuário
function validarUsuario(event){
    event.preventDefault(); // Evita o comportamento padrão do formulário
    usuarioGlobal = $('#usuario').val();
    senha = $('#senha').val();
    console.log(usuarioGlobal);
    console.log(senha);
    $.ajax({
        url: 'verificaLogin.php',
        type: 'POST',
        data: { 
            usuario: usuarioGlobal,            
            senha: senha
        },
        success: function(response) {
            console.log(usuarioGlobal);
            if (response == 1){
                // window.location.href = 'denuncia.php';
                // console.log(response + ' administrador')


            }else if (response == 0){                
                window.location.href = 'index.php'; 
                console.log(' estudante')
            }else{
                console.log(response + ' sen registro')

            }
        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição: ' + error);
        }
    });
}
//Função levar usuário login
function levaUsuario(usuario){ console.log("entrou")
    $.ajax({
        url: 'index.php',
        type: 'POST',
        data: { 
            usuario: usuarioGlobal,
        },
        success: function(response) {

        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição: ' + error);
        }

    });
}
// Função para adicionar um usuário e cadastrar
function adicionaUsuario(event) {
    event.preventDefault(); // Evita o comportamento padrão do formulário
    matricula = $('#matricula').val();
    nome = $('#nome').val();
    curso = $('#curso').val();
    email = $('#email').val();
    senha = $('#senha').val();
    
    $.ajax({
        url: 'usuario.php',
        type: 'POST',
        data: { 
            matricula: matricula,
            nome: nome,
            curso: curso,
            email: email,
            senha: senha
        },
        success: function(response) {
            alert('Estudante incluído com sucesso.'); // Exibe a resposta do PHP
            limparCadastro();
        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição: ' + error);
        }
    });

}
// Função Limpar cadastro
function limparCadastro(){
    $('#formCadastro').each(function () {
		this.reset();
	})
    $('#nome').uniform();
	$('#nome').text('');
    $('#matricula').uniform();
	$('#matricula').text('');
    $('#curso').uniform();
	$('#curso').text('');
    $('#emal').uniform();
	$('#email').text('');
    $('#senha').uniform();
	$('#senha').text('');
}

function buscaProf(tipo) {
    //event.preventDefault(); // Evita o comportamento padrão do formulário
    // Requisição AJAX para obter os dados do PHP
    $.ajax({
        url: 'professores.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        data: {
            tipo: tipo
        },
        success: function(response) {
            preencherSelect(response,tipo);
        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição: ' + error);
        }
    });

    // Função para preencher o select com os dados recebidos do PHP
    function preencherSelect(opcoes,tipo) {
        if(tipo == 1){
            var select = $('#professor');
            $.each(opcoes, function(index, opcao) {
                select.append($('<option>').val(opcao.IdProfessor).text(opcao.NomeProfessor));
            });
        } else { console.log(tipo + " InformacoesTurma")
            var select = $('#turma');
            $.each(opcoes, function(index, opcao) {
                select.append($('<option>').val(opcao.IdTurma).text(opcao.InformacoesTurma));
            });
        }
        
    }
};



// Função para adicionar um login
function adicionaLogin(matricula, senha) {
    console.log(matricula);
    console.log(senha);
}
// Função para adicionar um comentário
function adicionaComentario(event) {
    //event.preventDefault(); // Evita o comportamento padrão do formulário

    // Obtém o texto do comentário
    var commentText = document.getElementById("textoComentario").value;

    // Cria um novo elemento para o comentário
    var commentElement = document.createElement("div");
    commentElement.className = "comment";

    // Cria elementos para exibir o autor, texto e horário do comentário
    let autor = "Autor do Comentário";
    let textoComentario = commentText;
    let dataComentario = getCurrentTimestamp();

    // Adiciona os elementos ao elemento do comentário
    // Template strings
    let comentario = `
    <div class="alert alert-light">
        <h6 class="text-primary">${autor}</h6>
        <p>${textoComentario}</p>
        <span class="badge bg-primary py-2">${dataComentario}</span>
        <div class="float-end">
            <button class="btn btn-sm btn-warning"
                data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-title="This top tooltip is themed via CSS variables."
                ><i class="fa-solid fa-flag text-white"></i></button>
            <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
        </div>
        
    </div>
    `;
    // Adiciona o comentário à lista de comentários
    $("#comments").append(comentario);
    idProfessor = $('#professor').val();
    usuarioGlobal = $('#usuario').val();
    console.log(usuarioGlobal);
    $.ajax({
        url: 'inseriComentario.php',
        type: 'POST',
        data: { 
                usuario: usuario,
                idProfessor: idProfessor,
                comentario: commentText                                
        },
        success: function(response) {
            alert('Comentário incluído com sucesso.'); // Exibe a resposta do PHP
        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição: ' + error);
        }
    });
    
    // Limpa o campo de texto do comentário
    document.getElementById("textoComentario").value = "";

}

// Função para obter o horário atual no formato "HH:MM:SS"
function getCurrentTimestamp() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Adiciona um zero à esquerda se for necessário
    if (hours < 10) {
    hours = "0" + hours;
    }
    if (minutes < 10) {
    minutes = "0" + minutes;
    }
    if (seconds < 10) {
    seconds = "0" + seconds;
    }

    return hours + ":" + minutes + ":" + seconds;
}

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})