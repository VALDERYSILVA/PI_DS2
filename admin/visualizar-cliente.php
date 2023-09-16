<?php

include_once("./include/header.php");

// Receber o id enviado na URL
$cliente_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Acessa o 'if' quando não é enviado o 'id' na URL
if (empty($cliente_id)) {

    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Cliente não encontrado!
   </div>";

    header("Location: dashboard.php");

    exit();
}

?>


<body>


    <div class="wrapper">
        <div class="body-overlay"></div>

        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-md-5 col-lg-3 order-3 order-md-2">

                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">

                            <div class="xp-profilebar text-right">
                                <label></label>
                                <nav class="navbar p-0">

                                    <ul class="nav navbar-nav flex-row ml-auto">

                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="img/logotitulo.png" style="width:200px;" />
                                                <span class="xp-user-live"></span>
                                            </a>

                                            <ul class="dropdown-menu small-menu">
                                                <li><a href='#' id='$id' class='sair' onclick='editarUsuario($id)'>
                                                        <span class="material-icons">settings</span>
                                                        Alterar Senha
                                                    </a></li>
                                                <li><a href="sair.php" class="sair">
                                                        <span class="material-icons">logout</span>
                                                        Sair
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Detalhes do Cliente</h4>
                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->

            <div class="main-content">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="javascript:history.back();" type="button" class="btn btn-success">
                                    <i class="material-icons">&#xe15e;</i>
                                    <span>Voltar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php

                    $query_cliente = "SELECT cod, senha, plano, vencimento, nome, rg, cpf, 
                            DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento_br, telefone, email, cep, logradouro, numero, complemento, bairro, data_cadastro, 
                            cidade, uf ,ibge, observacao FROM clientes WHERE cod =:cod ORDER BY cod DESC  LIMIT 1";
                    $resul_cliente = $conexao->prepare($query_cliente);
                    $resul_cliente->bindParam(':cod', $cliente_id);
                    $resul_cliente->execute();

                    if (($resul_cliente) and ($resul_cliente->rowCount() != 0)) {
                        $row_cliente = $resul_cliente->fetch(PDO::FETCH_ASSOC);
                        // var_dump($row_cliente);

                        // Extrair o array para imprimir os valores através da chave do array
                        extract($row_cliente);

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Nome</dt>";
                        echo "<dd class='col-sm-9'>$nome</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Telefone</dt>";
                        echo "<dd class='col-sm-9'>$telefone</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Email</dt>";
                        echo "<dd class='col-sm-9'>$email</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Data de Nascimento</dt>";
                        echo "<dd class='col-sm-9'>$nascimento_br</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>RG</dt>";
                        echo "<dd class='col-sm-9'>$rg</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>CPF</dt>";
                        echo "<dd class='col-sm-9'>$cpf</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Endereço</dt>";
                        echo "<dd class='col-sm-9'>$logradouro, $numero, $complemento, $bairro, $cidade - $uf</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Plano</dt>";
                        echo "<dd class='col-sm-9'>$plano</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Vencimento</dt>";
                        echo "<dd class='col-sm-9'>$vencimento</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Senha para Mobile</dt>";
                        echo "<dd class='col-sm-9'>$senha</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>IBGE</dt>";
                        echo "<dd class='col-sm-9'>$ibge</dd>";
                        echo "</dl>";

                        echo "<dl class='row1'>";
                        echo "<dt class='col-sm-3'>Observação</dt>";
                        echo "<dd class='col-sm-9'>$observacao</dd>";
                        echo "</dl>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Erro: Cliente não encontrado!
                            </div>";
                    }

                    ?>
                </div>
            </div>

            <!----footer-inicio------------->

            <?php
            include_once "./include/footer.php"
            ?>

            <!----footer-fim---------------->
</body>