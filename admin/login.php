<?php

session_start();
include('conexao.php');

if (empty($_POST['login']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$login = mysqli_real_escape_string($conexao, $_POST['login']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, usuario from usuario where login = '{$login}' and senha = md5('$senha')";

$resulte = mysqli_query($conexao, $query);

$row = mysqli_num_rows($resulte);

if ($row == 1) {
    $_SESSION['login'] = $login;
    header('Location:painel.php');
    exit();
} else {
    header('Location:index.php');
    exit();
}
