<?php

// Recebe o id
$id = $_SESSION['id'];

$query_usuario = "SELECT id, usuario, email, senha FROM usuario WHERE id =:id LIMIT 1";
$resul_usuario = $conexao->prepare($query_usuario);
$resul_usuario->bindParam(':id', $id);
$resul_usuario->execute();

if (($resul_usuario) and ($resul_usuario->rowCount() != 0)) {
    $row_usuario = $resul_usuario->fetch(PDO::FETCH_ASSOC);
    // var_dump($row_cliente);

    // Extrair o array para imprimir os valores através da chave do array
    extract($row_usuario);
}
