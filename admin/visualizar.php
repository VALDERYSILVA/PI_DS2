<?php

include_once "configuracao/conexao.php";


$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);

if (!empty($cod)) {

    $query_cliente = "SELECT cod, senha, plano, vencimento, nome, rg, cpf, 
    nascimento, telefone, email, cep, logradouro, numero, complemento, bairro, data_cadastro,
    cidade, uf ,ibge, observacao FROM clientes WHERE cod =:cod LIMIT 1";
    $resul_cliente = $conexao->prepare($query_cliente);
    $resul_cliente->bindParam(':cod', $cod);
    $resul_cliente->execute();

    $row_cliente = $resul_cliente->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_cliente];
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger'
    role='alert'>Erro: Nenhum cliente encontrado!</div>"];
}

echo json_encode($retorna);
