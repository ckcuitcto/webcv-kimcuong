<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
		<li class="text-center">
            <img src="assets/img/find_user.png" class="user-image img-responsive"/>
            <div style="color: red"> <?php echo "Xin chào ".$_SESSION['ten'];?></div>
           
			</li>
			
            <li>
                <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i>Trang quản lí</a>
            </li>
             <!-- <li>
                <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
            </li>   
				   <li  >
                <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
            </li>	
              <li  >
                <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
            </li>
            <li  >
                <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
            </li>	 -->
            <li  >
                <a  href="index.php?p=lienhe"><i class="fa fa-table fa-3x"></i>Liên hệ <span class="glyphicon glyphicon-envelope"></span></a>
            </li>
            <li  >
                <a  href="index.php?p=dathang"><i class="fa fa-table fa-3x"></i> Đơn hàng</a>
            </li>	
            <li>
                <a href=""><i class="fa fa-sitemap fa-3x"></i>Người dùng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?p=listUser">Danh sách người dùng</a>
                    </li>
                </ul>
            </li>		             
            <li>
                <a href=""><i class="fa fa-sitemap fa-3x"></i>Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?p=listSP">Danh sách sản phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?p=themsp">Thêm sản phẩm</a>
                    </li>
                </ul>
            </li> 
            <li>
                <a href=""><i class="fa fa-sitemap fa-3x"></i>Thể loại<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?p=listtl">Danh sách thể loại</a>
                    </li>
                    <li>
                        <a href="index.php?p=themtl">Thêm thể loại</a>
                    </li>
                </ul>
            </li> 
            <li>
                <a href=""><i class="fa fa-sitemap fa-3x"></i>Loại sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?p=listlsp">Danh sách loại sản phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?p=themlsp">Thêm loại sản phẩm</a>
                    </li>
                </ul>
            </li>  
         <!--  <li  >
                <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
            </li>	 -->
        </ul>
    </div>   
</nav> 