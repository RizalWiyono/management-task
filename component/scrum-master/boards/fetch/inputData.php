<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];

mysqli_query($connect, "INSERT INTO tb_boards 
( idboards, title,  description, startdate, deadline, status) 
values 
(null, '$title', '$desc', '$startdate', '$deadline', 'On Progress')");

header("location: ../?process=success");
