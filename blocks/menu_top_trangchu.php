<?php 
$dsTheloai=  $trangchu->dsTheloai();
// foreach ($dsTheloai as $row ) {
// 	//var_dump($row);
// 	echo $row['idTL'];
// }
//var_dump($dsTheloai);die;
?>


<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
	<div class="navbar-inner">
	    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
			<form class="form-inline navbar-search" method="get" action="" >
			<input id="srchFld" name="key" class="srchTxt" type="text" />	
			  <select class="srchTxt" name="idTL">
				<option value="0">Tất cả</option>
				<?php 
				//while($row=mysql_fetch_array($dsTheloai))
				foreach ($dsTheloai as $row ) {
				
				?>

					<option value="<?=$row['idTL']?>"><?=$row['tenTL']?> </option>

				<?php 
				} 
				?>
			</select> 
			  <button type="submit" id="submitButton" class="btn btn-primary">Tìm</button>
			  <input type="hidden" name="p" value="timkiem">
	    </form>	
	    <ul id="topMenu" class="nav pull-right">
		 <li class=""><a href="index.php?p=khuyenmai">Khuyến mãi</a></li>
		<!--  <li class=""><a href="normal.html">Delivery</a></li> -->
		 <li class=""><a href="index.php?p=lienhe">Liên hệ</a></li>

		
		 	<?php 
		 	if(isset($_SESSION['ten']))
		 	{ 
		 		?>
		 		 <li class="">
		 		<li class=""><a href="index.php?p=canhan">Trang cá nhân</a></li>
		 		<li class="" style=" margin-top: 20px">
		 		<li>
						<form action="" method="post">
						<input style="margin-top:15px; margin-left:5px;"  name="thoat" type="submit" class="btn btn-large btn-success" value="Thoát" >
						</form>
						</li>
				</li>		
		 		<?php
		 	}
		 	else
		 	{  ?>
		  		<li class=""><a href="index.php?p=dangki">Đăng kí </a></li>
		  		<li class="">
		 		<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
				<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>Đăng nhập</h3>
					  </div>
					  <div class="modal-body">
						<form class="form-horizontal loginFrm" method="POST" action="">
						  <div class="control-group">								
							<input type="text"  name="emaildn" placeholder="Email">
						  </div>
						  <div class="control-group">
							<input type="password" name="matkhaudn" placeholder="Mật khẩu">
						  </div>
						  <div class="control-group">
							<a href="index.php?p=quenmatkhau">Quên mật khẩu?</a> 
							</label>
						  </div>
						<button type="submit" name="dangnhap" class="btn btn-success">Đăng nhập</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
						</form>		
						
					  </div>
				</div>
				</li>
 				 <!-- <a href="index.php?p=dangnhap" role="button" ><span class="btn btn-small btn-success">Đăng nhập</span></a>
 				 </li> -->
 			<?php
		 	}	
		 	?>

	    </ul>
	  </div>
</div>