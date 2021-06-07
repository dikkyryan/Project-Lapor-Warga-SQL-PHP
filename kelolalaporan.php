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

	<title>Kelola Laporan</title>

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
                    <a class="navbar-brand"><i class="pe-7s-note2"></i> Kelola Laporan</a>
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

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Judul Laporan</th>
                <th class="center">Kategori Laporan</th>
                <th class="center">Nama Pengirim</th>
                <th class="center">Status Pengirim</th>
                <th class="center">Status Laporan</th>
                <th class="center">Tanggal Kirim</th>
                <th class="center"></th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
                <?php
                include "koneksi.php";

                $no = 1;

                if ($_SESSION['level']=='admin1') {
                $sqlCount = "SELECT count(id_laporan) FROM laporan WHERE id_kategori='1'";
                $rsCount = mysqli_fetch_array(mysqli_query($conn, $sqlCount));
                $banyakData = $rsCount[0];
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
                $mulai_dari = $limit * ($page - 1);

                $data = mysqli_query($conn, "SELECT user.id_user, user.nama_user, laporan.*, kategori.* FROM user, laporan, kategori WHERE user.id_user = laporan.id_user AND laporan.id_kategori = kategori.id_kategori AND laporan.id_kategori='1' AND status_laporan = 'lapor' ORDER BY id_laporan LIMIT $mulai_dari, $limit");  
                }
                else if ($_SESSION['level']=='admin2') {
                $sqlCount = "SELECT count(id_laporan) FROM laporan";
                $rsCount = mysqli_fetch_array(mysqli_query($conn, $sqlCount));
                $banyakData = $rsCount[0];
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
                $mulai_dari = $limit * ($page - 1);

                $data = mysqli_query($conn, "SELECT user.id_user, user.nama_user, laporan.*, kategori.* FROM user, laporan, kategori WHERE user.id_user = laporan.id_user AND laporan.id_kategori = kategori.id_kategori AND status_laporan = 'lapor' ORDER BY laporan.id_kategori, laporan.id_laporan ASC LIMIT $mulai_dari, $limit");
                }
                while($r = mysqli_fetch_assoc($data)){  
                ?>
                    <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $r['judul_laporan']; ?></td>
                    <td>
                        <?php echo $r['kategori'];
                            /*if ($r['id_kategori']=='1'){
                                echo 'Keamanan dan Ketertiban';
                            }
                            else if ($r['id_kategori']=='kamtib') {
                                echo '';
                            }
                            else if ($r['id_kategori']=='kebersihan') {
                                echo 'Kebersihan Lingkungan';
                            }
                            else if ($r['id_kategori']=='kesehatan') {
                                echo 'Kesehatan';
                            }
                            else {
                                echo 'Lain-Lain';
                            }*/
                        ?>
                    </td>
                    <td><?php echo $r['nama_user']; ?></td>
                    <td><?php echo $r['status_pelapor']; ?></td>
                    <td><?php echo $r['status_laporan']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($r['tgl_kirim']));?></td>
                    
                    <td class='text-center' width='100'>
                          <div>
                            <a href="detaillapor.php?id=<?php echo $r['id_laporan'];?>" class="btn btn-primary" role="button">Detail</a>
                          </div>
                      </td>
                </tr>
                <?php
                $no++;
                } ?>
            </tbody>
  </table>
</div>

<div class="text-center">
<nav aria-label="Page navigation example">
  <ul class="pagination">
<?php 
$banyakHalaman = ceil($banyakData / $limit);
for($i = 1; $i <= $banyakHalaman; $i++){
if($page != $i){

    echo"<li class='page-item'><a class='page-link' href='kelolalaporan.php?page=".$i."'>".$i."</a></li>";

}else{

    echo"<li class='page-item disabled'><a class='page-link' href='kelolalaporan.php?page=".$i."'>".$i."</a></li>";

}
}
?>
  </ul>
</nav>
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
