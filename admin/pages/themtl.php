<?php
if (isset($_POST["themtl"])) {
    $tenTL = $_POST["tenTL"];
    $thutu = $_POST["thutu"];
    settype($thutu, "int");
    $anhien = $_POST["rdoAnHien"];
    settype($thutu, "int");
    $tomtat = $_POST["tomtat"];

    if ($trangadmin->themtheloai($tenTL, $thutu, $anhien, $tomtat) == TRUE) {
        header("location:index.php?p=listtl");
    }

}
?>


<div class="row">
    <div class="col-md-8">
        <h2>Thêm thể loại</h2>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12 ">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="tenTL" placeholder="Tên sản phẩm"/>
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>
                        <input type="text" class="form-control" name="thutu" placeholder="Thứ tự"/>
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
                        <textarea class="form-control" rows="4" name="tomtat"
                                  placeholder="Tóm tắt ngắn gọn về về loại"></textarea>
                    </div>
                    <button type="submit" name="themtl" class="btn btn-default"> Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>
