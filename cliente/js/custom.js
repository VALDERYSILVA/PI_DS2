const editarForm = document.getElementById("edit-dados-form");
const altSenhaForm = document.getElementById("alt-senha-form");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");
const msgAlertaErroAlt = document.getElementById("msgAlertaErroAlt");
const msgAlerta = document.getElementById("msgAlerta");



// Visualizar Dados

async function visualizarDados(cod) {
    //console.log("Acessou " + cod);
    const dados = await fetch('visualizar.php?cod=' + cod);
    const resposta = await dados.json();
    //console.log(resposta);
    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const visModal = new bootstrap.Modal(document.getElementById("visualizarDados"));
        visModal.show();

        document.getElementById("nome").innerHTML = resposta['dados'].nome;
        document.getElementById("telefone").innerHTML = resposta['dados'].telefone;
        document.getElementById("email").innerHTML = resposta['dados'].email;
        // document.getElementById("rg").innerHTML = resposta['dados'].rg;
        // document.getElementById("cpf").innerHTML = resposta['dados'].cpf;
        document.getElementById("logradouro").innerHTML = resposta['dados'].logradouro;
        document.getElementById("numero").innerHTML = resposta['dados'].numero;
        document.getElementById("complemento").innerHTML = resposta['dados'].complemento;
        document.getElementById("bairro").innerHTML = resposta['dados'].bairro;
        document.getElementById("cidade").innerHTML = resposta['dados'].cidade;
        document.getElementById("uf").innerHTML = resposta['dados'].uf;
    }
}

/* -------------------------------  Meus Dados / Atualizar Dados -------------------------------  */

async function editarDados(cod) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar.php?cod=' + cod);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editarModal = new bootstrap.Modal(document.getElementById("editarDadosModal"));
        editarModal.show();
        document.getElementById("editarCod").value = resposta['dados'].cod;
        document.getElementById("editarTelefone").value = resposta['dados'].telefone;
        document.getElementById("editarEmail").value = resposta['dados'].email;
    }
}

editarForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const dadosForm = new FormData(editarForm);
    //console.log(dadosForm);

    const dados = await fetch("editar_dados.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlertaErroEdit.innerHTML = resposta['msg'];
    } else {
        msgAlertaErroEdit.innerHTML = resposta['msg'];
        window.location.href = "index.php";
    };
});


/* -------------------------------  Meus Dados / Alterar Senha -------------------------------  */

async function editarSenha(cod) {
    //console.log("Função Editar");
    msgAlertaErroAlt.innerHTML = "";

    const dados = await fetch('visualizar.php?cod=' + cod);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editarModal = new bootstrap.Modal(document.getElementById("altSenhaModal"));
        editarModal.show();
        document.getElementById("altCod").value = resposta['dados'].cod;
        //document.getElementById("altSenha").value = resposta['dados'].senha;
        //document.getElementById("repSenha").value = resposta['dados'].senha;
    }
}

altSenhaForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const dadosAltForm = new FormData(altSenhaForm);
    // console.log(dadosAltForm);
    // for (var dadosResposta of dadosAltForm.entries()) {
    //     console.log(dadosResposta[0] + " - " + dadosResposta[1]);
    //}

    const dados = await fetch("editar_senha.php", {
        method: "POST",
        body: dadosAltForm
    });

    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlertaErroAlt.innerHTML = resposta['msg'];
    } else {
        alert("Senha alterada com sucesso!\nFavor realizar login com nova senha")
        window.location.href = "sair.php";
    }
});


// mascara Telefone

const fone = document.querySelector('#editarTelefone')

fone.addEventListener('keypress', () => {
    let inputLength = fone.value.length

    // MAX LENGHT 14  CPF
    if (inputLength == 0) {
        fone.value += '('
    } else if (inputLength == 3) {
        fone.value += ')'
    } else if (inputLength == 9) {
        fone.value += '-'
    }

})