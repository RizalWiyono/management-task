<?php

include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];
$plan_date = $_POST["plan_date"];
$end_date = $_POST["end_date"];
$idboards = $_POST["idboards"];
$type_priority = $_POST["type_priority"];
$type_value = $_POST["type_value"];
$flowTask = $_POST["flowTask"];
$flow_arr = $_POST["flow_arr"];

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

if($flowTask) {
    $flowTask = $flow_arr;
}else{
    $flowTask = 'OFF';
}

mysqli_query($connect, "INSERT INTO tb_task 
( idtask, idboards, idpriority, title, plan_date, start_date, description, deadline, status, link_file, end_date, point, salary, flow, task_done_flow) 
values 
(null, $idboards, '$type_priority', '$title', '$plan_date', '$startdate', '$desc', '$deadline', 'Publish', '-', '$end_date', $value_point, $value_salary, $maxFlow, '$flowTask')");

header("location: ../?id=".$idboards."&&process=success");
