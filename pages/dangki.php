<?php

$flag = 0;
if (isset($_POST['dangki'])) {
    $matkhau = $_POST['matkhau'];
    $matkhaunhaplai = $_POST['matkhaunhaplai'];
    if ($matkhaunhaplai == $matkhau) {
        $ngay = date("Y-m-d");
        $gioitinh = $_POST['gioitinh'];
        $ten = $_POST['ten'];
        $ho = $_POST['ho'];
        $email = $_POST['email'];
        $ngaysinh = $_POST['ngaysinh'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $user = $trangchu->dangki($ten, $ho, $email, md5($matkhau), $ngaysinh, $sdt, $diachi, $gioitinh, $ngay);
        if ($user) {
            $flag = true;
        }

    }
}
$emailtao = "";
if (isset($_GET['emailtao'])) {
    $emailtao = $_GET['emailtao'];
}


?>


<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active">Đăng kí</li>
    </ul>
    <h3> Đăng kí</h3>
    <?php
    if ($flag == true) {
        echo "<div class='alert alert-success' role='alert'> Đăng kí thành công. Chuyển sang trang đăng nhập trong 5s </div>";
        sleep(5);
        $URL = "index.php?p=dangnhap";
        header("Location: $URL");
    } else if (isset($_POST['dangki']) && $user == false) {
        ?>
        <div class="alert alert-danger" role="alert">Đăng kí thất bại</div>
        <?php
    }
    ?>
    <div class="well">
        <form class="form-horizontal" method="post" action="#">
            <h4>Thông tin cá nhân của bạn</h4>
            <div class="control-group">
                <label class="control-label">Giới tính <sup>*</sup></label>
                <div class="controls">
                    <select class="span1" name="gioitinh" required>
                        <option value="1" selected="">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputFname1">Họ <sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="inputFname1" name="ho" placeholder="Họ" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLnam">Tên <sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="ten" id="inputLnam" placeholder="Tên" required >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input_email">Email <sup>*</sup></label>
                <div class="controls">
                    <input type="email" value="<?= $emailtao ?>" name="email" id="input_email" placeholder="Email" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword1">Mật khẩu <sup>*</sup></label>
                <div class="controls">
                    <input type="password" name="matkhau" maxlength="32" minlength="6" id="inputPassword1"
                           placeholder="Mật khẩu" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword2">Mật khẩu <sup>*</sup></label>
                <div class="controls">
                    <input type="password" name="matkhaunhaplai" maxlength="32" minlength="6" id="inputPassword2"
                           placeholder="Nhập lại Mật khẩu" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Ngày sinh <sup>*</sup></label>
                <div class="controls">

                    <input type="date" name="ngaysinh" min="1940-01-01" max="2017-07-07" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile">Số điện thoại </label>
                <div class="controls">
                    <input type="number" maxlength="13" minlength="10" name="sdt" id="mobile" placeholder="09xxxxxxxx" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLnam">Địa chỉ <sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="diachi" id="inputLnam" placeholder="Địa chỉ" required>
                </div>
            </div>

            <p><sup>*</sup> không được để trống </p>

            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="email_create" value="1">
                    <input type="hidden" name="is_new_customer" value="1">
                    <input class="btn btn-large btn-success" type="submit" name="dangki" value="Đăng kí"/>
                </div>
            </div>
        </form>
    </div>

</div>