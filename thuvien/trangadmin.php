<?php

include('kb_database.php');

/**
 *
 */
class trangadmin extends database
{

    function tinhgiakhuyenmai($gia, $km)
    {
        $giakm = $gia - ($gia * $km) / 100;
        return $giakm;
    }

    function khuyenmai($gia, $km)
    {
        return ($gia * $km) / 100;
    }

    function dangxuat()
    {
        session_destroy();
        header("location:index.php");
    }

    function stripUnicode($str)
    {
        if (!$str) return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }

    function changeTitle($str)
    {
        $str = trim($str);
        if ($str == "") return "";
        $str = str_replace('"', '', $str);
        $str = str_replace("'", '', $str);
        $str = stripUnicode($str);
        $str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');

        // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
        $str = str_replace(' ', '-', $str);
        $str = str_replace('/', '-', $str);
        return $str;
    }
    function danhsachsanpham()
    {
        $sql = "SELECT * FROM sanpham ORDER BY idSP DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
        //return mysql_query($sql);
    }

    function danhsachtheloai()
    {
        $sql = "SELECT * FROM theloai";
        $this->setQuery($sql);
        return $this->loadAllRows();
        //return mysql_query($sql);
    }

    function danhsachloaisanpham()
    {
        $sql = "SELECT * FROM loaisanpham";
        $this->setQuery($sql);
        return $this->loadAllRows();
        //return mysql_query($sql);
    }

    function danhsachuser()
    {
        $sql = "SELECT * FROM users";
        $this->setQuery($sql);
        return $this->loadAllRows();
        //return mysql_query($sql);
    }

    function danhsachloaisanphamtheotheloai($idTL)
    {
        $sql = "SELECT * FROM loaisanpham where idTL=$idTL";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idTL));
        //return mysql_query($sql);
    }

    function theloaitheoid($idTL)
    {
        $sql = "SELECT * FROM theloai where idTL=$idTL";
        $this->setQuery($sql);
        $result = $this->loadAllRows(array($idTL));

        return $result['tenTL'];
//		$row=mysql_fetch_array(mysql_query($sql));
//		return $row['tenTL'];
    }

    function loaisanphamtheoid($idloaiSP)
    {
        $sql = "SELECT * FROM loaisanpham where idloaiSP=$idloaiSP";
        $this->setQuery($sql);
        $result = $this->loadAllRows(array($idloaiSP));
        return $result['tenloaiSP'];

//		$row=mysql_fetch_array(mysql_query($sql));
//		return $row['tenloaiSP'];
    }

    function hinhchitiet($idSP)
    {
        $sql = "SELECT * FROM hinh where idSP='$idSP'";

        $this->setQuery($sql);
        return $this->loadAllRows(array($idSP));

        //return mysql_query($sql);
    }

    function xoasp($idSP)
    {
        $sql = "DELETE FROM sanpham where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->execute(array($idSP));
    }

    function themsp($idTL, $idloaiSP, $tenSP, $gia, $noidung, $khuyenmai, $soluong, $tomtat, $tenhinh, $anhien, $ngay)
    {
        $tenkhongdau = changeTitle($tenSP);
        $sql = "INSERT INTO sanpham(idTL,idloaiSP,tenSP,gia,noidung,khuyenmai,soluong,tomtat,hinh,anhien,tenSP_khongdau,ngay)
		VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($idTL, $idloaiSP, $tenSP, $gia, $noidung, $khuyenmai, $soluong, $tomtat, $tenhinh, $anhien, $tenkhongdau, $ngay));
    }

    function themchitiet($trongluong, $chungloai, $tuoi, $mauchatlieu, $gioitinh, $mota)
    {
//        $qr = "SELECT * FROM SANPHAM ORDER BY idSP DESC LIMIT 0,1";
//
//        $this->setQuery($qr);
//        $result = $this->loadRow();
        //$idSP = $result['idSP'];
        $idSP = $this->getLastId();
        $sql = "INSERT INTO chitiet(idSP,trongluong,chungloai,tuoi,mauchatlieu,gioitinh,mota) values(?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($idSP, $trongluong, $chungloai, $tuoi, $mauchatlieu, $gioitinh, $mota));
        //return mysql_query($sql);
    }

    function sanphamvachitiettheoidSP($idSP)
    {
        $sql = "SELECT * FROM sanpham join chitiet on sanpham.idSP=chitiet.idSP where sanpham.idSP='$idSP'";
        $this->setQuery($sql);
        return $this->loadRow(array($idSP));
//        return mysql_query($sql);
    }

    function suasp($idSP, $idTL, $idloaiSP, $tenSP, $gia, $noidung, $khuyenmai, $soluong, $tomtat, $hinh, $anhien)
    {
        $sql = "UPDATE sanpham set idTL='$idTL',idloaiSP='$idloaiSP',tenSP='$tenSP',gia='$gia',noidung='$noidung',khuyenmai='$khuyenmai',soluong='$soluong',tomtat='$tomtat',hinh='$hinh',anhien='$anhien' where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->execute(array($idSP, $idTL, $idloaiSP, $tenSP, $gia, $noidung, $khuyenmai, $soluong, $tomtat, $hinh, $anhien));
    }

    function loaisanphamtheotheloai($idTL)
    {
        $sql = "SELECT * FROM loaisanpham where idTL='$idTL'";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idTL));
