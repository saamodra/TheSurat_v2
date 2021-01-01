<?php
include 'menu_atas.php';
if ($id=anti_injection($_REQUEST['id'])) {
    $exe = mysqli_query($con, "SELECT * FROM bagian where bagian_id='$id' ORDER BY bagian ASC");
    $row = mysqli_fetch_object($exe);
}
if (isset($_POST['update'])) {
        $bagian_id = anti_injection($_REQUEST['id']);
        $bagian = anti_injection($_POST['bagian']);
        $keterangan = anti_injection($_POST['keterangan']);
        $update = "update bagian set bagian = '$bagian', keterangan = '$keterangan' where bagian_id = '$bagian_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Bagian","'.$ip.'","'.$update.'")');
        write_log($update);
        ?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=bagian">Lihat Data</a>
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
        <h3 align="center">Form Update Bagian</h3>
</div>
 <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="bagian">Bagian</label>
                    <input type="text" class="form-control" name="bagian" value="<?php echo $row->bagian;?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $row->keterangan;?>">
                </div>
            </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=bagian" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
    </div>
<?php
include 'menu_bawah.php';
?>