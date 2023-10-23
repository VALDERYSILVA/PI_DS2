<?php
include_once "configuracao/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$qtd = ($dados['senha']);

if (empty($dados['cod'])) {
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário enviar o COD!</div>"];
} elseif ((strlen($qtd)) < 8) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>A senha deve conter 8 caracteres!</div>"];
} elseif ((strlen($qtd)) > 8) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>A senha deve conter 8 caracteres!</div>"];
} elseif (empty($dados['senha'])) {
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Senha não pode ser em branco!</div>"];
} else {
    $query_usuario_senha = "UPDATE clientes SET senha=:senha WHERE cod=:cod";
    $edit_senha = $conexao->prepare($query_usuario_senha);

    $senha_hash = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $edit_senha->bindParam(':senha', $senha_hash);
    $edit_senha->bindParam(':cod', $dados['cod']);

    if ($edit_senha->execute()) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-success' role='alert'>Senha alterada com Sucesso!</div>"];
    } else {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Senha não pode ser em branco!</div>"];
    }
}

echo json_encode($retorna);
