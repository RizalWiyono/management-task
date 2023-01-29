<?php
// error_reporting(0);
include '../../../../src/connection/connection.php';

$title = $_POST["title"];
$desc = $_POST["desc"];
$startdate = $_POST["startdate"];
$deadline = $_POST["deadline"];
// $plan_date = $_POST["plan_date"];
// $end_date = $_POST["end_date"];
$idboards = $_POST["idboards"];
$type_priority = $_POST["type_priority"];
$type_value = $_POST["type_value"];
$flowTask = $_POST["flowTask"];
$flow_arr = $_POST["flow_arr"];
$date = date("Y-m-d H:i:s");

if($type_value === "Point"){
    $value_point = $_POST["point_value"];
    $value_salary = 0;
    $value_task = $_POST["point_value"];
}elseif($type_value === "Salary"){
    $value_salary = $_POST["salary_value"];
    $value_task = $_POST["salary_value"];
    $value_point = 0;
}else{
    $value_task = 0;
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
( idtask, idboards, idpriority, title, plan_date, start_date, description, deadline, status, link_file, end_date, flow, task_done_flow) 
values 
(null, $idboards, '$type_priority', '$title', '0000-00-00', '$startdate', '$desc', '$deadline', 'Publish', '-', '0000-00-00', $maxFlow, '$flowTask')");

$queryIdTask  = mysqli_query($connect, "SELECT idtask FROM tb_task WHERE idboards=$idboards AND title='$title' AND start_date='$startdate'");
while($row = mysqli_fetch_array($queryIdTask)){
    $idTask = $row['idtask'];
}

mysqli_query($connect, "INSERT INTO tb_value 
(idvalue, idtask, idpriority, type_value, value, date) 
values 
(null, $idTask, $type_priority, '$type_value', '$value_task', '$date')");

header("location: ../?id=".$idboards."&&process=success");
