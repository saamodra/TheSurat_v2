<?php
session_start();
$hapus = "delete from log";
$result = mysqli_query($con2, $hapus);
if ($result) {
	write_log($hapus);
	mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Log Aktifitas","'.$ip.'","'.$hapus.'")');
	?><div class="alert alert-success" align="center">
		<?php
		header('location:index.php?file=log_aktifitas');
		?>
	</div><?php
} else {
	?><div class="alert alert-danger" align="center">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Data masih terkait dengan Table Transaksi, Data Gagal Dihapus! <a href="index.php?file=lokasi">Kembali</a>
	</div><?php
}
?>