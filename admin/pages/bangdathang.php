<!-- <?php
//require("../../thuvien/database.php");
//require("../../thuvien/trangadmin.php");

$xacnhan = $_POST['xacnhan'];
?>

<div class="col-md-12 col-xs-12 col-sm-12">
	<div class="table-responsive">
		 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">ID Đơn Hàng</th>
                <th style="text-align: center">Tên người nhận</th>
                <th style="text-align: center">Nơi nhận</th>
                <th style="text-align: center" >Số điện thoại</th>
                 <th style="text-align: center" >Ghi chú</th>
                <th style="text-align: center">Số tiền (VNĐ)</th>
                <th style="text-align: center">Tình trạng</th>
              </tr>
            </thead>
            <tbody>
            <?php
$i = 0;
$tongtien = 0;
$dathang = $trangadmin->dathang($xacnhan);
//while($row=mysql_fetch_array($dathang))
foreach ($dathang as $row) {
    $i++;
    ?>
              <tr >
                <td style="text-align: center"><?= $i ?></td>
                <td style="text-align: center" class="sanphamdathang" idDatHang="<?= $row['idDH'] ?>" ><?= $row['idDH'] ?></td>
                <td style="text-align: center"><?= $row['tennguoinhan'] ?></td>
                <td style="text-align: center"><?= $row['noinhan'] ?></td>

                <td style="text-align: center"><?= $row['sdt'] ?></td>
                 <td style="text-align: center"><?= $row['ghichu'] ?></td>
                <td style="text-align: center"><?= $row['sotien'] ?></td>
                <td style="text-align: center"><?php if ($row['xacnhan'] == 1) {
        echo "Đã nhận đơn hàng";
    } else {
        echo "Chưa nhận";
    } ?></td>
                
              </tr>
             <?php
    $tongtien += $row['sotien'];
} ?>
            </tbody>
          </table>

          <div id="ketquaz"></div>
    </div>
</div> -->