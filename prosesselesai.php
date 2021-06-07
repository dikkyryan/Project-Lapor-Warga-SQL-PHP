<?php
include "koneksi.php";

if (isset($_POST['kirim'])){
  $id_lpr=$_POST["id_lpr"];
  $id_user=$_POST["id_user"];
  $id_admin=$_POST["id_admin"];
  $ket=$_POST["keterangan"];
  $tgl= date("Y-m-d");

  $simpan = mysqli_query($conn, "INSERT INTO selesai VALUES ('', '$id_lpr', '$id_user', '$id_admin', '$tgl', '$ket')");

  $update = mysqli_query($conn, "UPDATE laporan SET status_laporan = 'selesai' WHERE id_laporan = '$id_lpr'");

  if($simpan && $update){
  echo"<script>alert('Berhasil dikirim!');window.location='tindaklaporan.php';</script>";
  }
  else{
  echo"<script>alert('Gagal mengirim!');window.location='';</script>";
  }   
}
?> 