<?php
session_start();
ob_start();
include_once 'configuracao/conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar Senha</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/custom.css">
</head>

<body>

    <?php

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        // var_dump($dados);
        $query_usuario =  "SELECT * FROM usuarios WHERE email =:email LIMIT 1";
        $result_usuario = $conexao->prepare($query_usuario);
        $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
            // echo "Chave $recuperar_senha";

            $query_up_usuario = "UPDATE usuarios SET recuperar_senha =:recuperar_senha WHERE id=:id LIMIT 1";
            $result_up_usuario = $conexao->prepare($query_up_usuario);
            $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha, PDO::PARAM_STR);
            $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

            if ($result_up_usuario->execute()) {
                $link = "http://localhost/admin/atualizar_senha.php?chave=$recuperar_senha";

                try {

                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'nao-responder@arteempc.com.br';
                    $mail->Password   = 'Arte88747295';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('nao-responder@arteempc.com.br', 'APC Tecnologia/Atendimento');
                    $mail->addAddress($row_usuario['email'], $row_usuario['usuario']);

                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $row_usuario['usuario'] . ".<br><br>Você solicitou alteração de senha?
                <br><br>Para continuar o processo de recuperação de senha, clique no link abaixo ou copie 
                e cole o endereço no seu navegador: <br><br><a href='" . $link . "'> $link </a><br><br>Se você não solicitou essa alteração, 
                nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";

                    $mail->AltBody = 'Prezado(a) ' . $row_usuario['usuario'] . "\n\nVocê solicitou alteração de senha?
                \n\nPara continuar o processo de recuperação de senha, clique no link abaixo ou copie 
                e cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, 
                nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();

                    $_SESSION['msg'] = "<div class='alert alert_success' role='alert'>E-mail enviado com sucesso! Acesse a sua 
                    caixa de e-mail para recuperar a senha!</div>";
                    header("Location: envio_senha.php");
                } catch (Exception $e) {
                    echo "E-mail não enviado. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $_SESSION['msg'] = "<div class='alert alert_danger-index' role='alert'>Tente novamente!
                                </div>";
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert_danger-index' role='alert'>Usuário não encontrado!
                            </div>";
        }
    }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post" autocomplete="off">

                    <?php
                    $usuario = "";
                    if (isset($dados['login_usuario'])) {
                        $usuario = $usuario['login_usuario'];
                    } ?>

                    <h2>APC Tecnologia</h2>
                    <p>Insira seu e-mail para enviarmos<br>o link para alterar sua senha</p>

                    <div class="inputbox">
                        <ion-icon name="mail"></ion-icon>
                        <input type="text" name="email" required minlength="5" value="<?php echo $usuario ?>">
                        <label for="">E-mail</label>
                    </div>

                    <div class="forget">
                        <label for="">Não precisa trocar a senha? <a href="index.php">clique aqui</a></label>
                    </div>

                    <button type="submit" value="Recuperar" name="SendRecupSenha">Enviar
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