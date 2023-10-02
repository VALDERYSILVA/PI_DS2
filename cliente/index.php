<?php

session_start();
ob_start();
include_once 'configuracao/conexao.php';

if ((!isset($_SESSION['cod'])) and (!isset($_SESSION['cpf'])) and (!isset($_SESSION['senha']))) {
    $_SESSION['msg'] = "<p style='color: #ff0000'>Necessário realizar login para acessar a pagina!</p>";
    header("Location: login.php");
};

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cliente APC Tecnologia</title>
    <link rel="shortcut icon" href="/imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>


    <h1>Central do Cliente...</h1>


    <?php
    $usuario = $_SESSION['nome']
    ?>
    <div class="xp-breadcrumbbar">
        <div class="title">
            <h6>Olá, <?php echo $usuario ?></h6>
        </div>
    </div>

    <ul>
        <li><a href="sair.php" class="sair">
                <span class="material-icons"></span>
                Sair
            </a></li>
    </ul>

</body>

</html>