<?php
$connect = mysqli_connect("localhost","root","","db_sistem_manajemenproyek");

if (mysqli_connect_errno())
{
    echo "Koneksi Error : " . mysqli_connect_error();
}
?>
