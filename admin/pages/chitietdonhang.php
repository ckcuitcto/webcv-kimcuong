<?php
$idDH = $_GET['idDH'];

if (isset($_POST['suachitietsp'])) {
    $soluong = $_POST['soluong'];
    //print_r($soluong);
    foreach ($soluong as $idSP => $soluongmoi) {
        $soluongcu = $trangadmin->soluongsanphamdathang($idDH, $idSP);
        $trangadmin->capnhatsoluongsanpham($idSP, $soluongcu, $soluongmoi);

        if ($trangadmin->capnhatsoluongchitiet($idSP, $soluongmoi, $idDH) == TRUE) {
            echo " Loi";
        }
    }
    if (isset($_POST['xacnhandonhang']) && $_POST['xacnhandonhang'] == "1") {
        $trangadmin->xacnhandonhang($idDH);
    }

}
?>

<?php

$sanphamdathangtheoIdDH = $trangadmin->sanphamdathangtheoIdDH($idDH);
$dh = $trangadmin->dathangtheoid($idDH);
//$dh=mysql_fetch_array($dathangtheoid);


?>


<div class="row">
    <div class="col-md-12 ">
        <h2>Chi tiết đơn hàng</h2>

    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="table-responsive">

            <h4 style="text-align: center;">Các sản phẩm của đơn hàng ID: <?= $idDH ?></h4>
            <br>
            <h3> Tổng tiền đơn hàng : <?= $dh['sotien'] ?> </h3>
            <form action="#" method="POST">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th style="text-align: center">Số lượng</th>
                        <th style="text-align: center">Đơn Giá</th>
                        <th style="text-align: center">Tổng giá</th>
                        <th style="text-align: center" <?php if ($dh['xacnhan'] == 1) echo "hidden=''" ?>>Xoá sản phẩm
                        </th>
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
                            <td style="text-align: center">
                                <input style="max-width:50px" type="number" name="sanphamsua" disabled=""
                                       value="<?= $sanpham['idSP'] ?>">
                            </td>
                            <td><?= $sanpham['tensp'] ?></td>
                            <td style="text-align: center">
                                <input style="max-width: 70px" type="number" min="1"
                                       max="<?= $sanpham['slspDB'] + $sanpham['soluong'] ?>"
                                       name="soluong[<?= $sanpham['idSP'] ?>]" value="<?= $sanpham['soluong'] ?>">
                                <!-- <div class="input-append">
              <input name="<?= $sanpham['idSP'] ?>" min="1" max="<?= $sanpham['slspDB'] ?>" idSanPham="<?= $sanpham['idSP'] ?>" idDonHang=<?= $idDH ?> class="form-control input-number quantity" style="max-width:50px; padding-bottom: 27px" value="<?= $sanpham['soluong'] ?>" type="number">
              <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="<?= $sanpham['idSP'] ?>"> <i class="icon-minus"></i></button>
              <button type="button" class="btn btn-default btn-number" <?php if ($sanpham['soluong'] >= $sanpham['slspDB']) echo " disabled=''" ?> data-type="plus" data-field="<?= $sanpham['idSP'] ?>"><i class="icon-plus"></i></button>
             <a href="pages/xoasanphamgiohang.php?idSP=<?= $sanpham['idSP'] ?>"><button class="btn btn-danger" type="button"><i  class="icon-remove icon-white"></i></button></a>
            </div> -->
                            </td>
                            <td style="text-align: center"><?= $sanpham['gia'] ?></td>
                            <td style="text-align: center"><?= $sanpham['tonggia'] ?></td>
                            <td style="text-align: center"><a <?php if ($dh['xacnhan'] == 1) echo "hidden=''" ?>
                                        href="pages/xoaspdonhang.php?idDH=<?= $idDH ?>&idSP=<?= $sanpham['idSP'] ?>">Xoá</a>
                            </td>
                        </tr>

                        <?php
                        $tong += $sanpham['tonggia'];
                    } ?>
                    <!--  <tr>
            <td colspan="4" style="text-align:right;">Tổng tiền </td>
            <td style="text-align: center;"><?= $tong ?> VNĐ</td>
          </tr> -->
                    </tbody>

                </table>
                <input type="checkbox" name="xacnhandonhang" value="1"><label>Chọn để xác nhận đơn hàng</label>
                <div style="text-align: center">
                    <button <?php if ($dh['xacnhan'] == 1) echo "disabled=''" ?> class="btn btn-success" type="submit"
                                                                                 name="suachitietsp">Sửa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
