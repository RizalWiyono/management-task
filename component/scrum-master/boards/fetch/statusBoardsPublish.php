<?php

include '../../../../src/connection/connection.php';

$param = $_POST["id"];
$date = date("Y-m-d H:i:s");

mysqli_query($connect, "UPDATE tb_boards
SET status = 'Publish', start_date='$date'
WHERE idboards=$param;");

header("location: ../?process=success");
