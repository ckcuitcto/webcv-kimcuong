<?php
ob_start();
session_start();
if (!(isset($_SESSION['idUser']) && $_SESSION['cap'] == 1)) {
    header("location:../index.php");
}
//require("../thuvien/database.php");
require("../thuvien/trangadmin.php");
require("../thuvien/ham.php");

$trangadmin = new trangadmin();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = "";
}

?>

<?php
if (isset($_POST['dangxuatad'])) {
    unset($_SESSION['idUser']);
    unset($_SESSION['ten']);
    unset($_SESSION['cap']);
    unset($_SESSION['giohang']);
    header("location:../index.php");
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Vàng Bạc Thái Đức ADMIN</title>
    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen"/>
    <link href="assets/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="assets/css/font-awesome2.css" rel="stylesheet" type="text/css">

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/duc.js"></script>
    <script>
        $(document).ready(function () {
            $("#idTL").change(function () {
                var id = $(this).val();

                $.get("blocks/loaisp.php", {idTL: id}, function (data) {
                    $("#loaisanpham").html(data);
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".sanphamdathang").click(function () {
                //var slm=$(this).val();
                var id = $(this).attr("idDatHang");
                alert(id);
                $.GET("pages/chitietdonhang.php", {idDH: id}, function (data) {
                    $("#ketquaz").html(data);
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".leveluser").change(function () {
                var capdo = $(this).val();
                var idU = $(this).attr("idUsers");
                $.get("pages/user/suaUser.php", {cap: capdo, idUser: idU}, function () {
                    location.reload();
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".xacnhanthulienhe").change(function () {
                var xn = $(this).val();
                var idlh = $(this).attr("idLienHe");
                $.get("pages/lienhe/suaLH.php", {xacnhan: xn, idLH: idlh}, function () {
                    location.reload();
                });
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function(){
            $(".quantity").change(function(){
                var slm=$(this).val();
                var idSanPham=$(this).attr("idSanPham");
                var idDonHang=$(this).attr("idDonHang");
                alert(slm);alert(idSanPham);
                $.post("pages/xulichitietsoluong.php",{idSP:idSanPham,idDH:idDonHang,sl:slm},function(){
                    location.reload();
                }); 
            });
        });
    </script> -->
    <!-- <script>
        $(document).ready(function(){
            $(".donhang").click(function(){
                var idxacnhan=$(this).attr("xacnhan");
                
                $.post("pages/bangdathang.php",{xacnhan:idxacnhan},function(data){
                    $("#bangdathang").html(data);
                });
            });
        });
    </script> -->
</head>
<body>
<div id="wrapper">
    <?php require "blocks/navbar.php"; ?>
    <!-- /. NAV TOP  -->
    <?php require "blocks/navigation.php" ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <!-- /. ROW  -->
            <?php
            if (isset($_GET['p'])) {
                switch ($p) {
                    case 'listSP':
                        require "pages/listSP.php";
                        break;
                    case 'themsp':
                        require "pages/themsp.php";
                        break;
                    case 'suasp':
                        require "pages/suasp.php";
                        break;
                    case 'listtl':
                        require "pages/listtl.php";
                        break;
                    case 'suatl':
                        require "pages/suatl.php";
                        break;
                    case 'themtl':
                        require "pages/themtl.php";
                        break;
                    case 'listlsp':
                        require "pages/loaisanpham/listlsp.php";
                        break;
                    case 'themlsp':
                        require "pages/loaisanpham/themlsp.php";
                        break;
                    case 'sualsp':
                        require "pages/loaisanpham/sualsp.php";
                        break;
                    case 'dathang':
                        require "pages/dathang.php";
                        break;
                    case 'donhang':
                        require "pages/chitietdonhang.php";
                        break;
                    case 'listUser':
                        require "pages/user/listUser.php";
                        break;
                    case 'lienhe':
                        require "pages/lienhe/listLH.php";
                        break;
                    default:
                        break;
                }
            } else {
                require "pages/trangchinh.php";
            }
            ?>
            <!-- /. ROW  -->

            <!-- /. ROW  -->

            <!-- /. ROW  -->

            <!-- /. ROW  -->

            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<!-- CUSTOM SCRIPTS -->
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

<script src="assets/js/jquery-1.10.2.js"></script>

<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>

<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- MORRIS CHART SCRIPTS -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>


</body>
</html>
