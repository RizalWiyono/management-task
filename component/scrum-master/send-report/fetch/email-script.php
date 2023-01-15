<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include '../../../../src/connection/connection.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email = $_POST['email'];
$idaccount = $_POST['idaccount'];
$dateOld = $_POST['date'];
$value = (int)$_POST['value'];

$year = date('Y', strtotime($dateOld));
$month = date('m', strtotime($dateOld));

$dateParam = $year.'-'.$month;

$queryTargetPoint  = mysqli_query($connect, "SELECT * FROM `tb_target` WHERE idaccount=$idaccount AND date='$dateParam'");
while($row = mysqli_fetch_array($queryTargetPoint)){
    $target = (int)$row['total_target'];
}

if($value > $target){
    $body = 'Thank you for your hard work! <br>
    I really appreciate that.<br>
    You are extraordinary, you have contributed a lot lately.<br>
    Here are the points you have earned: '.$value.' From your target '.$target.'. <br>
    You have reached the specified target. <br>
    Thank you!';
}else{
    $calculate = $target - $value;
    $body = 'Thank you for your hard work! <br>
    I really appreciate that.<br>
    You are extraordinary, you have contributed a lot lately.<br>
    Here are the points you have earned: '.$value.' From your target '.$target.'. <br>
    You have reached your target by: '.$calculate.' <br>
    Maximize again. :) <br>
    Thank you!';
}

$date = date("Y-m-d H:i:s");


$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'danieljuliann30@gmail.com';
$mail->Password = 'bjazigawgrlmhxjw';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('danieljuliann30@gmail.com');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Report Proggress';
$mail->Body = $body;

$mail->send();

mysqli_query($connect, "INSERT INTO tb_report 
( idreport, idaccount, description,  date, status) 
values 
(null, $idaccount, '$body', '$date', 'Success')");

header("location: ../?process=success");
