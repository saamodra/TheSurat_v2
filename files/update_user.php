<?php
include 'menu_atas.php';
if ($id=anti_injection($_REQUEST['id'])) {
$exe = mysqli_query($con, "SELECT * FROM user where user_id='$id' ORDER BY nama ASC");
$row = mysqli_fetch_object($exe);
}
if (isset($_POST['update'])) {
$user_id = anti_injection($_REQUEST['id']);
$level = anti_injection($_POST['level']);
$nama = anti_injection($_POST['nama']);
$username = anti_injection($_POST['username']);
$update = "update user set nama = '$nama', level = '$level', user_id='$username' where user_id = '$user_id'";
$hasil= mysqli_query($con, $update) or die (mysqli_error());
 mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","User","'.$ip.'","'.$update.'")');
write_log($update);
?><div class="alert alert-success" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Data Berhasil Diupdate, <a href="index.php?file=user">Lihat Data</a>
 </div><?php
}
?>
<head>
    <style type="text/css">
            .center {
      width: 50%;
      margin: 0 auto;
    }
    </style>
</head>
<div class="page-header">
        <h3 align="center">Form Update User</h3>
</div>
 <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="lengkap">User ID</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row->user_id;?>" <?php if ($row->user_id == $_SESSION['user_id']) {echo "disabled";} ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="level">Level</label>
                    <select name="level" class="form-control" >
                            <option value="Admin" <?php if($row->level=='Admin'){echo 'selected';}?>>Admin</option>
                            <option value="User" <?php if($row->level=='User'){echo 'selected';}?>>User</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="lengkap">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row->nama;?>">
                </div>
            </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=user" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
</div>