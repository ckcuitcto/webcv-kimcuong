<?php

//require("../../thuvien/database.php");
require("../../thuvien/trangadmin.php");

$idTL = $_GET["idTL"];
settype($idTL, "int");
$trangadmin->xoatl($idTL);
header("location:../index.php?p=listtl");
?>