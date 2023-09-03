<?php

// Envio ao Banco de Dados

if (isset($_POST['submit']))

  include('conexao.php');

$senha = $_POST['senha'];
$plano = $_POST['plano'];
$vencimento = $_POST['vencimento'];
$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$ibge = $_POST['ibge'];
$observacao = $_POST['observacao'];

$result = mysqli_query($conexao, "INSERT INTO clientes(senha,plano,vencimento,nome,rg,cpf,nascimento,
telefone,email,cep,logradouro,numero,complemento,bairro,cidade,uf,ibge,data_cadastro,observacao)
    VALUES ('$senha','$plano','$vencimento','$nome','$rg','$cpf','$nascimento','$telefone',
    '$email','$cep','$logradouro','$numero','$complemento','$bairro','$cidade','$uf','$ibge', now(),'$observacao')");

if ($result) {
  echo "<script>
    alert('Enviado com sucesso!');
    window.history.go(-2);
  </script>";
  exit();
} else {
  echo "<script>
    alert('Não enviado!');
    window.history.go(-2);
  </script>";
  exit();
}
