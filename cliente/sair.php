<?php
session_start();
ob_start();
unset($_SESSION['cod'], $_SESSION['cpf']);
header('Location: login.php');
exit();
