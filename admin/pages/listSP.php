<?php
$danhsachsanpham = $trangadmin->danhsachsanpham();


?>


<div class="row">
    <div class="col-md-12">
        <h2>Danh sách sản phẩm</h2>
        <h5>Xem danh sách, xoá , sửa sản phẩm tại đây! </h5>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Hình</th>
                            <th>Giá (VNĐ)</th>
                            <th>Nội dung</th>
                            <th>Tóm tắt</th>
                            <th>Số lần xem</th>
                            <th>Ẩn hiện</th>
                            <th>Thể loại</th>
                            <th>Loại sản phẩm</th>
                            <th>KM (%)</th>
                            <th>Tồn kho</th>
                            <th>Đã bán</th>
                            <th>CN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //while($row=mysql_fetch_array($danhsachsanpham))
                        foreach ($danhsachsanpham as $row) {
                            $hinhchitiet = $trangadmin->hinhchitiet($row['idSP']);
                            ?>
                            <tr class="odd gradeX">
                                <td><?= $row['idSP'] ?></td>
                                <td><?= $row['tenSP'] ?></td>
                                <td><img style="height: 100px; width: 100px;" src="../images/<?= $row['hinh'] ?>">
                                    <!-- <div class="item active" >
					                  	<?php
                                    //while($hinh=mysql_fetch_array($hinhchitiet))
                                    foreach ($hinhchitiet as $hinh) { ?>
					                   	<a href="../images/<?= $hinh['tenhinh'] ?>"> <img style="width:20%;" src="../images/<?= $hinh['tenhinh'] ?>" alt=""/></a>
					                    <?php } ?>
					                  </div> -->
                                </td>
                                <td><?= $row['gia'] ?></td>

                                <td><?= $row['noidung'] ?></td>
                                <td><?= $row['tomtat'] ?></td>
                                <td><?= $row['solanxem'] ?></td>
                                <td><?= $row['anhien'] ?></td>
                                <td><?= $trangadmin->theloaitheoid($row['idTL']) ?></td>
                                <td><?= $trangadmin->loaisanphamtheoid($row['idloaiSP']) ?></td>
                                <td><?= $row['khuyenmai'] ?></td>
                                <td><?= $row['soluong'] ?></td>
                                <td><?= $row['daban'] ?></td>
                                <td><a onclick="return confirm('Bạn có chắc muốn xoá không')"
                                       href="pages/xoasp.php?idSP=<?= $row['idSP'] ?>">Xoá</a> <a
                                            href="index.php?p=suasp&idSP=<?= $row['idSP'] ?>">Sửa</a></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>