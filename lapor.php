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

	<title>Lapor</title>

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

<script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>

  <style>
    #mapid{
      height: 300px;
    }
  </style>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
  <script src="leaflet.ajax.min.js"></script>
    
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
                    <a class="navbar-brand"><i class="pe-7s-note"></i> Lapor</a>
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

$query =mysqli_query($conn, "SELECT max(id_laporan) as lpr FROM laporan");
$data = mysqli_fetch_array($query);
$id_lpr = $data['lpr'];
$noUrut = (int) substr($id_lpr, 3, 3);
$noUrut++;
$char = "LPR";
$id_lpr = $char . sprintf("%03s", $noUrut);
?>
<form class="form-horizontal" method="post" action="proseslapor.php" enctype="multipart/form-data">
<input type="hidden" name="id_lpr" value="<?php echo $id_lpr ?>" />
<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" />
<div class="form-group" style="padding-top: 20px;">
<h4 class="text-center" style="margin-top:0px; margin-bottom: 20px;">Form Lapor</h4>
</div>
  <div class="form-group">
    <div class="col-sm-12 text-center">
      <img id="uploadPreview" style="width: 250px; height: 250px;"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Foto Laporan</label>
    <div class="col-sm-9">
    <input id="uploadImage" type="file" name="img_url" required class="form-control" onchange="PreviewImage();" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Judul Laporan</label>
    <div class="col-sm-9">
      <input type="text" name="jdl_lpr" placeholder="Judul Laporan" maxlength="50" required class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Isi Laporan</label>
    <div class="col-sm-9">
      <textarea name="isi_lpr" rows="10" placeholder="Isi Laporan" required class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Kategori Laporan</label>
    <div class="col-sm-9">
      <select class="form-control" name="kategori" placeholder="Pilih Kategori" required>
        <option value="1">Keamanan dan Ketertiban</option>
        <option value="2">Kebersihan Lingkungan</option>
        <option value="4">Dampak Lingkungan</option>
        <option value="3">Kesehatan</option>
        <option value="5">Lain-Lain</option>
      </select>
    </div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Lapor Sebagai</label>
    <div class="col-sm-9">
      <select class="form-control" name="pelapor" placeholder="Pilih Kategori" required>
        <option value="Warga Asli">Warga Asli</option>
        <option value="Bukan Warga Asli">Bukan Warga Asli</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilih Lokasi</label>
    <div class="col-sm-3">
        <input id="lat" type="text" name="lat" required class="form-control" placeholder="Latitude" />
      </div>
      <div class="col-sm-3">
        <input id="lng" type="text" name="lng" required class="form-control" placeholder="Longitude" />
        </div>
    <div class="col-sm-3">
        <a class="btn btn-success" data-toggle="modal" href="#myModal" role="button"><i class="pe-7s-map-marker"></i> Buka map</a>
    </div>
    </div>
  <br>
  <div class="form-group text-center" style="margin-bottom: 20px;">
<button type="submit" name="kirim" class="btn btn-primary btn-lg">Kirim Laporan</button>
</div>
</form>
<!--<div id="mapid"></div>
  <script type="text/javascript">
   /* var map = L.map('mapid').setView([-6.4061284,106.8125453], 12);
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
    
    map.locate({setView: true, maxZoom: 16});


    function onLocationFound(e) {
    var radius = e.accuracy;

    var marker = L.marker(e.latlng,{
      draggable:'true'
    }).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();


    marker.on('move', function (e) {
    document.getElementById('latlong').value = marker.getLatLng().lat + ',' + marker.getLatLng().lng;
    });
    }
    map.on('locationfound', onLocationFound, function (e) {
    document.getElementById('latlong').value = marker.getLatLng().lat + ',' + marker.getLatLng().lng;
    });

    function onLocationError(e) {
    alert(e.message);
    }

    map.on('locationerror', onLocationError);


    
  </script> 
        </div>--></div>     
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
    var map = L.map('mapid').setView([-6.4061284,106.8125453], 12);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox.streets',
      accessToken: 'pk.eyJ1Ijoicnlhbjkzc3AiLCJhIjoiY2pkMDJxZ2xpMGxjYTJxbzRtd3EzZnRzcCJ9.WsRQpljGbYjxw7za2_cPtA'
    }).addTo(map);
    
    $('#myModal').on('shown.bs.modal', function(e){
    setTimeout(function() {
    map.invalidateSize();
    map.locate({setView: true, maxZoom: 16});
    }, 10);
    });
    
    function onLocationFound(e) {
    user = L.marker(e.latlng).addTo(map)
        .bindPopup("Lokasi anda saat ini").openPopup();

    /*marker.on('move', function (e) {
    document.getElementById('latlong').value = marker.getLatLng().lat + ',' + marker.getLatLng().lng;
    });*/
    }

    map.on('locationfound', onLocationFound);

    function onLocationError(e) {
    alert(e.message);
    }

    map.on('locationerror', onLocationError);

    var marker = {};

  function onMapClick(e) {
    lat = e.latlng.lat;
    lon = e.latlng.lng;

    //console.log("You clicked the map at LAT: "+ lat+" and LONG: "+ lon );
        //Clear existing marker, 

        if (marker != undefined) {
              map.removeLayer(marker);
        };

    //Add a marker to show where you clicked.
     marker = L.marker(e.latlng, {
      draggable: true
     }).addTo(map)
          .bindPopup("Lokasi yang dipilih").openPopup(); 

    document.getElementById('lat').value = marker.getLatLng().lat;
    document.getElementById('lng').value = marker.getLatLng().lng;

    marker.on('dragend', function (e) {
    var chagedPos = e.target.getLatLng();
    this.bindPopup("Lokasi yang dipilih").openPopup();
    document.getElementById('lat').value = marker.getLatLng().lat;
    document.getElementById('lng').value = marker.getLatLng().lng;
    //console.log("You drag: "+ chagedPos);
    });
};

  map.on('click', onMapClick);
   
  </script> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>
</body>

    <!--   Core JS Files   -->
    

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
