<?php

$pdo = new PDO('mysql:host=localhost;dbname=bd_projeto', 'root', '', array(PDO::ATTR_PERSISTENT => true));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$codigo = $_GET['id'];

$delete = $pdo->prepare("DELETE FROM contato WHERE id= :id");
$delete->bindValue(':id', $codigo);

if ($delete->execute()) {
  echo "<script>
    alert('Cliente excluido!');
  </script>";
  header("Refresh: 0; URL=painel.php");
} else {
  echo "<script>
    alert('<h2>Erro ao excluir.<h2>');
    </script>";
  header("Refresh: 0; URL=painel.php");
}
