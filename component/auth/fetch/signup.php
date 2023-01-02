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

mysqli_query($connect, "INSERT INTO tb_organization ( idorganization, name, company_service_type, address, link_photo, no_telp, website, email ) 
values 
(null, '$company_name', '$company_service_type', '$address', '-', '$no_telp', '$website', '$email')");

$queryIdMax  = mysqli_query($connect, "SELECT * FROM `tb_organization` WHERE name = '$company_name' AND email = '$email'");
while($row = mysqli_fetch_array($queryIdMax)){
    $idOrganization = $row['idorganization'];
}

mysqli_query($connect, "INSERT INTO tb_account ( idaccount, idorganization, username, email, password, name, photos, role ) 
values 
(null, '$idOrganization', '$username', '$email', '$password', 'Admin $company_name', '-', 'Admin')");

header("location: ../login.php?process=success");
?>