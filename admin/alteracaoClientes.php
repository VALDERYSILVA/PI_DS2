
<?php

session_start();
include("verificar_login.php"); // caminho do seu arquivo de conexão ao banco de dados 

// conexao com banco começa aqui

$pdo = new PDO('mysql:host=localhost;dbname=bd_projeto', 'root', '', array(PDO::ATTR_PERSISTENT => true));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// finaliza banco aqui

date_default_timezone_set('America/Recife');

$codigo = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$data = date('Y/m/d H:i');

$sql = "UPDATE contato SET nome=:nome, telefone=:telefone, email=:email, mensagem=:mensagem, data_cadastro=:data_cadastro WHERE id=:id";
$update = $pdo->prepare($sql);
$update->bindValue(':id', $codigo);
$update->bindValue(':nome', $nome);
$update->bindValue(':telefone', $telefone);
$update->bindValue(':email', $email);
$update->bindValue(':mensagem', $mensagem);
$update->bindValue('data_cadastro', $data);

if ($update->execute()) {
  echo "<script>
      alert('Alterado com sucesso!');
      window.history.go(-2);
    </script>";
  exit();
} else {
  echo "<script>
      alert('Nada foi alterado');
      window.history.go(-2);
    </script>";
  exit();
}
