<?php
$row = 0;
$test = 0;

if (isset($_POST['mua'])) {
    $tennguoinhan = $_POST['tennguoinhan'];
    $noinhan = $_POST['noinhan'];
    $sdt = $_POST['sdtdh'];
    $ghichu = $_POST['ghichudh'];
    $idUser = $_SESSION['idUser'];
    $sotien = 0;
    $row = $trangchu->dathang($idUser, $tennguoinhan, $noinhan, $sdt, $ghichu, $sotien);
    if ($row) {
        foreach ($_SESSION['giohang'] as $row) {
            $idDH = $trangchu->idDHcuoicung();
            $idSP = $row['idSP'];
            $soluong = $row['slsp'];
            $tensp = $row['tenSP'];
            $tonggia = $_SESSION['giohang'][$row['idSP']]['tonggiasp'];
            $test = $trangchu->sanphamdathang($idDH, $idSP, $soluong, $tensp, $tonggia);
        }
    }

}

?>

<?php
if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
    ?>
    <div class="row">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active"> Mua hàng</li>
        </ul>
        <h3> Xác nhận đơn hàng </h3>
        <hr class="soft"/>
        <div class="span6">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="input01">Tên người nhận</label>
                        <div class="controls">
                            <input type="text" name="tennguoinhan" value="<?= $_SESSION['ten'] ?>" class="input-xlarge"
                                   id="input01">

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input11">Nơi nhận</label>
                        <div class="controls">
                            <input type="text" name="noinhan" value="<?= $_SESSION['diachi'] ?>" class="input-xlarge"
                                   id="input11">

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input11">SĐT</label>
                        <div class="controls">
                            <input type="text" name="sdtdh" value="<?= $_SESSION['sdt'] ?>" class="input-xlarge"
                                   id="input11">

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textarea">Ghi chú</label>
                        <div class="controls">
                            <textarea class="input-xlarge" name="ghichudh" id="textarea" rows="3"
                                      style="height:65px"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="mua" class="btn btn-primary">Mua</button>
                        <button class="btn">Từ từ</button>
                    </div>
                </fieldset>
            </form>
            <?php
            if (isset($_POST['mua'])) {
                if ($test != 0) { ?>
                    <div class="alert alert-success">
                        Giao dịch thành công, bạn sẽ nhận được hàng trong ít nhất 5 ngày kể từ thời điểm này !!
                    </div>
                    <h4>Trang sẽ tự chuyển đến trang cá nhân sau <span id="timecount"></span> giây!</h4>

                    <?php

                } else { ?>
                    <div class="alert alert-error">
                        Giao dịch thất bại (>-<)
                    </div> <?php
                }
            }
            ?>
        </div>
        <div class="span6">
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

                foreach ($_SESSION['giohang'] as $row) {
                    $i++;
                    $tong += $_SESSION['giohang'][$row['idSP']]['tonggiasp'];
                    ?>
                    <tr>
                        <td style="text-align: center"><?= $i ?></td>
                        <td><?= $row['tenSP'] ?></td>
                        <td style="text-align: center"><?= $row['slsp'] ?></td>
                        <td style="text-align: center"><?= $row['gia'] ?></td>
                        <td style="text-align: center"><?= $_SESSION['giohang'][$row['idSP']]['tonggiasp'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" style="text-align:right;">Tổng giá</td>
                    <td style="text-align: center;"> <?= $tong ?> VNĐ</td>
                </tr>
                </tbody>
            </table>
            <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                  <input type="hidden" name="cmd" value="_s-xclick">
                  <input type="hidden" name="hosted_button_id" value="KKS6F64P7J7H2">
                  <table>
                  <tr><td><input type="hidden" name="on0" value="Lo&#7841;i">Lo&#7841;i</td></tr><tr><td><select name="os0">
                    <option value="Kim c&#432;&#417;ng">Kim c&#432;&#417;ng $50.00 USD</option>
                  </select> </td></tr>
                  </table>
                  <input type="hidden" name="currency_code" value="USD">
                  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form> -->
        </div>
    </div>

    <?php
} else {
    header("Location:index.php");
}
?>
