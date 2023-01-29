<?php

include '../../../../src/connection/connection.php';

$param = $_POST["id"];
$plan_date = $_POST["plan_date"];
$end_date = $_POST["end_date"];
$idboards = $_POST["idboards"];

mysqli_query($connect, "UPDATE tb_task
SET plan_date = '$plan_date', end_date='$end_date', status='Publish'
WHERE idtask=$param;");

header("location: ../?id=".$idboards."&&process=success");
