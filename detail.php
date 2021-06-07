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

	<title>Detail Laporan</title>

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

    <style>
    #mapid{
      height: 300px;
    }
  </style>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
  <script src="leaflet.ajax.min.js"></script>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    
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
                    <a class="navbar-brand"><i class="pe-7s-bell"></i> Detail Laporan</a>
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
                            <a href="loglaporan.php" class="btn btn-default" role="button">&laquo; Kembali</a>
                        </p>

                <div class="panel panel-default">
                <div class="panel-body">
                <?php
                include "koneksi.php";

                $id_lpr=strval($_GET['id']);
                $data = mysqli_query($conn, "SELECT user.id_user, user.nama_user, laporan.* FROM user JOIN laporan ON user.id_user = laporan.id_user AND id_laporan='$id_lpr' LIMIT 1 ");  
                
                while ($r = mysqli_fetch_array($data)){
                ?>
                  <h3><?php echo $r['judul_laporan'];?></h3>
                    <div class="info-meta">
                        <ul class="list-inline">
                            <li><i class="fa fa-clock-o"></i> <?php echo date('d/m/Y', strtotime($r['tgl_kirim'])); ?> </li>
                            <li><i class="fa fa-user"></i> Dikirim oleh <?php echo $r['nama_user'];?></li>
                        </ul>
                        <ul class="list-inline"><li>Status Laporan : <span class="label label-info" style="text-transform: capitalize;"><?php echo $r['status_laporan'];?></span></li></ul>
                    </div>
                    <hr>
                    <div class = "media">
                       <a class = "pull-left" href = "#">
                          <img class = "media-object " src = "<?php echo $r['foto_laporan'];?>" width="300px" height="300px" >
                       </a>
                       <div class = "media-body">
                          <p style="text-align:justify;">
                          <?php echo $r['isi_laporan'] ?>
                          </p>  
                       </div>
                       <hr>

                       <?php 
                       if ($_SESSION['level']=='user') {
                       ?>

                        <p style="text-align:right;">
                            <a class="btn btn-success" data-toggle="modal" href="#myModal" role="button">Lihat Lokasi</a>
                        </p>

                        <?php }
                        ?>
                </div>
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
                <p class="copyright pull-right">
                    Copyright &copy; Abdul Aziz <script>document.write(new Date().getFullYear())</script>
                </p>
            </div>
        </footer>
</div>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih Lokasi</h4>
        </div>
        <div class="modal-body">
          <div id="mapid"></div>
    <script type="text/javascript">
    var map = L.map('mapid').setView([<?php echo $r['lokasi_laporan'];?>], 12);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox.streets',
      accessToken: 'pk.eyJ1Ijoicnlhbjkzc3AiLCJhIjoiY2pkMDJxZ2xpMGxjYTJxbzRtd3EzZnRzcCJ9.WsRQpljGbYjxw7za2_cPtA'
    }).addTo(map);

    $('#myModal').on('shown.bs.modal', function(e){
    setTimeout(function() {
    map.invalidateSize();
    }, 10);
    });

    //Add a marker
    marker = L.marker([-6.374509, 106.803396]).addTo(map)
          .bindPopup("Kelurahan Tanah Baru").openPopup();
    marker = L.marker([<?php echo $r['lokasi_laporan'];?>]).addTo(map)
          .bindPopup("Lokasi Laporan").openPopup();
    
  </script> 
    <?php } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>

</body>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
