<?php
include 'menu_atas.php';
write_log('Buka Halaman Tambah Block IP ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Block IP','$ip','Buka Halaman Tambah Block IP ($id_user)')");
if ((isset($_POST['add']))) {
	$block_ip = anti_injection($_POST['block_ip']);
	$keterangan = anti_injection($_POST['keterangan']);
	$insert = "insert into block_ip(ip, keterangan) values ('$block_ip','$keterangan')";
	$hasil= mysqli_query($con,$insert);
	write_log($insert);
	mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Block IP","'.$ip.'","'.$insert.'")');
	if ($hasil) {
		?><div class="alert alert-success" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Berhasil Disimpan, <a href="index.php?file=block_ip">Lihat Data</a>
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
	<h3>Input Data Block IP</h3>
</div>
<div class="container">
<div class="col-md-12">
			<form method="post" id="form1" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-12">
						<label for="Block IP">Block IP</label>
	            		<input type="text" class="form-control" name="block_ip" placeholder="Block IP">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputPass1">Keterangan</label>
	            		<textarea class="form-control" rows="10" name="keterangan" placeholder="Keterangan"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
						<a href="index.php?file=block_ip" class="btn btn-danger ion-close-round"> Batal</a>
					</div>
				</div>
			</form>
		</div>
</div>

<?php
include 'menu_bawah.php';
?>