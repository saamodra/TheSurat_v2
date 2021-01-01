<?php
include 'menu_atas.php';
if ($id=anti_injection($_REQUEST['id'])) {
    $exe = mysqli_query($con, "SELECT * FROM block_ip where blockip_id='$id' ORDER BY ip ASC");
    $row = mysqli_fetch_object($exe);
}
if (isset($_POST['update'])) {
        $blockip_id = anti_injection($_REQUEST['id']);
        $block_ip = anti_injection($_POST['block_ip']);
        $keterangan = anti_injection($_POST['keterangan']);
        $update = "update block_ip set ip = '$block_ip', keterangan = '$keterangan' where blockip_id = '$blockip_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Block IP","'.$ip.'","'.$update.'")');
        write_log($update);
        ?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=block_ip">Lihat Data</a>
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
        <h3 align="center">Form Update Block IP</h3>
</div>
 <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="block_ip">IP Address</label>
                    <input type="text" class="form-control" name="block_ip" value="<?php echo $row->ip;?>">
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
                <a href="index.php?file=block_ip" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
    </div>
<?php
include 'menu_bawah.php';
?>