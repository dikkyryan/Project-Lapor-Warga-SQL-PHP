<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Aplikasi Lapor Warga Sekayu</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />  

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/mydesign.css" rel="stylesheet"/>


    
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
                    <a class="navbar-brand" href="#"><i class="pe-7s-home"></i> Halaman Utama</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
<?php
if(!isset($_SESSION['level'])) {
?>
                            <div class="content text-center simple-text">
                            <h4>Selamat Datang</h4>
                            <p>Hallo User<br>Silahkan login terlebih dahulu untuk dapat menggunakan fitur yang ada pada Aplikasi Lapor Warga Sekayu.</p>
                            <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
                            </div>
<?php
}
elseif($_SESSION['level']=="user"){
?>
                            <div class="content text-center simple-text">
                            <h4>Selamat Datang</h4>
                            <p>Hallo <?php echo $_SESSION['nama_user'] ?><br>Selamat datang di Aplikasi Lapor Warga Sekayu. Anda dapat menggunakan fitur yang tersedia pada aplikasi.</p>
                            </div>

<!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-md-offset-3">
        <!-- small box -->
        <div style="background-color:#e0e01f;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            $id_usr = $_SESSION['id_user'];
            $query = mysqli_query($conn, "SELECT COUNT(id_laporan) as jml FROM laporan WHERE id_user='$id_usr'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Log Laporan</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text"></i>
          </div>
            <a href="loglaporan.php" class="small-box-footer" title="Lihat Log Laporan" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_pgmn) as jml FROM pengumuman")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Pengumuman</p>
          </div>
          <div class="icon">
            <i class="fa fa-bullhorn"></i>
          </div>
            <a href="pengumuman.php" class="small-box-footer" title="Lihat Pengumuman" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
<?php                            
}
elseif($_SESSION['level']=="admin1"){
?>
                            <div class="content text-center simple-text">
                            <h4>Selamat Datang</h4>
                            <p>Hallo <?php echo $_SESSION['nama_admin'] ?><br>Selamat datang di Aplikasi Lapor Warga Sekayu. Anda dapat menggunakan fitur yang tersedia pada aplikasi.</p>
                            </div>

<!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#e0e01f;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            $query = mysqli_query($conn, "SELECT COUNT(laporan.id_laporan) as jml, kategori.* FROM laporan, kategori WHERE laporan.id_kategori = kategori.id_kategori AND kategori='kamtib'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Laporan Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text"></i>
          </div>
            <a href="kelolalaporan.php" class="small-box-footer" title="Lihat Log Laporan" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            $query = mysqli_query($conn, "SELECT COUNT(id_laporan) as jml FROM laporan WHERE status_laporan='periksa'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Laporan Diproses</p>
          </div>
          <div class="icon">
            <i class="fa fa-spinner"></i></i>
          </div>
            <a href="periksalaporan.php" class="small-box-footer" title="Lihat Log Laporan" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_pgmn) as jml FROM pengumuman")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Pengumuman</p>
          </div>
          <div class="icon">
            <i class="fa fa-bullhorn"></i>
          </div>
            <a href="pengumuman.php" class="small-box-footer" title="Lihat Pengumuman" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
<?php                            
}
else if($_SESSION['level']=="admin2"){ 
?>
                            <div class="content text-center simple-text">
                            <h4>Selamat Datang</h4>
                            <p>Hallo <?php echo $_SESSION['nama_admin'] ?><br>Selamat datang di Aplikasi Lapor Warga Sekayu. Anda dapat menggunakan fitur yang tersedia pada aplikasi.</p>
                            </div>

<!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#e0e01f;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_laporan) as jml FROM laporan WHERE status_laporan='lapor'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Laporan Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text"></i>
          </div>
            <a href="kelolalaporan.php" class="small-box-footer" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_laporan) as jml FROM laporan WHERE status_laporan='periksa'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Laporan Diproses</p>
          </div>
          <div class="icon">
            <i class="fa fa-spinner"></i>
          </div>
            <a href="laporanverif.php" class="small-box-footer" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_laporan) as jml FROM laporan WHERE status_laporan='valid'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data Laporan<br>Terverifikasi</p>
          </div>
          <div class="icon">
            <i class="fa fa-check"></i>
          </div>
            <a href="laporanverif.php" class="small-box-footer" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_pgmn) as jml FROM pengumuman")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Pengumuman</p>
          </div>
          <div class="icon">
            <i class="fa fa-bullhorn"></i>
          </div>
            <a href="pengumuman.php" class="small-box-footer" title="Lihat Data" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
<?php  
}
elseif($_SESSION['level']=="admin3"){
?>
                            <div class="content text-center simple-text">
                            <h4>Selamat Datang</h4>
                            <p>Hallo <?php echo $_SESSION['nama_admin'] ?><br>Selamat datang di Aplikasi Lapor Warga Sekayu. Anda dapat menggunakan fitur yang tersedia pada aplikasi.</p>
                            </div>

<!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-md-offset-3">
        <!-- small box -->
        <div style="background-color:#e0e01f;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            $query = mysqli_query($conn, "SELECT COUNT(id_laporan) as jml FROM laporan WHERE status_laporan='tindaklanjut'")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Laporan Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text"></i>
          </div>
            <a href="tindaklaporan.php" class="small-box-footer" title="Lihat Log Laporan" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php
            include "koneksi.php";  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($conn, "SELECT COUNT(id_pgmn) as jml FROM pengumuman")
                                            or die('Ada kesalahan pada query tampil Data: '.mysqli_error($conn));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jml']; ?></h3>
            <p>Data<br>Pengumuman</p>
          </div>
          <div class="icon">
            <i class="fa fa-bullhorn"></i>
          </div>
            <a href="pengumuman.php" class="small-box-footer" title="Lihat Pengumuman" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
<?php                            
}?>
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
