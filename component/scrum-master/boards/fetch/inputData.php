<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];
$price = $_POST["price"];
$pay_status = $_POST["pay_status"];

$owner = $_POST["owner"];
$address = $_POST["address"];
$no_telp = $_POST["no_telp"];
$company = $_POST["company"];
$email = $_POST["email"];

$queryIdMax  = mysqli_query($connect, "SELECT MAX(idboards) as id FROM `tb_boards`");
while($row = mysqli_fetch_array($queryIdMax)){
    if($row['id']) {
        $id = 1;
    }else{
        $id = $row['id']+1;
    }
}

mysqli_query($connect, "INSERT INTO tb_boards 
( idboards, title,  description, startdate, deadline, pay_status, price, status) 
values 
($id, '$title', '$desc', '$startdate', '$deadline', '$pay_status', $price, 'On Progress')");

mysqli_query($connect, "INSERT INTO tb_client 
( idclient, idboards,  owner_name, address, no_telp, email, company_name) 
values 
(null, $id, '$owner', '$address', '$no_telp', '$email', '$company')");

header("location: ../?process=success");
