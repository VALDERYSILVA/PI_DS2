<?php
session_start();
ob_start();
include_once 'configuracao/conexao.php';

if ((!isset($_SESSION['id'])) and (!isset($_SESSION['usuario'])) and (!isset($_SESSION['senha']))) {
	$_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar login para acessar a pagina!</p>";
	header("Location: index.php");
};

?>

<!doctype html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>APC Tecnologia Dashboard</title>

	<!-- Bootstrap CSS -->


	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">

	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>
