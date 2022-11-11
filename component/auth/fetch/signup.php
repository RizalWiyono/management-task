<?php
include "../../../src/connection/connection.php";

$email = $_POST["email"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
$company_name = $_POST["company_name"];
$company_service_type = $_POST["company_service_type"];
$address = $_POST["address"];
$no_telp = $_POST["no_telp"];
$website = $_POST["website"];

mysqli_query($connect, "INSERT INTO tb_organization ( idorganization, name, company_service_type, address, link_photo, no_telp, website, email, username, password ) 
values 
(null, '$company_name', '$company_service_type', '$address', '-', '$no_telp', '$website', '$email', '$username', '$password')");

header("location: ../login.php?process=success");
?>