//        return mysql_query($sql);
    }

    function suachitiet($idSP, $trongluong, $chungloai, $tuoi, $mauchatlieu, $gioitinh, $mota)
    {
        $sql = "UPDATE chitiet set trongluong='$trongluong',chungloai='$chungloai',tuoi='$tuoi',mauchatlieu='$mauchatlieu',gioitinh='$gioitinh',mota='$mota'
		where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->execute(array($trongluong, $chungloai, $tuoi, $mauchatlieu, $gioitinh, $mota, $idSP));
        //return mysql_query($sql);
    }

    function ChiTietTheLoai($idTL)
    {
        $sql = "SELECT * FROM theloai where idTL=$idTL";
        $this->setQuery($sql);
        return $this->loadRow(array($idTL));
//        return mysql_query($sql);
    }


    function themtheloai($tenTL, $thutu, $anhien, $tomtat)
    {
        $qr = "INSERT INTO theloai VALUES('NULL','$tenTL','$thutu','$anhien','$tomtat')";
        $this->setQuery($qr);
        return $this->execute(array($tenTL,$thutu,$anhien,$tomtat));
        //return mysql_query($qr);
    }

    function xoatl($idTL)
    {
        $sql = "DELETE FROM theloai where idTL='$idTL'";
        $this->setQuery($sql);
        return $this->execute(array($idTL));
//        return mysql_query($sql);
    }

    function suatl($idTL, $tenTL, $thutu, $anhien, $tomtat)
    {
        $sql = "UPDATE theloai set tenTL = '$tenTL',thutu = '$thutu',anhien='$anhien',tomtat ='$tomtat' where idTL = '$idTL'";
        $this->setQuery($sql);
        return $this->execute(array( $tenTL, $thutu, $anhien, $tomtat, $idTL));
        //return mysql_query($sql);
    }


    function dathang($xacnhan)
    {
        if ($xacnhan == 0 or $xacnhan == 1) {
            $sql = "SELECT * FROM dathang WHERE xacnhan='$xacnhan' ORDER BY idDH DESC";
        } else {
            $sql = "SELECT * FROM dathang ORDER BY idDH DESC";
        }
        $this->setQuery($sql);
        return $this->loadAllRows(array($xacnhan));
//        return mysql_query($sql);
    }

    function sanphamdathangtheoIdDH($idDH)
    {
        $sql = "SELECT sanphamdathang.*,sanpham.gia,sanpham.soluong as slspDB FROM sanphamdathang join sanpham on sanphamdathang.idSP=sanpham.idSP where idDH='$idDH'";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idDH));
