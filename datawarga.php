<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']=="user"){
        header("location:index.php");
    }
    else if(!isset($_SESSION['level'])){
        session_destroy();
        header("location:index.php");
    }
 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tambah Data Warga Sekayu</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/mydesign.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/mystyles.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Aplikasi Lapor Warga Sekayu
                </a>
            </div>

<?php
include "menu/menu.php";
?>
            
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><i class="pe-7s-id"></i> Tambah Data Warga Sekayu</a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
<?php
include "koneksi.php";

$query =mysqli_query($conn, "SELECT max(id_user) as maxId FROM user");
$data = mysqli_fetch_array($query);
$idUser = $data['maxId'];
$noUrut = (int) substr($idUser, 3, 3);
$noUrut++;
$char = "USR";
$id_user = $char . sprintf("%03s", $noUrut);
?>
<form class="form-horizontal" method="post" action="prosesdatawarga.php">
<input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
<div class="form-group" style="padding-top: 30px;">
<h4 class="text-center" style="margin-top:0px; margin-bottom: 30px;">Form Tambah Data Warga Sekayu</h4>
</div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" name="nama" placeholder="Nama" maxlength="20" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Jenis Kelamin</label>
    <div class="col-sm-10">
      <input class="form-check-input" type="radio"  name="jk" id="option1" value="L" autocomplete="off"> Laki-Laki /
          <input class="form-check-input" type="radio" name="jk" id="option2" value="P" autocomplete="off"> Perempuan
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">No. Telepon</label>
    <div class="col-sm-10">
      <input type="text" name="tlp" placeholder="No. Telepon" maxlength="12" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" name="alamat" placeholder="Alamat" maxlength="30" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">RT</label>
    <div class="col-sm-4">
      <input type="text" name="rt" placeholder="RT" maxlength="3" required class="form-control" />
    </div>
    <label class="col-sm-2 control-label">RW</label>
    <div class="col-sm-4">
      <input type="text" name="rw" placeholder="RW" maxlength="3" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kelurahan</label>
    <div class="col-sm-4">
      <input type="text" name="kelurahan" placeholder="Kelurahan" maxlength="20" required class="form-control" />
    </div>
    <label class="col-sm-2 control-label">Kecamatan</label>
    <div class="col-sm-4">
      <input type="text" name="kecamatan" placeholder="Kecamatan" maxlength="20" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kota</label>
    <div class="col-sm-4">
      <input type="text" name="kota" placeholder="Kota" maxlength="20" required class="form-control" />
    </div>
    <label class="col-sm-2 control-label">Provinsi</label>
    <div class="col-sm-4">
      <input type="text" name="provinsi" placeholder="Provinsi" maxlength="20" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="username" name="username" placeholder="Username" maxlength="20" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" placeholder="Password" maxlength="20" required class="form-control" />
    </div>
  </div>
  <input type="hidden" name="level" value="user" />
<div class="text-center" style="margin-bottom: 20px;">
<button type="submit" name="simpan" class="btn btn-primary btn-lg">Simpan</button>
</div>
</form>
                           
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="about.php">
                            Tentang Aplikasi    
                            </a>
                        </li>
                    </ul>
                </nav>
                
                </p>
            </div>
        </footer>
</div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
