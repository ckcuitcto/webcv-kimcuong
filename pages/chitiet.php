<?php
$idSP = $_GET['idSP'];
$sanpham = $trangchu->sanphamtheoidSP($idSP);
$chitiet = $trangchu->chitietsanpham($idSP);
$hinhchitiet = $trangchu->hinhchitiet($idSP);


// $sanpham 	= 	mysql_fetch_array($sanphamtheoidSP);
// $chitiet 	= 	mysql_fetch_array($chitietsanpham);

//soluotxem($idSP);

?>


<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li><a href="products.html">Sản phẩm</a> <span class="divider">/</span></li>
        <li class="active"><?= $sanpham['tenSP'] ?></li>
    </ul>
    <div class="row">
        <div id="gallery" class="span3">
            <a href="images/<?= $sanpham['hinh'] ?>" title="<?= $sanpham['tenSP'] ?>">
                <img src="images/<?= $sanpham['hinh'] ?>" style="width:100%" alt="<?= $sanpham['tenSP'] ?>"/>
            </a>
            <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                    <?php
                    // if (count($hinhchitiet) <= 3)
                    for ($i = 0; $i < count($hinhchitiet); $i++) {
                        if ($i < 3) {
                            ?>
                            <div class="item active">
                                <?php
                                for (; $i < count($hinhchitiet); $i++) {
                                    ?>
                                    <a href="images/<?= $hinhchitiet[$i]['tenhinh'] ?>"> <img style="width:29%"
                                                                                              src="images/<?= $hinhchitiet[$i]['tenhinh'] ?>"
                                                                                              alt=""/></a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } else { ?>
                            <div class="item active">
                                <?php
                                for (; $i < count($hinhchitiet); $i++) {
                                    ?>
                                    <a href="images/<?= $hinh[$i]['tenhinh'] ?>"> <img style="width:29%"
                                                                                       src="images/<?= $hinh[$i]['tenhinh'] ?>"
                                                                                       alt=""/></a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
                <!--
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                -->
            </div>

            <!-- <div class="btn-toolbar">
             <div class="btn-group">
               <span class="btn"><i class="icon-envelope"></i></span>
               <span class="btn" ><i class="icon-print"></i></span>
               <span class="btn" ><i class="icon-zoom-in"></i></span>
               <span class="btn" ><i class="icon-star"></i></span>
               <span class="btn" ><i class=" icon-thumbs-up"></i></span>
               <span class="btn" ><i class="icon-thumbs-down"></i></span>
             </div>
           </div> -->
        </div>
        <div class="span6">
            <h3><?= $sanpham['tenSP'] ?> </h3>

            <!-- <small>- (14MP, 18x Optical Zoom) 3-inch LCD</small> -->
            <hr class="soft"/>
            <form class="form-horizontal qtyFrm" action="index.php?p=giohang&idSP=<?= $sanpham['idSP'] ?>"
                  method="post">
                <div class="control-group">
                    <label class="control-label"><span><?= $sanpham['gia'] ?>đ</span></label>
                    <div class="controls">
                        <input type="number" <?php if ($sanpham['soluong'] < 1) echo "disabled=''"; ?> class="span1"
                               min="1" max="<?= $sanpham['soluong'] ?>" name="sl" value="1"/>
                        <button <?php if ($sanpham['soluong'] < 1) echo "disabled=''"; ?> type="submit"
                                                                                          name="themvaogio"
                                                                                          class="btn btn-large btn-primary pull-right">
                            Thêm vào giỏ <i class=" icon-shopping-cart"></i></button>
                        <!-- <input type="hidden" name="p" value="giohang"> -->
                    </div>
                </div>
            </form>

            <hr class="soft"/>
            <?php if ($sanpham['soluong'] < 1) { ?>
                <div class="alert alert-danger">
                    Sản phẩm này hiện đã hết hàng!
                </div>

            <?php } else { ?>
                <h4>Còn lại <?= $sanpham['soluong'] ?> sản phẩm</h4>
                <?php
            }
            ?>
            <!-- <form class="form-horizontal qtyFrm pull-right">
              <div class="control-group">
                <label class="control-label"><span>Color</span></label>
                <div class="controls">
                  <select class="span2">
                      <option>Black</option>
                      <option>Red</option>
                      <option>Blue</option>
                      <option>Brown</option>
                    </select>
                </div>
              </div>
            </form> -->
            <hr class="soft clr"/>
            <p>
                <?= $sanpham['noidung'] ?>

            </p>
            <a class="btn btn-small pull-right" href="#detail">Xem thêm chi tiết</a>
            <br class="clr"/>
            <a href="#" name="detail"></a>
            <hr class="soft"/>
        </div>

        <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
                <li><a href="#profile" data-toggle="tab">Sản phẩm liên quan</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <h4>Thông tin sản phẩm</h4>
                    <table class="table table-bordered">
                        <tbody>
                        <tr class="techSpecRow">
                            <th colspan="2">Chi tiết</th>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Trọng lượng</td>
                            <td class="techSpecTD2"><?= $chitiet['trongluong'] ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Chủng loại</td>
                            <td class="techSpecTD2"><?= $chitiet['chungloai'] ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Tuổi</td>
                            <td class="techSpecTD2"> <?= $chitiet['tuoi'] ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Màu chất liệu</td>
                            <td class="techSpecTD2"> <?= $chitiet['mauchatlieu'] ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Giới tính</td>
                            <td class="techSpecTD2"><?= $chitiet['gioitinh'] ?></td>
                        </tr>
                        </tbody>
                    </table>

                    <h5>Mô tả</h5>
                    <p>
                        <?= $chitiet['mota'] ?>
                    </p>

                </div>
                <div class="tab-pane fade" id="profile">
                    <div id="myTab" class="pull-right">
                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i
                                        class="icon-list"></i></span></a>
                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                                        class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr"/>
                    <hr class="soft"/>
                    <div class="tab-content">
                        <div class="tab-pane" id="listView">
                            <?php
                            $sanphamlienquan = $trangchu->sanphamlienquan($idSP);
                            //while($row=mysql_fetch_array($sanphamlienquan))
                            foreach ($sanphamlienquan as $row) {
                                ?>
                                <div class="row">
                                    <div class="span2">
                                        <a href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"><img
                                                    src="images/<?= $row['hinh'] ?>" alt=""/></a>
                                    </div>
                                    <div class="span4">
                                        <h3>
                                            <a href="index.php?p=chitiet&idSP=<?= $row['idSP'] ?>"><?= $row['tenSP'] ?></a>
                                        </h3>
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
                                                    -> <?php echo tinhgiakhuyenmai($row['gia'], $row['khuyenmai']) ?>đ
                                                </h4>
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
                                                   class="btn btn-large btn-primary"><i class="icon-zoom-in"></i> Xem
                                                    chi tiết</a>
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
                                $sanphamlienquan = $trangchu->sanphamlienquan($idSP);
                                //while($rowduoi=mysql_fetch_array($sanphamlienquan))
                                foreach ($sanphamlienquan as $rowduoi) {

                                    ?>
                                    <li class="span3">
                                        <div class="thumbnail">
                                            <a href="index.php?p=chitiet&idSP=<?= $rowduoi['idSP'] ?>"><img
                                                        height="260px" width="260px"
                                                        src="images/<?= $rowduoi['hinh'] ?>" alt=""/></a>
                                            <div class="caption">
                                                <h5><?= $rowduoi['tenSP'] ?></h5>
                                                <!-- <p>
								<?= $rowduoi['tomtat'] ?>
							  </p> -->
                                                <h4 style="text-align:center;color: yellow"><a class="btn"
                                                                                               href="index.php?p=chitiet&idSP=<?= $rowduoi['idSP'] ?>">
                                                        <i class="icon-zoom-in"></i>Xem chi tiết</a>
                                                    <!-- <a class="btn" href="index.php?p=giohang&idSP=<?= $rowduoi['idSP'] ?>">Thêm<i class="icon-shopping-cart"></i></a> -->
                                                    <a class="btn btn-primary"
                                                       href="index.php?p=chitiet&idSP=<?= $rowduoi['idSP'] ?>">
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
                    <br class="clr">
                </div>
            </div>
        </div>

    </div>
</div>