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
    <header id="header">
        <img src="imagens/logotitulo.png">
        <nav id="nav">
            <ul id="menu" role="Menu">
                <li><a href="addclientes.php">Adicionar Contato</a></li>
                <li id="sair"><a href="logout.php" onclick="return confirm('Tem certeza que deseja sair?')">SAIR</a></li>
            </ul>
        </nav>
    </header>

    <div id="openmodal" class="alterarAcesso">
        <div>
            <a href="#close" class="close">X</a>
            <form id="formulario" name="email" method="POST" action="alteraAcesso.php">
                <a href="painel.php" class="close">X</a>
                <h1>Alterar acesso ao painel</h1>

                <div class="input-single">
                    <input type="hidden" name="id" value="<?php echo $id ?>" id="id-box" class="input" autocomplete="off" required>
                </div>

                <div class="input-single">
                    <input type="text" name="senha" value="<?php echo $senha ?>" id="nome-box" class="input" autocomplete="off" maxlength="55" required>
                    <label for="nome-box">Nova senha</label>
                </div>

                <div class="btn">
                    <input type="submit" name="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>


    <h1 class="titulo">Contato de Clientes</h1>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
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
                        <td data-label="Nome"><?php echo $dado['nome']; ?></td>
                        <td data-label="Telefone"><?php echo $dado['telefone']; ?></td>
                        <td data-label="E-mail"><?php echo $dado['email']; ?></td>
                        <td data-label="Mensagem"><?php echo $dado['mensagem']; ?></td>
                        <td data-label="Data de Cadastro"><?php echo date('d/m/Y H:i', strtotime($dado['data_cadastro'])); ?></td>
                        <td data-label=""><a href="editarclientes.php?id=<?php echo $dado['id']; ?>" class="btn_editar">Editar</a></td>
                        <td data-label=""><a href="excluirclientes.php?id=<?php echo $dado['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</body>

</html>