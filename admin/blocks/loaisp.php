<?php
//require("../../thuvien/database.php");
require("../../thuvien/trangadmin.php");


$idTL=$_GET['idTL'];
$loaisp=$trangadmin->danhsachloaisanphamtheotheloai($idTL);

//while($row=mysql_fetch_array($loaisp))
foreach ($loaisp as $row)
{
	?>
	<option value="<?=$row['idloaiSP']?>"><?=$row['tenloaiSP']?></option>
	<?php
}



?>