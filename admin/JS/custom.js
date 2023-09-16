

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
        document.getElementById("editsenha").value = resposta['dados'].senha;
        document.getElementById("editplano").value = resposta['dados'].plano;
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
        $('.modal').modal('hide');
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