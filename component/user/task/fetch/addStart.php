<?php

include '../../../../src/connection/connection.php';

$param = $_POST["param"];
$paramId = $_POST["paramId"];
$date = date("Y-m-d H:i:s");

mysqli_query($connect, "UPDATE tb_task
SET start_date='$date'
WHERE idtask=$param;");

header("location: ../?id=".$paramId."&&process=success");
