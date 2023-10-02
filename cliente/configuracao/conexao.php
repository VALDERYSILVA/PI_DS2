<?php

// Conexão ao Banco de Dados modo 'PDO'

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "bd_projeto";

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=" . $banco, $usuario, $senha);

    // echo "Conexão ok";
} catch (PDOException $err) {
    // echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}

//$conexao = new mysqli($servidor, $usuario, $senha, $banco);


// Verificação (caso necessário)
// http://localhost/projeto/configuracao/conexao.php

// if ($conexao->connect_errno) {
//     echo "<script>
//     alert('E-mail não enviado!');
//     history.back();
//   </script>";
// } else {
//     echo "<script>
//     alert('Email enviado com sucesso!');
//     history.back();
//   </script>";
// }

// Conexão ao Banco de Dados modo 'mysqli'

// $servidor = "localhost";
// $banco = "bd_projeto";
// $usuario = "root";
// $senha = "";

// $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Checar conexão

// if (!$conexao) {
//     echo "Erro! " . mysqli_connect_error();
// } else {
//     echo "Conexão efetuada com sucesso!";
// }

// mysqli_close($conexao);
