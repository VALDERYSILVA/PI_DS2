<?php

include_once "configuracao/conexao.php";


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_contato = "DELETE FROM contato WHERE id=:id";
    $resul_contato = $conexao->prepare($query_contato);
    $resul_contato->bindParam(':id', $id);

    if ($resul_contato->execute()) {
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
