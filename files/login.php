<head>
  <title>Ubah Password</title>
  <style type="text/css">
    body {
      background-color: #484848
      margin: 0;
      padding-top: 20px;
    }
    h5 {
      text-align: center;
    }
    .center {
      width: 50%;
      margin: 0 auto;
    }
  </style>
</head><br>
<div class="page-header">
    <h3 align="center">Silahkan Login Terlebih Dahulu!</h3><br>
</div>

<?php
if (isset($_POST['login'])) {
  $charset = 'utf8';
  $collate = 'utf8_unicode_ci';
  $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_PERSISTENT => false,
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
  ];

  $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
  $user = "";
  $password = "";
  $username = anti_injection($_POST['user']); 
  $password = anti_injection(md5($_POST['password'])); 
// menyesuaikan dengan data di database
 $perintah = "select * from user where user_id = '$username' and password = '$password'";
 $hasil = mysqli_query($con, $perintah);
 $row = mysqli_fetch_array($hasil);
 
 if ($row['user_id'] == $username AND $row['password'] == $password) {
   session_start(); // memulai fungsi session
   $_SESSION['user_id'] = $row['user_id'];
   $_SESSION['nama'] = $username;
   $_SESSION['level'] = $row['level'];
   $_SESSION['password'] = $row['password'];
   $id_user = $_SESSION['user_id'];
   write_log('Login User ('.$_SESSION["user_id"].')');
   $sql = "insert into log(userid, menu, ip, log) values ('$id_user','Login','$ip','Login User ($id_user)')";
   mysqli_query($con2, $sql);
   header('location:index.php?file=home');
 }
 else {
  ?>
  <div class="alert alert-danger" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Login Gagal, Username atau Password Salah!
  </div>
  <?php
 // jika gagal, maka muncul teks login gagal
 }
}
 
?>
  <div class="container">
  <div class="row">
    <div class="main center">
        <div class="login-or">
          <hr class="hr-or col-xs-12">
          <span class="span-or"></span>
        </div>
        <label for="inputUsername" class="col-lg-12 col-xs-12 col-sm-12">IP Address : <?php echo $_SERVER['REMOTE_ADDR']; ?></label>
      <form action="" method="post" role="form">
        <div class="form-group">
          <label for="inputUsername">Email</label>
          <input type="text" class="form-control" name="user" placeholder="Masukkan Email" required="">
        </div>
        <div class="form-group">
          <label for="inputUlPassword">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="">
        </div>
        <button type="submit" class="btn btn btn-primary" name="login"><i class="fa fa-sign-in" aria-hidden></i>
          Login
        </button>
      </form>
      <hr class="hr-or">
      <a href="index.php?file=lupa_password">Lupa Password?</a>

  </div>
</div>
</div>