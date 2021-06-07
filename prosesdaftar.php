 <?php
include "koneksi.php";

if (isset($_POST['simpan'])){
  $id_user=$_POST["id_user"];
  $nama=$_POST["nama"];
  $jk=$_POST["jk"];
  $tlp=$_POST["tlp"];
  $alamat=$_POST["alamat"];
  $rt=$_POST["rt"];
  $rw=$_POST["rw"];
  $kel=$_POST["kelurahan"];
  $kec=$_POST["kecamatan"];
  $kota=$_POST["kota"];
  $prov=$_POST["provinsi"];
  $user=$_POST["username"];
  $pass=md5($_POST["password"]);
  $level=$_POST["level"];

  $simpan=mysqli_query($conn, "INSERT INTO user VALUES ('$id_user', '$nama', '$jk', '$tlp', '$alamat', $rt, $rw, '$kel', '$kec', '$kota', '$prov', '$user', '$pass', '$level')");
  if ($simpan) {
    echo"<script>alert('Pendaftaran Akun Berhasil!');window.location='login.php';</script>";
  }
  else{
  echo"<script>alert('Pendaftaran Akun Gagal!');window.location='login.php';</script>";
  }   
}
?> 