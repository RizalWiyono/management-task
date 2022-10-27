<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d');

mysqli_query($connect, "INSERT INTO tb_note 
( idnote, idaccount, title,  description, date) 
values 
(null, 1, '$title', '$desc', '$date')");

header("location: ../?process=success");
