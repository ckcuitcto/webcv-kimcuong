<?php
$idloaiSP = $_GET["idloaiSP"];
settype($idloaiSP, "int");
$loaisp = $trangadmin->loaisptheoid($idloaiSP);
//$row_chitiet=mysql_fetch_array($loaisp);

?>

<?php
if (isset($_POST["btnSua"])) {
    echo $tenloaiSP = $_POST["tenloaiSP"];
    echo "<br>";
    echo $ten_khongdau = changeTitle($tenloaiSP);
    echo "<br>";
    echo $thutu = $_POST["thutu"];
    echo "<br>";
    echo $idTL = $_POST["idTL"];
    echo "<br>";
    echo $anhien = $_POST["anhien"];
    echo "<br>";

    echo $tomtat = $_POST["tomtatzz"];
    echo "<br>";
    echo $idloaiSP;

    if ($trangadmin->sualoaisanpham($idloaiSP, $tenloaiSP, $ten_khongdau, $thutu, $anhien, $idTL, $tomtat) == TRUE) {
        echo " sua dc ";
        header("Location:index.php?p=listlsp");
    } else {
        echo " sua k dc";
    }
}
?>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h2>Sửa loại sản phẩm</h2>
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
                    <input type="text" class="form-control" value="<?php echo $loaisp["tenloaiSP"] ?>" name="tenloaiSP"
                           placeholder="Tên loại sản phẩm"/>
                </div>
                <div class="form-group">
                    <label>Thứ tự</label>
                    <input type="number" value="<?php echo $row_chitiet["thutu"] ?>" class="form-control" name="thutu"
                           placeholder="Thứ tự"/>
                </div>
                <div>
                    <label>Thể loại</label>
                    <select name="idTL" id="idTL">
                        <?php
                        $theloai = $trangadmin->DanhSachTheLoai();
                        //while($row_theloai = mysql_fetch_array($theloai))
                        foreach ($theloai as $row_theloai) { ?>
                            <option <?php if ($row_theloai['idTL'] == $row_chitiet['idTL']) echo " selected=''" ?>
                                    value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["tenTL"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ẩn hiện</label>
                    <label class="radio-inline">
                        <input <?php if ($row_chitiet["anhien"] == 1) echo "checked= checked" ?> type="radio"
                                                                                                 name="anhien"
                                                                                                 value="1"/>Hiện
                    </label>
                    <label class="radio-inline">
                        <input <?php if ($row_chitiet["anhien"] == 0) echo "checked= checked" ?> type="radio"
                                                                                                 name="anhien"
                                                                                                 value="0"/>
                        Ẩn
                    </label>
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea class="form-control" rows="3" name="tomtatzz"
                              placeholder="Tóm tắt ngắn gọn về loại sản phẩm"><?php echo $row_chitiet["tomtat"] ?></textarea>
                </div>
                <button type="submit" name="btnSua" class="btn btn-default"> Sửa</button>
            </form>
        </div>
    </div>
</div>


