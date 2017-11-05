<?php

if (isset($_POST['suasp'])) {
    $flag = 0;

    $idSP = $_GET['idSP'];
    $idloaiSP = $_POST['loaisanpham'];
    $idTL = $_POST['idTL'];
    $tenSP = $_POST['tenSP'];
    $gia = $_POST['gia'];
    $khuyenmai = $_POST['khuyenmai'];
    $soluong = $_POST['soluong'];
    $tomtat = $_POST['txtTomtat'];
    $anhien = $_POST['rdoAnHien'];
    $noidung = $_POST['noidung'];
    //$ngay = date("Y-m-d");
    if (isset($_FILES['fImages'])) {
        $tenhinh = $_FILES['fImages']['name'];
        $file_tmp = $_FILES['fImages']['tmp_name'];
        $file_type = strtolower($_FILES['fImages']['type']);

        $type = array("image/jpeg", "image/jpg", "image/png");
        if (in_array($file_type, $type)) {

            if (suasp($idSP, $idTL, $idloaiSP, $tenSP, $gia, $noidung, $khuyenmai, $soluong, $tomtat, $tenhinh, $anhien) == TRUE) {
                $trongluong = $_POST['trongluong'];
                $chungloai = $_POST['chungloai'];
                $tuoi = $_POST['tuoi'];
                $mauchatlieu = $_POST['mauchatlieu'];
                $gioitinh = $_POST['rdoGT'];
                $mota = $_POST['mota'];

                move_uploaded_file($file_tmp, "../images/" . $tenhinh);
                if (suachitiet($idSP, $trongluong, $chungloai, $tuoi, $mauchatlieu, $gioitinh, $mota) == FALSE) {
                    $flag = 2;
                } else {
                    header("location:index.php?p=listSP");
                }
            }
        }

    } else {
        $flag = 1;
    }
}

?>

<?php
if (isset($_GET['idSP'])) {
    $flag = 0;
    $idSP = $_GET['idSP'];
//		$sanphamvachitiettheoidSP=$trangadmin->sanphamvachitiettheoidSP($idSP);
//		$sanpham=mysql_fetch_array($sanphamvachitiettheoidSP);
    $sanpham = $trangadmin->sanphamvachitiettheoidSP($idSP);
    //$sanpham=mysql_fetch_array($sanphamvachitiettheoidSP);


}
$an = "";
$hien = "";
if ($sanpham['anhien'] == 1) {
    $hien = " checked=''";
} else {
    $an = " checked=''";
}

