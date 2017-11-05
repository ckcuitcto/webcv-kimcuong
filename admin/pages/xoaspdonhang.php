<?php
//require("../../thuvien/database.php");
require("../../thuvien/trangadmin.php");
if (isset($_GET['idSP'])) {
    $idSP = $_GET['idSP'];
    $idDH = $_GET['idDH'];
    $trangadmin->xoaspdonhang($idDH, $idSP);
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>	