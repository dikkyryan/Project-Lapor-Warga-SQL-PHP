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

	<title>Cetak Laporan</title>

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
                    <a class="navbar-brand"><i class="pe-7s-next-2"></i> Cetak Laporan</a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">

                <div class="panel panel-default">
                <div class="panel-body">
<form name="postform" class="form-horizontal" action="cetakpdf.php" target="_blank" method="post">
<div class="form-group" style="padding-top: 20px;">
<h4 class="text-center" style="margin-top:0px; margin-bottom: 20px;">Cetak Laporan</h4>
</div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Dari :</label>
    <div class="col-sm-5">
    <input id="from" type="date" name="from" required class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Sampai :</label>
    <div class="col-sm-5">
      <input id="to" type="date" name="to" required class="form-control" />
    </div>
  </div>
  <div class="form-group text-center" style="margin-bottom: 20px;">
  <input type="submit" name="cetak" class="btn btn-primary btn-lg" value="Cetak"/>
  </div>
</form>
                
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
