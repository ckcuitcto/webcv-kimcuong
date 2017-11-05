<?php
session_start();
$idSP = $_GET['idSP'];
unset($_SESSION['giohang'][$idSP]);
header("Location: {$_SERVER['HTTP_REFERER']}");

?>