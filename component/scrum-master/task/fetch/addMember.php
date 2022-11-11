<?php

include '../../../../src/connection/connection.php';

$idpage = $_POST["idpage"];
$idtask = $_POST["idtask"];
$idaccount = $_POST["idaccount"];

mysqli_query($connect, "INSERT INTO tb_contribution 
( idcontribution, idaccount, idtask, status) 
values 
(null, $idtask, '$idaccount', ' ')");

header("location: ../?id=".$idpage);
