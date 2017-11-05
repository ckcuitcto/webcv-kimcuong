<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
//require("thuvien/database.php");
//require("thuvien/kb_database.php");
require("thuvien/trangchu.php");
require("thuvien/ham.php");

$trangchu = new trangchu();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = "";
}

?>

<?php
if (isset($_POST['thoat'])) {
    unset($_SESSION['idUser']);
    unset($_SESSION['ten']);
    unset($_SESSION['cap']);
    unset($_SESSION['giohang']);
    unset($_SESSION['diachi']);
    unset($_SESSION['sdt']);
    unset($_SESSION['email']);

    header("location:index.php");
}

?>


<?php
if (isset($_POST['dangnhap'])) {
    $email = $_POST['emaildn'];
    $password = md5($_POST['matkhaudn']);
    $user = $trangchu->kiemtrauser($email, $password);

    echo count($user);
    // var_dump($user);

    if ($user) {

        //$row=mysql_fetch_array($user);
        $_SESSION['idUser'] = $user['idUser'];
        $_SESSION['ten'] = $user['ten'];
        $_SESSION['diachi'] = $user['diachi'];
        $_SESSION['sdt'] = $user['sdt'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['cap'] = $user['cap'];
        if (isset($_GET['p'])) {
            if ($_GET['p'] == "giohang") {
                header("Location:index.php?p=giohang");
            } else if ($_GET['p'] == "dangnhap") {
                header("Location:index.php");
            }
        }

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KIM CƯƠNG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
     <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
     <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
     <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
     -->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
    <script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
    <script src="themes/js/jquery.js" type="text/javascript"></script>
    <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="themes/js/google-code-prettify/prettify.js"></script>
    <script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
    <script type="text/javascript" src="themes/js/duc.js"></script>
    <script type="text/javascript" src="themes/js/jquery_latest.js"></script>
    <!-- <script>
        $(function(){
            var inputVal = $('input').val();
            $('button').click(function(){s
               alert(inputVal);
            });
        });
</script> -->
    <script>
        $(document).ready(function () {
            $("#emailtao").blur(function () {
                var u = $(this).val();
                $.get("pages/checkemail.php", {emailtao: u}, function (data) {
                    if (data == 0) {
                        $("#loiemail").html("Hợp lệ");
                        $("#loiemail").css("color", "blue");
                    } else {
                        $("#loiemail").html("Đã có email này");
                        $("#loiemail").css("color", "red");
                    }

                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".quantity").change(function () {
                var slm = $(this).val();
                var id = $(this).attr("idSanPham");

                $.post("pages/giohang/xuligiohang.php", {idSP: id, sl: slm}, function () {
                    location.reload();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".sanphamdathang").click(function () {
                //var slm=$(this).val();
                var id = $(this).attr("idDatHang");

                $.post("pages/sanphamdathang.php", {idDH: id}, function (data) {
                    $("#ketquaz").html(data);
                });
            });
        });
    </script>

    <script type="text/javascript">
        var time = 10; // Thời gian đếm ngược
        var page = "index.php?p=canhan"; // Trang bạn muốn chuyển đến
        function countDown() {
            time--;
            gett("timecount").innerHTML = time;
            if (time == -1) {
                window.location = page;
            }
        }
        function gett(id) {
            if (document.getElementById) return document.getElementById(id);
            if (document.all) return document.all.id;
            if (document.layers) return document.layers.id;
            if (window.opera) return window.opera.id;
        }
        function init() {
            if (gett('timecount')) {
                setInterval(countDown, 1000);
                gett("timecount").innerHTML = time;
            }
            else {
                setTimeout(init, 50);
            }
        }
        document.onload = init();
    </SCRIPT>
</head>
<body>
<div id="header">
    <div class="container">

        <?php require "blocks/tygia_giohang.php" ?>
        <!-- Navbar ================================================== -->
        <?php require "blocks/menu_top_trangchu.php" ?>

    </div>
</div>
<!-- Header End====================================================================== -->
<?php
if (!isset($_GET['p'])) {
    require "blocks/top_quang_cao.php";
}

?>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <?php
            if (isset($_GET['p'])) {
                if ($_GET['p'] != "lienhe") {
                    if ($_GET['p'] != "muahang") {
                        if ($_GET['p'] != "canhan") {
                            require "blocks/menu_trai.php";
                        }
                    }
                }

            } else {
                require "blocks/menu_trai.php";
            }


            ?>

            <!-- Sidebar end=============================================== -->
            <?php
            switch ($p) {
                case 'loaisanpham':
                    require "pages/loaisanpham.php";
                    break;
                case "timkiem":
                    require "pages/timkiem.php";
                    break;
                case "khuyenmai":
                    require "pages/khuyenmai.php";
                    break;
                case "dangki":
                    require "pages/dangki.php";
                    break;
                case "dangnhap":
                    require "pages/dangnhap.php";
                    break;
                case "giohang":
                    require "pages/giohang/giohang.php";
                    break;
                case "muahang":
                    require "pages/giohang/muahang.php";
                    break;
                case "sosanh":
                    require "pages/sosanh.php";
                    break;
                case "dieukhoan":
                    require "pages/dieukhoan.php";
                    break;
                case "faq":
                    require "pages/faq.php";
                    break;
                case "lienhe":
                    require "pages/lienhe.php";
                    break;

                case "theloaisanpham":
                    require "pages/theloaisanpham.php";
                    break;
                case "chitiet":
                    require "pages/chitiet.php";
                    break;

                case "canhan":
                    require "pages/canhan.php";
                    break;


                case "doimatkhau":
                    require "pages/timmatkhau/doimatkhau.php";
                    break;
                case "xacnhanemail":
                    require "pages/timmatkhau/xacnhanemail.php";
                    break;
                case "quenmatkhau":
                    require "pages/timmatkhau/quenmatkhau.php";
                    break;
                default:
                    require "pages/noidung.php";
                    break;
            }

            ?>

        </div>
    </div>
</div>

<!-- Footer ================================================================== -->
<?php require "blocks/footer.php" ?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<!-- <script src="themes/js/jquery.js" type="text/javascript"></script>
<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="themes/js/google-code-prettify/prettify.js"></script>

<script src="themes/js/bootshop.js"></script>
<script src="themes/js/jquery.lightbox-0.5.js"></script> -->

<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
    <link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen"/>
    <script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
    <div id="themeContainer">
        <div id="hideme" class="themeTitle">Style Selector</div>
        <div class="themeName">Oregional Skin</div>
        <div class="images style">
            <a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png"
                                                        alt="bootstrap business templates" class="active"></a>
            <a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png"
                                                           alt="bootstrap business templates" class="active"></a>
        </div>
        <div class="themeName">Bootswatch Skins (11)</div>
        <div class="images style">
            <a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png"
                                                                     alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png"
                                                                     alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png"
                                                                           alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png"
                                                      alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png"
                                                       alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png"
                                                       alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png"
                                                     alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png"
                                                      alt="bootstrap business templates"></a>
            <p style="margin:0;line-height:normal;margin-left:-10px;display:none;">
                <small>These are just examples and you can build your own color scheme in the backend.</small>
            </p>
        </div>
        <div class="themeName">Background Patterns</div>
        <div class="images patterns">
            <a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png"
                                                        alt="bootstrap business templates" class="active"></a>
            <a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png"
                                                        alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png"
                                                         alt="bootstrap business templates"></a>

            <a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png"
                                                         alt="bootstrap business templates"></a>

            <a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png"
                                                         alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png"
                                                         alt="bootstrap business templates"></a>

        </div>
    </div>
</div>
<span id="themesBtn"></span>
</body>
</html>	