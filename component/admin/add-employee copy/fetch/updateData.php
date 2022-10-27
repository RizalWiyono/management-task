<?php

include '../../../../src/connection/connection.php';

$id = $_POST["id"];
$name = $_POST["name"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$telp = $_POST["telp"];
$birth_date = $_POST["birth_date"];
$birth_place = $_POST["birth_place"];
$gender = $_POST["gender"];
$religous = $_POST["religous"];
$street = $_POST["street"];
$city = $_POST["city"];
$country = $_POST["country"];
$zip_code = $_POST["zip_code"];

mysqli_query($connect, "UPDATE datauser SET name='$name', first_name='$first_name', last_name='$last_name', no_telp='$telp', street='$street', city='$city', country='$country', zip_code='$zip_code', birth_place='$birth_place', birth_date='$birth_date', religious='$religous', gender='$gender'");

header("location: ../?process=up-success");
