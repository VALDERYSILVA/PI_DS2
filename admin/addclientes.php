?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Painel de controle</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./estilos/stylepainel.css">
</head>

<div id="enviar_contato" class="modalDialog3">
    <form id="formulario" name="email" method="POST" action="./configuracao/enviar.php">
        <a href="painel.php" class="close">X</a>
        <h1>Adicionar contato/cliente</h1>
        <p>Preencha o formulário</p>

        <div class="input-single">
            <input type="text" name="nome" id="nome-box" class="input" autocomplete="off" maxlength="55" required>
            <label for="nome-box">Nome completo</label>
        </div>

        <div class="input-single">
            <input type="text" name="telefone" id="telefone-box" class="input" autocomplete="off" maxlength="15" onkeyup="mascaraTelefone('(  )     -    ', this)" required>
            <label for="telefone-box">Telefone</label>
            <script src="JS/mascara.js"></script>
        </div>

        <div class="input-single">
            <input type="text" name="email" id="email-box" class="input" autocomplete="off" maxlength="55" required>
            <label for="email-box">e-mail</label>
        </div>

        <div class="input-single">
            <textarea type="text" name="mensagem" rows="6" cols="25" id="mensagem-box" class="textarea" autocomplete="off" maxlength="255" required></textarea>
            <label for="mensagem-box">Deixe aqui uma mensagem...</label>
        </div>

        <div class="btn">
            <input type="submit" name="submit" value="Enviar" onclick="location.href = document.referrer;">
        </div>
    </form>
</div>