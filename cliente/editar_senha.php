<?php

include_once "configuracao/conexao.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$qtd = ($dados['senha']);

if (empty($dados['cod'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Tente novamente!</div>"];
} elseif (empty($dados['senha'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar uma senha!</div>"];
} elseif ((strlen($qtd)) < 8) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>A senha deve conter 8 caracteres!</div>"];
} elseif (empty($dados['repsenha'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Repetir a senha!</div>"];
} elseif (($dados['senha']) != (($dados['repsenha']))) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Senha não confere!</div>"];
} else {
    $query_senha = 'UPDATE clientes SET senha=:senha WHERE cod=:cod';

    $edit_senha = $conexao->prepare($query_senha);
    $senha_hash = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $edit_senha->bindParam(':senha', $senha_hash);
    $edit_senha->bindParam(':cod', $dados['cod']);

    if ($edit_senha->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Senha alterada com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Senha não Alterada!</div>"];
    }
}
echo json_encode($retorna);
