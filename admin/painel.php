<?php
session_start();
include("verificar_login.php"); // caminho do seu arquivo de conexão ao banco de dados 
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Painel de controle</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./estilos/stylepainel.css">
</head>

<body>
    <header>
        <img src="imagens/logotitulo.png">
        <div class="sair">
            <a href="logout.php">
                <img src="imagens/sair.png"></a>
        </div>
    </header>

    <div class="table-container">
        <h1 class="heading">Contato de Clientes</h1>
        <table class="table">
            <thead>
                <tr>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td>E-mail</td>
                    <td>Mensagem</td>
                    <td>Data de Cadastro</td>
                    <td colspan=2>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($dado = $con->fetch_array()) { ?>
                    <tr>
                        <td data-label="Código"><?php echo $dado['id']; ?></td>
                        <td data-label="Nome"><?php echo $dado['nome']; ?></td>
                        <td data-label="Telefone"><?php echo $dado['telefone']; ?></td>
                        <td data-label="E-mail"><?php echo $dado['email']; ?></td>
                        <td data-label="Mensagem"><?php echo $dado['mensagem']; ?></td>
                        <td data-label="Data de Cadastro"><?php echo date('d/m/Y H:i', strtotime($dado['data_cadastro'])); ?></td>
                        <td data-label=""><a href="editarclientes.php?id=<?php echo $dado['id']; ?>" class="btn_editar">Editar</a></td>
                        <td data-label=""><a href="excluirclientes.php?id=<?php echo $dado['id']; ?> " onclick="return confirm('Tem certeza que deseja excluir?')" class="btn">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>