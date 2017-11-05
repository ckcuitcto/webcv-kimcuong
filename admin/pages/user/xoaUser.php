<?php
//require("../../../thuvien/database.php");
require("../../../thuvien/trangadmin.php");
?>
<?php
$idUser = $_GET["idUser"];
settype($idUser, "int");
$trangadmin->xoauser($idUser);
header("location:../../index.php?p=listUser");
?>