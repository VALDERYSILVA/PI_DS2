<?php

// conexao com banco começa aqui

$pdo = new PDO('mysql:host=localhost;dbname=bd_projeto', 'root', '', array(PDO::ATTR_PERSISTENT => true));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// conexao com banco termina aqui

$codigo = $_GET['id'];

$consuta = $pdo->prepare("SELECT * FROM contato WHERE id=:id");
$consuta->bindValue(':id', $codigo);
$consuta->execute();


while ($dado = $consuta->fetch(PDO::FETCH_ASSOC)) {

    $codigo = $dado['id'];
    $nome = $dado['nome'];
    $telefone = $dado['telefone'];
    $email = $dado['email'];
    $mensagem = $dado['mensagem'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Painel de controle</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./estilos/stylepainel.css">
</head>

<div id="editarclientes" class="modalDialog3">
    <form id="formulario" name="email" method="POST" action="alteracaoClientes.php">
        <a href="painel.php" class="close">X</a>
        <h1>Alterar contato/cliente</h1>
        <p>Altere o formulário</p>

        <div class="input-single">
            <input type="hidden" name="id" value="<?php echo $codigo ?>" id="id-box" class="input" autocomplete="off" required>
        </div>

        <div class="input-single">
            <input type="text" name="nome" value="<?php echo $nome ?>" id="nome-box" class="input" autocomplete="off" maxlength="55" required>
            <label for="nome-box">Nome completo</label>
        </div>

        <div class="input-single">
            <input type="text" name="telefone" value="<?php echo $telefone ?>" id="telefone-box" class="input" onkeyup="mascaraTelefone('(  )     -    ', this)" required>
            <label for="telefone-box">Telefone</label>
            <script src="JS/mascara.js"></script>
        </div>

        <div class="input-single">
            <input type="text" name="email" value="<?php echo $email ?>" id="email-box" class="input" autocomplete="off" maxlength="55" required>
            <label for="email-box">e-mail</label>
        </div>

        <div class="input-single">
            <input type="text" name="mensagem" value="<?php echo $mensagem ?>" id="mensagem-box" class="textarea" autocomplete="off" maxlength="255" required>
            <label for="mensagem-box">Observações...</label>
        </div>

        <div class="btn">
            <input type="submit" name="submit" value="Salvar">
        </div>
    </form>
</div>