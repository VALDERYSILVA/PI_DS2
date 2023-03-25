<?php

$servidor = "localhost";
$banco = "formulario";
$usuario = "root";
$senha = "";


$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
if (!$conexao) {
    die ("Falha ao conectar: " .mysqli_connect_error());
}

?>