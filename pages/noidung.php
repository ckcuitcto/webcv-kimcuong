<?php
$sausanphammoinhat = $trangchu->sausanphammoinhat();
$dsTheloai = $trangchu->dsTheloai();


?>


<div class="span9">
    <div class="well well-small">
        <h4>Sản phẩm nổi bật
            <small class="pull-right">200+ sản phẩm nổi bật</small>
        </h4>
        <div class="row-fluid">
            <div id="featured" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    $flag = 0;
                    foreach ($dsTheloai as $row) {

                        ?>
                        <div class="item<?php if ($flag == 0) echo ' active'; ?>">
                            <ul class="thumbnails">
                                <?php
                                $sanpham = $trangchu->bonsanphamnoibattheotheloai($row['idTL']);
                                foreach ($sanpham as $rowsp) {
                                    ?>
                                    <li class="span3">
                                        <div class="thumbnail">
                                            <?php if ($flag == 0) {
                                                echo "<i class='tag'></i>";
                                            } ?>
                                            <a href="index.php?p=chitiet&idSP=<?= $rowsp['idSP'] ?>"><img height="160px"
                                                                                                          width="160px"
                                                                                                          src="images/<?= $rowsp['hinh'] ?>"
                                                                                                          alt=""></a>
                                            <div class="caption">
                                                <h5><?= $rowsp['tenSP'] ?></h5>
                                                <h4><a class="btn"
                                                       href="index.php?p=chitiet&idSP=<?= $rowsp['idSP'] ?>">Xem</a>
                                                    <span class="pull-right"><a class="btn btn-primary"
                                                                                href="index.php?p=chitiet	&idSP=<?= $rowsp['idSP'] ?>"><?= $rowsp['gia'] ?></a></span>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                $flag = 1;
                                ?>
                            </ul>
                        </div>
                    <?php } ?>

                </div>
                <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#featured" data-slide="next">›</a>
            </div>
        </div>
    </div>
    <h4>Sản phẩm mới nhất </h4>
    <ul class="thumbnails">
        <?php
        //while($row=mysql_fetch_array($sausanphammoinhat)){
        foreach ($sausanphammoinhat as $row) {

            ?>
            <li class="span3">
                <div class="thumbnail">
                    <i class="tag"></i>
                    <a href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"><img height="160px" width="160px"
                                                                                src="images/<?= $row['hinh'] ?>"
                                                                                alt=""/></a>
                    <div class="caption">
                        <h5><?= $row['tenSP'] ?></h5>
                        <!--  <p>
						<?= $row['tomtat'] ?>
					  </p> -->
                        <h4 style="text-align:center"><a class="btn"
                                                         href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"> <i
                                        class="icon-zoom-in"></i> Xem chi tiết</a>
                            <!-- <a class="btn" href="index.php?p=giohang&idSP=<?= $row['idSP'] ?>">Thêm <i class="icon-shopping-cart"></i></a> -->
                            <a class="btn btn-primary"
                               href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"><?= $row['gia'] ?></a></h4>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>