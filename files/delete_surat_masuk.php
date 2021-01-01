<?php
if ($hapus_srt_masuk=anti_injection($_REQUEST['id'])) {
	$hapus = "delete from surat_masuk where surat_masuk_id ='$hapus_srt_masuk'";
	$result = mysqli_query($con, $hapus);
	if ($result) {
		write_log($hapus);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Surat Masuk","'.$ip.'","'.$hapus.'")');
		?><div class="alert alert-success" align="center">
			<?php
			header('location:index.php?file=surat_masuk');
			?>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data masih terkait dengan Table Transaksi, Data Gagal Dihapus! <a href="index.php?file=surat_masuk">Kembali</a>
		</div><?php
	}
}
?>