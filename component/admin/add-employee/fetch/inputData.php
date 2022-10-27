<?php

include '../../../../src/connection/connection.php';

$role = $_POST["role"];
$name = $_POST["name"];
$password = $_POST["password"];
$username = $_POST["username"];
$email = $_POST["email"];

mysqli_query($connect, "INSERT INTO tb_account 
( idaccount , idorganization, username, email, password, name, photos, role) 
values 
(null, 1, '$username', '$email', '$password', '$name', '-', '$role')");

header("location: ../?process=success");
