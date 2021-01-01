<?php
include 'menu_atas.php';
write_log('Buka Halaman Tambah Lokasi ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Lokasi','$ip','Buka Halaman Tambah Lokasi ($id_user)')");
if ((isset($_POST['add']))) {
	$lokasi = anti_injection($_POST['lokasi']);
	$keterangan = anti_injection($_POST['keterangan']);
	$insert = "insert into lokasi(lokasi, keterangan) values ('$lokasi','$keterangan')";
	$hasil= mysqli_query($con,$insert);
	mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Lokasi","'.$ip.'","'.$insert.'")');
	write_log($insert);
	if ($hasil) {
		?><div class="alert alert-success" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Berhasil Disimpan, <a href="index.php?file=lokasi">Lihat Data</a>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Gagal Disimpan
		</div><?php
	}
}
?>
<div class="page-header" align="center">
	<h3>Input Data Lokasi</h3>
</div>
<div class="container">
<div class="col-md-12">
			<form method="post" id="form1" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-12">
						<label for="Lokasi">Lokasi</label>
	            		<input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						<label for="keterangan">Keterangan</label>
	            		<textarea class="form-control" rows="10" name="keterangan" placeholder="Keterangan"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
						<button class="btn btn-danger ion-close-round" type="reset"> Batal</button>
					</div>
				</div>
			</form>
		</div>
</div>

<?php
include 'menu_bawah.php';
?>