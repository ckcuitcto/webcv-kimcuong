<?php
if (isset($_GET['idSP'])) {
    $sl = 1;
    if (isset($_POST['sl']) && isset($_POST['themvaogio'])) {
        $sl = $_POST['sl'];
    }
    $idSP = $_GET['idSP'];
    if (!isset($_SESSION['giohang']) or empty($_SESSION['giohang'])) {
        $sp = $trangchu->sanphamtheoidSP($idSP);
        //$sp=mysql_fetch_array($kq);
        $sp['slsp'] = $sl;
        $_SESSION['giohang'][$idSP] = $sp;
    } else if (array_key_exists($idSP, $_SESSION['giohang'])) {
        $_SESSION['giohang'][$idSP]['slsp'] += $sl;
    } else {
        $sp = $trangchu->sanphamtheoidSP($idSP);
        //$sp=mysql_fetch_array($kq);
        $sp['slsp'] = $sl;
        $_SESSION['giohang'][$idSP] = $sp;
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>


<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active"> Giỏ hàng</li>
    </ul>
    <h3> Giỏ hàng </h3>
    <hr class="soft"/>
    <?php
    if (!isset($_SESSION['ten'])) { ?>
        <form method="post" action="#">
            <table class="table table-bordered">
                <tr>
                    <th> ĐĂNG NHẬP ĐỂ MUA HÀNG</th>
                </tr>
                <tr>
                    <td>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="inputUsername">Email</label>
                                <div class="controls">
                                    <input type="text" id="emaildn" name="emaildn" placeholder="Email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword1">Mật khẩu</label>
                                <div class="controls">
                                    <input type="password" id="matkhaudn" name="matkhaudn" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="dangnhap" class="btn">Đăng nhập</button>
                                    hoặc <a href="index.php?p=dangki" class="btn">Đăng kí ngay!</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <a href="index.php?p=quenmatkhau" style="text-decoration:underline">Quên mật khẩu
                                        ?</a>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </form>
        <?php
    } else if (isset($_SESSION['giohang'])) //print_r($_SESSION['giohang']);
    {
        if (!empty($_SESSION['giohang'])) {

            ?>
            <form method="post" action="">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tóm tắt</th>
                        <th>Số lượng</th>
                        <th>Đơn Giá</th>
                        <th>Giảm giá</th>
                        <th>Tổng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $tong = 0;
                    $tongkm = 0;
                    foreach ($_SESSION['giohang'] as $row) {
                        $sanphamtheoidSP = $trangchu->sanphamtheoidSP($row['idSP']);
                        //$a=mysql_fetch_array($sanphamtheoidSP);
                        $soluongsptrongdb = $sanphamtheoidSP['soluong'];


                        $soluong = $_SESSION['giohang'][$row['idSP']]['slsp'];

                        if ($_SESSION['giohang'][$row['idSP']]['slsp'] > $soluongsptrongdb) {
                            $_SESSION['giohang'][$row['idSP']]['slsp'] = $soluongsptrongdb;
                        }

                        ?>
                        <tr>
                            <td><img width="60" src="images/<?= $row['hinh'] ?>" alt=""/></td>
                            <td><?= $row['tenSP'] ?><br/>Color : black, Material : metal</td>
                            <td>
                                <!-- <div class="input-append">
                                    <span class="input-append-btn">
                                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="xxxx">
                                        <span class="glyphicon glyphicon-minus"></span> </button>
                                    </span>
                                    <input name="xxxx" class="form-control input-number" value="1" type="text">
                                    <span class="input-append-btn">
                                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="xxxx"> <span class="glyphicon glyphicon-plus"></span> </button>
                                    </span>
                                </div> -->

                                <div class="input-append">
                                    <input name="<?= $row['idSP'] ?>" min="1" max="<?= $soluongsptrongdb ?>"
                                           idSanPham="<?= $row['idSP'] ?>" class="form-control input-number quantity"
                                           style="max-width:34px" value="<?= $soluong ?>" size="16" type="number">
                                    <button type="button" class="btn btn-default btn-number" data-type="minus"
                                            data-field="<?= $row['idSP'] ?>"><i class="icon-minus"></i></button>
                                    <button type="button"
                                            class="btn btn-default btn-number" <?php if ($soluong == $soluongsptrongdb) echo " disabled=''" ?>
                                            data-type="plus" data-field="<?= $row['idSP'] ?>"><i class="icon-plus"></i>
                                    </button>
                                    <a href="pages/giohang/xoasanphamgiohang.php?idSP=<?= $row['idSP'] ?>">
                                        <button class="btn btn-danger" type="button"><i
                                                    class="icon-remove icon-white"></i></button>
                                    </a>
                                </div>
                            </td>
                            <td><?= $row['gia'] ?></td>
                            <td><?php if ($row['khuyenmai'] != 0) {
                                    echo khuyenmai($row['gia'], $row['khuyenmai']);
                                } else echo 0; ?></td>
                            <td><?php echo $tongsp = ($row['gia'] * $soluong) ?></td>
                        </tr>
                        <?php
                        $tong += $tongsp;

                        $tongkm += khuyenmai($row['gia'], $row['khuyenmai']) * $soluong;

                        $_SESSION['giohang'][$row['idSP']]['tonggiasp'] = (($row['gia'] * $soluong) - (khuyenmai($row['gia'], $row['khuyenmai']) * $soluong));
                        //$aa=$_SESSION['giohang'][$row['idSP']]['tonggiasp'];
                        //$bb=($row['gia']*$soluong)-(khuyenmai($row['gia'],$row['khuyenmai'])*$soluong);
                        //echo $aa;
                        //echo $aa;

                    }


                    ?>

                    <tr>
                        <td colspan="5" style="text-align:right">Tổng giá</td>
                        <td> <?= $tong ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right">Tổng giá khuyến mãi</td>
                        <td> <?= $tongkm ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right"><strong>Thành tiền</strong></td>
                        <td class="label label-important" style="display:block">
                            <strong>  <?= $tong - $tongkm ?> </strong></td>
                    </tr>

                    </tbody>
                </table>
            </form>
            <a href="index.php?p=muahang" class="btn btn-large pull-right">Mua hàng... <i class="icon-arrow-right"></i></a>
            <a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Quay về trang chủ để tiếp tục mua
                hàng </a>
            <?php
        } else {
            ?>
            <div class="alert alert-error"> Giỏ hàng của bạn đang rỗng!!!</div>
            <a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Quay về trang chủ để tiếp tục mua
                hàng </a>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-error"> Giỏ hàng của bạn đang rỗng!!!</div>
        <a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Quay về trang chủ để tiếp tục mua hàng
        </a>
        <?php
    }
    ?>


</div>