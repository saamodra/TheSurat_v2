<?php
include 'menu_atas.php';
if ($id=anti_injection($_REQUEST['id'])) {
    $exe = mysqli_query($con, "SELECT s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan, s.bagian_id, s.jenis_id, s.lokasi_id, s.instansi_id FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id WHERE s.surat_keluar_id ='$id'");
    $row = mysqli_fetch_object($exe);
}
if (isset($_POST['update']) && ($id=anti_injection($_REQUEST['id']))) {
        $nomor_surat = anti_injection($_POST['nomor_surat']);
        $bagian_id = anti_injection($_POST['bagian_id']);
        $sifat = anti_injection($_POST['sifat']);
        $prihal = anti_injection($_POST['prihal']);
        $tanggal_surat = anti_injection($_POST['tanggal_surat']);
        $tanggal_kirim = anti_injection($_POST['tanggal_kirim']);
        $nomor_agenda = anti_injection($_POST['nomor_agenda']);
        $lampiran = anti_injection($_FILES['lampiran']['name']);            
        $disposisi = anti_injection($_POST['disposisi']);
        $tembusan = anti_injection($_POST['tembusan']);
        $instansi_id = anti_injection($_POST['instansi_id']);
        $jenis_id = anti_injection($_POST['jenis_id']);
        $lokasi_id = anti_injection($_POST['lokasi_id']);
        $user_id = $_SESSION['user_id'];
        $tmp = explode('.', $_FILES['lampiran']['name']);
        $valid_ext = array('xls','xlsx','csv','docx','pdf','doc','ppt','txt');
        $ext = strtolower(end($tmp));
        if ($lampiran == "") {
            $update = "update surat_keluar set nomor_surat = '$nomor_surat', bagian_id = '$bagian_id', sifat = '$sifat', perihal = '$prihal', tanggal_surat = '$tanggal_surat', tanggal_kirim = '$tanggal_kirim', nomor_agenda = '$nomor_agenda',  disposisi = '$disposisi', tembusan = '$tembusan', instansi_id = '$instansi_id', jenis_id = '$jenis_id', lokasi_id = '$lokasi_id', user_id='$user' where surat_keluar_id = '$id'";
            $hasil= mysqli_query($con, $update) or die (mysqli_error());
             mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Surat Keluar","'.$ip.'","'.$update.'")');
            write_log($update);
            ?><div class="alert alert-success" align="center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Data Berhasil Diupdate, <a href="index.php?file=surat_keluar">Lihat Data</a>
             </div><?php
        } else {
            if(in_array($ext, $valid_ext)){
                move_uploaded_file($_FILES['lampiran']['tmp_name'] , "lampiran/".$lampiran);
            $update = "update surat_keluar set nomor_surat = '$nomor_surat', bagian_id = '$bagian_id', sifat = '$sifat', perihal = '$prihal', tanggal_surat = '$tanggal_surat', tanggal_kirim = '$tanggal_kirim', nomor_agenda = '$nomor_agenda', lampiran ='$disposisi',  disposisi = '$disposisi', tembusan = '$tembusan', instansi_id = '$instansi_id', jenis_id = '$jenis_id', lokasi_id = '$lokasi_id', user_id='$user' where surat_keluar_id = '$id'";
            $hasil= mysqli_query($con, $update) or die (mysqli_error());
             mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Surat Keluar","'.$ip.'","'.$update.'")');
             write_log($update);
            ?><div class="alert alert-success" align="center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Data Berhasil Diupdate, <a href="index.php?file=surat_keluar">Lihat Data</a>
             </div><?php
            }   else {
                ?><div class="alert alert-danger" align="center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Hanya dokumen yang boleh dilampirkan
                 </div><?php
            } 
        }
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
        <h3 align="center">Form Update Surat Keluar</h3>
</div>
 <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" value="<?php echo $row->nomor_surat; ?>" class="form-control" name="nomor_surat">
                    </div>
            </div>
            <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputBagian">Bagian Penerima</label>
                        <select name="bagian_id" class="form-control">
                                <?php 
                                    $query = "SELECT * FROM bagian";
                                    $hasil = mysqli_query($con, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <option value="<?php echo $data['bagian_id']; ?>" <?php if ($row->bagian==$data['bagian']) {
                                            echo "selected";
                                        }?>>
                                            <?php echo $data['bagian']; ?>
                                        </option>
                                        <?php
                                        
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputSifat">Sifat</label>
                        <select name="sifat" class="form-control" >
                            <option value="BIASA" <?php if($row->sifat=='BIASA'){echo 'selected';}?>>BIASA</option>
                            <option value="RAHASIA" <?php if($row->sifat=='RAHASIA'){echo 'selected';}?>>RAHASIA</option>
                            <option value="SANGAT RAHASIA" <?php if($row->sifat=='SANGAT BIASA'){echo 'selected';}?>>SANGAT RAHASIA</option>
                            <option value="KONFIDENSIAL" <?php if($row->sifat=='KONFIDENSIAL'){echo 'selected';}?>>KONFIDENSIAL</option>
                            <option value="LAIN-LAIN" <?php if($row->sifat=='LAIN-LAIN'){echo 'selected';}?>>LAIN-LAIN</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputPrihal">Perihal</label>
                        <input type="text" value="<?php echo $row->perihal; ?>" class="form-control" name="prihal" placeholder="Prihal" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTglSurat">Tanggal Surat</label>
                        <input type="date" value="<?php echo $row->tanggal_surat; ?>" class="form-control" name="tanggal_surat" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTglKirim">Tanggal Kirim</label>
                        <input type="date" value="<?php echo $row->tanggal_kirim; ?>" class="form-control" name="tanggal_kirim" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputNoAg">Nomor Agenda</label>
                        <input type="text" value="<?php echo $row->nomor_agenda; ?>" class="form-control" name="nomor_agenda" placeholder="Nomor Agenda" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputLampiran">Lampiran</label>
                        <input type="file" class="form-control" name="lampiran" placeholder="Lampiran" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputDisposisi">Disposisi</label>
                        <input type="text" value="<?php echo $row->disposisi; ?>" class="form-control" name="disposisi" placeholder="Disposisi" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTembusan">Tembusan</label>
                        <input type="text" value="<?php echo $row->tembusan; ?>" class="form-control" name="tembusan" placeholder="Tembusan" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputJenis">Instansi Pengirim</label>
                        <select name="instansi_id" class="form-control" >
                                <?php 
                                    $query = "SELECT * FROM instansi";
                                    $hasil = mysqli_query($con, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <option value="<?php echo $data['instansi_id']; ?>" <?php if ($row->nama_instansi==$data['nama_instansi']) {
                                            echo "selected";
                                        }?>>
                                            <?php echo $data['nama_instansi']; ?>
                                        </option>
                                        <?php
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputJenis">Jenis Surat</label>
                        <select name="jenis_id" class="form-control" >
                                <?php 
                                    $query = "SELECT * FROM jenis";
                                    $hasil = mysqli_query($con, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <option value="<?php echo $data['jenis_id']; ?>" <?php if ($row->jenis==$data['jenis']) {
                                            echo "selected";
                                        }?>>
                                            <?php echo $data['jenis']; ?>
                                        </option>
                                        <?php
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputJenis">Lokasi Pengarsipan</label>
                        <select name="lokasi_id" class="form-control" >
                                <?php 
                                    $query = "SELECT * FROM lokasi";
                                    $hasil = mysqli_query($con, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        echo "<option value='".$data['lokasi_id']."'"; if ($row->lokasi==$data['lokasi']) {
                                            echo "selected";
                                        } echo ">".$data['lokasi']. " " .$data['keterangan']. "</option>";
                                        
                                        }
                                    
                                ?>
                        </select>
                    </div>
                </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=surat_keluar" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form>
    </div>
<?php
include 'menu_bawah.php';
?>