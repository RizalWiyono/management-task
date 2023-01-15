<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email = $_POST['email'];
$point = 2000;
$target = 20000;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'muhammadrizalwiyono@gmail.com';
$mail->Password = 'rfcfoopyrdkvlcbd';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('muhammadrizalwiyono@gmail.com');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Report Proggress';
$mail->Body = 'You get '.$point.' from '.$target;

$mail->send();

header("location: ../?process=success");
