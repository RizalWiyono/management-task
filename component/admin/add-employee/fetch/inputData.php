<?php

include '../../../../src/connection/connection.php';

session_start();
$idOrganization = $_SESSION['idorganization'];

$role = $_POST["role"];
$name = $_POST["name"];
$password = md5($_POST["password"]);
$username = $_POST["username"];
$email = $_POST["email"];

mysqli_query($connect, "INSERT INTO tb_account 
( idaccount , idorganization, username, email, password, name, photos, role) 
values 
(null, $idOrganization, '$username', '$email', '$password', '$name', '-', '$role')");

header("location: ../?process=success");
