<?php

session_start();
include("configuracao/verificarLogin.php"); // caminho do seu arquivo de conexão ao banco de dados 

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Painel de controle</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./estilos/styleAddClientes.css">
    <script src="JS/mascara.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>

</head>

<body>

    <div class="container_form">
        <a href="painel.php" class="close">x</a>

        <h1>Cadastro de Clientes</h1>


        <form class="form" action="./configuracao/enviarCliente.php" method="post">

            <div class="form_grupo">
                <label for="nome" class="form_label">Nome</label>
                <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome Completo" autocomplete="off" maxlength="55" required>
            </div>

            <div class="form_grupo">
                <label for="cpf" class="form_label">CPF</label>
                <input type="text" name="cpf" class="form_input" id="cpf" placeholder="xxx.xxx.xxx-xx" autocomplete="off" maxlength="14" required>
            </div>

            <div class="form_grupo">
                <label for="rg" class="form_label">RG</label>
                <input type="text" name="rg" class="form_input" id="rg" placeholder="número de identificação" autocomplete="off" maxlength="12" required>
            </div>

            <div class="form_grupo">
                <label for="nascimento" class="form_label">Data de Nascimento</label>
                <input type="date" name="nascimento" class="form_input" id="nascimento" placeholder="Data de Nascimento" required>
            </div>

            <div class="form_grupo">
                <label for="telefone" class="form_label">Telefone</label>
                <input type="text" name="telefone" class="form_input" id="telefone" placeholder="(xx)xxxxx-xxxx" autocomplete="off" maxlength="15" onkeyup="mascaraTelefone('(  )     -    ', this)" required>
            </div>

            <div class="form_grupo">
                <label for="e-mail" class="form_label">Email</label>
                <input type="email" name="email" class="form_input" id="email" placeholder="exemplo@email.com" autocomplete="off" maxlength="55" required>
            </div>

            <div class="form_grupo">
                <label for="cep" class="form_label">CEP</label>
                <input type="text" name="cep" class="form_input" id="cep" placeholder="Ex.: 00000-000" maxlength="9" required>
            </div>

            <div class="form_grupo">
                <label for="endereco" class="form_label"></label>
                <input type="text" name="logradouro" class="form_input" id="logradouro" placeholder="Ex.: Rua, Avenida, Travessa, etc." maxlength="55" required>
            </div>

            <div class="form_grupo">
                <label for="numero" class="form_label"></label>
                <input type="text" name="numero" class="form_input" id="numero" placeholder="Número" autocomplete="off" maxlength="5" required>
            </div>

            <div class="form_grupo">
                <label for="complemento" class="form_label"></label>
                <input type="text" name="complemento" class="form_input" id="complemento" placeholder="Complemento: Ex.: bloco 15, apat. 104" autocomplete="off" maxlength="55" required>
            </div>

            <div class="form_grupo">
                <label for="bairro" class="form_label"></label>
                <input type="text" name="bairro" class="form_input" id="bairro" placeholder="Bairro" maxlength="55" required>
            </div>

            <div class="form_grupo">
                <label for="cidade" class="form_label"></label>
                <input type="text" name="cidade" class="form_input" id="cidade" placeholder="Cidade" maxlength="55" required>
            </div>

            <div class="form_grupo">
                <label for="estado" class="form_label"></label>
                <input type="text" name="uf" class="form_input" id="uf" placeholder="Estado" maxlength="2" required>
            </div>

            <div class="form_grupo">
                <label for="ibge" class="form_label"></label>
                <input hidden type="text" name="ibge" class="form_input" id="ibge" placeholder="IBGE" maxlength="7" required>
            </div>

            <div class="form_grupo">
                <label for="senha" class="form_label">Senha</label>
                <input type="text" name="senha" class="form_input" id="senha" placeholder="Para acesso ao App Mobile" autocomplete="off" maxlength="8" required>
            </div>

            <div class="form_grupo">

                <label for="plano" class="text">Plano</label>
                <select name="plano" class="dropdown" required>

                    <option selected disabled class="form_select_option" value="">Selecione</option>
                    <option value="100mb" class="form_select_option">100mb</option>
                    <option value="200mb" class="form_select_option">200mb</option>
                    <option value="400mb" class="form_select_option">400mb</option>

                </select>

            </div>

            <div class="form_grupo">

                <span class="legenda">Dia de Vencimento</span>

                <div class="radio-btn">
                    <input type="radio" class="form_new_input" id="oito" name="vencimento" value="08" required="required">
                    <label for="oito" class="radio_label form_label"> <span class="radio_new_btn"></span>Todo dia 08</label>
                </div>

                <div class="radio-btn">
                    <input type="radio" class="form_new_input" id="dezessete" name="vencimento" value="17" required="required">
                    <label for="dezessete" class="radio_label form_label"> <span class="radio_new_btn"></span>Todo dia 17</label>
                </div>

                <div class="radio-btn">
                    <input type="radio" class="form_new_input" id="trinta" name="vencimento" value="30" required="required">
                    <label for="trinta" class="radio_label form_label"> <span class="radio_new_btn"></span>Todo dia 30</label>
                </div>

            </div>

            <div class="form_message">

                <label for="message" class="form_message_label"> Observação:</label>
                <textarea name="observacao" id="message" cols="30" rows="6" autocomplete="off" maxlength="400" class="form_input message_input"></textarea>

            </div>

            <div class="submit">

                <input type="hidden" name="submit" value="Enviar" onclick="location.href = document.referrer;">
                <button type="submit" name="Submit" class="submit_btn">Cadastrar</button>

            </div>
        </form>

    </div>

</body>

</html>