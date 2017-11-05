<?php

$idUser = $_SESSION['idUser'];
$user = $trangchu->getUserbyIdUser($idUser);
//$user = $trangchu->mysql_fetch_array($getUserbyIdUser);

$nam = "";
$nu = "";
if ($user['gioitinh'] == 1) {
    $nam = "selected=''";
} else {
    $nu = "selected=''";
}


$capnhat = 0;
if (isset($_POST['suathongtin'])) {
    $gioitinh = $_POST['gioitinh'];
    $ten = $_POST['ten'];
    $ho = $_POST['ho'];
    $ngaysinh = $_POST['ngaysinh'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $capnhat = $trangchu->capnhatuser($idUser, $ten, $ho, $ngaysinh, $sdt, $diachi, $gioitinh);
}

?>


<div class="row">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active"> Trang cá nhân</li>
    </ul>
    <h3 style="text-align: center;"> Trang cá nhân </h3>
    <hr class="soft"/>
    <div class="span6">
        <form class="form-horizontal" method="post" action="#">
            <h4 style="text-align: center;">Thông tin cá nhân</h4>
            <hr class="soft"/>
            <div class="control-group">
                <label class="control-label">Giới tính <sup>*</sup></label>
                <div class="controls">
                    <select class="span1" name="gioitinh">
                        <option value="1" <?= $nam ?>>Nam</option>
                        <option value="0" <?= $nu ?>>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputFname1">Họ <sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="inputFname1" value="<?= $user['ho'] ?>" name="ho" placeholder="Họ">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLnam">Tên <sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="ten" value="<?= $user['ten'] ?>" id="inputLnam" placeholder="Tên">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input_email">Email <sup>*</sup></label>
                <div class="controls">
                    <input type="email" disabled="" value="<?= $user['email'] ?>" name="email" id="input_email"
                           placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Ngày sinh <sup>*</sup></label>
                <div class="controls">
                    <input type="date" value="<?= $user['ngaysinh'] ?>" name="ngaysinh" min="1940-01-01"
                           max="2017-07-07"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile">Số điện thoại </label>
                <div class="controls">
                    <input type="text" value="<?= $user['sdt'] ?>" name="sdt" id="mobile" placeholder="09xxxxxxxx"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLnam">Địa chỉ <sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="diachi" value="<?= $user['diachi'] ?>" id="inputLnam"
                           placeholder="Địa chỉ">
                </div>
            </div>

            <p><sup>*</sup> không được để trống </p>

            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="email_create" value="1">
                    <input type="hidden" name="is_new_customer" value="1">
                    <input class="btn btn-large btn-success" type="submit" name="suathongtin" value="Sửa thông tin"/>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['suathongtin'])) {
            if ($capnhat != 0) { ?>
                <div class="alert alert-success">
                    Cập nhật thông tin thành công !
                </div> <?php
            } else { ?>
                <div class="alert alert-error">
                    Cập nhật thấy bại thất bại (>-<)
                </div> <?php
            }
        }
        ?>
    </div>
    <div class="span6">
        <h4 style="text-align: center;">Thông tin đơn hàng</h4>
        <hr class="soft"/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center">STT</th>
                <th>ID Đơn Hàng</th>
                <th style="text-align: center">Nơi nhận</th>
                <th style="text-align: center">Số điện thoại</th>
                <th style="text-align: center">Số tiền</th>
                <th style="text-align: center">Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $dathangtheoIdUser = $trangchu->dathangtheoIdUser($idUser);
            $i = 0;
            $tongtien = 0;
            foreach ($dathangtheoIdUser as $row) {
                $i++;
                ?>
                <tr>
                    <td style="text-align: center"><?= $i ?></td>
                    <td class="sanphamdathang" idDatHang="<?= $row['idDH'] ?>"><?= $row['idDH'] ?></td>
                    <td style="text-align: center"><?= $row['noinhan'] ?></td>
                    <td style="text-align: center"><?= $row['sdt'] ?></td>
                    <td style="text-align: center"><?= $row['sotien'] ?></td>
                    <td style="text-align: center"><?php if ($row['xacnhan'] == 1) {
                            echo "Đã nhận đơn hàng";
                        } else {
                            echo "Chưa nhận";
                        } ?></td>
                </tr>
                <?php
                $tongtien += $row['sotien'];
            } ?>
            <tr>
                <td colspan="5" style="text-align:right;">Tổng tiền tất cả đơn hàng đã mua</td>
                <td style="text-align: center;"><?= $tongtien ?> VNĐ</td>
            </tr>
            </tbody>
        </table>
        <div id="ketquaz"></div>

    </div>
</div>