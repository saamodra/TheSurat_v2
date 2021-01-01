<?php
include 'menu_atas.php';
if ($id=anti_injection($_REQUEST['id'])) {
    $exe = mysqli_query($con, "SELECT jenis_id, jenis, keterangan FROM jenis where jenis_id='$id' ORDER BY jenis ASC");
    $row = mysqli_fetch_object($exe);
}
if (isset($_POST['update'])) {
        $jenis_id = anti_injection($_REQUEST['id']);
        $jenis = anti_injection($_POST['jenis']);
        $keterangan = anti_injection($_POST['keterangan']);
        $update = "update jenis set jenis = '$jenis', keterangan = '$keterangan' where jenis_id = '$jenis_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Jenis","'.$ip.'","'.$update.'")');
        write_log($update);
        ?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=jenis">Lihat Data</a>
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
        <h3 align="center">Form Update Jenis Surat</h3>
</div>
 <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="grup">Jenis Surat</label>
                    <input type="text" class="form-control" name="jenis" value="<?php echo $row->jenis;?>">
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
                <a href="index.php?file=jenis" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
    </div>
<?php
include 'menu_bawah.php';
?>