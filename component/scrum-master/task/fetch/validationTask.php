<?php

include '../../../../src/connection/connection.php';

$param = $_POST["param"];
$paramId = $_POST["paramId"];

mysqli_query($connect, "UPDATE tb_task
SET status = 'Done'
WHERE idtask=$param;");

header("location: ../?id=".$paramId."&&process=success");
