<?php
include "koneksi.php";

$id_kon=strval($_GET['id']);

if (isset($_POST['valid'])) {

  $update = mysqli_query($conn, "UPDATE laporan SET status_laporan = 'valid' WHERE id_laporan = '$id_kon'");

  if($update){
  echo"<script>alert('Laporan berhasil dikonfirmasi!');window.location='periksalaporan.php';</script>";
  }
  else{
  echo"<script>alert('Laporan gagal dikonfirmasi!');window.location='periksalaporan.php';</script>";
  }
}
else if (isset($_POST['novalid'])) {
  $update2 = mysqli_query($conn, "UPDATE laporan SET status_laporan = 'tidak valid' WHERE id_laporan = '$id_kon'");

  if($update2){
  echo"<script>alert('Laporan berhasil dikonfirmasi ke RT/RW untuk diperiksa!');window.location='periksalaporan.php';</script>";
  }
  else{
  echo"<script>alert('Laporan gagal dikonfirmasi!');window.location='periksalaporan.php';</script>";
  }
}   
?> 