//        return mysql_query($sql);
    }

    function xoaspdonhang($idDH, $idSP)
    {
        $qr = "UPDATE dathang SET sotien=sotien-(select tonggia from sanphamdathang where idDH='$idDH' AND idSP='$idSP') where idDH='$idDH'";
        $this->setQuery($qr);
        $result = $this->execute(array($idDH,$idSP,$idDH));
        if ($result == TRUE) {
            $sql = "DELETE FROM sanphamdathang where idDH='$idDH' AND idSP='$idSP'";
            $this->setQuery($sql);
            return $this->execute(array($idDH,$idSP));
        }
    }

    //CREATE TRIGGER `giamtiendonhang` BEFORE DELETE ON `sanphamdathang` FOR EACH ROW UPDATE dathang SET dathang.sotien=dathang.sotien-(SELECT tonggia FROM deleted) WHERE idSP=(SELECT idSP FROM deleted)

    function dathangtheoid($idDH)
    {
        $sql = "SELECT * FROM dathang where idDH='$idDH'";
        $this->setQuery($sql);
        return $this->loadRow(array($idDH));
//        return mysql_query($sql);
    }

    function suaspdonhang($idDH, $idSP, $soluong)//capnhatsoluongchitiet
    {
        $qr = "UPDATE dathang SET sotien=sotien-(select tonggia from sanphamdathang where idDH='$idDH' AND idSP='$idSP') where idDH='$idDH'";
        $this->setQuery($qr);
        $result = $this->execute(array($idDH,$idSP,$idDH));
        if ($result == TRUE) {
            $sql = "DELETE FROM sanphamdathang where idDH='$idDH' AND idSP='$idSP'";
            $this->setQuery($sql);
            return $this->execute(array($idDH,$idSP));
//            return mysql_query($sql);
        }
//        if (mysql_query($qr) == TRUE) {
//            $sql = "DELETE FROM sanphamdathang where idDH='$idDH' AND idSP='$idSP'";
//            return mysql_query($sql);
//        }
    }

    function capnhatsoluongchitiet($idSP, $soluong, $idDH)
    {
        $sql = "UPDATE sanphamdathang set soluong='$soluong' WHERE idSP='$idSP' AND idDH='$idDH'";
        $this->setQuery($sql);
        $result = $this->execute(array($idSP,$soluong,$idDH));
        if ($result == TRUE) {
            $qr = "UPDATE sanphamdathang set tonggia=soluong*(select gia from sanpham where idSP='$idSP') where idSP='$idSP' AND idDH='$idDH' ";
            $this->setQuery($qr);
            $result2 = $this->execute(array($idSP,$idSP,$idDH));
            if ($result2 == TRUE) {
                $zz = "UPDATE dathang set sotien=(SELECT sum(tonggia) from sanphamdathang where idDH='$idDH' GROUP BY idDH) where idDH='$idDH'";
                $this->setQuery($zz);
                return $this->execute(array($idDH,$idDH));
//                mysql_query($zz);
            }

        }
    }


    function xoaloaisp($idloaiSP)
    {
        $sql = "DELETE from loaisanpham where idloaiSP='$idloaiSP'";
        $this->setQuery($sql);
        return $this->execute(array($idloaiSP));
//        return mysql_query($sql);
    }

    function themloaisp($tenloaiSP, $tenloai_khongdau, $thutu, $anhien, $idTL, $tomtat)
    {
        $qr = "INSERT INTO loaisanpham values('NULL','$tenloaiSP','$tenloai_khongdau','$thutu','$anhien','$idTL','$tomtat')";
        $this->setQuery($qr);
        return $this->execute(array($tenloaiSP, $tenloai_khongdau, $thutu, $anhien, $idTL, $tomtat));
//        return mysql_query($qr);
    }

    function loaisptheoid($idloaiSP)
    {
        $sql = "SELECT * FROM loaisanpham where idloaiSP='$idloaiSP'";
        $this->setQuery($sql);
        return $this->loadRow(array($idloaiSP));
        //return mysql_query($sql);
    }

    function sualoaisanpham($idloaiSP, $tenloaiSP, $ten_khongdau, $thutu, $anhien, $idTL, $tomtat)
    {
        $qr = "UPDATE loaisanpham set
			tenloaiSP = '$tenloaiSP',
			aliasLSP = '$ten_khongdau',
			thutu ='$thutu',
			anhien='$anhien',
			idTL ='$idTL',
			tomtat='$tomtat'
			where idloaiSP = '$idloaiSP'";
        $this->setQuery($qr);
        return $this->execute(array($tenloaiSP,$ten_khongdau,$thutu,$anhien,$idTL,$tomtat,$idloaiSP));
    }

    function xacnhandonhang($idDH)
    {
        $sql = "UPDATE dathang set xacnhan='1' where idDH='$idDH'";
        $this->setQuery($sql);
        $this->execute(array($idDH));
//        mysql_query($sql);
    }

    function soluongsanpham($idSP)
    {
        $sql = "SELECT soluong from sanpham where idSP='$idSP'";
        $this->setQuery($sql);
        $result = $this->loadRow(array($idSP));
        return $result['soluong'];
//        $row = mysql_fetch_array(mysql_query($sql));
//        return $row['soluong'];
    }

    function soluongsanphamdathang($idDH, $idSP)
    {
        $sql = "SELECT * FROM sanphamdathang where idDH='$idDH' AND idSP='$idSP'";
        $this->setQuery($sql);
        $result = $this->loadRow(array($idDH,$idSP));
//        $row = mysql_fetch_array(mysql_query($sql));
        return $result['soluong'];
    }

    function capnhatsoluongsanpham($idSP, $soluongcu, $soluongmoi)
    {
        $sl = 0;
        if ($soluongmoi > $soluongcu) {
            $sl = $soluongmoi - $soluongcu;
            $sql = "UPDATE sanpham set soluong=soluong-'$sl' where idSP='$idSP'";
//            return mysql_query($sql);
        } else {
            $sl = $soluongcu - $soluongmoi;
            $sql = "UPDATE sanpham set soluong=soluong+'$sl' where idSP='$idSP'";
//            return mysql_query($sql);
        }
        $this->setQuery($sql);
        return $this->execute(array($sl, $idSP));
    }

    function xoauser($idUser)
    {
        $sql = "DELETE FROM Users where idUser='$idUser'";
        $this->setQuery($sql);
        return $this->execute(array($idUser));
//        return mysql_query($sql);
    }


    function capnhatuser($idUser, $ngaysua, $cap)
    {
        $sql = "UPDATE users set cap='$cap', ngaysua='$ngaysua' where idUser='$idUser'";
        $this->setQuery($sql);
        return $this->execute(array($cap,$ngaysua,$idUser));
//        return mysql_query($sql);
    }


    function danhsachlienhe($xacnhan)
    {
        if ($xacnhan == 0 or $xacnhan == 1) {
            $sql = "SELECT * FROM lienhe WHERE xacnhan='$xacnhan'";
            $this->setQuery($sql);
            return $this->loadAllRows(array($xacnhan));
        } else {
            $sql = "SELECT * FROM lienhe";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
//        return mysql_query($sql);
    }

    function xacnhanlienhe($idLH, $xacnhan)
    {
        $sql = "UPDATE lienhe set xacnhan='$xacnhan' where idLH='$idLH'";
        $this->setQuery($sql);
        return $this->execute(array($xacnhan,$idLT));
//        return mysql_query($sql);
    }

    function xoachitiet($idSP)
    {
        $sql = "DELETE FROM chitiet where idSP='$idSP'";
        $this->setQuery($sql);
        return $this->execute(array($idSP));
//        return mysql_query($sql);
    }

}


?>
