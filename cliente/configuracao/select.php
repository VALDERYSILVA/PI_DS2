<?php


// Receber o id
$cod = $_SESSION['cod'];

$query_cliente = "SELECT cod, senha, plano, vencimento, nome, rg, cpf, 
DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento_br, telefone, email, cep, logradouro, numero, complemento, bairro, data_cadastro, 
cidade, uf ,ibge, observacao FROM clientes WHERE cod =:cod ORDER BY cod DESC  LIMIT 1";
$resul_cliente = $conexao->prepare($query_cliente);
$resul_cliente->bindParam(':cod', $cod);
$resul_cliente->execute();

if (($resul_cliente) and ($resul_cliente->rowCount() != 0)) {
    $row_cliente = $resul_cliente->fetch(PDO::FETCH_ASSOC);
    // var_dump($row_cliente);

    // Extrair o array para imprimir os valores através da chave do array
    extract($row_cliente);
}
