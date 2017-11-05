<?php


$email = $_POST["email"];
$headers = "From: " . $_POST["email"];
$ip = $_SERVER["REMOTE_ADDR"];
$host = gethostbyaddr($ip);
$message = $_POST["message"];
$name = $_POST["name"];
$subject = $_POST["subject"]; // your webpage
$time = date("l d F Y @ H:i");
$to = "vangbacthaiduc@gmail.com"; // your email
$message2 = "Email: " . $email . "\nHost: " . $host . "\nIP: " . $ip . "\nMessage: " . $message . "\nName: " . $name . "\nTime: " . $time;

if ($email && $message && $name) {
    if (mail($to, $subject, $message2, $headers)) {
        print("Mail cua ban da duoc gui");
    } else {
        print("The server encountered an unexpected condition which prevented it from fulfilling the request.");
    }
} else {
    print("Xin ban hay dien day du cac muc co dau *");
}

?>