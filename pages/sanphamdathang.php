<?php

//require("../thuvien/database.php");
require("../thuvien/trangchu.php");
$trangchu = new trangchu();
$idDH = $_POST['idDH'];
$sanphamdathangtheoIdDH = $trangchu->sanphamdathangtheoIdDH($idDH);

?>
<h4 style="text-align: center;">Các sản phẩm của đơn hàng ID: <?= $idDH ?></h4>
<table class="table table-striped">
    <thead>
    <tr>
        <th style="text-align: center">STT</th>
        <th>Tên Sản Phẩm</th>
        <th style="text-align: center">Số lượng</th>
        <th style="text-align: center">Đơn Giá</th>
        <th style="text-align: center">Tổng giá</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    $tong = 0;
    //while($sanpham=mysql_fetch_array($sanphamdathangtheoIdDH))
    foreach ($sanphamdathangtheoIdDH as $sanpham) {
        $i++;

        ?>
        <tr>
            <td style="text-align: center"><?= $i ?></td>
            <td><?= $sanpham['tensp'] ?></td>
            <td style="text-align: center"><?= $sanpham['soluong'] ?></td>
            <td style="text-align: center"><?= $sanpham['soluong'] ?></td>
            <td style="text-align: center"><?= $sanpham['tonggia'] ?></td>
        </tr>
        <?php
        $tong += $sanpham['tonggia'];
    } ?>
    <tr>
        <td colspan="4" style="text-align:right;">Tổng tiền</td>
        <td style="text-align: center;"><?= $tong ?> VNĐ</td>
    </tr>
    </tbody>
</table>
