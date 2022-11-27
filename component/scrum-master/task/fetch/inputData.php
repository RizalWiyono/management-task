<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];
$idboards = $_POST["idboards"];
$type_priority = $_POST["type_priority"];
$type_value = $_POST["type_value"];

if($type_value === "Point"){
    $value_point = $_POST["point_value"];
    $value_salary = 0;
}elseif($type_value === "Salary"){
    $value_salary = $_POST["salary_value"];
    $value_point = 0;
}else{
    $value_point = 0;
    $value_salary = 0;
}

$queryTask  = mysqli_query($connect, "SELECT MAX(flow) as flow FROM tb_task WHERE idboards=$idboards");
while($row = mysqli_fetch_array($queryTask)){
    if($row['flow']) {
        $maxFlow = $row['flow']+1;
    }else{
        $maxFlow = 1;
    }
}

// echo $maxFlow;

mysqli_query($connect, "INSERT INTO tb_task 
( idtask, idboards, title, startdate, description, deadline, priority, status, link_file, point, salary, flow) 
values 
(null, $idboards, '$title', '$startdate', '$desc', '$deadline', '$type_priority', 'Publish', '-', $value_point, $value_salary, $maxFlow)");

header("location: ../?id=".$idboards."&&process=success");
