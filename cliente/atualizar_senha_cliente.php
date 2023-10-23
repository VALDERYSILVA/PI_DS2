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
    <title>Atualizar Senha</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/custom.css">
</head>

<body>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post" autocomplete="off">
                    <div class="logo">
                        <img src="img/logotipo.png" alt="logo redondo">
                    </div>

                    <h2>APC Tecnologia</h2>
                    <p>Crie uma nova senha para<br>acessar a central do assinante</p>

                    <?php
                    $usuario = "";
                    if (isset($dados['senha'])) {
                        $usuario = $dados['senha'];
                    }

                    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
                    // var_dump($chave);
                    if (!empty($chave)) {
                        $query_usuario =  "SELECT cod FROM clientes WHERE recuperar_senha =:recuperar_senha LIMIT 1";
                        $result_usuario = $conexao->prepare($query_usuario);
                        $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
                        $result_usuario->execute();

                        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
                            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                            // var_dump($dados);

                            $qtd = "";
                            if (!empty($dados['SendNovaSenha'])) {
                                $qtd = ($dados['senha']);
                                //var_dump($qtd);
                            }

                            if (!empty($dados['SendNovaSenha']) and (strlen($qtd)) < 8) {
                                echo "<div class='alert alert-danger' role='alert'>A senha deve conter 8 caracteres</div>";
                            } elseif (!empty($dados['SendNovaSenha']) and (strlen($qtd)) == 8) {
                                $senha_usuario = password_hash($dados['senha'], PASSWORD_DEFAULT);
                                $recuperar_senha = 'NULL';

                                $query_up_usuario = "UPDATE clientes SET senha =:senha, recuperar_senha =:recuperar_senha WHERE cod=:cod LIMIT 1";
                                $result_up_usuario = $conexao->prepare($query_up_usuario);
                                $result_up_usuario->bindParam(':senha', $senha_usuario, PDO::PARAM_STR);
                                $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha);
                                $result_up_usuario->bindParam(':cod', $row_usuario['cod'], PDO::PARAM_INT);

                                if ($result_up_usuario->execute()) {
                                    $_SESSION['msg'] = "<div class='alert alert-success1' role='alert'>Senha foi alterada com sucesso!</div>";
                                    header("Location: login.php");
                                } else {
                                    echo "<div class='alert alert_danger' role='alert'>Tente novamente!
                                        </div>";
                                }
                            }
                        } else {
                            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Link inválido! Solicite um novo link</div>";
                            header("Location: recuperar_senha_cliente.php");
                        }
                    } else {
                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Link inválido! Solicite um novo link</div>";
                        header("Location: recuperar_senha_cliente.php");
                    }

                    ?>

                    <div class="inputbox">
                        <ion-icon name="senha"></ion-icon>
                        <input type="password" name="senha" required minlength="1" maxlength="8" value="<?php echo $usuario; ?>">
                        <label for="">Nova senha</label>
                    </div>
                    <div class="forget">
                        <label for="">Não precisa trocar a senha? <a href="login.php">clique aqui</a></label>
                    </div>
                    <button type="submit" value="Atualizar" name="SendNovaSenha">Alterar
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>