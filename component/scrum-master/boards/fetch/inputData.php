<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];
$owner = $_POST["owner"];
$address = $_POST["address"];
$no_telp = $_POST["no_telp"];
$email = $_POST["email"];
$price = $_POST["price"];
$pay_status = $_POST["pay_status"];

mysqli_query($connect, "INSERT INTO tb_boards 
( idboards, title,  description, startdate, deadline, owner, address, no_telp, email, pay_status, price, status) 
values 
(null, '$title', '$desc', '$startdate', '$deadline', '$owner', $address, $no_telp, $email, '$pay_status', $price, 'On Progress')");

header("location: ../?process=success");
