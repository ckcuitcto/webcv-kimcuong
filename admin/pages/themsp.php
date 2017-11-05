<?php
if (isset($_POST['themSP'])) {
    $flag = 0;
    $idloaiSP = $_POST['loaisanpham'];
    $idTL = $_POST['idTL'];
    $tenSP = $_POST['tenSP'];
    $gia = $_POST['gia'];
    $khuyenmai = $_POST['khuyenmai'];
    $soluong = $_POST['soluong'];
    $tomtat = $_POST['txtTomtat'];
    $anhien = $_POST['rdoAnHien'];
    $noidung = $_POST['noidung'];
    $ngay = date("Y-m-d");
    if (isset($_FILES['fImages'])) {
        $tenhinh = $_FILES['fImages']['name'];
        $file_tmp = $_FILES['fImages']['tmp_name'];
        $file_type = strtolower($_FILES['fImages']['type']);

        $type = array("image/jpeg", "image/jpg", "image/png");
        if (in_array($file_type, $type)) {
            if ($trangadmin->themsp($idTL, $idloaiSP, $tenSP, $gia, $noidung, $khuyenmai, $soluong, $tomtat, $tenhinh, $anhien, $ngay) == TRUE) {
                $trongluong = $_POST['trongluong'];
                $chungloai = $_POST['chungloai'];
                $tuoi = $_POST['tuoi'];
                $mauchatlieu = $_POST['mauchatlieu'];
                $gioitinh = $_POST['rdoGT'];
                $mota = $_POST['mota'];

                move_uploaded_file($file_tmp, "../images/" . $tenhinh);
                if ($trangadmin->themchitiet($trongluong, $chungloai, $tuoi, $mauchatlieu, $gioitinh, $mota) == FALSE) {
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


    <div class="row">
        <div class="col-md-8">
            <h2>Thêm sản phẩm</h2>
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
                            <label>Thể loại</label>
                            <select class="form-control" id="idTL" name="idTL">
                                <option value="0">Thể loại</option>
                                <?php $danhsachtheloai = $trangadmin->danhsachtheloai();
                                //while($theloai=mysql_fetch_array($danhsachtheloai))
                                foreach ($danhsachtheloai as $theloai) {
                                    ?>
                                    <option value="<?= $theloai['idTL'] ?>"><?= $theloai['tenTL'] ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="loaisanpham">Loại tin</label>
                            <select class="form-control" name="loaisanpham" id="loaisanpham">
                                <option value="0">Loại tin</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="tenSP" placeholder="Tên sản phẩm"/>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" type="number" min="100000" max="999999999999" name="gia"
                                   placeholder="Giá"/>
                        </div>

                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input class="form-control" type="number" min="0" max="100" name="khuyenmai"
                                   placeholder="Phần trăm khuyến mãi"/>
                        </div>

                        <div class="form-group">
                            <label>Số lượng sản phẩm</label>
                            <input class="form-control" type="number" min="0" max="100" name="soluong"
                                   placeholder="Số lượng sản phẩm ban đầu"/>
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="3" name="txtTomtat"
                                      placeholder="Tóm tắt ngắn gọn về sản phẩm"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Hình</label>
                            <input type="file" name="fImages">
                            <!-- <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình"> -->
                        </div>

                        <div class="form-group">
                            <label>Ẩn hiện</label>
                            <label class="radio-inline">
                                <input name="rdoAnHien" value="1" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="rdoAnHien" value="0" type="radio">Không
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
                        <input class="form-control" name="trongluong" placeholder="G"/>
                    </div>
                    <div class="form-group">
                        <label>Chủng loại</label>
                        <input class="form-control" name="chungloai" placeholder="Nhẫn, dây chuyền, lắc tay ,...."/>
                    </div>

                    <div class="form-group">
                        <label>Tuổi</label>
                        <input class="form-control" name="tuoi" placeholder="Tuổi vàng"/>
                    </div>

                    <div class="form-group">
                        <label>Màu chất liệu</label>
                        <input class="form-control" maxlength="10" name="mauchatlieu" placeholder="Trắng, vàng,..."/>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="mota"
                                  placeholder="Mô tả sản phẩm hiển thị ở thông tin chi tiết sản phẩm..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Giới tính</label>
                        <label class="radio-inline">
                            <input name="rdoGT" value="1" type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="rdoGT" value="0" type="radio">Nữ
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control " id="noidung" rows="3" name="noidung"></textarea>
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


                <button type="submit" name="themSP" class="btn btn-default"> Thêm</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            </div>
        </div>
    </form>
<?php


?>