<?php
//goi thu vien
include('../../themes/class.smtp.php');
include "../../themes/class.phpmailer.php";
include("../../thuvien/kb_database.php");
include("../../thuvien/trangchu.php");
$email = $_POST['emailquen'];
$checkemail = $trangchu->checkemail($email);

if (count($checkemail) > 0) {
    $row = $checkemail;
    $maxacnhan = mt_rand(99999, 2147483647);
    $trangchu->doimaxacnhan($email, md5($maxacnhan));
    //doimatkhau($email,md5($matkhaumoi));


    $nFrom = "Vàng Bạc Thái Đức";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'vangbacthaiduc@gmail.com';  //dia chi email cua ban
    $mPass = 'thaiduczzc';       //mat khau email cua ban
    $nTo = $row['ten']; //Ten nguoi nhan
    $mTo = $email;   //dia chi nhan mail
    $mail = new PHPMailer();
    $body = 'Mã xác nhận tài khoản của bạn là: ' . $maxacnhan;   // Noi dung email
    $title = 'Xác nhận email yêu cầu đổi mật khẩu tài khoản vàng bạc thái đức';   //Tieu de gui mail
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

        header("Location:../../index.php?p=xacnhanemail&email=$email");
    }
}

?>