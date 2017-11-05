<?php


$khuyenmaicaonhat = $trangchu->khuyenmaicaonhat();

$sotintrang = 6;
if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
} else {
    $trang = 1;
}

$from = ($trang - 1) * $sotintrang;
$sanpham = $trangchu->sanphamkhuyenmai($from, $sotintrang);
//$sanphamduoi= $trangchu->sanphamkhuyenmai($from,$sotintrang);


$tong = $trangchu->spkhuyenmai();
//var_dump($tong);
//$sosp=mysql_num_rows($tong);
$sosp = count($tong);
?>

<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active">Khuyến mãi</li>
    </ul>
    <h4> Giảm giá lên đến <?= $khuyenmaicaonhat ?>%
        <small class="pull-right"> Có <?= $sosp ?> sản phẩm đang giảm giá</small>
    </h4>
    <hr class="soft"/>
    <!-- <form class="form-horizontal span6">
        <div class="control-group">
          <label class="control-label alignL">Sort By </label>
            <select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
        </div>
      </form> -->
    <div id="myTab" class="pull-right">
        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                        class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <div class="tab-content">
        <div class="tab-pane" id="listView">
            <?php
            //while($row=mysql_fetch_array($sanpham))
            foreach ($sanpham as $row) {
                ?>
                <div class="row">
                    <div class="span2">
                        <a href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"><img src="images/<?= $row['hinh'] ?>"
                                                                                    alt=""/></a>
                    </div>
                    <div class="span4">
                        <h3><a href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"><?= $row['tenSP'] ?></a></h3>
                        <hr class="soft"/>
                        <p>
                            <?= $row['tomtat'] ?>
                        </p>
                        <!-- <a class="btn btn-small pull-right" href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>">Xem chi tiết</a> -->
                        <br class="clr"/>
                    </div>
                    <div class="span3 alignR">
                        <form class="form-horizontal qtyFrm">
                            <?php
                            if ($row['khuyenmai'] != 0) { ?>
                                <h4><strike style='color:red'><?= $row['gia'] ?>đ </strike>
                                    -> <?php echo tinhgiakhuyenmai($row['gia'], $row['khuyenmai']) ?>đ</h4>
                                <?php
                            } else {
                                ?>
                                <h4> <?= $row['gia'] ?>đ</h4>
                                <?php
                            }
                            ?>

                            <!-- <label class="checkbox">
						<input type="checkbox" name="loai[]" value="<?= $row['idSP'] ?>">  Thêm vào so sánh
					</label><br/> -->
                            <div class="btn-group">
                                <!-- <a href="index.php?p=giohang&idSP=<?= $row['idSP'] ?>" class="btn btn-large btn-primary"> Thêm <i class=" icon-shopping-cart"></i></a> -->
                                <a href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"
                                   class="btn btn-large btn-primary"><i class="icon-zoom-in"></i> Xem chi tiết</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft"/>
            <?php } ?>
        </div>

        <div class="tab-pane  active" id="blockView">
            <ul class="thumbnails">
                <?php
                //while($rowduoi=mysql_fetch_array($sanphamduoi))
                foreach ($sanpham as $rowduoi) {

                    ?>
                    <li class="span3">
                        <div class="thumbnail">
                            <a href="index.php?p=chitiet&idSP=<?= $rowduoi['idSP'] ?>"><img height="260px" width="260px"
                                                                                            src="images/<?= $rowduoi['hinh'] ?>"
                                                                                            alt=""/></a>
                            <div class="caption">
                                <h5><?= $rowduoi['tenSP'] ?></h5>
                                <!-- <p>
						<?= $rowduoi['tomtat'] ?>
					  </p> -->
                                <h4 style="text-align:center;color: yellow"><a class="btn"
                                                                               href="index.php?p=chitiet&idSP=<?= $rowduoi['idSP'] ?>">
                                        <i class="icon-zoom-in"></i>Xem chi tiết</a>
                                    <!-- <a class="btn" href="index.php?p=giohang&idSP=<?= $rowduoi['idSP'] ?>">Thêm<i class="icon-shopping-cart"></i></a> -->
                                    <a class="btn btn-primary" href="index.php?p=chitiet&idSP=<?= $rowduoi['idSP'] ?>">
                                        <?php
                                        if ($rowduoi['khuyenmai'] != 0) { ?>
                                            <?= tinhgiakhuyenmai($rowduoi['gia'], $rowduoi['khuyenmai']) . "đ" ?>
                                        <?php } else { ?>
                                            <?= $rowduoi['gia'] . "đ" ?>
                                        <?php } ?></a></h4>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <hr class="soft"/>
        </div>
    </div>
    <?php
    $tongsotrang = ceil($sosp / $sotintrang);

    ?>
    <div class="pagination" align="center">
        <ul>
            <li><a href="index.php?p=khuyenmai&trang=<?php echo $trang - 1 ?>">&lsaquo;</a></li>
            <?php
            for ($i = 1; $i <= $tongsotrang; $i++) {
                ?>
                <li><a href="index.php?p=khuyenmai&trang=<?= $i ?>"><?= $i ?></a></li>
                <?php
            }
            ?>
            <li><a href="index.php?p=khuyenmai&trang=<?php echo $trang - 1 ?>">&rsaquo;</a></li>
        </ul>
    </div>
    <br class="clr"/>
</div>
