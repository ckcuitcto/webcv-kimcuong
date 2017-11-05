<?php
if (isset($_POST["btnThem"])) {
    $tenloaiSP = $_POST["tenloaiSP"];
    $tenloai_khongdau = changeTitle($tenloaiSP);
    $thutu = $_POST["thutu"];
    $anhien = $_POST["rdoAnHien"];
    $idTL = $_POST["idTL"];
    $tomtat = $_POST["Tomtat"];
    if ($trangadmin->themloaisp($tenloaiSP, $tenloai_khongdau, $thutu, $anhien, $idTL, $tomtat) == TRUE) {
        header("location:index.php?p=listlsp");
    }
}
?>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h2>Thêm loại sản phẩm</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 col-sm-12 col-xs-12 ">

        <div class="panel-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" class="form-control" name="tenloaiSP" placeholder="Tên loại sản phẩm"/>
                </div>
                <div class="form-group">
                    <label>Thứ tự</label>
                    <input type="text" class="form-control" name="thutu" placeholder="Thứ tự"/>
                </div>
                <div>
                    <label>Thể loại</label>
                    <select name="idTL" id="idTL">
                        <?php
                        $theloai = $trangadmin->DanhSachTheLoai();
                        //while($row_theloai = mysql_fetch_array($theloai))
                        foreach ($theloai as $row_theloai) { ?>
                            <option value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["tenTL"] ?></option>
                        <?php } ?>
                    </select>
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
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea class="form-control" rows="3" name="Tomtat"
                              placeholder="Tóm tắt ngắn gọn về loại sản phẩm"></textarea>
                </div>
                <button type="submit" name="btnThem" class="btn btn-default"> Thêm</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            </form>
        </div>
    </div>
</div>
