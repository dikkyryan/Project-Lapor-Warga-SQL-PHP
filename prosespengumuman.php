<?php
include "koneksi.php";

if (isset($_POST['kirim'])){
  $id_pgmn=$_POST["id_pgmn"];
  $id_admin=$_POST["id_adm"];
  $judul=$_POST["jdl_pgmn"];
  $isi=$_POST["isi_pgmn"];
  $tgl= date("Y-m-d");
  $tgl_acara=$_POST["tgl_acara"];
  $mulai=$_POST["mulai"];
  $selesai=$_POST["selesai"];
  $tempat=$_POST["tempat"];

  $simpan = mysqli_query($conn, "INSERT INTO pengumuman VALUES ('$id_pgmn', '$judul', '$isi', '$id_admin', '$tgl', '$tgl_acara', '$mulai', '$selesai', '$tempat')");

  if($simpan){
  echo"<script>alert('Pengumuman berhasil dikirim!');window.location='kirimpengumuman.php';</script>";
  }
  else{
  echo"<script>alert('Kirim pengumuman gagal!');window.location='kirimpengumuman.php';</script>";
  }   
}
?> 