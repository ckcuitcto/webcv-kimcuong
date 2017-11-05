<?php

include('kb_database.php');

/**
 *
 */
class trangchu extends database
{

    function dsTheloai()
    {
        $sql = "SELECT * FROM theloai";
        $this->setQuery($sql);
        return $this->loadAllRows();
        //return mysql_query($sql);
    }

    function loaisptheotheloai($idTL)
    {
        $sql = "SELECT * FROM loaisanpham where idTL=$idTL ";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idTL));
    }

    function soluongsanphamtheotheloai($idTL)
    {
        $sql = "SELECT COUNT( * ) AS soluong FROM theloai tl JOIN sanpham sp ON tl.idTL = sp.idTL WHERE tl.idTL =$idTL";
        $this->setQuery($sql);
        $soluong = $this->loadRow(array($idTL));
        //$soluong=mysql_query($sql);

        return $soluong['soluong'];
    }

    function soluongsanphamtheoloaisanpham($idloaiSP)
    {
        $sql = "SELECT COUNT( * ) AS soluong FROM loaisanpham lsp JOIN sanpham sp ON lsp.idloaiSP = sp.idloaiSP WHERE lsp.idloaiSP =$idloaiSP";
        $this->setQuery($sql);
        $soluong = $this->loadAllRows(array($idloaiSP));
        return $soluong['0']['soluong'];
    }

    function haisanphamxemnhieunhat()
    {
        $sql = "SELECT * from sanpham ORDER BY solanxem DESC limit 0,2";

        $this->setQuery($sql);

        return $this->loadAllRows();

        //return mysql_query($sql);
    }


    function sausanphammoinhat()
    {
        $sql = "SELECT * from sanpham ORDER BY idSP DESC limit 0,6";

        $this->setQuery($sql);
        return $this->loadAllRows();
        //return mysql_query($sql);
    }

    function bonsanphamnoibattheotheloai($idTL)
    {
        $sql = "SELECT * from sanpham where idTL='$idTL' ORDER BY solanxem DESC limit 0,4";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idTL));
    }

    function loaisanphamtheoid($idloaiSP)
    {
        $sql = "SELECT * from loaisanpham where idloaiSP=$idloaiSP";

        $this->setQuery($sql);

        return $this->loadRow(array($idloaiSP));

        //return mysql_query($sql);
    }

    function sptheoloaisp($idloaiSP)
    {
        $sql = "SELECT * from sanpham where idloaiSP=$idloaiSP";

        $this->setQuery($sql);

        return $this->loadAllRows(array($idloaiSP));

        //return mysql_query($sql);
    }

    function sanphamtheoloaisanpham($idloaiSP, $from, $sotintrang)
    {
        $sql = "SELECT * from sanpham where idloaiSP=$idloaiSP
		ORDER BY idSP DESC LIMIT $from,$sotintrang";

        $this->setQuery($sql);

        return $this->loadAllRows(array($idloaiSP, $from, $sotintrang));

        //return mysql_query($sql);
    }

    function timkiem($idTL, $key, $from, $sotintrang)
    {
        if ($idTL == 0) {
            $sql = "SELECT * FROM sanpham where tenSP like '%$key%' ORDER BY idSP DESC LIMIT $from,$sotintrang";
            $this->setQuery($sql);
            return $this->loadAllRows(array($key, $from, $sotintrang));
        } else {
            $sql = "SELECT * FROM sanpham where idTL=$idTL and tenSP like '%$key%' ORDER BY idSP DESC LIMIT $from,$sotintrang";
            $this->setQuery($sql);
            return $this->loadAllRows(array($idTL, $key, $from, $sotintrang));
        }
    }

    function timkiem_tong($idTL, $key)
    {
        if ($idTL == 0) {
            $sql = "SELECT * FROM sanpham where tenSP like '%$key%' ";
            $this->setQuery($sql);
            return $this->loadAllRows(array($key));
        } else {
            $sql = "SELECT * FROM sanpham where idTL=$idTL and tenSP like '%$key%'";
            $this->setQuery($sql);
            return $this->loadAllRows(array($idTL, $key));
        }
    }

    function khuyenmaicaonhat()
    {
        $sql = "SELECT max(khuyenmai)as max from SANPHAM";

        $this->setQuery($sql);

        $khuyenmai = $this->loadRow();

        return $khuyenmai['max'];

    }

    function sanphamkhuyenmai($from, $sotintrang)
    {
        $sql = "SELECT * FROM sanpham where khuyenmai <>0 ORDER BY khuyenmai DESC limit $from,$sotintrang ";

        $this->setQuery($sql);

        return $this->loadAllRows(array($from, $sotintrang));

        //return mysql_query($sql);
    }

    function spkhuyenmai()
    {
        $sql = "SELECT * FROM sanpham where khuyenmai <>0 ORDER BY khuyenmai DESC ";

        $this->setQuery($sql);

        return $this->loadAllRows();

        //return mysql_query($sql);
    }


    function dangki($ten, $ho, $email, $matkhau, $ngaysinh, $sdt, $diachi, $gioitinh, $ngay)
    {
        //$sql="INSERT INTO users(ten,ho,email,matkhau,ngaysinh,sdt,diachi,gioitinh,ngaytao) values('$ten','$ho','$email','$matkhau','$ngaysinh','$sdt','$diachi','$gioitinh','$ngay')";
        $sql = "INSERT INTO users(ten,ho,email,matkhau,ngaysinh,sdt,diachi,gioitinh,ngaytao) values(?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);

        return $this->execute(array($ten, $ho, $email, $matkhau, $ngaysinh, $sdt, $diachi, $gioitinh, $ngay));

//		if($result == TRUE)
//		{
//			return 1;
//		}else
//		{
//			return 0;
//		}
    }

    function capnhatuser($idUser, $ten, $ho, $ngaysinh, $sdt, $diachi, $gioitinh)
    {
        //$sql="UPDATE users set ten='$ten',ho='$ho',ngaysinh='$ngaysinh',sdt='$sdt',diachi='$diachi',gioitinh='$gioitinh' where idUser='$idUser'";
        $sql = "UPDATE users set ten=? ,ho=? ,ngaysinh=? ,sdt=?,diachi=? ,gioitinh=?  where idUser=?";
        $this->setQuery($sql);

        $result = $this->execute(array($ten, $ho, $ngaysinh, $sdt, $diachi, $gioitinh, $idUser));

        if ($result == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function kiemtrauser($email, $password)
    {
        $sql = "SELECT * FROM users where email='$email' and matkhau='$password'";
        $this->setQuery($sql);
        return $this->loadRow(array($email, $password));
        //return mysql_query($sql);
    }


    function sanphamtheoidSP($idSP)
    {
        $sql = "SELECT * FROM sanpham where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->loadRow(array($idSP));
    }

    function chitietsanpham($idSP)
    {
        $sql = "SELECT * FROM chitiet where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->loadRow(array($idSP));
    }

    function checkemail($email)
    {
        $sql = "SELECT * FROM users where email='$email'";

        $this->setQuery($sql);

        return $this->loadRow(array($email));

        //return mysql_query($sql);
    }

    function sanphamtheotheloai($idTL)
    {
        $sql = "SELECT * FROM sanpham where idTL=$idTL";
        $this->setQuery($sql);

        return $this->loadAllRows(array($idTL));

        // return mysql_query($sql);
    }

    function sanphamtheotheloai_phantrang($idTL, $from, $sotintrang)
    {
        $sql = "SELECT * FROM sanpham where idTL=$idTL ORDER BY idSP DESC limit $from,$sotintrang";

        $this->setQuery($sql);

        return $this->loadAllRows(array($idTL, $from, $sotintrang));

        // return mysql_query($sql);
    }

    function sanphamlienquan($idSP)
    {
        $sql = "SELECT * FROM sanpham where idTL=(select idTL from sanpham where idSP=$idSP) ORDER BY idSP limit 0,6";

        $this->setQuery($sql);

        return $this->loadAllRows(array($idSP));

        // return mysql_query($sql);
    }

    function doimatkhau($email, $password)
    {
        $sql = "UPDATE users set matkhau=? where email=?";

        $this->setQuery($sql);

        return $this->execute(array($password, $email));

        // return mysql_query($sql);
    }

    function doimaxacnhan($email, $maxacnhan)
    {
        $sql = "UPDATE users set maxacnhan=? where email=? ";

        $this->setQuery($sql);

        return $this->execute(array($maxacnhan, $email));
    }

    function kiemtramaxacnhan($email, $maxacnhan)
    {
        $sql = "SELECT * FROM users where email='$email' AND maxacnhan='$maxacnhan'";

        $this->setQuery($sql);

        return $this->loadRow(array($email, $maxacnhan));
    }

    function hinhchitiet($idSP)
    {
        $sql = "SELECT * FROM hinh where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idSP));
    }

    function guilienhe($ten, $sdt, $email, $chude, $noidung)
    {
        $sql = "INSERT INTO lienhe(ten,sdt,email,chude,noidung) values(?,?,?,?,?)";

        $this->setQuery($sql);

        $result = $this->execute(array($ten, $sdt, $email, $chude, $noidung));

        if ($result == TRUE) {
            return 1;
        } else {
            return 0;
        }

        // $check="SELECT * FROM lienhe where ten='$ten' AND sdt='$sdt' AND email='$email' AND chude='$chude' AND noidung='$noidung'";
        // $rt=mysql_query($check);
        // $lh=mysql_fetch_array($rt);
        // if($lh['ten']==$ten && $lh['sdt']==$sdt && $lh['email']==$email && $lh['chude']==$chude && $lh['noidung']==$noidung)
        // {
        // 	return 1;
        // }
        // else
        // {
        // 	return 0;
        // }
    }

    function dathang($idUser, $tennguoinhan, $noinhan, $sdt, $ghichu, $sotien)
    {
        //$sql="INSERT INTO dathang(idUser,tennguoinhan,noinhan,sotien,sdt,ghichu) values('$idUser','$tennguoinhan','$noinhan','$sotien','$sdt','$ghichu')";
        $sql = "INSERT INTO dathang(idUser,tennguoinhan,noinhan,sotien,sdt,ghichu) values(?,?,?,?,?,?)";
        $this->setQuery($sql);

        $result = $this->execute(array($idUser, $tennguoinhan, $noinhan, $sotien, $sdt, $ghichu));

        if ($result == TRUE) {
            return 1;
        } else {
            return 0;
        }


        // $check="SELECT * FROM dathang ORDER BY idDH DESC limit 0,1";
        // $rt=mysql_query($check);
        // $lh=mysql_fetch_array($rt);
        // if($lh['idUser']==$idUser && $lh['tennguoinhan']==$tennguoinhan && $lh['noinhan']==$noinhan && $lh['sdt']==$sdt && $lh=['sotien']==$sotien && $lh['ghichu']==$ghichu)
        // {
        // 	return 1;
        // }
        // else
        // {
        // 	return 0;
        // }
    }

    function sanphamdathang($idDH, $idSP, $soluong, $tensp, $tonggia)
    {
        // $sql="INSERT INTO sanphamdathang(idDH,idSP,soluong,tensp,tonggia) values('$idDH','$idSP','$soluong','$tensp','$tonggia')";
        $sql = "INSERT INTO sanphamdathang(idDH,idSP,soluong,tensp,tonggia) values(?,?,?,?,?)";

        $this->setQuery($sql);

        $result = $this->execute(array($idDH, $idSP, $soluong, $tensp, $tonggia));

        if ($result == TRUE) {
            $themtien = "UPDATE dathang set sotien=sotien+? where idDH=? ";
            $this->setQuery($themtien);
            $this->execute(array($tonggia, $idDH));
            //mysql_query($themtien);

            $soluongban = "UPDATE sanpham sp set sp.soluong=sp.soluong-?,sp.daban=sp.daban+? where idSP=? ";
            $this->setQuery($soluongban);
            $this->execute(array($soluong, $soluong, $idSP));

            // mysql_query($soluongban);
            return 1;
        } else {
            return 0;
        }
    }

    function idDHcuoicung()
    {
        $sql = "SELECT * FROM dathang ORDER BY idDH DESC limit 0,1";
        $this->setQuery($sql);
        $rs = $this->loadRow();

        // $rt=mysql_query($sql);
        // $rs=mysql_fetch_array($rt);
        return $rs['idDH'];
    }

    function getUserbyIdUser($idUser)
    {
        $sql = "SELECT * FROM users where idUser='$idUser'";
        $this->setQuery($sql);
        return $this->loadRow(array($idUser));
    }

    function dathangtheoIdUser($idUser)
    {
        $sql = "SELECT * FROM dathang where idUser='$idUser'";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idUser));
        //return mysql_query($sql);
    }

    function sanphamdathangtheoIdDH($idDH)
    {
        $sql = "SELECT * FROM sanphamdathang where idDH='$idDH'";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idDH));
        //return mysql_query($sql);
    }

    function tinhsoluongdaban($idSP, $soluongban)
    {
        // $sql="UPDATE sanpham set soluong=soluong-'$soluongban' AND daban=daban+'$soluongban' where idSP='$idSP' ";
        $sql = "UPDATE sanpham set soluong=soluong-? AND daban=daban+? where idSP=? ";
        $this->setQuery($sql);

        $result = $this->execute(array($soluongban, $soluongban, $idSP));

        if ($result == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    function soluotxem($idSP)
    {
        $sql = "UPDATE sanpham SET solanxem=solanxem+1 where idSP=?";
        $this->setQuery($sql);

        return $this->execute(array($idSP));

        //return mysql_query($sql);
    }

    function xoamaxacnhan($email)
    {
        $sql = " UPDATE users set maxacnhan=NULL where email= ?  ";

        $this->setQuery($sql);

        return $this->execute(array($email));

        //return mysql_query($sql);
    }

}

?>