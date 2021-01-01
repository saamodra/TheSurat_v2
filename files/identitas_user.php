<?php
    $exe = mysqli_query($con, "SELECT * FROM identitas");
    $row = mysqli_fetch_object($exe);
include 'menu_atas.php';
write_log('Buka Menu Identitas ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Identitas','$ip','Buka Menu Identitas ($id_user)')");
if (isset($_POST['update'])) {
        $nama = anti_injection($_POST['nama_identitas']);
		$alamat = anti_injection($_POST['alamat']);
		$telp = anti_injection($_POST['telp']);
		$kota = anti_injection($_POST['kota']);
		$web = anti_injection($_POST['website']);
		$pemilik = anti_injection($_POST['pemilik']);
		$keuangan = anti_injection($_POST['keuangan']);
		$update = "update identitas set nama_identitas = '$nama', alamat = '$alamat', telp = '$telp', kota = '$kota', website = '$web', pemilik = '$pemilik', keuangan = '$keuangan' where identitas_id = '1'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Identitas","'.$ip.'","'.$update.'")');
        write_log($update);
        ?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=identitas">Refresh</a>
         </div><?php
}
if (isset($_POST['update_logo_kiri'])) {
	$logo_kiri = anti_injection($_FILES['logo_kiri']['name']);
	move_uploaded_file($_FILES['logo_kiri']['tmp_name'] , "images/".$logo_kiri);
	$update = "update identitas set logo_kiri ='$logo_kiri' where identitas_id = '1'";
	$hasil= mysqli_query($con, $update) or die (mysqli_error());
	mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Identitas","'.$ip.'","'.$update.'")');
        write_log($update);
	?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=identitas">Refresh</a>
         </div><?php
}
if (isset($_POST['update_logo_kanan'])) {
	$logo_kanan = anti_injection($_FILES['logo_kanan']['name']);
	move_uploaded_file($_FILES['logo_kanan']['tmp_name'] , "images/".$logo_kanan);
	$update = "update identitas set logo_kanan ='$logo_kanan' where identitas_id = '1'";
	$hasil= mysqli_query($con, $update) or die (mysqli_error());
	mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Identitas","'.$ip.'","'.$update.'")');
        write_log($update);
	?><div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=identitas">Refresh</a>
         </div><?php
}
?>

<head>
    <style type="text/css">
            .fit {
			max-width: 200px;
			max-height: 200px;
			width: auto;
			height: auto;
		}
    </style>
</head>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row col-md-12">
				<fieldset class="form-group"><legend>Identitas</legend></fieldset>
			</div>
			<form method="post" id="printableArea" action="" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="control-label col-md-3">Nama</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="nama_identitas" value="<?php echo $row->nama_identitas; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Alamat</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Telp</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="telp" value="<?php echo $row->telp; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Kota</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="kota" value="<?php echo $row->kota; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Website</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="website" value="<?php echo $row->website; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Pemilik</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="pemilik" value="<?php echo $row->pemilik; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Keuangan</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="keuangan" value="<?php echo $row->keuangan; ?>" disabled></div>
			</div>
			</form>
    </div>
    <div class="col-md-6">
      <div class="form-group row col-md-12">
				<fieldset class="form-group"><legend>Logo </legend></fieldset>
			</div>
			<div class="form-group">
					<div class="row">
					<div class="form-group col-lg-6">
						<form action="" method="post" enctype="multipart/form-data">
							<div align="center"><?php echo "<img src='images/".$row->logo_kiri."' class='fit'>"; ?><br><br></div>
						</form>
					</div>
					<div class="form-group col-6">
						<form action="" method="post" enctype="multipart/form-data">
							<div align="center"><?php echo "<img src='images/".$row->logo_kanan."' class='fit'>"; ?><br><br></div>
						</form>
					</div>
					</div>
			</div>
    </div>
  </div>
</div>
<?php
include 'menu_bawah.php';
?>