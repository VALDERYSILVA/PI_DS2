

const tbody = document.querySelector(".listar-clientes");
const cadForm = document.getElementById("add-cliente-form");
const editForm = document.getElementById("edit-cliente-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");
const msgAlerta = document.getElementById("msgAlerta");


const listarUsuarios = async (pagina) => {
    const dados = await fetch("./listarClientes.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);

cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(cadForm);
    dadosForm.append("add", 1);

    document.getElementById("add-cliente-btn").value = "Salvando...";

    const dados = await fetch("adicionar.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();

    if (resposta['erro']) {
        msgAlertaErroCad.innerHTML = resposta['msg'];
    } else {
        msgAlerta.innerHTML = resposta['msg'];
        cadForm.reset();
        listarUsuarios(1);
        $('.modal').modal('hide');
    }
    document.getElementById("add-cliente-btn").value = "Adicionar";
});

async function visualizarCliente(cod) {
    // console.log("Acessou: " + cod);
    const dados = await fetch('visualizar.php?cod=' + cod);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const visModel = new bootstrap.Modal(document.getElementById("visualizarCliente"));
        visModel.show();

        document.getElementById("nomeCliente").innerHTML = resposta['dados'].nome;
        document.getElementById("cpfCliente").innerHTML = resposta['dados'].cpf;
        document.getElementById("rgCliente").innerHTML = resposta['dados'].rg;
        document.getElementById("nascimentoCliente").innerHTML = resposta['dados'].nascimento;
        document.getElementById("telefoneCliente").innerHTML = resposta['dados'].telefone;
        document.getElementById("emailCliente").innerHTML = resposta['dados'].email;
        document.getElementById("cepCliente").innerHTML = resposta['dados'].cep;
        document.getElementById("logradouroCliente").innerHTML = resposta['dados'].logradouro;
        document.getElementById("numeroCliente").innerHTML = resposta['dados'].numero;
        document.getElementById("complementoCliente").innerHTML = resposta['dados'].complemento;
        document.getElementById("bairroCliente").innerHTML = resposta['dados'].bairro;
        document.getElementById("cidadeCliente").innerHTML = resposta['dados'].cidade;
        document.getElementById("estadoCliente").innerHTML = resposta['dados'].uf;
        document.getElementById("ibgeCliente").innerHTML = resposta['dados'].ibge;
        document.getElementById("senhaCliente").innerHTML = resposta['dados'].senha;
        document.getElementById("planoCliente").innerHTML = resposta['dados'].plano;
        document.getElementById("vencimentoCliente").innerHTML = resposta['dados'].vencimento;
        document.getElementById("vencimentoCliente").innerHTML = resposta['dados'].vencimento;
        document.getElementById("data_formatada").innerHTML = resposta['dados'].data_formatada;
        document.getElementById("observacaoCliente").innerHTML = resposta['dados'].observacao;

    }

}

async function editarCliente(cod) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar.php?cod=.' + cod);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editModel = new bootstrap.Modal(document.getElementById("editClienteModal"));
        editModel.show();
        document.getElementById("editcod").value = resposta['dados'].cod;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("editcpf").value = resposta['dados'].cpf;
        document.getElementById("editrg").value = resposta['dados'].rg;
        document.getElementById("editnascimento").value = resposta['dados'].nascimento;
        document.getElementById("edittelefone").value = resposta['dados'].telefone;
        document.getElementById("editemail").value = resposta['dados'].email;
        document.getElementById("editcep").value = resposta['dados'].cep;
        document.getElementById("editlogradouro").value = resposta['dados'].logradouro;
        document.getElementById("editnumero").value = resposta['dados'].numero;
        document.getElementById("editcomplemento").value = resposta['dados'].complemento;
        document.getElementById("editbairro").value = resposta['dados'].bairro;
        document.getElementById("editcidade").value = resposta['dados'].cidade;
        document.getElementById("edituf").value = resposta['dados'].uf;
        document.getElementById("editplano").value = resposta['dados'].plano;
        document.getElementById("editibge").value = resposta['dados'].ibge;
        document.getElementById("editvencimento").value = resposta['dados'].vencimento;
        document.getElementById("editobservacao").value = resposta['dados'].observacao;
    }
}

editForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    document.getElementById("edit-cliente-btn").value = "Salvando...";

    const dadosForm = new FormData(editForm);
    //console.log(dadosForm);
    /*for (var dadosFormEdit of dadosForm.entries()) {
        console.log(dadosFormEdit[0] + " - " + dadosFormEdit[1]);
    }*/

    const dados = await fetch("editar.php", {
        method: "POST",
        body: dadosForm
    });

    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlertaErroEdit.innerHTML = resposta['msg'];
    } else {
        msgAlertaErroEdit.innerHTML = resposta['msg'];
        listarUsuarios(1);
        window.location.href = "dashboard.php";
    };

    document.getElementById("edit-cliente-btn").value = "Salvar";
});



// ------------------------------------------------------------------ //

async function deleteCliente(cod) {

    var confirmar = confirm("Tem certeza que deseja excluir cliente?");

    if (confirmar == true) {
        const dados = await fetch('apagar.php?cod=' + cod);

        const resposta = await dados.json();
        if (resposta['erro']) {
            msgAlerta.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            listarUsuarios(1);
        }
    }

}

// ------------------------------------------------------------------ //

async function deleteContato(id) {

    var confirma = confirm("Tem certeza que deseja excluir contato?");

    if (confirma == true) {
        const dados = await fetch('apagar-contato.php?id=' + id);

        const resposta = await dados.json();
        if (resposta['erro']) {
            msgAlerta.innerHTML = resposta['msg'];
            msgAlerta.innerHTML = resposta['msg'];
            listarUsuarios(1);
        }
    }

}

// ------------------------------------------------------------------ //

// Buscar

var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        searchData();
    }

});

function searchData() {
    window.location = 'dashboard.php?search=' + search.value;
}


// ------------------------------------------------------------------ //

// Alterar Senha

async function editar_registro(cod) {

    // Ocultar o botão editar
    document.getElementById("botao_editar" + cod).style.display = "none";

    // Apresentar o botão salvar
    document.getElementById("botao_salvar" + cod).style.display = "block";

    // Recuperar o valor da senha
    var senha = document.getElementById("valor_senha" + cod);
    // console.log(senha);

    // Substituir o texto pelo campo e atribuir o campo o valor que estava na senha
    senha.innerHTML = "<input type='text' id='senha_text" + cod + "' value='" + senha.innerHTML + "'>";
}

/* Fim Substitulir texto pelo campo na tabela */

/* Inicio editar o registro no banco de dados */
//Função responçavel em salvar no banco de dados e receber i cod do registro que deveser editado

async function salvar_registro(cod) {

    // Recuperar o valor do campo senha
    var senha_valor = document.getElementById("senha_text" + cod).value;
    // console.log(senha_valor);

    // Substituir o campo pelo texto senha
    document.getElementById("valor_senha" + cod).innerHTML = senha_valor;

    // Preparar a STRING de valores que deve ser enviado para o arquivo responsavel em salvar no banco de dados

    var dadosFrom = "cod=" + cod + "&senha=" + senha_valor;
    // console.log(dadosFrom);

    // Fazer a requisição com o FETCH para um arquivo PHP e enviar atraves do metodo POST os dados do formulario

    const dados = await fetch("editar_senha.php", {
        method: "POST",
        headers: { 'content-Type': 'application/x-www-form-urlencoded' },
        body: dadosFrom
    });

    // Ler o objeto, a resposta do arquivo PHP

    const resposta = await dados.json();
    // console.log(resposta);

    // Acessa o IF quando não conseguir editar no banco de dados
    if (!resposta['erro']) {
        // Envia mensagem de erro
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Envia mensagem de sucesso
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Chamar a função para remover a mensagem
        removerMsgAlerta();

        // Apresentar o botão editar
        document.getElementById("botao_editar" + cod).style.display = "block";

        // Ocultar o botão salvar
        document.getElementById("botao_salvar" + cod).style.display = "none";

    }

}

/* Fim editar a senha no banco de dados */

function removerMsgAlerta() {
    setTimeout(function () {
        document.getElementById("msgAlerta").innerHTML = "";
    }, 4000);
}