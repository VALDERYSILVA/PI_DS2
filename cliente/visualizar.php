<?php

include_once "configuracao/conexao.php";


$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);

if (!empty($cod)) {

    $query_cliente = "SELECT cod, plano, vencimento, nome, rg, cpf, 
    DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento_br, telefone, email, logradouro, numero, complemento, bairro,
    cidade, uf, senha FROM clientes WHERE cod =:cod LIMIT 1";
    $resul_cliente = $conexao->prepare($query_cliente);
    $resul_cliente->bindParam(':cod', $cod);
    $resul_cliente->execute();

    $row_cliente = $resul_cliente->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_cliente];
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger'
    role='alert'>Erro: Nenhuma informação encontrada!</div>"];
}

echo json_encode($retorna);
