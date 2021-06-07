<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if(!isset($_SESSION['level'])){
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

	<title>Read More Pengumuman</title>

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
                    <a class="navbar-brand"><i class="pe-7s-bell"></i> Pengumuman</a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <p style="text-align:right;">
                            <a href="pengumuman.php" class="btn btn-default" role="button">&laquo; Kembali</a>
                        </p>
                <div class="panel panel-default">
                <div class="panel-body">
                <?php
                include "koneksi.php";

                $id_pgmn=strval($_GET['id']);
                $data = mysqli_query($conn, "SELECT admin.id_admin, admin.nama_admin, pengumuman.* FROM admin JOIN pengumuman ON admin.id_admin = pengumuman.id_admin AND id_pgmn='$id_pgmn' LIMIT 1 ");  
                
                while ($r = mysqli_fetch_array($data)){
                ?>
                  <h3><?php echo $r['judul_pgmn'];?></h3>
                    <div class="info-meta">
                        <ul class="list-inline">
                            <li><i class="fa fa-clock-o"></i> <?php echo date('d/m/Y', strtotime($r['tgl_pgmn'])); ?> </li>
                            <li><i class="fa fa-user"></i> Dikirim oleh <?php echo $r['nama_admin'];?></li>
                        </ul>
                    </div>
                    <hr>
                    <!--<div class = "media">
                       <a class = "pull-left" href = "#">
                          <img class = "media-object " src = "images/education.jpg" width="100%" height="200px" >
                       </a>-->
                       <div class = "media-body">
                          <p style="text-align:justify;">
                          <?php echo $r['isi_pgmn'] ?>
                          </p>
                          <p>
                          Tanggal&emsp;: <?php echo $r['tgl_acara'] ?><br>
                          Waktu&emsp;&ensp;&nbsp;: <?php echo date('H.i', strtotime($r['mulai_acara'])) . ' - ' . date('H.i', strtotime($r['selesai_acara'])); ?><br>
                          Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $r['tempat_acara'] ?>
                          </p>  
                       </div>
                       <hr>
                        <?php 
                        if ($_SESSION['level']=='user') {
                        ?>
                        <p style="text-align:right;">
                            
                        </p>
                        <?php }
                        else {
                        ?>
                        
                        <form action="lampu.php" method="post" class="text-right">
                            <button type="submit" name="nyala" class="btn btn-primary">Nyalakan LED</button>
                            <button type="submit" name="mati" class="btn btn-danger">Matikan LED</button>
                        </form>

                        <?php
                        }}
                        ?>
                </div>
                </div>
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
