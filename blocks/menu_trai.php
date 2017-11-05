<?php
$dsTheloai=$trangchu->dsTheloai();
$haisanphamxemnhieunhat=$trangchu->haisanphamxemnhieunhat();
?>
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

<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="index.php?p=giohang"><img src="themes/images/ico-cart.png" alt="cart"><?=$tongsp?> SP trong giỏ<span class="badge badge-warning pull-right"><?=$tongtien?>đ </span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<?php
			//while($row_tl=mysql_fetch_array($dsTheloai))
			foreach ($dsTheloai as $row_tl) 
			{
				$soluongtheotheloai=$trangchu->soluongsanphamtheotheloai($row_tl['idTL']);
			?>
			<li class="subMenu"><a> <?=$row_tl['tenTL']?> (<?=$soluongtheotheloai?>) </a>
				<ul style="display:none">
				<?php 
				$loaisanpham=$trangchu->loaisptheotheloai($row_tl['idTL']);
				foreach ($loaisanpham as $row_lsp ) 
				{
					$soluongtheoloaisp=$trangchu->soluongsanphamtheoloaisanpham($row_lsp['idloaiSP']);
				?>
				<li><a class="active" href="index.php?p=loaisanpham&idloaiSP=<?=$row_lsp['idloaiSP']?>"><i class="icon-chevron-right"></i><?=$row_lsp['tenloaiSP']?> (<?=$soluongtheoloaisp?>) </a></li>
				<?php
				}
				?>
				</ul>
			</li>
		<?php } ?>
		</ul>
		<br/>
		<?php 
			//while($row=mysql_fetch_array($haisanphamxemnhieunhat))
			foreach ($haisanphamxemnhieunhat as $row) 
			{

		?>
		  <div class="thumbnail">
			<a href="index.php?p=chitiet&idSP=<?=$row['idSP']?>"><img src="images/<?=$row['hinh']?>" alt="Bootshop panasonoc New camera"/></a>
			<div class="caption">
			  <h5><?=$row['tenSP']?></h5>	
				<h4 style="text-align:center"><a class="btn" href="index.php?p=chitiet&idSP=<?=$row['idSP']?>"> <i class="icon-zoom-in"></i> Xem chi tiết</a> <!-- <a class="btn" href="index.php?p=giohang&idSP=<?=$row['idSP']?>">Thêm vào <i class="icon-shopping-cart"></i></a> --> <a class="btn btn-primary" href="index.php?p=chitiet&idSP=<?=$row['idSP']?>"><?=$row['gia']?></a></h4>
			</div>
		  </div>
		  <?php } ?>
		  <br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Phương thức thanh toán</h5>
				</div>
				<!-- <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="2F83VYBYFX87L">
					<table>
					<tr><td><input type="hidden" name="on0" value="Lo&#7841;i">Lo&#7841;i</td></tr><tr><td><select name="os0">
						<option value="Kim c&#432;&#417;ng">Kim c&#432;&#417;ng $50.00 USD</option>
						<option value="Vàng">Vàng $40.00 USD</option>
						<option value="B&#7841;c">B&#7841;c $30.00 USD</option>
					</select> </td></tr>
					</table>
					<input type="hidden" name="currency_code" value="USD">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="KKS6F64P7J7H2">
						<table>
						<tr><td><input type="hidden" name="on0" value="Lo&#7841;i">Lo&#7841;i</td></tr><tr><td><select name="os0">
							<option value="Kim c&#432;&#417;ng">Kim c&#432;&#417;ng $50.00 USD</option>
							<option value="Vàng">Vàng $40.00 USD</option>
							<option value="B&#7841;c">B&#7841;c $30.00 USD</option>
						</select> </td></tr>
						</table>
						<input type="hidden" name="currency_code" value="USD">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form> -->

				
			  </div>
	</div>