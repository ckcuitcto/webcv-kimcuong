<?php
$idTL = $_GET["idTL"];
settype($idTL, "int");
//	$row_theloai = ChiTietTheLoai($idTL);
//    $row=mysql_fetch_array($row_theloai);
$row = $trangadmin->ChiTietTheLoai($idTL);
//$row=mysql_fetch_array($row_theloai);
?>
<?php
if (isset($_POST["suatl"])) {
    $tenTL = $_POST["tenTL"];
    $thutu = $_POST["thutu"];
    settype($thutu, "int");
    $anhien = $_POST["rdoAnHien"];
    settype($thutu, "int");
    $tomtat = $_POST["tomtat"];

    if ($trangadmin->suatl($idTL, $tenTL, $thutu, $anhien, $tomtat) == TRUE) {
        header("location:index.php?p=listtl");
    }

}
?>


<?php
$an = "";
$hien = "";
if ($row['anhien'] == 1) {
    $hien = " checked=''";
} else {
    $an = " checked=''";
}


?>


<div class="row">
    <div class="col-md-8">
        <h2>Sửa thể loại</h2>
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
                        <input type="text" class="form-control" value="<?= $row['tenTL'] ?>" name="tenTL"
                               placeholder="Tên sản phẩm"/>
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>
                        <input type="text" class="form-control" value="<?= $row['thutu'] ?>" name="thutu"
                               placeholder="Thứ tự"/>
                    </div>
                    <div class="form-group">
                        <label>Ẩn hiện</label>
                        <label class="radio-inline">
                            <input name="rdoAnHien" value="1" <?= $hien ?> type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="rdoAnHien" value="0" <?= $an ?> type="radio">Không
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea class="form-control" rows="4" name="tomtat"
                                  placeholder="Tóm tắt ngắn gọn về về loại"><?= $row['tomtat'] ?></textarea>
                    </div>
                    <button type="submit" name="suatl" class="btn btn-default"> Sửa</button>

                </form>
            </div>
        </div>
    </div>
</div>
