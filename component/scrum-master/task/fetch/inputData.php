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
// echo $title."<br>";
// echo $desc."<br>";
// echo $startdate."<br>";
// echo $deadline."<br>";
// echo $type_priority."<br>";
// echo $value_salary."<br>";
// echo $value_point."<br>";

mysqli_query($connect, "INSERT INTO tb_task 
( idtask, idboards, title, startdate, description, deadline, priority, status, link_file, point, salary) 
values 
(null, $idboards, '$title', '$startdate', '$desc', '$deadline', '$type_priority', 'Publish', '-', $value_point, $value_salary)");

header("location: ../?process=success");
