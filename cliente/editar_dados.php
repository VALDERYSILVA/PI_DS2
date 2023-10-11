<?php

include_once "configuracao/conexao.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['cod'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Tente novamente!</div>"];
} elseif (empty($dados['telefone'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o número de telefone!</div>"];
} elseif (empty($dados['email'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário Informar o email!</div>"];
} else {
    $query_usuario = "UPDATE clientes SET telefone=:telefone, email=:email WHERE cod=:cod";

    $edit_usuario = $conexao->prepare($query_usuario);
    $edit_usuario->bindParam(':telefone', $dados['telefone']);
    $edit_usuario->bindParam(':email', $dados['email']);
    $edit_usuario->bindParam(':cod', $dados['cod']);

    if ($edit_usuario->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Alterado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Não Alterado!</div>"];
    }
}

echo json_encode($retorna);
