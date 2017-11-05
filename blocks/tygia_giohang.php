<?php
	$tongsp=0;
	$tongtien=0;
	if(isset($_SESSION['giohang']) && !empty($_SESSION['giohang']))
	{
		
		foreach ($_SESSION['giohang'] as $value) {
			$tongsp+=$value['slsp'];
			$tongtien+=($value['gia']*$value['slsp'])-(khuyenmai($value['gia'],$value['khuyenmai'])*$value['slsp']);
		}
	}
?>

<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> <?php if(isset($_SESSION['ten'])){echo $_SESSION['ten'];} else {echo "Khách";}?></strong></div>
	<div class="span6">
	<div class="pull-right">
		<!-- <a href="product_summary.html"><span class="">Fr</span></a> -->
		<!-- <a href="product_summary.html"><span class="">Es</span></a> -->
		<!-- <span class="btn btn-mini">En</span> -->
		<!-- <a href="product_summary.html"><span>&pound;</span></a> -->
		<span class="btn btn-mini"><?=$tongtien?>đ</span>
		<a href="index.php?p=giohang"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?=$tongsp?> ] sản phẩm trong giỏ </span> </a> 
	</div>
	</div>
</div>	