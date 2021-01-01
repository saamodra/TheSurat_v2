<?php
include 'menu_atas.php';
write_log('Buka Halaman Tambah User ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','User','$ip','Buka Halaman Tambah User ($id_user)')");
if ((isset($_POST['add']))) {
		$user_id = anti_injection($_POST['user_id']);
		$level = anti_injection($_POST['level']);
		$nama = anti_injection($_POST['nama']);
		$password = md5(anti_injection($_POST['password']));
		$insert = "insert into user(user_id, level, nama, password) values ('$user_id','$level','$nama','$password')";
		$hasil= mysqli_query($con,$insert);
		write_log($insert);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","User","'.$ip.'","'.$insert.'")');
		if ($hasil) {
		?><div class="alert alert-success" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Berhasil Disimpan, <a href="index.php?file=user">Lihat Data</a>
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
	<h3>Input Data User</h3>
</div>
<div class="container">
<div class="col-md-12">
			<form method="post" id="form1" action="" enctype="multipart/form-data">
				<div class="row">
	                <div class="form-group col-md-12">
	                    <label for="user">User ID</label>
	                    <input type="text" class="form-control" name="user_id">
	                </div>
	            </div>
	            <div class="row">
	                <div class="form-group col-md-12">
	                    <label for="level">Level</label>
	                    <select name="level" class="form-control" >
	                            <option value="Level" hidden="">Level</option>
	                            <?php 
									$query = "SHOW COLUMNS FROM user WHERE field='level'";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_row($hasil)) {
										foreach (explode("','", substr($data[1], 6, -2)) as $option) {
											echo "<option value='$option'>$option</option>";
										}
								
									}
								?>
	                    </select>
	                </div>
	            </div>
	            <div class="row">
	                <div class="form-group col-md-12">
	                    <label for="user">Nama</label>
	                    <input type="text" class="form-control" name="nama">
	                </div>
	            </div>
	            <div class="row">
	                <div class="form-group col-md-12">
	                    <label for="Password">Password</label>
	                    <input type="password" class="form-control" name="password">
	                </div>
	            </div><br>
	            <div class="row">
	                <div class="center">
	                <button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
	                <a href="index.php?file=user" class="btn btn-danger ion-close-round"> Batal</a>
	                </div>
	            </div>
			</form>
		</div>
</div>

<?php
include 'menu_bawah.php';
?>