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
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
  <title>Pendaftaran Akun</title>
  
  <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  <section class="container">
      <section class="login-form">
        <form method="post" action="prosesdaftar.php" onSubmit="return validasi()" role="login">
          <h1 class="text-center" style="margin-top:0px; margin-bottom: 30px;"><strong>Pendaftaran Akun</strong></h1>
          <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
          <input type="text" name="nama" placeholder="Nama" maxlength="20" required class="form-control input-lg" />
          <div class="form-inline">
          <div class="form-group">
          <label for="jk">Jenis Kelamin : </label>
          </div>
          <div class="form-group">
          <input class="form-check-input" type="radio"  name="jk" id="option1" value="L" autocomplete="off"> Laki-Laki /
          <input class="form-check-input" type="radio" name="jk" id="option2" value="P" autocomplete="off"> Perempuan
          </div>
          </div>
          <input type="text" name="tlp" placeholder="No. Telepon" maxlength="12" required class="form-control input-lg" />
          <input type="text" name="alamat" placeholder="Jl.Contoh No.01 Rt 01/Rw 01" maxlength="30" required class="form-control input-lg" />
          <div class="form-group row" style="margin-bottom: 0px;">
          <div class="col-xs-6">
          <input type="text" name="kelurahan" placeholder="Kelurahan" maxlength="20" required class="form-control input-lg" />
          </div>
          <div class="col-xs-6">
          <input type="text" name="kecamatan" placeholder="Kecamatan" maxlength="20" required class="form-control input-lg" />
          </div>
          </div>
          <input type="text" name="kota" placeholder="Kota" maxlength="20" required class="form-control input-lg" />
          <input type="text" name="provinsi" placeholder="Provinsi" maxlength="20" required class="form-control input-lg" />
          <input type="username" name="username" placeholder="Username" maxlength="20" required class="form-control input-lg" />
          <input type="password" name="password" placeholder="Password" maxlength="20" required class="form-control input-lg" />
          <input type="hidden" name="level" value="user" />
          <button type="submit" name="simpan" class="btn btn-lg btn-primary btn-block">Daftar</button>
            <p><strong><a href="login.php">Login</a></strong></p>
        </form>
      </section>
  </section>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
  function validasi() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;   
    if (username != "" && password!="") {
      return true;
    }else{
      alert('Username dan Password harus di isi !');
      return false;
    }
  }
 
</script>
</html>                                		