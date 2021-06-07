<?php
session_start();
	include "koneksi.php";

	if (isset($_POST['go'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
 
$q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$r = mysqli_fetch_array ($q);
$q2 = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_array ($q2);
if (mysqli_num_rows($q) > 0) {
    $_SESSION['id_user'] = $r['id_user'];
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['nama_user'] = $r['nama_user'];
    $_SESSION['level'] = 'user';
    $_SESSION['tlp_user']= $r['tlp_user'];
    header('location:index.php');
}
elseif (mysqli_num_rows($q2) > 0) {
	if($row['level']=='admin1'){

    	$_SESSION['id_admin'] = $row['id_admin'];
    	$_SESSION['nama_admin'] = $row['nama_admin'];
    	$_SESSION['level'] = 'admin1';
    	$_SESSION['tlp_admin']= $row['tlp_admin'];
        $_SESSION['jabatan']= $row['jabatan'];

    header('location:index.php');
	}
	else if($row['level']=='admin2'){

    	$_SESSION['id_admin'] = $row['id_admin'];
    	$_SESSION['nama_admin'] = $row['nama_admin'];
    	$_SESSION['level'] = 'admin2';
    	$_SESSION['tlp_admin']= $row['tlp_admin'];
        $_SESSION['jabatan']= $row['jabatan'];

    header('location:index.php');
	}
	else if($row['level']=='admin3'){

    	$_SESSION['id_admin'] = $row['id_admin'];
    	$_SESSION['nama_admin'] = $row['nama_admin'];
    	$_SESSION['level'] = 'admin3';
    	$_SESSION['tlp_admin']= $row['tlp_admin'];
        $_SESSION['jabatan']= $row['jabatan'];

    header('location:index.php');
	}
}else {
    echo"<script>alert('Username atau Password tidak sesuai!');window.location='login.php';</script>";
}
}
?>