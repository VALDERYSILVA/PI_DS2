<?php

include_once "configuracao/conexao.php";


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_user = "SELECT id, senha FROM usuarios WHERE id =:id LIMIT 1";
    $resul_user = $conexao->prepare($query_user);
    $resul_user->bindParam(':id', $id);
    $resul_user->execute();

    $row_user = $resul_user->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_user];
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger'
    role='alert'>Erro: Nenhuma informação encontrada!</div>"];
}

echo json_encode($retorna);
