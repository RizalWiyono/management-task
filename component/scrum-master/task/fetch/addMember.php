<?php

include '../../../../src/connection/connection.php';

$idpage = $_POST["idpage"];
$idtask = $_POST["idtask"];
$idaccount = $_POST["idaccount"];


for($i = 0; $i < count($idaccount); ++$i) {
    mysqli_query($connect, "INSERT INTO tb_contribution 
    ( idcontribution, idaccount, idtask, status) 
    values 
    (null, $idaccount[$i], '$idtask', ' ')");
}

// mysqli_query($connect, "INSERT INTO tb_contribution 
// ( idcontribution, idaccount, idtask, status) 
// values 
// (null, $idaccount, '$idtask', ' ')");

header("location: ../?id=".$idpage);
