<?php
$email = "";
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}


?>


<?php

// if(isset($_POST['xacnhanemail']))
// {
// 	$emailxn=$_POST['emailxn'];
// 	$maxacnhan=md5($_POST['maxacnhan']);
// 	$kiemtra=kiemtramaxacnhan($email,$maxacnhan);
// 	echo mysql_num_rows($kiemtra);
// 	if(mysql_num_rows($kiemtra)>0)
// 	{
// 		echo " dung";
// 		header("location:index.php?p=doimatkhau");
// 	}
// 	else
// 	{
// 		echo "sai";
// 	}
// }
// else
// {
// 	echo " chua bam ";
// }

?>

<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active">Xác nhận email</li>
    </ul>
    <h3> Xác nhận mã</h3>
    <hr class="soft"/>

    <div class="row">
        <div class="span9" style="min-height:900px">
            <div class="well">
                <h5></h5><br/>
                Vui lòng nhập email của bạn và mã xác nhận đã được gửi vào email.<br/><br/><br/>
                <!-- <form action="pages/timmatkhau/sendmail_mk.php" method="POST"> -->
                <form action="index.php?p=doimatkhau" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail1">Địa chỉ email</label>
                        <div class="controls">
                            <input class="span3" name="emailxn" value="<?= $email ?>" type="text" id="inputEmail1"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mã xác nhận</label>
                        <div class="controls">
                            <input class="span3" name="maxacnhan" type="number" placeholder="Mã xác nhận">
                        </div>
                    </div>
                    <button type="submit" name="xacnhanemail" class="btn block">Gửi</button>
                </form>
            </div>
        </div>
    </div>

</div>