<?php
//require("../../../thuvien/database.php");
require("../../../thuvien/trangadmin.php");
?>

<?php

$idLH = $_GET['idLH'];
$xacnhan = $_GET['xacnhan'];
$trangadmin->xacnhanlienhe($idLH, $xacnhan);


?>