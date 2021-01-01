<?php
include 'menu_atas.php';
write_log('Buka Halaman Tambah Instansi ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Instansi','$ip','Buka Halaman Tambah Instansi ($id_user)')");
?>
<div class="page-header" align="center">
	<h3>Input Data Instansi</h3>
</div>
<?php
if ((isset($_POST['add']))) {
	$nama_instansi = anti_injection($_POST['nama_instansi']);
	$alamat = anti_injection($_POST['alamat']);
	$kota = anti_injection($_POST['kota']);
	$telp = anti_injection($_POST['telp']);
	$hp = anti_injection($_POST['hp']);
	$email = anti_injection($_POST['email']);
	$website = anti_injection($_POST['website']);
	$kontak_person = anti_injection($_POST['kontak_person']);
	$insert = "insert into instansi(nama_instansi, alamat, kota, telp, hp, email, website, kontak_person) values ('$nama_instansi', '$alamat', '$kota', '$telp', '$hp', '$email', '$website', '$kontak_person')";
	$hasil= mysqli_query($con,$insert);
	write_log($insert);
	mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Instansi","'.$ip.'","'.$insert.'")');
	if ($hasil) {
		?><div class="alert alert-success" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Berhasil Disimpan, <a href="index.php?file=instansi">Lihat Data</a>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Gagal Disimpan
		</div><?php
	}
}
?>
<div class="container">
  <div class="col-md-12">
	<form method="post" id="form1" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="form-group col-md-12">
				<label for="nama_instansi">Nama Instansi</label>
        		<input type="text" class="form-control" name="nama_instansi" placeholder="Nama">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="alamat">Alamat</label>
        		<input type="text" class="form-control" name="alamat" placeholder="Alamat">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="kota">Kota</label>
        		<input type="text" class="form-control" name="kota" placeholder="Kota">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="telp">Telp</label>
        		<input type="text" class="form-control" name="telp" placeholder="Telp">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="hp">HP</label>
        		<input type="text" class="form-control" name="hp" placeholder="HP">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="email">Email</label>
        		<input type="text" class="form-control" name="email" placeholder="Email">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="web">Website</label>
        		<input type="text" class="form-control" name="website" placeholder="Web">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="contact_person">Contact Person</label>
        		<input type="text" class="form-control" name="kontak_person" placeholder="Contact Person">
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