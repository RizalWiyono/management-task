<?php

include '../../../../src/connection/connection.php';

$point = $_POST["point"];
$account = $_POST["account"];
$date = $_POST["date"];

echo $point;
echo $account;
echo $date;

mysqli_query($connect, "INSERT INTO tb_target 
( idtarget , idaccount, total_target, date, status) 
values 
(null, $account, '$point', '$date', 'Process')");

header("location: ../?process=success");
