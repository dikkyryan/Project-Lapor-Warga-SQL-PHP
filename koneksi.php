<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_laporwarga";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die('Terjadi Kesalahan !'.mysqli_error($conn));

$usedb = mysqli_select_db($conn, $dbname) or die('Koneksi Error !'.mysqli_error($conn));
?>