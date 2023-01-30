<?php

include '../../../../src/connection/connection.php';

session_start();
$idOrganization = $_SESSION['idorganization'];

$title = $_POST["title"];
$desc = $_POST["desc"];
// $startdate = $_POST["startdate"];
// $end_date = $_POST["end_date"];
$plan_date = $_POST["plan_date"];
$deadline = $_POST["deadline"];
$price = $_POST["price"];
$pay_status = $_POST["pay_status"];

$owner = $_POST["owner"];
$address = $_POST["address"];
$no_telp = $_POST["no_telp"];
$company = $_POST["company"];
$email = $_POST["email"];

$queryIdMax  = mysqli_query($connect, "SELECT MAX(idclient) as id FROM `tb_client`");
while($row = mysqli_fetch_array($queryIdMax)){
    if($row['id']) {
        $id = $row['id']+1;
    }else{
        $id = 1;
    }
}


mysqli_query($connect, "INSERT INTO tb_client 
( idclient, owner_name, address, no_telp, email, company_name) 
values 
($id, '$owner', '$address', '$no_telp', '$email', '$company')");

mysqli_query($connect, "INSERT INTO tb_boards 
( idboards, idclient, idorganization, title,  description, plan_date, start_date, deadline, pay_status, status, project_price, end_date) 
values 
(null, $id, $idOrganization, '$title', '$desc', '$plan_date', '0000-00-00', '$deadline', '$pay_status', 'Draft', $price, '0000-00-00')");


header("location: ../?process=success");
