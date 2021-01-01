<?php
if ($hapus_lokasi=anti_injection($_REQUEST['id'])) {
	$hapus = "delete from lokasi where lokasi_id ='$hapus_lokasi'";
	$result = mysqli_query($con, $hapus);
	if ($result) {
		write_log($hapus);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Lokasi","'.$ip.'","'.$hapus.'")');
		?><div class="alert alert-success" align="center">
			<?php
			header('location:index.php?file=lokasi');
			?>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data masih terkait dengan Table Transaksi, Data Gagal Dihapus! <a href="index.php?file=lokasi">Kembali</a>
		</div><?php
	}
}
?>