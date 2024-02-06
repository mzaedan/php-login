<?php

$host = "localhost";
$username = "root";
$password = "";
$database_name = "buku-tamu";

$db = mysqli_connect($host, $username, $password, $database_name);

if($db->connect_error){
    echo "Koneksi Gagal";
    die("error!");
}

?>