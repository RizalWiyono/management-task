<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];
$owner = $_POST["owner"];
$pay_status = $_POST["pay_status"];

mysqli_query($connect, "INSERT INTO tb_boards 
( idboards, title,  description, startdate, deadline, owner, pay_status, status) 
values 
(null, '$title', '$desc', '$startdate', '$deadline', '$owner', '$pay_status', 'On Progress')");

header("location: ../?process=success");
