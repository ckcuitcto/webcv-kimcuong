<?php
$dsTheloai=$trangchu->dsTheloai();


?>

<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h4>Liên kết</h4>
				<a href="http://laptopstu.tk/"><h5>LAPTOPSTU</h5></a>
				<a href="http://pnj.com.vn/"><h5>PNJ </h5></a>
				<a href="https://btmc.vn/"><h5>BẢO TÍN MINH CHÂU</h5></a> 
				<a href="http://www.sjc.com.vn/"><h5>SJC</h5></a>  
			
			 </div>
			<div class="span3">
				<h4>Thông tin</h4>
				<a href="index.php?p=lienhe"><h5>Liên hệ</h5></a>  
				<a href="index.php?p=dangki"><h5>Đăng kí</h5></a>  
				<a href="index.php?p=dieukhoan"><h5>Chính sách</h5></a>  
				<a href="index.php?p=dieukhoan"><h5>Điều khoản và điều kiện</h5></a> 
				<a href="index.php?p=faq"><h5>FAQ</h5></a>
			 </div>
			<div class="span3">
				<h4>Sản phẩm</h4>
				<?php 
					foreach ($dsTheloai as $row)
					{
				?>
				<a href="index.php?p=theloaisanpham&idTL=<?=$row['idTL']?>"><h5><?=$row['tenTL']?></h5></a> 
				<?php } ?>
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h4>SOCIAL MEDIA </h4>
				<a href="https://www.facebook.com/"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="https://twitter.com"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="https://www.youtube.com"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		
	</div><!-- Container End -->
	</div>