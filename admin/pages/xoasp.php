<?php
//require("../../thuvien/database.php");
require("../../thuvien/trangadmin.php");
if (isset($_GET['idSP'])) {
    $idSP = $_GET['idSP'];
    $trangadmin->xoachitiet($idSP);
    $trangadmin->xoasp($idSP);
    header("location:../index.php?p=listSP");
}
?>