<?php
session_start();
$idSP = $_POST['idSP'];
$soluongmoi = $_POST['sl'];
$_SESSION['giohang'][$idSP]['slsp'] = $soluongmoi;

?>