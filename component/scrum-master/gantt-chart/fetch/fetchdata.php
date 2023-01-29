<?php
include '../../../../src/connection/connection.php';
$id = $_POST['id'];
$query="SELECT * FROM tb_task WHERE idboards=$id";
$result = mysqli_query($connect,$query);
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();
?>