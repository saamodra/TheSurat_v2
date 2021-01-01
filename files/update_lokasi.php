<?php
include 'menu_atas.php';
if ($id=anti_injection($_REQUEST['id'])) {
    $exe = mysqli_query($con, "SELECT * FROM lokasi where lokasi_id='$id' ORDER BY lokasi ASC");
    $row = mysqli_fetch_object($exe);
}
if (isset($_POST['update'])) {
        $lokasi_id = anti_injection($_REQUEST['id']);
        $lokasi = anti_injection($_POST['lokasi']);
        $keterangan = anti_injection($_POST['keterangan']);
        $update = "update lokasi set lokasi = '$lokasi', keterangan = '$keterangan' where lokasi_id = '$lokasi_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Lokasi","'.$ip.'","'.$update.'")');
        write_log($update);
        ?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=lokasi">Lihat Data</a>
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
        <h3 align="center">Form Update Lokasi</h3>
</div>
 <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" value="<?php echo $row->lokasi;?>">
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
                <a href="index.php?file=lokasi" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
    </div>