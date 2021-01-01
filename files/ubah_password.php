<head>
  <title>Ubah Password</title>
  <style type="text/css">
    .center {width: 50%; margin: 0 auto;}
  </style>
</head><br>
<div class="page-header">
    <h3 align="center">Ubah Password</h3><br>
</div>
<?php
include 'menu_atas.php';
if (isset($_POST['update']))  {
  $id_user = $_SESSION['user_id'];
  $select = "select * from user where user_id = '$id_user'";
  $hasil =mysqli_query($con, $select) or die (mysqli_error());
  $row = mysqli_fetch_array($hasil);
  if (md5($_POST['pass_lama'])==$row['password']) {
    $user_id = $_SESSION['user_id'];
    $pass_baru = md5(anti_injection($_POST['pass_baru']));
    $update = "update user set password = '$pass_baru' where user_id = '$user_id'";
    $hasil= mysqli_query($con, $update) or die (mysqli_error());
    write_log($update);
    mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Ubah Password","'.$ip.'","'.$update.'")');
    ?><div class="alert alert-success" align="center">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Password Berhasil Diubah
      </div><?php
  } else {
    ?><div class="alert alert-danger" align="center">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Password Lama Salah!
      </div><?php
  }
}
?>
<div class="container">
  <div class="row">
    <div class="main center">
      <div class="col-md-12">
      <hr>
      <form action="" method="post" role="form">
        <div class="form-group">
          <label>Password Lama</label>
          <input type="text" class="form-control" name="pass_lama" placeholder="Masukkan Password Lama">
        </div>
        <div class="form-group">
          <label>Password Baru</label>
          <input type="password" class="form-control" name="pass_baru" placeholder="Masukkan Password Baru">
        </div>
        <button type="submit" class="btn btn btn-primary" name="update">
          Ubah Password
        </button>
      </form>
    </div>
  </div>
</div>
</div>