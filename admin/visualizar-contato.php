<?php

include_once("./include/header.php");



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
                        <h4 class="page-title">Detalhes do Contato</h4>
                    </div>
                </div>
            </div>
            <!------top-navbar-end----------->

            <span id="msgAlerta"></span>

            <!------main-content-start----------->

            <div class="main-content">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="dashboard.php" type="button" class="btn btn-success">
                                    <i class="material-icons">&#xe15e;</i>
                                    <span>Voltar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php

                    // Asessa o 'if' quando existir a variaval global
                    if (isset($_SESSION['msg'])) {

                        // Imprimi a mensagem da variavel global
                        echo $_SESSION['msg'];

                        // Destroi a variavel global
                        unset($_SESSION['msg']);
                    }

                    $query_contato = "SELECT id, nome, telefone, email, mensagem, DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') AS data_formatada FROM contato ORDER BY data_cadastro DESC";
                    $resul_contato = $conexao->prepare($query_contato);
                    $resul_contato->execute();

                    if (($resul_contato) and ($resul_contato->rowCount() != 0)) {
                        while ($row_contato = $resul_contato->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_contato);
                            // Extrair o array para imprimir os valores através da chave do array


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
                            echo "<dt class='col-sm-3'>Mensagem</dt>";
                            echo "<dd class='col-sm-9'>$mensagem</dd>";
                            echo "</dl>";

                            echo "<dl class='row1'>";
                            echo "<dt class='col-sm-3'>Data do envio</dt>";
                            echo "<dd class='col-sm-9'>$data_formatada</dd>";
                            echo "</dl>";

                            echo "<dl class='row1'>";
                            echo "<dt class='col-sm-9'><a href='' type='button' class='btn btn-danger1' id='$id' class='delete' onclick='deleteContato($id)'>
                            Excluir contato</a></dt>";
                            echo "</dl>";

                            echo "<br>";
                        }
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Não há contato!
                            </div>";
                    }

                    ?>
                </div>
            </div>

            <!----footer-inicio------------->

            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/custom.js"></script>
            <script src="jS/mascara.js"></script>
            <script src="js/cpf-valida.js"></script>
            <script src="js/cep.valida.js"></script>

            <!----footer-fim---------------->
</body>

<?php
include_once "./include/footer.php"
?>