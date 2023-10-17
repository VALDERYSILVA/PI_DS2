<?php

session_start();
ob_start();
include_once 'configuracao/conexao.php';

if ((!isset($_SESSION['cod'])) and (!isset($_SESSION['cpf'])) and (!isset($_SESSION['senha']))) {
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Necessário realizar login!</div>";
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