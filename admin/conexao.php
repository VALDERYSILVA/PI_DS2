<?php

// conexao com banco via mysqli

$servidor = "localhost";
$banco = "bd_projeto";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Checar conexão

// if (!$conexao) {
//     echo "Erro! " . mysqli_connect_error();
// } else {
//     echo "Conexão efetuada com sucesso!";
// }

// mysqli_close($conexao);
// ---------------------------------------------------------------

// mostrar cliente no painel

$consulta = "SELECT * FROM contato";
$con = $conexao->query($consulta) or die($conexao->error);