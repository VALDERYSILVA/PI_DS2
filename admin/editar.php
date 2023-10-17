<?php

include_once "configuracao/conexao.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['cod'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Tente novamente!</div>"];
} elseif (empty($dados['nome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário informar o nome!</div>"];
} elseif (empty($dados['cpf'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o CPF!</div>"];
} elseif (empty($dados['rg'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar um número de documento de identificação!</div>"];
} elseif (empty($dados['nascimento'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar a data de nascimento correta!</div>"];
} elseif (empty($dados['telefone'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o número de telefone correro!</div>"];
} elseif (empty($dados['email'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o email corretamente!</div>"];
} elseif (empty($dados['cep'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar CEP</div>"];
} elseif (empty($dados['numero'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o número da residência!</div>"];
} elseif (empty($dados['bairro'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o bairro!</div>"];
} elseif (empty($dados['cidade'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o cidade!</div>"];
} elseif (empty($dados['uf'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o estado!</div>"];
    // } elseif (empty($dados['senha'])) {
    //     $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar a senha do usuário!</div>"];
} elseif (empty($dados['plano'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o plano!</div>"];
} elseif (empty($dados['vencimento'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o vencimento!</div>"];
} elseif (empty($dados['observacao'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Campo observação em branco!</div>"];
} else {
    $query_usuario = "UPDATE clientes SET plano=:plano, vencimento=:vencimento, nome=:nome, rg=:rg, cpf=:cpf, 
    nascimento=:nascimento, telefone=:telefone, email=:email, cep=:cep, logradouro=:logradouro, numero=:numero, 
    complemento=:complemento, bairro=:bairro, cidade=:cidade, uf=:uf, ibge=:ibge, observacao=:observacao WHERE cod=:cod";

    $edit_usuario = $conexao->prepare($query_usuario);
    $edit_usuario->bindParam(':plano', $dados['plano']);
    $edit_usuario->bindParam(':vencimento', $dados['vencimento']);
    $edit_usuario->bindParam(':nome', $dados['nome']);
    $edit_usuario->bindParam(':rg', $dados['rg']);
    $edit_usuario->bindParam(':cpf', $dados['cpf']);
    $edit_usuario->bindParam(':nascimento', $dados['nascimento']);
    $edit_usuario->bindParam(':telefone', $dados['telefone']);
    $edit_usuario->bindParam(':email', $dados['email']);
    $edit_usuario->bindParam(':cep', $dados['cep']);
    $edit_usuario->bindParam(':logradouro', $dados['logradouro']);
    $edit_usuario->bindParam(':numero', $dados['numero']);
    $edit_usuario->bindParam(':complemento', $dados['complemento']);
    $edit_usuario->bindParam(':bairro', $dados['bairro']);
    $edit_usuario->bindParam(':cidade', $dados['cidade']);
    $edit_usuario->bindParam(':uf', $dados['uf']);
    $edit_usuario->bindParam(':ibge', $dados['ibge']);
    $edit_usuario->bindParam(':observacao', $dados['observacao']);
    $edit_usuario->bindParam(':cod', $dados['cod']);

    if ($edit_usuario->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Alterado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Não alterado(s)!</div>"];
    }
}

echo json_encode($retorna);
