<?php
session_start();
ob_start();
include_once 'configuracao/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Cliente APC</title>
    <link rel="shortcut icon" href="/imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<!-- <?php

        //Exemplo criptografar a senha
        //echo password_hash("sua_senha_aqui", PASSWORD_DEFAULT);

        ?> -->

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post" autocomplete="off">
                    <div class="logo">
                        <img src="/imagens/logotipo.png" alt="logo redondo">
                    </div>
                    <h2>Bem Vindo!</h2>
                    <p>Por favor insira as informações abaixo para continuar</p>

                    <?php

                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if (!empty($dados['SendLogin'])) {
                        //var_dump($dados);
                        $query_usuario =  "SELECT cod, nome, cpf, senha FROM clientes WHERE cpf =:cpf LIMIT 1";
                        $result_usuario = $conexao->prepare($query_usuario);
                        $result_usuario->bindParam(':cpf', $dados['cpf']);
                        $result_usuario->execute();

                        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
                            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                            //var_dump($row_usuario);
                            if (password_verify($dados['senha'], $row_usuario['senha'])) {
                                $_SESSION['cod'] = $row_usuario['cod'];
                                $_SESSION['nome'] = $row_usuario['nome'];
                                header("Location: index.php");
                            } else {
                                $_SESSION['msg'] = "<div class='alert alert_danger' role='alert'>Usuário ou senha incorreto!
                                                         </div>";
                            }
                        } else {
                            $_SESSION['msg'] = "<div class='alert alert_danger' role='alert'>Usuário ou senha incorreto!
                                                 </div>";
                        }
                    }

                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }

                    ?>


                    <div class="inputbox">
                        <ion-icon name="person"></ion-icon>
                        <input type="text" name="cpf" id="ilogin" autocomplete="off" required minlength="1" maxlength="14">
                        <label for="">CPF</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha" id="isenha" label for="isenha" required minlength="1" maxlength="8">
                        <label for="">Senha</label>
                    </div>
                    <div class="forget">
                        <label for=""><a href="recuperar_senha.php">Esqueci minha senha</a></label>

                    </div>
                    <button type="submit" value="Entrar" name="SendLogin">Entrar
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script src="js/mascara.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>