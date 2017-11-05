<div class="row">
    <div class="col-md-12">
        <h2>Danh sách thể loại</h2>
        <h5>Xem danh sách, xoá, sửa thể loại</h5>

    </div>
</div>
<!-- /. ROW  -->
<hr/>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách thể loại
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <!-- DO DL vao day  -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <td>Mã Thể Loại</td>
                            <td>Tên Thể Loại</td>
                            <td>Thứ Tự</td>
                            <td>Ẩn Hiện</td>
                            <td>Tóm Tắt</td>
                            <td>Sửa-Xóa</td>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $theloai = $trangadmin->DanhSachTheLoai();
                        //while($row_theloai = mysql_fetch_array($theloai))\
                        foreach ($theloai as $row_theloai) {
                            ob_start();
                            ?>
                            <tr>
                                <td>{idTL}</td>
                                <td>{tenTL}</td>
                                <td>{thutu}</td>
                                <td>{anhien}</td>
                                <td>{tomtat}</td>
                                <td><a href="index.php?p=suatl&idTL={idTL}">Sửa</a>-<a
                                            onclick="return confirm('Bạn có chắc muốn xoá không')"
                                            href="pages/xoatl.php?idTL={idTL}">Xoá</a></td>
                            </tr>


                            <?php
                            $s = ob_get_clean();
                            $s = str_replace("{idTL}", $row_theloai["idTL"], $s);
                            $s = str_replace("{tenTL}", $row_theloai["tenTL"], $s);
                            $s = str_replace("{thutu}", $row_theloai["thutu"], $s);
                            $s = str_replace("{anhien}", $row_theloai["anhien"], $s);
                            $s = str_replace("{tomtat}", $row_theloai["tomtat"], $s);
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