$nam = "";
$nu = "";
if ($sanpham['gioitinh'] == 1) {
    $nam = " checked=''";
} else {
    $nu = " checked=''";
}
?>


    <div class="row">
        <div class="col-md-8">
            <h2>Sửa sản phẩm</h2>
        </div>
        <div class="col-md-4">
            <h2>Chi tiết sản phẩm</h2>
        </div>
    </div>
    <hr/>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
                <!-- Advanced Tables -->
                <div class="panel-body">
                    <div class="table-responsive">

                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" id="idTL" name="idTL">

                                <?php $danhsachtheloai = $trangadmin->danhsachtheloai();
                                //while($theloai=mysql_fetch_array($danhsachtheloai))
                                foreach ($danhsachtheloai as $theloai) {
                                    if ($theloai['idTL'] == $sanpham['idTL']) { ?>
                                        <option selected=""
                                                value="<?= $theloai['idTL'] ?>"><?= $theloai['tenTL'] ?></option>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $theloai['idTL'] ?>"><?= $theloai['tenTL'] ?></option>
                                        <?php
                                    }
                                    ?>

                                <?php } ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="loaisanpham">Loại tin</label>
                            <select class="form-control" name="loaisanpham" id="loaisanpham">
                                <?php
                                $loaisanphamtheotheloai = $trangadmin->loaisanphamtheotheloai($sanpham['idTL']);
                                //	                	while($loaisanpham=mysql_fetch_array($loaisanphamtheotheloai))
                                foreach ($loaisanphamtheotheloai as $loaisanpham) {
                                    if ($loaisanpham['idloaiSP'] == $sanpham['idloaiSP']) { ?>
                                        <option selected=""
                                                value="<?= $loaisanpham['idloaiSP'] ?>"><?= $loaisanpham['tenloaiSP'] ?></option>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $loaisanpham['idloaiSP'] ?>"><?= $loaisanpham['tenloaiSP'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" value="<?= $sanpham['tenSP'] ?>" name="tenSP"
                                   placeholder="Tên sản phẩm"/>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" value="<?= $sanpham['gia'] ?>" type="number" min="100000"
                                   max="999999999999" name="gia" placeholder="Giá"/>
                        </div>

                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input class="form-control" value="<?= $sanpham['khuyenmai'] ?>" type="number" min="0"
                                   max="100" name="khuyenmai" placeholder="Phần trăm khuyến mãi"/>
                        </div>

                        <div class="form-group">
                            <label>Số lượng sản phẩm</label>
                            <input class="form-control" type="number" value="<?= $sanpham['soluong'] ?>" min="0"
                                   max="100" name="soluong" placeholder="Số lượng sản phẩm ban đầu"/>
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="3" name="txtTomtat"
                                      placeholder="Tóm tắt ngắn gọn về sản phẩm"><?= $sanpham['tomtat'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Hình cũ</label>
                            <img style="height: 100px;width: 100px" src="../images/<?= $sanpham['hinh'] ?>">
                            <br>
                            <label>Chọn hình mới</label>
                            <input type="file" name="fImages">
                            <!-- <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình"> -->
                        </div>

                        <div class="form-group">
                            <label>Ẩn hiện</label>
                            <label class="radio-inline">
                                <input name="rdoAnHien" <?= $hien ?> value="1" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="rdoAnHien" <?= $an ?> value="0" type="radio">Không
                            </label>
                        </div>


                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="panel-body panel">

                    <div class="form-group">
                        <label>Trọng lượng</label>
                        <input class="form-control" value="<?= $sanpham['trongluong'] ?>" name="trongluong"
                               placeholder="G"/>
                    </div>
                    <div class="form-group">
                        <label>Chủng loại</label>
                        <input class="form-control" value="<?= $sanpham['chungloai'] ?>" name="chungloai"
                               placeholder="Nhẫn, dây chuyền, lắc tay ,...."/>
                    </div>

                    <div class="form-group">
                        <label>Tuổi</label>
                        <input class="form-control" value="<?= $sanpham['tuoi'] ?>" name="tuoi"
                               placeholder="Tuổi vàng"/>
                    </div>

                    <div class="form-group">
                        <label>Màu chất liệu</label>
                        <input class="form-control" value="<?= $sanpham['mauchatlieu'] ?>" maxlength="10"
                               name="mauchatlieu" placeholder="Trắng, vàng,..."/>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="mota"
                                  placeholder="Mô tả sản phẩm hiển thị ở thông tin chi tiết sản phẩm..."><?= $sanpham['soluong'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Giới tính</label>
                        <label class="radio-inline">
                            <input name="rdoGT" value="1" <?= $nam ?> type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="rdoGT" value="0" <?= $nu ?> type="radio">Nữ
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control " id="noidung" rows="3"
                              name="noidung"><?= $sanpham['soluong'] ?><?= $sanpham['noidung'] ?></textarea>
                </div>
                <script type="text/javascript">
                    //CKEDITOR.replace('noidung');
                    CKEDITOR.replace('noidung',
                        {

                            filebrowserBrowseUrl: 'http://localhost:88/webcv/admin/assets/ckfinder/ckfinder.html',
                            filebrowserImageBrowseUrl: 'http://localhost:88/webcv/admin/assets/ckfinder/ckfinder.html?type=Images',
                            filebrowserFlashBrowseUrl: 'http://localhost:88/webcv/admin/assets/ckfinder/ckfinder.html?type=Flash',
                            filebrowserUploadUrl: 'http://localhost:88/webcv/admin/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                            filebrowserImageUploadUrl: 'http://localhost:88/webcv/admin/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl: 'http://localhost:88/webcv/admin/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                        });
                </script>


                <button type="submit" name="suasp" class="btn btn-default"> Sửa</button>
            </div>
        </div>
    </form>
<?php


?>