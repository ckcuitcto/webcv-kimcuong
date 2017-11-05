<?php
//require("../thuvien/database.php");
require("../thuvien/trangchu.php");

$email = $_GET['emailtao'];

$e = $trangchu->checkemail($email);
$row = count($e);
echo $row;
?>