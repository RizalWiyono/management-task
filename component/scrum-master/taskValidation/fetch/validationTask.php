<?php

include '../../../../src/connection/connection.php';

$param = $_POST["param"];
$paramId = $_POST["paramId"];
$paramValueId = $_POST["paramValueId"];
$paramIdAccount = $_POST["paramIdAccount"];
$paramTypeValue = $_POST["paramTypeValue"];
$paramValue = $_POST["paramValue"];
$date = date("Y-m-d H:i:s");

mysqli_query($connect, "UPDATE tb_task
SET status = 'Done'
WHERE idtask=$param;");

mysqli_query($connect, "INSERT INTO tb_wallet 
(idwallet, idvalue, idaccount, type_value, total_value_earned, date) 
values 
(null, $paramValueId, '$paramIdAccount', '$paramTypeValue', '$paramValue', '$date')");

header("location: ../?id=".$paramId."&&process=success");
