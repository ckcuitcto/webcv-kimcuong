<?php

$xn = 2;

if (isset($_GET['xacnhan'])) {
    $xn = $_GET['xacnhan'];
}

$lienhe = $trangadmin->danhsachlienhe($xn);

?>


<div class="row">
    <div class="col-md-12">
        <h2>Danh sách thư liên hệ</h2>
        <h5>Xem danh sách thư liên hệ</h5>

    </div>
</div>
<!-- /. ROW  -->
<hr/>
<div class="row">
    <div class="col-md-4 donhang" xacnhan="2">
        <h3><a href="index.php?p=lienhe&xacnhan=2">Tất cả thư liên hệ</a></h3>
    </div>
    <div class="col-md-4 donhang" xacnhan="1">
        <h3><a href="index.php?p=lienhe&xacnhan=1"> Thư liên hệ đã xác nhận</a></h3>
    </div>
    <div class="col-md-4 donhang" xacnhan="0">
        <h3><a href="index.php?p=lienhe&xacnhan=0"> Thư liên hệ chưa nhận </a></h3>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách liên hệ
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Tên người gửi</td>
                            <td>Số điện thoại-Email</td>

                            <td>Nội dung</td>
                            <td>Chủ để</td>
                            <td>Xác nhận</td>
                            <td></td>
                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        //while($row_lh = mysql_fetch_array($lienhe))
                        foreach ($lienhe as $row_lh) {
                            ob_start();
                            ?>
                            <tr>
                                <td>{idLH}</td>
                                <td>{ten}</td>
                                <td>{sdt}-{email}</td>
                                <td>{noidung}</td>
                                <td>{chude}</td>
                                <td>
                                    <select class="form-control xacnhanthulienhe" id="thulienhe" name="thulienhe"
                                            idLienHe="<?= $row_lh['idLH'] ?>">
                                        <option value="1" <?php if ($row_lh['xacnhan'] == 1) echo "selected=''"; ?> >Đã
                                            nhận
                                        </option>
                                        <option value="0" <?php if ($row_lh['xacnhan'] == 0) echo "selected=''"; ?> >
                                            Chưa nhận
                                        </option>
                                    </select>
                                </td>
                                <td><a onclick="return confirm('Bạn có chắc muốn xoá không')"
                                       href="pages/xoatl.php?idTL={idTL}">Xoá</a></td>
                            </tr>


                            <?php
                            $s = ob_get_clean();
                            $s = str_replace("{idLH}", $row_lh["idLH"], $s);
                            $s = str_replace("{ten}", $row_lh["ten"], $s);
                            $s = str_replace("{sdt}", $row_lh["sdt"], $s);
                            $s = str_replace("{email}", $row_lh["email"], $s);
                            $s = str_replace("{chude}", $row_lh["chude"], $s);
                            $s = str_replace("{noidung}", $row_lh["noidung"], $s);
                            $s = str_replace("{xacnhan}", $row_lh["xacnhan"], $s);
                            echo $s;
                        }
                        ?>

                        </tbody>

                    </table>
                    <!-- /. het thuc do DL  -->
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->