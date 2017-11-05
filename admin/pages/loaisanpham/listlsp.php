<div class="row">
    <div class="col-md-12">
        <h2>Danh sách loại sản phẩm</h2>
        <h5>Danh sách loại sản phẩm, xoá, sửa loại sản phẩm... </h5>

    </div>
</div>
<!-- /. ROW  -->
<hr/>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Advanced Tables
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <!-- DO DL vao day  -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <td>Mã Loại</td>
                            <td>Tên Loại Sản Phẩm</td>
                            <td>Tên Loại Không Dấu</td>
                            <td>Thứ Tự</td>
                            <td>Ẩn Hiện</td>
                            <td>TênTL</td>
                            <td>Sửa-Xóa</td>

                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $loaiSP = $trangadmin->danhsachloaisanpham();
                        //while($row_loaiSP = mysql_fetch_array($loaiSP))
                        foreach ($loaiSP as $row_loaiSP) {
                            ob_start();
                            ?>
                            <tr>
                                <td>{idloaiSP}</td>
                                <td>{tenloaiSP}</td>
                                <td>{aliasLSP}</td>
                                <td>{thutu}</td>
                                <td>{anhien}</td>
                                <td>{tenTL}</td>
                                <td><a href="index.php?p=sualsp&idloaiSP={idloaiSP}">Sửa</a>-<a
                                            href="pages/loaisanpham/xoalsp.php?idloaiSP={idloaiSP}">Xóa</a></td>
                            </tr>
                            <?php
                            $s = ob_get_clean();
                            $s = str_replace("{idloaiSP}", $row_loaiSP["idloaiSP"], $s);
                            $s = str_replace("{tenloaiSP}", $row_loaiSP["tenloaiSP"], $s);
                            $s = str_replace("{aliasLSP}", $row_loaiSP["aliasLSP"], $s);
                            $s = str_replace("{thutu}", $row_loaiSP["thutu"], $s);
                            $s = str_replace("{anhien}", $row_loaiSP["anhien"], $s);
                            $s = str_replace("{tenTL}", $trangadmin->theloaitheoid($row_loaiSP["idTL"]), $s);
                            // $s=str_replace("{tomtat}",$row_loaiSP["tomtat"],$s);
                            echo $s;
                        } ?>
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