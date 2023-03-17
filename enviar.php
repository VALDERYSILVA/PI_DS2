<?php

date_default_timezone_set ("America/Recife");

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
Por isso, é um prazer ter você como nosso cliente! 
Temos a qualidade e a excelência para fazer parte 
de nossos valores.<br><br>
Obrigado pela confiança em solicitar nossos serviços 
para satisfazer a você!"; // mensagem chegando no email do cliente

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
if($enviaremail_cliente && $enviaremail_empresa){
  
  echo " <meta http-equiv='refresh' content='0;URL=index.php#planos'>";
}
else {
  echo "ERRO AO ENVIAR E-MAIL!";}


?>