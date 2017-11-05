<?php
//goi thu vien
include('../../themes/class.smtp.php');
include "../../themes/class.phpmailer.php";
include("../../thuvien/kb_database.php");
include("../../thuvien/trangchu.php");
$email = $_POST['emailxn'];
$maxacnhan = md5($_POST['maxacnhan']);
$kiemtramaxacnhan = $trangchu->kiemtramaxacnhan($email, $maxacnhan);

if (count($kiemtramaxacnhan)>0) {
    $row = $kiemtramaxacnhan;
    $matkhaumoi = mt_rand(99999, 2147483647);
    //doimaxacnhan($email,md5($maxacnhan));
    $trangchu->doimatkhau($email, md5($matkhaumoi));


    $nFrom = "Vàng Bạc Thái Đức";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'vangbacthaiduc@gmail.com';  //dia chi email cua ban
    $mPass = 'thaiduczzc';       //mat khau email cua ban
    $nTo = $row['ten']; //Ten nguoi nhan
    $mTo = $email;   //dia chi nhan mail
    $mail = new PHPMailer();
    $body = 'Mật khẩu mới của tài khoản của bạn là: ' . $matkhaumoi . ". Hãy đổi lại mật khẩu khác ngay khi vừa đăng nhập.";   // Noi dung email
    $title = 'Mật khẩu mới tài khoản vàng bạc thái đức';   //Tieu de gui mail
    $mail->IsSMTP();
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";    // sever gui mail.
    $mail->Port = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username = $mFrom;  // khai bao dia chi email
    $mail->Password = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('vangbacthaiduc@gmail.com', 'Thai Duc'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject = $title;// tieu de email
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail
    if (!$mail->Send()) {
        echo 'Co loi!';

    } else {
        $_SESSION['email'] = $row['email'];
        header("Location:../../index.php?p=doimatkhau");
    }
} else {
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?>