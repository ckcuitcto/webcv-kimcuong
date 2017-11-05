<!-- <?php
$key=$_GET['key'];
$idTL=$_GET['idTL'];


$sotintrang=6;
if(isset($_GET['trang']))
{
	$trang=$_GET['trang'];
}
else
{
	$trang=1;
}
$from=($trang-1)*$sotintrang;
$ketquatren=$trangchu->timkiem($idTL,$key,$from,$sotintrang);
$ketquaduoi=$trangchu->timkiem($idTL,$key,$from,$sotintrang);

$tong=$trangchu->timkiem_tong($idTL,$key);
$sosp=count($tong);
?>

<div class="span9">	
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		 <li class="active"><?=$loaisp['tenloaiSP']?></li>
    </ul>
	<h3> Tìm thấy <?php echo $sosp; ?> kết quả</h3>	

	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sắp xếp theo </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		
		<hr class="soft"/>
		<?php
		//while($row=mysql_fetch_array($ketquatren))
		foreach ($ketquatren as $row) 
		{
		?>
		<div class="row">	  
			<div class="span2">
				<img src="images/<?=$row['hinh']?>" alt=""/>
			</div>
			<div class="span4">
				<h5><?=$row['tenSP']?> </h5>
				<p>
				<?=$row['noidung']?>
				</p>
				<a class="btn btn-small pull-right" href="product_details.html">Xem chi tiết</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
				<h3> <?=$row['gia']?>đ</h3>
				<label class="checkbox">
				<input type="checkbox">  Adds product to compair
				</label><br/>
				
				<a href="product_details.html" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
				<a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				
			</form>
			</div>
		</div>
		<hr class="soft"/>
		<?php
			}
		?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php
			foreach ($ketquatren as $rowduoi) 
			{
		?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.html"><img src="images/<?=$rowduoi['hinh']?>" alt=""/></a>
				<div class="caption">
				  <h5><?=$rowduoi['tenSP']?></h5>
				  <p> 
					<?=$rowduoi['noidung']?>
				  </p>	
				   <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?=$rowduoi['gia']?>đ</a></h4>
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

	<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
<?php


$tongsotrang=ceil($sosp/$sotintrang);

?>
	<div class="pagination">
			<ul>
			<li><a href="index.php?p=timkiem&idTL=<?=$idTL?>&key=<?=$key?>&trang=<?php echo $trang-1?>">&lsaquo;</a></li>
			<?php
			for($i=1;$i<=$tongsotrang;$i++)
				{ 
			?>
			<li><a href="index.php?p=timkiem&idTL=<?=$idTL?>&key=<?=$key?>&trang=<?=$i?>"><?=$i?></a></li>
			<?php 
				}
			?>
			<li><a href="index.php?p=timkiem&idTL=<?=$idTL?>&key=<?=$key?>&trang=<?php echo $trang+1?>">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div> -->