<?php
session_start();
include("configuracao/verificarLogin.php"); // caminho do seu arquivo de conexão ao banco de dados 
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
                <li><a href="painel.php">'Em construção'</a></li>
                <li><a href="painel.php">'Em construção'</a></li>
                <li id="sair"><a href="logout.php" onclick="return confirm('Tem certeza que deseja sair?')">SAIR</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="titulo">Clientes Cadastrados</h1>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>RG</td>
                    <td>Data de Nascimento</td>
                    <td>Telefone</td>
                    <td>E-mail</td>
                    <td>Plano</td>
                    <td>Data de Vencimento</td>
                    <td>Endereço</td>
                    <td>Número</td>
                    <td>Complemento</td>
                    <td>Bairro</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td>Cod. IBGE</td>
                    <td>Senha do Usuário</td>
                    <td>Observação</td>
                    <td>Data de Cadastro</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($dado = $con->fetch_array()) { ?>
                    <tr>
                        <td data-label="Nome"><?php echo $dado['nome']; ?></td>
                        <td data-label="CPF"><?php echo $dado['cpf']; ?></td>
                        <td data-label="RG"><?php echo $dado['rg']; ?></td>
                        <td data-label="Nascimento"><?php echo date('d/m/Y', strtotime($dado['nascimento'])); ?></td>
                        <td data-label="Telefone"><?php echo $dado['telefone']; ?></td>
                        <td data-label="E-mail"><?php echo $dado['email']; ?></td>
                        <td data-label="Plano"><?php echo $dado['plano']; ?></td>
                        <td data-label="Vencimento"><?php echo $dado['vencimento']; ?></td>
                        <td data-label="Logradouro"><?php echo $dado['logradouro']; ?></td>
                        <td data-label="Numero"><?php echo $dado['numero']; ?></td>
                        <td data-label="Complemento"><?php echo $dado['complemento']; ?></td>
                        <td data-label="Bairro"><?php echo $dado['bairro']; ?></td>
                        <td data-label="Cidade"><?php echo $dado['cidade']; ?></td>
                        <td data-label="UF"><?php echo $dado['uf']; ?></td>
                        <td data-label="IBGE"><?php echo $dado['ibge']; ?></td>
                        <td data-label="Senha"><?php echo $dado['senha']; ?></td>
                        <td data-label="Mensagem"><?php echo $dado['observacao']; ?></td>
                        <td data-label="Data de Cadastro"><?php echo date('d/m/Y H:i', strtotime($dado['data_cadastro'])); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</body>

</html>