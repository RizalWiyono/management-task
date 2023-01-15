<?php

include '../../../../src/connection/connection.php';

$point = $_POST["point"];
$account = $_POST["account"];
$date = $_POST["date"];

mysqli_query($connect, "INSERT INTO tb_target 
( idtarget , idaccount, total_target, date, status) 
values 
(null, $account, '$point', '$date', 'Active')");

header("location: ../?process=success");
