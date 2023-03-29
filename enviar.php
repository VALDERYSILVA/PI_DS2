<?php

date_default_timezone_set("America/Recife");

$nome = $_POST['nome']; // nome do cliente
$telefone = $_POST['telefone']; // telefone do cliente
$email = $_POST['email']; // email do cliente
$msg = $_POST['mensagem']; // corpo do email texto
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');
$assunto_cliente = "Pré cadatro recebido";

$mgm = "Olá, $nome!<br><br>A PC Tecnologia faz questão de 
sempre oferecer soluções impecáveis, que atendem 
altos níveis de qualidade, dentro dos padrões 
exigidos pelas normas reguladoras.<br><br>
Em nossos valores prezamos pela qualidade e excelência 
para melhorar atender os nosos clientes.<br><br>
Obrigado pela confiança em solicitar nossos serviços 
para satisfazer você!"; // mensagem chegando no email do cliente

// Compo E-mail

$arquivo = "
<style type='text/css'>
  body {
    margin: 0px;
    font-family: verdana;
    font-size: 15px;
    color: #222222;
  }

  a {
    color: #DDD;
    text-decoration: none;
  }

  a:hover {
    color: #DDD;
    text-decoration: none;
  }
</style>
<html>
<table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#dcdcdc'>
  <tr>
    <td width='550'>Nome: <b>$nome</b></td>
  </tr>
  <tr>
    <td width='370'>E-mail: <b>$email</b></td>
  </tr>
  <tr>
    <td width='370'>Telefone: <b>$telefone</b></td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td width='370'>Mensagem: $msg</td>
  </tr>
  </td>
  </tr>
  <tr>
    <td>Este e-mail foi enviado em $data_envio as $hora_envio</td>
  </tr>
</table>

</html>
";



/* para onde será enviado o formulário */

$emailenviar = "arteempc@hotmail.com";
$destino = $emailenviar;
$assunto = "Contato via web"; //assunto de email

// É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type:text/html;charset=utf-8' . "\r\n";
$headers .= 'From: <nao-responder@arteempc.com.br>';


$enviaremail_cliente = mail($email, $assunto_cliente, $mgm, $headers);
$enviaremail_empresa = mail($destino, $assunto, $arquivo, $headers);
if (($enviaremail_cliente) && ($enviaremail_empresa)) //{

  //   echo "<script>alert('Enviado com sucesso!');history.back();</script>";
  // } // else {
  //   echo "<script>alert('Erro ao enviar email');history.back();</script>";
  // }


  // cadastro banco de dados

  include("conexao.php");

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO contato(nome, telefone, email, mensagem)
VALUES ('$nome', '$telefone', '$email' ,'$mensagem')";


if (mysqli_query($conexao, $sql)) {

  echo "<script>history.back();</script>";
} //else {
//   echo "<script>alert('Erro ao enviar BD!');history.back();</script>";
// }

mysqli_close($conexao);
