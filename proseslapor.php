<?php
include "koneksi.php";

if (isset($_POST['kirim'])){
  $id_lpr=$_POST["id_lpr"];
  $fileName = $_FILES['img_url']['name'];
  $id_user=$_POST["id_user"];
  $judul=$_POST["jdl_lpr"];
  $isi=$_POST["isi_lpr"];
  $kat=$_POST["kategori"];
  $pel=$_POST["pelapor"];
  $lat=$_POST["lat"];
  $lng=$_POST["lng"];
  $tgl= date("Y-m-d");

  $simpan = mysqli_query($conn, "INSERT INTO laporan VALUES ('$id_lpr', './img/laporan/$fileName', '$judul', '$isi', '$kat', '$id_user', '$pel', '$lat', '$lng', 'lapor', '$tgl')");

  move_uploaded_file($_FILES['img_url']['tmp_name'], "./img/laporan/".$_FILES['img_url']['name']);

  if($simpan){
  echo"<script>alert('Laporan berhasil dikirim!');window.location='lapor.php';</script>";
  }
  else{
  echo"<script>alert('Kirim laporan gagal!');window.location='lapor.php';</script>";
  }   
}
?> 