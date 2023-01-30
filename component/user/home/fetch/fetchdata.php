<?php
include '../../../../src/connection/connection.php';
session_start();
$idOrganization = $_SESSION['idorganization'];

$query="SELECT * FROM tb_boards WHERE idorganization=$idOrganization";
$result = mysqli_query($connect,$query);
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();
?>