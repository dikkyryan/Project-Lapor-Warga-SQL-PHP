<?php
include "koneksi.php";

$id_periksa=strval($_GET['id']);

  $update = mysqli_query($conn, "UPDATE laporan SET status_laporan = 'periksa' WHERE id_laporan = '$id_periksa'");

  if($update){
  echo"<script>alert('Laporan berhasil dikirim ke RT/RW untuk diperiksa!');window.location='kelolalaporan.php';</script>";
  }
  else{
  echo"<script>alert('Laporan gagal dikirim ke RT/RW!');window.location='kelolalaporan.php';</script>";
  }   
?> 