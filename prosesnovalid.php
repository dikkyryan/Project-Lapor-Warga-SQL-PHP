<?php
include "koneksi.php";

$id_periksa=strval($_GET['id']);

  $update = mysqli_query($conn, "UPDATE laporan SET status_laporan = 'tidak valid' WHERE id_laporan = '$id_periksa'");

  if($update){
  echo"<script>alert('Laporan berhasil dikonfirmasi!');window.location='periksalaporan.php';</script>";
  }
  else{
  echo"<script>alert('Laporan gagal didikonfirmasi!');window.location='periksalaporan.php';</script>";
  }   
?> 