<?php

include_once "configuracao/conexao.php";


$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);

if (!empty($cod)) {

    $query_cliente = "DELETE FROM clientes WHERE cod=:cod";
    $resul_cliente = $conexao->prepare($query_cliente);
    $resul_cliente->bindParam(':cod', $cod);

    if ($resul_cliente->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger'
        role='alert'>Excluido com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger'
        role='alert'>Erro: Não excluido!</div>"];
    }
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger'
    role='alert'>Erro: Nenhum cliente encontrado!</div>"];
}

echo json_encode($retorna);
