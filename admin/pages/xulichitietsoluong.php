<?php
//require("../../thuvien/database.php");
require("../../thuvien/trangadmin.php");
session_start();
$idSP = $_POST['idSP'];
$soluongmoi = $_POST['sl'];
$idDH = $_POST['idDH'];
$trangadmin->capnhatsoluongchitiet($idSP, $soluong, $idDH);
?>3
