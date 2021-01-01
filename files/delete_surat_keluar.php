<?php
if ($hapus_srt_keluar=anti_injection($_REQUEST['id'])) {
	$hapus = "delete from surat_keluar where surat_keluar_id ='$hapus_srt_keluar'";
	$result = mysqli_query($con, $hapus);
	if ($result) {
		write_log($hapus);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Surat Keluar","'.$ip.'","'.$hapus.'")');
		?><div class="alert alert-success" align="center">
			<?php
			header('location:index.php?file=surat_keluar');
			?>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data masih terkait dengan Table Transaksi, Data Gagal Dihapus! <a href="index.php?file=surat_keluar">Kembali</a>
		</div><?php
	}
}
?>