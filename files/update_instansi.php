<?php
include 'menu_atas.php';
if (isset($_POST['update'])) {
        $instansi_id = anti_injection($_REQUEST['id']);
        $nama_instansi = anti_injection($_POST['nama_instansi']);
        $alamat = anti_injection($_POST['alamat']);
        $kota = anti_injection($_POST['kota']);
        $telp = anti_injection($_POST['telp']);
        $email = anti_injection($_POST['email']);
        $website = anti_injection($_POST['website']);
        $kontak_person = anti_injection($_POST['kontak_person']);
        $update = "update instansi set nama_instansi = '$nama_instansi', alamat = '$alamat', kota = '$kota', telp = '$telp', email = '$email', website = '$website', kontak_person = '$kontak_person' where instansi_id = '$instansi_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
         mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Instansi","'.$ip.'","'.$update.'")');
        write_log($update);
        ?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=instansi">Lihat Data</a>
         </div><?php
}
if ($id=anti_injection($_REQUEST['id'])) {
    $exe = mysqli_query($con, "SELECT * FROM instansi where instansi_id='$id' ORDER BY nama_instansi ASC");
    $row = mysqli_fetch_object($exe);
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
        <h3 align="center">Form Update Instansi</h3>
</div>
 <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="nama_instansi">Nama Instansi</label>
                    <input type="text" class="form-control" name="nama_instansi" value="<?php echo $row->nama_instansi; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" name="kota" value="<?php echo $row->kota; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" name="telp" value="<?php echo $row->telp; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="hp">HP</label>
                    <input type="text" class="form-control" name="hp" value="<?php echo $row->hp; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row->email; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" value="<?php echo $row->website; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="kontak_person">Kontak Person</label>
                    <input type="text" class="form-control" name="kontak_person" value="<?php echo $row->kontak_person; ?>">
                </div>
            </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=instansi" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
    </div>
<?php
include 'menu_bawah.php';
?>