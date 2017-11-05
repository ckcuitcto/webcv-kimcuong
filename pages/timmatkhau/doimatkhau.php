<?php

$flag = 0;
//tìm lại mk
if (isset($_POST['xacnhanemail'])) {
    $emailxn = $_POST['emailxn'];
    $maxacnhan = md5($_POST['maxacnhan']);
    $kiemtra = $trangchu->kiemtramaxacnhan($emailxn, $maxacnhan);
    if (count($kiemtra) > 0) {
        $flag = 1;
        $_SESSION['emailxacnhan'] = $emailxn;

    }
}
//đổi mật khẩu
if (isset($_SESSION['email'])) {
    $flag = 1;
}

?>


<?php
if (isset($_POST['doimatkhaudn'])) {
    if ($_POST['matkhau'] == $_POST['matkhau2']) {
        echo $password = md5($_POST['matkhau']);
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        } else {
            $email = $_SESSION['emailxacnhan'];
        }
        if (doimatkhau($email, $password) == TRUE) {
            $user = kiemtrauser($email, $password);
            if (mysql_num_rows($user) > 0) {

                if (!isset($_SESSION['idUser'])) {
                    $row = mysql_fetch_array($user);
                    $_SESSION['idUser'] = $row['idUser'];
                    $_SESSION['ten'] = $row['ten'];
                    $_SESSION['diachi'] = $row['diachi'];
                    $_SESSION['sdt'] = $row['sdt'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['cap'] = $row['cap'];
                }
                xoamaxacnhan($email);
                unset($_SESSION['emailxacnhan']);
                header("Location:index.php");
            }
        }
    }

}

?>

<?php
if ($flag == 1) {
    ?>

    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Đổi mật khẩu</li>
        </ul>
        <h3> Đổi mật khẩu</h3>
        <hr class="soft"/>

        <div class="row">
            <div class="span9" style="min-height:900px">
                <div class="well">
                    <h5>Đặt lại mật khẩu của bạn</h5><br/>
                    <br/><br/><br/>
                    <form action="" method="POST">
                        <div class="control-group">
                            <label class="control-label">Mật khẩu</label>
                            <div class="controls">
                                <input class="span3" maxlength="32" minlength="6" name="matkhau" type="password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nhập lại mật khẩu</label>
                            <div class="controls">
                                <input class="span3" maxlength="32" minlength="6" name="matkhau2" type="password">
                            </div>
                        </div>

                        <div class="controls">
                            <button type="submit" name="doimatkhaudn" class="btn block">Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

?>