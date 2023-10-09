<?php

session_start();
ob_start();
include_once 'configuracao/conexao.php';

if ((!isset($_SESSION['cod'])) and (!isset($_SESSION['cpf'])) and (!isset($_SESSION['senha']))) {
	$_SESSION['msg'] = "<p style='color: #ff0000'>Necessário realizar login para acessar a pagina!</p>";
	header("Location: login.php");
};

?>


<?php include_once('header.php'); ?>

<!-------------------------sidebar------------>
<?php include_once('sidebar.php'); ?>
<!-- Sidebar  -->


<!--------page-content---------------->



<!--top--navbar----design--------->
<?php include_once('top-header.php'); ?>

<!--------main-content------------->
<?php include_once('main-content.php'); ?>


<!---footer---->
<?php include_once('footer.php'); ?>